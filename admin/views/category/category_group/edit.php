<div class="content">
    <form method="post" class="form-add mt-3" enctype="multipart/form-data">
        <h3 class="text-center mb-3">Sửa nhóm sản phẩm</h3>
        <a href="?p=nhom-san-pham" class="btn btn-success mb-3">
            <i class="bi bi-arrow-left"></i>
            Quay lại
        </a>
        <div class="mb-3">
            <label class="form-label">Tên nhóm sản phẩm</label>
            <input type="text" name="name" class="form-control" value="<?=$category_group['name']?>">
            <?php if(isset($errors['name'])): ?>
            <div class="form-error"><?=$errors['name']?></div>
            <?php endif;?>
        </div>
        <div class="mb-3">
            <label class="form-label me-3">Nổi bật<span>*</span></label>
            <input class="form-check-input" type="radio" name="popular" value="1" id="popular"
                <?=$category_group['is_popular'] == 1 ? 'checked' : ''?>>
            <label class="form-label me-2">Có</label>
            <input class="form-check-input" type="radio" name="popular" value="0" id="not_popular"
                <?=$category_group['is_popular'] == 0 ? 'checked' : ''?>>
            <label class="form-label">Không</label>
        </div>
        <div class="mb-3">
            <label class="form-label me-3">Xu hướng<span>*</span></label>
            <input class="form-check-input" type="radio" name="trent" value="1" id="trent"
                <?=$category_group['is_trent'] == 1 ? 'checked' : ''?>>
            <label class="form-label me-2">Có</label>
            <input class="form-check-input" type="radio" name="trent" value="0" id="not_trent"
                <?=$category_group['is_trent'] == 0 ? 'checked' : ''?>>
            <label class="form-label">Không</label>
        </div>
        <div class="mb-3">
            <label class="form-label">Ảnh danh mục<span id="checked_text">(không bắt
                    buộc)</span></label>
            <input type="file" name="image" class="form-control">
            <?php if(isset($errors['image'])): ?>
            <div class="form-error"><?=$errors['image']?></div>
            <?php endif;?>
            <?php if(!empty($category_group['image'])):?>
            <img src="../uploads/<?=$category_group['image']?>" width="100">
            <?php endif;?>
        </div>
        <input type="hidden" name="id" value="<?=$category_group['id']?>">
        <input type="hidden" name="img" value="<?=$category_group['image']?>">
        <div class="form-button">
            <button class="btn btn-primary" type="submit">Lưu chỉnh sửa</button>
        </div>
    </form>
</div>