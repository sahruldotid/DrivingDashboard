 <div class="row">
     <div class="col-md-12 col-sm-12 ">
         <div class="dashboard_graph">
             <div class="row x_title">
                 <div class="col-md-12">
                     <h3>Omzet Zone Time 3 Monthly</h3>
                 </div>
             </div>
             <div class="col-md-12 col-sm-12 ">
                 <canvas id="omzet-bulanan-zt3"></canvas>
                 <script>
                     const ctx_zt3 = document.getElementById('omzet-bulanan-zt3').getContext('2d');
                     const omzet_bulanan_zt3 = new Chart(ctx_zt3, {
                         type: 'line',
                         data: {
                             labels: getFirstMonthUntilNow(),
                             datasets: [{
                                 label: 'Omzet Member',
                                 data: Array(12).fill().map(() => Math.round(Math.random() * 12)),
                                 fill: false,
                                 borderColor: 'rgb(39, 149, 39)',
                                 tension: 0.1
                             },
                             {
                                 label: 'Omzet Guest',
                                 data: Array(12).fill().map(() => Math.round(Math.random() * 12)),
                                 fill: false,
                                 borderColor: 'rgb(255, 0, 0)',
                                 tension: 0.1
                             },
                             {
                                 label: 'Omzet Total',
                                 data: Array(12).fill().map(() => Math.round(Math.random() * 12)),
                                 fill: false,
                                 borderColor: 'rgb(75, 192, 192)',
                                 tension: 0.1
                             }]
                         },
                     });
                 </script>
             </div>
             <div class="clearfix"></div>
         </div>
     </div>
 </div>
 <br />
