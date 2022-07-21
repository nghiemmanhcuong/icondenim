<div class="content">
    <form method="post" class="mt-3 form-add" enctype="multipart/form-data">
        <h3 class="text-center">Thêm người dùng</h3>
        <!-- message -->
        <?php if(isset($success)):?>
        <div class="alert alert-success position-relative">
            <?=$success?>
            <a href="?p=them-nguoi-dung">
                <i class="fa-solid fa-circle-xmark fs-5 position-absolute"></i>
            </a>
        </div>
        <?php endif;?>
        <!-- name -->
        <div class="mb-3">
            <label class="form-label">Họ và tên<span>*</span></label>
            <input type="text" class="form-control" name="name" placeholder="Nhập họ và tên..."
                value="<?=$name ?? ''?>">
            <?php if(isset($errors['name'])):?>
            <div class="form-error"><?=$errors['name']?></div>
            <?php endif;?>
        </div>
        <!-- email -->
        <div class="mb-3">
            <label class="form-label">Email<span>*</span></label>
            <input type="text" class="form-control" name="email" placeholder="Nhập email..." value="<?=$email ?? ''?>">
            <?php if(isset($errors['email'])):?>
            <div class="form-error"><?=$errors['email']?></div>
            <?php endif;?>
        </div>
        <!-- password -->
        <div class="mb-3">
            <label class="form-label">Mật khẩu<span>*</span></label>
            <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu..."
                value="<?=$password ?? ''?>">
            <?php if(isset($errors['password'])):?>
            <div class="form-error"><?=$errors['password']?></div>
            <?php endif;?>
        </div>
        <!-- address -->
        <div class="mb-3">
            <label class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ..." value="<?=$address ?? ''?>">
            <?php if(isset($errors['address'])):?>
            <div class="form-error"><?=$errors['address']?></div>
            <?php endif;?>
        </div>
        <div class="mb-3 row">
            <!-- phone -->
            <div class="col-6">
                <label class="form-label">Số điện thoại<span>*</span></label>
                <input type="number" class="form-control" name="phone" placeholder="Nhập số điện thoại..." value="<?=$phone ?? ''?>">
                <?php if(isset($errors['phone'])):?>
                <div class="form-error"><?=$errors['phone']?></div>
                <?php endif;?>
            </div>
            <!-- access -->
            <div class="col-6">
                <label class="form-label">Quyền truy cập<span>*</span></label>
                <select name="access" class="form-select">
                    <option value="">--Chọn--</option>
                    <option value="user">Người dùng</option>
                    <option value="saff">Nhân viên</option>
                    <option value="admin">Quản trị viên</option>
                </select>
                <?php if(isset($errors['access'])):?>
                <div class="form-error"><?=$errors['access']?></div>
                <?php endif;?>
            </div>
        </div>
        <div class="row mb-3">
            <!-- birthday -->
            <div class="col-6">
                <label class="form-label">Ngày tháng năm sinh<span>*</span></label>
                <input type="date" class="form-control" name="birthday" value="<?=$birthday ?? ''?>">
                <?php if(isset($errors['birthday'])):?>
                <div class="form-error"><?=$errors['birthday']?></div>
                <?php endif;?>
            </div>
            <!-- sex -->
            <div class="col-6">
                <label class="form-label d-block">Giới tính<span>*</span></label>
                <input id="male" type="radio" <?=(isset($sex) && $sex == 1) ? 'checked' : ''?> class="form-check-input" name="sex" value="1">
                <label for="male">Nam</label>
                <input id="female" type="radio" <?=(isset($sex) && $sex == 0) ? 'checked' : ''?> class="form-check-input" name="sex" value="0">
                <label for="female">Nữ</label>
                <?php if(isset($errors['sex'])):?>
                <div class="form-error"><?=$errors['sex']?></div>
                <?php endif;?>
            </div>
        </div>
        <!-- avatar -->
        <div class="mb-3">
            <label class="form-label">Ảnh đại diện</label>
            <input type="file" class="form-control" name="avatar">
            <?php if(isset($errors['avatar'])):?>
            <div class="form-error"><?=$errors['avatar']?></div>
            <?php endif;?>
        </div>
        <div class="form-button mt-3">
            <button class="btn btn-primary">Thêm người dùng</button>
        </div>
    </form>
</div>