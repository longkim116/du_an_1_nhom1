<?php
function get_user_by_id($username) //Lấy thông tin user
{
    $sql = db_fetch_row("SELECT * FROM `tb_customers` WHERE `username` = '$username'");
    return $sql;
}

function update_user($username, $data_update) //Cập nhật thông tin user
{
    db_update("tb_customers", $data_update, "`username` = '$username' ");
}

function list_order() //Lấy danh sachs đặt hàng
{
    $id = info_login("id");
    $sql = db_fetch_array("SELECT * FROM `tb_orders` WHERE `customer_id` = '$id' ORDER BY `time` DESC ");
    return $sql;
}

function exits_password($password)
{
    $username = user_login();
    $sql = db_num_rows("SELECT * FROM `tb_customers` WHERE `username` = '$username' AND `password` = '$password'");
    if ($sql > 0) {
        return true;
    }
    return false;
}
function update_password_reset($username, $data)
{
    db_update('tb_customers', $data, "`username`='$username'");
}

function get_list_chat_by_id($id)
{
    $sql = db_fetch_array("SELECT * FROM `tb_messages` WHERE `customer_id` = {$id}");
    return $sql;
}
function add_chat($data) //Thêm nọi dung cuộc trò chuyện
{
    db_insert("tb_messages", $data);
}

function  get_detail_order_by_id($order_id) //Lấy đơn hàng chi tiết
{
    $sql = db_fetch_row("SELECT * FROM `tb_orders` WHERE `id` = {$order_id}");
    return $sql;
}

function get_list_order($status, $customer_id) //Lấy danh sách
{
    if ($status == "Tất cả đơn hàng") {
        $where = "";
    } else {
        $where = "AND `status` = '{$status}'";
    }
    $sql = db_fetch_array("SELECT * FROM `tb_orders` WHERE `customer_id` = {$customer_id} {$where} ORDER BY `time` DESC ");
    return $sql;
}

function cancel_order_by_id($order_id) //Chuyển trạng thái thành hủy đơn hàng
{
    db_update("tb_orders", array("status" => "Đã hủy"), "`id` = {$order_id}");
}

function order_success_by_id($order_id) //Chuyển trạng thái thành công
{
    $date = date('Y-m-d H:i:s');
    db_update("tb_orders", array("pay" => "Đã thanh toán", "status" => "Thành công", "received_date" => $date), "`id` = {$order_id}");
}

function order_review($order_id, $data) //Đánh giá đơn hàng
{
    db_update("tb_orders", $data, "`id` = {$order_id}");
}

function update_img_customer($data, $id) //Cập nhật ảnh cho khách hàng
{
    db_update("tb_customers", $data, "`id` = {$id}");
}
