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
        break;
    default:
        include_once('views/errors/404.php');
        break;
}