@extends('layouts.Buyermaster')

@section('content')

<style>

/* =========================================================
   GENERAL
   ========================================================= */

.surplus-page {
    font-family: 'Open Sans', sans-serif;
    color: #222;
    overflow: hidden;
}

.surplus-section-title {
    text-align: center;
    margin-bottom: 50px;
}

.surplus-section-title .small-title {
    color: #39a900;
    font-size: 13px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
    display: block;
    margin-bottom: 10px;
}

.surplus-section-title h2 {
    font-size: 38px;
    font-weight: 800;
    margin-bottom: 12px;
}

.surplus-section-title h2 span {
    color: #39a900;
}

.surplus-section-title p {
    color: #777;
    max-width: 650px;
    margin: auto;
    line-height: 1.8;
}


/* =========================================================
   HERO
   ========================================================= */

.surplus-hero {
    position: relative;
    min-height: 620px;
    background: #f6faf3;
    overflow: hidden;
}

.surplus-slide {
    position: absolute;
    inset: 0;
    opacity: 0;
    visibility: hidden;
    animation: surplusSlide 18s infinite;
}

.surplus-slide:nth-child(1) {
    animation-delay: 0s;
}

.surplus-slide:nth-child(2) {
    animation-delay: 6s;
}

.surplus-slide:nth-child(3) {
    animation-delay: 12s;
}

@keyframes surplusSlide {

    0% {
        opacity: 0;
        visibility: hidden;
    }

    5% {
        opacity: 1;
        visibility: visible;
    }

    30% {
        opacity: 1;
        visibility: visible;
    }

    35% {
        opacity: 0;
        visibility: hidden;
    }

    100% {
        opacity: 0;
        visibility: hidden;
    }
}

.surplus-slide-bg {
    position: absolute;
    inset: 0;

    background:
        linear-gradient(
            90deg,
            rgba(246,250,243,0.99) 0%,
            rgba(246,250,243,0.96) 35%,
            rgba(246,250,243,0.70) 55%,
            rgba(246,250,243,0.08) 100%
        );

    z-index: 2;
}

.surplus-hero-content {
    min-height: 620px;
    display: flex;
    align-items: center;
    position: relative;
    z-index: 5;
}

.surplus-text {
    max-width: 570px;
    padding-left: 25px;
}

.surplus-small-title {
    display: inline-block;
    color: #39a900;
    font-size: 14px;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    margin-bottom: 15px;
}

.surplus-text h1 {
    font-family: 'Lora', serif;
    font-size: 58px;
    line-height: 1.12;
    font-weight: 700;
    color: #222;
    margin-bottom: 22px;
}

.surplus-text h1 span {
    color: #39a900;
}

.surplus-text p {
    font-size: 17px;
    line-height: 1.8;
    color: #666;
    max-width: 520px;
    margin-bottom: 30px;
}


/* =========================================================
   BUTTONS
   ========================================================= */

.surplus-buttons {
    display: flex;
    gap: 14px;
    flex-wrap: wrap;
}

.surplus-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-width: 155px;
    padding: 14px 24px;
    border-radius: 7px;
    font-size: 14px;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.3s ease;
}

.surplus-btn-primary {
    background: #39a900;
    color: white;
    box-shadow: 0 8px 20px rgba(57,169,0,0.25);
}

.surplus-btn-primary:hover {
    background: #2f8c00;
    color: white;
    transform: translateY(-3px);
}

.surplus-btn-secondary {
    background: white;
    color: #39a900;
    border: 2px solid #39a900;
}

.surplus-btn-secondary:hover {
    background: #39a900;
    color: white;
    transform: translateY(-3px);
}


/* =========================================================
   HERO IMAGE
   ========================================================= */

.surplus-image-area {
    position: absolute;
    right: 4%;
    top: 50%;
    transform: translateY(-50%);
    width: 500px;
    height: 500px;
    z-index: 3;
}

.surplus-image-circle {
    position: absolute;
    width: 470px;
    height: 470px;
    border-radius: 50%;
    right: 0;
    top: 15px;

    background:
        radial-gradient(
            circle,
            #ffffff 0%,
            #eef7e8 65%,
            #dcefd3 100%
        );

    box-shadow: 0 20px 60px rgba(0,0,0,0.12);
}

