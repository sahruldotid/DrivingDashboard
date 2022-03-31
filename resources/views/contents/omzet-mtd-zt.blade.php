
     <div class="col-md-4 col-sm-4 ">
         <div class="dashboard_graph">
             <div class="row x_title">
                 <div class="col-md-12">
                     <h3>OMZET MTD</h3>
                 </div>
             </div>
             <div class="col-md-12 col-sm-12 ">
                <canvas id="mtd-omzet-zt"></canvas>
                <script>
                var date = new Date();
                var daftarMTDZTomzet = getOmzetMTDZT(date.getFullYear(), date.getMonth() + 1, date.getDate());
                var xValues = ["ZT I", "ZT II", "ZT III"];
                var yValues = [parseOmzetZT(daftarMTDZTomzet).zt1, parseOmzetZT(daftarMTDZTomzet).zt2, parseOmzetZT(daftarMTDZTomzet).zt3];
                var barColors = [
                "#FF4500",
                "#FFA500",
                "#00C5CD"
                ];
                new Chart("mtd-omzet-zt", {
                    type: 'pie',
                    data: {
                        labels: xValues,
                        datasets: [{
                        data: yValues,
                        backgroundColor: barColors
                        }]
                    },
                    options: {
                        plugins: {
                        datalabels: {
                            display: true,
                            align: 'bottom',
                            backgroundColor: '#ccc',
                            borderRadius: 3,
                            font: {
                            size: 18,
                            }
                        },
                        }
                    }
                });
                </script>
             </div>
             <div class="clearfix"></div>
         </div>
     </div>

 <br />
