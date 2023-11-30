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