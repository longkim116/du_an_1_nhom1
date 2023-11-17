<?php
get_header();
?>
<div id="content">
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-2 border-right">
                <?php get_sidebar(); ?>
            </div>
            <div class="col-md-10">
                <h6>THÊM TÀI KHOẢN MỚI</h6>
                <form method="POST" class="form-group ">
                    <label for="fullname">Tên hiển thị</label>
                    <input type="text" name="fullname" id="fullname" class="form-inline form-control" value="<?php echo set_value('fullname') ?>">
                    <?php echo form_error('fullname') ?>

                    <label for="username">Tên đăng nhập</label>
                    <input type="text" name="username" id="username" class="form-inline form-control" value="<?php echo set_value('username') ?>">
                    <?php echo form_error('username') ?>

                    <label for="password">Mật khẩu</label>
                    <input type="password" name="password" id="password" class="form-inline form-control" value="<?php echo set_value('password') ?>">
                    <?php echo form_error('password') ?>

                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-inline form-control" value="<?php echo set_value('email') ?>">
                    <?php echo form_error('email') ?>

                    <label for="tel">Số điện thoại</label>
                    <input type="tel" name="tel" id="tel" class="form-inline form-control" value="<?php echo set_value('tel') ?>">
                    <?php echo form_error('tel') ?>

                    <label for="address">Địa chỉ</label>
                    <textarea name="address" id="address" class="form-inline form-control"><?php echo set_value('address') ?></textarea>
                    <?php echo form_error('address') ?>

                    <button type="submit" name="btn-add" id="btn-submit" class="btn btn-primary btn-lg mt-3">Thêm</button>
                    <?php echo form_error('account') ?>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End content  -->
<?php
get_footer();
?>