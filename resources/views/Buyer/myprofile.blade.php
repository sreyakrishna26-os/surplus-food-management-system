@extends('layouts.Buyermaster')

@section('content')

<style>

/* =========================================================
   SURPLUS PROFILE PAGE
   ========================================================= */

.surplus-profile-page {
    background: #f8faf7;
    min-height: 100vh;
    padding: 60px 0 80px;
}


/* =========================================================
   PAGE HEADER
   ========================================================= */

.profile-heading {
    text-align: center;
    margin-bottom: 40px;
}

.profile-heading .small-title {
    display: block;
    color: #39a900;
    font-size: 13px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 10px;
}

.profile-heading h2 {
    font-family: 'Lora', serif;
    font-size: 38px;
    font-weight: 700;
    color: #222;
    margin-bottom: 10px;
}

.profile-heading h2 span {
    color: #39a900;
}

.profile-heading p {
    color: #777;
    margin: 0;
}


/* =========================================================
   SUCCESS ALERT
   ========================================================= */

.surplus-success {
    border: none;
    border-left: 5px solid #39a900;
    background: #eaf7e3;
    color: #287500;
    border-radius: 8px;
    padding: 15px 18px;
    margin-bottom: 25px;
}


/* =========================================================
   PROFILE CARD
   ========================================================= */

.profile-card {
    background: white;
    border-radius: 16px;
    overflow: hidden;
    border: 1px solid #edf1eb;
    box-shadow: 0 12px 35px rgba(0,0,0,0.08);
}


/* =========================================================
   CARD HEADER
   ========================================================= */

.profile-card-header {
    background: linear-gradient(
        135deg,
        #39a900,
        #2f8c00
    );

    color: white;
    padding: 28px 32px;
    position: relative;
}

.profile-card-header::after {
    content: "";
    position: absolute;
    width: 120px;
    height: 120px;
    border-radius: 50%;
    background: rgba(255,255,255,0.08);
    right: -35px;
    top: -45px;
}

.profile-card-header h4 {
    margin: 0;
    font-size: 24px;
    font-weight: 700;
}

.profile-card-header p {
    margin: 6px 0 0;
    opacity: 0.9;
    font-size: 14px;
}


/* =========================================================
   PROFILE BODY
   ========================================================= */

.profile-card-body {
    padding: 35px;
}


/* =========================================================
   SECTION TITLE
   ========================================================= */

.profile-section-title {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 25px;
}

.profile-section-icon {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    background: #eaf7e3;
    color: #39a900;
    display: flex;
    align-items: center;
    justify-content: center;
}

.profile-section-title h5 {
    margin: 0;
    font-size: 19px;
    font-weight: 700;
    color: #222;
}


/* =========================================================
   INFORMATION BOX
   ========================================================= */

.profile-info {
    background: #f8faf7;
    border: 1px solid #edf1eb;
    border-radius: 10px;
    padding: 17px 20px;
    height: 100%;
    transition: 0.3s;
}

.profile-info:hover {
    border-color: #cce5bf;
    transform: translateY(-2px);
}

.profile-info label {
    display: block;
    color: #777;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    margin-bottom: 7px;
}

.profile-info p {
    margin: 0;
    color: #222;
    font-size: 15px;
    font-weight: 600;
    word-break: break-word;
}


/* =========================================================
   STATUS
   ========================================================= */

.profile-status {
    display: inline-block;
    padding: 6px 14px;
    border-radius: 30px;
    background: #eaf7e3;
    color: #287500;
    font-size: 13px;
    font-weight: 700;
}


/* =========================================================
   DIVIDER
   ========================================================= */

.profile-divider {
    border: 0;
    border-top: 1px solid #edf1eb;
    margin: 35px 0;
}


/* =========================================================
   BUTTONS
   ========================================================= */

.profile-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
}

.profile-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 12px 22px;
    border-radius: 7px;
    font-size: 14px;
    font-weight: 700;
    text-decoration: none;
    border: none;
    transition: 0.3s;
}

.profile-btn-edit {
    background: #f7b733;
    color: #222;
}

.profile-btn-edit:hover {
    background: #db9b16;
    color: #222;
    transform: translateY(-2px);
}

.profile-btn-delete {
    background: #dc3545;
    color: white;
}

.profile-btn-delete:hover {
    background: #bb2d3b;
    color: white;
    transform: translateY(-2px);
}


/* =========================================================
   PROFILE TOP ICON
   ========================================================= */

.profile-avatar {
    width: 80px;
    height: 80px;
    margin: 0 auto 18px;
    border-radius: 50%;
    background: white;
    color: #39a900;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 34px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.12);
}


/* =========================================================
   RESPONSIVE
   ========================================================= */

@media (max-width: 768px) {

    .surplus-profile-page {
        padding: 40px 15px 60px;
    }

    .profile-heading h2 {
        font-size: 31px;
    }

    .profile-card-body {
        padding: 25px 20px;
    }

    .profile-card-header {
        padding: 25px 20px;
        text-align: center;
    }

    .profile-actions {
        flex-direction: column;
    }

    .profile-btn {
        width: 100%;
    }

}

</style>


