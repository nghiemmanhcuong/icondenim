<?php
if(isset($_COOKIE['user_admin_id'])){
    setcookie('user_admin_id', '',time() - 60*60*24,'/');
    redirect('index.php');
}else {
    redirect('index.php');
}