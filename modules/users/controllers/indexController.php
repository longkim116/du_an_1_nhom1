<?php
function construct()
{
    load_module("index");
}


function update_info_ajaxAction() //Xử lý cập nhật thông tin
{
    $username = $_SESSION['user_login'];
    $fullname =  $_POST['fullname'];
    $address =  $_POST['address'];
    if (is_tel($_POST['phone_number'])) { //Kiểm tra định dạng đt
        $phone_number = $_POST['phone_number'];
    } else {
        $error['phone_number'] = "Số điện thoại không đúng định dạng!";
    }
    if (is_email($_POST['email'])) { //Kiểm tra định dạng email
        $email = $_POST['email'];
    } else {
        $error['email'] = "Email không đúng định dạng!";
    }
    if (empty($error)) { //Kết luận
        $data_update = [
            'fullname' => $fullname,
            'address' => $address,
            'phone_number' => $phone_number,
            'email' => $email,
        ];
        update_user($username, $data_update);
        echo json_encode($data_update);
    } else {
        $error['error'] = 0;
        echo json_encode($error);
    }
}

function change_pass_ajaxAction() //Thay đổi mật khẩu
{
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $con_new_pass = $_POST['con_new_pass'];
    $error = [];
    #Kiểm tra password
    if (empty($_POST['old_pass'])) {
        $error['account'] = "Bạn vui lòng nhập mật khẩu cũ!";
    } else {
        if (exits_password(md5($_POST['old_pass']))) { //Kiểm tra mật khẩu cũ
            if (empty($_POST['new_pass'])) { //Kiểm tra mật khẩu mới
                $error['new_pass'] = "Vui lòng không để trống mật khẩu mới";
            } else {
                if (is_password($_POST['new_pass'])) {
                    $pass_new = md5($_POST['new_pass']);
                    if (md5($_POST['con_new_pass']) == $pass_new) { //Kiểm tra lại mật khẩu
                        $confirm_pass = md5($_POST['con_new_pass']);
                    } else {
                        $error['con_new_pass'] = "Mật khẩu mới không chính xác";
                    }
                } else {
                    $error['new_pass'] = "Mật khẩu không đúng định dạng";
                }
            }
        } else {
            $error['old_pass'] = "Mật khẩu không chính xác";
        }
    }
    //Kết luận
    if (empty($error)) {
        $data = [
            'password' => $confirm_pass
        ];
        update_password_reset(user_login(), $data);
        echo json_encode(array('status' => 1));
    } else {
        $error['status'] = 0;
        echo json_encode($error);
    }
}

function detail_order_ajaxAction() //Phần chi tiết đơn hàng
{
    $order_id = $_POST['order_id'];
    $order_detail = get_detail_order_by_id($order_id); //Lấy đơn hàng chi tiết
    $string = "";
    $total = 0;
    foreach (json_decode($order_detail['order_buy'], true) as $item) {
        $string .= "<li class='tp-order-info-list-desc'>" .
            "<p>" . $item['product_name'] . ". <span> x " . $item['qty'] . "</span></p>" .
            "<span>" . currency_format($item['sub_total']) . "</span>" .
            "</li>";
        $total += $item['sub_total'];
    }
    if ($order_detail['status'] == "Chờ xác nhận") {
        $cancel_order = " <button type='button' order_id='" . $order_id . "' onclick='cancel_order(this)' class='btn btn-danger w-100'>Hủy đơn hàng</button>";
    } else if ($order_detail['status'] == "Chuẩn bị đơn hàng") {
        $cancel_order = "";
    } else if ($order_detail['status'] == "Đang giao hàng") {
        $cancel_order = "<button onclick='order_success(this)' order_id='" . $order_id . "' type='button' class='btn btn-primary w-100'>Đã nhận hàng</button>";
    } else if ($order_detail['status'] == "Thành công") {
        if (!empty($order_detail['star'])) {
            $cancel_order =  "<p>Đánh giá của bạn :   " . str_repeat("<img src='img/sao.png' alt=''>", $order_detail['star']) . "</p>" .
                "<div class='col-sm-12'>" .
                "<div>" .
                "<p>Ngày nhận hàng: <strong id='order_status'>" . $order_detail['received_date'] . "</strong></p>" .
                "</div>" .
                "</div>";
        } else {
            $cancel_order =  "<p>Ngày nhận hàng: <strong id='order_status'>" . $order_detail['received_date'] . "</strong></p>" .
                "<div class='tp-product-details-review-form-rating d-flex align-items-center'>" .
                "<p>Đánh giá của bạn :</p>" .
                "<div class='tp-product-details-review-form-rating-icon d-flex align-items-center'>" .
                "<div class='star-widget'>" .
                "<input type='radio' name='star' id='rate-5' value='5'>" .
                "<label for='rate-5'></label>" .
                "<input type='radio' name='star' id='rate-4' value='4'>" .
                "<label for='rate-4'></label>" .
                "<input type='radio' name='star' id='rate-3' value='3'>" .
                "<label for='rate-3'></label>" .
                "<input type='radio' name='star' id='rate-2' value='2'>" .
                "<label for='rate-2'></label>" .
                "<input type='radio' name='star' id='rate-1' value='1'>" .
                "<label for='rate-1'></label>" .
                "</div>" .
                "</div>" .
                "</div>" .
                "<button type='button' onclick='order_review(this)' order_id='" . $order_id . "' class='btn btn-success w-100'>Đánh giá đơn hàng</button>";
        }
    } else {
        $cancel_order = " <button disabled type='button' class='btn btn-danger w-100'>Đơn hàng đã bị hủy</button>";
    }
    $data = [
        //Thông tin đơn hàng
        'order_code' => $order_detail['order_code'],
        'order_address' => $order_detail['address'],
        'order_phone' => $order_detail['phone'],
        'order_note' => $order_detail['note'],
        'order_pay' => $order_detail['pay'],
        'order_status' => $order_detail['status'],
        'cancel_order' => $cancel_order,
        'payment_methods' => $order_detail['payment_methods'],
        //Danh sách sản phẩm
        'list_order_detail' => $string, //Danh sách sản phẩm
        'total_price' => currency_format($order_detail['total_price']), //Tổng tiền thanh toán
        'shipping_cost' => currency_format($order_detail['shipping_cost']), //Tiền vận chuyển
        'discount' => currency_format($order_detail['discount']),
        'total' => currency_format($total), //Tiền vận chuyển
    ];
    echo json_encode($data);
}