.surplus-main-image {
    position: absolute;
    width: 430px;
    height: 430px;
    object-fit: cover;
    border-radius: 50%;
    right: 20px;
    top: 35px;

    filter: drop-shadow(
        0 25px 20px rgba(0,0,0,0.18)
    );

    animation: surplusFloat 4s ease-in-out infinite;
}

@keyframes surplusFloat {

    0% {
        transform: translateY(0) rotate(-2deg);
    }

    50% {
        transform: translateY(-15px) rotate(2deg);
    }

    100% {
        transform: translateY(0) rotate(-2deg);
    }
}


/* =========================================================
   FLOATING DOTS
   ========================================================= */

.surplus-dot {
    position: absolute;
    border-radius: 50%;
    z-index: 4;
}

.surplus-dot-1 {
    width: 18px;
    height: 18px;
    background: #f28123;
    top: 65px;
    right: 100px;
    animation: surplusDotFloat 3s infinite;
}

.surplus-dot-2 {
    width: 12px;
    height: 12px;
    background: #39a900;
    bottom: 80px;
    right: 50px;
    animation: surplusDotFloat 4s infinite reverse;
}

.surplus-dot-3 {
    width: 25px;
    height: 25px;
    background: #ffcc33;
    top: 190px;
    right: 5px;
    animation: surplusDotFloat 3.5s infinite;
}

@keyframes surplusDotFloat {

    0% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-15px);
    }

    100% {
        transform: translateY(0);
    }
}


/* =========================================================
   SLIDE NUMBER
   ========================================================= */

.surplus-slide-number {
    position: absolute;
    right: 30px;
    bottom: 25px;
    z-index: 10;
    font-size: 13px;
    color: #777;
    letter-spacing: 2px;
}


/* =========================================================
   FEATURES
   ========================================================= */

.surplus-features {
    padding: 70px 0;
    background: white;
}

.surplus-feature-box {
    height: 100%;
    display: flex;
    align-items: center;
    gap: 20px;
    padding: 28px;
    background: #f8fbf6;
    border-radius: 12px;
    border: 1px solid #edf3e9;
    transition: 0.3s;
}

.surplus-feature-box:hover {
    transform: translateY(-7px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.08);
}

.surplus-feature-icon {
    min-width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: #39a900;
    color: white;
    font-size: 23px;
}

.surplus-feature-box h3 {
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 6px;
}

.surplus-feature-box p {
    margin: 0;
    color: #777;
    font-size: 14px;
    line-height: 1.6;
}


/* =========================================================
   AVAILABLE FOOD
   ========================================================= */

.surplus-products {
    padding: 100px 0;
    background: #f8faf7;
}

.surplus-product-card {
    background: white;
    border-radius: 14px;
    overflow: hidden;
    height: 100%;
    box-shadow: 0 8px 25px rgba(0,0,0,0.07);
    transition: 0.3s;
}

.surplus-product-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 18px 40px rgba(0,0,0,0.12);
}

.surplus-product-image {
    height: 245px;
    overflow: hidden;
}

.surplus-product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: 0.5s;
}

.surplus-product-card:hover
.surplus-product-image img {
    transform: scale(1.08);
}

.surplus-product-info {
    padding: 25px;
    text-align: center;
}

.surplus-product-info h3 {
    font-size: 20px;
    font-weight: 700;
    margin-bottom: 8px;
}

.surplus-product-info p {
    color: #777;
    line-height: 1.7;
    font-size: 14px;
    margin-bottom: 18px;
}

.surplus-view-btn {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 10px 20px;
    background: #39a900;
    color: white;
    border-radius: 6px;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
    transition: 0.3s;
}

.surplus-view-btn:hover {
    background: #2f8c00;
    color: white;
}


/* =========================================================
   WHY SURPLUS
   ========================================================= */

.surplus-why {
    padding: 100px 0;
    background: white;
}

.surplus-why-image {
    height: 420px;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 12px 35px rgba(0,0,0,0.10);
}

.surplus-why-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.surplus-why-content {
    padding: 30px;
}

