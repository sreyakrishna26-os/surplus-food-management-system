@extends('layouts.Adminmaster')

@section('content')

<style>
    .donor-request-page {
        padding: 28px 20px;
    }

    /* ================= PAGE HEADER ================= */

    .request-header {
        background: linear-gradient(135deg, #198754, #0f5132);
        border-radius: 18px;
        padding: 28px 32px;
        color: white;
        margin-bottom: 25px;
        box-shadow: 0 7px 20px rgba(0, 0, 0, 0.08);
    }

    .request-header h4 {
        font-size: 25px;
        font-weight: 700;
        margin-bottom: 6px;
    }

    .request-header p {
        margin: 0;
        font-size: 14px;
        opacity: 0.9;
    }

    /* ================= MAIN CARD ================= */

    .request-card {
        background: #ffffff;
        border: none;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 6px 22px rgba(0, 0, 0, 0.08);
    }

    .request-card-header {
        background: #f1f8f4;
        border-bottom: 1px solid #e1ebe5;
        padding: 20px 25px;

        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .request-card-header h5 {
        margin: 0;
        color: #198754;
        font-weight: 700;
        font-size: 18px;
    }

    .request-count {
        background: #d1e7dd;
        color: #0f5132;
        border-radius: 30px;
        padding: 6px 13px;
        font-size: 12px;
        font-weight: 700;
    }

    /* ================= TABLE ================= */

    .request-table {
        margin: 0;
    }

    .request-table thead th {
        background: #198754;
        color: white;
        border: none;
        padding: 14px 12px;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        white-space: nowrap;
    }

    .request-table tbody td {
        padding: 15px 12px;
        border-color: #edf1ee;
        vertical-align: middle;
        font-size: 14px;
    }

    .request-table tbody tr {
        transition: 0.2s ease;
    }

    .request-table tbody tr:hover {
        background: #f7fbf8;
    }

    /* ================= DONOR AVATAR ================= */

    .donor-avatar {
        width: 40px;
        height: 40px;
        min-width: 40px;
        border-radius: 50%;

        background: linear-gradient(135deg, #198754, #157347);

        color: white;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 16px;
    }

    .donor-name {
        font-weight: 700;
        color: #212529;
    }

    .donor-id {
        color: #6c757d;
        font-size: 11px;
    }

    /* ================= STATUS ================= */

    .pending-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;

        background: #fff3cd;
        color: #856404;

        padding: 6px 12px;

        border-radius: 30px;

        font-size: 12px;
        font-weight: 700;
    }

    /* ================= VIEW BUTTON ================= */

    .view-btn {
        border: 1px solid #198754;
        color: #198754;
        background: white;

        border-radius: 8px;

        padding: 7px 14px;

        font-size: 13px;
        font-weight: 600;

        transition: 0.2s ease;
    }

    .view-btn:hover {
        background: #198754;
        color: white;
    }

    /* ================= ALERTS ================= */

    .custom-alert {
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    /* ================= EMPTY STATE ================= */

    .empty-state {
        padding: 65px 20px;
        text-align: center;
    }

    .empty-icon {
        width: 75px;
        height: 75px;
        margin: auto;

        border-radius: 50%;

        background: #f1f8f4;
        color: #198754;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 35px;
    }

    .empty-state h5 {
        margin-top: 20px;
        font-weight: 700;
    }

    .empty-state p {
        color: #6c757d;
        margin-bottom: 0;
        font-size: 14px;
    }

    /* ================= RESPONSIVE ================= */

    @media (max-width: 768px) {

        .donor-request-page {
            padding: 20px 10px;
        }

        .request-header {
            padding: 22px;
        }

        .request-header h4 {
            font-size: 21px;
        }

        .request-card-header {
            padding: 18px;
        }

    }
</style>


<div class="container-fluid donor-request-page">


    <!-- ================= PAGE HEADER ================= -->

    <div class="request-header">

        <h4>
            <i class="ti ti-user-check me-2"></i>
            SurplusFood - Donor Registration Requests
        </h4>

        <p>
            Review and manage pending donor registration requests.
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



    <!-- ================= REQUEST CARD ================= -->

    <div class="request-card">


        <!-- CARD HEADER -->

        <div class="request-card-header">

            <h5>

                <i class="ti ti-users me-2"></i>

                Pending Donor Requests

            </h5>


            <span class="request-count">

                {{ $donors->count() }}

                {{ $donors->count() == 1 ? 'Request' : 'Requests' }}

            </span>

        </div>



        <div class="card-body p-0">


            @if($donors->count() > 0)


                <!-- ================= TABLE ================= -->

                <div class="table-responsive">

                    <table class="table request-table align-middle mb-0">


                        <thead>

                            <tr>

                                <th>#</th>

                                <th>Donor</th>

                                <th>Email</th>

                                <th>Username</th>

                                <th>Phone</th>

                                <th>Location</th>

                                <th>Registration Date</th>

                                <th>Status</th>

                                <th class="text-center">
                                    Action
                                </th>

                            </tr>

                        </thead>



                        <tbody>


                            @foreach($donors as $index => $donor)

                                <tr>


                                    <!-- NUMBER -->

                                    <td class="fw-semibold text-muted">

                                        {{ $index + 1 }}

                                    </td>



                                    <!-- DONOR -->

                                    <td>

                                        <div class="d-flex align-items-center">


                                            <div class="donor-avatar me-2">

                                                <i class="ti ti-user"></i>

                                            </div>


                                            <div>

                                                <div class="donor-name">

                                                    {{ $donor->donor_name }}

                                                </div>

                                                <div class="donor-id">

                                                    ID: {{ $donor->donor_id }}

                                                </div>

                                            </div>

                                        </div>

                                    </td>



                                    <!-- EMAIL -->

                                    <td>

                                        {{ $donor->donor_email }}

                                    </td>



                                    <!-- USERNAME -->

                                    <td>

                                        {{ $donor->login->username ?? '-' }}

                                    </td>



                                    <!-- PHONE -->

                                    <td>

                                        {{ $donor->donor_phone }}

                                    </td>



                                    <!-- LOCATION -->

                                    <td>

                                        <i class="ti ti-map-pin me-1 text-success"></i>

                                        {{ $donor->location->location_name ?? '-' }}

                                    </td>



                                    <!-- DATE -->

                                    <td>

                                        <i class="ti ti-calendar me-1 text-muted"></i>

                                        {{ \Carbon\Carbon::parse($donor->reg_date)->format('d-m-Y') }}

                                    </td>



                                    <!-- STATUS -->

                                    <td>

                                        <span class="pending-badge">

                                            <i class="ti ti-clock"></i>

                                            Pending

                                        </span>

                                    </td>



                                    <!-- ACTION -->

                                    <td class="text-center">

                                        <a
                                            href="{{ route('admin_donor_view', $donor->donor_id) }}"
                                            class="btn view-btn">

                                            <i class="ti ti-eye me-1"></i>

                                            View

                                        </a>

                                    </td>


                                </tr>

                            @endforeach


                        </tbody>

                    </table>

                </div>


            @else


                <!-- ================= EMPTY STATE ================= -->

                <div class="empty-state">

                    <div class="empty-icon">

                        <i class="ti ti-inbox"></i>

                    </div>


                    <h5>

                        No Pending Requests

                    </h5>


                    <p>

                        There are currently no donor registration requests
                        waiting for approval.

                    </p>

                </div>


            @endif


        </div>

    </div>

</div>

@endsection