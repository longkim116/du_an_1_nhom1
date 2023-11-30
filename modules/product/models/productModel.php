<?php
function list_product($cat_id, $name_product, $start, $num_rows, $select)
{
    $sql = "WHERE";
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
    if (!empty($name_product)) {
        $sql = "WHERE tb_products.cat_id = '{$cat_id}' AND tb_products.product_name LIKE '%{$name_product}%' AND";
    } else if (!empty($cat_id)) {
        $sql = "WHERE tb_products.cat_id = '{$cat_id}' AND";
    }
    $sql = db_fetch_array("SELECT DISTINCT tb_products.*, tb_category.* FROM tb_products
    INNER JOIN tb_category ON tb_products.cat_id = tb_category.id
    LEFT JOIN tb_color_variants ON tb_products.product_id = tb_color_variants.product_id {$sql} `status` = 'Đã đăng' {$select}  LIMIT $start, $num_rows");
    return $sql;
}

function total_product($cat_id, $name_product)
{
    $sql = "WHERE";
    if (!empty($name_product)) {
        $sql = "WHERE `cat_id` = '{$cat_id}' AND `product_name` LIKE '%{$name_product}%' AND";
    } else if (!empty($cat_id)) {
        $sql = "WHERE `cat_id` = '{$cat_id}' AND";
    }
    $sql = db_fetch_array("SELECT * FROM `tb_products` {$sql} `status` = 'Đã đăng'");
    return $sql;
}
function list_category()
{
    $sql = db_fetch_array("SELECT * FROM `tb_category` ");
    return $sql;
}

function list_ads($data)
{
    $sql = db_fetch_row("SELECT * FROM `tb_ads` WHERE `ads_name` = '{$data}'");
    return $sql;
}

function get_padding($num_rows)
{
    $sql = "WHERE";
    $cat_id = (!empty($_GET['cat_id'])) ? $_GET['cat_id'] : null;
    $name_product = (!empty($_GET['name_product'])) ? $_GET['name_product'] : null;
    if (!empty($name_product)) {
        $sql = "WHERE `cat_id` = '{$cat_id}' AND `product_name` LIKE '%{$name_product}%' AND";
        $cat_url = "&cat_id={$cat_id}&name_product={$name_product}";
    } else if (!empty($cat_id)) {
        $sql = "WHERE `cat_id` = '{$cat_id}' AND";
        $cat_url = "&cat_id={$cat_id}";
    }
    $num_page = ceil(db_num_rows("SELECT * FROM `tb_products` {$sql} `status` = 'Đã đăng'") / $num_rows);
    $padding = "";
    $padding .= "<ul>";
    $page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $pagePrev = 1;
    if ($page > 1) {
        $pagePrev = $page - 1;
    }
    $padding .= "<li class='page-item '><a href='?mod=product&action=product{$cat_url}&page={$pagePrev}' class='page-link'>&laquo;</a></li>";
    for ($i = 1; $i <= $num_page; $i++) {
        if ($i == $page) {
            $style = "bg-primary text-light";
        } else {
            $style = null;
        }
        $padding .= "<li class='page-item '><a class='page-link {$style}' href='?mod=product&action=product{$cat_url}&page={$i}'>{$i}</a></li>";
    }
    $pageNext = $num_page;
    if ($page < $num_page) {
        $pageNext = $page + 1;
    }
    $padding .= "<li class='page-item '><a href='?mod=product&action=product{$cat_url}&page={$pageNext}' class='page-link'>&raquo;</a></li>";
    $padding .= "</ul>";
    return $padding;
}


function list_products_by_sales() //Lấy danh sách sản phẩm bán chạy
{
    $sql = db_fetch_array("SELECT * FROM `tb_products` WHERE `status` = 'Đã đăng' ORDER BY `sales` DESC LIMIT 0, 10 ");
    return $sql;
}
function product_star_by_id($id) //Lấy trung binh đánh giá khách hàng
{
    $sql = db_fetch_row("SELECT AVG(`star`) as 'star' FROM `tb_comments` WHERE `id_product` = {$id} AND `star` > 1");
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
