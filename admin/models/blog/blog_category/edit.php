<?php

if(!empty($_GET['blog_category_id'])){
    $blog_category_id = $_GET['blog_category_id'];
    $sql = "SELECT id,name FROM blog_categories WHERE id=?";
    $blog_category = query($sql,[$blog_category_id])->fetch(PDO::FETCH_ASSOC);
}else {
    redirect('?p=danh-muc-bai-biet');
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $error = '';
    $name = validateInput($_POST['name']);

    if(empty($name)){
        $error = 'Nhập tên danh mục';
    }

    if(empty($error)){
        $slug = toSlug($_POST['name']);
        $blog_category_id = validateInput($_POST['blog_category_id']);
        $sql = "UPDATE blog_categories SET name=?,slug=? WHERE id=?";
        $result = query($sql,[$name,$slug,$blog_category_id]);

        if($result->rowCount() > 0){
            redirect('?p=danh-muc-bai-viet&msg=Sửa danh mục bài viết thành công');
        }
    }
}