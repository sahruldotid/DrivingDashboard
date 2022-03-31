     <div class="col-md-4 col-sm-4 ">
         <div class="dashboard_graph">
             <div class="row x_title">
                 <div class="col-md-12">
                     <h3>OMZET MTD</h3>
                 </div>
             </div>
             <div class="col-md-12 col-sm-12 ">
                <canvas id="mtd-omzet"></canvas>
                <script>
                var date = new Date();
                var daftarMTDomzet = getOmzetMTD(date.getFullYear(), date.getMonth() + 1, date.getDate());
                var xValues = ["Member", "Guest"];
                var yValues = [parseOmzet(daftarMTDomzet).member, parseOmzet(daftarMTDomzet).guest];
                var barColors = [
                "#FFA500",
                "#FF4500",
                "#00C5CD"
                ];

                new Chart("mtd-omzet", {
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
 <br />
