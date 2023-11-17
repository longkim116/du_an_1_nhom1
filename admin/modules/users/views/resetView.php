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
                <h6>ĐỔI MẬT KHẨU</h6>
                <form method="POST" class="form-group ">
                    <label for="pass-old">Mật khẩu cũ</label>
                    <input type="password" name="pass-old" id="pass-old" class="form-inline form-control">
                    <?php echo form_error('pass-old') ?>


                    <label for="pass-new">Mật khẩu mới</label>
                    <input type="password" name="pass-new" id="pass-new" class="form-inline form-control">
                    <?php echo form_error('pass-new') ?>


                    <label for="confirm-pass">Nhập lại mật khẩu mới</label>
                    <input type="password" name="confirm-pass" id="confirm-pass" class="form-inline form-control">
                    <?php echo form_error('confirm-pass') ?>


                    <button type="submit" name="btn-change-pass" id="btn-submit" class="btn btn-primary btn-lg mt-3">Cập nhật</button>
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