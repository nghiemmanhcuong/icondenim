<?php
$sql = "SELECT * FROM categories WHERE parent_id=?";
$category_group = query($sql,[0])->fetchAll(PDO::FETCH_ASSOC);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $errors = array();

    $name = validateInput($_POST['name']);
    $group = validateInput($_POST['group']);
    $popular = validateInput($_POST['popular']);
    $trent = validateInput($_POST['trent']);

    if(empty($name)){
        $errors['name'] = 'Vui Lòng nhập tên danh mục';
    }

    if(empty($group)){
        $errors['group'] = 'Vui Lòng nhập nhóm danh mục';
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
        if(isset($image)) {
            $sql = "INSERT INTO categories(name, parent_id,slug,is_popular,is_trent,image) VALUES (?,?,?,?,?,?)";
            $result = query($sql,[$name,$group,$slug,$popular,$trent,$image])->rowCount(); 
        }else {
            $sql = "INSERT INTO categories(name, parent_id,slug,is_popular) VALUES (?,?,?,?)";
            $result = query($sql,[$name,$group,$slug,$popular])->rowCount(); 
        }
        if($result > 0){
            redirect('index.php?p=them-danh-muc&msg=Thêm danh mục thành công');
        }
    }
}