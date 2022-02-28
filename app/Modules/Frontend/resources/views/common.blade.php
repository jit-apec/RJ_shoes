<!DOCTYPE html>
<html lang="en" class="template-default template-all">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Shoes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/styles.css')}}" media="all" />
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
</html>
