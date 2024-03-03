<!DOCTYPE html>
<html lang="en">

@include('backend.layouts.head')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('backend.layouts.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('backend.layouts.header')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                @yield('main-content')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            @include('backend.layouts.footer')

        </div>
        <script src="{{ asset('dist/js/lightbox.js') }}"></script>
        <script>
            lightbox.option({
                'resizeDuration': 200,
                'wrapAround': true,
                'fitImagesInViewport': true,
                'maxWidth': 800,
                'maxHeight': 600,
            });
        </script>
</body>

</html>