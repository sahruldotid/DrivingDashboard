 <div class="row">
     <div class="col-md-12 col-sm-12 ">
         <div class="dashboard_graph">
             <div class="row x_title">
                 <div class="col-md-12">
                     <h3>Omzet Bulanan</h3>
                 </div>
             </div>
             <div class="col-md-12 col-sm-12 ">
                 <canvas id="omzet-bulanan"></canvas>
                 <script>
                     var date = new Date();
                     var daftarBulanan = getOmzetMonthly(date.getFullYear(), date.getMonth(), date.getDate() + 1);
                     const ctx_bulanan = document.getElementById('omzet-bulanan').getContext('2d');
                     const omzet_bulanan = new Chart(ctx_bulanan, {
                         type: 'line',
                         data: {
                             labels: getMonthName(daftarBulanan),
                             datasets: [{
                                 label: 'Omzet Member',
                                 data: parseOmzet(daftarBulanan).member,
                                 fill: false,
                                 borderColor: 'rgb(39, 149, 39)',
                                 tension: 0.1
                             },
                             {
                                 label: 'Omzet Guest',
                                 data: parseOmzet(daftarBulanan).guest,
                                 fill: false,
                                 borderColor: 'rgb(255, 0, 0)',
                                 tension: 0.1
                             },
                             {
                                 label: 'Omzet Total',
                                 data: parseOmzet(daftarBulanan).total,
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
