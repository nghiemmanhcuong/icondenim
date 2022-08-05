<?php
// get date now
date_default_timezone_set('Asia/Ho_Chi_Minh');
$dateNow = date('Y-m-d H:i:s');
// filter product
if(isset($_GET['p'])){
    $filter_price_asc = '?p='.$_GET['p'].'&field=price&sort=ASC';
    $filter_price_desc = '?p='.$_GET['p'].'&field=price&sort=DESC';
    $filter_name_asc = '?p='.$_GET['p'].'&field=name&sort=ASC';
    $filter_name_desc = '?p='.$_GET['p'].'&field=name&sort=DESC';   
    $filter_order_customer_name_desc = '?p='.$_GET['p'].'&field=customer_name&sort=DESC';   
    $filter_order_customer_name_asc = '?p='.$_GET['p'].'&field=customer_name&sort=ASC';   
}


// btn text
$btn_text = ['Khám phá','Xem ngay','Xem thêm','Đừng bỏ lỡ','Xem ngay'];

// filter array
$filters = [
    'main'=>[
        [
            'title' => 'Giá: Tăng dần',
            'value' => '?sort_by=price-asc',
        ],
        [
            'title' => 'Giá: Giảm dần',
            'value' => '?sort_by=price-desc',
        ],
        [
            'title' => 'Tên: A-Z',
            'value' => '?sort_by=name-asc',
        ],
        [
            'title' => 'Tên: Z-A',
            'value' => '?sort_by=name-desc',
        ],
        [
            'title' => 'Cũ nhất',
            'value' => '?sort_by=id-asc',
        ],
        [
            'title' => 'Mới nhất',
            'value' => '?sort_by=id-desc',
        ],
        [
            'title' => 'Bán chạy nhất',
            'value' => '?sort_by=sold-desc',
        ],
    ],
];