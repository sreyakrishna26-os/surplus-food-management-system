@extends('layouts.Adminmaster')

@section('content')

<style>
    /* ================= DISTRICT PAGE ================= */

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
        background: rgba(255, 255, 255, 0.08);
        right: 100px;
        top: -100px;
    }

    .district-hero::after {
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
        margin-left: auto;
        display: flex;
        align-items: center;
        gap: 18px;
        font-size: 25px;
        opacity: 0.18;
    }

    .hero-decoration i:nth-child(2) {
        font-size: 34px;
    }

    .hero-decoration i:nth-child(3) {
        font-size: 29px;
    }


    /* ================= FORM CARD ================= */

    .district-card {
        background: #ffffff;
        border: 1px solid #edf2ef;
        border-radius: 20px;
        box-shadow: 0 7px 28px rgba(0, 0, 0, 0.07);
        overflow: hidden;
    }

    .district-card-header {
        padding: 20px 25px;
        background: #f4faf7;
        border-bottom: 1px solid #e5eee9;
    }

    .district-card-header h5 {
        margin: 0;
        color: #176b4b;
        font-size: 18px;
        font-weight: 750;
    }

    .district-card-header p {
        margin: 5px 0 0;
        color: #7a8b83;
        font-size: 13px;
    }

    .district-card-body {
        padding: 28px 30px;
    }


    /* ================= SUCCESS ALERT ================= */

    .custom-alert {
        border: none;
        border-radius: 12px;
        padding: 13px 17px;
        margin-bottom: 22px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    }


    /* ================= FORM ================= */

    .form-label-custom {
        color: #365d4c;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .form-label-custom i {
        color: #198754;
        margin-right: 6px;
    }

    .district-input {
        height: 48px;
        border: 1px solid #dce6e1;
        border-radius: 11px;
        padding: 10px 14px;
        font-size: 14px;
        transition: 0.2s;
    }

    .district-input:focus {
        border-color: #20a36a;
        box-shadow: 0 0 0 3px rgba(32, 163, 106, 0.10);
    }

    .form-help {
        display: block;
        margin-top: 7px;
        color: #89958f;
        font-size: 12px;
    }

    .invalid-feedback {
        font-size: 12px;
    }


    /* ================= BUTTONS ================= */

    .district-actions {
        display: flex;
        gap: 10px;
        margin-top: 25px;
    }

    .btn-save {
        border: none;
        border-radius: 10px;
        padding: 11px 22px;
        background: linear-gradient(135deg, #198754, #20a36a);
        color: white;
        font-size: 13px;
        font-weight: 700;
        transition: 0.2s;
    }

    .btn-save:hover {
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 6px 15px rgba(25, 135, 84, 0.22);
    }

    .btn-cancel {
        border: 1px solid #dce4df;
        border-radius: 10px;
        padding: 10px 21px;
        background: #f7f9f8;
        color: #59655f;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: 0.2s;
    }

    .btn-cancel:hover {
        background: #edf2ef;
        color: #37413c;
    }

    .btn-view {
        border: none;
        border-radius: 10px;
        padding: 11px 22px;
        background: #e8f6ef;
        color: #16834f;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: 0.2s;
    }

    .btn-view:hover {
        background: #d8f0e4;
        color: #126b41;
        transform: translateY(-1px);
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

        .district-card-body {
            padding: 22px;
        }

        .district-actions {
            flex-wrap: wrap;
        }

        .btn-save,
        .btn-cancel,
        .btn-view {
            flex: 1;
            min-width: 100px;
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
                    SURPLUS FOOD • LOCATION MANAGEMENT
                </div>

                <h1 class="hero-title">
                    District <span>Registration</span>
                </h1>

                <p class="hero-subtitle">
                    Add and manage districts for organizing Surplus Food locations
                </p>

            </div>


            <!-- Decorative Icons -->

            <div class="hero-decoration">

                <i class="fas fa-location-dot"></i>

                <i class="fas fa-map"></i>

                <i class="fas fa-compass"></i>

            </div>

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
         REGISTRATION CARD
    ====================================================== -->

    <div class="district-card">


        <!-- CARD HEADER -->

        <div class="district-card-header">

            <h5>

                <i class="fas fa-plus-circle me-2"></i>

                Add New District

            </h5>

            <p>
                Enter the district details below to register a new district.
            </p>

        </div>


        <!-- CARD BODY -->

        <div class="district-card-body">

            <form action="{{ route('district_insert') }}" method="POST">

                @csrf


                <!-- ================= DISTRICT NAME ================= -->

                <div class="mb-3">

                    <label
                        for="district_name"
                        class="form-label-custom"
                    >

                        <i class="fas fa-map-marker-alt"></i>

                        District Name

                    </label>


                    <input
                        type="text"
                        class="form-control district-input @error('district_name') is-invalid @enderror"
                        id="district_name"
                        name="district_name"
                        value="{{ old('district_name') }}"
                        placeholder="Enter district name"
                    >


                    <small class="form-help">

                        <i class="fas fa-circle-info me-1"></i>

                        Enter the name of the district you want to register.

                    </small>


                    @error('district_name')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                    @enderror

                </div>


                <!-- ================= BUTTONS ================= -->

                <div class="district-actions">


                    <!-- SAVE -->

                    <button
                        type="submit"
                        class="btn-save"
                    >

                        <i class="fas fa-floppy-disk me-1"></i>

                        Save District

                    </button>


                    <!-- CANCEL -->

                    <a
                        href="{{ route('district_insert') }}"
                        class="btn-cancel"
                    >

                        <i class="fas fa-rotate-left me-1"></i>

                        Cancel

                    </a>


                    <!-- VIEW -->

                    <a
                        href="{{ route('district_view') }}"
                        class="btn-view"
                    >

                        <i class="fas fa-list me-1"></i>

                        View Districts

                    </a>


                </div>


            </form>

        </div>

    </div>

</div>

@endsection