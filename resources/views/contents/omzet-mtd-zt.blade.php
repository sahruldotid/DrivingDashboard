 <div class="col-md-4 col-sm-4 ">
     <div class="dashboard_graph">
         <div class="row x_title">
             <div class="col-md-12">
                 <h3>Omzet ZT MTD</h3>
             </div>
         </div>
         <div class="col-md-12 col-sm-12 ">
             <canvas id="mtd-omzet-zt"></canvas>
             <script>
                 var daftarMTDZTomzet = getOmzetMTDZT(date.getFullYear(), date.getMonth(), date.getDate() + 1);
                 var xValues = ["ZT I", "ZT II", "ZT III"];
                 var yValues = [parseOmzetZT(daftarMTDZTomzet).zt1, parseOmzetZT(daftarMTDZTomzet).zt2, parseOmzetZT(
                     daftarMTDZTomzet).zt3];
                 var barColors = [
                     "#ff4500",
                     "#ffa500",
                     "#4bc0c0"
                 ];
                 new Chart("mtd-omzet-zt", {
                     plugins: [ChartDataLabels],
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