<div class="surplus-profile-page">

    <div class="container">

        {{-- =====================================================
             PAGE HEADING
        ====================================================== --}}

        <div class="profile-heading">

            <span class="small-title">
                Surplus Account
            </span>

            <h2>
                My <span>Profile</span>
            </h2>

            <p>
                View and manage your Surplus buyer account details.
            </p>

        </div>


        {{-- =====================================================
             SUCCESS MESSAGE
        ====================================================== --}}

        @if(session('success'))

            <div class="alert surplus-success">

                <i class="fas fa-check-circle me-2"></i>

                {{ session('success') }}

            </div>

        @endif


        <div class="row justify-content-center">

            <div class="col-lg-9 col-md-11">


                {{-- =================================================
                     PROFILE CARD
                ================================================== --}}

                <div class="profile-card">


                    {{-- CARD HEADER --}}

                    <div class="profile-card-header">

                        <div class="profile-avatar">

                            <i class="fas fa-user"></i>

                        </div>

                        <h4 class="text-center">
                            {{ $buyer->buyer_name }}
                        </h4>

                        <p class="text-center">
                            Buyer Account
                        </p>

                    </div>


                    {{-- CARD BODY --}}

                    <div class="profile-card-body">


                        {{-- =========================================
                             PERSONAL INFORMATION
                        ========================================== --}}

                        <div class="profile-section-title">

                            <div class="profile-section-icon">

                                <i class="fas fa-user"></i>

                            </div>

                            <h5>
                                Personal Information
                            </h5>

                        </div>


                        <div class="row g-3">


                            {{-- Buyer Name --}}

                            <div class="col-md-6">

                                <div class="profile-info">

                                    <label>
                                        Buyer Name
                                    </label>

                                    <p>
                                        {{ $buyer->buyer_name }}
                                    </p>

                                </div>

                            </div>


                            {{-- Email --}}

                            <div class="col-md-6">

                                <div class="profile-info">

                                    <label>
                                        Email
                                    </label>

                                    <p>
                                        {{ $buyer->buyer_email }}
                                    </p>

                                </div>

                            </div>


                            {{-- Buyer Type --}}

                            <div class="col-md-6">

                                <div class="profile-info">

                                    <label>
                                        Buyer Type
                                    </label>

                                    <p>
                                        {{ $buyer->buyer_type }}
                                    </p>

                                </div>

                            </div>


                            {{-- Phone --}}

                            <div class="col-md-6">

                                <div class="profile-info">

                                    <label>
                                        Phone Number
                                    </label>

                                    <p>
                                        {{ $buyer->buyer_phone }}
                                    </p>

                                </div>

                            </div>


                            {{-- Address --}}

                            <div class="col-md-12">

                                <div class="profile-info">

                                    <label>
                                        Address
                                    </label>

                                    <p>
                                        {{ $buyer->buyer_address }}
                                    </p>

                                </div>

                            </div>


                            {{-- Location --}}

                            <div class="col-md-6">

                                <div class="profile-info">

                                    <label>
                                        Location
                                    </label>

                                    <p>
                                        {{ $buyer->location->location_name ?? 'N/A' }}
                                    </p>

                                </div>

                            </div>


                            {{-- Registration Date --}}

                            <div class="col-md-6">

                                <div class="profile-info">

                                    <label>
                                        Registration Date
                                    </label>

                                    <p>
                                        {{ $buyer->registration_date }}
                                    </p>

                                </div>

                            </div>

                        </div>


                        <hr class="profile-divider">


                        {{-- =========================================
                             LOGIN INFORMATION
                        ========================================== --}}

                        <div class="profile-section-title">

                            <div class="profile-section-icon">

                                <i class="fas fa-lock"></i>

                            </div>

                            <h5>
                                Login Details
                            </h5>

                        </div>


                        <div class="row g-3">


                            {{-- Username --}}

                            <div class="col-md-6">

                                <div class="profile-info">

                                    <label>
                                        Username
                                    </label>

                                    <p>
                                        {{ $buyer->login->username ?? 'N/A' }}
                                    </p>

                                </div>

                            </div>


                            {{-- Status --}}

                            <div class="col-md-6">

                                <div class="profile-info">

                                    <label>
                                        Account Status
                                    </label>

                                    <p>

                                        <span class="profile-status">

                                            <i class="fas fa-circle"
                                               style="font-size:7px; margin-right:6px;"></i>

                                            {{ $buyer->login->status ?? 'N/A' }}

                                        </span>

                                    </p>

                                </div>

                            </div>

                        </div>


                        <hr class="profile-divider">


                        {{-- =========================================
                             ACTION BUTTONS
                        ========================================== --}}

                        <div class="profile-actions">


                            {{-- Edit Profile --}}

                            <a
                                href="{{ route('buyer_profile_edit') }}"
                                class="profile-btn profile-btn-edit">

                                <i class="fas fa-edit"></i>

                                Edit Profile

                            </a>


                            {{-- Delete Account --}}

                            <form
                                action="{{ route('buyer_profile_delete') }}"
                                method="POST"
                                class="m-0"
                                onsubmit="return confirm('Are you sure you want to permanently delete your account?');">

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="profile-btn profile-btn-delete">

                                    <i class="fas fa-trash-alt"></i>

                                    Delete Account

                                </button>

                            </form>


                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection