function update_cart(event) {//Cập nhật giỏ hàng
    var quantityInputs = $('.num_order');
    var quantities = {}; //Khỏi tạo
    quantityInputs.each(function () {
        var productId = $(this).attr('color_id');
        var quantity = parseInt($(this).val(), 10);
        quantities[productId] = quantity; //Nạp dữ liệu
    });
    var data = {
        quantities: quantities
    }
    $.ajax({
        url: '?mod=cart&action=update_ajax',
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function (data) {
            $("#list_cart").html(data.list_cart);
            $("#total_price").html(data.total_price);
            // Ngăn chặn việc nhập giá trị trực tiếp
            $(document).ready(function () {
                $('.num_order').on('keydown', function (e) {
                    e.preventDefault();
                });
            });
        }
    });
}
$(document).ready(function () {
    $('.num_order').on('keydown', function (e) {
        e.preventDefault();
    });
});


function add_comment(event) { //Thêm bình luận
    event.preventDefault();
    var comment = $('#comment').val();
    if (comment == "") {
        return false;
    }
    var id_product = $('#comment').attr('id_product');
    var star = $("input[name='star']").filter(":checked").val()
    var formData = {
        comment: comment,
        id_product: id_product,
        star: star
    }
    $.ajax({
        url: '?mod=product&action=ajax',
        method: 'POST',
        data: formData,
        dataType: 'json',
        success: function (data) {
            console.log(data);
            $("#star_5").html(data.star_5);
            $("#star_4").html(data.star_4);
            $("#star_3").html(data.star_3);
            $("#star_2").html(data.star_2);
            $("#star_1").html(data.star_1);
            $("#avg_star").html(data.avg_star);
            $("#fa_star").html(data.fa_star);
            $(".total_comment").html(data.total_comment);
            $("#list_comment").html(data.list_comment);
            $("#comment").val("");
            $("input[name='star']").prop("checked", false)
        }
    })
}



function uploadImage(event) {
    var inputFile = event.target.files[0];
    var number = event.currentTarget.getAttribute("number")
    var formData = new FormData();
    formData.append('file', inputFile);
    formData.append('number', number);
    $.ajax({
        url: '?mod=users&action=ajax',
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function (data) {
            var id = "#img-thumb-" + data.number;
            console.log(data);
            if (data.status == 'error') {
                $(id).html("<p id='text-img-thumb' class='text-danger'>Lỗi tải ảnh</p>")
            } else {
                $(id).html("<img  id='size-img-thumb' src='" + data.targetFile + "' class='img-fluid img-thumbnail' alt=''>")
            }
        }
    })
}

$(document).ready(function () {
    $('.share').click(function (e) {
        e.preventDefault();
        window.open($(this).attr('href'), 'fbShareWindow', 'height=450, width=550, top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0,         directories=0, scrollbars=0');
        return false;
    });
});

function scrollChatToBottom() {//Cho thanh croll luôn ở dưới cùng
    var chatBox = document.querySelector('.chat-content');
    chatBox.scrollTop = chatBox.scrollHeight;
}
scrollChatToBottom();
$(document).ready(function () {//Thêm bình luận
    $('#btn-chat').click(function (e) {
        e.preventDefault();
        var message = $('#message').val();
        if (message == "") {
            return false;
        }
        var data = { message: message };
        $.ajax({
            url: '?mod=users&action=chatAjax',
            method: 'POST',
            data: data,
            dataType: 'json',
            success: function (data) {
                var string = "";
                data.forEach(element => {
                    console.log(element.status);
                    if (element.status == 0) {
                        string += "<div class='float-right chat-content-item-right'>" +
                            "<p>" + element.message + "</p>" +
                            "<span class='text-muted small'>" + element.created_at + "</span>" +
                            "</div>";
                    } else {
                        string += "<div class='float-left chat-content-item-left'>" +
                            "<p>" + element.message + "</p>" +
                            "<span class='text-muted small'>" + element.created_at + "</span>" +
                            "</div>";
                    }

                });
                $(".chat-content").html(string);
                scrollChatToBottom();
                $('#message').val("");
            }
        })
    });
});

