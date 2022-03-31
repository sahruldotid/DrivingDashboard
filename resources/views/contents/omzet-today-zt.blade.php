
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
                var daftarTDYZTomzet = getOmzetTodayZT(date.getFullYear(), date.getMonth() + 1, date.getDate(), date.getHours(), date.getMinutes(), date.getSeconds(), date.getMilliseconds());
                var xValues = ["ZT I", "ZT II", "ZT III"];
                var yValues = [parseOmzetZT(daftarTDYZTomzet).zt1, parseOmzetZT(daftarTDYZTomzet).zt2, parseOmzetZT(daftarTDYZTomzet).zt3];
                var barColors = [
                "#FF4500",
                "#FFA500",
                "#00C5CD"
                ];

                new Chart("tdy-omzet-zt", {
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
                            formatter: function(yValue, context) {
                                let sum = 0;
                                let dataArr = context.chart.data.datasets[0].data;
                                dataArr.map(data => {
                                    sum += data;
                                });
                                let percentage = ((yValue / sum) * 100) +"%";
                                return percentage;
                            },
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
