<?php
if(isset($_SERVER['PATH_INFO'])){
    $url_arr = explode("/", $_SERVER['PATH_INFO']);
    $url_arr = array_filter($url_arr);
    $url_arr = array_values($url_arr);
    
    $folder = $url_arr[0];
    if(isset($url_arr[1])) {
        $detail = $url_arr[1];
    }else {
        $detail = '';
    }
}else {
    $folder = '';
    $detail = '';
}

switch ($folder) {
    case 'account':
        switch ($detail) {
            case 'dang-nhap':
                handleImportClient('account/login.php','account/login.php','Đăng nhập');
                break;
            case 'dang-ky':
                handleImportClient('account/register.php','account/register.php','Tạo tài khoản');
                break;
            case 'khoi-phuc-tai-khoan':
                handleImportClient('account/recovery_pass.php','account/recovery_pass.php','Khôi phục tài khoản');
                break;
            case 'info':
                handleImportClient('account/info.php','account/info.php','Tài khoản của bạn');
                break;
            case 'check-code':
                handleImportClient('account/check_code.php','account/check_code.php','Khôi phục tài khoản');
                break;
            case 'doi-mat-khau':
                handleImportClient('account/change_pass.php','account/change_pass.php','Khôi phục tài khoản');
                break;
            default:
                include_once('views/errors/404.php');
                break;
        }
        break;
    case 'checkouts':
        switch ($detail) {
            case '':
                handleImportClient('checkouts/index.php','checkouts/index.php','Thanh toán đơn hàng');
                break;
            case 'success':
                handleImportClient('checkouts/success.php','','Đặt hàng thành công');
                break;
            default:
                include_once('views/errors/404.php');
                break;
        }
        break;
    case 'pages':
        switch ($detail) {
            case 'chinh-sach-doi-tra':
                handleImportClient('pages/exchange_guarantee.php','','Chính sách đổi trả');
                break;
            case 'membership':
                handleImportClient('pages/membership.php','','Membership');
                break;
            case 'tra-cuu-don-hang':
                handleImportClient('pages/order_lookup.php','pages/order_lookup.php','Tra cứu đơn hàng');
                break;
            case 'dia-chi-cua-hang':
                handleImportClient('pages/store_address.php','','Địa chỉ cửa hàng');
                break;
            case 'chinh-sach-bao-mat':
                handleImportClient('pages/security.php','','Chính sách bảo mật');
                break;
            case 'dieu-khoan-dich-vu':
                handleImportClient('pages/service.php','','Điều khoản dịch vụ');
                break;
            default:
                include_once('views/errors/404.php');
                break;
        }
        break;
    case '':
        handleImportClient('home/index.php','home/index.php','ICON DENIM');
        break;
    case 'collections':
        handleImportClient('collections/index.php','collections/index.php');
        break;
    case 'products':
        handleImportClient('products/index.php','products/index.php');
        break;
    case 'search':
        handleImportClient('search/index.php','search/index.php');
    case 'cart':
        handleImportClient('cart/index.php','cart/index.php','Giỏ hàng');
        break;
    case 'lien-he':
        handleImportClient('contact/index.php','contact/index.php','Liên hệ với chúng tôi');
        break;
    default:
        include_once('views/errors/404.php');
        break;
    case 'blogs':
        handleImportClient('blogs/index.php','blogs/index.php');
        break;
    case 'blog-detail':
        handleImportClient('blogs/detail.php','blogs/detail.php');
        break;
    case 'lien-he':
        handleImportClient('contact/index.php','contact/index.php','Liên hệ với chúng tôi');
        break;
    case 'search':
        handleImportClient('search/index.php','search/index.php');
        break;
    default:
        include_once('views/errors/404.php');
        break;
}