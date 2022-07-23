<?php
if(!empty($_GET['product_id'])){
    $product_id = $_GET['product_id'];
    $sql = "SELECT * FROM products WHERE id=?";
    $product = query($sql,[$product_id])->fetch(PDO::FETCH_ASSOC);

    $sql = "SELECT * FROM categories";
    $categories = query($sql,[0])->fetchAll(PDO::FETCH_ASSOC);

    $sql = "SELECT * FROM product_images WHERE product_id=?";
    $product_images = query($sql,[$product_id])->fetchAll(PDO::FETCH_ASSOC);
}else {
    redirect('index.php?p=danh-sach-san-pham');
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $errors = array();

    $name = validateInput($_POST['name']);
    $category = validateInput($_POST['category']);
    $price = validateInput($_POST['price']);
    $old_price = validateInput($_POST['old_price']);
    $description = validateInput($_POST['description']);
    $is_new = validateInput($_POST['is_new']);
    $is_popular = validateInput($_POST['is_popular']);

    if(empty($name)) {
        $errors['name'] = 'Tên sản phẩm không được để trống';
    }

    if(empty($price)){
        $errors['price'] = 'Giá sản phẩm không được để trống';
    }else {
        $price = str_replace(',', '', $price);
        $price = str_replace('.', '', $price);
        if(!is_numeric($price) || $price < 0){
            $errors['price'] = 'Giá sản phẩm không hợp lệ';
        }
    }

    if(empty($old_price)){
        $old_price = 0;
    }else {
        $old_price = str_replace(',', '', $old_price);
        $old_price = str_replace('.', '', $old_price);
        if(!is_numeric($old_price) || $old_price < 0){
            $errors['old_price'] = 'Giá cũ sản phẩm không hợp lệ';
        }
    }

    if(empty($description)){
        $errors['description'] = 'Mô tả sản phẩm không được để trống';
    }

    if($_FILES['image']['size'] > 0) {
        $result = handleUpload($_FILES['image']);
        if(!empty($result['error'])){
            $errors['image'] = $result['error'];
        }else {
            $image = $result['file'];
        }
    }else {
        $image = $_POST['img'];
    }

    if(empty($errors)){
        $id = $_POST['id'];
        
        $sql = "UPDATE products 
                SET name=?, category_id=?, price=?, old_price=?, 
                description=?,image=?,updated_at=?,is_new=?,is_popular=?
                WHERE id=?";
        $result = query($sql,[
            $name,
            $category,
            $price,
            $old_price,
            $description,
            $image,
            $dateNow,
            $is_new,
            $is_popular,
            $id,
        ]);

        if($result->rowCount() > 0) {
            redirect('index.php?p=danh-sach-san-pham&msg=Sửa sản phẩm thành công');
        }
    }
}

