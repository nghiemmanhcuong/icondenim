<div class="content">
    <h3 class="text-center mb-3 fw-bold">Quản lý ảnh liên quan</h3>
    <div class="form-add" style="width:60%;">
        <!-- info product -->
        <a href="?p=danh-sach-san-pham" class="btn btn-success mb-3">
            <i class="bi bi-arrow-left"></i>
            Quay lại
        </a>
        <div class="mb-3 border-bottom pb-3">
            <label class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" value="<?=$product['name']?>" readonly>
        </div>
        <div>
            <h4 class="text-center">Ảnh liên quan</h4>
            <!-- form add -->
            <form method="post" class="mb-2 d-flex align-items-center" enctype="multipart/form-data">
                <div style="width:70%;">
                    <input type="file" name="file_add" class="form-control">
                    <?php if(isset($error_add)):?>
                    <div class="form-error"><?=$error_add?></div>
                    <?php endif;?>
                </div>
                <button class="btn btn-success ms-2" name="add_image" style="font-size:14px;">
                    <i class="bi bi-plus-circle-fill"></i>
                    Thêm ảnh
                </button>
            </form>
            <!-- table -->
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th class="text-center border border-dark">STT</th>
                        <th class="text-center border border-dark">Ảnh</th>
                        <th class="text-center border border-dark">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($images) > 0): $count = 0; ?>
                    <?php foreach ($images as $image): $count++; ?>
                    <!-- form action -->
                    <form method="post" enctype="multipart/form-data">
                        <tr>
                            <td class="text-center border border-dark"><?=$count?></td>
                            <td class="text-center border border-dark d-flex align-items-center justify-content-center">
                                <img class="mx-auto" src="../uploads/<?=$image['image_name']?>" alt="product_image"
                                    height="50" width="50">
                                <!-- isset image id -->
                                <?php if(isset($_GET['image_id']) && $_GET['image_id'] == $image['id']):?>
                                <input type="file" name="img">
                                <?php endif;?>
                            </td>
                            <td class="text-center border border-dark">
                                <?php if(isset($_GET['image_id']) && $_GET['image_id'] == $image['id']):?>
                                <button class="btn btn-success" name="edit_image">Lưu</button>
                                <a href="<?=$curr_url?>&page=<?=$curr_page?>" class="btn btn-primary">Bỏ</a>
                                <!-- isset image id -->
                                <?php else:?>
                                <!-- not isset image id -->
                                <a href="<?=$curr_url?>&image_id=<?=$image['id']?>&page=<?=$curr_page?>"
                                    class="btn btn-primary">Sửa</a>
                                <div class="d-inline" onclick="return confirm('Bạn thật sự muốn xoá ảnh này??')">
                                    <a href="<?=$curr_url?>&delete_id=<?=$image['id']?>&page=<?=$curr_page?>"
                                        class="btn btn-danger">Xoá</a>
                                </div>
                                <?php endif;?>
                            </td>
                        </tr>
                    </form>
                    <?php endforeach;?>
                    <?php else:?>
                    <div class="text-center">Chưa có ảnh liên quan nào</div>
                    <?php endif;?>
                </tbody>
            </table>
            <?php include_once('views/block/pagination.php');?>
        </div>
    </div>
</div>