<main class="blogs">
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
                        <a href="" class="breadcrumb-link"><?=$blog_category['name'] ?? 'Tất cả sản bài viết'?></a>
                    </li>
                </ul>
            </nav>
        </section>
        <section class="row">
            <!-- blog list -->
            <div class="col-9 col-sm-12">
                <div class="blogs-list">
                    <?php if(isset($all_blog) && count($all_blog) > 0):?>
                    <?php foreach ($all_blog as $blog):?>
                    <article class="blogs-item">
                        <div class="blogs-image">
                            <a href="<?=WEB_ROOT?>/blog-detail/<?=$blog['slug']?>">
                                <img src="<?=IMG_ROOT.$blog['image']?>" alt="">
                            </a>
                        </div>
                        <div class="blogs-content">
                            <h5 class="blogs-content-title">
                                <a href="<?=WEB_ROOT?>/blog-detail/<?=$blog['slug']?>"><?=$blog['title']?></a>
                            </h5>
                            <div class="blogs-attributes">
                                <div>
                                    <i class="fa-solid fa-user"></i>
                                    <span><?=$blog['author']?></span>
                                </div>
                                <div class="blogs-date-time">
                                    <i class="fa-solid fa-clock"></i>
                                    <span><?=$blog['created_at']?></span>
                                </div>
                            </div>
                            <div class="blogs-content-description"><?=$blog['description']?></div>
                        </div>
                    </article>
                    <?php endforeach;?>
                    <?php else:?>
                    <div>Không tìm thấy bài viết nào</div>
                    <?php endif;?>
                </div>
                <?php include_once('views/block/pagination.php');?>
            </div>
            <!-- new blogs -->
            <div class="col-3 col-sm-12">
                <h3 class="new-blogs-title">Bài viết mới nhất</h3>
                <?php if(isset($new_blogs) && count($new_blogs) > 0):?>
                <?php foreach ($new_blogs as $blog):?>
                <article class="new-blogs-item">
                    <div class="new-blogs-image">
                        <a href="<?=WEB_ROOT?>/blog-detail/<?=$blog['slug']?>">
                            <img src="<?=IMG_ROOT.$blog['image']?>" alt="">
                        </a>
                    </div>
                    <div class="new-blogs-content">
                        <h5 class="new-blogs-content-title">
                            <a href="<?=WEB_ROOT?>/blog-detail/<?=$blog['slug']?>">
                                <?=$blog['title']?>
                            </a>
                        </h5>
                        <div class="new-blogs-date">
                            <p><i class="fa-solid fa-book"></i></p>
                            <div class="new-blogs-date-time">
                                <i class="fa-solid fa-clock"></i>
                                <span><?=$blog['created_at']?></span>
                            </div>
                        </div>
                    </div>
                </article>
                <?php endforeach;?>
                <?php else:?>
                <div>Không tìm thấy bài viết mới nào</div>
                <?php endif;?>
            </div>
        </section>
    </div>
</main>