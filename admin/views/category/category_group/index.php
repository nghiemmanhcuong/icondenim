<div class="content">
    <h3 class="text-center mb-3">Danh sách nhóm sản phẩm</h3>
    <!-- message -->
    <?php if(isset($_GET['msg'])):?>
    <div class="alert alert-success delete position-relative">
        <?=$_GET['msg']?>
        <a href="?p=nhom-san-pham">
            <i class="fa-solid fa-circle-xmark fs-5 position-absolute"></i>
        </a>
    </div>
    <?php endif;?>
    <!-- table -->
    <form action="?p=xoa-nhom-san-pham" method="post" name="delete_category_group">
        <a href="?p=them-nhom-san-pham" class="btn btn-primary">
            <i class="bi bi-plus-circle-fill"></i>
            Thêm nhóm
        </a>
        <table class="table table-primary mt-2">
            <!-- head -->
            <thead>
                <tr>
                    <th class="text-center border border-dark">STT</th>
                    <th class="text-center border border-dark">Ảnh</th>
                    <th class="text-center border border-dark">Tên danh mục</th>
                    <th class="text-center border border-dark">Nổi bật</th>
                    <th class="text-center border border-dark">Xu hướng</th>
                    <th class="text-center border border-dark">Chức năng</th>
                </tr>
            </thead>
            <!-- body -->
            <tbody>
                <?php if(count($category_group) > 0):$count = 0;?>
                <?php foreach($category_group as $item): $count++?>
                <tr>
                    <td class="text-center border border-dark"><?=$count?></td>
                    <td class="text-center border border-dark" width="6%">
                        <?php if(!empty($item['image'])):?>
                        <img src="../uploads/<?=$item['image']?>" alt="category image" width="50">
                        <?php else:?>
                        <span>Không có ảnh</span>
                        <?php endif;?>
                    </td>
                    <td class="text-center border border-dark"><?=$item['name']?></td>
                    <td class="text-center border border-dark">
                        <?= ($item['is_popular'] == 1) ? 'Có' : 'Không'?>
                    </td>
                    <td class="text-center border border-dark">
                        <?= ($item['is_trent'] == 1) ? 'Có' : 'Không'?>
                    </td>
                    <td class="text-center border border-dark">
                        <a href="?p=sua-nhom-san-pham&id=<?=$item['id']?>" class="btn btn-primary">
                            <i class="fa-solid fa-pen"></i>
                            Sửa
                        </a>
                        <div class="d-inline" onclick="
                            if (confirm('Bạn có chắc chắn muốn xóa nhóm sản phẩm này này?')) {
                                document.delete_category_group.category_group_id.value = '<?=$item['id']?>';
                                document.delete_category_group.submit();
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
        <input type="text" name="category_group_id" hidden>
    </form>
    <!-- pagination -->
    <?php include_once('views/block/pagination.php');?>
</div>