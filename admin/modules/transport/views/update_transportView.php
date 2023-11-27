<?php
get_header();
get_sidebar();
?>
<div class="content-wrapper">
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">SỬA ĐỐI TÁC VẬN CHUYỂN</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="name">Tên nhà vận chuyển</label>
                        <input class="form-control" type="text" name="name" id="name" value="<?php echo $transport['transporters'] ?>">
                    </div>
                    <?php echo form_error("name") ?>

                    <div class="form-group">
                        <label for="price">Giá vận chuyển</label>
                        <input class="form-control" type="text" name="price" id="price" value="<?php echo $transport['price'] ?>">
                    </div>
                    <?php echo form_error("price") ?>

                    <button type="submit" name="update_transport" class="btn btn-primary">Cập nhật</button>
                    <?php echo form_error("account") ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>