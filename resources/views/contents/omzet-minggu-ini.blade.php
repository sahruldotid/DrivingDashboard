 <div class="row">
     <div class="col-md-12 col-sm-12 ">
         <div class="dashboard_graph">
             <div class="row x_title">
                 <div class="col-md-12">
                     <h3>Omzet Minggu Ini</h3>
                 </div>
             </div>
             <div class="col-md-9 col-sm-9 ">
                 <canvas id="omzet-mingguan"></canvas>
                 <script>
                     const ctx = document.getElementById('omzet-mingguan').getContext('2d');
                     const omzet_mingguan = new Chart(ctx, {
                         type: 'line',
                         data: {
                             labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
                             datasets: [{
                                 label: 'My First Dataset',
                                 data: [65, 59, 80, 81, 56, 55, 40],
                                 fill: false,
                                 borderColor: 'rgb(75, 192, 192)',
                                 tension: 0.1
                             }]
                         },

                     });

                 </script>
             </div>
             {{-- <div class="col-md-3 col-sm-3  bg-white">
                 <div class="x_title">
                     <h2>Top Campaign Performance</h2>
                     <div class="clearfix"></div>
                 </div>
                 <div class="col-md-12 col-sm-12 ">
                     <div>
                         <p>Facebook Campaign</p>
                         <div class="">
                             <div class="progress progress_sm" style="width: 76%;">
                                 <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80"></div>
                             </div>
                         </div>
                     </div>
                     <div>
                         <p>Twitter Campaign</p>
                         <div class="">
                             <div class="progress progress_sm" style="width: 76%;">
                                 <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60"></div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-12 col-sm-12 ">
                     <div>
                         <p>Conventional Media</p>
                         <div class="">
                             <div class="progress progress_sm" style="width: 76%;">
                                 <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="40"></div>
                             </div>
                         </div>
                     </div>
                     <div>
                         <p>Bill boards</p>
                         <div class="">
                             <div class="progress progress_sm" style="width: 76%;">
                                 <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div> --}}
             <div class="clearfix"></div>
         </div>
     </div>
 </div>
 <br />
