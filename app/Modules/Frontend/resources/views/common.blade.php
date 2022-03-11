<!DOCTYPE html>
<html lang="en" class="template-default template-all">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/mini_logo.ico')}}"> <title>RJ Shoes| @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/styles.css')}}" media="all" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/zoomove/1.3.0/zoomove.min.css">
<!------>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.21/jquery.zoom.js"></script>
<!-- JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/zoomove/1.3.0/zoomove.min.js"></script>
    {{-- <style>
          .example {
          border: 1px solid #000;
          display: inline-block;
        }
      </style> --}}
      <style>

        .contain {
            position: absolute;
            right: 10%;
            top: 5%;
            width: 800px;
            height: 500px;
            margin-top: 5px;
        }
        /* img {
            width: 250px;
            height: 250px;
            margin: 20px;
        } */

    </style>
<link rel="stylesheet" href="{{ asset('assets/styles/jquery.jqZoom.css')}}" type="text/css" />

<!------->

</head>

<body>

    <div class="wrapper">
        <div class="page">
            @include('Frontend::header')
            @yield('content')
            @include('Frontend::footer')
        </div>
    </div>
</body>
    @include('Frontend::jquery')
    @yield('custom_scripts')
</html>
