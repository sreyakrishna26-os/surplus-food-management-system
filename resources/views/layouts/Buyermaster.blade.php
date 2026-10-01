<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <meta name="description"
          content="Surplus Food Management System">

    <title>Surplus - Buyer</title>


    <!-- Favicon -->
    <link rel="shortcut icon"
          type="image/png"
          href="{{ asset('Buyer/assets/img/favicon.png') }}">


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"
          rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700"
          rel="stylesheet">


    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="{{ asset('Buyer/assets/css/all.min.css') }}">


    <!-- Bootstrap -->
    <link rel="stylesheet"
          href="{{ asset('Buyer/assets/bootstrap/css/bootstrap.min.css') }}">


    <!-- Owl Carousel -->
    <link rel="stylesheet"
          href="{{ asset('Buyer/assets/css/owl.carousel.css') }}">


    <!-- Magnific Popup -->
    <link rel="stylesheet"
          href="{{ asset('Buyer/assets/css/magnific-popup.css') }}">


    <!-- Animate -->
    <link rel="stylesheet"
          href="{{ asset('Buyer/assets/css/animate.css') }}">


    <!-- Mean Menu -->
    <link rel="stylesheet"
          href="{{ asset('Buyer/assets/css/meanmenu.min.css') }}">


    <!-- Main CSS -->
    <link rel="stylesheet"
          href="{{ asset('Buyer/assets/css/main.css') }}">


    <!-- Responsive CSS -->
    <link rel="stylesheet"
          href="{{ asset('Buyer/assets/css/responsive.css') }}">


<style>

/* =========================================================
   SURPLUS BUYER MASTER LAYOUT
   ========================================================= */

:root {
    --surplus-green: #39a900;
    --surplus-dark-green: #2f8c00;
    --surplus-yellow: #f7b733;
    --surplus-orange: #f28123;
    --surplus-black: #111111;
    --surplus-dark: #181818;
    --surplus-light: #f7fbf4;
    --surplus-border: #e7eee3;
}


/* =========================================================
   BODY
   ========================================================= */

html {
    scroll-behavior: smooth;
}

body {
    margin: 0;
    padding: 0;
    overflow-x: hidden;
    font-family: 'Open Sans', sans-serif;
    background: #ffffff;
}


/* =========================================================
   HEADER
   ========================================================= */

.surplus-header {
    width: 100%;
    background: #111111;
    position: relative;
    z-index: 9999;
    box-shadow: 0 3px 15px rgba(0,0,0,0.15);
}


/* =========================================================
   HEADER MAIN
   ========================================================= */

.surplus-header-main {
    min-height: 78px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 30px;
}


/* =========================================================
   SURPLUS LOGO
   ========================================================= */

.surplus-logo {
    flex-shrink: 0;
}

.surplus-logo a {
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 10px;
}

.surplus-logo-icon {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    background: var(--surplus-green);
    color: #ffffff;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 19px;

    box-shadow:
        0 5px 15px rgba(57,169,0,0.30);
}

.surplus-logo-text {
    font-family: 'Poppins', sans-serif;
    color: #ffffff;
    font-size: 25px;
    font-weight: 700;
    letter-spacing: -0.5px;
}

.surplus-logo-text span {
    color: var(--surplus-green);
}


/* =========================================================
   DESKTOP NAVIGATION
   ========================================================= */

.surplus-nav {
    display: flex;
    align-items: center;
    margin-left: auto;
}

.surplus-nav ul {
    display: flex;
    align-items: center;
    gap: 4px;

    margin: 0;
    padding: 0;

    list-style: none;
}

.surplus-nav ul li {
    margin: 0;
    padding: 0;
}

.surplus-nav-link {
    position: relative;

    display: flex;
    align-items: center;
    gap: 7px;

    color: #ffffff !important;
    text-decoration: none !important;

    font-family: 'Poppins', sans-serif;
    font-size: 13px;
    font-weight: 500;

    padding: 30px 13px;

    transition: all 0.3s ease;
}

.surplus-nav-link i {
    font-size: 13px;
}

.surplus-nav-link::after {
    content: "";

    position: absolute;
    left: 13px;
    right: 13px;
    bottom: 18px;

    height: 2px;

    background: var(--surplus-green);

    transform: scaleX(0);
    transform-origin: center;

    transition: transform 0.3s ease;
}

.surplus-nav-link:hover {
    color: var(--surplus-green) !important;
}

.surplus-nav-link:hover::after {
    transform: scaleX(1);
}


/* =========================================================
   LOGOUT
   ========================================================= */

