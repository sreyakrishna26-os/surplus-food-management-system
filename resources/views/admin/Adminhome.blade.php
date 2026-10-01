@extends('layouts.Adminmaster')

@section('content')

<style>
    .dashboard-page {
        padding: 10px 0;
    }

    /* ================= HEADER ================= */

    .dashboard-header {
        background: linear-gradient(135deg, #198754, #0f5132);
        border-radius: 20px;
        padding: 28px 30px;
        color: #fff;
        margin-bottom: 25px;
        box-shadow: 0 8px 25px rgba(25, 135, 84, 0.18);
    }

    .dashboard-header h3 {
        font-weight: 700;
        margin-bottom: 6px;
    }

    .dashboard-header p {
        margin: 0;
        color: rgba(255,255,255,0.85);
    }

    .dashboard-header-icon {
        width: 60px;
        height: 60px;
        border-radius: 16px;
        background: rgba(255,255,255,0.15);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
    }


    /* ================= STAT CARDS ================= */

    .stat-card {
        border: 0;
        border-radius: 18px;
        background: #fff;
        box-shadow: 0 6px 22px rgba(0,0,0,0.06);
        transition: all 0.25s ease;
        overflow: hidden;
        height: 100%;
    }

    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 28px rgba(0,0,0,0.10);
    }

    .stat-card-body {
        padding: 22px;
    }

    .stat-icon {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 25px;
        flex-shrink: 0;
    }

    .icon-green {
        background: #e8f7ef;
        color: #198754;
    }

    .icon-blue {
        background: #eaf3ff;
        color: #0d6efd;
    }

    .icon-orange {
        background: #fff4e5;
        color: #f39c12;
    }

    .icon-purple {
        background: #f2eaff;
        color: #6f42c1;
    }

    .stat-title {
        color: #6c757d;
        font-size: 14px;
        margin-bottom: 5px;
    }

    .stat-number {
        font-size: 27px;
        font-weight: 700;
        color: #263238;
        margin: 0;
    }


    /* ================= SECTION CARDS ================= */

    .dashboard-card {
        border: 0;
        border-radius: 18px;
        background: #fff;
        box-shadow: 0 6px 22px rgba(0,0,0,0.06);
        height: 100%;
    }

    .dashboard-card-header {
        padding: 20px 23px;
        border-bottom: 1px solid #edf0f2;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .dashboard-card-header h5 {
        margin: 0;
        font-weight: 700;
        color: #263238;
    }

    .dashboard-card-header i {
        color: #198754;
        font-size: 21px;
    }

    .dashboard-card-body {
        padding: 22px;
    }


    /* ================= QUICK ACTIONS ================= */

    .quick-action {
        display: flex;
        align-items: center;
        padding: 15px;
        border-radius: 13px;
        background: #f8faf9;
        margin-bottom: 12px;
        text-decoration: none;
        color: #263238;
        transition: all 0.2s ease;
        border: 1px solid transparent;
    }

    .quick-action:last-child {
        margin-bottom: 0;
    }

    .quick-action:hover {
        background: #eaf7ef;
        border-color: #ccebd9;
        color: #198754;
        transform: translateX(3px);
    }

    .quick-action-icon {
        width: 42px;
        height: 42px;
        border-radius: 11px;
        background: #e8f7ef;
        color: #198754;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 13px;
        font-size: 20px;
    }

    .quick-action-title {
        font-weight: 600;
        font-size: 14px;
        margin-bottom: 2px;
    }

    .quick-action-text {
        color: #89939b;
        font-size: 12px;
    }


    /* ================= ACTIVITY ================= */

    .activity-item {
        display: flex;
        align-items: flex-start;
        position: relative;
        padding-bottom: 19px;
    }

    .activity-item:last-child {
        padding-bottom: 0;
    }

    .activity-item:not(:last-child)::after {
        content: "";
        position: absolute;
        left: 18px;
        top: 38px;
        bottom: 0;
        width: 1px;
        background: #dfe8e2;
    }

    .activity-icon {
        width: 37px;
        height: 37px;
        border-radius: 50%;
        background: #e8f7ef;
        color: #198754;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 13px;
        z-index: 1;
        flex-shrink: 0;
    }

    .activity-title {
        font-weight: 600;
        font-size: 14px;
        color: #343a40;
        margin-bottom: 3px;
    }

    .activity-time {
        font-size: 12px;
        color: #9aa1a7;
    }


    /* ================= STATUS ================= */

    .status-box {
        border-radius: 14px;
        padding: 18px;
        background: #f8faf9;
        text-align: center;
        height: 100%;
    }

    .status-box-icon {
        width: 45px;
        height: 45px;
        border-radius: 12px;
        margin: 0 auto 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
    }

    .status-number {
        font-size: 23px;
        font-weight: 700;
        color: #263238;
    }

    .status-label {
        font-size: 12px;
        color: #7a858c;
    }

    .pending-icon {
        background: #fff4d8;
        color: #f0ad00;
    }

    .active-icon {
        background: #e8f7ef;
        color: #198754;
    }

    .rejected-icon {
        background: #fdebec;
        color: #dc3545;
    }


    /* ================= RESPONSIVE ================= */

    @media (max-width: 768px) {

        .dashboard-header {
            padding: 22px;
        }

        .dashboard-header h3 {
            font-size: 21px;
        }

        .stat-number {
            font-size: 23px;
        }

    }
