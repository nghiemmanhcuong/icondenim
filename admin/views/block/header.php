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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=WEB_ROOT.'/public/css/base.css'?>">
    <link rel="stylesheet" href="<?=WEB_ROOT.'/public/css/main.css'?>">
    <title><?=$web_title ?? ''?></title>
    <style>
        :root {
  --sitebar-width:230px;
}

*, *::before, *::after {
  box-sizing: border-box;
}
* {
  margin: 0;
  padding: 0;
}

html, body {
  height: 100%;
}
body {
  line-height: 1.5;
  -webkit-font-smoothing: antialiased;
  -webkit-tap-highlight-color: rgba(0,0,0,0);
}

img, picture, video, canvas, svg {
  display: block;
  max-width: 100%;
}
input, button, textarea, select {
  font: inherit;
  outline: none;
  border: none;
}
p, h1, h2, h3, h4, h5, h6 {
  overflow-wrap: break-word;
}

a {
  text-decoration: none !important;
  color: inherit;
}

a:hover {
  color: #fff;
}

ul {
  list-style: none;
  padding-left: 0;
  padding-inline-start:0 !important;
}
/* auth */
.auth {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background-repeat: no-repeat;
  background-size: cover;
}

.auth-form {
  width: 35%;
  box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
  padding: 25px;
  border-radius: 10px;
  background-color: #fff;
}

.auth-label {
  font-weight: 500;
}

.auth-input {
  padding: 10px;
}

.auth-input:focus {
  box-shadow: 0 0 0 0.15rem rgb(13 110 253 / 25%);
}

.auth-action-link:hover,
.auth-action-link {
  color:#0d6efd;
}

/* form */
.form-add {
  width: 45%;
  margin-left: auto;
  margin-right: auto;
  box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
  border-radius: 10px;
  padding: 25px;
}

.form-filter {
  width: 40%;
}

.form-button {
  display: flex;
  justify-content: center;
}

.form-button > button {
  width: 50%;
}

.form-error {
  color: red;
  font-size: 13px;
}

.form-control,
.form-select {
  font-size: 14px;
}

.form-control:focus {
  box-shadow: 0 0 0 0.05rem rgb(13 110 253 / 25%);
}


.form-control::placeholder{
  font-size: 14px;
  color: #999;
}

.form-label {
  font-weight: 500;
  margin-bottom: 3px;
}

.form-label > span {
  color: red;
  padding-left: 3px;
  display: inline-block;
}

.btn-small {
  font-size: 13px;
  padding: 5px;
}

.btn-small > i {
  font-size: 10px;
}

/* header */
.header {
  position: fixed;
  left: var(--sitebar-width);
  top: 0;
  width:calc(100vw - var(--sitebar-width));
  padding: 25px 50px;
  background-color: #fff;
  display: flex;
  justify-content: space-between;
  align-items: center;
  box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
}

.header-link > a:hover,
.header-link {
  color: #267FF4;
}

.header-info {
  display: flex;
  align-items: center;
  cursor: pointer;
}

.header-info-name {
  font-size: 18px;
  margin-right: 10px;
  font-weight: 500;
}

.header-info-avatar {
  width: 50px;
  height: 50px;
  width: 35px;
  height: 35px;
  border-radius: 100rem;
}
/* sitebar */
.sitebar {
  width: var(--sitebar-width);
  background-color: #267FF4;
  height: 100vh;
  position: fixed;
  left: 0;
  top: 0;
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 10px 15px 100px;
}

.sitebar-nav{
  padding-top: 70px;
}

.sitebar-nav-item {
  overflow: hidden;
  margin-bottom: 15px;
  text-align: left;
}

.sitebar-nav-link {
  color: #fff;
  font-weight: 500;
  font-size: 17px;
  display:flex;
  align-items: center;
  gap: 10px;
  cursor: pointer;
}

.sitebar-nav-link > span {
  flex: 1;
}

.sitebar-nav-icon {
  font-size: 16px;
  margin-right: auto;
}

.sitebar-nav-sub {
  opacity: 0;
  visibility: hidden;
  height: 0;
  transition: all 0.2s ease;
  text-align: left;
}

.sitebar-nav-sub.show {
  opacity: 1;
  visibility: visible;
  height: max-content;
  padding-top: 5px;
}

.sitebar-sub-nav-item {
  margin-bottom: 5px;
  padding-left: 5px;
}

.sitebar-sub-nav-link,
.sitebar-sub-nav-link:hover {
  color: #fff;
}

/* alert */
.alert-success > a > i {
  top:5px;
  right:10px;
  color:red;
}

.alert-success.delete {
  width: 20%;
}

/* table */
th,td {
  font-size: 14px;
}
.content {
    position:fixed;
    overflow:scroll;
    height:calc(100vh - 85px);
    width: calc(100vw - var(--sitebar-width));
    top:85px;
    left:var(--sitebar-width);
    padding: 10px 50px;
}

/* product add form */

.delete-attribute {
    top: 0px;
    right: 5px;
    max-width: max-content;
    color: #fff;
    font-size: 10px;
    padding: 3px;
    border-radius: 3px;
    background-color: red;
    cursor: pointer;
}

/* home */
.sales-chart{
    box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
    border-radius:5px;
}

/* order detail */
.order-detail-list {
    padding: 15px;
    border-radius:10px;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
}

.order-detail-item {
    display: flex;
}

.order-detail-item-content {
    width: 250px;
    margin-bottom: 15px;
}

.order-detail-item-icon {
    font-size: 12px;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    background-color: #ddd;
    width: 30px;
    height: 30px;
    border-radius: 100%;
    margin-right: 10px;
}

.order-detail-item-text {
    font-weight: 500;
}
    </style>
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