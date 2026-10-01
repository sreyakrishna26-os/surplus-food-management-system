<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <title>@yield('title', 'FoodLink')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="keywords" content="">
    <meta name="description" content="">

    <!-- Favicon -->
    <link href="{{ asset('Donor/img/favicon.ico') }}" rel="icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Lora:wght@600;700&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
        rel="stylesheet">

    <!-- Animate -->
    <link href="{{ asset('Donor/lib/animate/animate.min.css') }}"
        rel="stylesheet">

    <!-- Owl Carousel -->
    <link href="{{ asset('Donor/lib/owlcarousel/assets/owl.carousel.min.css') }}"
        rel="stylesheet">

    <!-- Bootstrap -->
    <link href="{{ asset('Donor/css/bootstrap.min.css') }}"
        rel="stylesheet">

    <!-- Main CSS -->
    <link href="{{ asset('Donor/css/style.css') }}"
        rel="stylesheet">

    @yield('css')


    <!-- =====================================================
         CUSTOM HEADER STYLE
         ===================================================== -->

    <style>

        /* =====================================================
           BASIC
        ===================================================== */

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0 !important;
            padding: 0 !important;
            font-family: 'Open Sans', sans-serif;
            background: #ffffff;
        }


        /* =====================================================
           HEADER
           ===================================================== */

        .donor-header {

            position: relative !important;

            top: auto !important;
            left: auto !important;
            right: auto !important;

            width: 100%;

            background: #ffffff;

            z-index: 1000;

            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.10);
        }


        /* =====================================================
           NAVBAR
           ===================================================== */

        .donor-navbar {

            width: 100%;

            min-height: 82px;

            background: #ffffff !important;

            padding-top: 0 !important;
            padding-bottom: 0 !important;
        }


        /* =====================================================
           LOGO
           ===================================================== */

        .donor-logo {

            text-decoration: none !important;

            padding-top: 0 !important;
            padding-bottom: 0 !important;

            margin-left: 0 !important;

            margin-right: 30px !important;
        }

        .donor-logo h1 {

            margin: 0;

            font-family: 'Lora', serif;

            font-size: 34px;

            font-weight: 700;

            line-height: 1;

            letter-spacing: -1px;
        }

        .donor-logo .food {

            color: #39a900;
        }

        .donor-logo .link {

            color: #f28123;
        }


        /* =====================================================
           NAVIGATION
        ===================================================== */

        .donor-menu {

            display: flex;

            align-items: center;

            margin-left: auto;

            gap: 3px;
        }

        .donor-menu .nav-link {

            position: relative;

            display: flex;

            align-items: center;

            justify-content: center;

            height: 82px;

            padding: 0 15px !important;

            color: #222222 !important;

            font-size: 15px;

            font-weight: 500;

            white-space: nowrap;

            text-decoration: none;

            transition: all 0.3s ease;
        }


        /* =====================================================
           NAVIGATION UNDERLINE
        ===================================================== */

        .donor-menu .nav-link::after {

            content: "";

            position: absolute;

            left: 15px;

            right: 15px;

            bottom: 17px;

            height: 2px;

            background: #39a900;

            transform: scaleX(0);

            transform-origin: center;

            transition: transform 0.3s ease;
        }


        /* Hover */

        .donor-menu .nav-link:hover {

            color: #39a900 !important;
        }

        .donor-menu .nav-link:hover::after {

            transform: scaleX(1);
        }


        /* Active */

        .donor-menu .nav-link.active {

            color: #39a900 !important;
        }

        .donor-menu .nav-link.active::after {

            transform: scaleX(1);
        }


        /* =====================================================
           LOGOUT
        ===================================================== */

        .donor-logout {

            display: flex;

            align-items: center;

            margin-left: 15px;
        }

        .donor-logout form {

            margin: 0 !important;

            padding: 0 !important;
        }

        .donor-logout button {

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            min-width: 125px;

            height: 45px;

            padding: 0 20px;

            border: none !important;

            border-radius: 25px;

            background: #39a900 !important;

            color: #ffffff !important;

            font-family: 'Open Sans', sans-serif;

            font-size: 14px;

            font-weight: 600;

            cursor: pointer;

            box-shadow: 0 4px 12px rgba(57, 169, 0, 0.22);

            transition: all 0.3s ease;
        }

        .donor-logout button i {

            font-size: 15px;
        }

        .donor-logout button:hover {

            background: #2f8d00 !important;

            color: #ffffff !important;

            transform: translateY(-2px);

            box-shadow: 0 7px 16px rgba(57, 169, 0, 0.30);
        }


        /* =====================================================
           PAGE CONTENT
        ===================================================== */

        .page-content {

            position: relative;

            z-index: 1;

            width: 100%;

            min-height: 400px;

            padding-top: 0 !important;

            margin-top: 0 !important;
        }

        .donor-content {

            padding-top: 0 !important;

            margin-top: 0 !important;
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        .footer {

            position: relative;

            z-index: 1;
        }


        /* =====================================================
           BACK TO TOP
        ===================================================== */

        .back-to-top {

            z-index: 9999 !important;
        }


        /* =====================================================
           TABLET
        ===================================================== */

        @media (max-width: 1199.98px) {

            .donor-logo {

                margin-right: 15px !important;
            }

            .donor-menu .nav-link {

                padding-left: 9px !important;

                padding-right: 9px !important;

                font-size: 14px;
            }

            .donor-logout {

                margin-left: 8px;
            }

            .donor-logout button {

                min-width: 110px;

                padding: 0 15px;
            }
        }


        /* =====================================================
           MOBILE / TABLET MENU
        ===================================================== */

        @media (max-width: 991.98px) {

            .donor-navbar {

                min-height: 70px;

                padding-left: 20px !important;

                padding-right: 20px !important;
            }


            /* Logo */

            .donor-logo {

                margin-right: 0 !important;
            }

            .donor-logo h1 {

                font-size: 29px;
            }


            /* Mobile button */

            .navbar-toggler {

                border: 1px solid #dddddd !important;

                padding: 7px 10px;

                box-shadow: none !important;
            }

            .navbar-toggler:focus {

                box-shadow: none !important;
            }


            /* Mobile menu */

            .donor-menu {

                display: block;

                width: 100%;

                margin-top: 10px;

                padding: 10px 0 15px;

                background: #ffffff;

                border-top: 1px solid #eeeeee;
            }


            .donor-menu .nav-link {

                display: flex;

                align-items: center;

                justify-content: flex-start;

                width: 100%;

                height: auto;

                min-height: 45px;

                padding: 10px 15px !important;

                border-bottom: 1px solid #eeeeee;

                font-size: 15px;
            }


            .donor-menu .nav-link::after {

                display: none;
            }


            /* Logout */

            .donor-logout {

                display: block;

                width: auto;

                margin: 15px 15px 5px;
            }

            .donor-logout button {

                width: 100%;

                height: 45px;

                border-radius: 8px;
            }

        }


        /* =====================================================
           SMALL MOBILE
        ===================================================== */

        @media (max-width: 575.98px) {

            .donor-navbar {

                padding-left: 15px !important;

                padding-right: 15px !important;
            }

            .donor-logo h1 {

                font-size: 26px;
            }

        }

    </style>

</head>


<body>


    <!-- =====================================================
         HEADER START
         ===================================================== -->

    <header class="donor-header">


        <!-- =================================================
             NAVBAR
             ================================================= -->

        <nav class="navbar navbar-expand-lg donor-navbar">

            <div class="container-fluid px-lg-5">


                <!-- =================================================
                     LOGO
                     ================================================= -->

                <a href="{{ url('/DonorHome') }}"
                    class="navbar-brand donor-logo">

                    <h1>

                        <span class="food">
                            food
                        </span><span class="link">
                            Link
                        </span>

                    </h1>

                </a>


                <!-- =================================================
                     MOBILE TOGGLE
                     ================================================= -->

                <button type="button"
                    class="navbar-toggler"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse"
                    aria-expanded="false"
                    aria-label="Toggle navigation">

                    <span class="navbar-toggler-icon"></span>

                </button>


                <!-- =================================================
                     MENU
                     ================================================= -->

                <div class="collapse navbar-collapse"
                    id="navbarCollapse">


                    <div class="navbar-nav donor-menu">


                        <!-- HOME -->

                        <a href="{{ url('/DonorHome') }}"
                            class="nav-item nav-link active">

                            Home

                        </a>


                        <!-- ABOUT -->

                        <a href="#about"
                            class="nav-item nav-link">

                            About

                        </a>


                        <!-- DONATE FOOD -->

                        <a href="{{ route('foodregister') }}"
                            class="nav-item nav-link">

                            Donate Food

                        </a>


                        <!-- FOOD REQUESTS -->

                        <a href="{{ route('donor.food.requests') }}"
                            class="nav-item nav-link">

                            Food Requests

                        </a>


                        <!-- VIEW MY FOOD -->

                        <a href="{{ route('food_view') }}"
                            class="nav-item nav-link">

                            View My Food

                        </a>


                        <!-- CONTACT -->

                        <a href="#contact"
                            class="nav-item nav-link">

                            Contact

                        </a>


                        <!-- =================================================
                             LOGOUT
                             ================================================= -->

                        <div class="donor-logout">

                            <form action="{{ route('logout') }}"
                                method="POST">

                                @csrf

                                <button type="submit">

                                    <i class="fas fa-sign-out-alt"></i>

                                    <span>
                                        Logout
                                    </span>

                                </button>

                            </form>

                        </div>


                    </div>

                </div>

            </div>

        </nav>

    </header>


    <!-- =====================================================
         HEADER END
         ===================================================== -->


    <!-- =====================================================
         PAGE CONTENT START
         ===================================================== -->

    <main class="page-content donor-content">

        @yield('content')

    </main>


    <!-- =====================================================
         PAGE CONTENT END
         ===================================================== -->


    <!-- =====================================================
         FOOTER START
         ===================================================== -->

    <div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn"
        data-wow-delay="0.1s">

        <div class="container py-5">

            <div class="row g-5">


                <!-- =================================================
                     ABOUT
                     ================================================= -->

                <div class="col-lg-3 col-md-6">

                    <h1 class="fw-bold text-primary mb-4">

                        food<span class="text-secondary">
                            Link
                        </span>

                    </h1>

                    <p>

                        Connecting food donors with people
                        who need food. Donate food and help
                        reduce food waste.

                    </p>


                    <div class="d-flex pt-2">


                        <a class="btn btn-square btn-outline-light rounded-circle me-1"
                            href="#">

                            <i class="fab fa-facebook-f"></i>

                        </a>


                        <a class="btn btn-square btn-outline-light rounded-circle me-1"
                            href="#">

                            <i class="fab fa-instagram"></i>

                        </a>


                        <a class="btn btn-square btn-outline-light rounded-circle me-1"
                            href="#">

                            <i class="fab fa-twitter"></i>

                        </a>


                    </div>

                </div>


                <!-- =================================================
                     CONTACT
                     ================================================= -->

                <div class="col-lg-3 col-md-6">

                    <h4 class="text-light mb-4">

                        Contact

                    </h4>


                    <p>

                        <i class="fa fa-map-marker-alt me-3"></i>

                        Kerala, India

                    </p>


                    <p>

                        <i class="fa fa-phone-alt me-3"></i>

                        +91 XXXXX XXXXX

                    </p>


                    <p>

                        <i class="fa fa-envelope me-3"></i>

                        fooddonation@example.com

                    </p>

                </div>


                <!-- =================================================
                     QUICK LINKS
                     ================================================= -->

                <div class="col-lg-3 col-md-6">

                    <h4 class="text-light mb-4">

                        Quick Links

                    </h4>


                    <a class="btn btn-link"
                        href="{{ url('/DonorHome') }}">

                        Home

                    </a>


                    <a class="btn btn-link"
                        href="#about">

                        About Us

                    </a>


                    <a class="btn btn-link"
                        href="{{ route('foodregister') }}">

                        Donate Food

                    </a>


                    <a class="btn btn-link"
                        href="{{ route('donor.food.requests') }}">

                        Food Requests

                    </a>

                </div>


                <!-- =================================================
                     NEWSLETTER
                     ================================================= -->

                <div class="col-lg-3 col-md-6">

                    <h4 class="text-light mb-4">

                        Newsletter

                    </h4>


                    <p>

                        Stay updated with food donation
                        campaigns and requests.

                    </p>


                    <div class="position-relative mx-auto"
                        style="max-width: 400px;">


                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5"
                            type="email"
                            placeholder="Your email">


                        <button type="button"
                            class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">

                            Sign Up

                        </button>


                    </div>

                </div>


            </div>

        </div>


        <!-- =================================================
             COPYRIGHT
             ================================================= -->

        <div class="container-fluid copyright">

            <div class="container">

                <div class="row">


                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">

                        &copy; {{ date('Y') }}

                        <a href="#">

                            foodLink

                        </a>

                        All Rights Reserved.

                    </div>


                    <div class="col-md-6 text-center text-md-end">

                        Food Donation Management System

                    </div>


                </div>

            </div>

        </div>

    </div>


    <!-- =====================================================
         FOOTER END
         ===================================================== -->


    <!-- =====================================================
         BACK TO TOP
         ===================================================== -->

    <a href="#"
        class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top">

        <i class="bi bi-arrow-up"></i>

    </a>


    <!-- =====================================================
         JAVASCRIPT
         ===================================================== -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('Donor/lib/wow/wow.min.js') }}"></script>

    <script src="{{ asset('Donor/lib/easing/easing.min.js') }}"></script>

    <script src="{{ asset('Donor/lib/waypoints/waypoints.min.js') }}"></script>

    <script src="{{ asset('Donor/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('Donor/js/main.js') }}"></script>

    @yield('js')


</body>

</html>