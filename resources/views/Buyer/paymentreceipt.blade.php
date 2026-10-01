<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Surplus - Payment Receipt</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 40px 15px;
            font-family: Arial, Helvetica, sans-serif;
            background: #f7fbf4;
            color: #333;
        }

        /* =========================================
           RECEIPT
        ========================================= */

        .receipt {
            width: 520px;
            max-width: 100%;
            margin: auto;
            background: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            border: 1px solid #e4eadf;
        }


        /* =========================================
           HEADER
        ========================================= */

        .receipt-header {
            background: linear-gradient(
                135deg,
                #39a900,
                #2e8500
            );

            color: white;
            padding: 28px 25px;
            text-align: center;
        }

        .logo-icon {
            width: 52px;
            height: 52px;
            margin: 0 auto 12px;

            border-radius: 50%;

            background: rgba(255,255,255,0.16);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 25px;
        }

        .receipt-header h2 {
            margin: 0;
            font-size: 20px;
            font-weight: 700;
            letter-spacing: 0.4px;
        }

        .receipt-header p {
            margin: 7px 0 0;
            font-size: 13px;
            color: rgba(255,255,255,0.9);
        }


        /* =========================================
           BODY
        ========================================= */

        .receipt-body {
            padding: 28px;
        }


        /* =========================================
           SUCCESS
        ========================================= */

        .payment-success {
            text-align: center;
            margin-bottom: 25px;
        }

        .success-icon {
            width: 48px;
            height: 48px;

            margin: 0 auto 10px;

            border-radius: 50%;

            background: #e9f8df;
            color: #39a900;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 23px;
            font-weight: bold;
        }

        .payment-success h3 {
            margin: 0;
            font-size: 16px;
            color: #2e8500;
            font-weight: 700;
        }

        .payment-success p {
            margin: 5px 0 0;
            font-size: 12px;
            color: #888;
        }


        /* =========================================
           RECEIPT DETAILS
        ========================================= */

        .details-title {
            font-size: 14px;
            font-weight: 700;
            color: #222;

            padding-bottom: 10px;

            border-bottom: 2px solid #39a900;

            margin-bottom: 5px;
        }

        .receipt-table {
            width: 100%;
            border-collapse: collapse;
        }

        .receipt-table tr {
            border-bottom: 1px solid #edf0eb;
        }

        .receipt-table tr:last-child {
            border-bottom: none;
        }

        .receipt-table td {
            padding: 11px 4px;
            font-size: 13px;
            vertical-align: middle;
        }

        .receipt-table td:first-child {
            width: 42%;
            color: #777;
            font-weight: 600;
        }

        .receipt-table td:last-child {
            color: #333;
            font-weight: 600;
            text-align: right;
        }


        /* =========================================
           RECEIPT NUMBER
        ========================================= */

        .receipt-number {
            color: #39a900 !important;
            font-weight: 700 !important;
        }


        /* =========================================
           STATUS
        ========================================= */

        .status-paid {
            display: inline-block;

            background: #e9f8df;
            color: #2e8500;

            padding: 5px 10px;

            border-radius: 20px;

            font-size: 11px;
            font-weight: 700;
        }


        /* =========================================
           AMOUNT
        ========================================= */

        .amount-value {
            color: #39a900 !important;
            font-size: 15px !important;
            font-weight: 700 !important;
        }


        /* =========================================
           PICKUP INFORMATION
        ========================================= */

        .pickup-box {
            margin-top: 24px;

            padding: 17px;

            background: #f7fbf4;

            border-left: 4px solid #39a900;

            border-radius: 8px;
        }

        .pickup-title {
            color: #2e8500;
            font-size: 13px;
            font-weight: 700;

            margin-bottom: 7px;
        }

        .pickup-text {
            margin: 0;

            color: #666;

            font-size: 12px;

            line-height: 1.6;
        }


        /* =========================================
           FOOTER
        ========================================= */

        .receipt-footer {
            text-align: center;

            margin-top: 25px;
            padding-top: 18px;

            border-top: 1px solid #eee;

            color: #888;

            font-size: 11px;
            line-height: 1.5;
        }

        .receipt-footer strong {
            color: #39a900;
        }


        /* =========================================
           ACTIONS
        ========================================= */

        .actions {
            text-align: center;
            margin-top: 22px;
        }

        .actions a,
        .actions button {

            display: inline-block;

            border: none;

            padding: 10px 16px;

            margin: 4px;

            border-radius: 7px;

            font-size: 12px;

            font-weight: 700;

            text-decoration: none;

            cursor: pointer;

            transition: 0.2s ease;
        }


        .print-btn {
            background: #222;
            color: white;
        }

        .print-btn:hover {
            background: #111;
        }


        .download-btn {
            background: #39a900;
            color: white;
        }

        .download-btn:hover {
            background: #2e8500;
            color: white;
        }


        /* =========================================
           PRINT
        ========================================= */

        @media print {

            body {
                background: white;
                padding: 0;
            }

            .receipt {
                width: 520px;
                max-width: 100%;
                box-shadow: none;
                border: none;
                border-radius: 0;
            }

            .actions {
                display: none !important;
            }

        }


        /* =========================================
           MOBILE
        ========================================= */

        @media (max-width: 550px) {

            body {
                padding: 20px 10px;
            }

            .receipt-body {
                padding: 22px 18px;
            }

            .receipt-header {
                padding: 24px 18px;
            }

            .receipt-header h2 {
                font-size: 17px;
            }

            .receipt-table td {
                font-size: 12px;
            }

            .receipt-table td:first-child {
                width: 40%;
            }

        }

    </style>

