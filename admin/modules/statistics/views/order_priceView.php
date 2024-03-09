<?php
get_header();
get_sidebar();
?>
<div class="content-wrapper">
    <div class="card-header">
        <h3 class="card-title">THỐNG KÊ DOANH THU</h3>
    </div>
    <div class="card" style="display: flex; align-items: center; justify-content: center;">
        <?php
        $query = db_fetch_array("SELECT MONTHNAME(`time`) as monthname,SUM(`quantity`) as amount FROM `tb_orders`
GROUP BY monthname
 ");
        foreach ($query as $data) {
            $month[] = $data['monthname'];
            $amount[] = $data['amount'];
        }

        ?>
        <div style="width: 700px;" class="text-center">
            <canvas id="myChart"></canvas>
            <strong>Thống kê sản phẩm bán theo tháng</strong>
        </div>
        <script>
            // === include 'setup' then 'config' above ===
            const labels = <?php echo json_encode($month) ?>;
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Số sản phẩm',
                    data: <?php echo json_encode($amount) ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                }]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            };

            var myChart = new Chart(
                document.getElementById('myChart'),
                config
            );
        </script>
    </div>
    <div class="card">
        <?php
        $order_price = db_query("SELECT YEAR(`time`) as year, MONTH(`time`) as month, SUM(`total_price`) as total FROM `tb_orders` GROUP BY YEAR(`time`), MONTH(`time`) ORDER BY YEAR(`time`), MONTH(`time`)");
        $thang = [];
        $tongtien = [];

        foreach ($order_price as $item) {
            $thang[] = $item['year'] . '-' . $item['month']; // Sử dụng cả năm và tháng để tạo nhãn đầy đủ
            $tongtien[] = $item['total'];
        }
        ?>
        <div class="text-center">
            <canvas id="lineChartThang" width="600" height="200"></canvas>
            <strong>Doanh thu bán hàng theo tháng</strong>
        </div>
        <script>
            var ctx = document.getElementById('lineChartThang').getContext('2d');
            var myLineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($thang); ?>,
                    datasets: [{
                        label: 'Doanh thu',
                        data: <?php echo json_encode($tongtien); ?>,
                        fill: false,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 2
                    }]
                },
                options: {
                    scales: {
                        x: [{
                            type: 'category',
                            ticks: {
                                min: <?php echo min($thang); ?>,
                                max: <?php echo max($thang); ?>
                            }
                        }],
                        y: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>
    </div>
    <div class="card">
        <?php
        $order_price_ngay = db_query("SELECT DATE(`time`) as date, SUM(`total_price`) as total FROM `tb_orders` GROUP BY DATE(`time`) ORDER BY DATE(`time`)");
        $ngay = [];
        $tongtien_ngay = [];

        foreach ($order_price_ngay as $item) {
            $ngay[] = $item['date'];
            $tongtien_ngay[] = $item['total'];
        }
        ?>
        <div class="text-center">
            <canvas id="lineChartNgay" width="600" height="200"></canvas>
            <strong>Doanh thu bán hàng theo ngày</strong>
        </div>
        <script>
            var ctx = document.getElementById('lineChartNgay').getContext('2d');
            var myLineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($ngay); ?>,
                    datasets: [{
                        label: 'Doanh thu',
                        data: <?php echo json_encode($tongtien_ngay); ?>,
                        fill: false,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 2
                    }]
                },
                options: {
                    scales: {
                        x: [{
                            type: 'time',
                            time: {
                                unit: 'day', // Thiết lập đơn vị thời gian là ngày
                                displayFormats: {
                                    day: 'MMM DD' // Định dạng hiển thị cho mỗi ngày
                                }
                            },
                            ticks: {
                                source: 'labels', // Dữ liệu cho trục x từ labels
                                min: <?php echo json_encode(min($ngay)); ?>, // Giá trị tối thiểu là ngày nhỏ nhất
                                max: <?php echo json_encode(max($ngay)); ?>, // Giá trị tối đa là ngày lớn nhất
                            }
                        }],
                        y: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>
    </div>


</div>

<?php
get_footer();
?>