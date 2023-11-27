<?php
function execPostRequest($url, $data) //Thanh toán Momo
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data)
        )
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    return $result;
}

function add_cart($id_color, $quantity)
{
    add_product_put_cart($id_color, $quantity);
    get_list_buy_cart();
}
function delete_cart($id) //Xóa sản phẩm trong giỏ hàng
{
    unset($_SESSION['cart']['buy'][$id]);
    update_cart();
    redirect("gio-hang.html");
}

function cancel_purchase($id) //Khách hủy thao tác mua xóa sản phẩm
{
    $color_var = db_fetch_row("SELECT * FROM `tb_color_variants` WHERE `id` = $id"); //Lấy số lượng biến thể trong database
    $quantity =  $color_var['quantity'] +  $_SESSION['cart']['buy'][$id]['qty'];
    $data_update = [
        'quantity' => $quantity,
    ];
    db_update("tb_color_variants", $data_update, "`id` = '$id'");
}

function delete_cart_all()
{
    unset($_SESSION['cart']['buy']);
    unset($_SESSION['cart']['info']);
    update_cart();
}
function add_order_buy($data)
{
    db_insert("tb_orders", $data);
}

function update_sales_product($data)
{
    foreach ($data as $item) {
        $sql = db_fetch_row("SELECT * FROM `tb_products` WHERE `product_id` = '{$item['product_id']}' ");
        $total = $sql['sales'] + $item['sales'];
        $star = [
            'sales' => $total
        ];
        db_update("tb_products", $star, "`product_id` = '{$item['product_id']}' ");
    }
}

function get_customer_innfo() //Lấy thông tin khách hàng
{
    $username = $_SESSION['user_login'];
    $sql = db_fetch_row("SELECT * FROM `tb_customers` WHERE `username` = '{$username}'");
    return $sql;
}

function get_list_transport() //Lấy danh sách các nhà vận chuyển
{
    $sql = db_fetch_array("SELECT * FROM `tb_transports`");
    return $sql;
}

function get_transport_by_id($id) //Lấy giá vận chuyển
{
    $sql = db_fetch_row("SELECT * FROM `tb_transports` WHERE `id`= '{$id}'");
    return  $sql;
}

function  get_quantity_max($id_color) //Lấy giớ lượng sản phẩm trong giỏ hàng
{
    $sql = db_fetch_row("SELECT * FROM `tb_color_variants` WHERE `id`='{$id_color}'");
    return $sql['quantity'];
}

function update_quantity_by_id($id, $qty) //Cập nhật lại giỏ hàng
{
    $color = db_fetch_row("SELECT * FROM `tb_color_variants` WHERE `id` = $id"); //Lấy ra sản phẩm
    $promotion = get_product_promotion_by_id($color['product_id']);
    if (!$promotion) {
        $promotion = 0;
    }
    $sub_total = ($color['color_price'] - ($color['color_price'] * ($promotion / 100))) * $qty;
    $quantity = $qty - $_SESSION['cart']['buy'][$id]['qty']; //Số lượng cập nhật
    $_SESSION['cart']['buy'][$id]['qty'] = $qty; //Cập nhất số lượng giỏ hàng
    $_SESSION['cart']['buy'][$id]['sub_total'] = $sub_total; //Cập nhất số lượng giỏ hàng
    $result = $color['quantity'] - $quantity;
    $data_update = [
        'quantity' => $result,
    ];
    db_update("tb_color_variants", $data_update, "`id` = '$id'");
}

function get_product_promotion_by_id($id) //Lấy giá khuyễn mãi theo id sản phẩm
{
    $sql = db_fetch_row("SELECT * FROM `product_promotion` INNER JOIN `tb_promotions` ON product_promotion.promotion_id = tb_promotions.id 
    INNER JOIN `tb_products` ON product_promotion.product_id = tb_products.product_id WHERE tb_products.product_id = {$id}");
    if (!$sql) {
        return false;
    }
    return $sql['discount_rate'];
}
