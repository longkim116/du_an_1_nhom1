<?php
get_header();
?>
<div id="content">
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-12">
                <h6>DANH SÁCH TIỆN ÍCH</h6>
                <button class="btn btn-success my-1">Thêm mới tiện ích</button>
                <div class="breadcrumb">
                    <li class="breadcrumb-item"><a href="" class="text-decoration-none">Tất cả(1)</a></li>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr class="thead-dark">
                            <th>STT</th>
                            <th>Tên tiện ích</th>
                            <th>Tiêu đề</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Thời gian</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($list_widget)) :
                            $count = 0;
                            foreach ($list_widget as $item) :
                        ?>
                                <tr>
                                    <td><?php echo ++$count; ?></td>
                                    <td><?php echo $item['block_name'] ?></td>
                                    <td><?php echo $item['title'] ?></td>
                                    <td><?php echo $item['address'] ?></td>
                                    <td><?php echo $item['phone'] ?></td>
                                    <td><?php echo $item['email'] ?></td>
                                    <td><?php echo $item['created_date'] ?></td>
                                    <td class="list-inline">
                                        <a href="?mod=dashboard&action=update_widget&id=<?php echo $item['widget_id'] ?>" title="Sửa"><img src="public/img/pen (1).png" alt=""></a>
                                        <a onclick="return confirm('Bạn chắc muốn xóa sản phẩm không')" href="?mod=dashboard&action=delete_widget&id=<?php echo $item['widget_id'] ?>" title="Xóa"><img src="public/img/delete1.png" alt=""></a>
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
                    <?php
                    global $num_rows;
                    echo get_padding($num_rows);
                    ?>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- End content  -->
<?php
get_footer();
?>