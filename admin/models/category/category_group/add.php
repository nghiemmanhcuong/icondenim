<?php
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
        if($popular == 1 || $trent == 1){
            $errors['image'] = 'Danh mục nổi bật phải có ảnh';
        }
    }

    if(empty($errors)){
        $slug = toSlug($name);
        if(isset($image)){
            $sql = "INSERT INTO categories (name,slug,is_popular,is_trent,image) VALUES(?,?,?,?,?)";
            $result = query($sql,[$name,$slug,$popular,$trent,$image]);
        }else {
            $sql = "INSERT INTO categories (name,slug) VALUES(?,?)";
            $result = query($sql,[$name,$slug]);
        }

        if($result->rowCount() > 0){
            redirect('index.php?p=them-nhom-san-pham&msg=Thêm nhóm sản phẩm thành công');
        }
    }
}