<?php
if(!empty($_GET['cart_id'])){
    $cart_id = strip_tags($_GET['cart_id']);
    $cart_id = trim($_GET['cart_id']);
    $cart_id = htmlspecialchars($_GET['cart_id']);

    if(!empty($_SESSION['cart_products']) && array_key_exists($cart_id, $_SESSION['cart_products'])){
        unset($_SESSION['cart_products'][$cart_id]);
        header("Location: ".WEB_ROOT."/cart");
    }else {
        header("Location: ".WEB_ROOT."/cart");
    }   
}