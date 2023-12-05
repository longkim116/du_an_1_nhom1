<?php
function update_password_reset($username, $data)
{
    db_update('tb_users', $data, "`username`='$username'");
}

function exits_password($password)
{
    $username = user_login();
    $sql = db_num_rows("SELECT * FROM `tb_users` WHERE `username` = '$username' AND `password` = '$password'");
    if ($sql > 0) {
        return true;
    }
    return false;
}
function update_user_login($username, $data)
{
    db_update("tb_users", $data, "`username` = '$username'");
}
function get_user_by_username($username) //Lấy thông tin người đang nhập
{
    $sql = db_fetch_row("SELECT * FROM `tb_users` INNER JOIN `tb_roles` ON tb_users.role_id = tb_roles.id WHERE `username` = '{$username}' ");
    if (!empty($sql))
        return $sql;
}

function exits_active($token)
{
    $sql = db_num_rows("SELECT * FROM `tb_users` WHERE `active_token` = '$token'");
    if ($sql > 0) {
        return true;
    }
    return false;
}

function check_login($username, $password)
{
    global $conn;
    $sql = db_num_rows("SELECT * FROM `tb_users` WHERE `username` = '$username' AND`password`= '$password'");
    if ($sql > 0) {
        return true;
    }
    return false;
}
function active_users($active_token)
{
    db_update('tb_users', array('is_active' => 1), "`active_token`='$active_token'");
}

function check_active_user($token)
{
    $sql = db_num_rows("SELECT * FROM `tb_users` WHERE `active_token` = '$token'");
    if ($sql > 0) {
        return true;
    }
    return false;
}

function check_active_user_vadid($token)
{
    $sql = db_num_rows("SELECT * FROM `tb_users` WHERE `active_token` = '$token' AND `is_active`= '0'");
    if ($sql > 0) {
        return true;
    }
    return false;
}

function check_email($email)
{
    $sql = db_num_rows("SELECT * FROM `tb_users` WHERE `email` = '$email'");
    if ($sql > 0) {
        return true;
    }
    return false;
}
function update_reset_token($data, $email)
{
    db_update('tb_users', $data, "`email`='$email'");
}

function check_reset_token($reset_token)
{
    $sql = db_num_rows("SELECT * FROM `tb_users` WHERE `reset_token` = '$reset_token'");
    if ($sql > 0) {
        return true;
    }
    return false;
}

function update_password($data, $reset_token)
{
    db_update('tbl_users', $data, "`reset_token`='$reset_token'");
}
/////

function add_users($data) //Thêm mới thành viên
{
    db_insert("tb_users", $data);
}

function get_list_users() //Lấy danh sách quản trị viên
{
    $sql = db_fetch_array("SELECT * FROM `tb_roles` INNER JOIN `tb_users` ON tb_roles.id = tb_users.role_id
     WHERE NOT tb_users.username = 'vuhonglinh123'");
    return $sql;
}


function delete_user($id) //Xóa quản trị viên
{
    db_query("DELETE FROM `tb_users` WHERE `user_id` = '$id'");
}


function exits_user($username, $email)
{
    $sql = db_num_rows("SELECT * FROM `tb_users` WHERE `username` = '$username' OR `email` = '$email'");
    if ($sql == 0) {
        return true;
    }
    return false;
}

function get_padding($num_rows)
{
    $page = (empty($_GET['page']) ? 1 : $_GET['page']);
    $num_page = ceil(db_num_rows("SELECT * FROM `tb_users`") / $num_rows);
    $padding = "";
    $padding .= "<ul class='pagination pagination-sm m-0 float-right'>";
    $page_prev = 1;
    if ($page > 1) {
        $page_prev = $page - 1;
    }
    $padding .= " <li class='page-item '><a class='page-link' href='?mod=users&controller=team&page={$page_prev}' title=''>&laquo;</a></li>";
    for ($i = 1; $i <= $num_page; $i++) {
        if ($i == $page) {
            $style = 'bg-primary text-light';
        } else {
            $style = null;
        }
        $padding .= " <li class='page-item '><a class='page-link {$style}' href='?mod=users&controller=team&page={$i}' title=''>{$i}</a></li>";
    }
    $page_next = $num_page;
    if ($page < $num_page) {
        $page_next = $page + 1;
    }
    $padding .= " <li class='page-item '><a class='page-link' href='?mod=users&controller=team&page={$page_next}' title=''>&raquo;</a></li>";

    $padding .= "</ul>";
    return $padding;
}
function get_user_by_id($id) //Lấy dữ liệu user để cập nhật
{
    $sql = db_fetch_row("SELECT * FROM `tb_users` INNER JOIN `tb_roles` ON tb_users.role_id = tb_roles.id WHERE `user_id` = {$id}");
    return $sql;
}

function update_user($data_user, $id) //Upload lại dữ liêu useradmin
{
    db_update("tb_users", $data_user, "`user_id` = {$id}");
}

function list_roles() //Lấy danh sách phân quyền
{
    $sql = db_fetch_array("SELECT * FROM `tb_roles`");
    return $sql;
}

function exits_role($role_name) //Kiểm tra xem đã tồn tại hay chưa
{
    $sql = db_fetch_array("SELECT * FROM `tb_roles` WHERE `role_name` = '{$role_name}'");
    if (!empty($sql)) {
        return false;
    } else {
        return true;
    }
}

function add_role($data) //Thêm phân quyền
{
    db_insert("tb_roles", $data);
}

function get_num_role_id($id) //Lấy tổng só lượng của phong ban
{
    $sql = db_fetch_array("SELECT * FROM `tb_users` WHERE `role_id` = {$id}");
    return $sql;
}

function get_role_by_id($id) //LẤY CHI TIẾT PHÒNG BAN
{
    $sql = db_fetch_row("SELECT * FROM `tb_roles` WHERE `id` = {$id}");
    return $sql;
}

function update_role($data_role, $id) //Cập nhật role
{
    db_update("tb_roles", $data_role, "`id` = {$id}");
}

function  delete_role($id) //Xóa phân quyền
{
    db_delete("tb_roles", "`id` = {$id}");
    db_delete("tb_users", "`role_id` = {$id}");
}
