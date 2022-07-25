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
    case 'them-bai-viet':
        handleImportServer('blog/add.php','blog/add.php','Thêm bài viết');
        break;
    case 'danh-sach-bai-viet':
        handleImportServer('blog/index.php','blog/read.php','Danh sách bài viết');
        break;
    case 'sua-bai-viet':
        handleImportServer('blog/edit.php','blog/edit.php','Sửa bài viết');
        break;
    case 'xoa-bai-viet':
        handleImportServer('','blog/delete.php');
        break;
    case 'danh-muc-bai-viet':
        handleImportServer('blog/blog_category/index.php','blog/blog_category/read.php','Danh mục bài viết');
        break;
    case 'them-danh-muc-bai-viet':
        handleImportServer('blog/blog_category/add.php','blog/blog_category/add.php','Thêm danh mục bài viết');
        break;
    case 'sua-danh-muc-bai-viet':
        handleImportServer('blog/blog_category/edit.php','blog/blog_category/edit.php','Sửa danh mục bài viết');
        break;
    case 'xoa-danh-muc-bai-viet':
        handleImportServer('','blog/blog_category/delete.php');
        break;
     case 'danh-sach-danh-muc':
        handleImportServer('category/index.php','category/read.php','Danh sách danh mục');
        break;
    case 'them-danh-muc':
        handleImportServer('category/add.php','category/add.php','Thêm danh mục');
        break;
    case 'sua-danh-muc':
        handleImportServer('category/edit.php','category/edit.php','Sửa danh mục');
        break;
    case 'xoa-danh-muc':
        handleImportServer('','category/delete.php');
        break;
    case 'nhom-san-pham':
        handleImportServer('category/category_group/index.php','category/category_group/read.php','Nhóm sản phẩm');
        break;
    case 'them-nhom-san-pham':
        handleImportServer('category/category_group/add.php','category/category_group/add.php','Thêm nhóm sản phẩm');
        break;
    case 'sua-nhom-san-pham':
        handleImportServer('category/category_group/edit.php','category/category_group/edit.php','Sửa nhóm sản phẩm');
        break;
    case 'xoa-nhom-san-pham':
        handleImportServer('','category/category_group/delete.php');
        break;
}