</style>


<div class="container-fluid py-4 dashboard-page">


    <!-- ================= DASHBOARD HEADER ================= -->

    <div class="dashboard-header">

        <div class="d-flex align-items-center">

            <div class="dashboard-header-icon me-3">
                <i class="ti ti-layout-dashboard"></i>
            </div>

            <div>

                <h3>
                    SurplusFood Dashboard
                </h3>

                <p>
                    Manage donors, buyers, food listings and transactions
                </p>

            </div>

        </div>

    </div>



    <!-- ================= STAT CARDS ================= -->

    <div class="row g-4 mb-4">

        <!-- DONORS -->

        <div class="col-sm-6 col-xl-3">

            <div class="stat-card">

                <div class="stat-card-body">

                    <div class="d-flex align-items-center justify-content-between">

                        <div>

                            <div class="stat-title">
                                Total Donors
                            </div>

                            <h3 class="stat-number">
                                25
                            </h3>

                        </div>

                        <div class="stat-icon icon-green">
                            <i class="ti ti-users"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- BUYERS -->

        <div class="col-sm-6 col-xl-3">

            <div class="stat-card">

                <div class="stat-card-body">

                    <div class="d-flex align-items-center justify-content-between">

                        <div>

                            <div class="stat-title">
                                Total Buyers
                            </div>

                            <h3 class="stat-number">
                                42
                            </h3>

                        </div>

                        <div class="stat-icon icon-blue">
                            <i class="ti ti-user"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- FOODS -->

        <div class="col-sm-6 col-xl-3">

            <div class="stat-card">

                <div class="stat-card-body">

                    <div class="d-flex align-items-center justify-content-between">

                        <div>

                            <div class="stat-title">
                                Registered Foods
                            </div>

                            <h3 class="stat-number">
                                68
                            </h3>

                        </div>

                        <div class="stat-icon icon-orange">
                            <i class="ti ti-tools-kitchen-2"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- REQUESTS -->

        <div class="col-sm-6 col-xl-3">

            <div class="stat-card">

                <div class="stat-card-body">

                    <div class="d-flex align-items-center justify-content-between">

                        <div>

                            <div class="stat-title">
                                Food Requests
                            </div>

                            <h3 class="stat-number">
                                31
                            </h3>

                        </div>

                        <div class="stat-icon icon-purple">
                            <i class="ti ti-shopping-cart"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>



    <!-- ================= MIDDLE SECTION ================= -->

    <div class="row g-4 mb-4">


        <!-- FOOD ACTIVITY -->

        <div class="col-lg-8">

            <div class="dashboard-card">

                <div class="dashboard-card-header">

                    <div class="d-flex align-items-center gap-2">

                        <i class="ti ti-chart-bar"></i>

                        <h5>
                            Food Management Overview
                        </h5>

                    </div>

                </div>


                <div class="dashboard-card-body">

                    <div class="row g-3">


                        <!-- ACTIVE FOODS -->

                        <div class="col-md-4">

                            <div class="status-box">

                                <div class="status-box-icon active-icon">

                                    <i class="ti ti-circle-check"></i>

                                </div>

                                <div class="status-number">
                                    45
                                </div>

                                <div class="status-label">
                                    Active Foods
                                </div>

                            </div>

                        </div>


                        <!-- PENDING -->

                        <div class="col-md-4">

                            <div class="status-box">

                                <div class="status-box-icon pending-icon">

                                    <i class="ti ti-clock"></i>

                                </div>

                                <div class="status-number">
                                    15
                                </div>

                                <div class="status-label">
                                    Pending Requests
                                </div>

                            </div>

                        </div>


                        <!-- COMPLETED -->

                        <div class="col-md-4">

                            <div class="status-box">

                                <div class="status-box-icon active-icon">

                                    <i class="ti ti-check"></i>

                                </div>

                                <div class="status-number">
                                    28
                                </div>

                                <div class="status-label">
                                    Completed Orders
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        <!-- QUICK ACTIONS -->

        <div class="col-lg-4">

            <div class="dashboard-card">

                <div class="dashboard-card-header">

                    <div class="d-flex align-items-center gap-2">

                        <i class="ti ti-bolt"></i>

                        <h5>
                            Quick Actions
                        </h5>

                    </div>

                </div>


                <div class="dashboard-card-body">

                    <a href="{{ route('category_view') }}"
                       class="quick-action">

                        <div class="quick-action-icon">
                            <i class="ti ti-category"></i>
                        </div>

                        <div>

                            <div class="quick-action-title">
                                Categories
                            </div>

                            <div class="quick-action-text">
                                Manage food categories
                            </div>

                        </div>

                    </a>


                    <a href="{{ route('subcategory_view') }}"
                       class="quick-action">

                        <div class="quick-action-icon">
                            <i class="ti ti-list"></i>
                        </div>

                        <div>

                            <div class="quick-action-title">
                                Subcategories
                            </div>

                            <div class="quick-action-text">
                                Manage food subcategories
                            </div>

                        </div>

                    </a>


                    <a href="{{ route('admin.donors') }}"
                       class="quick-action">

                        <div class="quick-action-icon">
                            <i class="ti ti-users"></i>
                        </div>

                        <div>

                            <div class="quick-action-title">
                                Donors
                            </div>

                            <div class="quick-action-text">
                                View registered donors
                            </div>

                        </div>

                    </a>


                    <a href="{{ route('admin.foods') }}"
                       class="quick-action">

                        <div class="quick-action-icon">
                            <i class="ti ti-tools-kitchen-2"></i>
                        </div>

                        <div>

                            <div class="quick-action-title">
                                Registered Foods
                            </div>

                            <div class="quick-action-text">
                                Manage food listings
                            </div>

                        </div>

                    </a>

                </div>

            </div>

        </div>

    </div>



    <!-- ================= BOTTOM SECTION ================= -->

    <div class="row g-4">


        <!-- RECENT ACTIVITY -->

        <div class="col-lg-7">

            <div class="dashboard-card">

                <div class="dashboard-card-header">

                    <div class="d-flex align-items-center gap-2">

                        <i class="ti ti-history"></i>

                        <h5>
                            Recent Activity
                        </h5>

                    </div>

                </div>


                <div class="dashboard-card-body">


                    <div class="activity-item">

                        <div class="activity-icon">
                            <i class="ti ti-user-plus"></i>
                        </div>

                        <div>

                            <div class="activity-title">
                                New donor registered
                            </div>

                            <div class="activity-time">
                                Recently added to the system
                            </div>

                        </div>

                    </div>


                    <div class="activity-item">

                        <div class="activity-icon">
                            <i class="ti ti-tools-kitchen-2"></i>
                        </div>

                        <div>

                            <div class="activity-title">
                                New food registered
                            </div>

                            <div class="activity-time">
                                A donor added a new food listing
                            </div>

                        </div>

                    </div>


                    <div class="activity-item">

                        <div class="activity-icon">
                            <i class="ti ti-shopping-cart"></i>
                        </div>

                        <div>

                            <div class="activity-title">
                                New purchase request
                            </div>

                            <div class="activity-time">
                                A buyer submitted a food request
                            </div>

                        </div>

                    </div>


                    <div class="activity-item">

                        <div class="activity-icon">
                            <i class="ti ti-credit-card"></i>
                        </div>

                        <div>

                            <div class="activity-title">
                                Payment completed
                            </div>

                            <div class="activity-time">
                                A food purchase was successfully completed
                            </div>

                        </div>

                    </div>


                </div>

            </div>

        </div>



        <!-- SYSTEM SUMMARY -->

        <div class="col-lg-5">

            <div class="dashboard-card">

                <div class="dashboard-card-header">

                    <div class="d-flex align-items-center gap-2">

                        <i class="ti ti-report-analytics"></i>

                        <h5>
                            System Summary
                        </h5>

                    </div>

                </div>


                <div class="dashboard-card-body">


                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <div class="d-flex align-items-center">

                            <div class="stat-icon icon-green me-3">
                                <i class="ti ti-users"></i>
                            </div>

                            <div>

                                <div class="fw-semibold">
                                    Active Donors
                                </div>

                                <small class="text-muted">
                                    Currently active
                                </small>

                            </div>

                        </div>

                        <strong>
                            20
                        </strong>

                    </div>



                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <div class="d-flex align-items-center">

                            <div class="stat-icon icon-blue me-3">
                                <i class="ti ti-user"></i>
                            </div>

                            <div>

                                <div class="fw-semibold">
                                    Active Buyers
                                </div>

                                <small class="text-muted">
                                    Currently active
                                </small>

                            </div>

                        </div>

                        <strong>
                            35
                        </strong>

                    </div>



                    <div class="d-flex justify-content-between align-items-center">

                        <div class="d-flex align-items-center">

                            <div class="stat-icon icon-orange me-3">
                                <i class="ti ti-tools-kitchen-2"></i>
                            </div>

                            <div>

                                <div class="fw-semibold">
                                    Available Foods
                                </div>

                                <small class="text-muted">
                                    Currently available
                                </small>

                            </div>

                        </div>

                        <strong>
                            45
                        </strong>

                    </div>


                </div>

            </div>

        </div>

    </div>

</div>

@endsection