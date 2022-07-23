<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $error = '';
    $name = validateInput($_POST['name']);

    if(empty($name)){
        $error = 'Nhập tên danh mục';
    }

    if(empty($error)){
        $slug = toSlug($_POST['name']);
        $sql = "INSERT INTO blog_categories(name,slug) VALUES(?,?)";
        $result = query($sql,[$name,$slug]);

        if($result->rowCount() > 0){
            redirect('?p=danh-muc-bai-viet&msg=Thêm danh mục bài viết thành công');
        }
    }
}