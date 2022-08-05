<?php
$limit = 8;
$curr_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($curr_page - 1) * $limit;

$sql = "SELECT * FROM slides limit $limit offset $offset ";
$slides = query($sql)->fetchAll(PDO::FETCH_ASSOC);

$slides_count = query("SELECT * FROM slides")->rowCount();
$pages = ceil($slides_count / $limit);