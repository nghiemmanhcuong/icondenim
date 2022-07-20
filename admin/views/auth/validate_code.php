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
            <h2 class="text-center fw-bold mb-4">Xác thực</h2>
            <div class="mb-3">
                <label class="form-label auth-label">Nhập mã xác thực</label>
                <input type="text" name="code" class="form-control auth-input" placeholder="Nhập mã xác thực..."
                    value="<?=isset($code) ? $code : ''?>">
                <?php if(isset($error)):?>
                <div class="form-error"><?=$error?></div>
                <?php endif;?>
                <p class="my-3" style="color:blue;font-size:13px;">
                    Mã xác thực đã được gửi vào mail của bạn. <br>
                    Mã xác thực sẽ hết hạn trong <span id="code-time" style="color:red;">90</span> giây. <br>
                    <span id="code-text"></span> <br>
                </p>
            </div>
            <div class="auth-action">
                <a href="?p=quen-mat-khau" class="auth-action-link">
                    <i class="bi bi-arrow-left"></i>
                    Gửi lại mã
                </a>
            </div>
            <div class="form-button mt-3">
                <button class="btn btn-primary">Xác thực</button>
            </div>
        </form>
    </div>
    <script src="<?=WEB_ROOT.'/public/js/main.js'?>"></script>
    <script>
    /* validate code*/
    const codeTime = document.querySelector('#code-time');
    const codeText = document.querySelector('#code-text');
    let time = 90;
    const timeOut = setInterval(() => {
        time--;
        codeTime.innerText = time;
        if (time == 0) {
            clearInterval(timeOut);
            codeText.innerText = 'Mã xác thực đã hết hạn vui lòng gửi lại mã xác thực';
            codeText.style.color = 'red';
        }
    }, 1000);
    </script>
</body>

</html>