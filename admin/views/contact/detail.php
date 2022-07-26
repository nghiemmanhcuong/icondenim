<div class="content">
    <h3 class="text-center fw-bold">Chi tiết liên hệ</h3>
    <a href="?p=lien-he" class="btn btn-success mb-3">
        <i class="bi bi-arrow-left"></i>
        Quay lại
    </a>
    <div class="contact">
        <div class="text-center fw-bold mb-3">
            Họ và tên:<?=$contact['user_name']?>
        </div>
        <div class="fw-bold">
            <span>Tiêu đề:</span>
        </div>
        <p class="text-center"><?=$contact['title']?></p>
        <div class="fw-bold">
            <span>Nội dung:</span>
        </div>
        <p class="text-center"><?=$contact['content']?></p>
    </div>
</div>
<style>
    .contact {
        width: 50%;
        margin-left: auto;
        margin-right: auto;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
        border-radius: 5px;
        margin-top: 30px;
        padding: 15px;
    }
</style>