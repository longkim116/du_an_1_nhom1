<?php
function construct()
{
    load_module('index');
}

function indexAction()
{
}

function add_catAction() //Thêm danh mục
{
    global $error, $cat_name, $file;
    if (isset($_POST['add_cat'])) {
        $error = [];
        //Kiểm tra cat_name
        if (empty($_POST['cat_name'])) {
            $error['cat_name'] = "Không được để trống";
        } else {
            $cat_name = $_POST['cat_name'];
        }
        ////Kiểm tra file
        if (empty($_FILES['file']['name'])) {
            $error['file'] = "Không được để trống";
        } else {
            if (is_file_img($_FILES['file']['name'])) {
                move_uploaded_file($_FILES['file']['tmp_name'], "img/" . $_FILES['file']['name']);
                $file = $_FILES['file']['name'];
            } else {
                $error['file'] = 'Không đúng định dạng ảnh';
            }
        }
        //Kết luận
        if (empty($error)) {
            $data_cat = [
                'title' => $cat_name,
                'image' => $file,
                'creator' => $_SESSION['admin_login']
            ];
            $error['account'] = "Thêm thành công";
            add_cat($data_cat);
        }
    }
    load_view('add_cat');
}
function delete_catAction() //Xóa danh mục
{
    $id = $_GET['id'];
    delete_cat($id);
    redirect('?mod=category&action=list_cat');
}
function update_catAction() //Sửa danh mục
{
    global $error;
    $id = $_GET['id'];
    $data['cat'] = get_cat_by_id($id);
    if (isset($_POST['update_cat'])) {
        $error = [];
        //kiểm tra cat_name
        if (empty($_POST['cat_name'])) {
            $error['cat_name'] = "Không được để trống";
        } else {
            $cat_name = $_POST['cat_name'];
        }
        ////Kiểm tra file
        if (empty($_FILES['file']['name'])) {
            $error['file'] = "Không được để trống";
        } else {
            if (is_file_img($_FILES['file']['name'])) {
                move_uploaded_file($_FILES['file']['tmp_name'], "img/" . $_FILES['file']['name']);
                $file = $_FILES['file']['name'];
            } else {
                $error['file'] = 'Không đúng định dạng ảnh';
            }
        }
        //Kết luận
        if (empty($error)) {
            $data_update_cat = [
                'title' => $cat_name,
                'image' => $file,
            ];
            $error['account'] = "Sửa thành công";
            update_cat($data_update_cat, $id);
        }
    }
    $data['cat'] = get_cat_by_id($id);
    load_view('update_cat', $data);
}
function list_catAction() //Danh sách danh mục
{
    $data['list_cat'] = get_list_cat();
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
                update_action_cat($action, $item);
            }
        }
    }
    //
    $data['list_cat'] = get_list_cat();
    load_view("list_cat", $data);
}
