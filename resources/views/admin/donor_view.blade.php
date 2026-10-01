@extends('layouts.Adminmaster')

@section('content')

<div class="container-fluid py-4">

    <h4 class="fw-bold mb-4">
        Donor Details
    </h4>

    <div class="card">

        <div class="card-body">

            <h5 class="mb-4">
                {{ $donor->donor_name }}
            </h5>

            <p>
                <strong>Email:</strong>
                {{ $donor->donor_email ?? 'N/A' }}
            </p>

            <p>
                <strong>Phone:</strong>
                {{ $donor->donor_phone ?? 'N/A' }}
            </p>

            <p>
                <strong>Address:</strong>
                {{ $donor->donor_address ?? 'N/A' }}
            </p>

            <p>
                <strong>Registration Date:</strong>
                {{ $donor->reg_date ?? 'N/A' }}
            </p>

            <p>
                <strong>License Number:</strong>
                {{ $donor->license_number ?? 'N/A' }}
            </p>

            <p>
                <strong>Status:</strong>
                {{ $donor->status ?? 'N/A' }}
            </p>

            <a href="{{ route('admin.donors') }}"
               class="btn btn-secondary">
                Back to Donors
            </a>

        </div>

    </div>

</div>

@endsection