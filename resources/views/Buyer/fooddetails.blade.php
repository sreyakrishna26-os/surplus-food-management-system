@extends('layouts.Buyermaster')

@section('content')

<style>

    /* =========================================================
       SURPLUS FOOD DETAILS PAGE
    ========================================================= */

    .food-details-page {
        background: #f7fbf4;
        min-height: 100vh;
        padding: 45px 20px 70px;
    }

    .food-details-container {
        max-width: 1150px;
        margin: 0 auto;
    }


    /* =========================================================
       BACK BUTTON
    ========================================================= */

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;

        margin-bottom: 20px;

        color: #555;
        text-decoration: none;

        font-size: 14px;
        font-weight: 600;

        transition: 0.2s ease;
    }

    .back-link:hover {
        color: #39a900;
        text-decoration: none;
    }


    /* =========================================================
       MAIN CARD
    ========================================================= */

    .food-details-card {
        background: #ffffff;

        border-radius: 18px;

        overflow: hidden;

        border: 1px solid #e7eee3;

        box-shadow: 0 7px 25px rgba(0,0,0,0.07);

        display: grid;

        grid-template-columns: 1fr 1fr;
    }


    /* =========================================================
       IMAGE
    ========================================================= */

    .food-image-section {
        position: relative;

        background: #eef5e9;

        min-height: 570px;

        overflow: hidden;
    }

    .food-details-image {
        width: 100%;
        height: 100%;
        min-height: 570px;

        object-fit: cover;

        display: block;
    }

    .image-placeholder {
        min-height: 570px;

        background: #eef5e9;

        display: flex;
        align-items: center;
        justify-content: center;

        color: #999;

        font-size: 14px;
    }


    /* =========================================================
       IMAGE BADGE
    ========================================================= */

    .food-image-badge {
        position: absolute;

        top: 20px;
        left: 20px;

        background: #ffffff;

        color: #39a900;

        padding: 8px 13px;

        border-radius: 20px;

        font-size: 12px;

        font-weight: 700;

        box-shadow: 0 4px 12px rgba(0,0,0,0.12);
    }


    /* =========================================================
       CONTENT
    ========================================================= */

    .food-details-content {
        padding: 40px;
    }


    .food-details-content h1 {
        margin: 0 0 7px;

        font-size: 32px;

        color: #222;

        font-weight: 700;
    }


    .food-type {
        color: #777;

        font-size: 14px;

        margin-bottom: 25px;
    }


    /* =========================================================
       PRICE
    ========================================================= */

    .price-box {
        display: flex;
        align-items: center;
        gap: 10px;

        margin-bottom: 25px;
    }

    .old-price {
        color: #999;

        text-decoration: line-through;

        font-size: 15px;
    }

    .offer-price {
        color: #39a900;

        font-size: 29px;

        font-weight: 750;
    }


    /* =========================================================
       FOOD INFORMATION
    ========================================================= */

    .food-info {
        border-top: 1px solid #e8eee5;

        border-bottom: 1px solid #e8eee5;

        padding: 20px 0;

        margin-bottom: 25px;
    }

    .info-row {
        display: flex;

        justify-content: space-between;

        gap: 20px;

        margin-bottom: 14px;

        font-size: 13px;
    }

    .info-row:last-child {
        margin-bottom: 0;
    }

    .info-label {
        color: #888;
    }

    .info-value {
        color: #333;

        font-weight: 650;

        text-align: right;
    }


    /* =========================================================
       QUANTITY
    ========================================================= */

    .quantity-section {
        margin-top: 20px;
    }

    .quantity-title {
        color: #222;

        font-size: 15px;

        font-weight: 700;

        margin-bottom: 12px;
    }

    .quantity-bar {
        width: 100%;

        height: 6px;

        accent-color: #39a900;

        cursor: pointer;
    }

    .quantity-display {
        margin-top: 12px;

        text-align: center;

        color: #555;

        font-size: 14px;
    }

    .quantity-display span {
        color: #39a900;

        font-size: 19px;

        font-weight: 700;
    }


    /* =========================================================
       TOTAL
    ========================================================= */

    .total-box {
        background: #f7fbf4;

        border: 1px solid #e3eddc;

        border-radius: 10px;

        padding: 17px 18px;

        margin-top: 25px;

        display: flex;

        justify-content: space-between;

        align-items: center;
    }

    .total-label {
        color: #555;

        font-size: 14px;

        font-weight: 600;
    }

    .total-price {
        color: #39a900;

        font-size: 24px;

        font-weight: 750;
    }


    /* =========================================================
       REQUEST BUTTON
    ========================================================= */

    .request-btn {
        width: 100%;

        height: 52px;

        margin-top: 20px;

        border: none;

        border-radius: 8px;

        background: #39a900;

        color: white;

        font-size: 14px;

        font-weight: 700;

        cursor: pointer;

        transition: 0.2s ease;
    }

    .request-btn:hover {
        background: #2e8500;

        transform: translateY(-1px);
    }


    /* =========================================================
       SMALL INFORMATION
    ========================================================= */

    .request-note {
        text-align: center;

        margin-top: 10px;

        color: #999;

        font-size: 11px;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 850px) {

        .food-details-card {
            grid-template-columns: 1fr;
        }

        .food-image-section {
            min-height: 400px;
        }

        .food-details-image {
            min-height: 400px;
            height: 400px;
        }

        .image-placeholder {
            min-height: 400px;
        }

    }


    @media (max-width: 600px) {

        .food-details-page {
            padding: 25px 12px 50px;
        }

        .food-details-content {
            padding: 25px 20px;
        }

        .food-details-content h1 {
            font-size: 26px;
        }

        .food-image-section {
            min-height: 300px;
        }

        .food-details-image {
            min-height: 300px;
            height: 300px;
        }

        .image-placeholder {
            min-height: 300px;
        }

        .info-row {
            font-size: 12px;
        }

    }

