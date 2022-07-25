<div class="content">
    <h3 class="text-center mb-3">Quản lý màu sản phẩm</h3>
    <div class="mx-auto" style="width:50%;">
        <div class="row align-items-start mb-3">
            <!-- form add -->
            <div class="col-7">
                <form method="post" class="d-flex align-items-center">
                    <input type="text" name="color" placeholder="Tên màu..." class="form-control" style="width:70%">
                    <button name="add_color" class="btn btn-success ms-2" style="font-size:14px;">
                        <i class="bi bi-plus-circle-fill"></i>
                        Thêm
                    </button>
                </form>
                <?php if(isset($error_add)):?>
                <div class="form-error"><?=$error_add?></div>
                <?php endif;?>
            </div>
            <!-- form search -->
            <div class="col-5">
                <form method="post" class="d-flex align-items-center ">
                    <input type="text" name="keyword" placeholder="Tên màu..." class="form-control" style="width:70%">
                    <button name="search_color" class="btn btn-success ms-2" style="font-size:14px;">
                        <i class="bi bi-search"></i>
                        Tìm
                    </button>
                </form>
                <?php if(isset($error_search)):?>
                <div class="form-error"><?=$error_search?></div>
                <?php endif;?>
            </div>
        </div>
        <!-- keyword -->
        <?php if(isset($keyword)):?>
        <div class="mt-3">
            Kết quả tìm kiếm cho: '<?=$keyword?>'
            <a href="?p=<?=$_GET['p']?>" style="color:blue;">Quay lại</a>
        </div>
        <?php endif;?>
        <!-- table colors -->
        <table class="table table-primary mt-1">
            <thead>
                <tr>
                    <th class="text-center border border-dark">STT</th>
                    <th class="text-center border border-dark">Tên màu</th>
                    <th class="text-center border border-dark">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php $count=0;foreach ($colors as $color):$count++;?>
                <form method="post">
                    <tr>
                        <td class="text-center border border-dark"><?=$count?></td>
                        <td class="text-center border border-dark">
                            <input type="text" name="color" value="<?=$color['name']?>" class="form-control"
                                <?=(isset($color_id) && $color_id == $color['id']) ? 'autofocus' : 'readonly'?>>
                        </td>
                        <td class="text-center border border-dark">
                            <?php if(isset($color_id) && $color_id == $color['id']):?>
                            <button class="btn btn-primary" name="edit_color" type="submit">Lưu</button>
                            <a href="?p=<?=$_GET['p']?>&page=<?=$curr_page?>" class="btn btn-success">Bỏ</a>
                            <?php else:?>
                            <a href="?p=<?=$_GET['p']?>&page=<?=$curr_page?>&color_id=<?=$color['id']?>"
                                class="btn btn-primary">
                                Sửa
                            </a>
                            <div class="d-inline" onclick="return confirm('Bạn thật sự muốn xoá màu này??')">
                                <a href="?p=<?=$_GET['p']?>&delete_id=<?=$color['id']?>" class="btn btn-danger">
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
        <?php include_once('views/block/pagination.php'); ?>
    </div>
</div>