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
                    //  Chart.register([ChartDataLabels]);
                    // https://stackoverflow.com/questions/71012950/chart-js-v3-5-1-change-bar-background-label-font-color-on-click
                    // https://www.chartjs.org/docs/latest/samples/scale-options/titles.html
                    const data = {
                         labels: getArrBeforeToday(),
                         datasets: [{
                                 label: 'Omzet Member',
                                 data: Array(getArrBeforeToday().length).fill().map(() => Math.round(
                                     Math.random() * getArrBeforeToday().length)),
                                 fill: false,
                                 borderColor: 'rgb(39, 149, 39)',
                                 tension: 0.1
                             },
                             {
                                 label: 'Omzet Guest',
                                 data: Array(getArrBeforeToday().length).fill().map(() => Math.round(Math
                                     .random() * getArrBeforeToday().length)),
                                 fill: false,
                                 borderColor: 'rgb(255, 0, 0)',
                                 tension: 0.1
                             },
                             {
                                 label: 'Omzet Total',
                                 data: Array(getArrBeforeToday().length).fill().map(() => Math.round(Math
                                     .random() * getArrBeforeToday().length)),
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
                     const plugin = {

                     }
                     const context = document.getElementById('omzet-daily');
                     const omzet_daily = new Chart(context, config);

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
