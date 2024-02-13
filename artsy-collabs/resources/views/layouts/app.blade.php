<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Simple line icons-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css"
        rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/styles.css')}}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        .bg-glass {
            background-color: hsla(0, 94%, 26%, 0.459) !important;
            backdrop-filter: saturate(200%) blur(25px);
        }
    
    
    
        .error input {
            border: 3px solid red;
        }
    
        .success input {
            border: 3px solid green;
        }
    
        form span.error-msg {
            color: red;
            width: 100%;
            display: flex;
            margin-left: 30%;
            margin-bottom: 20px;
        }
    
        form {
            padding: 20px;
        }
    
        form a {
            margin-left: 25%;
            text-decoration: none;
        }
    
        .card {
            width: 100%;
            border: none;
            background-color: transparent;
            border: none;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    
        .card img {
            width: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin: auto;
        }
    
        .card label {
            margin-top: 30px;
            text-align: center;
            height: 40px;
            cursor: pointer;
            font-weight: bold;
            margin-bottom: 20px;
        }
    
        .card input {
            display: none;
        }
        body{
            height: 100vh;
        }
        #app{
            background-image: url('images/bg.jfif');
            width: 100%;
            height: 100vh;
            background-position: center;
            background-size: cover;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div id="app" class="bg-dark">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <a class="navbar-brand text-light" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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

        <main class="py-4 ">
            @yield('content')
        </main>
    </div>

    <script src="{{asset('js/form.js')}}"></script>
    <script src="{{asset('user/js/scripts.js')}}"></script>
    <script src="{{asset('user/js/filter.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    @if (session('status'))
    <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Success',
                text: '{{ session('status') }}',
                icon: 'success',
                confirmButtonClass: 'btn btn-success', 
                confirmButtonText: 'Cancel',
                confirmButtonColor: 'rgb(102, 102, 245)',
            });
        }, {{ session('delay', 0) }});
    </script>
    @endif

</body>
</html>
