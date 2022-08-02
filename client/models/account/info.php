<?php
if(isset($_GET['action'])){
    if(isset($_COOKIE['user_id'])){
        setcookie("user_id",'',time() - (24*60*60),'/');
        unset($_SESSION['user_client']);
        header('Location:'.WEB_ROOT);
    }
}