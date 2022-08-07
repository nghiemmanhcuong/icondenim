<div class="content">
    <h3 class="text-center mb-2">Bình luận sản phẩm</h3>
    <table class="table table-success">
        <thead>
            <tr>
                <th class="text-center border border-dark">STT</th>
                <th class="text-center border border-dark">Tên sản phẩm</th>
                <th class="text-center border border-dark">SL bình luận</th>
                <th class="text-center border border-dark">Chức năng</th>
            </tr>
        </thead>
        <tbody>
            <?php $count=0; foreach($products as $product): $count++; ?>
            <tr>
                <td class="text-center border border-dark"><?=$count?></td>
                <td class="text-center border border-dark"><?=$product['name']?></td>
                <td class="text-center border border-dark"><?=getTotalProductReviews($product['id'])?></td>
                <td class="text-center border border-dark">
                    <!-- detail -->
                    <a href="?p=tat-ca-binh-luan&product_id=<?=$product['id']?>" class="btn btn-primary btn-small">
                        <i class="bi bi-list-ul"></i>
                        Xem tất cả
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php include_once('views/block/pagination.php');?>
</div>