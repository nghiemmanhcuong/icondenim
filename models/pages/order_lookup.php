<?php

if(isset($_GET['method'])){
    $method = $_GET['method'];
}else {
    $method = 'phone';
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $error = '';

    if(isset($_POST['member_email'])){
        if(empty($_POST['member_email'])){
            $error = 'Vui lòng nhập email';
        }else {
            if(!filter_var($_POST['member_email'],FILTER_VALIDATE_EMAIL)){
                $error = 'Email không hợp lệ';
            }else {
                $member_email = validateInput($_POST['member_email']);
            }
        }   
    }

    if(isset($_POST['member_phone'])){
        if(empty($_POST['member_phone'])){
            $error = 'Vui lòng nhập số điện thoại';
        }else {
            $pattern = '/^(0|\+84)+[0-9]{9,10}$/';
            $check = preg_match($pattern, $_POST['member_phone']);
            if(!$check){
                $error = 'Số điện thoại không hợp lệ';
            }else {
                $member_phone = validateInput($_POST['member_phone']);
            }
        }  
    }

    if(empty($error)){
        if(isset($member_phone)){
            $sql = "SELECT * FROM orders WHERE customer_phone=?";
            $orders = query($sql,[$member_phone])->fetchAll(PDO::FETCH_ASSOC);
        }

        if(isset($member_email)){
            $sql = "SELECT * FROM orders WHERE customer_email=?";
            $orders = query($sql,[$member_email])->fetchAll(PDO::FETCH_ASSOC);
        }

        if(empty($orders)){
            $error = 'Không tìm thấy đơn hàng nào';
        }else {
            $error = 'Chức năng đang bị tạm khoá để bảo trì vui lòng quay lại sau!!!';
        }
        
    }
}