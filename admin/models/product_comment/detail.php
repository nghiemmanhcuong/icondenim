<?php

if(isset($_GET['product_id']) && !empty($_GET['product_id'])){
    $product_id = $_GET['product_id'];

    $sql = "SELECT name FROM products WHERE id=?";
    $product = query($sql,[$product_id])->fetch(PDO::FETCH_ASSOC);

    $limit = 10;
    $curr_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($curr_page - 1) * $limit;

    $sql = "SELECT * FROM product_reviews WHERE product_id=? LIMIT $limit OFFSET $offset";
    $product_reviews = query($sql,[$product_id])->fetchAll(PDO::FETCH_ASSOC);

    $product_review_count = query("SELECT * FROM product_reviews WHERE product_id=$product_id")->rowCount();
    $pages = ceil($product_review_count / $limit);
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $choose_rows = $_POST['chooseRows'];
    $sql = "UPDATE product_reviews SET status = 1 WHERE id=?";

    foreach ($choose_rows as $id) {
        query($sql,[$id]);
    }

    redirect('index.php?p=tat-ca-binh-luan&product_id='.$product_id);
}