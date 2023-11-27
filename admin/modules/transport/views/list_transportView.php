<?php
get_header();
get_sidebar();
?>
<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DANH SÁCH ĐỐI TÁC VẬN CHUYỂN</h3>
        </div>
        <div class="breadcrumb">
            <li class="breadcrumb-item"><a href="?mod=slider&action=list_slider" class="text-decoration-none">Tất cả(<?php echo count($list_transport) ?>)</a></li>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <form action="" class="form-group ml-2" method="post">
                <select name="action" id="action" class="form-control-sm form-check-inline">
                    <option value="">Tác vụ</option>
                    <option value="1">Xóa</option>
                </select>
                <button class="btn btn-sm btn-success" type="submit" name="btn_apply">Áp dụng</button>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="checkAll" id="checkAll"></th>
                            <th>STT</th>
                            <th>Đối tác vận chuyển</th>
                            <th>Giá</th>
                            <th>Người tạo</th>
                            <th>Thời gian</th>
                            <th style="width: 10%;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($list_transport)) :
                            $count = 0;
                            foreach ($list_transport as $item) :
                        ?>
                                <tr>
                                    <td><input type="checkbox" name="checkitem[<?php echo $item['id'] ?>]" id="checkbox" value="<?php echo $item['id'] ?>" class="checkItem"></td>
                                    <td><?php echo ++$count; ?></td>
                                    <td><?php echo $item['transporters'] ?></td>
                                    <td class="text-danger"><?php echo currency_format($item['price']) ?></td>
                                    <td><?php echo $item['creator'] ?></td>
                                    <td><?php echo $item['date_created'] ?></td>
                                    <td>
                                        <a href="?mod=transport&action=update_transport&id=<?php echo $item['id'] ?>" title="Sửa"><img src="public/img/pen (1).png" alt=""></a>
                                        <a onclick="return confirm('Bạn chắc muốn xóa không')" href="?mod=transport&action=delete_transport&id=<?php echo $item['id'] ?>" title="Xóa"><img src="public/img/delete1.png" alt=""></a>
                                    </td>
                                </tr>
                            <?php endforeach;
                        else : ?>
                            <td colspan="7">Không có đối tác nào</td>
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