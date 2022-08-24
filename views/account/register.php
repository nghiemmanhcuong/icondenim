<div class="auth">
    <form method="post" class="auth-form" enctype="multipart/form-data">
        <h3 class="auth-form-title">TẠO TÀI KHOẢN</h3>
        <div class="auth-form-group">
            <label class="auth-form-label">Họ tên<span>*</span></label>
            <input type="text" name="name" class="auth-form-input" placeholder="Nhập họ tên của bạn"
                value="<?=$name ?? '' ?>">
            <?php if(isset($errors['name'])) :?>
            <div class="auth-form-error"><?=$errors['name']?></div>
            <?php endif;?>
        </div>
        <div class="auth-form-group">
            <label class="auth-form-label">Số điện thoại<span>*</span></label>
            <input type="text" name="phone" class="auth-form-input" placeholder="Số điện thoại của bạn"
                value="<?=$phone ?? '' ?>">
            <?php if(isset($errors['phone'])) :?>
            <div class="auth-form-error"><?=$errors['phone']?></div>
            <?php endif;?>
        </div>
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
        <div class="row">
            <div class="auth-form-group col-6 col-xs-12">
                <label class="auth-form-label">Ngày sinh<span>*</span></label>
                <input type="date" name="birthday" class="auth-form-input" placeholder="Ngày tháng năm sinh"
                    value="<?=$birthday ?? '' ?>">
                <?php if(isset($errors['birthday'])) :?>
                <div class="auth-form-error"><?=$errors['birthday']?></div>
                <?php endif;?>
            </div>
            <div class="auth-form-group col-6 col-xs-12">
                <label class="auth-form-label">Giới tính<span>*</span></label>
                <input <?=(isset($sex) && $sex == 1) ? 'checked' : ''?> type="radio" name="sex" value="1" id="male">
                <label style="font-size:12px;" for="male">Nam</label>
                <input <?=(isset($sex) && $sex == 0) ? 'checked' : ''?> type="radio" name="sex" value="0" id="female">
                <label style="font-size:12px;" for="female">Nữ</label>
                <?php if(isset($errors['sex'])) :?>
                <div class="auth-form-error"><?=$errors['sex']?></div>
                <?php endif;?>
            </div>
        </div>
        <div class="auth-form-group">
            <label class="auth-form-label">Ảnh đại diện<span style="font-size:12px;">(Không bắt buộc)</span></label>
            <input type="file" name="avatar" style="font-size:13px;border:none;">
            <?php if(isset($errors['avatar'])) :?>
            <div class="auth-form-error"><?=$errors['avatar']?></div>
            <?php endif;?>
        </div>
        <button class="auth-form-btn">Đăng ký</button>
        <div class="auth-form-register-link">
            <a href="<?=WEB_ROOT?>/account/dang-nhap">
                <i class="fa-solid fa-arrow-left" style="font-size:10px;padding-right:5px;"></i>Quay lại
            </a>
        </div>
    </form>
</div>