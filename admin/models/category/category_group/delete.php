<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $category_group_id = $_POST['category_group_id'];
    $sql = "DELETE FROM categories WHERE id=?";
    $result = query($sql, [$category_group_id])->rowCount();

    if($result > 0){
        redirect('index.php?p=nhom-san-pham&msg=Xoá nhóm sản phẩm thành công');

        $sql = "UPDATE products SET category_id=0 WHERE category_id=?";
        query($sql, [$category_group_id]);
    }
}else {
    redirect('index.php?p=nhom-san-pham');
}