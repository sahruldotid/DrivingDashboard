 <div class="row">
     <div class="col-md-4 col-sm-4 ">
         <div class="dashboard_graph">
             <div class="row x_title">
                 <div class="col-md-12">
                     <h3>OMZET YTD</h3>
                 </div>
             </div>
             <div class="col-md-12 col-sm-12 ">
                <canvas id="ytd-omzet"></canvas>
                <script>
                var date = new Date();
                var daftarYTDomzet = getOmzetYTD(date.getFullYear(), date.getMonth() + 1, date.getDate());
                var xValues = ["Member", "Guest"];
                var yValues = [parseOmzet(daftarYTDomzet).member, parseOmzet(daftarYTDomzet).guest];
                var barColors = [
                "#FFA500",
                "#FF4500",
                "#00C5CD"
                ];

                new Chart("ytd-omzet", {
                type: "pie",
                data: {
                    labels: xValues,
                    datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                    }]
                }
                });
                </script>
             </div>
             <div class="clearfix"></div>
         </div>
     </div>
 
 <br />
