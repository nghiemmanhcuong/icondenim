<?php
if(!isset($_SESSION['user_email'])){
    redirect('index.php?p=404');
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $error = '';
    $code = validateInput($_POST['code']);
    if(empty($code)) {
        $error = 'Vui lòng nhâp mã xác thực';
    }

    if(empty($error)) {
        if(isset($_COOKIE['code'])){
            $real_code = $_COOKIE['code'];
            if(!empty($real_code) && $real_code == $code) {
                setcookie('code', $code,time() - 90);
                redirect('index.php?p=doi-mat-khau&t=quen-mat-khau');
            }else {
                $error = 'Mã xác thực không chính xác';
            }
        }else {
            $error = 'Mã xác thực không chính xác';
        }
    }
}