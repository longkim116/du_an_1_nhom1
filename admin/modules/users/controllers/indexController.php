<?php
function construct()
{
    load_module('index');
}

function indexAction()
{
}

function deleteAction()
{
    $id = $_GET['id'];
    delete_user($id);
    redirect("?mod=users&action=main");
}


function updateAction()
{
    global $error, $fullname, $username, $password, $email, $address, $phone_number;
    $id = $_GET['id'];
    $data['user'] = get_user_by_id($id);
    $data['list_roles'] = list_roles(); //Danh sách phân quyền
    if (isset($_POST['update_user'])) {
        if (empty($_POST['fullname'])) {
            $error['fullname'] = "Không được để trống";
        } else {
            $fullname = $_POST['fullname'];
        }
        //Kiểm tra username
        // if (empty($_POST['username'])) {
        //     $error['username'] = "Không được để trống";
        // } else {
        //     if (is_username($_POST['username'])) {
        //         $username = $_POST['username'];
        //     } else {
        //         $error['username'] = "Tên đăng nhập không đúng định dạng";
        //     }
        // }
        //Kiểm tra password
        // if (empty($_POST['password'])) {
        //     $error['password'] = "Không được để trống";
        // } else {
        //     if (is_password($_POST['password'])) {
        //         $password = md5($_POST['password']);
        //     } else {
        //         $error['password'] = "Mật khẩu không đúng định dạng";
        //     }
        // }
        //Kiểm tra email
        if (empty($_POST['email'])) {
            $error['email'] = "Không được để trống";
        } else {
            if (is_email($_POST['email'])) {
                $email = $_POST['email'];
            } else {
                $error['email'] = "Email không đúng định dạng";
            }
        }
        //Kiểm tra phone_number
        if (empty($_POST['phone_number'])) {
            $error['phone_number'] = "Không được để trống";
        } else {
            if (is_tel($_POST['phone_number'])) {
                $phone_number = $_POST['phone_number'];
            } else {
                $error['phone_number'] = "Số điện thoại không đúng định dạng";
            }
        }
        //Kiểm tra phone_number
        if (empty($_POST['address'])) {
            $error['address'] = "Không được để trống";
        } else {
            $address = $_POST['address'];
        }
        //Kiểm tra role
        if (empty($_POST['role'])) {
            $error['role'] = "Không được để trống";
        } else {
            $role = $_POST['role'];
        }
        //Kết luận
        if (empty($error)) {
            $data_user = [
                'fullname' => $fullname,
                'email' => $email,
                // 'password' => $password,
                'address' => $address,
                // 'username' => $username,
                'phone_number' => $phone_number,
                'role_id' => $role,
            ];
            update_user($data_user, $id);
            $error['account'] = "Cập nhật thành công";
        }
    }
    $data['user'] = get_user_by_id($id);
    $data['list_roles'] = list_roles(); //Danh sách phân quyền
    load_view("update_team", $data);
}

function delete_role_ajaxAction() //Xóa role
{
    $id = $_POST['id'];
    delete_role($id); //Xóa phân quyền
    $list_roles =  list_roles(); //Danh sách phân quyền
    $string_role = "";
    $count_role = 0;
    foreach ($list_roles as $item) {
        $count_role++;
        $string_role .= "<tr>" .
            "<td>" . $count_role . "</td>" .
            "<td>" . $item['role_name'] . "</td>" .
            "<th>" . count(get_num_role_id($item['id'])) . " nhân viên</th>" .
            "<td class='justify-content-between'>" .
            "<a class='btn btn-info btn-sm' href='?mod=users&action=update_role&id=" . $item['id'] . "' title='Sửa'><i class='fas fa-pencil-alt'></i>Sửa" .
            "</a>";
        if ($item['id'] != 1) {
            $string_role .= "<button class='btn btn-danger btn-sm' onclick='delete_role(this)' id='" . $item['id'] . "' title='Xóa'>Xóa</button>";
        }
        $string_role .= "</td></tr>";
    }
    $string = "<option value=''>---Chọn---</option>";
    foreach ($list_roles as $item) {
        if ($item['id'] == 1) {
            $disabled = "disabled";
        } else {
            $disabled = "";
        }
        $string .= "<option " . $disabled . " value='" . $item['id'] . "'>" . $item['role_name'] . "</option>";
    }
    $list_customer = get_list_users(); //Danh sách quản trị viên
    $list_users = "";
    $count_table = 0;
    foreach ($list_customer as $item) {
        $count_table++;
        $list_users .= "<tr>" .
            "<td>" . $count_table . "</td>" .
            "<td>" . $item['fullname'] . "</td>" .
            "<td>" . $item['username'] . "</td>" .
            "<td>" . $item['email'] . "</td>" .
            "<td>" . $item['phone_number'] . "</td>" .
            "<td>" . $item['role_name'] . "</td>" .
            "<td class='justify-content-between'>" .
            "<a class='btn btn-info btn-sm' href='?mod=users&action=update&id=" . $item['user_id'] . "' title='Sửa'><i class='fas fa-pencil-alt'></i>Sửa</a>" .
            "<a onclick='return confirm('Bạn chắc muốn xóa quản trị viên này không?')' class='btn btn-danger btn-sm' href='?mod=users&action=delete&id=" . $item['user_id'] . "' title='Xóa'><i class='fas fa-trash'></i>" .
            "Xóa" .
            "</a>" .
            "</td>" .
            "</tr>";
    }
    $data = [
        'list_role' => $string_role,
        'list_select' => $string,
        'list_users' => $list_users,
    ];
    echo json_encode($data);
}