.surplus-why-content .small-title {
    color: #39a900;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-size: 13px;
}

.surplus-why-content h2 {
    font-family: 'Lora', serif;
    font-size: 40px;
    line-height: 1.3;
    margin: 15px 0 20px;
}

.surplus-why-content h2 span {
    color: #39a900;
}

.surplus-why-content p {
    color: #777;
    line-height: 1.8;
    margin-bottom: 15px;
}


/* =========================================================
   HOW IT WORKS
   ========================================================= */

.surplus-how {
    padding: 100px 0;
    background: #f8faf7;
}

.surplus-step {
    text-align: center;
    padding: 30px 20px;
    height: 100%;
}

.surplus-step-number {
    width: 65px;
    height: 65px;
    margin: 0 auto 20px;
    border-radius: 50%;
    background: #39a900;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 21px;
    font-weight: 700;
    box-shadow: 0 8px 20px rgba(57,169,0,0.22);
}

.surplus-step h3 {
    font-size: 19px;
    margin-bottom: 10px;
    font-weight: 700;
}

.surplus-step p {
    color: #777;
    font-size: 14px;
    line-height: 1.7;
}


/* =========================================================
   ABOUT
   ========================================================= */

.surplus-about {
    padding: 100px 0;
    background: white;
}

.surplus-about-image {
    height: 420px;
    border-radius: 16px;
    overflow: hidden;
}

.surplus-about-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.surplus-about-content {
    padding: 30px;
}

.surplus-about-content .small-title {
    color: #39a900;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-size: 13px;
}

.surplus-about-content h2 {
    font-family: 'Lora', serif;
    font-size: 40px;
    margin: 15px 0 20px;
}

.surplus-about-content h2 span {
    color: #39a900;
}

.surplus-about-content p {
    color: #777;
    line-height: 1.8;
}


/* =========================================================
   BANNER
   ========================================================= */

.surplus-banner {
    padding: 90px 20px;
    text-align: center;
    background:
        linear-gradient(
            135deg,
            #39a900,
            #277500
        );
    color: white;
}

.surplus-banner h2 {
    font-family: 'Lora', serif;
    font-size: 40px;
    font-weight: 700;
    margin-bottom: 15px;
}

.surplus-banner p {
    max-width: 650px;
    margin: 0 auto 28px;
    opacity: 0.92;
    line-height: 1.8;
}

.surplus-banner-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: white;
    color: #39a900;
    padding: 14px 30px;
    border-radius: 7px;
    font-weight: 700;
    text-decoration: none;
    transition: 0.3s;
}

.surplus-banner-btn:hover {
    background: #f7b733;
    color: #222;
    transform: translateY(-3px);
}


/* =========================================================
   UPDATES
   ========================================================= */

.surplus-updates {
    padding: 100px 0;
    background: #f8faf7;
}

.surplus-update-card {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    height: 100%;
    box-shadow: 0 8px 25px rgba(0,0,0,0.06);
    transition: 0.3s;
}

.surplus-update-card:hover {
    transform: translateY(-7px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.10);
}

.surplus-update-image {
    height: 220px;
    overflow: hidden;
}

.surplus-update-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: 0.5s;
}

.surplus-update-card:hover
.surplus-update-image img {
    transform: scale(1.07);
}

.surplus-update-content {
    padding: 24px;
}

.surplus-update-label {
    color: #39a900;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 10px;
}

.surplus-update-content h3 {
    font-size: 20px;
    line-height: 1.4;
    margin-bottom: 12px;
}

.surplus-update-content p {
    color: #777;
    font-size: 14px;
    line-height: 1.7;
    margin-bottom: 18px;
}

.surplus-read-more {
    color: #39a900;
    font-size: 14px;
    font-weight: 700;
    text-decoration: none;
}

.surplus-read-more:hover {
    color: #f28123;
}


/* =========================================================
   RESPONSIVE
   ========================================================= */

