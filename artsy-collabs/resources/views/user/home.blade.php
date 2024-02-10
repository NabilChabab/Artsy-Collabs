<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    !-- Favicons -->
    <link href="#" rel="icon">
    <link href="#" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Protest+Riot&display=swap" rel="stylesheet">
    {{-- <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Cardo:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet"> --}}

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center  me-auto me-lg-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <div class="logo">ArtsyCollabs</div>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="index.html" class="active">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li class="dropdown"><a href="#"><span>Gallery</span> <i
                                class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li><a href="gallery.html">Nature</a></li>
                            <li><a href="gallery.html">People</a></li>
                            <li><a href="gallery.html">Architecture</a></li>
                            <li><a href="gallery.html">Animals</a></li>
                            <li><a href="gallery.html">Sports</a></li>
                            <li><a href="gallery.html">Travel</a></li>
                            <li class="dropdown"><a href="#"><span>Sub Menu</span> <i
                                        class="bi bi-chevron-down dropdown-indicator"></i></a>
                                <ul>
                                    <li><a href="#">Sub Menu 1</a></li>
                                    <li><a href="#">Sub Menu 2</a></li>
                                    <li><a href="#">Sub Menu 3</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav><!-- .navbar -->

            <div class="header-social-links d-flex gap-3">
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
                    <li class="nav-item dropdown">
                        <a href="{{route('Profile.index')}}"><img src="{{ Auth::user()->getFirstMediaUrl('images') }}" alt="" srcset=""
                            style="width: 40px;height:40px;border-radius:50%;margin-right:5px;"></a>
                        <a id="navbarDropdown" class="nav-link" href="#" role="button" >
                            {{ Auth::user()->name }}
                        </a>

                        <a class="nav-link" href="{{ route('logout') }}" role="button" style="color:brown;" >
                          Logout
                      </a>

                    </li>
                @endguest
            </div>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex flex-column justify-content-center align-items-center" data-aos="fade"
        data-aos-delay="1500">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2><span>Artsy-Collabs</span> Where Creativity Meets Collaboration</h2>
                    <p>Dynamic online platform dedicated to fostering collaboration and innovation within the artistic community. </p>
                    <a href="contact.html" class="btn-get-started">Available for hire</a>
                    <h2 class="mt-5"><span>Recent Projects</span></h2>
                </div>
            </div>
        </div>
    </section><!-- End Hero Section -->

    <main id="main" data-aos="fade" data-aos-delay="1500">

        <!-- ======= Gallery Section ======= -->
        <section id="gallery" class="gallery">
            <div class="container-fluid">

                <div class="row gy-4 justify-content-center">
                    @foreach ($projects as $project)
                        
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="gallery-item h-100">
                            <img src="{{$project->getFirstMediaUrl('images')}}" class="img-fluid" alt="" style="width: 500px;height:350px;object-fit:cover;">
                            <div class="gallery-links d-flex align-items-center justify-content-center">
                                <a href="{{route('home.show' , $project->id)}}" class="details-link"><i class="bi bi-eye"></i></a>
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->
                        @endforeach
            

                </div>

            </div>
        </section><!-- End Gallery Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>PhotoFolio</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/photofolio-bootstrap-photography-website-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader">
        <div class="line"></div>
    </div>

    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
