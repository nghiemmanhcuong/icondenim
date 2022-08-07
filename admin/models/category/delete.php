<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $category_id = $_POST['category_id'];
    $sql = "DELETE FROM categories WHERE id=?";
    $result = query($sql, [$category_id]);

    if($result->rowCount() > 0){
        redirect('index.php?p=danh-sach-danh-muc&msg=Xoá danh mục thành công');

        $sql = "UPDATE products SET category_id=0 WHERE category_id=?";
        query($sql, [$category_id]);

    }
}else {
    redirect('index.php?p=danh-sach-danh-muc');
}