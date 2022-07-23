<?php
$sql = "SELECT * FROM blog_categories";
$blog_categories = query($sql)->fetchAll(PDO::FETCH_ASSOC);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $errors = array();

    $title = validateInput($_POST['title']);
    $author = validateInput($_POST['author']);
    $category = validateInput($_POST['category']);
    $description = validateInput($_POST['description']);
    $content = validateInput($_POST['content']);

    if(empty($title)){
        $errors['title'] = 'Vui lòng nhập tiêu đề bài viết';
    }else {
        if(mb_strlen($title,'UTF-8') > 100){
            $errors['title'] = 'Tiêu đề bài viết không được quá 100 ký tự';
        }
    }

    if(empty($author)){
        $errors['author'] = 'Vui lòng nhập tác giả bài viết';
    }else {
        if(mb_strlen($author,'UTF-8') > 30){
            $errors['author'] = 'Tiêu đề bài viết không được quá 30 ký tự';
        }
    }

    if(empty($category)){
        $errors['category'] = 'Vui lòng nhập danh mục bài viết';
    }

    if(empty($description)){
        $errors['description'] = 'Vui lòng nhập mô tả bài viết';
    }else {
        if(mb_strlen($description,'UTF-8') > 500){
            $errors['description'] = 'Tiêu đề bài viết không được quá 500 ký tự';
        }
    }

    if(empty($content)){
        $errors['content'] = 'Vui lòng nhập nội dung bài viết';
    }

    if($_FILES['image']['size'] > 0){
        $result = handleUpload($_FILES['image']);

        if(!empty($result['error'])){
            $errors['image'] = $result['error'];
        }else {
            $image = $result['file'];
        }
    }else {
        $errors['image'] = 'Vui lòng nhập ảnh bài viết';
    }

    if(empty($errors)){
        $slug = toSlug($title);

        $sql = "INSERT INTO blogs(category_id,title,description,content,image,author,slug) VALUES(?,?,?,?,?,?,?)";
        $result = query($sql,[
            $category,
            $title,
            $description,
            $content,
            $image,
            $author,
            $slug
        ]);

        if($result->rowCount() > 0){
            $success = 'Thêm bài viết thành công';
        }
    }
}