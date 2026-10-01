@extends('layouts.Donormaster')

@section('content')

<style>

    .requests-page {
        background: #f8f8f8;
        min-height: 100vh;
        padding: 45px 20px 70px;
    }

    .requests-container {
        max-width: 1250px;
        margin: auto;
    }

    .requests-header {
        margin-bottom: 30px;
    }

    .requests-header h1 {
        font-size: 30px;
        font-weight: 700;
        color: #222;
        margin-bottom: 8px;
    }

    .requests-header p {
        color: #777;
        font-size: 15px;
        margin: 0;
    }

    /* Success / Error Message */

    .request-message {
        padding: 14px 18px;
        border-radius: 7px;
        margin-bottom: 20px;
        font-size: 14px;
        font-weight: 500;
    }

    .success-message {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .error-message {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    /* Table Card */

    .requests-card {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 3px 15px rgba(0,0,0,0.07);
        overflow: hidden;
    }

    .table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    .requests-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 1150px;
    }

    .requests-table thead {
        background: #222;
        color: #fff;
    }

    .requests-table th {
        padding: 15px 14px;
        text-align: left;
        font-size: 13px;
        font-weight: 600;
        white-space: nowrap;
    }

    .requests-table td {
        padding: 16px 14px;
        border-bottom: 1px solid #eee;
        font-size: 13px;
        color: #555;
        vertical-align: middle;
    }

    .requests-table tbody tr:hover {
        background: #fafafa;
    }

    .requests-table tbody tr:last-child td {
        border-bottom: none;
    }

    /* Text */

    .request-id {
        font-weight: 600;
        color: #222;
    }

    .buyer-name {
        font-weight: 600;
        color: #222;
    }

    .buyer-type {
        display: inline-block;
        padding: 5px 9px;
        border-radius: 5px;
        background: #f1f1f1;
        color: #444;
        font-size: 12px;
    }

    .food-name {
        font-weight: 600;
        color: #222;
    }

    .quantity {
        font-weight: 600;
        color: #222;
    }

    .amount {
        font-weight: 600;
        color: #222;
    }

    /* Status */

    .status {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        white-space: nowrap;
    }

    .status-pending {
        background: #fff3cd;
        color: #856404;
    }

    .status-accepted {
        background: #d4edda;
        color: #155724;
    }

    .status-rejected {
        background: #f8d7da;
        color: #721c24;
    }

    /* Action Buttons */

    .action-buttons {
        display: flex;
        gap: 8px;
        align-items: center;
    }

    .action-buttons form {
        margin: 0;
    }

    .accept-btn,
    .reject-btn {
        border: none;
        padding: 8px 13px;
        border-radius: 5px;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s ease;
        white-space: nowrap;
    }

    .accept-btn {
        background: #198754;
        color: #fff;
    }

    .accept-btn:hover {
        background: #157347;
    }

    .reject-btn {
        background: #dc3545;
        color: #fff;
    }

    .reject-btn:hover {
        background: #bb2d3b;
    }

    .processed-text {
        font-size: 12px;
        font-weight: 600;
        color: #777;
        white-space: nowrap;
    }

    /* Empty State */

    .empty-requests {
        background: #fff;
        padding: 70px 20px;
        text-align: center;
        border-radius: 10px;
        box-shadow: 0 3px 15px rgba(0,0,0,0.07);
    }

    .empty-requests h3 {
        color: #333;
        margin-bottom: 8px;
    }

    .empty-requests p {
        color: #777;
        margin: 0;
    }

    /* Responsive */

    @media (max-width: 768px) {

        .requests-page {
            padding: 30px 15px 50px;
        }

        .requests-header h1 {
            font-size: 25px;
        }

    }

</style>


<div class="requests-page">

    <div class="requests-container">

        <!-- Page Header -->

        <div class="requests-header">

            <h1>Food Requests</h1>

            <p>
                Review purchase requests received from buyers for your registered food items.
            </p>

        </div>


        <!-- Success Message -->

        @if(session('success'))

            <div class="request-message success-message">
                {{ session('success') }}
            </div>

        @endif


        <!-- Error Message -->

        @if(session('error'))

            <div class="request-message error-message">
                {{ session('error') }}
            </div>

        @endif


        @if($requests->count() > 0)

            <div class="requests-card">

                <div class="table-wrapper">

                    <table class="requests-table">

                        <thead>

                            <tr>

                                <th>Request ID</th>

                                <th>Buyer</th>

                                <th>Type</th>

                                <th>Phone</th>

                                <th>Location</th>

                                <th>Food</th>

                                <th>Quantity</th>

                                <th>Total Amount</th>

                                <th>Request Date</th>

                                <th>Status</th>

                                <th>Action</th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($requests as $request)

                                <tr>

                                    <!-- Request ID -->

                                    <td>

                                        <span class="request-id">
                                            #{{ $request->request_id }}
                                        </span>

                                    </td>


                                    <!-- Buyer -->

                                    <td>

                                        <span class="buyer-name">
                                            {{ $request->buyer->buyer_name ?? 'N/A' }}
                                        </span>

                                    </td>


                                    <!-- Buyer Type -->

                                    <td>

                                        <span class="buyer-type">
                                            {{ $request->buyer->buyer_type ?? 'N/A' }}
                                        </span>

                                    </td>


                                    <!-- Phone -->

                                    <td>

                                        {{ $request->buyer->buyer_phone ?? 'N/A' }}

                                    </td>


                                    <!-- Location -->

                                    <td>

                                        {{ $request->buyer->location->location_name ?? 'N/A' }}

                                    </td>


                                    <!-- Food -->

                                    <td>

                                        <span class="food-name">
                                            {{ $request->food->food_name ?? 'N/A' }}
                                        </span>

                                    </td>


                                    <!-- Requested Quantity -->

                                    <td>

                                        <span class="quantity">
                                            {{ $request->request_quantity }}
                                        </span>

                                    </td>


                                    <!-- Total Amount -->

                                    <td>

                                        <span class="amount">
                                            ₹{{ number_format($request->total_amount, 2) }}
                                        </span>

                                    </td>


                                    <!-- Request Date -->

                                    <td>

                                        {{ \Carbon\Carbon::parse($request->request_date)->format('d M Y, h:i A') }}

                                    </td>


                                    <!-- Status -->

                                    <td>

                                        @if($request->status == 'Pending')

                                            <span class="status status-pending">
                                                Pending
                                            </span>

                                        @elseif($request->status == 'Accepted')

                                            <span class="status status-accepted">
                                                Accepted
                                            </span>

                                        @elseif($request->status == 'Rejected')

                                            <span class="status status-rejected">
                                                Rejected
                                            </span>

                                        @else

                                            <span class="status">
                                                {{ $request->status }}
                                            </span>

                                        @endif

                                    </td>


                                    <!-- Action -->

                                    <td>

                                        @if($request->status == 'Pending')

                                            <div class="action-buttons">

                                                <!-- Accept -->

                                                <form
                                                    method="POST"
                                                    action="{{ route('donor.food.request.accept', $request->request_id) }}"
                                                    onsubmit="return confirm('Are you sure you want to accept this food request?');"
                                                >

                                                    @csrf

                                                    @method('PUT')

                                                    <button
                                                        type="submit"
                                                        class="accept-btn"
                                                    >
                                                        Accept
                                                    </button>

                                                </form>


                                                <!-- Reject -->

                                                <form
                                                    method="POST"
                                                    action="{{ route('donor.food.request.reject', $request->request_id) }}"
                                                    onsubmit="return confirm('Are you sure you want to reject this food request?');"
                                                >

                                                    @csrf

                                                    @method('PUT')

                                                    <button
                                                        type="submit"
                                                        class="reject-btn"
                                                    >
                                                        Reject
                                                    </button>

                                                </form>

                                            </div>

                                        @elseif($request->status == 'Accepted')

                                            <span class="processed-text">
                                                Request Accepted
                                            </span>

                                        @elseif($request->status == 'Rejected')

                                            <span class="processed-text">
                                                Request Rejected
                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        @else

            <div class="empty-requests">

                <h3>No Food Requests</h3>

                <p>
                    You have not received any food requests from buyers yet.
                </p>

            </div>

        @endif

    </div>

</div>

@endsection