<?php

if(empty($_GET['keyword'])){
    $sql = "SELECT * FROM products ORDER BY sold DESC LIMIT 12";
    $selling_product = query($sql)->fetchAll(PDO::FETCH_ASSOC);
    $web_title = 'Not Keyword';
}else {
    $keyword = $_GET['keyword'];
    $web_title = 'Tìm kiếm '.$keyword;
}

// get sizes
$sql = "SELECT * FROM sizes";
$sizes = query($sql)->fetchAll(PDO::FETCH_ASSOC);

// get colors
$sql = "SELECT * FROM colors";
$colors = query($sql)->fetchAll(PDO::FETCH_ASSOC);

// filter color and size
if(isset($_GET['size']) || isset($_GET['color'])) {
    if(isset($_GET['color']) && isset($_GET['size'])){
        $sql_filter = getSqlFilterSizeColor($_GET['size'], $_GET['color']);
    }else if(isset($_GET['color'])) {
        $sql_filter = getSqlFilterSizeColor(null,$_GET['color']);
    }else if(isset($_GET['size'])) {
        $sql_filter = getSqlFilterSizeColor($_GET['size']);
    }   
}

// pagination
$limit = 16;
$curr_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($curr_page - 1) * $limit;

//  get product by keyword
if(isset($keyword)){

    if(isset($sql_filter)){ 
        $sql = "SELECT * FROM products WHERE name LIKE '%".$keyword."%' 
                AND id IN ($sql_filter) ORDER BY ID DESC LIMIT $limit OFFSET $offset";

        $total_product = query("SELECT * FROM products WHERE name LIKE '%".$keyword."%' AND id IN ($sql_filter)")->rowCount();
    }else {
        $sql = "SELECT * FROM products WHERE name LIKE '%".$keyword."%' 
                ORDER BY ID DESC LIMIT $limit OFFSET $offset";

        $total_product = query("SELECT * FROM products WHERE name LIKE '%".$keyword."%'")->rowCount();
    }
    $products = query($sql)->fetchAll(PDO::FETCH_ASSOC);
    
    // if empty products get selling product
    if(!empty($products)){
        $product_display = $limit;
        if($product_display > $total_product) {
            $product_display = $total_product;
        }

        $pages = ceil($total_product / $limit);
    }else {
        $sql = "SELECT * FROM products ORDER BY sold DESC LIMIT 12";
        $selling_product = query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}