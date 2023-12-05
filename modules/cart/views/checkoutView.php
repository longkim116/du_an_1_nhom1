<?php
get_header();
?>
<main>

    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg pt-95 pb-50" data-bg-color="#EFF1F5">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title">Thanh toán</h3>
                        <div class="breadcrumb__list">
                            <span><a href="trang-chu.html">Trang chủ</a></span>
                            <span><a href="gio-hang.html">Giỏ hàng</a></span>
                            <span><a href="thanh-toan.html">Thanh toán</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- checkout area start -->
    <form action="" method="post" id>
        <section class="tp-checkout-area pb-120" data-bg-color="#EFF1F5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="tp-checkout-bill-area">
                            <h3 class="tp-checkout-bill-title">Thông tin đặt hàng</h3>

                            <div class="tp-checkout-bill-form">

                                <div class="tp-checkout-bill-inner">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="tp-checkout-input">
                                                <label for="fullname">Họ và tên<span>*</span></label>
                                                <input type="text" name="fullname" id="fullname" placeholder="Eg: Nguyễn Văn A" value="<?php echo $customer_info['fullname'] ?>">
                                                <?php echo form_error("fullname") ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="tp-checkout-input">
                                                <label for="phone">Số diện thoại <span>*</span></label>
                                                <input type="text" name="phone" id="phone" placeholder="Độ dài 10 số" value="<?php echo $customer_info['phone_number'] ?>">
                                                <?php echo form_error("phone") ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="tp-checkout-input">
                                                <label for="email">Email <span>*</span></label>
                                                <input type="text" name="email" id="email" placeholder="Eg: nguyenvana@gmail.com" value="<?php echo $customer_info['email'] ?>">
                                                <?php echo form_error("email") ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="tp-checkout-input">
                                                <label for="address">Địa chỉ <span>*</span></label>
                                                <input type="text" name="address" id="address" placeholder="Eg: Hà Nội" value="<?php echo $customer_info['address'] ?>">
                                                <?php echo form_error("address") ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="tp-checkout-input">
                                                <label>Ghi chú</label>
                                                <textarea name="note" id="note" placeholder="Những thông tin bạn cần ghi chú về đặt hàng!"></textarea>
                                                <?php echo form_error("note") ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <!-- checkout place order -->
                        <div class="tp-checkout-place white-bg">
                            <h3 class="tp-checkout-place-title">Đơn hàng của bạn</h3>

                            <div class="tp-order-info-list">
                                <ul>

                                    <!-- header -->
                                    <li class="tp-order-info-list-header">
                                        <h4>Sản phẩm</h4>
                                        <h4>Tổng</h4>
                                    </li>
                                    <?php
                                    if (!empty($list_order)) :
                                        $count = 0;
                                        foreach ($list_order as $item) :
                                            $count += $item['sub_total'];
                                    ?>
                                            <li class="tp-order-info-list-desc">
                                                <p><?php echo $item['product_name'] ?>. <span> x <?php echo $item['qty'] ?></span></p>
                                                <span><?php echo currency_format($item['sub_total']) ?></span>
                                            </li>
                                    <?php endforeach;
                                    endif; ?>
                                    <!-- subtotal -->
                                    <li class="tp-order-info-list-subtotal">
                                        <span>Tiền hàng</span>
                                        <span><?php echo currency_format($count); ?></span>
                                    </li>

                                    <!-- shipping -->
                                    <li class="tp-order-info-list-shipping">
                                        <span>Vận chuyển</span>
                                        <div class="tp-order-info-list-shipping-item d-flex flex-column align-items-end">
                                            <?php if (!empty($list_transport)) :
                                                foreach ($list_transport as $item) :
                                            ?>
                                                    <span>
                                                        <input onchange="changPrice(this)" id="flat_rate<?php echo $item['id'] ?>" type="radio" name="shipping" value="<?php echo $item['id'] ?>">
                                                        <label for="flat_rate<?php echo $item['id'] ?>"><?php echo $item['transporters'] ?>: <span><?php echo currency_format($item['price']); ?></span></label>
                                                    </span>
                                            <?php endforeach;
                                            endif; ?>
                                        </div>
                                    </li>
                                    <?php echo form_error("shipping") ?>
                                    <div class="tp-cart-bottom">
                                        <div class="tp-cart-coupon-input-box">
                                            <label for="voucher">Mã giảm giá:</label>
                                            <div class="tp-cart-coupon-input d-flex align-items-center w-100">
                                                <input class="form-control-sm" id="voucher" type="text" placeholder="Sử dụng mã nếu có">
                                                <div id="apply_voucher">
                                                    <button onclick="apply_voucher()" type="button" class="form-control-sm">Áp dụng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <li class="tp-order-info-list-total" id="discount">
                                    </li>
                                    <!-- total -->
                                    <li class="tp-order-info-list-total">
                                        <span>Thành tiền</span>
                                        <span id="total_pay"><?php echo currency_format($_SESSION['cart']['info']['total']); ?></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="tp-checkout-payment">
                                <div class="tp-checkout-payment-item">
                                    <input onchange="payOnline(this)" type="radio" id="back_transfer" value="1" name="payment">
                                    <label for="back_transfer" data-bs-toggle="direct-bank-transfer">Thanh toán khi nhận hàng</label>
                                    <div class="tp-checkout-payment-desc direct-bank-transfer">
                                        <p>Thanh toán khi nhận hàng (COD - Cash On Delivery) là phương thức thanh toán mà người mua hàng sẽ thanh toán số tiền mua hàng trực tiếp cho người giao hàng khi nhận được sản phẩm. </p>
                                    </div>
                                </div>
                                <div class="tp-checkout-payment-item paypal-payment">
                                    <input onchange="payOnline(this)" value="2" type="radio" id="payMomo" name="payment">
                                    <label for="payMomo">Thanh toán Momo <img height="40px" width="40px" src="img/icon-52bd5808cecdb1970e1aeec3c31a3ee1.png" alt=""></label>
                                    <div class="tp-checkout-payment-desc direct-bank-transfer">
                                        <p>Thanh toán qua ví điện tử Momo</p>
                                    </div>
                                </div>
                                <div class="tp-checkout-payment-item paypal-payment">
                                    <input onchange="payOnline(this)" value="3" type="radio" id="payVnpay" name="payment">
                                    <label for="payVnpay">Thanh toán VnPay <img height="40px" width="40px" src="img/19222904_308450352935921_8689351082334351995_o.jpg" alt=""></label>
                                    <div class="tp-checkout-payment-desc direct-bank-transfer">
                                        <p>Thanh toán qua ví điện tử VnPay</p>
                                    </div>
                                </div>
                                <?php echo form_error("payment") ?>
                            </div>
                            <div class="tp-checkout-btn-wrapper" id="order_buy1">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </form>
    <!-- checkout area end -->
</main>
<script>
    function payOnline(_this) {
        var pay = $(_this).val();
        console.log('Selected payment method:', pay);
        if (pay == 1) {
            $("#order_buy1").html("<input type='submit' name='order_buy' class='tp-checkout-btn w-100' id='order-now' value='Đặt hàng'>");
        } else if (pay == 2) {
            $("#order_buy1").html("<input type='submit' name='payUrl' class='tp-checkout-btn w-100' id='order-now' value='Thanh toán'>");
        } else if (pay == 3) {
            $("#order_buy1").html("<input type='submit' name='redirect' class='tp-checkout-btn w-100' id='order-now' value='Thanh toán'>");
        }
    }
</script>
<?php
get_footer();
?>