</head>


<body>


<div class="receipt">


    {{-- =========================================
         HEADER
    ========================================== --}}

    <div class="receipt-header">

        <div class="logo-icon">
            ♻
        </div>

        <h2>
            SURPLUS
        </h2>

        <p>
            Surplus Food Management System
        </p>

    </div>


    {{-- =========================================
         BODY
    ========================================== --}}

    <div class="receipt-body">


        {{-- PAYMENT SUCCESS --}}

        <div class="payment-success">

            <div class="success-icon">
                ✓
            </div>

            <h3>
                PAYMENT SUCCESSFUL
            </h3>

            <p>
                Your payment has been successfully completed.
            </p>

        </div>


        {{-- DETAILS TITLE --}}

        <div class="details-title">
            Payment Details
        </div>


        {{-- =========================================
             PAYMENT DETAILS
        ========================================== --}}

        <table class="receipt-table">

            <tr>

                <td>
                    Receipt No.
                </td>

                <td class="receipt-number">

                    PAY-{{ str_pad($payment->payment_id, 6, '0', STR_PAD_LEFT) }}

                </td>

            </tr>


            <tr>

                <td>
                    Date
                </td>

                <td>

                    {{ \Carbon\Carbon::parse($payment->payment_date)->format('d-m-Y') }}

                </td>

            </tr>


            <tr>

                <td>
                    Status
                </td>

                <td>

                    <span class="status-paid">

                        {{ strtoupper($payment->payment_status) }}

                    </span>

                </td>

            </tr>


            <tr>

                <td>
                    Buyer
                </td>

                <td>

                    {{ $payment->purchaseRequest->buyer->buyer_name }}

                </td>

            </tr>


            <tr>

                <td>
                    Food
                </td>

                <td>

                    {{ $payment->purchaseRequest->food->food_name }}

                </td>

            </tr>


            <tr>

                <td>
                    Quantity
                </td>

                <td>

                    {{ $payment->purchaseRequest->request_quantity }}

                </td>

            </tr>


            <tr>

                <td>
                    Amount
                </td>

                <td class="amount-value">

                    ₹{{ number_format($payment->total_amount, 2) }}

                </td>

            </tr>


            <tr>

                <td>
                    Donor
                </td>

                <td>

                    {{ $payment->purchaseRequest->food->donor->donor_name }}

                </td>

            </tr>

        </table>


        {{-- =========================================
             PICKUP INFORMATION
        ========================================== --}}

        <div class="pickup-box">

            <div class="pickup-title">
                Pickup Information
            </div>

            <p class="pickup-text">

                The purchased food is available for self-pickup
                from the corresponding donor. Please contact
                the donor to coordinate the pickup.

            </p>

        </div>


        {{-- =========================================
             FOOTER
        ========================================== --}}

        <div class="receipt-footer">

            Thank you for using
            <strong>Surplus</strong>.

            <br>

            Together, we can reduce food waste.

        </div>


        {{-- =========================================
             ACTION BUTTONS
        ========================================== --}}

        @if(request()->routeIs('buyer.payment.receipt'))

            <div class="actions">

                <button
                    class="print-btn"
                    onclick="window.print()"
                >

                    Print Receipt

                </button>


                <a
                    class="download-btn"
                    href="{{ route('buyer.payment.download', $payment->payment_id) }}"
                >

                    Download Receipt

                </a>

            </div>

        @endif


    </div>

</div>


</body>

</html>