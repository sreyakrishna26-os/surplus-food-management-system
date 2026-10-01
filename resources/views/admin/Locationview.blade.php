@extends('layouts.Adminmaster')

@section('content')

<style>

    /* =====================================================
       LOCATION LIST PAGE
    ===================================================== */

    .location-page {
        padding-bottom: 40px;
    }


    /* =====================================================
       HERO HEADER
    ===================================================== */

    .location-hero {
        position: relative;
        overflow: hidden;
        padding: 30px 35px;
        border-radius: 22px;
        background: linear-gradient(135deg, #087f5b, #20a36a, #43b97f);
        box-shadow: 0 10px 30px rgba(0, 100, 70, 0.18);
        color: white;
        margin-bottom: 25px;
    }

    .location-hero::before {
        content: "";
        position: absolute;
        width: 190px;
        height: 190px;
        border-radius: 50%;
        background: rgba(255,255,255,0.08);
        right: 100px;
        top: -100px;
    }

    .location-hero::after {
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
        gap: 20px;
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


    /* Decorative icons */

    .hero-decoration {
        display: flex;
        align-items: center;
        gap: 18px;
        font-size: 25px;
        opacity: 0.18;
        margin-left: auto;
    }

    .hero-decoration i:nth-child(2) {
        font-size: 34px;
    }

    .hero-decoration i:nth-child(3) {
        font-size: 29px;
    }


    /* =====================================================
       ADD LOCATION BUTTON
    ===================================================== */

    .add-location-btn {
        position: relative;
        z-index: 3;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        padding: 10px 18px;
        border-radius: 10px;
        background: white;
        color: #16834f;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
        white-space: nowrap;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        transition: 0.2s;
    }

    .add-location-btn:hover {
        background: #f1fff7;
        color: #126b41;
        transform: translateY(-2px);
    }


    /* =====================================================
       SUCCESS MESSAGE
    ===================================================== */

    .custom-alert {
        border: none;
        border-radius: 12px;
        padding: 13px 17px;
        margin-bottom: 22px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    }


    /* =====================================================
       MAIN CARD
    ===================================================== */

    .location-card {
        background: #ffffff;
        border: 1px solid #edf2ef;
        border-radius: 20px;
        box-shadow: 0 7px 28px rgba(0,0,0,0.07);
        overflow: hidden;
    }


    /* =====================================================
       CARD HEADER
    ===================================================== */

    .location-card-header {
        padding: 20px 25px;
        background: #f4faf7;
        border-bottom: 1px solid #e5eee9;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .location-card-title {
        margin: 0;
        color: #176b4b;
        font-size: 18px;
        font-weight: 750;
    }

    .location-card-title i {
        margin-right: 8px;
    }

    .location-count {
        background: #e7f7ef;
        color: #16824f;
        border-radius: 20px;
        padding: 6px 13px;
        font-size: 12px;
        font-weight: 700;
    }


    /* =====================================================
       DISTRICT FILTER
    ===================================================== */

    .filter-section {
        padding: 20px 25px;
        background: #ffffff;
        border-bottom: 1px solid #edf2ef;
    }

    .filter-label {
        display: block;
        margin-bottom: 8px;
        color: #365d4c;
        font-size: 13px;
        font-weight: 700;
    }

    .filter-label i {
        color: #198754;
        margin-right: 6px;
    }

    .district-filter {
        width: 100%;
        max-width: 420px;
        height: 45px;
        padding: 8px 14px;
        border: 1px solid #dce6e1;
        border-radius: 10px;
        color: #495057;
        font-size: 14px;
        background: #ffffff;
        cursor: pointer;
        transition: 0.2s;
    }

    .district-filter:focus {
        border-color: #20a36a;
        box-shadow: 0 0 0 3px rgba(32,163,106,0.10);
        outline: none;
    }


    /* =====================================================
       TABLE
    ===================================================== */

    .location-table-wrapper {
        overflow-x: auto;
    }

    .location-table {
        width: 100%;
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
    }

    .location-table thead th {
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

    .location-table tbody td {
        padding: 16px 20px;
        vertical-align: middle;
        border-bottom: 1px solid #edf2ef;
        color: #555;
        font-size: 14px;
    }

    .location-table tbody tr {
        transition: 0.2s;
    }

    .location-table tbody tr:hover {
        background: #f8fcfa;
    }

    .location-table tbody tr:last-child td {
        border-bottom: none;
    }


    /* =====================================================
       ID BADGE
    ===================================================== */

    .location-id {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 40px;
        height: 30px;
        padding: 0 9px;
        border-radius: 8px;
        background: #eaf7f0;
        color: #16834f;
        font-size: 12px;
        font-weight: 700;
    }


    /* =====================================================
       LOCATION NAME
    ===================================================== */

    .location-name {
        color: #176b4b;
        font-weight: 700;
    }

    .location-name i {
        color: #20a36a;
        margin-right: 8px;
    }


    /* =====================================================
       DISTRICT BADGE
    ===================================================== */

    .district-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 12px;
        border-radius: 20px;
        background: #f0f7f3;
        color: #47705d;
        font-size: 12px;
        font-weight: 600;
    }

    .district-badge i {
        color: #198754;
    }


    /* =====================================================
       ACTION BUTTONS
    ===================================================== */

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
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: 0.2s;
    }

    .btn-delete:hover {
        background: #f8d7da;
        color: #a52834;
        transform: translateY(-1px);
    }


    /* =====================================================
       EMPTY STATE
    ===================================================== */

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


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 768px) {

        .location-hero {
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
            flex-wrap: wrap;
        }

        .add-location-btn {
            margin-top: 5px;
        }

        .location-card-header {
            padding: 17px;
        }

        .location-table thead th,
        .location-table tbody td {
            padding: 12px 14px;
        }

    }

