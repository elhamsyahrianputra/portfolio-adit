<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Header -->
    @include('partials.landing-page.header')

    <!-- Style Addition -->
    @yield('style')

</head>

<body>
    
    <!-- Navbar -->
    <header id="header" class="fixed-top @yield('navbar')">
    @include('partials.landing-page.navbar')
    </header>
    
    <!-- Content-->
    @yield('content')

    
    <!-- Footer -->
    @include('partials.landing-page.footer')
    
    <!-- Script Addition -->
    @yield('script')
</body>

</html>