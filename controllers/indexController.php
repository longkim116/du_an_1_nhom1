<?php
function construct()
{
    load_module('index');
}

function list_rolesAction()
{
    //Tác vụ
    if (isset($_POST['btn_apply'])) {
        if (!empty($_POST['action'])) {
            $action = $_POST['action'];
        } else {
            $action = 0;
        }
        if (!empty($_POST['checkitem'])) {
            $checkitem = $_POST['checkitem'];
            foreach ($checkitem as $item) {
                update_action($action, $item);
            }
        }
    }
    //
    $page = (!empty($_GET['page'])) ? $_GET['page'] : 1; //Toán tử 3 ngôi 
    $num_rows = 5; //Số bản ghi hiển thị trong 1 trang
    $start = ($page - 1) * $num_rows;
    $data['num_rows'] = $num_rows;
    $data['start'] = $start;
    $data['list_roles'] = get_list_roles($start, $num_rows); 
    load_view("list_roles", $data);
}
function add_rolesAction()
{
    global $error, $title;
    if (isset($_POST['add_roles'])) {
        $error = [];
        //Kiểm tra tên
        if (empty($_POST['title'])) {
            $error['title'] = "Không được để trống";
        } else {
            $title = $_POST['title'];
        }
        //Kiểm tra Price
        
        //Kết luận 
        if (empty($error)) {
            //THỰC HIỆN THÊMm
            $data_roles = [ //Dữ liệu để thêm vào database
                'role_name' => $title,
            ];
            add_roles($data_roles); //Hàm thêm dữ liệu 
            $error['account'] = "Thêm thành công";
        }
    }
    load_view("add_roles");
}
function update_rolesAction()
{
    global $error, $title;
    $id = $_GET['id'];
    echo $id;
    $data['roles'] = get_roles_by_id($id);//Lấy dữ liệu của 1 bản ghi bằng id
    if (isset($_POST['update_roles'])) {
        $error = [];
        //Kiểm tra tên
        if (empty($_POST['title'])) {
            $error['title'] = "Không được để trống";
        } else {
            $title = $_POST['title'];
        }
        //Kết luận 
        if (empty($error)) {
            //THỰC HIỆN THÊM
            $data_roles = [ //Dữ liệu để thêm vào database
                'role_name' => $title,
            ];
            update_roles($data_roles, $id); //Hàm sửa dữ liệu 
            $error['account'] = "Sửa thành công";
        }
    }
    $data['roles'] = get_roles_by_id($id); //Lấy dữ liệu của 1 bản ghi bằng id
    load_view("update_roles", $data);
}
function delete_rolesAction()
{
    $id = $_GET['id'];
    delete_roles($id);
    redirect("?mod=roles&action=list_roles");
}