.surplus-logout-form {
    margin: 0;
    padding: 0;
}

.surplus-logout {
    border: none;
    background: transparent;

    color: #ffffff;

    font-family: 'Poppins', sans-serif;
    font-size: 13px;
    font-weight: 500;

    padding: 30px 13px;

    cursor: pointer;

    transition: 0.3s;

    position: relative;
}

.surplus-logout i {
    margin-right: 6px;
}

.surplus-logout:hover {
    color: var(--surplus-orange);
}


/* =========================================================
   BUYER BADGE
   ========================================================= */

.surplus-buyer-badge {
    display: flex;
    align-items: center;
    gap: 7px;

    margin-left: 10px;

    padding: 7px 12px;

    border-radius: 30px;

    background: rgba(57,169,0,0.12);
    border: 1px solid rgba(57,169,0,0.35);

    color: #ffffff;

    font-size: 11px;
    font-weight: 600;

    white-space: nowrap;
}

.surplus-buyer-badge i {
    color: var(--surplus-green);
}


/* =========================================================
   MOBILE TOGGLE
   ========================================================= */

.surplus-mobile-toggle {
    display: none;

    width: 42px;
    height: 42px;

    border: 1px solid rgba(255,255,255,0.20);
    border-radius: 7px;

    background: transparent;
    color: #ffffff;

    font-size: 18px;

    cursor: pointer;
}


/* =========================================================
   MOBILE MENU
   ========================================================= */

.surplus-mobile-menu {
    display: none;

    background: #181818;

    border-top: 1px solid rgba(255,255,255,0.08);

    padding: 10px 0 15px;
}

.surplus-mobile-menu.show {
    display: block;
}

.surplus-mobile-menu a,
.surplus-mobile-menu button {
    width: 100%;

    display: flex;
    align-items: center;
    gap: 10px;

    padding: 13px 20px;

    border: none;
    background: transparent;

    color: #ffffff;

    text-decoration: none;

    font-family: 'Poppins', sans-serif;
    font-size: 14px;

    text-align: left;

    transition: 0.3s;
}

.surplus-mobile-menu a:hover,
.surplus-mobile-menu button:hover {
    background: rgba(57,169,0,0.12);
    color: var(--surplus-green);
}


/* =========================================================
   CONTENT AREA
   ========================================================= */

.surplus-content {
    min-height: 500px;
}


/* =========================================================
   FOOTER
   ========================================================= */

.surplus-footer {
    background: #181818;
    color: #ffffff;

    padding: 70px 0 45px;

    position: relative;
}

.surplus-footer::before {
    content: "";

    position: absolute;

    top: 0;
    left: 0;
    right: 0;

    height: 3px;

    background: var(--surplus-green);
}


/* =========================================================
   FOOTER BRAND
   ========================================================= */

.surplus-footer-brand {
    padding-right: 30px;
}

.surplus-footer-logo {
    display: inline-flex;
    align-items: center;
    gap: 9px;

    text-decoration: none;

    margin-bottom: 20px;
}

.surplus-footer-logo .logo-icon {
    width: 38px;
    height: 38px;

    border-radius: 50%;

    background: var(--surplus-green);

    display: flex;
    align-items: center;
    justify-content: center;

    color: #ffffff;
}

.surplus-footer-logo .logo-name {
    font-family: 'Poppins', sans-serif;

    color: #ffffff;

    font-size: 23px;
    font-weight: 700;
}

.surplus-footer-logo .logo-name span {
    color: var(--surplus-green);
}

.surplus-footer-brand p {
    color: #aaaaaa;

    font-size: 13px;
    line-height: 1.9;

    margin: 0;

    max-width: 330px;
}


/* =========================================================
   FOOTER HEADINGS
   ========================================================= */

.surplus-footer-title {
    color: #ffffff;

    font-family: 'Poppins', sans-serif;

    font-size: 17px;
    font-weight: 600;

    margin-bottom: 22px;

    position: relative;
}

.surplus-footer-title::after {
    content: "";

    display: block;

    width: 35px;
    height: 2px;

    background: var(--surplus-green);

    margin-top: 9px;
}


/* =========================================================
   FOOTER LINKS
   ========================================================= */

.surplus-footer-links {
    margin: 0;
    padding: 0;

    list-style: none;
}

.surplus-footer-links li {
    margin-bottom: 10px;
}

.surplus-footer-links a {
    color: #aaaaaa;

    text-decoration: none;

    font-size: 13px;

    transition: 0.3s;
}

.surplus-footer-links a:hover {
    color: var(--surplus-green);

    padding-left: 4px;
}


