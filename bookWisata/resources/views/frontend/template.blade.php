<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BookWisata - paket wisata lokal</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    @include('frontend.layouts.head')
</head>

<body>
    <!-- Topbar Start -->
    @include('frontend.layouts.topbar')
    <!-- Topbar End -->


    <!-- Navbar Start -->
    @include('frontend.layouts.navbar')
    <!-- Navbar End -->


    @yield('content')


    <!-- Footer Start -->
    @include('frontend.layouts.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    @include('frontend.layouts.script')

</body>

</html>
