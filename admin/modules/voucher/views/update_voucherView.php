<?php
get_header();
get_sidebar();
?>
<div class="content-wrapper">
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">SỬA MÃ voucher</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="voucher_code">Tên loại voucher</label>
                        <input class="form-control" type="text" name="voucher_code" id="voucher_code" value="<?php echo $voucher["voucher_code"] ?>">
                    </div>
                    <?php echo form_error("voucher_code") ?>

                    <div class="form-group">
                        <label for="quantity">Số lượng</label>
                        <input class="form-control" type="number" name="quantity" id="quantity" value="<?php echo $voucher["quantity"] ?>">
                    </div>
                    <?php echo form_error("quantity") ?>

                    <div class="form-group">
                        <label for="discount_amount">Giá trị voucher</label>
                        <input class="form-control" type="text" name="discount_amount" id="discount_amount" value="<?php echo $voucher["discount_amount"] ?>">
                    </div>
                    <?php echo form_error("discount_amount") ?>

                    <div class="form-group">
                        <label for="status">Trạng thái</label>
                        <select class="form-control" name="status" id="status">
                            <option value="">---Chọn---</option>
                            <option <?php if ($voucher['status'] == "Chưa áp dụng") echo "selected" ?> value="Chưa áp dụng">Chưa áp dụng</option>
                            <option <?php if ($voucher['status'] == "Đã áp dụng") echo "selected" ?> value="Đã áp dụng">Đã áp dụng</option>
                        </select>
                    </div>
                    <?php echo form_error("status") ?>

                    <button type="submit" name="update_voucher" class="btn btn-primary">Cập nhật</button>
                    <?php echo form_error("account") ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>