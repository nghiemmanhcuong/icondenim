<?php
$limit = 7;
$curr_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($curr_page - 1) * $limit;

$sql = "SELECT * FROM categories WHERE parent_id=? LIMIT $limit OFFSET $offset";
$category_group = query($sql,[0])->fetchAll(PDO::FETCH_ASSOC);

$category_group_count = query("SELECT * FROM categories WHERE parent_id=0")->rowCount();
$pages = ceil($category_group_count / $limit);
