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
                    var daftarBulananZT3 = getOmzetMonthlyZT3(date.getFullYear(), date.getMonth(), date.getDate() + 1);
                     const ctx_zt3 = document.getElementById('omzet-bulanan-zt3').getContext('2d');
                     const omzet_bulanan_zt3 = new Chart(ctx_zt3, {
                         type: 'line',
                         data: {
                             labels: getMonthName(daftarBulananZT3),
                             datasets: [{
                                 label: 'Omzet Member',
                                 data: parseOmzet(daftarBulananZT3).member,
                                 fill: false,
                                 borderColor: 'rgb(39, 149, 39)',
                                 tension: 0.1
                             },
                             {
                                 label: 'Omzet Guest',
                                 data: parseOmzet(daftarBulananZT3).guest,
                                 fill: false,
                                 borderColor: 'rgb(255, 0, 0)',
                                 tension: 0.1
                             },
                             {
                                 label: 'Omzet Total',
                                 data: parseOmzet(daftarBulananZT3).total,
                                 fill: false,
                                 borderColor: 'rgb(75, 192, 192)',
                                 tension: 0.1
                             }]
                         },
                         options: {
                             scales: {
                                 y: {
                                     beginAtZero: true
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
