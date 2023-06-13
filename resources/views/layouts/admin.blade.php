<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Header -->
    @include('partials.admin.header')

    <!-- Style Addition -->
    @yield('style')

</head>

<body>
    
    <!-- Navbar -->
    @include('partials.admin.navbar')

    <!-- Sidebar -->
    @include('partials.admin.sidebar')
    
    <main id="main" class="main">
        <!-- Content-->
        @yield('content')
    </main>

    
    <!-- Footer -->
    @include('partials.admin.footer')
    
    <!-- Script Addition -->
    @yield('script')
</body>

</html>