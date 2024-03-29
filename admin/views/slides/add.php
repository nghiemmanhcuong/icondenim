<div class="content">
    <form class="form-add" method="post" enctype="multipart/form-data" style="width:80%;">
        <h3 class="text-center mb-3">Thêm banner mới</h3>
        <?php
            if(isset($_GET['message'])) :     
        ?>
        <div class="alert alert-success">
            <?php
                 $_GET['message']; 
            ?>
        </div>
        <?php
            endif;
        ?>
        <div class="row">
            <!-- width -->
            <div class="mb-2 col-">
                <label class="form-label">Chiều rộng<span>*</span></label>
                <input type="text" name="width" class="form-control" placeholder="Nhập chiều rộng...">
                <?php if(isset($errors['width'])) : ?>
                <div class="form-error"><?=$errors['width']?></div>
                <?php endif;?>
            </div>
            <!-- height -->
            <div class="mb-2 col-12">
                <label class="form-label">Chiều cao<span>*</span></label>
                <input type="text" name="height" class="form-control" placeholder="Nhập chiều cao...">
                <?php if(isset($errors['height'])) : ?>
                <div class="form-error"><?=$errors['height']?></div>
                <?php endif;?>
            </div>
            <!-- categories -->
            <div class="mb-2 col-">
                <label class="form-label">Link<span>*</span></label>
                <select name="link" class="form-select">
                    <option value="">--Chọn--</option>
                    <?php foreach ($categories as $ct):?>
                    <option value="<?=$ct['slug']?>"><?=$ct['name']?></option>
                    <?php endforeach;?>
                </select>
                <?php if(isset($errors['link'])) : ?>
                <div class="form-error"><?=$errors['link']?></div>
                <?php endif;?>
            </div>
            <!-- image -->
            <div class="mb-2 col-12">
                <label class="form-label">Ảnh banner<span>*</span></label>
                <input type="file" name="image" class="form-control">
                <?php if(isset($errors['image'])) : ?>
                <div class="form-error"><?=$errors['image']?></div>
                <?php endif;?>
            </div>
            <!-- status -->
            <div class="mb-2 col-">
                <label class="form-label">Status<span>*</span></label>
                <input type="checkbox" name="status" id="status">
                <?php if(isset($errors['status'])) : ?>
                <div class="form-error"><?=$errors['status']?></div>
                <?php endif;?>
            </div>
        </div>
        <div class="form-button mt-3">
            <button type="submit" class="btn btn-primary">Thêm banner</button>
        </div>
    </form>
</div>
