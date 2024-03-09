<?php
function get_product_by_color_id($color_id) //Lấy chi tiết sản phẩm bằng id color
{
    $sql = db_fetch_row("SELECT * FROM `tb_color_variants` INNER JOIN `tb_products` 
    ON tb_products.product_id = tb_color_variants.product_id
    INNER JOIN `tb_ram_variants` 
    ON tb_ram_variants.id = tb_color_variants.ram_id
    WHERE tb_color_variants.id = {$color_id}");
    return $sql;
}

function product_reviews($id) //Lấy chi tiêt danh giá sản phẩm
{
    $sql = db_fetch_row("SELECT AVG(`star`) AS `star`, COUNT(`id_product`) AS `count` FROM `tb_comments` WHERE `id_product` = {$id}");
    return $sql;
}