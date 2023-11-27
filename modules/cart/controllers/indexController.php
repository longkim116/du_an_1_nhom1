<?php
function construct()
{
    load_module("index");
}

function update_ajaxAction()
{
    $quantities = $_POST['quantities'];
    foreach ($quantities as $id => $qty) {
        update_quantity_by_id($id, $qty); //Cập nhật lại giỏ hàng
    }
    update_cart(); //Cập nhật tổng tiền
    $string = "";
    foreach ($_SESSION['cart']['buy'] as $item) {
        $string .=  "<tr>" .
            "<td class='tp-cart-img'><a href='product-details.html'> <img src='admin/img/" . $item['product_thumb'] . "' alt=''></a></td>" .
            "<td class='tp-cart-title'><a href='san-pham/chi-tiet/" . create_slug($item['product_name']) . "/" . $item['product_id'] . ".html'>" . $item['product_name'] . "</a></td>" .
            "<td class='tp-cart-price'><span>" . currency_format($item['price']) . "</span></td>" .
            "<td class='tp-cart-quantity'>" .
            "<div class='tp-product-quantity mt-10 mb-10'>" .
            "<input type='number' onchange='update_cart(event)' class='num_order' color_id='" . $item['color_id'] . "' name='qty[" . $item['color_id'] . "]' min='1' max='" . get_quantity_max($item['color_id']) + $item['qty'] . "' value='" . $item['qty'] . "'>" .
            "</div>" .
            "</td>" .
            "<td class='tp-cart-price'><span>" . currency_format($item['sub_total']) . "</span></td>" .
            "<td class='tp-cart-action'>" .
            "<a href='" . $item['url_delete'] . "' class='tp-cart-action-btn'>" .
            "<svg width='10' height='10' viewBox='0 0 10 10' fill='none' xmlns='http://www.w3.org/2000/svg'>" .
            "<path fill-rule='evenodd' clip-rule='evenodd' d='M9.53033 1.53033C9.82322 1.23744 9.82322 0.762563 9.53033 0.46967C9.23744 0.176777 8.76256 0.176777 8.46967 0.46967L5 3.93934L1.53033 0.46967C1.23744 0.176777 0.762563 0.176777 0.46967 0.46967C0.176777 0.762563 0.176777 1.23744 0.46967 1.53033L3.93934 5L0.46967 8.46967C0.176777 8.76256 0.176777 9.23744 0.46967 9.53033C0.762563 9.82322 1.23744 9.82322 1.53033 9.53033L5 6.06066L8.46967 9.53033C8.76256 9.82322 9.23744 9.82322 9.53033 9.53033C9.82322 9.23744 9.82322 8.76256 9.53033 8.46967L6.06066 5L9.53033 1.53033Z' fill='currentColor' />" .
            "</svg>" .
            "<span>Remove</span>" .
            "</a>" .
            "</td>" .
            "</tr>";
    }
    $price = $_SESSION['cart']['info']['total'];
    $result = [
        'list_cart' => $string,
        'total_price' => currency_format($price),
        'total' => $qty
    ];
    echo json_encode($result);
}


function indexAction()
{
    load_view("show_cart");
}

function add_cartAction()
{
    $id_color = $_POST['id_color'];
    $quantity = $_POST['quantity'];
    add_cart($id_color, $quantity);
    $string_cart = "";
    foreach ($_SESSION['cart']['buy'] as $item) {
        $string_cart .= "<div class='cartmini__widget-item'>" .
            "<div class='cartmini__thumb'>" .
            "<a href='product-details.html'>" .
            "<img src='admin/img/" . $item['product_thumb'] . "' alt=''>" .
            "</a>" .
            "</div>" .
            "<div class='cartmini__content'>" .
            "<h5 class='cartmini__title'><a href='product-details.html'>" . $item['product_name'] . "</a></h5>" .
            "<div class='cartmini__price-wrapper'>" .
            "<span class='cartmini__price'>" . currency_format($item['price']) . "</span>" .
            "<span class='cartmini__quantity'>x" . $item['qty'] . "</span>" .
            "</div>" .
            "</div>" .
            "<a href='#' class='cartmini__del'><i class='fa-regular fa-xmark'></i></a>" .
            "</div>";
    }
    $data = [
        'total_cart' => count($_SESSION['cart']['buy']),
        'total' => currency_format($_SESSION['cart']['info']['total']),
        'list_add_cart' => $string_cart,
    ];
    echo json_encode($data);
}

