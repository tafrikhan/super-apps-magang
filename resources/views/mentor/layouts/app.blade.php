<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>@yield('title', 'Admin')</title>
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon"
        href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQklJ0c2uKkN9rFBBfFTqESoy2S6dBxAsZIpQ&s" />


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <img src="{{ asset('assets/img/logo/logo-rumah-mesin.png') }}" alt="App Logo"
                                style="width: 50px; height: auto;" />
                        </span>
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">Super Apps</span>
                    </a>
            
                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>
            
                <div class="menu-inner-shadow"></div>
            
                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <a href="{{ route('mentor.dashboard') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Halaman Utama</div>
                        </a>
                    </li>
            
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Pages</span>
                    </li>
            
                    {{-- <!-- Absensi Pengguna -->
                    <li class="menu-item {{ request()->routeIs('admin.kehadiran.index') ? 'active' : '' }}">
                        <a href="{{ route('admin.kehadiran.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-task"></i>
                            <div data-i18n="Tables">Absensi Pengguna</div>
                        </a>
                    </li>
            
                    <!-- Manajemen Pengguna -->
                    <li class="menu-item {{ request()->routeIs('admin.users.index') ? 'active' : '' }}">
                        <a href="{{ route('admin.users.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-group"></i>
                            <div data-i18n="Tables">Manajemen Pengguna</div>
                        </a>
                    </li>
            
                    <!-- Instansi -->
                    <li class="menu-item {{ request()->routeIs('instansi.index') ? 'active' : '' }}">
                        <a href="{{ route('instansi.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-building"></i>
                            <div data-i18n="Tables">Instansi</div>
                        </a>
                    </li>
            
                    <!-- Penugasan -->
                    <li class="menu-item {{ request()->routeIs('penugasan.index') ? 'active' : '' }}">
                        <a href="{{ route('penugasan.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-book-content"></i>
                            <div data-i18n="Tables">Penugasan</div>
                        </a>
                    </li>
            
                    <!-- Tim Web -->
                    <li class="menu-item {{ request()->routeIs('tim_web.index') ? 'active' : '' }}">
                        <a href="{{ route('tim_web.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-book-content"></i>
                            <div data-i18n="Tables">Tim Web</div>
                        </a>
                    </li>

                    <!-- Tim Sosmed -->
                    <li class="menu-item {{ request()->routeIs('tim_sosmed.index') ? 'active' : '' }}">
                        <a href="{{ route('tim_sosmed.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-book-content"></i>
                            <div data-i18n="Tables">Tim Sosmed</div>
                        </a>
                    </li>
            
                    <!-- Mentor -->
                    <li class="menu-item {{ request()->routeIs('mentors.index') ? 'active' : '' }}">
                        <a href="{{ route('mentors.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-user"></i>
                            <div data-i18n="Tables">Mentor</div>
                        </a>
                    </li>
            
                    <!-- Pengajuan Izin -->
                    <li class="menu-item {{ request()->routeIs('pengajuan_izin.index') ? 'active' : '' }}">
                        <a href="{{ route('pengajuan_izin.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-user-check"></i>
                            <div data-i18n="Pengajuan Izin">Kelola Pengajuan Izin</div>
                        </a>
                    </li> --}}
            
                    <!-- Feedback -->
                    <li class="menu-item {{ request()->routeIs('feedback.admin') ? 'active' : '' }}">
                        <a href="{{ route('feedback.mentor') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-message-square-dots"></i>
                            <div>Feedback</div>
                        </a>
                    </li>
                </ul>
            
                <!-- Logout -->
                <div class="logout-container py-2">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-power-off"></i>
                        <div data-i18n="Logout" class="ms-2">Keluar</div>
                    </a>
                    <form id="logout-form" action="{{ route('mentor.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <i class="bx bx-search fs-4 lh-0"></i>
                                <input type="text" class="form-control border-0 shadow-none" placeholder="Cari..."
                                    aria-label="Cari..." />
                            </div>
                        </div>
                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset(auth()->user()->profile_photo ? 'storage/' . auth()->user()->profile_photo : 'assets/img/avatars/default.jpg') }}"
                                            alt="User Avatar" class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="{{ asset(auth()->user()->profile_photo ? 'storage/' . auth()->user()->profile_photo : 'assets/img/avatars/default.jpg') }}"
                                                            alt="User Avatar" class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>

                                                <div class="flex-grow-1">
                                                    <span
                                                        class="fw-semibold d-block">{{ auth()->user()->name }}</span>
                                                    <small class="text-muted">
                                                        Mentor
                                                    </small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <div class="dropdown-divider"></div>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.profile.edit') }}">
                                    <i class="bx bx-user me-2"></i>
                                    <span class="align-middle">Profil Saya</span>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bx bx-power-off me-2"></i>
                                    <span class="align-middle">Keluar</span>
                                </a>
                            </li>

                            <form id="logout-form" action="{{ route('mentor.logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </ul>
                        </li>
                        <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content -->
                <main class="py-4">
                    @yield('content')
                </main>
                <!-- / Content -->


                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <style>
        .menu-item.active .menu-link {
            background-color: #007bff;
            /* Change this to your desired color */
            color: #ffffff;
            /* Text color */
        }

        .menu-item.active .menu-icon {
            color: #F4473A;
            /* Change icon color when active */
        }

        .logout-container {
            border-top: 1px solid #ddd;
            /* Optional: add a top border for separation */
            padding: 1rem;
            /* Add padding for spacing */
            margin-top: auto;
            /* Push the logout button to the bottom */
        }

        .logout-container .menu-link {
            color: #f00;
            /* Change the color of the logout link */
        }

        .logout-container .menu-icon {
            color: #f00;
            /* Change icon color */
        }
    </style>

    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Inisialisasi Select2
            $('.select2').select2({
                // placeholder: "Pilih Penugasan", // Placeholder jika ingin ditambahkan
                allowClear: true // Memungkinkan user untuk menghapus pilihan
            });
        });
    </script>