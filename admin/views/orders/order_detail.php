<div class="content">
    <a href="?p=don-hang" class="btn btn-success mb-1">
        <i class="bi bi-arrow-left"></i>
        Về trang đơn hàng
    </a>
    <h3 class="text-center mb-3 fw-bold">Chi tiết đơn hàng</h3>
    <div class="order-detail">
        <div class="order-detail-list row">
            <div class="col-6">
                <div class="order-detail-item">
                    <div class="order-detail-item-content">
                        <div class="order-detail-item-icon">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <span>Chủ đơn hàng</span>
                    </div>
                    <div class="order-detail-item-text">: <?=$order['customer_name']?></div>
                </div>
                <div class="order-detail-item">
                    <div class="order-detail-item-content">
                        <div class="order-detail-item-icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <span>Số điện thoại</span>
                    </div>
                    <div class="order-detail-item-text">: 0<?=$order['customer_phone']?></div>
                </div>
                <div class="order-detail-item">
                    <div class="order-detail-item-content">
                        <div class="order-detail-item-icon">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <span>Email</span>
                    </div>
                    <div class="order-detail-item-text">: <?=$order['customer_email']?></div>
                </div>
                <div class="order-detail-item">
                    <div class="order-detail-item-content">
                        <div class="order-detail-item-icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <span>Địa chỉ</span>
                    </div>
                    <div class="order-detail-item-text">: <?=$order['customer_address']?></div>
                </div>
                <div class="order-detail-item">
                    <div class="order-detail-item-content">
                        <div class="order-detail-item-icon">
                            <i class="fa-solid fa-money-bill-wave"></i>
                        </div>
                        <span>Phương thức thanh toán</span>
                    </div>
                    <div class="order-detail-item-text">: <?=$order['payment_method']?></div>
                </div>
                <div class="order-detail-item">
                    <div class="order-detail-item-content">
                        <div class="order-detail-item-icon">
                            <i class="fa-solid fa-clock"></i>
                        </div>
                        <span>Ngày giờ đặt hàng</span>
                    </div>
                    <div class="order-detail-item-text">: <?=$order['created_at']?></div>
                </div>
                <div class="order-detail-item">
                    <div class="order-detail-item-content">
                        <div class="order-detail-item-icon">
                            <i class="fa-solid fa-comment-dots"></i>
                        </div>
                        <span>Thông tin</span>
                    </div>
                    <div class="order-detail-item-text">: <?=$order['message']?></div>
                </div>
            </div>
            <div class="col-6">
                <div class="order-detail-item">
                    <div class="order-detail-item-content">
                        <div class="order-detail-item-icon">
                            <i class="fa-solid fa-plus"></i>
                        </div>
                        <span>Tổng tiền đơn hàng</span>
                    </div>
                    <div class="order-detail-item-text">: <?=handlePrice($order['total_price'])?></div>
                </div>
                <div class="order-detail-item">
                    <div class="order-detail-item-content">
                        <div class="order-detail-item-icon">
                            <i class="fa-solid fa-plus"></i>
                        </div>
                        <span>Khách hàng thân thiết</span>
                    </div>
                    <div class="order-detail-item-text">: -<?=$order['discount']?>%</div>
                </div>
                <div class="order-detail-item">
                    <div class="order-detail-item-content">
                        <div class="order-detail-item-icon">
                            <i class="fa-solid fa-plus"></i>
                        </div>
                        <span>Phí ship</span>
                    </div>
                    <div class="order-detail-item-text">: <?=handlePrice($order['transport_fee'])?></div>
                </div>
                <div class="order-detail-item">
                    <div class="order-detail-item-content">
                        <div class="order-detail-item-icon">
                            <i class="fa-solid fa-plus"></i>
                        </div>
                        <span>Giá cuối</span>
                    </div>
                    <div class="order-detail-item-text">: <?=handlePrice($last_price)?></div>
                </div>
                <div class="order-detail-item">
                    <div class="order-detail-item-content">
                        <div class="order-detail-item-icon">
                            <i class="fa-solid fa-signal"></i>
                        </div>
                        <span>Trạng thái</span>
                    </div>
                    <div class="order-detail-item-text">: <?=$order['status']?></div>
                </div>
            </div>
        </div>
        <div class="order-detail-product">
            <h3 class="text-center mb-3 mt-3 fw-bold">Tất cả sản phẩm trong đơn hàng</h3>
            <table class="table table-success">
                <thead>
                    <tr>
                        <th class="text-center border border-dark">STT</th>
                        <th class="text-center border border-dark">Ảnh</th>
                        <th class="text-center border border-dark">Tên sản phẩm</th>
                        <th class="text-center border border-dark">Giá sản phẩm</th>
                        <th class="text-center border border-dark">Màu</th>
                        <th class="text-center border border-dark">Kích cỡ</th>
                        <th class="text-center border border-dark">Số lượng mua</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($product_list) && count($product_list) > 0):$count=0;?>
                    <?php foreach ($product_list as $product):$count++;?>
                    <tr>
                        <td class="text-center border border-dark"><?=$count?></td>
                        <td class="text-center border border-dark" width="6%">
                            <img src="../uploads/<?=$product['image']?>" height="50">
                        </td>
                        <td class="text-center border border-dark"><?=$product['name']?></td>
                        <td class="text-center border border-dark"><?=handlePrice($product['price'])?></td>
                        <td class="text-center border border-dark"><?=$product['color']?></td>
                        <td class="text-center border border-dark"><?=$product['size']?></td>
                        <td class="text-center border border-dark"><?=$product['quantity']?></td>
                    </tr>
                    <?php endforeach;?>
                    <?php endif;?>
                </tbody>
            </table>
        </div>
    </div>
</div>