<?php
if($_SESSION['user']['access'] != 'admin'){
    redirect('index.php?p=404');
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user_id = $_POST['user_id'];
    $sql = "DELETE FROM users WHERE id=?";
    $result = query($sql,[$user_id]);

    if($result->rowCount() > 0){
        redirect('index.php?p=danh-sach-nguoi-dung&msg=Xoá người dùng thành công');
    }else {
        redirect('index.php?p=danh-sach-nguoi-dung');
    }
}else {
    redirect('index.php?p=danh-sach-nguoi-dung');
}