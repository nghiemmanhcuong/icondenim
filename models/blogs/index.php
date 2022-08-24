<?php
if(!isset($slug)){
    $slug = 'all';
}

// pagination
$limit = 6;
$curr_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($curr_page - 1) * $limit;

// get new blog
$sql = "SELECT * FROM blogs ORDER BY id DESC LIMIT 10";
$new_blogs = query($sql)->fetchAll(PDO::FETCH_ASSOC);

//  get blog
if($slug == 'all'){
    
    $sql = "SELECT * FROM blogs ORDER BY title DESC LIMIT $limit OFFSET $offset";
    $all_blog = query($sql)->fetchAll(PDO::FETCH_ASSOC);

    $blog_count = query("SELECT * FROM blogs")->rowCount();
    $pages = ceil($blog_count / $limit);

    $web_title = "Tất cả bài viết";
}else {

    $sql = "SELECT id,name FROM blog_categories WHERE slug=?";
    $blog_category = query($sql,[$slug])->fetch(PDO::FETCH_ASSOC);

    if(!empty($blog_category)){
        $blog_category_id = $blog_category['id'];
        $sql = "SELECT * FROM blogs WHERE category_id=? LIMIT $limit OFFSET $offset";
        $all_blog = query($sql,[$blog_category_id])->fetchAll(PDO::FETCH_ASSOC);   
        
        $blog_count = query("SELECT * FROM blogs WHERE category_id=$blog_category_id")->rowCount();
        $pages = ceil($blog_count / $limit);

        $web_title = $blog_category['name'];
    }

}