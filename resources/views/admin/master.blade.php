<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> RJ SHOES | @yield('title')</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('dist/img/favicon.ico')}}">
    @include('admin.css');
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.0.0/css/font-awesome.css" integrity="sha512-tDTC2Fysq0JMAc//BBwfmSC2pSFlkMVSC5oX4OvBrEr7R0k9t6QGMVeD2cjQQNyhyWrKtamVtWPMJKezLkRKSA==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
</style>
<style>
    .switch {
      position: relative;
      display: inline-block;
      width: 40px;
      height: 24px;
    }

    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 17px;
      width: 17px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked + .slider {
      background-color: #2196F3;
    }

    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
      -webkit-transform: translateX(15px);
      -ms-transform: translateX(15px);
      transform: translateX(15px);
    }

    /* Rounded sliders */
    .slider.round {
      border-radius: 20px;
    }

    .slider.round:before {
      border-radius: 50%;
    }
    .error {
      color: red;
     /* background-color: rgb(167, 172, 179); */
   }
    </style>
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
