<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="shortcut icon" href="//theme.hstatic.net/1000360022/1000759577/14/favicon.png?v=554" type="image/png">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="stylesheet" href="<?=WEB_ROOT.'/public/css/base.css'?>">
    <link rel="stylesheet" href="<?=WEB_ROOT.'/public/css/main.css'?>">
    <title><?=$web_title ?? ''?></title>
</head>

<body>
    <header class="header" style="z-index:1000;">
        <div class="header-link">
            <a href="<?=CLIENT_LINK?>" target="_blank">
                <i class="fa-solid fa-earth-americas"></i>
                Vào trang web
            </a>
        </div>
        <div class="dropdown">
            <div class="header-info dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="header-info-name">
                    XinChào: <span><?=handleNameUser($_SESSION['user']['name'])?></span>
                </div>
                <img class="header-info-avatar" src="../uploads/<?=$_SESSION['user']['avatar']?>" alt="">
            </div>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="?p=thong-tin-ca-nhan">Thông tin các nhân</a></li>
                <li><a class="dropdown-item" href="?p=dang-xuat">Đăng xuất</a></li>
            </ul>
        </div>  
    </header>