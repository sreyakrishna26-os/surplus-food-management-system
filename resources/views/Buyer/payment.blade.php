@extends('layouts.Buyermaster')

@section('content')

<style>
    .payment-page {
        background: #f8f8f8;
        min-height: 100vh;
        padding: 50px 20px;
    }

    .payment-container {
        max-width: 600px;
        margin: auto;
    }

    .payment-box {
        background: white;
        padding: 35px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }

    .payment-title {
        text-align: center;
        margin-bottom: 30px;
    }

    .payment-title h1 {
        font-size: 30px;
        margin-bottom: 8px;
    }

    .payment-title p {
        color: #777;
    }

    .details {
        border: 1px solid #eee;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 25px;
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px solid #eee;
    }

    .detail-row:last-child {
        border-bottom: none;
    }

    .detail-label {
        font-weight: 600;
    }

    .amount {
        font-size: 22px;
        font-weight: 700;
    }

    .payment-button {
        width: 100%;
        border: none;
        padding: 13px;
        background: #28a745;
        color: white;
        font-size: 16px;
        font-weight: 600;
        border-radius: 6px;
        cursor: pointer;
    }

    .payment-button:hover {
        background: #218838;
    }

    .back-link {
        display: block;
        text-align: center;
        margin-top: 18px;
        color: #555;
        text-decoration: none;
    }
</style>

<div class="payment-page">

    <div class="payment-container">

        <div class="payment-box">

            <div class="payment-title">
                <h1>Make Payment</h1>
                <p>Complete your payment for the food request</p>
            </div>

            <div class="details">

                <div class="detail-row">
                    <span class="detail-label">Request ID</span>
                    <span>
                        {{ $purchaseRequest->request_id }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Food</span>
                    <span>
                        {{ $purchaseRequest->food->food_name ?? 'Food unavailable' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Quantity</span>
                    <span>
                        {{ $purchaseRequest->request_quantity }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Amount</span>
                    <span class="amount">
                        ₹{{ number_format($purchaseRequest->total_amount, 2) }}
                    </span>
                </div>

            </div>

            <form method="POST"
                  action="{{ route('buyer.payment.process', $purchaseRequest->request_id) }}">

                @csrf

                <button type="submit" class="payment-button">
                    Pay ₹{{ number_format($purchaseRequest->total_amount, 2) }}
                </button>

            </form>

            <a href="{{ route('buyer.my.requests') }}"
               class="back-link">
                ← Back to My Requests
            </a>

        </div>

    </div>

</div>

@endsection