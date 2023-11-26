<?php
function construct()
{
    load_module('index');
}

function delete_shippingAction()
{
    $id = $_GET['id'];
    delete_shipping($id);
    redirect("?mod=shipping&action=list_shipping");
}

function list_shippingAction() // danh sách shipping
{
    //Tác vụ
    if (isset($_POST['btn_apply'])) {
        if (!empty($_POST['action'])) {
            $action = $_POST['action'];
        } else {
            $action = 0;
        }
        if (!empty($_POST['checkitem'])) {
            foreach ($_POST['checkitem'] as $item) {
                update_action($action, $item);
            }
        }

    }
    $page = (!empty($_GET['page'])) ? $_GET['page'] : 1; //Toán tử 3 ngôi 
    $num_rows = 5; //Số bản ghi hiển thị trong 1 trang
    $start = ($page - 1) * $num_rows;
    $data['num_rows'] = $num_rows;
    $data['start'] = $start;
    $data['list_shipping'] = get_list_shipping($start, $num_rows); //Hàm lấy danh sách nhà vận chuyển
    load_view("list_shipping", $data);
}

function add_shippingAction()
{
    global $error, $title, $price;
    if (isset($_POST['add_shipping'])) {
        $error = [];
        //Kiểm tra tên
        if (empty($_POST['title'])) {
            $error['title'] = "Không được để trống";
        } else {
            $title = $_POST['title'];
        }
        //Kiểm tra Price
        if (empty($_POST['price'])) {
            $error['price'] = "Không được để trống";
        } else {
            if (filter_var($_POST['price'], FILTER_VALIDATE_INT) && $_POST['price'] > 0) {
                $price = $_POST['price'];
            } else {
                $error['price'] = "KHông đúng định dạng";
            }
        }
        //Kết luận 
        if (empty($error)) {
            //THỰC HIỆN THÊM
            $username =  $_SESSION['admin_login'];
            $data_shipping = [ //Dữ liệu để thêm vào database
                'name' => $title,
                'price' => $price,
                'creator' => $username,
            ];
            add_shipping($data_shipping); //Hàm thêm dữ liệu 
            $error['account'] = "Thêm thành công";
        }
    }
    load_view("add_shipping");
}
function update_shippingAction()
{
    global $error, $title, $price;
    $id = $_GET['id'];
    $data['shipping'] = get_shipping_by_id($id); //Lấy dữ liệu của 1 bản ghi bằng id
    if (isset($_POST['update_shipping'])) {
        $error = [];
        //Kiểm tra tên
        if (empty($_POST['title'])) {
            $error['title'] = "Không được để trống";
        } else {
            $title = $_POST['title'];
        }
        //Kiểm tra Price
        if (empty($_POST['price'])) {
            $error['price'] = "Không được để trống";
        } else {
            if (filter_var($_POST['price'], FILTER_VALIDATE_INT) && $_POST['price'] > 0) {
                $price = $_POST['price'];
            } else {
                $error['price'] = "KHông đúng định dạng";
            }
        }
        //Kết luận 
        if (empty($error)) {
            //THỰC HIỆN THÊM
            $data_shipping = [ //Dữ liệu để thêm vào database
                'name' => $title,
                'price' => $price,
            ];
            update_shipping($data_shipping, $id); //Hàm sửa dữ liệu 
            $error['account'] = "Sửa thành công";
        }
    }
    $data['shipping'] = get_shipping_by_id($id); //Lấy dữ liệu của 1 bản ghi bằng id
    load_view("update_shipping", $data);
}
