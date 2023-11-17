<?php
get_header();
?>
<div id="content">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h6>SỬA TIỆN ÍCH</h6>
                <form method="POST" class="form-group">
                    <label for="block_name">Tên tiện ích</label>
                    <input class="form-control form-inline" type="text" name="block_name" id="block_name" value="<?php echo $widget['block_name'] ?>"><br>
                    <?php echo form_error("block_name") ?>
                    <label for="title">Tiêu đề</label>
                    <input class="form-control form-inline" type="text" name="title" id="title" value="<?php echo $widget['title'] ?>"><br>
                    <?php echo form_error("title") ?>
                    <label for="introduce">Nội dung</label>
                    <textarea name="introduce" id="introduce" class="ckeditor form-control form-inline"><?php echo $widget['introduce'] ?></textarea><br>
                    <?php echo form_error("introduce") ?>
                    <label for="address">Địa chỉ</label>
                    <input class="form-control form-inline" type="text" name="address" id="address" value="<?php echo $widget['address'] ?>"><br>
                    <?php echo form_error("address") ?>
                    <label for="phone">Số điện thoại</label>
                    <input class="form-control form-inline" type="text" name="phone" id="phone" value="<?php echo $widget['phone'] ?>"><br>
                    <?php echo form_error("phone") ?>
                    <label for="email">Email</label>
                    <input class="form-control form-inline" type="text" name="email" id="email" value="<?php echo $widget['email'] ?>"><br>
                    <?php echo form_error("email") ?>
                    <button class="btn btn-primary btn-lg my-4" type="submit" name="update_widget" id="btn-submit">Sửa</button><br>
                    <?php echo form_error("account") ?>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End content  -->
<?php
get_footer();
?>