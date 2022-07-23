<?php
$limit = 6;
$curr_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($curr_page - 1) * $limit;
$sql = "SELECT * FROM club LIMIT $limit OFFSET $offset";
$images = query($sql)->fetchAll(PDO::FETCH_ASSOC);

$image_count = query("SELECT * FROM club")->rowCount();
$pages = ceil($image_count / $limit);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $error = '';

    if($_FILES['image']['size'] > 0){
        $result = handleUpload($_FILES['image']);
        if(!empty($result['error'])){
            $error = $result['error'];
        }else {
            $image = $result['file'];
        }
    }else {
        $error = 'Chọn ảnh';
    }

    if(empty($error)) {
        $sql = "INSERT INTO club(image) VALUES(?)";
        $result = query($sql,[$image]);

        if($result->rowCount() > 0){
            redirect('index.php?p=them-anh-club&msg=Thêm ảnh thành công');
        }
    }
}

if(isset($_GET['delete_id'])){
    $delete_id = $_GET['delete_id'];
    $sql = "DELETE FROM club WHERE id=?";
    $result = query($sql,[$delete_id]);

    if($result->rowCount() > 0){
        redirect('index.php?p=them-anh-club&msg=Xoá ảnh thành công');
    }
}