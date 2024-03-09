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
            "<td class='tp-cart-img'><a href='san-pham/chi-tiet/" . create_slug($item['product_name']) . "/" . $item['product_id'] . ".html'> <img src='admin/img/" . $item['product_thumb'] . "' alt=''></a></td>" .
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

function apply_voucher_ajaxAction() //Áp dụng voucher
{
    $voucher_code = $_POST['voucher'];
    $idShip = $_POST['shipping'];
    if (exists_voucher($voucher_code)) { //Kiểm tra xem có tồn tại hay không
        $voucher = get_voucher($voucher_code); //lẤY VOUCHER
        $transport = get_transport_by_id($idShip);
        if ($transport) {
            $transport_price = $transport['price'];
        } else {
            $transport_price = 0;
        }
        $total_price = currency_format($_SESSION['cart']['info']['total'] + $transport_price - $voucher['discount_amount']);
        $data = [
            'status' => 'success',
            'total' => $total_price,
            'discount' => currency_format($voucher['discount_amount'])
        ];
        echo json_encode($data);
    } else { //Nếu không tồn tại
        $data = [
            'status' => 'error',
        ];
        echo json_encode($data);
    }
}
function chang_priceAction()
{
    $idShip = $_POST['idShip'];
    $voucher_code = $_POST['voucher'];
    $voucher = get_voucher($voucher_code); //lẤY VOUCHER
    $transport = get_transport_by_id($idShip);
    if ($transport) {
        $transport_price = $transport['price'];
    } else {
        $transport_price = 0;
    }
    if ($voucher) {
        $discount_amount = $voucher['discount_amount'];
    } else {
        $discount_amount = 0;
    }
    $total_price = currency_format($_SESSION['cart']['info']['total'] + $transport_price - $discount_amount);
    echo $total_price;
}


