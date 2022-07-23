<?php
$limit = 10;
$curr_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($curr_page - 1) * $limit;

if(isset($_POST['search_color']) || isset($_GET['keyword'])){
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : $_POST['keyword'];
}
// select
if(isset($keyword)){
    $sql = "SELECT * FROM colors WHERE name LIKE '%".$keyword."%' LIMIT $limit OFFSET $offset";
    $color_count = query("SELECT * FROM colors WHERE name LIKE '%".$keyword."%'")->rowCount();
}else {
    $sql = "SELECT * FROM colors LIMIT $limit OFFSET $offset";
    $color_count = query("SELECT * FROM colors")->rowCount();
}

$colors = query($sql)->fetchAll(PDO::FETCH_ASSOC);
$pages = ceil($color_count / $limit);
// delete
if(!empty($_GET['color_id'])){
    $color_id = $_GET['color_id'];
}

if(!empty($_GET['delete_id'])){
    $delete_id = $_GET['delete_id'];
    $sql = "DELETE FROM colors WHERE id=?";

    $result = query($sql,[$delete_id]);

    if($result->rowCount() > 0){
        redirect('index.php?p='.$_GET['p'].'&page='.$curr_page);
    }
}
// edit
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_color'])){
    $error_edit = '';
    $color = validateInput($_POST['color']);

    if(empty($color)){
        $error_edit = 'Tên màu không được để trống';
    }

    if(empty($error_edit)){
        $sql = "UPDATE colors SET name=? WHERE id=?";
        $result = query($sql,[$color,$color_id]);

        if($result->rowCount() > 0){
            redirect('index.php?p='.$_GET['p'].'&page='.$curr_page);
        }
    }
}
// add
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_color'])){
    $error_add = '';
    $color = validateInput($_POST['color']);

    if(empty($color)){
        $error_add = 'Tên màu không được để trống';
    }

    if(empty($error_add)){
        $sql = "INSERT INTO colors(name) VALUES (?)";
        $result = query($sql,[$color]);

        if($result->rowCount() > 0){
            redirect('index.php?p='.$_GET['p']);
        }
    }
}