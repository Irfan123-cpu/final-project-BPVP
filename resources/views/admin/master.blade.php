<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard | Dasher</title>

    @include('admin.components.icons')

    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="msapplication-TileImage" content="../assets/images/favicon/ms-icon-144x144.png" />
    <meta name="theme-color" content="#ffffff" />

    @include('admin.components.js-head')
    @include('admin.components.css')

    <style>
        html, body {
            height: 100%;
        }

        #content {
            margin-left: 200px;
            width: calc(100% - 250px);
        }
    </style>
</head>

<body class="d-flex">

    <!-- Sidebar -->
    @include('admin.partial.side-navbar')

    <!-- Content Wrapper -->
    <div id="content" class="d-flex flex-column min-vh-100 flex-grow-1">

        @include('admin.partial.top-navbar')

        <!-- Content -->
        <div class="custom-container flex-grow-1 px-4">
            <h1 class="mb-4">Dashboard</h1>
        </div>

    </div>

    <!-- FOOTER (DI LUAR CONTENT) -->
    <footer class="text-light text-center w-100"
        style="
            background: #111827;
            border-top: 1px solid #1f2937;
            position: fixed;
            bottom: 0;
            left: 50px;
            width: calc(100% - 250px);
        ">

        <div class="py-3">
            © {{ date('Y') }} Your App. All rights reserved.
            <br>
            <small>
                Template by 
                <a href="https://codescandy.com" target="_blank" class="text-info text-decoration-none">CodesCandy</a>
                · Distributed by 
                <a href="https://themewagon.com" target="_blank" class="text-info text-decoration-none">ThemeWagon</a>
            </small>
        </div>

    </footer>

    @include('admin.components.js')

    <style>
        #content {
            margin-left: 250px;
            width: calc(100% - 250px);
        }
    </style>

</body>
</html>