@media(max-width: 991px) {

    .surplus-hero {
        min-height: 700px;
    }

    .surplus-hero-content {
        min-height: 700px;
        align-items: flex-start;
        padding-top: 60px;
    }

    .surplus-text {
        padding: 0 20px;
        text-align: center;
        max-width: 100%;
    }

    .surplus-text h1 {
        font-size: 42px;
    }

    .surplus-text p {
        margin-left: auto;
        margin-right: auto;
    }

    .surplus-buttons {
        justify-content: center;
    }

    .surplus-image-area {
        width: 330px;
        height: 330px;
        right: 50%;
        top: auto;
        bottom: -40px;
        transform: translateX(50%);
    }

    .surplus-image-circle {
        width: 320px;
        height: 320px;
        top: 0;
        right: 5px;
    }

    .surplus-main-image {
        width: 300px;
        height: 300px;
        right: 15px;
        top: 10px;
    }
}


@media(max-width: 576px) {

    .surplus-hero {
        min-height: 650px;
    }

    .surplus-hero-content {
        min-height: 650px;
        padding-top: 45px;
    }

    .surplus-small-title {
        font-size: 11px;
    }

    .surplus-text h1 {
        font-size: 34px;
    }

    .surplus-text p {
        font-size: 14px;
    }

    .surplus-image-area {
        width: 270px;
        height: 270px;
        bottom: -20px;
    }

    .surplus-image-circle {
        width: 260px;
        height: 260px;
    }

    .surplus-main-image {
        width: 245px;
        height: 245px;
    }

    .surplus-btn {
        width: 100%;
    }

    .surplus-banner h2 {
        font-size: 30px;
    }

    .surplus-section-title h2 {
        font-size: 30px;
    }

    .surplus-why-content h2,
    .surplus-about-content h2 {
        font-size: 32px;
    }
}


@media(max-width: 400px) {

    .surplus-text h1 {
        font-size: 29px;
    }

    .surplus-image-area {
        width: 235px;
        height: 235px;
    }

    .surplus-image-circle {
        width: 225px;
        height: 225px;
    }

    .surplus-main-image {
        width: 210px;
        height: 210px;
    }
}

</style>


<div class="surplus-page">


<!-- =========================================================
     HERO
     ========================================================= -->

