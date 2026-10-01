@extends('layouts.Buyermaster')

@section('content')

<style>

    /* =========================================================
       SURPLUS - MY FOOD REQUESTS
    ========================================================= */

    .surplus-requests-page {
        background: #f7fbf4;
        min-height: 100vh;
        padding: 45px 20px 70px;
    }

    .surplus-requests-container {
        max-width: 1250px;
        margin: 0 auto;
    }


    /* =========================================================
       PAGE HEADER
    ========================================================= */

    .requests-hero {
        background: linear-gradient(135deg, #39a900, #2e8500);
        border-radius: 18px;
        padding: 32px 35px;
        margin-bottom: 25px;
        color: white;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        box-shadow: 0 8px 25px rgba(57, 169, 0, 0.18);
    }

    .requests-hero-content h1 {
        margin: 0 0 8px;
        font-size: 30px;
        font-weight: 700;
        color: white;
    }

    .requests-hero-content p {
        margin: 0;
        font-size: 15px;
        color: rgba(255,255,255,0.9);
    }

    .requests-hero-icon {
        width: 65px;
        height: 65px;
        min-width: 65px;
        border-radius: 16px;
        background: rgba(255,255,255,0.16);
        border: 1px solid rgba(255,255,255,0.25);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
    }


    /* =========================================================
       SUCCESS MESSAGE
    ========================================================= */

    .surplus-success {
        background: #e9f8df;
        border-left: 5px solid #39a900;
        color: #2e6f13;
        border-radius: 10px;
        padding: 15px 18px;
        margin-bottom: 25px;
        font-size: 14px;
        font-weight: 600;
        box-shadow: 0 3px 12px rgba(0,0,0,0.04);
    }


    /* =========================================================
       SUMMARY CARDS
    ========================================================= */

    .summary-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 18px;
        margin-bottom: 28px;
    }

    .summary-card {
        background: white;
        border-radius: 15px;
        padding: 21px;
        border: 1px solid #e7eee3;
        box-shadow: 0 4px 16px rgba(0,0,0,0.05);
        position: relative;
        overflow: hidden;
        transition: 0.25s ease;
    }

    .summary-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 22px rgba(0,0,0,0.08);
    }

    .summary-card::after {
        content: "";
        position: absolute;
        width: 55px;
        height: 55px;
        border-radius: 50%;
        background: #e9f8df;
        right: -18px;
        top: -18px;
    }

    .summary-card h4 {
        margin: 0 0 8px;
        color: #777;
        font-size: 13px;
        font-weight: 600;
        position: relative;
        z-index: 2;
    }

    .summary-number {
        font-size: 28px;
        font-weight: 750;
        color: #222;
        position: relative;
        z-index: 2;
    }

    .summary-label {
        font-size: 12px;
        color: #999;
        margin-top: 3px;
    }


    /* Different card accents */

    .summary-card.total {
        border-top: 4px solid #39a900;
    }

    .summary-card.pending {
        border-top: 4px solid #f7b733;
    }

    .summary-card.accepted {
        border-top: 4px solid #39a900;
    }

    .summary-card.paid {
        border-top: 4px solid #2587c8;
    }


    /* =========================================================
       REQUEST TABLE CARD
    ========================================================= */

    .requests-table-card {
        background: white;
        border-radius: 18px;
        border: 1px solid #e7eee3;
        box-shadow: 0 5px 20px rgba(0,0,0,0.06);
        overflow: hidden;
    }

    .requests-table-header {
        padding: 24px 27px;
        border-bottom: 1px solid #edf1eb;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
    }

    .requests-table-header h2 {
        margin: 0 0 5px;
        font-size: 20px;
        font-weight: 700;
        color: #222;
    }

    .requests-table-header p {
        margin: 0;
        font-size: 13px;
        color: #888;
    }

    .history-badge {
        background: #e9f8df;
        color: #2e8500;
        padding: 8px 13px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        white-space: nowrap;
    }


    /* =========================================================
       TABLE
    ========================================================= */

    .requests-table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    .requests-table {
        width: 100%;
        min-width: 980px;
        border-collapse: collapse;
    }

    .requests-table thead th {
        background: #f7fbf4;
        color: #555;
        padding: 15px 17px;
        font-size: 12px;
        font-weight: 700;
        text-align: left;
        border-bottom: 1px solid #e7eee3;
        white-space: nowrap;
    }

    .requests-table tbody td {
        padding: 17px;
        font-size: 13px;
        color: #555;
        border-bottom: 1px solid #f0f2ef;
        vertical-align: middle;
    }

    .requests-table tbody tr {
        transition: 0.2s ease;
    }

    .requests-table tbody tr:hover {
        background: #fbfdf9;
    }

    .requests-table tbody tr:last-child td {
        border-bottom: none;
    }


    /* =========================================================
       REQUEST ID
    ========================================================= */

    .request-id {
        display: inline-block;
        background: #f1f7ed;
        color: #318800;
        padding: 6px 9px;
        border-radius: 6px;
        font-weight: 700;
        font-size: 12px;
    }


    /* =========================================================
       FOOD NAME
    ========================================================= */

    .food-name {
        color: #222;
        font-weight: 700;
        font-size: 13px;
    }


    /* =========================================================
       QUANTITY
    ========================================================= */

    .quantity-value {
        font-weight: 600;
        color: #333;
    }


    /* =========================================================
       AMOUNT
    ========================================================= */

    .amount {
        font-weight: 700;
        color: #222;
        white-space: nowrap;
    }


    /* =========================================================
       DATE
    ========================================================= */

    .request-date {
        color: #777;
        white-space: nowrap;
    }


    /* =========================================================
       STATUS
    ========================================================= */

    .status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        white-space: nowrap;
    }

    .status-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        display: inline-block;
    }

    .status.pending {
        background: #fff5d9;
        color: #9a6b00;
    }

    .status.pending .status-dot {
        background: #f7b733;
    }

    .status.accepted {
        background: #e9f8df;
        color: #2e8500;
    }

    .status.accepted .status-dot {
        background: #39a900;
    }

    .status.rejected {
        background: #fdeaea;
        color: #b42318;
    }

    .status.rejected .status-dot {
        background: #dc3545;
    }

    .status.paid {
        background: #e4f4f8;
        color: #08758a;
    }

    .status.paid .status-dot {
        background: #08758a;
    }


    /* =========================================================
       PAYMENT TEXT
    ========================================================= */

    .not-paid {
        color: #999;
        font-size: 12px;
        font-weight: 600;
    }


    /* =========================================================
       ACTION BUTTONS
    ========================================================= */

    .action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 8px 13px;
        border-radius: 7px;
        text-decoration: none !important;
        font-size: 12px;
        font-weight: 700;
        transition: 0.2s ease;
        white-space: nowrap;
    }

    .pay-btn {
        background: #39a900;
        color: white !important;
    }

    .pay-btn:hover {
        background: #2e8500;
        color: white !important;
        transform: translateY(-1px);
    }

    .receipt-btn {
        background: #f7b733;
        color: #222 !important;
    }

    .receipt-btn:hover {
        background: #db9b16;
        color: #222 !important;
        transform: translateY(-1px);
    }

    .waiting {
        color: #999;
        font-size: 12px;
        font-weight: 600;
        white-space: nowrap;
    }


    /* =========================================================
       EMPTY STATE
    ========================================================= */

    .empty-state {
        padding: 75px 20px;
        text-align: center;
    }

    .empty-icon {
        width: 75px;
        height: 75px;
        margin: 0 auto 18px;
        border-radius: 50%;
        background: #e9f8df;
        color: #39a900;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
    }

    .empty-state h3 {
        margin: 0 0 8px;
        color: #333;
        font-size: 21px;
        font-weight: 700;
    }

    .empty-state p {
        margin: 0;
        color: #888;
        font-size: 14px;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 950px) {

        .summary-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .requests-hero {
            padding: 28px;
        }

    }


    @media (max-width: 600px) {

        .surplus-requests-page {
            padding: 25px 12px 50px;
        }

        .requests-hero {
            padding: 23px;
            border-radius: 14px;
        }

        .requests-hero-content h1 {
            font-size: 24px;
        }

        .requests-hero-content p {
            font-size: 13px;
        }

        .requests-hero-icon {
            display: none;
        }

        .summary-grid {
            grid-template-columns: 1fr;
        }

        .requests-table-header {
            padding: 20px;
            align-items: flex-start;
            flex-direction: column;
        }

        .history-badge {
            align-self: flex-start;
        }

    }

