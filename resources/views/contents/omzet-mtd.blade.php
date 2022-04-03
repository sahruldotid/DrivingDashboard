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
                 var daftarMTDomzet = getOmzetMTD(2010, 10, 29);
                 var xValues = ["Member", "Guest"];
                 var yValues = [parseOmzet(daftarMTDomzet).member, parseOmzet(daftarMTDomzet).guest];
                 var barColors = [
                     "#ffa500",
                     "#ff4500"
                 ];
                 new Chart("mtd-omzet", {
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
