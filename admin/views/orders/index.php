<div class="content">
    <h3 class="text-center mb-3">Quản lý đơn hàng</h3>
    <!-- message -->
    <?php if(isset($_GET['msg'])):?>
    <div class="alert alert-success delete position-relative">
        <?=$_GET['msg']?>
        <a href="?p=don-hang">
            <i class="fa-solid fa-circle-xmark fs-5 position-absolute"></i>
        </a>
    </div>
    <?php endif;?>
    <!-- form filter -->
    <div class="d-flex align-items-center justify-content-between">
        <!-- search -->
        <form method="post" class="mb-3 d-flex align-items-center form-filter">
            <input type="text" name="keyword" placeholder="Nhập tên hoặc số điện thoại khách hàng..." class="form-control">
            <button class="btn btn-success ms-2" style="min-width:max-content;font-size:14px;" name="search_order">
                Tìm kiếm
                <i class="bi bi-search"></i>
            </button>
        </form>
        <div class="d-flex">
            <!-- filter -->
            <select class="form-select mb-3 me-2" style="width:max-content;" id="filter">
                <option value="<?='?p='.$_GET['p']?>">--Sắp xếp--</option>
                <!-- filter name asc -->
                <option <?= isset($field) && isset($sort) && $field == 'customer_name' && $sort == 'ASC' ? 'selected' : ''?>
                    value="<?=isset($keyword) ? $filter_order_customer_name_asc.'&keyword='.$keyword : $filter_order_customer_name_asc?>">
                    Tên khách hàng A-Z</option>

                <!-- filter name desc -->
                <option <?= isset($field) && isset($sort) && $field == 'customer_name' && $sort == 'DESC' ? 'selected' : ''?>
                    value="<?=isset($keyword) ? $filter_order_customer_name_desc.'&keyword='.$keyword : $filter_order_customer_name_desc?>">
                    Tên khách hàng Z-A</option>
            </select>
            <div>
                <a href="?p=don-hang" class="btn btn-danger" style="font-size:14px;">
                    <i class="bi bi-arrow-repeat"></i>
                    update
                </a>
            </div>
        </div>
    </div>
    <!-- keyword -->
    <?php if(isset($keyword)):?>
    <div class="mb-2">
        Kết quả tìm kiếm cho: '<?=$keyword?>'
        <a href="?p=don-hang" style="color:blue;">Quay lại</a>
    </div>
    <?php endif;?>
    <table class="table table-success">
        <thead>
            <tr>
                <th class="text-center border border-dark">STT</th>
                <th class="text-center border border-dark">Tên</th>
                <th class="text-center border border-dark">SĐT</th>
                <th class="text-center border border-dark">Email</th>
                <th class="text-center border border-dark">Tổng tiền</th>
                <th class="text-center border border-dark">Phí ship</th>
                <th class="text-center border border-dark">Giảm giá</th>
                <th class="text-center border border-dark">Trạng thái</th>
                <th class="text-center border border-dark">Chức năng</th>
            </tr>
        </thead>
        <tbody>
            <?php if(count($orders) > 0):?>
            <?php $count=0; foreach($orders as $order): $count++; ?>
            <tr>
                <td class="text-center border border-dark"><?=$count?></td>
                <td class="text-center border border-dark"><?=$order['customer_name']?></td>
                <td class="text-center border border-dark">0<?=$order['customer_phone']?></td>
                <td class="text-center border border-dark"><?=$order['customer_email']?></td>
                <td class="text-center border border-dark"><?=handlePrice($order['total_price'])?></td>
                <td class="text-center border border-dark"><?=handlePrice($order['transport_fee'])?></td>
                <td class="text-center border border-dark"><?=$order['discount']?>%</td>
                <td class="text-center border border-dark"><?=$order['status']?></td>
                <td class="text-center border border-dark">
                    <a href="?p=chi-tiet-don-hang&order_id=<?=$order['id']?>" style="font-size:12px;"
                        class="btn btn-primary">Chi tiết</a>
                    <?php if($order['status'] != 'Đã thanh toán'):?>
                    <a href="?p=trang-thai-don-hang&order_id=<?=$order['id']?>" style="font-size:12px;"
                        class="btn btn-success">Sửa trạng thái</a>
                    <?php endif;?>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else:?>
            <div class="text-center fw-bold fs-5">Không tìm thấy đơn hàng nào!!!</div>
            <?php endif;?>
        </tbody>
    </table>
    <!-- pagination -->
    <?php if(count($orders) > 0):?>
    <?php include_once('views/block/pagination.php');?>
    <?php endif;?>
</div>