<?php
function add_voucher($data)
{
    db_insert("tb_voucher", $data);
}

function list_voucher($status, $start, $num_rows)
{
    if (!empty($status)) {
        $where = "WHERE `status` = '{$status}'";
    } else {
        $where = "";
    }
    $sql = db_fetch_array("SELECT * FROM `tb_voucher` {$where} LIMIT $start,$num_rows");
    return $sql;
}

function update_voucher($data, $id)
{
    db_update("tb_voucher", $data, "`id` = '{$id}'");
}

function get_voucher_by_id($id)
{
    $sql = db_fetch_row("SELECT * FROM `tb_voucher` WHERE `id`= '{$id}'");
    return  $sql;
}

function get_padding($num_rows)
{
    $status = (!empty($_GET['status'])) ? $_GET['status'] : "";
    if (!empty($status)) {
        $where = "WHERE `status` = '{$status}'";
    } else {
        $where = "";
    }
    $num_page = ceil(db_num_rows("SELECT * FROM `tb_voucher` {$where}") / $num_rows);
    $page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $padding = "";
    $padding .= "<ul class='pagination pagination-sm m-0 float-right'>";
    $page_prev = $page - 1;
    if ($page > 1) {
        $page_prev = $page - 1;
    }
    $padding .= "  <li class='page-item '><a class='page-link ' href='?mod=voucher&action=list_voucher&page={$page_prev}' title=''>&laquo;</a></li>";
    for ($i = 1; $i <= $num_page; $i++) {
        if ($i == $page) {
            $style = "bg-primary text-light";
        } else {
            $style = null;
        }
        $padding .= "  <li class='page-item '><a class='page-link {$style}' href='?mod=voucher&action=list_voucher&page={$i}'>{$i}</a></li>";
    }
    $page_next = $num_page;
    if ($page < $num_page) {
        $page_next = $page + 1;
    }
    $padding .= "  <li class='page-item '><a class='page-link ' href='?mod=voucher&action=list_voucher&page={$page_next}' title=''>&raquo;</a></li>";
    $padding .= "</ul>";
    return $padding;
}

function delete_ads($id)
{
    db_delete("tb_voucher", "`id` = '{$id}'");
}

function update_action($action, $item)
{
    if ($action == 1) {
        db_delete("tb_voucher", "`id` = '{$item}'");
    } else if ($action == 2) {
        db_update("tb_voucher", array('status' => 'Đã áp dụng'), "`id` = '{$item}'");
    } else if ($action == 3) {
        db_update("tb_voucher", array('status' => 'Chưa áp dụng'), "`id` = '{$item}'");
    }
    return false;
}

function exists_voucher($voucher) //Kiểm tra voucher đsã tồn tại chữa
{
    $sql = db_fetch_array("SELECT * FROM `tb_voucher` WHERE `voucher_code` = '{$voucher}'");
    if (!empty($sql)) {
        return false;
    }
    return true;
}
function num_voucher() //Tổng voucher
{
    $sql = db_fetch_array("SELECT * FROM `tb_voucher`");
    return $sql;
}
function voucher_un_apply() //Danh sách chưa áp dụng
{
    $sql = db_fetch_array("SELECT * FROM `tb_voucher` WHERE `status` = 'Chưa áp dụng'");
    return $sql;
}

function voucher_apply() //Danh sách đã áp dụng
{
    $sql = db_fetch_array("SELECT * FROM `tb_voucher` WHERE `status` = 'Đã áp dụng'");
    return $sql;
}
