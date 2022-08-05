<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $slide_id = $_POST['slide_id'];
    $sql = "DELETE FROM slides WHERE id=?";
    $result = query($sql, [$slide_id]);

    if($result->rowCount() > 0){
        redirect('index.php?p=show-slides&msg=Xoá slide thành công');
    }
}else {
    redirect('index.php?p=danh-sach-danh-muc');
}