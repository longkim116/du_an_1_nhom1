<?php
function add_voucher($data)
{
    db_insert("tb_voucher", $data);
}

function list_voucher($start, $num_rows)
{
    $sql = db_fetch_array("SELECT * FROM `tb_voucher` LIMIT $start,$num_rows");
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
    $num_page = ceil(db_num_rows("SELECT * FROM `tb_voucher`") / $num_rows);
    $page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $padding = "";
    $padding .= "<ul class='pagination pagination-sm m-0 float-right'>";
    $page_prev = $page - 1;
    if ($page > 1) {
        $page_prev = $page - 1;
    }
    $padding .= "  <li class='page-item '><a class='page-link ' href='?mod=ads&action=tb_ads&page={$page_prev}' title=''>&laquo;</a></li>";
    for ($i = 1; $i <= $num_page; $i++) {
        if ($i == $page) {
            $style = "bg-primary text-light";
        } else {
            $style = null;
        }
        $padding .= "  <li class='page-item '><a class='page-link {$style}' href='?mod=ads&action=tb_ads&page={$i}'>{$i}</a></li>";
    }
    $page_next = $num_page;
    if ($page < $num_page) {
        $page_next = $page + 1;
    }
    $padding .= "  <li class='page-item '><a class='page-link ' href='?mod=ads&action=tb_ads&page={$page_next}' title=''>&raquo;</a></li>";
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
    }
    return false;
}
?>