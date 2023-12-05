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
                        <li class="breadcrumb-item active">Thông tin người dùng</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="public/img/admin.png" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center fullname"><?php echo info_login() ?></h3>

                            <p class="text-muted text-center"><?php echo $info_user['role_name'] ?></p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Tên đăng nhập</b> <a class="float-right"><?php echo info_login('username') ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Số điện thoại</b> <a class="float-right phone_number"><?php echo info_login('phone_number') ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Email</b> <a class="float-right email"><?php echo info_login('email') ?></a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2 w-100">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Thông tin</a></li>
                                <li class="nav-item"><a class="nav-link" href="#changepass" data-toggle="tab">Đổi mật khẩu</a></li>
                                <?php if (info_login("role_id") == 1) : ?>
                                    <li class="nav-item"><a class="nav-link" href="#addusers" data-toggle="tab">Thêm nhân viên</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#listusers" data-toggle="tab">Danh sách nhân viên</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#add" data-toggle="tab">Danh sách phòng ban</a></li>
                                <?php endif ?>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <div class="col-md-9">
                                        <div class="col-sm-6">
                                            <h1>Thông tin tài khoản</h1>
                                        </div>
                                        <div class="tab-pane active p-2 bg-white" id="settings">
                                            <form method="POST" class="form-group ">
                                                <label for="fullname">Tên hiển thị</label>
                                                <input type="text" name="fullname" id="fullname" class="form-inline form-control" value="<?php echo $info_user['fullname'] ?>">

                                                <label for="username">Tên đăng nhập</label>
                                                <input type="text" name="username" disabled id="username" class="form-inline form-control" value="<?php echo $info_user['username'] ?>">

                                                <label for="email">Email</label>
                                                <input type="email" name="email" id="email" class="form-inline form-control" value="<?php echo $info_user['email'] ?>">

                                                <label for="phone_number">Số điện thoại</label>
                                                <input type="text" name="phone_number" id="phone_number" class="form-inline form-control" value="<?php echo $info_user['phone_number'] ?>">

                                                <label for="address">Địa chỉ</label>
                                                <textarea name="address" id="address" class="form-inline form-control"><?php echo $info_user['address'] ?></textarea>

                                                <button type="submit" onclick="update_info(event)" name="btn-update" id="btn-submit" class="btn btn-primary btn-lg mt-3">Cập nhật</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="changepass">
                                    <div class="col-md-9">
                                        <div class="col-sm-6">
                                            <h1>Đổi mật khẩu</h1>
                                        </div>
                                        <div class="tab-pane active p-2 bg-white" id="settings">
                                            <form method="POST" class="form-group ">
                                                <label for="old_pass">Mật khẩu cũ</label>
                                                <input type="password" name="pass-old" id="old_pass" class="form-inline form-control">

                                                <label for="new_pass">Mật khẩu mới</label>
                                                <input type="password" name="pass-new" id="new_pass" class="form-inline form-control">

                                                <label for="con_new_pass">Nhập lại mật khẩu mới</label>
                                                <input type="password" name="confirm-pass" id="con_new_pass" class="form-inline form-control">

                                                <button type="submit" onclick="change_pass(event)" name="btn-change-pass" id="btn-submit" class="btn btn-primary btn-lg mt-3">Cập nhật</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="addusers">
                                    <div class="col-md-9">
                                        <div class="col-sm-6">
                                            <h1>Thêm quản trị viên</h1>
                                        </div>
                                        <div class="tab-pane active p-2 bg-white" id="settings">
                                            <form method="POST" class="form-group ">
                                                <label for="add_fullname">Tên hiển thị</label>
                                                <input type="text" name="add_fullname" id="add_fullname" class="form-inline form-control" value="">

                                                <label for="add_username">Tên đăng nhập</label>
                                                <input type="text" name="add_username" id="add_username" class="form-inline form-control" value="">

                                                <label for="add_password">Mật khẩu</label>
                                                <input type="password" name="add_password" id="add_password" class="form-inline form-control" value="">

                                                <label for="add_email">Email</label>
                                                <input type="email" name="add_email" id="add_email" class="form-inline form-control" value="">

                                                <label for="add_tel">Số điện thoại</label>
                                                <input type="text" name="add_tel" id="add_tel" class="form-inline form-control" value="">

                                                <label for="add_address">Địa chỉ</label>
                                                <textarea name="add_address" id="add_address" class="form-inline form-control"></textarea>

                                                <label for="role">Phòng ban</label>
                                                <select class="form-control" name="role" id="role">
                                                    <option value="">---Chọn---</option>
                                                    <?php foreach ($list_roles as  $value) : ?>
                                                        <option <?php echo ($value['id'] == 0) ? "disabled" : "" ?> value="<?php echo $value['id'] ?>"><?php echo $value['role_name'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>

                                                <button type="submit" onclick="add_user(event)" name="btn-add" id="btn-submit" class="btn btn-primary btn-lg mt-3">Thêm</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="listusers">
                                    <div class="col-md-12">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr class="thead-dark">
                                                    <th>STT</th>
                                                    <th>Họ và tên</th>
                                                    <th>Tên đăng nhập</th>
                                                    <th>Email</th>
                                                    <th>Số điện thoại</th>
                                                    <th>Phòng ban</th>
                                                    <th style="width: 15%;">Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody id="list_users">
                                                <?php if (!empty($list_users)) :
                                                    $count = 0;
                                                    foreach ($list_users as $item) :
                                                        $count++; ?>
                                                        <tr>
                                                            <td><?php echo $count; ?></td>
                                                            <td><?php echo $item['fullname']; ?></td>
                                                            <td><?php echo $item['username']; ?></td>
                                                            <td><?php echo $item['email']; ?></td>
                                                            <td><?php echo $item['phone_number']; ?></td>
                                                            <td><?php echo $item['role_name']; ?></td>
                                                            <td class="justify-content-between">
                                                                <a class="btn btn-info btn-sm" href="?mod=users&action=update&id=<?php echo $item['user_id'] ?>" title="Sửa"><i class="fas fa-pencil-alt"></i>
                                                                    Sửa
                                                                </a>
                                                                <a onclick="return confirm('Bạn chắc muốn xóa quản trị viên này không?')" class="btn btn-danger btn-sm" href="?mod=users&action=delete&id=<?php echo $item['user_id'] ?>" title="Xóa"><i class="fas fa-trash"></i>
                                                                    Xóa
                                                                </a>
                                                            </td>
                                                        </tr>
                                                <?php endforeach;
                                                endif; ?>
                                            </tbody>
                                        </table>
                                        <div class="card-footer clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="add">
                                    <div class="col-md-12">
                                        <div class="col-sm-6">
                                            <h1>Thêm phòng ban</h1>
                                        </div>
                                        <div class="tab-pane active p-2 bg-white" id="settings">
                                            <form method="POST" class="form-group">
                                                <label for="role_name">Tên phòng ban</label>
                                                <input type="text" name="role_name" id="role_name" class="form-inline form-control" value="">
                                                <button type="submit" onclick="add_role(event)" name="btn-add" id="btn-submit" class="btn btn-primary btn-lg mt-3">Thêm</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr class="thead-dark">
                                                    <th>STT</th>
                                                    <th>Tên phòng ban</th>
                                                    <th>Số lượng nhân viên</th>
                                                    <th style="width: 15%;">Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody id="list_roles">
                                                <?php if (!empty($list_roles)) :
                                                    $count_role = 0;
                                                    foreach ($list_roles as $item) :
                                                        $count_role++; ?>
                                                        <tr>
                                                            <td><?php echo $count_role; ?></td>
                                                            <td><?php echo $item['role_name']; ?></td>
                                                            <th><?php echo count(get_num_role_id($item['id'])); ?> nhân viên</th>
                                                            <td class="justify-content-between">
                                                                <a class="btn btn-info btn-sm" href="?mod=users&action=update_role&id=<?php echo $item['id'] ?>" title="Sửa"><i class="fas fa-pencil-alt"></i>
                                                                    Sửa
                                                                </a>
                                                                <?php if ($item['id'] != 1) : ?>
                                                                    <button type="button" class="btn btn-danger btn-sm" onclick="delete_role(this)" id="<?php echo $item['id'] ?>" title="Xóa">
                                                                        Xóa
                                                                    </button>
                                                                <?php endif ?>
                                                            </td>
                                                        </tr>
                                                <?php endforeach;
                                                endif; ?>
                                            </tbody>
                                        </table>
                                        <div class="card-footer clearfix">

                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
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