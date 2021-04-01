<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Education</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="/front/css/bootstrap.min.css">
    <link rel="stylesheet" href="/front/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/front/css/magnific-popup.css">
    <link rel="stylesheet" href="/front/css/font-awesome.min.css">
    <link rel="stylesheet" href="/front/css/themify-icons.css">
    <link rel="stylesheet" href="/front/css/nice-select.css">
    <link rel="stylesheet" href="/front/css/flaticon.css">
    <link rel="stylesheet" href="/front/css/gijgo.css">
    <link rel="stylesheet" href="/front/css/animate.css">
    <link rel="stylesheet" href="/front/css/slicknav.css">
    <link rel="stylesheet" href="/front/css/style.css">
    <!-- <link rel="stylesheet" href="/front/css/responsive.css"> -->


    @yield('css')
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div class="header-top_area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="header_top_wrap d-flex justify-content-between align-items-center">
                                @php
                                    $contact = App\Contact::where('status','active')->orderBy('created_at','DESC')->first();
                                @endphp
                                <div class="text_wrap">
                                    <p><span> <i class="fa fa-phone"></i> {{$contact->phone??'N/A'}}    </span> <span> <i class="fa fa-envelope"></i> {{$contact->email??'N/A'}}</span></p>
                                </div>
                                <div class="text_wrap">
                                    <p><a href="/login"> <i class="ti-user"></i>  Login</a> <a href="/register">Register</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="header_wrap d-flex justify-content-between align-items-center">
                                <div class="header_left">
                                    <div class="logo">
                                        <a href="{{url('/')}}">
                                            <img src="/front/img/logo.png" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="header_right d-flex align-items-center">
                                    <div class="main-menu  d-none d-lg-block">
                                        <nav>
                                            <ul id="navigation">
                                                <li><a  href="{{url('/')}}">Home</a></li>
                                                <li><a href="{{url('/about-us')}}">About Us</a></li>
                                                <li><a href="{{url('/blogs')}}">blog</a></li>
                                                <li><a href="{{url('/events')}}">Event</a></li>
                                                <li><a href="{{url('/addmissions')}}">Admissions</a></li>
                                                <li><a href="{{url('/contact-us')}}">Contact Us</a></li>
                                                <li><a href="{{url('/notice')}}">Notice Board</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                    {{-- <div class="Appointment">
                                        <div class="book_btn d-none d-lg-block">
                                            <a data-scroll-nav='1' href="#">Apply NOw</a>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->
    @php
        $latest_notice = App\Notice::where('status','active')->orderBy('created_at','DESC')->first();
    @endphp
    <div class="container-fluid">
        <div class="row bg-dark">
            <marquee>
                    <p style="font-size: : 20px; color:#fff;">{!! $latest_notice->notice_details??'N/A' !!}</p>
            </marquee>
        </div>
    </div>
    @yield('content')

    <!-- footer start -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="newsLetter_wrap">
                    <div class="row justify-content-between">
                        {{-- <div class="col-md-7">
                            <div class="footer_widget">
                                <h3 class="footer_title">
                                    Stay Updated
                                </h3>
                                <form action="#" class="newsletter_form">
                                    <input type="text" placeholder="Email Address">
                                    <button type="submit">Subscribe Now</button>
                                </form>
                            </div>
                        </div> --}}
                        <div class="col-md-12 col-lg-12">
                            <div class="footer_widget">
                                {{-- <h3 class="footer_title">
                                    Stay Updated
                                </h3> --}}
                                <div class="socail_links">
                                    @php
                                        $socialLink = App\SocialLink::where('status','active')->orderBy('created_at','DESC')->first();

                                    @endphp
                                    <ul>
                                        <li>
                                            <a href="{{url($socialLink->facebook??'#')}}" target="_blank">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url($socialLink->twitter??'#')}}" target="_blank">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url($socialLink->gmail??'#')}}" target="_blank">
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url($socialLink->linkedin??'#')}}" target="_blank">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url($socialLink->youtube??'#')}}" target="_blank">
                                                <i class="fa fa-youtube"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url($socialLink->skype??'#')}}" target="_blank">
                                                <i class="fa fa-skype"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url($socialLink->android??'#')}}" target="_blank">
                                                <i class="fa fa-android"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Contact Us
                            </h3>
                            <div class="col-lg-12 offset-lg-1">
                                <div class="media contact-info col-lg-3">
                                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                                    <div class="media-body">
                                        <h3>{!! $contact->address??'N/A' !!}</h3>
                                        {{-- <p>Rosemead, CA 91770</p> --}}
                                    </div>
                                </div>
                                <div class="media contact-info  col-lg-3">
                                    <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                                    <div class="media-body">
                                        <h3>{{$contact->phone??'N/A'}}</h3>
                                        {{-- <p>Mon to Fri 9am to 6pm</p> --}}
                                    </div>
                                </div>
                                <div class="media contact-info  col-lg-3">
                                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                                    <div class="media-body">
                                        <h3>{{$contact->email??'N/A'}}</h3>
                                        {{-- <p>Send us your query anytime!</p> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Quick Access
                            </h3>
                            <ul>
                                <li><a href="{{url('/')}}"> <i class="fa fa-external-link"></i> Home</a></li>
                                <li><a href="{{url('/contact-us')}}"><i class="fa fa-external-link"></i>contact Us</a></li>
                                <li><a href="{{url('/about-us')}}"><i class="fa fa-external-link"></i>About Us</a></li>
                                <li><a href="{{url('/blogs')}}"><i class="fa fa-external-link"></i>Blog</a></li>
                                <li><a href="{{url('/events')}}"><i class="fa fa-external-link"></i>Event</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Reference
                            </h3>
                            <ul>
                                <li><a href="#">Softwere and Technology</a></li>

                            </ul>
                        </div>
                    </div>
                    {{-- <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Support
                            </h3>
                            <ul>
                                <li><a href="#">Support</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">System Requirements</a></li>
                                <li><a href="#">Register Activation Key</a></li>
                                <li><a href="#">Site feedback</a></li>
                            </ul>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        {{-- <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </p>
                    </div>
                </div>
            </div>
        </div> --}}
    </footer>
    <!-- footer end  -->


    <!-- JS here -->
    <script src="/front/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="/front/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="/front/js/popper.min.js"></script>
    <script src="/front/js/bootstrap.min.js"></script>
    <script src="/front/js/owl.carousel.min.js"></script>
    <script src="/front/js/isotope.pkgd.min.js"></script>
    <script src="/front/js/ajax-form.js"></script>
    <script src="/front/js/waypoints.min.js"></script>
    <script src="/front/js/jquery.counterup.min.js"></script>
    <script src="/front/js/imagesloaded.pkgd.min.js"></script>
    <script src="/front/js/scrollIt.js"></script>
    <script src="/front/js/jquery.scrollUp.min.js"></script>
    <script src="/front/js/wow.min.js"></script>
    <script src="/front/js/nice-select.min.js"></script>
    <script src="/front/js/jquery.slicknav.min.js"></script>
    <script src="/front/js/jquery.magnific-popup.min.js"></script>
    <script src="/front/js/plugins.js"></script>
    <script src="/front/js/gijgo.min.js"></script>

    <!--contact js-->
    <script src="/front/js/contact.js"></script>
    <script src="/front/js/jquery.ajaxchimp.min.js"></script>
    <script src="/front/js/jquery.form.js"></script>
    <script src="/front/js/jquery.validate.min.js"></script>
    <script src="/front/js/mail-script.js"></script>

    <script src="/front/js/main.js"></script>

    @yield('script')

</body>

</html>
