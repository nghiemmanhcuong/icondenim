<?php

if (isset($_GET["p"])) {
    $page = $_GET["p"];
} else {
    $page = 'dang-nhap';
}

switch ($page) {
    case 'dang-nhap':
        require_once('models/auth/login.php');
        include_once('views/auth/login.php');
        break;
    case 'quen-mat-khau':
        include_once('models/auth/forgot_password.php');
        include_once('views/auth/forgot_password.php');
        break;
    case 'doi-mat-khau':
        include_once('models/auth/change_password.php');
        include_once('views/auth/change_password.php');
        break;
    case 'xac-thuc':
        include_once('models/auth/validate_code.php');
        include_once('views/auth/validate_code.php');
        break;
    case 'danh-sach-nguoi-dung':
        handleImportServer('user/index.php', 'user/read.php', 'Danh sách người dùng');
        break;
    case 'them-nguoi-dung':
        handleImportServer('user/add.php', 'user/add.php', 'Thêm người dùng');
        break;
    case 'sua-nguoi-dung':
        handleImportServer('user/edit.php', 'user/edit.php', 'Sửa người dùng');
        break;
    case 'xoa-nguoi-dung':
        handleImportServer('', 'user/delete.php',);
        break;
    case 'danh-sach-san-pham':
        handleImportServer('product/index.php','product/read.php','Danh sách sản phẩm');
        break;
    case 'them-san-pham':
        handleImportServer('product/add.php','product/add.php','Thêm sản phẩm');
        break;
    case 'sua-san-pham':
        handleImportServer('product/edit.php','product/edit.php','Sửa sản phẩm');
        break;
    case 'xoa-san-pham':
        handleImportServer('','product/delete.php');
        break;
    case 'don-hang':
        handleImportServer('orders/index.php','orders/index.php','Đơn hàng');
        break;
    case 'trang-thai-don-hang':
        handleImportServer('orders/edit_status.php','orders/edit_status.php','Trạng thái đơn hàng');
        break;
    case 'chi-tiet-don-hang':
        handleImportServer('orders/order_detail.php','orders/order_detail.php','Chi tiết đơn hàng');
        break;
    case 'them-anh-club':
        handleImportServer('club/add.php','club/add.php','Thêm ảnh club');
        break;
}
