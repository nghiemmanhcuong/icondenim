<?php
    $sql = "SELECT * FROM shop_info";
    $shop_info = query($sql)->fetch(PDO::FETCH_ASSOC);

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $sql = "UPDATE shop_info SET hotline=?, logo_image=?, email_contact=?, co-operate_phone=?, 
        sales_consultant_phone=?,headquarters_address=?,email=?
        WHERE 1";
        $shop_info = query($sql);
        redirect('index.php?p=info-shop&msg=Sửa thông tin thành công');
    }
