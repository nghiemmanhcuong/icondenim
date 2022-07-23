<div class="content">
    <form class="form-add" method="post" enctype="multipart/form-data" style="width:80%;">
        <h3 class="text-center mb-3">Thêm sản phẩm mới</h3>
        <div class="row">
            <!-- name -->
            <div class="mb-2 col-4">
                <label class="form-label">Tên sản phẩm<span>*</span></label>
                <input type="text" name="name" class="form-control" placeholder="Nhập tên sản phẩm...">
                <?php if(isset($errors['name'])) : ?>
                <div class="form-error"><?=$errors['name']?></div>
                <?php endif;?>
            </div>
            <!-- category -->
            <div class="mb-2 col-4">
                <label class="form-label">Danh mục sản phẩm<span>*</span></label>
                <select name="category" class="form-select">
                    <option value="">--Chọn--</option>
                    <?php foreach ($categories as $category):?>
                    <option value="<?=$category['id']?>"><?=$category['name']?></option>
                    <?php endforeach;?>
                </select>
                <?php if(isset($errors['name'])) : ?>
                <div class="form-error"><?=$errors['name']?></div>
                <?php endif;?>
            </div>
            <!-- price -->
            <div class="mb-2 col-4">
                <label class="form-label">Giá sản phẩm<span>*</span></label>
                <input type="text" name="price" class="form-control" placeholder="Nhập giá sản phẩm...">
                <?php if(isset($errors['price'])) : ?>
                <div class="form-error"><?=$errors['price']?></div>
                <?php endif;?>
            </div>
            <!-- old_price -->
            <div class="mb-2 col-3">
                <label class="form-label">Giá cũ</label>
                <input type="text" name="old_price" class="form-control" placeholder="Nhập giá cũ...">
                <?php if(isset($errors['old_price'])) : ?>
                <div class="form-error"><?=$errors['old_price']?></div>
                <?php endif;?>
            </div>
            <!-- image -->
            <div class="mb-2 col-3">
                <label class="form-label">Ảnh đại diện sản phẩm<span>*</span></label>
                <input type="file" name="image" class="form-control">
                <?php if(isset($errors['image'])) : ?>
                <div class="form-error"><?=$errors['image']?></div>
                <?php endif;?>
            </div>
            <!-- image list -->
            <div class="mb-2 col-6">
                <label class="form-label">Ảnh liên quan</label>
                <input type="file" name="image_list[]" class="form-control" multiple>
                <?php if(isset($errors['image_list'])) : ?>
                <div class="form-error"><?=$errors['image_list']?></div>
                <?php endif;?>
            </div>
            <!-- description -->
            <div class="mb-2 col-12">
                <label class="form-label">Mô tả sản phẩm<span>*</span></label>
                <textarea name="description" cols="30" rows="10" class="form-control"></textarea>
                <?php if(isset($errors['description'])) : ?>
                <div class="form-error"><?=$errors['description']?></div>
                <?php endif;?>
            </div>
            <!-- is new -->
            <div class="mb-2 col-12">
                <label class="form-label me-3">Mới: </label>
                <input type="radio" name="is_new" value="1">
                <span style="font-size:12px;">Có</span>
                <input type="radio" name="is_new" value="0" checked>
                <span style="font-size:12px;">Không</span>
                <?php if(isset($errors['image'])) : ?>
                <div class="form-error"><?=$errors['image']?></div>
                <?php endif;?>
            </div>
            <!-- is popular -->
            <div class="mb-2 col-12">
                <label class="form-label me-3">Nổi bật: </label>
                <input type="radio" name="is_popular" value="1">
                <span style="font-size:12px;">Có</span>
                <input type="radio" name="is_popular" value="0" checked>
                <span style="font-size:12px;">Không</span>
                <?php if(isset($errors['image'])) : ?>
                <div class="form-error"><?=$errors['image']?></div>
                <?php endif;?>
            </div>
        </div>
        <div class="form-button mt-3">
            <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
        </div>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="core/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>