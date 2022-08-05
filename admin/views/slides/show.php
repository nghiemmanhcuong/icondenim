<div class="content">
    <h3 class="text-center mb-3">Danh sách slides</h3>
    <!-- message -->
    <?php if(isset($_GET['msg'])):?>
    <div class="alert alert-success delete position-relative">
        <?=$_GET['msg']?>
        <a href="?p=show-slides">
            <i class="fa-solid fa-circle-xmark fs-5 position-absolute"></i>
        </a>
    </div>
    <?php endif;?>
    <!-- table -->
    <form action="?p=delete-slides" method="post" name="delete_slides">
        <a href="?p=slides" class="btn btn-primary">
            <i class="bi bi-plus-circle-fill"></i>
            Thêm slides
        </a>
        <table class="table table-primary mt-2">
            <!-- head -->
            <thead>
                <tr>
                    <th class="text-center border border-dark">STT</th>
                    <th class="text-center border border-dark">Ảnh</th>
                    <th class="text-center border border-dark">Width</th>
                    <th class="text-center border border-dark">Height</th>
                    <th class="text-center border border-dark">Trạng thái</th>
                    <th class="text-center border border-dark">Chức năng</th>
                </tr>
            </thead>
            <!-- body -->
            <tbody>
                <?php if(count($slides) > 0):$count = 0;?>
                <?php foreach($slides as $slide): $count++?>
                <tr>
                    <td class="text-center border border-dark"><?=$count?></td>
                    <td class="text-center border border-dark" width="6%">
                        <img src="../uploads/<?=$slide['image']?>" alt="slides image" width="50">
                    </td>
                    <td class="text-center border border-dark"><?=$slide['width']?></td>
                    <td class="text-center border border-dark"><?=($slide['height'])?></td>
                    <td class="text-center border border-dark">
                        <?= ($slide['status'] == 1) ? 'Đang hiển thị' : 'Đang ẩn'?>
                    </td>
                
                    <td class="text-center border border-dark">
                        <a href="?p=edit-slides&id=<?=$slide['id']?>" class="btn btn-primary">
                            <i class="fa-solid fa-pen"></i>
                            Sửa
                        </a>
                        <div class="d-inline" onclick="
                            if (confirm('Bạn có chắc chắn muốn xóa slide này?')) {
                                document.delete_slides.slide_id.value = '<?=$slide['id']?>';
                                document.delete_slides.submit();
                            }">
                            <a href="#" class="btn btn-danger">
                                <i class="fa-solid fa-trash"></i>
                                Xoá
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; endif;?>
            </tbody>
        </table>
        <input type="text" name="slide_id" hidden>
    </form>
    <!-- pagination -->
    <?php include_once('views/block/pagination.php');?>
</div>