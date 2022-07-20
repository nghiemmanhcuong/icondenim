<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?=WEB_ROOT.'/public/css/base.css'?>">
    <link rel="stylesheet" href="<?=WEB_ROOT.'/public/css/main.css'?>">
    <title>Document</title>
</head>

<body>
    <div class="auth" style="background-image:url('public/image/form-bg.jpeg')">
        <form class="auth-form" method="post">
            <h2 class="text-center fw-bold mb-4">Đổi mật khẩu</h2>
            <!-- message -->
            <?php if(isset($error)):?>
            <div class="alert alert-danger"><?=$error?></div>
            <?php endif;?>
            <?php if(isset($_GET['msg'])):?>
            <div class="alert alert-success"><?=$_GET['msg']?></div>
            <?php endif;?>
            <!-- email -->
            <?php if(!isset($_GET['t'])):?>
            <div class="mb-3">
                <label class="form-label auth-label">Nhập email của bạn</label>
                <input type="text" name="email" class="form-control auth-input" placeholder="Nhập email..."
                    value="<?=isset($email) ? $email : ''?>">
                <?php if(isset($errors['email'])):?>
                <div class="form-error"><?=$errors['email']?></div>
                <?php endif;?>
            </div>
            <?php endif;?>
            <!-- old password -->
            <?php if(!isset($_GET['t'])):?>
            <div class="mb-3">
                <label class="form-label auth-label">Mật khẩu cũ</label>
                <input type="password" name="old_password" class="form-control auth-input" placeholder="Nhập mật khẩu cũ...">
                <?php if(isset($errors['old_password'])):?>
                <div class="form-error"><?=$errors['old_password']?></div>
                <?php endif;?>
            </div>
            <?php endif;?>
            <!-- new password -->
            <div class="mb-3">
                <label class="form-label auth-label">Mật khẩu mới</label>
                <input type="password" name="new_password" class="form-control auth-input" placeholder="Nhập mật khẩu mới...">
                <?php if(isset($errors['new_password'])):?>
                <div class="form-error"><?=$errors['new_password']?></div>
                <?php endif;?>
            </div>
            <!-- retype new password -->
            <div class="mb-3">
                <label class="form-label auth-label">Nhập lại mật khẩu mới</label>
                <input type="password" name="retype_new_password" class="form-control auth-input" placeholder="Nhập lại mật khẩu mới...">
                <?php if(isset($errors['retype_new_password'])):?>
                <div class="form-error"><?=$errors['retype_new_password']?></div>
                <?php endif;?>
            </div>

            <?php if(!isset($_GET['t'])):?>
            <div class="auth-action">
                <a href="index.php" class="auth-action-link">
                    <i class="bi bi-arrow-left"></i>
                    Quay lại trang đăng nhập
                </a>
            </div>
            <?php endif;?>
            
            <div class="form-button mt-3">
                <button class="btn btn-primary">Đổi mật khẩu</button>
            </div>
        </form>
    </div>
</body>

</html>