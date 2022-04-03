 <div class="row">
     <div class="col-md-12 col-sm-12 ">
         <div class="dashboard_graph">
             <div class="row x_title">
                 <div class="col-md-12">
                     <h3>Omzet Time Zone Monthly</h3>
                 </div>
             </div>
             <!-- date.getFullYear(), date.getMonth() + 1, date.getDate() -->
             <div class="col-md-12 col-sm-12 ">
                 <canvas id="omzet-bulanan-zt"></canvas>
                 <script>
                    var date = new Date();
                    var daftarBulananZT = getOmzetMonthlyZT(2010, 10, 29);
                     const ctx = document.getElementById('omzet-bulanan-zt').getContext('2d');
                     const omzet_bulanan_zt = new Chart(ctx, {
                         type: 'line',
                         data: {
                             labels: getMonthName(daftarBulananZT),
                             datasets: [{
                                 label: 'Omzet ZT 1',
                                 data: parseOmzetZT(daftarBulananZT).zt1,
                                 fill: false,
                                 borderColor: 'blue',
                                 tension: 0.1
                             },
                             {
                                 label: 'Omzet ZT 2',
                                 data: parseOmzetZT(daftarBulananZT).zt2,
                                 fill: false,
                                 borderColor: 'green',
                                 tension: 0.1
                             },
                             {
                                 label: 'Omzet ZT 3',
                                 data: parseOmzetZT(daftarBulananZT).zt3,
                                 fill: false,
                                 borderColor: 'rgb(75, 192, 192)',
                                 tension: 0.1
                             },
                             {
                                 label: 'Omzet ZT Total',
                                 data: parseOmzetZT(daftarBulananZT).total,
                                 fill: false,
                                 borderColor: 'red',
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
