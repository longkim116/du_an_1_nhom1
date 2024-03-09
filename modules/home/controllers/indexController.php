<?php
function construct()
{
    load_module('index');
}

function indexAction()
{
    $data['homepageAds1'] =  list_ads("homepageAds1"); //Quản cáo 
    $data['homepageAds2'] =  list_ads("homepageAds2"); //Quản cáo 1
    $data['list_sliders'] = list_sliders();
    $data['list_ads'] = list_ads("home");
    $data['list_products_by_sales'] = list_products_by_sales(); //Danh sách sản phẩm bán chạy
    $data['list_products_new'] = list_products_new(); //Danh sách sản phẩm mới nhất
    $data['list_products_promotion'] = list_products_promotion(); //Danh sách sản phẩm đang khuyễn mãi
    $data['list_category'] = get_list_category(); //Lấy danh sách danh mục
    $data['list_watch'] = get_list_watch(); //Lấy danh sách đồng hồ
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

function send_mail_ajaxAction() //Lấy email khách hàng
{
    $email = $_POST['email'];
    if (is_email($email)) {
        $voucher = get_voucher(); //Lấy voucher
        $content = "<p>Ch&agrave;o qu&yacute; kh&aacute;ch h&agrave;ng th&acirc;n mến,</p>" .

            "<p>Ch&uacute;ng t&ocirc;i hy vọng bạn đang c&oacute; một ng&agrave;y tuyệt vời! Nh&acirc;n dịp đặc biệt n&agrave;y, ch&uacute;ng t&ocirc;i xin gửi đến bạn ưu đ&atilde;i hấp dẫn v&ocirc; c&ugrave;ng từ Autosmart.</p>" .

            "<p>🌟 <strong>Ưu Đ&atilde;i Đặc Biệt: Tặng Voucher Giảm Gi&aacute; cho Tất Cả Sản Phẩm! 🌟</strong></p>" .

            "<p>Ch&uacute;ng t&ocirc;i cam kết mang đến cho bạn sự h&agrave;i l&ograve;ng với đội ngũ sản phẩm chất lượng v&agrave; dịch vụ chăm s&oacute;c kh&aacute;ch h&agrave;ng tận t&acirc;m.</p>" .


            "<p><strong>M&atilde; Giảm Gi&aacute;:</strong> [M&atilde; Giảm Gi&aacute; Đặc Biệt: " . $voucher['voucher_code'] . "]</p>" .

            "<p><strong>Giá trị:</strong> [M&atilde; Giảm Gi&aacute; Đặc Biệt: " . currency_format($voucher['discount_amount']) . "]</p>" .

            "<p><strong>Thời Hạn Ưu Đ&atilde;i:</strong> Số lượng có hạn nên hãy dùng luôn nha khách yêu</p>" .

            "<p>Cảm ơn bạn đ&atilde; l&agrave; một phần của Autosmart! H&atilde;y nhanh tay để kh&ocirc;ng bỏ lỡ cơ hội n&agrave;y.</p>" .

            "<p>Tr&acirc;n trọng, Autosmart</p>";
        send_email($email, "Khách hàng", "Ưu Đãi Đặc Biệt", $content, $option = array());
        echo "success";
    } else {
        echo "error";
    }
}
