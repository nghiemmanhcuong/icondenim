<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $errors = array();

    $name = validateInput($_POST['name']);
    $phone = validateInput($_POST['phone']);
    $email = validateInput($_POST['email']);
    $title = validateInput($_POST['title']);
    $content = validateInput($_POST['content']);

    if(empty($name)){
        $errors['name'] = 'Họ và Tên không được để trống';
    }else {
        if(mb_strlen($name,'utf-8') > 100) {
            $errors['name'] = 'Họ và Tên không được quá 100 ký tự';
        }
    }

    if(empty($phone)){
        $errors['phone'] = 'Số điện thoại không được để trống';
    }else {
        $pattern = '/^(0|\+84)+[0-9]{9,10}$/';
        $check = preg_match($pattern,$phone);

        if(!$check) {
            $errors['phone'] = 'Vui lòng kiểm tra lại số điện thoại';
        }
    }

    if(empty($email)){
        $errors['email'] = 'Email không được để trống';
    }else {
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Vui lòng kiểm tra lại email';
        }
    }

    if(empty($title)){
        $errors['title'] = 'Tiêu đề không được để trống';
    }else {
        if(mb_strlen($title,'utf-8') > 255) {
            $errors['title'] = 'Tiêu đề không được quá 255 ký tự';
        }
    }

    if(empty($content)){
        $errors['content'] = 'Nội dung không được để trống';
    }

    if(empty($errors)){
        $sql = "INSERT INTO contacts (user_name,user_email,user_phone,title,content)
                VALUES (?,?,?,?,?)";
        $result = query($sql,[
            $name,
            $email,
            $phone,
            $title,
            $content
        ]);

        if($result->rowCount() > 0) {
            $success = 'Gửi liên hệ thành công chúng tôi sẽ liên hệ lại với bạn sớm nhất. Cảm ơn bạn đã liên hệ với chúng tôi!!!';
        }
    }
}