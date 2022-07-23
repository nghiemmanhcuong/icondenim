<div class="content">
    <h3 class="text-center mb-3">Danh sách sản phẩm</h3>
    <!-- message -->
    <?php if(isset($_GET['msg'])):?>
    <div class="alert alert-success delete position-relative">
        <?=$_GET['msg']?>
        <a href="?p=danh-sach-san-pham">
            <i class="fa-solid fa-circle-xmark fs-5 position-absolute"></i>
        </a>
    </div>
    <?php endif;?>
    <!-- form filter -->
    <div class="d-flex align-items-center justify-content-between">
        <!-- search -->
        <form method="post" class="mb-3 d-flex align-items-center form-filter">
            <input type="text" name="keyword" placeholder="Nhập tên sản phẩm..." class="form-control">
            <button class="btn btn-success ms-2" style="min-width:max-content;font-size:14px;" name="search_product">
                Tìm kiếm
                <i class="bi bi-search"></i>
            </button>
        </form>
        <!-- filter -->
        <select class="form-select mb-3" style="width:15%;" id="filter">
            <option value="<?='?p='.$_GET['p']?>">--Sắp xếp--</option>
            <!-- filter price asc -->
            <option <?= isset($field) && isset($sort) && $field == 'price' && $sort == 'ASC' ? 'selected' : ''?>
                value="<?=isset($keyword) ? $filter_price_asc.'&keyword='.$keyword : $filter_price_asc?>">
                Giá: Từ thấp đến cao</option>

            <!-- filter price desc -->
            <option <?= isset($field) && isset($sort) && $field == 'price' && $sort == 'DESC' ? 'selected' : ''?>
                value="<?=isset($keyword) ? $filter_price_desc.'&keyword='.$keyword : $filter_price_desc?>">
                Giá: Từ cao đến thấp</option>

            <!-- filter name asc -->
            <option <?= isset($field) && isset($sort) && $field == 'name' && $sort == 'ASC' ? 'selected' : ''?>
                value="<?=isset($keyword) ? $filter_name_asc.'&keyword='.$keyword : $filter_name_asc?>">
                Sắp xếp theo tên A-Z</option>
                
            <!-- filter name desc -->
            <option <?= isset($field) && isset($sort) && $field == 'name' && $sort == 'DESC' ? 'selected' : ''?>
                value="<?=isset($keyword) ? $filter_name_desc.'&keyword='.$keyword : $filter_name_desc?>">
                Sắp xếp theo tên Z-A</option>
        </select>
    </div>
    <!-- keyword -->
    <?php if(isset($keyword)):?>
    <div class="mb-2">
        Kết quả tìm kiếm cho: '<?=$keyword?>'
        <a href="?p=danh-sach-san-pham" style="color:blue;">Quay lại</a>
    </div>
    <?php endif;?>
    <form action="index.php?p=xoa-san-pham" method="post" name="delete_product">
        <table class="table table-primary">

            <head>
                <tr>
                    <th class="text-center border border-dark">STT</th>
                    <th class="text-center border border-dark">Ảnh</th>
                    <th class="text-center border border-dark">Tên sản phẩm</th>
                    <th class="text-center border border-dark">Giá</th>
                    <th class="text-center border border-dark">Giá cũ</th>
                    <th class="text-center border border-dark">Lượt xem</th>
                    <th class="text-center border border-dark">Lượt mua</th>
                    <th class="text-center border border-dark">Ngày thêm</th>
                    <th class="text-center border border-dark">Update</th>
                    <th class="text-center border border-dark">Chức năng</th>
                </tr>
            </head>
            <tbody>
                <?php if(count($products) > 0):$count = 0;?>
                <?php foreach($products as $product):$count++;?>
                <tr>
                    <td class="text-center border border-dark"><?=$count?></td>
                    <td class="text-center border border-dark" width="3%">
                        <img src="../uploads/<?=$product['image']?>" alt="product image" class="rounded-circle"
                            style="height:30px;width:30px;">
                    </td>
                    <td class="text-center border border-dark"><?=$product['name']?></td>
                    <td class="text-center border border-dark"><?=handlePrice($product['price'])?></td>
                    <td class="text-center border border-dark"><?=handlePrice($product['old_price'])?></td>
                    <td class="text-center border border-dark"><?=$product['view']?></td>
                    <td class="text-center border border-dark"><?=$product['sold']?></td>
                    <td class="text-center border border-dark"><?=handleDateTime($product['created_at'])?></td>
                    <td class="text-center border border-dark"><?=handleDateTime($product['updated_at'],true)?></td>
                    <td class="text-center border border-dark">
                        <!-- edit -->
                        <a href="?p=sua-san-pham&product_id=<?=$product['id']?>" class="btn btn-primary btn-small">
                            <i class="fa-solid fa-pen"></i>
                            Sửa
                        </a>
                        <!-- warehouse -->
                        <a href="?p=them-vao-kho&product_id=<?=$product['id']?>" class="btn btn-success btn-small">
                            <i class="fa-solid fa-warehouse"></i>
                            Kho
                        </a>
                        <!-- image -->
                        <a href="?p=anh-san-pham&product_id=<?=$product['id']?>" class="btn btn-warning btn-small">
                            <i class="bi bi-images"></i>
                            Ảnh
                        </a>
                        <!-- delete -->
                        <div class="d-inline" onclick="
                            if (confirm('Bạn có chắc chắn muốn xóa người dùng này?')) {
                                document.delete_product.product_id.value = '<?=$product['id']?>';
                                document.delete_product.submit();
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
                <div class="text-center">Không tìm thấy sản phẩm nào!!!</div>
                <?php endif;?>
            </tbody>
        </table>
        <?php include_once('views/block/pagination.php');?>
        <input type="hidden" name="product_id">
    </form>
</div>
