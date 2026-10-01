@extends('layouts.DonorMaster')

@section('title', 'foodLink - Home')

@section('content')


<!-- =========================================================
     CUSTOM HOME PAGE ANIMATIONS
     ========================================================= -->

<style>

    /* =====================================================
       HERO CAROUSEL
    ===================================================== */

    .donor-hero {
        position: relative;
        overflow: hidden;
    }

    .donor-hero .carousel-item {
        position: relative;
        height: 600px;
        overflow: hidden;
    }

    .donor-hero .carousel-item img {
        width: 100%;
        height: 600px;
        object-fit: cover;
        transform: scale(1.08);
        transition: transform 7s ease;
    }

    /* Zoom animation for active slide */

    .donor-hero .carousel-item.active img {
        transform: scale(1);
    }


    /* Dark overlay */

    .donor-hero .carousel-item::after {
        content: "";
        position: absolute;
        inset: 0;

        background:
            linear-gradient(
                90deg,
                rgba(0, 0, 0, 0.68),
                rgba(0, 0, 0, 0.25),
                rgba(0, 0, 0, 0.05)
            );

        z-index: 1;
    }


    /* =====================================================
       CAROUSEL CAPTION
    ===================================================== */

    .donor-hero .carousel-caption {
        z-index: 2;

        top: 0;
        bottom: 0;

        display: flex;
        align-items: center;

        text-align: left;
    }

    .donor-hero .carousel-caption h1 {
        color: #ffffff;

        font-size: clamp(40px, 5vw, 70px);

        font-weight: 700;

        line-height: 1.1;

        margin-bottom: 25px;

        opacity: 0;

        transform: translateY(45px);
    }

    .donor-hero .carousel-caption p {
        color: #ffffff;

        font-size: 18px;

        max-width: 650px;

        line-height: 1.7;

        opacity: 0;

        transform: translateY(35px);
    }


    /* =====================================================
       CAPTION ANIMATION
    ===================================================== */

    .donor-hero .carousel-item.active
    .carousel-caption h1 {

        animation: donorTitle 0.9s ease forwards;

        animation-delay: 0.35s;
    }

    .donor-hero .carousel-item.active
    .carousel-caption p {

        animation: donorText 0.9s ease forwards;

        animation-delay: 0.65s;
    }

    .donor-hero .carousel-item.active
    .carousel-caption .hero-buttons {

        animation: donorButtons 0.9s ease forwards;

        animation-delay: 0.9s;
    }


    @keyframes donorTitle {

        from {
            opacity: 0;
            transform: translateY(45px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }

    }


    @keyframes donorText {

        from {
            opacity: 0;
            transform: translateY(35px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }

    }


    @keyframes donorButtons {

        from {
            opacity: 0;
            transform: translateY(25px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }

    }


    /* =====================================================
       HERO BUTTONS
    ===================================================== */

    .hero-buttons {

        opacity: 0;

        display: flex;

        flex-wrap: wrap;

        gap: 12px;

        margin-top: 25px;
    }


    .hero-btn {

        display: inline-flex;

        align-items: center;

        gap: 9px;

        padding: 14px 25px;

        border-radius: 50px;

        font-size: 15px;

        font-weight: 600;

        text-decoration: none;

        transition: all 0.35s ease;

        border: none;
    }


    .hero-btn-primary {

        background: #39a900;

        color: #ffffff;
    }


    .hero-btn-primary:hover {

        background: #2e8800;

        color: #ffffff;

        transform: translateY(-4px);

        box-shadow: 0 10px 25px rgba(57, 169, 0, 0.35);
    }


    .hero-btn-secondary {

        background: #f28123;

        color: #ffffff;
    }


    .hero-btn-secondary:hover {

        background: #d9680d;

        color: #ffffff;

        transform: translateY(-4px);

        box-shadow: 0 10px 25px rgba(242, 129, 35, 0.35);
    }


    .hero-btn-light {

        background: #ffffff;

        color: #333333;
    }


    .hero-btn-light:hover {

        background: #39a900;

        color: #ffffff;

        transform: translateY(-4px);

        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.20);
    }


    /* =====================================================
       CAROUSEL CONTROLS
    ===================================================== */

    .donor-hero .carousel-control-prev,
    .donor-hero .carousel-control-next {

        width: 55px;

        height: 55px;

        top: 50%;

        transform: translateY(-50%);

        margin: 0 20px;

        border-radius: 50%;

        background: rgba(255, 255, 255, 0.18);

        backdrop-filter: blur(5px);

        opacity: 0;

        transition: all 0.3s ease;
    }


    .donor-hero:hover .carousel-control-prev,
    .donor-hero:hover .carousel-control-next {

        opacity: 1;
    }


    .donor-hero .carousel-control-prev:hover,
    .donor-hero .carousel-control-next:hover {

        background: #39a900;
    }


    /* =====================================================
       QUICK ACTION SECTION
    ===================================================== */

    .quick-actions {

        position: relative;

        margin-top: -55px;

        z-index: 10;

        padding-bottom: 70px;
    }


    .quick-action-card {

        position: relative;

        height: 100%;

        padding: 32px 25px;

        background: #ffffff;

        border-radius: 15px;

        text-align: center;

        box-shadow: 0 10px 35px rgba(0, 0, 0, 0.10);

        border: 1px solid #eeeeee;

        overflow: hidden;

        transition: all 0.4s ease;
    }


    .quick-action-card::before {

        content: "";

        position: absolute;

        top: 0;

        left: 0;

        width: 100%;

        height: 4px;

        background: #39a900;

        transform: scaleX(0);

        transform-origin: left;

        transition: transform 0.4s ease;
    }


    .quick-action-card:hover {

        transform: translateY(-10px);

        box-shadow: 0 18px 45px rgba(0, 0, 0, 0.14);
    }


    .quick-action-card:hover::before {

        transform: scaleX(1);
    }


    .quick-action-icon {

        width: 70px;

        height: 70px;

        margin: 0 auto 20px;

        border-radius: 50%;

        display: flex;

        align-items: center;

        justify-content: center;

        background: #eff8e9;

        color: #39a900;

        font-size: 27px;

        transition: all 0.4s ease;
    }


    .quick-action-card:hover
    .quick-action-icon {

        background: #39a900;

        color: #ffffff;

        transform: rotateY(360deg);
    }


    .quick-action-card h4 {

        font-weight: 700;

        margin-bottom: 10px;
    }


    .quick-action-card p {

        color: #777;

        font-size: 14px;

        line-height: 1.7;

        margin-bottom: 20px;
    }


    .quick-action-btn {

        display: inline-flex;

        align-items: center;

        gap: 7px;

        color: #39a900;

        font-weight: 600;

        text-decoration: none;

        transition: all 0.3s ease;
    }


    .quick-action-btn:hover {

        color: #f28123;

        gap: 12px;
    }


    /* =====================================================
       SECTION ANIMATION
    ===================================================== */

    .donor-section {

        animation: sectionAppear 0.9s ease both;
    }


    @keyframes sectionAppear {

        from {
            opacity: 0;
            transform: translateY(35px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }

    }


    /* =====================================================
       ABOUT IMAGE
    ===================================================== */

    .donor-about-image {

        overflow: hidden;

        border-radius: 12px;
    }


    .donor-about-image img {

        transition: transform 0.6s ease;
    }


    .donor-about-image:hover img {

        transform: scale(1.06);
    }


    /* =====================================================
       WHY DONATE CARDS
    ===================================================== */

    .donation-card {

        height: 100%;

        background: #ffffff;

        border-radius: 14px;

        padding: 35px 25px;

        text-align: center;

        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.07);

        transition: all 0.4s ease;

        border: 1px solid #eeeeee;
    }


    .donation-card:hover {

        transform: translateY(-10px);

        box-shadow: 0 18px 40px rgba(0, 0, 0, 0.12);
    }


    .donation-card .donation-icon {

        width: 75px;

        height: 75px;

        margin: 0 auto 22px;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 50%;

        background: #eff8e9;

        color: #39a900;

        font-size: 30px;

        transition: all 0.4s ease;
    }


    .donation-card:hover .donation-icon {

        background: #39a900;

        color: #ffffff;

        transform: scale(1.1) rotate(5deg);
    }


    /* =====================================================
       CTA
    ===================================================== */

    .donor-cta {

        position: relative;

        overflow: hidden;
    }


    .donor-cta::before {

        content: "";

        position: absolute;

        width: 280px;

        height: 280px;

        border-radius: 50%;

        background: rgba(255,255,255,0.08);

        top: -120px;

        right: -80px;

        animation: floatingCircle 6s ease-in-out infinite;
    }


    .donor-cta::after {

        content: "";

        position: absolute;

        width: 180px;

        height: 180px;

        border-radius: 50%;

        background: rgba(255,255,255,0.06);

        bottom: -80px;

        left: -50px;

        animation: floatingCircle 5s ease-in-out infinite reverse;
    }


    @keyframes floatingCircle {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(25px);
        }

    }


    .donor-cta .container {

        position: relative;

        z-index: 2;
    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 991.98px) {

        .donor-hero .carousel-item {

            height: 520px;
        }

        .donor-hero .carousel-item img {

            height: 520px;
        }

        .donor-hero .carousel-caption h1 {

            font-size: 45px;
        }

        .quick-actions {

            margin-top: 30px;
        }

    }


    @media (max-width: 575.98px) {

        .donor-hero .carousel-item {

            height: 550px;
        }

        .donor-hero .carousel-item img {

            height: 550px;
        }

        .donor-hero .carousel-caption {

            padding: 25px;
        }

        .donor-hero .carousel-caption h1 {

            font-size: 36px;

            margin-bottom: 18px;
        }

        .donor-hero .carousel-caption p {

            font-size: 15px;
        }

        .hero-buttons {

            flex-direction: column;

            align-items: flex-start;
        }

        .hero-btn {

            padding: 12px 20px;

            font-size: 14px;
        }

        .donor-hero .carousel-control-prev,
        .donor-hero .carousel-control-next {

            display: none;
        }

    }

</style>


<!-- =========================================================
     HERO CAROUSEL START
     ========================================================= -->

<section class="donor-hero">

    <div id="header-carousel"
        class="carousel slide"
        data-bs-ride="carousel"
        data-bs-interval="6000">

        <div class="carousel-inner">


            <!-- =================================================
                 SLIDE 1
                 ================================================= -->

            <div class="carousel-item active">

                <img src="{{ asset('Donor/img/carousel-1.jpg') }}"
                    alt="Food Donation">

                <div class="carousel-caption">

                    <div class="container">

                        <div class="row justify-content-start">

                            <div class="col-lg-8">

                                <h1>

                                    Donate Food,
                                    <br>
                                    Save Lives

                                </h1>


                                <p>

                                    Your small act of kindness can make
                                    a meaningful difference. Share surplus
                                    food with people who need it.

                                </p>


                                <div class="hero-buttons">


                                    <!-- DONATE FOOD -->

                                    <a href="{{ route('foodregister') }}"
                                        class="hero-btn hero-btn-primary">

                                        <i class="fas fa-utensils"></i>

                                        Donate Food

                                    </a>


                                    <!-- FOOD REQUESTS -->

                                    <a href="{{ route('donor.food.requests') }}"
                                        class="hero-btn hero-btn-secondary">

                                        <i class="fas fa-clipboard-list"></i>

                                        Food Requests

                                    </a>


                                    <!-- VIEW MY FOOD -->

                                    <a href="{{ route('food_view') }}"
                                        class="hero-btn hero-btn-light">

                                        <i class="fas fa-box-open"></i>

                                        View My Foods

                                    </a>


                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            <!-- =================================================
                 SLIDE 2
                 ================================================= -->

            <div class="carousel-item">

                <img src="{{ asset('Donor/img/carousel-2.jpg') }}"
                    alt="Donate Food">

                <div class="carousel-caption">

                    <div class="container">

                        <div class="row justify-content-start">

                            <div class="col-lg-8">

                                <h1>

                                    Be a Hero.
                                    <br>
                                    Share Surplus Food.

                                </h1>


                                <p>

                                    Food that is not needed by you
                                    can still be valuable to someone else.
                                    Give it a second chance.

                                </p>


                                <div class="hero-buttons">


                                    <a href="{{ route('foodregister') }}"
                                        class="hero-btn hero-btn-primary">

                                        <i class="fas fa-plus-circle"></i>

                                        Donate Food

                                    </a>


                                    <a href="{{ route('donor.food.requests') }}"
                                        class="hero-btn hero-btn-secondary">

                                        <i class="fas fa-search"></i>

                                        View Food Requests

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


        </div>


        <!-- =================================================
             PREVIOUS
             ================================================= -->

        <button class="carousel-control-prev"
            type="button"
            data-bs-target="#header-carousel"
            data-bs-slide="prev">

            <span class="carousel-control-prev-icon"></span>

        </button>


        <!-- =================================================
             NEXT
             ================================================= -->

        <button class="carousel-control-next"
            type="button"
            data-bs-target="#header-carousel"
            data-bs-slide="next">

            <span class="carousel-control-next-icon"></span>

        </button>


    </div>

</section>

<!-- =========================================================
     HERO CAROUSEL END
     ================================================= -->



<!-- =========================================================
     QUICK ACTIONS START
     ================================================= -->

<section class="quick-actions">

    <div class="container">

        <div class="row g-4">


            <!-- DONATE FOOD -->

            <div class="col-lg-4 col-md-6">

                <div class="quick-action-card">

                    <div class="quick-action-icon">

                        <i class="fas fa-utensils"></i>

                    </div>


                    <h4>
                        Donate Food
                    </h4>


                    <p>

                        Add your surplus food and make it
                        available to people who need it.

                    </p>


                    <a href="{{ route('foodregister') }}"
                        class="quick-action-btn">

                        Donate Now

                        <i class="fas fa-arrow-right"></i>

                    </a>

                </div>

            </div>


            <!-- FOOD REQUESTS -->

            <div class="col-lg-4 col-md-6">

                <div class="quick-action-card">

                    <div class="quick-action-icon">

                        <i class="fas fa-clipboard-list"></i>

                    </div>


                    <h4>
                        Food Requests
                    </h4>


                    <p>

                        Check requests from buyers and
                        manage requests for your donated food.

                    </p>


                    <a href="{{ route('donor.food.requests') }}"
                        class="quick-action-btn">

                        View Requests

                        <i class="fas fa-arrow-right"></i>

                    </a>

                </div>

            </div>


            <!-- VIEW MY FOODS -->

            <div class="col-lg-4 col-md-6">

                <div class="quick-action-card">

                    <div class="quick-action-icon">

                        <i class="fas fa-box-open"></i>

                    </div>


                    <h4>
                        View My Foods
                    </h4>


                    <p>

                        View the food items you have registered
                        and manage your available food.

                    </p>


                    <a href="{{ route('food_view') }}"
                        class="quick-action-btn">

                        View My Foods

                        <i class="fas fa-arrow-right"></i>

                    </a>

                </div>

            </div>


        </div>

    </div>

</section>

<!-- =========================================================
     QUICK ACTIONS END
     ========================================================= -->



<!-- =========================================================
     ABOUT START
     ========================================================= -->

<section class="container-xxl py-5 donor-section"
    id="about">

    <div class="container">

        <div class="row g-5 align-items-center">


            <!-- IMAGE -->

            <div class="col-lg-6">

                <div class="donor-about-image">

                    <img class="img-fluid w-100"
                        src="{{ asset('Donor/img/about.jpg') }}"
                        alt="Food Donation">

                </div>

            </div>


            <!-- CONTENT -->

            <div class="col-lg-6">

                <span class="text-primary fw-bold">
                    ABOUT FOODLINK
                </span>


                <h1 class="display-5 mb-4">

                    Give Food
                    <br>
                    Give Someone a Second Chance

                </h1>


                <p class="mb-4">

                    Food donation is one of the most valuable
                    contributions you can make to society.
                    A single donation can help someone when
                    they need food the most.

                </p>


                <p>

                    <i class="fa fa-check text-primary me-3"></i>

                    Help reduce food waste

                </p>


                <p>

                    <i class="fa fa-check text-primary me-3"></i>

                    Quick and simple food registration

                </p>


                <p>

                    <i class="fa fa-check text-primary me-3"></i>

                    Connect with food requests

                </p>


                <a href="{{ route('foodregister') }}"
                    class="btn btn-primary rounded-pill py-3 px-5 mt-3">

                    Donate Food

                    <i class="fas fa-arrow-right ms-2"></i>

                </a>

            </div>


        </div>

    </div>

</section>

<!-- =========================================================
     ABOUT END
     ========================================================= -->



<!-- =========================================================
     WHY DONATE START
     ========================================================= -->

<section class="container-fluid bg-light bg-icon my-5 py-6 donor-section"
    id="donate">

    <div class="container">


        <div class="section-header text-center mx-auto mb-5"
            style="max-width: 650px;">

            <span class="text-primary fw-bold">
                WHY FOODLINK
            </span>


            <h1 class="display-5 mb-3">

                Why Donate Food?

            </h1>


            <p>

                Your surplus food can still have value.
                Give it a second chance instead of letting it go to waste.

            </p>

        </div>


        <div class="row g-4">


            <!-- CARD 1 -->

            <div class="col-lg-4 col-md-6">

                <div class="donation-card">

                    <div class="donation-icon">

                        <i class="fa fa-heart"></i>

                    </div>


                    <h4 class="mb-3">

                        Help Others

                    </h4>


                    <p class="mb-0">

                        Your surplus food can reach people
                        who are looking for affordable food.

                    </p>

                </div>

            </div>


            <!-- CARD 2 -->

            <div class="col-lg-4 col-md-6">

                <div class="donation-card">

                    <div class="donation-icon">

                        <i class="fa fa-users"></i>

                    </div>


                    <h4 class="mb-3">

                        Support Your Community

                    </h4>


                    <p class="mb-0">

                        Become part of a community that
                        helps make better use of available food.

                    </p>

                </div>

            </div>


            <!-- CARD 3 -->

            <div class="col-lg-4 col-md-6">

                <div class="donation-card">

                    <div class="donation-icon">

                        <i class="fa fa-recycle"></i>

                    </div>


                    <h4 class="mb-3">

                        Reduce Food Waste

                    </h4>


                    <p class="mb-0">

                        Give surplus food another opportunity
                        instead of allowing it to go unused.

                    </p>

                </div>

            </div>


        </div>

    </div>

</section>

<!-- =========================================================
     WHY DONATE END
     ========================================================= -->



<!-- =========================================================
     CALL TO ACTION START
     ========================================================= -->

<section class="container-fluid bg-primary bg-icon mt-5 py-6 donor-cta">

    <div class="container">

        <div class="row g-5 align-items-center">


            <!-- TEXT -->

            <div class="col-md-8">

                <h1 class="display-5 text-white mb-3">

                    Ready to Share Your Surplus Food?

                </h1>


                <p class="text-white mb-0">

                    Register your food today and help connect
                    available food with people looking for it.

                </p>

            </div>


            <!-- BUTTONS -->

            <div class="col-md-4">

                <div class="d-flex flex-wrap gap-2 justify-content-md-end">


                    <a class="btn btn-lg btn-secondary rounded-pill py-3 px-4"
                        href="{{ route('foodregister') }}">

                        <i class="fas fa-plus-circle me-2"></i>

                        Donate Food

                    </a>


                    <a class="btn btn-lg btn-light rounded-pill py-3 px-4"
                        href="{{ route('donor.food.requests') }}">

                        Food Requests

                    </a>


                </div>

            </div>


        </div>

    </div>

</section>

<!-- =========================================================
     CALL TO ACTION END
     ========================================================= -->


@endsection