<?php
$sql = "SELECT * FROM shop_info";
$shop_info = query($sql)->fetch(PDO::FETCH_ASSOC);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = array();
    $hotline = validateInput($_POST['hotline']);
    $logo = validateInput($_POST['logo']);
    $email_lh = validateInput($_POST['email_lh']);
    $contact = validateInput($_POST['contact']);
    $consultant = validateInput($_POST['consultant']);
    $headquaters = validateInput($_POST['headquaters']);
    $email = validateInput($_POST['email']);


    if(empty($hotline)) {
        $errors['hotline'] = 'Hotline không được để trống';
    }
    if(empty($logo)) {
        $errors['logo'] = 'Logo không được để trống';
    }
    if(empty($email_lh)) {
        $errors['email_lh'] = 'Email liên hệ không được để trống';
    }
    if(empty($contact)) {
        $errors['contact'] = 'Điện thoại liên hệ bán hàng không được để trống';
    }
    if(empty($consultant)) {
        $errors['consultant'] = 'Điện thoại tư vấn không được để trống';
    }
    if(empty($headquaters)) {
        $errors['headquaters'] = 'Trụ sở chính không được để trống';
    }
    if(empty($email)) {
        $errors['email'] = 'Email không được để trống';
    }

    if(empty($errors)){
        $sql = "UPDATE shop_info SET hotline=?, logo_image=?, email_contact=?, operate_phone=?,
        sales_consultant_phone=?,headquarters_address=?,email=?";
        $result = query($sql,[
            $hotline,
            $logo,
            $email_lh,
            $contact,
            $consultant,
            $headquaters,
            $email
        ]);
        if($result->rowCount() > 0) {
            redirect('index.php?p=info-shop&msg=Sửa thông tin thành công');
        }
    }
}
