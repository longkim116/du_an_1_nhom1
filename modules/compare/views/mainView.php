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
                        <h3 class="breadcrumb__title">So sánh</h3>
                        <div class="breadcrumb__list">
                            <span><a href="trang-chu.html">Trang chủ</a></span>
                            <span>So sánh</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->
    <!-- compare area start -->
    <section class="tp-compare-area pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-compare-table table-responsive text-center">
                        <table class="table">
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Miêu tả</th>
                                <th>Giá</th>
                                <th>Giỏ hàng</th>
                                <th>Đánh giá</th>
                                <th>Xóa</th>
                            </tr>
                            <tbody id="list_compare">
                                <?php if (!empty($_SESSION['compare'])) :
                                    foreach ($_SESSION['compare'] as $item) :
                                ?>
                                        <tr>
                                            <td>
                                                <div class="tp-compare-thumb">
                                                    <img src="admin/img/<?php echo $item['product_thumb'] ?>" alt="">
                                                    <h4 class="tp-compare-product-title">
                                                        <a href="<?php echo "san-pham/chi-tiet/" . create_slug($item['product_name']) . "/" . $item['product_id'] . ".html"; ?>"><?php echo $item['product_name'] ?>.</a>
                                                    </h4>
                                                </div>
                                            </td>
                                            <td style="text-align: left;">
                                                <p><?php echo $item['product_desc'] ?></p>
                                            </td>
                                            <td>
                                                <div class="tp-compare-price">
                                                    <span><?php echo currency_format($item['price']) ?></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="tp-compare-add-to-cart">
                                                    <button color_id="<?php echo $item['color_id'] ?>" onclick="add_cart_compare(this)" type="button" class="tp-btn">Thêm vào giỏ hàng</button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="tp-compare-rating">
                                                    <?php echo str_repeat("<span><i class='fas fa-star'></i></span>", product_reviews($item['product_id'])['star'])  ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="tp-compare-remove">
                                                    <button type="button" color_id="<?php echo $item['color_id'] ?>" onclick="delete_compare(this)"><i class="fal fa-trash-alt"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;
                                else : ?>
                                    <tr>
                                        <td colspan="6">Không có sản phẩm so sánh</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <script>
                            function add_cart_compare(_this) { //Thêm vào giỏ hàng trang so sánh 
                                var color_id = $(_this).attr('color_id');
                                var data = {
                                    color_id: color_id,
                                }
                                console.log(color_id);
                                $.ajax({
                                    url: '?mod=compare&action=add_cart_compare_ajax',
                                    method: 'POST',
                                    data: data,
                                    dataType: 'json',
                                    success: function(data) {
                                        console.log(data);
                                        if (data.status == 'success') {
                                            $("#menu_total_cart").html(data.count_cart);
                                            $("#menu_total_cart_sm").html(data.count_cart);
                                            $("#list_add_cart").html(data.list_cart);
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Thêm vào giỏ hàng thành công',
                                                showConfirmButton: false,
                                                timer: 2000
                                            });
                                        } else {
                                            Swal.fire({
                                                icon: 'error',
                                                title: "Không thể thêm vào giỏ hàng",
                                                text: "Sản phẩm không còn hàng!",
                                                showConfirmButton: false,
                                                timer: 1000 // Tự động đóng sau 2 giây
                                            });
                                        }
                                    }
                                });
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- compare area end -->
</main>
<?php
get_footer();
?>