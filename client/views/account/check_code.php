<div class="auth">
    <form method="post" class="auth-form" id="form-check-code">
        <h3 class="auth-form-title">PHỤC HỒI MẬT KHẨU</h3>
        <div class="auth-form-group">
            <label class="auth-form-label">Nhập mã bảo mật<span>*</span></label>
            <input type="text" name="code" class="auth-form-input">
            <?php if(isset($error)):?>
            <div class="form-error"><?=$error?></div>
            <?php endif;?>
        </div>
        <div style="font-size:13px;color:#338dbc">
            Mã bảo mật xẽ tồn tại trong 90 giây
        </div>
        <div style="font-size:12px;color:red;" id="check-code-text"></div>
        <button class="auth-form-btn">Lấy lại mật khẩu</button>
        <div class="auth-form-register-link">
            <a href="<?=WEB_ROOT?>/account/dang-nhap">
                <i class="fa-solid fa-arrow-left" style="font-size:10px;padding-right:5px;"></i>
                Gửi lại mã
            </a>
        </div>
    </form>
</div>
