<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Donor Registration | FoodLink</title>


    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="{{ asset('Buyer/assets/css/all.min.css') }}">


    <style>

        /* =====================================================
           GENERAL
           ===================================================== */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {

            font-family: "Segoe UI", Arial, sans-serif;

            background:
                linear-gradient(
                    135deg,
                    #f4f8f3,
                    #eaf3e6
                );

            min-height: 100vh;

            padding: 40px 20px;

            color: #333;

        }


        /* =====================================================
           MAIN CONTAINER
           ===================================================== */

        .registration-container {

            width: 100%;

            max-width: 1050px;

            margin: 0 auto;

        }


        /* =====================================================
           TOP TITLE
           ===================================================== */

        .registration-title {

            text-align: center;

            margin-bottom: 25px;

        }


        .registration-title h1 {

            font-size: 32px;

            font-weight: 700;

            color: #222;

            margin-bottom: 8px;

        }


        .registration-title h1 span {

            color: #39a900;

        }


        .registration-title p {

            color: #777;

            font-size: 15px;

        }


        /* =====================================================
           MAIN CARD
           ===================================================== */

        .registration-card {

            background: #ffffff;

            border-radius: 14px;

            box-shadow:
                0 10px 35px rgba(0, 0, 0, 0.10);

            overflow: hidden;

        }


        /* =====================================================
           CARD HEADER
           ===================================================== */

        .card-header {

            background: #39a900;

            color: #ffffff;

            padding: 22px 30px;

        }


        .card-header h2 {

            font-size: 22px;

            font-weight: 600;

            margin-bottom: 5px;

        }


        .card-header p {

            font-size: 14px;

            margin: 0;

            opacity: 0.95;

        }


        /* =====================================================
           FORM BODY
           ===================================================== */

        .form-body {

            padding: 35px;

        }


        /* =====================================================
           ALERTS
           ===================================================== */

        .alert {

            padding: 14px 18px;

            border-radius: 8px;

            margin-bottom: 22px;

            font-size: 14px;

        }


        .alert-success {

            background: #e9f8e5;

            border: 1px solid #b8e3aa;

            color: #28751c;

        }


        .alert-danger {

            background: #fff0f0;

            border: 1px solid #f1b5b5;

            color: #a12626;

        }


        .alert ul {

            margin: 8px 0 0 20px;

        }


        /* =====================================================
           SECTION
           ===================================================== */

        .form-section {

            margin-bottom: 35px;

        }


        .section-heading {

            display: flex;

            align-items: center;

            gap: 10px;

            color: #39a900;

            font-size: 18px;

            font-weight: 700;

            padding-bottom: 12px;

            margin-bottom: 22px;

            border-bottom: 2px solid #e8eee5;

        }


        .section-heading i {

            font-size: 18px;

        }


        /* =====================================================
           FORM GRID
           ===================================================== */

        .form-grid {

            display: grid;

            grid-template-columns: repeat(2, 1fr);

            gap: 20px;

        }


        .form-group {

            width: 100%;

        }


        .form-group.full-width {

            grid-column: 1 / -1;

        }


        /* =====================================================
           LABEL
           ===================================================== */

        .form-label {

            display: block;

            font-size: 14px;

            font-weight: 600;

            color: #333;

            margin-bottom: 8px;

        }


        .required {

            color: #e53935;

        }


        /* =====================================================
           INPUT
           ===================================================== */

        .input-wrapper {

            position: relative;

            display: flex;

            align-items: center;

        }


        .input-icon {

            position: absolute;

            left: 14px;

            color: #777;

            font-size: 15px;

            z-index: 2;

        }


        .form-control,
        .form-select,
        .form-textarea {

            width: 100%;

            border: 1px solid #d6dce0;

            border-radius: 7px;

            background: #ffffff;

            color: #333;

            font-size: 14px;

            outline: none;

            transition: all 0.25s ease;

        }


        .form-control,
        .form-select {

            height: 46px;

            padding: 0 14px;

        }


        .input-wrapper .form-control {

            padding-left: 42px;

        }


        .form-textarea {

            min-height: 120px;

            padding: 13px 14px;

            resize: vertical;

        }


        .form-control:focus,
        .form-select:focus,
        .form-textarea:focus {

            border-color: #39a900;

            box-shadow:
                0 0 0 3px rgba(57, 169, 0, 0.10);

        }


        .form-control::placeholder,
        .form-textarea::placeholder {

            color: #a0a7ad;

        }


        /* =====================================================
           PASSWORD
           ===================================================== */

        .password-wrapper {

            position: relative;

        }


        .password-wrapper .form-control {

            padding-right: 50px;

        }


        .password-toggle {

            position: absolute;

            right: 12px;

            top: 50%;

            transform: translateY(-50%);

            border: none;

            background: transparent;

            color: #777;

            cursor: pointer;

            font-size: 15px;

        }


        .password-toggle:hover {

            color: #39a900;

        }


        /* =====================================================
           SELECT
           ===================================================== */

        .form-select {

            cursor: pointer;

        }


        /* =====================================================
           FILE INPUT
           ===================================================== */

        .file-input {

            padding: 10px 12px;

            height: auto;

            cursor: pointer;

        }


        .file-help {

            display: block;

            margin-top: 6px;

            color: #777;

            font-size: 12px;

        }


        /* =====================================================
           ERROR
           ===================================================== */

        .error-message {

            display: block;

            color: #dc3545;

            font-size: 12px;

            margin-top: 5px;

        }


        /* =====================================================
           PASSWORD HELP
           ===================================================== */

        .password-help {

            display: block;

            color: #777;

            font-size: 12px;

            margin-top: 6px;

        }


        /* =====================================================
           BUTTON AREA
           ===================================================== */

        .button-area {

            display: flex;

            justify-content: flex-end;

            align-items: center;

            gap: 10px;

            padding-top: 25px;

            border-top: 1px solid #e8e8e8;

        }


        .btn {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 7px;

            min-height: 44px;

            padding: 0 20px;

            border-radius: 7px;

            border: none;

            font-size: 14px;

            font-weight: 600;

            text-decoration: none;

            cursor: pointer;

            transition: all 0.25s ease;

        }


        .btn-cancel {

            background: #f1f3f4;

            color: #555;

        }


        .btn-cancel:hover {

            background: #e1e4e6;

            color: #333;

        }


        .btn-reset {

            background: #ffffff;

            color: #555;

            border: 1px solid #cfd4d8;

        }


        .btn-reset:hover {

            background: #f5f5f5;

        }


        .btn-submit {

            background: #39a900;

            color: #ffffff;

        }


        .btn-submit:hover {

            background: #2f8d00;

            transform: translateY(-1px);

        }


        .btn-view {

            background: #198754;

            color: #ffffff;

        }


        .btn-view:hover {

            background: #157347;

            color: #ffffff;

        }


        /* =====================================================
           FOOTER NOTE
           ===================================================== */

        .registration-note {

            text-align: center;

            margin-top: 18px;

            color: #777;

            font-size: 13px;

        }


        /* =====================================================
           MOBILE
           ===================================================== */

        @media (max-width: 768px) {

            body {

                padding: 20px 12px;

            }


            .registration-title h1 {

                font-size: 26px;

            }


            .form-body {

                padding: 25px 20px;

            }


            .card-header {

                padding: 20px;

            }


            .form-grid {

                grid-template-columns: 1fr;

                gap: 18px;

            }


            .form-group.full-width {

                grid-column: auto;

            }


            .button-area {

                flex-direction: column;

                align-items: stretch;

            }


            .btn {

                width: 100%;

            }

        }


        /* =====================================================
           SMALL MOBILE
           ===================================================== */

        @media (max-width: 480px) {

            .registration-title h1 {

                font-size: 23px;

            }


            .registration-title p {

                font-size: 13px;

            }


            .form-body {

                padding: 20px 15px;

            }


            .card-header h2 {

                font-size: 19px;

            }

        }

    </style>

