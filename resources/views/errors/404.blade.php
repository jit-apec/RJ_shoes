<!DOCTYPE html>
<html lang="en" class="template-default template-all">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/mini_logo.ico') }}">
    <title>RJ Shoes|Page Not Found</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/styles.css') }}" media="all" />

</head>

<body>
    <div class="wrapper">
        <div class="main-container  cms-no-route col1-layout content-color color">
            <div class="page-not-found">
                <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="Shoes Logo" height="200" width="200"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <div class="page-title">
                    <h1><span class="404-title">404</span></h1>
                </div>
                <h2>We’re sorry, but the pageyou were looking for doesn’t exist.</h2>
                <a class="previus-page" href="{{ url('/') }}">Go To HomePage</a>
            </div>
            <!--- .page-not-found-->
        </div>
        <!--- .main-container -->
    </div>
    <!--- .wrapper -->
</body>

</html>
