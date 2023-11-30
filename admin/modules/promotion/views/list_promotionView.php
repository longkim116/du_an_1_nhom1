<?php
get_header();
get_sidebar();
?>
<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DANH SÁCH BÀI VIẾT</h3>
        </div>
        <div class="breadcrumb">
            <li class="breadcrumb-item"><a href="?mod=promotion&action=list_promotion" class="text-decoration-none">Tất cả(<?php echo count($mun_promotion) ?>)</a></li>
            <li class="breadcrumb-item"><a href="?mod=promotion&action=list_promotion&status=Sắp diễn ra" class="text-decoration-none">Sắp diễn ra(<?php echo count($mun_promotion_upcoming) ?>)</a></li>
            <li class="breadcrumb-item"><a href="?mod=promotion&action=list_promotion&status=Đang diễn ra" class="text-decoration-none">Đang diễn ra(<?php echo count($mun_promotion_ongoing) ?>)</a></li>
            <li class="breadcrumb-item"><a href="?mod=promotion&action=list_promotion&status=Đã kết thúc" class="text-decoration-none">Đã kết thúc(<?php echo count($mun_promotion_finished) ?>)</a></li>
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
                            <th>Tiêu đề khuyễn mãi</th>
                            <th>Mô tả</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Phần trăm giảm giá</th>
                            <th>Tổng số sản phẩm</th>
                            <th>Trạng thái</th>
                            <th style="width: 15%;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($list_promotion)) :
                            $count = $start;
                            foreach ($list_promotion as $item) :
                        ?>
                                <tr>
                                    <td><input type="checkbox" name="checkitem[<?php echo $item['id'] ?>]" id="checkbox" value="<?php echo $item['id'] ?>" class="checkItem"></td>
                                    <td><?php echo ++$count; ?></td>
                                    <td><?php echo $item['title'] ?></td>
                                    <td><?php echo $item['description'] ?></td>
                                    <td><?php echo $item['start_date'] ?></td>
                                    <td><?php echo $item['end_date'] ?></td>
                                    <td><?php echo $item['discount_rate'] ?>%</td>
                                    <td><?php echo count(get_mun_product($item['id'])); ?> sản phẩm</td>
                                    <td><?php echo $item['status'] ?></td>
                                    <td class="justify-content-between">
                                        <a class="btn btn-info btn-sm" href="?mod=promotion&action=update_promotion&id=<?php echo $item['id'] ?>" title="Sửa"><i class="fas fa-pencil-alt"></i>
                                            Sửa
                                        </a>
                                        <a onclick="return confirm('Bạn chắc muốn xóa chương trình khuyễn mãi này không?')" class="btn btn-danger btn-sm" href="?mod=promotion&action=delete_promotion&id=<?php echo $item['id'] ?>" title="Xóa"><i class="fas fa-trash"></i>
                                            Xóa
                                        </a>
                                    </td>
                                </tr>
                        <?php endforeach;
                        else : echo "KHÔNG CÓ SẢN PHẨM";
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