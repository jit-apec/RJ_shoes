<!DOCTYPE html>
<html lang="en" class="template-default template-all">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>shoes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/styles.css')}}" media="all" />

</head>

<body onload="displaylist();">
    <div class="wrapper">
        <div class="page">
            @include('Frontend::header')
            @include('Frontend::filter')
            @yield('content')
            @include('Frontend::footer')
        </div>
    </div>
</body>
@include('Frontend::jquery')
@yield('custom_scripts')
</html>
