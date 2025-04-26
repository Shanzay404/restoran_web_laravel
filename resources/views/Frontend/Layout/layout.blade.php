<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Restoran</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    @include('Frontend.includes.css-links')
</head>

<body>
    <div class="container-xxl bg-white p-0">

        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">

           @include('Frontend.includes.spinner')

        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">

            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">

                @include('Frontend.includes.navbar')

            </nav>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                @if (View::hasSection('header'))
                    @yield('header')
                @endif
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <div class="content">
            @yield('content')
        </div>

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">

           @include('Frontend.includes.footer')

        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        @include('Frontend.includes.arrow-up-link')
    </div>

        @include('Frontend.includes.scripts')
</body>

</html>