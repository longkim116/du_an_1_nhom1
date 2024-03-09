<?php
get_header();
?>
<main>
    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg pt-100 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title"><?php foreach ($list_category as $item) {
                                                            if ($item['id'] == $_GET['cat_id']) {
                                                                echo $item['title'];
                                                            }
                                                        } ?></h3>
                        <div class="breadcrumb__list">
                            <span><a href="trang-chu.html">Home</a></span>
                            <span><a href="san-pham.html">Sản phẩm</a></span>
                            <span><?php foreach ($list_category as $item) {
                                        if ($item['id'] == $_GET['cat_id']) {
                                            echo $item['title'];
                                        }
                                    } ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->
    <!-- shop area start -->
    <section class="tp-shop-area pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="tp-shop-sidebar mr-10">
                        <!-- product rating -->
                        <div class="tp-shop-widget mb-50">
                            <h3 class="tp-shop-widget-title">Danh sách sản phẩm bán chạy</h3>
                            <div class="tp-shop-widget-content">
                                <div class="tp-shop-widget-product">
                                    <?php if (!empty($list_products_by_star)) :
                                        foreach ($list_products_by_star as $item) :
                                    ?>
                                            <div class="tp-shop-widget-product-item d-flex align-items-center">
                                                <div class="tp-shop-widget-product-thumb">
                                                    <a href="<?php echo "san-pham/chi-tiet/" . create_slug($item['product_name']) . "/" . $item['product_id'] . ".html"; ?>">
                                                        <img src="admin/img/<?php echo $item['product_thumb'] ?>" alt="">
                                                    </a>
                                                </div>
                                                <div class="tp-shop-widget-product-content">
                                                    <div class="tp-shop-widget-product-rating-wrapper d-flex align-items-center">
                                                        <div class="tp-shop-widget-product-rating">
                                                            <?php echo str_repeat("<span><i class='fa-solid fa-star'></i></span>", round(product_star_by_id($item['product_id'])['star'])) ?>
                                                        </div>
                                                        <div class="tp-shop-widget-product-rating-number">
                                                            <span>(<?php echo number_format(product_star_by_id($item['product_id'])['star'], 1)   ?>)</span>
                                                        </div>
                                                    </div>
                                                    <h4 class="tp-shop-widget-product-title">
                                                        <a href="<?php echo "san-pham/chi-tiet/" . create_slug($item['product_name']) . "/" . $item['product_id'] . ".html"; ?>"><?php echo $item['product_name'] ?></a>
                                                    </h4>
                                                    <div class="tp-shop-widget-product-price-wrapper">
                                                        <span class="tp-shop-widget-product-price"><?php echo currency_format(min_price($item['product_id'])) ?></span>-
                                                        <span class="tp-shop-widget-product-price"><?php echo currency_format(max_price($item['product_id'])) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php endforeach;
                                    endif; ?>
                                </div>
                            </div>


                        </div>
                        <!-- brand -->


                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="tp-shop-main-wrapper">

                        <div class="tp-shop-top mb-45">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="tp-shop-top-left d-flex align-items-center ">
                                        <div class="tp-shop-top-tab tp-tab">
                                            <ul class="nav nav-tabs" id="productTab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="grid-tab" data-bs-toggle="tab" data-bs-target="#grid-tab-pane" type="button" role="tab" aria-controls="grid-tab-pane" aria-selected="true">
                                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M16.3327 6.01341V2.98675C16.3327 2.04675 15.906 1.66675 14.846 1.66675H12.1527C11.0927 1.66675 10.666 2.04675 10.666 2.98675V6.00675C10.666 6.95341 11.0927 7.32675 12.1527 7.32675H14.846C15.906 7.33341 16.3327 6.95341 16.3327 6.01341Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M16.3327 15.18V12.4867C16.3327 11.4267 15.906 11 14.846 11H12.1527C11.0927 11 10.666 11.4267 10.666 12.4867V15.18C10.666 16.24 11.0927 16.6667 12.1527 16.6667H14.846C15.906 16.6667 16.3327 16.24 16.3327 15.18Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M7.33268 6.01341V2.98675C7.33268 2.04675 6.90602 1.66675 5.84602 1.66675H3.15268C2.09268 1.66675 1.66602 2.04675 1.66602 2.98675V6.00675C1.66602 6.95341 2.09268 7.32675 3.15268 7.32675H5.84602C6.90602 7.33341 7.33268 6.95341 7.33268 6.01341Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M7.33268 15.18V12.4867C7.33268 11.4267 6.90602 11 5.84602 11H3.15268C2.09268 11 1.66602 11.4267 1.66602 12.4867V15.18C1.66602 16.24 2.09268 16.6667 3.15268 16.6667H5.84602C6.90602 16.6667 7.33268 16.24 7.33268 15.18Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tp-shop-top-result">
                                            <p><?php echo "Hiển thị " . count($list_product) . " trên " . count($total_product) . " sản phẩm" ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <form method="POST" action="">
                                        <div class="tp-shop-top-right d-sm-flex align-items-center justify-content-xl-end">
                                            <div class="tp-shop-top-select">
                                                <select name="select">
                                                    <option value="1">Từ A-Z</option>
                                                    <option value="2">Từ Z-A</option>
                                                    <option value="3">Giá thấp lên cao</option>
                                                    <option value="4">Giá cao xuống thấp</option>
                                                </select>
                                            </div>
                                            <div class="tp-shop-top-filter">
                                                <button type="submit" name="loc" class="tp-filter-btn filter-open-btn">
                                                    <span>
                                                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M14.9998 3.45001H10.7998" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M3.8 3.45001H1" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M6.5999 5.9C7.953 5.9 9.0499 4.8031 9.0499 3.45C9.0499 2.0969 7.953 1 6.5999 1C5.2468 1 4.1499 2.0969 4.1499 3.45C4.1499 4.8031 5.2468 5.9 6.5999 5.9Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M15.0002 11.15H12.2002" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M5.2 11.15H1" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M9.4002 13.6C10.7533 13.6 11.8502 12.5031 11.8502 11.15C11.8502 9.79691 10.7533 8.70001 9.4002 8.70001C8.0471 8.70001 6.9502 9.79691 6.9502 11.15C6.9502 12.5031 8.0471 13.6 9.4002 13.6Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                    Loại
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="tp-shop-items-wrapper tp-shop-item-primary">
                            <div class="tab-content" id="productTabContent">
                                <div class="tab-pane fade show active" id="grid-tab-pane" role="tabpanel" aria-labelledby="grid-tab" tabindex="0">
                                    <div class="row infinite-container">
                                        <?php if (!empty($list_product)) :
                                            foreach ($list_product as $item) :
                                        ?>
                                                <div class="col-xl-4 col-md-6 col-sm-6 infinite-item">
                                                    <div class="tp-product-item-2 mb-40">
                                                        <div class="tp-product-thumb-2 p-relative z-index-1 fix w-img">
                                                            <a href="<?php echo "san-pham/chi-tiet/" . create_slug($item['product_name']) . "/" . $item['product_id'] . ".html"; ?>">
                                                                <img src="admin/img/<?php echo $item['product_thumb'] ?>" alt="">
                                                            </a>
                                                            <?php if (get_discount_rate($item['product_id'])) : ?>
                                                                <div class="tp-product-badge">
                                                                    <span class="product-offer">- <?php echo get_discount_rate($item['product_id']) ?>%</span>
                                                                </div>
                                                            <?php endif; ?>
                                                            <!-- product action -->
                                                            <div class="tp-product-action-2 tp-product-action-blackStyle">
                                                                <div class="tp-product-action-item-2 d-flex flex-column">
                                                                    <button type="button" value="<?php echo $item['product_id'] ?>" onclick="quickView(this)" class="tp-product-action-btn-2 tp-product-quick-view-btn" data-bs-toggle="modal" data-bs-target="#producQuickViewModal">
                                                                        <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.99948 5.06828C7.80247 5.06828 6.82956 6.04044 6.82956 7.23542C6.82956 8.42951 7.80247 9.40077 8.99948 9.40077C10.1965 9.40077 11.1703 8.42951 11.1703 7.23542C11.1703 6.04044 10.1965 5.06828 8.99948 5.06828ZM8.99942 10.7482C7.0581 10.7482 5.47949 9.17221 5.47949 7.23508C5.47949 5.29705 7.0581 3.72021 8.99942 3.72021C10.9407 3.72021 12.5202 5.29705 12.5202 7.23508C12.5202 9.17221 10.9407 10.7482 8.99942 10.7482Z" fill="currentColor" />
                                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.41273 7.2346C3.08674 10.9265 5.90646 13.1215 8.99978 13.1224C12.0931 13.1215 14.9128 10.9265 16.5868 7.2346C14.9128 3.54363 12.0931 1.34863 8.99978 1.34773C5.90736 1.34863 3.08674 3.54363 1.41273 7.2346ZM9.00164 14.4703H8.99804H8.99714C5.27471 14.4676 1.93209 11.8629 0.0546754 7.50073C-0.0182251 7.33091 -0.0182251 7.13864 0.0546754 6.96883C1.93209 2.60759 5.27561 0.00288103 8.99714 0.000185582C8.99894 -0.000712902 8.99894 -0.000712902 8.99984 0.000185582C9.00164 -0.000712902 9.00164 -0.000712902 9.00254 0.000185582C12.725 0.00288103 16.0676 2.60759 17.945 6.96883C18.0188 7.13864 18.0188 7.33091 17.945 7.50073C16.0685 11.8629 12.725 14.4676 9.00254 14.4703H9.00164Z" fill="currentColor" />
                                                                        </svg>
                                                                        <span class="tp-product-tooltip tp-product-tooltip-right">Xem trước</span>
                                                                    </button>
                                                                    <!-- Phần sản phẩm yêu thích -->
                                                                    <?php if (isset($_SESSION['wishlist']) && array_key_exists($item['product_id'], $_SESSION['wishlist'])) : ?>
                                                                        <button type="button" style="background-color: palevioletred;" value="<?php echo $item['product_id'] ?>" onclick="delete_favourite(this)" class="tp-product-action-btn-2 tp-product-add-to-wishlist-btn">
                                                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.60355 7.98635C2.83622 11.8048 7.7062 14.8923 9.0004 15.6565C10.299 14.8844 15.2042 11.7628 16.3973 7.98985C17.1806 5.55102 16.4535 2.46177 13.5644 1.53473C12.1647 1.08741 10.532 1.35966 9.40484 2.22804C9.16921 2.40837 8.84214 2.41187 8.60476 2.23329C7.41078 1.33952 5.85105 1.07778 4.42936 1.53473C1.54465 2.4609 0.820172 5.55014 1.60355 7.98635ZM9.00138 17.0711C8.89236 17.0711 8.78421 17.0448 8.68574 16.9914C8.41055 16.8417 1.92808 13.2841 0.348132 8.3872C0.347252 8.3872 0.347252 8.38633 0.347252 8.38633C-0.644504 5.30321 0.459792 1.42874 4.02502 0.284605C5.69904 -0.254635 7.52342 -0.0174044 8.99874 0.909632C10.4283 0.00973263 12.3275 -0.238878 13.9681 0.284605C17.5368 1.43049 18.6446 5.30408 17.6538 8.38633C16.1248 13.2272 9.59485 16.8382 9.3179 16.9896C9.21943 17.0439 9.1104 17.0711 9.00138 17.0711Z" fill="currentColor" />
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.203 6.67473C13.8627 6.67473 13.5743 6.41474 13.5462 6.07159C13.4882 5.35202 13.0046 4.7445 12.3162 4.52302C11.9689 4.41097 11.779 4.04068 11.8906 3.69666C12.0041 3.35175 12.3724 3.16442 12.7206 3.27297C13.919 3.65901 14.7586 4.71561 14.8615 5.96479C14.8905 6.32632 14.6206 6.64322 14.2575 6.6721C14.239 6.67385 14.2214 6.67473 14.203 6.67473Z" fill="currentColor" />
                                                                            </svg>
                                                                            <span class="tp-product-tooltip tp-product-tooltip-right">Yêu thích</span>
                                                                        </button>
                                                                    <?php else : ?>
                                                                        <button type="button" value="<?php echo $item['product_id'] ?>" onclick="favourite(this)" class="tp-product-action-btn-2 tp-product-add-to-wishlist-btn">
                                                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.60355 7.98635C2.83622 11.8048 7.7062 14.8923 9.0004 15.6565C10.299 14.8844 15.2042 11.7628 16.3973 7.98985C17.1806 5.55102 16.4535 2.46177 13.5644 1.53473C12.1647 1.08741 10.532 1.35966 9.40484 2.22804C9.16921 2.40837 8.84214 2.41187 8.60476 2.23329C7.41078 1.33952 5.85105 1.07778 4.42936 1.53473C1.54465 2.4609 0.820172 5.55014 1.60355 7.98635ZM9.00138 17.0711C8.89236 17.0711 8.78421 17.0448 8.68574 16.9914C8.41055 16.8417 1.92808 13.2841 0.348132 8.3872C0.347252 8.3872 0.347252 8.38633 0.347252 8.38633C-0.644504 5.30321 0.459792 1.42874 4.02502 0.284605C5.69904 -0.254635 7.52342 -0.0174044 8.99874 0.909632C10.4283 0.00973263 12.3275 -0.238878 13.9681 0.284605C17.5368 1.43049 18.6446 5.30408 17.6538 8.38633C16.1248 13.2272 9.59485 16.8382 9.3179 16.9896C9.21943 17.0439 9.1104 17.0711 9.00138 17.0711Z" fill="currentColor" />
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.203 6.67473C13.8627 6.67473 13.5743 6.41474 13.5462 6.07159C13.4882 5.35202 13.0046 4.7445 12.3162 4.52302C11.9689 4.41097 11.779 4.04068 11.8906 3.69666C12.0041 3.35175 12.3724 3.16442 12.7206 3.27297C13.919 3.65901 14.7586 4.71561 14.8615 5.96479C14.8905 6.32632 14.6206 6.64322 14.2575 6.6721C14.239 6.67385 14.2214 6.67473 14.203 6.67473Z" fill="currentColor" />
                                                                            </svg>
                                                                            <span class="tp-product-tooltip tp-product-tooltip-right">Yêu thích</span>
                                                                        </button>
                                                                    <?php endif; ?>
                                                                    <!-- End phần sản phẩm yêu thích -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tp-product-content-2 pt-15">
                                                            <div class="tp-product-category">
                                                                <a href="<?php echo "san-pham/chi-tiet/" . create_slug($item['product_name']) . "/" . $item['product_id'] . ".html"; ?>"><?php echo $item['title'] ?></a>
                                                            </div>
                                                            <h3 class="tp-product-title-2">
                                                                <a href="<?php echo "san-pham/chi-tiet/" . create_slug($item['product_name']) . "/" . $item['product_id'] . ".html"; ?>"><?php echo $item['product_name'] ?></strong></a>
                                                            </h3>
                                                            <div class="tp-product-rating d-flex align-items-center">
                                                                <div class="tp-product-rating-icon">
                                                                    <?php echo  str_repeat("<span><i class='fa-solid fa-star'></i></span>", product_reviews($item['product_id'])['star'])  ?>
                                                                </div>
                                                                <div class="tp-product-rating-text">
                                                                    <span>(<?php echo product_reviews($item['product_id'])['count'] ?> Đánh giá)</span>
                                                                </div>
                                                            </div>
                                                            <div class="tp-product-price-wrapper-2">
                                                                <span class="tp-product-price new-price"><?php echo currency_format(min_price($item['product_id'])) ?></span> -
                                                                <span class="tp-product-price new-price"><?php echo currency_format(max_price($item['product_id'])) ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php endforeach;
                                        else :
                                            echo "<h2>Không timg thấy sản phẩm</h2>";
                                        endif;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="infinite-pagination d-none">
                            <a href="shop.html" class="infinite-next-link">Next</a>
                        </div>
                        <div class="tp-shop-pagination mt-20">
                            <div class="tp-pagination">
                                <nav>
                                    <?php echo get_padding($num_rows); ?>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shop area end -->
    <div class="modal fade tp-product-modal" id="producQuickViewModal" tabindex="-1" aria-labelledby="producQuickViewModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="tp-product-modal-content d-lg-flex align-items-start">
                    <button type="button" class="tp-product-modal-close-btn" data-bs-toggle="modal" data-bs-target="#producQuickViewModal"><i class="fa-regular fa-xmark"></i></button>
                    <div class="tp-product-details-thumb-wrapper tp-tab d-sm-flex">
                        <div class="tab-content m-img" id="productDetailsNavContent w-100">
                            <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav-1-tab" tabindex="0">
                                <div class="tp-product-details-nav-main-thumb" style="width: 600px; height: 600px;" id="product_img">
                                    <img src="assets/img/product/details/main/product-details-main-1.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="tp-product-details-wrapper">
                            <h6 class="h6 tp-product-details-title" id="product_name">Samsung galaxy A8 tablet</h6>
                            <!-- inventory details -->
                            <div class="tp-product-details-inventory d-flex align-items-center mb-10">
                                <div class="tp-product-details-stock mb-10" id="quantity_product">
                                    <span>Trong kho</span>
                                </div>
                                <div class="tp-product-details-rating-wrapper d-flex align-items-center mb-10">
                                    <div class="tp-product-details-rating" id="product_star">

                                    </div>
                                    <div class="tp-product-details-reviews">
                                        <span id="product_reviews"></span>
                                    </div>
                                </div>
                            </div>
                            <div id="product_desc">

                            </div>
                            <div id="string_variant_ram" class="form-group">

                            </div>
                            <!-- variations -->
                            <div id="string_variant_color">

                            </div>
                            <!-- price -->
                            <div class="tp-product-details-price-wrapper mb-20">
                                <h3 id="product_price">
                                    <?php echo currency_format(min_price($item['product_id'])) ?>-
                                    <?php echo currency_format(max_price($item['product_id'])) ?>
                                </h3>
                            </div>
                            <!-- actions -->
                            <div class="tp-product-details-action-wrapper">

                                <div class="tp-product-details-action-item-wrapper d-flex align-items-center">
                                    <div class="tp-product-details-quantity">
                                        <div class="tp-product-quantity mb-15 mr-15" id="status">
                                            <input class="tp-cart-input" type="number" id="num-order" value="1" min="1" max="10">
                                        </div>
                                    </div>
                                    <div class="tp-product-details-add-to-cart mb-15 w-100">
                                        <button type="submit" onclick="add_cart(event)" class="tp-product-details-add-to-cart-btn w-100">Thêm vào giỏ hàng</button>
                                    </div>
                                </div>
                                <button type="submit" onclick="by_now(this)" class="tp-product-details-buy-now-btn w-100">Mua ngay</button>
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