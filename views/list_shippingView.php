<?php
get_header();
get_sidebar();
?>
<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DANH SÁCH ĐƠN VỊ VẬN CHUYỂN</h3>
        </div>
        <!-- <div class="breadcrumb"> 
            <li class="breadcrumb-item"><a href="?mod=shipping&action=list_shipping" class="text-decoration-none">Tất cả(<?php echo $num_shippings ?>)</a></li>
            <li class="breadcrumb-item"><a href="?mod=shipping&action=list_shipping&status=Đã đăng" class="text-decoration-none">Đã đăng(<?php echo $num_shippings_shippinged ?>)</a></li>
            <li class="breadcrumb-item"><a href="?mod=shipping&action=list_shipping&status=Chờ xét duyệt" class="text-decoration-none">Chờ xét duyệt(<?php echo $num_shippings_pending ?>)</a></li>
        </div> -->
        <!-- /.card-header -->
        <div class="card-body p-0">
            <form action="" class="form-group ml-2" method="shipping">
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
                            <th>Tiêu nhà vận chuyển</th>
                            <th>Giá vận chuyển</th>
                            <th>Người tạo</th>
                            <th>Thời gian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($list_shipping)) :
                            $count = $start;
                            foreach ($list_shipping as $item) :
                        ?>
                                <tr>
                                    <td><input type="checkbox" name="checkitem[<?php echo $item['id'] ?>]" id="checkbox" value="<?php echo $item['id'] ?>" class="checkItem"></td>
                                    <td><?php echo ++$count; ?></td>
                                    <td><?php echo $item['name'] ?></td>
                                    <td><?php echo $item['price'] ?></td>
                                    <td><?php echo $item['creator'] ?></td>
                                    <td><?php echo $item['created_date'] ?></td>
                                    <td class="list-inline">
                                        <a href="?mod=shipping&action=update_shipping&id=<?php echo $item['id'] ?>" title="Sửa"><img src="public/img/pen (1).png" alt=""></a>
                                        <a onclick="return confirm('Bạn chắc muốn xóa không?')" href="?mod=shipping&action=delete_shipping&id=<?php echo $item['id'] ?>" title="Xóa"><img src="public/img/delete1.png" alt=""></a>
                                    </td>
                                </tr>
                        <?php endforeach;
                        else : echo "KHÔNG CÓ NHÀ VẬN CHUYỂN";
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