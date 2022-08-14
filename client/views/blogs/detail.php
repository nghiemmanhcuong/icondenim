<div class="blog-detail">
    <div class="container">
        <!-- breadcrumb -->
        <section class="products-nav">
            <nav>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?=WEB_ROOT?>" class="breadcrumb-link">Trang chủ</a>
                        <span style="font-size:10px;padding:0 10px;">/</span>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?=WEB_ROOT?>/blogs/<?=$blog_category['slug']?>" class="breadcrumb-link">
                            <?=$blog_category['name']?>
                        </a>
                        <span style="font-size:10px;padding:0 10px;">/</span>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="" class="breadcrumb-link"><?=$blog['title']?></a>
                    </li>
                </ul>
            </nav>
        </section>
        <!-- blog detail -->
        <section class="blog-detail-container">
            <h1 class="blog-detail-title"><?=$blog['title']?></h1>
            <div class="blog-detail-attributes">
                <div class="blog-detail-category">
                    <i class="fa-solid fa-book"></i>
                    <span><?=$blog_category['name']?></span>
                </div>
                <div class="blogs-date-time">
                    <i class="fa-solid fa-clock"></i>
                    <span><?=$blog['created_at']?></span>
                </div>
            </div>
            <div class="blog-detail-content">
                <?php echo html_entity_decode($blog['content']);?>
            </div>
        </section>
        <!-- blogs random -->
        <section class="section">
            <div class="section-header">
                <h3 class="section-title">Bài viết liên quan</h3>
            </div>
            <div>
                <div class="swiper blog-slide">
                    <div class="swiper-wrapper">
                        <?php foreach ($blog_random as $blog): ?>
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
    </div>
</div>