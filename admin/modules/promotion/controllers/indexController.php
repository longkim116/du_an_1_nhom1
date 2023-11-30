<?php
function construct()
{
    load_module("index");
}

function add_promotionAction() //Thêm khuyễn mãi
{
    global $error, $title, $description, $startDate, $endDate, $discount_rate;
    if (isset($_POST["add_promotions"])) {
        $error = [];
        //Kiểm tra title
        if (empty($_POST['title'])) {
            $error['title'] = "Không được để trống";
        } else {
            $title = $_POST['title'];
        }
        //Kiểm tra description
        if (empty($_POST['description'])) {
            $error['description'] = "Không được để trống";
        } else {
            $description = $_POST['description'];
        }
        //Kiểm tra startDate
        if (empty($_POST['startDate'])) {
            $error['date'] = "Không được để trống";
        } else {
            $startDate = $_POST['startDate'];
        }
        //Kiểm tra endDate
        if (empty($_POST['endDate'])) {
            $error['date'] = "Không được để trống";
        } else {
            $endDate = $_POST['endDate'];
        }
        //Kiểm tra discount_rate
        if (empty($_POST['discount_rate'])) {
            $error['discount_rate'] = "Không được để trống";
        } else {
            if (filter_var($_POST['discount_rate'], FILTER_VALIDATE_INT)) {
                $discount_rate = $_POST['discount_rate'];
            } else {
                $error['discount_rate'] = "Không đúng định dạng";
            }
        }
        //Kiểm tra sản phẩm
        if (empty($_POST['product_id'])) {
            $error['check'] = "Không được để trống";
        } else {
            $list_product_id = $_POST['product_id'];
        }
        //Kết luận
        if (empty($error)) {
            $data_promotions = [
                'title' => $title,
                'description' => $description,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'discount_rate' => $discount_rate,
            ];
            $id = add_promotion($data_promotions); //Add vào bảng khuyễn mãi
            foreach ($list_product_id as $key => $item) {
                $data = [
                    'product_id' => $key,
                    'promotion_id' => $id
                ];
                add_product_promotion($data); //Add vào bảng product_promotion
            }
            $error['account'] = "Thêm thành công";
        }
    }
    $data['list_products'] = get_list_products();
    load_view("add_promotion", $data);
}


function list_promotionAction() //Danh sách khuyễn mãi
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
    //
    //Tổng các trạng thái
    $data['mun_promotion'] = mun_promotion(); //Sắp diễn ra
    $data['mun_promotion_upcoming'] = mun_promotion_upcoming(); //Sắp diễn ra
    $data['mun_promotion_ongoing'] = mun_promotion_ongoing(); //Đang diễn ra
    $data['mun_promotion_finished'] = mun_promotion_finished(); //Đã kết thúc
    $status = (!empty($_GET['status'])) ? $_GET['status'] : null;
    $page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $num_rows = 5;
    $start = ($page - 1) * $num_rows;
    $data['num_rows'] = $num_rows;
    $data['start'] = $start;
    $data["list_promotion"] = get_list_promotion($start, $num_rows, $status); //Lấy danh sách khuyễn mãi
    load_view("list_promotion", $data);
}

function update_promotionAction()
{
    global $error, $title, $description, $startDate, $endDate, $discount_rate;
    $id = $_GET['id'];
    $data['promotion'] = get_promotion_by_id($id); //Lấy khuyễn mãi bằng id
    $data['list_products'] = get_list_product_promotion($id); //Lấy danh sách sản phẩm liên quan đến khuyễn mãi
    $data['add_list_products'] = get_list_products(); //Danh sách sản phẩm chưa có khuyễn mãi 
    if (isset($_POST['update_promotions'])) {
        $error = [];
        //Kiểm tra title
        if (empty($_POST['title'])) {
            $error['title'] = "Không được để trống";
        } else {
            $title = $_POST['title'];
        }
        //Kiểm tra description
        if (empty($_POST['description'])) {
            $error['description'] = "Không được để trống";
        } else {
            $description = $_POST['description'];
        }
        //Kiểm tra startDate
        if (empty($_POST['startDate'])) {
            $error['date'] = "Không được để trống";
        } else {
            $startDate = $_POST['startDate'];
        }
        //Kiểm tra endDate
        if (empty($_POST['endDate'])) {
            $error['date'] = "Không được để trống";
        } else {
            $endDate = $_POST['endDate'];
        }
        //Kiểm tra discount_rate
        if (empty($_POST['discount_rate'])) {
            $error['discount_rate'] = "Không được để trống";
        } else {
            if (filter_var($_POST['discount_rate'], FILTER_VALIDATE_INT)) {
                $discount_rate = $_POST['discount_rate'];
            } else {
                $error['discount_rate'] = "Không đúng định dạng";
            }
        }
        //Kiểm tra sản phẩm khuyễn mãi mới thêm
        if (empty($_POST['product_id'])) {
        } else {
            $list_product_id = $_POST['product_id']; //Danh sách sản phẩm mới thêm vào khuyễn mãi
        }
        //Kiểm tra sản phẩm cũ
        if (empty($_POST['update_product_id'])) {
            $error['check'] = "Không được để trống";
        } else {
            $update_product_id = $_POST['update_product_id']; //Danh sách sản phẩm đã tồn tại
        }
        //Kết luận
        if (empty($error)) {
            $data_promotions = [
                'title' => $title,
                'description' => $description,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'discount_rate' => $discount_rate,
            ];
            update_promotion($data_promotions, $id); //Add vào bảng khuyễn mãi
            $string_id = "";
            foreach ($update_product_id as $item) {
                $string_id .= "{$item},"; //Dánh sách id sản phẩm tồn tại            
            }
            $string_id = substr($string_id, 0, -1);
            delete_id_product_not_exist($string_id, $id); //Xóa danh sách id không tồn tại
            $error['account'] = "Thêm thành công";
            if (!empty($list_product_id)) { //Add sản phẩm mới khuyễn mãi
                foreach ($list_product_id as $key => $item) {
                    $data = [
                        'product_id' => $key,
                        'promotion_id' => $id
                    ];
                    add_product_promotion($data); //Add vào bảng product_promotion
                }
            }
        }
    }
    $data['promotion'] = get_promotion_by_id($id); //Lấy khuyễn mãi bằng id
    $data['list_products'] = get_list_product_promotion($id); //Lấy danh sách sản phẩm liên quan đến khuyễn mãi
    $data['add_list_products'] = get_list_products(); //Danh sách sản phẩm chưa có khuyễn mãi 
    load_view("update_promotion", $data);
}

function delete_promotionAction() //Xóa khuyễn mãi
{
    $id = $_GET['id'];
    delete_promotion_by_id($id); //Xóa khuyễn mãi bằng id khuyễn mãi
    redirect("?mod=promotion&action=list_promotion");
}
