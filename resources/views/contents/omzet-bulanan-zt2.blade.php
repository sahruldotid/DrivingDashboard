<div class="row">
     <div class="col-md-12 col-sm-12 ">
         <div class="dashboard_graph">
             <div class="row x_title">
                 <div class="col-md-12">
                     <h3>Omzet Zone Time 2 Monthly</h3>
                 </div>
             </div>
             <div class="col-md-12 col-sm-12 ">
                 <canvas id="omzet-bulanan-zt2"></canvas>
                 <script>
                    var daftarBulananZT2 = getOmzetMonthlyZT2(date.getFullYear(), date.getMonth(), date.getDate());
                     const ctx_zt2 = document.getElementById('omzet-bulanan-zt2').getContext('2d');
                     const omzet_bulanan_zt2 = new Chart(ctx_zt2, {
                         type: 'line',
                         data: {
                             labels: getMonthName(daftarBulananZT2),
                             datasets: [{
                                 label: 'Omzet Member',
                                 data: parseOmzet(daftarBulananZT2).member,
                                 fill: false,
                                 borderColor: 'rgb(39, 149, 39)',
                                 tension: 0.1
                             },
                             {
                                 label: 'Omzet Guest',
                                 data: parseOmzet(daftarBulananZT2).guest,
                                 fill: false,
                                 borderColor: 'rgb(255, 0, 0)',
                                 tension: 0.1
                             },
                             {
                                 label: 'Omzet Total',
                                 data: parseOmzet(daftarBulananZT2).total,
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
