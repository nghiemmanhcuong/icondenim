<div class="content">
    <form method="post" class="form-add" style="width:60%;" enctype="multipart/form-data">
        <h3 class="text-center fw-bold">Sửa bài viết</h3>
        <a href="?p=danh-sach-bai-viet" class="btn btn-success mb-3">
            <i class="bi bi-arrow-left"></i>
            Quay lại
        </a>
        <!-- title -->
        <div class="mb-3">
            <label class="form-label">Tiêu đề bài viết<span>*</span></label>
            <input type="text" name="title" class="form-control" value="<?=$blog['title']?>">
            <?php if(isset($errors['title'])): ?>
            <div class="form-error"><?=$errors['title']?></div>
            <?php endif; ?>
        </div>
        <div class="row">
            <!-- author -->
            <div class="mb-3 col-6">
                <label class="form-label">Tên tác giả<span>*</span></label>
                <input type="text" name="author" class="form-control" value="<?=$blog['author']?>">
                <?php if(isset($errors['author'])): ?>
                <div class="form-error"><?=$errors['author']?></div>
                <?php endif; ?>
            </div>
            <!-- category -->
            <div class="mb-3 col-6">
                <label class="form-label">Danh mục bài viết<span>*</span></label>
                <select name="category" class="form-select">
                    <?php foreach ($blog_categories  as $category): ?>
                    <option <?=($blog['category_id'] == $category['id']) ? 'selected' : ''?>
                        value="<?=$category['id']?>"><?=$category['name']?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <!-- description -->
        <div class="mb-3">
            <label class="form-label">Mô tả<span>*</span></label>
            <textarea name="description"  class="form-control"><?=$blog['description']?></textarea>
            <?php if(isset($errors['description'])): ?>
            <div class="form-error"><?=$errors['description']?></div>
            <?php endif; ?>
        </div>
        <!-- content -->
        <div class="mb-3">
            <label class="form-label">Nội dung bài viết<span>*</span></label>
            <textarea name="content" cols="30"  class="form-control" rows="10"><?=$blog['content']?></textarea>
            <?php if(isset($errors['content'])): ?>
            <div class="form-error"><?=$errors['content']?></div>
            <?php endif; ?>
        </div>
        <!-- image -->
        <div class="mb-3">
            <label class="form-label">Ảnh bài viết<span>*</span></label>
            <input type="file" name="image" class="form-control">
            <img src="../uploads/<?=$blog['image']?>" width="100" class="mt-2">
            <?php if(isset($errors['image'])): ?>
            <div class="form-error"><?=$errors['image']?></div>
            <?php endif; ?>
        </div>
        <input type="hidden" name="id" value="<?=$blog['id']?>">
        <input type="hidden" name="img" value="<?=$blog['image']?>">
        <div class="form-button">
            <button class="btn btn-primary" type="submit">Lưu chỉnh sửa</button>
        </div>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="core/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script>