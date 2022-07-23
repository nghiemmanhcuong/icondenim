<?php
$limit = 10;
$curr_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($curr_page - 1) * $limit;

if(isset($_POST['keyword']) || isset($_GET['keyword'])){
    $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : $_GET['keyword'];
}

if(isset($_GET['field']) && isset($_GET['sort'])){
    $field = $_GET['field'];
    $sort = $_GET['sort'];
}

if(isset($keyword)){
    $sql = "SELECT * FROM products WHERE name LIKE '%".$keyword."%' LIMIT $limit OFFSET $offset";
    if(isset($field) && isset($sort)){
        $sql = "SELECT * FROM products WHERE name LIKE '%".$keyword."%' 
                ORDER BY `products`.`".$field."` $sort  LIMIT $limit OFFSET $offset";
    }
    $product_count = query("SELECT * FROM products WHERE name LIKE '%".$keyword."%'")->rowCount();
}else {
    $sql = "SELECT * FROM products LIMIT $limit OFFSET $offset";
    if(isset($field) && isset($sort)){
        $sql = "SELECT * FROM products ORDER BY `products`.`".$field."` $sort 
                LIMIT $limit OFFSET $offset";
    }
    $product_count = query("SELECT * FROM products")->rowCount();
}
$products = query($sql)->fetchAll(PDO::FETCH_ASSOC);
$pages = ceil($product_count / $limit);