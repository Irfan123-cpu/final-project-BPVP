<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Codescandy" name="author">
    <title>Blank | Dasher - Responsive Bootstrap 5 Admin Dashboard</title>

    @include('admin.components.icons')

    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="msapplication-TileImage"
        content="{{ asset('storage/admin/assets/images/favicon/ms-icon-144x144.png') }}" />
    <meta name="theme-color" content="#ffffff" />

    @include('admin.components.js-head')

    @include('admin.components.css')

</head>

<body class="d-flex flex-column min-vh-100">

    @include('admin.partial.side-navbar')
    <!-- Main Content -->
    <div id="content" class="position-relative h-100 flex-grow-1">
        @include('admin.partial.top-navbar')
        <div class="custom-container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <!-- Page header -->
                    <div class="mb-5">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.components.js')

    <style>
.footer-fixed {
    position: fixed;
    bottom: 0;
    left: 250px; /* sesuaikan sidebar */
    right: 0;
    /* background: #fff; */
    padding: 12px 0;
    /* border-top: 1px solid #e5e5e5; */
    z-index: 999;
}

#content {
    padding-bottom: 60px; /* biar gak ketutup footer */
}
</style>


      <footer class="footer-fixed">
    <div class="container text-center">
        <p class="mb-0">
            © All rights reserved by 
            <a href="https://codescandy.com" target="_blank">CodesCandy</a>. 
            Distributed <span>with 🤍</span> by 
            <a href="https://themewagon.com" target="_blank">ThemeWagon</a>.
        </p>
    </div>
</footer>
    {{-- <footer class="footer mt-auto">
      <div class="container">
        <div class="row align-items-center flex-row-reverse">
          <div class="col-md-12 col-sm-12 text-center">
            <p class="text-center">© All rights reserved by <a href="https://codescandy.com"
                target="_blank">CodesCandy</a>. Distributed <i class="icon-heart"
                aria-hidden="true">with🤍</i> by <a href="https://themewagon.com"
                target="_blank">ThemeWagon</a>.</p>
          </div>
        </div>
      </div>
    </footer> --}}

</body>

</html>