function checkoutAction()
{
    if (!isset($_SESSION['is_login'])) {
        redirect("dang-nhap.html");
    }
    global $error, $fullname, $email, $address, $phone, $note, $transport_price;
    $data['customer_info'] = get_customer_innfo();
    $data['list_transport'] = get_list_transport(); //Lấy danh sách các nhà vận chuyển
    if (isset($_POST['order_buy'])) { //Thanh toán khi nhận hàng
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
        if (empty($_POST['voucher'])) {
        } else {
            if (exists_voucher($_POST['voucher'])) { //Kiểm tra xem có tồn tại hay không
            }
        }
        //Kiểm tra payment
        if (empty($_POST['payment'])) {
            $error['payment'] = "Vui lòng chọn hình thức thanh toán";
        } else {
            $payment = $_POST['payment'];
        }
        //Kiểm tra voucher
        if (isset($_POST['voucher'])) {
            if (empty($_POST['voucher'])) {
            } else {
                $voucher_code = $_POST['voucher'];
            }
        }

        //Kết luận
        if (empty($error)) {
            if (isset($voucher_code)) {
                update_voucher($voucher_code); //Cập nhật lại số lượng
                $voucher_item =  get_voucher($voucher_code); //lẤY VOUCHER
                $voucher = $voucher_item['discount_amount'];
            } else {
                $voucher = 0;
            }
            $total_price = $_SESSION['cart']['info']['total'] + $transport_price['price'] - $voucher; //Tổng tất cả thanh toán
            $quantity = $_SESSION['cart']['info']['count'];
            //Thêm vào db số lượng sản phẩm đá bán
            $reuslt = [];
            foreach ($_SESSION['cart']['buy'] as $item) {
                $reuslt[$item['color_id']]['product_id'] = $item['product_id']; //Lấy ra id sản phẩm
                $reuslt[$item['color_id']]['sales'] = $item['qty']; //Lấy ra số lượng
            }
            update_sales_product($reuslt); //Cập nhật số lượng sản phẩm bán ra
            ///
            //Phần đặt hàng
            $order_code = "VHL#" . substr(md5(date("h:i:s")), 23);
            $customer_id = info_login("id");
            $data_order = [
                'customer_id' => $customer_id,
                'order_code' => $order_code,
                'fullname' => $fullname,
                'email' => $email,
                'quantity' => $quantity,
                'total_price' => $total_price, //Tổng tiền
                'note' => $note,
                'address' => $address,
                'phone' => $phone,
                'order_buy' => json_encode($_SESSION['cart']['buy']), //Danh sách chi tiết
                'shipping_cost' => $transport_price['price'],
                'pay' => "Chưa thanh toán",
                'discount' => $voucher,
                'payment_methods' => "Thanh toán COD"
            ];
            //Thêm vào dánh sách khách hàng đã mua
            $order_id = add_order_buy($data_order);
            //Phần gửi hóa đơn
            $date = date("Y-m-d");
            $mid_content = "";
            foreach ($_SESSION['cart']['buy'] as $item) {
                $mid_content .= "<tr>
                 <td>" . $item['product_name'] . "</td>
                <td>" . "X " . $item['qty'] . "</td>
                <td>" . currency_format($item['price']) . "</td>
                </tr>";
            }
            $shipping_cost = currency_format($transport_price['price']);
            $discount = currency_format($voucher);
            $content = "<h1 style='color: red;'>Xin chào {$fullname}</h1>
            <p><strong>Bạn đã đặt hàng thành công!</strong></p>
            <p><strong>Mã đơn hàng:</strong> {$order_code}</p>
            <p><strong>Họ và tên:</strong> {$fullname}</p>
            <p><strong>Ngày đặt:</strong> {$date}</p>
            <p><strong>Địa chỉ:</strong> {$address}</p>
            <p><strong>Số điện thoại:</strong> {$phone}</p>
            <p><strong>Ghi chú:</strong> {$note}</p>
            <p><strong>Phí vận chuyển:</strong> {$shipping_cost}</p>
            <p><strong>Giảm giá:</strong>-{$discount}</p>
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
                        <td colspan='3'><strong>Tổng tiền: </strong>" . currency_format($total_price) . "</td>
                    </tr>
                </tbody>
                <p><strong>Trạng thái:</strong> Chưa thanh toán</p>
            </table>
            <p><strong>Đơn hàng sẽ được giao sớm nhất đến bạn. Bạn vui lòng dữ liên lạc!</strong></p>
            <p><strong>AUTOSMART cảm ơn bạn đã mua hàng!</strong></p>";
            send_email($email, $fullname, "Thông báo đã đặt hàng thành công", $content);
            redirect("xac-nhan-don-hang-thanh-cong-don-hang-{$order_id}.html");
        }
    } else if (isset($_POST['payUrl'])) { //Thanh toán qua momo
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
        if (empty($_POST['voucher'])) {
        } else {
            if (exists_voucher($_POST['voucher'])) { //Kiểm tra xem có tồn tại hay không
            }
        }
        //Kiểm tra payment
        if (empty($_POST['payment'])) {
            $error['payment'] = "Vui lòng chọn hình thức thanh toán";
        } else {
            $payment = $_POST['payment'];
        }
        //Kiểm tra voucher
        if (isset($_POST['voucher'])) {
            if (empty($_POST['voucher'])) {
            } else {
                $voucher_code = $_POST['voucher'];
            }
        } else {
            $voucher_code = "";
        }

        //Kết luận
        if (empty($error)) {
            if (!empty($voucher_code)) {
                $voucher_item =  get_voucher($voucher_code); //lẤY VOUCHER
                $voucher = $voucher_item['discount_amount'];
            } else {
                $voucher = 0;
            }
            $total_price = $_SESSION['cart']['info']['total'] + $transport_price['price'] - $voucher; //Tổng tất cả thanh toán
            $quantity = $_SESSION['cart']['info']['count'];
            $order_code = "VHL#" . substr(md5(date("h:i:s")), 23); //Mã đơn hàng
            $customer_id = info_login("id"); //Id người đặt
            $_SESSION['order'] = [
                'customer_id' => $customer_id,
                'order_code' => $order_code,
                'fullname' => $fullname,
                'email' => $email,
                'quantity' => $quantity,
                'total_price' => $total_price,
                'note' => $note,
                'address' => $address,
                'phone' => $phone,
                'order_buy' => json_encode($_SESSION['cart']['buy']),
                'shipping_cost' => $transport_price['price'],
                'pay' => "Đã thanh toán",
                'discount' => $voucher,
                'payment_methods' => "Thanh toán qua thẻ",
                'voucher_code' => $voucher_code,
            ];
            checkout_momo($total_price); //Thanh toán momo
        }
    } else if (isset($_POST['redirect'])) { //Thanh toán VnPay
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
        if (empty($_POST['voucher'])) {
        } else {
            if (exists_voucher($_POST['voucher'])) { //Kiểm tra xem có tồn tại hay không
            }
        }
        //Kiểm tra payment
        if (empty($_POST['payment'])) {
            $error['payment'] = "Vui lòng chọn hình thức thanh toán";
        } else {
            $payment = $_POST['payment'];
        }
        //Kiểm tra voucher
        if (isset($_POST['voucher'])) {
            if (empty($_POST['voucher'])) {
            } else {
                $voucher_code = $_POST['voucher'];
            }
        }

        //Kết luận
        if (empty($error)) {
            if (isset($voucher_code)) {
                update_voucher($voucher_code); //Cập nhật lại số lượng
                $voucher_item =  get_voucher($voucher_code); //lẤY VOUCHER
                $voucher = $voucher_item['discount_amount'];
            } else {
                $voucher = 0;
            }
            $list_order = $_SESSION['cart']['buy']; //Danh sách đơn hàng
            $total_price = $_SESSION['cart']['info']['total'] + $transport_price['price'] - $voucher; //Tổng tất cả thanh toán
            checkout_vnpay($total_price);
            //Thêm vào db số lượng sản phẩm đá bán
            $reuslt = [];
            foreach ($list_order as $item) {
                $reuslt[$item['color_id']]['product_id'] = $item['product_id']; //Lấy ra id sản phẩm
                $reuslt[$item['color_id']]['sales'] = $item['qty']; //Lấy ra số lượng
            }
            update_sales_product($reuslt); //Cập nhật số lượng sản phẩm bán ra
            ///
            //Phần đặt hàng
            $order_code = "VHL#" . substr(md5(date("h:i:s")), 23);
            $customer_id = info_login("id");
            $data_order = [
                'customer_id' => $customer_id,
                'order_code' => $order_code,
                'fullname' => $fullname,
                'quantity' => $_SESSION['cart']['info']['count'],
                'total_price' => $total_price,
                'note' => $note,
                'address' => $address,
                'phone' => $phone,
                'order_buy' => json_encode($list_order),
                'shipping_cost' => $transport_price['price'],
                'pay' => "Đã thanh toán",
                'discount' => $voucher,
                'payment_methods' => "Thanh toán qua thẻ"
            ];
            //Thêm vào dánh sách khách hàng đã mua
            add_order_buy($data_order);
            //Phần gửi hóa đơn
            $mid_content = "";
            foreach ($list_order as $item) {
                $mid_content .= "<tr>
                 <td>" . $item['product_name'] . "</td>
                <td>" . "X " . $item['qty'] . "</td>
                <td>" . currency_format($item['price']) . "</td>
                </tr>";
            }
            $content = "<h1 style='color: red;'>Xin chào {$fullname}</h1>
            <p><strong>Bạn đã đặt hàng thành công!</strong></p>
            <p><strong>Mã đơn hàng:</strong> {$order_code}</p>
            <p><strong>Trạng thái:</strong> Chưa thanh toán</p>
            <p><strong>Địa chỉ:</strong> {$address}</p>
            <p><strong>Số điện thoại:</strong> {$phone}</p>
            <p><strong>Ghi chú:</strong> {$note}</p>
            <p><strong>Phí vận chuyển:</strong> {$transport_price['price']}</p>
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
            <p><strong>Đơn hàng sẽ được giao sớm nhất đến bạn. Bạn vui lòng dữ liên lạc!</strong></p>
            <p><strong>AUTOSMART cảm ơn bạn đã mua hàng!</strong></p>";
            checkout_momo($order_code, $total_price); //Thanh toán momo
            send_email($email, $fullname, "Thông báo đã đặt hàng thành công", $content);
        }
    }
    $data['customer_info'] = get_customer_innfo();
    load_view('checkout', $data);
}



