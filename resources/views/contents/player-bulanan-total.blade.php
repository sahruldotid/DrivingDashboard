<div class="row">
     <div class="col-md-12 col-sm-12 ">
         <div class="dashboard_graph">
             <div class="row x_title">
                 <div class="col-md-12">
                     <h3>Player Total Bulanan</h3>
                 </div>
             </div>
             <div class="col-md-12 col-sm-12 ">
                 <canvas id="player-bulanan"></canvas>
                 <script>
                     var date = new Date(2008, 0);
                     var daftarPlayerBulanan = getPlayerMonthly(date.getFullYear(), date.getMonth());
                     const ctx_player = document.getElementById('player-bulanan').getContext('2d');
                     const player_bulanan = new Chart(ctx_player, {
                         type: 'line',
                         data: {
                             labels: getMonthName(daftarPlayerBulanan),
                             datasets: [{
                                 label: 'Player Member',
                                 data: parsePlayer(daftarPlayerBulanan).member,
                                 fill: false,
                                 borderColor: 'rgb(39, 149, 39)',
                                 tension: 0.1
                             },
                             {
                                 label: 'Player Guest',
                                 data: parsePlayer(daftarPlayerBulanan).guest,
                                 fill: false,
                                 borderColor: 'rgb(255, 0, 0)',
                                 tension: 0.1
                             },
                             {
                                 label: 'Player Total',
                                 data: parsePlayer(daftarPlayerBulanan).total,
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

