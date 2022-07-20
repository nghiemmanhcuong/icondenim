<?php

if(isset($_GET["p"])){
    $page = $_GET["p"];
}else {
    $page = 'dang-nhap';
}

switch($page){
    case 'dang-nhap':
        require_once('models/auth/login.php');
        include_once('views/auth/login.php');
        break;
    case 'quen-mat-khau':
        include_once('models/auth/forgot_password.php');
        include_once('views/auth/forgot_password.php');
        break;
    case 'doi-mat-khau':
        include_once('models/auth/change_password.php');
        include_once('views/auth/change_password.php');
        break;
    case 'xac-thuc':
        include_once('models/auth/validate_code.php');
        include_once('views/auth/validate_code.php');
        break;
}