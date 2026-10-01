@extends('layouts.Adminmaster')

@section('content')

<style>
    /* =========================================================
       REGISTERED FOODS PAGE
    ========================================================= */

    .foods-page {
        padding-bottom: 40px;
    }

    /* ================= HERO HEADER ================= */

    .foods-hero {
        position: relative;
        overflow: hidden;
        padding: 30px 35px;
        border-radius: 22px;
        background: linear-gradient(135deg, #087f5b, #20a36a, #43b97f);
        box-shadow: 0 10px 30px rgba(0, 100, 70, 0.18);
        color: white;
    }

    .foods-hero::before {
        content: "";
        position: absolute;
        width: 190px;
        height: 190px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.08);
        right: 90px;
        top: -100px;
    }

    .foods-hero::after {
        content: "";
        position: absolute;
        width: 130px;
        height: 130px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.07);
        right: -30px;
        bottom: -65px;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .hero-icon {
        width: 70px;
        height: 70px;
        flex-shrink: 0;
        border-radius: 20px;
        background: rgba(255, 255, 255, 0.18);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        box-shadow:
            inset 0 0 0 1px rgba(255,255,255,0.15),
            0 8px 20px rgba(0,0,0,0.08);
    }

    .hero-tag {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 2px;
        margin-bottom: 5px;
        opacity: 0.92;
        text-transform: uppercase;
    }

    .hero-tag i {
        margin-right: 5px;
    }

    .hero-title {
        margin: 0;
        font-size: 34px;
        font-weight: 800;
        letter-spacing: -0.7px;
    }

    .hero-title span {
        color: #eafff3;
    }

    .hero-subtitle {
        margin: 6px 0 0;
        font-size: 14px;
        opacity: 0.92;
    }

    .hero-decoration {
        margin-left: auto;
        display: flex;
        align-items: center;
        gap: 16px;
        font-size: 25px;
        opacity: 0.18;
    }

    .hero-decoration i:nth-child(2) {
        font-size: 35px;
    }

    .hero-decoration i:nth-child(3) {
        font-size: 29px;
    }


    /* ================= FILTER CARD ================= */

    .filter-card {
        margin-top: 22px;
        background: #ffffff;
        border-radius: 18px;
        padding: 22px 25px;
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.07);
        border: 1px solid #edf2ef;
    }

    .filter-title {
        font-size: 16px;
        font-weight: 700;
        color: #176b4b;
        margin-bottom: 15px;
    }

    .filter-title i {
        margin-right: 7px;
    }

    .filter-label {
        font-size: 13px;
        font-weight: 600;
        color: #555;
        margin-bottom: 6px;
    }

    .filter-input {
        height: 44px;
        border-radius: 10px;
        border: 1px solid #dce6e1;
        padding: 8px 12px;
        width: 100%;
        outline: none;
        transition: 0.2s;
    }

    .filter-input:focus {
        border-color: #20a36a;
        box-shadow: 0 0 0 3px rgba(32, 163, 106, 0.10);
    }

    .btn-filter {
        height: 44px;
        border: none;
        border-radius: 10px;
        padding: 0 22px;
        background: #198754;
        color: white;
        font-weight: 600;
        transition: 0.2s;
    }

    .btn-filter:hover {
        background: #146c43;
        transform: translateY(-1px);
    }

    .btn-reset {
        height: 44px;
        border-radius: 10px;
        padding: 0 20px;
        border: 1px solid #d9e3de;
        background: #f7f9f8;
        color: #555;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .btn-reset:hover {
        background: #edf3ef;
        color: #333;
    }


    /* ================= ALERTS ================= */

    .custom-alert {
        margin-top: 20px;
        border: none;
        border-radius: 12px;
        padding: 13px 17px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    }


    /* ================= TABLE CARD ================= */

    .foods-table-card {
        margin-top: 22px;
        background: #ffffff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 7px 28px rgba(0, 0, 0, 0.07);
        border: 1px solid #edf2ef;
    }

    .table-card-header {
        padding: 20px 25px;
        border-bottom: 1px solid #edf1ef;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .table-card-title {
        margin: 0;
        color: #176b4b;
        font-size: 18px;
        font-weight: 750;
    }

    .table-card-title i {
        margin-right: 8px;
    }

    .food-count {
        background: #e7f7ef;
        color: #16824f;
        border-radius: 20px;
        padding: 6px 13px;
        font-size: 12px;
        font-weight: 700;
    }


    /* ================= TABLE ================= */

    .foods-table-wrapper {
        overflow-x: auto;
    }

    .foods-table {
        width: 100%;
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
    }

    .foods-table thead th {
        background: #f4faf7;
        color: #47705d;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        padding: 15px 12px;
        border-bottom: 1px solid #e5eee9;
        white-space: nowrap;
    }

    .foods-table tbody td {
        padding: 14px 12px;
        vertical-align: middle;
        border-bottom: 1px solid #edf2ef;
        color: #555;
        font-size: 13px;
        white-space: nowrap;
    }

    .foods-table tbody tr {
        transition: 0.2s;
    }

    .foods-table tbody tr:hover {
        background: #f9fcfa;
    }

    .foods-table tbody tr:last-child td {
        border-bottom: none;
    }


    /* ================= FOOD IMAGE ================= */

    .food-image {
        width: 72px;
        height: 55px;
        object-fit: cover;
        border-radius: 10px;
        border: 2px solid #e5eee9;
        padding: 2px;
        background: #fff;
    }


    /* ================= FOOD NAME ================= */

    .food-name {
        font-weight: 700;
        color: #176b4b;
    }

    .food-type {
        color: #777;
        font-size: 12px;
    }


    /* ================= PRICE ================= */

    .price {
        font-weight: 700;
        color: #555;
    }

    .offer-price {
        font-weight: 800;
        color: #198754;
    }


    /* ================= STATUS ================= */

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 6px 11px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
    }

    .status-active {
        background: #e7f8ef;
        color: #16834f;
    }

    .status-pending {
        background: #fff4d6;
        color: #a87500;
    }

    .status-rejected {
        background: #fdeaea;
        color: #c83c3c;
    }


    /* ================= ACTION BUTTONS ================= */

    .action-buttons {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
    }

    .btn-action {
        border: none;
        border-radius: 8px;
        padding: 7px 12px;
        font-size: 11px;
        font-weight: 700;
        color: white;
        transition: 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .btn-action:hover {
        transform: translateY(-1px);
    }

    .btn-accept {
        background: #198754;
    }

    .btn-accept:hover {
        background: #146c43;
    }

    .btn-reject {
        background: #dc3545;
    }

    .btn-reject:hover {
        background: #bb2d3b;
    }

    .approved-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        background: #e7f8ef;
        color: #16834f;
        border-radius: 8px;
        padding: 7px 12px;
        font-size: 11px;
        font-weight: 700;
    }

    .rejected-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        background: #fdeaea;
        color: #c83c3c;
        border-radius: 8px;
        padding: 7px 12px;
        font-size: 11px;
        font-weight: 700;
    }


    /* ================= EMPTY STATE ================= */

    .empty-state {
        padding: 55px 20px !important;
        text-align: center;
        color: #888;
    }

    .empty-state i {
        font-size: 42px;
        color: #b9d7c7;
        margin-bottom: 12px;
    }

    .empty-state h5 {
        color: #555;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .empty-state p {
        margin: 0;
        font-size: 13px;
    }


    /* ================= RESPONSIVE ================= */

    @media (max-width: 768px) {

        .foods-hero {
            padding: 24px;
        }

        .hero-content {
            align-items: flex-start;
        }

        .hero-icon {
            width: 56px;
            height: 56px;
            font-size: 23px;
            border-radius: 16px;
        }

        .hero-title {
            font-size: 26px;
        }

        .hero-subtitle {
            font-size: 13px;
        }

        .hero-decoration {
            display: none;
        }

        .filter-card {
            padding: 18px;
        }

        .table-card-header {
            padding: 17px;
        }
    }
