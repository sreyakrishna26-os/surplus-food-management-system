@extends('layouts.Adminmaster')

@section('content')

<style>

    /* ================= DISTRICT LIST PAGE ================= */

    .district-page {
        padding-bottom: 40px;
    }


    /* ================= HERO HEADER ================= */

    .district-hero {
        position: relative;
        overflow: hidden;
        padding: 30px 35px;
        border-radius: 22px;
        background: linear-gradient(135deg, #087f5b, #20a36a, #43b97f);
        box-shadow: 0 10px 30px rgba(0, 100, 70, 0.18);
        color: white;
        margin-bottom: 25px;
    }

    .district-hero::before {
        content: "";
        position: absolute;
        width: 190px;
        height: 190px;
        border-radius: 50%;
        background: rgba(255,255,255,0.08);
        right: 100px;
        top: -100px;
    }

    .district-hero::after {
        content: "";
        position: absolute;
        width: 130px;
        height: 130px;
        border-radius: 50%;
        background: rgba(255,255,255,0.07);
        right: -30px;
        bottom: -65px;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        display: flex;
        align-items: center;
        justify-content: space-between;
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
        font-size: 32px;
        font-weight: 800;
        letter-spacing: -0.5px;
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
        display: flex;
        align-items: center;
        gap: 18px;
        font-size: 25px;
        opacity: 0.18;
        margin-right: 15px;
    }

    .hero-decoration i:nth-child(2) {
        font-size: 34px;
    }

    .hero-decoration i:nth-child(3) {
        font-size: 29px;
    }


    /* ================= ADD BUTTON ================= */

    .add-district-btn {
        position: relative;
        z-index: 3;
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 10px 18px;
        border-radius: 10px;
        background: white;
        color: #16834f;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        transition: 0.2s;
    }

    .add-district-btn:hover {
        background: #f1fff7;
        color: #126b41;
        transform: translateY(-2px);
    }


    /* ================= SUCCESS ALERT ================= */

    .custom-alert {
        border: none;
        border-radius: 12px;
        padding: 13px 17px;
        margin-bottom: 22px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    }


    /* ================= LIST CARD ================= */

    .district-card {
        background: #ffffff;
        border: 1px solid #edf2ef;
        border-radius: 20px;
        box-shadow: 0 7px 28px rgba(0,0,0,0.07);
        overflow: hidden;
    }

    .district-card-header {
        padding: 20px 25px;
        background: #f4faf7;
        border-bottom: 1px solid #e5eee9;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .district-card-title {
        margin: 0;
        color: #176b4b;
        font-size: 18px;
        font-weight: 750;
    }

    .district-card-title i {
        margin-right: 8px;
    }

    .district-count {
        background: #e7f7ef;
        color: #16824f;
        border-radius: 20px;
        padding: 6px 13px;
        font-size: 12px;
        font-weight: 700;
    }


    /* ================= TABLE ================= */

    .district-table-wrapper {
        overflow-x: auto;
    }

    .district-table {
        width: 100%;
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
    }

    .district-table thead th {
        background: #ffffff;
        color: #47705d;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 15px 20px;
        border-bottom: 1px solid #e5eee9;
        white-space: nowrap;
    }

    .district-table tbody td {
        padding: 16px 20px;
        vertical-align: middle;
        border-bottom: 1px solid #edf2ef;
        color: #555;
        font-size: 14px;
    }

    .district-table tbody tr {
        transition: 0.2s;
    }

    .district-table tbody tr:hover {
        background: #f8fcfa;
    }

    .district-table tbody tr:last-child td {
        border-bottom: none;
    }


    /* ================= ID BADGE ================= */

    .district-id {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 38px;
        height: 30px;
        padding: 0 9px;
        border-radius: 8px;
        background: #eaf7f0;
        color: #16834f;
        font-size: 12px;
        font-weight: 700;
    }


    /* ================= DISTRICT NAME ================= */

    .district-name {
        color: #176b4b;
        font-weight: 700;
    }

    .district-name i {
        color: #20a36a;
        margin-right: 8px;
    }


    /* ================= ACTION BUTTONS ================= */

    .action-buttons {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .btn-edit {
        border: none;
        border-radius: 8px;
        padding: 7px 13px;
        background: #fff3cd;
        color: #9a7100;
        font-size: 12px;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: 0.2s;
    }

    .btn-edit:hover {
        background: #ffe8a1;
        color: #795900;
        transform: translateY(-1px);
    }

    .btn-delete {
        border: none;
        border-radius: 8px;
        padding: 7px 13px;
        background: #fdeaea;
        color: #c83c3c;
        font-size: 12px;
        font-weight: 700;
        transition: 0.2s;
    }

    .btn-delete:hover {
        background: #f8d7da;
        color: #a52834;
        transform: translateY(-1px);
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

        .district-hero {
            padding: 24px;
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

        .hero-content {
            gap: 15px;
        }

        .district-card-header {
            padding: 17px;
        }

        .district-table thead th,
        .district-table tbody td {
            padding: 12px 14px;
        }

        .action-buttons {
            flex-direction: row;
        }

    }

</style>


<div class="container-fluid district-page">


    <!-- =====================================================
         HERO HEADER
    ====================================================== -->

    <div class="district-hero">

        <div class="hero-content">

            <div>

                <div class="hero-tag">
                    <i class="fas fa-leaf"></i>
                    FOODLINK • LOCATION MANAGEMENT
                </div>

                <h1 class="hero-title">
                    District <span>List</span>
                </h1>

                <p class="hero-subtitle">
                    View and manage all registered districts in FoodLink
                </p>

            </div>


            <!-- Decorative Icons -->

            <div class="hero-decoration">

                <i class="fas fa-location-dot"></i>

                <i class="fas fa-map"></i>

                <i class="fas fa-compass"></i>

            </div>


            <!-- ADD DISTRICT -->

            <a
                href="{{ route('districtregister') }}"
                class="add-district-btn"
            >

                <i class="fas fa-plus"></i>

                Add District

            </a>

        </div>

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
         DISTRICT LIST CARD
    ====================================================== -->

    <div class="district-card">


        <!-- CARD HEADER -->

        <div class="district-card-header">

            <h4 class="district-card-title">

                <i class="fas fa-list"></i>

                Registered Districts

            </h4>


            <span class="district-count">

                {{ $districts->count() }} Districts

            </span>

        </div>


        <!-- TABLE -->

        <div class="district-table-wrapper">

            <table class="district-table">

                <thead>

                    <tr>

                        <th>
                            ID
                        </th>

                        <th>
                            District Name
                        </th>

                        <th width="200">
                            Action
                        </th>

                    </tr>

                </thead>


                <tbody>


                    @forelse($districts as $district)

                        <tr>


                            <!-- ID -->

                            <td>

                                <span class="district-id">

                                    #{{ $district->district_id }}

                                </span>

                            </td>


                            <!-- DISTRICT NAME -->

                            <td>

                                <span class="district-name">

                                    <i class="fas fa-location-dot"></i>

                                    {{ $district->district_name }}

                                </span>

                            </td>


                            <!-- ACTION -->

                            <td>

                                <div class="action-buttons">


                                    <!-- EDIT -->

                                    <a
                                        href="{{ route('district_edit', $district->district_id) }}"
                                        class="btn-edit"
                                    >

                                        <i class="fas fa-pen"></i>

                                        Edit

                                    </a>


                                    <!-- DELETE -->

                                    <form
                                        action="{{ route('district_delete', $district->district_id) }}"
                                        method="POST"
                                        class="mb-0"
                                    >

                                        @csrf

                                        @method('DELETE')


                                        <button
                                            type="submit"
                                            class="btn-delete"
                                            onclick="return confirm('Are you sure you want to delete this district?')"
                                        >

                                            <i class="fas fa-trash"></i>

                                            Delete

                                        </button>

                                    </form>


                                </div>

                            </td>


                        </tr>


                    @empty


                        <!-- EMPTY STATE -->

                        <tr>

                            <td
                                colspan="3"
                                class="empty-state"
                            >

                                <i class="fas fa-map-location-dot d-block"></i>

                                <h5>
                                    No Districts Found
                                </h5>

                                <p>
                                    There are no districts registered yet.
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