<?php
// fetch new user
$sql = "SELECT name,email,phone,avatar FROM users WHERE access=? ORDER BY id DESC LIMIT 5";
$users = query($sql,['user'])->fetchAll(PDO::FETCH_ASSOC);

$curr_date = date("Y-m-d H:i:s");
$curr_date_arr = explode(" ",$curr_date);
$curr_date_arr = explode("-",$curr_date_arr[0]);

// fecth to day orders
$limit = 5;
$curr_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($curr_page - 1) * $limit;

// get orders to day
$sql = "SELECT id,customer_name,customer_phone,customer_email 
        FROM orders WHERE DAY(created_at)=? AND MONTH(created_at) =? AND YEAR(created_at)=?
        ORDER BY id DESC LIMIT $limit OFFSET $offset";

$orders = query($sql,[$curr_date_arr[2],$curr_date_arr[1],$curr_date_arr[0]])->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT id,customer_name,customer_phone,customer_email 
        FROM orders WHERE DAY(created_at)=? AND MONTH(created_at) =? AND YEAR(created_at)=?";

$order_count = query($sql,[$curr_date_arr[2],$curr_date_arr[1],$curr_date_arr[0]])->rowCount();
$pages = ceil($order_count / $limit);

// get sales data
$date_sales = array();
$sales_data = array();

if(isset($_GET['sales'])){
    $time = $_GET['sales'];

    if($time == 'six_months') {
        for ($i=0; $i <= 5; $i++) {
            array_push($date_sales,date("Y-m",strtotime("-".$i." months")));
        }
        
        foreach ($date_sales as $item) {
            $totalPrice = getTotalSales($item) ?? 0;
            $sales_item = [
                'year'=>$item,
                'value'=> $totalPrice
            ];
            array_push($sales_data,$sales_item);
        }
    }else if($time == 'most_recent_month'){
        for ($i=0; $i <= 29; $i++) {
            array_push($date_sales,date("Y-m-d",strtotime("-".$i." day")));
        }
        
        foreach ($date_sales as $item) {
            $totalPrice = getTotalSalesDay($item) ?? 0;
            $sales_item = [
                'year'=>$item,
                'value'=> $totalPrice
            ];
            array_push($sales_data,$sales_item);
        }
    }else if($time == 'week_past'){
        for ($i=0; $i <= 6; $i++) {
            array_push($date_sales,date("Y-m-d",strtotime("-".$i." day")));
        }
        
        foreach ($date_sales as $item) {
            $totalPrice = getTotalSalesDay($item) ?? 0;
            $sales_item = [
                'year'=>$item,
                'value'=> $totalPrice
            ];
            array_push($sales_data,$sales_item);
        }
    }else {
        for ($i=0; $i <= 11; $i++) {
            array_push($date_sales,date("Y-m",strtotime("-".$i." months")));
        }
        
        foreach ($date_sales as $item) {
            $totalPrice = getTotalSales($item) ?? 0;
            $sales_item = [
                'year'=>$item,
                'value'=> $totalPrice
            ];
            array_push($sales_data,$sales_item);
        }
    }

}else {
    for ($i=0; $i <= 11; $i++) {
        array_push($date_sales,date("Y-m",strtotime("-".$i." months")));
    }
    
    foreach ($date_sales as $item) {
        $totalPrice = getTotalSales($item) ?? 0;
        $sales_item = [
            'year'=>$item,
            'value'=> $totalPrice
        ];
        array_push($sales_data,$sales_item);
    }
}

