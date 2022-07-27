<main>
    <!-- hero slide -->
    <section class="hero-slide">
        <a href="<?=WEB_ROOT?>/collections/san-pham-moi">
            <img src="public/images/hero-slide.webp" alt="hero silde">
        </a>
    </section>
    <!-- category popular -->
    <section class="section">
        <div class="container">
            <div class="category-popular">
                <?php if(isset($popular_categories) && count($popular_categories) > 0):?>
                <?php foreach ($popular_categories as $key => $category): ?>
                <div class="category-popular-item">
                    <div class="category-popular-image">
                        <a href="<?=WEB_ROOT?>/collections/<?=$category['slug']?>">
                            <img src="<?=IMG_ROOT.$category['image']?>" alt="category image">
                            <div class="category-popular-image-overlay"></div>
                        </a>
                    </div>
                    <div class="category-popular-content">
                        <h4 class="category-popular-content-name"><?=$category['name']?></h4>
                        <div class="category-popular-content-btn">
                            <a href="<?=WEB_ROOT?>/collections/<?=$category['slug']?>">
                                <?=$btn_text[$key]?>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php else:?>
                <div class="loading">loading</div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- popular product -->
    <section class="section new-product">
        <div class="section-header">
            <h3 class="section-title">Sản phẩm nổi bật</h3>
        </div>
        <div class="container">
            <div class="swiper product-slide">
                <div class="swiper-wrapper">
                    <?php foreach ($popular_product as $product):?>
                    <div class="swiper-slide">
                        <div class="product-item">
                            <div class="product-image">
                                <a href="<?=WEB_ROOT?>/products/<?=$product['slug']?>">
                                    <img src="<?=IMG_ROOT.$product['image']?>" alt="product image" class="product-img">
                                    <div class="product-image-overlay"></div>
                                </a>
                            </div>
                            <div class="product-info">
                                <h5 class="product-info-name"><?=$product['name']?></h5>
                                <div class="product-info-star">
                                    <div class="product-info-star-icon">
                                        <i
                                            class="bi <?=(getevaluate($product['id'])['point'] >= 1) ? 'bi-star-fill' : 'bi-star'?>"></i>
                                        <i
                                            class="bi <?=(getevaluate($product['id'])['point'] >= 2) ? 'bi-star-fill' : 'bi-star'?>"></i>
                                        <i
                                            class="bi <?=(getevaluate($product['id'])['point'] >= 3) ? 'bi-star-fill' : 'bi-star'?>"></i>
                                        <i
                                            class="bi <?=(getevaluate($product['id'])['point'] >= 4) ? 'bi-star-fill' : 'bi-star'?>"></i>
                                        <i
                                            class="bi <?=(getevaluate($product['id'])['point'] == 5) ? 'bi-star-fill' : 'bi-star'?>"></i>
                                    </div>
                                    <span><?=getevaluate($product['id'])['evaluate']?> Đánh giá</span>
                                </div>
                                <div class="product-info-sizes">
                                    <div class="product-info-sizes-title">Sizes: </div>
                                    <?php $result = getWarehouse($product['id']);
                                          $sizes = $result['size'];?>
                                    <?php foreach ($sizes as $size):?>
                                    <span><?=$size['name']?></span>
                                    <?php endforeach;?>
                                </div>
                                <div class="product-info-price">
                                    <?=handlePrice($product['price'])?>
                                    <?php if(!empty($product['old_price'])):?>
                                    <span><?=handlePrice($product['old_price'])?></span>
                                    <?php endif;?>
                                </div>
                            </div>
                            <div class="product-info-images">
                                <img class="product-info-image-item" src="<?=IMG_ROOT.$product['image']?>" height="30">
                                <?php $images = getProductImages($product['id']);?>
                                <?php for($i=0; ($i < 4 && $i < count($images)); $i++):?>
                                <img class="product-info-image-item" src="<?=IMG_ROOT.$images[$i]['image_name']?>"
                                    height="30">
                                <?php endfor;?>
                                <?php if(count($images) > 4):?>
                                <div class="product-info-image-item-more">+</div>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>
    <!-- new product -->
    <section class="section">
        <div class="section-header">
            <h3 class="section-title">Sản phẩm mới</h3>
        </div>
        <div class="container">
            <div class="swiper product-slide">
                <div class="swiper-wrapper">
                    <?php foreach ($new_product as $product):?>
                    <div class="swiper-slide">
                        <div class="product-item">
                            <div class="product-image">
                                <a href="<?=WEB_ROOT?>/products/<?=$product['slug']?>">
                                    <img src="<?=IMG_ROOT.$product['image']?>" alt="product image" class="product-img">
                                    <div class="product-image-overlay"></div>
                                </a>
                            </div>
                            <div class="product-info">
                                <h5 class="product-info-name"><?=$product['name']?></h5>
                                <div class="product-info-star">
                                    <div class="product-info-star-icon">
                                        <i
                                            class="bi <?=(getevaluate($product['id'])['point'] >= 1) ? 'bi-star-fill' : 'bi-star'?>"></i>
                                        <i
                                            class="bi <?=(getevaluate($product['id'])['point'] >= 2) ? 'bi-star-fill' : 'bi-star'?>"></i>
                                        <i
                                            class="bi <?=(getevaluate($product['id'])['point'] >= 3) ? 'bi-star-fill' : 'bi-star'?>"></i>
                                        <i
                                            class="bi <?=(getevaluate($product['id'])['point'] >= 4) ? 'bi-star-fill' : 'bi-star'?>"></i>
                                        <i
                                            class="bi <?=(getevaluate($product['id'])['point'] == 5) ? 'bi-star-fill' : 'bi-star'?>"></i>
                                    </div>
                                    <span><?=getevaluate($product['id'])['evaluate']?> Đánh giá</span>
                                </div>
                                <div class="product-info-sizes">
                                    <div class="product-info-sizes-title">Sizes: </div>
                                    <?php $result = getWarehouse($product['id']);
                                          $sizes = $result['size'];?>
                                    <?php foreach ($sizes as $size):?>
                                    <span><?=$size['name']?></span>
                                    <?php endforeach;?>
                                </div>
                                <div class="product-info-price">
                                    <?=handlePrice($product['price'])?>
                                    <?php if(!empty($product['old_price'])):?>
                                    <span><?=handlePrice($product['old_price'])?></span>
                                    <?php endif;?>
                                </div>
                            </div>
                            <div class="product-info-images">
                                <img class="product-info-image-item" src="<?=IMG_ROOT.$product['image']?>" height="30">
                                <?php $images = getProductImages($product['id']);?>
                                <?php for($i=0; ($i < 4 && $i < count($images)); $i++):?>
                                <img class="product-info-image-item" src="<?=IMG_ROOT.$images[$i]['image_name']?>"
                                    height="30">
                                <?php endfor;?>
                                <?php if(count($images) > 4):?>
                                <div class="product-info-image-item-more">+</div>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
        <div class="button-all">
            <a href="<?=WEB_ROOT?>/collections/san-pham-moi">Xem thêm</a>
        </div>
    </section>
    <!-- category trent -->
    <section class="section category-trent-section">
        <div class="section-header">
            <h3 class="section-title">Xu hướng</h3>
        </div>
        <div class="container">
            <div class="swiper category-trent">
                <div class="swiper-wrapper">
                    <?php foreach ($trent_categories as $key => $category): ?>
                    <div class="swiper-slide">
                        <div class="category-popular-item">
                            <div class="category-popular-image">
                                <a href="<?=WEB_ROOT?>/collections/<?=$category['slug']?>">
                                    <img src="<?=IMG_ROOT.$category['image']?>" alt="category image">
                                    <div class="category-popular-image-overlay"></div>
                                </a>
                            </div>
                            <div class="category-popular-content">
                                <h4 class="category-popular-content-name"><?=$category['name']?></h4>
                                <div class="category-popular-content-btn">
                                    <a href="<?=WEB_ROOT?>/collections/<?=$category['slug']?>">
                                        <?=$btn_text[$key]?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php if(count($trent_categories) > 3):?>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <?php else:?>
                <div class="swiper-button-next" style="visibility: hidden;"></div>
                <div class="swiper-button-prev" style="visibility: hidden;"></div>
                <?php endif;?>
            </div>
        </div>
    </section>
    <!-- OUTLET - SALE -->
    <section class="section">
        <div class="section-header">
            <h3 class="section-title">OUTLET - SALE 30% - 70%</h3>
        </div>
        <div class="container">
            <div class="swiper product-slide">
                <div class="swiper-wrapper">
                    <?php foreach ($outlet_sale as $product):?>
                    <div class="swiper-slide">
                        <div class="product-item">
                            <div class="product-image">
                                <a href="<?=WEB_ROOT?>/products/<?=$product['slug']?>">
                                    <img src="<?=IMG_ROOT.$product['image']?>" alt="product image" class="product-img">
                                    <div class="product-image-overlay"></div>
                                </a>
                            </div>
                            <div class="product-info">
                                <h5 class="product-info-name"><?=$product['name']?></h5>
                                <div class="product-info-star">
                                    <div class="product-info-star-icon">
                                        <i
                                            class="bi <?=(getevaluate($product['id'])['point'] >= 1) ? 'bi-star-fill' : 'bi-star'?>"></i>
                                        <i
                                            class="bi <?=(getevaluate($product['id'])['point'] >= 2) ? 'bi-star-fill' : 'bi-star'?>"></i>
                                        <i
                                            class="bi <?=(getevaluate($product['id'])['point'] >= 3) ? 'bi-star-fill' : 'bi-star'?>"></i>
                                        <i
                                            class="bi <?=(getevaluate($product['id'])['point'] >= 4) ? 'bi-star-fill' : 'bi-star'?>"></i>
                                        <i
                                            class="bi <?=(getevaluate($product['id'])['point'] == 5) ? 'bi-star-fill' : 'bi-star'?>"></i>
                                    </div>
                                    <span><?=getevaluate($product['id'])['evaluate']?> Đánh giá</span>
                                </div>
                                <div class="product-info-sizes">
                                    <div class="product-info-sizes-title">Sizes: </div>
                                    <?php $result = getWarehouse($product['id']);
                                          $sizes = $result['size'];?>
                                    <?php foreach ($sizes as $size):?>
                                    <span><?=$size['name']?></span>
                                    <?php endforeach;?>
                                </div>
                                <div class="product-info-price">
                                    <?=handlePrice($product['price'])?>
                                    <?php if(!empty($product['old_price'])):?>
                                    <span><?=handlePrice($product['old_price'])?></span>
                                    <?php endif;?>
                                </div>
                            </div>
                            <div class="product-info-images">
                                <img class="product-info-image-item" src="<?=IMG_ROOT.$product['image']?>" height="30">
                                <?php $images = getProductImages($product['id']);?>
                                <?php for($i=0; ($i < 4 && $i < count($images)); $i++):?>
                                <img class="product-info-image-item" src="<?=IMG_ROOT.$images[$i]['image_name']?>"
                                    height="30">
                                <?php endfor;?>
                                <?php if(count($images) > 4):?>
                                <div class="product-info-image-item-more">+</div>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
        <div class="button-all">
            <a href="<?=WEB_ROOT?>/collections/outlet-uu-dai-30-70">Xem thêm</a>
        </div>
    </section>
    <!-- blogs -->
    <section class="section blog-section">
        <div class="section-header">
            <h3 class="section-title"> Tin tức</h3>
        </div>
        <div class="container">
            <div class="swiper blog-slide">
                <div class="swiper-wrapper">
                    <?php foreach ($blogs as $blog): ?>
                    <div class="swiper-slide">
                        <div class="blog-item">
                            <div class="blog-image">
                                <a href="<?=WEB_ROOT?>/blog-detail/<?=$blog['slug']?>">
                                    <img src="<?=IMG_ROOT.$blog['image']?>" alt="blog image">
                                    <div class="blog-image-overlay"></div>
                                </a>
                            </div>
                            <div class="blog-info">
                                <a href="<?=WEB_ROOT?>/blog-detail/<?=$blog['slug']?>">
                                    <h5 class="blog-info-title"><?=$blog['title']?></h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
        <div class="button-all">
            <a href="<?=WEB_ROOT?>/blogs/all">Xem thêm</a>
        </div>
    </section>
    <!-- ICONDENIM CLUB -->
    <section class="section">
        <div class="section-header">
            <h3 class="section-title">#ICONDENIM CLUB</h3>
            <p class="section-desc">FASHION GALLERY</p>
        </div>
        <div class="container">
            <div class="swiper club-slide">
                <div class="swiper-wrapper">
                    <?php foreach ($club_images as $image): ?>
                    <div class="swiper-slide">
                        <div class="club-item">
                            <img src="<?=IMG_ROOT.$image['image']?>" alt="club image">
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>
    <!-- rules -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-4 col-md-6 col-xs-12">
                    <div class="rule">
                        <div class="rule-icon">
                            <img src="public/images/delivery.png" width="100">
                        </div>
                        <div class="rule-info">
                            <h5 class="rule-info-title">MIỄN PHÍ VẬN CHUYỂN ĐƠN TỪ 500K</h5>
                            <p class="rule-info-desc">
                                Miễn phí vận chuyển toàn quốc đơn từ 500K
                                Đơn dưới 500K, phí ship chỉ 20K.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-md-6 col-xs-12">
                    <div class="rule">
                        <div class="rule-icon">
                            <img src="public/images/support.png" width="70">
                        </div>
                        <div class="rule-info">
                            <h5 class="rule-info-title">HỖ TRỢ (09:00-22:00)</h5>
                            <p class="rule-info-desc">
                                Inbox Fanpage ICON DENIM
                                Hoặc gọi điện đến hotline 09.87.954.221
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-md-6 col-xs-12">
                    <div class="rule">
                        <div class="rule-icon">
                            <img src="public/images/replace-icon.png" width="100">
                        </div>
                        <div class="rule-info">
                            <h5 class="rule-info-title">ĐỔI HÀNG DỄ DÀNG</h5>
                            <p class="rule-info-desc">
                                Trong vòng 07 ngày (online), 5 ngày (cửa hàng).
                                Áp dụng với sản phẩm nguyên giá.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>