function update_roleAction() //Cập nhật role
{
    global $error, $role_name;
    $id = $_GET['id'];
    if (isset($_POST['update_role'])) {
        $error = [];
        if (empty($_POST['role_name'])) {
            $error['role_name'] = "Không được để trống";
        } else {
            $role_name =  $_POST['role_name'];
        }
        //Kết luận
        if (empty($error)) {
            $data_role = [
                'role_name' => $role_name,
            ];
            update_role($data_role, $id); //Cập nhật role
            $error['account'] = "Cập nhật thành công";
        }
    }
    $data['role'] = get_role_by_id($id); //LẤY CHI TIẾT PHÒNG BAN
    load_view("update_role", $data);
}
function mainAction()
{
    $data['list_users'] = get_list_users(); //Danh sách quản trị viên
    $data['list_roles'] = list_roles(); //Lấy danh sách phân quyền
    $data['info_user'] = get_user_by_username(user_login());
    load_view('main', $data);
}

function update_info_ajaxAction() //Xử lý cập nhật thông tin
{
    $error = [];
    $username = $_SESSION['admin_login'];
    $fullname =  $_POST['fullname'];
    $address =  $_POST['address'];
    if (is_tel($_POST['phone_number'])) { //Kiểm tra định dạng đt
        $phone_number = $_POST['phone_number'];
    } else {
        $error['phone_number'] = "Số điện thoại không đúng định dạng!";
    }
    if (is_email($_POST['email'])) { //Kiểm tra định dạng email
        $email = $_POST['email'];
    } else {
        $error['email'] = "Email không đúng định dạng!";
    }
    if (empty($error)) { //Kết luận
        $data_update = [
            'fullname' => $fullname,
            'address' => $address,
            'phone_number' => $phone_number,
            'email' => $email,
        ];
        update_user_login($username, $data_update);
        echo json_encode($data_update);
    } else {
        $error['error'] = 0;
        echo json_encode($error);
    }
}

function change_pass_ajaxAction() //Thay đổi mật khẩu
{
    $error = [];
    #Kiểm tra password
    if (empty($_POST['old_pass'])) {
        $error['account'] = "Bạn vui lòng nhập mật khẩu cũ!";
    } else {
        if (exits_password(md5($_POST['old_pass']))) { //Kiểm tra mật khẩu cũ
            if (empty($_POST['new_pass'])) { //Kiểm tra mật khẩu mới
                $error['new_pass'] = "Vui lòng không để trống mật khẩu mới";
            } else {
                if (is_password($_POST['new_pass'])) {
                    $pass_new = md5($_POST['new_pass']);
                    if (md5($_POST['con_new_pass']) == $pass_new) { //Kiểm tra lại mật khẩu
                        $confirm_pass = md5($_POST['con_new_pass']);
                    } else {
                        $error['con_new_pass'] = "Mật khẩu mới không chính xác";
                    }
                } else {
                    $error['new_pass'] = "Mật khẩu không đúng định dạng";
                }
            }
        } else {
            $error['old_pass'] = "Mật khẩu không chính xác";
        }
    }
    //Kết luận
    if (empty($error)) {
        $data = [
            'password' => $confirm_pass
        ];
        update_password_reset(user_login(), $data);
        echo json_encode(array('status' => 1));
    } else {
        $error['status'] = 0;
        echo json_encode($error);
    }
}

