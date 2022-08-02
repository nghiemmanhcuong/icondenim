<?php
// get popular categories
$sql = "SELECT name,slug,image FROM categories WHERE is_popular=?";
$popular_categories = query($sql,[1])->fetchAll();

// get trent categories
$sql = "SELECT name,slug,image FROM categories WHERE is_trent=?";
$trent_categories = query($sql,[1])->fetchAll(PDO::FETCH_ASSOC);

// get new products
$sql = "SELECT * FROM products WHERE is_new=? LIMIT 8";
$new_product = query($sql,[1])->fetchAll(PDO::FETCH_ASSOC);

// get  OUTLET - SALE
$sql = "SELECT id FROM categories WHERE slug=?";
$category_id = query($sql,['outlet-uu-dai-30-70'])->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM products WHERE category_id=? LIMIT 8";
$outlet_sale = query($sql,[$category_id['id']])->fetchAll(PDO::FETCH_ASSOC);

// get popular products
$sql = "SELECT * FROM products WHERE is_popular=?";
$popular_product = query($sql,[1])->fetchAll(PDO::FETCH_ASSOC);

// get blogs
$sql = "SELECT * FROM blogs LIMIT 8";
$blogs = query($sql)->fetchAll(PDO::FETCH_ASSOC);

// get club images
$sql = "SELECT * FROM club";
$club_images = query($sql)->fetchAll(PDO::FETCH_ASSOC);