<div class="content">
    <h3 class="text-center mb-3">Danh sách người dùng</h3>
    <!-- message -->
    <?php if(isset($_GET['msg'])):?>
    <div class="alert alert-success delete position-relative">
        <?=$_GET['msg']?>
        <a href="?p=danh-sach-nguoi-dung">
            <i class="fa-solid fa-circle-xmark fs-5 position-absolute"></i>
        </a>
    </div>
    <?php endif;?>
    <!-- filter update -->
    <div class="d-flex justify-content-between">
        <form method="post" class="mb-3 d-flex align-items-center form-filter">
            <input type="text" name="keyword" placeholder="Nhập tên hoặc email..." class="form-control">
            <button class="btn btn-success ms-2" style="min-width:max-content;font-size:14px;">
                Tìm kiếm
                <i class="bi bi-search"></i>
            </button>
        </form>
        <div class="d-flex">
            <!-- filter -->
            <select class="form-select mb-3 me-2" style="width:max-content;" id="filter">
                <option value="<?='?p='.$_GET['p']?>">--Sắp xếp--</option>
                <!-- filter name asc -->
                <option <?= isset($field) && isset($sort) && $field == 'name' && $sort == 'ASC' ? 'selected' : ''?>
                    value="<?=isset($keyword) ? $filter_name_asc.'&keyword='.$keyword : $filter_name_asc?>">
                    Sắp xếp theo tên A-Z</option>

                <!-- filter name desc -->
                <option <?= isset($field) && isset($sort) && $field == 'name' && $sort == 'DESC' ? 'selected' : ''?>
                    value="<?=isset($keyword) ? $filter_name_desc.'&keyword='.$keyword : $filter_name_desc?>">
                    Sắp xếp theo tên Z-A</option>
            </select>
            <div>
                <a href="?p=danh-sach-nguoi-dung" class="btn btn-danger" style="font-size:14px;">
                    <i class="bi bi-arrow-repeat"></i>
                    update
                </a>
            </div>
        </div>
    </div>
    <!-- keyword -->
    <?php if(isset($keyword)):?>
    <div class="mb-2">
        Kết quả tìm kiếm cho: '<?=$keyword?>'
        <a href="?p=danh-sach-nguoi-dung" style="color:blue;">Quay lại</a>
    </div>
    <?php endif;?>
    <!-- table -->
    <form action="?p=xoa-nguoi-dung" method="post" name="delete_user">
        <table class="table table-primary">
            <!-- head -->
            <thead>
                <tr>
                    <th class="text-center border border-dark">STT</th>
                    <th class="text-center border border-dark">Ảnh</th>
                    <th class="text-center border border-dark">Tên</th>
                    <th class="text-center border border-dark">Địa chỉ</th>
                    <th class="text-center border border-dark">Email</th>
                    <th class="text-center border border-dark">Số điện thoại</th>
                    <th class="text-center border border-dark">Chức vụ</th>
                    <th class="text-center border border-dark">Chức năng</th>
                </tr>
            </thead>
            <!-- body -->
            <tbody>
                <?php if(count($users) > 0):$count = 0;?>
                <?php foreach($users as $user): $count++?>
                <tr>
                    <td class="text-center border border-dark"><?=$count?></td>
                    <td class="text-center border border-dark" width="3%">
                        <img src="../uploads/<?=$user['avatar']?>" alt="avatar image" class="rounded-circle"
                            style="height:30px;width:30px;">
                    </td>
                    <td class="text-center border border-dark"><?=$user['name']?></td>
                    <td class="text-center border border-dark"><?=$user['address']?></td>
                    <td class="text-center border border-dark"><?=$user['email']?></td>
                    <td class="text-center border border-dark"><?='0'.$user['phone']?></td>
                    <td class="text-center border border-dark">
                        <?=!empty(handleAccess($user['access'])) ? handleAccess($user['access']) : ''?>
                    </td>
                    <td class="text-center border border-dark">
                        <a href="?p=sua-nguoi-dung&id=<?=$user['id']?>" class="btn btn-primary btn-small">
                            <i class="fa-solid fa-pen"></i>
                            Sửa
                        </a>
                        <?php if($user['access'] != 'user'):?>
                        <div class="d-inline" onclick="
                            if (confirm('Bạn có chắc chắn muốn xóa người dùng này?')) {
                                document.delete_user.user_id.value = '<?=$user['id']?>';
                                document.delete_user.submit();
                            }">
                            <a href="#" class="btn btn-danger btn-small">
                                <i class="fa-solid fa-trash"></i>
                                Xoá
                            </a>
                        </div>
                        <?php endif;?>
                    </td>
                </tr>
                <?php endforeach; endif;?>
            </tbody>
        </table>
        <input type="text" name="user_id" hidden>
    </form>
    <!-- pagination -->
    <?php include_once('views/block/pagination.php');?>
</div>