<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Buyer Registration | foodLink</title>


    <style>

        /* =====================================================
           RESET
           ===================================================== */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        /* =====================================================
           BODY
           ===================================================== */

        body {

            font-family: "Segoe UI", Arial, sans-serif;

            min-height: 100vh;

            background:
                linear-gradient(
                    135deg,
                    #f4f8f2,
                    #eaf3e5
                );

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
           PAGE TITLE
           ===================================================== */

        .page-title {

            text-align: center;

            margin-bottom: 25px;

        }


        .page-title h1 {

            font-size: 34px;

            font-weight: 700;

            color: #222;

            margin-bottom: 8px;

        }


        .page-title h1 span {

            color: #39a900;

        }


        .page-title p {

            color: #777;

            font-size: 15px;

        }


        /* =====================================================
           CARD
           ===================================================== */

        .registration-card {

            background: #ffffff;

            border-radius: 14px;

            overflow: hidden;

            box-shadow:
                0 10px 35px rgba(0, 0, 0, 0.10);

        }


        /* =====================================================
           CARD HEADER
           ===================================================== */

        .card-header {

            background: #39a900;

            color: #ffffff;

            padding: 23px 35px;

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

        .card-body {

            padding: 35px;

        }


        /* =====================================================
           ALERT
           ===================================================== */

        .alert {

            padding: 14px 18px;

            border-radius: 8px;

            margin-bottom: 22px;

            font-size: 14px;

        }


        .alert-danger {

            background: #fff0f0;

            border: 1px solid #f1b5b5;

            color: #a12626;

        }


        .alert-success {

            background: #eaf8e6;

            border: 1px solid #b9e4ae;

            color: #28751c;

        }


        .alert ul {

            margin: 8px 0 0 20px;

        }


        /* =====================================================
           FORM SECTION
           ===================================================== */

        .form-section {

            margin-bottom: 30px;

        }


        .section-title {

            display: flex;

            align-items: center;

            gap: 10px;

            color: #39a900;

            font-size: 18px;

            font-weight: 700;

            padding-bottom: 12px;

            margin-bottom: 22px;

            border-bottom: 2px solid #e7eee4;

        }


        .section-title .icon {

            width: 34px;

            height: 34px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 50%;

            background: #eaf6e5;

            font-size: 16px;

        }


        /* =====================================================
           FORM GRID
           ===================================================== */

        .form-grid {

            display: grid;

            grid-template-columns: repeat(2, 1fr);

            gap: 20px 25px;

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
           INPUTS
           ===================================================== */

        .form-control,
        .form-select {

            width: 100%;

            height: 46px;

            padding: 0 14px;

            border: 1px solid #d5dadd;

            border-radius: 7px;

            background: #ffffff;

            color: #333;

            font-size: 14px;

            outline: none;

            transition: all 0.25s ease;

        }


        .form-control::placeholder {

            color: #a0a5a9;

        }


        .form-control:focus,
        .form-select:focus {

            border-color: #39a900;

            box-shadow:
                0 0 0 3px rgba(57, 169, 0, 0.10);

        }


        /* =====================================================
           TEXTAREA
           ===================================================== */

        textarea.form-control {

            height: 110px;

            padding: 12px 14px;

            resize: vertical;

        }


        /* =====================================================
           SELECT
           ===================================================== */

        .form-select {

            cursor: pointer;

        }


        /* =====================================================
           INPUT WITH ICON
           ===================================================== */

        .input-wrapper {

            position: relative;

        }


        .input-icon {

            position: absolute;

            left: 14px;

            top: 50%;

            transform: translateY(-50%);

            color: #888;

            font-size: 14px;

            pointer-events: none;

        }


        .input-wrapper .form-control {

            padding-left: 40px;

        }


        /* =====================================================
           PASSWORD
           ===================================================== */

        .password-wrapper {

            position: relative;

        }


        .password-wrapper .form-control {

            padding-right: 45px;

        }


        .password-toggle {

            position: absolute;

            right: 12px;

            top: 50%;

            transform: translateY(-50%);

            border: none;

            background: transparent;

            cursor: pointer;

            color: #777;

            font-size: 14px;

        }


        .password-toggle:hover {

            color: #39a900;

        }


        /* =====================================================
           ERROR MESSAGE
           ===================================================== */

        .error-message {

            display: block;

            color: #dc3545;

            font-size: 12px;

            margin-top: 5px;

        }


        /* =====================================================
           REQUIRED NOTE
           ===================================================== */

        .required-note {

            font-size: 12px;

            color: #777;

            margin-bottom: 20px;

        }


        /* =====================================================
           BUTTONS
           ===================================================== */

        .button-area {

            display: flex;

            justify-content: flex-end;

            align-items: center;

            gap: 10px;

            padding-top: 25px;

            border-top: 1px solid #e7e7e7;

        }


        .btn {

            min-height: 44px;

            padding: 0 22px;

            border-radius: 7px;

            border: none;

            font-size: 14px;

            font-weight: 600;

            cursor: pointer;

            text-decoration: none;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 7px;

            transition: 0.25s ease;

        }


        .btn-reset {

            background: #eeeeee;

            color: #555;

        }


        .btn-reset:hover {

            background: #dddddd;

        }


        .btn-register {

            background: #39a900;

            color: #ffffff;

        }


        .btn-register:hover {

            background: #2f8c00;

            transform: translateY(-1px);

        }


        /* =====================================================
           BOTTOM NOTE
           ===================================================== */

        .bottom-note {

            text-align: center;

            color: #777;

            font-size: 13px;

            margin-top: 18px;

        }


        /* =====================================================
           MOBILE
           ===================================================== */

        @media (max-width: 768px) {

            body {

                padding: 20px 12px;

            }


            .page-title h1 {

                font-size: 27px;

            }


            .card-body {

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

            .page-title h1 {

                font-size: 24px;

            }


            .card-body {

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
         PAGE TITLE
         ===================================================== -->

    <div class="page-title">

        <h1>
            Buyer <span>Registration</span>
        </h1>

        <p>
            Create your account and start using foodLink
        </p>

    </div>


    <!-- =====================================================
         REGISTRATION CARD
         ===================================================== -->

    <div class="registration-card">


        <!-- CARD HEADER -->

        <div class="card-header">

            <h2>
                Buyer Information
            </h2>

            <p>
                Please enter your details to create your buyer account.
            </p>

        </div>


        <!-- CARD BODY -->

        <div class="card-body">


            <!-- =================================================
                 VALIDATION ERRORS
                 ================================================= -->

            @if ($errors->any())

                <div class="alert alert-danger">

                    <strong>
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
                 SUCCESS MESSAGE
                 ================================================= -->

            @if (session('success'))

                <div class="alert alert-success">

                    {{ session('success') }}

                </div>

            @endif


            <!-- =================================================
                 FORM
                 ================================================= -->

            <form
                action="{{ route('buyer_insert') }}"
                method="POST">

                @csrf


                <div class="required-note">

                    <span class="required">*</span>
                    Required fields

                </div>


                <!-- =================================================
                     BUYER DETAILS
                     ================================================= -->

                <div class="form-section">


                    <div class="section-title">

                        <div class="icon">
                            👤
                        </div>

                        <span>
                            Buyer Details
                        </span>

                    </div>


                    <div class="form-grid">


                        <!-- BUYER NAME -->

                        <div class="form-group">

                            <label
                                for="buyer_name"
                                class="form-label">

                                Buyer Name
                                <span class="required">*</span>

                            </label>


                            <div class="input-wrapper">

                                <span class="input-icon">
                                    👤
                                </span>

                                <input
                                    type="text"
                                    id="buyer_name"
                                    name="buyer_name"
                                    class="form-control"
                                    value="{{ old('buyer_name') }}"
                                    placeholder="Enter buyer name"
                                    required>

                            </div>


                            @error('buyer_name')

                                <span class="error-message">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>


                        <!-- EMAIL -->

                        <div class="form-group">

                            <label
                                for="buyer_email"
                                class="form-label">

                                Email
                                <span class="required">*</span>

                            </label>


                            <div class="input-wrapper">

                                <span class="input-icon">
                                    ✉
                                </span>

                                <input
                                    type="email"
                                    id="buyer_email"
                                    name="buyer_email"
                                    class="form-control"
                                    value="{{ old('buyer_email') }}"
                                    placeholder="Enter email address"
                                    required>

                            </div>


                            @error('buyer_email')

                                <span class="error-message">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>


                        <!-- BUYER TYPE -->

                        <div class="form-group">

                            <label
                                for="buyer_type"
                                class="form-label">

                                Buyer Type
                                <span class="required">*</span>

                            </label>


                            <select
                                id="buyer_type"
                                name="buyer_type"
                                class="form-select"
                                required>

                                <option value="">
                                    Select Buyer Type
                                </option>


                                <option
                                    value="Family"
                                    {{ old('buyer_type') == 'Family' ? 'selected' : '' }}>

                                    Family

                                </option>


                                <option
                                    value="Organization"
                                    {{ old('buyer_type') == 'Organization' ? 'selected' : '' }}>

                                    Organization

                                </option>


                                <option
                                    value="Hostel"
                                    {{ old('buyer_type') == 'Hostel' ? 'selected' : '' }}>

                                    Hostel

                                </option>


                                <option
                                    value="Others"
                                    {{ old('buyer_type') == 'Others' ? 'selected' : '' }}>

                                    Others

                                </option>

                            </select>


                            @error('buyer_type')

                                <span class="error-message">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>


                        <!-- PHONE -->

                        <div class="form-group">

                            <label
                                for="buyer_phone"
                                class="form-label">

                                Phone Number
                                <span class="required">*</span>

                            </label>


                            <div class="input-wrapper">

                                <span class="input-icon">
                                    ☎
                                </span>

                                <input
                                    type="text"
                                    id="buyer_phone"
                                    name="buyer_phone"
                                    class="form-control"
                                    value="{{ old('buyer_phone') }}"
                                    placeholder="Enter phone number"
                                    required>

                            </div>


                            @error('buyer_phone')

                                <span class="error-message">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>


                        <!-- ADDRESS -->

                        <div class="form-group full-width">

                            <label
                                for="buyer_address"
                                class="form-label">

                                Address
                                <span class="required">*</span>

                            </label>


                            <textarea
                                id="buyer_address"
                                name="buyer_address"
                                class="form-control"
                                placeholder="Enter complete address"
                                required>{{ old('buyer_address') }}</textarea>


                            @error('buyer_address')

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


                            <select
                                id="location_id"
                                name="location_id"
                                class="form-select"
                                required>

                                <option value="">
                                    Select Location
                                </option>


                                @foreach ($locations as $location)

                                    <option
                                        value="{{ $location->location_id }}"
                                        {{ old('location_id') == $location->location_id ? 'selected' : '' }}>

                                        {{ $location->location_name }}

                                    </option>

                                @endforeach

                            </select>


                            @error('location_id')

                                <span class="error-message">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>


                        <!-- REGISTRATION DATE -->

                        <div class="form-group">

                            <label
                                for="registration_date"
                                class="form-label">

                                Registration Date

                            </label>


                            <input
                                type="date"
                                id="registration_date"
                                name="registration_date"
                                class="form-control"
                                value="{{ old('registration_date', date('Y-m-d')) }}"
                                readonly>

                        </div>


                    </div>

                </div>


                <!-- =================================================
                     LOGIN DETAILS
                     ================================================= -->

                <div class="form-section">


                    <div class="section-title">

                        <div class="icon">
                            🔐
                        </div>

                        <span>
                            Login Details
                        </span>

                    </div>


                    <div class="form-grid">


                        <!-- USERNAME -->

                        <div class="form-group">

                            <label
                                for="username"
                                class="form-label">

                                Username
                                <span class="required">*</span>

                            </label>


                            <div class="input-wrapper">

                                <span class="input-icon">
                                    👤
                                </span>

                                <input
                                    type="text"
                                    id="username"
                                    name="username"
                                    class="form-control"
                                    value="{{ old('username') }}"
                                    placeholder="Enter username"
                                    required>

                            </div>


                            @error('username')

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
                                    id="password"
                                    name="password"
                                    class="form-control"
                                    placeholder="Enter password"
                                    required>


                                <button
                                    type="button"
                                    class="password-toggle"
                                    onclick="togglePassword()">

                                    <span id="eyeIcon">
                                        👁
                                    </span>

                                </button>

                            </div>


                            @error('password')

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


                    <button
                        type="reset"
                        class="btn btn-reset">

                        ↻

                        Reset

                    </button>


                    <button
                        type="submit"
                        class="btn btn-register">

                        ✓

                        Register

                    </button>


                </div>


            </form>


        </div>

    </div>


    <!-- =====================================================
         BOTTOM NOTE
         ===================================================== -->

    <div class="bottom-note">

        Your information will be securely stored by foodLink.

    </div>


</div>


<!-- =========================================================
     PASSWORD SCRIPT
     ========================================================= -->

<script>

function togglePassword()
{

    const password =
        document.getElementById("password");

    const eye =
        document.getElementById("eyeIcon");


    if (password.type === "password")
    {

        password.type = "text";

        eye.textContent = "🙈";

    }
    else
    {

        password.type = "password";

        eye.textContent = "👁";

    }

}

</script>


</body>

</html>