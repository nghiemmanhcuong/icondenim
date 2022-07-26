<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $category_group_id = $_POST['category_group_id'];
    $sql = "DELETE FROM categories WHERE id=?";
    $result = query($sql, [$category_group_id])->rowCount();

    if($result > 0){
        redirect('index.php?p=nhom-san-pham&msg=Xoá nhóm sản phẩm thành công');
    }
}else {
    redirect('index.php?p=nhom-san-pham');
}