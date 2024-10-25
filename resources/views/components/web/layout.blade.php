<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page->meta_title }}</title>
    <meta name="title" content="{{ $page->meta_title }}">
    <meta name="description" content="{{ $page->meta_description }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $page->meta_title }}">
    <meta property="og:description" content="{{ $page->meta_description }}">
    <meta property="og:image" content="{{ asset('storage/' . $page->meta_image) }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $page->meta_title }}">
    <meta property="twitter:description" content="{{ $page->meta_description }}">
    <meta property="twitter:image" content="{{ asset('storage/' . $page->meta_image) }}">
    <!-- favicon  -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png" type="image/x-icon')}}">
    <!-- faremwork of css -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-lib/bootstrap.min.css')}}">
    <!-- style sheet of css        -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- Responsive sheet of css -->
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <!-- fonts awsome icon link            -->
    <link rel="stylesheet" href="{{asset('assets/font-awesome-lib/icon/font-awesome.min.css')}}">
    <!-- slick-slider link css -->
    <link rel="stylesheet" href="{{asset('assets/css/slick.min.css')}}">
    <!-- animation of css -->
    <link rel="stylesheet" href="{{asset('assets/css/aos.css')}}">
</head>
<body>
<div class="site-wrapper">
    <div class="first_nav_hero_about">
        <!-- ======== 1.1. header section ======== -->
        <header>
            <nav class="container navbar navbar-expand-lg ">
                <div class="container-fluid">
                    <!-- site logo -->
                    <a class="nav-logo p-0"
                       href="{{ route('web.index') }}">
                        <img style="width: auto; height: 75px;" src="{{ $settings['header-icon']['Logo']}}" alt="logo"></a>
                    <!-- navigation button  -->
                    <button class="navbar-toggle" onclick="openNav()" type="button"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <!-- navigation bar manu  -->
                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                        <ul
                            class="navbar-nav d-flex justify-content-center align-items-center gap-lg-2 gap-md-2 gap-sm-2 gap-2 mb-2 mb-lg-0">
                            @foreach($menus as $menu)
                                @if($menu->showBlock)
                                    <x-dynamic-component :component="'menus.' . $menu->showBlock->template->slug"
                                                         :block="$menu->block"/>
                                @endif
                            @endforeach

                            <li class="nav-item">
                                <a id="search-bar-bt" class="nav-link" href="#"><i
                                            class="fa-solid fa-magnifying-glass"></i></a>
                            </li>
                            <li class="nav-item header_btn ">
                                <a class="nav-link nav-hrf btn-hover1" href="#">Create Account</a>
                            </li>
                            <li class="nav-item" onclick="open_right_side()">
                                <a class="nav-link" href="#"><i class="fa-sharp fa-solid fa-bars"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!--============ navigation left slidebar================-->
            <aside>
                <div id="mySidenav" class="sidenav">
                    <div class="side-nav-logo d-flex justify-content-between align-items-center ps-4 pe-3">
                        <figure class="navbar-brand"><a href="index.html"><img src="assets/images/Logo.png" alt="img"
                                                                               class="nav-logo"></a></figure>
                        <div class="closebtn" onclick="closeNav()"><i
                                    class="fa-solid fa-square-xmark side-bar-close-btn"></i></div>
                    </div>
                    <ul>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="feature.html">Feature</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pricing.html">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <div class="d-flex align-items-center justify-content-between pt-3" id="slid-btn">
                                <button class="a-slid">Pages</button>
                                <i class="fa-solid fa-caret-down pe-4"></i>
                            </div>
                            <ul id="slid-drop" class="myst">
                                <li><a href="contact.html">Contact</a></li>
                                <li><a href="team.html">Team</a></li>
                                <li><a href="testimonials.html">Testimonials</a></li>
                                <li><a href="blogs.html">Blogs</a></li>
                                <li><a href="faq.html">FAQ</a></li>
                                <li><a href="404.html">404</a></li>
                                <li><a href="coming.html">Coming Soon</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </aside>
            <!--================== navigation drop search bar================-->
            <div class="search" id="search-bar">
                <form class="d-flex nav-search">
                    <input type="text" name="search" placeholder="Enter your text">
                    <button class="btn-hover1" type="submit">Search</button>
                </form>
                <button id="remove-btn">
                    <i class="fa-solid fa-square-xmark "></i>
                </button>
            </div>
            <!--=================navigation Right slidebar==================-->
            <section class="right-sidbar" id="right_side">
                <div class="d-flex justify-content-between align-items-center">
                    <!-- site logo -->
                    <a class="p-0 " href="index.html"><img src="assets/images/Logo.png" alt="logo"></a>
                    <button class="close_right_sidebar fa-solid fa-xmark" onclick="close_right_sade()"></button>
                </div>
                <p class="mt-4 pb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore
                    magna aliqua.
                </p>
                <a href="#" class="btn-hover1">Discover More</a>
                <hr>
                <h5 class="mt-4 mb-4">Connected details:</h5>
                <ul class="d-flex flex-column gap-3">
                    <li>
                        <a href="#"> <i class="fa-solid fa-phone"></i></a>
                        <a href="#">yourname@email.com</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-solid fa-envelope"></i></a>
                        <a href="#">+123-456-7890</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-solid fa-clock"></i></a>
                        <a href="#">Office Hours: 8AM - 11PM Sunday -
                            Weekend Day</a>
                    </li>
                </ul>
                <span class="d-flex gap-4 mt-4">
                    @foreach($settings['social']['blocks'] ?? [] as $social)
                        <a href="{{ $social['Link'] }}" class="p-0"><i class="{{ $social['Icon'] }}"></i></a>
                    @endforeach
                    </span>
            </section>
        </header>
    </div>
    {{ $slot }}
    <footer class="position-relative">
        <div class="container">
            <h4 class="text-center">SUBSCRIBE OUR NEWSLETTER</h4>
            <P class="text-center pt-2 pb-3">Get latest News and Updates</P>
            <form class="d-flex align-items-center justify-content-center" id="footer-sub2">
                <!-- form Subscribe massage -->
                <div id="Succes-box2"></div>
                <div class="d-flex footer-search ">
                    <input type="email" name="search" placeholder="Enter your Email" required>
                    <button type="submit" class="btn-hover1">Subscribe</button>
                </div>
            </form>
            <div class="footer-logo text-center pb-lg-4 pb-md-3 pb-sm-2 pb-4">
                <!-- footer logo  -->
                <a href="index.html">
                    <figure><img src="assets/images/Logo.png" alt="img"></figure>
                </a>
            </div>
            <ul class="d-flex align-items-center justify-content-center">
                <li>
                    <a href="#">Feature</a>
                </li>
                <li>
                    <a href="#">Pricing</a>
                </li>
                <li>
                    <a href="#">About us</a>
                </li>
                <li>
                    <a href="#">Faq</a>
                </li>
            </ul>
            <hr>
            <div class="row footer-nav-icon">
                <!-- footer social icon  -->
                <div
                    class="col-lg-3 col-md-3 d-flex align-items-center justify-content-md-start justify-content-sm-center justify-content-center">
                    <div
                        class="social-icon d-flex gap-2 justify-content-md-start justify-content-sm-center justify-content-center">
                        @foreach($settings['social']['blocks'] ?? [] as $social)
                            <a href="{{ $social['Link'] }}" target="_blank" class="p-0"><i class="{{ $social['Icon'] }}"></i></a>
                        @endforeach
                    </div>
                </div>
                <!-- footer terms privacy  -->
                <div class="col-lg-6 col-md-6 d-flex justify-content-center align-items-center">
                    <div class=" d-flex gap-3 p-2">
                        <a href="#">Terms & Condition</a>
                        <a href="#">Privacy Policy</a>
                    </div>
                </div>
                <!-- footer logo slider  -->
                <div class="col-lg-3 col-md-3">
                    <div class="footer_ispsum_slider">
                        <figure><a href="#"><img src="assets/images/icon/logoipsum-228.png" alt="qr-code"></a>
                        </figure>
                        <figure><a href="#"><img src="assets/images/icon/logoipsum-233.png" alt="qr-code"></a>
                        </figure>
                        <figure><a href="#"><img src="assets/images/icon/logoipsum-229.png" alt="qr-code"></a>
                        </figure>
                        <figure><a href="#"><img src="assets/images/icon/logoipsum-228.png" alt="qr-code"></a>
                        </figure>
                        <figure><a href="#"><img src="assets/images/icon/logoipsum-233.png" alt="qr-code"></a>
                        </figure>
                        <figure><a href="#"><img src="assets/images/icon/logoipsum-229.png" alt="qr-code"></a>
                        </figure>
                    </div>
                </div>
            </div>
            <hr>
            <div class="Copyright d-flex justify-content-between flex-wrap dir">
                <p>Copyright © 2023 Paypath by Evonicmedia. All Right Reserved.</p>
                <p>Powered by Evonicsoft</p>
            </div>
        </div>
    </footer>
    <!-- ======== End of 1.13. footer section ========  -->
</div>
<!-- end site wrapper -->
<!-- button back to top -->
<button onclick="scrollToTop()" id="backToTopBtn"><i class="fa-solid fa-arrow-turn-up"></i></button>

<!-- bootstrap min javascript -->
<script src="{{asset('assets/js/javascript-lib/bootstrap.min.js')}}"></script>
<!-- j Query -->
<script src="{{asset('assets/js/jquery.js')}}"></script>
<!-- slick slider js -->
<script src="{{asset('assets/js/slick.min.js')}}"></script>
<!-- main javascript -->
<script src="{{asset('assets/js/custom.js')}}"></script>
<!-- counter javascript file -->
<script src="{{asset('assets/js/waypoints.min.js')}}"></script>
<!-- animation from javascript -->
<script src="{{asset('assets/js/aos.js')}}"></script>
<script>
    AOS.init({
        once: true,
        duration: 1500,
    });
</script>
</body>

</html>
