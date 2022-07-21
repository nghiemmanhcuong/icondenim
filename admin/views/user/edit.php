<div class="content">
    <form method="post" class="mt-3 form-add" enctype="multipart/form-data">
        <h3 class="text-center">Sửa người dùng</h3>
        <a href="?p=danh-sach-nguoi-dung" class="btn btn-success mb-3">
            <i class="bi bi-arrow-left"></i>
            Quay lại
        </a>
        <!-- name -->
        <div class="mb-2">
            <label class="form-label">Họ và tên</label>
            <input type="text" class="form-control" name="name" placeholder="Nhập họ và tên..."
                value="<?=$user['name'] ?? ''?>">
            <?php if(isset($errors['name'])):?>
            <div class="form-error"><?=$errors['name']?></div>
            <?php endif;?>
        </div>
        <!-- email -->
        <div class="mb-2">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="email" placeholder="Nhập email..." value="<?=$user['email'] ?? ''?>">
            <?php if(isset($errors['email'])):?>
            <div class="form-error"><?=$errors['email']?></div>
            <?php endif;?>
        </div>
        <!-- address -->
        <div class="mb-2">
            <label class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ..." value="<?=$user['address'] ?? ''?>">
            <?php if(isset($errors['address'])):?>
            <div class="form-error"><?=$errors['address']?></div>
            <?php endif;?>
        </div>
        <div class="mb-2 row">
            <!-- phone -->
            <div class="col-4">
                <label class="form-label">Số điện thoại</label>
                <input type="number" class="form-control" name="phone" placeholder="Nhập số điện thoại..." value="<?='0'.$user['phone'] ?? ''?>">
                <?php if(isset($errors['phone'])):?>
                <div class="form-error"><?=$errors['phone']?></div>
                <?php endif;?>
            </div>
            <!-- access -->
            <div class="col-4">
                <label class="form-label">Quyền truy cập</label>
                <select name="access" class="form-select">
                    <option <?=($user['access'] == 'user') ? 'selected' : ''?> value="user">Người dùng</option>
                    <option <?=($user['access'] == 'saff') ? 'selected' : ''?> value="saff">Nhân viên</option>
                    <option <?=($user['access'] == 'admin') ? 'selected' : ''?> value="admin">Quản trị viên</option>
                </select>
            </div>
            <!-- access -->
            <div class="col-4">
                <label class="form-label">Loại tài khoản</label>
                <select name="account_type" class="form-select">
                    <option <?=($user['account_type'] == 'regular') ? 'selected' : ''?> value="regular">Thường</option>
                    <option <?=($user['account_type'] == 'silver') ? 'selected' : ''?> value="silver">Bạc</option>
                    <option <?=($user['account_type'] == 'gold') ? 'selected' : ''?> value="gold">Vàng</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <!-- birthday -->
            <div class="col-6">
                <label class="form-label">Ngày tháng năm sinh<span>*</span></label>
                <input type="date" class="form-control" name="birthday" value="<?=$user['birthday'] ?? ''?>">
                <?php if(isset($errors['birthday'])):?>
                <div class="form-error"><?=$errors['birthday']?></div>
                <?php endif;?>
            </div>
            <!-- sex -->
            <div class="col-6">
                <label class="form-label d-block">Giới tính<span>*</span></label>
                <input id="male" type="radio" <?=($user['sex'] == 1) ? 'checked' : ''?> class="form-check-input" name="sex" value="1">
                <label for="male">Nam</label>
                <input id="female" type="radio" <?=($user['sex'] == 0) ? 'checked' : ''?> class="form-check-input" name="sex" value="0">
                <label for="female">Nữ</label>
                <?php if(isset($errors['sex'])):?>
                <div class="form-error"><?=$errors['sex']?></div>
                <?php endif;?>
            </div>
        </div>
        <!-- avatar -->
        <div class="mb-2">
            <label class="form-label">Ảnh đại diện</label>
            <input type="file" class="form-control" name="file">
            <?php if(isset($errors['avatar'])):?>
            <div class="form-error"><?=$errors['avatar']?></div>
            <?php endif;?>
            <img src="../uploads/<?=$user['avatar']?>" alt="avatar image" class="mt-2" height="100">
        </div>
        <input type="text" name="id" value="<?=$user['id']?>" hidden>
        <input type="text" name="avatar" value="<?=$user['avatar']?>" hidden>
        <div class="form-button mt-3">
            <button class="btn btn-primary">Lưu chỉnh sửa</button>
        </div>
    </form>
</div>