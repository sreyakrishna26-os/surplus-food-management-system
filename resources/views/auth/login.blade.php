<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Surplus | Login</title>

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect"
        href="https://fonts.googleapis.com">

    <link rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Lora:wght@600;700&display=swap"
        rel="stylesheet">


    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Open Sans', sans-serif;

            min-height: 100vh;

            background:
                radial-gradient(
                    circle at 85% 15%,
                    rgba(57, 169, 0, .08),
                    transparent 25%
                ),
                linear-gradient(
                    135deg,
                    #e9f8df,
                    #ffffff 65%
                );

            color: #333333;
        }


        /* =====================================================
           MAIN PAGE
        ===================================================== */

        .login-page {

            min-height: 100vh;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 30px 20px;

        }


        /* =====================================================
           LOGIN WRAPPER
        ===================================================== */

        .login-wrapper {

            width: 100%;

            max-width: 950px;

            min-height: 570px;

            background: #ffffff;

            border-radius: 22px;

            overflow: hidden;

            display: grid;

            grid-template-columns: 1fr 1fr;

            box-shadow:
                0 20px 60px rgba(0, 0, 0, .10);

        }


        /* =====================================================
           LEFT SIDE
        ===================================================== */

        .login-left {

            background:
                linear-gradient(
                    145deg,
                    #39a900,
                    #2e8500
                );

            color: #ffffff;

            padding: 55px 45px;

            display: flex;

            flex-direction: column;

            justify-content: center;

            position: relative;

            overflow: hidden;

        }


        .login-left::before {

            content: "";

            position: absolute;

            width: 300px;

            height: 300px;

            border-radius: 50%;

            border: 45px solid rgba(255,255,255,.08);

            top: -130px;

            right: -100px;

        }


        .login-left::after {

            content: "";

            position: absolute;

            width: 200px;

            height: 200px;

            border-radius: 50%;

            background: rgba(247,183,51,.12);

            bottom: -100px;

            left: -80px;

        }


        .brand {

            font-family: 'Lora', serif;

            font-size: 40px;

            font-weight: 700;

            color: #ffffff;

            margin-bottom: 30px;

            position: relative;

            z-index: 2;

        }


        .brand span {

            color: #f7b733;

        }


        .login-left h1 {

            font-family: 'Lora', serif;

            font-size: 38px;

            line-height: 1.2;

            margin-bottom: 18px;

            position: relative;

            z-index: 2;

        }


        .login-left p {

            color: #edf8e8;

            font-size: 15px;

            line-height: 1.8;

            max-width: 400px;

            position: relative;

            z-index: 2;

        }


        .login-features {

            margin-top: 30px;

            position: relative;

            z-index: 2;

        }


        .feature {

            display: flex;

            align-items: center;

            gap: 12px;

            margin-bottom: 14px;

            font-size: 13px;

        }


        .feature-icon {

            width: 34px;

            height: 34px;

            border-radius: 50%;

            background: rgba(255,255,255,.14);

            display: flex;

            align-items: center;

            justify-content: center;

            color: #ffffff;

        }


        /* =====================================================
           RIGHT SIDE
        ===================================================== */

        .login-right {

            padding: 55px 50px;

            display: flex;

            flex-direction: column;

            justify-content: center;

        }


        .login-title {

            margin-bottom: 30px;

        }


        .login-title .small-title {

            display: inline-block;

            background: #e9f8df;

            color: #39a900;

            padding: 6px 14px;

            border-radius: 20px;

            font-size: 11px;

            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: .8px;

            margin-bottom: 12px;

        }


        .login-title h2 {

            font-family: 'Lora', serif;

            color: #222222;

            font-size: 32px;

            margin-bottom: 8px;

        }


        .login-title p {

            color: #777777;

            font-size: 13px;

        }


        /* =====================================================
           ALERT
        ===================================================== */

        .session-status {

            background: #e9f8df;

            color: #2e8500;

            border-left: 4px solid #39a900;

            padding: 11px 13px;

            border-radius: 7px;

            font-size: 13px;

            margin-bottom: 20px;

        }


        /* =====================================================
           FORM
        ===================================================== */

        .form-group {

            margin-bottom: 20px;

        }


        .form-label {

            display: block;

            font-size: 13px;

            font-weight: 600;

            color: #444444;

            margin-bottom: 7px;

        }


        .input-wrapper {

            position: relative;

        }


        .input-icon {

            position: absolute;

            left: 14px;

            top: 50%;

            transform: translateY(-50%);

            color: #39a900;

            font-size: 14px;

        }


        .form-input {

            width: 100%;

            height: 46px;

            border: 1px solid #dddddd;

            border-radius: 9px;

            padding: 0 14px 0 42px;

            font-family: 'Open Sans', sans-serif;

            font-size: 13px;

            color: #333333;

            outline: none;

            transition: .3s;

            background: #ffffff;

        }


        .form-input:focus {

            border-color: #39a900;

            box-shadow:
                0 0 0 3px rgba(57,169,0,.10);

        }


        .error-message {

            color: #dc3545;

            font-size: 12px;

            margin-top: 5px;

        }


        /* =====================================================
           REMEMBER ME
        ===================================================== */

        .remember-row {

            display: flex;

            align-items: center;

            margin-top: 5px;

            margin-bottom: 25px;

        }


        .remember-row input {

            width: 15px;

            height: 15px;

            accent-color: #39a900;

            cursor: pointer;

        }


        .remember-row label {

            margin-left: 8px;

            font-size: 12px;

            color: #666666;

            cursor: pointer;

        }


        /* =====================================================
           LOGIN BUTTON
        ===================================================== */

        .login-button {

            width: 100%;

            height: 47px;

            border: none;

            border-radius: 9px;

            background: #39a900;

            color: #ffffff;

            font-family: 'Open Sans', sans-serif;

            font-size: 14px;

            font-weight: 700;

            cursor: pointer;

            transition: .3s;

            box-shadow:
                0 6px 15px rgba(57,169,0,.18);

        }


        .login-button:hover {

            background: #2e8500;

            transform: translateY(-2px);

            box-shadow:
                0 8px 20px rgba(57,169,0,.23);

        }


        /* =====================================================
           FORGOT PASSWORD
        ===================================================== */

        .forgot-password {

            display: block;

            text-align: center;

            margin-top: 17px;

            color: #39a900;

            font-size: 12px;

            text-decoration: none;

            transition: .3s;

        }


        .forgot-password:hover {

            color: #2e8500;

            text-decoration: underline;

        }


        /* =====================================================
           BOTTOM TEXT
        ===================================================== */

        .login-footer {

            text-align: center;

            margin-top: 28px;

            padding-top: 18px;

            border-top: 1px solid #eeeeee;

            font-size: 11px;

            color: #999999;

        }


        /* =====================================================
           BACK TO HOME
        ===================================================== */

        .back-home {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 6px;

            margin-top: 13px;

            color: #666666;

            font-size: 12px;

            text-decoration: none;

            transition: .3s;

        }


        .back-home:hover {

            color: #39a900;

        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 768px) {

            .login-page {

                padding: 20px;

            }


            .login-wrapper {

                grid-template-columns: 1fr;

                max-width: 500px;

            }


            .login-left {

                padding: 40px 30px;

                min-height: auto;

            }


            .login-left h1 {

                font-size: 30px;

            }


            .login-left p {

                font-size: 13px;

            }


            .login-features {

                display: none;

            }


            .brand {

                font-size: 32px;

                margin-bottom: 18px;

            }


            .login-right {

                padding: 40px 30px;

            }

        }


        @media (max-width: 480px) {

            .login-page {

                padding: 10px;

            }


            .login-wrapper {

                border-radius: 15px;

            }


            .login-left {

                padding: 30px 25px;

            }


            .login-left h1 {

                font-size: 27px;

            }


            .login-right {

                padding: 30px 25px;

            }


            .login-title h2 {

                font-size: 27px;

            }

        }

    </style>

