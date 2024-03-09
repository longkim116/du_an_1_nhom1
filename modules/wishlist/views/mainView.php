<?php
get_header();
?>

<main>

    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg pt-95 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title">Danh sách yêu thích</h3>
                        <div class="breadcrumb__list">
                            <span><a href="trang-chu.html">Trang chủ</a></span>
                            <span>Danh sách yêu thích</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- cart area start -->
    <section class="tp-cart-area pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-cart-list mb-45 mr-30">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="tp-cart-header-product" style="width: 15%;">Sản phẩm</th>
                                    <th style="width: 20%;">Tên sản phẩm</th>
                                    <th class="tp-cart-header-price" style="width: 20%;">Giá</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="list_wishlist">
                                <?php if (!empty($_SESSION['wishlist'])) :
                                    foreach ($_SESSION['wishlist'] as $item) :
                                ?>
                                        <tr>
                                            <td class="tp-cart-img"><a href="<?php echo "san-pham/chi-tiet/" . create_slug($item['product_name']) . "/" . $item['product_id'] . ".html"; ?>"><img src="admin/img/<?php echo $item['product_thumb'] ?>" alt=""></a></td>
                                            <td class="tp-cart-title"><a href="<?php echo "san-pham/chi-tiet/" . create_slug($item['product_name']) . "/" . $item['product_id'] . ".html"; ?>"><?php echo $item['product_name'] ?></a></td>
                                            <td class="tp-cart-price"><span><?php echo currency_format(min_price($item['product_id'])) ?>-
                                                    <?php echo currency_format(max_price($item['product_id'])) ?>
                                                </span></td>
                                            <td class="tp-cart-add-to-cart">
                                                <a type="submit" href="<?php echo "san-pham/chi-tiet/" . create_slug($item['product_name']) . "/" . $item['product_id'] . ".html"; ?>" class="tp-btn tp-btn-2 tp-btn-blue">Xem chi tiết sản phẩm</a>
                                            </td>
                                            <td class="tp-cart-action">
                                                <button product_id="<?php echo $item['product_id'] ?>" onclick="delete_wishlist(this)" class="tp-cart-action-btn">
                                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.53033 1.53033C9.82322 1.23744 9.82322 0.762563 9.53033 0.46967C9.23744 0.176777 8.76256 0.176777 8.46967 0.46967L5 3.93934L1.53033 0.46967C1.23744 0.176777 0.762563 0.176777 0.46967 0.46967C0.176777 0.762563 0.176777 1.23744 0.46967 1.53033L3.93934 5L0.46967 8.46967C0.176777 8.76256 0.176777 9.23744 0.46967 9.53033C0.762563 9.82322 1.23744 9.82322 1.53033 9.53033L5 6.06066L8.46967 9.53033C8.76256 9.82322 9.23744 9.82322 9.53033 9.53033C9.82322 9.23744 9.82322 8.76256 9.53033 8.46967L6.06066 5L9.53033 1.53033Z" fill="currentColor" />
                                                    </svg>
                                                    <span>Remove</span>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach;
                                else : ?>
                                    <td colspan="4" class="tp-cart-add-to-cart text-center">
                                        Không có sản phẩm yêu thích nào
                                    </td>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tp-cart-bottom">
                        <div class="row align-items-end">
                            <div class="col-xl-6 col-md-4">
                                <div class="tp-cart-update">
                                    <a href="gio-hang.html" class="tp-cart-update-btn">Đi đến giỏ hàng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cart area end -->

</main>
<?php
get_footer();
?>