</style>


<div class="surplus-requests-page">

    <div class="surplus-requests-container">


        {{-- =====================================================
             SUCCESS MESSAGE
        ====================================================== --}}

        @if(session('success'))

            <div class="surplus-success">
                ✓ {{ session('success') }}
            </div>

        @endif


        {{-- =====================================================
             PAGE HEADER
        ====================================================== --}}

        <div class="requests-hero">

            <div class="requests-hero-content">

                <h1>
                    My Food Requests
                </h1>

                <p>
                    Track your food requests, payment status and receipts.
                </p>

            </div>

            <div class="requests-hero-icon">
                <i class="fas fa-clipboard-list"></i>
            </div>

        </div>


        {{-- =====================================================
             SUMMARY CARDS
        ====================================================== --}}

        @if($requests->count() > 0)

            <div class="summary-grid">

                {{-- Total --}}

                <div class="summary-card total">

                    <h4>Total Requests</h4>

                    <div class="summary-number">
                        {{ $requests->count() }}
                    </div>

                    <div class="summary-label">
                        All food requests
                    </div>

                </div>


                {{-- Pending --}}

                <div class="summary-card pending">

                    <h4>Pending Requests</h4>

                    <div class="summary-number">
                        {{ $requests->where('status', 'Pending')->count() }}
                    </div>

                    <div class="summary-label">
                        Waiting for donor
                    </div>

                </div>


                {{-- Accepted --}}

                <div class="summary-card accepted">

                    <h4>Accepted Requests</h4>

                    <div class="summary-number">
                        {{ $requests->where('status', 'Accepted')->count() }}
                    </div>

                    <div class="summary-label">
                        Ready for payment
                    </div>

                </div>


                {{-- Paid --}}

                <div class="summary-card paid">

                    <h4>Paid Requests</h4>

                    <div class="summary-number">

                        {{ $requests->filter(function($item) {

                            return $item->payment &&
                                   $item->payment->payment_status == 'Paid';

                        })->count() }}

                    </div>

                    <div class="summary-label">
                        Completed payments
                    </div>

                </div>

            </div>

        @endif


        {{-- =====================================================
             REQUEST HISTORY
        ====================================================== --}}

        <div class="requests-table-card">


            {{-- Table Header --}}

            <div class="requests-table-header">

                <div>

                    <h2>
                        Request History
                    </h2>

                    <p>
                        View all your food requests and their current status.
                    </p>

                </div>


                @if($requests->count() > 0)

                    <div class="history-badge">

                        {{ $requests->count() }}
                        {{ $requests->count() == 1 ? 'Request' : 'Requests' }}

                    </div>

                @endif

            </div>


            {{-- =================================================
                 REQUESTS EXIST
            ================================================== --}}

            @if($requests->count() > 0)

                <div class="requests-table-wrapper">

                    <table class="requests-table">

                        <thead>

                            <tr>

                                <th>Request ID</th>

                                <th>Food</th>

                                <th>Quantity</th>

                                <th>Total Amount</th>

                                <th>Request Date</th>

                                <th>Status</th>

                                <th>Payment</th>

                                <th>Action</th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($requests as $request)

                                <tr>


                                    {{-- REQUEST ID --}}

                                    <td>

                                        <span class="request-id">

                                            #{{ $request->request_id }}

                                        </span>

                                    </td>


                                    {{-- FOOD --}}

                                    <td>

                                        <span class="food-name">

                                            {{ $request->food->food_name ?? 'Food unavailable' }}

                                        </span>

                                    </td>


                                    {{-- QUANTITY --}}

                                    <td>

                                        <span class="quantity-value">

                                            {{ $request->request_quantity }}

                                        </span>

                                    </td>


                                    {{-- TOTAL AMOUNT --}}

                                    <td>

                                        <span class="amount">

                                            ₹{{ number_format($request->total_amount, 2) }}

                                        </span>

                                    </td>


                                    {{-- REQUEST DATE --}}

                                    <td>

                                        <span class="request-date">

                                            {{ \Carbon\Carbon::parse($request->request_date)->format('d-m-Y') }}

                                        </span>

                                    </td>


                                    {{-- STATUS --}}

                                    <td>

                                        @if($request->payment &&
                                            $request->payment->payment_status == 'Paid')

                                            <span class="status paid">

                                                <span class="status-dot"></span>

                                                Paid

                                            </span>


                                        @elseif($request->status == 'Pending')

                                            <span class="status pending">

                                                <span class="status-dot"></span>

                                                Pending

                                            </span>


                                        @elseif($request->status == 'Accepted')

                                            <span class="status accepted">

                                                <span class="status-dot"></span>

                                                Accepted

                                            </span>


                                        @elseif($request->status == 'Rejected')

                                            <span class="status rejected">

                                                <span class="status-dot"></span>

                                                Rejected

                                            </span>


                                        @else

                                            <span class="status">

                                                {{ $request->status }}

                                            </span>

                                        @endif

                                    </td>


                                    {{-- PAYMENT --}}

                                    <td>

                                        @if($request->payment &&
                                            $request->payment->payment_status == 'Paid')

                                            <span class="status paid">

                                                <span class="status-dot"></span>

                                                Paid

                                            </span>

                                        @else

                                            <span class="not-paid">

                                                Not Paid

                                            </span>

                                        @endif

                                    </td>


                                    {{-- ACTION --}}

                                    <td>


                                        {{-- PAYMENT COMPLETED --}}

                                        @if($request->payment &&
                                            $request->payment->payment_status == 'Paid')

                                            <a
                                                href="{{ route('buyer.payment.receipt', $request->payment->payment_id) }}"
                                                class="action-btn receipt-btn"
                                            >

                                                <i class="fas fa-receipt me-1"></i>

                                                View Receipt

                                            </a>


                                        {{-- ACCEPTED --}}

                                        @elseif($request->status == 'Accepted')

                                            <a
                                                href="{{ route('buyer.payment', $request->request_id) }}"
                                                class="action-btn pay-btn"
                                            >

                                                <i class="fas fa-credit-card me-1"></i>

                                                Pay Now

                                            </a>


                                        {{-- PENDING --}}

                                        @elseif($request->status == 'Pending')

                                            <span class="waiting">

                                                Waiting for donor

                                            </span>


                                        {{-- REJECTED --}}

                                        @elseif($request->status == 'Rejected')

                                            <span class="waiting">

                                                No Payment

                                            </span>


                                        @else

                                            <span class="waiting">

                                                Payment Pending

                                            </span>

                                        @endif


                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>


            {{-- =================================================
                 EMPTY STATE
            ================================================== --}}

            @else

                <div class="empty-state">

                    <div class="empty-icon">

                        <i class="fas fa-clipboard-list"></i>

                    </div>

                    <h3>
                        No Food Requests Found
                    </h3>

                    <p>
                        You have not requested any food yet.
                    </p>

                </div>

            @endif


        </div>

    </div>

</div>

@endsection