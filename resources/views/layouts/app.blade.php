<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>NYX</title>
    <link rel="icon" href="img/NYX_logo.png" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        html,
        body,
        header,
        .carousel {
            height: 60vh;
        }

        /* @media(max-width: 740px){
      html,
    body,
    header,
    .carousel{
      height: 100vh;
    } */
        @media(min-width: 800px)and (max-width: 850px) {

            html,
            body,
            header,
            .carousel {
                height: 100vh;
            }

            .carousel {
                height: 100%;
            }
        }

    </style>
</head>

<body>


    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                Lamoda
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    @can('user-permission')
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link">Users</a>
                    </li>
                    @endcan
                    @can('role-permission')
                    <li class="nav-item">
                        <a href="{{ route('roles.index') }}" class="nav-link">Roles</a>
                    </li>
                    @endcan
                    @can('category-permission')
                    <li class="nav-item">
                        <a href="{{ route('categories.index') }}" class="nav-link">Categories</a>
                    </li>
                    @endcan
                    @can('material-permission')
                    <li class="nav-item">
                        <a href="{{ route('materials.index') }}" class="nav-link">Materials</a>
                    </li>
                    @endcan
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item">
                        <a href="{{ route('orders.basket') }}" class="nav-link waves-effect">
                            <i class="fa fa-shopping-cart"></i>
                            <span class="clearfix d-none d-sm-inline-block">Cart</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="{{ route('orders.purchases') }}" class="dropdown-item">Purchase history</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                Logout-me
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main>


        @yield('content')
    </main>

    <footer class="page-footer text-center font-small-blue mt-4 wow fadeIn">
        <hr class="my-4">
        <div class="pd-4">
            <h4>FOLLOW US ON</h4>
            <a href="#">
                <i class="fab fa-instagram black mr-3">
                </i>
            </a>

            <a href="#">
                <i class="fab fa-facebook black mr-3"></i>
            </a>

            <a href="#">
                <i class="fab fa-twitter black mr-3"></i>
            </a>

            <a href="#">
                <i class="fab fa-pinterest black  mr-3"></i>
            </a>

            <a href="#">
                <i class="fab fa-youtube black mr-3"></i>
            </a>

            <a href="#">
                <i class="fab fa-snapchat black mr-3"></i>
            </a>
        </div>
        <div class="footer-copyright py-3 black text-color-white">
            2020 NYX PROFESSIONAL MAKEUP
        </div>
    </footer>


    <!-- jQuery -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
    <!-- Your custom scripts (optional) -->
    <script type="text/javascript"></script>

</body>

</html>
