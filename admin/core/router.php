<?php
//Cập nhật trạng thái khuyễn mãi sản phẩm
$date = date("Y-m-d");
$sql = db_fetch_array("SELECT * FROM `tb_promotions`");
foreach ($sql as $item) {
    if ($date >= $item['start_date'] && $date <= $item['end_date']) { //Đang diễn ra
        db_update("tb_promotions", array("status" => "Đang diễn ra"), "`id` = {$item['id']}");
    } else if ($date > $item['end_date']) { // Đã kết thúc
        db_update("tb_promotions", array("status" => "Đã kết thúc"), "`id` = {$item['id']}");
    } else if ($date < $item['start_date']) { //Sắp diễn ra
        db_update("tb_promotions", array("status" => "Sắp diễn ra"), "`id` = {$item['id']}");
    }
}

//Xử lý đường dẫn
if (!isset($_SESSION['is_admin_login']) && get_action() != "login") {
    redirect("?mod=log&action=login");
} else {
    $path = MODULESPATH . "/" . get_model() . "/" . "controllers" . "/" . get_controller() . "Controller.php";
    if (file_exists($path)) {
        require "$path";
    } else {
        echo "Không tồn tại {$path}";
    }
    $action = get_action() . "Action"; //list_orderAction
    construct();
    call_function(array($action));
}
