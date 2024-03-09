<?php
get_header();
?>
<main>

    <!-- slider area start -->
    <section class="tp-slider-area p-relative z-index-1">
        <div class="tp-slider-active tp-slider-variation swiper-container">
            <div class="swiper-wrapper">
                <?php if (!empty($list_sliders)) :
                    foreach ($list_sliders as $item) : ?>
                        <div class="tp-slider-item tp-slider-height d-flex align-items-center swiper-slide green-dark-bg">
                            <div class="tp-slider-shape">
                                <img class="tp-slider-shape-1" src="assets/img/slider/shape/slider-shape-1.png" alt="slider-shape">
                                <img class="tp-slider-shape-2" src="assets/img/slider/shape/slider-shape-2.png" alt="slider-shape">
                                <img class="tp-slider-shape-3" src="assets/img/slider/shape/slider-shape-3.png" alt="slider-shape">
                                <img class="tp-slider-shape-4" src="assets/img/slider/shape/slider-shape-4.png" alt="slider-shape">
                            </div>
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-xl-5 col-lg-6 col-md-6">
                                        <div class="tp-slider-content p-relative z-index-1">
                                            <h3 class="tp-slider-title"><?php echo $item['slider_content'] ?></h3>
                                            <div class="tp-slider-btn">
                                                <a href="<?php echo $item['link'] ?>" class="tp-btn tp-btn-2 tp-btn-white">Xem thêm
                                                    <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M16 6.99976L1 6.99976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M9.9502 0.975414L16.0002 6.99941L9.9502 13.0244" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-7 col-lg-6 col-md-6">
                                        <div class="tp-slider-thumb text-end">
                                            <img src="admin/img/<?php echo $item['slider_img'] ?>" alt="slider-img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                <?php endforeach;
                endif; ?>
                <div class="tp-slider-arrow tp-swiper-arrow d-none d-lg-block">
                    <button type="button" class="tp-slider-button-prev">
                        <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 13L1 7L7 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <button type="button" class="tp-slider-button-next">
                        <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 13L7 7L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
                <div class="tp-slider-dot tp-swiper-dot"></div>
            </div>
    </section>
    <!-- slider area end -->

    <!-- product category area start -->
    <section class="tp-product-category pt-60 pb-15">
        <div class="container">
            <div class="row row-cols-xl-5 row-cols-lg-5 row-cols-md-4 justify-content-center">
                <?php if (!empty($list_category)) :
                    foreach ($list_category as $item) : ?>
                        <div class="col">
                            <div class="tp-product-category-item text-center mb-40">
                                <div class="tp-product-category-thumb fix">
                                    <a href="san-pham/<?php echo create_slug($item['title']) ?>-<?php echo $item['id'] ?>.html">
                                        <img src="admin/img/<?php echo $item['image'] ?>" alt="product-category">
                                    </a>
                                </div>
                                <div class="tp-product-category-content">
                                    <h3 class="tp-product-category-title">
                                        <a href="san-pham/<?php echo create_slug($item['title']) ?>-<?php echo $item['id'] ?>.html"><?php echo $item['title'] ?></a>
                                    </h3>
                                    <p><?php echo mun_product($item['id']) ?> Sản phẩm</p>
                                </div>
                            </div>
                        </div>
                <?php endforeach;
                endif; ?>

            </div>
        </div>
    </section>
    <!-- product category area end -->

    <!-- feature area start -->
    <section class="tp-feature-area tp-feature-border-radius pb-70">
        <div class="container">
            <div class="row gx-1 gy-1 gy-xl-0">
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="tp-feature-item d-flex align-items-start">
                        <div class="tp-feature-icon mr-15">
                            <span>
                                <svg width="33" height="27" viewBox="0 0 33 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.7222 1H31.5555V19.0556H10.7222V1Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M10.7222 7.94446H5.16667L1.00001 12.1111V19.0556H10.7222V7.94446Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M25.3055 26C23.3879 26 21.8333 24.4454 21.8333 22.5278C21.8333 20.6101 23.3879 19.0555 25.3055 19.0555C27.2232 19.0555 28.7778 20.6101 28.7778 22.5278C28.7778 24.4454 27.2232 26 25.3055 26Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M7.25001 26C5.33235 26 3.77778 24.4454 3.77778 22.5278C3.77778 20.6101 5.33235 19.0555 7.25001 19.0555C9.16766 19.0555 10.7222 20.6101 10.7222 22.5278C10.7222 24.4454 9.16766 26 7.25001 26Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                        <div class="tp-feature-content">
                            <h3 class="tp-feature-title">Giao hàng miễn phí</h3>
                            <p>Tất cả các đơn hàng</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="tp-feature-item d-flex align-items-start">
                        <div class="tp-feature-icon mr-15">
                            <span>
                                <svg width="21" height="35" viewBox="0 0 21 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.3636 1V34" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M17.8636 7H6.61365C5.22126 7 3.8859 7.55312 2.90134 8.53769C1.91677 9.52226 1.36365 10.8576 1.36365 12.25C1.36365 13.6424 1.91677 14.9777 2.90134 15.9623C3.8859 16.9469 5.22126 17.5 6.61365 17.5H14.1136C15.506 17.5 16.8414 18.0531 17.826 19.0377C18.8105 20.0223 19.3636 21.3576 19.3636 22.75C19.3636 24.1424 18.8105 25.4777 17.826 26.4623C16.8414 27.4469 15.506 28 14.1136 28H1.36365" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                        <div class="tp-feature-content">
                            <h3 class="tp-feature-title">Chính sách mua hàng</h3>
                            <p>Trả góp không lãi xuất 0%</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="tp-feature-item d-flex align-items-start">
                        <div class="tp-feature-icon mr-15">
                            <span>
                                <svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <mask id="mask0_1211_583" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="31" height="30">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0H30.0024V29.9998H0V0Z" fill="white" />
                                    </mask>
                                    <g mask="url(#mask0_1211_583)">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.4168 27.1116C14.3017 27.9756 15.7266 27.9651 16.6056 27.0816L17.6885 26.0017C18.5285 25.1632 19.6894 24.6848 20.8728 24.6848H22.4178C23.6687 24.6848 24.6856 23.6678 24.6856 22.4184V20.875C24.6856 19.6736 25.1506 18.5441 25.9995 17.6937L27.0795 16.6122C27.519 16.1713 27.7544 15.5998 27.7529 14.9938C27.7514 14.3894 27.513 13.8209 27.0825 13.3919L26.001 12.309C25.1506 11.4525 24.6856 10.3246 24.6856 9.12318V7.58277C24.6856 6.33184 23.6687 5.3149 22.4178 5.3149H20.8758C19.6744 5.3149 18.545 4.84842 17.6945 4.00397L16.6116 2.91954C15.7101 2.02709 14.2717 2.03159 13.3913 2.91804L12.3128 3.99947C11.4519 4.84992 10.3225 5.3149 9.12553 5.3149H7.58212C6.33269 5.3164 5.31575 6.33334 5.31575 7.58277V9.12018C5.31575 10.3216 4.84927 11.451 4.00332 12.303L2.93839 13.3694C2.92789 13.3814 2.91739 13.3904 2.90689 13.4009C2.02644 14.2874 2.03094 15.7258 2.91739 16.6062L4.00032 17.6892C4.84927 18.5411 5.31575 19.6706 5.31575 20.872V22.4184C5.31575 23.6678 6.33119 24.6848 7.58212 24.6848H9.12253C10.3255 24.6863 11.4549 25.1527 12.3053 26.0002L13.3868 27.0786C13.3958 27.0891 13.4063 27.0996 13.4168 27.1116ZM14.9972 30.0002C13.8468 30.0002 12.6963 29.5652 11.8159 28.6923C11.8039 28.6803 11.7919 28.6683 11.7799 28.6548L10.715 27.5914C10.2905 27.1699 9.72352 26.9359 9.12055 26.9344H7.58164C5.09029 26.9344 3.06541 24.908 3.06541 22.4182V20.8717C3.06541 20.2688 2.82992 19.7033 2.40694 19.2773L1.32851 18.2004C-0.423392 16.4575 -0.444391 13.6197 1.27601 11.8498C1.28951 11.8363 1.30301 11.8228 1.31651 11.8093L2.40844 10.7143C2.82992 10.2899 3.06541 9.72139 3.06541 9.11993V7.58252C3.06541 5.09266 5.09029 3.06628 7.58014 3.06478H9.12505C9.72652 3.06478 10.2935 2.82929 10.724 2.40482L11.7964 1.32938C13.5498 -0.436017 16.4161 -0.445016 18.1845 1.31288L19.281 2.40932C19.7054 2.83079 20.2724 3.06478 20.8754 3.06478H22.4173C24.9086 3.06478 26.935 5.09116 26.935 7.58252V9.12293C26.935 9.72439 27.169 10.2929 27.5935 10.7203L28.6704 11.7988C29.5239 12.6462 29.9978 13.7787 30.0023 14.9861C30.0068 16.1935 29.5404 17.329 28.6899 18.1854L27.5905 19.2818C27.169 19.7063 26.935 20.2718 26.935 20.8747V22.4182C26.935 24.908 24.9086 26.9344 22.4188 26.9344H20.8724C20.2784 26.9344 19.6979 27.1744 19.2765 27.5929L18.1995 28.6698C17.3191 29.5562 16.1581 30.0002 14.9972 30.0002Z" fill="currentColor" />
                                    </g>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.145 19.9811C10.857 19.9811 10.569 19.8716 10.3501 19.6511C9.91058 19.2116 9.91058 18.5006 10.3501 18.0612L18.0596 10.3501C18.4991 9.91064 19.2115 9.91064 19.651 10.3501C20.0905 10.7896 20.0905 11.502 19.651 11.9415L11.94 19.6511C11.721 19.8716 11.433 19.9811 11.145 19.9811Z" fill="currentColor" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18.7544 20.2476C17.925 20.2476 17.247 19.5772 17.247 18.7477C17.247 17.9183 17.9115 17.2478 18.7409 17.2478H18.7544C19.5839 17.2478 20.2543 17.9183 20.2543 18.7477C20.2543 19.5772 19.5839 20.2476 18.7544 20.2476Z" fill="currentColor" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.2548 12.748C10.4254 12.748 9.74744 12.0775 9.74744 11.2481C9.74744 10.4186 10.4119 9.74817 11.2413 9.74817H11.2548C12.0843 9.74817 12.7548 10.4186 12.7548 11.2481C12.7548 12.0775 12.0843 12.748 11.2548 12.748Z" fill="currentColor" />
                                </svg>
                            </span>
                        </div>
                        <div class="tp-feature-content">
                            <h3 class="tp-feature-title">Giảm giá thành viên mới</h3>
                            <p>Mỗi đơn hàng trên 200.000vnđ</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="tp-feature-item d-flex align-items-start">
                        <div class="tp-feature-icon mr-15">
                            <span>
                                <svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.5 24.3333V15C1.5 11.287 2.975 7.72602 5.60051 5.10051C8.22602 2.475 11.787 1 15.5 1C19.213 1 22.774 2.475 25.3995 5.10051C28.025 7.72602 29.5 11.287 29.5 15V24.3333" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M29.5 25.8889C29.5 26.714 29.1722 27.5053 28.5888 28.0888C28.0053 28.6722 27.214 29 26.3889 29H24.8333C24.0082 29 23.2169 28.6722 22.6335 28.0888C22.05 27.5053 21.7222 26.714 21.7222 25.8889V21.2222C21.7222 20.3971 22.05 19.6058 22.6335 19.0223C23.2169 18.4389 24.0082 18.1111 24.8333 18.1111H29.5V25.8889ZM1.5 25.8889C1.5 26.714 1.82778 27.5053 2.41122 28.0888C2.99467 28.6722 3.78599 29 4.61111 29H6.16667C6.99179 29 7.78311 28.6722 8.36656 28.0888C8.95 27.5053 9.27778 26.714 9.27778 25.8889V21.2222C9.27778 20.3971 8.95 19.6058 8.36656 19.0223C7.78311 18.4389 6.99179 18.1111 6.16667 18.1111H1.5V25.8889Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                        <div class="tp-feature-content">
                            <h3 class="tp-feature-title">Hỗ trợ 24/7</h3>
                            <p>Liên hệ với chúng tôi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature area end -->

    <!-- product area start -->
    <section class="tp-product-area pb-55">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-xl-5 col-lg-6 col-md-5">
                    <div class="tp-section-title-wrapper mb-40">
                        <h3 class="tp-section-title" id="product_title">Sản phẩm khuyễn mãi
                        </h3>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6 col-md-7">
                    <div class="tp-product-tab tp-product-tab-border mb-45 tp-tab d-flex justify-content-md-end">
                        <ul class="nav nav-tabs justify-content-sm-end" id="productTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="Sản phẩm khuyễn mãi" onclick="tablist(this)" data-bs-toggle="tab" data-bs-target="#new-tab-pane" type="button" role="tab" aria-controls="new-tab-pane" aria-selected="true">Khuyễn mãi
                                    <span class="tp-product-tab-line">
                                        <svg width="52" height="13" viewBox="0 0 52 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 8.97127C11.6061 -5.48521 33 3.99996 51 11.4635" stroke="currentColor" stroke-width="2" stroke-miterlimit="3.8637" stroke-linecap="round" />
                                        </svg>
                                    </span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="Sản phẩm Hot" onclick="tablist(this)" data-bs-toggle="tab" data-bs-target="#featured-tab-pane" type="button" role="tab" aria-controls="featured-tab-pane" aria-selected="false">Hot
                                    <span class="tp-product-tab-line">
                                        <svg width="52" height="13" viewBox="0 0 52 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 8.97127C11.6061 -5.48521 33 3.99996 51 11.4635" stroke="currentColor" stroke-width="2" stroke-miterlimit="3.8637" stroke-linecap="round" />
                                        </svg>
                                    </span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="Sản phẩm New" onclick="tablist(this)" data-bs-toggle="tab" data-bs-target="#topsell-tab-pane" type="button" role="tab" aria-controls="topsell-tab-pane" aria-selected="false">New
                                    <span class="tp-product-tab-line">
                                        <svg width="52" height="13" viewBox="0 0 52 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 8.97127C11.6061 -5.48521 33 3.99996 51 11.4635" stroke="currentColor" stroke-width="2" stroke-miterlimit="3.8637" stroke-linecap="round" />
                                        </svg>
                                    </span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-product-tab-content">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="new-tab-pane" role="tabpanel" aria-labelledby="new-tab" tabindex="0">
                                <div class="row">
                                    <!-- Danh sách sản phẩm khuyễn mãi  -->
                                    <?php foreach ($list_products_promotion as $item) : ?>
                                        <div class="col-xl-3 col-lg-3 col-sm-6">
                                            <div class="tp-product-item p-relative transition-3 mb-25">
                                                <div class="tp-product-thumb p-relative fix m-img">
                                                    <a href="<?php echo "san-pham/chi-tiet/" . create_slug($item['product_name']) . "/" . $item['product_id'] . ".html"; ?>">
                                                        <img src="admin/img/<?php echo $item['product_thumb'] ?>" alt="product-electronic">
                                                    </a>

                                                    <!-- product badge -->
                                                    <div class="tp-product-badge">
                                                        <span class="product-offer">- <?php echo get_discount_rate($item['promotion_id']) ?>%</span>
                                                    </div>

                                                    <!-- product action -->
                                                    <div class="tp-product-action">
                                                        <div class="tp-product-action-item d-flex flex-column">
                                                            <button type="button" value="<?php echo $item['product_id'] ?>" onclick="quickView(this)" class="tp-product-action-btn tp-product-quick-view-btn" data-bs-toggle="modal" data-bs-target="#producQuickViewModal">
                                                                <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.99938 5.64111C8.66938 5.64111 7.58838 6.72311 7.58838 8.05311C7.58838 9.38211 8.66938 10.4631 9.99938 10.4631C11.3294 10.4631 12.4114 9.38211 12.4114 8.05311C12.4114 6.72311 11.3294 5.64111 9.99938 5.64111ZM9.99938 11.9631C7.84238 11.9631 6.08838 10.2091 6.08838 8.05311C6.08838 5.89611 7.84238 4.14111 9.99938 4.14111C12.1564 4.14111 13.9114 5.89611 13.9114 8.05311C13.9114 10.2091 12.1564 11.9631 9.99938 11.9631Z" fill="currentColor" />
                                                                    <g mask="url(#mask0_1211_721)">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.56975 8.05226C3.42975 12.1613 6.56275 14.6043 9.99975 14.6053C13.4368 14.6043 16.5697 12.1613 18.4298 8.05226C16.5697 3.94426 13.4368 1.50126 9.99975 1.50026C6.56375 1.50126 3.42975 3.94426 1.56975 8.05226ZM10.0017 16.1053H9.99775H9.99675C5.86075 16.1023 2.14675 13.2033 0.06075 8.34826C-0.02025 8.15926 -0.02025 7.94526 0.06075 7.75626C2.14675 2.90226 5.86175 0.00326172 9.99675 0.000261719C9.99875 -0.000738281 9.99875 -0.000738281 9.99975 0.000261719C10.0017 -0.000738281 10.0017 -0.000738281 10.0028 0.000261719C14.1388 0.00326172 17.8527 2.90226 19.9387 7.75626C20.0208 7.94526 20.0208 8.15926 19.9387 8.34826C17.8537 13.2033 14.1388 16.1023 10.0028 16.1053H10.0017Z" fill="currentColor" />
                                                                    </g>
                                                                </svg>

                                                                <span class="tp-product-tooltip">Xem trước</span>
                                                            </button>
                                                            <!-- Phần sản phẩm yêu thích -->
                                                            <?php if (isset($_SESSION['wishlist']) && array_key_exists($item['product_id'], $_SESSION['wishlist'])) : ?>
                                                                <button style="background-color: palevioletred;" type="button" value="<?php echo $item['product_id'] ?>" onclick="delete_favourite(this)" class="tp-product-action-btn tp-product-add-to-wishlist-btn">
                                                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.78158 8.88867C3.15121 13.1386 8.5623 16.5749 10.0003 17.4255C11.4432 16.5662 16.8934 13.0918 18.219 8.89257C19.0894 6.17816 18.2815 2.73984 15.0714 1.70806C13.5162 1.21019 11.7021 1.5132 10.4497 2.4797C10.1879 2.68041 9.82446 2.68431 9.56069 2.48555C8.23405 1.49079 6.50102 1.19947 4.92136 1.70806C1.71613 2.73887 0.911158 6.17718 1.78158 8.88867ZM10.0013 19C9.88015 19 9.75999 18.9708 9.65058 18.9113C9.34481 18.7447 2.14207 14.7852 0.386569 9.33491C0.385592 9.33491 0.385592 9.33394 0.385592 9.33394C-0.71636 5.90244 0.510636 1.59018 4.47199 0.316764C6.33203 -0.283407 8.35911 -0.019371 9.99836 1.01242C11.5868 0.0108324 13.6969 -0.26587 15.5198 0.316764C19.4851 1.59213 20.716 5.90342 19.615 9.33394C17.9162 14.7218 10.6607 18.7408 10.353 18.9094C10.2436 18.9698 10.1224 19 10.0013 19Z" fill="currentColor" />
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.7806 7.42904C15.4025 7.42904 15.0821 7.13968 15.0508 6.75775C14.9864 5.95687 14.4491 5.2807 13.6841 5.03421C13.2983 4.9095 13.0873 4.49737 13.2113 4.11446C13.3373 3.73059 13.7467 3.52209 14.1335 3.6429C15.4651 4.07257 16.398 5.24855 16.5123 6.63888C16.5445 7.04127 16.2446 7.39397 15.8412 7.42612C15.8206 7.42807 15.8011 7.42904 15.7806 7.42904Z" fill="currentColor" />
                                                                    </svg>

                                                                    <span class="tp-product-tooltip">Yêu thích</span>
                                                                </button>
                                                            <?php else : ?>
                                                                <button type="button" value="<?php echo $item['product_id'] ?>" onclick="favourite(this)" class="tp-product-action-btn tp-product-add-to-wishlist-btn">
                                                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.78158 8.88867C3.15121 13.1386 8.5623 16.5749 10.0003 17.4255C11.4432 16.5662 16.8934 13.0918 18.219 8.89257C19.0894 6.17816 18.2815 2.73984 15.0714 1.70806C13.5162 1.21019 11.7021 1.5132 10.4497 2.4797C10.1879 2.68041 9.82446 2.68431 9.56069 2.48555C8.23405 1.49079 6.50102 1.19947 4.92136 1.70806C1.71613 2.73887 0.911158 6.17718 1.78158 8.88867ZM10.0013 19C9.88015 19 9.75999 18.9708 9.65058 18.9113C9.34481 18.7447 2.14207 14.7852 0.386569 9.33491C0.385592 9.33491 0.385592 9.33394 0.385592 9.33394C-0.71636 5.90244 0.510636 1.59018 4.47199 0.316764C6.33203 -0.283407 8.35911 -0.019371 9.99836 1.01242C11.5868 0.0108324 13.6969 -0.26587 15.5198 0.316764C19.4851 1.59213 20.716 5.90342 19.615 9.33394C17.9162 14.7218 10.6607 18.7408 10.353 18.9094C10.2436 18.9698 10.1224 19 10.0013 19Z" fill="currentColor" />
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.7806 7.42904C15.4025 7.42904 15.0821 7.13968 15.0508 6.75775C14.9864 5.95687 14.4491 5.2807 13.6841 5.03421C13.2983 4.9095 13.0873 4.49737 13.2113 4.11446C13.3373 3.73059 13.7467 3.52209 14.1335 3.6429C15.4651 4.07257 16.398 5.24855 16.5123 6.63888C16.5445 7.04127 16.2446 7.39397 15.8412 7.42612C15.8206 7.42807 15.8011 7.42904 15.7806 7.42904Z" fill="currentColor" />
                                                                    </svg>
                                                                    <span class="tp-product-tooltip">Yêu thích</span>
                                                                </button>
                                                            <?php endif; ?>
                                                            <!-- End phần sản phẩm yêu thích -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- product content -->
                                                <div class="tp-product-content">
                                                    <div class="tp-product-category">
                                                        <a href="<?php echo "san-pham/chi-tiet/" . create_slug($item['product_name']) . "/" . $item['product_id'] . ".html"; ?>"><?php echo $item['title'] ?></a>
                                                    </div>
                                                    <h3 class="tp-product-title">
                                                        <a href="<?php echo "san-pham/chi-tiet/" . create_slug($item['product_name']) . "/" . $item['product_id'] . ".html"; ?>">
                                                            <?php echo $item['product_name'] ?></a>
                                                    </h3>
                                                    <div class="tp-product-rating d-flex align-items-center">
                                                        <div class="tp-product-rating-icon">
                                                            <?php echo  str_repeat("<span><i class='fa-solid fa-star'></i></span>", product_reviews($item['product_id'])['star'])  ?>
                                                        </div>
                                                        <div class="tp-product-rating-text">
                                                            <span>(<?php echo product_reviews($item['product_id'])['count'] ?> Đánh giá)</span>
                                                        </div>
                                                    </div>
                                                    <div class="tp-product-price-wrapper">
                                                        <span class="tp-product-price new-price"><?php echo currency_format(min_price($item['product_id'])) ?></span> -
                                                        <span class="tp-product-price new-price"><?php echo currency_format(max_price($item['product_id'])) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="featured-tab-pane" role="tabpanel" aria-labelledby="featured-tab" tabindex="0">
                                <div class="row">
                                    <!-- Danh sách sản phẩm bán chạy  -->
                                    <?php foreach ($list_products_by_sales as $item) : ?>
                                        <div class="col-xl-3 col-lg-3 col-sm-6">
                                            <div class="tp-product-item p-relative transition-3 mb-25">
                                                <div class="tp-product-thumb p-relative fix m-img">
                                                    <a href="<?php echo "san-pham/chi-tiet/" . create_slug($item['product_name']) . "/" . $item['product_id'] . ".html"; ?>">
                                                        <img src="admin/img/<?php echo $item['product_thumb'] ?>" alt="product-electronic">
                                                    </a>

                                                    <!-- product badge -->
                                                    <div class="tp-product-badge">
                                                        <span class="product-hot">Hot</span>
                                                    </div>

                                                    <!-- product action -->
                                                    <div class="tp-product-action">
                                                        <div class="tp-product-action-item d-flex flex-column">
                                                            <button type="button" value="<?php echo $item['product_id'] ?>" onclick="quickView(this)" class="tp-product-action-btn tp-product-quick-view-btn" data-bs-toggle="modal" data-bs-target="#producQuickViewModal">
                                                                <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.99938 5.64111C8.66938 5.64111 7.58838 6.72311 7.58838 8.05311C7.58838 9.38211 8.66938 10.4631 9.99938 10.4631C11.3294 10.4631 12.4114 9.38211 12.4114 8.05311C12.4114 6.72311 11.3294 5.64111 9.99938 5.64111ZM9.99938 11.9631C7.84238 11.9631 6.08838 10.2091 6.08838 8.05311C6.08838 5.89611 7.84238 4.14111 9.99938 4.14111C12.1564 4.14111 13.9114 5.89611 13.9114 8.05311C13.9114 10.2091 12.1564 11.9631 9.99938 11.9631Z" fill="currentColor" />
                                                                    <g mask="url(#mask0_1211_721)">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.56975 8.05226C3.42975 12.1613 6.56275 14.6043 9.99975 14.6053C13.4368 14.6043 16.5697 12.1613 18.4298 8.05226C16.5697 3.94426 13.4368 1.50126 9.99975 1.50026C6.56375 1.50126 3.42975 3.94426 1.56975 8.05226ZM10.0017 16.1053H9.99775H9.99675C5.86075 16.1023 2.14675 13.2033 0.06075 8.34826C-0.02025 8.15926 -0.02025 7.94526 0.06075 7.75626C2.14675 2.90226 5.86175 0.00326172 9.99675 0.000261719C9.99875 -0.000738281 9.99875 -0.000738281 9.99975 0.000261719C10.0017 -0.000738281 10.0017 -0.000738281 10.0028 0.000261719C14.1388 0.00326172 17.8527 2.90226 19.9387 7.75626C20.0208 7.94526 20.0208 8.15926 19.9387 8.34826C17.8537 13.2033 14.1388 16.1023 10.0028 16.1053H10.0017Z" fill="currentColor" />
                                                                    </g>
                                                                </svg>

                                                                <span class="tp-product-tooltip">Xem trước</span>
                                                            </button>
                                                            <!-- Phần sản phẩm yêu thích -->
                                                            <?php if (isset($_SESSION['wishlist']) && array_key_exists($item['product_id'], $_SESSION['wishlist'])) : ?>
                                                                <button style="background-color: palevioletred;" type="button" value="<?php echo $item['product_id'] ?>" onclick="delete_favourite(this)" class="tp-product-action-btn tp-product-add-to-wishlist-btn">
                                                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.78158 8.88867C3.15121 13.1386 8.5623 16.5749 10.0003 17.4255C11.4432 16.5662 16.8934 13.0918 18.219 8.89257C19.0894 6.17816 18.2815 2.73984 15.0714 1.70806C13.5162 1.21019 11.7021 1.5132 10.4497 2.4797C10.1879 2.68041 9.82446 2.68431 9.56069 2.48555C8.23405 1.49079 6.50102 1.19947 4.92136 1.70806C1.71613 2.73887 0.911158 6.17718 1.78158 8.88867ZM10.0013 19C9.88015 19 9.75999 18.9708 9.65058 18.9113C9.34481 18.7447 2.14207 14.7852 0.386569 9.33491C0.385592 9.33491 0.385592 9.33394 0.385592 9.33394C-0.71636 5.90244 0.510636 1.59018 4.47199 0.316764C6.33203 -0.283407 8.35911 -0.019371 9.99836 1.01242C11.5868 0.0108324 13.6969 -0.26587 15.5198 0.316764C19.4851 1.59213 20.716 5.90342 19.615 9.33394C17.9162 14.7218 10.6607 18.7408 10.353 18.9094C10.2436 18.9698 10.1224 19 10.0013 19Z" fill="currentColor" />
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.7806 7.42904C15.4025 7.42904 15.0821 7.13968 15.0508 6.75775C14.9864 5.95687 14.4491 5.2807 13.6841 5.03421C13.2983 4.9095 13.0873 4.49737 13.2113 4.11446C13.3373 3.73059 13.7467 3.52209 14.1335 3.6429C15.4651 4.07257 16.398 5.24855 16.5123 6.63888C16.5445 7.04127 16.2446 7.39397 15.8412 7.42612C15.8206 7.42807 15.8011 7.42904 15.7806 7.42904Z" fill="currentColor" />
                                                                    </svg>

                                                                    <span class="tp-product-tooltip">Yêu thích</span>
                                                                </button>
                                                            <?php else : ?>
                                                                <button type="button" value="<?php echo $item['product_id'] ?>" onclick="favourite(this)" class="tp-product-action-btn tp-product-add-to-wishlist-btn">
                                                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.78158 8.88867C3.15121 13.1386 8.5623 16.5749 10.0003 17.4255C11.4432 16.5662 16.8934 13.0918 18.219 8.89257C19.0894 6.17816 18.2815 2.73984 15.0714 1.70806C13.5162 1.21019 11.7021 1.5132 10.4497 2.4797C10.1879 2.68041 9.82446 2.68431 9.56069 2.48555C8.23405 1.49079 6.50102 1.19947 4.92136 1.70806C1.71613 2.73887 0.911158 6.17718 1.78158 8.88867ZM10.0013 19C9.88015 19 9.75999 18.9708 9.65058 18.9113C9.34481 18.7447 2.14207 14.7852 0.386569 9.33491C0.385592 9.33491 0.385592 9.33394 0.385592 9.33394C-0.71636 5.90244 0.510636 1.59018 4.47199 0.316764C6.33203 -0.283407 8.35911 -0.019371 9.99836 1.01242C11.5868 0.0108324 13.6969 -0.26587 15.5198 0.316764C19.4851 1.59213 20.716 5.90342 19.615 9.33394C17.9162 14.7218 10.6607 18.7408 10.353 18.9094C10.2436 18.9698 10.1224 19 10.0013 19Z" fill="currentColor" />
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.7806 7.42904C15.4025 7.42904 15.0821 7.13968 15.0508 6.75775C14.9864 5.95687 14.4491 5.2807 13.6841 5.03421C13.2983 4.9095 13.0873 4.49737 13.2113 4.11446C13.3373 3.73059 13.7467 3.52209 14.1335 3.6429C15.4651 4.07257 16.398 5.24855 16.5123 6.63888C16.5445 7.04127 16.2446 7.39397 15.8412 7.42612C15.8206 7.42807 15.8011 7.42904 15.7806 7.42904Z" fill="currentColor" />
                                                                    </svg>
                                                                    <span class="tp-product-tooltip">Yêu thích</span>
                                                                </button>
                                                            <?php endif; ?>
                                                            <!-- End phần sản phẩm yêu thích -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- product content -->
                                                <div class="tp-product-content">
                                                    <div class="tp-product-category">
                                                        <a href="<?php echo "san-pham/chi-tiet/" . create_slug($item['product_name']) . "/" . $item['product_id'] . ".html"; ?>"><?php echo $item['title'] ?></a>
                                                    </div>
                                                    <h3 class="tp-product-title">
                                                        <a href="<?php echo "san-pham/chi-tiet/" . create_slug($item['product_name']) . "/" . $item['product_id'] . ".html"; ?>">
                                                            <?php echo $item['product_name'] ?></a>
                                                    </h3>
                                                    <div class="tp-product-rating d-flex align-items-center">
                                                        <div class="tp-product-rating-icon">
                                                            <?php echo  str_repeat("<span><i class='fa-solid fa-star'></i></span>", product_reviews($item['product_id'])['star'])  ?>
                                                        </div>
                                                        <div class="tp-product-rating-text">
                                                            <span>(<?php echo product_reviews($item['product_id'])['count'] ?> Đánh giá)</span>
                                                        </div>
                                                    </div>
                                                    <div class="tp-product-price-wrapper">
                                                        <span class="tp-product-price new-price"><?php echo currency_format(min_price($item['product_id'])) ?></span> -
                                                        <span class="tp-product-price new-price"><?php echo currency_format(max_price($item['product_id'])) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="topsell-tab-pane" role="tabpanel" aria-labelledby="topsell-tab" tabindex="0">
                                <div class="row">
                                    <!-- Danh sách sản phẩm mới nhất  -->
                                    <?php foreach ($list_products_new as $item) : ?>
                                        <div class="col-xl-3 col-lg-3 col-sm-6">
                                            <div class="tp-product-item p-relative transition-3 mb-25">
                                                <div class="tp-product-thumb p-relative fix m-img">
                                                    <a href="<?php echo "san-pham/chi-tiet/" . create_slug($item['product_name']) . "/" . $item['product_id'] . ".html"; ?>">
                                                        <img src="admin/img/<?php echo $item['product_thumb'] ?>" alt="product-electronic">
                                                    </a>

                                                    <!-- product badge -->
                                                    <div class="tp-product-badge">
                                                        <span class="product-sale">New</span>
                                                    </div>
                                                    <!-- product action -->
                                                    <div class="tp-product-action">
                                                        <div class="tp-product-action-item d-flex flex-column">
                                                            <button type="button" value="<?php echo $item['product_id'] ?>" onclick="quickView(this)" class="tp-product-action-btn tp-product-quick-view-btn" data-bs-toggle="modal" data-bs-target="#producQuickViewModal">
                                                                <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.99938 5.64111C8.66938 5.64111 7.58838 6.72311 7.58838 8.05311C7.58838 9.38211 8.66938 10.4631 9.99938 10.4631C11.3294 10.4631 12.4114 9.38211 12.4114 8.05311C12.4114 6.72311 11.3294 5.64111 9.99938 5.64111ZM9.99938 11.9631C7.84238 11.9631 6.08838 10.2091 6.08838 8.05311C6.08838 5.89611 7.84238 4.14111 9.99938 4.14111C12.1564 4.14111 13.9114 5.89611 13.9114 8.05311C13.9114 10.2091 12.1564 11.9631 9.99938 11.9631Z" fill="currentColor" />
                                                                    <g mask="url(#mask0_1211_721)">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.56975 8.05226C3.42975 12.1613 6.56275 14.6043 9.99975 14.6053C13.4368 14.6043 16.5697 12.1613 18.4298 8.05226C16.5697 3.94426 13.4368 1.50126 9.99975 1.50026C6.56375 1.50126 3.42975 3.94426 1.56975 8.05226ZM10.0017 16.1053H9.99775H9.99675C5.86075 16.1023 2.14675 13.2033 0.06075 8.34826C-0.02025 8.15926 -0.02025 7.94526 0.06075 7.75626C2.14675 2.90226 5.86175 0.00326172 9.99675 0.000261719C9.99875 -0.000738281 9.99875 -0.000738281 9.99975 0.000261719C10.0017 -0.000738281 10.0017 -0.000738281 10.0028 0.000261719C14.1388 0.00326172 17.8527 2.90226 19.9387 7.75626C20.0208 7.94526 20.0208 8.15926 19.9387 8.34826C17.8537 13.2033 14.1388 16.1023 10.0028 16.1053H10.0017Z" fill="currentColor" />
                                                                    </g>
                                                                </svg>

                                                                <span class="tp-product-tooltip">Xem trước</span>
                                                            </button>
                                                            <!-- Phần sản phẩm yêu thích -->
                                                            <?php if (isset($_SESSION['wishlist']) && array_key_exists($item['product_id'], $_SESSION['wishlist'])) : ?>
                                                                <button style="background-color: palevioletred;" type="button" value="<?php echo $item['product_id'] ?>" onclick="delete_favourite(this)" class="tp-product-action-btn tp-product-add-to-wishlist-btn">
                                                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.78158 8.88867C3.15121 13.1386 8.5623 16.5749 10.0003 17.4255C11.4432 16.5662 16.8934 13.0918 18.219 8.89257C19.0894 6.17816 18.2815 2.73984 15.0714 1.70806C13.5162 1.21019 11.7021 1.5132 10.4497 2.4797C10.1879 2.68041 9.82446 2.68431 9.56069 2.48555C8.23405 1.49079 6.50102 1.19947 4.92136 1.70806C1.71613 2.73887 0.911158 6.17718 1.78158 8.88867ZM10.0013 19C9.88015 19 9.75999 18.9708 9.65058 18.9113C9.34481 18.7447 2.14207 14.7852 0.386569 9.33491C0.385592 9.33491 0.385592 9.33394 0.385592 9.33394C-0.71636 5.90244 0.510636 1.59018 4.47199 0.316764C6.33203 -0.283407 8.35911 -0.019371 9.99836 1.01242C11.5868 0.0108324 13.6969 -0.26587 15.5198 0.316764C19.4851 1.59213 20.716 5.90342 19.615 9.33394C17.9162 14.7218 10.6607 18.7408 10.353 18.9094C10.2436 18.9698 10.1224 19 10.0013 19Z" fill="currentColor" />
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.7806 7.42904C15.4025 7.42904 15.0821 7.13968 15.0508 6.75775C14.9864 5.95687 14.4491 5.2807 13.6841 5.03421C13.2983 4.9095 13.0873 4.49737 13.2113 4.11446C13.3373 3.73059 13.7467 3.52209 14.1335 3.6429C15.4651 4.07257 16.398 5.24855 16.5123 6.63888C16.5445 7.04127 16.2446 7.39397 15.8412 7.42612C15.8206 7.42807 15.8011 7.42904 15.7806 7.42904Z" fill="currentColor" />
                                                                    </svg>

                                                                    <span class="tp-product-tooltip">Yêu thích</span>
                                                                </button>
                                                            <?php else : ?>
                                                                <button type="button" value="<?php echo $item['product_id'] ?>" onclick="favourite(this)" class="tp-product-action-btn tp-product-add-to-wishlist-btn">
                                                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.78158 8.88867C3.15121 13.1386 8.5623 16.5749 10.0003 17.4255C11.4432 16.5662 16.8934 13.0918 18.219 8.89257C19.0894 6.17816 18.2815 2.73984 15.0714 1.70806C13.5162 1.21019 11.7021 1.5132 10.4497 2.4797C10.1879 2.68041 9.82446 2.68431 9.56069 2.48555C8.23405 1.49079 6.50102 1.19947 4.92136 1.70806C1.71613 2.73887 0.911158 6.17718 1.78158 8.88867ZM10.0013 19C9.88015 19 9.75999 18.9708 9.65058 18.9113C9.34481 18.7447 2.14207 14.7852 0.386569 9.33491C0.385592 9.33491 0.385592 9.33394 0.385592 9.33394C-0.71636 5.90244 0.510636 1.59018 4.47199 0.316764C6.33203 -0.283407 8.35911 -0.019371 9.99836 1.01242C11.5868 0.0108324 13.6969 -0.26587 15.5198 0.316764C19.4851 1.59213 20.716 5.90342 19.615 9.33394C17.9162 14.7218 10.6607 18.7408 10.353 18.9094C10.2436 18.9698 10.1224 19 10.0013 19Z" fill="currentColor" />
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.7806 7.42904C15.4025 7.42904 15.0821 7.13968 15.0508 6.75775C14.9864 5.95687 14.4491 5.2807 13.6841 5.03421C13.2983 4.9095 13.0873 4.49737 13.2113 4.11446C13.3373 3.73059 13.7467 3.52209 14.1335 3.6429C15.4651 4.07257 16.398 5.24855 16.5123 6.63888C16.5445 7.04127 16.2446 7.39397 15.8412 7.42612C15.8206 7.42807 15.8011 7.42904 15.7806 7.42904Z" fill="currentColor" />
                                                                    </svg>
                                                                    <span class="tp-product-tooltip">Yêu thích</span>
                                                                </button>
                                                            <?php endif; ?>
                                                            <!-- End phần sản phẩm yêu thích -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- product content -->
                                                <div class="tp-product-content">
                                                    <div class="tp-product-category">
                                                        <a href="<?php echo "san-pham/chi-tiet/" . create_slug($item['product_name']) . "/" . $item['product_id'] . ".html"; ?>"><?php echo $item['title'] ?></a>
                                                    </div>
                                                    <h3 class="tp-product-title">
                                                        <a href="<?php echo "san-pham/chi-tiet/" . create_slug($item['product_name']) . "/" . $item['product_id'] . ".html"; ?>">
                                                            <?php echo $item['product_name'] ?></a>
                                                    </h3>
                                                    <div class="tp-product-rating d-flex align-items-center">
                                                        <div class="tp-product-rating-icon">
                                                            <?php echo  str_repeat("<span><i class='fa-solid fa-star'></i></span>", product_reviews($item['product_id'])['star'])  ?>
                                                        </div>
                                                        <div class="tp-product-rating-text">
                                                            <span>(<?php echo product_reviews($item['product_id'])['count'] ?> Đánh giá)</span>
                                                        </div>
                                                    </div>
                                                    <div class="tp-product-price-wrapper">
                                                        <span class="tp-product-price new-price"><?php echo currency_format(min_price($item['product_id'])) ?></span> -
                                                        <span class="tp-product-price new-price"><?php echo currency_format(max_price($item['product_id'])) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- product area end -->
    <!-- banner area start -->
    <?php if (isset($homepageAds1)) : ?>
        <section class="tp-banner-area pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-7">
                        <div class="tp-banner-item tp-banner-height p-relative mb-30 z-index-1 fix">
                            <div class="tp-banner-thumb include-bg transition-3" data-background="admin/img/<?php echo $homepageAds1['ads_img'] ?>"></div>
                            <div class="tp-banner-content">
                                <h3 class="tp-banner-title">
                                    <?php echo $homepageAds1['ads_content']  ?>
                                </h3>
                                <div class="tp-banner-btn">
                                    <a href="<?php echo $homepageAds1['link'] ?>" class="tp-link-btn">Xem thêm
                                        <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.9998 6.19656L1 6.19656" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M8.75674 0.975394L14 6.19613L8.75674 11.4177" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- banner area end -->

    <!-- product offer area start -->
    <section class="tp-product-offer grey-bg-2 pt-70 pb-80">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-xl-4 col-md-5 col-sm-6">
                    <div class="tp-section-title-wrapper mb-40">
                        <h3 class="tp-section-title">Sản Phẩm Bán Chạy</h3>
                    </div>
                </div>
                <div class="col-xl-8 col-md-7 col-sm-6">
                    <div class="tp-product-offer-more-wrapper d-flex justify-content-sm-end p-relative z-index-1">
                        <div class="tp-product-offer-more mb-40 text-sm-end grey-bg-2">
                            <a href="san-pham.html" class="tp-btn tp-btn-2 tp-btn-blue">Danh sách sản phẩm
                                <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 6.99976L1 6.99976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M9.9502 0.975414L16.0002 6.99941L9.9502 13.0244" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                            <span class="tp-product-offer-more-border"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-product-offer-slider fix">
                        <div class="tp-product-offer-slider-active swiper-container">
                            <div class="swiper-wrapper">

                                <?php if (!empty($list_products_by_sales)) :
                                    foreach ($list_products_by_sales as $item) :
                                ?>
                                        <div class="tp-product-offer-item tp-product-item transition-3 swiper-slide">
                                            <div class="tp-product-thumb p-relative fix m-img">
                                                <a href="<?php echo "san-pham/chi-tiet/" . create_slug($item['product_name']) . "/" . $item['product_id'] . ".html"; ?>">
                                                    <img src="admin/img/<?php echo $item['product_thumb'] ?>" alt="product-electronic">
                                                </a>
                                                <!-- product action -->
                                                <div class="tp-product-action">
                                                    <div class="tp-product-action-item d-flex flex-column">
                                                        <button type="button" value="<?php echo $item['product_id'] ?>" onclick="quickView(this)" class="tp-product-action-btn tp-product-quick-view-btn" data-bs-toggle="modal" data-bs-target="#producQuickViewModal">
                                                            <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.99938 5.64111C8.66938 5.64111 7.58838 6.72311 7.58838 8.05311C7.58838 9.38211 8.66938 10.4631 9.99938 10.4631C11.3294 10.4631 12.4114 9.38211 12.4114 8.05311C12.4114 6.72311 11.3294 5.64111 9.99938 5.64111ZM9.99938 11.9631C7.84238 11.9631 6.08838 10.2091 6.08838 8.05311C6.08838 5.89611 7.84238 4.14111 9.99938 4.14111C12.1564 4.14111 13.9114 5.89611 13.9114 8.05311C13.9114 10.2091 12.1564 11.9631 9.99938 11.9631Z" fill="currentColor" />
                                                                <g mask="url(#mask0_1211_721)">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.56975 8.05226C3.42975 12.1613 6.56275 14.6043 9.99975 14.6053C13.4368 14.6043 16.5697 12.1613 18.4298 8.05226C16.5697 3.94426 13.4368 1.50126 9.99975 1.50026C6.56375 1.50126 3.42975 3.94426 1.56975 8.05226ZM10.0017 16.1053H9.99775H9.99675C5.86075 16.1023 2.14675 13.2033 0.06075 8.34826C-0.02025 8.15926 -0.02025 7.94526 0.06075 7.75626C2.14675 2.90226 5.86175 0.00326172 9.99675 0.000261719C9.99875 -0.000738281 9.99875 -0.000738281 9.99975 0.000261719C10.0017 -0.000738281 10.0017 -0.000738281 10.0028 0.000261719C14.1388 0.00326172 17.8527 2.90226 19.9387 7.75626C20.0208 7.94526 20.0208 8.15926 19.9387 8.34826C17.8537 13.2033 14.1388 16.1023 10.0028 16.1053H10.0017Z" fill="currentColor" />
                                                                </g>
                                                            </svg>
                                                            <span class="tp-product-tooltip">Xem trước</span>
                                                        </button>
                                                        <!-- Phần sản phẩm yêu thích -->
                                                        <?php if (isset($_SESSION['wishlist']) && array_key_exists($item['product_id'], $_SESSION['wishlist'])) : ?>
                                                            <button style="background-color: palevioletred;" type="button" value="<?php echo $item['product_id'] ?>" onclick="delete_favourite(this)" class="tp-product-action-btn tp-product-add-to-wishlist-btn">
                                                                <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.78158 8.88867C3.15121 13.1386 8.5623 16.5749 10.0003 17.4255C11.4432 16.5662 16.8934 13.0918 18.219 8.89257C19.0894 6.17816 18.2815 2.73984 15.0714 1.70806C13.5162 1.21019 11.7021 1.5132 10.4497 2.4797C10.1879 2.68041 9.82446 2.68431 9.56069 2.48555C8.23405 1.49079 6.50102 1.19947 4.92136 1.70806C1.71613 2.73887 0.911158 6.17718 1.78158 8.88867ZM10.0013 19C9.88015 19 9.75999 18.9708 9.65058 18.9113C9.34481 18.7447 2.14207 14.7852 0.386569 9.33491C0.385592 9.33491 0.385592 9.33394 0.385592 9.33394C-0.71636 5.90244 0.510636 1.59018 4.47199 0.316764C6.33203 -0.283407 8.35911 -0.019371 9.99836 1.01242C11.5868 0.0108324 13.6969 -0.26587 15.5198 0.316764C19.4851 1.59213 20.716 5.90342 19.615 9.33394C17.9162 14.7218 10.6607 18.7408 10.353 18.9094C10.2436 18.9698 10.1224 19 10.0013 19Z" fill="currentColor" />
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.7806 7.42904C15.4025 7.42904 15.0821 7.13968 15.0508 6.75775C14.9864 5.95687 14.4491 5.2807 13.6841 5.03421C13.2983 4.9095 13.0873 4.49737 13.2113 4.11446C13.3373 3.73059 13.7467 3.52209 14.1335 3.6429C15.4651 4.07257 16.398 5.24855 16.5123 6.63888C16.5445 7.04127 16.2446 7.39397 15.8412 7.42612C15.8206 7.42807 15.8011 7.42904 15.7806 7.42904Z" fill="currentColor" />
                                                                </svg>

                                                                <span class="tp-product-tooltip">Yêu thích</span>
                                                            </button>
                                                        <?php else : ?>
                                                            <button type="button" value="<?php echo $item['product_id'] ?>" onclick="favourite(this)" class="tp-product-action-btn tp-product-add-to-wishlist-btn">
                                                                <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.78158 8.88867C3.15121 13.1386 8.5623 16.5749 10.0003 17.4255C11.4432 16.5662 16.8934 13.0918 18.219 8.89257C19.0894 6.17816 18.2815 2.73984 15.0714 1.70806C13.5162 1.21019 11.7021 1.5132 10.4497 2.4797C10.1879 2.68041 9.82446 2.68431 9.56069 2.48555C8.23405 1.49079 6.50102 1.19947 4.92136 1.70806C1.71613 2.73887 0.911158 6.17718 1.78158 8.88867ZM10.0013 19C9.88015 19 9.75999 18.9708 9.65058 18.9113C9.34481 18.7447 2.14207 14.7852 0.386569 9.33491C0.385592 9.33491 0.385592 9.33394 0.385592 9.33394C-0.71636 5.90244 0.510636 1.59018 4.47199 0.316764C6.33203 -0.283407 8.35911 -0.019371 9.99836 1.01242C11.5868 0.0108324 13.6969 -0.26587 15.5198 0.316764C19.4851 1.59213 20.716 5.90342 19.615 9.33394C17.9162 14.7218 10.6607 18.7408 10.353 18.9094C10.2436 18.9698 10.1224 19 10.0013 19Z" fill="currentColor" />
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.7806 7.42904C15.4025 7.42904 15.0821 7.13968 15.0508 6.75775C14.9864 5.95687 14.4491 5.2807 13.6841 5.03421C13.2983 4.9095 13.0873 4.49737 13.2113 4.11446C13.3373 3.73059 13.7467 3.52209 14.1335 3.6429C15.4651 4.07257 16.398 5.24855 16.5123 6.63888C16.5445 7.04127 16.2446 7.39397 15.8412 7.42612C15.8206 7.42807 15.8011 7.42904 15.7806 7.42904Z" fill="currentColor" />
                                                                </svg>
                                                                <span class="tp-product-tooltip">Yêu thích</span>
                                                            </button>
                                                        <?php endif; ?>
                                                        <!-- End phần sản phẩm yêu thích -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- product content -->
                                            <div class="tp-product-content">
                                                <div class="tp-product-category">
                                                    <a href="<?php echo "san-pham/chi-tiet/" . create_slug($item['product_name']) . "/" . $item['product_id'] . ".html"; ?>"><?php echo $item['title'] ?></a>
                                                </div>
                                                <h3 class="tp-product-title">
                                                    <a href="<?php echo "san-pham/chi-tiet/" . create_slug($item['product_name']) . "/" . $item['product_id'] . ".html"; ?>">
                                                        <?php echo $item['product_name'] ?>
                                                    </a>
                                                </h3>
                                                <div class="tp-product-rating d-flex align-items-center">
                                                    <div class="tp-product-rating-icon">
                                                        <?php echo  str_repeat("<span><i class='fa-solid fa-star'></i></span>", product_reviews($item['product_id'])['star'])  ?>
                                                    </div>
                                                    <div class="tp-product-rating-text">
                                                        <span>(<?php echo $item['sales'] ?> Lượt bán)</span>
                                                    </div>
                                                </div>
                                                <div class="tp-product-price-wrapper">
                                                    <span class="tp-product-price new-price"><?php echo currency_format(min_price($item['product_id'])) ?></span> -
                                                    <span class="tp-product-price new-price"><?php echo currency_format(max_price($item['product_id'])) ?></span>
                                                </div>
                                            </div>
                                        </div>
                                <?php endforeach;
                                endif; ?>
                            </div>
                            <div class="tp-deals-slider-dot tp-swiper-dot text-center mt-40"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product deal area end -->
    <!-- product banner area start -->
    <?php if (isset($homepageAds2)) : ?>
        <a href="<?php echo $homepageAds2['link'] ?>">
            <div class="tp-product-banner-area pb-90 mt-100">
                <div class="container">
                    <div class="tp-product-banner-slider fix">
                        <div class="tp-product-banner-slider-active swiper-container">

                            <div class="tp-product-banner-inner theme-bg p-relative z-index-1 fix swiper-slide">
                                <div class="row align-items-center">
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="tp-product-banner-content p-relative z-index-1">
                                            <h3 class="tp-product-banner-title"><?php echo $homepageAds2['ads_content'] ?></h3>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="tp-product-banner-thumb-wrapper p-relative">
                                            <div class="tp-product-banner-thumb-shape">
                                                <span class="tp-product-banner-thumb-gradient"></span>
                                                <img class="tp-offer-shape" src="admin/img/<?php echo $homepageAds2['ads_img'] ?>" alt="">
                                            </div>

                                            <div class="tp-product-banner-thumb text-end p-relative z-index-1">
                                                <img src="assets/img/banner/banner-slider-2.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tp-product-banner-slider-dot tp-swiper-dot"></div>
                    </div>
                </div>
            </div>
        </a>
    <?php endif; ?>
    </div>
    <!-- product banner area end -->

    <!-- product arrival area start -->
    <section class="tp-product-arrival-area pb-55">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-xl-5 col-sm-6">
                    <div class="tp-section-title-wrapper mb-40">
                        <h3 class="tp-section-title">Đồng hồ

                            <svg width="114" height="35" viewBox="0 0 114 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M112 23.275C1.84952 -10.6834 -7.36586 1.48086 7.50443 32.9053" stroke="currentColor" stroke-width="4" stroke-miterlimit="3.8637" stroke-linecap="round" />
                            </svg>
                        </h3>
                    </div>
                </div>
                <div class="col-xl-7 col-sm-6">
                    <div class="tp-product-arrival-more-wrapper d-flex justify-content-end">
                        <div class="tp-product-arrival-arrow tp-swiper-arrow mb-40 text-end tp-product-arrival-border">
                            <button type="button" class="tp-arrival-slider-button-prev">
                                <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7 13L1 7L7 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                            <button type="button" class="tp-arrival-slider-button-next">
                                <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 13L7 7L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (!empty($list_watch)) : ?>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="tp-product-arrival-slider fix">
                            <div class="tp-product-arrival-active swiper-container">
                                <div class="swiper-wrapper">
                                    <?php foreach ($list_watch as $item) : ?>
                                        <div class="tp-product-item transition-3 mb-25 swiper-slide">
                                            <div class="tp-product-thumb p-relative fix m-img">
                                                <a href="<?php echo "san-pham/chi-tiet/" . create_slug($item['product_name']) . "/" . $item['product_id'] . ".html"; ?>">
                                                    <img src="admin/img/<?php echo $item['product_thumb'] ?>" alt="product-electronic">
                                                </a>

                                                <!-- product badge -->
                                                <div class="tp-product-badge">
                                                    <span class="product-trending">Trending</span>
                                                </div>

                                                <!-- product action -->
                                                <div class="tp-product-action">
                                                    <div class="tp-product-action-item d-flex flex-column">
                                                        <button value="<?php echo $item['product_id'] ?>" onclick="quickView(this)" type="button" class="tp-product-action-btn tp-product-quick-view-btn" data-bs-toggle="modal" data-bs-target="#producQuickViewModal">
                                                            <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.99938 5.64111C8.66938 5.64111 7.58838 6.72311 7.58838 8.05311C7.58838 9.38211 8.66938 10.4631 9.99938 10.4631C11.3294 10.4631 12.4114 9.38211 12.4114 8.05311C12.4114 6.72311 11.3294 5.64111 9.99938 5.64111ZM9.99938 11.9631C7.84238 11.9631 6.08838 10.2091 6.08838 8.05311C6.08838 5.89611 7.84238 4.14111 9.99938 4.14111C12.1564 4.14111 13.9114 5.89611 13.9114 8.05311C13.9114 10.2091 12.1564 11.9631 9.99938 11.9631Z" fill="currentColor" />
                                                                <g mask="url(#mask0_1211_721)">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.56975 8.05226C3.42975 12.1613 6.56275 14.6043 9.99975 14.6053C13.4368 14.6043 16.5697 12.1613 18.4298 8.05226C16.5697 3.94426 13.4368 1.50126 9.99975 1.50026C6.56375 1.50126 3.42975 3.94426 1.56975 8.05226ZM10.0017 16.1053H9.99775H9.99675C5.86075 16.1023 2.14675 13.2033 0.06075 8.34826C-0.02025 8.15926 -0.02025 7.94526 0.06075 7.75626C2.14675 2.90226 5.86175 0.00326172 9.99675 0.000261719C9.99875 -0.000738281 9.99875 -0.000738281 9.99975 0.000261719C10.0017 -0.000738281 10.0017 -0.000738281 10.0028 0.000261719C14.1388 0.00326172 17.8527 2.90226 19.9387 7.75626C20.0208 7.94526 20.0208 8.15926 19.9387 8.34826C17.8537 13.2033 14.1388 16.1023 10.0028 16.1053H10.0017Z" fill="currentColor" />
                                                                </g>
                                                            </svg>

                                                            <span class="tp-product-tooltip">Xem trước</span>
                                                        </button>
                                                        <?php if (isset($_SESSION['wishlist']) && array_key_exists($item['product_id'], $_SESSION['wishlist'])) : ?>
                                                            <button style="background-color: palevioletred;" value="<?php echo $item['product_id'] ?>" onclick="delete_favourite(this)" type="button" class="tp-product-action-btn tp-product-add-to-wishlist-btn">
                                                                <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.78158 8.88867C3.15121 13.1386 8.5623 16.5749 10.0003 17.4255C11.4432 16.5662 16.8934 13.0918 18.219 8.89257C19.0894 6.17816 18.2815 2.73984 15.0714 1.70806C13.5162 1.21019 11.7021 1.5132 10.4497 2.4797C10.1879 2.68041 9.82446 2.68431 9.56069 2.48555C8.23405 1.49079 6.50102 1.19947 4.92136 1.70806C1.71613 2.73887 0.911158 6.17718 1.78158 8.88867ZM10.0013 19C9.88015 19 9.75999 18.9708 9.65058 18.9113C9.34481 18.7447 2.14207 14.7852 0.386569 9.33491C0.385592 9.33491 0.385592 9.33394 0.385592 9.33394C-0.71636 5.90244 0.510636 1.59018 4.47199 0.316764C6.33203 -0.283407 8.35911 -0.019371 9.99836 1.01242C11.5868 0.0108324 13.6969 -0.26587 15.5198 0.316764C19.4851 1.59213 20.716 5.90342 19.615 9.33394C17.9162 14.7218 10.6607 18.7408 10.353 18.9094C10.2436 18.9698 10.1224 19 10.0013 19Z" fill="currentColor" />
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.7806 7.42904C15.4025 7.42904 15.0821 7.13968 15.0508 6.75775C14.9864 5.95687 14.4491 5.2807 13.6841 5.03421C13.2983 4.9095 13.0873 4.49737 13.2113 4.11446C13.3373 3.73059 13.7467 3.52209 14.1335 3.6429C15.4651 4.07257 16.398 5.24855 16.5123 6.63888C16.5445 7.04127 16.2446 7.39397 15.8412 7.42612C15.8206 7.42807 15.8011 7.42904 15.7806 7.42904Z" fill="currentColor" />
                                                                </svg>

                                                                <span class="tp-product-tooltip">Yêu thích</span>
                                                            </button>
                                                        <?php else : ?>
                                                            <button value="<?php echo $item['product_id'] ?>" onclick="favourite(this)" type="button" class="tp-product-action-btn tp-product-add-to-wishlist-btn">
                                                                <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.78158 8.88867C3.15121 13.1386 8.5623 16.5749 10.0003 17.4255C11.4432 16.5662 16.8934 13.0918 18.219 8.89257C19.0894 6.17816 18.2815 2.73984 15.0714 1.70806C13.5162 1.21019 11.7021 1.5132 10.4497 2.4797C10.1879 2.68041 9.82446 2.68431 9.56069 2.48555C8.23405 1.49079 6.50102 1.19947 4.92136 1.70806C1.71613 2.73887 0.911158 6.17718 1.78158 8.88867ZM10.0013 19C9.88015 19 9.75999 18.9708 9.65058 18.9113C9.34481 18.7447 2.14207 14.7852 0.386569 9.33491C0.385592 9.33491 0.385592 9.33394 0.385592 9.33394C-0.71636 5.90244 0.510636 1.59018 4.47199 0.316764C6.33203 -0.283407 8.35911 -0.019371 9.99836 1.01242C11.5868 0.0108324 13.6969 -0.26587 15.5198 0.316764C19.4851 1.59213 20.716 5.90342 19.615 9.33394C17.9162 14.7218 10.6607 18.7408 10.353 18.9094C10.2436 18.9698 10.1224 19 10.0013 19Z" fill="currentColor" />
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.7806 7.42904C15.4025 7.42904 15.0821 7.13968 15.0508 6.75775C14.9864 5.95687 14.4491 5.2807 13.6841 5.03421C13.2983 4.9095 13.0873 4.49737 13.2113 4.11446C13.3373 3.73059 13.7467 3.52209 14.1335 3.6429C15.4651 4.07257 16.398 5.24855 16.5123 6.63888C16.5445 7.04127 16.2446 7.39397 15.8412 7.42612C15.8206 7.42807 15.8011 7.42904 15.7806 7.42904Z" fill="currentColor" />
                                                                </svg>

                                                                <span class="tp-product-tooltip">Yêu thích</span>
                                                            </button>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- product content -->
                                            <div class="tp-product-content">
                                                <div class="tp-product-category">
                                                    <a href="<?php echo "san-pham/chi-tiet/" . create_slug($item['product_name']) . "/" . $item['product_id'] . ".html"; ?>"><?php echo $item['title'] ?></a>
                                                </div>
                                                <h3 class="tp-product-title">
                                                    <a href="<?php echo "san-pham/chi-tiet/" . create_slug($item['product_name']) . "/" . $item['product_id'] . ".html"; ?>">
                                                        <?php echo $item['product_name'] ?>
                                                    </a>
                                                </h3>
                                                <div class="tp-product-rating d-flex align-items-center">
                                                    <div class="tp-product-rating-icon">
                                                        <?php echo  str_repeat("<span><i class='fa-solid fa-star'></i></span>", product_reviews($item['product_id'])['star'])  ?>
                                                    </div>
                                                    <div class="tp-product-rating-text">
                                                        <span>(<?php echo $item['sales'] ?> Lượt bán)</span>
                                                    </div>
                                                </div>
                                                <div class="tp-product-price-wrapper">
                                                    <span class="tp-product-price new-price"><?php echo currency_format(min_price($item['product_id'])) ?></span> -
                                                    <span class="tp-product-price new-price"><?php echo currency_format(max_price($item['product_id'])) ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <!-- product arrival area end -->

    <!-- instagram area start -->
    <div class="tp-instagram-area pb-70">
        <div class="container">
            <div class="row row-cols-lg-5 row-cols-md-3 row-cols-sm-2 row-cols-1">
                <div class="col">
                    <div class="tp-instagram-item p-relative z-index-1 fix mb-30 w-img">
                        <img src="assets/img/instagram/instagram-1.jpg" alt="">
                        <div class="tp-instagram-icon">
                            <a href="assets/img/instagram/instagram-1.jpg" class="popup-image"><i class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="tp-instagram-item p-relative z-index-1 fix mb-30 w-img">
                        <img src="assets/img/instagram/instagram-2.jpg" alt="">
                        <div class="tp-instagram-icon">
                            <a href="assets/img/instagram/instagram-2.jpg" class="popup-image"><i class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="tp-instagram-item p-relative z-index-1 fix mb-30 w-img">
                        <img src="assets/img/instagram/instagram-3.jpg" alt="">
                        <div class="tp-instagram-icon">
                            <a href="assets/img/instagram/instagram-3.jpg" class="popup-image"><i class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="tp-instagram-item p-relative z-index-1 fix mb-30 w-img">
                        <img src="assets/img/instagram/instagram-4.jpg" alt="">
                        <div class="tp-instagram-icon">
                            <a href="assets/img/instagram/instagram-4.jpg" class="popup-image"><i class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="tp-instagram-item p-relative z-index-1 fix mb-30 w-img">
                        <img src="assets/img/instagram/instagram-5.jpg" alt="">
                        <div class="tp-instagram-icon">
                            <a href="assets/img/instagram/instagram-5.jpg" class="popup-image"><i class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- instagram area end -->

    <!-- subscribe area start -->
    <section class="tp-subscribe-area pt-70 pb-65 theme-bg p-relative z-index-1">
        <div class="tp-subscribe-shape">
            <img class="tp-subscribe-shape-1" src="assets/img/subscribe/subscribe-shape-1.png" alt="">
            <img class="tp-subscribe-shape-2" src="assets/img/subscribe/subscribe-shape-2.png" alt="">
            <img class="tp-subscribe-shape-3" src="assets/img/subscribe/subscribe-shape-3.png" alt="">
            <img class="tp-subscribe-shape-4" src="assets/img/subscribe/subscribe-shape-4.png" alt="">
            <!-- plane shape -->
            <div class="tp-subscribe-plane">
                <img class="tp-subscribe-plane-shape" src="assets/img/subscribe/plane.png" alt="">
                <svg width="399" height="110" class="d-none d-sm-block" viewBox="0 0 399 110" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.499634 1.00049C8.5 20.0005 54.2733 13.6435 60.5 40.0005C65.6128 61.6426 26.4546 130.331 15 90.0005C-9 5.5 176.5 127.5 218.5 106.5C301.051 65.2247 202 -57.9188 344.5 40.0003C364 53.3997 384 22 399 22" stroke="white" stroke-opacity="0.5" stroke-dasharray="3 3" />
                </svg>
                <svg class="d-sm-none" width="193" height="110" viewBox="0 0 193 110" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1C4.85463 20.0046 26.9085 13.6461 29.9086 40.0095C32.372 61.6569 13.5053 130.362 7.98637 90.0217C-3.57698 5.50061 85.7981 127.53 106.034 106.525C145.807 65.2398 98.0842 -57.9337 166.742 40.0093C176.137 53.412 185.773 22.0046 193 22.0046" stroke="white" stroke-opacity="0.5" stroke-dasharray="3 3" />
                </svg>
            </div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-7">
                    <div class="tp-subscribe-content">
                        <span>GIẢM GIÁ 20% TẤT CẢ CÁC CỬA HÀNG</span>
                        <h3 class="tp-subscribe-title">Đăng ký nhận bản tin của chúng tôi những Voucher khuyễn mãi</h3>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="tp-subscribe-form">
                        <form action="">
                            <div class="tp-subscribe-input">
                                <input type="email" id="email" placeholder="Email của bạn">
                                <button onclick="send_mail()" type="button">Đăng ký</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subscribe area end -->

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