<?php
// fetch new user
$sql = "SELECT name,email,phone,avatar FROM users WHERE access=? ORDER BY id DESC LIMIT 5";
$users = query($sql,['user'])->fetchAll(PDO::FETCH_ASSOC);

$curr_date = date("Y-m-d H:i:s");
$curr_date_arr = explode(" ",$curr_date);
$curr_date_arr = explode("-",$curr_date_arr[0]);

// fecth to day orders
$limit = 5;
$curr_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($curr_page - 1) * $limit;

$sql = "SELECT id,customer_name,customer_phone,customer_email 
        FROM orders WHERE DAY(created_at)=? AND MONTH(created_at) =? AND YEAR(created_at)=?
        ORDER BY id DESC LIMIT $limit OFFSET $offset";

$orders = query($sql,[$curr_date_arr[2],$curr_date_arr[1],$curr_date_arr[0]])->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT id,customer_name,customer_phone,customer_email 
        FROM orders WHERE DAY(created_at)=? AND MONTH(created_at) =? AND YEAR(created_at)=?";

$order_count = query($sql,[$curr_date_arr[2],$curr_date_arr[1],$curr_date_arr[0]])->rowCount();
$pages = ceil($order_count / $limit);

// 

$sql = "SELECT SUM(total_price) AS total_price
        FROM orders WHERE MONTH(created_at) =?";
$total_price = query($sql,[$curr_date_arr[1]])->fetch(PDO::FETCH_ASSOC);

