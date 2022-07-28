<?php

if(isset($slug)) {
    $sql = "SELECT * FROM products WHERE slug=?";
    $product = query($sql,[$slug])->fetch(PDO::FETCH_ASSOC);

    if(!$product){
        header("Location:".WEB_ROOT."/collections/not-product");
    }

    $result = getWarehouse($product['id']);
    $colors = $result['color'];

    // get colors product 
    // ? 'c' viết tắt của color
    if(!empty($_GET['c'])){
        $color_id = $_GET['c'];
    }else {
        if(isset(getWarehouse($product['id'])['color'][0])){
            $color_id = getWarehouse($product['id'])['color'][0]['id'];
        }
    }
    
    // get sizes product
    $sizes = array();
    $sql = "SELECT size FROM product_warehouse WHERE product_id=? AND color=? AND quantity>0";
    if(isset($color_id)) {
        $size_id = query($sql,[$product['id'],$color_id])->fetchAll(PDO::FETCH_ASSOC);
        foreach ($size_id as $id) {
            $sql = "SELECT * FROM sizes WHERE id=?";
            if(!empty($id['size'])){
                $size = query($sql,[$id['size']])->fetch(PDO::FETCH_ASSOC);
                array_push($sizes, $size);
            }
        }
    }

    // select random product
    $sql ="SELECT * FROM products ORDER BY RAND() LIMIT 10";
    $random_products = query($sql)->fetchAll(PDO::FETCH_ASSOC);

    // get product reviews
    $sql = "SELECT * FROM product_reviews WHERE product_id=?";
    $product_reviews = query($sql,[$product['id']])->fetchAll(PDO::FETCH_ASSOC);

    // update view
    $sql = "UPDATE products SET view=view+1 WHERE id=?";
    query($sql,[$product['id']]);

    if(!empty($product_reviews)) {
        $product_reviews_count = count($product_reviews);
    }else {
        $product_reviews_count = 0;
    }

    $result = getStarsNum($product_reviews);

    $one_star = $result['one_star'];
    $two_star = $result['two_star'];
    $three_star = $result['three_star'];
    $four_star = $result['four_star'];
    $five_star = $result['five_star'];
    $point = $result['point'];
    
    $web_title = $product['name'];
}

// add to cart
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_cart'])){

    if(empty($_POST['size'])) {
        $error = 'Sản phẩm tạm thời hết hàng';
    }else {
        $size = $_POST['size'];
    }

    if(empty($_POST['color'])){
        $error = 'Sản phẩm tạm thời hết hàng';
    }else {
        $color = $_POST['color'];
    }
    
    $quantity = $_POST['quantity'];
    $id = $_POST['id'];

    // check quantity product
    if(isset($color) && isset($size)) {
        $sql = "SELECT quantity FROM product_warehouse WHERE product_id=? AND color=? AND size=?";
        $warehouse_quantity = query($sql,[$product['id'],$color,$size])->fetch(PDO::FETCH_ASSOC);

        if($quantity > $warehouse_quantity['quantity']){
            $error_quantity = 'Sản phẩm '.$product['name'].' có số lượng tối đa cho phép là '.$warehouse_quantity['quantity'];
        }
    }
    
    if(empty($error)) {

        // check quantity product and product realy in cart
        if(isset($_SESSION['cart_products'])){
            foreach ($_SESSION['cart_products'] as $key => $item) {
                if($item['size'] == $size && $item['color'] == $color && $item['product_id'] == $id) {
                    $sql = "SELECT quantity FROM product_warehouse WHERE product_id=? AND color=? AND size=?";
                    $warehouse_quantity = query($sql,[$product['id'],$item['color'],$item['size']])->fetch(PDO::FETCH_ASSOC);

                    if(($item['quantity'] + $quantity) > $warehouse_quantity['quantity']){
                        $error_quantity = 'Sản phẩm '.$item['product_name'].' có số lượng tối đa cho phép là '.$warehouse_quantity['quantity'];
                    }else {
                        $quantity += $item['quantity'];
                        unset($_SESSION['cart_products'][$key]);
                    }
                }
            }
        }
    
        if(empty($error_quantity)) {
            $sql = "SELECT name,price,image FROM products WHERE id=?";
            $buy_products = query($sql,[$id])->fetch(PDO::FETCH_ASSOC);
        
            $product_item = [
                'product_id'=>$id,
                'size'=> $size,
                'color'=> $color,
                'quantity'=> $quantity,
                'product_name'=> $buy_products['name'],
                'product_price'=> $buy_products['price'],
                'product_image'=> $buy_products['image'],
            ];
        
            $key = uniqid();
            $_SESSION['cart_products'][$key] = $product_item;
            $success = 'Thêm vào giỏ hàng thành công';
        }
    }
}

