<?php

if(isset($_GET['id'])){
    $category_group_id = $_GET['id'];
    $sql = "SELECT * FROM categories WHERE id=?";
    $category_group = query($sql,[$category_group_id])->fetch(PDO::FETCH_ASSOC);
}else {
    redirect('index.php?p=nhom-san-pham');
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $errors = array();

    $name = validateInput($_POST['name']);
    $popular = validateInput($_POST['popular']);
    $trent = validateInput($_POST['trent']);

    if(empty($name)){
        $errors['name'] = 'Vui lòng nhập tên nhóm sản phẩm mới';
    }

    if($_FILES['image']['size'] > 0){
        $result = handleUpload($_FILES['image']);
        if(!empty($result['error'])){
            $errors['image'] = $result['error'];
        }else {
            $image = $result['file'];
        }
    }else {
        if(isset($_POST['img'])){
            $image = $_POST['img'];
        }

        if($popular == 1){
            $errors['image'] = 'Danh mục nổi bật phải có ảnh';
        }
    }

    if($popular == 0 && !empty($_POST['img'])){
        $image = '';
    }

    if(empty($errors)){
        $slug = toSlug($name);
        $id = $_POST['id'];
        if(!empty($image)){
            $sql = "UPDATE categories SET name=?,slug=?,is_popular=?,is_trent=?,image=? WHERE id=?";
            $result = query($sql,[$name,$slug,$popular,$trent,$image,$id]);
        }else {
            $sql = "UPDATE categories SET name=?,slug=? WHERE id=?";
            $result = query($sql,[$name,$slug,$id]);
        }
        
        if($result->rowCount() > 0){
            redirect('index.php?p=nhom-san-pham&msg=Sửa nhóm sản phẩm thành công');
        }
    }
}