<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">

    <!-- Custom CSS -->
    @yield('cssTambah')

    <!-- Script -->
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    @stack('scriptsAtas')

    <!-- Bootstrap -->
    @vite(['resources/js/app.js'])

    <title>@yield('title')</title>
</head>
<body id="body-pd">
    <div style="text-decoration: none">
        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div> 
                    <a href="#" class="nav_logo"> <i class='bx bxs-coffee-bean nav_logo-icon'></i> <span class="nav_logo-name">Kopi Gedhong</span> </a>
                    <div class="nav_list"> 
                        <a href="{{route('dashboard.index')}}" class="nav_link {{ Request::is('dashboard','dashboard/*','/') ? 'active':'' }}"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 
                        <a href="{{route('barang.index')}}" class="nav_link {{ Request::is('barang','barang/*') ? 'active':'' }}"> <i class='bx bx-box nav_icon'></i> <span class="nav_name">Barang</span> </a> 
                        <a href="{{route('pembelian.index')}}" class="nav_link {{ Request::is('pembelian','pembelian/*') ? 'active':'' }}"> <i class='bx bxs-truck nav_icon'></i> <span class="nav_name">Pembeian</span> </a> 
                        <a href="{{route('penjualan.index')}}" class="nav_link {{ Request::is('penjualan','penjualan/*') ? 'active':'' }}"> <i class='bx bx-coin-stack nav_icon'></i> <span class="nav_name">Penjualan</span> </a> 
                        <a href="#" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Dalam Pengerjaan</span> </a> 
                        <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Dalam Pengerjaan</span> </a> 
                    </div>
                </div> 
            </nav>
        </div>
    </div>
    <!--Container Main start-->
    <div class="height-200 bg-light" style="margin-top: 70px">
        @yield('content')
    </div>
    <!--Container Main end-->

    <!-- Costum Js -->
    @yield('scriptTambah')
    @stack('scripts')
    
</body>
</html>