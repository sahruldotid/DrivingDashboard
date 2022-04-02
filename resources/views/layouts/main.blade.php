{{-- // TODO: pecah jadi beberapa bagian navbar, header, body, footer dst dst --}}
<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.header')
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            @include('partials.left-sidebar')
            @include('partials.top-navbar')
            <div class="right_col" role="main">
                @include('contents.omzet-allcat')
                @include('contents.omzet-harian')
                @include('contents.omzet-bulanan')
                @include('contents.player-bulanan-total')
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
