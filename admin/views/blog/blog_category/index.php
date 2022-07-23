<div class="content">
    <h3 class="text-center fw-bold mb-3">Danh mục bài viết</h3>
    <!-- message -->
    <?php if(isset($_GET['msg'])):?>
    <div class="alert alert-success delete position-relative">
        <?=$_GET['msg']?>
        <a href="?p=danh-muc-bai-viet">
            <i class="fa-solid fa-circle-xmark fs-5 position-absolute"></i>
        </a>
    </div>
    <?php endif;?>
    <form method="post" class="mx-auto" action="?p=xoa-danh-muc-bai-viet" style="width:50%;" name="delete_blog_category">
    <a href="?p=them-danh-muc-bai-viet" class="btn btn-success mb-3">
        <i class="bi bi-plus-circle-fill"></i>
        Thêm danh mục
    </a>
    <table class="table table-success ">
        <thead>
            <tr>
                <th class="text-center border border-dark">STT</th>
                <th class="text-center border border-dark">Tên danh mục</th>
                <th class="text-center border border-dark">Chức năng</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($blog_categories)):$count=0;?>
            <?php foreach($blog_categories as $blog_category):$count++;?>
            <tr>
                <td class="text-center border border-dark"><?=$count?></td>
                <td class="text-center border border-dark"><?=$blog_category['name']?></td>
                <td class="text-center border border-dark">
                    <a href="?p=sua-danh-muc-bai-viet&blog_category_id=<?=$blog_category['id']?>" class="btn btn-primary btn-small">
                        <i class="bi bi-pencil-fill"></i>
                        Sửa
                    </a>
                    <div class="d-inline" onclick="
                            if (confirm('Bạn có chắc chắn muốn xóa danh mục bài viết này?')) {
                                document.delete_blog_category.blog_category_id.value = '<?=$blog_category['id']?>';
                                document.delete_blog_category.submit();
                            }">
                        <a href="#" class="btn btn-danger btn-small">
                            <i class="fa-solid fa-trash"></i>
                            Xoá
                        </a>
                    </div>
                </td>
            </tr>
            <?php endforeach;?>
            <?php else:?>
            <div class="text-center">Không tìm thấy danh mục nào</div>
            <?php endif;?>
        </tbody>
    </table>
    <input type="hidden" name="blog_category_id">
    </form>
</div>