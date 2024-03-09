<?php
get_header();
get_sidebar();
?>
<div class="content-wrapper" style="justify-content: center; display: flex; align-items: center;">
    <?php
    $sql = db_query("SELECT tb_category.title AS `title`, COUNT(`cat_id`) as total FROM `tb_products` INNER JOIN `tb_category` 
    ON tb_category.id = tb_products.cat_id
    GROUP BY tb_category.title ORDER BY total DESC");

    $labels = [];
    $salesData = [];

    foreach ($sql as $item) {
        $labels[] = $item['title'];
        $salesData[] = $item['total']; // Đã sửa $row thành $item
    }
    ?>
    <div style="width: 500px;" class="text-center">
        <canvas id="polarChart"></canvas>
        <strong>Thống kê số lượng sản phẩm theo danh mục</strong>
    </div>

    <script>
        var ctx = document.getElementById('polarChart').getContext('2d');
        var myPolarChart = new Chart(ctx, {
            type: 'polarArea',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: 'Số sản phẩm',
                    data: <?php echo json_encode($salesData); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    r: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</div>
<div class="content-wrapper">
    <?php
    $customer = db_query("SELECT MONTH(`reg_date`) as month, COUNT(`id`) as total FROM `tb_customers` GROUP BY MONTH(`reg_date`) ORDER BY MONTH(`reg_date`)");
    $month = []; // Khai báo mảng trước khi sử dụng
    $amount = []; // Khai báo mảng trước khi sử dụng

    foreach ($customer as $item) {
        $month[] = $item['month'];
        $amount[] = $item['total'];
    }
    ?>

    <div class="text-center">
        <canvas id="lineChart" width="600" height="200"></canvas>
        <strong>Số khách hàng đăng ký theo tháng</strong>
    </div>
    <script>
        var ctx = document.getElementById('lineChart').getContext('2d');
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($month); ?>,
                datasets: [{
                    label: 'Số lượng khách hàng đăng ký',
                    data: <?php echo json_encode($amount); ?>,
                    fill: false,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    x: [{
                        type: 'linear',
                        position: 'bottom'
                    }]
                }
            }
        });
    </script>
</div>
<?php
get_footer();
?>