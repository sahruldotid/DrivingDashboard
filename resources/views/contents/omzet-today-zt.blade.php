<div class="col-md-4 col-sm-4 ">
    <div class="dashboard_graph">
        <div class="row x_title">
            <div class="col-md-12">
                <h3>OMZET TODAY</h3>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 ">
            <canvas id="tdy-omzet-zt"></canvas>
            <script>
                var date = new Date();
                var daftarTDYZTomzet = getOmzetTodayZT(2010, 10, 29, 22, 23, 05, 10);
                var xValues = ["ZT I", "ZT II", "ZT III"];
                var yValues = [parseOmzetZT(daftarTDYZTomzet).zt1, parseOmzetZT(daftarTDYZTomzet).zt2, parseOmzetZT(
                    daftarTDYZTomzet).zt3];
                var barColors = [
                    "#ff4500",
                    "#ffa500",
                    "#4bc0c0"
                ];
                new Chart("tdy-omzet-zt", {
                    plugins: [ChartDataLabels],
                    type: "pie",
                    data: {
                        labels: xValues,
                        datasets: [{
                            backgroundColor: barColors,
                            data: yValues
                        }]
                    },
                    options: {
                        plugins: {
                            datalabels: {
                                formatter: function (value, context) {
                                    return context.chart.data.labels[context.dataIndex];
                                },
                                color: 'white',
                            }
                        }
                    }
                });

            </script>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
</div>
<br />