function change_pass(event) { //Thay đổi mật khẩu
    event.preventDefault();
    var old_pass = $("#old_pass").val();
    var new_pass = $("#new_pass").val();
    var con_new_pass = $("#con_new_pass").val();
    var data = {
        old_pass: old_pass,
        new_pass: new_pass,
        con_new_pass: con_new_pass,
    }
    $.ajax({
        url: '?mod=users&action=change_pass_ajax',
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function (data) {
            if (data.status == 0) {
                if (typeof data.account !== 'undefined') {
                    string = data.account
                } else if (typeof data.old_pass !== 'undefined') {
                    string = data.old_pass
                } else if (typeof data.new_pass !== 'undefined') {
                    string = data.new_pass
                } else if (typeof data.con_new_pass !== 'undefined') {
                    string = data.con_new_pass
                }
                Swal.fire({
                    icon: 'error',
                    title: string,
                    showConfirmButton: false,
                    timer: 2000
                });
            } else {
                $("#old_pass").val("");
                $("#new_pass").val("");
                $("#con_new_pass").val("");
                Swal.fire({
                    icon: 'success',
                    title: 'Cập nhật mật khẩu thành công!',
                    showConfirmButton: false,
                    timer: 2000
                });
            }

        }
    });
}

function update_info(event) {//Cập nhật thông tin người dùng
    event.preventDefault();
    var fullname = $("#fullname").val();
    var email = $("#email").val();
    var phone_number = $("#phone_number").val();
    var address = $("#address").val();
    var data = {
        fullname: fullname,
        email: email,
        phone_number: phone_number,
        address: address,
    }
    $.ajax({
        url: '?mod=users&action=update_info_ajax',
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function (data) {
            if (data.error == 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Số điện thoại hoặc email không đúng định dạng',
                    text: data.email,
                    showConfirmButton: false,
                    timer: 2000
                });
            } else {
                $("#fullname").val(data.fullname);
                $("#email").val(data.email);
                $("#phone_number").val(data.phone_number);
                $("#address").val(data.address);
                Swal.fire({
                    icon: 'success',
                    title: 'Cập nhật thông tin thành công!',
                    showConfirmButton: false,
                    timer: 2000
                });
            }

        }
    });
}

function get_list_order(_this) { //Lấy danh sách đơn hàng theo trang thái
    var status = $(_this).html();
    var data = {
        status: status
    };
    $.ajax({
        url: '?mod=users&action=list_order_ajax',
        method: 'POST',
        data: data,
        dataType: 'html',
        success: function (data) {
            $("#list_order").html(data);
        }
    });
}

function detail_order(_this) {//Hiển thi chi tiết đơn hàng
    var order_id = $(_this).attr('order_id');
    var data = {
        order_id: order_id
    };
    $.ajax({
        url: '?mod=users&action=detail_order_ajax',
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function (data) {
            //Thông tin đơn hàng
            $("#order_code").html(data.order_code);
            $("#order_address").html(data.order_address);
            $("#order_phone").html(data.order_phone);
            $("#order_note").html(data.order_note);
            $("#order_pay").html(data.order_pay);
            $("#order_status").html(data.order_status);
            $("#cancel_order").html(data.cancel_order);
            $("#payment_methods").html(data.payment_methods);
            //Danh sách sản phẩm
            $("#list_order_detail").html(data.list_order_detail);
            $("#total_price").html(data.total_price);
            $("#discount").html(data.discount);
            $("#shipping_cost").html(data.shipping_cost);
            $("#total").html(data.total);
        }
    });
}

