<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@yield('style')
@include('admin.partials.head')
<body class="cbp-spmenu-push">
<div class="main-content">
@include('admin.partials.sidebar')
@include('admin.partials.header')
    <div id="page-wrapper">
        <div class="main-page">
            @yield('content')
        </div>

    </div>
@include('admin.partials.footer')
</div>
@include('admin.partials.main-js')

@yield('script')
</body>
</html>