</style>


<div class="container-fluid py-4 foods-page">

    <!-- =====================================================
         ATTRACTIVE HERO HEADER
    ====================================================== -->

    <div class="foods-hero mb-4">

        <div class="hero-content">

            <div class="hero-icon">
                <i class="fas fa-utensils"></i>
            </div>

            <div>

                <div class="hero-tag">
                    <i class="fas fa-leaf"></i>
                    SURPLUS FOOD • FOOD MANAGEMENT
                </div>

                <h1 class="hero-title">
                    Registered <span>Foods</span>
                </h1>

                <p class="hero-subtitle">
                    Explore, monitor and manage all food items registered by our donors
                </p>

            </div>

            <div class="hero-decoration">
                <i class="fas fa-carrot"></i>
                <i class="fas fa-apple-alt"></i>
                <i class="fas fa-seedling"></i>
            </div>

        </div>

    </div>


    <!-- =====================================================
         DATE FILTER
    ====================================================== -->

    <div class="filter-card">

        <div class="filter-title">
            <i class="fas fa-calendar-alt"></i>
            Filter Registered Foods
        </div>

        <form action="{{ route('admin.foods.filter') }}" method="GET">

            <div class="row align-items-end g-3">

                <div class="col-md-4">

                    <label class="filter-label">
                        From Date
                    </label>

                    <input
                        type="date"
                        name="from_date"
                        value="{{ request('from_date') }}"
                        class="filter-input"
                    >

                </div>


                <div class="col-md-4">

                    <label class="filter-label">
                        To Date
                    </label>

                    <input
                        type="date"
                        name="to_date"
                        value="{{ request('to_date') }}"
                        class="filter-input"
                    >

                </div>


                <div class="col-md-4">

                    <div class="d-flex gap-2">

                        <button type="submit" class="btn-filter">
                            <i class="fas fa-filter me-1"></i>
                            Filter
                        </button>

                        <a href="{{ route('admin.foods') }}" class="btn-reset">
                            <i class="fas fa-rotate-left me-1"></i>
                            Reset
                        </a>

                    </div>

                </div>

            </div>

        </form>

    </div>


    <!-- =====================================================
         SUCCESS MESSAGE
    ====================================================== -->

    @if(session('success'))

        <div class="alert alert-success custom-alert">
            <i class="fas fa-circle-check me-2"></i>
            {{ session('success') }}
        </div>

    @endif


    <!-- =====================================================
         ERROR MESSAGE
    ====================================================== -->

    @if(session('error'))

        <div class="alert alert-danger custom-alert">
            <i class="fas fa-circle-exclamation me-2"></i>
            {{ session('error') }}
        </div>

    @endif


    <!-- =====================================================
         VALIDATION ERRORS
    ====================================================== -->

    @if($errors->any())

        <div class="alert alert-danger custom-alert">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <!-- =====================================================
         FOODS TABLE
    ====================================================== -->

    <div class="foods-table-card">

        <div class="table-card-header">

            <h4 class="table-card-title">
                <i class="fas fa-basket-shopping"></i>
                Food Inventory
            </h4>

            <span class="food-count">
                {{ $foods->count() }} Foods
            </span>

        </div>


        <div class="foods-table-wrapper">

            <table class="foods-table">

                <thead>

                    <tr>

                        <th>#</th>

                        <th>Image</th>

                        <th>Food Name</th>

                        <th>Type</th>

                        <th>Quantity</th>

                        <th>Price</th>

                        <th>Offer Price</th>

                        <th>Expiry Date</th>

                        <th>Registered Date</th>

                        <th>Status</th>

                        <th class="text-center">Action</th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($foods as $food)

                        <tr>

                            <!-- NUMBER -->

                            <td>
                                <strong>
                                    {{ $loop->iteration }}
                                </strong>
                            </td>


                            <!-- IMAGE -->

                            <td>

                                <img
                                    src="{{ asset('food_images/' . $food->food_image) }}"
                                    alt="{{ $food->food_name }}"
                                    class="food-image"
                                >

                            </td>


                            <!-- FOOD NAME -->

                            <td>

                                <div class="food-name">
                                    {{ $food->food_name }}
                                </div>

                            </td>


                            <!-- TYPE -->

                            <td>

                                <span class="food-type">
                                    {{ $food->food_type }}
                                </span>

                            </td>


                            <!-- QUANTITY -->

                            <td>

                                <strong>
                                    {{ $food->food_quantity }}
                                </strong>

                            </td>


                            <!-- PRICE -->

                            <td>

                                <span class="price">
                                    ₹{{ number_format($food->food_price, 2) }}
                                </span>

                            </td>


                            <!-- OFFER PRICE -->

                            <td>

                                <span class="offer-price">
                                    ₹{{ number_format($food->food_offerprice, 2) }}
                                </span>

                            </td>


                            <!-- EXPIRY -->

                            <td>

                                {{ \Carbon\Carbon::parse($food->food_expiry_date)->format('d M Y') }}

                            </td>


                            <!-- REGISTERED DATE -->

                            <td>

                                {{ \Carbon\Carbon::parse($food->food_regdate)->format('d M Y') }}

                            </td>


                            <!-- STATUS -->

                            <td>

                                @if($food->status == 'Active')

                                    <span class="status-badge status-active">
                                        <i class="fas fa-circle-check"></i>
                                        Active
                                    </span>

                                @elseif($food->status == 'Rejected')

                                    <span class="status-badge status-rejected">
                                        <i class="fas fa-circle-xmark"></i>
                                        Rejected
                                    </span>

                                @else

                                    <span class="status-badge status-pending">
                                        <i class="fas fa-clock"></i>
                                        Pending
                                    </span>

                                @endif

                            </td>


                            <!-- ACTION -->

                            <td>

                                @if($food->status == 'Pending')

                                    <div class="action-buttons">

                                        <!-- ACCEPT -->

                                        <form
                                            action="{{ route('admin.food.accept', $food->food_id) }}"
                                            method="POST"
                                        >

                                            @csrf
                                            @method('PUT')

                                            <button
                                                type="submit"
                                                class="btn-action btn-accept"
                                            >
                                                <i class="fas fa-check"></i>
                                                Accept
                                            </button>

                                        </form>


                                        <!-- REJECT -->

                                        <form
                                            action="{{ route('admin.food.reject', $food->food_id) }}"
                                            method="POST"
                                        >

                                            @csrf
                                            @method('PUT')

                                            <button
                                                type="submit"
                                                class="btn-action btn-reject"
                                            >
                                                <i class="fas fa-xmark"></i>
                                                Reject
                                            </button>

                                        </form>

                                    </div>


                                @elseif($food->status == 'Active')

                                    <span class="approved-badge">
                                        <i class="fas fa-check-circle"></i>
                                        Approved
                                    </span>


                                @elseif($food->status == 'Rejected')

                                    <span class="rejected-badge">
                                        <i class="fas fa-times-circle"></i>
                                        Rejected
                                    </span>

                                @endif

                            </td>

                        </tr>


                    @empty

                        <tr>

                            <td colspan="11" class="empty-state">

                                <i class="fas fa-box-open d-block"></i>

                                <h5>
                                    No Foods Found
                                </h5>

                                <p>
                                    No foods were found for the selected date.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection