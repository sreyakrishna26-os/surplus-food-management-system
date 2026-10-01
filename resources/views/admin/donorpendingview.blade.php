@extends('layouts.Adminmaster')

@section('content')

<style>
    .donor-request-page {
        padding: 28px 20px;
    }

    /* ================= PAGE HEADER ================= */

    .page-header-box {
        background: linear-gradient(135deg, #198754, #0f5132);
        color: white;
        border-radius: 18px;
        padding: 28px 32px;
        margin-bottom: 25px;
        box-shadow: 0 7px 20px rgba(0, 0, 0, 0.08);
    }

    .page-header-box h4 {
        font-size: 25px;
        font-weight: 700;
        margin-bottom: 6px;
    }

    .page-header-box p {
        margin: 0;
        font-size: 14px;
        opacity: 0.9;
    }

    /* ================= ALERTS ================= */

    .custom-alert {
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    /* ================= MAIN CARD ================= */

    .details-card {
        background: white;
        border: none;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 6px 22px rgba(0, 0, 0, 0.08);
    }

    .details-card-header {
        background: #f1f8f4;
        border-bottom: 1px solid #e2ebe5;
        padding: 20px 28px;
    }

    .details-card-header h5 {
        margin: 0;
        color: #198754;
        font-weight: 700;
        font-size: 18px;
    }

    .details-card-body {
        padding: 30px;
    }

    /* ================= DETAIL BOX ================= */

    .detail-box {
        background: #f8faf9;
        border: 1px solid #e5eee8;
        border-radius: 12px;
        padding: 17px 20px;
        height: 100%;
        transition: 0.2s ease;
    }

    .detail-box:hover {
        border-color: #198754;
        box-shadow: 0 4px 14px rgba(25, 135, 84, 0.08);
        transform: translateY(-1px);
    }

    .detail-label {
        display: flex;
        align-items: center;
        gap: 7px;

        color: #6c757d;
        font-size: 11px;
        font-weight: 700;

        text-transform: uppercase;
        letter-spacing: 0.5px;

        margin-bottom: 8px;
    }

    .detail-label i {
        color: #198754;
        font-size: 15px;
    }

    .detail-value {
        color: #212529;
        font-size: 15px;
        font-weight: 600;
        word-break: break-word;
    }

    .address-box {
        min-height: 85px;
        line-height: 1.6;
    }

    /* ================= STATUS ================= */

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;

        padding: 7px 15px;
        border-radius: 30px;

        font-size: 12px;
        font-weight: 700;
    }

    .status-pending {
        background: #fff3cd;
        color: #856404;
    }

    .status-active {
        background: #d1e7dd;
        color: #0f5132;
    }

    .status-rejected {
        background: #f8d7da;
        color: #842029;
    }

    .status-other {
        background: #e2e3e5;
        color: #41464b;
    }

    /* ================= ID PROOF ================= */

    .id-proof-btn {
        display: inline-flex;
        align-items: center;
        gap: 7px;

        border: 1px solid #198754;
        color: #198754;
        background: white;

        padding: 8px 15px;
        border-radius: 8px;

        font-size: 13px;
        font-weight: 600;

        transition: 0.2s ease;
    }

    .id-proof-btn:hover {
        background: #198754;
        color: white;
    }

    /* ================= FOOTER ================= */

    .details-footer {
        background: #ffffff;
        border-top: 1px solid #e9ecef;
        padding: 20px 28px;
    }

    .footer-buttons {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
    }

    .back-buttons {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .action-buttons {
        display: flex;
        gap: 10px;
    }

    .back-btn {
        border: 1px solid #6c757d;
        background: white;
        color: #6c757d;

        padding: 9px 16px;
        border-radius: 8px;

        font-size: 13px;
        font-weight: 600;
    }

    .back-btn:hover {
        background: #6c757d;
        color: white;
    }

    .reject-btn {
        background: #dc3545;
        border: none;
        color: white;

        padding: 9px 18px;
        border-radius: 8px;

        font-size: 13px;
        font-weight: 600;
    }

    .reject-btn:hover {
        background: #bb2d3b;
        color: white;
    }

    .accept-btn {
        background: #198754;
        border: none;
        color: white;

        padding: 9px 18px;
        border-radius: 8px;

        font-size: 13px;
        font-weight: 600;
    }

    .accept-btn:hover {
        background: #157347;
        color: white;
    }

    /* ================= RESPONSIVE ================= */

    @media (max-width: 768px) {

        .donor-request-page {
            padding: 20px 10px;
        }

        .page-header-box {
            padding: 22px;
        }

        .page-header-box h4 {
            font-size: 21px;
        }

        .details-card-body {
            padding: 20px;
        }

        .details-footer {
            padding: 18px;
        }

        .footer-buttons {
            flex-direction: column;
            align-items: stretch;
        }

        .back-buttons,
        .action-buttons {
            width: 100%;
        }

        .back-buttons a,
        .action-buttons form,
        .action-buttons button {
            width: 100%;
        }

        .action-buttons {
            flex-direction: column;
        }
    }
</style>


<div class="container-fluid donor-request-page">


    <!-- ================= PAGE HEADER ================= -->

    <div class="page-header-box">

        <h4>
            <i class="ti ti-user-check me-2"></i>
            SurplusFood - Donor Registration Request
        </h4>

        <p>
            Review the donor information before accepting or rejecting the registration request.
        </p>

    </div>


    <!-- ================= SUCCESS MESSAGE ================= -->

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show custom-alert mb-4">

            <i class="ti ti-circle-check me-2"></i>

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    <!-- ================= ERROR MESSAGE ================= -->

    @if(session('error'))

        <div class="alert alert-danger alert-dismissible fade show custom-alert mb-4">

            <i class="ti ti-alert-circle me-2"></i>

            {{ session('error') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    <!-- ================= DONOR DETAILS CARD ================= -->

    <div class="details-card">


        <!-- CARD HEADER -->

        <div class="details-card-header">

            <h5>

                <i class="ti ti-user me-2"></i>

                Donor Information

            </h5>

        </div>


        <!-- CARD BODY -->

        <div class="details-card-body">

            <div class="row g-4">


                <!-- ================= DONOR ID ================= -->

                <div class="col-md-6">

                    <div class="detail-box">

                        <div class="detail-label">

                            <i class="ti ti-hash"></i>

                            Donor ID

                        </div>

                        <div class="detail-value">

                            {{ $donor->donor_id }}

                        </div>

                    </div>

                </div>


                <!-- ================= DONOR NAME ================= -->

                <div class="col-md-6">

                    <div class="detail-box">

                        <div class="detail-label">

                            <i class="ti ti-user"></i>

                            Donor Name

                        </div>

                        <div class="detail-value">

                            {{ $donor->donor_name }}

                        </div>

                    </div>

                </div>


                <!-- ================= EMAIL ================= -->

                <div class="col-md-6">

                    <div class="detail-box">

                        <div class="detail-label">

                            <i class="ti ti-mail"></i>

                            Email

                        </div>

                        <div class="detail-value">

                            {{ $donor->donor_email }}

                        </div>

                    </div>

                </div>


                <!-- ================= USERNAME ================= -->

                <div class="col-md-6">

                    <div class="detail-box">

                        <div class="detail-label">

                            <i class="ti ti-at"></i>

                            Username

                        </div>

                        <div class="detail-value">

                            {{ $donor->login->username ?? 'Not Available' }}

                        </div>

                    </div>

                </div>


                <!-- ================= PHONE ================= -->

                <div class="col-md-6">

                    <div class="detail-box">

                        <div class="detail-label">

                            <i class="ti ti-phone"></i>

                            Phone Number

                        </div>

                        <div class="detail-value">

                            {{ $donor->donor_phone }}

                        </div>

                    </div>

                </div>


                <!-- ================= LOCATION ================= -->

                <div class="col-md-6">

                    <div class="detail-box">

                        <div class="detail-label">

                            <i class="ti ti-map-pin"></i>

                            Location

                        </div>

                        <div class="detail-value">

                            {{ $donor->location->location_name ?? 'Not Available' }}

                        </div>

                    </div>

                </div>


                <!-- ================= ADDRESS ================= -->

                <div class="col-12">

                    <div class="detail-box">

                        <div class="detail-label">

                            <i class="ti ti-map-2"></i>

                            Address

                        </div>

                        <div class="detail-value address-box">

                            {{ $donor->donor_address }}

                        </div>

                    </div>

                </div>


                <!-- ================= REGISTRATION DATE ================= -->

                <div class="col-md-6">

                    <div class="detail-box">

                        <div class="detail-label">

                            <i class="ti ti-calendar"></i>

                            Registration Date

                        </div>

                        <div class="detail-value">

                            {{ \Carbon\Carbon::parse($donor->reg_date)->format('d-m-Y') }}

                        </div>

                    </div>

                </div>


                <!-- ================= LICENSE NUMBER ================= -->

                <div class="col-md-6">

                    <div class="detail-box">

                        <div class="detail-label">

                            <i class="ti ti-id"></i>

                            License Number

                        </div>

                        <div class="detail-value">

                            {{ $donor->license_number ?? 'Not Provided' }}

                        </div>

                    </div>

                </div>


                <!-- ================= STATUS ================= -->

                <div class="col-md-6">

                    <div class="detail-box">

                        <div class="detail-label">

                            <i class="ti ti-activity"></i>

                            Current Status

                        </div>

                        <div class="detail-value">

                            @if($donor->status === 'Pending')

                                <span class="status-badge status-pending">

                                    <i class="ti ti-clock"></i>

                                    Pending

                                </span>

                            @elseif($donor->status === 'Active')

                                <span class="status-badge status-active">

                                    <i class="ti ti-check"></i>

                                    Active

                                </span>

                            @elseif($donor->status === 'Rejected')

                                <span class="status-badge status-rejected">

                                    <i class="ti ti-x"></i>

                                    Rejected

                                </span>

                            @else

                                <span class="status-badge status-other">

                                    {{ $donor->status }}

                                </span>

                            @endif

                        </div>

                    </div>

                </div>


                <!-- ================= ID PROOF ================= -->

                <div class="col-md-6">

                    <div class="detail-box">

                        <div class="detail-label">

                            <i class="ti ti-file-text"></i>

                            ID Proof

                        </div>

                        <div class="detail-value">

                            @if(!empty($donor->id_proof))

                                <a href="{{ url('storage/' . $donor->id_proof) }}"
                                   target="_blank"
                                   class="id-proof-btn">

                                    <i class="ti ti-file-text"></i>

                                    View ID Proof

                                </a>

                            @else

                                <span class="text-muted">

                                    No ID proof uploaded

                                </span>

                            @endif

                        </div>

                    </div>

                </div>


            </div>

        </div>


        <!-- ================= ADMIN ACTIONS ================= -->

        @if($donor->status === 'Pending')

            <div class="details-footer">

                <div class="footer-buttons">


                    <!-- BACK BUTTONS -->

                    <div class="back-buttons">

                        <a href="{{ route('donor_pending') }}"
                           class="btn back-btn">

                            <i class="ti ti-arrow-left me-1"></i>

                            Back to Pending Requests

                        </a>


                        <a href="{{ route('admin.donors') }}"
                           class="btn back-btn">

                            <i class="ti ti-users me-1"></i>

                            Back to Donors

                        </a>

                    </div>


                    <!-- ACCEPT / REJECT -->

                    <div class="action-buttons">


                        <!-- REJECT -->

                        <form action="{{ route('donor_reject', $donor->donor_id) }}"
                              method="POST"
                              onsubmit="return confirm('Are you sure you want to reject this donor registration request?');">

                            @csrf

                            @method('PUT')

                            <button type="submit"
                                    class="btn reject-btn">

                                <i class="ti ti-x me-1"></i>

                                Reject Request

                            </button>

                        </form>


                        <!-- ACCEPT -->

                        <form action="{{ route('donor_accept', $donor->donor_id) }}"
                              method="POST"
                              onsubmit="return confirm('Are you sure you want to accept this donor registration request?');">

                            @csrf

                            @method('PUT')

                            <button type="submit"
                                    class="btn accept-btn">

                                <i class="ti ti-check me-1"></i>

                                Accept Request

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        @else

            <!-- ================= NON-PENDING FOOTER ================= -->

            <div class="details-footer">

                <div class="back-buttons">

                    <a href="{{ route('admin.donors') }}"
                       class="btn back-btn">

                        <i class="ti ti-users me-1"></i>

                        Back to Donors

                    </a>


                    <a href="{{ route('donor_pending') }}"
                       class="btn back-btn">

                        <i class="ti ti-arrow-left me-1"></i>

                        Back to Pending Requests

                    </a>

                </div>

            </div>

        @endif


    </div>

</div>

@endsection