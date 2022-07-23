<?php
$limit = 10;
$curr_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($curr_page - 1) * $limit;

$sql = "SELECT * FROM sizes ORDER BY id LIMIT $limit OFFSET $offset";
$sizes = query($sql)->fetchAll(PDO::FETCH_ASSOC);

$sizes_count = query("SELECT * FROM sizes")->rowCount();
$pages = ceil($sizes_count / $limit);

if(!empty($_GET['size_id'])){
    $size_id = $_GET['size_id'];
}
// delete
if(!empty($_GET['delete_id'])){
    $delete_id = $_GET['delete_id'];
    $sql = "DELETE FROM sizes WHERE id=?";

    $result = query($sql,[$delete_id]);

    if($result->rowCount() > 0){
        redirect('index.php?p='.$_GET['p'].'&page='.$curr_page);
    }
}
// edit
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_size'])){
    $error_edit = '';
    $size = validateInput($_POST['size']);

    if(empty($size)){
        $error_edit = 'Tên màu không được để trống';
    }

    if(empty($error_edit)){
        $sql = "UPDATE sizes SET name=? WHERE id=?";
        $result = query($sql,[$size,$size_id]);

        if($result->rowCount() > 0){
            redirect('index.php?p='.$_GET['p'].'&page='.$curr_page);
        }
    }
}
// add
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_size'])){
    $error_add = '';
    $size = validateInput($_POST['size']);

    if(empty($size)){
        $error_add = 'Tên màu không được để trống';
    }

    if(empty($error_add)){
        $sql = "INSERT INTO sizes(name) VALUES (?)";
        $result = query($sql,[$size]);

        if($result->rowCount() > 0){
            redirect('index.php?p='.$_GET['p'].'&page='.$curr_page);
        }
    }
}