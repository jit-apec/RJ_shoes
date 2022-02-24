<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css');
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">



        <!-- /.navbar -->
        @include('admin.header')
        @include('admin.sidebar')

        @yield('content')

        @include('admin.footer')

    </div>
    <!-- ./wrapper -->

    @include('admin.jquery')
    @yield('scripts')
</body>

</html>
