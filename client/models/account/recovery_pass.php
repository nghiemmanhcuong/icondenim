<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $error = '';
    $email = validateInput($_POST['email']);

    if(empty($email)){
        $error = 'Email không được để trống';
    }else {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error = 'Email không không hợp lệ';
        }
    }

    if(empty($error)){
        $sql = "SELECT access FROM users WHERE email=?";
        $user = query($sql, [$email])->fetch(PDO::FETCH_ASSOC);

        if(!empty($user)){
            if($user['access'] == 'admin' || $user['access'] == 'saff'){
                $error = 'Không tìm thấy email';
            }else {
                $code = sha1(uniqid());
                setcookie('code',$code,time() + 90, '/');
                $_SESSION['forgot_pass_email'] = $email;
                require_once('core/email/sendmail.php');
                header('Location:'.WEB_ROOT.'/account/check-code');
            }
        }else {
            $error = 'Không tìm thấy email';
        }
    }
}