function favourite_ajaxAction()
{
    $product_id = $_POST['product_id'];
    echo $product_id;
}

function deleteAction()
{
    $id = $_GET['id'];
    cancel_purchase($id); //Cập nhật lại dữ liệu khi khách hàng xóa sản phẩm ra giỏ hàng
    delete_cart($id);
}
// function deleteAllAction()
// {
//     foreach ($_SESSION['cart']['buy'] as $item) {
//         cancel_purchase($item['product_id'], $item['qty']);
//     };
//     delete_cart_all();
//     redirect("gio-hang.html");
// }
function chang_priceAction()
{
    $idShip = $_POST['idShip'];
    $transport = get_transport_by_id($idShip);
    $total = currency_format($_SESSION['cart']['info']['total'] + $transport['price']);
    echo $total;
}
function checkoutAction()
{
    if (!isset($_SESSION['is_login'])) {
        redirect("dang-nhap.html");
    }
    global $error, $fullname, $email, $address, $phone, $note;
    $data['customer_info'] = get_customer_innfo();
    $data['list_transport'] = get_list_transport(); //Lấy danh sách các nhà vận chuyển
    if (isset($_POST['order_buy'])) {
        $error = [];
        //Kiểm tra fullname
        if (empty($_POST['fullname'])) {
            $error['fullname'] = "Không được để trống thông tin";
        } else {
            $fullname = $_POST['fullname'];
        }
        //Kiểm tra email
        if (empty($_POST['email'])) {
            $error['email'] = "Không được để trống thông tin";
        } else {
            if (is_email($_POST['email'])) {
                $email = $_POST['email'];
            } else {
                $error['email'] = "Email không đúng định dạng";
            }
        }
        //Kiểm tra address
        if (empty($_POST['address'])) {
            $error['address'] = "Không được để trống thông tin";
        } else {
            $address = $_POST['address'];
        }
        //Kiểm tra phone
        if (empty($_POST['phone'])) {
            $error['phone'] = "Không được để trống thông tin";
        } else {
            if (is_tel($_POST['phone'])) {
                $phone = $_POST['phone'];
            } else {
                $error['phone'] = "Số điện thoại không đúng định dạng";
            }
        }
        //Kiểm tra note
        if (empty($_POST['note'])) {
            $note = "";
        } else {
            $note = $_POST['note'];
        }
        //Kiểm tra vận chuyển
        if (empty($_POST['shipping'])) {
            $error['shipping'] = "Vui lòng chọn hình thức vận chuyển";
        } else {
            $transport_price = get_transport_by_id($_POST['shipping']);
        }
        //Kiểm tra payment
        if (empty($_POST['payment'])) {
            $error['payment'] = "Vui lòng chọn hình thức thanh toán";
        } else {
            $payment = $_POST['payment'];
        }
        //Kết luận
        if (empty($error)) {
            //Thêm vào db số lượng sản phẩm đá bán
            $cart = $_SESSION['cart']['buy'];
            $reuslt = [];
            foreach ($cart as $item) {
                $reuslt[$item['product_id']]['product_id'] = $item['product_id'];
                $reuslt[$item['product_id']]['sales'] = $item['qty'];
            }
            update_sales_product($reuslt);
            ///
            //Phần đặt hàng
            $order_code = "VHL#" . substr(md5(date("h:i:s")), 23);
            $quantity = $_SESSION['cart']['info']['count'];
            $customer_id = info_login("id");
            $total_price = $_SESSION['cart']['info']['total'] + $transport_price['price'];
            $data_order = [
                'customer_id' => $customer_id,
                'order_code' => $order_code,
                'fullname' => $fullname,
                'quantity' => $quantity,
                'total_price' => $total_price,
                'note' => $note,
                'address' => $address,
                'phone' => $phone,
                'order_buy' => json_encode($_SESSION['cart']['buy']),
                'shipping_cost' => $transport_price['price'],
                'pay' => "Chưa thanh toán"
            ];
            //Thêm vào dánh sách khách hàng đã mua
            add_order_buy($data_order);
            $mid_content = "";
            foreach ($_SESSION['cart']['buy'] as $item) {
                $mid_content .= "<tr>
                 <td>" . $item['product_name'] . "</td>
                <td>" . "X " . $item['qty'] . "</td>
                <td>" . currency_format($item['price']) . "</td>
                </tr>";
            }
            $content = "<h1 style='color: red;'>Xin chào {$fullname}</h1>
            <p><strong>Bạn đã đặt hàng thành công!</strong></p>
            <p><strong>Mã đơn hàng:</strong> {$order_code}</p>
            <p><strong>Địa chỉ:</strong> {$address}</p>
            <p><strong>Số điện thoại:</strong> {$phone}</p>
            <p><strong>Ghi chú:</strong> {$note}</p>
            <table style='border: 1px solid greenyellow;'>
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá tiền</th>
                    </tr>
                </thead>
                <tbody>              
                        {$mid_content}
                    <tr>
                        <td colspan='3'><strong>Tổng tiền: </strong>" . currency_format($_SESSION['cart']['info']['total']) . "</td>
                    </tr>
                </tbody>
            </table>
            <p><strong>Đơn hàng sẽ được giao trong vòng 3-5 ngày tới. Bạn vui lòng dữ liên lạc!</strong></p>
            <p><strong>autosmart cảm ơn bạn đã mua hàng!</strong></p>";
            send_email($email, $fullname, "Thông báo đã đặt hàng thành công", $content);
            redirect("xac-nhan-don-hang-thanh-cong.html");
        }
    } else if (isset($_POST['payUrl'])) { //Thanh toán qua Momo
        $error = [];
        //Kiểm tra fullname
        if (empty($_POST['fullname'])) {
            $error['fullname'] = "Không được để trống thông tin";
        } else {
            $fullname = $_POST['fullname'];
        }
        //Kiểm tra email
        if (empty($_POST['email'])) {
            $error['email'] = "Không được để trống thông tin";
        } else {
            if (is_email($_POST['email'])) {
                $email = $_POST['email'];
            } else {
                $error['email'] = "Email không đúng định dạng";
            }
        }
        //Kiểm tra address
        if (empty($_POST['address'])) {
            $error['address'] = "Không được để trống thông tin";
        } else {
            $address = $_POST['address'];
        }
        //Kiểm tra phone
        if (empty($_POST['phone'])) {
            $error['phone'] = "Không được để trống thông tin";
        } else {
            if (is_tel($_POST['phone'])) {
                $phone = $_POST['phone'];
            } else {
                $error['phone'] = "Số điện thoại không đúng định dạng";
            }
        }
        //Kiểm tra note
        if (empty($_POST['note'])) {
            $note = "";
        } else {
            $note = $_POST['note'];
        }
        //Kiểm tra vận chuyển
        if (empty($_POST['shipping'])) {
            $error['shipping'] = "Vui lòng chọn hình thức vận chuyển";
        } else {
            $transport_price = get_transport_by_id($_POST['shipping']);
        }
        //Kiểm tra payment
        if (empty($_POST['payment'])) {
            $error['payment'] = "Vui lòng chọn hình thức thanh toán";
        } else {
            $payment = $_POST['payment'];
        }
        //Kết luận
        if (empty($error)) {
            $total_price = $_SESSION['cart']['info']['total'] + $transport_price['price'];
            ///Thanh toán momo
            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

            $orderInfo = "Thanh toán qua MoMo";
            $amount = $total_price;
            $orderId = time() . "";
            $redirectUrl = "xac-nhan-don-hang-thanh-cong.html";
            $ipnUrl = "xac-nhan-don-hang-thanh-cong.html";
            $extraData = "";


            $partnerCode = $partnerCode;
            $accessKey = $accessKey;
            $serectkey = $secretKey;
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
            $signature = hash_hmac("sha256", $rawHash, $serectkey);
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
                'signature' => $signature
            );
            $result = execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);  // decode json

            //Just a example, please check more in there

            header('Location: ' . $jsonResult['payUrl']);
            ///Sau khi thanh toán xong
            //Thêm vào db số lượng sản phẩm đá bán
            $cart = $_SESSION['cart']['buy'];
            $reuslt = [];
            foreach ($cart as $item) {
                $reuslt[$item['product_id']]['product_id'] = $item['product_id'];
                $reuslt[$item['product_id']]['sales'] = $item['qty'];
            }
            update_sales_product($reuslt);
            ///
            //Phần đặt hàng
            $order_code = "VHL#" . substr(md5(date("h:i:s")), 23);
            $customer_id = info_login("id");
            $quantity = $_SESSION['cart']['info']['count'];
            $total_price = $_SESSION['cart']['info']['total'] + $transport_price['price'];
            $data_order = [
                'customer_id' => $customer_id,
                'order_code' => $order_code,
                'fullname' => $fullname,
                'quantity' => $quantity,
                'total_price' => $total_price,
                'address' => $address,
                'phone' => $phone,
                'note' => $note,
                'order_buy' => json_encode($_SESSION['cart']['buy']),
                'shipping_cost' => $transport_price['price'],
                'pay' => "Đã thanh toán"
            ];
            //Thêm vào dánh sách khách hàng đã mua
            add_order_buy($data_order);
            $mid_content = "";
            foreach ($_SESSION['cart']['buy'] as $item) {
                $mid_content .= "<tr>
                   <td>" . $item['product_name'] . "</td>
                  <td>" . "X " . $item['qty'] . "</td>
                  <td>" . currency_format($item['price']) . "</td>
                  </tr>";
            }
            $content = "<h1 style='color: red;'>Xin chào {$fullname}</h1>
              <p><strong>Bạn đã đặt hàng thành công!</strong></p>
              <p><strong>Mã đơn hàng:</strong> {$order_code}</p>
              <p><strong>Địa chỉ:</strong> {$address}</p>
              <p><strong>Số điện thoại:</strong> {$phone}</p>
              <p><strong>Ghi chú:</strong> {$note}</p>
              <table style='border: 1px solid greenyellow;'>
                  <thead>
                      <tr>
                          <th>Tên sản phẩm</th>
                          <th>Số lượng</th>
                          <th>Giá tiền</th>
                      </tr>
                  </thead>
                  <tbody>              
                          {$mid_content}
                      <tr>
                          <td colspan='3'><strong>Tổng tiền: </strong>" . currency_format($_SESSION['cart']['info']['total']) . "</td>
                      </tr>
                  </tbody>
              </table>
              <p><strong>Trạng thái: Đã thanh toán</p>
              <p><strong>Đơn hàng sẽ được giao trong vòng 3-5 ngày tới. Bạn vui lòng dữ liên lạc!</strong></p>
              <p><strong>autosmart cảm ơn bạn đã mua hàng!</strong></p>";
            send_email($email, $fullname, "Thông báo đã đặt hàng thành công", $content);
        }
    } else if (isset($_POST['redirect'])) { //Thanh toán qua Vnpay
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "https://localhost/vnpay_php/vnpay_return.php";
        $vnp_TmnCode = "IRCYPLAD"; //Mã website tại VNPAY 
        $vnp_HashSecret = "VNMLLBIHPEJBGHMHJVGZSJCFXHKKHACC"; //Chuỗi bí mật

        $vnp_TxnRef = rand(00, 999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toan VnPay';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = 10000 * 100;
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
    $data['customer_info'] = get_customer_innfo();
    load_view('checkout', $data);
}
function successAction()
{
    // delete_cart_all();
    $data['list_products'] = $_SESSION['cart']['buy'];
    $data['total'] = $_SESSION['cart']['info']['total'];
    load_view("success", $data);
    delete_cart_all();
}
