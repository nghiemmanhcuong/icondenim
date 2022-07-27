<?php
session_start();
require_once('../core/db_conn.php');
require_once('../core/functions.php');

date_default_timezone_set('Asia/Ho_Chi_Minh');

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

require_once('controller/index.php');

?>