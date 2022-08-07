<div class="content">
    <form method="post" style="width:70%;" class="mx-auto form-add">
        <h3 class="text-center mb-3">Thông tin shop trên website</h3>
        <div class="form-group mb-3">
            <label for="Hotline"> <strong>Hotline</strong> </label>
            <input type="text" value="<?= $shop_info['hotline'] ?>" class="form-control" id="Hotline">
        </div>
        <div class="form-group mb-3">
            <label for="Logo"><strong>Logo</strong></label>
            <input type="text" value="<?= $shop_info['logo_image'] ?>" class="form-control" id="Logo">
        </div>
        <div class="form-group mb-3">
            <label for="email-lh"><strong>Email liên hệ</strong></label>
            <input type="text" value="<?= $shop_info['email_contact'] ?>" class="form-control" id="email-lh">
        </div>
        <div class="form-group mb-3">
            <label for="lhbh"><strong>Liên hệ bán hàng</strong></label>
            <input type="text" value="<?= $shop_info['co-operate_phone'] ?>" class="form-control" id="lhbh">
        </div>
        <div class="form-group mb-3">
            <label for="truso"><strong>Tư vấn bán hàng</strong></label>
            <input type="text" value="<?= $shop_info['sales_consultant_phone'] ?>" class="form-control" id="truso">
        </div>
        <div class="form-group mb-3">
            <label for="email"><strong>Trụ sở chính</strong></label>
            <input type="text" value="<?= $shop_info['headquarters_address'] ?>" class="form-control" id="email">
        </div>
        <div class="form-group mb-3">
            <label for="email"><strong>Email</strong></label>
            <input type="text" value="<?= $shop_info['email'] ?>" class="form-control" id="email">
        </div>
        <div class="form-button">
            <button class="btn btn-primary">Sửa thông tin</button>
        </div>
    </form>
</div>