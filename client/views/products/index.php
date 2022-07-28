<div class="products">
    <div class="products-container">
        <!-- breadcrumb -->
        <div class="products-nav">
            <nav>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?=WEB_ROOT?>" class="breadcrumb-link">Trang chủ</a>
                        <span style="font-size:10px;padding:0 10px;">/</span>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?=WEB_ROOT?>/collections/san-pham-moi" class="breadcrumb-link">Sản phẩm mới</a>
                        <span style="font-size:10px;padding:0 10px;">/</span>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="breadcrumb-link"><?=$product['name']?></span>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- product info -->
        <form class="row form-buy-product" method="post">
            <div class="col-8 col-md-12 products-image-list">
                <div class="products-sub-image-list">
                    <div class="products-sub-image">
                        <img src="<?=IMG_ROOT.$product['image']?>">
                    </div>
                    <?php $images = getProductImages($product['id']);?>
                    <?php foreach ($images as $image):?>
                    <div class="products-sub-image">
                        <img src="<?=IMG_ROOT.$image['image_name']?>">
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="products-main-image" id="img-container">
                    <img src="<?=IMG_ROOT.$product['image']?>">
                    <div class="product-image-overlay"></div>
                </div>
            </div>
            <div class="col-4 col-md-12 products-info">
                <h1 class="products-name"><?=$product['name']?></h1>
                <div class="products-evaluate">
                    <div class="products-evaluate-star">
                        <i class="bi <?=($point >= 1) ? 'bi-star-fill' : 'bi-star'?>"></i>
                        <i class="bi <?=($point >= 2) ? 'bi-star-fill' : 'bi-star'?>"></i>
                        <i class="bi <?=($point >= 3) ? 'bi-star-fill' : 'bi-star'?>"></i>
                        <i class="bi <?=($point >= 4) ? 'bi-star-fill' : 'bi-star'?>"></i>
                        <i class="bi <?=($point == 5) ? 'bi-star-fill' : 'bi-star'?>"></i>
                    </div>
                    <span class="products-evaluate-title"><?=$product_reviews_count?> đánh giá</span>
                </div>
                <div class="products-price">
                    <?=handlePrice($product['price'])?>
                    <?php if(!empty($product['old_price'])):?>
                    <span><?=handlePrice($product['old_price'])?></span>
                    <?php endif;?>
                </div>
                <?php if(!empty($colors)):?>
                <div class="products-colors">
                    <div class="products-colors-title">Màu sắc:</div>
                    <div class="products-colors-list">
                        <?php foreach ($colors as $color):?>
                        <label class="products-colors-item <?=($color['id'] == $color_id) ? 'active' : ''?>"
                            for="color-<?=$color['id']?>"><?=$color['name']?>
                            <input <?=($color['id'] == $color_id) ? 'checked' : ''?> type="radio" name="color"
                                value="<?=$color['id']?>" id="color-<?=$color['id']?>" hidden>
                        </label>
                        <?php endforeach;?>
                    </div>
                </div>
                <?php endif;?>
                <?php if(!empty($sizes)):?>
                <div class="products-sizes">
                    <div class="products-sizes-title">Kích thước:</div>
                    <div class="products-sizes-list">
                        <?php foreach ($sizes as $key => $size):?>
                        <label class="products-sizes-item" for="size-<?=$size['id']?>"><?=$size['name']?>
                            <input <?=($key == 0) ? 'checked' : ''?> type="radio" name="size" value="<?=$size['id']?>"
                                id="size-<?=$size['id']?>" hidden>
                        </label>
                        <?php endforeach;?>
                    </div>
                </div>
                <?php endif;?>
                <?php if(isset($error)):?>
                <div class="product-alert warning">
                    <?=$error?>
                    <i class="fa-solid fa-circle-xmark product-alert-close"></i>
                </div>
                <?php endif;?>
                <?php if(isset($error_quantity)):?>
                <div class="product-alert-error show">
                    <div class="product-alert-error-content show">
                        <?= $error_quantity ?? '' ?>
                        <div class="product-alert-error-close">
                            Đồng ý
                        </div>
                    </div>
                </div>
                <?php endif;?>
                <div class="products-tutorial-size">
                    Hướng dẫn chọn size
                </div>
                <div class="products-quantity">
                    <div class="products-quantity-title">Số lượng:</div>
                    <div class="products-quantity-num">
                        <button type="button" class="products-quantity-minus">
                            <i class="fa-solid fa-minus"></i>
                        </button>
                        <div class="products-quantity-number">1</div>
                        <button type="button" class="products-quantity-plus">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?=$product['id']?>">
                <input type="hidden" name="quantity" id="product-quantity" value="1">
                <?php if(isset($success)):?>
                <div class="product-alert">
                    <?=$success?>
                    <i class="fa-solid fa-circle-xmark product-alert-close"></i>
                </div>
                <?php endif;?>
                <div class="products-form-btn">
                    <button type="submit" class="products-submit" name="add_cart">Thêm vào giỏ hàng</button>
                    <button type="submit" class="products-submit" name="buy_now">Mua ngay</button>
                </div>
            </div>
        </form>
        <!-- products policy -->
        <div class="products-policy row">
            <div class="col-4 col-md-6 col-sm-12">
                <h3 class="products-policy-title">THÔNG TIN SẢN PHẨM</h3>
                <div class="products-policy-desc">
                    <?=html_entity_decode($product['description'])?>
                </div>
            </div>
            <div class="col-4 col-md-6 col-sm-12">
                <h3 class="products-policy-title">ƯU ĐÃI MEMBER VIP</h3>
                <div class="products-policy-desc">
                    <p>
                        Vui lòng đăng kí tài khoản mua hàng để được tích điểm làm Member Vip: <br>
                        - Tài khoản Sliver được giảm 5% khi tích đủ 6tr <br>
                        - Tài khoản Gold được giảm 10% khi tích đủ 15tr <br>
                    </p>
                </div>
            </div>
            <div class="col-4 col-md-6 col-sm-12">
                <h3 class="products-policy-title">CHÍNH SÁCH ĐỔI TRẢ HÀNG</h3>
                <div class="products-policy-desc">
                    - Được kiểm tra hàng trước khi nhận hàng <br>
                    - Đổi hàng trong vòng 7 ngày kể từ khi nhận hàng đối với hàng mua online, 5 ngày đối với hàng mua
                    tại cửa hàng <br>
                    - Miễn phí đổi trả nếu lỗi sai sót từ phía ICON DENIM <br>
                    - Vui lòng gửi hàng Đổi hàng tại địa chỉ địa chỉ 17/6 Bùi Cẩm Hổ, Tân Thới Hòa, Tân Phú hoặc các chi
                    nhánh gần bạn nhất
                </div>
            </div>
        </div>
        <!-- rules -->
        <div class="row rules">
            <div class="col-4 col-md-6 col-sm-12">
                <div class="rule">
                    <div class="rule-icon">
                        <img src="..//public/images/delivery.png" width="50">
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
            <div class="col-4 col-md-6 col-sm-12">
                <div class="rule">
                    <div class="rule-icon">
                        <img src="../public/images/support.png" width="30">
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
            <div class="col-4 col-md-6 col-sm-12">
                <div class="rule">
                    <div class="rule-icon">
                        <img src="../public/images/replace-icon.png" width="50">
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
        <!-- evaluate -->
        <div class="evaluate">
            <h3 class="evaluate-title">Đánh giá sản phẩm</h3>
            <div class="row">
                <div class="col-6 col-sm-12 row evaluate-left">
                    <div class="col-6" style="border-right: 1px solid #ddd;">
                        <span class="evaluate-point"><?=$point?> / 5</span>
                        <div class="evaluate-stars">
                            <i class="bi <?=($point >= 1) ? 'bi-star-fill' : 'bi-star'?>"></i>
                            <i class="bi <?=($point >= 2) ? 'bi-star-fill' : 'bi-star'?>"></i>
                            <i class="bi <?=($point >= 3) ? 'bi-star-fill' : 'bi-star'?>"></i>
                            <i class="bi <?=($point >= 4) ? 'bi-star-fill' : 'bi-star'?>"></i>
                            <i class="bi <?=($point == 5) ? 'bi-star-fill' : 'bi-star'?>"></i>
                        </div>
                        <span style="font-size:12px;">Dựa trên <?=$product_reviews_count?> đánh giá</span>
                    </div>
                    <div class="col-6">
                        <div class="evaluate-star-item">
                            <div class="evaluate-star-item-icon">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <span class="evaluate-star-num">(<?=$five_star?>)</span>
                        </div>
                        <div class="evaluate-star-item">
                            <div class="evaluate-star-item-icon">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                            </div>
                            <span class="evaluate-star-num">(<?=$four_star?>)</span>
                        </div>
                        <div class="evaluate-star-item">
                            <div class="evaluate-star-item-icon">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                            </div>
                            <span class="evaluate-star-num">(<?=$three_star?>)</span>
                        </div>
                        <div class="evaluate-star-item">
                            <div class="evaluate-star-item-icon">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                            </div>
                            <span class="evaluate-star-num">(<?=$two_star?>)</span>
                        </div>
                        <div class="evaluate-star-item">
                            <div class="evaluate-star-item-icon">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                            </div>
                            <span class="evaluate-star-num">(<?=$one_star?>)</span>
                        </div>
                        <div class="evaluate-star-item">
                            <div class="evaluate-star-item-icon">
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                            </div>
                            <span class="evaluate-star-num">(0)</span>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-12 evaluate-right">
                    <div class="evaluate-comment-show">
                        <i class="fa-solid fa-comment"></i>
                        Viết đánh giá
                    </div>
                </div>
            </div>
            <!-- form evaluate -->
            <form class="row form-evaluate" method="post" enctype="multipart/form-data">
                <div class="col-4 col-md-6 col-sm-12">
                    <label class="form-evaluate-label">Tên</label>
                    <input class="form-evaluate-input" name="assessor_name" type="text" placeholder="Nhập tên của bạn"
                        value="<?=$_SESSION['user_client']['name'] ?? ''?>">
                    <?php if(isset($errors['assessor_name'])):?>
                    <div class="form-error"><?=$errors['assessor_name']?></div>
                    <?php endif;?>
                    <div class="form-error"></div>
                </div>
                <div class="col-4 col-md-6 col-sm-12">
                    <label class="form-evaluate-label">Email</label>
                    <input class="form-evaluate-input" name="assessor_email" type="text"
                        placeholder="Nhập email của bạn" value="<?=$_SESSION['user_client']['email'] ?? ''?>">
                    <?php if(isset($errors['assessor_email'])):?>
                    <div class="form-error"><?=$errors['assessor_email']?></div>
                    <?php endif;?>
                    <div class="form-error"></div>
                </div>
                <div class="col-4 col-md-6 col-sm-12">
                    <label class="form-evaluate-label">Số điện thoại</label>
                    <input class="form-evaluate-input" name="assessor_phone" type="text"
                        placeholder="Nhập số điện thoại của bạn" value="<?=$_SESSION['user_client']['phone'] ?? ''?>">
                    <?php if(isset($errors['assessor_phone'])):?>
                    <div class="form-error"><?=$errors['assessor_phone']?></div>
                    <?php endif;?>
                    <div class="form-error"></div>
                </div>
                <div class="col-12">
                    <label class="form-evaluate-label">Đánh giá</label>
                    <label class="star-label" for="star-1"><i class="bi bi-star-fill"></i></label>
                    <input type="radio" name="star" hidden id="star-1" value="1">
                    <label class="star-label" for="star-2"><i class="bi bi-star-fill"></i></label>
                    <input type="radio" name="star" hidden id="star-2" value="2">
                    <label class="star-label" for="star-3"><i class="bi bi-star-fill"></i></label>
                    <input type="radio" name="star" hidden id="star-3" value="3">
                    <label class="star-label" for="star-4"><i class="bi bi-star-fill"></i></label>
                    <input type="radio" name="star" hidden id="star-4" value="4">
                    <label class="star-label" for="star-5"><i class="bi bi-star-fill"></i></label>
                    <input type="radio" name="star" hidden id="star-5" value="5">
                </div>
                <div class="col-12">
                    <label class="form-evaluate-label">Tiêu đề</label>
                    <input class="form-evaluate-input" name="assessor_title" type="text"
                        placeholder="Nhập tiêu đề đánh giá của bạn">
                    <?php if(isset($errors['assessor_title'])):?>
                    <div class="form-error"><?=$errors['assessor_title']?></div>
                    <?php endif;?>
                    <div class="form-error"></div>
                </div>
                <div class="col-12">
                    <label class="form-evaluate-label">Nội dung</label>
                    <textarea style="height:100px;resize:none;" name="assessor_content" class="form-evaluate-input"
                        placeholder="Nhập tiêu đề đánh giá của bạn"></textarea>
                    <?php if(isset($errors['assessor_content'])):?>
                    <div class="form-error"><?=$errors['assessor_content']?></div>
                    <?php endif;?>
                    <div class="form-error"></div>
                </div>
                <div class="col-6">
                    <label class="form-evaluate-label">Hình ảnh (không bắt buộc)</label>
                    <input class="form-evaluate-input" type="file" name="assessor_image">
                    <?php if(isset($errors['assessor_image'])):?>
                    <div class="form-error"><?=$errors['assessor_image']?></div>
                    <?php endif;?>
                </div>
                <input type="hidden" name="product_id" value="<?=$product['id']?>">
                <div class="col-6 form-evaluate-btn">
                    <button type="submit" name="form_evaluate">Gửi đánh giá</button>
                </div>
            </form>
            <!-- evaluate list -->
            <div class="evaluate-list">
                <h3 class="evaluate-list-title">Đánh giá</h3>
                <div class="comment-list">
                    <?php if(!empty($product_reviews)):?>
                    <?php foreach ($product_reviews as $review):?>
                    <!-- comment item -->
                    <div class="comment-item">
                        <div class="comment-item-main">
                            <div class="comment-item-main-info">
                                <div class="comment-item-main-info-avatar">
                                    <span><?=handleAssessorName($review['assessor_name'])?></span>
                                </div>
                                <div class="comment-item-main-info-content">
                                    <div class="comment-item-main-info-stars">
                                        <i class="bi <?=($review['stars'] >= 1) ? 'bi-star-fill' : 'bi-star'?>"></i>
                                        <i class="bi <?=($review['stars'] >= 2) ? 'bi-star-fill' : 'bi-star'?>"></i>
                                        <i class="bi <?=($review['stars'] >= 3) ? 'bi-star-fill' : 'bi-star'?>"></i>
                                        <i class="bi <?=($review['stars'] >= 4) ? 'bi-star-fill' : 'bi-star'?>"></i>
                                        <i class="bi <?=($review['stars'] == 5) ? 'bi-star-fill' : 'bi-star'?>"></i>
                                    </div>
                                    <h5 class="comment-item-main-info-name"><?=$review['assessor_name']?></h5>
                                </div>
                                <div class="comment-item-main-info-time">4 ngày trước</div>
                            </div>
                            <div class="comment-item-main-content">
                                <h5 class="comment-item-main-content-title"><?=$review['title']?></h5>
                                <p class="comment-item-main-content-desc"><?=$review['content']?></p>
                                <?php if(!empty($review['image'])):?>
                                <img src="<?=IMG_ROOT.$review['image']?>" width="80">
                                <?php endif;?>
                            </div>
                            <div class="comment-item-main-action-btn">
                                Gửi trả lời
                                <i class="fa-solid fa-paper-plane"></i>
                            </div>
                        </div>
                        <!-- form answer -->
                        <form class="form-answer" method="post">
                            <div>
                                <input type="text" name="answer_name" class="form-answer-input"
                                    placeholder="Nhập tên của bạn">
                                <?php if(isset($errors['answer_name'])):?>
                                <div class="form-error"><?=$errors['answer_name']?></div>
                                <?php endif;?>
                            </div>
                            <div>
                                <textarea name="answer_content" class="form-answer-input"
                                    style="height:150px;resize:none;"
                                    placeholder="Nhập nội dung trả lời tại đây.Tối đa 1000 từ" cols="30"
                                    rows="10"></textarea>
                                <?php if(isset($errors['answer_content'])):?>
                                <div class="form-error"><?=$errors['answer_content']?></div>
                                <?php endif;?>
                            </div>
                            <input type="hidden" name="review_id" value="<?=$review['id']?>">
                            <div class="form-answer-btn">
                                <button type="submit" class="form-answer-submit" name="form_answer">Gửi câu trả lời của
                                    bạn</button>
                                <div class="form-answer-cancel">Huỷ bỏ</div>
                            </div>
                        </form>
                        <!-- comment answer -->
                        <?php $reviewAnswers = getAnswerReviews($review['id']);?>
                        <?php if(!empty($reviewAnswers)): ?>
                        <?php foreach ($reviewAnswers as $answer): ?>
                        <div class="comment-item-answer">
                            <span class="comment-item-answer-time">1 ngày trước</span>
                            <div class="comment-item-answer-name"><?=$answer['name']?></div>
                            <p class="comment-item-answer-content"><?=$answer['content']?></p>
                        </div>
                        <?php endforeach; endif;?>
                    </div>
                    <?php endforeach;?>
                    <?php else:?>
                    <div class="comment-item-empty" style="margin-top:5px;">Chưa có đánh giá nào cho sản phẩm này!!!</div>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <!-- random product -->
        <div class="random_product">
            <div class="section-header">
                <h3 class="section-title">Có thể bạn xẽ thích</h3>
            </div>
            <div class="swiper product-slide">
                <div class="swiper-wrapper">
                    <?php foreach ($random_products as $product):?>
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
</div>
