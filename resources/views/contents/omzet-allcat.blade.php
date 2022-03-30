<div class="row justify-content-center" style="width: 100%;">
    <div class="tile_count" style="margin-right: 2%;">
        <div class="tile_stats_count" style="border-style: groove; border-bottom: solid; border-color: #73879C;">
            <span class="count_top">
                <i class = "fa fa-money">
                </i>
                Omzet YTD
            </span>
            <div style="font-size: 42px; font-weight: bold">
                Rp.
                <span id="outputyearly" class="count">
                </span>
            </div>
            <div class="row">
                <div class="column col-md" style="margin-top: 3%; border-style: groove; border-top: hidden; border-left: hidden; border-bottom: hidden; border-color: #73879C;">
                        <div>
                            <span class="count_bottom">
                                Member: Rp. <span id="outputmember" style = "color: #FF8A00;"> </span>
                            </span>
                        </div>
                        <div>
                            <span class="count_bottom">
                                Guest: Rp. <span id="outputguest" style = "color: #FF8A00;"> </span>
                            </span>
                        </div>
                </div>
                <div class="column col-md" style="margin-top: 3%">
                        <div>
                            <span class="count_bottom">
                                ZT1: Rp. <span id="outputzt1" style = "color: #FF8A00;"> </span>
                            </span>
                        </div>
                        <div>
                            <span class="count_bottom">
                                ZT2: Rp. <span id="outputzt2" style = "color: #FF8A00;"> </span>
                            </span>
                        </div>
                        <div>
                            <span class="count_bottom">
                                ZT3: Rp. <span id="outputzt3" style = "color: #FF8A00;"> </span>
                            </span>
                        </div>
                </div>
            </div>
            <script>
                //OmzetYTD
                var date = new Date(2008, 0);
                var daftarYearlyOmzet= getOmzetYearly(date.getFullYear(), date.getMonth());
                document.getElementById('outputyearly').innerHTML = parseTotal(daftarYearlyOmzet);
                document.getElementById('outputmember').innerHTML = parseMember(daftarYearlyOmzet);
                document.getElementById('outputguest').innerHTML = parseGuest(daftarYearlyOmzet);
                function parseTotal(data) {
                    var total = []
                    
                    data.total.forEach(element => {
                        total.push(element.jumlah)
                    });
                    
                    return total;
                }
                function parseMember(data) {
                    var member = []
                    
                    data.member.forEach(element => {
                        member.push(element.jumlah)
                    });
                    
                    return member;
                }
                function parseGuest(data) {
                    var guest = []
                    
                    data.guest.forEach(element => {
                        guest.push(element.jumlah)
                    });
                    
                    return guest;
                }

                //Omzet ZT
                var date = new Date(2008, 0);
                var daftarYearlyZT= getOmzetYearlyZT(date.getFullYear(), date.getMonth());
                document.getElementById('outputzt1').innerHTML = parseZT1(daftarYearlyZT);
                document.getElementById('outputzt2').innerHTML = parseZT2(daftarYearlyZT);
                document.getElementById('outputzt3').innerHTML = parseZT3(daftarYearlyZT);

                function parseZT1(data) {
                    var tz1 = []
                    
                    data.zt1.forEach(element => {
                        tz1.push(element.jumlah)
                    });
                    
                    return tz1;
                }
                function parseZT2(data) {
                    var tz2 = []
                    
                    data.zt2.forEach(element => {
                        tz2.push(element.jumlah)
                    });
                    
                    return tz2;
                }
                function parseZT3(data) {
                    var tz3 = []
                    
                    data.zt3.forEach(element => {
                        tz3.push(element.jumlah)
                    });
                    
                    return tz3;
                }
            </script>
        </div>
    </div>
    <div class="tile_count" style="margin-right: 2%;">
        <div class="tile_stats_count" style="border-style: groove; border-bottom: solid; border-color: #73879C;">
            <span class="count_top">
                <i class = "fa fa-money">
                </i>
                Omzet MTD
            </span>
            <div style="font-size: 42px; font-weight: bold">
                Rp.
                <span id="outputmonthly" class="count">
                </span>
            </div>
            <div class="row">
                <div class="column col-md" style="margin-top: 3%; border-style: groove; border-top: hidden; border-left: hidden; border-bottom: hidden; border-color: #73879C;">
                        <div>
                            <span class="count_bottom">
                                Member: Rp. <span id="outputmonthlymember" style = "color: #FF8A00;"> </span>
                            </span>
                        </div>
                        <div>
                            <span class="count_bottom">
                                Guest: Rp. <span id="outputmonthlyguest" style = "color: #FF8A00;"> </span>
                            </span>
                        </div>
                </div>
                <div class="column col-md" style="margin-top: 3%">
                        <div>
                            <span class="count_bottom">
                                ZT1: Rp. <span id="outputmonthlyzt1" style = "color: #FF8A00;"> </span>
                            </span>
                        </div>
                        <div>
                            <span class="count_bottom">
                                ZT2: Rp. <span id="outputmonthlyzt2" style = "color: #FF8A00;"> </span>
                            </span>
                        </div>
                        <div>
                            <span class="count_bottom">
                                ZT3: Rp. <span id="outputmonthlyzt3" style = "color: #FF8A00;"> </span>
                            </span>
                        </div>
                </div>
            </div>
            <script>
                //OmzetMTD
                var date = new Date(2008, 0);
                var daftarMonthlyOmzetTot= getOmzetMonthlyTot(date.getFullYear(), date.getMonth());
                document.getElementById('outputmonthly').innerHTML = parseTotal(daftarMonthlyOmzetTot);
                document.getElementById('outputmonthlymember').innerHTML = parseMember(daftarMonthlyOmzetTot);
                document.getElementById('outputmonthlyguest').innerHTML = parseGuest(daftarMonthlyOmzetTot);
                function parseTotal(data) {
                    var total = []
                    
                    data.total.forEach(element => {
                        total.push(element.jumlah)
                    });
                    
                    return total;
                }
                function parseMember(data) {
                    var member = []
                    
                    data.member.forEach(element => {
                        member.push(element.jumlah)
                    });
                    
                    return member;
                }
                function parseGuest(data) {
                    var guest = []
                    
                    data.guest.forEach(element => {
                        guest.push(element.jumlah)
                    });
                    
                    return guest;
                }

                //Omzet MTD ZT
                var date = new Date(2008, 0);
                var daftarMonthlyZT= getOmzetMonthlyTotZT(date.getFullYear(), date.getMonth());
                document.getElementById('outputmonthlyzt1').innerHTML = parseZT1(daftarMonthlyZT);
                document.getElementById('outputmonthlyzt2').innerHTML = parseZT2(daftarMonthlyZT);
                document.getElementById('outputmonthlyzt3').innerHTML = parseZT3(daftarMonthlyZT);

                function parseZT1(data) {
                    var tz1 = []
                    
                    data.zt1.forEach(element => {
                        tz1.push(element.jumlah)
                    });
                    
                    return tz1;
                }
                function parseZT2(data) {
                    var tz2 = []
                    
                    data.zt2.forEach(element => {
                        tz2.push(element.jumlah)
                    });
                    
                    return tz2;
                }
                function parseZT3(data) {
                    var tz3 = []
                    
                    data.zt3.forEach(element => {
                        tz3.push(element.jumlah)
                    });
                    
                    return tz3;
                }
            </script>        
        </div>   
    </div>
    <div class="tile_count">
        <div class="tile_stats_count" style="border-style: groove; border-bottom: solid; border-color: #73879C;">
            <span class="count_top">
                <i class = "fa fa-money">
                </i>
                Omzet Today
            </span>
            <div style="font-size: 42px; font-weight: bold">
                Rp.
                <span id="outputdaily" class="count">
                </span>
            </div>
            <div class="row">
                <div class="column col-md" style="margin-top: 3%; border-style: groove; border-top: hidden; border-left: hidden; border-bottom: hidden; border-color: #73879C;">
                        <div>
                            <span class="count_bottom">
                                Member: Rp. <span id="outputdailymember" style = "color: #FF8A00;"> </span>
                            </span>
                        </div>
                        <div>
                            <span class="count_bottom">
                                Guest: Rp. <span id="outputdailyguest" style = "color: #FF8A00;"> </span>
                            </span>
                        </div>
                </div>
                <div class="column col-md" style="margin-top: 3%">
                        <div>
                            <span class="count_bottom">
                                ZT1: Rp. <span id="outputdailyzt1" style = "color: #FF8A00;"> </span>
                            </span>
                        </div>
                        <div>
                            <span class="count_bottom">
                                ZT2: Rp. <span id="outputdailyzt2" style = "color: #FF8A00;"> </span>
                            </span>
                        </div>
                        <div>
                            <span class="count_bottom">
                                ZT3: Rp. <span id="outputdailyzt3" style = "color: #FF8A00;"> </span>
                            </span>
                        </div>
                </div>
            </div>
            <script>
                //OmzetMTD
                var date = new Date(2008, 1, 1);
                var daftarDailyOmzetTot= getOmzetDailyTot(date.getFullYear(), date.getMonth(), date.getDate());
                document.getElementById('outputdaily').innerHTML = parseTotal(daftarDailyOmzetTot);
                document.getElementById('outputdailymember').innerHTML = parseMember(daftarDailyOmzetTot);
                document.getElementById('outputdailyguest').innerHTML = parseGuest(daftarDailyOmzetTot);
                function parseTotal(data) {
                    var total = []
                    
                    data.total.forEach(element => {
                        total.push(element.jumlah)
                    });
                    
                    return total;
                }
                function parseMember(data) {
                    var member = []
                    
                    data.member.forEach(element => {
                        member.push(element.jumlah)
                    });
                    
                    return member;
                }
                function parseGuest(data) {
                    var guest = []
                    
                    data.guest.forEach(element => {
                        guest.push(element.jumlah)
                    });
                    
                    return guest;
                }

                //Omzet MTD ZT
                var date = new Date(2008, 1, 1);
                var daftarDailyZT= getOmzetDailyTotZT(date.getFullYear(), date.getMonth(), date.getDate());
                document.getElementById('outputdailyzt1').innerHTML = parseZT1(daftarDailyZT);
                document.getElementById('outputdailyzt2').innerHTML = parseZT2(daftarDailyZT);
                document.getElementById('outputdailyzt3').innerHTML = parseZT3(daftarDailyZT);

                function parseZT1(data) {
                    var tz1 = []
                    
                    data.zt1.forEach(element => {
                        tz1.push(element.jumlah)
                    });
                    
                    return tz1;
                }
                function parseZT2(data) {
                    var tz2 = []
                    
                    data.zt2.forEach(element => {
                        tz2.push(element.jumlah)
                    });
                    
                    return tz2;
                }
                function parseZT3(data) {
                    var tz3 = []
                    
                    data.zt3.forEach(element => {
                        tz3.push(element.jumlah)
                    });
                    
                    return tz3;
                }
            </script>        
        </div>   
    </div>            
</div>
