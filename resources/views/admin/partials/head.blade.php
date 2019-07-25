<head>
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('admin_assets/css/bootstrap.css') }}" rel='stylesheet' type='text/css' />

    <!-- Custom CSS -->
    <link href="{{ asset('admin_assets/css/style.css') }}" rel='stylesheet' type='text/css' />

    <!-- font-awesome icons CSS -->
    <link href="{{ asset('admin_assets/css/font-awesome.css') }}" rel="stylesheet">
    <!-- //font-awesome icons CSS-->

    <!-- side nav css file -->
    <link href='{{ asset('admin_assets/css/SidebarNav.min.css') }}' media='all' rel='stylesheet' type='text/css'/>
    <!-- //side nav css file -->

    <!-- js-->
    <script src="{{ asset('admin_assets/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/modernizr.custom.js') }}"></script>

    <!--webfonts-->
    <link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
    <!--//webfonts-->

    <!-- chart -->
    <script src="{{ asset('admin_assets/js/Chart.js') }}"></script>
    <!-- //chart -->

    <!-- Metis Menu -->
    <script src="{{ asset('admin_assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/custom.js') }}"></script>
    <link href="{{ asset('admin_assets/css/custom.css') }}" rel="stylesheet">
    <!--//Metis Menu -->
    <style>
        #chartdiv {
            width: 100%;
            height: 295px;
        }
    </style>
    <!--pie-chart --><!-- index page sales reviews visitors pie chart -->
    <script src="{{ asset('admin_assets/js/pie-chart.js') }}" type="text/javascript"></script>
    <script src="{{asset('admin_assets/js/pieChart.js') }}" type="text/javascript"></script>
    <!-- //pie-chart --><!-- index page sales reviews visitors pie chart -->

    <!-- requried-jsfiles-for owl -->
    <link href="{{ asset('admin_assets/css/owl.carousel.css') }}" rel="stylesheet">
    <script src="{{ asset('admin_assets/js/owl.carousel.js') }}"></script>

</head>
