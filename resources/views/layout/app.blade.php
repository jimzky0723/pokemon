<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Legend Trainer Guide</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ url('/') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ url('/') }}/css/blog-post.css" rel="stylesheet">
    <style>
        .content-right {
            border-left: 2px solid #ccc;
            margin-top: 1.5rem!important;
            padding: 0px 1.5rem;
        }
        .bg-dark, .bg-primary, .bg-success, .bg-danger {
            color: #fff;
        }
        .legendary,.epic,.rare,.normal,.common{
            font-weight: bold;
        }
        .mythical { color: #B22222; }
        .legendary { color: #FFA500; }
        .epic { color: #9932CC }
        .rare { color: #0000FF }
        .normal { color: #17d721}
        .common { color: #8d8d8d }

        .background-mythical { background: #B22222; }
        .background-legendary { background: #FFA500; }
        .background-epic { background: #9932CC }
        .background-rare { background: #0000FF }
        .background-normal { background: #17d721}
        .background-common { background: #8d8d8d }

        .pull-right { float: right; }
    </style>
    @yield('css')

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ url('logo.png') }}" style="height:30px !important;">
            Legend Trainer Map Guide</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('pokemon') }}">Find Pokemon</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('map') }}">Map</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('suggestion') }}">Any Suggestion?</a>
                </li>
                @if(\Illuminate\Support\Facades\Session::get('isLogin'))
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Settings
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('admin/pokemon') }}">Pokemon</a>
                        <a class="dropdown-item" href="{{ url('admin/pokemon/type') }}">Pokemon Type</a>
                        <a class="dropdown-item" href="{{ url('admin/map') }}">Map</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
                    </div>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">
    @yield('content')
</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{ url('/') }}/vendor/jquery/jquery.min.js"></script>
<script src="{{ url('/') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
@yield('script')
</body>

</html>
