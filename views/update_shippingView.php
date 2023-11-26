<?php
get_header();
get_sidebar();
?>
<div class="content-wrapper">
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">SỬA ĐƠN VỊ VẬN CHUYỂN</h3>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="title">Tên nhà vận chuyển</label>
                        <input class="form-control" type="text" name="title" id="title"
                            value="<?php echo $shipping["name"] ?>">
                    </div>
                    <?php echo form_error("title") ?>
                    <div class="form-group">
                        <label for="price">Giá vận chuyển</label>
                        <input class="form-control" type="text" name="price" id="price"
                            value="<?php echo $shipping["price"] ?>">
                    </div>
                    <?php echo form_error("price") ?>
                    <button type="submit" name="update_shipping" class="btn btn-primary">Cập nhật</button>
                    <?php echo form_error("account") ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>