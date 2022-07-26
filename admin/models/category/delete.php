<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $category_id = $_POST['category_id'];
    $sql = "DELETE FROM categories WHERE id=?";
    $result = query($sql, [$category_id]);

    if($result->rowCount() > 0){
        redirect('index.php?p=danh-sach-danh-muc&msg=Xoá danh mục thành công');

        $sql = "SELECT id FROM products WHERE category_id=?"
        $id_arr = query($sql, [$category_id])->fetchAll(PDO::FETCH_ASSOC);

        foreach ($id_arr as $item['id']) {
            $sql = "DELETE FROM product_warehouse WHERE product_id=?";
            query($sql,[$item['id']]);

            $sql = "DELETE FROM product_images WHERE product_id=?";
            query($sql,[$item['id']]);
        }
    }
}else {
    redirect('index.php?p=danh-sach-danh-muc');
}