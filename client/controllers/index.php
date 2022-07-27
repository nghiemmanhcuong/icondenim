<?php
if(isset($_SERVER['PATH_INFO'])){
    $url_arr = explode("/", $_SERVER['PATH_INFO']);
    $url_arr = array_filter($url_arr);
    $url_arr = array_values($url_arr);
    
    $folder = $url_arr[0];
    if(isset($url_arr[1])) {
        $detail = $url_arr[1];
    }else {
        $detail = '';
    }
}else {
    $folder = '';
    $detail = '';
}

switch ($folder) {
    
    default:
        include_once('views/errors/404.php');
        break;
}