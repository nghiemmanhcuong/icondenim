<div class="auth">
    <form method="post" class="auth-form">
        <h3 class="auth-form-title">ĐỔI MẬT KHẨU</h3>
        <div class="auth-form-group">
            <label class="auth-form-label">Mật khẩu mới<span>*</span></label>
            <div style="position:relative;">
                <input type="password" name="new_password" class="auth-form-input auth-form-input-password"
                    placeholder="Nhập mật khẩu mới">
                <i class="fa-solid fa-eye-slash auth-form-icon"></i>
            </div>
            <?php if(isset($errors['new_password'])):?>
            <div class="form-error"><?=$errors['new_password']?></div>
            <?php endif;?>
        </div>
        <div class="auth-form-group">
            <label class="auth-form-label">Nhập lại mật khẩu mới<span>*</span></label>
            <div style="position:relative;">
                <input type="password" name="retype_new_password" class="auth-form-input auth-form-input-password"
                    placeholder="Nhập lại mật khẩu mới">
                <i class="fa-solid fa-eye-slash auth-form-icon"></i>
            </div>
            <?php if(isset($errors['retype_new_password'])):?>
            <div class="form-error"><?=$errors['retype_new_password']?></div>
            <?php endif;?>
        </div>
        <button class="auth-form-btn">Đổi mật khẩu</button>
    </form>
</div>