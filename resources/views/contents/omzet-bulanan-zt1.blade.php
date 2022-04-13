<div class="row">
     <div class="col-md-12 col-sm-12 ">
         <div class="dashboard_graph">
             <div class="row x_title">
                 <div class="col-md-12">
                     <h3>Omzet Zone Time 1 Monthly</h3>
                 </div>
             </div>
             <div class="col-md-12 col-sm-12 ">
                 <canvas id="omzet-bulanan-zt1"></canvas>
                 <script>
                    var daftarBulananZT1 = getOmzetMonthlyZT1(date.getFullYear(), date.getMonth(), date.getDate());
                     const ctx_zt1 = document.getElementById('omzet-bulanan-zt1').getContext('2d');
                     const omzet_bulanan_zt1 = new Chart(ctx_zt1, {
                         type: 'line',
                         data: {
                             labels: getMonthName(daftarBulananZT1),
                             datasets: [{
                                 label: 'Omzet Member',
                                 data: parseOmzet(daftarBulananZT1).member,
                                 fill: false,
                                 borderColor: 'blue',
                                 tension: 0.1
                             },
                             {
                                 label: 'Omzet Guest',
                                 data: parseOmzet(daftarBulananZT1).guest,
                                 fill: false,
                                 borderColor: '#57FE00',
                                 tension: 0.1
                             },
                             {
                                 label: 'Omzet Total',
                                 data: parseOmzet(daftarBulananZT1).total,
                                 fill: false,
                                 borderColor: '#F34A02',
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
