<?php
if($_SESSION['user']['access'] != 'admin'){
    redirect('index.php?p=404');
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $errors = array();

    $name = validateInput($_POST['name']);
    $email = validateInput($_POST['email']);
    $password = validateInput($_POST['password']);
    $address = validateInput($_POST['address']);
    $phone = validateInput($_POST['phone']);
    $access = validateInput($_POST['access']);
    $birthday = validateInput($_POST['birthday']);
    $avatar = 'no-image.png';

    if(empty($name)){
        $errors['name'] = 'Tên không được để trống';
    }

    if(empty($email)){
        $errors['email'] = 'Email không được để trống';
    }else {
        $pattern = '/^[a-z]+[a-z\-_\.0-9]*@[a-z\.]*\.[a-z]{2,}$/';
        $check = preg_match($pattern,$email);
        if(!$check) {
            $errors['email'] = 'Email không hợp lệ';
        }
    }

    if(empty($password)){
        $errors['password'] = 'Mật khẩu không được để trống';
    }

    if(empty($address)){
        $address = '';
    }

    if(empty($phone)){
        $errors['phone'] = 'Số điện thoại không được để trống';
    }else {
        $pattern = '/^(0|\+84)+[0-9]{9,10}$/';
        $check = preg_match($pattern,$phone);
        if(!$check) {
            $errors['phone'] = 'Số điện thoại không hợp lệ';
        }
    }

    if(empty($access)){
        $errors['access'] = 'Quyền truy cập không được để trống';
    }

    if(empty($birthday)){
        $errors['birthday'] = 'Ngày tháng năm sinh không được để trống';
    }

    if(!isset($_POST['sex'])){
        $errors['sex'] = 'Chọn giới tính';
    }else {
        $sex = validateInput($_POST['sex']);
    }

    if($_FILES['avatar']['size'] > 0){
        $result = handleUpload($_FILES['avatar']);
        if(empty($result['error'])){
            $avatar = $result['file'];
        }else {
            $errors['avatar'] = $result['error'];
        }
    }

    if(empty($errors)){
        $sql = "SELECT email FROM users WHERE email='$email'";
        if(query($sql)->rowCount() > 0){
            $errors['email'] = 'Email đã được sử dụng';
        }else {
            $salt_password = password_hash($password, PASSWORD_BCRYPT,array('cost' =>11));
            $sql = "INSERT INTO users(name, email,password,address,phone,access,avatar,birthday,sex)
                    VALUES(?,?,?,?,?,?,?,?,?)";
            $stmt = query($sql,[
                $name,
                $email,
                $salt_password,
                $address,
                $phone,
                $access,
                $avatar,
                $birthday,
                $sex
            ]);
            if($stmt->rowCount() > 0){
                $success = 'Thêm người dùng thành công';
                $name = '';
                $email = '';
                $password = '';
                $address = '';
                $phone = '';
                $access = '';
            }
        }
    }
}