<section class="surplus-hero">


    <!-- SLIDE 1 -->

    <div class="surplus-slide">

        <div class="surplus-slide-bg"></div>

        <div class="container surplus-hero-content">

            <div class="surplus-text">

                <span class="surplus-small-title">
                    Fresh • Affordable • Sustainable
                </span>

                <h1>
                    Fresh Food,
                    <span>Less Waste.</span>
                </h1>

                <p>
                    Discover quality surplus food at affordable
                    prices and help reduce food waste through
                    every purchase.
                </p>

                <div class="surplus-buttons">

                    <a
                        href="{{ route('buyer.foods') }}"
                        class="surplus-btn surplus-btn-primary">

                        <i class="fas fa-shopping-basket"></i>
                        Explore Food

                    </a>

                    <a
                        href="{{ route('buyer_profile') }}"
                        class="surplus-btn surplus-btn-secondary">

                        <i class="fas fa-user"></i>
                        My Profile

                    </a>

                </div>

            </div>


            <div class="surplus-image-area">

                <div class="surplus-image-circle"></div>

                <img
                    src="{{ asset('Buyer/assets/img/products/product-img-1.jpg') }}"
                    class="surplus-main-image"
                    alt="Surplus Food">

                <div class="surplus-dot surplus-dot-1"></div>
                <div class="surplus-dot surplus-dot-2"></div>
                <div class="surplus-dot surplus-dot-3"></div>

            </div>

        </div>

        <div class="surplus-slide-number">
            01 / 03
        </div>

    </div>


    <!-- SLIDE 2 -->

    <div class="surplus-slide">

        <div class="surplus-slide-bg"></div>

        <div class="container surplus-hero-content">

            <div class="surplus-text">

                <span class="surplus-small-title">
                    Good Food • Great Value
                </span>

                <h1>
                    Quality Food
                    <span>At Better Prices.</span>
                </h1>

                <p>
                    Find surplus food made available by donors
                    and purchase useful food at affordable prices.
                </p>

                <div class="surplus-buttons">

                    <a
                        href="{{ route('buyer.foods') }}"
                        class="surplus-btn surplus-btn-primary">

                        <i class="fas fa-utensils"></i>
                        View Foods

                    </a>

                    <a
                        href="{{ route('buyer.my.requests') }}"
                        class="surplus-btn surplus-btn-secondary">

                        <i class="fas fa-clipboard-list"></i>
                        My Requests

                    </a>

                </div>

            </div>


            <div class="surplus-image-area">

                <div class="surplus-image-circle"></div>

                <img
                    src="{{ asset('Buyer/assets/img/products/product-img-2.jpg') }}"
                    class="surplus-main-image"
                    alt="Available Food">

                <div class="surplus-dot surplus-dot-1"></div>
                <div class="surplus-dot surplus-dot-2"></div>
                <div class="surplus-dot surplus-dot-3"></div>

            </div>

        </div>

        <div class="surplus-slide-number">
            02 / 03
        </div>

    </div>


    <!-- SLIDE 3 -->

    <div class="surplus-slide">

        <div class="surplus-slide-bg"></div>

        <div class="container surplus-hero-content">

            <div class="surplus-text">

                <span class="surplus-small-title">
                    Save Food • Shop Smart
                </span>

                <h1>
                    Every Purchase
                    <span>Helps Reduce Waste.</span>
                </h1>

                <p>
                    Browse available surplus food, submit your
                    purchase request and make better use of food
                    that might otherwise go to waste.
                </p>

                <div class="surplus-buttons">

                    <a
                        href="{{ route('buyer.foods') }}"
                        class="surplus-btn surplus-btn-primary">

                        <i class="fas fa-store"></i>
                        Start Shopping

                    </a>

                    <a
                        href="{{ route('buyer.my.requests') }}"
                        class="surplus-btn surplus-btn-secondary">

                        <i class="fas fa-history"></i>
                        My Requests

                    </a>

                </div>

            </div>


            <div class="surplus-image-area">

                <div class="surplus-image-circle"></div>

                <img
                    src="{{ asset('Buyer/assets/img/products/product-img-3.jpg') }}"
                    class="surplus-main-image"
                    alt="Surplus Food">

                <div class="surplus-dot surplus-dot-1"></div>
                <div class="surplus-dot surplus-dot-2"></div>
                <div class="surplus-dot surplus-dot-3"></div>

            </div>

        </div>

        <div class="surplus-slide-number">
            03 / 03
        </div>

    </div>

</section>


<!-- =========================================================
     FEATURES
     ========================================================= -->

<section class="surplus-features">

    <div class="container">

        <div class="row g-4">

            <div class="col-lg-4 col-md-6">

                <div class="surplus-feature-box">

                    <div class="surplus-feature-icon">
                        <i class="fas fa-leaf"></i>
                    </div>

                    <div>
                        <h3>Reduce Food Waste</h3>

                        <p>
                            Help give surplus food a second chance
                            through meaningful purchases.
                        </p>
                    </div>

                </div>

            </div>


            <div class="col-lg-4 col-md-6">

                <div class="surplus-feature-box">

                    <div class="surplus-feature-icon">
                        <i class="fas fa-tags"></i>
                    </div>

                    <div>
                        <h3>Affordable Prices</h3>

                        <p>
                            Discover available food at prices offered
                            by donors through Surplus.
                        </p>
                    </div>

                </div>

            </div>


            <div class="col-lg-4 col-md-6">

                <div class="surplus-feature-box">

                    <div class="surplus-feature-icon">
                        <i class="fas fa-handshake"></i>
                    </div>

                    <div>
                        <h3>Connect With Donors</h3>

                        <p>
                            Browse food made available by registered
                            donors on the platform.
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     AVAILABLE FOOD
     ========================================================= -->

