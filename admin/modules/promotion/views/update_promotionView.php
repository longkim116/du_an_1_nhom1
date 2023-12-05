<?php
get_header();
get_sidebar(); 
?>
<div class="content-wrapper">
    <div id="content" class="container-fluid">
        <div class="col-sm-6">
            <h1>CẬP NHẬT KHUYỄN MÃI</h1>
            <?php if ($promotion["status"] == "Đang diễn ra") : ?>
                <span class="text-danger">Chương trình đang diễn ra. Không thể sửa!</span>
            <?php elseif ($promotion["status"] == "Đã kết thúc") : ?>
                <span class="text-danger">Chương trình đã kết thúc. Không thể sửa!</span>
            <?php endif; ?>
        </div>
        <div class="card">
            <div class="card-body">
                <form method="POST" class="form-group">
                    <label for="title">Tên chương trình khuyễn mãi</label>
                    <input class="form-control form-inline" type="text" name="title" id="title" value="<?php echo $promotion["title"] ?>"><br>
                    <?php echo form_error("title") ?>
                    <label for="description">Mô tả </label>
                    <textarea name="description" id="description" class="ckeditor form-control form-inline"><?php echo $promotion["description"] ?></textarea><br>
                    <?php echo form_error("description") ?>
                    <div class="form-row">
                        <div class="co-md-6">
                            <label for="startDate">Ngày bắt đầu</label>
                            <input id="startDate" type="date" class="form-control" min="<?php echo date('Y-m-d') ?>" value="<?php echo $promotion["start_date"] ?>" onchange="updateEndDateMin()" name="startDate">
                        </div>
                        <div class="co-md-6 ml-5">
                            <label for="endDate">Ngày kết thúc</label>
                            <input id="endDate" type="date" min="<?php echo date('Y-m-d') ?>" value="<?php echo $promotion["end_date"] ?>" class="form-control" name="endDate">
                        </div>
                    </div><br>
                    <?php echo form_error("date") ?>
                    <div class="form-row">
                        <div>
                            <label for="discount_rate">Phần trăm giảm giá</label>
                            <input class="form-control form-inline" type="number" min="1" max="100" name="discount_rate" id="discount_rate" value="<?php echo $promotion["discount_rate"] ?>"><br>
                        </div>
                    </div><br>
                    <?php echo form_error("discount_rate") ?>
                    <div class="form-row">
                        <div>
                            <label for="status">Trạng thái</label>
                            <select name="status" id="status" class="form-control form-inline">
                                <option disabled <?php echo ($promotion["status"] == "Sắp diễn ra") ? "selected" : ""; ?> value="Sắp diễn ra">Sắp diễn ra</option>
                                <option disabled <?php echo ($promotion["status"] == "Đang diễn ra") ? "selected" : ""; ?> value="Đang diễn ra">Đang diễn ra</option>
                                <option disabled <?php echo ($promotion["status"] == "Đã kết thúc") ? "selected" : ""; ?> value="Đã kết thúc">Đã kết thúc</option>
                            </select>
                        </div>
                    </div><br>
                    <label for="">Danh sách sản phẩm áp dụng</label>
                    <div class="form-row">
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="checkAll" id="checkAll"></th>
                                        <th>STT</th>
                                        <th>Mã sản phẩm</th>
                                        <th>Hình ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá thấp nhất</th>
                                        <th>Giá cao nhất</th>
                                        <th>Danh mục</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($list_products)) :
                                        $count = 0;
                                        foreach ($list_products as $item) :
                                            $count++;
                                    ?>
                                            <tr>
                                                <td><input checked type="checkbox" name="update_product_id[<?php echo $item['product_id'] ?>]" id="checkbox" value="<?php echo $item['product_id'] ?>" class="checkItem"></td>
                                                <td><?php echo $count ?></td>
                                                <td><?php echo $item['product_code'] ?></td>
                                                <td>
                                                    <img id="img-list-product" class="img-fluid img-thumbnail" src="img/<?php echo $item['product_thumb'] ?>" alt="">
                                                </td>
                                                <td><?php echo $item['product_name'] ?></td>
                                                <td class="text-danger"><?php echo currency_format(min_price($item['product_id'])) ?></td>
                                                <td class="text-danger"><?php echo currency_format(max_price($item['product_id'])) ?></td>
                                                <td><?php echo $item['title'] ?></td>
                                            </tr>
                                    <?php endforeach;
                                    endif; ?>
                                    <?php if (!empty($add_list_products)) :
                                        foreach ($add_list_products as $item) :
                                            $count++;
                                    ?>
                                            <tr>
                                                <td><input type="checkbox" name="product_id[<?php echo $item['product_id'] ?>]" id="checkbox" value="<?php echo $item['product_id'] ?>" class="checkItem"></td>
                                                <td><?php echo $count ?></td>
                                                <td><?php echo $item['product_code'] ?></td>
                                                <td>
                                                    <img id="img-list-product" class="img-fluid img-thumbnail" src="img/<?php echo $item['product_thumb'] ?>" alt="">
                                                </td>
                                                <td><?php echo $item['product_name'] ?></td>
                                                <td class="text-danger"><?php echo currency_format(min_price($item['product_id'])) ?></td>
                                                <td class="text-danger"><?php echo currency_format(max_price($item['product_id'])) ?></td>
                                                <td><?php echo $item['title'] ?></td>
                                            </tr>
                                    <?php endforeach;
                                    endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php echo form_error("check") ?>
                    <?php if ($promotion["status"] == "Sắp diễn ra") : ?>
                        <button class="btn btn-primary btn-lg my-4" type="submit" name="update_promotions" id="btn-submit">Cập nhật</button><br>
                        <?php echo form_error("account") ?>
                    <?php else : ?>
                        <button class="btn btn-danger btn-lg my-4" type="submit" disabled id="btn-submit">Không thể cập nhật</button><br>
                    <?php endif; ?>

                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function updateEndDateMin() {
        // Lấy giá trị của ngày bắt đầu
        var startDate = document.getElementById("startDate").value;

        // Set giá trị ngày kết thúc tối thiểu là ngày bắt đầu
        document.getElementById("endDate").min = startDate;
    }
</script>

<?php
get_footer();
?>