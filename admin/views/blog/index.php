<div class="content">
    <h3 class="text-center fw-bold mb-3">Danh sách bài viết</h3>
    <!-- message -->
    <?php if(isset($_GET['msg'])):?>
    <div class="alert alert-success delete position-relative">
        <?=$_GET['msg']?>
        <a href="?p=danh-sach-bai-viet">
            <i class="fa-solid fa-circle-xmark fs-5 position-absolute"></i>
        </a>
    </div>
    <?php endif;?>
    <form action="?p=xoa-bai-viet" name="delete_blog" method="post">
        <table class="table table-success">
            <thead>
                <tr>
                    <th class="text-center border border-dark">STT</th>
                    <th class="text-center border border-dark">Ảnh</th>
                    <th class="text-center border border-dark">Tiêu đề</th>
                    <th class="text-center border border-dark">Tác giả</th>
                    <th class="text-center border border-dark">Lượt xem</th>
                    <th class="text-center border border-dark">Ngày đăng</th>
                    <th class="text-center border border-dark">Danh mục</th>
                    <th class="text-center border border-dark">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($blogs) > 0): $count = 0;?>
                <?php foreach($blogs as $blog): $count++;?>
                <tr>
                    <td class="text-center border border-dark"><?=$count?></td>
                    <td class="text-center border border-dark" width="5%">
                        <img src="../uploads/<?=$blog['image']?>" alt="blog image"
                            style="height:40px;width:40px;object-fit:cover;">
                    </td>
                    <td class="text-center border border-dark"><?=$blog['title']?></td>
                    <td class="text-center border border-dark"><?=$blog['author']?></td>
                    <td class="text-center border border-dark"><?=$blog['view']?></td>
                    <td class="text-center border border-dark"><?=handleDateTime($blog['created_at'])?></td>
                    <td class="text-center border border-dark"><?=getBlogCategory($blog['category_id'])?></td>
                    <td class="text-center border border-dark">
                        <a href="?p=sua-bai-viet&blog_id=<?=$blog['id']?>" class="btn btn-primary btn-small">
                            <i class="bi bi-pencil-fill"></i>
                            Sửa
                        </a>
                        <div class="d-inline" onclick="
                            if (confirm('Bạn có chắc chắn muốn xóa bài viết này?')) {
                                document.delete_blog.blog_id.value = '<?=$blog['id']?>';
                                document.delete_blog.submit();
                            }">
                            <a href="#" class="btn btn-danger btn-small">
                                <i class="fa-solid fa-trash"></i>
                                Xoá
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; else:?>
                <div class="text-center">Không tìm thấy bài viết nào</div>
                <?php endif; ?>
            </tbody>
        </table>
        <input type="hidden" name="blog_id">
    </form>
    <?php include_once('views/block/pagination.php');?>
</div>