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
                <h6>CẬP NHẬT THÔNG TIN QUẢN TRỊ VIÊN</h6>
                <form method="POST" class="form-group ">
                    <label for="fullname">Tên hiển thị</label>
                    <input type="text" name="fullname" id="fullname" class="form-inline form-control" value="<?php echo $user['fullname'] ?>">
                    <?php echo form_error('fullname') ?>

                    <label for="username">Tên đăng nhập</label>
                    <input type="text" disabled name="username" id="username" class="form-inline form-control" value="<?php echo $user['username'] ?>">
                    <?php echo form_error('username') ?>

                    <label for="password">Mật khẩu(Đã mã hóa)</label>
                    <input type="text" disabled name="password" id="password" class="form-inline form-control" value="<?php echo $user['password'] ?>">
                    <?php echo form_error('password') ?>

                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-inline form-control" value="<?php echo $user['email'] ?>">
                    <?php echo form_error('email') ?>

                    <label for="phone_number">Số điện thoại</label>
                    <input type="text" name="phone_number" id="phone_number" class="form-inline form-control" value="<?php echo $user['phone_number'] ?>">
                    <?php echo form_error('phone_number') ?>

                    <label for="address">Địa chỉ</label>
                    <textarea name="address" id="address" class="form-inline form-control"><?php echo $user['address'] ?></textarea>
                    <?php echo form_error('address') ?>

                    <button type="submit" name="update_user" id="btn-submit" class="btn btn-primary btn-lg mt-3">Cập nhật</button>
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