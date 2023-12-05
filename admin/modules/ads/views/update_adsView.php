<?php
get_header();
get_sidebar();
?>
<div class="content-wrapper">
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">SỬA QUẢNG CÁO</h3>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Tên quảng cáo</label>
                        <input readonly type="text" name="name" id="name" value="<?php echo $ads['ads_name'] ?>" class="form-control form-inline"><br>
                    </div>
                    <?php echo form_error("name") ?>

                    <div class="form-group">
                        <label for="title">Link</label>
                        <input type="text" name="slug" id="slug" value="<?php echo $ads['link'] ?>" class="form-control form-inline"><br>
                    </div>
                    <?php echo form_error("slug"); ?>

                    <div class="form-group">
                        <label for="ads_content">Mô tả</label>
                        <textarea name="ads_content" id="ads_content" class="ckeditor" class="form-inline form-control"><?Php echo $ads["ads_content"] ?></textarea><br>
                    </div>
                    <?php echo form_error("ads_content") ?>

                    <label>Hình ảnh</label>
                    <div id="uploadFile">
                        <div class="d-flex">
                            <input type="file" name="file" number="1" id="upload-thumb" onchange="uploadImage(event)" class="form-control-file">
                            <div id="img-thumb-1">
                                <img id="size-img-thumb" src="img/<?php echo $ads['ads_img'] ?>" alt="">
                            </div>
                        </div>
                    </div>
                    <?php echo form_error("file"); ?>

                    <button type="submit" name="update-ads" id="btn-submit" class="btn btn-primary btn-lg">Cập nhật</button><br>
                    <?php echo form_error("account"); ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>