/* =========================================================
   CONTACT
   ========================================================= */

.surplus-contact-list {
    list-style: none;

    padding: 0;
    margin: 0;
}

.surplus-contact-list li {
    display: flex;

    align-items: flex-start;

    gap: 11px;

    color: #aaaaaa;

    font-size: 13px;

    margin-bottom: 14px;

    line-height: 1.6;
}

.surplus-contact-list i {
    color: var(--surplus-green);

    width: 16px;

    margin-top: 3px;
}


/* =========================================================
   FOOTER BOTTOM
   ========================================================= */

.surplus-footer-bottom {
    background: #111111;

    padding: 18px 0;
}

.surplus-footer-bottom p {
    margin: 0;

    color: #888888;

    font-size: 12px;
}

.surplus-footer-bottom strong {
    color: var(--surplus-green);
}


/* =========================================================
   SOCIAL ICONS
   ========================================================= */

.surplus-social {
    display: flex;

    justify-content: flex-end;

    gap: 8px;
}

.surplus-social a {
    width: 34px;
    height: 34px;

    border-radius: 50%;

    border: 1px solid #333333;

    display: flex;
    align-items: center;
    justify-content: center;

    color: #aaaaaa;

    text-decoration: none;

    transition: 0.3s;
}

.surplus-social a:hover {
    background: var(--surplus-green);

    border-color: var(--surplus-green);

    color: #ffffff;

    transform: translateY(-2px);
}


/* =========================================================
   BACK TO TOP
   ========================================================= */

.surplus-back-top {
    position: fixed;

    right: 22px;
    bottom: 22px;

    width: 42px;
    height: 42px;

    border-radius: 50%;

    background: var(--surplus-green);

    color: #ffffff;

    display: flex;
    align-items: center;
    justify-content: center;

    text-decoration: none;

    opacity: 0;
    visibility: hidden;

    transition: 0.3s;

    z-index: 999;
}

.surplus-back-top.show {
    opacity: 1;
    visibility: visible;
}

.surplus-back-top:hover {
    background: var(--surplus-dark-green);

    color: #ffffff;
}


/* =========================================================
   TABLET
   ========================================================= */

@media (max-width: 1100px) {

    .surplus-nav-link {
        padding-left: 8px;
        padding-right: 8px;
    }

    .surplus-nav-link,
    .surplus-logout {
        font-size: 12px;
    }

    .surplus-buyer-badge {
        display: none;
    }

}


/* =========================================================
   MOBILE
   ========================================================= */

@media (max-width: 991px) {

    .surplus-header-main {
        min-height: 70px;
    }

    .surplus-nav {
        display: none;
    }

    .surplus-mobile-toggle {
        display: flex;

        align-items: center;
        justify-content: center;
    }

    .surplus-logo-text {
        font-size: 22px;
    }

    .surplus-logo-icon {
        width: 38px;
        height: 38px;
    }

    .surplus-footer {
        padding: 55px 0 35px;
    }

    .surplus-footer-brand {
        padding-right: 0;
        margin-bottom: 35px;
    }

    .surplus-footer-title {
        margin-top: 15px;
    }

    .surplus-social {
        justify-content: flex-start;
        margin-top: 15px;
    }

}


/* =========================================================
   SMALL MOBILE
   ========================================================= */

@media (max-width: 575px) {

    .surplus-header-main {
        min-height: 65px;
    }

    .surplus-logo-text {
        font-size: 20px;
    }

    .surplus-logo-icon {
        width: 35px;
        height: 35px;
        font-size: 16px;
    }

    .surplus-footer-bottom {
        text-align: center;
    }

    .surplus-social {
        justify-content: center;
        margin-top: 15px;
    }

}

</style>

</head>


<body>


<!-- =========================================================
     HEADER
     ========================================================= -->

