<?php
if(!isset($_SESSION['forgot_pass_email'])){
    header('Location:'.WEB_ROOT.'/404');
}else {
    $email = $_SESSION['forgot_pass_email'];
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $errors = array();

    $new_password = validateInput($_POST['new_password']);
    $retype_new_password = validateInput($_POST['retype_new_password']);

    if(empty($new_password)){
        $errors['new_password'] = 'Nhập mật khẩu mới';
    }

    if(empty($retype_new_password)){
        $errors['retype_new_password'] = 'Nhập lại mật khẩu mới';
    }else {
        if($retype_new_password != $_POST['new_password']){
            $errors['retype_new_password'] = 'Mật khẩu không khớp';
        }
    }

    if(empty($errors)){
        $hash_new_password = password_hash($new_password,PASSWORD_BCRYPT,array('cost'=>11));
        $sql = "UPDATE users SET password=? WHERE email=?";
        $result = query($sql,[$hash_new_password,$email]);

        if($result->rowCount() > 0){
            unset($_SESSION['forgot_pass_email']);
            header('Location:'.WEB_ROOT.'/account/dang-nhap?msg=Đổi mật khẩu thành công');
        }
    }
}