<?php
function construct()
{
    load_module('index');
}

function indexAction()
{
    $data['homepageAds1'] =  list_ads("homepageAds1"); //Quản cáo 
    $data['homepageAds2'] =  list_ads("homepageAds2"); //Quản cáo 1
    $data['list_posts'] = list_posts(); //Danh sách tin tức
    $data['list_sliders'] = list_sliders();
    $data['list_ads'] = list_ads("home");
    $data['list_products_by_sales'] = list_products_by_sales(); //Danh sách sản phẩm bán chạy
    $data['list_products_new'] = list_products_new(); //Danh sách sản phẩm mới nhất
    $data['list_products_promotion'] = list_products_promotion(); //Danh sách sản phẩm đang khuyễn mãi
    $data['list_category'] = get_list_category(); //Lấy danh sách danh mục
    load_view("home", $data);
}

// function ajaxAction()
// {
//     $id = $_POST['id'];
//     add_cart_ajax($id);
//     $count = count($_SESSION['cart']['buy']);
//     $data = $_SESSION['cart']['buy'];
//     $data = [
//         'count' => $count,
//         'list_add' =>  $_SESSION['cart']['buy'],
//     ];
//     echo json_encode($data);
// }
