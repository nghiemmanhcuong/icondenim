<div class="collections">
    <?php if(isset($products)) :?>
    <div class="collections-header">
        <h1 class="collections-header-title"><?=$title_category?></h1>
    </div>
    <div class="container">
        <!-- breadcrumb -->
        <div class="row collections-nav">
            <div class="col-8 col-md-6">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?=WEB_ROOT?>" class="breadcrumb-link">Trang chủ</a>
                        <span style="font-size:10px;padding:0 10px;">/</span>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?=WEB_ROOT?>/collections/<?=$slug?>" class="breadcrumb-link"><?=$title_category?></a>
                    </li>
                </ul>
            </div>
            <div class="col-4 col-md-6">
                <div class="total-product">
                    Hiển thị <?=$product_display?> sản phẩm trong <?=$total_product?> sản phẩm
                </div>
            </div>
        </div>
        <!-- filter -->
        <div class="collections-filter">
            <div class="row">
                <!-- main filter -->
                <div class="col-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="collections-filter-item">
                        <div class="collections-filter-title">
                            <span id="collections-filter-main-title">
                                <?php foreach ($filters['main'] as $filter):?>
                                <?php if(isset($field) && isset($sort) && "?sort_by=$field-$sort" == $filter['value']):?>
                                <span><?=$filter['title']?></span>
                                <?php else: continue;?>
                                <?php endif;?>
                                <?php endforeach;?>
                                <?php if(!isset($field) && !isset($sort)):?>
                                <span>Sắp xếp</span>
                                <?php endif;?>
                            </span>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                        <div class="collections-filter-list">
                            <ul>
                                <li>
                                    <label class="filter-item" for="cancel">
                                        <span class="collections-filter-label">Bỏ sắp xếp</span>
                                        <input type="radio" name="filter" value="?" id="cancel">
                                    </label>
                                </li>
                                <?php foreach ($filters['main'] as $filter):?>
                                <li>
                                    <label class="filter-item" for="<?= $filter['value']?>">
                                        <span class="collections-filter-label"><?=$filter['title']?></span>
                                        <input
                                            <?=(isset($field) && isset($sort) && "?sort_by=$field-$sort" == $filter['value']) ? 'checked' : ''?>
                                            type="radio" name="filter" value="<?=$filter['value']?>"
                                            id="<?=$filter['value']?>">
                                    </label>
                                </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- size filter -->
                <div class="col-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="collections-filter-item">
                        <div class="collections-filter-title">
                            <span>Kích thước</span>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                        <div class="collections-filter-list">
                            <ul>
                                <li>
                                    <label class="filter-item" for="cancel-size">
                                        <span class="collections-filter-label">Bỏ chọn</span>
                                        <input type="radio" name="filter"
                                            value="<?=(isset($_GET['color']) ? '?color='.$_GET['color'] : '?')?>"
                                            id="cancel-size">
                                    </label>
                                </li>
                                <?php foreach ($sizes as $size):?>
                                <li>
                                    <label class="filter-item" for="size-<?=$size['id']?>">
                                        <span class="collections-filter-label"><?=$size['name']?></span>
                                        <input
                                            <?=(isset($_GET['size']) && $_GET['size'] == $size['id']) ? 'checked' : ''?>
                                            type="radio" name="filter_size"
                                            value="<?=isset($_GET['color']) 
                                                ? '?size='.$size['id'].'&color='.$_GET['color'] : '?size='.$size['id']?>"
                                            id="size-<?=$size['id']?>">
                                    </label>
                                </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- color filter -->
                <div class="col-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="collections-filter-item">
                        <div class="collections-filter-title">
                            <span>Màu sắc</span>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                        <div class="collections-filter-list color">
                            <ul>
                                <li>
                                    <label class="filter-item" for="cancel-color">
                                        <span class="collections-filter-label">Bỏ chọn</span>
                                        <input type="radio" name="filter"
                                            value="<?=(isset($_GET['size']) ? '?size='.$_GET['size'] : '?')?>" id="cancel-color">
                                    </label>
                                </li>
                                <?php foreach ($colors as $color):?>
                                <li>
                                    <label class="filter-item" for="color-<?=$color['id']?>">
                                        <span class="collections-filter-label"><?=$color['name']?></span>
                                        <input
                                            <?=(isset($_GET['color']) && $_GET['color'] == $color['id']) ? 'checked' : ''?>
                                            type="radio" name="filter_color"
                                            value="<?=isset($_GET['size']) ? 
                                                '?color='.$color['id'].'&size='.$_GET['size'] : '?color='.$color['id']?>"
                                            id="color-<?=$color['id']?>">
                                    </label>
                                </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php if(isset($title)):?>
            <div style="font-size:14px;margin:5px 0;"><?=$title?></div>
            <?php endif;?>
        </div>
        <!-- product list -->
        <div class="row">
            <?php foreach ($products as $product):?>
            <div class="col-3 col-md-4 col-sm-6 col-xs-12">
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
                                <i class="bi <?=(getevaluate($product['id'])['point'] >= 1) ? 'bi-star-fill' : 'bi-star'?>"></i>
                                <i class="bi <?=(getevaluate($product['id'])['point'] >= 2) ? 'bi-star-fill' : 'bi-star'?>"></i>
                                <i class="bi <?=(getevaluate($product['id'])['point'] >= 3) ? 'bi-star-fill' : 'bi-star'?>"></i>
                                <i class="bi <?=(getevaluate($product['id'])['point'] >= 4) ? 'bi-star-fill' : 'bi-star'?>"></i>
                                <i class="bi <?=(getevaluate($product['id'])['point'] == 5) ? 'bi-star-fill' : 'bi-star'?>"></i>
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
                        <img class="product-info-image-item" src="<?=IMG_ROOT.$images[$i]['image_name']?>" height="30">
                        <?php endfor;?>
                        <?php if(count($images) > 4):?>
                        <div class="product-info-image-item-more">+</div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
        <?php if(count($products) > 0):?>
        <?php include_once('views/block/pagination.php');?>
        <?php endif;?>
    </div>
    <!-- not product -->
    <?php else:?>
    <div class="not-product">
        <div class="container">
            <div class="not-product-header">
                <h3 class="not-product-title">Không tìm thấy trang hoặc sản phẩm tìm kiếm</h3>
                <p class="not-product-desc">Bạn vui lòng quay lại trang chủ hoặc tham khảo danh sách dưới đây</p>
            </div>
            <div class="swiper product-slide">
                <h3 class="selling-product-title">Sản phẩm bán chạy</h3>
                <div class="swiper-wrapper">
                    <?php foreach ($selling_product as $product):?>
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
                                        <i class="bi <?=(getevaluate($product['id'])['point'] >= 1) ? 'bi-star-fill' : 'bi-star'?>"></i>
                                        <i class="bi <?=(getevaluate($product['id'])['point'] >= 2) ? 'bi-star-fill' : 'bi-star'?>"></i>
                                        <i class="bi <?=(getevaluate($product['id'])['point'] >= 3) ? 'bi-star-fill' : 'bi-star'?>"></i>
                                        <i class="bi <?=(getevaluate($product['id'])['point'] >= 4) ? 'bi-star-fill' : 'bi-star'?>"></i>
                                        <i class="bi <?=(getevaluate($product['id'])['point'] == 5) ? 'bi-star-fill' : 'bi-star'?>"></i>
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
    </div>
    <?php endif;?>
</div>
