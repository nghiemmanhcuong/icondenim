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
    $sql = "SELECT * FROM orders WHERE customer_name LIKE '%".$keyword."%' OR customer_phone LIKE '%".$keyword."%'
            ORDER BY id DESC LIMIT $limit OFFSET $offset";

    if(isset($field) && isset($sort)){
        $sql = "SELECT * FROM orders WHERE customer_name LIKE '%".$keyword."%' OR customer_phone LIKE '%".$keyword."%'
                ORDER BY `orders`.`".$field."` $sort LIMIT $limit OFFSET $offset";
    }
}else {
    $sql = "SELECT * FROM orders ORDER BY id DESC LIMIT $limit OFFSET $offset";

    if(isset($field) && isset($sort)){
        $sql = "SELECT * FROM orders ORDER BY `orders`.`".$field."` $sort 
                LIMIT $limit OFFSET $offset";
    }
}

$stmt = query($sql);

$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

$order_count = $stmt->rowCount();
$pages = ceil($order_count / $limit);