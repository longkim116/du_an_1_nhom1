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

function add_wishlist_ajaxAction() //Thêm sản phẩm yêu thích
{
    $product_id = $_POST['product_id'];
    $product = get_product_by_id($product_id); //Lấy chi tiết sản phẩm
    $_SESSION['wishlist'][$product_id] = [
        'product_id' => $product['product_id'],
        'product_thumb' => $product['product_thumb'],
        'product_code' => $product['product_code'],
        'product_name' => $product['product_name'],
        'cat_id' => $product['cat_id'],
    ];
    echo json_encode($_SESSION);
}

function delete_wishlist_ajaxAction() //Xóa sản phẩm yêu thích
{
    $product_id = $_POST['product_id'];
    unset($_SESSION['wishlist'][$product_id]);
    if (!empty($_SESSION['wishlist'])) {
        $count = count($_SESSION['wishlist']);
        $string = "";
        foreach ($_SESSION['wishlist'] as $item) {
            $string .= " <tr>" .
                "<td class='tp-cart-img'><a href='san-pham/chi-tiet/" . create_slug($item['product_name']) . "/" . $item['product_id'] . ".html'><img src='admin/img/" . $item['product_thumb'] . "' alt=''></a></td>" .
                "<td class='tp-cart-title'><a href='san-pham/chi-tiet/" . create_slug($item['product_name']) . "/" . $item['product_id'] . ".html'>" . $item['product_name'] . "</a></td>" .
                "<td class='tp-cart-price'><span>" . currency_format(min_price($item['product_id'])) . "-" .
                "" . currency_format(max_price($item['product_id'])) . "" .
                "</span></td>" .
                "<td class='tp-cart-add-to-cart'>" .
                "<a type='submit' href='san-pham/chi-tiet/" . create_slug($item['product_name']) . "/" . $item['product_id'] . ".html' class='tp-btn tp-btn-2 tp-btn-blue'>Xem chi tiết sản phẩm</a>" .
                "</td>" .
                "<td class='tp-cart-action'>" .
                "<button product_id='" . $item['product_id'] . "' onclick='delete_wishlist(this)' class='tp-cart-action-btn'>" .
                "<svg width='10' height='10' viewBox='0 0 10 10' fill='none' xmlns='http://www.w3.org/2000/svg'>" .
                "<path fill-rule='evenodd' clip-rule='evenodd' d='M9.53033 1.53033C9.82322 1.23744 9.82322 0.762563 9.53033 0.46967C9.23744 0.176777 8.76256 0.176777 8.46967 0.46967L5 3.93934L1.53033 0.46967C1.23744 0.176777 0.762563 0.176777 0.46967 0.46967C0.176777 0.762563 0.176777 1.23744 0.46967 1.53033L3.93934 5L0.46967 8.46967C0.176777 8.76256 0.176777 9.23744 0.46967 9.53033C0.762563 9.82322 1.23744 9.82322 1.53033 9.53033L5 6.06066L8.46967 9.53033C8.76256 9.82322 9.23744 9.82322 9.53033 9.53033C9.82322 9.23744 9.82322 8.76256 9.53033 8.46967L6.06066 5L9.53033 1.53033Z' fill='currentColor' />" .
                "</svg>" .
                "<span>Remove</span>" .
                "</button>" .
                "</td>" .
                "</tr>";
        }
    } else {
        $string = "<tr><td colspan='4' class='tp-cart-add-to-cart text-center'>Không có sản phẩm yêu thích nào</td></tr>";
        $count = 0;
    }
    $result = [
        'list_wishlist' => $string,
        'count_wishlist' => $count,
    ];
    echo json_encode($result);
}
