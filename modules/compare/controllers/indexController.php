<?php
function construct()
{
    load_module("index");
}
function indexAction()
{
}

function mainAction()
{
    load_view("main");
}

function add_compare_ajaxAction() //Thêm sản phẩm yêu thích
{
    $color_id = $_POST['color_id'];
    $max = (isset($_SESSION['compare'])) ? count($_SESSION['compare']) : 0;
    if ($max < 4) {
        $product = get_product_by_color_id($color_id); //Lấy chi tiết sản phẩm bằng id color
        $promotion = get_product_promotion($product['product_id']);
        if (!$promotion) {
            $promotion = 0;
        }
        $qty = 1; //Số lượng
        $_SESSION['compare'][$color_id] = [
            'product_id' => $product['product_id'],
            'ram_id' => $product['ram_id'],
            'color_id' => $color_id,
            'product_code' => $product['product_code'],
            'product_desc' => $product['product_desc'],
            'product_name' => $product['product_name'] . " " . $product['ram_name'] . " " . $product['color_name'],
            'price' => $product['color_price'] - ($product['color_price'] * ($promotion / 100)),
            'product_thumb' => $product['image'],
            'qty' => $qty,
            'sub_total' => ($product['color_price'] - ($product['color_price'] * ($promotion / 100))) * $qty,
        ];
        $count = count($_SESSION['compare']);
        $result = [
            'status' => 'success',
            'count' => $count,
        ];
    } else {
        $result = [
            'status' => 'error',
        ];
    }
    //Kết luận
    echo json_encode($result);
}
function delete_compare_ajaxAction() //Xóa sản phẩm yêu thích trong trang yêu thích
{
    $color_id = $_POST['color_id'];
    unset($_SESSION['compare'][$color_id]);
    if (!empty($_SESSION['compare'])) {
        $count = count($_SESSION['compare']);
        $string = "";
        foreach ($_SESSION['compare'] as $item) {
            $string .= "<tr>" .
                "<td>" .
                "<div class='tp-compare-thumb'>" .
                "<img src='admin/img/" . $item['product_thumb'] . "' alt=''>" .
                "<h4 class='tp-compare-product-title'>" .
                "<a href='san-pham/chi-tiet/" . create_slug($item['product_name']) . "/" . $item['product_id'] . ".html'>" . $item['product_name'] . ".</a>" .
                "</h4>" .
                "</div>" .
                "</td>" .
                "<td style='text-align: left;'>" .
                "<p>" . $item['product_desc'] . "</p>" .
                "</td>" .
                "<td>" .
                "<div class='tp-compare-price'>" .
                "<span>" . currency_format($item['price']) . "</span>" .
                "</div>" .
                "</td>" .
                "<td>" .
                "<div class='tp-compare-add-to-cart'>" .
                "<button type='submit' class='tp-btn'>Thêm vào giỏ hàng</button>" .
                "</div>" .
                "</td>" .
                "<td>" .
                "<div class='tp-compare-rating'>" .
                "" . str_repeat("<span><i class='fas fa-star'></i></span>", product_reviews($item['product_id'])['star']) . "" .
                "</div>" .
                "</td>" .
                "<td>" .
                "<div class='tp-compare-remove'>" .
                "<button type='button' color_id='" . $item['color_id'] . "' onclick='delete_compare(this)'><i class='fal fa-trash-alt'></i></button>" .
                "</div>" .
                "</td>" .
                "</tr>";
        }
    } else {
        $string = "<tr><td colspan='6'>Không có sản phẩm so sánh</td></tr>";
        $count = 0;
    }
    $result = [
        'list_compare' => $string,
        'count_compare' => $count,
    ];
    echo json_encode($result);
}


function add_cart_compare_ajaxAction()
{
    $color_id = $_POST['color_id'];
    $product = get_cart_by_id($color_id);
    if ($product['quantity'] > 0) {
        add_product_put_cart($color_id, 1);
        get_list_buy_cart();
        $string_cart = "";
        foreach ($_SESSION['cart']['buy'] as $item) {
            $string_cart .= "<div class='cartmini__widget-item'>" .
                "<div class='cartmini__thumb'>" .
                "<a href='san-pham/chi-tiet/" . create_slug($item['product_name']) . "/" . $item['product_id'] . ".html'>" .
                "<img src='admin/img/" . $item['product_thumb'] . "' alt=''>" .
                "</a>" .
                "</div>" .
                "<div class='cartmini__content'>" .
                "<h5 class='cartmini__title'><a href='san-pham/chi-tiet/" . create_slug($item['product_name']) . "/" . $item['product_id'] . ".html''>" . $item['product_name'] . "</a></h5>" .
                "<div class='cartmini__price-wrapper'>" .
                "<span class='cartmini__price'>" . currency_format($item['price']) . "</span>" .
                "<span class='cartmini__quantity'>x" . $item['qty'] . "</span>" .
                "</div>" .
                "</div>" .
                "</div>";
        }
        $result = [
            'status' => 'success',
            'count_cart' => count($_SESSION['cart']['buy']),
            'list_cart' => $string_cart,
        ];
    } else {
        $result = [
            'status' => 'error',
        ];
    }
    echo json_encode($result);
}
