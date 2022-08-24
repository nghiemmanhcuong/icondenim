<?php
session_start();
require_once('../core/db_conn.php');
require_once('../core/functions.php');

date_default_timezone_set('Asia/Ho_Chi_Minh');

// todo: Lấy ra dường dẫn chính của web site
const DIR_ROOT = __DIR__;
if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on'){
    $web_root = 'https://'.$_SERVER['HTTP_HOST'];
}else {
    $web_root = 'http://'.$_SERVER['HTTP_HOST'];
}
$folder = str_replace($_SERVER['DOCUMENT_ROOT'],'',DIR_ROOT);
define('WEB_ROOT',$web_root.$folder);
define('CLIENT_LINK',str_replace('admin','',WEB_ROOT));

// todo: require File index của controller
require_once('./controllers/index.php');