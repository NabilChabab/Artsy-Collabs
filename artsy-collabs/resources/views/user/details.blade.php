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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <div class="d-flex gap-3 align-items-center justify-content-center">
                <a href="{{ route('home.index') }}"><i class='bx bxs-chevron-left'
                        style="color: white;font-size:25px;margin-left:20px;"></i></a>
                <a href="index.html" class="logo d-flex align-items-center  me-auto me-lg-0">
                    <!-- Uncomment the line below if you also wish to use an image logo -->
                    <div class="logo">ArtsyCollabs</div>
                </a>
            </div>

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
                        <img src="{{ Auth::user()->getFirstMediaUrl('images') }}" alt="" srcset=""
                            style="width: 40px;height:40px;border-radius:50%;margin-right:5px;">
                        <a id="navbarDropdown" class="nav-link" href="#" role="button">
                            {{ Auth::user()->name }}
                        </a>

                        <a class="nav-link" href="{{ route('logout') }}" role="button" style="color:brown;">
                            Logout
                        </a>

                    </li>
                @endguest
            </div>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header><!-- End Header -->

    <main id="main" data-aos="fade" data-aos-delay="1500">

        <!-- ======= End Page Header ======= -->
        <div class="page-header d-flex align-items-center">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2><span>Project Detail</span></h2>
                        <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas
                            consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione
                            sint. Sit quaerat ipsum dolorem.</p>

                        <a class="cta-btn" href="contact.html">Available for hire</a>

                    </div>
                </div>
            </div>
        </div><!-- End Page Header -->

        <!-- ======= Gallery Single Section ======= -->
        <section id="gallery-single" class="gallery-single">
            <div class="container">

                <div class="position-relative h-100">
                    <div class="slides-1 portfolio-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">

                            <div class="swiper-slide">
                                <img src="{{ $artProject->getFirstMediaUrl('images') }}" alt="">
                            </div>


                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                </div>

                <div class="row justify-content-between gy-4 mt-4">

                    <div class="col-lg-8">
                        <div class="portfolio-description">
                            <h2>{{ $artProject->title }}</h2>
                            <p>
                                {{ $artProject->description }}
                            </p>


                            <div class="testimonial-item">
                                <h2 class="text-danger">Artists</h2>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid
                                    cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet
                                    legam anim culpa.
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                                <div class="d-flex gap-3 align-items-center">
                                    @if ($artProject->users->isNotEmpty())
                                        @foreach ($artProject->users()->wherePivot('response_status', 1)->get() as $artist)
                                            <img src="{{ $artist->getFirstMediaUrl('images') }}"
                                                class="testimonial-img" alt=""
                                                style="width: 70px;height:70px;object-fit:cover">
                                            <div class="mb-4">
                                                <h3>{{ $artist->name }}</h3>
                                                <h4>{{ $artist->created_at }}</h4>
                                            </div>
                                        @endforeach
                                    @else
                                        <p class="text-warning">No users associated with this project</p>
                                    @endif
                      
                                </div>
                                



                            </div>

                            <div class="testimonial-item">
                                <h2 class="text-danger">Partners</h2>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid
                                    cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet
                                    legam anim culpa.
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                                <div class="d-flex gap-3 align-items-center">
                                    @if ($artProject->partner)
                                        <img src="{{ $artProject->partner->getFirstMediaUrl('images') }}"
                                            class="testimonial-img" alt=""
                                            style="width: 70px;height:70px;object-fit:cover">
                                        <div class="mb-4">
                                            <h3>{{ $artProject->partner->name }}</h3>
                                            <h4>{{ $artProject->partner->created_at }}</h4>
                                        </div>
                                    @else
                                        <p class="text-warning">No partner associated with this project</p>
                                    @endif
                                </div>


                            </div>



                            <p>
                                Impedit ipsum quae et aliquid doloribus et voluptatem quasi. Perspiciatis occaecati
                                earum et magnam animi. Quibusdam non qui ea vitae suscipit vitae sunt. Repudiandae
                                incidunt cumque minus deserunt assumenda tempore. Delectus voluptas necessitatibus est.

                            <p>
                                Sunt voluptatum sapiente facilis quo odio aut ipsum repellat debitis. Molestiae et autem
                                libero. Explicabo et quod necessitatibus similique quis dolor eum. Numquam eaque
                                praesentium rem et qui nesciunt.
                            </p>

                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="portfolio-info">
                            <h3>Project information</h3>
                            <ul>
                                <li><strong>Category</strong> <span>Nature Photography</span></li>
                                <li><strong>Client</strong> <span>ASU Company</span></li>
                                <li><strong>Project date</strong> <span>01 March, 2022</span></li>
                                <li><strong>Project URL</strong> <a href="#">www.example.com</a></li>
                                <li>
                                    @auth
                                        @if ($artProject->users()->where('users.id', Auth::id())->wherePivot('response_status', 0)->exists())
                                            <p class="text-warning">Your request is currently under review by our support team. We appreciate your patience and will notify you once a decision has been made.</p>
                                        @elseif ($artProject->users()->where('users.id', Auth::id())->wherePivot('response_status', 1)->exists())
                                            <button class="btn-visit bg-dark align-self-start" type="submit" style="border:none;" disabled>You are Already in This Project</button>
                                        @else
                                            <form action="{{ route('userRequest') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="project_id" value="{{ $artProject->id }}">
                                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                                <button class="btn-visit align-self-start" type="submit" style="border:none;">Get Into This Project</button>
                                            </form>
                                        @endif
                                    @else
                                        <button class="btn-visit bg-dark align-self-start" type="submit" style="border:none;" disabled>Login to Get Into This Project</button>
                                    @endauth
                                </li>
                                
                            </ul>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Gallery Single Section -->

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

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>



    @if (session('status'))
        <script>
            setTimeout(function() {
                Swal.fire({
                    title: 'Success',
                    text: '{{ session('status') }}',
                    icon: 'success',
                    background: '#161718',
                    confirmButtonClass: 'btn btn-success',
                    confirmButtonText: 'Cancel',
                    confirmButtonColor: 'rgb(112, 1, 1)',
                });
            }, {{ session('delay', 0) }});
        </script>
    @endif

</body>

</html>
