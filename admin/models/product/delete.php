<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $product_id = $_POST['product_id'];
    $sql = "DELETE FROM products WHERE id=?";
    $result = query($sql,[$product_id]);

    if($result->rowCount() > 0){
        $sql = "DELETE FROM product_warehouse WHERE product_id=?";
        $result = query($sql,[$product_id]);

        $sql = "DELETE FROM product_images WHERE product_id=?";
        $result = query($sql,[$product_id]);

        redirect('index.php?p=danh-sach-san-pham&msg=Xoá sản phẩm thành công');
    }
}else {
    redirect('index.php?p=danh-sach-san-pham');
}