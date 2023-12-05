var checkAll = document.getElementById("checkAll");
checkAll.addEventListener("click", function () {
    var checkItem = document.querySelectorAll(".checkItem");
    if (checkAll.checked == true) {
        for (var i = 0; i < checkItem.length; i++) {
            checkItem[i].checked = true;
        }
    } else {
        for (var i = 0; i < checkItem.length; i++) {
            checkItem[i].checked = false;
        }
    }
});

function upload_img_color(_this) {//Ảnh đại diện biến thể
    var file = _this.files[0];
    var color_id = $(_this).attr("color_id");
    var formData = new FormData();
    formData.append('file', file);
    formData.append('color_id', color_id);
    $.ajax({
        url: '?mod=product&action=upload_img_color_ajax',
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function (data) {
            console.log(data);
            if (data.status === 'error') {
                $("#img-color-" + data.color_id).html("<p id='text-img-thumb' class='text-danger'>Lỗi tải ảnh</p>");
            } else {
                $("#img-color-" + data.color_id).html("<img id='size-img-thumb' src='" + data.img + "' width='30' height='30' alt=''>");
            }
        }
    })
}

function update_info(event) { //Cập nhật thông tin quản trị viên
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
                $(".fullname").html(data.fullname);
                $("#email").val(data.email);
                $(".email").html(data.email);
                $("#phone_number").val(data.phone_number);
                $(".phone_number").html(data.phone_number);
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

function add_user(event) { //Thêm quản trị viên
    event.preventDefault();
    var fullname = $("#add_fullname").val();
    var username = $("#add_username").val();
    var password = $("#add_password").val();
    var email = $("#add_email").val();
    var phone_number = $("#add_tel").val();
    var address = $("#add_address").val();
    var role = $("#role").val();
    var data = {
        fullname: fullname,
        username: username,
        password: password,
        email: email,
        phone_number: phone_number,
        address: address,
        role: role
    }
    $.ajax({
        url: '?mod=users&action=add_user_ajax',
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function (data) {
            if (data.status == 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Không thành công!',
                    text: data.error,
                    showConfirmButton: false,
                    timer: 2000
                });
            } else {
                $("#add_fullname").val("");
                $("#add_username").val("");
                $("#add_password").val("");
                $("#add_email").val("");
                $("#add_tel").val("");
                $("#add_address").val("");
                $("#role").val("");
                $("#list_users").html(data.list_users);
                Swal.fire({
                    icon: 'success',
                    title: 'Thêm thành công!',
                    showConfirmButton: false,
                    timer: 3000
                });
            }

        }
    });
}

function get_list_order(_this) { //Lấy danh sách đơn hàng theo trang thái
    var status = $(_this).html();
    var customer_id = $(_this).attr('customer_id');
    var data = {
        status: status,
        customer_id: customer_id,
    };
    $.ajax({
        url: '?mod=customer&action=list_order_ajax',
        method: 'POST',
        data: data,
        dataType: 'html',
        success: function (data) {
            $("#list_order").html(data);
        }
    });
}

function add_role(event) {//ADD thêm phân quyền
    event.preventDefault();
    var role_name = $("#role_name").val();
    if (role_name == "") {
        Swal.fire({
            icon: 'error',
            title: 'Thêm không thành công!',
            text: "Không được để trống tên phòng ban",
            showConfirmButton: false,
            timer: 2000
        });
    }
    var data = {
        role_name: role_name
    };
    $.ajax({
        url: '?mod=users&action=add_role_ajax',
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function (data) {
            if (data.status == "success") {
                $("#role").html(data.list_role);
                $("#list_roles").html(data.list_roles);
                Swal.fire({
                    icon: 'success',
                    title: 'Thêm thành công!',
                    showConfirmButton: false,
                    timer: 3000
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Thêm không thành công!',
                    text: "Phòng ban đã tồn tại!",
                    showConfirmButton: false,
                    timer: 2000
                });
            }
            $("#role_name").val("");
        }
    });
}

function delete_role(_this) {//Xóa phân quyền
    Swal.fire({
        title: 'Bạn chắc chắn chứ?',
        text: 'Hành động này không thể hoàn tác!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Đồng ý',
        cancelButtonText: 'Hủy bỏ'
    }).then((result) => {
        if (result.isConfirmed) {
            var id = $(_this).attr('id');
            var data = {
                id: id
            }

            $.ajax({
                url: '?mod=users&action=delete_role_ajax',
                method: 'POST',
                data: data,
                dataType: 'json',
                success: function (data) {
                    $("#list_roles").html(data.list_role);
                    $("#role").val(data.list_select);
                    $("#list_users").html(data.list_users);
                }
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire('Đã hủy bỏ', '', 'error');
            return false;
        }
    });
}