// buy now
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['buy_now'])){

    if(empty($_POST['size'])) {
        $error = 'Sản phẩm tạm thời hết hàng';
    }else {
        $size = $_POST['size'];
    }

    if(empty($_POST['color'])){
        $error = 'Sản phẩm tạm thời hết hàng';
    }else {
        $color = $_POST['color'];
    }

    $quantity = $_POST['quantity'];
    $id = $_POST['id'];

    // check quantity product
    if(isset($color) && isset($size)) {
        $sql = "SELECT quantity FROM product_warehouse WHERE product_id=? AND color=? AND size=?";
        $warehouse_quantity = query($sql,[$product['id'],$color,$size])->fetch(PDO::FETCH_ASSOC);

        if($quantity > $warehouse_quantity['quantity']){
            $error_quantity = 'Sản phẩm '.$product['name'].' có số lượng tối đa cho phép là '.$warehouse_quantity['quantity'];
        }
    }

    if(empty($error)) {

        // check quantity product and product realy in cart
        if(isset($_SESSION['cart_products'])){
            foreach ($_SESSION['cart_products'] as $key => $item) {
                if($item['size'] == $size && $item['color'] == $color && $item['product_id'] == $id) {
                    $sql = "SELECT quantity FROM product_warehouse WHERE product_id=? AND color=? AND size=?";
                    $warehouse_quantity = query($sql,[$product['id'],$item['color'],$item['size']])->fetch(PDO::FETCH_ASSOC);

                    if(($item['quantity'] + $quantity) > $warehouse_quantity['quantity']){
                        $error_quantity = 'Sản phẩm '.$item['product_name'].' có số lượng tối đa cho phép là '.$warehouse_quantity['quantity'];
                    }else {
                        $quantity += $item['quantity'];
                        unset($_SESSION['cart_products'][$key]);
                    }
                }
            }
        }

        if(empty($error_quantity)){
            $sql = "SELECT name,price,image FROM products WHERE id=?";
            $buy_products = query($sql,[$id])->fetch(PDO::FETCH_ASSOC);

            $product_item = [
                'product_id'=>$id,
                'size'=> $size,
                'color'=> $color,
                'quantity'=> $quantity,
                'product_name'=> $buy_products['name'],
                'product_price'=> $buy_products['price'],
                'product_image'=> $buy_products['image'],
            ];

            $key = uniqid();
            $_SESSION['cart_products'][$key] = $product_item;
            
            header('Location: '.WEB_ROOT.'/checkouts');
        }
    }
}

// handle form evaluate
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_evaluate'])){

    $errors = array();

    $assessor_name = validateInput($_POST['assessor_name']);
    $assessor_email = validateInput($_POST['assessor_email']);
    $assessor_phone = validateInput($_POST['assessor_phone']);
    $assessor_title = validateInput($_POST['assessor_title']);
    $assessor_content = validateInput($_POST['assessor_content']);

    if(empty($assessor_name)){
        $errors['assessor_name'] = 'Vui lòng nhập tên của bạn';
    }

    if(empty($assessor_email)){
        $errors['assessor_email'] = 'Vui lòng nhập email của bạn';
    }

    if(empty($assessor_phone)){
        $errors['assessor_phone'] = 'Vui lòng nhập số điện thoại của bạn';
    }

    if(empty($assessor_title)){
        $errors['assessor_title'] = 'Vui lòng nhập tiêu đề đánh giá';
    }

    if(empty($assessor_content)){
        $errors['assessor_content'] = 'Vui lòng nhập nôi dung đánh giá';
    }

    if(isset($_POST['star'])){
        $stars = $_POST['star'];
    }else {
        $stars = 5;
    }
    
    if($_FILES['assessor_image']['size'] > 0){
        $result =  handleUpload($_FILES['assessor_image']);
        if(!empty($result['error'])){
            $errors['assessor_image'] = $result['error'];
        }else {
            $assessor_image = $result['file'];
        }
    }else {
        $assessor_image = '';
    }
    
    if(empty($errors)){
        $product_id = validateInput($_POST['product_id']);

        $sql = "INSERT INTO product_reviews(assessor_name,assessor_email,assessor_phone,title,content,stars,image,product_id)
                VALUES(?,?,?,?,?,?,?,?)";
        $result = query($sql,[
            $assessor_name,
            $assessor_email,
            $assessor_phone,
            $assessor_title,
            $assessor_content,
            $stars,
            $assessor_image,
            $product_id
        ]);

        if($result->rowCount() > 0){
            header('Location:'.WEB_ROOT.'/products/'.$slug);
        }
    }
}

// handle form answer
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_answer'])){
    $errors = array();
    
    $answer_name = validateInput($_POST['answer_name']);
    $answer_content = validateInput($_POST['answer_content']);
    
    if(empty($answer_name)){
        $errors['answer_name'] = 'Vui lòng nhập tên của bạn';
    }else {
        if(mb_strlen($answer_name,'utf-8') > 100) {
            $errors['answer_name'] = 'Tên không được quá 100 ký tự';
        }
    }

    if(empty($answer_content)){
        $errors['answer_content'] = 'Vui lòng nhập nội dung';
    }else {
        if(mb_strlen($answer_content,'utf-8') > 500) {
            $errors['answer_content'] = 'Nội dung không được quá 500 ký tự';
        }
    }

    if(empty($errors)){
        $review_id = validateInput($_POST['review_id']);

        $sql = "INSERT INTO product_review_answer(product_review_id,name,content) VALUES(?,?,?)";
        $result = query($sql,[
            $review_id,
            $answer_name,
            $answer_content
        ]);

        if($result->rowCount() > 0){
            header('Location:'.WEB_ROOT.'/products/'.$slug);
        }
    }
}