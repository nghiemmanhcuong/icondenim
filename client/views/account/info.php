<div class="auth-info">
    <div class="container">
        <h1 class="auth-info-title">Tài khoản của bạn</h1>
        <div class="auth-info-container row">
            <div class="col-4 col-sm-12">
                <div class="auth-info-account">
                    <h3 class="auth-info-account-title">TÀI KHOẢN</h3>
                    <ul>
                        <li class="auth-info-account-item">
                            <a href="#" class="auth-info-account-link">
                                <i class="fa-solid fa-circle"></i>Thông tin tài khoản</a>
                        </li>
                        <?php if($_SESSION['user_client']['access'] == 'admin') : ?>
                        <li class="auth-info-account-item">
                            <a href="<?=SERVER_ROOT?>" class="auth-info-account-link">
                                <i class="fa-solid fa-circle"></i>Vào trang quản trị</a>
                        </li>
                        <?php endif;?>
                        <li class="auth-info-account-item">
                            <a href="?action=dang-xuat" class="auth-info-account-link">
                                <i class="fa-solid fa-circle"></i>Đăng xuất</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-8 col-sm-12">
                <div class="auth-info-detail">

                    <h3 class="auth-info-detail-title">THÔNG TIN TÀI KHOẢN</h3>
                    <?php if(isset($_SESSION['user_client'])):?>
                    <div class="auth-info-detail-wrapper">
                        <div class="auth-info-detail-item">
                            <span>Ảnh đại diện</span> <img src="<?=IMG_ROOT.$_SESSION['user_client']['avatar']?>"
                                width="50">
                        </div>
                        <div class="auth-info-detail-item">
                            <span>Họ và tên:</span> <?=$_SESSION['user_client']['name']?>
                        </div>
                        <div class="auth-info-detail-item">
                            <span>Email:</span> <?=$_SESSION['user_client']['email']?>
                        </div>
                        <div class="auth-info-detail-item">
                            <span>Số điện thoại:</span> <?='0'.$_SESSION['user_client']['phone']?>
                        </div>
                        <div class="auth-info-detail-item">
                            <span>Tài khoản:</span> <?=getAcountType($_SESSION['user_client']['account_type'])?>
                        </div>
                        <div class="auth-info-detail-item">
                            <span>Điểm tích luỹ:</span> <?=$_SESSION['user_client']['accumulated_points']?> điểm
                        </div>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>