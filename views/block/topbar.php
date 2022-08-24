<?php
$sql = "SELECT * FROM shop_info";
$shop_info = query($sql)->fetch(PDO::FETCH_ASSOC);
?>
<div class="topbar">
    <div class="topbar-block">
        <p class="topbar-block-text active">Thanh toán khi nhận hàng</p>
        <p class="topbar-block-text">Freeship toàn quốc cho đơn từ 500K</p>
        <p class="topbar-block-text">Hàng mới mỗi ngày</p>
    </div>
    <div class="topbar-block">
        <div class="topbar-block-item">
            <div class="topbar-block-icon">
                <div class="ring">
                    <div class="coccoc-alo-phone coccoc-alo-green coccoc-alo-show">
                        <div class="coccoc-alo-ph-circle"></div>
                        <div class="coccoc-alo-ph-circle-fill"></div>
                        <div class="coccoc-alo-ph-img-circle">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="topbar-block-hotline">
                <a href="tel:<?= $shop_info['hotline'] ?>">
                    Hotline: <?= $shop_info['hotline'] ?>
                </a>
            </div>
        </div>
    </div>
</div>