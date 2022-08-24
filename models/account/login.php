<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $errors = array();

    $email = validateInput($_POST['email']);
    $password = validateInput($_POST['password']);

    if(empty($email)){
        $errors['email'] = 'Email không được để trống';
    }else {
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Email không hợp lệ';
        }
    }

    if(empty($password)){
        $errors['password'] = 'Mật khẩu không được để trống';
    }

    if(empty($errors)){
        $sql = "SELECT id,password FROM users WHERE email=?";
        $user = query($sql,[$email])->fetch(PDO::FETCH_ASSOC);

        if(!empty($user)){
            if(password_verify($password,$user['password'])){
                setcookie("user_id",$user['id'],time() + 24*60*60,'/');
                header('Location: '.WEB_ROOT);
            }else {
                $errors['password'] = 'Email hoặc mật khẩu không chính xác';
            }
        }else {
            $errors['password'] = 'Email hoặc mật khẩu không chính xác';
        }
    }
}