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
                <h6>NHÓM QUẢN TRỊ</h6>
                <div class="breadcrumb">
                    <li class="breadcrumb-item">Tất cả(<?php echo count($list_users) ?>)</li>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr class="thead-dark">
                            <th>STT</th>
                            <th>Họ và tên</th>
                            <th>Tên đăng nhập</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
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
                                    <td><?php echo $item['address']; ?></td>
                                    <td>
                                        <a href="?mod=users&controller=team&action=update&id=<?php echo $item['user_id'] ?>" title="Sửa"><img src="public/img/pen (1).png" alt=""></a>
                                        <a onclick="return confirm('Bạn chắc muốn xóa sản không')" class="ml-4" href="?mod=users&controller=team&action=delete&id=<?php echo $item['user_id'] ?>" title="Xóa"><img src="public/img/delete1.png" alt=""></a>
                                    </td>
                                </tr>
                        <?php endforeach;
                        endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <nav class="float-right">
                    <?php global $num_rows;
                    echo get_padding($num_rows); ?>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- End content  -->
<?php
get_footer();
?>