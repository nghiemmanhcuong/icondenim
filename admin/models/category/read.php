<?php
$limit = 8;
$curr_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($curr_page - 1) * $limit;

$sql = "SELECT * FROM categories WHERE NOT parent_id=? LIMIT $limit OFFSET $offset";
$categories = query($sql,[0])->fetchAll(PDO::FETCH_ASSOC);

$category_count = query("SELECT * FROM categories WHERE NOT parent_id=0")->rowCount();
$pages = ceil($category_count / $limit);
