<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin - @yield('title')</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/typography.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link href="{{ asset('assets/datatables/datatables.min.css') }}" rel='stylesheet' />

    <!-- SweetAlert  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.1/sweetalert2.min.css"
        integrity="sha512-l1vPIxNzx1pUOKdZEe4kEnWCBzFVVYX5QziGS7zRZE4Gi5ykXrfvUgnSBttDbs0kXe2L06m9+51eadS+Bg6a+A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body class="sidebar-main-menu">
    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- Sidebar  -->
        <div class="iq-sidebar">
            <div class="iq-sidebar-logo d-flex justify-content-between">
                <a href="index.html" class="pr-3">
                    <img src="{{ asset('assets/images/Logo.png') }}" class="img-fluid" alt="">
                    <span>K-24</span>
                </a>
                <div class="iq-menu-bt-sidebar">
                    <div class="iq-menu-bt align-self-center">
                        <div class="wrapper-menu">
                            <div class="main-circle"><i class="ri-more-fill"></i></div>
                            <div class="hover-circle"><i class="ri-more-2-fill"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sidebar-scrollbar">
                <nav class="iq-sidebar-menu">
                    <ul id="iq-sidebar-toggle" class="iq-menu">
                        <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Dashboard</span></li>
                        <li class=" @if(Request::segment(1) == 'admin-dashboard')
                            active
                            @endif ">
                            <a href="/admin-dashboard" class="iq-waves-effect"><i
                                    class="ri-hospital-fill"></i><span>Dashboard</span></a>
                        </li>
                        <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Apps</span></li>
                        <li class=" @if(Request::segment(1) == 'data-admin')
                            active
                            @endif ">
                            <a href="/data-admin" class="iq-waves-effect"><i class="ri-user-fill"></i><span>Data
                                    Admin</span></a>
                        </li>
                        <li class=" @if(Request::segment(1) == 'data-member')
                            active
                            @endif ">
                            <a href="/data-member" class="iq-waves-effect"><i class="ri-group-line"></i><span>Data
                                    Member</span></a>
                        </li>
                        <li class=" @if(Request::segment(1) == 'list-member')
                            active
                            @endif ">
                            <a href="/list-member" class="iq-waves-effect"><i class="ri-list-check"></i><span>List Data
                                    Member Json</span></a>
                        </li>

                    </ul>
                </nav>
                <div class="p-3"></div>
            </div>
        </div>

        <div id="content-page" class="content-page">
            <!-- TOP Nav Bar -->
            <div class="iq-top-navbar header-top-sticky">
                <div class="iq-navbar-custom">
                    <div class="iq-sidebar-logo">
                        <div class="top-logo">
                            <a href="index.html" class="logo">
                                <img src="{{ asset('assets/images/Logo.png') }}" class="img-fluid" alt="">
                                <span>K-24</span>
                            </a>
                        </div>
                    </div>
                    <nav class="navbar navbar-expand-lg navbar-light p-0">
                        <div class="iq-menu-bt align-self-center">
                            <div class="wrapper-menu">
                                <span class="bg-primary rounded p-2">MENU</span>
                            </div>
                        </div>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto navbar-list">
                                <li class="nav-item iq-full-screen">
                                    <a href="#" class="iq-waves-effect" id="btnFullscreen"><i
                                            class="ri-fullscreen-line"></i></a>
                                </li>


                            </ul>
                        </div>
                        <ul class="navbar-list">
                            <li>
                                <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                                    <img src="{{ asset('assets/images/1.jpg') }}" class="img-fluid rounded mr-3"
                                        alt="user">
                                    <div class="caption">
                                        <h6 class="mb-0 line-height">{{ auth()->user()->name }}</h6>
                                        <span class="font-size-12">@if (auth()->user()->level == 0)
                                            Administrator
                                            @elseif (auth()->user()->level == 1)
                                            Member
                                            @endif</span>
                                    </div>
                                </a>
                                <div class="iq-sub-dropdown iq-user-dropdown">
                                    <div class="iq-card shadow-none m-0">
                                        <div class="iq-card-body p-0 ">
                                            <div class="bg-primary p-3">
                                                <h5 class="mb-0 text-white line-height">Hello {{ auth()->user()->name }}
                                                </h5>
                                            </div>
                                            <div class="d-inline-block w-100 text-center p-3">
                                                <a class="bg-primary iq-sign-btn" href="@if (auth()->user()->level == 0)
                                                    /logoutAdmin
                                                    @elseif (auth()->user()->level == 1)
                                                    /logout
                                                    @endif" role="button">Sign
                                                    out<i class="ri-login-box-line ml-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </nav>

                </div>
            </div>
            <!-- TOP Nav Bar END -->

            <!-- Page Content  -->
            @yield('content')
        </div>
    </div>
    <!-- Wrapper END -->

    {{-- Data Table --}}
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('assets/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/script.js') }}"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- Appear JavaScript -->
    <script src="{{ asset('assets/js/jquery.appear.js') }}"></script>
    <!-- Countdown JavaScript -->
    <script src="{{ asset('assets/js/countdown.min.js') }}"></script>
    <!-- Counterup JavaScript -->
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <!-- Wow JavaScript -->
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <!-- Apexcharts JavaScript -->
    <script src="{{ asset('assets/js/apexcharts.js') }}"></script>
    <!-- Slick JavaScript -->
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <!-- Select2 JavaScript -->
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <!-- Owl Carousel JavaScript -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <!-- Magnific Popup JavaScript -->
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Smooth Scrollbar JavaScript -->
    <script src="{{ asset('assets/js/smooth-scrollbar.js') }}"></script>
    <!-- lottie JavaScript -->
    <script src="{{ asset('assets/js/lottie.js') }}"></script>
    <!-- am core JavaScript -->
    <script src="{{ asset('assets/js/core.js') }}"></script>
    <!-- am charts JavaScript -->
    <script src="{{ asset('assets/js/charts.js') }}"></script>
    <!-- am animated JavaScript -->
    <script src="{{ asset('assets/js/animated.js') }}"></script>
    <!-- am kelly JavaScript -->
    <script src="{{ asset('assets/js/kelly.js') }}"></script>
    <!-- Flatpicker Js -->
    <script src="{{ asset('assets/js/flatpickr.js') }}"></script>
    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('assets/js/chart-custom.js') }}"></script>
    <!-- Custom JavaScript -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <!-- SweetAlert  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.1/sweetalert2.all.min.js"
        integrity="sha512-1SVc8wK7Y/XRAKRKfP09ILQmzJGwqq6m66x6mWa7r36j+/fa+3kz46s8kvELsGc52yo1as48nneFic7BZKMu8Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).on('click', '.delete-btn', function(e) {
                    e.preventDefault();
                    const url = $(this).attr('href');
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: 'Anda tidak dapat mengembalikan data yang dihapus!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Hapus!',
                        confirmButtonColor: '#198754',
                        cancelButtonText: 'Batal',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = url;
                        }
                    });
                });
    </script>
</body>

<!-- Mirrored from templates.iqonic.design/xray/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Oct 2023 03:07:05 GMT -->

</html>