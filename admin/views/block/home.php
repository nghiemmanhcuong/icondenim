<div class="content">
    <div>
        <h2 class="mt-3 fw-bold">Thống kê doanh số 5 tháng gần đây</h2>
        <div class="sales-chart" id="sales-chart" style="height: 300px;"></div>
    </div>
    <div class="mt-3 row">
        <div class="today-order col-6 border-end">
            <h4>Đơn hàng hôm nay</h4>
            <?php if(count($orders) > 0): ?>
            <table class="table table-success" style="font-size:14px;">
                <thead>
                    <tr>
                        <th class="border border-light text-center fw-normal">STT</th>
                        <th class="border border-light text-center fw-normal">Khách hàng</th>
                        <th class="border border-light text-center fw-normal">Email</th>
                        <th class="border border-light text-center fw-normal">Số điện thoại</th>
                        <th class="border border-light text-center fw-normal">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count=0;foreach ($orders as $order):$count++?>
                    <tr>
                        <td class="border border-light text-center fw-normal"><?=$count?></td>
                        <td class="border border-light text-center fw-normal"><?=$order['customer_name']?></td>
                        <td class="border border-light text-center fw-normal"><?=$order['customer_email']?></td>
                        <td class="border border-light text-center fw-normal"><?='0'.$order['customer_phone']?></td>
                        <td class="border border-light text-center fw-normal">
                            <a href="?p=chi-tiet-don-hang&order_id=<?=$order['id']?>" style="font-size:12px;"
                            class="btn btn-primary">Chi tiết</a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            <?php else:?>
            <div class="text-center mt-3">Chưa có đơn hàng mới nào hôm nay!</div>
            <?php endif;?>
            <!-- pagination -->
            <?php if(count($orders) > 0): ?>
            <?php include_once('views/block/pagination.php');?>
            <?php endif;?>
        </div>
        <div class="today-order col-6">
            <div class="d-flex justify-content-between">
                <h4>Top người dùng mới</h4>
                <a href="?p=trang-chu" class="btn btn-danger mb-2" style="font-size:14px;">Update</a>
            </div>
            <table class="table table-success" style="font-size:14px;">
                <thead>
                    <tr>
                        <th class="border border-light text-center fw-normal">STT</th>
                        <th class="border border-light text-center fw-normal">Avatar</th>
                        <th class="border border-light text-center fw-normal">Tên</th>
                        <th class="border border-light text-center fw-normal">Email</th>
                        <th class="border border-light text-center fw-normal">Số điện thoại</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count=0;foreach ($users as $user):$count++?>
                    <tr>
                        <td class="border border-light text-center fw-normal"><?=$count?></td>
                        <td class="border border-light text-center fw-normal">
                            <img src="../uploads/<?=$user['avatar']?>" class="rounded-circle"
                            style="height:40px;width:40px;">
                        </td>
                        <td class="border border-light text-center fw-normal"><?=$user['name']?></td>
                        <td class="border border-light text-center fw-normal"><?=$user['email']?></td>
                        <td class="border border-light text-center fw-normal"><?='0'.$user['phone']?></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
    new Morris.Area({
    element: 'sales-chart',
    data: [
        { thang: '<?=str_replace('0','',$curr_date_arr[1]-3)?>', doanhso: 4059683 },
        { thang: '<?=str_replace('0','',$curr_date_arr[1]-2)?>', doanhso: 7049362 },
        { thang: '<?=str_replace('0','',$curr_date_arr[1]-1)?>', doanhso: 5039500 },
        { thang: '<?=str_replace('0','',$curr_date_arr[1])?>', doanhso: <?=$total_price['total_price']?> },
        { thang: '5', doanhso: 3850498 },
    ],
    xkey: 'thang',
    ykeys: ['doanhso'],
    labels: ['doanhso']
    });
</script>