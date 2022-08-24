<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $errors = array();
    
    $name = validateInput($_POST['name']);
    $birthday = validateInput($_POST['birthday']);
    $phone = validateInput($_POST['phone']);
    $email = validateInput($_POST['email']);
    $password = validateInput($_POST['password']);
    $sex = validateInput($_POST['sex']);

    if(empty($name)){
        $errors['name'] = 'Tên không được để trống';
    }else {
        if(mb_strlen($name,'utf-8') > 100) {
            $errors['name'] = 'Tên không được quá 100 ký tự';
        }
    }

    if(empty($birthday)){
        $errors['birthday'] = 'Vui lòng nhập ngày tháng năm sinh của bạn';
    }

    if(empty($phone)){
        $errors['phone'] = 'Số điện thoại không được để trống';
    }else {
        $pattern = '/^(0|\+84)+[0-9]{9,10}$/';
        $check = preg_match($pattern,$phone);
        if(!$check){
            $errors['phone'] = 'Số điện thoại không hợp lệ';
        }
    }

    if(empty($email)){
        $errors['email'] = 'Email không được để trống';
    }else {
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Email không hợp lệ';
        }
    }

    if(empty($password)){
        $errors['password'] = 'Mật khẩu không được để trống';
    }else {
        if(mb_strlen($password,'utf-8') < 6) {
            $errors['password'] = 'Mật khẩu phải trên 6 ký tự';
        }
    }

    if(!isset($sex)){
        $errors['sex'] = 'Vui lòng chọn giới tính';
    }

    if($_FILES['avatar']['size'] > 0){
        $result = handleUpload($_FILES['avatar']);
        if(!empty($result['error'])){
            $errors['avatar'] = $result['error'];
        }else {
            $avatar = $result['file'];
        }
    }else {
        $avatar = 'no-image.png';
    }

    if(empty($errors)){
        $sql = "SELECT name FROM users WHERE email=?";
        $result = query($sql,[$email]);
        if($result->rowCount() > 0) {
            $errors['email'] = 'Email đã được sử dụng vui lòng chọn email khác';
        }else {
            global $conn;
            $hash_password = password_hash($password, PASSWORD_BCRYPT, array('cost'=>11));
            $sql = "INSERT INTO users(name,email,password,phone,avatar,birthday,sex) VALUES(?,?,?,?,?,?,?)";
            $result = query($sql,[
                $name,
                $email,
                $hash_password,
                $phone,
                $avatar,
                $birthday,
                $sex,
            ]);

            $user_id = $conn->lastInsertId();

            if($result->rowCount() > 0){
                setcookie("user_id",$user_id,time() + 24*60*60,'/');
                header('Location: '.WEB_ROOT);
            }
        }
    }
}