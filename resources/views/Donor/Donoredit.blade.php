@extends('layouts.Adminmaster')

@section('content')

<div class="container-fluid py-4">

    <!-- ===================================================== -->
    <!-- PAGE HEADER -->
    <!-- ===================================================== -->

    <div class="mb-4">

        <h4 class="fw-bold mb-1">
            <i class="ti ti-user-edit me-2"></i>
            Edit Donor
        </h4>

        <p class="text-muted mb-0">
            Update the registered donor information.
        </p>

    </div>


    <!-- ===================================================== -->
    <!-- SUCCESS MESSAGE -->
    <!-- ===================================================== -->

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show shadow-sm"
             role="alert">

            <i class="ti ti-circle-check me-2"></i>

            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    <!-- ===================================================== -->
    <!-- ERROR MESSAGE -->
    <!-- ===================================================== -->

    @if(session('error'))

        <div class="alert alert-danger alert-dismissible fade show shadow-sm"
             role="alert">

            <i class="ti ti-alert-circle me-2"></i>

            {{ session('error') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    <!-- ===================================================== -->
    <!-- VALIDATION ERRORS -->
    <!-- ===================================================== -->

    @if($errors->any())

        <div class="alert alert-danger shadow-sm">

            <strong>
                <i class="ti ti-alert-circle me-2"></i>
                Please correct the following errors:
            </strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <!-- ===================================================== -->
    <!-- MAIN CARD -->
    <!-- ===================================================== -->

    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-11">

            <div class="card border-0 shadow-sm">


                <!-- ===================================================== -->
                <!-- CARD HEADER -->
                <!-- ===================================================== -->

                <div class="card-header bg-primary text-white py-3">

                    <h5 class="mb-1 fw-semibold">

                        <i class="ti ti-user-edit me-2"></i>

                        Donor Information

                    </h5>

                    <small>
                        Update the donor details carefully.
                    </small>

                </div>


                <!-- ===================================================== -->
                <!-- CARD BODY -->
                <!-- ===================================================== -->

                <div class="card-body p-4">


                    <!-- ================================================= -->
                    <!-- FORM -->
                    <!-- ================================================= -->

                    <form
                        action="{{ route('donor_update', $donor->donor_id) }}"
                        method="POST"
                        enctype="multipart/form-data">

                        @csrf

                        @method('PUT')


                        <!-- ===================================================== -->
                        <!-- PERSONAL DETAILS -->
                        <!-- ===================================================== -->

                        <div class="mb-4">

                            <h6 class="fw-bold text-primary border-bottom pb-2 mb-4">

                                <i class="ti ti-user me-2"></i>

                                Personal Details

                            </h6>


                            <div class="row g-3">


                                <!-- DONOR NAME -->

                                <div class="col-md-6">

                                    <label
                                        for="donor_name"
                                        class="form-label fw-semibold">

                                        Donor Name
                                        <span class="text-danger">*</span>

                                    </label>

                                    <div class="input-group">

                                        <span class="input-group-text">
                                            <i class="ti ti-user"></i>
                                        </span>

                                        <input
                                            type="text"
                                            class="form-control @error('donor_name') is-invalid @enderror"
                                            id="donor_name"
                                            name="donor_name"
                                            value="{{ old('donor_name', $donor->donor_name) }}"
                                            placeholder="Enter donor name"
                                            required>

                                    </div>

                                    @error('donor_name')
                                        <div class="text-danger small mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                <!-- EMAIL -->

                                <div class="col-md-6">

                                    <label
                                        for="donor_email"
                                        class="form-label fw-semibold">

                                        Email Address
                                        <span class="text-danger">*</span>

                                    </label>

                                    <div class="input-group">

                                        <span class="input-group-text">
                                            <i class="ti ti-mail"></i>
                                        </span>

                                        <input
                                            type="email"
                                            class="form-control @error('donor_email') is-invalid @enderror"
                                            id="donor_email"
                                            name="donor_email"
                                            value="{{ old('donor_email', $donor->donor_email) }}"
                                            placeholder="example@email.com"
                                            required>

                                    </div>

                                    @error('donor_email')
                                        <div class="text-danger small mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                <!-- USERNAME -->

                                <div class="col-md-6">

                                    <label
                                        for="username"
                                        class="form-label fw-semibold">

                                        Username
                                        <span class="text-danger">*</span>

                                    </label>

                                    <div class="input-group">

                                        <span class="input-group-text">
                                            <i class="ti ti-user-circle"></i>
                                        </span>

                                        <input
                                            type="text"
                                            class="form-control @error('username') is-invalid @enderror"
                                            id="username"
                                            name="username"
                                            value="{{ old('username', $login->username ?? '') }}"
                                            placeholder="Username"
                                            required>

                                    </div>

                                    @error('username')
                                        <div class="text-danger small mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                <!-- PHONE -->

                                <div class="col-md-6">

                                    <label
                                        for="donor_phone"
                                        class="form-label fw-semibold">

                                        Phone Number
                                        <span class="text-danger">*</span>

                                    </label>

                                    <div class="input-group">

                                        <span class="input-group-text">
                                            <i class="ti ti-phone"></i>
                                        </span>

                                        <input
                                            type="tel"
                                            class="form-control @error('donor_phone') is-invalid @enderror"
                                            id="donor_phone"
                                            name="donor_phone"
                                            value="{{ old('donor_phone', $donor->donor_phone) }}"
                                            placeholder="Enter phone number"
                                            required>

                                    </div>

                                    @error('donor_phone')
                                        <div class="text-danger small mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                <!-- REGISTRATION DATE -->

                                <div class="col-md-6">

                                    <label
                                        for="reg_date"
                                        class="form-label fw-semibold">

                                        Registration Date
                                        <span class="text-danger">*</span>

                                    </label>

                                    <div class="input-group">

                                        <span class="input-group-text">
                                            <i class="ti ti-calendar"></i>
                                        </span>

                                        <input
                                            type="date"
                                            class="form-control @error('reg_date') is-invalid @enderror"
                                            id="reg_date"
                                            name="reg_date"
                                            value="{{ old('reg_date', $donor->reg_date) }}"
                                            required>

                                    </div>

                                    @error('reg_date')
                                        <div class="text-danger small mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                            </div>

                        </div>


                        <!-- ===================================================== -->
                        <!-- LOGIN & PASSWORD -->
                        <!-- ===================================================== -->

                        <div class="mb-4">

                            <h6 class="fw-bold text-primary border-bottom pb-2 mb-4">

                                <i class="ti ti-lock me-2"></i>

                                Login & Password

                            </h6>


                            <!-- IMPORTANT INFORMATION -->

                            <div class="alert alert-info">

                                <i class="ti ti-info-circle me-2"></i>

                                <strong>Username:</strong>
                                Your registered username is shown above.

                                <br>

                                <strong>Password:</strong>
                                For security reasons, the existing password
                                cannot be displayed. Enter a new password only
                                if you want to change it.

                            </div>


                            <div class="row g-3">


                                <!-- ================================================= -->
                                <!-- NEW PASSWORD -->
                                <!-- ================================================= -->

                                <div class="col-md-6">

                                    <label
                                        for="password"
                                        class="form-label fw-semibold">

                                        New Password

                                    </label>


                                    <div class="input-group">

                                        <span class="input-group-text">
                                            <i class="ti ti-lock"></i>
                                        </span>


                                        <input
                                            type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            id="password"
                                            name="password"
                                            placeholder="Enter new password"
                                            autocomplete="new-password">


                                        <!-- EYE BUTTON -->

                                        <button
                                            type="button"
                                            class="btn btn-outline-secondary"
                                            onclick="togglePassword('password', 'passwordEye')"
                                            title="Show/Hide Password">

                                            <i
                                                class="ti ti-eye"
                                                id="passwordEye">
                                            </i>

                                        </button>

                                    </div>


                                    <small class="text-muted">

                                        Leave empty to keep the current password.

                                    </small>


                                    @error('password')

                                        <div class="text-danger small mt-1">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>


                                <!-- ================================================= -->
                                <!-- CONFIRM PASSWORD -->
                                <!-- ================================================= -->

                                <div class="col-md-6">

                                    <label
                                        for="password_confirmation"
                                        class="form-label fw-semibold">

                                        Confirm New Password

                                    </label>


                                    <div class="input-group">

                                        <span class="input-group-text">
                                            <i class="ti ti-lock-check"></i>
                                        </span>


                                        <input
                                            type="password"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            id="password_confirmation"
                                            name="password_confirmation"
                                            placeholder="Re-enter new password"
                                            autocomplete="new-password">


                                        <!-- EYE BUTTON -->

                                        <button
                                            type="button"
                                            class="btn btn-outline-secondary"
                                            onclick="togglePassword('password_confirmation', 'confirmPasswordEye')"
                                            title="Show/Hide Password">

                                            <i
                                                class="ti ti-eye"
                                                id="confirmPasswordEye">
                                            </i>

                                        </button>

                                    </div>


                                    @error('password_confirmation')

                                        <div class="text-danger small mt-1">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>

                            </div>

                        </div>


                        <!-- ===================================================== -->
                        <!-- ADDRESS & LOCATION -->
                        <!-- ===================================================== -->

                        <div class="mb-4">

                            <h6 class="fw-bold text-primary border-bottom pb-2 mb-4">

                                <i class="ti ti-map-pin me-2"></i>

                                Address & Location

                            </h6>


                            <div class="row g-3">


                                <!-- ADDRESS -->

                                <div class="col-md-8">

                                    <label
                                        for="donor_address"
                                        class="form-label fw-semibold">

                                        Address
                                        <span class="text-danger">*</span>

                                    </label>

                                    <textarea
                                        class="form-control @error('donor_address') is-invalid @enderror"
                                        id="donor_address"
                                        name="donor_address"
                                        rows="4"
                                        placeholder="Enter complete donor address"
                                        required>{{ old('donor_address', $donor->donor_address) }}</textarea>

                                    @error('donor_address')
                                        <div class="text-danger small mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                <!-- LOCATION -->

                                <div class="col-md-4">

                                    <label
                                        for="location_id"
                                        class="form-label fw-semibold">

                                        Location
                                        <span class="text-danger">*</span>

                                    </label>

                                    <div class="input-group">

                                        <span class="input-group-text">
                                            <i class="ti ti-map-pin"></i>
                                        </span>

                                        <select
                                            class="form-select @error('location_id') is-invalid @enderror"
                                            id="location_id"
                                            name="location_id"
                                            required>

                                            <option value="">
                                                Select Location
                                            </option>

                                            @foreach($locations as $location)

                                                <option
                                                    value="{{ $location->location_id }}"
                                                    {{ old('location_id', $donor->location_id) == $location->location_id ? 'selected' : '' }}>

                                                    {{ $location->location_name }}

                                                </option>

                                            @endforeach

                                        </select>

                                    </div>

                                    @error('location_id')
                                        <div class="text-danger small mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                            </div>

                        </div>


                        <!-- ===================================================== -->
                        <!-- VERIFICATION DETAILS -->
                        <!-- ===================================================== -->

                        <div class="mb-4">

                            <h6 class="fw-bold text-primary border-bottom pb-2 mb-4">

                                <i class="ti ti-shield-check me-2"></i>

                                Verification Details

                            </h6>


                            <div class="row g-3">


                                <!-- ID PROOF -->

                                <div class="col-md-6">

                                    <label
                                        for="id_proof"
                                        class="form-label fw-semibold">

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

                                    @else

                                        <div class="text-muted small mb-2">

                                            No ID proof uploaded.

                                        </div>

                                    @endif


                                    <input
                                        type="file"
                                        class="form-control @error('id_proof') is-invalid @enderror"
                                        id="id_proof"
                                        name="id_proof"
                                        accept=".jpg,.jpeg,.png,.pdf">


                                    <small class="text-muted">

                                        Leave empty to keep the existing ID proof.

                                    </small>


                                    @error('id_proof')

                                        <div class="text-danger small mt-1">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>


                                <!-- LICENSE NUMBER -->

                                <div class="col-md-6">

                                    <label
                                        for="license_number"
                                        class="form-label fw-semibold">

                                        License Number

                                    </label>

                                    <div class="input-group">

                                        <span class="input-group-text">
                                            <i class="ti ti-id"></i>
                                        </span>

                                        <input
                                            type="text"
                                            class="form-control @error('license_number') is-invalid @enderror"
                                            id="license_number"
                                            name="license_number"
                                            value="{{ old('license_number', $donor->license_number) }}"
                                            placeholder="Enter license number">

                                    </div>

                                    @error('license_number')

                                        <div class="text-danger small mt-1">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>

                            </div>

                        </div>


                        <!-- ===================================================== -->
                        <!-- ACCOUNT STATUS -->
                        <!-- ===================================================== -->

                        <div class="mb-4">

                            <h6 class="fw-bold text-primary border-bottom pb-2 mb-4">

                                <i class="ti ti-settings me-2"></i>

                                Account Status

                            </h6>


                            <div class="row g-3">

                                <div class="col-md-6">

                                    <label
                                        for="status"
                                        class="form-label fw-semibold">

                                        Status
                                        <span class="text-danger">*</span>

                                    </label>


                                    <select
                                        class="form-select @error('status') is-invalid @enderror"
                                        id="status"
                                        name="status"
                                        required>

                                        <option value="">
                                            Select Status
                                        </option>

                                        <option
                                            value="Active"
                                            {{ old('status', $donor->status) == 'Active' ? 'selected' : '' }}>

                                            Active

                                        </option>

                                        <option
                                            value="Inactive"
                                            {{ old('status', $donor->status) == 'Inactive' ? 'selected' : '' }}>

                                            Inactive

                                        </option>

                                    </select>


                                    @error('status')

                                        <div class="text-danger small mt-1">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>

                            </div>

                        </div>


                        <!-- ===================================================== -->
                        <!-- BUTTONS -->
                        <!-- ===================================================== -->

                        <div class="border-top pt-4 d-flex justify-content-end gap-2">


                            <!-- BACK -->

                            <a
                                href="{{ route('donor_view') }}"
                                class="btn btn-light border px-4">

                                <i class="ti ti-arrow-left me-1"></i>

                                Back

                            </a>


                            <!-- RESET -->

                            <button
                                type="reset"
                                class="btn btn-outline-secondary px-4">

                                <i class="ti ti-refresh me-1"></i>

                                Reset

                            </button>


                            <!-- UPDATE -->

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


<!-- ===================================================== -->
<!-- PASSWORD SHOW / HIDE SCRIPT -->
<!-- ===================================================== -->

<script>

function togglePassword(inputId, iconId)
{
    const passwordInput = document.getElementById(inputId);
    const eyeIcon = document.getElementById(iconId);

    if (!passwordInput || !eyeIcon) {
        return;
    }

    if (passwordInput.type === "password") {

        passwordInput.type = "text";

        eyeIcon.classList.remove("ti-eye");
        eyeIcon.classList.add("ti-eye-off");

    } else {

        passwordInput.type = "password";

        eyeIcon.classList.remove("ti-eye-off");
        eyeIcon.classList.add("ti-eye");
    }
}

</script>

@endsection