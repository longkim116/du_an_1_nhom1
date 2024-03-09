<?php
function list_products_promotion() //Danh sách sản phẩm đang khuyễn mãi đang diễn ra
{
    $sql = db_fetch_array("SELECT tb_products.*, tb_category.*, product_promotion.* FROM `tb_products`
    INNER JOIN `product_promotion` ON tb_products.product_id = product_promotion.product_id
    INNER JOIN `tb_category` ON tb_products.cat_id = tb_category.id
    LEFT JOIN `tb_promotions` ON tb_promotions.id = product_promotion.promotion_id
    WHERE tb_products.status = 'Đã đăng' AND tb_promotions.status = 'Đang diễn ra'");
    return $sql;
}

function list_products_by_sales() //Danh sách sản phẩm bán chạy
{
    $sql = db_fetch_array("SELECT tb_products.*, tb_category.*, product_promotion.* FROM `tb_products`
    INNER JOIN `product_promotion` ON tb_products.product_id = product_promotion.product_id
    INNER JOIN `tb_category` ON tb_products.cat_id = tb_category.id
    LEFT JOIN `tb_promotions` ON tb_promotions.id = product_promotion.promotion_id
    WHERE tb_products.status = 'Đã đăng' ORDER BY `sales` DESC LIMIT 0, 12 ");
    return $sql;
}

function list_products_new() //Danh sách sản phẩm mới nhất
{
    $sql = db_fetch_array("SELECT tb_products.*, tb_category.*, product_promotion.* FROM `tb_products`
    INNER JOIN `product_promotion` ON tb_products.product_id = product_promotion.product_id
    INNER JOIN `tb_category` ON tb_products.cat_id = tb_category.id
    LEFT JOIN `tb_promotions` ON tb_promotions.id = product_promotion.promotion_id
    WHERE tb_products.status = 'Đã đăng' ORDER BY `created_date` DESC LIMIT 0, 12 ");
    return $sql;
}
function list_sliders() //Danh sách slider
{
    $sql = db_fetch_array("SELECT * FROM `tb_sliders` WHERE `status` = 'Đã đăng'");
    return $sql;
}

function list_ads($data) //Lấy quảng cáo trang chủ
{
    $sql = db_fetch_row("SELECT * FROM `tb_ads` WHERE `ads_name` = '{$data}'");
    return $sql;
}

// function  add_cart_ajax($id)
// {
//     add_product_put_cart($id, null);
//     get_list_buy_cart();
// }

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
    $sql = db_fetch_row("SELECT * FROM `tb_promotions` WHERE `id` = {$id} ");
    return $sql['discount_rate'];
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

function mun_product($id) //Lấy tổng sản phẩm theo danh mục
{
    $sql = db_fetch_row("SELECT COUNT(`product_id`) AS `count` FROM `tb_products` WHERE `cat_id` = {$id}");
    return $sql['count'];
}


function get_list_watch() //Lấy danh sách đồng hồ
{
    $sql = db_fetch_array("SELECT * FROM `tb_products` INNER JOIN `tb_category` 
  ON tb_products.cat_id = tb_category.id 
  WHERE tb_category.title = 'Đồng hồ' ORDER BY tb_products.sales DESC LIMIT 0,10");
    return $sql;
}

function get_voucher()
{
    $sql = db_fetch_row("SELECT * FROM `tb_voucher` WHERE `quantity` > 0");
    return $sql;
}
