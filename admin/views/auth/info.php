<div class="content">
    <form method="post" class="mt-3 form-add" enctype="multipart/form-data">
        <h3 class="text-center">Thông tin của bạn</h3>
        <!-- name -->
        <?php if(!isset($action)):?>
        <a href="?p=thong-tin-ca-nhan&t=sua" class="btn btn-success mb-3">
            <i class="fa-solid fa-gear"></i>
            Sửa thông tin
        </a>
        <?php else:?>
        <a href="?p=thong-tin-ca-nhan" class="btn btn-success mb-3">
            <i class="bi bi-arrow-left"></i>
            Quay lại
        </a>
        <?php endif;?>
        <div class="mb-2">
            <label class="form-label">Họ và tên</label>
            <input type="text" class="form-control" name="name" placeholder="Nhập họ và tên..."
                <?= (!isset($action)) ? 'readonly' : ''?> value="<?=$user['name'] ?? ''?>">
            <?php if(isset($errors['name'])):?>
            <div class="form-error"><?=$errors['name']?></div>
            <?php endif;?>
        </div>
        <!-- email -->
        <div class="mb-2">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="email" placeholder="Nhập email..."
                <?= (!isset($action)) ? 'readonly' : ''?> value="<?=$user['email'] ?? ''?>">
            <?php if(isset($errors['email'])):?>
            <div class="form-error"><?=$errors['email']?></div>
            <?php endif;?>
        </div>
        <!-- address -->
        <div class="mb-2">
            <label class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ..."
                <?= (!isset($action)) ? 'readonly' : ''?> value="<?=$user['address'] ?? ''?>">
            <?php if(isset($errors['address'])):?>
            <div class="form-error"><?=$errors['address']?></div>
            <?php endif;?>
        </div>
        <!-- phone -->
        <div class="mb-3">
            <label class="form-label">Số điện thoại</label>
            <input type="number" class="form-control" name="phone" placeholder="Nhập số điện thoại..."
                <?= (!isset($action)) ? 'readonly' : ''?> value="<?=$user['phone'] ?? ''?>">
            <?php if(isset($errors['phone'])):?>
            <div class="form-error"><?=$errors['phone']?></div>
            <?php endif;?>
        </div>
        <!-- avatar -->
        <div class="mb-2">
            <label class="form-label">Ảnh đại diện</label>
            <?php if(isset($action)):?>
            <input type="file" class="form-control" name="file">
            <?php if(isset($errors['avatar'])):?>
            <div class="form-error"><?=$errors['avatar']?></div>
            <?php endif;endif;?>
            <img src="../uploads/<?=$user['avatar']?>" alt="avatar image" class="mt-2" height="100">
        </div>
        <?php if(isset($action)):?>
        <input type="text" name="id" value="<?=$user['id']?>" hidden>
        <input type="text" name="avatar" value="<?=$user['avatar']?>" hidden>
        <div class="form-button mt-3">
            <button class="btn btn-primary">Lưu chỉnh sửa</button>
        </div>
        <?php endif;?>
    </form>
</div>