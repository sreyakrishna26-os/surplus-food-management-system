<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SurplusFood - Admin</title>

    <link rel="shortcut icon" type="image/png"
        href="{{ asset('admin/assets/images/logos/favicon.png') }}" />

    <link rel="stylesheet"
        href="{{ asset('admin/assets/css/styles.min.css') }}" />

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>

        /* =====================================================
           SURPLUSFOOD GREEN + WHITE ADMIN THEME
        ===================================================== */

        :root {
            --sf-green: #198754;
            --sf-dark-green: #146c43;
            --sf-light-green: #eaf7ef;
            --sf-hover-green: #dff3e7;
            --sf-white: #ffffff;
            --sf-text: #263238;
            --sf-muted: #6c757d;
            --sf-border: #e3eee7;
        }

        body {
            background: #f7fbf8;
            color: var(--sf-text);
        }

        /* =====================================================
           SIDEBAR
        ===================================================== */

        .left-sidebar {
            background: var(--sf-white) !important;
            border-right: 1px solid var(--sf-border);
            box-shadow: 3px 0 15px rgba(25, 135, 84, 0.06);
        }

        .left-sidebar .brand-logo {
            background: var(--sf-white);
            border-bottom: 1px solid var(--sf-border);
        }

        .left-sidebar .brand-logo a {
            color: var(--sf-green) !important;
            font-weight: 800;
            font-size: 21px;
        }

        /* =====================================================
           SIDEBAR MENU
        ===================================================== */

        .sidebar-nav ul .sidebar-item {
            margin-bottom: 4px;
        }

        .sidebar-nav ul .sidebar-item .sidebar-link {
            color: #4b5563 !important;
            border-radius: 10px;
            margin: 2px 12px;
            padding: 11px 14px;
            transition: all 0.25s ease;
        }

        .sidebar-nav ul .sidebar-item .sidebar-link i,
        .sidebar-nav ul .sidebar-item .sidebar-link .ti {
            color: var(--sf-green) !important;
        }

        .sidebar-nav ul .sidebar-item .sidebar-link:hover {
            background: var(--sf-light-green) !important;
            color: var(--sf-dark-green) !important;
        }

        .sidebar-nav ul .sidebar-item .sidebar-link:hover i,
        .sidebar-nav ul .sidebar-item .sidebar-link:hover .ti {
            color: var(--sf-dark-green) !important;
        }

        /* ACTIVE MENU */

        .sidebar-nav ul .sidebar-item.selected > .sidebar-link,
        .sidebar-nav ul .sidebar-item > .sidebar-link.active {
            background: var(--sf-green) !important;
            color: var(--sf-white) !important;
            box-shadow: 0 5px 12px rgba(25, 135, 84, 0.20);
        }

        .sidebar-nav ul .sidebar-item.selected > .sidebar-link i,
        .sidebar-nav ul .sidebar-item.selected > .sidebar-link .ti,
        .sidebar-nav ul .sidebar-item > .sidebar-link.active i,
        .sidebar-nav ul .sidebar-item > .sidebar-link.active .ti {
            color: var(--sf-white) !important;
        }

        /* =====================================================
           SIDEBAR SECTION TITLES
        ===================================================== */

        .nav-small-cap {
            color: var(--sf-green) !important;
            font-weight: 700;
            font-size: 11px;
            letter-spacing: 1px;
            padding-left: 25px !important;
            margin-top: 18px;
        }

        .nav-small-cap .nav-small-cap-icon {
            color: var(--sf-green) !important;
        }

        /* =====================================================
           HEADER
        ===================================================== */

        .app-header {
            background: var(--sf-white) !important;
            border-bottom: 1px solid var(--sf-border);
            box-shadow: 0 2px 12px rgba(25, 135, 84, 0.06);
        }

        .app-header .nav-link {
            color: var(--sf-text) !important;
        }

        .app-header .nav-link:hover {
            color: var(--sf-green) !important;
        }

        /* Mobile sidebar button */

        .nav-link[data-bs-target="#main-wrapper"] i {
            color: var(--sf-green) !important;
        }

        /* =====================================================
           PROFILE
        ===================================================== */

        .navbar-nav .nav-item .nav-link img {
            border: 2px solid var(--sf-green);
        }

        .dropdown-menu {
            border: 1px solid var(--sf-border);
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(25, 135, 84, 0.12);
        }

        .dropdown-item {
            color: var(--sf-text);
            border-radius: 8px;
            margin: 3px 6px;
            width: auto;
        }

        .dropdown-item:hover {
            background: var(--sf-light-green);
            color: var(--sf-dark-green);
        }

        .dropdown-item i {
            color: var(--sf-green);
        }

        /* =====================================================
           MAIN CONTENT
        ===================================================== */

        .body-wrapper {
            background: #f7fbf8;
        }

        .container-fluid {
            background: transparent;
        }

        /* =====================================================
           GENERAL BUTTONS
        ===================================================== */

        .btn-success {
            background: var(--sf-green) !important;
            border-color: var(--sf-green) !important;
        }

        .btn-success:hover {
            background: var(--sf-dark-green) !important;
            border-color: var(--sf-dark-green) !important;
        }

        .btn-outline-success {
            color: var(--sf-green) !important;
            border-color: var(--sf-green) !important;
        }

        .btn-outline-success:hover {
            background: var(--sf-green) !important;
            color: white !important;
        }

        /* =====================================================
           CARDS
        ===================================================== */

        .card {
            border: 1px solid var(--sf-border);
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(25, 135, 84, 0.05);
        }

        .card-header {
            background: var(--sf-white);
            border-bottom: 1px solid var(--sf-border);
        }

        /* =====================================================
           TABLE
        ===================================================== */

        .table thead th {
            background: var(--sf-light-green);
            color: var(--sf-dark-green);
            border-bottom: 1px solid #cfe8d8;
            font-weight: 700;
        }

        .table tbody tr:hover {
            background: #f2faf5;
        }

        /* =====================================================
           BADGES
        ===================================================== */

        .bg-success {
            background-color: var(--sf-green) !important;
        }

        /* =====================================================
           LINKS
        ===================================================== */

        a {
            color: var(--sf-green);
        }

        a:hover {
            color: var(--sf-dark-green);
        }

        /* =====================================================
           SCROLLBAR
        ===================================================== */

        ::-webkit-scrollbar {
            width: 7px;
        }

        ::-webkit-scrollbar-track {
            background: #f4f8f5;
        }

        ::-webkit-scrollbar-thumb {
            background: #9ed1b3;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--sf-green);
        }

        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 991px) {

            .left-sidebar {
                box-shadow: 5px 0 20px rgba(25, 135, 84, 0.12);
            }

        }

    </style>

