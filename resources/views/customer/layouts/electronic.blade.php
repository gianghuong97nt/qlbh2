<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('customer.partials.head')
    @yield('style')
<body>
    @include('customer.partials.header')
    @yield('content')
    @include('customer.partials.newsletter')
    @include('customer.partials.footer')
</body>
</html>
