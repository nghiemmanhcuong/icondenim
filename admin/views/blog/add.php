<div class="content">
    <form method="post" class="form-add" style="width:60%;" enctype="multipart/form-data">
        <h3 class="text-center fw-bold">Thêm bài viết mới</h3>
        <!-- message -->
        <?php if(isset($success)):?>
        <div class="alert alert-success position-relative">
            <?=$success?>
            <a href="?p=them-bai-viet">
                <i class="fa-solid fa-circle-xmark fs-5 position-absolute"></i>
            </a>
        </div>
        <?php endif;?>
        <!-- title -->
        <div class="mb-3">
            <label class="form-label">Tiêu đề bài viết<span>*</span></label>
            <input type="text" name="title" placeholder="Nhập tiêu đề bài viết..." class="form-control">
            <?php if(isset($errors['title'])): ?>
            <div class="form-error"><?=$errors['title']?></div>
            <?php endif; ?>
        </div>
        <div class="row">
            <!-- category -->
            <div class="mb-3 col-6">
                <label class="form-label">Tên tác giả<span>*</span></label>
                <input type="text" name="author" placeholder="Nhập tên tác giả..." class="form-control">
                <?php if(isset($errors['author'])): ?>
                <div class="form-error"><?=$errors['author']?></div>
                <?php endif; ?>
            </div>
            <!-- author -->
            <div class="mb-3 col-6">
                <label class="form-label">Danh mục bài viết<span>*</span></label>
                <select name="category" class="form-select">
                    <option value="">--Chọn--</option>
                    <?php foreach ($blog_categories  as $category): ?>
                    <option value="<?=$category['id']?>"><?=$category['name']?></option>
                    <?php endforeach;?>
                </select>
                <?php if(isset($errors['category'])): ?>
                <div class="form-error"><?=$errors['category']?></div>
                <?php endif; ?>
            </div>
        </div>
        <!-- description -->
        <div class="mb-3">
            <label class="form-label">Mô tả<span>*</span></label>
            <textarea name="description"  class="form-control"></textarea>
            <?php if(isset($errors['description'])): ?>
            <div class="form-error"><?=$errors['description']?></div>
            <?php endif; ?>
        </div>
        <!-- content -->
        <div class="mb-3">
            <label class="form-label">Nội dung bài viết<span>*</span></label>
            <textarea name="content"  class="form-control"></textarea>
            <?php if(isset($errors['content'])): ?>
            <div class="form-error"><?=$errors['content']?></div>
            <?php endif; ?>
        </div>
        <!-- image -->
        <div class="mb-3">
            <label class="form-label">Ảnh bài viết<span>*</span></label>
            <input type="file" name="image" class="form-control">
            <?php if(isset($errors['image'])): ?>
            <div class="form-error"><?=$errors['image']?></div>
            <?php endif; ?>
        </div>
        <div class="form-button">
            <button class="btn btn-primary" type="submit">Thêm bài viết</button>
        </div>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="core/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script>