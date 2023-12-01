<?php
// function add_roles($data)
// {
//     db_insert("tb_roles", $data);
// }
function get_list_roles($start, $num_rows) //Hám lấy danh sách  $start=> bản ghi đàu tiền,từ $start lấy thêm $num_rows bản ghi nữa
{
    $sql = db_fetch_array("SELECT * FROM `tb_roles` LIMIT $start, $num_rows");
    return $sql;
}
function add_roles($data_roles) //Hàm thêm dữ liệu 
{
    db_insert("tb_roles", $data_roles);
}
function update_roles($data_roles, $id) //Hàm sửa dữ liệu
{
    db_update("tb_roles", $data_roles, "`id` = {$id}");
}
function delete_roles($id)
{
    db_delete("tb_roles", "`id`='$id'");
}

function get_roles_by_id($id) //Lấy roles bằng id
{
    $sql = db_fetch_row("SELECT * FROM `tb_roles` WHERE `id` =  {$id}");
    return $sql;
}