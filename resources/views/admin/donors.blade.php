@extends('layouts.Adminmaster')

@section('content')

<style>
    .donor-page {
        padding: 10px 0;
    }

    /* PAGE HEADER */
    .donor-header {
        background: linear-gradient(135deg, #198754, #0f5132);
        border-radius: 18px;
        padding: 25px 30px;
        color: #fff;
        margin-bottom: 25px;
        box-shadow: 0 8px 25px rgba(25, 135, 84, 0.18);
    }

    .donor-header h4 {
        font-size: 24px;
        margin-bottom: 5px;
    }

    .donor-header p {
        color: rgba(255, 255, 255, 0.85);
        margin-bottom: 0;
    }

    .donor-header-icon {
        width: 55px;
        height: 55px;
        border-radius: 14px;
        background: rgba(255, 255, 255, 0.16);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        margin-right: 16px;
    }

    /* MAIN CARD */
    .donor-card {
        border: none;
        border-radius: 18px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.07);
    }

    .donor-card-header {
        padding: 20px 25px;
        background: #fff;
        border-bottom: 1px solid #edf0f2;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .donor-card-header h5 {
        margin: 0;
        font-weight: 700;
        color: #263238;
    }

    .donor-count {
        background: #e8f7ef;
        color: #198754;
        padding: 6px 13px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
    }

    .donor-card-body {
        padding: 0;
    }

    /* TABLE */
    .donor-table {
        margin-bottom: 0;
    }

    .donor-table thead th {
        background: #f5faf7;
        color: #495057;
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        padding: 16px 15px;
        border-bottom: 1px solid #e3eee7;
        white-space: nowrap;
    }

    .donor-table tbody td {
        padding: 17px 15px;
        color: #555;
        border-bottom: 1px solid #f0f2f3;
        vertical-align: middle;
    }

    .donor-table tbody tr {
        transition: all 0.2s ease;
    }

    .donor-table tbody tr:hover {
        background: #f8fcfa;
    }

    /* SERIAL */
    .serial-number {
        width: 34px;
        height: 34px;
        border-radius: 10px;
        background: #eaf7ef;
        color: #198754;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 13px;
    }

    /* DONOR NAME */
    .donor-name {
        font-weight: 700;
        color: #263238;
    }

    .donor-name-wrapper {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .donor-avatar {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: linear-gradient(135deg, #198754, #20c997);
        color: #fff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 15px;
        flex-shrink: 0;
    }

    /* EMAIL */
    .email-text {
        color: #59636e;
        font-size: 14px;
    }

    /* PHONE */
    .phone-text {
        color: #59636e;
        font-size: 14px;
    }

    /* DATE */
    .date-text {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: #59636e;
        font-size: 14px;
    }

    .date-text i {
        color: #198754;
    }

    /* STATUS */
    .status-badge {
        padding: 7px 13px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .status-active {
        background: #e8f7ef;
        color: #198754;
    }

    .status-inactive {
        background: #fdebec;
        color: #dc3545;
    }

    .status-other {
        background: #eef0f2;
        color: #6c757d;
    }

    .status-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: currentColor;
    }

    /* VIEW BUTTON */
    .view-btn {
        border: 1px solid #198754;
        color: #198754;
        background: #fff;
        border-radius: 9px;
        padding: 7px 15px;
        font-weight: 600;
        transition: all 0.2s ease;
    }

    .view-btn:hover {
        background: #198754;
        color: #fff;
        box-shadow: 0 4px 12px rgba(25, 135, 84, 0.2);
    }

    /* EMPTY */
    .empty-state {
        padding: 55px 20px !important;
        color: #6c757d;
    }

    .empty-icon {
        width: 65px;
        height: 65px;
        margin: 0 auto 15px;
        border-radius: 18px;
        background: #f1f7f3;
        color: #198754;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
    }

    .empty-state h6 {
        font-weight: 700;
        color: #495057;
        margin-bottom: 5px;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {

        .donor-header {
            padding: 20px;
        }

        .donor-header h4 {
            font-size: 20px;
        }

        .donor-header-icon {
            width: 45px;
            height: 45px;
            font-size: 23px;
        }

        .donor-card-header {
            padding: 17px;
        }

        .donor-table thead th,
        .donor-table tbody td {
            padding: 12px 10px;
        }
    }
</style>


<div class="container-fluid py-4 donor-page">

    <!-- ================= PAGE HEADER ================= -->
    <div class="donor-header">

        <div class="d-flex align-items-center">

            <div class="donor-header-icon">
                <i class="ti ti-users"></i>
            </div>

            <div>
                <h4 class="fw-bold">
                    SurplusFood - All Donors
                </h4>

                <p>
                    View and manage all registered donors
                </p>
            </div>

        </div>

    </div>


    <!-- ================= DONOR CARD ================= -->
    <div class="donor-card">

        <!-- CARD HEADER -->
        <div class="donor-card-header">

            <div class="d-flex align-items-center gap-2">

                <i class="ti ti-users text-success fs-4"></i>

                <h5>
                    Donor List
                </h5>

            </div>

            <span class="donor-count">
                {{ $donors->count() }} Donors
            </span>

        </div>


        <!-- CARD BODY -->
        <div class="donor-card-body">

            <div class="table-responsive">

                <table class="table donor-table align-middle">

                    <thead>

                        <tr>

                            <th>#</th>

                            <th>Donor Name</th>

                            <th>Email</th>

                            <th>Phone</th>

                            <th>Registration Date</th>

                            <th>Status</th>

                            <th class="text-center">Action</th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($donors as $donor)

                            <tr>

                                <!-- SERIAL NUMBER -->
                                <td>
                                    <span class="serial-number">
                                        {{ $loop->iteration }}
                                    </span>
                                </td>


                                <!-- DONOR NAME -->
                                <td>

                                    <div class="donor-name-wrapper">

                                        <div class="donor-avatar">
                                            {{ strtoupper(substr($donor->donor_name, 0, 1)) }}
                                        </div>

                                        <span class="donor-name">
                                            {{ $donor->donor_name }}
                                        </span>

                                    </div>

                                </td>


                                <!-- EMAIL -->
                                <td>
                                    <span class="email-text">
                                        {{ $donor->donor_email ?? 'N/A' }}
                                    </span>
                                </td>


                                <!-- PHONE -->
                                <td>
                                    <span class="phone-text">
                                        {{ $donor->donor_phone ?? 'N/A' }}
                                    </span>
                                </td>


                                <!-- REGISTRATION DATE -->
                                <td>

                                    <span class="date-text">

                                        <i class="ti ti-calendar"></i>

                                        {{ $donor->reg_date ?? 'N/A' }}

                                    </span>

                                </td>


                                <!-- STATUS -->
                                <td>

                                    @if($donor->status == 'active')

                                        <span class="status-badge status-active">

                                            <span class="status-dot"></span>

                                            Active

                                        </span>

                                    @elseif($donor->status == 'inactive')

                                        <span class="status-badge status-inactive">

                                            <span class="status-dot"></span>

                                            Inactive

                                        </span>

                                    @else

                                        <span class="status-badge status-other">

                                            <span class="status-dot"></span>

                                            {{ ucfirst($donor->status ?? 'N/A') }}

                                        </span>

                                    @endif

                                </td>


                                <!-- VIEW -->
                                <td class="text-center">

                                    <a href="{{ route('admin_donor_view', ['donor_id' => $donor->donor_id]) }}"
                                       class="btn btn-sm view-btn">

                                        <i class="ti ti-eye me-1"></i>

                                        View

                                    </a>

                                </td>

                            </tr>


                        @empty

                            <tr>

                                <td colspan="7" class="text-center empty-state">

                                    <div class="empty-icon">

                                        <i class="ti ti-users-off"></i>

                                    </div>

                                    <h6>
                                        No Donors Found
                                    </h6>

                                    <p class="mb-0">
                                        There are currently no registered donors to display.
                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection