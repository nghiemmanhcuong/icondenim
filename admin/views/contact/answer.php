<div class="content">
    <h3 class="text-center fw-bold">Trả lời phản hồi</h3>
    <form class="form-add" method="post">
        <a href="?p=lien-he" class="btn btn-success mb-3">
            <i class="bi bi-arrow-left"></i>
            Quay lại
        </a>
        <div class="text-center fw-bold mb-3">Email:<?=$user_email?></div>
        <div class="mb-3">
            <label class="form-label">Tiêu đề</label>
            <input type="text" name="title" class="form-control" value="<?=$title ?? ''?>">
            <?php if(isset($errors['title'])): ?>
            <div class="form-error"><?=$errors['title']?></div>
            <?php endif;?>
        </div>
        <div class="mb-3">
            <label class="form-label">Nội dung</label>
            <textarea style="height:100px;" name="content" class="form-control"><?=$content ?? ''?></textarea>
            <?php if(isset($errors['content'])): ?>
            <div class="form-error"><?=$errors['content']?></div>
            <?php endif;?>
        </div>
        <div class="form-button">
            <button type="submit" class="btn btn-primary">Gửi</button>
        </div>
    </form>
</div>