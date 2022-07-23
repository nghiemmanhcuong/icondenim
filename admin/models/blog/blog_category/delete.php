<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $blog_category_id = $_POST['blog_category_id'];
    $sql = "DELETE FROM blog_categories WHERE id=?";
    $result = query($sql, [$blog_category_id]);
    
    if($result->rowCount() > 0){
        redirect('index.php?p=danh-muc-bai-viet&msg=Xoá danh mục bài biết thành công');
    }
}else {
    redirect('index.php?p=danh-muc-bai-viet');
}