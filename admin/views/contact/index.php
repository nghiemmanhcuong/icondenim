<div class="content">
    <h3 class="text-center fw-bold">Liên hệ</h3>
    <!-- message -->
    <?php if(isset($_GET['msg'])):?>
    <div class="alert alert-success delete position-relative">
        <?=$_GET['msg']?>
        <a href="?p=lien-he">
            <i class="fa-solid fa-circle-xmark fs-5 position-absolute"></i>
        </a>
    </div>
    <?php endif;?>
    <table class="table table-success">
        <thead>
            <tr>
                <th class="text-center border border-dark">STT</th>
                <th class="text-center border border-dark">Tên</th>
                <th class="text-center border border-dark">Email</th>
                <th class="text-center border border-dark">Số điện thoại</th>
                <th class="text-center border border-dark">Ngày gửi</th>
                <th class="text-center border border-dark">Chức năng</th>
            </tr>
        </thead>
        <tbody>
            <?php if(count($contacts) > 0):$count = 0;?>
            <?php foreach ($contacts as $contact):$count++;?>
            <tr>
                <td class="text-center border border-dark"><?=$count?></td>
                <td class="text-center border border-dark"><?=$contact['user_name']?></td>
                <td class="text-center border border-dark"><?=$contact['user_email']?></td>
                <td class="text-center border border-dark">0<?=$contact['user_phone']?></td>
                <td class="text-center border border-dark"><?=$contact['created_at']?></td>
                <td class="text-center border border-dark">
                    <a href="?p=chi-tiet-phan-hoi&contact_id=<?=$contact['id']?>" class="btn btn-primary"
                        style="font-size:12px;">Chi tiết</a>
                    <a href="?p=tra-loi-phan-hoi&contact_id=<?=$contact['id']?>" class="btn btn-success"
                        style="font-size:12px;">Trả lời qua mail</a>
                </td>
            </tr>
            <?php endforeach;?>
            <?php else:?>
            <tr>
                <td width="100%" class="text-center border border-dark">
                    Không có liên hệ nào
                </td>
            </tr>
            <?php endif;?>
        </tbody>
    </table>
    <!-- pagination -->
    <?php include_once('views/block/pagination.php');?>
</div>