</style>


<div class="container-fluid location-page">


    <!-- =====================================================
         HERO HEADER
    ====================================================== -->

    <div class="location-hero">

        <div class="hero-content">

            <div>

                <div class="hero-tag">

                    <i class="fas fa-leaf"></i>

                    FOODLINK • LOCATION MANAGEMENT

                </div>

                <h1 class="hero-title">

                    Location <span>List</span>

                </h1>

                <p class="hero-subtitle">

                    View and manage all registered locations by district

                </p>

            </div>


            <!-- Decorative Icons -->

            <div class="hero-decoration">

                <i class="fas fa-location-dot"></i>

                <i class="fas fa-map-pin"></i>

                <i class="fas fa-compass"></i>

            </div>


            <!-- Add Location -->

            <a
                href="{{ route('locationregister') }}"
                class="add-location-btn"
            >

                <i class="fas fa-plus"></i>

                Add Location

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
         MAIN LOCATION CARD
    ====================================================== -->

    <div class="location-card">


        <!-- CARD HEADER -->

        <div class="location-card-header">

            <h4 class="location-card-title">

                <i class="fas fa-list"></i>

                Registered Locations

            </h4>


            <span
                class="location-count"
                id="locationCount"
            >

                {{ $locations->count() }}

                {{ $locations->count() == 1 ? 'Location' : 'Locations' }}

            </span>

        </div>


        <!-- =================================================
             DISTRICT FILTER
        ================================================== -->

        <div class="filter-section">

            <label
                for="districtFilter"
                class="filter-label"
            >

                <i class="fas fa-map-marker-alt"></i>

                Select District

            </label>


            <select
                id="districtFilter"
                class="district-filter"
            >

                <option value="all">
                    -- All Districts --
                </option>


                @foreach($districts as $district)

                    <option value="{{ $district->district_id }}">

                        {{ $district->district_name }}

                    </option>

                @endforeach

            </select>

        </div>


        <!-- =================================================
             LOCATION TABLE
        ================================================== -->

        <div class="location-table-wrapper">

            <table class="location-table">

                <thead>

                    <tr>

                        <th>
                            ID
                        </th>

                        <th>
                            Location Name
                        </th>

                        <th>
                            District
                        </th>

                        <th width="200">
                            Action
                        </th>

                    </tr>

                </thead>


                <tbody id="locationTableBody">


                    @forelse($locations as $location)

                        <tr
                            class="location-row"
                            data-district="{{ $location->district_id }}"
                        >


                            <!-- ID -->

                            <td>

                                <span class="location-id">

                                    #{{ $location->location_id }}

                                </span>

                            </td>


                            <!-- LOCATION NAME -->

                            <td>

                                <span class="location-name">

                                    <i class="fas fa-location-dot"></i>

                                    {{ $location->location_name }}

                                </span>

                            </td>


                            <!-- DISTRICT -->

                            <td>

                                <span class="district-badge">

                                    <i class="fas fa-map"></i>

                                    {{ $location->district->district_name ?? 'N/A' }}

                                </span>

                            </td>


                            <!-- ACTION -->

                            <td>

                                <div class="action-buttons">


                                    <!-- EDIT -->

                                    <a
                                        href="{{ route('location_edit', $location->location_id) }}"
                                        class="btn-edit"
                                    >

                                        <i class="fas fa-pen"></i>

                                        Edit

                                    </a>


                                    <!-- DELETE -->

                                    <form
                                        action="{{ route('location_delete', $location->location_id) }}"
                                        method="POST"
                                        class="mb-0"
                                    >

                                        @csrf

                                        @method('DELETE')


                                        <button
                                            type="submit"
                                            class="btn-delete"
                                            onclick="return confirm('Are you sure you want to delete this location?')"
                                        >

                                            <i class="fas fa-trash"></i>

                                            Delete

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr id="noLocations">

                            <td
                                colspan="4"
                                class="empty-state"
                            >

                                <i class="fas fa-map-location-dot d-block"></i>

                                <h5>
                                    No Locations Found
                                </h5>

                                <p>
                                    There are no locations registered yet.
                                </p>

                            </td>

                        </tr>

                    @endforelse


                    <!-- FILTER EMPTY MESSAGE -->

                    <tr
                        id="filterEmpty"
                        style="display: none;"
                    >

                        <td
                            colspan="4"
                            class="empty-state"
                        >

                            <i class="fas fa-location-crosshairs d-block"></i>

                            <h5>
                                No Locations Found
                            </h5>

                            <p>
                                No locations are registered in this district.
                            </p>

                        </td>

                    </tr>


                </tbody>

            </table>

        </div>

    </div>