<section class="surplus-products">

    <div class="container">

        <div class="surplus-section-title">

            <span class="small-title">
                Explore Surplus Food
            </span>

            <h2>
                <span>Available</span> Food
            </h2>

            <p>
                Browse food available from donors and discover
                quality surplus food at affordable prices.
            </p>

        </div>


        <div class="row g-4">

            <div class="col-lg-4 col-md-6">

                <div class="surplus-product-card">

                    <div class="surplus-product-image">

                        <img
                            src="{{ asset('Buyer/assets/img/products/product-img-1.jpg') }}"
                            alt="Available Surplus Food">

                    </div>

                    <div class="surplus-product-info">

                        <h3>Fresh Food</h3>

                        <p>
                            Browse currently available surplus
                            food from registered donors.
                        </p>

                        <a
                            href="{{ route('buyer.foods') }}"
                            class="surplus-view-btn">

                            View Food
                            <i class="fas fa-arrow-right"></i>

                        </a>

                    </div>

                </div>

            </div>


            <div class="col-lg-4 col-md-6">

                <div class="surplus-product-card">

                    <div class="surplus-product-image">

                        <img
                            src="{{ asset('Buyer/assets/img/products/product-img-2.jpg') }}"
                            alt="Surplus Food">

                    </div>

                    <div class="surplus-product-info">

                        <h3>Quality Food</h3>

                        <p>
                            Find food available for purchase
                            through the Surplus platform.
                        </p>

                        <a
                            href="{{ route('buyer.foods') }}"
                            class="surplus-view-btn">

                            Explore Food
                            <i class="fas fa-arrow-right"></i>

                        </a>

                    </div>

                </div>

            </div>


            <div class="col-lg-4 col-md-6">

                <div class="surplus-product-card">

                    <div class="surplus-product-image">

                        <img
                            src="{{ asset('Buyer/assets/img/products/product-img-3.jpg') }}"
                            alt="Surplus Collection">

                    </div>

                    <div class="surplus-product-info">

                        <h3>Surplus Collection</h3>

                        <p>
                            Explore different food items currently
                            available through Surplus.
                        </p>

                        <a
                            href="{{ route('buyer.foods') }}"
                            class="surplus-view-btn">

                            Explore Now
                            <i class="fas fa-arrow-right"></i>

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     WHY SURPLUS
     ========================================================= -->

<section class="surplus-why">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6">

                <div class="surplus-why-image">

                    <img
                        src="{{ asset('Buyer/assets/img/a.jpg') }}"
                        alt="Surplus Food Management">

                </div>

            </div>


            <div class="col-lg-6">

                <div class="surplus-why-content">

                    <span class="small-title">
                        Why Surplus?
                    </span>

                    <h2>
                        Better Food.
                        <span>Less Waste.</span>
                    </h2>

                    <p>
                        Surplus is a food management platform that
                        connects registered donors with buyers.
                    </p>

                    <p>
                        Donors can make surplus food available,
                        while buyers can browse available food,
                        submit purchase requests and complete
                        purchases through the platform.
                    </p>

                    <a
                        href="{{ route('buyer.foods') }}"
                        class="surplus-btn surplus-btn-primary">

                        <i class="fas fa-search"></i>
                        Explore Available Food

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     HOW IT WORKS
     ========================================================= -->

<section class="surplus-how">

    <div class="container">

        <div class="surplus-section-title">

            <span class="small-title">
                Simple Process
            </span>

            <h2>
                How <span>Surplus</span> Works
            </h2>

            <p>
                Browse available food and complete your purchase
                through a simple process.
            </p>

        </div>


        <div class="row g-4">

            <div class="col-lg-4 col-md-6">

                <div class="surplus-step">

                    <div class="surplus-step-number">
                        01
                    </div>

                    <h3>Browse Food</h3>

                    <p>
                        Explore the surplus food currently
                        available from donors.
                    </p>

                </div>

            </div>


            <div class="col-lg-4 col-md-6">

                <div class="surplus-step">

                    <div class="surplus-step-number">
                        02
                    </div>

                    <h3>Submit Request</h3>

                    <p>
                        Select the food and submit your
                        required quantity.
                    </p>

                </div>

            </div>


            <div class="col-lg-4 col-md-6">

                <div class="surplus-step">

                    <div class="surplus-step-number">
                        03
                    </div>

                    <h3>Complete Purchase</h3>

                    <p>
                        After the request is accepted,
                        proceed with the purchase process.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     ABOUT SURPLUS
     ========================================================= -->

