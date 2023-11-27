<?php
function construct()
{
    load_module('index');
}

function indexAction()
{
}
function list_transportAction()
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
    $page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $num_rows = 5;
    $start = ($page - 1) * $num_rows;
    $data['num_rows'] = $num_rows;
    $data['list_transport'] = list_transport($start, $num_rows);
    load_view("list_transport", $data);
}

function add_transportAction()
{
    global $error, $name, $price;
    if (isset($_POST['add_transport'])) {
        $error = [];
        //Kiểm tra name
        if (empty($_POST['name'])) {
            $error['name'] = "Không được để trống";
        } else {
            $name = $_POST['name'];
        }
        //Kiểm tra price
        if (empty($_POST['price'])) {
            $error['price'] = "Không được để trống";
        } else {
            if (filter_var($_POST['price'], FILTER_VALIDATE_INT)) {
                $price = $_POST['price'];
            } else {
                $error['price'] = "Không đúng định dạng";
            }
        }
        //Kết luận
        if (empty($error)) {
            $data = [
                'transporters' => $name,
                'creator' => $_SESSION['admin_login'],
                'price' => $price
            ];
            add_transport($data);
            $error['account'] = "Thêm thành công";
        }
    }
    load_view("add_transport");
}

function update_transportAction()
{
    global $error, $name, $price;
    $id = $_GET['id'];
    $data['transport'] = get_transport_by_id($id);
    if (isset($_POST['update_transport'])) {
        $error = [];
        //Kiểm tra name
        if (empty($_POST['name'])) {
            $error['name'] = "Không được để trống";
        } else {
            $name = $_POST['name'];
        }
        //Kiểm tra price
        if (empty($_POST['price'])) {
            $error['price'] = "Không được để trống";
        } else {
            if (filter_var($_POST['price'], FILTER_VALIDATE_INT)) {
                $price = $_POST['price'];
            } else {
                $error['price'] = "Không đúng định dạng";
            }
        }
        //Kết luận
        if (empty($error)) {
            $data_transport = [
                'transporters' => $name,
                'creator' => $_SESSION['admin_login'],
                'price' => $price
            ];
            update_transport($data_transport, $id);
            $error['account'] = "Sửa thành công";
        }
    }
    $data['transport'] = get_transport_by_id($id);
    load_view("update_transport", $data);
}

function delete_transportAction()
{
    $id = $_GET['id'];
    delete_ads($id);
    redirect("?mod=transport&action=list_transport");
}
