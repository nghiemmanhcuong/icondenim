<?php
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
}

if(isset($_GET['t'])){
    $action = $_GET['t'];
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $errors = array();

    $name = validateInput($_POST['name']);
    $email = validateInput($_POST['email']);
    $address = validateInput($_POST['address']);
    $phone = validateInput($_POST['phone']);

    if(empty($name)){
        $errors['name'] = 'Tên không được để trống';
    }

    if(empty($address)){
        $errors['address'] = 'Địa chỉ không được để trống';
    }

    if(empty($email)){
        $errors['email'] = 'Email không được để trống';
    }else {
        /* Check email */
        $pattern = '/^[a-z]+[a-z\-_\.0-9]*@[a-z\.]*\.[a-z]{2,}$/';
        $check = preg_match($pattern,$email);
        if(!$check) {
            $errors['email'] = 'Email không hợp lệ';
        }
    }

    if(empty($phone)){
        $errors['phone'] = 'Số điện thoại không được để trống';
    }else {
        /* Check phone */
        $pattern = '/^(0|\+84)+[0-9]{9,10}$/';
        $check = preg_match($pattern,$phone);
        if(!$check) {
            $errors['phone'] = 'Số điện thoại không hợp lệ';
        }
    }

    if($_FILES['file']['size'] > 0){
        $result = handleUpload($_FILES['file']);
        if(empty($result['error'])){
            $avatar = $result['file'];
        }else {
            $errors['avatar'] = $result['error'];
        }
    }else {
        $avatar = $_POST['avatar'];
    }

    if(empty($errors)){
        $sql = "SELECT email FROM users WHERE email='$email'";
        $curr_user = query($sql)->fetch(PDO::FETCH_ASSOC);

        if(!empty($curr_user) && $curr_user['email'] != $user['email']){
            $errors['email'] = 'Email đã được sử dụng';
        }else {
            $id = $_POST['id'];
            $sql = "UPDATE users SET name=?, email=?,address=?,phone=?,access=?,avatar=? WHERE id=?";
            $stmt = query($sql,[
                $name,
                $email,
                $address,
                $phone,
                $user['access'],
                $avatar,
                $id
            ]);
            if($stmt->rowCount() > 0){
                $_SESSION['user']['name'] = $name;
                $_SESSION['user']['email'] = $email;
                $_SESSION['user']['address'] = $address;
                $_SESSION['user']['phone'] = $phone;
                $_SESSION['user']['access'] = $user['access'];
                $_SESSION['user']['avatar'] = $avatar;
                redirect('index.php?p=thong-tin-ca-nhan');
            }
        }
    }
}