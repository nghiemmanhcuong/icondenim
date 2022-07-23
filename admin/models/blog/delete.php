<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $blog_id = $_POST['blog_id'];
    $sql = "DELETE FROM blogs WHERE id=?";
    $result = query($sql, [$blog_id]);
    
    if($result->rowCount() > 0){
        redirect('index.php?p=danh-sach-bai-viet&msg=Xoá bài biết thành công');
    }
}else {
    redirect('index.php?p=danh-sach-bai-viet');
}