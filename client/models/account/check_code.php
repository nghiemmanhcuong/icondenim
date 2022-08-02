<?php

if(!isset($_COOKIE['code'])) {
    header('Location:'.WEB_ROOT.'/account/khoi-phuc-tai-khoan');
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $error = '';
    $code = validateInput($_POST['code']);

    if(empty($code)){
        $error = 'Nhập mã bảo mật';
    }

    if(empty($error)){
        $security_code = $_COOKIE['code'];
        if($security_code == $code){
            header('Location:'.WEB_ROOT.'/account/doi-mat-khau');
        }else {
            $error = 'Mã bảo mật không chính xác';
        }
        
    }
}