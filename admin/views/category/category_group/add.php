<div class="content">
    <form method="post" class="form-add mt-3" enctype="multipart/form-data">
        <h3 class="text-center mb-3">Thêm nhóm sản phẩm</h3>
        <a href="?p=nhom-san-pham" class="btn btn-success mb-2" style="font-size:12px;">
            <i class="bi bi-arrow-left"></i>
            Danh sách nhóm sản phẩm
        </a>
        <?php if(isset($_GET['msg'])):?>
        <div class="alert alert-success position-relative">
            <?=$_GET['msg']?>
            <a href="?p=them-nhom-san-pham">
                <i class="fa-solid fa-circle-xmark fs-5 position-absolute"></i>
            </a>
        </div>
        <?php endif;?>
        <div class="mb-3">
            <label class="form-label">Tên nhóm sản phẩm<span>*</span></label>
            <input type="text" name="name" placeholder="Nhập tên nhóm sản phẩm" class="form-control">
            <?php if(isset($errors['name'])): ?>
            <div class="form-error"><?=$errors['name']?></div>
            <?php endif;?>
        </div>
        <div class="mb-3">
            <label class="form-label me-3">Nổi bật<span>*</span></label>
            <input class="form-check-input" type="radio" name="popular" value="1" id="popular">
            <label class="form-label me-2">Có</label>
            <input class="form-check-input" type="radio" name="popular" value="0" checked id="not_popular">
            <label class="form-label">Không</label>
        </div>
        <div class="mb-3">
            <label class="form-label me-3">Xu hướng<span>*</span></label>
            <input class="form-check-input" type="radio" name="trent" value="1" id="trent">
            <label class="form-label me-2">Có</label>
            <input class="form-check-input" type="radio" name="trent" value="0" checked id="not_trent">
            <label class="form-label">Không</label>
        </div>
        <div class="mb-3">
            <label class="form-label">Ảnh danh mục<span id="checked_text">(không bắt
                    buộc)</span></label>
            <input type="file" name="image" class="form-control">
            <?php if(isset($errors['image'])): ?>
            <div class="form-error"><?=$errors['image']?></div>
            <?php endif;?>
        </div>
        <div class="form-button">
            <button class="btn btn-primary" type="submit">Thêm nhóm sản phẩm</button>
        </div>
    </form>
</div>