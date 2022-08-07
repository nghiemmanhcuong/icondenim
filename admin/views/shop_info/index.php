<?php
$hotline = validateInput($_POST['hotline']);
$logo = validateInput($_POST['logo']);
$email_lh = validateInput($_POST['email_lh']);
$contact = validateInput($_POST['contact']);
$consultant = validateInput($_POST['consultant']);
$headquaters = validateInput($_POST['headquaters']);
$email = validateInput($_POST['email']);
?>
<div class="content">
    <form method="post" style="width:70%;" class="mx-auto form-add">
        <h3 class="text-center mb-3">Thông tin shop trên website</h3>
        <div class="form-group mb-3">
            <label for="Hotline"> <strong>Hotline</strong> </label>
            <input type="text" name="hotline" value="<?= $shop_info['hotline'] ?>" class="form-control" id="Hotline">
            <?php if(isset($errors['hotline'])) : ?>
                <div class="form-error"><?=$errors['hotline']?></div>
            <?php endif;?>
        </div>
        <div class="form-group mb-3">
            <label for="Logo"><strong>Logo</strong></label>
            <input type="text" name="logo" value="<?= $shop_info['logo_image'] ?>" class="form-control" id="Logo">
            <?php if(isset($errors['logo'])) : ?>
                <div class="form-error"><?=$errors['logo']?></div>
            <?php endif;?>
        </div>
        <div class="form-group mb-3">
            <label for="email-lh"><strong>Email liên hệ</strong></label>
            <input type="text" name="email_lh" value="<?= $shop_info['email_contact'] ?>" class="form-control" id="email-lh">
            <?php if(isset($errors['email_lh'])) : ?>
                <div class="form-error"><?=$errors['email_lh']?></div>
            <?php endif;?>
        </div>
        <div class="form-group mb-3">
            <label for="lhbh"><strong>Liên hệ bán hàng</strong></label>
            <input type="text" name="contact" value="<?= $shop_info['co-operate_phone'] ?>" class="form-control" id="lhbh">
            <?php if(isset($errors['contact'])) : ?>
                <div class="form-error"><?=$errors['contact']?></div>
            <?php endif;?>
        </div>
        <div class="form-group mb-3">
            <label for="truso"><strong>Tư vấn bán hàng</strong></label>
            <input type="text" name="consultant" value="<?= $shop_info['sales_consultant_phone'] ?>" class="form-control" id="truso">
            <?php if(isset($errors['consultant'])) : ?>
                <div class="form-error"><?=$errors['consultant']?></div>
            <?php endif;?>
        </div>
        <div class="form-group mb-3">
            <label for="email"><strong>Trụ sở chính</strong></label>
            <input type="text" name="headquaters" value="<?= $shop_info['headquarters_address'] ?>" class="form-control" id="email">
            <?php if(isset($errors['headquaters'])) : ?>
                <div class="form-error"><?=$errors['headquaters']?></div>
            <?php endif;?>
        </div>
        <div class="form-group mb-3">
            <label for="email"><strong>Email</strong></label>
            <input type="text" name="email" value="<?= $shop_info['email'] ?>" class="form-control" id="email">
            <?php if(isset($errors['email'])) : ?>
                <div class="form-error"><?=$errors['email']?></div>
            <?php endif;?>
        </div>
        <div class="form-button">
            <button type="submit" class="btn btn-primary">Sửa thông tin</button>
            <button type="reset" class="btn btn-info">Reset</button>
        </div>
    </form>
</div>