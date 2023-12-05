<?php
function list_promotions() //Danh sách khuyễn mãi
{
    $sql = db_fetch_array("");
}


function get_product_by_id($id) //Lấy chi tiết sản phẩm
{
    $sql = db_fetch_row("SELECT * FROM `tb_products` INNER JOIN `tb_category` ON tb_products.cat_id = tb_category.id WHERE `product_id` = {$id}");
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
