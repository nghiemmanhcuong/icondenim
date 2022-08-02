<?php 
    if(isset($_SESSION['cart_products'])){
        $total_price = getTotalPriceCart($_SESSION['cart_products']);
    }else {
        $total_price = 0;
    }
?>

<div class="basket">
    <div class="container">
        <h3 class="basket-title">Giỏ hàng của tôi</h3>
        <div class="row">
            <div class="col-8 col-md-6 col-sm-12">
                <div class="basket-product">
                    <?php if(!empty($_SESSION['cart_products'])):?>
                    <?php foreach ($_SESSION['cart_products'] as $key => $item):?>
                    <article class="basket-product-item">
                        <div class="basket-product-image">
                            <img src="<?=IMG_ROOT.$item['product_image']?>" alt="cart product image" width="100">
                            <div class="product-image-overlay"></div>
                        </div>
                        <div class="basket-product-info">
                            <h5 class="basket-product-name"><?=$item['product_name']?></h5>
                            <div class="basket-product-price">
                                <?=number_format($item['product_price'],0,',','.')?><span>đ</span>
                            </div>
                            <div class="basket-product-attributes">
                                <div class="basket-product-color">
                                    <span>Màu: </span><?=getColor($item['color'])?>
                                </div>
                                <span>/</span>
                                <div class="basket-product-size">
                                    <span>Size: </span><?=getSize($item['size'])?>
                                </div>
                            </div>
                            <div class="basket-product-quantity">
                                <?=$item['quantity']?> sản phẩm
                            </div>
                        </div>
                        <a href="?cart_id=<?=$key?>" class="basket-product-close">
                            <i class="fa-solid fa-trash-can"></i>
                        </a>
                    </article>
                    <?php endforeach;?>
                    <div class="basket-total">
                        <div class="basket-total-title">Tổng tiền</div>
                        <div class="basket-total-price"><?=number_format($total_price,0,',','.')?><span>đ</span></div>
                        <a class="basket-total-btn" href="<?=WEB_ROOT?>/checkouts">Thanh toán</a>
                    </div>
                    <?php else:?>
                    <div class="basket-product-empty">
                        <div>Chưa có sản phẩm nào trong giỏ hàng!!!</div>
                        <a class="basket-product-empty-btn" href="<?=WEB_ROOT?>/collections/all">
                            Mua hàng
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                    </div>
                    <?php endif;?>
                </div>
            </div>
            <div class="col-4 col-md-6 col-sm-12">
                <div class="basket-policy">
                    <div class="basket-policy-top">
                        <h5>CHÍNH SÁCH GIAO NHẬN - ĐỔI TRẢ HÀNG</h5>
                        <p>- Miễn phí giao hàng toàn quốc cho đơn hàng từ 500K. Phí ship 20K cho đơn dưới 500K <br>
                            - NV CSKH sẽ gọi điện thoại xác nhận đơn hàng với khách hàng sau khi khách hàng đặt hàng.
                            <br>
                            - Được kiểm tra hàng trước khi nhận hàng <br>
                            - Đổi / Trả trong vòng 7 ngày kể từ khi nhận hàng <br>
                            - Không áp dụng đổi/trả sản phẩm trong CTKM <br>
                            - Miễn phí đổi trả nếu lỗi sai sót từ phía Icondenim.com <br>
                            - Địa chỉ gửi đổi hàng online: <br>
                            17/6 Bùi Cẩm Hổ, phường Tân Thới Hòa, Tân Phú, Tp. HCM <br>
                            - Không hỗ trợ đổi trả đối với các sản phẩm boxer, khẩu trang, tất vớ,... <br>
                        </p>
                    </div>
                    <div class="basket-policy-bottom">
                        <div class="basket-policy-rule">
                            <img src="public/images/ico_free_cart.jpeg" width="30">
                            <h5>MIỄN PHÍ CHUYỂN TOÀN QUỐC</h5>
                        </div>
                        <div class="basket-policy-rule">
                            <img src="public/images/ico_call_cart.jpeg" width="30">
                            <h5>HỖ TRỢ TƯ VẤN(09:00-21:00)</h5>
                        </div>
                        <div class="basket-policy-rule">
                            <img src="public/images/ico_td_cart.jpeg" width="30">
                            <h5>MIỄN PHÍ CHUYỂN TOÀN QUỐC</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
