<?php
get_header();
get_sidebar();
?>
<div class="content-wrapper">
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">THÊM ĐƠN VỊ VẬN CHUYỂN</h3>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="title">Tên nhà vận chuyển</label>
                        <input class="form-control" type="text" name="title" id="title"
                            value="<?php echo set_value("title") ?>">
                    </div>
                    <?php echo form_error("title") ?>
                    <div class="form-group">
                        <label for="price">Giá vận chuyển</label>
                        <input class="form-control" type="text" name="price" id="price"
                            value="<?php echo set_value("price") ?>">
                    </div>
                    <?php echo form_error("price") ?>
                    <button type="submit" name="add_shipping" class="btn btn-primary">Thêm mới</button>
                    <?php echo form_error("account") ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>