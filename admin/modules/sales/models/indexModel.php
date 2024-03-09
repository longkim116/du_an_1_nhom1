<?php
function add_status_by_id($data_status, $id)
{
    db_update("tb_orders", $data_status, "`id` = '{$id}'");
}

function get_padding($num_rows)
{
    $status = (!empty($_GET['status'])) ? $_GET['status'] : null;
    $sql = null;
    $url = null;
    if (!empty($status)) {
        $url = "&status={$status}";
        $sql = "WHERE `status` = '{$status}'";
    }
    $num_page = ceil(db_num_rows("SELECT * FROM `tb_orders` {$sql} ") / $num_rows);
    $page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $padding = "";
    $padding .= "<ul class='pagination pagination-sm m-0 float-right'>";
    $page_prev = 1;
    if ($page > 1) {
        $page_prev = $page - 1;
    }
    $padding .= "<li class='page-item '><a class='page-link' href='?mod=sales&action=list_order{$url}&page={$page_prev}' title=''>&laquo;</a></li>";
    for ($i = 1; $i <= $num_page; $i++) {
        if ($i == $page) {
            $style = 'bg-primary text-light';
        } else {
            $style = null;
        }
        $padding .= "<li class='page-item '><a class='page-link {$style}' href='?mod=sales&action=list_order{$url}&page={$i}'>{$i}</a></li>";
    }
    $page_next = $num_page;
    if ($page < $num_page) {
        $page_next = $page + 1;
    }
    $padding .= "<li class='page-item '><a class='page-link' href='?mod=sales&action=list_order{$url}&page={$page_next}' title=''>&raquo;</a></li>";
    $padding .= "</ul>";
    return $padding;
}

function list_order($start, $num_rows, $status) //Danh sách những khách hàng đã mua
{
    if (!empty($status)) {
        $status = "WHERE `status` = '{$status}'";
    }
    $sql = db_fetch_array("SELECT * FROM `tb_orders` {$status} ORDER BY `time` DESC LIMIT $start, $num_rows  ");
    return $sql;
}

function detail_order($id)
{
    $sql = db_fetch_row("SELECT * FROM `tb_orders` WHERE `id` = '$id'");
    return $sql;
}

function num_orders() //Tổng đơn hàng
{
    return db_num_rows("SELECT * FROM `tb_orders`");
}
function num_posts_pending() //Chờ xác nhận
{
    return db_num_rows("SELECT * FROM `tb_orders` WHERE `status`= 'Chờ xác nhận'");
}
function num_prepare_orders() //Chuẩn bị đơn hàng
{
    return db_num_rows("SELECT * FROM `tb_orders` WHERE `status`= 'Chuẩn bị đơn hàng'");
}
function num_orders_delivery() //Đang giao hàng
{
    return db_num_rows("SELECT * FROM `tb_orders` WHERE `status`= 'Đang giao hàng'");
}

function num_orders_success() //Thành công
{
    return db_num_rows("SELECT * FROM `tb_orders` WHERE `status`= 'Thành công'");
}
function num_orders_cancelled() //Đã hủy
{
    return db_num_rows("SELECT * FROM `tb_orders` WHERE `status`= 'Đã hủy'");
}
function delete_order($id)
{
    db_delete("tb_orders", "`id` = '{$id}'");
}

function total_order() //Danh sách đơn đặt hàng
{
    $sql = db_fetch_row("SELECT SUM(`quantity`) AS `total` FROM `tb_orders` ");
    return $sql;
}

function update_action($action, $item) //Cập nhật tác vụ
{
    if ($action == 1) {
        db_delete("tb_orders", "`id` = '{$item}'");
        return true;
    } else if ($action == 2) {
        $status = "Chờ xác nhận";
    } else if ($action == 3) {
        $status = "CHuẩn bị đơn hàng";
    } else if ($action == 4) {
        $status = "Đang giao hàng";
    } else if ($action == 5) {
        $status = "Thành công";
    } else {
        return false;
    }
    $data = [
        'status' => $status,
    ];
    db_update("tb_orders", $data, "`id` = '{$item}'");
}

function list_order_seach($search) //Danh sách tìm kiếm
{
    if (!empty($search)) {
        $sql = db_fetch_array("SELECT * FROM `tb_orders` WHERE `order_code` LIKE '%{$search}%'");
        return $sql;
    }
    return false;
}
