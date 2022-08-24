<div class="auth">
    <form method="post" class="auth-form">
        <h3 class="auth-form-title">PHỤC HỒI MẬT KHẨU</h3>
        <div class="auth-form-group">
            <label class="auth-form-label">Khôi phục bằng email<span>*</span></label>
            <input type="text" name="email" class="auth-form-input" placeholder="Nhập email của bạn">
            <?php if(isset($error)):?>
            <div class="form-error"><?=$error?></div>
            <?php endif;?>
        </div>
        <button class="auth-form-btn">Gửi lại mật khẩu</button>
        <div class="auth-form-register-link">
            <a href="<?=WEB_ROOT?>/account/dang-nhap">
                <i class="fa-solid fa-arrow-left" style="font-size:10px;padding-right:5px;"></i>Quay lại
            </a>
        </div>
    </form>
</div>
