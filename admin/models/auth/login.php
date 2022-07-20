<?php
if(isset($_COOKIE['user_admin_id'])) {
    redirect('index.php?p=trang-chu');
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $errors = array();

    if(function_exists('validateInput')){
        $email = validateInput($_POST['email']);
        $password = validateInput($_POST['password']);
    }

    if(empty($email)){
        $errors['email'] = 'Vui lòng nhập email của bạn';
    }else {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Email không hợp lệ';
        }
    }

    if(empty($password)){
        $errors['password'] = 'Vui lòng nhập mật khẩu của bạn';
    }

    if(empty($errors)){
        
        $sql = "SELECT id,name,email,access,avatar,address,phone,password FROM users WHERE email=?";
        $user = query($sql,[$email])->fetch(PDO::FETCH_ASSOC);
        if($user){
            if(password_verify($password,$user['password'])) {
                if($user['access'] == 'admin' || $user['access'] == 'saff'){
                    setcookie('user_admin_id',$user['id'],time() + 60*60*24,'/');
                    redirect('index.php?p=trang-chu');
                }else {
                    $errors['password'] = 'Email hoặc mật khẩu không chính xác';
                }
            }else {
                $errors['password'] = 'Email hoặc mật khẩu không chính xác';
            }
        }else {
            $errors['password'] = 'Email hoặc mật khẩu không chính xác';
        }
    }
}