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
                    <h1>HỒ SƠ KHÁCH HÀNG</h1>
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
                                <img class="profile-user-img img-fluid img-circle" src="<?php echo !empty($users['img']) ? "img/" . $users['img'] : "img/avata.png"; ?>" width="128px" height="128px" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><?php echo $users['fullname'] ?></h3>

                            <p class="text-muted text-center">Khách hàng</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Số điện thoại thoại</b> <a class="float-right"><?php echo $users['phone_number'] ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Email</b> <a class="float-right"><?php echo $users['email'] ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Địa chỉ</b> <a class="float-right"><?php echo $users['address'] ?></a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <div class="row mb-2">
                                        <div class="col-xxl-12">
                                            <div class="breadcrumb__content p-relative z-index-1">
                                                <div class="breadcrumb__list">
                                                    <span><button type="button" customer_id="<?php echo $users['id'] ?>" onclick="get_list_order(this)" class="btn btn-info">Tất cả đơn hàng</button></span>
                                                    <span><button type="button" customer_id="<?php echo $users['id'] ?>" onclick="get_list_order(this)" class="btn btn-secondary">Chờ xác nhận</button></span>
                                                    <span><button type="button" customer_id="<?php echo $users['id'] ?>" onclick="get_list_order(this)" class="btn btn-primary">Chuẩn bị đơn hàng</button></span>
                                                    <span><button type="button" customer_id="<?php echo $users['id'] ?>" onclick="get_list_order(this)" class="btn btn-warning">Đang giao hàng</button></span>
                                                    <span><button type="button" customer_id="<?php echo $users['id'] ?>" onclick="get_list_order(this)" class="btn btn-success">Thành công</button></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile__ticket table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Mã đơn hàng</th>
                                                    <th scope="col">Ngày đặt</th>
                                                    <th scope="col">Trạng thái</th>
                                                    <th scope="col">Xem</th>
                                                </tr>
                                            </thead>
                                            <tbody id="list_order">
                                                <?php
                                                if (!empty($list_order)) :
                                                    foreach ($list_order as $item) : ?>
                                                        <tr>
                                                            <th scope="row"><?php echo $item['order_code'] ?></th>
                                                            <td data-info="title"><?php echo $item['time'] ?></td>
                                                            <td data-info="status done" class=" <?php echo ($item['status'] == "Đã hủy") ? "text-danger" : ""; ?>">
                                                                <?php echo $item['status'] ?></td>
                                                            <td><a href="?mod=sales&action=detail_order&id=<?php echo $item['id'] ?>" class="btn btn-primary">Xem chi tiết</a></td>
                                                        </tr>
                                                <?php endforeach;
                                                endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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