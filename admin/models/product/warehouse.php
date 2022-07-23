<?php

// read table colors
$sql = "SELECT * FROM colors";
$colors = query($sql)->fetchAll(PDO::FETCH_ASSOC);

// read table sizes
$sql = "SELECT * FROM sizes";
$sizes = query($sql)->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $sql = "SELECT name,image FROM products WHERE id=?";
    $product = query($sql,[$product_id])->fetch(PDO::FETCH_ASSOC);

    $sql = "SELECT * FROM product_warehouse WHERE product_id=?";
    $product_warehouse = query($sql,[$product_id])->fetchAll(PDO::FETCH_ASSOC);
}else {
    redirect('index.php?p=danh-sach-san-pham');
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_attribute'])){
    $errors = array();

    $color_arr = array_filter($_POST['color']);
    $size_arr = array_filter($_POST['size']);
    $quantity_arr = array_filter($_POST['quantity']);

    if(empty($color_arr)){
        $errors['color'] = 'Vui lòng nhập màu';
    }

    if(empty($size_arr)){
        $errors['size'] = 'Vui lòng nhập kích cỡ';
    }

    if(empty($quantity_arr)){
        $errors['quantity'] = 'Vui lòng nhập số lượng';
    }

    if(empty($errors)){

        $sql = "INSERT INTO product_warehouse (product_id, color, size,quantity) VALUES(?,?,?,?)";
        for ($i=0; $i < count($color_arr); $i++) { 
            query($sql,[$product_id,$color_arr[$i],$size_arr[$i],$quantity_arr[$i]]);
        }

        redirect('index.php?p=them-vao-kho&product_id='.$product_id.'&msg=Thêm vào kho thành công');
        die;
    }
}

if(isset($_POST['edit_attribute'])){
    $color = $_POST['color'];
    $size = $_POST['size'];
    $quantity = $_POST['quantity'];
    $attribute_id = $_POST['id'];

    $sql = "UPDATE product_warehouse SET color=?,size=?,quantity=? WHERE id=?";
    $result = query($sql,[$color,$size,$quantity,$attribute_id]);
    if($result->rowCount() > 0){
        redirect('index.php?p=them-vao-kho&product_id='.$product_id);
    }
}

if(!empty($_GET['delete_id'])){
    $attribute_id = $_GET['delete_id'];
    $sql = "DELETE FROM product_warehouse WHERE id=?";
    $result = query($sql,[$attribute_id]);
    if($result->rowCount() > 0){
        redirect('index.php?p=them-vao-kho&product_id='.$product_id);
    }
}