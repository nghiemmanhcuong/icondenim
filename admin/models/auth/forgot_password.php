<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $error = '';
    $email = validateInput($_POST['email']);

    if(empty($email)){
        $error = 'Vui lòng nhập email';
    }

    if(empty($error)){
        $sql = "SELECT email FROM users WHERE email=?";
        $user = query($sql,[$email])->fetch(PDO::FETCH_ASSOC);
        if($user) {
            $code = sha1(uniqid());
            $content = 'Mã xác thực của bạn là: ' . $code;
            setcookie('code', $code,time() + 90);
            $_SESSION['user_email'] = $user['email'];
            require_once('core/email/sendmail.php');
            redirect('index.php?p=xac-thuc');
        }else {
            $error = 'Không tìm thấy email';
        }
    }
}