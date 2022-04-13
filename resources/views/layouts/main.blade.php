<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.header')
    <script>
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const dateParams = urlParams.get('date');
        if (dateParams) {
            var date = new Date(dateParams);
        } else {
            var date = new Date();
        }

    </script>
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            @include('partials.left-sidebar')
            @include('partials.top-navbar')
            <div class="right_col" role="main">

                @include('contents.omzet-allcat')
                <div>
                    @include('contents.omzet-ytd')
                    @include('contents.omzet-mtd')
                    @include('contents.omzet-today')
                </div>
                <br>

                @include('contents.omzet-ytd-zt')
            @include('contents.omzet-mtd-zt')
                @include('contents.omzet-today-zt')


                @include('contents.omzet-harian')


                <h3>10 Member Teraktif</h3>
                @include('contents.member-aktif')
                @include('contents.member-aktif-1')
                @include('contents.member-aktif-tdy')

                @include('contents.omzet-bulanan')
                @include('contents.player-bulanan-total')
                @include('contents.omzet-bulanan-zt')
                @include('contents.omzet-bulanan-zt1')
                @include('contents.omzet-bulanan-zt2')
                @include('contents.omzet-bulanan-zt3')
            </div>
            <footer>
                <div class="pull-right">
                    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                </div>
                <div class="clearfix"></div>
            </footer>
        </div>
    </div>
    @include('partials.footer')
</body>

</html>
