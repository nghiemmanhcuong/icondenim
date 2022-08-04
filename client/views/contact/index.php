<div class="contact">
    <div class="container">
        <h1 class="contact-title">Liên hệ với chúng tôi</h1>
        <div class="row">
            <!-- contact info -->
            <div class="col-4 col-md-12">
                <div class="contact-info">
                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div class="contact-info-content">
                            <h5 class="contact-info-content-title">Trụ sở chính</h5>
                            <p class="contact-info-content-desc">
                                12-12Bis, Đường CMT8, Phường Bến Thành, Quận 1, Tp. Hồ Chí Minh.
                            </p>
                        </div>
                    </div>
                    <!-- end item -->
                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="contact-info-content">
                            <h5 class="contact-info-content-title">Email</h5>
                            <p class="contact-info-content-desc">
                                <a href="mailto:nghiemmanhcuong98@gmail.com">
                                    nghiemmanhcuong98@gmail.com
                                </a>
                            </p>
                        </div>
                    </div>
                    <!-- end item -->
                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div class="contact-info-content">
                            <h5 class="contact-info-content-title">Mua hàng online</h5>
                            <p class="contact-info-content-desc">
                                <a href="tel:0987954221">
                                    (+84)987.954.221
                                </a>
                            </p>
                        </div>
                    </div>
                    <!-- end item -->
                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <i class="fa-solid fa-headphones"></i>
                        </div>
                        <div class="contact-info-content">
                            <h5 class="contact-info-content-title">Chăm sóc khách hàng</h5>
                            <p class="contact-info-content-desc">
                                <a href="mailto:cskh@icondenim.com">
                                    cskh@icondenim.com
                                    <span>Thứ Hai đến Thứ Bảy, từ 8:00 đến 17:30</span>
                                </a>
                            </p>
                        </div>
                    </div>
                    <!-- end item -->
                </div>
            </div>
            <!-- contact form -->
            <div class="col-8 col-md-12">
                <form method="post" class="contact-form">
                    <div class="contact-form-header">
                        <h3 class="contact-form-title">Contact to ICONDENIM</h3>
                        <p class="contact-form-desc">
                            Chúng tôi sẵn sàng trợ giúp và trả lời bất kỳ câu hỏi nào của bạn. Hãy cho chúng tôi biết về
                            vấn đề của bạn để chúng tôi có thể trợ giúp bạn nhanh hơn. Chúng tôi mong chờ góp ý từ bạn.
                        </p>
                        <?php if(isset($success)):?>
                        <div class="contact-form-success">
                            <?=$success?>
                            <div class="contact-form-success-close">
                                <i class="fa-solid fa-circle-xmark"></i>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="col-6 col-sm-12">
                            <div class="contact-form-group">
                                <input type="text" name="name" placeholder="Họ và Tên" value="<?=$name ?? ''?>">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <?php if(isset($errors['name'])):?>
                            <div class="form-error"><?=$errors['name']?></div>
                            <?php endif;?>
                        </div>
                        <div class="col-6 col-sm-12">
                            <div class="contact-form-group">
                                <input type="text" name="phone" placeholder="Số điện thoại" value="<?=$phone ?? ''?>">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <?php if(isset($errors['phone'])):?>
                            <div class="form-error"><?=$errors['phone']?></div>
                            <?php endif;?>
                        </div>
                        <div class="col-6 col-sm-12">
                            <div class="contact-form-group">
                                <input type="text" name="email" placeholder="Email" value="<?=$email ?? ''?>">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <?php if(isset($errors['email'])):?>
                            <div class="form-error"><?=$errors['email']?></div>
                            <?php endif;?>
                        </div>
                        <div class="col-6 col-sm-12">
                            <div class="contact-form-group">
                                <input type="text" name="title" placeholder="Tiêu đề" value="<?=$title ?? ''?>">
                                <i class="fa-solid fa-book"></i>
                            </div>
                            <?php if(isset($errors['title'])):?>
                            <div class="form-error"><?=$errors['title']?></div>
                            <?php endif;?>
                        </div>
                        <div class="col-12">
                            <div class="contact-form-group textarea">
                                <textarea name="content" placeholder="Nội dung"><?=$content ?? ''?></textarea>
                                <i class="fa-solid fa-comment-dots"></i>
                            </div>
                            <?php if(isset($errors['content'])):?>
                            <div class="form-error"><?=$errors['content']?></div>
                            <?php endif;?>
                        </div>
                    </div>
                    <button type="submit" class="contact-form-btn">Gửi</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    const contactFormSuccessClose = document.querySelector('.contact-form-success-close');
    contactFormSuccessClose.onclick = () => {
        contactFormSuccessClose.parentElement.style.display = 'none';
    }
</script>