function successAction()
{
    if (isset($_GET['resultCode'])) { //Kiểm tra nếu là chuyển khoản thì thực hiện đoạn code sau
        if ($_GET['resultCode'] == 0) {
            $order =  $_SESSION['order'];
            if (!empty($order['voucher_code'])) {
                update_voucher($order['voucher_code']); //Cập nhật lại số lượng
            }
            //Nếu thành công
            $quantity = $order['quantity'];
            //Thêm vào db số lượng sản phẩm đá bán
            $reuslt = [];
            foreach ($_SESSION['cart']['buy'] as $item) {
                $reuslt[$item['color_id']]['product_id'] = $item['product_id']; //Lấy ra id sản phẩm
                $reuslt[$item['color_id']]['sales'] = $item['qty']; //Lấy ra số lượng
            }
            update_sales_product($reuslt); //Cập nhật số lượng sản phẩm bán ra
            $date = date('Y-m-d');
            ///
            //Phần đặt hàng
            $customer_id = info_login("id");
            $data_order = [
                'customer_id' => $customer_id,
                'order_code' => $order['order_code'],
                'fullname' => $order['fullname'],
                'email' => $order['email'],
                'quantity' => $quantity,
                'total_price' => $order['total_price'],
                'note' => $order['note'],
                'address' => $order['address'],
                'phone' => $order['phone'],
                'order_buy' => $order['order_buy'],
                'shipping_cost' => $order['shipping_cost'],
                'pay' => "Đã thanh toán",
                'discount' => $order['discount'],
                'payment_methods' => "Thanh toán qua thẻ"
            ];
            //Thêm vào dánh sách khách hàng đã mua
            $order_id = add_order_buy($data_order);
            //Phần gửi hóa đơn
            $mid_content = "";
            foreach ($_SESSION['cart']['buy'] as $item) {
                $mid_content .= "<tr>
                 <td>" . $item['product_name'] . "</td>
                <td>" . "X " . $item['qty'] . "</td>
                <td>" . currency_format($item['price']) . "</td>
                </tr>";
            }
            $shipping_cost = currency_format($order['shipping_cost']);
            $discount = currency_format($order['discount']);
            $content = "<h1 style='color: red;'>Xin chào {$order['fullname']}</h1>
            <p><strong>Bạn đã đặt hàng thành công!</strong></p>
            <p><strong>Mã đơn hàng:</strong> {$order['order_code']}</p>
            <p><strong>Họ và tên:</strong> {$order['fullname']}</p>
            <p><strong>Ngày đặt:</strong> {$date}</p>
            <p><strong>Địa chỉ:</strong> {$order['address']}</p>
            <p><strong>Số điện thoại:</strong> {$order['phone']}</p>
            <p><strong>Ghi chú:</strong> {$order['note']}</p>
            <p><strong>Phí vận chuyển:</strong> {$shipping_cost}</p>
            <p><strong>Giảm giá:</strong>-{$discount}</p>
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
                <p><strong>Trạng thái:</strong>Đã thanh toán</p>
            </table>
            <p><strong>Đơn hàng sẽ được giao sớm nhất đến bạn. Bạn vui lòng dữ liên lạc!</strong></p>
            <p><strong>AUTOSMART cảm ơn bạn đã mua hàng!</strong></p>";
            send_email($order['email'], $order['fullname'], "Thông báo đã đặt hàng thành công", $content);
            delete_cart_all();
            $data['order'] = get_order_by_order_id($order_id); //Lấy đơn hàng bằng id đơn hàng
            $data['list_products'] = json_decode($data['order']['order_buy'], true);
            load_view("success", $data);
        } else {
            if (isset($_POST['cart']['buy_now'])) {
                echo "Thanh toán không thành công: <a href='trang-chu.html'>Trang chủ</a>";
            } else {
                echo "Thanh toán không thành công: <a href='thanh-toan.html'>Thanh toán</a>";
            }
        }
    } else { //Nếu là thanh toán COD thì thực hiện đoạn code sau
        $order_id = $_GET['order_id'];
        $data['order'] = get_order_by_order_id($order_id); //Lấy đơn hàng bằng id đơn hàng
        $data['list_products'] = json_decode($data['order']['order_buy'], true);
        delete_cart_all();
        load_view("success", $data);
    }
}

function process_orderAction() //
{
    load_view("process_order");
}
