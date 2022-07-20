<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?=WEB_ROOT.'/public/css/base.css'?>">
    <link rel="stylesheet" href="<?=WEB_ROOT.'/public/css/main.css'?>">
    <title>Document</title>
</head>

<body>
    <div class="auth" style="background-image:url('public/image/form-bg.jpeg')">
        <form class="auth-form" method="post">
            <h2 class="text-center fw-bold mb-4">Đăng Nhập Hệ Thống</h2>
            <?php if(isset($_GET['msg'])):?>
            <div class="alert alert-success"><?=$_GET['msg']?></div>
            <?php endif;?>
            <div class="mb-3">
                <label class="form-label auth-label">Email đăng nhập</label>
                <input 
                    type="text" 
                    name="email" 
                    class="form-control auth-input" 
                    placeholder="Nhập email..."
                    value="<?=isset($email) ? $email : ''?>"
                >
                <?php if(isset($errors['email'])):?>
                <div class="form-error"><?=$errors['email']?></div>
                <?php endif;?>
            </div>
            <div class="mb-3">
                <label class="form-label auth-label">Mật khẩu</label>
                <input 
                    type="password" 
                    name="password" 
                    class="form-control auth-input" 
                    placeholder="Nhập Mật khẩu..."
                >
                <?php if(isset($errors['password'])):?>
                <div class="form-error"><?=$errors['password']?></div>
                <?php endif;?>
            </div>
            <div class="auth-action">
                <a href="?p=quen-mat-khau" class="auth-action-link">
                    <i class="bi bi-question-circle-fill"></i>
                    Quên mật khẩu
                </a>
            </div>
            <div class="auth-action">
                <a href="?p=doi-mat-khau" class="auth-action-link">
                    <i class="bi bi-arrow-counterclockwise"></i>
                    Đổi mật khẩu
                </a>
            </div>
            <div class="form-button mt-3">
                <button class="btn btn-primary">Đăng nhập</button>
            </div>
        </form>
    </div>
</body>
</html>