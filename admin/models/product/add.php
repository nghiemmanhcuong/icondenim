<?php
// read table categories
$sql = "SELECT * FROM categories";
$categories = query($sql)->fetchAll(PDO::FETCH_ASSOC);

// read table colors
$sql = "SELECT * FROM colors";
$colors = query($sql)->fetchAll(PDO::FETCH_ASSOC);

// read table sizes
$sql = "SELECT * FROM sizes";
$sizes = query($sql)->fetchAll(PDO::FETCH_ASSOC);

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
        $errors['name'] = 'Vui lòng nhập tên sản phẩm';
    }

    if(empty($category)){
        $errors['category'] = 'Vui lòng nhập danh mục sản phẩm';
    }

    if(empty($price)){
        $errors['price'] = 'Vui lòng nhập giá sản phẩm';
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
        $errors['description'] = 'Vui lòng nhập mô tả sản phẩm';
    }

    if($_FILES['image']['size'] > 0) {
        $result = handleUpload($_FILES['image']);
        if(!empty($result['error'])){
            $errors['image'] = $result['error'];
        }else {
            $image = $result['file'];
        }
    }else {
        $errors['image'] = 'Vui lòng chọn ảnh sản phẩm';
    }

    if($_FILES['image_list']['size'][0] > 0){
        $result = handleUploadMultiple($_FILES['image_list']);
        if(!empty($result['errors'])){
            foreach ($result['errors'] as $error) {
                $errors['image_list'] = $error;
            }
        }else {
            $image_list = $result['files'];
        }
    }

    if(empty($errors)){
        $slug = toSlug($name);
        
        $sql = "INSERT INTO products (name, category_id, price, old_price, description,image,slug,is_new,is_popular) 
                VALUES (?,?,?,?,?,?,?,?,?)";
        $result = query($sql,[
            $name,
            $category,
            $price,
            $old_price,
            $description,
            $image,
            $slug,
            $is_new,
            $is_popular
        ]);

        if($result->rowCount() > 0) {
            $stmt = query("SELECT LAST_INSERT_ID()");
            $product_id = $stmt->fetchColumn();

            $sql = "INSERT INTO product_images(product_id,image_name) VALUES(?,?)";
            foreach ($image_list as $image) {
                query($sql,[$product_id,$image]);
            }
            redirect('index.php?p=them-vao-kho&product_id='.$product_id);
        }
    }
}