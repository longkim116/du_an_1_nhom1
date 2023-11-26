<?php
function delete_shipping($id)
{
    db_delete("tb_shipping", "`id`='$id'");
}

function add_shipping($data_shipping) //Hàm thêm dữ liệu 
{
    db_insert("tb_shipping", $data_shipping);
}

function update_action($action, $id)
{
    if ($action == 1) { //Xóa
        db_delete("tb_shipping", "`id` = '{$id}'");
        return true;
    }
    return false;
}


function get_list_shipping($start, $num_rows) //Hám lấy danh sách nhà vận chuyển $start=> bản ghi đàu tiền,từ $start lấy thêm $num_rows bản ghi nữa
{
    $sql = db_fetch_array("SELECT * FROM `tb_shipping` LIMIT $start, $num_rows");
    return $sql;
}
function get_padding($num_rows)
{
    $num_page = ceil(db_num_rows("SELECT * FROM `tb_shipping`") / $num_rows); //Làm tròn số trang 
    $page = (!empty($_GET['page'])) ? $_GET['page'] : 1; //lấy dữ liệu GET['page'] trên url
    $padding = "";
    $padding .= "<ul class='pagination pagination-sm m-0 float-right'>";
    $page_prev = 1;
    if ($page > 1) {
        $page_prev = $page - 1;
    }
    $padding .= "<li class='page-item'><a class='page-link' href='?mod=shipping&action=list_shipping&page={$page_prev}' title=''>&laquo;</a></li>";

    for ($i = 1; $i <= $num_page; $i++) {
        if ($i == $page) {
            $style = 'bg-info text-light';
        } else {
            $style = null;
        }
        $padding .= "<li class='page-item'><a class='page-link {$style}' href='?mod=shipping&action=list_shipping&page={$i}'>{$i}</a></li>";
    }
    $page_next = $num_page;
    if ($page < $num_page) {
        $page_next = $page + 1;
    }
    $padding .= "<li class='page-item '><a class='page-link' href='?mod=shipping&action=list_shipping&page={$page_next}' title=''>&raquo;</a></li>";

    $padding .= "</ul>";
    return $padding;
}

function get_shipping_by_id($id) //Lấy dữ liệu của 1 bản ghi bằng id
{
    $sql = db_fetch_row("SELECT * FROM `tb_shipping` WHERE `id` = {$id}");
    return $sql;
}

function update_shipping($data_shipping, $id) //Hàm sửa dữ liệu
{
    db_update("tb_shipping", $data_shipping, "`id` = {$id}");
}
