@extends('layouts.Buyermaster')

@section('content')

<style>

/* =========================================================
   SURPLUS AVAILABLE FOODS PAGE
========================================================= */

.foods-page {
    background: #f7fbf4;
    min-height: 100vh;
    padding-bottom: 80px;
    color: #26352b;
}

/* =========================================================
   NOTIFICATIONS
========================================================= */

.message-box {
    position: fixed;
    top: 90px;
    right: 25px;
    z-index: 9999;
    min-width: 320px;
    max-width: 430px;
    padding: 15px 20px;
    border-radius: 12px;
    font-size: 14px;
    font-weight: 600;
    box-shadow: 0 10px 30px rgba(0,0,0,0.14);
    animation: slideIn 0.4s ease;
}

.success-message {
    background: #e7f6ed;
    color: #176b3a;
    border: 1px solid #c8ead5;
}

.error-message {
    background: #fdeaea;
    color: #a32929;
    border: 1px solid #f4caca;
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateX(35px);
    }

    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.message-hide {
    animation: fadeOut 0.5s ease forwards;
}

@keyframes fadeOut {
    from {
        opacity: 1;
        transform: translateX(0);
    }

    to {
        opacity: 0;
        transform: translateX(35px);
    }
}

/* =========================================================
   HERO
========================================================= */

.foods-hero {
    position: relative;
    overflow: hidden;
    background:
        linear-gradient(
            135deg,
            #143d27 0%,
            #1d6039 55%,
            #31834d 100%
        );
    padding: 68px 20px 82px;
    color: white;
}

.foods-hero::before {
    content: "";
    position: absolute;
    width: 380px;
    height: 380px;
    border-radius: 50%;
    background: rgba(255,255,255,0.045);
    top: -210px;
    left: -100px;
}

.foods-hero::after {
    content: "";
    position: absolute;
    width: 420px;
    height: 420px;
    border-radius: 50%;
    background: rgba(255,255,255,0.035);
    bottom: -280px;
    right: -120px;
}

.hero-content {
    max-width: 900px;
    margin: auto;
    text-align: center;
    position: relative;
    z-index: 2;
}

.hero-icon {
    width: 65px;
    height: 65px;
    margin: 0 auto 20px;
    border-radius: 50%;
    background: rgba(255,255,255,0.12);
    border: 1px solid rgba(255,255,255,0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 27px;
}

.hero-tag {
    display: inline-block;
    padding: 7px 17px;
    border-radius: 30px;
    background: rgba(255,255,255,0.12);
    border: 1px solid rgba(255,255,255,0.2);
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1px;
    margin-bottom: 18px;
}

.foods-hero h1 {
    margin: 0 0 13px;
    font-size: 42px;
    line-height: 1.2;
    font-weight: 800;
}

.foods-hero p {
    max-width: 650px;
    margin: auto;
    color: rgba(255,255,255,0.84);
    font-size: 16px;
    line-height: 1.7;
}

/* =========================================================
   FILTER
========================================================= */

.filter-section {
    max-width: 1180px;
    margin: -30px auto 42px;
    padding: 0 20px;
    position: relative;
    z-index: 10;
}

.filter-card {
    background: white;
    border: 1px solid #e6eee6;
    border-radius: 16px;
    padding: 22px;
    box-shadow: 0 12px 35px rgba(27, 65, 39, 0.09);
}

.filter-heading {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 17px;
}

.filter-heading-icon {
    width: 34px;
    height: 34px;
    border-radius: 9px;
    background: #e5f4e9;
    color: #1d6039;
    display: flex;
    align-items: center;
    justify-content: center;
}

.filter-title {
    color: #20372a;
    font-size: 14px;
    font-weight: 750;
    margin: 0;
}

.filter-subtitle {
    color: #89938d;
    font-size: 11px;
    margin: 2px 0 0;
}

.filter-container {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr auto auto;
    gap: 12px;
    align-items: center;
}

.filter-container select {
    height: 46px;
    width: 100%;
    border: 1px solid #dfe7e0;
    border-radius: 9px;
    padding: 0 35px 0 13px;
    background: #fbfdfb;
    color: #435148;
    font-size: 13px;
    outline: none;
    cursor: pointer;
    transition: 0.2s ease;
}

.filter-container select:focus {
    border-color: #39a900;
    background: white;
    box-shadow: 0 0 0 3px rgba(57,169,0,0.08);
}

.apply-btn,
.reset-btn {
    height: 46px;
    padding: 0 20px;
    border-radius: 9px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
    white-space: nowrap;
    transition: 0.25s ease;
}

.apply-btn {
    border: none;
    background: #39a900;
    color: white;
}

.apply-btn:hover {
    background: #2e8500;
    color: white;
    transform: translateY(-1px);
}

.reset-btn {
    background: #f0f3f0;
    color: #46554b;
}

.reset-btn:hover {
    background: #e2e9e3;
    color: #26382c;
}

/* =========================================================
   FOOD CONTAINER
========================================================= */

.foods-container {
    max-width: 1180px;
    margin: auto;
    padding: 0 20px;
}

/* =========================================================
   HEADING
========================================================= */

.foods-heading {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    margin-bottom: 25px;
}

.heading-left h2 {
    margin: 0;
    color: #1f3527;
    font-size: 27px;
    font-weight: 800;
}

.heading-left p {
    margin: 6px 0 0;
    color: #7c8980;
    font-size: 13px;
}

.food-count {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 9px 15px;
    border-radius: 30px;
    background: #e5f4e9;
    color: #21683b;
    font-size: 12px;
    font-weight: 700;
}

/* =========================================================
   FOOD GRID
========================================================= */

.food-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
}

