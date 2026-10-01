<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Surplus | Surplus Food Management System</title>

    <!-- FONT AWESOME -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

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

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background: #ffffff;
            color: #555555;
            line-height: 1.6;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
        }


        /* =====================================================
           COLOUR PALETTE
        ===================================================== */

        :root {
            --green: #39a900;
            --dark-green: #2e8500;
            --yellow: #f7b733;
            --dark-yellow: #db9b16;
            --light-green: #e9f8df;
            --very-light-green: #f7fbf4;
            --dark: #1d1d1d;
            --text: #333333;
            --muted: #666666;
            --border: #eeeeee;
        }


        /* =====================================================
           TOP BAR
        ===================================================== */

        .top-bar {
            background: #ffffff;
            min-height: 45px;

            display: flex;
            justify-content: space-between;
            align-items: center;

            padding: 0 5%;

            border-bottom: 1px solid #eeeeee;

            font-size: 13px;
            color: #666666;
        }

        .top-left,
        .top-right {
            display: flex;
            align-items: center;
        }

        .top-left span {
            margin-right: 25px;
        }

        .top-left i,
        .top-right i {
            margin-right: 6px;
            color: var(--green);
        }

        .top-right a {
            color: #555555;
            margin-left: 15px;
            transition: .3s;
        }

        .top-right a:hover {
            color: var(--green);
        }


        /* =====================================================
           NAVBAR
        ===================================================== */

        .navbar {
            min-height: 78px;

            background: #ffffff;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 5%;

            position: sticky;
            top: 0;

            z-index: 1000;

            box-shadow: 0 2px 10px rgba(0, 0, 0, .08);

            transition: .3s;
        }

        .logo {
            font-family: 'Lora', serif;

            font-size: 34px;

            font-weight: 700;

            color: var(--green);

            white-space: nowrap;

            transition: .3s;
        }

        .logo:hover {
            color: var(--green);
            transform: translateY(-1px);
        }


        /* =====================================================
           NAVIGATION
        ===================================================== */

        .nav-links {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .nav-links a {
            color: #444444;

            font-size: 14px;

            font-weight: 500;

            padding: 11px 12px;

            transition: .3s;

            white-space: nowrap;

            position: relative;
        }

        .nav-links a:not(.login-btn):not(.donor-register-btn):not(.buyer-register-btn)::after {
            content: "";

            position: absolute;

            left: 12px;
            right: 12px;
            bottom: 4px;

            height: 2px;

            background: var(--green);

            transform: scaleX(0);

            transform-origin: center;

            transition: .3s;
        }

        .nav-links a:hover {
            color: var(--green);
        }

        .nav-links a:not(.login-btn):not(.donor-register-btn):not(.buyer-register-btn):hover::after {
            transform: scaleX(1);
        }


        /* =====================================================
           LOGIN BUTTON
        ===================================================== */

        .login-btn {
            border: 1px solid var(--green);

            border-radius: 25px;

            color: var(--green) !important;

            padding: 9px 17px !important;

            margin-left: 5px;
        }

        .login-btn:hover {
            background: var(--green);

            color: #ffffff !important;
        }


        /* =====================================================
           DONOR REGISTER BUTTON
        ===================================================== */

        .donor-register-btn {
            background: var(--green);

            color: #ffffff !important;

            border-radius: 25px;

            padding: 10px 16px !important;

            margin-left: 2px;

            box-shadow: 0 4px 12px rgba(57, 169, 0, .15);
        }

        .donor-register-btn:hover {
            background: var(--dark-green);

            color: #ffffff !important;

            transform: translateY(-2px);
        }


        /* =====================================================
           BUYER REGISTER BUTTON
        ===================================================== */

        .buyer-register-btn {
            background: var(--yellow);

            color: #ffffff !important;

            border-radius: 25px;

            padding: 10px 16px !important;

            box-shadow: 0 4px 12px rgba(247, 183, 51, .15);
        }

        .buyer-register-btn:hover {
            background: var(--dark-yellow);

            color: #ffffff !important;

            transform: translateY(-2px);
        }


        /* =====================================================
           MOBILE MENU
        ===================================================== */

        .menu-button {
            display: none;

            font-size: 25px;

            cursor: pointer;

            color: var(--green);
        }


        /* =====================================================
           HERO
        ===================================================== */

        .hero {
            min-height: 600px;

            display: flex;

            align-items: center;

            gap: 40px;

            padding: 75px 8%;

            background:
                radial-gradient(
                    circle at 85% 25%,
                    rgba(57, 169, 0, .08),
                    transparent 25%
                ),
                linear-gradient(
                    135deg,
                    #e9f8df,
                    #ffffff 65%
                );
        }

        .hero-content {
            width: 55%;

            animation: fadeInLeft .8s ease;
        }

        .hero-badge {
            display: inline-flex;

            align-items: center;

            gap: 8px;

            background: #ffffff;

            color: var(--green);

            padding: 8px 15px;

            border-radius: 25px;

            font-size: 12px;

            font-weight: 700;

            margin-bottom: 20px;

            box-shadow: 0 5px 15px rgba(0, 0, 0, .05);
        }

        .hero-badge i {
            color: var(--green);
        }

        .hero-content h1 {
            font-family: 'Lora', serif;

            font-size: 52px;

            line-height: 1.18;

            color: #222222;

            margin-bottom: 20px;
        }

        .hero-content h1 span {
            color: var(--green);

            display: block;
        }

        .hero-content p {
            font-size: 17px;

            color: #666666;

            max-width: 650px;

            margin-bottom: 30px;
        }

        .hero-buttons {
            display: flex;

            gap: 14px;

            flex-wrap: wrap;
        }

        .primary-btn,
        .secondary-btn {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            padding: 13px 24px;

            border-radius: 30px;

            font-weight: 600;

            transition: .3s;
        }

        .primary-btn {
            background: var(--green);

            color: #ffffff;

            box-shadow: 0 6px 18px rgba(57, 169, 0, .18);
        }

        .primary-btn:hover {
            background: var(--dark-green);

            color: #ffffff;

            transform: translateY(-3px);
        }

        .secondary-btn {
            border: 2px solid var(--green);

            color: var(--green);

            background: #ffffff;
        }

        .secondary-btn:hover {
            background: var(--green);

            color: #ffffff;

            transform: translateY(-3px);
        }


        /* =====================================================
           HERO VISUAL
        ===================================================== */

        .hero-image {
            width: 45%;

            min-height: 420px;

            display: flex;

            justify-content: center;

            align-items: center;

            position: relative;

            animation: fadeInRight .8s ease;
        }

        .hero-circle {
            width: 350px;

            height: 350px;

            border-radius: 50%;

            background:
                linear-gradient(
                    145deg,
                    #e8f7df,
                    #ffffff
                );

            border: 10px solid #ffffff;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 135px;

            color: var(--green);

            box-shadow:
                0 20px 50px rgba(57, 169, 0, .12);

            position: relative;

            z-index: 2;
        }

        .hero-circle::before {
            content: "";

            position: absolute;

            width: 375px;

            height: 375px;

            border-radius: 50%;

            border: 2px dashed rgba(57, 169, 0, .20);

            animation: rotateCircle 20s linear infinite;
        }

        .hero-floating-card {
            position: absolute;

            background: #ffffff;

            padding: 12px 17px;

            border-radius: 12px;

            box-shadow:
                0 8px 25px rgba(0, 0, 0, .09);

            display: flex;

            align-items: center;

            gap: 9px;

            font-size: 12px;

            font-weight: 700;

            color: #444444;

            z-index: 3;
        }

        .hero-floating-card i {
            color: var(--green);
        }

        .hero-floating-card.one {
            top: 65px;
            left: 15px;
        }

        .hero-floating-card.two {
            top: 170px;
            right: 0;
        }

        .hero-floating-card.three {
            bottom: 60px;
            left: 30px;
        }


        /* =====================================================
           STATS
        ===================================================== */

        .stats {
            padding: 0 8%;

            margin-top: -35px;

            position: relative;

            z-index: 10;
        }

        .stats-container {
            background: #ffffff;

            border: 1px solid #eeeeee;

            border-radius: 15px;

            box-shadow:
                0 10px 30px rgba(0, 0, 0, .07);

            display: grid;

            grid-template-columns: repeat(4, 1fr);

            overflow: hidden;
        }

        .stat-card {
            padding: 24px 15px;

            text-align: center;

            border-right: 1px solid #eeeeee;
        }

        .stat-card:last-child {
            border-right: none;
        }

        .stat-card i {
            font-size: 25px;

            color: var(--green);

            margin-bottom: 7px;
        }

        .stat-card h3 {
            font-family: 'Lora', serif;

            font-size: 27px;

            color: #222222;

            margin-bottom: 2px;
        }

        .stat-card p {
            font-size: 12px;

            color: #777777;
        }


        /* =====================================================
           COMMON SECTION
        ===================================================== */

        .section {
            padding: 90px 8%;
        }

        .section-title {
            text-align: center;

            max-width: 720px;

            margin: 0 auto 50px;
        }

        .section-label {
            display: inline-block;

            color: var(--green);

            background: var(--light-green);

            padding: 6px 14px;

            border-radius: 20px;

            font-size: 11px;

            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: .8px;

            margin-bottom: 12px;
        }

        .section-title h2 {
            font-family: 'Lora', serif;

            font-size: 36px;

            color: #222222;

            margin-bottom: 12px;
        }

        .section-title p {
            max-width: 700px;

            margin: auto;

            color: #777777;

            font-size: 15px;
        }


        /* =====================================================
           ABOUT
        ===================================================== */

        .about {
            background: #ffffff;
        }

        .about-container {
            display: grid;

            grid-template-columns: 1fr 1.2fr;

            gap: 60px;

            align-items: center;
        }

        .about-icon {
            min-height: 360px;

            background:
                linear-gradient(
                    135deg,
                    #e9f8df,
                    #ffffff
                );

            border-radius: 20px;

            display: flex;

            align-items: center;

            justify-content: center;

            position: relative;

            overflow: hidden;
        }

        .about-icon::before {
            content: "";

            position: absolute;

            width: 220px;

            height: 220px;

            border-radius: 50%;

            border: 30px solid rgba(57, 169, 0, .07);

            top: -90px;

            right: -50px;
        }

        .about-icon::after {
            content: "";

            position: absolute;

            width: 160px;

            height: 160px;

            border-radius: 50%;

            background: rgba(247, 183, 51, .10);

            bottom: -70px;

            left: -50px;
        }

        .about-icon i {
            font-size: 145px;

            color: var(--green);

            position: relative;

            z-index: 2;
        }

        .about-content h3 {
            font-family: 'Lora', serif;

            font-size: 29px;

            color: #222222;

            margin-bottom: 18px;
        }

        .about-content p {
            margin-bottom: 15px;

            color: #666666;

            font-size: 15px;
        }

        .about-points {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 12px;

            margin-top: 24px;
        }

        .about-point {
            display: flex;

            align-items: center;

            gap: 8px;

            font-size: 13px;

            font-weight: 600;

            color: #444444;
        }

        .about-point i {
            color: var(--green);
        }


        /* =====================================================
           HOW IT WORKS
        ===================================================== */

        .how-it-works {
            background: var(--very-light-green);
        }

        .steps {
            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 25px;
        }

        .step-card {
            background: #ffffff;

            padding: 30px 25px;

            text-align: center;

            border-radius: 15px;

            border: 1px solid #eeeeee;

            box-shadow:
                0 5px 20px rgba(0, 0, 0, .04);

            transition: .3s;

            position: relative;
        }

        .step-card:hover {
            transform: translateY(-7px);

            border-color: rgba(57, 169, 0, .30);

            box-shadow:
                0 12px 30px rgba(57, 169, 0, .09);
        }

        .step-number {
            position: absolute;

            top: 15px;

            right: 15px;

            width: 30px;

            height: 30px;

            border-radius: 50%;

            background: var(--light-green);

            color: var(--green);

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 11px;

            font-weight: 700;
        }

        .step-icon {
            width: 65px;

            height: 65px;

            margin: 0 auto 18px;

            border-radius: 17px;

            background: var(--light-green);

            color: var(--green);

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 27px;
        }

        .step-card h3 {
            color: #222222;

            font-size: 18px;

            margin-bottom: 10px;
        }

        .step-card p {
            color: #777777;

            font-size: 13px;
        }


        /* =====================================================
           FOOD CATEGORIES
        ===================================================== */

        .categories {
            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 25px;
        }

        .category-card {
            padding: 32px 20px;

            text-align: center;

            border: 1px solid #eeeeee;

            border-radius: 15px;

            transition: .3s;

            background: #ffffff;
        }

        .category-card:hover {
            border-color: var(--green);

            transform: translateY(-7px);

            box-shadow:
                0 10px 25px rgba(57, 169, 0, .08);
        }

        .category-icon {
            width: 68px;

            height: 68px;

            margin: 0 auto 17px;

            border-radius: 18px;

            background: var(--light-green);

            color: var(--green);

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 30px;

            transition: .3s;
        }

        .category-card:hover .category-icon {
            background: var(--green);

            color: #ffffff;
        }

        .category-card h3 {
            font-size: 18px;

            color: #333333;

            margin-bottom: 5px;
        }

        .category-card p {
            color: #777777;

            font-size: 12px;
        }


        /* =====================================================
           CTA
        ===================================================== */

        .cta {
            background:
                linear-gradient(
                    135deg,
                    #39a900,
                    #2e8500
                );

            text-align: center;

            padding: 70px 8%;

            color: #ffffff;

            position: relative;

            overflow: hidden;
        }

        .cta::before {
            content: "";

            position: absolute;

            width: 250px;

            height: 250px;

            border-radius: 50%;

            border: 35px solid rgba(255,255,255,.08);

            top: -130px;

            right: -50px;
        }

        .cta::after {
            content: "";

            position: absolute;

            width: 180px;

            height: 180px;

            border-radius: 50%;

            background: rgba(247,183,51,.10);

            bottom: -100px;

            left: -40px;
        }

        .cta-content {
            position: relative;

            z-index: 2;
        }

        .cta h2 {
            font-family: 'Lora', serif;

            font-size: 36px;

            margin-bottom: 15px;
        }

        .cta p {
            max-width: 700px;

            margin: 0 auto 25px;

            color: #edf8e8;
        }

        .cta-btn {
            display: inline-flex;

            align-items: center;

            gap: 8px;

            background: #ffffff;

            color: var(--green);

            padding: 14px 30px;

            border-radius: 30px;

            font-weight: 600;

            transition: .3s;
        }

        .cta-btn:hover {
            background: var(--yellow);

            color: #ffffff;

            transform: translateY(-3px);
        }


        /* =====================================================
           CONTACT
        ===================================================== */

        .contact {
            background: #ffffff;
        }

        .contact-container {
            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 25px;
        }

        .contact-card {
            text-align: center;

            padding: 32px 25px;

            border: 1px solid #eeeeee;

            border-radius: 15px;

            background: #ffffff;

            transition: .3s;
        }

        .contact-card:hover {
            transform: translateY(-5px);

            border-color: rgba(57, 169, 0, .25);

            box-shadow:
                0 10px 25px rgba(0, 0, 0, .06);
        }

        .contact-icon {
            width: 60px;

            height: 60px;

            margin: 0 auto 15px;

            border-radius: 16px;

            background: var(--light-green);

            color: var(--green);

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 23px;
        }

        .contact-card h3 {
            color: #333333;

            margin-bottom: 8px;

            font-size: 18px;
        }

        .contact-card p {
            color: #777777;

            font-size: 13px;
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        footer {
            background: #1d1d1d;

            color: #cccccc;

            padding: 55px 8% 20px;
        }

        .footer-container {
            display: grid;

            grid-template-columns: 2fr 1fr 1fr;

            gap: 50px;

            padding-bottom: 40px;
        }

        .footer-logo {
            font-family: 'Lora', serif;

            font-size: 32px;

            color: var(--green);

            margin-bottom: 15px;
        }

        .footer-about p {
            max-width: 450px;

            color: #bbbbbb;

            font-size: 13px;
        }

        footer h3 {
            color: #ffffff;

            margin-bottom: 18px;

            font-size: 17px;
        }

        .footer-links a {
            display: block;

            color: #cccccc;

            margin-bottom: 8px;

            font-size: 13px;

            transition: .3s;
        }

        .footer-links a:hover {
            color: var(--green);

            padding-left: 4px;
        }

        .social-icons {
            margin-top: 20px;
        }

        .social-icons a {
            width: 38px;

            height: 38px;

            border: 1px solid #555555;

            border-radius: 50%;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            color: #ffffff;

            margin-right: 7px;

            transition: .3s;
        }

        .social-icons a:hover {
            background: var(--green);

            border-color: var(--green);

            transform: translateY(-2px);
        }

        .copyright {
            border-top: 1px solid #444444;

            padding-top: 20px;

            text-align: center;

            font-size: 12px;

            color: #999999;
        }


        /* =====================================================
           ANIMATIONS
        ===================================================== */

        @keyframes fadeInLeft {

            from {
                opacity: 0;
                transform: translateX(-30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }

        }

        @keyframes fadeInRight {

            from {
                opacity: 0;
                transform: translateX(30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }

        }

        @keyframes rotateCircle {

            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }

        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 1150px) {

            .nav-links a {
                padding-left: 8px;

                padding-right: 8px;

                font-size: 13px;
            }

            .hero-content h1 {
                font-size: 46px;
            }

        }


        @media (max-width: 992px) {

            .top-bar {
                display: none;
            }

            .hero {
                flex-direction: column;

                text-align: center;

                padding-top: 60px;
            }

            .hero-content,
            .hero-image {
                width: 100%;
            }

            .hero-content p {
                margin-left: auto;

                margin-right: auto;
            }

            .hero-buttons {
                justify-content: center;
            }

            .stats-container {
                grid-template-columns: repeat(2, 1fr);
            }

            .stat-card:nth-child(2) {
                border-right: none;
            }

            .stat-card:nth-child(1),
            .stat-card:nth-child(2) {
                border-bottom: 1px solid #eeeeee;
            }

            .about-container {
                grid-template-columns: 1fr;
            }

            .about-icon {
                max-width: 600px;

                width: 100%;

                margin: auto;
            }

            .steps {
                grid-template-columns: repeat(2, 1fr);
            }

            .categories {
                grid-template-columns: repeat(2, 1fr);
            }

            .contact-container {
                grid-template-columns: repeat(3, 1fr);
            }

            .footer-container {
                grid-template-columns: 1fr 1fr;
            }

        }


        @media (max-width: 768px) {

            .navbar {
                min-height: 70px;

                padding: 0 5%;
            }

            .logo {
                font-size: 28px;
            }

            .menu-button {
                display: block;
            }

            .nav-links {
                display: none;

                position: absolute;

                top: 70px;

                left: 0;

                width: 100%;

                background: #ffffff;

                flex-direction: column;

                align-items: stretch;

                padding: 10px 15px;

                box-shadow:
                    0 8px 15px rgba(0, 0, 0, .08);

                border-top: 1px solid #eeeeee;
            }

            .nav-links.show {
                display: flex;
            }

            .nav-links a {
                text-align: center;

                border-bottom: 1px solid #eeeeee;

                padding: 12px 15px !important;

                border-radius: 0;

                margin: 0 !important;
            }

            .nav-links a:last-child {
                border-bottom: none;
            }

            .login-btn,
            .donor-register-btn,
            .buyer-register-btn {
                border-radius: 8px;

                margin: 4px 0 !important;
            }

            .hero {
                padding: 55px 5% 70px;
            }

            .hero-content h1 {
                font-size: 38px;
            }

            .hero-content p {
                font-size: 16px;
            }

            .hero-circle {
                width: 275px;

                height: 275px;

                font-size: 105px;
            }

            .hero-circle::before {
                width: 300px;

                height: 300px;
            }

            .hero-floating-card {
                transform: scale(.85);
            }

            .hero-floating-card.one {
                left: 0;
            }

            .hero-floating-card.two {
                right: 0;
            }

            .hero-floating-card.three {
                left: 15px;
            }

            .section {
                padding: 65px 5%;
            }

            .section-title h2 {
                font-size: 30px;
            }

            .steps,
            .categories {
                grid-template-columns: 1fr;
            }

            .contact-container {
                grid-template-columns: 1fr;
            }

            .about-points {
                grid-template-columns: 1fr;
            }

            .cta {
                padding: 60px 5%;
            }

            .cta h2 {
                font-size: 30px;
            }

            footer {
                padding: 50px 5% 20px;
            }

            .footer-container {
                grid-template-columns: 1fr;
            }

        }


        @media (max-width: 480px) {

            .logo {
                font-size: 25px;
            }

            .hero-content h1 {
                font-size: 32px;
            }

            .hero-content p {
                font-size: 15px;
            }

            .hero-buttons {
                flex-direction: column;
            }

            .primary-btn,
            .secondary-btn {
                width: 100%;
            }

            .hero-image {
                min-height: 340px;
            }

            .hero-circle {
                width: 225px;

                height: 225px;

                font-size: 82px;
            }

            .hero-circle::before {
                width: 250px;

                height: 250px;
            }

            .hero-floating-card {
                font-size: 10px;

                padding: 9px 12px;
            }

            .hero-floating-card.one {
                top: 35px;
            }

            .hero-floating-card.two {
                top: 130px;
            }

            .hero-floating-card.three {
                bottom: 30px;
            }

            .stats-container {
                grid-template-columns: 1fr;
            }

            .stat-card {
                border-right: none !important;

                border-bottom: 1px solid #eeeeee;
            }

            .stat-card:last-child {
                border-bottom: none;
            }

            .about-icon {
                min-height: 280px;
            }

            .about-icon i {
                font-size: 110px;
            }

            .cta h2 {
                font-size: 27px;
            }

        }

    </style>

</head>


<body>


<!-- =========================================================
     TOP BAR
========================================================== -->

<!-- <div class="top-bar">

    <div class="top-left">

        <span>
            <i class="fas fa-map-marker-alt"></i>
            Kerala, India
        </span>

        <span>
            <i class="fas fa-leaf"></i>
            Making surplus food useful
        </span>

    </div>


    <div class="top-right">

        <span>Follow us:</span>

        <a href="#">
            <i class="fab fa-facebook-f"></i>
        </a>

        <a href="#">
            <i class="fab fa-twitter"></i>
        </a>

        <a href="#">
            <i class="fab fa-instagram"></i>
        </a>

    </div>

</div> -->


<!-- =========================================================
     NAVBAR
========================================================== -->

<nav class="navbar">

    <a href="{{ url('/guest') }}"
        class="logo">

        Surplus

    </a>


    <div class="menu-button"
        onclick="toggleMenu()">

        <i class="fas fa-bars"></i>

    </div>


    <div class="nav-links"
        id="navLinks">


        <a href="#home">
            Home
        </a>


        <a href="#about">
            About
        </a>


        <a href="#how-it-works">
            How It Works
        </a>


        <a href="#categories">
            Food Categories
        </a>


        <a href="#contact">
            Contact
        </a>


        <a href="{{ url('/login') }}"
            class="login-btn">

            Login

        </a>


        <a href="{{ url('/donorregister') }}"
            class="donor-register-btn">

            Donor Register

        </a>


        <a href="{{ route('buyerregister') }}"
            class="buyer-register-btn">

            Buyer Register

        </a>

    </div>

</nav>


<!-- =========================================================
     HERO SECTION
========================================================== -->

<section class="hero"
    id="home">


    <div class="hero-content">


        <div class="hero-badge">

            <i class="fas fa-leaf"></i>

            Surplus Food Management System

        </div>


        <h1>

            Give Surplus Food

            <span>
                A Second Chance
            </span>

        </h1>


        <p>

            Surplus connects food donors with people who need
            food. Reduce food waste, make surplus food useful,
            and build a better community together.

        </p>


        <div class="hero-buttons">


            <a href="{{ url('/donorregister') }}"
                class="primary-btn">

                <i class="fas fa-hand-holding-heart"></i>

                Donate Food

            </a>


            <a href="{{ route('buyerregister') }}"
                class="secondary-btn">

                <i class="fas fa-shopping-basket"></i>

                Register as Buyer

            </a>

        </div>

    </div>


    <div class="hero-image">


        <div class="hero-circle">

            <i class="fas fa-utensils"></i>

        </div>


        <div class="hero-floating-card one">

            <i class="fas fa-box-open"></i>

            Surplus Food

        </div>


        <div class="hero-floating-card two">

            <i class="fas fa-search"></i>

            Find Food

        </div>


        <div class="hero-floating-card three">

            <i class="fas fa-check-circle"></i>

            Easy Requests

        </div>

    </div>

</section>


<!-- =========================================================
     STATS
========================================================== -->

<section class="stats">

    <div class="stats-container">


        <div class="stat-card">

            <i class="fas fa-utensils"></i>

            <h3>100+</h3>

            <p>
                Food Listings
            </p>

        </div>


        <div class="stat-card">

            <i class="fas fa-users"></i>

            <h3>50+</h3>

            <p>
                Registered Users
            </p>

        </div>


        <div class="stat-card">

            <i class="fas fa-shopping-basket"></i>

            <h3>75+</h3>

            <p>
                Food Requests
            </p>

        </div>


        <div class="stat-card">

            <i class="fas fa-leaf"></i>

            <h3>100%</h3>

            <p>
                Waste Reduction Focus
            </p>

        </div>

    </div>

</section>


<!-- =========================================================
     ABOUT SECTION
========================================================== -->

<section class="section about"
    id="about">


    <div class="section-title">

        <span class="section-label">
            About Surplus
        </span>

        <h2>
            Turning Surplus Food Into Something Valuable
        </h2>

        <p>

            A simple platform designed to connect surplus food
            with people who can make use of it.

        </p>

    </div>


    <div class="about-container">


        <div class="about-icon">

            <i class="fas fa-seedling"></i>

        </div>


        <div class="about-content">


            <h3>
                A Simple Way To Manage Surplus Food
            </h3>


            <p>

                Every day, usable food can become surplus for
                households, shops, restaurants, and other food
                providers.

            </p>


            <p>

                Surplus provides a platform where donors can
                register surplus food and buyers can discover
                available food and submit purchase requests.

            </p>


            <p>

                Our goal is to make the process simple,
                organized, and accessible while helping reduce
                unnecessary food waste.

            </p>


            <div class="about-points">

                <div class="about-point">

                    <i class="fas fa-check-circle"></i>

                    Easy Food Registration

                </div>


                <div class="about-point">

                    <i class="fas fa-check-circle"></i>

                    Simple Food Discovery

                </div>


                <div class="about-point">

                    <i class="fas fa-check-circle"></i>

                    Organized Requests

                </div>


                <div class="about-point">

                    <i class="fas fa-check-circle"></i>

                    Reduced Food Waste

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     HOW IT WORKS
========================================================== -->

<section class="section how-it-works"
    id="how-it-works">


    <div class="section-title">

        <span class="section-label">
            Simple Process
        </span>

        <h2>
            How Surplus Works
        </h2>

        <p>

            The platform makes surplus food management simple
            for both donors and buyers.

        </p>

    </div>


    <div class="steps">


        <div class="step-card">

            <div class="step-number">
                01
            </div>

            <div class="step-icon">

                <i class="fas fa-user-plus"></i>

            </div>

            <h3>
                Register
            </h3>

            <p>

                Create an account as a donor or buyer to use
                the platform.

            </p>

        </div>


        <div class="step-card">

            <div class="step-number">
                02
            </div>

            <div class="step-icon">

                <i class="fas fa-box-open"></i>

            </div>

            <h3>
                List Food
            </h3>

            <p>

                Donors can add details about their available
                surplus food.

            </p>

        </div>


        <div class="step-card">

            <div class="step-number">
                03
            </div>

            <div class="step-icon">

                <i class="fas fa-search"></i>

            </div>

            <h3>
                Find Food
            </h3>

            <p>

                Buyers can browse available food and find
                items according to their requirements.

            </p>

        </div>


        <div class="step-card">

            <div class="step-number">
                04
            </div>

            <div class="step-icon">

                <i class="fas fa-paper-plane"></i>

            </div>

            <h3>
                Request Food
            </h3>

            <p>

                Buyers can submit a request for the food
                they want.

            </p>

        </div>


        <div class="step-card">

            <div class="step-number">
                05
            </div>

            <div class="step-icon">

                <i class="fas fa-check-circle"></i>

            </div>

            <h3>
                Confirmation
            </h3>

            <p>

                The food request can be processed and
                confirmed through the system.

            </p>

        </div>


        <div class="step-card">

            <div class="step-number">
                06
            </div>

            <div class="step-icon">

                <i class="fas fa-heart"></i>

            </div>

            <h3>
                Reduce Waste
            </h3>

            <p>

                Surplus food gets a useful purpose instead
                of going to waste.

            </p>

        </div>

    </div>

</section>


<!-- =========================================================
     FOOD CATEGORIES
========================================================== -->

<section class="section"
    id="categories">


    <div class="section-title">

        <span class="section-label">
            Explore
        </span>

        <h2>
            Food Categories
        </h2>

        <p>

            Browse different types of food that may be
            available through the platform.

        </p>

    </div>


    <div class="categories">


        <div class="category-card">

            <div class="category-icon">

                <i class="fas fa-apple-alt"></i>

            </div>

            <h3>
                Fruits
            </h3>

            <p>
                Fresh and surplus fruits
            </p>

        </div>


        <div class="category-card">

            <div class="category-icon">

                <i class="fas fa-carrot"></i>

            </div>

            <h3>
                Vegetables
            </h3>

            <p>
                Available surplus vegetables
            </p>

        </div>


        <div class="category-card">

            <div class="category-icon">

                <i class="fas fa-bread-slice"></i>

            </div>

            <h3>
                Bakery
            </h3>

            <p>
                Bakery and baked food items
            </p>

        </div>


        <div class="category-card">

            <div class="category-icon">

                <i class="fas fa-utensils"></i>

            </div>

            <h3>
                Prepared Food
            </h3>

            <p>
                Ready-to-eat food items
            </p>

        </div>

    </div>

</section>


<!-- =========================================================
     CALL TO ACTION
========================================================== -->

<section class="cta">


    <div class="cta-content">

        <h2>
            Have Surplus Food?
        </h2>


        <p>

            Register with Surplus and make your available
            food useful to someone who needs it.

        </p>


        <a href="{{ url('/donorregister') }}"
            class="cta-btn">

            <i class="fas fa-user-plus"></i>

            Become a Donor

        </a>

    </div>

</section>


<!-- =========================================================
     CONTACT
========================================================== -->

<section class="section contact"
    id="contact">


    <div class="section-title">

        <span class="section-label">
            Contact Us
        </span>

        <h2>
            Get In Touch
        </h2>

        <p>
            Get in touch with the Surplus team.
        </p>

    </div>


    <div class="contact-container">


        <div class="contact-card">

            <div class="contact-icon">

                <i class="fas fa-map-marker-alt"></i>

            </div>

            <h3>
                Location
            </h3>

            <p>
                Kerala, India
            </p>

        </div>


        <div class="contact-card">

            <div class="contact-icon">

                <i class="fas fa-envelope"></i>

            </div>

            <h3>
                Email
            </h3>

            <p>
                fooddonation@surplusfood.com
            </p>

        </div>


        <div class="contact-card">

            <div class="contact-icon">

                <i class="fas fa-phone"></i>

            </div>

            <h3>
                Phone
            </h3>

            <p>
                +91 9074870892
            </p>

        </div>

    </div>

</section>


<!-- =========================================================
     FOOTER
========================================================== -->

<footer>


    <div class="footer-container">


        <div class="footer-about">

            <div class="footer-logo">
                Surplus
            </div>


            <p>

                Connecting surplus food with people who need it
                and helping reduce unnecessary food waste.

            </p>


            <div class="social-icons">

                <a href="#">
                    <i class="fab fa-facebook-f"></i>
                </a>

                <a href="#">
                    <i class="fab fa-twitter"></i>
                </a>

                <a href="#">
                    <i class="fab fa-instagram"></i>
                </a>

            </div>

        </div>


        <div>

            <h3>
                Quick Links
            </h3>


            <div class="footer-links">

                <a href="#home">
                    Home
                </a>

                <a href="#about">
                    About
                </a>

                <a href="#how-it-works">
                    How It Works
                </a>

                <a href="#categories">
                    Food Categories
                </a>

                <a href="#contact">
                    Contact
                </a>

            </div>

        </div>


        <div>

            <h3>
                Account
            </h3>


            <div class="footer-links">

                <a href="{{ url('/login') }}">
                    Login
                </a>

                <a href="{{ url('/donorregister') }}">
                    Donor Register
                </a>

                <a href="{{ route('buyerregister') }}">
                    Buyer Register
                </a>

            </div>

        </div>

    </div>


    <div class="copyright">

        © {{ date('Y') }} Surplus.
        All Rights Reserved.

    </div>

</footer>


<!-- =========================================================
     JAVASCRIPT
========================================================== -->

<script>


    function toggleMenu() {

        const menu =
            document.getElementById("navLinks");

        menu.classList.toggle("show");

    }


    const navItems =
        document.querySelectorAll("#navLinks a");


    navItems.forEach(function(item) {

        item.addEventListener("click", function() {

            const menu =
                document.getElementById("navLinks");

            menu.classList.remove("show");

        });

    });


    document
        .querySelectorAll('a[href^="#"]')
        .forEach(function(anchor) {

            anchor.addEventListener("click", function(event) {

                const targetId =
                    this.getAttribute("href");


                if (targetId !== "#") {

                    const target =
                        document.querySelector(targetId);


                    if (target) {

                        event.preventDefault();

                        target.scrollIntoView({

                            behavior: "smooth"

                        });

                    }

                }

            });

        });


    window.addEventListener("scroll", function() {

        const navbar =
            document.querySelector(".navbar");


        if (window.scrollY > 20) {

            navbar.style.boxShadow =
                "0 4px 15px rgba(0,0,0,0.12)";

        } else {

            navbar.style.boxShadow =
                "0 2px 10px rgba(0,0,0,0.08)";

        }

    });

</script>


</body>

</html>