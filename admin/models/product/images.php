<?php
if(!empty($_GET['product_id'])){
    $product_id = $_GET['product_id'];
    $sql = "SELECT name FROM products WHERE id=?";
    $product = query($sql,[$product_id])->fetch(PDO::FETCH_ASSOC);

    $curr_url = '?p='.$_GET['p'].'&product_id='.$product_id;
}else {
    redirect('index.php?p=danh-sach-san-pham');
}
// fetch
if(isset($product_id)){
    $limit = 5;
    $curr_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($curr_page - 1) * $limit;

    $sql = "SELECT * FROM product_images WHERE product_id=? LIMIT $limit OFFSET $offset";
    $images = query($sql,[$product_id])->fetchAll(PDO::FETCH_ASSOC);

    $image_count = query("SELECT * FROM product_images WHERE product_id=$product_id")->rowCount();
    $pages = ceil($image_count / $limit);
    $type = 'product_id';
}
// edit
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_image'])){
    $error = '';

    if($_FILES['img']['size'] > 0){
        $result = handleUpload($_FILES['img']);
        if(!empty($result['error'])){
            $error = $result['error'];
        }else {
            $img = $result['file'];
        }
    }else {
        $error = 'Chọn ảnh';
    }

    if(empty($error)){
        $image_id = $_GET['image_id'];
        $sql = "UPDATE product_images SET image_name=? WHERE id=?";
        $result = query($sql,[$img,$image_id]);

        if($result->rowCount() > 0){
            redirect('index.php'.$curr_url.'&page='.$curr_page);
        }
    }
}
// delete
if(!empty($_GET['delete_id'])){
    $delete_id = $_GET['delete_id'];
    $sql = "DELETE FROM product_images WHERE id=?";
    $result = query($sql,[$delete_id]);

    if($result->rowCount() > 0){
        redirect('index.php'.$curr_url.'&page='.$curr_page);
    }
}
// add
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_image'])){
    $error_add = '';

    if($_FILES['file_add']['size'] > 0){
        $result = handleUpload($_FILES['file_add']);
        if(!empty($result['error'])){
            $error = $result['error'];
        }else {
            $file_add = $result['file'];
        }
    }else {
        $error_add = 'Chọn ảnh';
    }

    if(empty($error_add)){
        $sql = "INSERT INTO product_images(product_id,image_name) VALUES(?,?)";
        $result = query($sql,[$product_id,$file_add]);

        if($result->rowCount() > 0){
            redirect('index.php'.$curr_url.'&page='.$curr_page);
        }
    }
}