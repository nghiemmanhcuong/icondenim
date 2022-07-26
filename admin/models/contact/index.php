<?php

$limit = 10;
$curr_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($curr_page - 1) * $limit;

$sql = "SELECT * FROM contacts ORDER BY id LIMIT $limit OFFSET $offset";
$contacts = query($sql)->fetchAll(PDO::FETCH_ASSOC);

$count_contact = query("SELECT * FROM contacts")->rowCount();
$pages = ceil($count_contact / $limit);