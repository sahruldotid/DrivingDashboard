<div class="col-md-4 col-sm-4 ">
    <div class="dashboard_graph">
        <div class="row x_title">
            <div class="col-md-12">
                <h3>Omzet Today</h3>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 ">
            <canvas id="tdy-omzet"></canvas>
            <script>
                var daftarTdyomzet = getOmzetToday(date.getFullYear(), date.getMonth(), date.getDate() + 1);
                var xValues = ["Member", "Guest"];
                var yValues = [parseOmzet(daftarTdyomzet).member, parseOmzet(daftarTdyomzet).guest];
                var barColors = [
                    "#ffa500",
                    "#ff4500"
                ];
                new Chart("tdy-omzet", {
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

<br />
