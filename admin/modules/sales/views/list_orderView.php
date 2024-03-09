<?php
get_header();
get_sidebar();
?>
<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DANH SÁCH ĐƠN HÀNG</h3>
        </div>
        <div class="justify-content-between my-2 mx-2">
            <div class="float-right">
                <form action="?mod=sales&action=result_seach" method="post" class="form-inline">
                    <input type="text" name="seach" id="" class="form-control" placeholder="Tìm kiếm theo mã đơn hàng...">
                    <button class="btn btn-primary ml-2">Tìm</button>
                </form>
            </div>
        </div>
        <div class="breadcrumb">
            <li class="breadcrumb-item"><a href="?mod=sales&action=list_order" class="text-decoration-none">Tất cả (<?php echo $num_orders ?>)</a></li>
            <li class="breadcrumb-item"><a href="?mod=sales&action=list_order&status=Chờ xác nhận" class="text-decoration-none">Chờ xác nhận(<?php echo $num_posts_pending ?>)</a></li>
            <li class="breadcrumb-item"><a href="?mod=sales&action=list_order&status=Chuẩn bị đơn hàng" class="text-decoration-none">Chuẩn bị đơn hàng(<?php echo $num_prepare_orders ?>)</a></li>
            <li class="breadcrumb-item"><a href="?mod=sales&action=list_order&status=Đang giao hàng" class="text-decoration-none">Đang giao hàng(<?php echo $num_orders_delivery ?>)</a>
            </li>
            <li class="breadcrumb-item"><a href="?mod=sales&action=list_order&status=Thành công" class="text-decoration-none">Thành công(<?php echo $num_orders_success ?>)</a></li>
            <li class="breadcrumb-item"><a href="?mod=sales&action=list_order&status=Đã hủy" class="text-decoration-none">Đã hủy(<?php echo $num_orders_cancelled ?>)</a></li>
            <li class="breadcrumb-item">Số sản phẩm đã bán: <?php echo $total_order['total'] ?> sản phẩm</li>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <form action="" class="form-group ml-2" method="post">
                <select name="action" id="action" class="form-control-sm form-check-inline">
                    <option value="">Tác vụ</option>
                    <option value="1">Xóa</option>
                    <!-- <option value="2">Chờ xác nhận</option>
                    <option value="3">Chuẩn bị đơn hàng</option>
                    <option value="4">Đang giao hàng</option>
                    <option value="5">Thành công</option> -->
                </select>
                <button class="btn btn-sm btn-success" type="submit" name="btn_apply">Áp dụng</button>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="checkAll" id="checkAll"></th>
                            <th>STT</th>
                            <th>Mã đơn hàng</th>
                            <th>Họ và tên</th>
                            <th>Số sản phẩm</th>
                            <th>Tổng giá</th>
                            <th>Trạng thái</th>
                            <th>Thời gian đặt hàng</th>
                            <th style="width: 15%;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($list_order)) :
                            $count = $start;
                            foreach ($list_order as $item) :
                        ?>
                                <tr>
                                    <?php if ($item['status'] == "Chờ xác nhận") : ?>
                                        <td><input type="checkbox" name="checkitem[<?php echo $item['id'] ?>]" id="checkbox" value="<?php echo $item['id'] ?>" class="checkItem"></td>
                                    <?php else : ?>
                                        <td><input disabled type="checkbox" id="checkbox"></td>
                                    <?php endif; ?>
                                    <td><?php echo ++$count; ?></td>
                                    <td><?php echo $item['order_code'] ?></td>
                                    <td><?php echo $item['fullname'] ?></a></td>
                                    <td><?php echo $item['quantity'] ?></td>
                                    <td><?php echo currency_format($item['total_price']) ?></td>
                                    <td><?php echo $item['status'] ?></td>
                                    <td><?php echo $item['time'] ?></td>
                                    <td class="justify-content-between">
                                        <a class="btn btn-info btn-sm" href="?mod=sales&action=detail_order&id=<?php echo $item['id'] ?>" title="Chi tiết"><i class="fas fa-folder"></i>
                                            Chi tiết
                                        </a>
                                        <a onclick="return confirm('Bạn chắc muốn xóa đơn hàng không?')" class="btn btn-danger btn-sm" href="?mod=sales&action=delete_order&id=<?php echo $item['id'] ?>" title="Xóa"><i class="fas fa-trash"></i>
                                            Xóa
                                        </a>
                                    </td>
                                </tr>
                        <?php endforeach;
                        endif; ?>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="card-footer clearfix">
            <?php
            echo get_padding($num_rows) ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>