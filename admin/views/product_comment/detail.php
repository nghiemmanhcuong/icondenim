<div class="content">
    <h3 class="text-center mb-2">Tất cả bình luận <?= $product['name']?></h3>
    <form method="post" id="form-choose-all">
        <div class="mb-1">
            <button type="button" id="checked-all-btn" class="btn btn-primary me-1 btn-small">Chọn tất cả</button>
            <button type="button" id="unchecked-all-btn" class="btn btn-warning me-1 btn-small">Bỏ chọn tất cả</button>
            <button type="submit" id="submit-form-choose-all" class="btn btn-danger me-1 btn-small">Kiểm duyệt mục đã chọn</button>
        </div>
        <table class="table table-success">
            <thead>
                <tr>
                    <th class="text-center border border-dark">STT</th>
                    <th class="text-center border border-dark">Chọn</th>
                    <th class="text-center border border-dark">Người bình luận</th>
                    <th class="text-center border border-dark">Tiêu đề</th>
                    <th class="text-center border border-dark">Ngày bình luận</th>
                    <th class="text-center border border-dark">Trạng thái</th>
                    <th class="text-center border border-dark">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php $count=0; foreach($product_reviews as $review): $count++; ?>
                <tr>
                    <td class="text-center border border-dark"><?=$count?></td>
                    <td class="text-center border border-dark">
                        <input type="checkbox" name="chooseRows[]" value="<?=$review['id']?>" class="form-check-input">
                    </td>
                    <td class="text-center border border-dark"><?=$review['assessor_name']?></td>
                    <td class="text-center border border-dark"><?=$review['title']?></td>
                    <td class="text-center border border-dark"><?=$review['created_at']?></td>
                    <td class="text-center border border-dark">
                        <?=$review['status'] == 1 ? 'Đã kiểm duyệt' : 'Chưa kiểm duyệt'?>
                    </td>
                    <td class="text-center border border-dark">
                        <!-- detail -->
                        <a href="?p=chi-tiet-binh-luan&product_review_id=<?=$review['id']?>"
                            class="btn btn-primary btn-small">
                            Chi tiết
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>
    <?php include_once('views/block/pagination.php');?>
</div>