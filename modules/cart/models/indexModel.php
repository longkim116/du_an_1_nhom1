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
    return db_insert("tb_orders", $data);
}

function update_sales_product($data) //Cập nhật số lượng sản phẩm đá bán ra
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

function update_voucher($voucher) //Cập nhật voucher
{
    $sql = db_fetch_row("SELECT * FROM `tb_voucher` WHERE `voucher_code` = '{$voucher}'");
    $quantity = $sql['quantity'] - 1;
    db_update("tb_voucher", array("quantity" => $quantity), "`voucher_code` = '{$voucher}'");
}
function exists_voucher($voucher) //Kiểm tra xem có tồn tại hay không
{
    $sql = db_fetch_row("SELECT * FROM `tb_voucher` WHERE `voucher_code` = '{$voucher}' AND `quantity` > 0 AND `status` = 'Đã áp dụng'");
    if ($sql > 0) {
        return true;
    } else {
        return false;
    }
}

function get_voucher($voucher) //lẤY VOUCHER
{
    $sql = db_fetch_row("SELECT * FROM `tb_voucher` WHERE `voucher_code` = '{$voucher}' AND `quantity` > 0");
    return $sql;
}

function get_order_by_order_id($order_code) //Lấy đơn hàng bằng id
{
    $sql = db_fetch_row("SELECT * FROM `tb_orders` WHERE `id` = '{$order_code}'");
    return $sql;
}
function get_buy_now($id_color) //Lấy sản phẩm mua ngay
{
    $sql = db_fetch_row("SELECT * FROM `tb_color_variants` INNER JOIN `tb_products` ON tb_color_variants.product_id = tb_products.product_id
    INNER JOIN `tb_ram_variants` ON tb_ram_variants.id = tb_color_variants.ram_id
    WHERE tb_color_variants.id = {$id_color}");
    return $sql;
}



function checkout_momo($order_id, $total_price) //Thanh toán bằng momo
{
    $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
    $partnerCode = 'MOMOBKUN20180529';
    $accessKey = 'klm05TvNBzhg7h7j';
    $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

    $orderInfo = "Thanh toán qua MoMo";
    $amount = $total_price;
    $orderId = time() . "";
    $redirectUrl = "http://localhost/Du-an-1/autosmart/?mod=cart&action=success&order_id={$order_id}";
    $ipnUrl = "http://localhost/Du-an-1/autosmart/?mod=cart&action=success&order_id={$order_id}";
    $extraData = "";


    $partnerCode = $partnerCode;
    $accessKey = $accessKey;
    $secretKey = $secretKey;
    $orderId = $orderId; // Mã đơn hàng
    $orderInfo = $orderInfo;
    $amount = $amount;
    $ipnUrl = $ipnUrl;
    $redirectUrl = $redirectUrl;
    $extraData = $extraData;

    $requestId = time() . "";
    $requestType = "payWithATM";
    $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
    //before sign HMAC SHA256 signature
    $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
    $signature = hash_hmac("sha256", $rawHash, $secretKey);
    $data = array(
        'partnerCode' => $partnerCode,
        'partnerName' => "Test",
        "storeId" => "MomoTestStore",
        'requestId' => $requestId,
        'amount' => $amount,
        'orderId' => $orderId,
        'orderInfo' => $orderInfo,
        'redirectUrl' => $redirectUrl,
        'ipnUrl' => $ipnUrl,
        'lang' => 'vi',
        'extraData' => $extraData,
        'requestType' => $requestType,
        'signature' => $signature,
    );
    $result = execPostRequest($endpoint, json_encode($data));
    $jsonResult = json_decode($result, true);  // decode json

    //Just a example, please check more in there

    header('Location: ' . $jsonResult['payUrl']);
}
function checkPaymentStatusFromUrl()
{
    $resultCode = $_GET['resultCode']; // Lấy giá trị resultCode từ URL

    if ($resultCode === 0) {
        // Thanh toán thành công, có thể thực hiện các hành động sau thanh toán ở đây
        echo "Thanh toán thành công!";
        return true;
    } else {
        // Xử lý lỗi thanh toán
        echo "Thanh toán thất bại!";
        return false;
    }
}
