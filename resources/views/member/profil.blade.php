<!doctype html>
<html lang="en">

<!-- Mirrored from templates.iqonic.design/xray/html/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Oct 2023 03:07:38 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Profil {{ auth()->user()->name }}</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/typography.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
</head>

<body>
    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- Sidebar  -->
        <!-- Page Content  -->
        <div id="content-page" class="content-page" style="margin-left: 0px">
            <!-- TOP Nav Bar -->
            <div class="iq-top-navbar header-top-sticky" style="width: 100%">
                <div class="iq-navbar-custom">
                    <div class="iq-sidebar-logo">
                        <div class="top-logo">
                            <a href="index.html" class="logo">
                                <img src="{{ asset('storage/img/foto-profil/'.auth()->user()->foto_profil) }}"
                                    class="img-fluid" alt="">
                                <span>K-24</span>
                            </a>
                        </div>
                    </div>
                    <nav class="navbar navbar-expand-lg navbar-light p-0">
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
                                    <img src="{{ asset('storage/img/foto-profil/'.auth()->user()->foto_profil) }}"
                                        class="img-fluid rounded mr-3" alt="user">
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
                                                <span class="text-white font-size-12">Available</span>
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="iq-card">
                            <div class="iq-card-body pl-0 pr-0 pt-0">
                                <div class="doctor-details-block">
                                    <div class="doc-profile-bg bg-primary" style="height:150px;">
                                    </div>
                                    <div class="doctor-profile text-center">
                                        <img src="{{ asset('storage/img/foto-profil/'.auth()->user()->foto_profil) }}"
                                            alt="profile-img" class="avatar-130 img-fluid">
                                    </div>
                                    <div class="text-center mt-3 pl-3 pr-3">
                                        <h4><b>{{ auth()->user()->name }}</b></h4>
                                        <p>@if (auth()->user()->level == 0)
                                            Administrator
                                            @elseif (auth()->user()->level == 1)
                                            Member
                                            @endif</p>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Personal Information</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <div class="about-info m-0 p-0">
                                    <div class="row">
                                        <div class="col-4">Nama:</div>
                                        <div class="col-8">{{ auth()->user()->name }}</div>
                                        <div class="col-4">Email:</div>
                                        <div class="col-8">{{ auth()->user()->email }}</div>
                                        <div class="col-4">Nomor Handphone:</div>
                                        <div class="col-8">{{ auth()->user()->no_hp }}</div>
                                        <div class="col-4">Tanggal Lahir:</div>
                                        <div class="col-8">{{ auth()->user()->tanggal_lahir }}</div>
                                        <div class="col-4">Nomor KTP:</div>
                                        <div class="col-8">{{ auth()->user()->no_ktp }}</div>
                                        <div class="col-4">Jenis Kelamin:</div>
                                        <div class="col-8">{{ auth()->user()->gender }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="iq-card">
                                    <div class="iq-card-header d-flex justify-content-between">
                                        <div class="iq-header-title">
                                            <h4 class="card-title">Update Data Profil</h4>
                                        </div>
                                    </div>
                                    <div class="sign-up-from">
                                        <form class="mt-3" action="/member-profil/{{ auth()->user()->id }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Nama Lengkap<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control mb-0"
                                                            id="exampleInputEmail1" placeholder="Nama Lengkap"
                                                            name="name" value="{{ auth()->user()->name }}">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail2">Email<span
                                                                class="text-danger">*</span></label>
                                                        <input type="email" class="form-control mb-0"
                                                            id="exampleInputEmail2" value="{{ auth()->user()->email }}"
                                                            name="email">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">No Handphone<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control mb-0"
                                                            id="exampleInputPassword1" placeholder="Nomor Handphone"
                                                            name="no_hp" value="{{ auth()->user()->no_hp }}">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Jenis Kelamin<span
                                                                class="text-danger">*</span></label>
                                                        <select class="form-control mb-0" name="gender">
                                                            <option value="L" @if (auth()->user()->gender == 'L')
                                                                selected
                                                                @endif>Laki-Laki</option>
                                                            <option value="P" @if (auth()->user()->gender == 'P')
                                                                selected
                                                                @endif>Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Tanggal Lahir<span
                                                                class="text-danger">*</span></label>
                                                        <input type="date" class="form-control mb-0"
                                                            id="exampleInputPassword1" placeholder="Nomor Handphone"
                                                            name="tanggal_lahir"
                                                            value="{{ auth()->user()->tanggal_lahir }}">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">
                                                            No KTP<span class="text-danger">*</span>
                                                        </label>
                                                        <input type="number" class="form-control mb-0"
                                                            id="exampleInputPassword1" placeholder="Nomor KTP / NIK"
                                                            name="no_ktp" value="{{ auth()->user()->no_ktp }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlFile1">Foto Profil</label>
                                                        <input type="file" class="form-control-file" name="foto_profil">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Password<span
                                                                class="text-danger">*</span></label>
                                                        <input type="password" class="form-control mb-0"
                                                            id="exampleInputPassword1" placeholder="Password"
                                                            name="password">
                                                        <small>
                                                            <i class="text-danger"><b>
                                                                    *Kosongkan
                                                                    jika tidak ingin
                                                                    mengubah password.
                                                                </b>
                                                            </i>
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-inline-block w-100 mb-2">
                                                <button type="submit"
                                                    class="btn btn-primary float-right">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Wrapper END -->
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
    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('assets/js/chart-custom.js') }}"></script>
    <!-- Custom JavaScript -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

<!-- Mirrored from templates.iqonic.design/xray/html/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Oct 2023 03:07:42 GMT -->

</html>