/* =========================================================
   FOOD CARD
========================================================= */

.food-card {
    background: white;
    border-radius: 17px;
    overflow: hidden;
    border: 1px solid #e6eee7;
    box-shadow: 0 6px 22px rgba(24,55,35,0.07);
    transition: all 0.3s ease;
    position: relative;
}

.food-card:hover {
    transform: translateY(-7px);
    box-shadow: 0 18px 38px rgba(24,55,35,0.13);
}

/* =========================================================
   FOOD IMAGE
========================================================= */

.food-image-wrapper {
    height: 225px;
    position: relative;
    overflow: hidden;
    background: #edf3ee;
}

.food-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.45s ease;
}

.food-card:hover .food-image {
    transform: scale(1.06);
}

.food-image-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    gap: 8px;
    color: #89958d;
    background: #edf3ee;
    font-size: 13px;
}

.placeholder-icon {
    font-size: 30px;
}

/* =========================================================
   IMAGE BADGES
========================================================= */

.available-badge {
    position: absolute;
    top: 13px;
    right: 13px;
    padding: 7px 12px;
    border-radius: 20px;
    background: #e3f5e8;
    color: #176638;
    font-size: 10px;
    font-weight: 800;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.available-dot {
    display: inline-block;
    width: 6px;
    height: 6px;
    margin-right: 5px;
    border-radius: 50%;
    background: #39a900;
}

.discount-badge {
    position: absolute;
    top: 13px;
    left: 13px;
    padding: 7px 11px;
    border-radius: 20px;
    background: #f7b733;
    color: #3e2b00;
    font-size: 10px;
    font-weight: 800;
}

/* =========================================================
   CONTENT
========================================================= */

.food-content {
    padding: 20px;
}

.food-title-row {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 10px;
}

.food-name {
    margin: 0;
    color: #20372a;
    font-size: 20px;
    line-height: 1.25;
    font-weight: 800;
}

.food-type {
    display: inline-block;
    margin-top: 8px;
    padding: 5px 9px;
    border-radius: 5px;
    background: #f2f5f3;
    color: #718078;
    font-size: 11px;
    font-weight: 600;
}

/* =========================================================
   FOOD INFORMATION
========================================================= */

.food-info {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 9px;
    margin-top: 18px;
}

.info-item {
    min-width: 0;
    padding: 10px 11px;
    border-radius: 9px;
    background: #f7f9f7;
    border: 1px solid #f0f3f0;
}

.info-label {
    display: block;
    margin-bottom: 4px;
    color: #89948c;
    font-size: 9px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.info-value {
    display: block;
    color: #304238;
    font-size: 12px;
    font-weight: 700;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* =========================================================
   PRICE
========================================================= */

.price-section {
    margin-top: 18px;
    padding-top: 16px;
    border-top: 1px solid #edf0ed;
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
}

.price-left {
    display: flex;
    align-items: baseline;
    gap: 9px;
}

.offer-price {
    color: #168348;
    font-size: 24px;
    font-weight: 850;
}

.old-price {
    color: #9ba29d;
    text-decoration: line-through;
    font-size: 12px;
}

.price-label {
    display: block;
    color: #8a938d;
    font-size: 9px;
    margin-bottom: 2px;
    text-transform: uppercase;
    letter-spacing: 0.4px;
}

/* =========================================================
   QUANTITY / EXPIRY
========================================================= */

.food-meta {
    margin-top: 10px;
    display: flex;
    justify-content: space-between;
    gap: 10px;
}

.meta-item {
    color: #7e8982;
    font-size: 11px;
}

.meta-item strong {
    color: #405148;
}

/* =========================================================
   ORDER BUTTON
========================================================= */

.order-btn {
    width: 100%;
    height: 47px;
    margin-top: 18px;
    border: none;
    border-radius: 9px;
    background: #39a900;
    color: white;
    font-size: 13px;
    font-weight: 750;
    cursor: pointer;
    transition: all 0.25s ease;
}

.order-btn:hover {
    background: #2e8500;
    transform: translateY(-2px);
    box-shadow: 0 7px 18px rgba(57,169,0,0.22);
}

.order-btn i {
    margin-left: 6px;
}

/* =========================================================
   EMPTY STATE
========================================================= */

.empty-foods {
    background: white;
    border: 1px solid #e7eee7;
    border-radius: 17px;
    text-align: center;
    padding: 75px 20px;
    box-shadow: 0 6px 22px rgba(0,0,0,0.04);
}

.empty-icon {
    width: 72px;
    height: 72px;
    margin: 0 auto 20px;
    border-radius: 50%;
    background: #e5f4e9;
    color: #1d6039;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 29px;
}

.empty-foods h3 {
    margin: 0 0 8px;
    color: #293b30;
    font-size: 21px;
    font-weight: 750;
}

.empty-foods p {
    margin: 0;
    color: #818b84;
    font-size: 13px;
}

/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 1050px) {

    .food-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .filter-container {
        grid-template-columns: 1fr 1fr;
    }

    .apply-btn,
    .reset-btn {
        width: 100%;
    }
}

@media (max-width: 700px) {

    .foods-hero {
        padding: 50px 18px 65px;
    }

    .foods-hero h1 {
        font-size: 30px;
    }

    .foods-hero p {
        font-size: 14px;
    }

    .hero-icon {
        width: 55px;
        height: 55px;
        font-size: 23px;
    }

    .filter-container {
        grid-template-columns: 1fr;
    }

    .food-grid {
        grid-template-columns: 1fr;
    }

    .foods-heading {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }

    .food-count {
        align-self: flex-start;
    }

    .message-box {
        left: 15px;
        right: 15px;
        top: 80px;
        min-width: auto;
    }
}

@media (max-width: 420px) {

    .foods-container {
        padding: 0 14px;
    }

    .filter-section {
        padding: 0 14px;
    }

    .food-image-wrapper {
        height: 205px;
    }

    .food-content {
        padding: 17px;
    }

    .foods-hero h1 {
        font-size: 26px;
    }
}

</style>


<div class="foods-page">


    {{-- =====================================================
         SUCCESS MESSAGE
    ====================================================== --}}

    @if(session('success'))

        <div id="notification" class="message-box success-message">

            <i class="fas fa-check-circle me-2"></i>

            {{ session('success') }}

        </div>

    @endif


    {{-- =====================================================
         ERROR MESSAGE
    ====================================================== --}}

    @if(session('error'))

        <div id="notification" class="message-box error-message">

            <i class="fas fa-exclamation-circle me-2"></i>

            {{ session('error') }}

        </div>

    @endif


    {{-- =====================================================
         HERO
    ====================================================== --}}

    <section class="foods-hero">

        <div class="hero-content">

            <div class="hero-icon">
                <i class="fas fa-utensils"></i>
            </div>

            <span class="hero-tag">
                SURPLUS FOOD MARKETPLACE
            </span>

            <h1>
                Discover Surplus Food Near You
            </h1>

            <p>
                Find quality surplus food from local donors at affordable prices
                while helping reduce unnecessary food waste.
            </p>

        </div>

    </section>


    {{-- =====================================================
         FILTER SECTION
    ====================================================== --}}

    <div class="filter-section">

        <div class="filter-card">

            <div class="filter-heading">

                <div class="filter-heading-icon">
                    <i class="fas fa-sliders-h"></i>
                </div>

                <div>

                    <p class="filter-title">
                        Find What You're Looking For
                    </p>

                    <p class="filter-subtitle">
                        Filter available foods by location, category or price.
                    </p>

                </div>

            </div>


            <form
                method="GET"
                action="{{ route('buyer.foods') }}"
            >

                <div class="filter-container">


                    {{-- LOCATION --}}

                    <select name="location_id">

                        <option value="">
                            All Locations
                        </option>

                        @foreach($locations as $location)

                            <option
                                value="{{ $location->location_id }}"
                                {{ request('location_id') == $location->location_id ? 'selected' : '' }}
                            >

                                {{ $location->location_name }}

                            </option>

                        @endforeach

                    </select>


                    {{-- CATEGORY --}}

                    <select name="cid">

                        <option value="">
                            All Categories
                        </option>

                        @foreach($categories as $category)

                            <option
                                value="{{ $category->cid }}"
                                {{ request('cid') == $category->cid ? 'selected' : '' }}
                            >

                                {{ $category->cname }}

                            </option>

                        @endforeach

                    </select>


                    {{-- SORT --}}

                    <select name="sort">

                        <option value="">
                            Sort By
                        </option>

                        <option
                            value="new"
                            {{ request('sort') == 'new' ? 'selected' : '' }}
                        >
                            Newly Registered
                        </option>

                        <option
                            value="old"
                            {{ request('sort') == 'old' ? 'selected' : '' }}
                        >
                            Old Registered
                        </option>

                        <option
                            value="low"
                            {{ request('sort') == 'low' ? 'selected' : '' }}
                        >
                            Price: Low to High
                        </option>

                        <option
                            value="high"
                            {{ request('sort') == 'high' ? 'selected' : '' }}
                        >
                            Price: High to Low
                        </option>

                    </select>


                    {{-- APPLY --}}

                    <button
                        type="submit"
                        class="apply-btn"
                    >

                        <i class="fas fa-filter"></i>

                        Apply

                    </button>


                    {{-- RESET --}}

                    <a
                        href="{{ route('buyer.foods') }}"
                        class="reset-btn"
                    >

                        <i class="fas fa-redo-alt"></i>

                        Reset

                    </a>

                </div>

            </form>

        </div>

    </div>


    {{-- =====================================================
         FOOD LIST
    ====================================================== --}}

    <div class="foods-container">


        @php

            $availableFoods = $foods->where('food_quantity', '>', 0);

        @endphp


        <div class="foods-heading">

            <div class="heading-left">

                <h2>
                    Available Foods
                </h2>

                <p>
                    Fresh surplus items currently available from our donors.
                </p>

            </div>


            <span class="food-count">

                <i class="fas fa-utensils"></i>

                {{ $availableFoods->count() }}

                {{ $availableFoods->count() == 1 ? 'Food' : 'Foods' }}

                Available

            </span>

        </div>


        @if($availableFoods->count() > 0)


            <div class="food-grid">


                @foreach($availableFoods as $food)


                    @php

                        $discount = 0;

                        if (
                            $food->food_price > 0 &&
                            $food->food_offerprice < $food->food_price
                        ) {
                            $discount = round(
                                (($food->food_price - $food->food_offerprice)
                                / $food->food_price) * 100
                            );
                        }

                    @endphp


                    <div class="food-card">


                        {{-- =================================================
                             IMAGE
                        ================================================== --}}

                        <div class="food-image-wrapper">


                            @if($food->food_image)

                                <img
                                    src="{{ asset('food_images/' . $food->food_image) }}"
                                    alt="{{ $food->food_name }}"
                                    class="food-image"
                                >

                            @else

                                <div class="food-image-placeholder">

                                    <span class="placeholder-icon">
                                        <i class="fas fa-utensils"></i>
                                    </span>

                                    No Image Available

                                </div>

                            @endif


                            {{-- AVAILABLE --}}

                            <span class="available-badge">

                                <span class="available-dot"></span>

                                Available

                            </span>


                            {{-- DISCOUNT --}}

                            @if($discount > 0)

                                <span class="discount-badge">

                                    {{ $discount }}% OFF

                                </span>

                            @endif


                        </div>


                        {{-- =================================================
                             CONTENT
                        ================================================== --}}

                        <div class="food-content">


                            <div class="food-title-row">

                                <div>

                                    <h3 class="food-name">
                                        {{ $food->food_name }}
                                    </h3>

                                    <span class="food-type">
                                        {{ $food->food_type }}
                                    </span>

                                </div>

                            </div>


                            {{-- =================================================
                                 INFORMATION
                            ================================================== --}}

                            <div class="food-info">


                                {{-- DONOR --}}

                                <div class="info-item">

                                    <span class="info-label">
                                        Donor
                                    </span>

                                    <span class="info-value">
                                        {{ $food->donor->donor_name ?? 'N/A' }}
                                    </span>

                                </div>


                                {{-- LOCATION --}}

                                <div class="info-item">

                                    <span class="info-label">
                                        Location
                                    </span>

                                    <span class="info-value">
                                        {{ $food->donor->location->location_name ?? 'N/A' }}
                                    </span>

                                </div>


                                {{-- CATEGORY --}}

                                <div class="info-item">

                                    <span class="info-label">
                                        Category
                                    </span>

                                    <span class="info-value">
                                        {{ $food->subcategory->category->cname ?? 'N/A' }}
                                    </span>

                                </div>


                                {{-- QUANTITY --}}

                                <div class="info-item">

                                    <span class="info-label">
                                        Quantity
                                    </span>

                                    <span class="info-value">

                                        {{ $food->food_quantity }}

                                    </span>

                                </div>


                            </div>


                            {{-- =================================================
                                 PRICE
                            ================================================== --}}

                            <div class="price-section">

                                <div>

                                    <span class="price-label">
                                        Offer Price
                                    </span>

                                    <div class="price-left">

                                        <span class="offer-price">

                                            ₹{{ number_format($food->food_offerprice, 2) }}

                                        </span>


                                        @if($food->food_price > $food->food_offerprice)

                                            <span class="old-price">

                                                ₹{{ number_format($food->food_price, 2) }}

                                            </span>

                                        @endif

                                    </div>

                                </div>

                            </div>


                            {{-- =================================================
                                 META
                            ================================================== --}}

                            <div class="food-meta">


                                <div class="meta-item">

                                    <i class="fas fa-box-open me-1"></i>

                                    <strong>
                                        {{ $food->food_quantity }}
                                    </strong>

                                    available

                                </div>


                                <div class="meta-item">

                                    <i class="far fa-calendar-alt me-1"></i>

                                    Expires

                                    <strong>

                                        {{ \Carbon\Carbon::parse($food->food_expiry_date)->format('d M Y') }}

                                    </strong>

                                </div>


                            </div>


                            {{-- =================================================
                                 ORDER BUTTON
                            ================================================== --}}

                            <button
                                type="button"
                                class="order-btn"
                                onclick="window.location.href='{{ route('buyer.food.details', $food->food_id) }}'"
                            >

                                View Food & Order

                                <i class="fas fa-arrow-right"></i>

                            </button>


                        </div>

                    </div>


                @endforeach


            </div>


        @else


            {{-- =================================================
                 EMPTY STATE
            ================================================== --}}

            <div class="empty-foods">

                <div class="empty-icon">

                    <i class="fas fa-utensils"></i>

                </div>


                <h3>
                    No Foods Available
                </h3>


                <p>
                    There are currently no surplus food items available.
                    Please check again later.
                </p>

            </div>


        @endif


    </div>

</div>


<script>

/* =========================================================
   AUTO HIDE NOTIFICATION
========================================================= */

setTimeout(function () {

    const notification =
        document.getElementById('notification');

    if (notification) {

        notification.classList.add('message-hide');

        setTimeout(function () {

            notification.remove();

        }, 500);

    }

}, 3000);

</script>


@endsection