<div class="checkouts">
    <div class="container">
        <div class="row">
            <div class="col-7 col-md-6 col-sm-12">
                <div class="checkouts-right">
                    <!-- breadcrumb -->
                    <nav>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?=WEB_ROOT?>/cart" class="breadcrumb-link">Giỏ hàng</a>
                                <span style="padding:0 10px;">></span>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="" class="breadcrumb-link">Thông tin giao hàng</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- form checkouts -->
                    <form method="post" class="checkouts-form">
                        <h3 class="checkouts-form-title">Thông tin giao hàng</h3>
                        <?php if(isset($error)):?>
                        <div class="form-error"><?=$error?></div>
                        <?php endif;?>
                        <?php if(!isset($_SESSION['user_client'])):?>
                        <div class="checkouts-question">
                            Bạn đã có tài khoản? <a style="color:#338dbc;" href="<?=WEB_ROOT?>/account/dang-nhap">Đăng nhập</a>
                        </div>
                        <?php endif;?>
                        <div class="checkouts-form-group">
                            <input class="checkouts-form-input" type="text" name="name" placeholder="Họ và tên"
                                value="<?=$_SESSION['user_client']['name'] ?? ''?>">
                            <?php if(isset($errors['name'])):?>
                            <div class="form-error"><?=$errors['name']?></div>
                            <?php endif;?>
                        </div>
                        <div class="checkouts-form-group">
                            <input class="checkouts-form-input" type="text" name="phone" placeholder="Số điện thoại">
                            <?php if(isset($errors['phone'])):?>
                            <div class="form-error"><?=$errors['phone']?></div>
                            <?php endif;?>
                        </div>
                        <div class="checkouts-form-group">
                            <input class="checkouts-form-input" type="text" name="email" placeholder="Email"
                                value="<?=$_SESSION['user_client']['email'] ?? ''?>">
                            <?php if(isset($errors['email'])):?>
                            <div class="form-error"><?=$errors['email']?></div>
                            <?php endif;?>
                        </div>
                        <div class="checkouts-form-group">
                            <input class="checkouts-form-input" type="text" name="address" placeholder="Địa chỉ"
                                value="<?=$_SESSION['user_client']['address'] ?? ''?>">
                            <?php if(isset($errors['address'])):?>
                            <div class="form-error"><?=$errors['address']?></div>
                            <?php endif;?>
                        </div>
                        <div class="checkouts-form-group">
                            <textarea class="checkouts-form-textarea" name="message"
                                placeholder="Thông tin thêm"></textarea>
                            <?php if(isset($errors['message'])):?>
                            <div class="form-error"><?=$errors['message']?></div>
                            <?php endif;?>
                        </div>
                        <h3 class="checkouts-form-title">Phương thức vận chuyển</h3>
                        <div class="checkouts-form-transport">
                            <div class="checkouts-form-transport-text">
                                <i class="fa-solid fa-money-bill"></i>
                                <?php if(isset($total_price) && $total_price > 500000):?>
                                <p>Miễn phí ship đơn từ 500K</p>
                                <?php else:?>
                                <p>Phí ship đơn dưới 500.000₫</p>
                                <?php endif;?>
                            </div>
                            <span><?= isset($total_price) && $total_price > 500000 ? '0₫' : '20,000₫'?></span>
                        </div>
                        <h3 class="checkouts-form-title">Phương thức thanh toán</h3>
                        <!-- payment -->
                        <div class="checkouts-form-payment">
                            <div class="checkouts-form-payment-item">
                                <label class="checkouts-form-payment-group" for="after-receiving">
                                    <div class="checkouts-form-payment-check">
                                        <div class="checkouts-form-payment-check-circle"></div>
                                    </div>
                                    <div class="checkouts-form-payment-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                            viewBox="0 0 40 40" fill="none">
                                            <path
                                                d="M4 0.5H36C37.933 0.5 39.5 2.067 39.5 4V36C39.5 37.933 37.933 39.5 36 39.5H4C2.067 39.5 0.5 37.933 0.5 36V4C0.5 2.067 2.067 0.5 4 0.5Z"
                                                fill="white" stroke="#D9D9D9" />
                                            <path
                                                d="M10.197 9C9.55078 9 9.01738 9.53275 9.01738 10.1791V28.5044C9.01738 29.1507 9.55078 29.6835 10.197 29.6835H28.5213C29.1675 29.6835 29.7009 29.1507 29.7009 28.5044V10.1791C29.7009 9.53275 29.1675 9 28.5213 9H10.197Z"
                                                fill="#E4A862" />
                                            <path
                                                d="M12.9869 22.0051L26.0131 22.0051C26.1393 22.0051 26.2416 22.1074 26.2416 22.2335L26.2416 29.5263C26.2416 29.6525 26.1393 29.7548 26.0131 29.7548L12.9869 29.7548C12.8607 29.7548 12.7584 29.6525 12.7584 29.5263L12.7584 22.2336C12.7584 22.1073 12.8607 22.0051 12.9869 22.0051Z"
                                                fill="#1C92D3" />
                                            <path
                                                d="M25.1506 27.818C24.7456 27.9388 24.4257 28.2587 24.3048 28.6638C24.2886 28.7181 24.2397 28.7561 24.1829 28.7561L14.8171 28.7561C14.7603 28.7561 14.7114 28.7181 14.6952 28.6638C14.5744 28.2588 14.2545 27.9388 13.8494 27.818C13.795 27.8018 13.7571 27.7528 13.757 27.6961L13.757 24.0638C13.757 24.007 13.795 23.9581 13.8494 23.9419C14.2545 23.8211 14.5743 23.5012 14.6952 23.0961C14.7114 23.0417 14.7603 23.0038 14.817 23.0038L24.183 23.0038C24.2397 23.0038 24.2887 23.0417 24.3049 23.0961C24.4257 23.5011 24.7456 23.821 25.1506 23.9418C25.205 23.958 25.2429 24.007 25.2429 24.0637L25.2429 27.6961C25.2429 27.7528 25.205 27.8018 25.1506 27.818Z"
                                                fill="#40C0F2" />
                                            <path
                                                d="M19.5 23.9613C18.5859 23.9613 17.8449 24.7023 17.8449 25.6164C17.8449 26.5305 18.5859 27.2716 19.5 27.2716C20.4141 27.2716 21.1552 26.5305 21.1552 25.6164C21.1552 24.7023 20.4141 23.9613 19.5 23.9613Z"
                                                fill="#1C92D3" />
                                            <path
                                                d="M15.7832 9V13.9837C15.7832 14.0784 15.8211 14.1693 15.8883 14.236L16.9554 15.3058C17.0946 15.4456 17.3209 15.4456 17.4601 15.3058L18.2775 14.4884L19.0924 15.3058C19.2315 15.4456 19.4578 15.4456 19.597 15.3058L20.4118 14.4884L21.2293 15.3058C21.3685 15.4456 21.5948 15.4456 21.7339 15.3058L22.8011 14.236C22.8682 14.1693 22.9061 14.0784 22.9062 13.9837V9H15.7832Z"
                                                fill="#FFDFB9" />
                                            <path
                                                d="M27.961 25.0229L23.9707 25.0229C23.5109 25.0229 23.1381 25.2002 23.1381 25.66C23.0505 26.4724 24.7342 27.4343 25.9892 27.4343C26.5976 27.4343 27.2887 27.4343 27.6697 27.4341C27.8561 27.4341 28.0347 27.508 28.1682 27.6415L28.175 27.6483C28.3951 27.8685 28.4398 28.3395 28.2839 28.6089L26.6909 29.7455H26.0364L25.0182 29.7455L20.2182 29.7455C20.743 30.4027 23.2621 31.7334 23.4627 31.9887C23.6858 32.2726 24.0156 32.3752 24.375 32.4092L27.6651 32.7974C28.1394 32.8422 28.6158 32.74 29.0302 32.5049C29.9583 31.9784 31.6677 31.1148 32.4477 30.8716L35.1295 30.8716L35.1295 26.2286L33.8382 26.2286C33.5955 26.2286 33.3568 26.1673 33.1442 26.0503L31.3417 25.1559C30.7728 24.8776 30.1358 24.7687 29.5067 24.8422L27.961 25.0229Z"
                                                fill="#FCD7C3" />
                                            <path
                                                d="M29.5067 24.8423L27.961 25.0229L23.9708 25.0229C23.5109 25.0229 23.1382 25.2002 23.1382 25.66C23.1059 25.9586 23.3131 26.2774 23.6504 26.5613C24.1443 26.977 24.7761 27.1929 25.4217 27.1929L27.961 27.1929L29.5067 27.0122C30.1358 26.9387 30.7727 27.0476 31.3417 27.3259L33.1442 28.2203C33.3568 28.3373 33.5955 28.3987 33.8382 28.3987L35.1295 28.3987L35.1295 26.2287L33.8382 26.2287C33.5955 26.2287 33.3568 26.1673 33.1442 26.0503L31.3417 25.1559C30.7727 24.8776 30.1357 24.7688 29.5067 24.8423Z"
                                                fill="#FFCDAC" />
                                            <path
                                                d="M36.2489 25.8624L36.2489 31.2362C36.2489 31.4354 36.0874 31.5968 35.8883 31.5968L34.9426 31.5968C34.7434 31.5968 34.582 31.4354 34.582 31.2362L34.582 25.8623C34.582 25.6632 34.7434 25.5017 34.9426 25.5017L35.8883 25.5018C36.0874 25.5017 36.2489 25.6632 36.2489 25.8624Z"
                                                fill="#464C50" />
                                            <path
                                                d="M34.582 25.8624L34.582 27.685L36.2489 27.685L36.2489 25.8624C36.2489 25.6632 36.0875 25.5018 35.8883 25.5018L34.9427 25.5018C34.7435 25.5018 34.582 25.6632 34.582 25.8624Z"
                                                fill="#33393A" />
                                        </svg>
                                        <p>Thanh toán khi giao hàng (COD)</p>
                                    </div>
                                </label>
                                <input type="radio" name="payment" id="after-receiving" value="Thanh toán khi giao hàng"
                                    hidden>
                                <div class="checkouts-form-payment-desc">
                                    - Khách hàng được kiểm tra hàng trước khi nhận hàng. <br>
                                    - Freeship toàn quốc đơn từ 500K. Phí ship 20K cho đơn dưới 500K
                                </div>
                            </div>
                            <!-- end item -->
                            <div class="checkouts-form-payment-item">
                                <label class="checkouts-form-payment-group" for="transfer">
                                    <div class="checkouts-form-payment-check">
                                        <div class="checkouts-form-payment-check-circle"></div>
                                    </div>
                                    <div class="checkouts-form-payment-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                            viewBox="0 0 44 44" fill="none">
                                            <path
                                                d="M2.9975 8.25C4.20063 8.25 5.17688 9.22625 5.17688 10.4294L5.1755 10.8377H16.038C17.5285 10.8377 18.2504 11.2585 19.3724 12.6802L19.5745 12.9415L21.7882 16.0146H41.6102C42.9302 16.0146 44 17.105 44 18.4511V34.2843C44 35.6304 42.9302 36.7207 41.6102 36.7207H15.3312C14.0112 36.7207 12.9429 35.6304 12.9429 34.2843L12.9415 27.0641H11.044C9.9055 27.0641 8.82063 26.5457 7.81275 25.6987C7.5845 25.5062 7.37138 25.3069 7.17338 25.1034L6.82963 24.7308L6.74713 24.6345H5.13012C4.92387 25.6245 4.04663 26.367 2.9975 26.367H2.17938C0.97625 26.367 0 25.3907 0 24.1876V10.4294C0 9.22625 0.97625 8.25 2.17938 8.25H2.9975V8.25ZM41.5195 17.3085H16.7296L20.8203 21.032C21.9024 22.0165 21.2809 23.3228 19.8935 23.9951C18.689 24.5795 17.2109 24.5974 16.0352 23.8686L15.8043 23.7133L14.234 22.2846V34.2196C14.234 34.8851 14.7661 35.4269 15.422 35.4269H41.5195C42.1754 35.4269 42.7061 34.8851 42.7061 34.2182V18.5158C42.7061 17.8503 42.1754 17.3085 41.5195 17.3085V17.3085ZM5.1755 23.3406H7.38375L7.62025 23.661L7.75913 23.8287L7.85537 23.9387C8.08912 24.2 8.35312 24.464 8.64325 24.7088C9.361 25.311 10.098 25.6891 10.8075 25.7593L11.0412 25.7702H12.9401V22.1568H12.0794C10.6494 22.1568 9.63462 21.6645 9.02825 20.8106L8.9045 20.6223C8.57587 20.0791 8.44525 19.5319 8.41775 18.9929L8.41225 18.7619H9.70475C9.70475 19.1606 9.78313 19.5745 10.0128 19.9526C10.329 20.4779 10.8859 20.8051 11.8167 20.856L12.078 20.8629H14.5943L16.621 22.7109C17.3539 23.2444 18.4456 23.2595 19.3297 22.8305C20.0172 22.4964 20.1657 22.1842 19.9499 21.989L15.5224 17.9602L15.5279 16.379V16.0146L20.2661 16.0174L18.6024 13.7101C17.5931 12.386 17.1875 12.1192 16.038 12.1192H5.1755V23.3406V23.3406ZM2.9975 9.34037H2.17938C1.62388 9.34037 1.166 9.75562 1.09863 10.2932L1.09037 10.4307V24.1863C1.09037 24.7418 1.50562 25.201 2.04325 25.2684L2.18075 25.2766H2.9975C3.553 25.2766 4.01088 24.8614 4.07825 24.3237L4.0865 24.1863V10.4294C4.0865 9.87388 3.67125 9.416 3.13363 9.34863L2.99612 9.34037H2.9975Z"
                                                fill="#242424" />
                                            <path
                                                d="M28.4707 32.838C32.0444 32.838 34.9415 29.9409 34.9415 26.3672C34.9415 22.7935 32.0444 19.8965 28.4707 19.8965C24.8971 19.8965 22 22.7935 22 26.3672C22 29.9409 24.8971 32.838 28.4707 32.838Z"
                                                fill="#0D5CB6" />
                                            <path
                                                d="M29.6916 26.1566L27.5686 25.6451C27.2524 25.5695 27.0324 25.3234 27.0324 25.0484C27.0324 24.7046 27.3624 24.4269 27.7694 24.4269H29.0963C29.3919 24.4269 29.6738 24.5052 29.9089 24.6496C30.0175 24.7142 30.1701 24.6936 30.2636 24.6139L30.6734 24.2674C30.7999 24.1615 30.7793 23.9882 30.6376 23.8961C30.1976 23.6115 29.6614 23.4561 29.0963 23.4561H29.0454V22.7274C29.0454 22.5954 28.9175 22.4854 28.7566 22.4854H28.1819C28.0238 22.4854 27.8945 22.594 27.8945 22.7274V23.4561H27.768C26.668 23.4561 25.7853 24.2536 25.8898 25.1996C25.964 25.872 26.5745 26.4165 27.3445 26.6021L29.3726 27.0902C29.6875 27.1659 29.9089 27.412 29.9089 27.687C29.9089 28.0307 29.5775 28.3085 29.1719 28.3085H27.845C27.5494 28.3085 27.2675 28.2315 27.031 28.0871C26.9238 28.0211 26.7725 28.0431 26.6776 28.1215L26.2679 28.468C26.1414 28.5739 26.162 28.7471 26.3023 28.8392C26.7436 29.1252 27.2799 29.2792 27.845 29.2792H27.8945V30.008C27.8945 30.1414 28.0238 30.25 28.1833 30.25H28.758C28.9161 30.25 29.0454 30.1414 29.0454 30.008V29.2792H29.0935C29.9144 29.2792 30.6885 28.8667 30.9525 28.2122C31.3183 27.313 30.6913 26.3986 29.6903 26.1566H29.6916Z"
                                                fill="white" />
                                        </svg>
                                        <p>Chuyển khoản qua ngân hàng</p>
                                    </div>
                                </label>
                                <input type="radio" name="payment" id="transfer" value="Chuyển khoản qua ngân hàng"
                                    hidden>
                                <div class="checkouts-form-payment-desc">
                                    - Quý khách vui lòng thanh toán qua tài khoản: Nghiêm mạnh cường;<br>
                                    Số TK: 22186937; Ngân Hàng Techcomback Chi nhánh hà nội<br>
                                    - NV CSKH sẽ gọi điện thoại xác nhận với khách hàng sau khi khách hàng đặt hàng.
                                </div>
                            </div>
                            <!-- end item -->
                        </div>
                        <?php if(isset($errors['payment'])):?>
                        <div class="form-error"><?=$errors['payment']?></div>
                        <?php endif;?>
                        <div class="checkouts-actions">
                            <a href="<?=WEB_ROOT?>/cart">
                                <i class="fa-solid fa-bag-shopping"></i>
                                Giỏ hàng
                            </a>
                            <button class="checkouts-actions-submit" type="submit" name="buy">Hoàn tất đơn hàng</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- checkouts products -->
            <div class="col-5  col-md-6 col-sm-12 checkouts-products-wrapper">
                <div class="checkouts-products">
                    <?php if(!empty($_SESSION['cart_products'])):?>
                    <?php foreach ($_SESSION['cart_products'] as $item):?>
                    <div class="checkouts-products-item">
                        <div style="display:flex;align-items:center;">
                            <div class="checkouts-products-img">
                                <img src="<?=IMG_ROOT.$item['product_image']?>" width="60">
                                <div class="checkouts-products-quantity"><?=$item['quantity']?></div>
                            </div>
                            <div class="checkouts-products-info">
                                <div class="checkouts-products-name"><?=$item['product_name']?></div>
                                <div class="checkouts-products-attributes">
                                    <span><?=getColor($item['color'])?></span>
                                    <span style="font-size:10px;">/</span>
                                    <span><?=getSize($item['size'])?></span>
                                </div>
                            </div>
                        </div>
                        <div class="checkouts-products-price">
                            <?=number_format($item['product_price'],0,',','.')?>₫
                        </div>
                    </div>
                    <?php endforeach; endif;?>
                    <div class="checkouts-code">
                        <form method="post" class="checkouts-code-form">
                            <input type="text" class="checkouts-code-input" placeholder="Mã giảm giá">
                            <button class="checkouts-code-sunmit">Sử dụng</button>
                        </form>
                    </div>
                    <div class="checkouts-member">
                        <div class="checkouts-member-title">
                            Khách hàng thân thiết
                            <?php if(isset($_SESSION['user_client']) && $_SESSION['user_client']['accumulated_points'] < 60):?>
                            <div class="checkouts-member-desc">
                                (Đạt 60 điểm thưởng giảm 5% mỗi đơn hàng)
                                <div class="checkouts-member-desc-link">
                                    <a href="<?=WEB_ROOT?>/pages/membership">
                                        Xem thêm
                                    </a>
                                </div>
                            </div>
                            <?php elseif(isset($_SESSION['user_client']) && $_SESSION['user_client']['accumulated_points'] < 150):?>
                            <div class="checkouts-member-desc">
                                (Đạt 150 điểm thưởng giảm 10% mỗi đơn hàng)
                            </div>
                            <?php endif;?>
                        </div>
                        <?php if(isset($_SESSION['user_client'])):?>
                        <div class="checkouts-member-text">
                            <div class="checkouts-member-icon">
                                <i class="fa-solid fa-crown"></i>
                            </div>
                            Member • <?=$_SESSION['user_client']['accumulated_points'] ?? '0'?> điểm thưởng
                        </div>
                        <?php else:?>
                        <a href="<?=WEB_ROOT?>/account/dang-nhap" class="checkouts-member-btn">Đăng nhập</a>
                        <?php endif;?>
                    </div>
                    <div class="checkouts-price">
                        <div class="checkouts-price-block">
                            <span>Tạm tính</span>
                            <p><?=number_format($total_price,0,',','.')?>₫</p>
                        </div>
                        <?php if(isset($_SESSION['user_client']) && $_SESSION['user_client']['accumulated_points'] >= 60):?>
                        <div class="checkouts-price-block">
                            <span>Khách hàng thân thiết</span>
                            <p>-<?=getDiscountMember($_SESSION['user_client']['accumulated_points']) ?? '0'?>%</p>
                        </div>
                        <?php endif;?>
                        <div class="checkouts-price-block">
                            <span>Phí vận chuyển</span>
                            <p><?= isset($total_price) && $total_price > 500000 ? '0₫' : '20,000₫'?></p>
                        </div>
                    </div>
                    <div class="checkouts-total">
                        <div class="checkouts-total-block">
                            <span>Tổng cộng</span>
                            <p><span>VND</span> <?=number_format($new_total_price,0,',','.') ?? ''?>₫</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>