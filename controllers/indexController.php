<?php
function construct()
{
    load_module('index');
}

function indexAction()
{
}

function list_voucherAction()
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
    $data['list_voucher'] = list_voucher($start, $num_rows);
    load_view("list_voucher", $data);
}

function add_voucherAction()
{
    global $error, $name, $price;
    if (isset($_POST['add_voucher'])) {
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
            if (filter_var($_POST['price'], FILTER_VALIDATE_INT) && ($_POST['price']>0)) {
                $price = $_POST['price'];
            } else {
                $error['price'] = "Không đúng định dạng";
            }
        }
        //Kết luận
        if (empty($error)) {
            $data = [
                'vouchers' => $name,
                'creator' => $_SESSION['admin_login'],
                'price' => $price
            ];
            add_voucher($data);
            $error['account'] = "Thêm thành công";
        }
    }
    load_view("add_voucher");
    
}

function update_voucherAction()
{
    global $error, $name, $price;
    $id = $_GET['id'];
    $data['voucher'] = get_voucher_by_id($id);
    if (isset($_POST['update_voucher'])) {
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
            if (filter_var($_POST['price'], FILTER_VALIDATE_INT) && ($_POST['price']>0)) {
                $price = $_POST['price'];
            } else {
                $error['price'] = "Không đúng định dạng";
            }
        }
        //Kết luận
        if (empty($error)) {
            $data_voucher = [
                'vouchers' => $name,
                'creator' => $_SESSION['admin_login'],
                'price' => $price
            ];
            update_voucher($data_voucher, $id);
            $error['account'] = "Sửa thành công";
        }
    }
    $data['voucher'] = get_voucher_by_id($id);
    load_view("update_voucher", $data);
    header('?mod=voucher&action=list_voucher');
}

function delete_voucherAction()
{
    $id = $_GET['id'];
    delete_ads($id);
    redirect("?mod=voucher&action=list_voucher");
}