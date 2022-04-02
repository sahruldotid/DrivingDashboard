 <div class="row">
     <div class="col-md-12 col-sm-12 ">
         <div class="dashboard_graph">
             <div class="row x_title">
                 <div class="col-md-12">
                     <h3>Trend Omzet Daily</h3>
                 </div>
             </div>
             <div class="col-md-12 col-sm-12 ">
                 <canvas id="omzet-daily"></canvas>
                 <script>
                     var date = new Date();
                     var daftarHarian = getDailyOmzet(date.getFullYear(), date.getMonth(), date.getDate() + 1);
                     const data = {
                         labels: getArrBeforeToday(date),
                         datasets: [{
                                 label: 'Omzet Member',
                                 data: parseOmzet(daftarHarian).member,
                                 fill: false,
                                 borderColor: 'rgb(39, 149, 39)',
                                 tension: 0.1
                             },
                             {
                                 label: 'Omzet Guest',
                                 data: parseOmzet(daftarHarian).guest,
                                 fill: false,
                                 borderColor: 'rgb(255, 0, 0)',
                                 tension: 0.1
                             },
                             {
                                 label: 'Omzet Total',
                                 data: parseOmzet(daftarHarian).total,
                                 fill: false,
                                 borderColor: 'rgb(75, 192, 192)',
                                 tension: 0.1
                             }
                         ]
                     };
                     const config = {
                         type: 'line',
                         data,
                         options: {
                             legend: {
                                 labels: {
                                     fontColor: 'white'
                                 }
                             }
                         }
                     };
                     const context = document.getElementById('omzet-daily');
                     const omzet_daily = new Chart(context, config);

                 </script>
             </div>
             <div class="clearfix"></div>
         </div>
     </div>
 </div>
 <br />
