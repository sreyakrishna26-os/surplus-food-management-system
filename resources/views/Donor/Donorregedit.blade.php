@extends('layouts.Adminmaster')

@section('content')

<div class="container-fluid py-4">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-bold mb-1">
                <i class="ti ti-user-edit me-2"></i>
                Edit Donor
            </h4>

            <p class="text-muted mb-0">
                Update donor information.
            </p>
        </div>

    </div>


    <!-- Success Message -->
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            <i class="ti ti-circle-check me-2"></i>

            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    <!-- Validation Errors -->
    @if ($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-11">

            <div class="card border-0 shadow-sm">

                <!-- Card Header -->
                <div class="card-header bg-primary text-white py-3">

                    <h5 class="mb-0 fw-semibold">

                        <i class="ti ti-user me-2"></i>

                        Edit Donor Information

                    </h5>

                </div>


                <div class="card-body p-4">

                    {{-- IMPORTANT: POST route --}}
                    <form
                        action="{{ route('donor_update', $donor->donor_id) }}"
                        method="POST"
                        enctype="multipart/form-data">

                        @csrf


                        <!-- ================= PERSONAL DETAILS ================= -->

                        <div class="mb-4">

                            <h6 class="fw-bold text-primary border-bottom pb-2 mb-4">

                                <i class="ti ti-user me-2"></i>

                                Personal Details

                            </h6>


                            <div class="row g-3">

                                <!-- Donor Name -->
                                <div class="col-md-6">

                                    <label class="form-label fw-semibold">

                                        Donor Name
                                        <span class="text-danger">*</span>

                                    </label>

                                    <input
                                        type="text"
                                        class="form-control @error('donor_name') is-invalid @enderror"
                                        name="donor_name"
                                        value="{{ old('donor_name', $donor->donor_name) }}"
                                        required
                                    >

                                    @error('donor_name')

                                        <div class="text-danger small mt-1">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>


                                <!-- Email -->
                                <div class="col-md-6">

                                    <label class="form-label fw-semibold">

                                        Email Address
                                        <span class="text-danger">*</span>

                                    </label>

                                    <input
                                        type="email"
                                        class="form-control @error('donor_email') is-invalid @enderror"
                                        name="donor_email"
                                        value="{{ old('donor_email', $donor->donor_email) }}"
                                        required
                                    >

                                    @error('donor_email')

                                        <div class="text-danger small mt-1">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>


                                <!-- Phone -->
                                <div class="col-md-6">

                                    <label class="form-label fw-semibold">

                                        Phone Number
                                        <span class="text-danger">*</span>

                                    </label>

                                    <input
                                        type="text"
                                        class="form-control @error('donor_phone') is-invalid @enderror"
                                        name="donor_phone"
                                        value="{{ old('donor_phone', $donor->donor_phone) }}"
                                        required
                                    >

                                    @error('donor_phone')

                                        <div class="text-danger small mt-1">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>


                                <!-- Registration Date -->
                                <div class="col-md-6">

                                    <label class="form-label fw-semibold">

                                        Registration Date
                                        <span class="text-danger">*</span>

                                    </label>

                                    <input
                                        type="date"
                                        class="form-control @error('reg_date') is-invalid @enderror"
                                        name="reg_date"
                                        value="{{ old('reg_date', $donor->reg_date) }}"
                                        required
                                    >

                                    @error('reg_date')

                                        <div class="text-danger small mt-1">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>

                            </div>

                        </div>


                        <!-- ================= ADDRESS ================= -->

                        <div class="mb-4">

                            <h6 class="fw-bold text-primary border-bottom pb-2 mb-4">

                                <i class="ti ti-map-pin me-2"></i>

                                Address & Location

                            </h6>


                            <div class="row g-3">

                                <!-- Address -->
                                <div class="col-md-8">

                                    <label class="form-label fw-semibold">

                                        Address
                                        <span class="text-danger">*</span>

                                    </label>

                                    <textarea
                                        class="form-control @error('donor_address') is-invalid @enderror"
                                        name="donor_address"
                                        rows="4"
                                        required
                                    >{{ old('donor_address', $donor->donor_address) }}</textarea>

                                    @error('donor_address')

                                        <div class="text-danger small mt-1">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>


                                <!-- Location -->
                                <div class="col-md-4">

                                    <label class="form-label fw-semibold">

                                        Location
                                        <span class="text-danger">*</span>

                                    </label>

                                    <select
                                        class="form-select @error('location_id') is-invalid @enderror"
                                        name="location_id"
                                        required
                                    >

                                        <option value="">
                                            Select Location
                                        </option>


                                        @foreach($locations as $location)

                                            <option
                                                value="{{ $location->location_id }}"
                                                {{ old('location_id', $donor->location_id) == $location->location_id ? 'selected' : '' }}
                                            >

                                                {{ $location->location_name }}

                                            </option>

                                        @endforeach

                                    </select>


                                    @error('location_id')

                                        <div class="text-danger small mt-1">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>

                            </div>

                        </div>


                        <!-- ================= VERIFICATION ================= -->

                        <div class="mb-4">

                            <h6 class="fw-bold text-primary border-bottom pb-2 mb-4">

                                <i class="ti ti-shield-check me-2"></i>

                                Verification Details

                            </h6>


                            <div class="row g-3">

                                <!-- ID Proof -->
                                <div class="col-md-6">

                                    <label class="form-label fw-semibold">

                                        ID Proof

                                    </label>


                                    @if($donor->id_proof)

                                        <div class="mb-2">

                                            <a
                                                href="{{ asset('storage/' . $donor->id_proof) }}"
                                                target="_blank"
                                                class="btn btn-sm btn-outline-primary">

                                                <i class="ti ti-eye me-1"></i>

                                                View Current ID Proof

                                            </a>

                                        </div>

                                    @endif


                                    <input
                                        type="file"
                                        class="form-control @error('id_proof') is-invalid @enderror"
                                        name="id_proof"
                                        accept=".jpg,.jpeg,.png,.pdf"
                                    >

                                    <small class="text-muted">

                                        Leave empty to keep the existing ID proof.

                                    </small>


                                    @error('id_proof')

                                        <div class="text-danger small mt-1">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>


                                <!-- License -->
                                <div class="col-md-6">

                                    <label class="form-label fw-semibold">

                                        License Number

                                    </label>

                                    <input
                                        type="text"
                                        class="form-control @error('license_number') is-invalid @enderror"
                                        name="license_number"
                                        value="{{ old('license_number', $donor->license_number) }}"
                                    >

                                    @error('license_number')

                                        <div class="text-danger small mt-1">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>

                            </div>

                        </div>


                        <!-- ================= STATUS ================= -->

                       <!-- ================= STATUS ================= -->

<div class="mb-4">

    <h6 class="fw-bold text-primary border-bottom pb-2 mb-4">

        <i class="ti ti-settings me-2"></i>

        Account Approval

    </h6>

    <div class="row g-3">

        <div class="col-md-6">

            <label class="form-label fw-semibold">
                Status
            </label>

            <select
                class="form-select"
                name="status"
            >

                <option value="Pending"
                    {{ old('status', $donor->status) == 'Pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="Approved"
                    {{ old('status', $donor->status) == 'Approved' ? 'selected' : '' }}>
                    Approved
                </option>

                <option value="Rejected"
                    {{ old('status', $donor->status) == 'Rejected' ? 'selected' : '' }}>
                    Rejected
                </option>

            </select>

        </div>

    </div>

</div>

                        <!-- ================= BUTTONS ================= -->

                        <div class="border-top pt-4 d-flex justify-content-end gap-2">


                            <a
                                href="{{ route('donor_view') }}"
                                class="btn btn-light border px-4">

                                <i class="ti ti-arrow-left me-1"></i>

                                Cancel

                            </a>


                            <button
                                type="reset"
                                class="btn btn-outline-secondary px-4">

                                <i class="ti ti-refresh me-1"></i>

                                Reset

                            </button>


                            <button
                                type="submit"
                                class="btn btn-primary px-4">

                                <i class="ti ti-device-floppy me-1"></i>

                                Update Donor

                            </button>

                        </div>


                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection