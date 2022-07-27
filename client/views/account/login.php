<div class="auth">
    <form method="post" class="auth-form">
        <h3 class="auth-form-title">ĐĂNG NHẬP</h3>
        <?php if(isset($_GET['msg'])): ?>
        <div class="auth-alert">
            <?=$_GET['msg']?>
            <i class="fa-solid fa-circle-xmark auth-alert-close"></i>
        </div>
        <?php endif; ?>
        <div class="auth-form-group">
            <label class="auth-form-label">Email<span>*</span></label>
            <input type="text" name="email" class="auth-form-input" placeholder="Nhập email của bạn"
                value="<?=$email ?? '' ?>">
            <?php if(isset($errors['email'])) :?>
            <div class="auth-form-error"><?=$errors['email']?></div>
            <?php endif;?>
        </div>
        <div class="auth-form-group">
            <label class="auth-form-label">Mật khẩu<span>*</span></label>
            <div style="position:relative;">
                <input type="password" name="password" class="auth-form-input auth-form-input-password"
                    placeholder="Nhập mật khẩu của bạn">
                <i class="fa-solid fa-eye-slash auth-form-icon"></i>
            </div>
            <?php if(isset($errors['password'])) :?>
            <div class="auth-form-error"><?=$errors['password']?></div>
            <?php endif;?>
        </div>
        <button class="auth-form-btn">Đăng nhập</button>
        <div class="auth-form-forgot-pass">
            <a href="<?=WEB_ROOT?>/account/khoi-phuc-tai-khoan">Quên mật khẩu?</a>
        </div>
        <div class="auth-form-register-link">
            <a href="<?=WEB_ROOT?>/account/dang-ky">Đăng ký</a>
        </div>
    </form>
</div>