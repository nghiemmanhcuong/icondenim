<?php 
    if(isset($_SESSION['cart_products'])){
        $total_price = getTotalPriceCart($_SESSION['cart_products']);
    }else {
        $total_price = 0;
    }
?>
<div class="cart-container">
    <div class="cart">
        <div class="cart-header">
            <h3 class="cart-header-title">Giỏ</h3>
            <div class="cart-header-close" id="cart-close-btn" title="Đóng">
                <i class="fa-solid fa-xmark"></i>
            </div>
        </div>
        <div class="cart-product">
            <?php if(!empty($_SESSION['cart_products'])):?>
            <?php foreach ($_SESSION['cart_products'] as $item):?>
            <div class="cart-product-item">
                <div class="cart-product-image">
                    <img src="<?=IMG_ROOT.$item['product_image']?>" width="70">
                </div>
                <div class="cart-product-info">
                    <h5 class="cart-product-name"><?=$item['product_name']?></h5>
                    <div class="cart-product-attributes">
                        <span><?=getColor($item['color'])?></span>
                        <span>/</span>
                        <span><?=getSize($item['size'])?></span>
                    </div>
                    <div>
                        <div class="cart-product-price"><?=number_format($item['product_price'],0,',','.')?><span>đ</span></div>
                        <div class="cart-product-quantity">
                            Số lượng: <?=$item['quantity']?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
            <?php else:?>
            <div style="font-size:14px;padding:30px 0;">Giỏ hàng trống!!!</div>
            <?php endif;?>
        </div>
        <?php if(!empty($_SESSION['cart_products'])):?>
        <div class="cart-total-price">
            <div class="cart-total-price-title">Tổng tiền</div>
            <div><?=number_format($total_price,0,',','.')?><span>đ</span></div>
        </div>
        <div class="cart-button">
            <a href="<?=WEB_ROOT?>/cart">Vào giỏ hàng</a>
            <a href="<?=WEB_ROOT?>/checkouts">Thanh toán</a>
        </div>
        <?php endif;?>
    </div>
</div>
