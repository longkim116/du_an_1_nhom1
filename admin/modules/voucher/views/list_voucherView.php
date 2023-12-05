<?php
get_header();
get_sidebar();
?>
<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DANH SÁCH MÃ VOUCHER</h3>
        </div>
        <div class="breadcrumb">
            <li class="breadcrumb-item"><a href="?mod=voucher&action=list_voucher" class="text-decoration-none">Tất cả(<?php echo count($num_voucher) ?>)</a></li>
            <li class="breadcrumb-item"><a href="?mod=voucher&action=list_voucher&status=Đã áp dụng" class="text-decoration-none">Đã áp dụng(<?php echo count($apply) ?>)</a></li>
            <li class="breadcrumb-item"><a href="?mod=voucher&action=list_voucher&status=Chưa áp dụng" class="text-decoration-none">Chưa áp dụng(<?php echo count($un_apply) ?>)</a></li>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <form action="" class="form-group ml-2" method="post">
                <select name="action" id="action" class="form-control-sm form-check-inline">
                    <option value="">Tác vụ</option>
                    <option value="1">Xóa</option>
                    <option value="2">Đã áp dụng</option>
                    <option value="3">Chưa áp dụng</option>
                </select>
                <button class="btn btn-sm btn-success" type="submit" name="btn_apply">Áp dụng</button>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="checkAll" id="checkAll"></th>
                            <th>STT</th>
                            <th>Mã voucher</th>
                            <th>Giá</th>
                            <th>Người tạo</th>
                            <th>Thời gian</th>
                            <th>Trạng thái</th>
                            <th style="width: 15%;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($list_voucher)) :
                            $count = 0;
                            foreach ($list_voucher as $item) :
                        ?>
                                <tr>
                                    <td><input type="checkbox" name="checkitem[<?php echo $item['id'] ?>]" id="checkbox" value="<?php echo $item['id'] ?>" class="checkItem"></td>
                                    <td><?php echo ++$count; ?></td>
                                    <td><?php echo $item['voucher_code'] ?></td>
                                    <td class="text-danger"><?php echo currency_format($item['discount_amount']) ?></td>
                                    <td><?php echo $item['creator'] ?></td>
                                    <td><?php echo $item['date_created'] ?></td>
                                    <td><?php echo $item['status'] ?></td>
                                    <td class="justify-content-between">
                                        <a class="btn btn-info btn-sm" href="?mod=voucher&action=update_voucher&id=<?php echo $item['id'] ?>" title="Sửa"><i class="fas fa-pencil-alt"></i>
                                            Sửa
                                        </a>
                                        <a onclick="return confirm('Bạn chắc muốn xóa voucher này không?')" class="btn btn-danger btn-sm" href="?mod=voucher&action=delete_voucher&id=<?php echo $item['id'] ?>" title="Xóa"><i class="fas fa-trash"></i>
                                            Xóa
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach;
                        else : ?>
                            <td class="text-center" colspan="8">Không có mã voucher nào</td>
                        <?php
                        endif; ?>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="card-footer clearfix">
            <?php
            echo get_padding($num_rows)
            ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>