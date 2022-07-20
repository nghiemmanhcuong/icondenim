<?php
if(isset($_GET['t'])){
    if($_GET['t'] != 'quen-mat-khau' || !isset($_SESSION['user_email'])) {
        redirect('index.php');
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $errors = array();

    if(!isset($_GET['t'])){
        $email = validateInput($_POST['email']);
        $old_password = validateInput($_POST['old_password']);
    }
    $new_password = validateInput($_POST['new_password']);
    $retype_new_password = validateInput($_POST['retype_new_password']);

    if(empty($email)){
        $errors['email'] = 'Vui lòng nhập email của bạn';
    }else {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Email không hợp lệ';
        }
    }

    if(empty($old_password)){
        $errors['old_password'] = 'Vui lòng nhập mật khẩu cũ';
    }

    if(empty($new_password)){
        $errors['new_password'] = 'Vui lòng nhập mật khẩu mới';
    }

    if(empty($retype_new_password)){
        $errors['retype_new_password'] = 'Vui lòng nhập lại mật khẩu mới';
    }else {
        if($new_password != $retype_new_password){
            $errors['retype_new_password'] = 'Mật khẩu không khớp';
        }
    }

    if(isset($_GET['t'])){
        if($_GET['t'] == 'quen-mat-khau' && empty($errors['new_password']) && empty($errors['retype_new_password'])){
            $user_email = $_SESSION['user_email'];
            $new_password = password_hash($new_password,PASSWORD_BCRYPT,array('cost'=>11));
            $sql = "UPDATE users SET password=? WHERE email=?";
            $result = query($sql,[$new_password,$user_email])->rowCount();
            if($result > 0){
                unset($_SESSION['user_email']);
                redirect('index.php?msg=Đổi mật khẩu thành công');
            }
        }
    }else {
        if(empty($errors)){
            $sql = "SELECT password FROM users WHERE email=?";
            $user = query($sql,[$email])->fetch(PDO::FETCH_ASSOC);
            if($user) {
                if(password_verify($old_password,$user['password'])){
                    $new_password = password_hash($new_password,PASSWORD_BCRYPT,array('cost'=>11));

                    $sql = "UPDATE users SET password=? WHERE email=?";
                    $result = query($sql,[$new_password,$email])->rowCount();
                    if($result > 0){
                        redirect('index.php?p=doi-mat-khau&msg=Đổi mật khẩu thành công');
                    }else {
                        $error = 'Email hoặc mật khẩu không chính xác';
                    }

                }else {
                    $error = 'Email hoặc mật khẩu không chính xác';
                }
            }else {
                $error = 'Email hoặc mật khẩu không chính xác';
            }
        }
    }
}