<?php

if($_SESSION['user']['access'] != 'admin'){
    redirect('index.php?p=404');
}else {
    $curr_user_email = $_SESSION['user']['email'];
}

$limit = 10;
$curr_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($curr_page - 1) * $limit;

if(isset($_GET['field']) && isset($_GET['sort'])){
    $field = $_GET['field'];
    $sort = $_GET['sort'];
}

if(isset($_POST['keyword']) || isset($_GET['keyword'])){
    $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : $_GET['keyword'];
    $sql = "SELECT id,name,email,address,phone,access,avatar FROM users 
            WHERE (name LIKE '%".$keyword."%' OR email LIKE '%".$keyword."%') AND NOT access=? AND NOT email=?
            LIMIT $limit OFFSET $offset";
    
    if(isset($field) && isset($sort)){
        $sql = "SELECT id,name,email,address,phone,access,avatar FROM users 
                WHERE (name LIKE '%".$keyword."%' OR email LIKE '%".$keyword."%') AND NOT access=? AND NOT email=?
                ORDER BY `users`.`".$field."` $sort LIMIT $limit OFFSET $offset";
    }

    $user_count = query("SELECT id FROM users 
                        WHERE (name LIKE '%".$keyword."%' OR email LIKE '%".$keyword."%') 
                        AND NOT access=? AND NOT email=?",['admin',$curr_user_email])->rowCount();
}else {
    $sql = "SELECT id,name,email,address,phone,access,avatar FROM users 
            WHERE NOT access=? AND NOT email=?
            LIMIT $limit OFFSET $offset";

    if(isset($field) && isset($sort)){
        $sql = "SELECT id,name,email,address,phone,access,avatar FROM users WHERE NOT access=? AND NOT email=?
                ORDER BY `users`.`".$field."` $sort LIMIT $limit OFFSET $offset";
    }

    $user_count = query("SELECT id FROM users WHERE NOT access=? AND NOT email=?",['admin',$curr_user_email])->rowCount();
}

$users = query($sql,['admin',$curr_user_email])->fetchAll(PDO::FETCH_ASSOC);
$pages = ceil($user_count / $limit);