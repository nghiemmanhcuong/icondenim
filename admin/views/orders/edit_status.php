<div class="content">
    <form method="post" class="form-add">
        <div class="mb-3">
            <h3 class="text-center mb-2">Sửa trạng thái</h3>
            <a href="?p=don-hang" class="btn btn-success mb-3">
                <i class="bi bi-arrow-left"></i>
                Quay lại
            </a>
            <div>
                <label class="form-label">Tên khách hàng</label>
                <input class="form-control" type="text" readonly value="<?=$order['customer_name']?>">
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Trạng thái đơn hàng</label>
            <select name="status" class="form-select">
                <option value="Chờ xác nhận">Chờ xác nhận</option>
                <option value="Đang vận chuyển">Đang vận chuyển</option>
                <option value="Đã thanh toán">Đã thanh toán</option>
            </select>
        </div>
        <div class="form-button">
            <button class="btn btn-primary">Thay đổi trạng thái</button>
        </div>
    </form>
</div>