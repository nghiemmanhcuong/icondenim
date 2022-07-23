<div class="content">
    <h3 class="text-center fw-bold">Thêm danh mục bài viết</h3>
    <a href="?p=danh-muc-bai-viet" class="btn btn-success mb-3">
        <i class="bi bi-arrow-left"></i>
        Quay lại
    </a>
    <form method="post" class="form-add">
       <div class="mb-3">
           <label class="form-label">Tên danh mục <span>*</span></label>
           <input type="text" name="name" class="form-control">
           <?php if(isset($error)):?>
           <div class="form-error"><?=$error?></div>
           <?php endif;?>
       </div>
       <button class="btn btn-primary" type="submit">Thêm</button>
    </form>
</div>