</head>


<body>


<div class="registration-container">


    <!-- =====================================================
         TITLE
         ===================================================== -->

    <div class="registration-title">

        <h1>
            Donor <span>Registration</span>
        </h1>

        <p>
            Create your donor account and register with FoodLink
        </p>

    </div>


    <!-- =====================================================
         MAIN CARD
         ===================================================== -->

    <div class="registration-card">


        <!-- CARD HEADER -->

        <div class="card-header">

            <h2>
                <i class="fas fa-user-plus"></i>
                Donor Information
            </h2>

            <p>
                Please enter your details carefully to complete
                the registration.
            </p>

        </div>


        <!-- =================================================
             FORM BODY
             ================================================= -->

        <div class="form-body">


            <!-- =================================================
                 SUCCESS MESSAGE
                 ================================================= -->

            @if(session('success'))

                <div class="alert alert-success">

                    <strong>
                        <i class="fas fa-check-circle"></i>
                        Success!
                    </strong>

                    <div style="margin-top:5px;">
                        {{ session('success') }}
                    </div>

                </div>

            @endif


            <!-- =================================================
                 ERROR MESSAGE
                 ================================================= -->

            @if(session('error'))

                <div class="alert alert-danger">

                    <strong>
                        <i class="fas fa-exclamation-circle"></i>
                        Error!
                    </strong>

                    <div style="margin-top:5px;">
                        {{ session('error') }}
                    </div>

                </div>

            @endif


            <!-- =================================================
                 VALIDATION ERRORS
                 ================================================= -->

            @if ($errors->any())

                <div class="alert alert-danger">

                    <strong>
                        <i class="fas fa-exclamation-triangle"></i>
                        Please correct the following errors:
                    </strong>

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <!-- =================================================
                 FORM
                 ================================================= -->

            <form
                action="{{ route('donor_insert') }}"
                method="POST"
                enctype="multipart/form-data"
                autocomplete="off">

                @csrf


                <!-- =================================================
                     PERSONAL DETAILS
                     ================================================= -->

                <div class="form-section">

                    <div class="section-heading">

                        <i class="fas fa-user"></i>

                        <span>
                            Personal Details
                        </span>

                    </div>


                    <div class="form-grid">


                        <!-- DONOR NAME -->

                        <div class="form-group">

                            <label
                                for="donor_name"
                                class="form-label">

                                Donor Name
                                <span class="required">*</span>

                            </label>


                            <div class="input-wrapper">

                                <i class="fas fa-user input-icon"></i>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="donor_name"
                                    name="donor_name"
                                    value="{{ old('donor_name') }}"
                                    placeholder="Enter donor name"
                                    autocomplete="off"
                                    required>

                            </div>


                            @error('donor_name')

                                <span class="error-message">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>


                        <!-- EMAIL -->

                        <div class="form-group">

                            <label
                                for="donor_email"
                                class="form-label">

                                Email Address
                                <span class="required">*</span>

                            </label>


                            <div class="input-wrapper">

                                <i class="fas fa-envelope input-icon"></i>

                                <input
                                    type="email"
                                    class="form-control"
                                    id="donor_email"
                                    name="donor_email"
                                    value="{{ old('donor_email') }}"
                                    placeholder="example@email.com"
                                    autocomplete="off"
                                    required>

                            </div>


                            @error('donor_email')

                                <span class="error-message">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>


                        <!-- USERNAME -->

                        <div class="form-group">

                            <label
                                for="username"
                                class="form-label">

                                Username
                                <span class="required">*</span>

                            </label>


                            <div class="input-wrapper">

                                <i class="fas fa-user-circle input-icon"></i>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="username"
                                    name="username"
                                    value="{{ old('username') }}"
                                    placeholder="Enter username"
                                    autocomplete="off"
                                    required>

                            </div>


                            @error('username')

                                <span class="error-message">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>


                        <!-- PHONE -->

                        <div class="form-group">

                            <label
                                for="donor_phone"
                                class="form-label">

                                Phone Number
                                <span class="required">*</span>

                            </label>


                            <div class="input-wrapper">

                                <i class="fas fa-phone input-icon"></i>

                                <input
                                    type="tel"
                                    class="form-control"
                                    id="donor_phone"
                                    name="donor_phone"
                                    value="{{ old('donor_phone') }}"
                                    placeholder="Enter phone number"
                                    autocomplete="off"
                                    required>

                            </div>


                            @error('donor_phone')

                                <span class="error-message">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>


                        <!-- PASSWORD -->

                        <div class="form-group">

                            <label
                                for="password"
                                class="form-label">

                                Password
                                <span class="required">*</span>

                            </label>


                            <div class="password-wrapper">

                                <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    name="password"
                                    placeholder="Enter password"
                                    autocomplete="new-password"
                                    required>


                                <button
                                    type="button"
                                    class="password-toggle"
                                    onclick="togglePassword(
                                        'password',
                                        'passwordEye'
                                    )">

                                    <i
                                        class="fas fa-eye"
                                        id="passwordEye">
                                    </i>

                                </button>

                            </div>


                            <span class="password-help">
                                Password must contain at least 6 characters.
                            </span>


                            @error('password')

                                <span class="error-message">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>


                        <!-- CONFIRM PASSWORD -->

                        <div class="form-group">

                            <label
                                for="password_confirmation"
                                class="form-label">

                                Confirm Password
                                <span class="required">*</span>

                            </label>


                            <div class="password-wrapper">

                                <input
                                    type="password"
                                    class="form-control"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    placeholder="Re-enter password"
                                    autocomplete="new-password"
                                    required>


                                <button
                                    type="button"
                                    class="password-toggle"
                                    onclick="togglePassword(
                                        'password_confirmation',
                                        'confirmPasswordEye'
                                    )">

                                    <i
                                        class="fas fa-eye"
                                        id="confirmPasswordEye">
                                    </i>

                                </button>

                            </div>


                            @error('password_confirmation')

                                <span class="error-message">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>


                        <!-- REGISTRATION DATE -->

                        <div class="form-group">

                            <label
                                for="reg_date"
                                class="form-label">

                                Registration Date
                                <span class="required">*</span>

                            </label>


                            <div class="input-wrapper">

                                <i class="fas fa-calendar-alt input-icon"></i>

                                <input
                                    type="date"
                                    class="form-control"
                                    id="reg_date"
                                    name="reg_date"
                                    value="{{ old('reg_date', date('Y-m-d')) }}"
                                    required>

                            </div>


                            @error('reg_date')

                                <span class="error-message">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>


                    </div>

                </div>


                <!-- =================================================
                     ADDRESS DETAILS
                     ================================================= -->

                <div class="form-section">

                    <div class="section-heading">

                        <i class="fas fa-map-marker-alt"></i>

                        <span>
                            Address & Location
                        </span>

                    </div>


                    <div class="form-grid">


                        <!-- ADDRESS -->

                        <div class="form-group">

                            <label
                                for="donor_address"
                                class="form-label">

                                Address
                                <span class="required">*</span>

                            </label>


                            <textarea
                                class="form-textarea"
                                id="donor_address"
                                name="donor_address"
                                placeholder="Enter complete donor address"
                                autocomplete="off"
                                required>{{ old('donor_address') }}</textarea>


                            @error('donor_address')

                                <span class="error-message">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>


                        <!-- LOCATION -->

                        <div class="form-group">

                            <label
                                for="location_id"
                                class="form-label">

                                Location
                                <span class="required">*</span>

                            </label>


                            <div class="input-wrapper">

                                <i class="fas fa-map-marker-alt input-icon"></i>


                                <select
                                    class="form-select"
                                    id="location_id"
                                    name="location_id"
                                    required>

                                    <option value="">
                                        Select Location
                                    </option>


                                    @foreach($locations as $location)

                                        <option
                                            value="{{ $location->location_id }}"
                                            {{ old('location_id') == $location->location_id ? 'selected' : '' }}>

                                            {{ $location->location_name }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>


                            @error('location_id')

                                <span class="error-message">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>


                    </div>

                </div>


                <!-- =================================================
                     VERIFICATION DETAILS
                     ================================================= -->

                <div class="form-section">

                    <div class="section-heading">

                        <i class="fas fa-shield-alt"></i>

                        <span>
                            Verification Details
                        </span>

                    </div>


                    <div class="form-grid">


                        <!-- ID PROOF -->

                        <div class="form-group">

                            <label
                                for="id_proof"
                                class="form-label">

                                ID Proof
                                <span class="required">*</span>

                            </label>


                            <input
                                type="file"
                                class="form-control file-input"
                                id="id_proof"
                                name="id_proof"
                                accept=".jpg,.jpeg,.png,.pdf"
                                required>


                            <span class="file-help">

                                Accepted formats:
                                JPG, JPEG, PNG, PDF

                            </span>


                            @error('id_proof')

                                <span class="error-message">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>


                        <!-- LICENSE NUMBER -->

                        <div class="form-group">

                            <label
                                for="license_number"
                                class="form-label">

                                License Number

                            </label>


                            <div class="input-wrapper">

                                <i class="fas fa-id-card input-icon"></i>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="license_number"
                                    name="license_number"
                                    value="{{ old('license_number') }}"
                                    placeholder="Enter license number"
                                    autocomplete="off">

                            </div>


                            @error('license_number')

                                <span class="error-message">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>


                    </div>

                </div>


                <!-- =================================================
                     BUTTONS
                     ================================================= -->

                <div class="button-area">


                    <!-- CANCEL -->

                    <a
                        href="{{ route('donorregister') }}"
                        class="btn btn-cancel">

                        <i class="fas fa-times"></i>

                        Cancel

                    </a>


                    <!-- RESET -->

                    <button
                        type="reset"
                        class="btn btn-reset">

                        <i class="fas fa-redo"></i>

                        Reset

                    </button>


                    <!-- SUBMIT -->

                    <button
                        type="submit"
                        class="btn btn-submit">

                        <i class="fas fa-user-plus"></i>

                        Submit Registration

                    </button>


                    <!-- VIEW DONORS -->

                    <a
                        href="{{ route('donor_view') }}"
                        class="btn btn-view">

                        <i class="fas fa-eye"></i>

                        View Donors

                    </a>


                </div>


            </form>

        </div>

    </div>


    <!-- =====================================================
         NOTE
         ===================================================== -->

    <div class="registration-note">

        <i class="fas fa-lock"></i>

        Your registration information is securely submitted
        through FoodLink.

    </div>


</div>


<!-- =========================================================
     PASSWORD SHOW / HIDE
     ========================================================= -->

<script>

function togglePassword(inputId, eyeId)
{

    const passwordInput =
        document.getElementById(inputId);

    const eyeIcon =
        document.getElementById(eyeId);


    if (passwordInput.type === "password")
    {

        passwordInput.type = "text";

        eyeIcon.classList.remove("fa-eye");

        eyeIcon.classList.add("fa-eye-slash");

    }
    else
    {

        passwordInput.type = "password";

        eyeIcon.classList.remove("fa-eye-slash");

        eyeIcon.classList.add("fa-eye");

    }

}

</script>


</body>

</html>