<?php
get_header();
?>
<main>

    <!-- profile area start -->
    <section class="profile__area pt-120 pb-120">
        <div class="container">
            <div class="profile__inner p-relative">
                <div class="profile__shape">
                    <img class="profile__shape-1" src="assets/img/login/laptop.png" alt="">
                    <img class="profile__shape-2" src="assets/img/login/man.png" alt="">
                    <img class="profile__shape-3" src="assets/img/login/shape-1.png" alt="">
                    <img class="profile__shape-4" src="assets/img/login/shape-2.png" alt="">
                    <img class="profile__shape-5" src="assets/img/login/shape-3.png" alt="">
                    <img class="profile__shape-6" src="assets/img/login/shape-4.png" alt="">
                </div>
                <div class="row">
                    <div class="col-xxl-4 col-lg-4">
                        <div class="profile__tab mr-40">
                            <nav>
                                <div class="nav nav-tabs tp-tab-menu flex-column" id="profile-tab" role="tablist">
                                    <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><span><i class="fa-regular fa-user-pen"></i></span> Hồ sơ </button>
                                    <button class="nav-link" id="nav-information-tab" data-bs-toggle="tab" data-bs-target="#nav-information" type="button" role="tab" aria-controls="nav-information" aria-selected="false"><span><i class="fa-regular fa-circle-info"></i></span> Thông tin </button>
                                    <button class="nav-link" id="nav-order-tab" data-bs-toggle="tab" data-bs-target="#nav-order" type="button" role="tab" aria-controls="nav-order" aria-selected="false"><span><i class="fa-light fa-clipboard-list-check"></i></span> Đơn hàng của tôi </button>
                                    <button class="nav-link" id="nav-password-tab" data-bs-toggle="tab" data-bs-target="#nav-password" type="button" role="tab" aria-controls="nav-password" aria-selected="false"><span><i class="fa-regular fa-lock"></i></span> Đổi mật khẩu </button>
                                    <button class="nav-link" id="nav-chat-tab" data-bs-toggle="tab" data-bs-target="#chat" type="button" role="tab" aria-controls="chat" aria-selected="false"><span><i class="fa-regular fa-comments"></i></span> Trò chuyện với Autosmart </button>
                                    <span id="marker-vertical" class="tp-tab-line d-none d-sm-inline-block"></span>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xxl-8 col-lg-8">
                        <div class="profile__tab-content">
                            <div class="tab-content" id="profile-tabContent">
                                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <div class="profile__main">
                                        <div class="profile__main-top pb-80">
                                            <div class="row align-items-center">
                                                <div class="col-md-6">
                                                    <div class="profile__main-inner d-flex flex-wrap align-items-center">
                                                        <div class="profile__main-thumb">
                                                            <img id="user_img" src="<?php echo !empty(info_login("img")) ? "admin/img/" . info_login("img") : "img/avata.png"; ?>" alt="">
                                                            <div class="profile__main-thumb-edit">
                                                                <input id="profile-thumb-input" onchange="change_customer_image(event);" class="profile-img-popup" type="file">
                                                                <label for="profile-thumb-input"><i class="fa-light fa-camera"></i></label>
                                                            </div>
                                                        </div>
                                                        <div class="profile__main-content">
                                                            <h4 class="profile__main-title">Xin chào <?php echo info_login() ?></h4>
                                                            <!-- <p>You have <span>08</span> notifications</p> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="profile__main-logout text-sm-end">
                                                        <a href="?mod=log&action=logout" class="tp-logout-btn">Đăng xuất</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-information" role="tabpanel" aria-labelledby="nav-information-tab">
                                    <div class="profile__info">
                                        <h3 class="profile__info-title">Thông tin chi tiết</h3>
                                        <div class="profile__info-content">
                                            <!-- <form action="" method="post"> -->
                                            <div class="row">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div class="profile__input-box">
                                                        <div class="profile__input">
                                                            <input type="text" placeholder="Enter your username" name="fullname" id="fullname" value="<?php echo $users['fullname'] ?>">
                                                            <span>
                                                                <svg width="17" height="19" viewBox="0 0 17 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M9 9C11.2091 9 13 7.20914 13 5C13 2.79086 11.2091 1 9 1C6.79086 1 5 2.79086 5 5C5 7.20914 6.79086 9 9 9Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path d="M15.5 17.6C15.5 14.504 12.3626 12 8.5 12C4.63737 12 1.5 14.504 1.5 17.6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div class="profile__input-box">
                                                        <div class="profile__input">
                                                            <input type="email" placeholder="Enter your email" name="email" id="email" value="<?php echo $users['email'] ?>">
                                                            <span>
                                                                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M13 14.6H5C2.6 14.6 1 13.4 1 10.6V5C1 2.2 2.6 1 5 1H13C15.4 1 17 2.2 17 5V10.6C17 13.4 15.4 14.6 13 14.6Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path d="M13 5.3999L10.496 7.3999C9.672 8.0559 8.32 8.0559 7.496 7.3999L5 5.3999" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div class="profile__input-box">
                                                        <div class="profile__input">
                                                            <input type="text" placeholder="Enter your number" name="phone_number" id="phone_number" value="<?php echo $users['phone_number'] ?>">
                                                            <span>
                                                                <svg width="15" height="18" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M13.9148 5V13C13.9148 16.2 13.1076 17 9.87892 17H5.03587C1.80717 17 1 16.2 1 13V5C1 1.8 1.80717 1 5.03587 1H9.87892C13.1076 1 13.9148 1.8 13.9148 5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path opacity="0.4" d="M9.08026 3.80054H5.85156" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path opacity="0.4" d="M7.45425 14.6795C8.14522 14.6795 8.70537 14.1243 8.70537 13.4395C8.70537 12.7546 8.14522 12.1995 7.45425 12.1995C6.76327 12.1995 6.20312 12.7546 6.20312 13.4395C6.20312 14.1243 6.76327 14.6795 7.45425 14.6795Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6">
                                                    <div class="profile__input-box">
                                                        <div class="profile__input">
                                                            <input type="text" placeholder="Enter your address" name="address" id="address" value="<?php echo $users['address'] ?>">
                                                            <span>
                                                                <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M7.99377 10.1461C9.39262 10.1461 10.5266 9.0283 10.5266 7.64946C10.5266 6.27061 9.39262 5.15283 7.99377 5.15283C6.59493 5.15283 5.46094 6.27061 5.46094 7.64946C5.46094 9.0283 6.59493 10.1461 7.99377 10.1461Z" stroke="currentColor" stroke-width="1.5" />
                                                                    <path d="M1.19707 6.1933C2.79633 -0.736432 13.2118 -0.72843 14.803 6.2013C15.7365 10.2663 13.1712 13.7072 10.9225 15.8357C9.29079 17.3881 6.70924 17.3881 5.06939 15.8357C2.8288 13.7072 0.263493 10.2583 1.19707 6.1933Z" stroke="currentColor" stroke-width="1.5" />
                                                                </svg>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-12">
                                                    <div class="profile__btn">
                                                        <button type="submit" onclick="update_info(event)" name="update_info" class="tp-btn">Cập nhật thông tin</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- </form> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab">
                                    <div class="profile__password">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-xxl-12">
                                                    <div class="tp-profile-input-box">
                                                        <div class="tp-contact-input">
                                                            <input name="old_pass" id="old_pass" type="password">
                                                        </div>
                                                        <div class="tp-profile-input-title">
                                                            <label for="old_pass">Mật khẩu cũ</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div class="tp-profile-input-box">
                                                        <div class="tp-profile-input">
                                                            <input name="new_pass" id="new_pass" type="password">
                                                        </div>
                                                        <div class="tp-profile-input-title">
                                                            <label for="new_pass">Mật khẩu mới</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div class="tp-profile-input-box">
                                                        <div class="tp-profile-input">
                                                            <input name="con_new_pass" id="con_new_pass" type="password">
                                                        </div>
                                                        <div class="tp-profile-input-title">
                                                            <label for="con_new_pass">Xác nhận lại mật khẩu</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div class="profile__btn">
                                                        <button type="submit" onclick="change_pass(event)" name="btn-change-pass" id="btn-change-pass" class="tp-btn">Cập nhật mật khẩu</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-order" role="tabpanel" aria-labelledby="nav-order-tab">
                                    <div class="row mb-2">
                                        <div class="col-xxl-12">
                                            <div class="breadcrumb__content p-relative z-index-1">
                                                <div class="breadcrumb__list">
                                                    <span><button type="button" onclick="get_list_order(this)" class="btn btn-info">Tất cả đơn hàng</button></span>
                                                    <span><button type="button" onclick="get_list_order(this)" class="btn btn-secondary">Chờ xác nhận</button></span>
                                                    <span><button type="button" onclick="get_list_order(this)" class="btn btn-primary">Chuẩn bị đơn hàng</button></span>
                                                    <span><button type="button" onclick="get_list_order(this)" class="btn btn-warning">Đang giao hàng</button></span>
                                                    <span><button type="button" onclick="get_list_order(this)" class="btn btn-success">Thành công</button></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile__ticket table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Mã đơn hàng</th>
                                                    <th scope="col">Ngày đặt</th>
                                                    <th scope="col">Trạng thái</th>
                                                    <th scope="col">Xem</th>
                                                </tr>
                                            </thead>
                                            <tbody id="list_order">
                                                <?php
                                                if (!empty($list_order)) :
                                                    foreach ($list_order as $item) : ?>
                                                        <tr>
                                                            <th scope="row"><?php echo $item['order_code'] ?></th>
                                                            <td data-info="title"><?php echo $item['time'] ?></td>
                                                            <td data-info="status done"><?php echo $item['status'] ?></td>
                                                            <td><button type="button" class="btn btn-primary" order_id="<?php echo $item['id'] ?>" onclick="detail_order(this)" data-bs-toggle="modal" data-bs-target="#producQuickViewModal">Xem chi tiết</button></td>
                                                        </tr>
                                                <?php endforeach;
                                                endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="chat" role="tabpanel" aria-labelledby="nav-chat-tab">
                                    <div id="content" class="my-3">
                                        <div class="container">
                                            <div class="row m-auto">
                                                <div class="col-md-12 d-flex justify-content-center align-items-center">
                                                    <div id="chat-box">
                                                        <div id="chat-header">
                                                            <div class="float-left">
                                                                <img width="30px" class="img-fluid rounded-circle" src="img/admin.png" alt="">
                                                                <span class="font-weight-bold">Nhân viên cửa hàng</span>
                                                            </div>
                                                        </div>
                                                        <div class="chat-content">
                                                            <?php if (!empty($list_chat)) :
                                                                foreach ($list_chat as $item) :
                                                            ?>
                                                                    <?php if ($item['status'] == 0) : ?>
                                                                        <div class="float-right chat-content-item-right">
                                                                            <p><?php echo $item['message'] ?></p>
                                                                            <span class="text-muted small"><?php echo $item['created_at'] ?></span>
                                                                        </div>
                                                                    <?php endif; ?>

                                                                    <?php if ($item['status'] == 1) : ?>
                                                                        <div class="float-left chat-content-item-left">
                                                                            <p><?php echo $item['message'] ?></p>
                                                                            <span class="text-muted small"><?php echo $item['created_at'] ?></span>
                                                                        </div>
                                                                    <?php endif; ?>

                                                            <?php
                                                                endforeach;
                                                            endif; ?>
                                                        </div>
                                                        <form action="#" class="typing-area">
                                                            <input type="text" name="message" id="message" class="form-control" placeholder="Nhập nội dung ở đây..." autocomplete="off">
                                                            <button id="btn-chat" class="btn btn-info border-0"><img src="img/send.png" alt=""></button>
                                                        </form>
                                                        <script>
                                                            function scrollChatToBottom() { //Cho thanh croll luôn ở dưới cùng
                                                                var chatBox = document.querySelector('.chat-content');
                                                                chatBox.scrollTop = chatBox.scrollHeight;
                                                            }
                                                            scrollChatToBottom()

                                                            function reaload() {
                                                                $.ajax({
                                                                    url: '?mod=users&action=loadChatAjax',
                                                                    method: 'POST',
                                                                    dataType: 'html',
                                                                    success: function(data) {
                                                                        $(".chat-content").html(data);
                                                                        scrollChatToBottom()
                                                                    }
                                                                })
                                                            }
                                                            setInterval(reaload, 1000);
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- profile area end -->
    <div class="modal fade tp-product-modal" id="producQuickViewModal" tabindex="-1" aria-labelledby="producQuickViewModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="tp-product-modal-content d-lg-flex align-items-start">
                    <button type="button" class="tp-product-modal-close-btn" data-bs-toggle="modal" data-bs-target="#producQuickViewModal">
                        <i class="fa-regular fa-xmark"></i>
                    </button>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6" data-bg-color="#F4F7F9">
                                <div class="tp-order-info-wrapper">
                                    <h4 class="tp-order-info-title">Thông tin sản phẩm</h4>
                                    <div class="tp-order-details-item-wrapper">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div>
                                                    <p>Mã đơn hàng: <strong id="order_code">#VHL12312312</strong></p>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div>
                                                    <p>Địa chỉ nhận hàng: <strong id="order_address"></strong></p>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div>
                                                    <p>Số điện thoại nhận hàng: <strong id="order_phone"></strong></p>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div>
                                                    <p>Ghi chú: <strong id="order_note">Giao cẩn thận</strong></p>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div>
                                                    <p>Phương thức thanh toán: <strong id="payment_methods">Đã thanh toán</strong></p>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div>
                                                    <p>Tình trạng đơn hàng: <strong id="order_status">Đang giao</strong></p>
                                                </div>
                                            </div>
                                            <div class="tp-cart-checkout-proceed" id="cancel_order">
                                                <button type="button" class="btn btn-danger w-100">Hủy đơn hàng</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="tp-order-info-wrapper">
                                    <h4 class="tp-order-info-title">Danh sách sản phẩm</h4>
                                    <div class="tp-order-info-list">
                                        <ul>
                                            <li class="tp-order-info-list-header">
                                                <h4>Sản phẩm</h4>
                                                <h4>Giá</h4>
                                            </li>
                                            <div id="list_order_detail">
                                                <li class="tp-order-info-list-desc">
                                                    <p>Xiaomi Redmi Note 9 Global V. <span> x 2</span></p>
                                                    <span>$274:00</span>
                                                </li>
                                            </div>
                                            <li class="tp-order-info-list-subtotal">
                                                <span>Tổng</span>
                                                <span id="total">$507.00</span>
                                            </li>
                                            <li class="tp-order-info-list-subtotal">
                                                <span>Vận chuyển</span>
                                                <span id="shipping_cost">$507.00</span>
                                            </li>
                                            <li class="tp-order-info-list-subtotal">
                                                <span>Giảm giá</span>
                                                <span class="text-danger" id="discount">$507.00</span>
                                            </li>
                                            <li class="tp-order-info-list-total">
                                                <span>Thanh toán</span>
                                                <span id="total_price">$1,476.00</span>
                                            </li>
                                            <li class="tp-order-info-list-total">
                                                <div>
                                                    <p>Trạng thái: <strong id="order_pay">Đã thanh toán</strong></p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
get_footer();
?>