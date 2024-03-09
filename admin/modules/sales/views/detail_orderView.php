<?php
get_header();
get_sidebar();
?>
<div class="content-wrapper">
    <div class="card">
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-md-12">
                    <h6 class="mb-3">THÔNG TIN ĐƠN HÀNG</h6>
                    <div class="list-group mb-4">
                        <div class="list-group-item">
                            <h6 class="mb-1"><img src="public/img/bar-code.png" alt=""> Mã đơn hàng</h6>
                            <p class="mb-0"><?php echo $detail_order['order_code'] ?></p>
                        </div>
                        <div class="list-group-item">
                            <h6 class="mb-1"><img src="public/img/khachhang.png" alt=""> Họ và tên</h6>
                            <p class="mb-0"><?php echo $detail_order['fullname'] ?></p>
                        </div>
                        <div class="list-group-item">
                            <h6 class="mb-1"><img src="public/img/schedule.png" alt=""> Ngày đặt</h6>
                            <p class="mb-0"><?php echo $detail_order['time'] ?></p>
                        </div>
                        <div class="list-group-item">
                            <h6 class="mb-1"><img src="public/img/credit-card.png" alt=""> Hình thức thanh toán</h6>
                            <p class="mb-0"><?php echo $detail_order['payment_methods'] ?></p>
                        </div>
                        <div class="list-group-item">
                            <h6 class="mb-1"><img src="public/img/gmail.png" alt=""> Email</h6>
                            <p class="mb-0"><?php echo $detail_order['phone'] ?></p>
                        </div>
                        <div class="list-group-item">
                            <h6 class="mb-1"><img src="public/img/call-diversion.png" alt=""> Số điện thoại</h6>
                            <p class="mb-0"><?php echo $detail_order['phone'] ?></p>
                        </div>
                        <div class="list-group-item">
                            <h6 class="mb-1"><img src="public/img/gps.png" alt=""> Địa chỉ nhận hàng</h6>
                            <p class="mb-0"><?php echo $detail_order['address'] ?></p>
                        </div>
                        <div class="list-group-item">
                            <h6 class="mb-1"><img src="public/img/post-it.png" alt=""> Ghi chú</h6>
                            <p class="mb-0"><?php echo $detail_order['note'] ?></p>
                        </div>
                        <div class="list-group-item">
                            <h6 class="mb-1"><img src="public/img/clipboard.png" alt=""> Tình trạng đơn hàng</h6>
                            <?php if ($detail_order['status'] == 'Đã hủy') : ?>
                                <h4 class="text-danger">Đơn hàng đã hủy</h4>
                            <?php elseif ($detail_order['status'] == 'Thành công') : ?>
                                <h4 class="text-success">Đơn hàng đã giao thành công</h4>
                            <?php else : ?>
                                <form method="POST" action="" class="form-inline">
                                    <select name="status" class="form-control">
                                        <?php
                                        $count  = 1;
                                        foreach ($status_order as $key => $item) :
                                            if ($detail_order['status'] == $item) {
                                                $count = $key;
                                                $disabled = "";
                                                $l = 0;
                                            } else {
                                                if (isset($l)) {
                                                    $disabled = "";
                                                } else {
                                                    $disabled = "disabled";
                                                }
                                            }
                                        ?>
                                            <option value='<?php echo $item ?>' <?php echo $disabled ?> <?php echo ($detail_order['status'] == $item) ? "selected" : ""; ?>><?php echo $item ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <input type="submit" class="btn btn-primary ml-2" name="sm_status" value="Cập nhật đơn hàng">
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                    <h6 class="mb-3">SẢN PHẨM ĐƠN HÀNG</h6>
                    <table class="table table-striped mb-4">
                        <thead>
                            <tr class="thead-dark">
                                <th>STT</th>
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($list_product)) :
                                $count = 0;
                                $total = 0;
                                foreach ($list_product as $product) :
                                    $total += $product['sub_total'];
                            ?>
                                    <tr>
                                        <td><?php echo ++$count; ?></td>
                                        <td>
                                            <img id="img-list-product" class="img-fluid img-thumbnail" src="img/<?php echo $product['product_thumb'] ?>" alt="">
                                        </td>
                                        <td><?php echo $product['product_name'] ?></td>
                                        <td><?php echo currency_format($product['price']) ?></td>
                                        <td><?php echo $product['qty'] ?></td>
                                        <td><?php echo currency_format($product['sub_total']) ?></td>
                                    </tr>
                            <?php endforeach;
                            endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="font-weight-bold">Tổng số lượng: <?php echo $detail_order['quantity'] ?> sản phẩm</p>
                    <p class="font-weight-bold">Tổng tiền hàng: <?php echo currency_format($total); ?></p>
                    <p class="font-weight-bold">Phí vận chuyển: <?php echo currency_format($detail_order['shipping_cost']); ?></p>
                    <p class="font-weight-bold">Giảm giá: -<?php echo currency_format($detail_order['discount']) ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-danger font-weight-bold">Tổng thanh toán: <?php echo currency_format($detail_order['total_price']) ?></h3>
                </div>
            </div>
            <?php if ($detail_order['pay'] == "Đã thanh toán") : ?>
                <h6 class="mb-1"><img src="public/img/credit-card.png" alt=""> Thanh toán: <span class="mb-0 text-success"><?php echo $detail_order['pay'] ?></span></h6>
            <?php else : ?>
                <h6 class="mb-1"><img src="public/img/credit-card.png" alt=""> Thanh toán: <span class="mb-0 text-danger"><?php echo $detail_order['pay'] ?></span></h6>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>