function add_user_ajaxAction() //Thêm quản trị viên
{
    $error = [];
    //Kiểm tra role
    if (empty($_POST['role'])) {
        $error['error'] = "Không được để trống";
    } else {
        $role = $_POST['role'];
    }
    //Kiểm tra address
    if (empty($_POST['address'])) {
        $error['error'] = "Không được để trống";
    } else {
        $address = $_POST['address'];
    }
    //Kiểm tra phone_number
    if (empty($_POST['phone_number'])) {
        $error['error'] = "Không được để trống";
    } else {
        if (is_tel($_POST['phone_number'])) {
            $tel = $_POST['phone_number'];
        } else {
            $error['error'] = "Số điện thoại không đúng định dạng";
        }
    }
    //Kiểm tra email
    if (empty($_POST['email'])) {
        $error['error'] = "Không được để trống";
    } else {
        if (is_email($_POST['email'])) {
            $email = $_POST['email'];
        } else {
            $error['error'] = "Email không đúng định dạng";
        }
    }

    //Kiểm tra password
    if (empty($_POST['password'])) {
        $error['error'] = "Không được để trống";
    } else {
        if (is_password($_POST['password'])) {
            $password = md5($_POST['password']);
        } else {
            $error['error'] = "Mật khẩu không đúng định dạng";
        }
    }
    //Kiểm tra username
    if (empty($_POST['username'])) {
        $error['error'] = "Không được để trống";
    } else {
        if (is_username($_POST['username'])) {
            $username = $_POST['username'];
        } else {
            $error['error'] = "Tên đăng nhập không đúng định dạng";
        }
    }
    //Kiêm tra fullname
    if (empty($_POST['fullname'])) {
        $error['error'] = "Không được để trống";
    } else {
        $fullname = $_POST['fullname'];
    }
    //Kết luận
    if (empty($error)) {
        if (exits_user($username, $email)) {
            $data = [
                'fullname' => $fullname,
                'username' => $username,
                'password' => $password,
                'email' => $email,
                'phone_number' => $tel,
                'address' => $address,
                'creator' => $_SESSION['admin_login'],
                'role_id' => $role,
            ];
            add_users($data);
            $data['list_users'] = "";
            $list_users = get_list_users(); //Danh sách quản trị viên
            $count = 0;
            foreach ($list_users as $item) {
                $count++;
                $data['list_users'] .= "<tr>" .
                    "<td>" . $count . "</td>" .
                    "<td>" . $item['fullname'] . "</td>" .
                    "<td>" . $item['username'] . "</td>" .
                    "<td>" . $item['email'] . "</td>" .
                    "<td>" . $item['phone_number'] . "</td>" .
                    "<td>" . $item['role_name'] . "</td>" .
                    "<td class='justify-content-between'>" .
                    "<a class='btn btn-info btn-sm' href='?mod=users&action=update&id=" . $item['user_id'] . "' title='Sửa'><i class='fas fa-pencil-alt'></i>" .
                    "Sửa" .
                    "</a>" .
                    "<a onclick='return confirm('Bạn chắc muốn xóa quản trị viên này không?')' class='btn btn-danger btn-sm' href='?mod=users&action=delete&id=" . $item['user_id'] . "' title='Xóa'><i class='fas fa-trash'></i>" .
                    " Xóa" .
                    "</a>" .
                    "</td>" .
                    "</tr>";
            }
            echo json_encode($data);
        } else {
            $error['status'] = 0;
            $error['error'] = "Tên đăng nhập hoặc email đã tồn tại";
            echo json_encode($error);
        }
    } else {
        $error['status'] = 0;
        echo json_encode($error);
    }
}


function add_role_ajaxAction() //Thêm phân quyền
{
    $role_name = $_POST['role_name'];
    if (exits_role($role_name)) { //Kiểm tra xem đã tồn tại hay chưa
        $data = [
            'role_name' => $role_name,
        ];
        add_role($data); //Thêm phân quyền
        $list_roles = list_roles();
        $string = "<option value=''>---Chọn---</option>";
        foreach ($list_roles as $item) {
            if ($item['id'] == 1) {
                $disabled = "disabled";
            } else {
                $disabled = "";
            }
            $string .= "<option " . $disabled . " value='" . $item['id'] . "'>" . $item['role_name'] . "</option>";
        }
        $string_role = "";
        $count_role = 0;
        foreach ($list_roles as $item) {
            $count_role++;
            $string_role .= "<tr>" .
                "<td>" . $count_role . "</td>" .
                "<td>" . $item['role_name'] . "</td>" .
                "<th>" . count(get_num_role_id($item['id'])) . " nhân viên</th>" .
                "<td class='justify-content-between'>" .
                "<a class='btn btn-info btn-sm' href='?mod=users&action=update_role&id=" . $item['id'] . "' title='Sửa'><i class='fas fa-pencil-alt'></i>Sửa" .
                "</a>";
            if ($item['id'] != 1) {
                $string_role .= "<button class='btn btn-danger btn-sm' onclick='delete_role(this)' id='" . $item['id'] . "' title='Xóa'>Xóa</button>";
            }
            $string_role .= "</td></tr>";
        }

        $result = [
            'status' => 'success',
            'list_role' => $string,
            'list_roles' => $string_role
        ];
        echo json_encode($result);
    } else {
        echo json_encode(array("status" => "error"));
    }
}
