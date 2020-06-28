<!-- Begin Page Content -->
<div class="container-fluid">
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.js"></script>

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- Bar Chart -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Grafik Bar Gangguan</h6>
        </div>
        <div class="card-body">
            <div class="chart-bar">
                <canvas id="myChart"></canvas>
            </div>
            <hr>
            Total Gangguan = <?= $total; ?>
        </div>
    </div>

    <script>
        var ctx = document.getElementById("myChart");

        var data_status = [];
        var data_total = [];

        $.post("<?= base_url('/input/getData') ?>",
            function(data) {
                var obj = JSON.parse(data);
                $.each(obj, function(test, item) {
                    data_status.push(item.status);
                    data_total.push(item.total);
                });


                var myBarChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: data_status,
                        datasets: [{
                            label: "Total",
                            backgroundColor: "#df4e4e",
                            hoverBackgroundColor: "#d92e2e",
                            borderColor: "#df4e4e",
                            data: data_total,
                        }],
                    },
                    options: {
                        maintainAspectRatio: false,
                        layout: {
                            padding: {
                                left: 10,
                                right: 25,
                                top: 25,
                                bottom: 0
                            }
                        },
                        scales: {
                            xAxes: [{
                                time: {
                                    unit: 'month'
                                },
                                gridLines: {
                                    display: false,
                                    drawBorder: false
                                },
                                ticks: {
                                    maxTicksLimit: 6
                                },
                                maxBarThickness: 50,
                            }],
                            yAxes: [{
                                ticks: {
                                    min: 0,
                                    maxTicksLimit: 5,
                                    padding: 10,

                                },
                                gridLines: {
                                    color: "rgb(234, 236, 244)",
                                    zeroLineColor: "rgb(234, 236, 244)",
                                    drawBorder: false,
                                    borderDash: [2],
                                    zeroLineBorderDash: [2]
                                }
                            }],
                        },
                        legend: {
                            display: false
                        },
                        tooltips: {
                            titleMarginBottom: 10,
                            titleFontColor: '#6e707e',
                            titleFontSize: 14,
                            backgroundColor: "rgb(255,255,255)",
                            bodyFontColor: "#858796",
                            borderColor: '#dddfeb',
                            borderWidth: 1,
                            xPadding: 15,
                            yPadding: 15,
                            displayColors: false,
                            caretPadding: 10,
                        },
                    }
                });
            });
    </script>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->