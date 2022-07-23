<div class="content">
    <h3 class="text-center mb-3">Quản lý kích cỡ sản phẩm</h3>
    <!-- form add -->
    <div class="mx-auto" style="width:50%;">
        <form method="post" class="d-flex align-items-center">
            <input type="text" name="size" placeholder="Tên kích cỡ..." class="form-control flex-1" style="width:79%;">
            <button name="add_size" class="btn btn-success ms-2" style="font-size:14px;">
                <i class="bi bi-plus-circle-fill"></i>
                Thêm kích cỡ
            </button>
        </form>
        <?php if(isset($error_add)):?>
        <div class="form-error"><?=$error_add?></div>
        <?php endif;?>
        <!-- table sizes -->
        <table class="table table-primary mt-3">
            <thead>
                <tr>
                    <th class="text-center border border-dark">STT</th>
                    <th class="text-center border border-dark">Tên kích cỡ</th>
                    <th class="text-center border border-dark">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php $count=0;foreach ($sizes as $size):$count++;?>
                <form method="post">
                    <tr>
                        <td class="text-center border border-dark"><?=$count?></td>
                        <td class="text-center border border-dark">
                            <input type="text" name="size" value="<?=$size['name']?>" class="form-control"
                                <?=(isset($size_id) && $size_id == $size['id']) ? 'autofocus' : 'readonly'?>>
                        </td>
                        <td class="text-center border border-dark">
                            <?php if(isset($size_id) && $size_id == $size['id']):?>
                            <button class="btn btn-primary" name="edit_size" type="submit">Lưu</button>
                            <a href="?p=<?=$_GET['p']?>&page=<?=$curr_page?>" class="btn btn-success">Bỏ</a>
                            <?php else:?>
                            <a href="?p=<?=$_GET['p']?>&page=<?=$curr_page?>&size_id=<?=$size['id']?>"
                                class="btn btn-primary">
                                Sửa
                            </a>
                            <div class="d-inline" onclick="return confirm('Bạn thật sự muốn xoá size này??')">
                                <a href="?p=<?=$_GET['p']?>&delete_id=<?=$size['id']?>" class="btn btn-danger">
                                    Xoá
                                </a>
                            </div>
                            <?php endif;?>
                        </td>
                    </tr>
                </form>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php include_once('views/block/pagination.php');?>
    </div>
</div>