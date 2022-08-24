<?php
if(isset($_GET['product_review_id']) && isset($_GET['product_id'])) {
    $product_comment_id = $_GET['product_review_id'];
    $product_id = $_GET['product_id'];

    $sql = "UPDATE product_reviews SET status=0 WHERE id=?";
    $result = query($sql,[$product_comment_id]);
    if($result->rowCount() > 0) {
        redirect('index.php?p=tat-ca-binh-luan&product_id='.$product_id);
    }
}else {
    redirect('index.php?p=404');
}