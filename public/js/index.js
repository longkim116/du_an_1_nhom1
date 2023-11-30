function add_cart(event) {
    event.preventDefault();//Thêm sản phẩm vào giỏ hàng
    var product_id = $("#ram").attr("product_id");
    var id_ram = $("#ram").val();
    var id_color = $("input[name='color']:checked").val();
    var quantity = $("#num-order").val();

    if (id_color == null) {
        Swal.fire({
            icon: 'error',
            title: 'Chú ý',
            text: 'Vui lòng chọn đầy đủ thông tin của sản phẩm trước khi đặt mua!',
            showConfirmButton: false,
            timer: 2000
        });
        return false;
    }

    var data = {
        product_id: product_id,
        id_color: id_color,
        id_ram: id_ram,
        quantity: quantity,
    };

    $.ajax({
        url: '?mod=cart&action=add_cart',
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function (response) {

            // Cập nhật giao diện người dùng sau khi thêm vào giỏ hàng
            $("#menu_total_cart").html(response.total_cart);
            $("#menu_total_cart_sm").html(response.total_cart);
            $("#total_price_cart").html(response.total);
            $("#list_add_cart").html(response.list_add_cart);
            $("#quantity_product").html("<span>Trong kho</span>");
            // Gọi hàm cập nhật UI và chuyển response vào
            updateUI(response);
        },
        error: function (error) {
            console.log('Error:', error);
        }
    });
}

function updateUI(response) {
    // Sau khi thêm vào giỏ hàng
    Swal.fire({
        icon: 'success',
        title: 'Đã thêm vào giỏ hàng!',
        text: 'Sản phẩm đã được thêm vào giỏ hàng của bạn.',
        showConfirmButton: false, // Không hiển thị nút xác nhận
        timer: 1000 // Tự động đóng sau 2 giây
    });
    selectVar();
}

function selectColorVar(_this) {//Load thông tin ra và số lượng
    var color_id = $(_this).val();
    var data = {
        color_id: color_id,
    }
    $.ajax({
        url: '?mod=product&action=detail_color_ajax',
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function (data) {
            $("#product_name").html(data.product_name);
            $("#quantity_product").html(`<span>Còn ` + data.quantity + ` sản phẩm</span>`);
            $("#product_price").html(data.price);
            $("#status").html(
                `<input type="number" name="num-order" id="num-order" min="1" max="` + data.quantity + `" value="1" id="num-order">`);
        }
    })
}

function selectVar() {//Load màu ra
    var product_id = $("#ram").attr("product_id");
    var ram = $("#ram").val();
    var data = {
        product_id: product_id,
        ram: ram,
    }
    $.ajax({
        url: '?mod=product&action=detail_ajax',
        method: 'POST',
        data: data,
        dataType: 'html',
        success: function (data) {
            $("#color_var").html(data);
        }
    })
}
selectVar()

function quickView(_this) {//Phần QuickView
    var product_id = $(_this).val();
    var data = { product_id: product_id };
    $.ajax({
        url: '?mod=product&action=quickView_ajax',
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function (data) {
            $("#product_img").html("<img src='admin/img/" + data.product_img + "' alt=''>");
            $("#product_name").html(data.product_name);
            $("#product_star").html(data.product_star);
            $("#product_reviews").html(data.product_reviews);
            $("#product_desc").html(data.product_desc);
            $("#string_variant_ram").html(data.string_variant_ram);
            $("#string_variant_color").html("<h4 class='tp-product-details-action-title mt-15'>Màu sắc :</h4><div class='tp-product-details-variation' id='color_var'></div>");
            $("#product_price").html(data.product_price);
            selectVar();
        }
    });
}

function favourite(_this) {
    var product_id = $(_this).val();
    var data = { product_id: product_id };
    $.ajax({
        url: '?mod=cart&action=favourite_ajax',
        method: 'POST',
        data: data,
        dataType: 'html',
        success: function (data) {
            console.log(data);
        }
    });
}

function changPrice(_this) {//Thay đỏi giá khi chon nơi vận chuyển
    var idShip = $(_this).val();
    var total_pay = $("#total_pay").attr("total_pay");
    var data = {
        idShip: idShip,
        total_pay: total_pay,
    }
    $.ajax({
        url: '?mod=cart&action=chang_price',
        method: 'POST',
        data: data,
        dataType: 'html',
        success: function (data) {
            $("#total_pay").html(data);
        }
    });
}