<header class="surplus-header">

    <div class="container">

        <div class="surplus-header-main">


            <!-- =================================================
                 LOGO
                 ================================================= -->

            <div class="surplus-logo">

                <a href="{{ url('/buyerhome') }}">

                    <div class="surplus-logo-icon">

                        <i class="fas fa-leaf"></i>

                    </div>

                    <div class="surplus-logo-text">

                        Sur<span>plus</span>

                    </div>

                </a>

            </div>


            <!-- =================================================
                 DESKTOP NAVIGATION
                 ================================================= -->

            <nav class="surplus-nav">

                <ul>


                    <!-- HOME -->

                    <li>

                        <a href="{{ url('/buyerhome') }}"
                           class="surplus-nav-link">

                            <i class="fas fa-home"></i>

                            Home

                        </a>

                    </li>


                    <!-- PROFILE -->

                    <li>

                        <a href="{{ route('buyer_profile') }}"
                           class="surplus-nav-link">

                            <i class="fas fa-user"></i>

                            My Profile

                        </a>

                    </li>


                    <!-- FOODS -->

                    <li>

                        <a href="{{ route('buyer.foods') }}"
                           class="surplus-nav-link">

                            <i class="fas fa-utensils"></i>

                            Available Foods

                        </a>

                    </li>


                    <!-- REQUESTS -->

                    <li>

                        <a href="{{ route('buyer.my.requests') }}"
                           class="surplus-nav-link">

                            <i class="fas fa-clipboard-list"></i>

                            My Requests

                        </a>

                    </li>


                    <!-- LOGOUT -->

                    <li>

                        <form
                            action="{{ route('logout') }}"
                            method="POST"
                            class="surplus-logout-form">

                            @csrf

                            <button
                                type="submit"
                                class="surplus-logout">

                                <i class="fas fa-sign-out-alt"></i>

                                Logout

                            </button>

                        </form>

                    </li>


                </ul>

            </nav>


            <!-- =================================================
                 BUYER BADGE
                 ================================================= -->

            <div class="surplus-buyer-badge">

                <i class="fas fa-user-check"></i>

                Buyer

            </div>


            <!-- =================================================
                 MOBILE BUTTON
                 ================================================= -->

            <button
                type="button"
                class="surplus-mobile-toggle"
                id="surplusMobileToggle">

                <i class="fas fa-bars"></i>

            </button>


        </div>


        <!-- =================================================
             MOBILE NAVIGATION
             ================================================= -->

        <div
            class="surplus-mobile-menu"
            id="surplusMobileMenu">


            <a href="{{ url('/Buyerhome') }}">

                <i class="fas fa-home"></i>

                Home

            </a>


            <a href="{{ route('buyer_profile') }}">

                <i class="fas fa-user"></i>

                My Profile

            </a>


            <a href="{{ route('buyer.foods') }}">

                <i class="fas fa-utensils"></i>

                Available Foods

            </a>


            <a href="{{ route('buyer.my.requests') }}">

                <i class="fas fa-clipboard-list"></i>

                My Requests

            </a>


            <form
                action="{{ route('logout') }}"
                method="POST"
                style="margin:0;">

                @csrf

                <button type="submit">

                    <i class="fas fa-sign-out-alt"></i>

                    Logout

                </button>

            </form>


        </div>

    </div>

</header>


<!-- =========================================================
     PAGE CONTENT
     ========================================================= -->

<main class="surplus-content">

    @yield('content')

</main>


<!-- =========================================================
     FOOTER
     ========================================================= -->

<footer class="surplus-footer">

    <div class="container">

        <div class="row g-4">


            <!-- =================================================
                 ABOUT SURPLUS
                 ================================================= -->

            <div class="col-lg-4 col-md-6">

                <div class="surplus-footer-brand">

                    <a
                        href="{{ url('/buyerhome') }}"
                        class="surplus-footer-logo">

                        <div class="logo-icon">

                            <i class="fas fa-leaf"></i>

                        </div>

                        <div class="logo-name">

                            Sur<span>plus</span>

                        </div>

                    </a>


                    <p>

                        Surplus is a food management platform
                        connecting donors and buyers while helping
                        make better use of surplus food.

                    </p>

                </div>

            </div>


            <!-- =================================================
                 QUICK LINKS
                 ================================================= -->

            <div class="col-lg-2 col-md-6">

                <h3 class="surplus-footer-title">

                    Quick Links

                </h3>

                <ul class="surplus-footer-links">

                    <li>

                        <a href="{{ url('/buyerhome') }}">

                            Home

                        </a>

                    </li>

                    <li>

                        <a href="{{ route('buyer_profile') }}">

                            My Profile

                        </a>

                    </li>

                    <li>

                        <a href="{{ route('buyer.foods') }}">

                            Available Foods

                        </a>

                    </li>

                    <li>

                        <a href="{{ route('buyer.my.requests') }}">

                            My Requests

                        </a>

                    </li>

                </ul>

            </div>


            <!-- =================================================
                 CONTACT
                 ================================================= -->

            <div class="col-lg-3 col-md-6">

                <h3 class="surplus-footer-title">

                    Get In Touch

                </h3>

                <ul class="surplus-contact-list">

                    <li>

                        <i class="fas fa-map-marker-alt"></i>

                        <span>
                            Kerala, India
                        </span>

                    </li>

                    <li>

                        <i class="fas fa-envelope"></i>

                        <span>
                            support@surplusfood.com
                        </span>

                    </li>

                    <li>

                        <i class="fas fa-phone"></i>

                        <span>
                            +91 9074870892
                        </span>

                    </li>

                </ul>

            </div>


            <!-- =================================================
                 PROJECT INFORMATION
                 ================================================= -->

            <div class="col-lg-3 col-md-6">

                <h3 class="surplus-footer-title">

                    Surplus

                </h3>

                <ul class="surplus-footer-links">

                    <li>

                        <a href="{{ route('buyer.foods') }}">

                            Explore Food

                        </a>

                    </li>

                    <li>

                        <a href="{{ route('buyer.my.requests') }}">

                            Purchase Requests

                        </a>

                    </li>

                    <li>

                        <a href="{{ route('buyer_profile') }}">

                            Account

                        </a>

                    </li>

                    <li>

                        <a href="{{ url('/buyerhome') }}">

                            Buyer Home

                        </a>

                    </li>

                </ul>

            </div>


        </div>

    </div>

