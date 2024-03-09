<?php
get_header();
?>
<main>
    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg pt-95 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title">Đơn hàng của bạn</h3>
                        <div class="breadcrumb__list">
                            <span><a href="Trang-chu.html">Trang chủ</a></span>
                            <span>Đơn hàng của bạn</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- order area start -->
    <section class="tp-order-area pb-160">
        <div class="container">
            <div class="tp-order-inner">
                <div class="row gx-0">
                    <div class="col-lg-6 h-100">
                        <div class="tp-order-details" data-bg-color="#4F3D97">
                            <div class="tp-order-details-top text-center mb-70">
                                <div class="tp-order-details-icon">
                                    <span>
                                        <svg width="52" height="52" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M46 26V51H6V26" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M51 13.5H1V26H51V13.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M26 51V13.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M26 13.5H14.75C13.0924 13.5 11.5027 12.8415 10.3306 11.6694C9.15848 10.4973 8.5 8.9076 8.5 7.25C8.5 5.5924 9.15848 4.00269 10.3306 2.83058C11.5027 1.65848 13.0924 1 14.75 1C23.5 1 26 13.5 26 13.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M26 13.5H37.25C38.9076 13.5 40.4973 12.8415 41.6694 11.6694C42.8415 10.4973 43.5 8.9076 43.5 7.25C43.5 5.5924 42.8415 4.00269 41.6694 2.83058C40.4973 1.65848 38.9076 1 37.25 1C28.5 1 26 13.5 26 13.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="tp-order-details-content">
                                    <h3 class="tp-order-details-title">Đơn hàng đã được xác nhận</h3>
                                    <p>Chúng tôi sẽ gửi cho bạn email về thông tin đơn hàng <br> Vui lòng kiểm tra email <a href="https://mail.google.com/" class="text-danger">Tại đây</a></p>
                                </div>
                            </div>
                            <div class="tp-order-details-item-wrapper">
                                <div class="row">
                                    <div class="tp-order-details-item d-flex">
                                        <h4>Ngày đặt: <span><?php echo $order['time'] ?></span>
                                        </h4>
                                    </div>
                                    <!-- <div class="tp-order-details-item d-flex">
                                        <h4>Ngày nhận dự kiến: <span>April 10, 2023</span>
                                        </h4>
                                    </div> -->
                                    <div class="tp-order-details-item d-flex">
                                        <h4>Mã đơn hàng: <span><?php echo $order['order_code'] ?></span>
                                        </h4>
                                    </div>
                                    <div class="tp-order-details-item d-flex">
                                        <h4>Phương thức thanh toán: <span><?php echo $order['payment_methods'] ?></span>
                                        </h4>
                                    </div>
                                    <div class="tp-order-details-item d-flex">
                                        <h4>Tên người nhận: <span><?php echo $order['fullname'] ?></span>
                                        </h4>
                                    </div>
                                    <div class="tp-order-details-item d-flex">
                                        <h4>Số điện thoại: <span><?php echo $order['phone'] ?></span>
                                        </h4>
                                    </div>
                                    <div class="tp-order-details-item d-flex">
                                        <h4>Địa chỉ nhận hàng: <span><?php echo $order['address'] ?></span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="tp-order-info-wrapper">
                            <h4 class="tp-order-info-title">Đơn hàng chi tiết</h4>

                            <div class="tp-order-info-list">
                                <ul>

                                    <!-- header -->
                                    <li class="tp-order-info-list-header">
                                        <h4>Sản phẩm</h4>
                                        <h4>Tổng</h4>
                                    </li>
                                    <?php
                                    $total = 0;
                                    foreach ($list_products as $item) :
                                        $total += $item['sub_total']
                                    ?>
                                        <li class="tp-order-info-list-desc">
                                            <p><?php echo $item['product_name'] ?>. <span> x <?php echo $item['qty'] ?></span></p>
                                            <span><?php echo currency_format($item['sub_total']) ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                    <!-- subtotal -->
                                    <li class="tp-order-info-list-subtotal">
                                        <span>Tổng tiền</span>
                                        <span><?php echo currency_format($total); ?></span>
                                    </li>

                                    <!-- shipping -->
                                    <!-- shipping -->
                                    <li class="tp-order-info-list-subtotal">
                                        <span>Phí vận chuyển</span>
                                        <span><?php echo currency_format($order['shipping_cost']); ?></span>
                                    </li>
                                    <li class="tp-order-info-list-subtotal">
                                        <span>Giảm giá</span>
                                        <span class="text-danger">-<?php echo currency_format($order['discount']) ?></span>
                                    </li>
                                    <!-- total -->
                                    <li class="tp-order-info-list-total">
                                        <span>Thanh toán</span>
                                        <span><?php echo currency_format($order['total_price']) ?></span>
                                    </li>
                                    <li class="tp-order-info-list-total">
                                        <span class="<?php echo ($order['pay'] == "Đã thanh toán") ? "text-success" : "text-danger" ?>"><?php echo $order['pay'] ?></span>
                                    </li>
                                    <li class="tp-order-info-list-total">
                                        <a href="san-pham.html" class="btn btn-outline-primary">Tiếp tục mua hàng</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- order area end -->

</main>

<?php
get_footer();
?>