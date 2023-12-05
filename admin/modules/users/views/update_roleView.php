<?php
get_header();
get_sidebar();
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>HỒ SƠ</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="?mod=home&action=index">Trang chủ</a></li>
                        <li class="breadcrumb-item active"><a href="?mod=users&action=main">Hồ sơ</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col-sm-6">
                <h4>Cập nhật thông tin phòng ban</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-pane active p-2 bg-white" id="settings">
                        <form method="POST" class="form-group ">
                            <label for="role_name">Tên phòng ban</label>
                            <input type="text" name="role_name" id="role_name" class="form-inline form-control" value="<?php echo $role['role_name'] ?>">
                            <?php echo form_error('role_name') ?>

                            <button type="submit" name="update_role" class="btn btn-primary btn-lg mt-3">Cập nhật</button>
                            <?php echo form_error('account') ?>
                        </form>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?php
get_footer();
?>