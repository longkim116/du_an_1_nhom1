<?php
function construct()
{
    load_module('index');
}

function indexAction()
{
}

function add_widgetAction()
{
    global $error, $title, $block_name, $desc, $phone, $address, $email;
    if (isset($_POST['add_widget'])) {
        $error = [];
        //Kiểm tra block_name
        if (empty($_POST['block_name'])) {
            $error['block_name'] = "Không được để trống";
        } else {
            $block_name = $_POST['block_name'];
        }
        //Kiểm tra title
        if (empty($_POST['title'])) {
            $error['title'] = "Không được để trống";
        } else {
            $title = $_POST['title'];
        }
        //Kiểm tra desc
        if (empty($_POST['desc'])) {
            $error['desc'] = "Không được để trống";
        } else {
            $desc = $_POST['desc'];
        }
        //Kiểm tra address
        if (empty($_POST['address'])) {
            $error['address'] = "Không được để trống";
        } else {
            $address = $_POST['address'];
        }
        //Kiểm tra phone
        if (empty($_POST['phone'])) {
            $error['phone'] = "Không được để trống";
        } else {
            $phone = $_POST['phone'];
        }
        //Kiểm tra email
        if (empty($_POST['email'])) {
            $error['email'] = "Không được để trống";
        } else {
            $email = $_POST['email'];
        }
        //Kết luận
        if (empty($error)) {
            $data_widget = [
                'block_name'  => $block_name,
                'title' => $title,
                'introduce' => $desc,
                'address' => $address,
                'phone' => $phone,
                'email' => $email,
            ];
            add_widget($data_widget);
            $error['account'] = "Thêm thành công";
        }
    }
    load_view("add_widget");
}

function list_widgetAction()
{
    global $num_rows;
    $page =  (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $num_rows = 5;
    $start = ($page - 1) * $num_rows;
    $data['list_widget'] = list_widget($start, $num_rows);
    load_view("list_widget", $data);
}

function update_widgetAction()
{
    $id = $_GET['id'];
    global $error, $title, $block_name, $address, $phone, $email, $introduce;
    $data['widget'] = get_widget_by_id($id);
    if (isset($_POST['update_widget'])) {
        $error = [];
        //Kiểm tra block_name
        if (empty($_POST['block_name'])) {
            $error['block_name'] = "Không được để trống";
        } else {
            $block_name = $_POST['block_name'];
        }
        //Kiểm tra title
        if (empty($_POST['title'])) {
            $error['title'] = "Không được để trống";
        } else {
            $title = $_POST['title'];
        }
        //Kiểm tra desc
        if (empty($_POST['introduce'])) {
            $error['introduce'] = "Không được để trống";
        } else {
            $introduce = $_POST['introduce'];
        }
        //Kiểm tra address
        if (empty($_POST['address'])) {
            $error['address'] = "Không được để trống";
        } else {
            $address = $_POST['address'];
        }
        //Kiểm tra phone
        if (empty($_POST['phone'])) {
            $error['phone'] = "Không được để trống";
        } else {
            $phone = $_POST['phone'];
        }
        //Kiểm tra email
        if (empty($_POST['email'])) {
            $error['email'] = "Không được để trống";
        } else {
            $email = $_POST['email'];
        }
        //Kết luận
        if (empty($error)) {
            $data_widget = [
                'block_name'  => $block_name,
                'title' => $title,
                'introduce' => $introduce,
                'address' => $address,
                'phone' => $phone,
                'email' => $email,
            ];
            update_widget($data_widget, $id);
            $error['account'] = "Sửa thành công";
        }
    }
    $data['widget'] = get_widget_by_id($id);
    load_view("update_widget", $data);
}

function delete_widgetAction()
{
    $id = $_GET['id'];
    delete_widget($id);
    redirect("?mod=dashboard&action=list_widget");
}
