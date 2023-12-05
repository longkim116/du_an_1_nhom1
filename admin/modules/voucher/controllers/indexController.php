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
    $status = (!empty($_GET['status'])) ? $_GET['status'] : "";
    $page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $num_rows = 5;
    $start = ($page - 1) * $num_rows;
    $data['num_rows'] = $num_rows;
    $data['num_voucher'] = num_voucher(); //Tổng voucher
    $data['apply'] = voucher_apply(); //Đã áp dụng
    $data['un_apply'] = voucher_un_apply(); //Chưa áp dụng
    $data['list_voucher'] = list_voucher($status, $start, $num_rows);
    load_view("list_voucher", $data);
}

function add_voucherAction()
{
    global $error, $name, $price, $status, $quantity;
    if (isset($_POST['add_voucher'])) {
        $error = [];
        //Kiểm tra name
        if (empty($_POST['name'])) {
            $error['name'] = "Không được để trống";
        } else {
            if (exists_voucher($_POST['name'])) { //Kiểm tra xem voucher đã tồn tại chưa
                $name = $_POST['name'];
            } else {
                $error['name'] = "Voucher đã tồn tại";
            }
        }
        //Kiểm tra quantity
        if (empty($_POST['quantity'])) {
            $error['quantity'] = "Không được để trống";
        } else {
            if (filter_var($_POST['quantity'], FILTER_VALIDATE_INT) && ($_POST['quantity'] >= 0)) {
                $quantity = $_POST['quantity'];
            } else {
                $error['quantity'] = "Không đúng định dạng";
            }
        }
        //Kiểm tra price
        if (empty($_POST['price'])) {
            $error['price'] = "Không được để trống";
        } else {
            if (filter_var($_POST['price'], FILTER_VALIDATE_INT) && ($_POST['price'] > 0)) {
                $price = $_POST['price'];
            } else {
                $error['price'] = "Không đúng định dạng";
            }
        }
        //Kiểm tra status
        if (empty($_POST['status'])) {
            $error['status'] = "Không được để trống";
        } else {
            $status = $_POST['status'];
        }
        //Kết luận
        if (empty($error)) {
            $data = [
                'voucher_code' => $name,
                'creator' => $_SESSION['admin_login'],
                'discount_amount' => $price,
                'status' => $status,
                'quantity' => $quantity,
            ];
            add_voucher($data);
            $error['account'] = "Thêm thành công";
        }
    }
    load_view("add_voucher");
}

function update_voucherAction()
{
    global $error, $voucher_code, $discount_amount, $quantity, $status;
    $id = $_GET['id'];
    $data['voucher'] = get_voucher_by_id($id);
    if (isset($_POST['update_voucher'])) {
        $error = [];
        //Kiểm tra voucher_code
        if (empty($_POST['voucher_code'])) {
            $error['voucher_code'] = "Không được để trống";
        } else {
            $voucher_code = $_POST['voucher_code'];
        }
        //Kiểm tra quantity
        if (empty($_POST['quantity'])) {
            $error['quantity'] = "Không được để trống";
        } else {
            if (filter_var($_POST['quantity'], FILTER_VALIDATE_INT) && ($_POST['quantity'] > 0)) {
                $quantity = $_POST['quantity'];
            } else {
                $error['quantity'] = "Không đúng định dạng";
            }
        }
        //Kiểm tra discount_amount
        if (empty($_POST['discount_amount'])) {
            $error['discount_amount'] = "Không được để trống";
        } else {
            if (filter_var($_POST['discount_amount'], FILTER_VALIDATE_INT) && ($_POST['discount_amount'] > 0)) {
                $discount_amount = $_POST['discount_amount'];
            } else {
                $error['discount_amount'] = "Không đúng định dạng";
            }
        }
        //Kiểm tra status
        if (empty($_POST['status'])) {
            $error['status'] = "Không được để trống";
        } else {
            $status = $_POST['status'];
        }
        //Kết luận
        if (empty($error)) {
            $data_voucher = [
                'voucher_code' => $voucher_code,
                'creator' => $_SESSION['admin_login'],
                'discount_amount' => $discount_amount,
                'status' => $status,
                'quantity' => $quantity,

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
