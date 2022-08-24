<?php
if(!isset($slug)){
    header('Location:'.WEB_ROOT);
}

$sql = "SELECT * FROM blogs WHERE slug=?";
$stmt = query($sql,[$slug]);

// random blog
$sql = "SELECT * FROM blogs ORDER BY RAND() LIMIT 6";
$blog_random = query($sql)->fetchAll(PDO::FETCH_ASSOC);

if($stmt->rowCount() > 0){
    $blog = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $sql = "SELECT name,slug FROM blog_categories WHERE id=?";
    $blog_category = query($sql,[$blog['category_id']])->fetch(PDO::FETCH_ASSOC);

    $web_title = $blog['title'];
}else {
    header('Location:'.WEB_ROOT);
}