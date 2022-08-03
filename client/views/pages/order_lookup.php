<div class="order-lookup">
    <div class="container">
        <h1 class="order-lookup-title">Tra cứu đơn hàng</h1>
        <div class="order-lookup-container">
            <div class="order-lookup-wrapper row">
                <div class="col-4 col-md-6 col-sm-12">
                    <form method="post" class="order-lookup-form">
                        <h3 class="order-lookup-form-title">Kiểm tra đơn hàng của bạn</h3>
                        <!-- order lookup method -->
                        <div class="order-lookup-form-group">
                            <label class="order-lookup-form-label" for="method_phone">Phương thức kiểm tra</label>
                            <div style="display:inline-flex;align-items:center;margin-right:30px;">
                                <input <?=($method == 'phone') ?  'checked' : ''?> style="margin-right:3px;"
                                    type="radio" name="method_search" id="method_phone" value="?method=phone">
                                <label class="order-lookup-form-label" for="phone">Số điện thoại</label>
                            </div>
                            <div style="display:inline-flex;align-items:center;">
                                <input <?=($method == 'email') ?  'checked' : ''?> style="margin-right:3px;"
                                    type="radio" name="method_search" id="method_email" value="?method=email">
                                <label class="order-lookup-form-label" for="method_email">Email</label>
                            </div>
                        </div>
                        <!-- method phone -->
                        <?php if($method == 'phone'):?>
                        <div class="order-lookup-form-input" id="order-lookup-form-input-phone">
                            <label class="order-lookup-form-label">Số điện thoại:</label>
                            <input type="text" name="member_phone" placeholder="0909 xxx xxx">
                        </div>
                        <?php endif;?>
                        <!-- method email -->
                        <?php if($method == 'email'):?>
                        <div class="order-lookup-form-input" id="order-lookup-form-input-email">
                            <label class="order-lookup-form-label">Email:</label>
                            <input type="text" name="member_email" placeholder="email@gmail.com">
                        </div>
                        <?php endif;?>
                        <p class="order-lookup-form-desc">
                            Nếu quý khách có bất kỳ thắc mắc nào, xin vui lòng gọi <strong>0987 954 221</strong>
                        </p>
                        <button type="submit" class="order-lookup-form-btn">Xem ngay</button>
                    </form>
                </div>
                <div class="col-8 col-md-6 col-sm-12">
                    <div class="order-lookup-result">
                        <?php if(isset($error)):?>
                        <div class="form-error" style="font-size:14px;"><?=$error?></div>
                        <?php endif;?>
                        <?php if(!empty($orders)):?>
                        
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>