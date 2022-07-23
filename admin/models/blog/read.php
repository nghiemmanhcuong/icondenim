<?php
$limit = 10;
$curr_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($curr_page - 1) * $limit;
$sql = "SELECT * FROM blogs LIMIT $limit OFFSET $offset";
$blogs = query($sql)->fetchAll(PDO::FETCH_ASSOC);

$blog_count = query("SELECT * FROM blogs")->rowCount();
$pages = ceil($blog_count / $limit);