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
    unset($_SESSION['cart']['buy_now']);
    unset($_SESSION['order']);
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

function   update_quatity_product($color_id, $qty) //Cập số lượng sản phẩm ở mua ngay
{
    $sql = db_fetch_row("SELECT * FROM `tb_color_variants` WHERE `id` = {$color_id}");
    $quantity = $sql['quantity'] - $qty;
    $data = [
        'quantity' => $quantity
    ];
    db_update("tb_color_variants", $data, "`id` = {$color_id}");
}

function checkout_momo($total_price) //Thanh toán bằng momo
{
    $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
    $partnerCode = 'MOMOBKUN20180529';
    $accessKey = 'klm05TvNBzhg7h7j';
    $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

    $orderInfo = "Thanh toán qua MoMo";
    $amount = $total_price;
    $orderId = time() . "";
    $redirectUrl = "http://localhost/Du-an-1/autosmart/?mod=cart&action=success";
    $ipnUrl = "http://localhost/Du-an-1/autosmart/?mod=cart&action=success";
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


function checkout_vnpay($total_price)
{
    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    $vnp_Returnurl = "https://localhost/vnpay_php/vnpay_return.php";
    $vnp_TmnCode = "IRCYPLAD"; //Mã website tại VNPAY 
    $vnp_HashSecret = "VNMLLBIHPEJBGHMHJVGZSJCFXHKKHACC"; //Chuỗi bí mật

    $vnp_TxnRef = rand(00, 999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
    $vnp_OrderInfo = 'Thanh toan VnPay';
    $vnp_OrderType = 'billpayment';
    $vnp_Amount = $total_price * 100;
    $vnp_Locale = 'vn';
    $vnp_BankCode = 'NCB';
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
    //Add Params of 2.0.1 Version
    // $vnp_ExpireDate = $_POST['txtexpire'];
    //Billing
    // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
    // $vnp_Bill_Email = $_POST['txt_billing_email'];
    // $fullName = trim($_POST['txt_billing_fullname']);
    // if (isset($fullName) && trim($fullName) != '') {
    //     $name = explode(' ', $fullName);
    //     $vnp_Bill_FirstName = array_shift($name);
    //     $vnp_Bill_LastName = array_pop($name);
    // }
    // $vnp_Bill_Address = $_POST['txt_inv_addr1'];
    // $vnp_Bill_City = $_POST['txt_bill_city'];
    // $vnp_Bill_Country = $_POST['txt_bill_country'];
    // $vnp_Bill_State = $_POST['txt_bill_state'];
    // // Invoice
    // $vnp_Inv_Phone = $_POST['txt_inv_mobile'];
    // $vnp_Inv_Email = $_POST['txt_inv_email'];
    // $vnp_Inv_Customer = $_POST['txt_inv_customer'];
    // $vnp_Inv_Address = $_POST['txt_inv_addr1'];
    // $vnp_Inv_Company = $_POST['txt_inv_company'];
    // $vnp_Inv_Taxcode = $_POST['txt_inv_taxcode'];
    // $vnp_Inv_Type = $_POST['cbo_inv_type'];
    $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => $vnp_OrderType,
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef,
        // "vnp_ExpireDate" => $vnp_ExpireDate,
        // "vnp_Bill_Mobile" => $vnp_Bill_Mobile,
        // "vnp_Bill_Email" => $vnp_Bill_Email,
        // "vnp_Bill_FirstName" => $vnp_Bill_FirstName,
        // "vnp_Bill_LastName" => $vnp_Bill_LastName,
        // "vnp_Bill_Address" => $vnp_Bill_Address,
        // "vnp_Bill_City" => $vnp_Bill_City,
        // "vnp_Bill_Country" => $vnp_Bill_Country,
        // "vnp_Inv_Phone" => $vnp_Inv_Phone,
        // "vnp_Inv_Email" => $vnp_Inv_Email,
        // "vnp_Inv_Customer" => $vnp_Inv_Customer,
        // "vnp_Inv_Address" => $vnp_Inv_Address,
        // "vnp_Inv_Company" => $vnp_Inv_Company,
        // "vnp_Inv_Taxcode" => $vnp_Inv_Taxcode,
        // "vnp_Inv_Type" => $vnp_Inv_Type
    );

    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
    //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    // }

    //var_dump($inputData);
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashdata .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }

    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }
    $returnData = array(
        'code' => '00', 'message' => 'success', 'data' => $vnp_Url
    );
    if (isset($_POST['redirect'])) {
        header('Location: ' . $vnp_Url);
        die();
    } else {
        echo json_encode($returnData);
    }
    // vui lòng tham khảo thêm tại code demo
}