<section class="surplus-about">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6">

                <div class="surplus-about-image">

                    <img
                        src="{{ asset('Buyer/assets/img/a.jpg') }}"
                        alt="About Surplus">

                </div>

            </div>


            <div class="col-lg-6">

                <div class="surplus-about-content">

                    <span class="small-title">
                        About Surplus
                    </span>

                    <h2>
                        Connecting Food
                        <span>With People.</span>
                    </h2>

                    <p>
                        Surplus is a surplus food management
                        platform designed to connect donors
                        and buyers.
                    </p>

                    <p>
                        Buyers can browse available food,
                        submit purchase requests and purchase
                        suitable surplus food through the platform.
                    </p>

                    <a
                        href="{{ route('buyer.foods') }}"
                        class="surplus-btn surplus-btn-primary">

                        Browse Food
                        <i class="fas fa-arrow-right"></i>

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     GREEN BANNER
     ========================================================= -->

<section class="surplus-banner">

    <div class="container">

        <h2>
            Give Surplus Food A Second Chance
        </h2>

        <p>
            Discover available food, make meaningful purchases
            and help reduce unnecessary food waste.
        </p>

        <a
            href="{{ route('buyer.foods') }}"
            class="surplus-banner-btn">

            Start Exploring
            <i class="fas fa-arrow-right"></i>

        </a>

    </div>

</section>


<!-- =========================================================
     SURPLUS UPDATES
     ========================================================= -->

<section class="surplus-updates">

    <div class="container">

        <div class="surplus-section-title">

            <span class="small-title">
                Learn More
            </span>

            <h2>
                <span>Surplus</span> Updates
            </h2>

            <p>
                Learn more about surplus food and responsible
                food purchasing.
            </p>

        </div>


        <div class="row g-4">

            <div class="col-lg-4 col-md-6">

                <div class="surplus-update-card">

                    <div class="surplus-update-image">

                        <img
                            src="{{ asset('Buyer/assets/img/products/product-img-1.jpg') }}"
                            alt="Reducing Food Waste">

                    </div>

                    <div class="surplus-update-content">

                        <div class="surplus-update-label">
                            <i class="fas fa-leaf"></i>
                            Food Waste
                        </div>

                        <h3>
                            Reducing Food Waste
                        </h3>

                        <p>
                            Surplus food can still be useful when
                            it reaches buyers through the platform.
                        </p>

                        <a
                            href="{{ route('buyer.foods') }}"
                            class="surplus-read-more">

                            Explore Food
                            <i class="fas fa-arrow-right"></i>

                        </a>

                    </div>

                </div>

            </div>


            <div class="col-lg-4 col-md-6">

                <div class="surplus-update-card">

                    <div class="surplus-update-image">

                        <img
                            src="{{ asset('Buyer/assets/img/products/product-img-2.jpg') }}"
                            alt="Affordable Food">

                    </div>

                    <div class="surplus-update-content">

                        <div class="surplus-update-label">
                            <i class="fas fa-tags"></i>
                            Affordable Food
                        </div>

                        <h3>
                            Quality At Better Prices
                        </h3>

                        <p>
                            Discover available surplus food offered
                            at affordable prices.
                        </p>

                        <a
                            href="{{ route('buyer.foods') }}"
                            class="surplus-read-more">

                            View Food
                            <i class="fas fa-arrow-right"></i>

                        </a>

                    </div>

                </div>

            </div>


            <div class="col-lg-4 col-md-6">

                <div class="surplus-update-card">

                    <div class="surplus-update-image">

                        <img
                            src="{{ asset('Buyer/assets/img/products/product-img-3.jpg') }}"
                            alt="Sustainable Food">

                    </div>

                    <div class="surplus-update-content">

                        <div class="surplus-update-label">
                            <i class="fas fa-recycle"></i>
                            Sustainability
                        </div>

                        <h3>
                            Make Every Purchase Count
                        </h3>

                        <p>
                            Choosing surplus food can help make
                            better use of available food.
                        </p>

                        <a
                            href="{{ route('buyer.foods') }}"
                            class="surplus-read-more">

                            Start Exploring
                            <i class="fas fa-arrow-right"></i>

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


</div>

@endsection