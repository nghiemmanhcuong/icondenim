<?php
session_start();
require_once('../core/db_conn.php');
require_once('../core/functions.php');

date_default_timezone_set('Asia/Ho_Chi_Minh');

if(isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
    $sql = "SELECT id,name,access,email,phone,account_type,accumulated_points,avatar
            FROM users WHERE id=?";
    $curr_user_login = query($sql,[$user_id])->fetch(PDO::FETCH_ASSOC);

    $_SESSION['user_client'] = $curr_user_login;
}

const DIR_ROOT = __DIR__;
if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on'){
    $web_root = 'https://'.$_SERVER['HTTP_HOST'];
}else {
    $web_root = 'http://'.$_SERVER['HTTP_HOST'];
}
$folder = str_replace($_SERVER['DOCUMENT_ROOT'],'',DIR_ROOT);
define('WEB_ROOT',$web_root.$folder);
define('IMG_ROOT',str_replace('client','uploads/',WEB_ROOT));
define('SERVER_ROOT',str_replace('client','admin',WEB_ROOT));

require_once('controllers/index.php');

?>