</head>


<body>


<div class="login-page">


    <div class="login-wrapper">


        <!-- =================================================
             LEFT SIDE
        ================================================== -->

        <div class="login-left">


            <div class="brand">

                Surplus

            </div>


            <h1>

                Welcome Back!

            </h1>


            <p>

                Login to your Surplus account and continue
                managing surplus food, discovering available
                food, and reducing unnecessary food waste.

            </p>


            <div class="login-features">


                <div class="feature">

                    <div class="feature-icon">

                        <i class="fas fa-utensils"></i>

                    </div>

                    <span>
                        Manage surplus food easily
                    </span>

                </div>


                <div class="feature">

                    <div class="feature-icon">

                        <i class="fas fa-search"></i>

                    </div>

                    <span>
                        Discover available food
                    </span>

                </div>


                <div class="feature">

                    <div class="feature-icon">

                        <i class="fas fa-leaf"></i>

                    </div>

                    <span>
                        Help reduce food waste
                    </span>

                </div>


            </div>

        </div>


        <!-- =================================================
             RIGHT SIDE
        ================================================== -->

        <div class="login-right">


            <div class="login-title">


                <span class="small-title">

                    Surplus Account

                </span>


                <h2>

                    Login

                </h2>


                <p>

                    Enter your details to access your account.

                </p>

            </div>


            <!-- SESSION STATUS -->

            <x-auth-session-status
                class="session-status"
                :status="session('status')" />


            <!-- LOGIN FORM -->

            <form method="POST"
                action="{{ route('login') }}">

                @csrf


                <!-- USERNAME -->

                <div class="form-group">

                    <label
                        for="Username"
                        class="form-label">

                        Username

                    </label>


                    <div class="input-wrapper">

                        <i class="fas fa-user input-icon"></i>


                        <input
                            id="Username"
                            class="form-input"
                            type="text"
                            name="Username"
                            value="{{ old('Username') }}"
                            required
                            autofocus
                            autocomplete="username">


                    </div>


                    @if($errors->get('Username'))

                        <div class="error-message">

                            @foreach($errors->get('Username') as $error)

                                {{ $error }}

                            @endforeach

                        </div>

                    @endif

                </div>


                <!-- PASSWORD -->

                <div class="form-group">

                    <label
                        for="password"
                        class="form-label">

                        Password

                    </label>


                    <div class="input-wrapper">

                        <i class="fas fa-lock input-icon"></i>


                        <input
                            id="password"
                            class="form-input"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password">

                    </div>


                    @if($errors->get('password'))

                        <div class="error-message">

                            @foreach($errors->get('password') as $error)

                                {{ $error }}

                            @endforeach

                        </div>

                    @endif

                </div>


                <!-- REMEMBER ME -->

                <div class="remember-row">

                    <input
                        id="remember_me"
                        type="checkbox"
                        name="remember">


                    <label for="remember_me">

                        Remember me

                    </label>

                </div>


                <!-- LOGIN -->

                <button
                    type="submit"
                    class="login-button">

                    <i class="fas fa-sign-in-alt"></i>

                    &nbsp; Log in

                </button>


                <!-- FORGOT PASSWORD -->

                @if (Route::has('password.request'))

                    <a
                        class="forgot-password"
                        href="{{ route('password.request') }}">

                        Forgot your password?

                    </a>

                @endif


            </form>


            <!-- FOOTER -->

            <div class="login-footer">

                Secure access to your Surplus account.

                <br>

                <a
                    href="{{ url('/guest') }}"
                    class="back-home">

                    <i class="fas fa-arrow-left"></i>

                    Back to Home

                </a>

            </div>


        </div>

    </div>

</div>


</body>

</html>