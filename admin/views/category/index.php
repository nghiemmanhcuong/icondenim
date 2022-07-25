<div class="content">
    <h3 class="text-center mb-3">Danh sách danh mục</h3>
    <!-- message -->
    <?php if(isset($_GET['msg'])):?>
    <div class="alert alert-success delete position-relative">
        <?=$_GET['msg']?>
        <a href="?p=danh-sach-danh-muc">
            <i class="fa-solid fa-circle-xmark fs-5 position-absolute"></i>
        </a>
    </div>
    <?php endif;?>
    <!-- table -->
    <form action="?p=xoa-danh-muc" method="post" name="delete_category">
        <a href="?p=them-danh-muc" class="btn btn-primary">
            <i class="bi bi-plus-circle-fill"></i>
            Thêm danh mục
        </a>
        <table class="table table-primary mt-2">
            <!-- head -->
            <thead>
                <tr>
                    <th class="text-center border border-dark">STT</th>
                    <th class="text-center border border-dark">Ảnh</th>
                    <th class="text-center border border-dark">Tên danh mục</th>
                    <th class="text-center border border-dark">Nhóm sản phẩm</th>
                    <th class="text-center border border-dark">Nổi bật</th>
                    <th class="text-center border border-dark">Xu hướng</th>
                    <th class="text-center border border-dark">Chức năng</th>
                </tr>
            </thead>
            <!-- body -->
            <tbody>
                <?php if(count($categories) > 0):$count = 0;?>
                <?php foreach($categories as $category): $count++?>
                <tr>
                    <td class="text-center border border-dark"><?=$count?></td>
                    <td class="text-center border border-dark" width="6%">
                        <?php if(!empty($category['image'])):?>
                        <img src="../uploads/<?=$category['image']?>" alt="category image" width="50">
                        <?php else:?>
                        <span>Không có ảnh</span>
                        <?php endif;?>
                    </td>
                    <td class="text-center border border-dark"><?=$category['name']?></td>
                    <td class="text-center border border-dark"><?=handleCategoryGroup($category['parent_id'])?></td>
                    <td class="text-center border border-dark">
                        <?= ($category['is_popular'] == 1) ? 'Có' : 'Không'?>
                    </td>
                    <td class="text-center border border-dark">
                        <?= ($category['is_trent'] == 1) ? 'Có' : 'Không'?>
                    </td>
                    <td class="text-center border border-dark">
                        <a href="?p=sua-danh-muc&id=<?=$category['id']?>" class="btn btn-primary">
                            <i class="fa-solid fa-pen"></i>
                            Sửa
                        </a>
                        <div class="d-inline" onclick="
                            if (confirm('Bạn có chắc chắn muốn xóa danh mục này? Lưu ý: Xoá danh mục cũng đồng thời xẽ xoá các sản phẩm trong danh mục đó')) {
                                document.delete_category.category_id.value = '<?=$category['id']?>';
                                document.delete_category.submit();
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
        <input type="text" name="category_id" hidden>
    </form>
    <!-- pagination -->
    <?php include_once('views/block/pagination.php');?>
</div>