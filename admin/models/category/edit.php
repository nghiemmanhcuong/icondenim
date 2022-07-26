<?php
$sql = "SELECT * FROM categories WHERE parent_id=?";
$category_group = query($sql,[0])->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET['id'])){
    $category_id = $_GET['id'];
    $sql = "SELECT * FROM categories WHERE id=?";
    $category = query($sql,[$category_id])->fetch(PDO::FETCH_ASSOC);
}else {
    redirect('index.php?p=danh-sach-danh-muc');
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $errors = array();

    $name = validateInput($_POST['name']);
    $group = validateInput($_POST['group']);
    $popular = validateInput($_POST['popular']);
    $trent = validateInput($_POST['trent']);
    $id = validateInput($_POST['id']);

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
        if(isset($_POST['img'])){
            $image = $_POST['img'];
        }
        if($popular == 1 || $trent == 1) {
            $errors['image'] = 'Danh mục nổi bật phải có ảnh';
        }
    }

    if(empty($errors)){
        $slug = toSlug($name);
        $id = $_POST['id'];

        if(isset($image)){
            $sql = "UPDATE categories SET name=?, parent_id=?, slug=?, is_popular=?,is_trent=?,image=? WHERE id=?";
            $result = query($sql,[$name,$group,$slug,$popular,$trent,$image,$id]);
        }else {
            $sql = "UPDATE categories SET name=?, parent_id=?, slug=? WHERE id=?";
            $result = query($sql,[$name,$group,$slug,$id]);
        }
        
        if($result->rowCount() > 0){
            redirect('index.php?p=danh-sach-danh-muc&msg=Sửa danh mục thành công');
        }
    }
}