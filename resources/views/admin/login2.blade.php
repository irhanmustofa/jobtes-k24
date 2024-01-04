<!doctype html>
<html lang="en">

<!-- Mirrored from templates.iqonic.design/xray/html/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Oct 2023 03:08:02 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
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
</head>

<body>
    <!-- Sign in Start -->
    <section class="sign-in-page">
        <div class="container sign-in-page-bg mt-5 p-0">
            <div class="row no-gutters">

                <div class="col-md-6 text-center">
                    <div class="sign-in-detail text-white">
                        <a class="sign-in-logo mb-5" href="#"><img src="{{ asset('assets/images/Logo.png') }}"
                                class="w-100 h-100" alt="logo"></a>
                    </div>
                </div>
                <div class="col-md-6 position-relative">
                    <div class="sign-in-from">
                        <h1 class="mb-0">Admin Login</h1>
                        <p>Enter your username and password to access admin panel.</p>
                        <form class="mt-4" action="/adminLogin" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" class="form-control mb-0" id="exampleInputEmail1"
                                    placeholder="Enter Username" name="name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control mb-0" id="exampleInputPassword1"
                                    placeholder="Password" name="password">
                            </div>

                            <div class="d-inline-block w-100">
                                <button type="submit" class="btn btn-primary float-right">Sign in</button>
                            </div>
                            <div class="sign-info">
                                <span class="dark-color d-inline-block line-height-2">Don't have an account? <a
                                        href="#">Sign up</a></span>
                                <ul class="iq-social-media">
                                    <li><a href="#"><i class="ri-facebook-box-line"></i></a></li>
                                    <li><a href="#"><i class="ri-twitter-line"></i></a></li>
                                    <li><a href="#"><i class="ri-instagram-line"></i></a></li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sign in END -->
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
    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('assets/js/chart-custom.js') }}"></script>
</body>

<!-- Mirrored from templates.iqonic.design/xray/html/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Oct 2023 03:08:04 GMT -->

</html>