<?php
get_header();
get_sidebar();
?>
<div class="content-wrapper">
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">THÊM MÃ GIẢM GIÁ</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="name">Mã voucher</label>
                        <input class="form-control" type="text" name="name" id="name" value="<?php echo set_value("name") ?>">
                    </div>
                    <?php echo form_error("name") ?>

                    <div class="form-group">
                        <label for="quantity">Số lượng</label>
                        <input class="form-control" type="number" name="quantity" id="quantity" value="<?php echo set_value("quantity") ?>">
                    </div>
                    <?php echo form_error("quantity") ?>

                    <div class="form-group">
                        <label for="price">Giá trị voucher</label>
                        <input class="form-control" type="text" name="price" id="price" value="<?php echo set_value("price") ?>">
                    </div>
                    <?php echo form_error("price") ?>

                    <div class="form-group">
                        <label for="status">Trạng thái</label>
                        <select class="form-control" name="status" id="status">
                            <option value="">---Chọn---</option>
                            <option value="Chưa áp dụng">Chưa áp dụng</option>
                            <option value="Đã áp dụng">Đã áp dụng</option>
                        </select>
                    </div>
                    <?php echo form_error("status") ?>

                    <button type="submit" name="add_voucher" class="btn btn-primary">Thêm mới</button>
                    <?php echo form_error("account") ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>