function list_order_ajaxAction() //Lấy danh sách đơn hàng theo trạng thái đơn hàng
{
    $status = $_POST['status'];
    $customer_id = info_login("id");
    $list_order = get_list_order($status, $customer_id); //Lấy danh sách
    $string = "";
    foreach ($list_order as $item) {
        $string .= "<tr>" .
            "<th scope='row'>" . $item['order_code'] . "</th>" .
            "<td data-info='title'>" . $item['time'] . "</td>" .
            "<td data-info='status done'>" . $item['status'] . "</td>" .
            "<td><button type='button' order_id='" . $item['id'] . "'  class='btn btn-primary' onclick='detail_order(this)' data-bs-toggle='modal' data-bs-target='#producQuickViewModal'>Xem chi tiết</button></td>" .
            "</tr>";
    }
    echo $string;
}

function cancel_order_ajaxAction() //Hủy đơn hàng
{
    $order_id  = $_POST['order_id'];
    cancel_order_by_id($order_id); //Chuyển trạng thái thành hủy đơn hàng
    echo $order_id;
}

function order_success_ajaxAction() //Đã nhận hàng
{
    $order_id  = $_POST['order_id'];
    order_success_by_id($order_id); //Chuyển trạng thái thành công
    echo $order_id;
}

function order_review_ajaxAction() //Đánh giá đơn hàng
{
    $order_id  = $_POST['order_id'];
    $data = [
        'star' => $_POST['star'],
    ];
    order_review($order_id, $data);
    echo $order_id;
}

function update_img_ajaxAction() //Cập nhật ảnh đại diện người dùng
{
    $upload = "admin/img/";
    $targetFile = $upload . basename($_FILES["file"]["name"]);
    $duoiFile = ['jpg', 'png', 'jpeg', 'gif', 'tiff'];
    $duoiImg = pathinfo($targetFile, PATHINFO_EXTENSION);
    if (in_array($duoiImg, $duoiFile)) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            $data = [
                'status' => 'success',
                'targetFile' => $_FILES["file"]["name"],
            ];
            $id = info_login("id");
            update_img_customer(array('img' => $_FILES["file"]["name"]), $id); //Cập nhật ảnh cho khách hàng
            echo json_encode($data);
        } else {
            echo json_encode(array('status' => 'error'));;
        }
    } else {
        echo json_encode(array('status' => 'error'));;
    }
}
function indexAction()
{
    $id = info_login("id");
    $username = $_SESSION['user_login'];
    $data['list_order'] = list_order();
    $data['users'] = get_user_by_id($username);
    $data['list_chat'] = get_list_chat_by_id($id);
    load_view("main", $data);
}

function ajaxAction()
{
    if (!empty($_POST['number'])) {
        $number = $_POST['number'];
        $upload = "admin/img/";
        $targetFile = $upload . basename($_FILES["file"]["name"]);
        $duoiFile = ['jpg', 'png', 'jpeg', 'gif', 'tiff'];
        $duoiImg = pathinfo($targetFile, PATHINFO_EXTENSION);
        if (in_array($duoiImg, $duoiFile)) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
                $data = [
                    'targetFile' => $targetFile,
                    'number' => $number,
                ];
                echo json_encode($data);
            } else {
                echo json_encode(array('status' => 'error', 'number' => $number,));;
            }
        } else {
            echo json_encode(array('status' => 'error', 'number' => $number,));;
        }
    }
}

function chatAjaxAction()
{
    $message = $_POST['message'];
    $id = info_login("id");
    $data = [
        'message' => $message,
        'customer_id' => $id,
        'status' => 0,
    ];
    add_chat($data);
    $result = get_list_chat_by_id($id);
    echo json_encode($result);
}


function loadChatAjaxAction()
{
    $customer_id = info_login("id");
    $string = "";
    $result = get_list_chat_by_id($customer_id);
    foreach ($result as $item) {
        if ($item['status'] == 0) {
            $string .= "<div class='float-right chat-content-item-right'>" .
                "<p>" . $item['message'] . "</p>" .
                "<span class='text-muted small'>" . $item['created_at'] . "</span>" .
                "</div>";
        }
        ///
        if ($item['status'] == 1) {
            $string .= " <div class='float-left chat-content-item-left'>" .
                "<p>" . $item['message'] . "</p>" .
                "<span class='text-muted small'>" . $item['created_at'] . "</span>" .
                "</div>";
        }
    }
    echo $string;
}
