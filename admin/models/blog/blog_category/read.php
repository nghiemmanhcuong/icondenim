<?php

$sql = "SELECT * FROM blog_categories";
$blog_categories = query($sql)->fetchAll(PDO::FETCH_ASSOC);
