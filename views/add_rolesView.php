<?php
get_header();
get_sidebar();
?>
<div class="content-wrapper">
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Phân quyền</h3>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="title">Tên quản lý</label>
                        <input class="form-control" type="text" name="title" id="title"
                            value="<?php echo set_value("title") ?>">
                    </div>
                    <?php echo form_error("title") ?>
                    <button type="submit" name="add_roles" class="btn btn-primary">Thêm mới</button>
                    <?php echo form_error("account") ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>