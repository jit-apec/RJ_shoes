<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> RJ SHOES | @yield('title')</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('dist/img/favicon.ico')}}">
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