</head>

<body>

    <!-- ================= PRELOADER ================= -->

    <div class="preloader">
        <img src="{{ asset('admin/assets/images/logos/favicon.png') }}"
            alt="loading"
            width="40">
    </div>


    <!-- ================= MAIN WRAPPER ================= -->

    <div class="page-wrapper"
        id="main-wrapper"
        data-layout="vertical"
        data-navbarbg="skin6"
        data-sidebartype="full"
        data-sidebar-position="fixed"
        data-header-position="fixed">


        <!-- ================= SIDEBAR ================= -->

        <aside class="left-sidebar">

            <div>

                <!-- LOGO -->

                <div class="brand-logo d-flex align-items-center justify-content-between px-3 py-3">

                    <a href="{{ route('Adminhome') }}"
                        class="text-nowrap text-decoration-none">

                        <i class="fa-solid fa-leaf me-2"></i>
                        SurplusFood

                    </a>

                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer"
                        id="sidebarCollapse">

                        <i class="ti ti-x fs-6"></i>

                    </div>

                </div>


                <!-- SIDEBAR NAVIGATION -->

                <nav class="sidebar-nav scroll-sidebar"
                    data-simplebar="">

                    <ul id="sidebarnav">

                        <!-- HOME -->

                        <li class="nav-small-cap">

                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>

                            <span class="hide-menu">
                                HOME
                            </span>

                        </li>


                        <li class="sidebar-item">

                            <a class="sidebar-link"
                                href="{{ route('Adminhome') }}">

                                <i class="ti ti-layout-dashboard"></i>

                                <span class="hide-menu">
                                    Dashboard
                                </span>

                            </a>

                        </li>


                        <!-- FOOD MANAGEMENT -->

                        <li class="nav-small-cap">

                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>

                            <span class="hide-menu">
                                FOOD MANAGEMENT
                            </span>

                        </li>


                        <li class="sidebar-item">

                            <a class="sidebar-link"
                                href="{{ route('category_view') }}">

                                <i class="ti ti-category"></i>

                                <span class="hide-menu">
                                    Categories
                                </span>

                            </a>

                        </li>


                        <li class="sidebar-item">

                            <a class="sidebar-link"
                                href="{{ route('subcatregister') }}">

                                <i class="ti ti-list-details"></i>

                                <span class="hide-menu">
                                    Subcategories
                                </span>

                            </a>

                        </li>


                        <li class="sidebar-item">

                            <a class="sidebar-link"
                                href="{{ route('admin.foods') }}">

                                <i class="ti ti-tools-kitchen-2"></i>

                                <span class="hide-menu">
                                    Registered Foods
                                </span>

                            </a>

                        </li>


                        <!-- LOCATION MANAGEMENT -->

                        <li class="nav-small-cap">

                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>

                            <span class="hide-menu">
                                LOCATION MANAGEMENT
                            </span>

                        </li>


                        <li class="sidebar-item">

                            <a class="sidebar-link"
                                href="{{ route('districtregister') }}">

                                <i class="ti ti-map"></i>

                                <span class="hide-menu">
                                    Districts
                                </span>

                            </a>

                        </li>


                        <li class="sidebar-item">

                            <a class="sidebar-link"
                                href="{{ route('locationregister') }}">

                                <i class="ti ti-map-pin"></i>

                                <span class="hide-menu">
                                    Locations
                                </span>

                            </a>

                        </li>


                        <!-- USER MANAGEMENT -->

                        <li class="nav-small-cap">

                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>

                            <span class="hide-menu">
                                USER MANAGEMENT
                            </span>

                        </li>


                        <li class="sidebar-item">

                            <a class="sidebar-link"
                                href="{{ route('admin.donors') }}">

                                <i class="ti ti-users"></i>

                                <span class="hide-menu">
                                    Donors
                                </span>

                            </a>

                        </li>


                        <!-- REQUEST MANAGEMENT -->

                        <li class="nav-small-cap">

                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>

                            <span class="hide-menu">
                                REQUEST MANAGEMENT
                            </span>

                        </li>


                        <li class="sidebar-item">

                            <a class="sidebar-link"
                                href="{{ route('donor_pending') }}">

                                <i class="ti ti-clipboard-check"></i>

                                <span class="hide-menu">
                                    Food Requests
                                </span>

                            </a>

                        </li>


                    </ul>

                </nav>

            </div>

        </aside>


        <!-- ================= MAIN BODY ================= -->

        <div class="body-wrapper">


            <!-- ================= HEADER ================= -->

            <header class="app-header">

                <nav class="navbar navbar-expand-lg navbar-light">

                    <ul class="navbar-nav">

                        <li class="nav-item d-block d-xl-none">

                            <a class="nav-link sidebartoggler"
                                id="headerCollapse"
                                href="javascript:void(0)">

                                <i class="ti ti-menu-2"></i>

                            </a>

                        </li>

                    </ul>


                    <div class="navbar-collapse justify-content-end px-0">

                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">

                            <!-- PROFILE -->

                            <li class="nav-item dropdown">

                                <a class="nav-link"
                                    href="javascript:void(0)"
                                    id="drop2"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false">

                                    <img src="{{ asset('admin/assets/images/profile/user-1.jpg') }}"
                                        alt="user"
                                        width="40"
                                        height="40"
                                        class="rounded-circle">

                                </a>


                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">

                                    <div class="message-body">


                                        <!-- ADMIN NAME -->

                                        <div class="px-3 py-2">

                                            <div class="fw-bold">
                                                SurplusFood Admin
                                            </div>

                                            <small class="text-muted">
                                                Administrator
                                            </small>

                                        </div>


                                        <hr class="my-1">


                                        <!-- LOGOUT -->

                                        <form action="{{ route('logout') }}"
                                            method="POST"
                                            class="px-2">

                                            @csrf

                                            <button type="submit"
                                                class="dropdown-item">

                                                <i class="ti ti-logout me-2"></i>

                                                Logout

                                            </button>

                                        </form>


                                    </div>

                                </div>

                            </li>

                        </ul>

                    </div>

                </nav>

            </header>


            <!-- ================= PAGE CONTENT ================= -->

            <div class="container-fluid">

                @yield('content')

            </div>


        </div>

    </div>


    <!-- ================= SCRIPTS ================= -->

    <script src="{{ asset('admin/assets/libs/jquery/dist/jquery.min.js') }}"></script>

    <script src="{{ asset('admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('admin/assets/js/sidebarmenu.js') }}"></script>

    <script src="{{ asset('admin/assets/js/app.min.js') }}"></script>

    <script src="{{ asset('admin/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>

    <script src="{{ asset('admin/assets/libs/simplebar/dist/simplebar.js') }}"></script>

    <script src="{{ asset('admin/assets/js/dashboard.js') }}"></script>

</body>

</html>