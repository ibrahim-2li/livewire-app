<!DOCTYPE html>
<html lang="en">

@include('front.partials.head')

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="51">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
        <!-- Spinner End -->

        <!-- Navbar & Hero Start -->

            @include('front.partials.navbar')

            @yield('header-content')
        <!-- Navbar & Hero End -->

        @yield('content')

        @include('front.partials.copyright')
        <!-- Footer Start -->
        {{-- @include('front.partials.footer') --}}
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    </div>

    @include('front.partials.scripts')
</body>

</html>
