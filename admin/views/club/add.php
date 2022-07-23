<div class="content">
    <div class="form-add">
        <form method="post" enctype="multipart/form-data">
            <h3 class="text-center fw-bold">CLUB</h3>
            <?php if(isset($_GET['msg'])):?>
            <div class="alert alert-success position-relative">
                <?=$_GET['msg']?>
                <a href="?p=them-anh-club">
                    <i class="fa-solid fa-circle-xmark fs-5 position-absolute"></i>
                </a>
            </div>
            <?php endif; ?>
            <div class="mb-3 d-flex align-items-end justify-content-between">
                <div style="width:82%" class="position-relative">
                    <label class="form-label">Ảnh</label>
                    <input type="file" name="image" class="form-control">
                    <?php if(isset($error)):?>
                    <div class="form-error position-absolute"><?=$error?></div>
                    <?php endif;?>
                </div>
                <button class="btn btn-primary" style="font-size: 14px;">Thêm ảnh</button>
            </div>
        </form>
        <h5 class="text-center fw-bold">Tất cả ảnh</h5>
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center border border-dark">STT</th>
                    <th class="text-center border border-dark">Ảnh</th>
                    <th class="text-center border border-dark">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($images) > 0):$count=0;?>
                <?php foreach ($images as $image):$count++;?>
                <tr>
                    <td class="text-center border border-dark"><?=$count?></td>
                    <td class="text-center border border-dark" width="16%">
                        <img src="../uploads/<?=$image['image']?>" height="50">
                    </td>
                    <td class="text-center border border-dark">
                        <div onclick="return confirm('Bạn có muốn xoá ảnh này??')">
                            <a href="?p=them-anh-club&delete_id=<?=$image['id']?>" class="btn btn-danger">Xoá</a>
                        </div>
                    </td>
                </tr>
                <?php endforeach;?>
                <?php else:?>
                <div class="text-center">Không có ảnh nào!!</div>
                <?php endif;?>
            </tbody>
        </table>
        <?php include_once('views/block/pagination.php');?>
    </div>
</div>