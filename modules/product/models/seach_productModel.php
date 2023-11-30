<?php
function seach_product($seach, $select)
{
    if (!empty($select)) {
        if ($select == 1) {
            $select = "ORDER BY tb_products.product_name ASC";
        } else if ($select == 2) {
            $select = "ORDER BY tb_products.product_name DESC";
        } else if ($select == 3) {
            $select = "ORDER BY tb_color_variants.color_price ASC";
        } else if ($select == 4) {
            $select = "ORDER BY tb_color_variants.color_price DESC";
        }
    }
    if (!empty($seach)) {
        $sql = db_fetch_array("SELECT DISTINCT tb_products.*, tb_category.* FROM tb_products
        INNER JOIN tb_category ON tb_products.cat_id = tb_category.id
        LEFT JOIN tb_color_variants ON tb_products.product_id = tb_color_variants.product_id WHERE `product_name` LIKE '%{$seach}%' AND `status` = 'Đã đăng' {$select}  ");
        return $sql;
    }
    return false;
}

function list_ads($data)
{
    $sql = db_fetch_row("SELECT * FROM `tb_ads` WHERE `ads_name` = '{$data}'");
    return $sql;
}

function check_name_product($name)
{
    $sql = db_fetch_row("SELECT * FROM `tb_products` WHERE `product_name` = '{$name}'");
    return $sql;
}


function get_product_promotion_by_id($id) //Lấy giá khuyễn mãi theo id sản phẩm
{
    $sql = db_fetch_row("SELECT * FROM `product_promotion` INNER JOIN `tb_promotions` ON product_promotion.promotion_id = tb_promotions.id 
    INNER JOIN `tb_products` ON product_promotion.product_id = tb_products.product_id WHERE tb_products.product_id = {$id}");
    if (!$sql) {
        return false;
    }
    return $sql['discount_rate'];
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
    WHERE product_promotion.product_id = {$id} AND tb_promotions.status = 'Đang diễn ra'");
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
