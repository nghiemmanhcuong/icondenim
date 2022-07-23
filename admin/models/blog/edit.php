<?php
if(!empty($_GET['blog_id'])){
    $blog_id = $_GET['blog_id'];
    $sql = "SELECT * FROM blogs WHERE id=?";
    $blog = query($sql, [$blog_id])->fetch(PDO::FETCH_ASSOC);

    $sql = "SELECT * FROM blog_categories";
    $blog_categories = query($sql)->fetchAll(PDO::FETCH_ASSOC);
}else {
    redirect('index.php?p=danh-sach-bai-viet');
}

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
        $image = validateInput($_POST['img']);
    }

    if(empty($errors)){
        $blog_id = validateInput($_POST['id']);
        $slug = toSlug($title);

        $sql = "UPDATE blogs SET category_id=?,title=?,description=?,content=?,image=?,author=?,slug=? WHERE id=?";
        $result = query($sql,[
            $category,
            $title,
            $description,
            $content,
            $image,
            $author,
            $slug,
            $blog_id
        ]);

        if($result->rowCount() > 0){
            redirect('index.php?p=danh-sach-bai-viet&msg=Sửa bài viết thành công');
        }
    }
}