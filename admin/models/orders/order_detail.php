<?php
if(empty($_GET['order_id'])){
    header('Location: ?p=don-hang');
}else {
    $order_id = $_GET['order_id'];
}

function getColor($color_id) {
    $sql = "SELECT name FROM colors WHERE id=?";
    $color = query($sql,[$color_id])->fetch(PDO::FETCH_ASSOC);

    return $color['name'];
}

function getSize($size_id) {
    $sql = "SELECT name FROM sizes WHERE id=?";
    $size = query($sql,[$size_id])->fetch(PDO::FETCH_ASSOC);

    return $size['name'];
}

function getProduct($product_id) {
    $sql = "SELECT name,price,image FROM products WHERE id=?";
    $product = query($sql,[$product_id])->fetch(PDO::FETCH_ASSOC);

    return $product;
}

$sql = "SELECT * FROM orders WHERE id=?";
$order = query($sql,[$order_id])->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM order_detail WHERE order_id=?";
$order_detail_product = query($sql,[$order_id])->fetchAll(PDO::FETCH_ASSOC);

$product_list = array();
foreach ($order_detail_product as $item) {
    $product = getProduct($item['product_id']);
    $color = getColor($item['color_id']);
    $size = getSize($item['size_id']);

    $product_item = [
        'color'=>$color,
        'size'=>$size,
        'name'=>$product['name'],
        'price'=>$product['price'],
        'image'=>$product['image'],
        'quantity'=>$item['quantity'],
    ];
    
    $product_list[] = $product_item;
}

$last_price = $order['total_price'] + $order['transport_fee'];

if($order['discount'] > 0) {
    $discount = ($order['total_price'] * $order['discount']) / 100;
    $last_price = $last_price - $discount;
}