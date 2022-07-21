<?php
if($_SESSION['user']['access'] != 'admin'){
    redirect('index.php?p=404');
}

if(isset($_GET['id']) && !empty($_GET['id'])){
    $user_id = $_GET['id'];
    $sql = "SELECT id,name,email,address,phone,access,account_type,avatar,birthday,sex FROM users WHERE id=?";
    $user =  query($sql,[$user_id])->fetch(PDO::FETCH_ASSOC);
}else {
    redirect('index.php?p=danh-sach-nguoi-dung');
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $errors = array();

    $name = validateInput($_POST['name']);
    $email = validateInput($_POST['email']);
    $address = validateInput($_POST['address']);
    $phone = validateInput($_POST['phone']);
    $access = validateInput($_POST['access']);
    $account_type = validateInput($_POST['account_type']);
    $birthday = validateInput($_POST['birthday']);

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

    if(empty($birthday)){
        $errors['birthday'] = 'Ngày tháng năm sinh không được để trống';
    }

    if(!isset($_POST['sex'])){
        $errors['sex'] = 'Chọn giới tính';
    }else {
        $sex = validateInput($_POST['sex']);
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
            $sql = "UPDATE users SET name=?, email=?,address=?,phone=?,access=?,account_type=?,avatar=?,birthday=?,sex=? WHERE id=?";
            $stmt = query($sql,[
                $name,
                $email,
                $address,
                $phone,
                $access,
                $account_type,
                $avatar,
                $birthday,
                $sex,
                $id
            ]);
            if($stmt->rowCount() > 0){
                redirect('index.php?p=danh-sach-nguoi-dung&msg=Sửa người dùng thành công');
            }
        }
    }
}