<div class="content">
    <form class="form-add" method="post" enctype="multipart/form-data" style="width:60%;">
        <h3 class="text-center mb-3">Sửa sản phẩm</h3>
        <a href="?p=danh-sach-san-pham" class="btn btn-success mb-3">
            <i class="bi bi-arrow-left"></i>
            Quay lại
        </a>
        <div class="row">
            <!-- name -->
            <div class="mb-3 col-6">
                <label class="form-label">Tên sản phẩm<span>*</span></label>
                <input type="text" name="name" class="form-control" placeholder="Nhập tên sản phẩm..."
                    value="<?=$product['name']?>">
                <?php if(isset($errors['name'])) : ?>
                <div class="form-error"><?=$errors['name']?></div>
                <?php endif;?>
            </div>
            <!-- category -->
            <div class="mb-3 col-6">
                <label class="form-label">Danh mục sản phẩm<span>*</span></label>
                <select name="category" class="form-select">
                    <?php foreach ($categories as $category):?>
                    <option <?=($product['category_id'] == $category['id']) ? 'selected' : ''?>
                        value="<?=$category['id']?>"><?=$category['name']?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <!-- price -->
            <div class="mb-3 col-6">
                <label class="form-label">Giá sản phẩm<span>*</span></label>
                <input type="text" name="price" class="form-control" placeholder="Nhập giá sản phẩm..."
                    value="<?=$product['price']?>">
                <?php if(isset($errors['price'])) : ?>
                <div class="form-error"><?=$errors['price']?></div>
                <?php endif;?>
            </div>
            <!-- old_price -->
            <div class="mb-2 col-3">
                <label class="form-label">Giá cũ</label>
                <input type="text" name="old_price" class="form-control" placeholder="Nhập giá cũ..."
                    value="<?=$product['old_price']?>">
                <?php if(isset($errors['old_price'])) : ?>
                <div class="form-error"><?=$errors['old_price']?></div>
                <?php endif;?>
            </div>
            <!-- description -->
            <div class="mb-3 col-12">
                <label class="form-label">Mô tả sản phẩm<span>*</span></label>
                <textarea name="description" cols="30" class="form-control"
                    rows="10"><?=$product['description']?></textarea>
                <?php if(isset($errors['description'])) : ?>
                <div class="form-error"><?=$errors['description']?></div>
                <?php endif;?>
            </div>
            <!-- image -->
            <div class="mb-3 col-4">
                <label class="form-label">Ảnh sản phẩm</label>
                <input type="file" name="image" class="form-control">
                <?php if(isset($errors['image'])) : ?>
                <div class="form-error"><?=$errors['image']?></div>
                <?php endif;?>
                <img src="../uploads/<?=$product['image']?>" alt="product image" width="100" class="mt-2 border">
            </div>
            <input type="hidden" name="img" value="<?=$product['image']?>">
            <input type="hidden" name="id" value="<?=$product['id']?>">
        </div>
        <!-- is new -->
        <div class="mb-2 col-12">
            <label class="form-label me-3">Mới: </label>
            <input type="radio" name="is_new" value="1" <?=($product['is_new'] == 1) ? 'checked' : ''?>>
            <span style="font-size:12px;">Có</span>
            <input type="radio" name="is_new" value="0" <?=($product['is_new'] == 0) ? 'checked' : ''?>>
            <span style="font-size:12px;">Không</span>
            <?php if(isset($errors['image'])) : ?>
            <div class="form-error"><?=$errors['image']?></div>
            <?php endif;?>
        </div>
        <!-- is popular -->
        <div class="mb-2 col-12">
            <label class="form-label me-3">Nổi bật: </label>
            <input type="radio" name="is_popular" value="1" <?=($product['is_popular'] == 1) ? 'checked' : ''?>>
            <span style="font-size:12px;">Có</span>
            <input type="radio" name="is_popular" value="0" <?=($product['is_popular'] == 0) ? 'checked' : ''?>>
            <span style="font-size:12px;">Không</span>
            <?php if(isset($errors['image'])) : ?>
            <div class="form-error"><?=$errors['image']?></div>
            <?php endif;?>
        </div>
        <div class="form-button mt-3">
            <button type="submit" class="btn btn-primary">Lưu chỉnh sửa</button>
        </div>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="core/ckeditor/ckeditor.js"></script>
<script>
CKEDITOR.replace('description');
</script>