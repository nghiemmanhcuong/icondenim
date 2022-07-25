<div class="content row">
    <!-- attributes add -->
    <div class="col-6">
        <form class="form-add" style="width:100%;" method="post">
            <!-- message -->
            <?php if(isset($_GET['msg'])):?>
            <div class="alert alert-success position-relative">
                <?=$_GET['msg']?>
                <a href="?p=them-vao-kho&product_id=<?=$product_id?>">
                    <i class="fa-solid fa-circle-xmark fs-5 position-absolute"></i>
                </a>
            </div>
            <?php endif;?>
            <div class="d-flex align-items-center">
                <a href="?p=danh-sach-san-pham" class="btn btn-primary mb-2">
                    <i class="bi bi-arrow-left"></i>
                    Quay lại
                </a>
                <a href="?p=them-san-pham" class="btn btn-success mb-2 ms-2">
                    <i class="bi bi-plus-circle-fill"></i>
                    Thêm sản phẩm
                </a>
            </div>
            <!-- product adding name -->
            <div class="mb-3">
                <label class="form-label">Sản phẩm</label>
                <div class="d-flex align-items-center">
                    <input type="text" readonly value="<?=$product['name']?>" class="form-control me-5">
                    <img src="../uploads/<?=$product['image']?>" width="60" class="border">
                </div>
            </div>
            <!-- attributes -->
            <h3 class="text-center border-top border-bottom py-2">Thêm vào kho</h3>
            <div class="mb-3 row position-relative" id="attributes">
                <div class="my-2 row attribute-item">
                    <!-- color -->
                    <div class="col-4">
                        <label class="form-label">Màu</label>
                        <select name="color[]" class="form-select">
                            <option value="">--Chọn--</option>
                            <?php foreach ($colors as $color):?>
                            <option value="<?=$color['id']?>"><?=$color['name']?></option>
                            <?php endforeach;?>
                        </select>
                        <?php if(isset($errors['color'])) : ?>
                        <div class="form-error"><?=$errors['color']?></div>
                        <?php endif;?>
                    </div>
                    <!-- size -->
                    <div class="col-4">
                        <label class="form-label">Kích cỡ</label>
                        <select name="size[]" class="form-select">
                            <option value="">--Chọn--</option>
                            <?php foreach ($sizes as $size):?>
                            <option value="<?=$size['id']?>"><?=$size['name']?></option>
                            <?php endforeach;?>
                        </select>
                        <?php if(isset($errors['size'])) : ?>
                        <div class="form-error"><?=$errors['size']?></div>
                        <?php endif;?>
                    </div>
                    <!-- quantity -->
                    <div class="col-4">
                        <label class="form-label">Số lượng</label>
                        <input type="number" name="quantity[]" class="form-control">
                        <?php if(isset($errors['quantity'])) : ?>
                        <div class="form-error"><?=$errors['quantity']?></div>
                        <?php endif;?>
                    </div>
                </div>
                <div class="position-absolute" style="bottom:-35px;">
                    <div class="btn btn-success" id="add-attribute" style="font-size:12px;">
                        <i class="bi bi-plus-circle-fill"></i>
                        Thêm
                    </div>
                </div>
            </div>
            <div class="form-button">
                <button class="btn btn-primary mt-5" type="submit" name="add_attribute">Thêm vào kho</button>
            </div>
        </form>
    </div>
    <!-- attributes added -->
    <div class="col-6 form-add" style="height:max-content;">
        <h3 class="text-center border-top border-bottom py-2 mt-3">Kho</h3>
        <?php foreach ($product_warehouse as $attribute):?>
        <form method="post">
            <div class="my-2 row">
                <!-- color -->
                <div class="col-3">
                    <label class="form-label">Màu</label>
                    <select name="color" class="form-select"
                        <?= (!isset($_GET['attribute_id'])) || ($attribute['id'] != $_GET['attribute_id']) ? 'disabled' : ''?>>
                        <?php foreach ($colors as $color):?>
                        <option <?=($attribute['color'] == $color['id']) ? 'selected' : ''?> value="<?=$color['id']?>">
                            <?=$color['name']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <!-- size -->
                <div class="col-3">
                    <label class="form-label">Kích cỡ</label>
                    <select name="size" class="form-select"
                        <?= (!isset($_GET['attribute_id'])) || ($attribute['id'] != $_GET['attribute_id']) ? 'disabled' : ''?>>
                        <option value="">không có</option>
                        <?php foreach ($sizes as $size):?>
                        <option <?=($attribute['size'] == $size['id']) ? 'selected' : ''?> value="<?=$size['id']?>">
                            <?=$size['name']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <!-- quantity -->
                <div class="col-3">
                    <label class="form-label">Số lượng</label>
                    <input type="number" name="quantity" class="form-control" value="<?=$attribute['quantity']?>"
                        <?= (!isset($_GET['attribute_id'])) || ($attribute['id'] != $_GET['attribute_id']) ? 'readonly' : ''?>>
                </div>
                <!-- action -->
                <div class="col-3">
                    <label class="form-label d-block">Chức năng</label>
                    <?php if(isset($_GET['attribute_id']) && $_GET['attribute_id'] == $attribute['id']):?>
                    <input type="hidden" name="id" value="<?=$attribute['id']?>">
                    <button type="submit" name="edit_attribute" class="btn btn-success"
                        style="font-size:12px;">Lưu</button>
                    <a href="?p=them-vao-kho&product_id=<?=$product_id?>" class="btn btn-primary"
                        style="font-size:12px;">Bỏ</a>
                    <?php else:?>
                    <a href="?p=them-vao-kho&product_id=<?=$product_id?>&attribute_id=<?=$attribute['id']?>"
                        class="btn btn-primary" style="font-size:12px;"></i>Sửa</a>
                    <div class="d-inline" onclick="return confirm('Bạn có muốn xoá sản phẩm này??')">
                        <a href="?p=them-vao-kho&product_id=<?=$product_id?>&delete_id=<?=$attribute['id']?>"
                            class="btn btn-danger" style="font-size:12px;">Xoá</a>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </form>
        <?php endforeach;?>
    </div>
    <script>
    // form product add
    const attributes = document.getElementById('attributes');
    const addAttribute = document.getElementById('add-attribute');

    if (attributes) {
        attributes.onclick = (e) => {
            if (e.target.closest('.delete-attribute')) {
                const attributeItem = e.target.parentElement;
                attributes.removeChild(attributeItem);
            }
        };
    }

    if (addAttribute) {
        addAttribute.onclick = () => {
            const div = document.createElement('div');
            div.innerHTML = `
                <div class="col-4">
                    <label class="form-label">Màu</label>
                    <select name="color[]" class="form-select">
                        <option value="">--Chọn--</option>
                        <?php foreach ($colors as $color):?>
                            <option value="<?=$color['id']?>"><?=$color['name']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="col-4">
                    <label class="form-label">Kích cỡ</label>
                    <select name="size[]" class="form-select">
                        <option value="">--Chọn--</option>
                        <?php foreach ($sizes as $size):?>  
                            <option value="<?=$size['id']?>"><?=$size['name']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="col-4">
                    <label class="form-label">Số lượng</label>
                    <input type="number" name="quantity[]" class="form-control">
                </div>
                <div class="position-absolute delete-attribute">
                    Xoá
                </div>
            `;
            div.classList.add('row', 'my-2', 'position-relative', 'attribute-item');
            attributes.appendChild(div);
        };
    }
    </script>
</div>