</footer>


<!-- =========================================================
     COPYRIGHT
     ========================================================= -->

<div class="surplus-footer-bottom">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-md-7">

                <p>

                    © {{ date('Y') }}

                    <strong>Surplus</strong>

                    — Surplus Food Management System.

                    All Rights Reserved.

                </p>

            </div>


            <div class="col-md-5">

                <div class="surplus-social">


                    <a href="#"
                       aria-label="Facebook">

                        <i class="fab fa-facebook-f"></i>

                    </a>


                    <a href="#"
                       aria-label="Instagram">

                        <i class="fab fa-instagram"></i>

                    </a>


                    <a href="#"
                       aria-label="Twitter">

                        <i class="fab fa-twitter"></i>

                    </a>


                    <a href="#"
                       aria-label="LinkedIn">

                        <i class="fab fa-linkedin-in"></i>

                    </a>


                </div>

            </div>

        </div>

    </div>

</div>


<!-- =========================================================
     BACK TO TOP
     ========================================================= -->

<a href="#"
   class="surplus-back-top"
   id="surplusBackTop">

    <i class="fas fa-chevron-up"></i>

</a>


<!-- =========================================================
     JAVASCRIPT
     ========================================================= -->

<script src="{{ asset('Buyer/assets/js/jquery-1.11.3.min.js') }}">
</script>

<script src="{{ asset('Buyer/assets/bootstrap/js/bootstrap.min.js') }}">
</script>

<script src="{{ asset('Buyer/assets/js/owl.carousel.min.js') }}">
</script>

<script src="{{ asset('Buyer/assets/js/jquery.magnific-popup.min.js') }}">
</script>

<script src="{{ asset('Buyer/assets/js/jquery.meanmenu.min.js') }}">
</script>

<script src="{{ asset('Buyer/assets/js/main.js') }}">
</script>


<script>

/* =========================================================
   MOBILE MENU
   ========================================================= */

document.addEventListener(
    'DOMContentLoaded',
    function () {

        const toggle =
            document.getElementById(
                'surplusMobileToggle'
            );

        const menu =
            document.getElementById(
                'surplusMobileMenu'
            );


        if (toggle && menu) {

            toggle.addEventListener(
                'click',
                function () {

                    menu.classList.toggle('show');


                    const icon =
                        toggle.querySelector('i');


                    if (menu.classList.contains('show')) {

                        icon.classList.remove(
                            'fa-bars'
                        );

                        icon.classList.add(
                            'fa-times'
                        );

                    } else {

                        icon.classList.remove(
                            'fa-times'
                        );

                        icon.classList.add(
                            'fa-bars'
                        );

                    }

                }
            );


            menu.querySelectorAll('a').forEach(
                function (link) {

                    link.addEventListener(
                        'click',
                        function () {

                            menu.classList.remove(
                                'show'
                            );

                            const icon =
                                toggle.querySelector('i');

                            icon.classList.remove(
                                'fa-times'
                            );

                            icon.classList.add(
                                'fa-bars'
                            );

                        }
                    );

                }
            );

        }

    }
);


/* =========================================================
   BACK TO TOP
   ========================================================= */

window.addEventListener(
    'scroll',
    function () {

        const button =
            document.getElementById(
                'surplusBackTop'
            );


        if (window.scrollY > 350) {

            button.classList.add('show');

        } else {

            button.classList.remove('show');

        }

    }
);


document.getElementById(
    'surplusBackTop'
).addEventListener(
    'click',
    function (event) {

        event.preventDefault();

        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });

    }
);

</script>


</body>

</html>