function cancel_order(_this) { //Hủy đơn hàng
    var order_id = $(_this).attr("order_id");
    var data = {
        order_id: order_id,
    }
    $.ajax({
        url: '?mod=users&action=cancel_order_ajax',
        method: 'POST',
        data: data,
        dataType: 'html',
        success: function (data) {
            Swal.fire({
                icon: 'success',
                title: 'Đơn hàng của bạn đã được hủy!',
                showConfirmButton: false,
                timer: 3000
            });
            setInterval(function () {
                location.reload()
            }, 3000);
        }
    });
}

function order_review(_this) { //Đánh giá đơn hàng
    var order_id = $(_this).attr("order_id");
    var star = $("input[name='star']").filter(":checked").val();
    if (star == null) {
        Swal.fire({
            icon: 'error',
            title: 'Bạn hãy để lại đánh giá về đơn hàng',
            showConfirmButton: false,
            timer: 2000
        });
        return false;
    }
    var data = {
        order_id: order_id,
        star: star,
    }
    $.ajax({
        url: '?mod=users&action=order_review_ajax',
        method: 'POST',
        data: data,
        dataType: 'html',
        success: function (data) {
            if (data == 1 || data == 2 || data == 3) {
                Swal.fire({
                    icon: 'success',
                    title: 'Cảm ơn bạn đã mua hàng tại Autosamrt',
                    text: "Chúng tôi rất xin lỗi nếu bạn không hài lòng về sản phẩm",
                    showConfirmButton: false,
                    timer: 3000
                });
                setInterval(function () {
                    location.reload()
                }, 3000);
            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'Cảm ơn bạn đã mua hàng tại Autosamrt',
                    text: "Chúng tôi rất vui khi bạn đã hài lòng về sản phẩm",
                    showConfirmButton: false,
                    timer: 3000
                });
                setInterval(function () {
                    location.reload()
                }, 3000);
            }
        }
    });
}
function order_success(_this) { //Đã nhận hàng
    var order_id = $(_this).attr("order_id");
    var data = {
        order_id: order_id,
    }
    $.ajax({
        url: '?mod=users&action=order_success_ajax',
        method: 'POST',
        data: data,
        dataType: 'html',
        success: function (data) {
            Swal.fire({
                icon: 'success',
                title: 'Cảm ơn bạn đã mua hàng tại Autosamrt',
                showConfirmButton: false,
                timer: 3000
            });
            setInterval(function () {
                location.reload()
            }, 3000);
        }
    });
}

function change_customer_image(event) { //Thay đổi hình đại diện
    var inputFile = event.target.files[0];
    var formData = new FormData();
    formData.append('file', inputFile);
    $.ajax({
        url: '?mod=users&action=update_img_ajax',
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function (data) {
            if (data.status == 'error') {
                Swal.fire({
                    icon: 'error',
                    title: 'Chú ý',
                    text: 'Ảnh tải lên không hợp lệ',
                    showConfirmButton: false,
                    timer: 3000
                });
                return false;
            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'Đã cập nhật ảnh đại diện!',
                    showConfirmButton: false, // Không hiển thị nút xác nhận
                    timer: 1000 // Tự động đóng sau 2 giây
                });
                $("#user_img").attr("src", "admin/img/" + data.targetFile);
            }

        }
    })
}

var input = document.getElementById('num-order');
input.addEventListener('input', function () {
    var value = parseInt(input.value);
    var min = parseInt(input.min);
    var max = parseInt(input.max);

    if (isNaN(value) || value < min) {
        input.value = min;
    } else if (value > max) {
        input.value = max;
    }
});

function send_mail() {
    var email = $("#email").val();
    var data = {
        email: email
    };
    $.ajax({
        url: '?mod=home&action=send_mail_ajax',
        method: 'POST',
        data: data,
        dataType: 'html',
        success: function (data) {
            if (data == 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Đăng ký thông tin thành công',
                    showConfirmButton: false,
                    timer: 2000
                });
                $("#email").val("");
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Email không đúng!',
                    showConfirmButton: false,
                    timer: 3000
                });
                $("#email").val("");
            }
        }
    });
}

