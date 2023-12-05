<?php
function get_list_products() //Danh sách sản phẩm
{
    $sql = db_fetch_array("SELECT p.*, c.*  FROM tb_products p 
    INNER JOIN tb_category c ON p.cat_id = c.id 
    WHERE NOT EXISTS ( SELECT * FROM product_promotion pp WHERE p.product_id = pp.product_id ) AND p.status = 'Đã đăng'
     UNION SELECT p.* , c.* FROM tb_promotions tp
     INNER JOIN product_promotion pp ON tp.id = pp.promotion_id 
     INNER JOIN tb_products p ON p.product_id = pp.product_id 
     INNER JOIN tb_category c ON p.cat_id = c.id 
     WHERE tp.status = 'Đã kết thúc';");
    return $sql;
}
function add_promotion($data) //Add vào bảng khuyễn mãi
{
    $sql = db_insert("tb_promotions", $data);
    return $sql;
}
function delete_id_product_not_exist($string_id, $id) //Xóa danh sách id không tồn tại
{
    db_query("DELETE FROM `product_promotion` WHERE `product_id` NOT IN ($string_id) AND `promotion_id` = {$id}");
}

function update_promotion($data, $id) //Cập nhật bảng khuyễn mãi
{
    db_update("tb_promotions", $data, "`id` = {$id}");
}


function add_product_promotion($data) //Add vào bảng product_promotion
{
    db_insert("product_promotion", $data);
}

function get_list_promotion($start, $num_rows, $status) //Lấy danh sách khuyễn mãi
{
    if (!empty($status)) {
        $status = "WHERE `status` = '{$status}'";
    }
    $sql = db_fetch_array("SELECT * FROM `tb_promotions` {$status} LIMIT $start, $num_rows");
    return $sql;
}

function get_padding($num_rows)
{
    $status = (!empty($_GET['status'])) ? $_GET['status'] : null;
    $sql = null;
    $url = null;
    if (!empty($status)) {
        $url = "&status={$status}";
        $sql = "WHERE `status` = '{$status}'";
    }
    $num_page = ceil(db_num_rows("SELECT * FROM `tb_promotions` {$sql} ") / $num_rows);
    $page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $padding = "";
    $padding .= "<ul class='pagination pagination-sm m-0 float-right'>";
    $page_prev = 1;
    if ($page > 1) {
        $page_prev = $page - 1;
    }
    $padding .= "<li class='page-item'><a class='page-link' href='?mod=promotion&action=list_promotion{$url}&page={$page_prev}' title=''>&laquo;</a></li>";

    for ($i = 1; $i <= $num_page; $i++) {
        if ($i == $page) {
            $style = 'bg-info text-light';
        } else {
            $style = null;
        }
        $padding .= "<li class='page-item'><a class='page-link {$style}' href='?mod=promotion&action=list_promotion{$url}&page={$i}'>{$i}</a></li>";
    }
    $page_next = $num_page;
    if ($page < $num_page) {
        $page_next = $page + 1;
    }
    $padding .= "<li class='page-item '><a class='page-link' href='?mod=promotion&action=list_promotion{$url}&page={$page_next}' title=''>&raquo;</a></li>";

    $padding .= "</ul>";
    return $padding;
}

function get_promotion_by_id($id) //Lấy khuyễn mãi bằng id
{
    $sql = db_fetch_row("SELECT * FROM `tb_promotions` WHERE `id` = {$id}");
    return $sql;
}

function get_list_product_promotion($id) //Lấy danh sách sản phẩm liên quan đến khuyễn mãi
{
    $sql = db_fetch_array("SELECT * FROM `tb_products` 
    INNER JOIN `tb_category` ON tb_products.cat_id = tb_category.id 
    INNER JOIN `product_promotion` ON tb_products.product_id = product_promotion.product_id
    WHERE product_promotion.promotion_id = {$id}");
    return $sql;
}

function max_price($id) //Lấy giá lớn nhất của sản phẩm
{
    $sql = db_fetch_row("SELECT MAX(`color_price`) AS max_price FROM `tb_color_variants` WHERE `product_id` = {$id} ");
    return $sql['max_price'];
}

function min_price($id) //Lấy giá nhỏ nhất của sản phẩm
{
    $sql = db_fetch_row("SELECT MIN(`color_price`) AS min_price FROM `tb_color_variants` WHERE `product_id` = {$id} ");
    return $sql['min_price'];
}

function get_discount_rate($id) //Lấy phần trăm khuyễn mãi cảu sản phẩm khuyễn mãi
{
    $sql = db_fetch_row("SELECT * FROM `tb_promotions`
    INNER JOIN `product_promotion` ON tb_promotions.id = product_promotion.promotion_id
    WHERE product_promotion.product_id = {$id}  AND tb_promotions.status = 'Đang diễn ra'");
    if ($sql) {
        return $sql['discount_rate'];
    }
    return false;
}

function product_reviews($id) //Lấy chi tiêt danh giá sản phẩm
{
    $sql = db_fetch_row("SELECT AVG(`star`) AS `star`, COUNT(`id_product`) AS `count` FROM `tb_comments` WHERE `id_product` = {$id}");
    return $sql;
}

function get_list_category() //Lấy danh sách danh mục
{
    $sql = db_fetch_array("SELECT * FROM `tb_category`");
    return $sql;
}

function get_mun_product($id) //Lấy tổng số sản phẩm khuyễn mãi
{
    $sql = db_fetch_array("SELECT * FROM `product_promotion` WHERE `promotion_id` = {$id}");
    return $sql;
}

function mun_promotion() //Tất cả
{
    $sql = db_fetch_array("SELECT * FROM `tb_promotions`");
    return $sql;
}
function mun_promotion_upcoming() //Sắp diễn ra
{
    $sql = db_fetch_array("SELECT * FROM `tb_promotions` WHERE `status` = 'Sắp diễn ra'");
    return $sql;
}

function mun_promotion_ongoing() //Đang diễn ra
{
    $sql = db_fetch_array("SELECT * FROM `tb_promotions` WHERE `status` = 'Đang diễn ra'");
    return $sql;
}

function mun_promotion_finished() //Đã kết thúc
{
    $sql = db_fetch_array("SELECT * FROM `tb_promotions` WHERE `status` = 'Đã kết thúc'");
    return $sql;
}

function delete_promotion_by_id($id) //Xóa khuyễn mãi bằng id khuyễn mãi
{
    db_delete("tb_promotions", "`id` = {$id}");
    db_delete("product_promotion", "`promotion_id` = {$id}");
}

function update_action($action, $id) //Cập nhật tác vụ
{
    if ($action == 1) { //Xóa
        db_delete("tb_promotions", "`id` = {$id}");
        db_delete("product_promotion", "`promotion_id` = {$id}");
        return true;
    }
    return false;
}
