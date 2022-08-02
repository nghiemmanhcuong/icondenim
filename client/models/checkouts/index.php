<?php

if(!empty($_SESSION['cart_products'])){
    $total_price = getTotalPriceCart($_SESSION['cart_products']);

    if($total_price < 500000) {
        $new_total_price = $total_price + 20000;
    }else {
        $new_total_price = $total_price;
    }

    // if any user get discount
    if(isset($_SESSION['user_client'])){

        $discount = getDiscountMember($_SESSION['user_client']['accumulated_points']);
        if($discount > 0){
            $price_discount = ($total_price * $discount) / 100;
            $new_total_price = $total_price - $price_discount;

            if($total_price < 500000) {
                $new_total_price += 20000;
            }
        }else {
            $discount = 0;
        }
    }else {
        $discount = 0;
    }

}else {
    header("Location:".WEB_ROOT.'/cart');
}

// buy product
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['buy'])){
    $errors = array();

    $customer_name = validateInput($_POST['name']);
    $customer_phone = validateInput($_POST['phone']);
    $customer_email = validateInput($_POST['email']);
    $customer_address = validateInput($_POST['address']);
    $customer_message = validateInput($_POST['message']);

    if(empty($customer_name)){
        $errors['name'] = 'Vui lòng điền tên đầy đủ của bạn';
    }

    if(empty($customer_phone)){
        $errors['phone'] = 'Điền số điện thoại của bạn';
    }else {
        $pattern = '/^(0|\+84)+[0-9]{9,10}$/';
        $check = preg_match($pattern,$customer_phone);
        if(!$check){
            $errors['phone'] = 'Số điện thoại có vẻ không hợp lệ';
        }
    }

    if(empty($customer_email)){
        $errors['email'] = 'Vui lòng điền email của bạn';
    }else {
        if(!filter_var($customer_email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Email có vẻ không hợp lệ';
        }
    }

    if(empty($customer_address)){
        $errors['address'] = 'Vui lòng điền địa chỉ của bạn';
    }

    if(empty($_POST['payment'])){
        $errors['payment'] = 'Vui lòng chọn phương thức thanh toán';
    }else {
        $payment_method = $_POST['payment'];
    }

    if($total_price < 500000){
        $transport_fee = 20000;
    }else {
        $transport_fee = 0;
    }

    $created_at = date('Y-m-d H:i:s');

    if(empty($errors)){
        global $conn;

        if(!empty($message)){
            $sql = "INSERT INTO orders(customer_name,customer_email,customer_phone,customer_address,
                    total_price,payment_method,transport_fee,discount,message,created_at) VALUES(?,?,?,?,?,?,?,?,?,?)";
            $result = query($sql,[
                $customer_name,
                $customer_email,
                $customer_phone,
                $customer_address,
                $total_price,
                $payment_method,
                $transport_fee,
                $discount,
                $customer_message,
                $created_at
            ]);

        }else {
            $sql = "INSERT INTO orders(customer_name,customer_email,customer_phone,
                    customer_address,total_price,payment_method,transport_fee,discount,created_at) VALUES(?,?,?,?,?,?,?,?,?)";
            $result = query($sql,[
                $customer_name,
                $customer_email,
                $customer_phone,
                $customer_address,
                $total_price,
                $payment_method,
                $transport_fee,
                $discount,
                $created_at
            ]);
        }
        
        $order_id = $conn->lastInsertId();

        if($result->rowCount() > 0) {

            // add order detail
            $sql = "INSERT INTO order_detail(order_id,product_id,size_id,color_id,quantity)
                    VALUES(?,?,?,?,?)";

            if(isset($_SESSION['cart_products'])){
                foreach ($_SESSION['cart_products'] as $key => $product) {
                    query($sql,[
                        $order_id,
                        $product['product_id'],
                        $product['size'],
                        $product['color'],
                        $product['quantity']
                    ]);

                    // update sold of product
                    query("UPDATE products SET sold=sold+? WHERE id=?",[$product['quantity'],$product['product_id']]);

                    // update quantity in warehouse
                    query("UPDATE product_warehouse SET quantity=quantity-? 
                            WHERE product_id=? AND color=? AND size=?",
                            [$product['quantity'],$product['product_id'],$product['color'],$product['size']]);
                    unset($_SESSION['cart_products'][$key]);
                }

                // if any cookie user_id update user_id in orders
                if(isset($_COOKIE['user_id'])){
                    $user_id = $_COOKIE['user_id'];
                    $sql = "UPDATE orders SET user_id=? WHERE id=?";
                    query($sql,[$user_id,$order_id]);
                }

                header('Location: '.WEB_ROOT.'/checkouts/success');
                die();
                
            }else {
                $error = 'Có lỗi khi đặt hàng vui lòng điền lại thông tin';
            }
        }
    }
}