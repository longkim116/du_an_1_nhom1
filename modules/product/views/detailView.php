<?php
get_header();
?>
<main>
    <!-- breadcrumb area start -->
    <section class="breadcrumb__area breadcrumb__style-2 include-bg pt-50 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <div class="breadcrumb__list has-icon">
                            <span class="breadcrumb-icon">
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.42393 16H15.5759C15.6884 16 15.7962 15.9584 15.8758 15.8844C15.9553 15.8104 16 15.71 16 15.6054V6.29143C16 6.22989 15.9846 6.1692 15.9549 6.11422C15.9252 6.05923 15.8821 6.01147 15.829 5.97475L8.75305 1.07803C8.67992 1.02736 8.59118 1 8.5 1C8.40882 1 8.32008 1.02736 8.24695 1.07803L1.17098 5.97587C1.11791 6.01259 1.0748 6.06035 1.04511 6.11534C1.01543 6.17033 0.999976 6.23101 1 6.29255V15.6063C1.00027 15.7108 1.04504 15.8109 1.12451 15.8847C1.20398 15.9585 1.31165 16 1.42393 16ZM10.1464 15.2107H6.85241V10.6202H10.1464V15.2107ZM1.84866 6.48977L8.4999 1.88561L15.1517 6.48977V15.2107H10.9946V10.2256C10.9946 10.1209 10.95 10.0206 10.8704 9.94654C10.7909 9.87254 10.683 9.83096 10.5705 9.83096H6.42848C6.316 9.83096 6.20812 9.87254 6.12858 9.94654C6.04904 10.0206 6.00435 10.1209 6.00435 10.2256V15.2107H1.84806L1.84866 6.48977Z" fill="#55585B" stroke="#55585B" stroke-width="0.5" />
                                </svg>
                            </span>
                            <span><a href="trang-chu.html">Trang chủ</a></span>
                            <span><a href="san-pham.html">Sản phẩm</a></span>
                            <span><a href="#">Sản phẩm <?php echo $product['product_name'] ?></a></span>
                            <span>(<?php echo $product['sales'] ?> sản phẩm đã được bán)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- product details area start -->
    <section class="tp-product-details-area">
        <div class="tp-product-details-top pb-115">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-6">
                        <div class="tp-product-details-thumb-wrapper tp-tab d-sm-flex">
                            <nav>
                                <div class="nav nav-tabs flex-sm-column " id="productDetailsNavThumb" role="tablist">
                                    <button class="nav-link active" id="nav-1-tab" data-bs-toggle="tab" data-bs-target="#nav-1" type="button" role="tab" aria-controls="nav-1" aria-selected="true">
                                        <!-- Ảnh đại diên -->
                                        <img class="image_product" src="admin/img/<?php echo $product['product_thumb'] ?>" alt="">
                                    </button>
                                    <?php
                                    $count = 1;
                                    foreach ($list_img_detail as $item) :
                                        $count++; ?>
                                        <button class="nav-link" id="nav-<?php echo $count; ?>-tab" data-bs-toggle="tab" data-bs-target="#nav-<?php echo $count; ?>" type="button" role="tab" aria-controls="nav-<?php echo $count; ?>" aria-selected="false">
                                            <img src="admin/img/<?php echo $item['image'] ?>" alt="">
                                        </button>
                                    <?php endforeach; ?>
                                </div>
                            </nav>
                            <div class="tab-content m-img" id="productDetailsNavContent">
                                <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav-1-tab" tabindex="0">
                                    <div class="tp-product-details-nav-main-thumb">
                                        <!-- Ảnh đại diên -->
                                        <img class="image_product" src="admin/img/<?php echo $product['product_thumb'] ?>" alt="">
                                    </div>
                                </div>
                                <?php
                                $count_show = 1;
                                foreach ($list_img_detail as $item) :
                                    $count_show++; ?>
                                    <div class="tab-pane fade" id="nav-<?php echo $count_show; ?>" role="tabpanel" aria-labelledby="nav-<?php echo $count_show; ?>-tab" tabindex="0">
                                        <div class="tp-product-details-nav-main-thumb">
                                            <img src="admin/img/<?php echo $item['image'] ?>" alt="">
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div> <!-- col end -->
                    <div class="col-xl-5 col-lg-6">
                        <div class="tp-product-details-wrapper">
                            <h2 id="product_name"><?php echo $product['product_name'] ?></h2>

                            <!-- inventory details -->
                            <div class="tp-product-details-inventory d-flex align-items-center mb-10">
                                <div class="tp-product-details-stock mb-10" id="quantity_product">
                                    <span>Trong kho</span>
                                </div>
                                <div class="tp-product-details-rating-wrapper d-flex align-items-center mb-10">
                                    <div class="tp-product-details-rating" id="fa_star">
                                        <?php echo str_repeat("<span><i class='fa-solid fa-star'></i></span>", round($star['star'])) ?>
                                    </div>
                                    <div class="tp-product-details-reviews">
                                        <span>(<span class="total_comment"><?php echo $count_evaluate; ?></span> Bình luận và đánh giá)</span>
                                    </div>
                                </div>
                            </div>
                            <?php echo $product['product_desc'] ?>
                            <?php if (!empty($variant_ram)) : ?>
                                <div class="form-group">
                                    <label for="ram" class="ram">Dung lượng/Kích thước:</label>
                                    <select class="form-control" name="ram" id="ram" onchange="selectVar()" product_id="<?php echo $product['product_id'] ?>">
                                        <?php foreach ($variant_ram as $item) : ?>
                                            <option value="<?php echo $item['id'] ?>"><?php echo $item['ram_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            <?php endif ?>

                            <!-- variations -->
                            <label for="ram" class="ram">Màu sắc:</label>
                            <div class="tp-product-details-variation" id="color_var">

                            </div>

                            <!-- price -->
                            <div class="tp-product-details-price-wrapper mb-20">
                                <?php if ($promotion != false) : ?>
                                    <span class="tp-product-details-price old-price"></span>
                                <?php endif; ?>
                                <div class="tp-product-details-price-wrapper mb-20">
                                    <h3 id="product_price">
                                        <?php echo currency_format(min_price($item['product_id'])) ?>-
                                        <?php echo currency_format(max_price($item['product_id'])) ?>
                                    </h3>
                                </div>
                            </div>
                            <!-- actions -->
                            <div class="tp-product-details-action-wrapper">
                                <div class="tp-product-details-action-item-wrapper d-flex align-items-center">
                                    <div class="tp-product-details-quantity">
                                        <div class="tp-product-quantity mb-15 mr-15" id="status">
                                            <input class="tp-cart-input" type="number" id="num-order" value="1" min="1" max="10">
                                        </div>
                                    </div>
                                    <script>
                                    </script>
                                    <div class="tp-product-details-add-to-cart mb-15 w-100">
                                        <button type="submit" onclick="add_cart(event)" class="tp-product-details-add-to-cart-btn w-100">Thêm vào giỏ hàng</button>
                                    </div>
                                </div>
                                <button onclick="by_now(this)" class="tp-product-details-buy-now-btn w-100">Mua ngay</button>
                            </div>
                            <div class="tp-product-details-action-sm">
                                <!-- Phần sản phẩm yêu thích -->
                                <?php if (isset($_SESSION['wishlist']) && array_key_exists($item['product_id'], $_SESSION['wishlist'])) : ?>
                                    <button style="background-color: palevioletred;" type="button" value="<?php echo $item['product_id'] ?>" onclick="delete_favourite(this)" class="tp-product-action-btn-2 tp-product-add-to-wishlist-btn">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.60355 7.98635C2.83622 11.8048 7.7062 14.8923 9.0004 15.6565C10.299 14.8844 15.2042 11.7628 16.3973 7.98985C17.1806 5.55102 16.4535 2.46177 13.5644 1.53473C12.1647 1.08741 10.532 1.35966 9.40484 2.22804C9.16921 2.40837 8.84214 2.41187 8.60476 2.23329C7.41078 1.33952 5.85105 1.07778 4.42936 1.53473C1.54465 2.4609 0.820172 5.55014 1.60355 7.98635ZM9.00138 17.0711C8.89236 17.0711 8.78421 17.0448 8.68574 16.9914C8.41055 16.8417 1.92808 13.2841 0.348132 8.3872C0.347252 8.3872 0.347252 8.38633 0.347252 8.38633C-0.644504 5.30321 0.459792 1.42874 4.02502 0.284605C5.69904 -0.254635 7.52342 -0.0174044 8.99874 0.909632C10.4283 0.00973263 12.3275 -0.238878 13.9681 0.284605C17.5368 1.43049 18.6446 5.30408 17.6538 8.38633C16.1248 13.2272 9.59485 16.8382 9.3179 16.9896C9.21943 17.0439 9.1104 17.0711 9.00138 17.0711Z" fill="currentColor"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.203 6.67473C13.8627 6.67473 13.5743 6.41474 13.5462 6.07159C13.4882 5.35202 13.0046 4.7445 12.3162 4.52302C11.9689 4.41097 11.779 4.04068 11.8906 3.69666C12.0041 3.35175 12.3724 3.16442 12.7206 3.27297C13.919 3.65901 14.7586 4.71561 14.8615 5.96479C14.8905 6.32632 14.6206 6.64322 14.2575 6.6721C14.239 6.67385 14.2214 6.67473 14.203 6.67473Z" fill="currentColor"></path>
                                        </svg>
                                        <span class="tp-product-tooltip tp-product-tooltip-right">Add To Wishlist</span>
                                    </button>
                                <?php else : ?>
                                    <button type="button" value="<?php echo $item['product_id'] ?>" onclick="favourite(this)" class="tp-product-action-btn-2 tp-product-add-to-wishlist-btn">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.60355 7.98635C2.83622 11.8048 7.7062 14.8923 9.0004 15.6565C10.299 14.8844 15.2042 11.7628 16.3973 7.98985C17.1806 5.55102 16.4535 2.46177 13.5644 1.53473C12.1647 1.08741 10.532 1.35966 9.40484 2.22804C9.16921 2.40837 8.84214 2.41187 8.60476 2.23329C7.41078 1.33952 5.85105 1.07778 4.42936 1.53473C1.54465 2.4609 0.820172 5.55014 1.60355 7.98635ZM9.00138 17.0711C8.89236 17.0711 8.78421 17.0448 8.68574 16.9914C8.41055 16.8417 1.92808 13.2841 0.348132 8.3872C0.347252 8.3872 0.347252 8.38633 0.347252 8.38633C-0.644504 5.30321 0.459792 1.42874 4.02502 0.284605C5.69904 -0.254635 7.52342 -0.0174044 8.99874 0.909632C10.4283 0.00973263 12.3275 -0.238878 13.9681 0.284605C17.5368 1.43049 18.6446 5.30408 17.6538 8.38633C16.1248 13.2272 9.59485 16.8382 9.3179 16.9896C9.21943 17.0439 9.1104 17.0711 9.00138 17.0711Z" fill="currentColor"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.203 6.67473C13.8627 6.67473 13.5743 6.41474 13.5462 6.07159C13.4882 5.35202 13.0046 4.7445 12.3162 4.52302C11.9689 4.41097 11.779 4.04068 11.8906 3.69666C12.0041 3.35175 12.3724 3.16442 12.7206 3.27297C13.919 3.65901 14.7586 4.71561 14.8615 5.96479C14.8905 6.32632 14.6206 6.64322 14.2575 6.6721C14.239 6.67385 14.2214 6.67473 14.203 6.67473Z" fill="currentColor"></path>
                                        </svg>
                                        <span class="tp-product-tooltip tp-product-tooltip-right">Add To Wishlist</span>
                                    </button>
                                <?php endif; ?>
                                <!-- End phần sản phẩm yêu thích -->
                                <button onclick="add_compare(this)" type="button" class="tp-product-action-btn-2 tp-product-add-to-wishlist-btn">
                                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.4144 6.16828L14 3.58412L11.4144 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M1.48883 3.58374L14 3.58374" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M4.07446 8.32153L1.48884 10.9057L4.07446 13.4898" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M14 10.9058H1.48883" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    <span class="tp-product-tooltip tp-product-tooltip-right">So sánh</span>
                                    <span class="tp-header-action-badge count_compare"><?php echo (isset($_SESSION['compare'])) ? count($_SESSION['compare']) : "0" ?></span>

                                </button>
                            </div>
                            <div class="tp-product-details-query">
                                <div class="tp-product-details-query-item d-flex align-items-center">
                                    <span>Mã hàng: </span>
                                    <p><?php echo $product['product_code'] ?></p>
                                </div>
                                <div class="tp-product-details-query-item d-flex align-items-center">
                                    <span>Loại: </span>
                                    <p><?php echo $product['title'] ?></p>
                                </div>
                            </div>
                            <div class="tp-product-details-social">
                                <span>Chia sẻ: </span>
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $product_share['url']; ?>&picture=<?php echo $product_share['img']; ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                            </div>
                            <div class="tp-product-details-msg mb-15">
                                <ul>
                                    <li>30 ngày đổi trả dễ dàng</li>
                                    <li>Đặt hàng trước 2h30 chiều để được giao hàng trong ngày</li>
                                </ul>
                            </div>
                            <div class="tp-product-details-payment d-flex align-items-center flex-wrap justify-content-between">
                                <p>Đảm bảo <br> & thanh toán an toàn và bảo mật</p>
                                <!-- <img src="assets/img/product/icons/payment-option.png" alt=""> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tp-product-details-bottom pb-140">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="tp-product-details-tab-nav tp-tab">
                            <nav>
                                <div class="nav nav-tabs justify-content-center p-relative tp-product-tab" id="navPresentationTab" role="tablist">
                                    <button class="nav-link active" id="nav-addInfo-tab" data-bs-toggle="tab" data-bs-target="#nav-addInfo" type="button" role="tab" aria-controls="nav-addInfo" aria-selected="false">Thông tin chi tiết sản phẩm</button>
                                    <button class="nav-link" id="nav-review-tab" data-bs-toggle="tab" data-bs-target="#nav-review" type="button" role="tab" aria-controls="nav-review" aria-selected="false">Bình luận và đánh giá (<span class="total_comment"><?php echo $count_evaluate; ?></span>)</button>

                                    <span id="productTabMarker" class="tp-product-details-tab-line"></span>
                                </div>
                            </nav>
                            <div class="tab-content" id="navPresentationTabContent">
                                <div class="tab-pane fade show active" id="nav-addInfo" role="tabpanel" aria-labelledby="nav-addInfo-tab" tabindex="0">
                                    <div class="tp-product-details-desc-wrapper pt-80">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-10">


                                                <div class="tab-pane show fade mt-4" id="tabs-content-3"><?php echo $product['product_content'] ?></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab" tabindex="0">
                                    <div class="tp-product-details-review-wrapper pt-60">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="tp-product-details-review-statics">
                                                    <!-- number -->
                                                    <div class="tp-product-details-review-number d-inline-block mb-50">
                                                        <h3 class="tp-product-details-review-number-title">Phản hồi khách hàng</h3>
                                                        <div class="tp-product-details-review-summery d-flex align-items-center" id="avg_star">
                                                            <div class="tp-product-details-review-summery-value">
                                                                <span><?php echo round($star['star'], 1) ?></span>
                                                            </div>
                                                            <div class="tp-product-details-review-summery-rating d-flex align-items-center">
                                                                <?php echo str_repeat("<span><i class='fa-solid fa-star'></i></span>", round($star['star'])) ?>
                                                                <p>(<?php echo $count_evaluate ?> Bình luận và đánh giá)</p>
                                                            </div>
                                                        </div>
                                                        <div class="tp-product-details-review-rating-list">
                                                            <!-- single item -->
                                                            <div class="tp-product-details-review-rating-item d-flex align-items-center">
                                                                <span>5 sao</span>
                                                                <div class="tp-product-details-review-rating-percent">
                                                                    (<span id="star_5"><?php echo $star_5; ?></span> Đánh giá)
                                                                </div>
                                                            </div> <!-- end single item -->

                                                            <!-- single item -->
                                                            <div class="tp-product-details-review-rating-item d-flex align-items-center">
                                                                <span>4 sao</span>
                                                                <div class="tp-product-details-review-rating-percent">
                                                                    (<span id="star_4"><?php echo $star_4; ?></span> Đánh giá)
                                                                </div>
                                                            </div> <!-- end single item -->

                                                            <!-- single item -->
                                                            <div class="tp-product-details-review-rating-item d-flex align-items-center">
                                                                <span>3 sao</span>
                                                                <div class="tp-product-details-review-rating-percent">
                                                                    (<span id="star_3"><?php echo $star_3; ?></span> Đánh giá)
                                                                </div>
                                                            </div> <!-- end single item -->

                                                            <!-- single item -->
                                                            <div class="tp-product-details-review-rating-item d-flex align-items-center">
                                                                <span>2 sao</span>
                                                                <div class="tp-product-details-review-rating-percent">
                                                                    (<span id="star_2"><?php echo $star_2; ?></span> Đánh giá)
                                                                </div>
                                                            </div> <!-- end single item -->

                                                            <!-- single item -->
                                                            <div class="tp-product-details-review-rating-item d-flex align-items-center">
                                                                <span>1 sao</span>
                                                                <div class="tp-product-details-review-rating-percent">
                                                                    (<span id="star_1"><?php echo $star_1; ?></span> Đánh giá)
                                                                </div>
                                                            </div> <!-- end single item -->
                                                        </div>
                                                    </div>

                                                    <!-- reviews -->
                                                    <div class="tp-product-details-review-list pr-110">
                                                        <h3 class="tp-product-details-review-title">Bình luận và đánh giá</h3>
                                                        <div id="list_comment">
                                                            <?php if (!empty($comments)) :
                                                                foreach ($comments as $item) :
                                                            ?>
                                                                    <div class="tp-product-details-review-avater d-flex align-items-start">
                                                                        <div class="tp-product-details-review-avater-thumb">
                                                                            <a href="#">
                                                                                <img src="<?php echo (!empty($item['img'])) ? "admin/img/{$item['img']}" : "img/user.png"; ?>" alt="">
                                                                            </a>
                                                                        </div>
                                                                        <div class="tp-product-details-review-avater-content">
                                                                            <div class="tp-product-details-review-avater-rating d-flex align-items-center">
                                                                                <?php echo str_repeat("<span><i class='fa-solid fa-star'></i></span>", $item['star']) ?>
                                                                            </div>
                                                                            <h3 class="tp-product-details-review-avater-title"><?php echo $item['fullname'] ?></h3>
                                                                            <span class="tp-product-details-review-avater-meta"><?php echo $item['time'] ?></span>

                                                                            <div class="tp-product-details-review-avater-comment">
                                                                                <p><?php echo $item['comment_content'] ?></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            <?php endforeach;
                                                            endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-lg-6">
                                                <div class="tp-product-details-review-form">
                                                    <h3 class="tp-product-details-review-form-title">Đánh giá sản phẩm này</h3>
                                                    <form action="" method="post">
                                                        <div class="tp-product-details-review-form-rating d-flex align-items-center">
                                                            <p>Đánh giá của bạn :</p>
                                                            <div class="tp-product-details-review-form-rating-icon d-flex align-items-center">
                                                                <div class="star-widget">
                                                                    <input type="radio" name="star" id="rate-5" value="5">
                                                                    <label for="rate-5"></label>
                                                                    <input type="radio" name="star" id="rate-4" value="4">
                                                                    <label for="rate-4"></label>
                                                                    <input type="radio" name="star" id="rate-3" value="3">
                                                                    <label for="rate-3"></label>
                                                                    <input type="radio" name="star" id="rate-2" value="2">
                                                                    <label for="rate-2"></label>
                                                                    <input type="radio" name="star" id="rate-1" value="1">
                                                                    <label for="rate-1"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tp-product-details-review-input-wrapper">
                                                            <div class="tp-product-details-review-input-box">
                                                                <div class="tp-product-details-review-input">
                                                                    <textarea id_product="<?php echo $product['product_id'] ?>" id="comment" placeholder="Viết bình luận ở đây...."></textarea>
                                                                </div>
                                                                <div class="tp-product-details-review-input-title">
                                                                    <label for="msg">Nội dung bình luận</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tp-product-details-review-btn-wrapper">
                                                            <button type="submit" onclick="add_comment(event)" id="add-comment" name="add-comment" class="tp-product-details-review-btn">Bình luận</button>
                                                        </div>
                                                    </form>
                                                    <script>

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
    </section>
    <!-- product details area end -->

    <!-- related product area start -->
    <section class="tp-related-product pt-95 pb-120">
        <div class="container">
            <div class="row">
                <div class="tp-section-title-wrapper-6 text-center mb-40">
                    <h3 class="tp-section-title-6">Những sảm phẩm tương tự</h3>
                </div>
            </div>
            <div class="row">
                <div class="tp-product-related-slider">
                    <div class="tp-product-related-slider-active swiper-container  mb-10">
                        <div class="swiper-wrapper">
                            <?php foreach (list_same_category($product['cat_id']) as $item) : ?>
                                <div class="swiper-slide">
                                    <div class="tp-product-item-3 tp-product-style-primary mb-50">
                                        <div class="tp-product-thumb-3 mb-15 fix p-relative z-index-1">
                                            <a href="<?php echo "san-pham/chi-tiet/" . create_slug($item['product_name']) . "/" . $item['product_id'] . ".html"; ?>">
                                                <img src="admin/img/<?php echo $item['product_thumb'] ?>" alt="">
                                            </a>
                                            <div class="tp-product-add-cart-btn-large-wrapper text-center">
                                                <a href="<?php echo "san-pham/chi-tiet/" . create_slug($item['product_name']) . "/" . $item['product_id'] . ".html"; ?>" class="tp-product-add-cart-btn-large">
                                                    Xem chi tiết sản phẩm
                                                </a>
                                            </div>
                                        </div>
                                        <div class="tp-product-content-3">
                                            <div class="tp-product-tag-3">
                                                <span><?php echo $product['title'] ?></span>
                                            </div>
                                            <h3 class="tp-product-title-3">
                                                <a href="<?php echo "san-pham/chi-tiet/" . create_slug($item['product_name']) . "/" . $item['product_id'] . ".html"; ?>"><?php echo $item['product_name'] ?></a>
                                            </h3>
                                            <div class="tp-product-price-wrapper-3">
                                                <span class="tp-product-price new-price"><?php echo currency_format(min_price($item['product_id'])) ?></span> -
                                                <span class="tp-product-price new-price"><?php echo currency_format(max_price($item['product_id'])) ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="tp-related-swiper-scrollbar tp-swiper-scrollbar"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- related product area end -->
</main>
<?php
get_footer();
?>