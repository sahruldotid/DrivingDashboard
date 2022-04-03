<div class="row">
    <div class="col-md-4 col-sm-4 ">
        <div class="dashboard_graph">
            <div class="row x_title">
                <div class="col-md-12">
                    <h3>OMZET YTD</h3>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 ">
                <canvas id="ytd-omzet-zt"></canvas>
                <script>
                    var date = new Date();
                    var daftarYTDZTomzet = getOmzetYTDZT(2010, 10, 29);
                    var xValues = ["ZT I", "ZT II", "ZT III"];
                    var yValues = [parseOmzetZT(daftarYTDZTomzet).zt1, parseOmzetZT(daftarYTDZTomzet).zt2, parseOmzetZT(
                        daftarYTDZTomzet).zt3];
                    var barColors = [
                        "#ff4500",
                        "#ffa500",
                        "#4bc0c0"
                    ];
                    new Chart("ytd-omzet-zt", {
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
