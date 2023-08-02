<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $title }}</title>
    <!-- Meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Login Form"
    />
    <script>
        addEventListener("load", function () { setTimeout(hideURLbar, 0); }, false); function hideURLbar() { window.scrollTo(0, 1); }
    </script>
    <link href="{{ asset('auth/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('auth/style.css') }}" rel='stylesheet' type='text/css' media="all">
    <link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
</head>

<body>
    <h1 class="error">
        <a class="navbar-brand" href="/" style="color: #ff9900">
            EMR Prototype
        </a>
    </h1>
    <div class="wTayouts-two-grids">
        <div class="mid-class">
            <div class="txt-left-side">
                <h2> {{ $title }}</h2>
                @yield('content')
            </div>
        </div>
    </div>

    <footer class="copyrigh-wthree">
        <p>
            © {{ date('Y') }}
        </p>
    </footer>
</body>

</html>
