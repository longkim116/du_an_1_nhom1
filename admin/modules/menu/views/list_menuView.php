<?php
get_header();
get_sidebar();
?>
<div class="content-wrapper">
    <section class="content">
        <div class="col-sm-6">
            <h1>DANH SÁCH MENU</h1>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên menu</th>
                                <th style="width: 50%;">Link url</th>
                                <th style="width: 10%;">Thứ tự</th>
                                <th style="width: 15%;">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($list_parent)) :
                                $count = 0;
                                foreach ($list_parent as $item) : ?>
                                    <tr>
                                        <td><?php echo ++$count ?></td>
                                        <td><?php echo str_repeat("|---| ", $item['level']) . $item['name']  ?></td>
                                        <td><?php echo $item['url'] ?></td>
                                        <td><?php echo $item['number_order'] ?></td>
                                        <td class="justify-content-between">
                                            <a class="btn btn-info btn-sm" href="?mod=menu&action=update_menu&id=<?php echo $item['id'] ?>" title="Sửa"><i class="fas fa-pencil-alt"></i>
                                                Sửa
                                            </a>
                                            <a onclick="return confirm('Bạn chắc muốn xóa menu này không?')" class="btn btn-danger btn-sm" href="?mod=menu&action=delete_menu&id=<?php echo $item['id'] ?>" title="Xóa"><i class="fas fa-trash"></i>
                                                Xóa
                                            </a>
                                        </td>
                                    </tr>
                            <?php endforeach;
                            endif;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
get_footer();
?>