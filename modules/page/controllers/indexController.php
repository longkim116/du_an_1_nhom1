<?php
function construct()
{
    load_module("index");
}
function indexAction()
{
    $page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $num_rows = 7;
    $starts = ($page - 1) * $num_rows;
    $total_page = ceil(total_list_posts() / $num_rows);
    $data['list_posts'] = list_posts($starts, $num_rows);//Lấy ra danh sách bài viết
    $data['list_products_by_sales'] = list_products_by_sales();//Lấy danh sách sản phẩm bán chyaj
    $data['total_page'] = $total_page;
    $data['mun_posts'] = mun_list_posts();//Tông số bài viết
    load_view('main', $data);
}

function detail_blogAction()
{
    $id = $_GET['id'];
    $data['list_products_by_sales'] = list_products_by_sales();
    $data['detail_blog'] = detail_blog($id);
    load_view('detail_blog', $data);
}