</div>


<!-- =====================================================
     DISTRICT FILTER JAVASCRIPT
====================================================== -->

<script>

document.addEventListener('DOMContentLoaded', function () {

    const districtFilter =
        document.getElementById('districtFilter');

    const locationRows =
        document.querySelectorAll('.location-row');

    const filterEmpty =
        document.getElementById('filterEmpty');

    const locationCount =
        document.getElementById('locationCount');


    districtFilter.addEventListener('change', function () {

        const selectedDistrict = this.value;

        let visibleCount = 0;


        locationRows.forEach(function (row) {

            const rowDistrict =
                row.getAttribute('data-district');


            /*
             * Show all locations when
             * "All Districts" is selected.
             */

            if (
                selectedDistrict === 'all' ||
                rowDistrict === selectedDistrict
            ) {

                row.style.display = '';

                visibleCount++;

            }

            else {

                row.style.display = 'none';

            }

        });


        /*
         * Show "No Locations Found"
         * when selected district has
         * no locations.
         */

        if (visibleCount === 0) {

            filterEmpty.style.display = '';

        }

        else {

            filterEmpty.style.display = 'none';

        }


        /*
         * Update location count.
         */

        locationCount.textContent =
            visibleCount +
            (visibleCount === 1
                ? ' Location'
                : ' Locations');

    });

});

</script>

@endsection