</style>


<div class="food-details-page">

    <div class="food-details-container">


        {{-- BACK TO FOODS --}}

        <a
            href="{{ route('buyer.foods') }}"
            class="back-link"
        >

            ← Back to Available Foods

        </a>


        {{-- =====================================================
             MAIN FOOD CARD
        ====================================================== --}}

        <div class="food-details-card">


            {{-- =================================================
                 FOOD IMAGE
            ================================================== --}}

            <div class="food-image-section">


                @if($food->food_image)

                    <img
                        src="{{ asset('food_images/' . $food->food_image) }}"
                        alt="{{ $food->food_name }}"
                        class="food-details-image"
                    >

                @else

                    <div class="image-placeholder">

                        No Image Available

                    </div>

                @endif


                <div class="food-image-badge">

                    Available Food

                </div>


            </div>


            {{-- =================================================
                 FOOD DETAILS
            ================================================== --}}

            <div class="food-details-content">


                {{-- FOOD NAME --}}

                <h1>

                    {{ $food->food_name }}

                </h1>


                {{-- FOOD TYPE --}}

                <div class="food-type">

                    {{ $food->food_type }}

                </div>


                {{-- =================================================
                     PRICE
                ================================================== --}}

                <div class="price-box">

                    <span class="old-price">

                        ₹{{ number_format($food->food_price, 2) }}

                    </span>

                    <span class="offer-price">

                        ₹{{ number_format($food->food_offerprice, 2) }}

                    </span>

                </div>


                {{-- =================================================
                     FOOD INFORMATION
                ================================================== --}}

                <div class="food-info">


                    {{-- DONOR --}}

                    <div class="info-row">

                        <span class="info-label">
                            Donor
                        </span>

                        <span class="info-value">

                            {{ $food->donor->donor_name ?? 'N/A' }}

                        </span>

                    </div>


                    {{-- LOCATION --}}

                    <div class="info-row">

                        <span class="info-label">
                            Location
                        </span>

                        <span class="info-value">

                            {{ $food->donor->location->location_name ?? 'N/A' }}

                        </span>

                    </div>


                    {{-- CATEGORY --}}

                    <div class="info-row">

                        <span class="info-label">
                            Category
                        </span>

                        <span class="info-value">

                            {{ $food->subcategory->category->cname ?? 'N/A' }}

                        </span>

                    </div>


                    {{-- AVAILABLE QUANTITY --}}

                    <div class="info-row">

                        <span class="info-label">
                            Available Quantity
                        </span>

                        <span class="info-value">

                            {{ $food->food_quantity }}

                        </span>

                    </div>


                    {{-- EXPIRY DATE --}}

                    <div class="info-row">

                        <span class="info-label">
                            Expiry Date
                        </span>

                        <span class="info-value">

                            {{ \Carbon\Carbon::parse($food->food_expiry_date)->format('d M Y') }}

                        </span>

                    </div>


                </div>


                {{-- =================================================
                     QUANTITY
                ================================================== --}}

                <div class="quantity-section">


                    <div class="quantity-title">

                        Select Quantity

                    </div>


                    <input
                        type="range"
                        id="quantity"
                        class="quantity-bar"
                        min="1"
                        max="{{ $food->food_quantity }}"
                        value="1"
                    >


                    <div class="quantity-display">

                        Quantity:

                        <span id="quantityValue">
                            1
                        </span>

                    </div>


                </div>


                {{-- =================================================
                     TOTAL
                ================================================== --}}

                <div class="total-box">

                    <span class="total-label">

                        Total Amount

                    </span>


                    <span class="total-price">

                        ₹<span id="totalPrice">
                            {{ number_format($food->food_offerprice, 2) }}
                        </span>

                    </span>

                </div>


                {{-- =================================================
                     REQUEST FORM
                ================================================== --}}

                <form
                    method="POST"
                    action="{{ route('buyer.food.request', $food->food_id) }}"
                >

                    @csrf


                    <input
                        type="hidden"
                        name="request_quantity"
                        id="selectedQuantity"
                        value="1"
                    >


                    <button
                        type="submit"
                        class="request-btn"
                    >

                        Request to Donor

                    </button>


                </form>


                <div class="request-note">

                    Your request will be sent to the donor for confirmation.

                </div>


            </div>

        </div>

    </div>

</div>


<script>

    const quantityBar = document.getElementById('quantity');

    const quantityValue = document.getElementById('quantityValue');

    const totalPrice = document.getElementById('totalPrice');

    const selectedQuantity = document.getElementById('selectedQuantity');

    const offerPrice = {{ $food->food_offerprice }};


    quantityBar.addEventListener('input', function () {

        let quantity = parseInt(this.value);

        quantityValue.innerText = quantity;

        selectedQuantity.value = quantity;

        let total = offerPrice * quantity;

        totalPrice.innerText = total.toFixed(2);

    });

</script>

@endsection