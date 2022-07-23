<?php

if(empty($_GET['order_id'])){
    header('Location: ?p=don-hang');
}else {
    $order_id = $_GET['order_id'];
}

$sql = "SELECT total_price,user_id,customer_name FROM orders WHERE id=?";
$order = query($sql,[$order_id])->fetch(PDO::FETCH_ASSOC);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $status = validateInput($_POST['status']);

    $sql = "UPDATE orders SET status=? WHERE id=?";
    $result = query($sql,[$status,$order_id]);

    if($result->rowCount() > 0) {

        if($status == 'Đã thanh toán'){
            $user_id = $order['user_id'];
            $total_price = $order['total_price'];
            $point = round($total_price / 100000);
            $sql = "UPDATE users SET accumulated_points=(accumulated_points+?) WHERE id=?";

            query($sql,[$point,$user_id]);
            
            $sql = "SELECT accumulated_points FROM users WHERE id=?";
            $accumulated_points = query($sql,[$user_id])->fetch(PDO::FETCH_ASSOC);

            //  if any user update account type
            if($accumulated_points['accumulated_points'] >= 60){
                $sql = "UPDATE users SET account_type=? WHERE id=?";
                $result = query($sql,['silver',$user_id]);
            }else if($accumulated_points['accumulated_points'] > 150) {
                $sql = "UPDATE users SET account_type=? WHERE id=?";
                $result = query($sql,['gold',$user_id]);
            }
            
        }

        header('Location: ?p=don-hang&msg=Sửa trạng thái thành công');
    }
}