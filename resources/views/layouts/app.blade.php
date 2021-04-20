
<!----Ekhane FrontEnd tar ekdom "Top Header" then "yield(content)" && Footer tar Code ache --->

<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<title>House Rental System</title>
<meta charset="utf-8">

<!----------this for ajax ----------->
<meta name="csrf" value="{{ csrf_token() }}">       <!----------this for ajax ----------->

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="shortcut icon" href="{{asset('public/frontend/logo/logo3.jpg')}}" type="image/x-icon">

<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/bootstrap4/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/plugins/slick-1.8.0/slick.css')}}">
<link rel="stylesheet" href="{{asset('public/backend/css/toastr.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/responsive.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/newstyle.css')}}">

</head>

<body>

    <div class="super_container">

    <!-- Header -->
    <header class="header smooth-scroll" id="home">


@php
    $setting=DB::table('sitesetting')->first();
@endphp


<div class="top_bar d-none d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col d-flex flex-row">
                <!--class=top_bar_contact_item(rm)-->
                <div class="more moreApp mt-2"><div class="top_bar_icon"><a href="{{ url('/') }}" class="button-pipaluk button--inverted px-2"> <img src="{{asset('public/frontend/logo/logo3.jpg')}}" class="img-fluid rounded-circle" width="65px" height="65px"> <span class="text-primary h5" >HouseRental</span></a></div></div>

                <div class="top_bar_content ml-auto">

<!----User login/Register----->
                    <div class="top_bar_user">
                        @guest
                            <div class="more moreApp mt-2"><a href="{{ route('login') }}" class="button-pipaluk button--inverted px-4 py-2" style="font-size:16px; color:black;">
                                <div class="user_icon"><img src="{{ asset('public/frontend/images/user.svg') }}"></div>
                                    Register/Login
                                </a>
                            </div>
                        @else
                            <ul class="standard_dropdown top_bar_dropdown ">
                                <li class="more moreApp"> <a href="#" class="button-pipaluk button--inverted px-4" style="font-size:16px; color:#333333; font-family: Arial, Helvetica, sans-serif;"><div class="user_icon"><img src="{{ asset('public/frontend/images/user.svg') }}"></div>
                                    Profile
                                </a>
                                    <ul style="padding-top:2px; padding-bottom:1px;">
                                        <li class="more moreS"><a href="{{ route('user.logout') }}" class="button-pipaluk button--inverted px-5">Logout</a></li>
                                    </ul>
                                </li>

                            </ul>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Header Main -->

<div class="header_main" style="height: 128px;">
    <div class="container">
        <div class="row">

            <!-- Logo -->
            <div class="col-lg-2 col-sm-3 col-3 order-1">
                <div class="logo_container">
                <div class="logo">
                    <a href="{{ url('/') }}" class="text-primary" style="font-size: 30px">
                        HouseRental
                    </a>
                </div>
                </div>
            </div>

@php
    $city=DB::table('cities')->get();
@endphp

<!-------------- Search ----------------->
    <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right d-none d-lg-block">
        <div class="header_search">
            <div class="header_search_content" style="left: 81px;">
                <div class="header_search_form_container">
                    <form action="{{ route('property.search') }}" class="header_search_form clearfix" method="GET">
                        @csrf
                        <input type="search" required="required" class="header_search_input" placeholder="Search by city, state or property-code" name="search">
                        <div class="custom_dropdown">
                            <div class="custom_dropdown_list">
                                <span class="custom_dropdown_placeholder clc">All Cities</span>
                                <i class="fas fa-chevron-down"></i>
                                <ul class="custom_list clc">
                                </ul>
                            </div>
                        </div>
                        <button type="submit" class="header_search_button trans_300" value="Submit"><img src="{{ asset('public/frontend/images/search.png') }}" alt=""></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

        </div>
    </div>
</div>
</header>

            <!-- Main Navigation -->


    @yield('content')

    <!--------------------- Contact/Get in Touch ----------------------->
    <section id="contact">
        <div class="container-box-md" id="contact_nav">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">

                        <!--contact left-->
                        <div id="contact-left">
                            <div class="vertical-heading">
                                <h5>Who We Are</h5>
                                <h2 style="color: blue"><b>GET <br> In<strong> Touch</strong></b></h2>
                                <p style="font-size: 15px">Got Question? Call Us 24/7</p>
                            </div>

                            <div id="branch">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="branch">
                                            <h4 style="color: blue">Birmingham</h4>
                                            <ul class="brance-details">
                                                <li><i class="fa fa-phone"></i><a href="tel:{{ $setting->phone_one }}" style="color:black"> {{ $setting->phone_one }} </a></li>
                                                <li><i class="far fa-envelope"></i><a href="mailto:{{ $setting->email_one }}" style="color:black"> {{ $setting->email_one }} </a></li>
                                                <li><i class="fas fa-map-marker-alt"></i>{{ $setting->address_one }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="branch">
                                            <h4 style="color: blue">London</h4>
                                            <ul class="brance-details">
                                                <li><i class="fa fa-phone"></i><a href="tel:{{ $setting->phone_two }}" style="color:black"> {{ $setting->phone_two }} </a></li>
                                                <li><i class="far fa-envelope"></i><a href="mailto:{{ $setting->email_two }}" style="color:black"> {{ $setting->email_two }} </a></li>
                                                <li><i class="fas fa-map-marker-alt"></i>{{ $setting->address_two }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <ul class="social-links">
                                    <li title="Follow us on Facebook"><a href="{{ $setting->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                    <li title="Follow us on Twitter"><a href="{{ $setting->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                    <li title="Follow us on Youtube"><a href="{{ $setting->youtube }}"><i class="fab fa-youtube"></i></a></li>
                                    <li title="Follow us on Instagram"><a href="{{ $setting->instagram }}"><i class="fab fa-instagram"></i></a></li>
                                    <li title="Follow us on Whatsapp"><a href="{{ $setting->whatsapp }}"><i class="fab fa-whatsapp"></i></a></li>
                                </ul>
                            </div>
                        </div>

                    </div>

<div class="col-md-6">

    <!--contact right-->
    <div id="contact-right">
        <form action="{{route('store.contact')}}" method="post">
                @csrf
            <h4 style="color: blue">Send Feedback/Review</h4>
            <p>Feel free to contact with us at any moment...</p>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Your Name" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="phone" placeholder="Phone No" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject" placeholder="Subject">
                    </div>
                </div>

            </div>
            <div class="form-group">
                <textarea class="form-control" rows="3" cols="4" name="message" placeholder="Your Message Will Go Here" required></textarea>
            </div>

            <div id="submit-btn" class="more">
                <button class="btn bg-transparent btn-block text-light button-pipaluk button--inverted" style="font-size: 17px; padding:8px;" role="button">Submit</button>
            </div>

        </form>
    </div>

</div>
                </div>
            </div>
        </div>
    </section>
<!---------------------------------Ends_Contact-------------------------------->

<!----------- for applying ajax in wishlist -------------->

    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
    <!---   OR----////------>
    <script src="{{asset('public/frontend/js/jquery.min.js')}}"></script>



<!--=====================================================
        *------Featured_Modal_(Call & Email)-------*
======================================================--->
@php
    $featured=DB::table('user_properties')->select('user_properties.property_code','user_properties.id')->whereIn('status', [1,2])->orderBy('id','desc')->get();   //sob_property(available)
@endphp

<!------------------Start_Modal_(Call)---------------------->
@foreach ($featured as $row)
<div class="modal fade" id="call{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLongTitle">Contact Agent</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body pb-4">
          <div class="text-center" style="font-size: 18px">HouseRental Listings</div>
          <a style="font-size: 18px; margin-left:110px" roll="button" href="tel:{{ $setting->phone_one }}"><i class="fas fa-phone-volume p-4"></i> {{ $setting->phone_one }} </a>
          <p class="text-center mt-3 mb-0 pb-0">Please quote property reference when calling us.</p>
          <span style="font-size: 15px;margin-left:185px;margin-top:0px;" class="text-primary">{{$row->property_code}}</span>
        </div>
      </div>
    </div>
</div>
@endforeach
<!------------------End_Modal_(Call)---------------------->


<!------------------Start_Modal_(Email)---------------------->
@foreach ($featured as $row)
<div class="modal fade" id="email{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLongTitle">Contact Agent</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('store.modal.email')}}" method="post">
            @csrf
                <div class="container">
                    @php
                        $userid=Auth::id();
                        $userr=DB::table('users')->where('id',$userid)->first();
                    @endphp

                @if (Auth::check())
                    <div class="form-group">
                        <label for="name">Name :</label>
                        <input type="text" class="form-control is-invalid" name="name" id="name" placeholder="Enter Your Name" value="{{$userr->name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="Email">Email :</label>
                        <input type="email" class="form-control is-invalid" name="email" id="Email" placeholder="Enter Your Email" value="{{$userr->email}}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone :</label>
                        <input type="text" class="form-control is-invalid" name="phone" id="phone" placeholder="Enter Your Phone" value="{{$userr->phone}}" required>
                    </div>
                @else
                    <div class="form-group">
                        <label for="name">Name :</label>
                        <input type="text" class="form-control is-invalid" name="name" id="name" placeholder="Enter Your Name" required>
                    </div>
                    <div class="form-group">
                        <label for="Email">Email :</label>
                        <input type="email" class="form-control is-invalid" name="email" id="Email" placeholder="Enter Your Email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone :</label>
                        <input type="text" class="form-control is-invalid" name="phone" id="phone" placeholder="Enter Your Phone" required>
                    </div>
                @endif

                <div class="form-group">
                    <label for="message">Message :</label>
                    <textarea class="form-control" name="message" id="message" rows="3">I would like to inquire about your property {{$row->property_code}}. Please contact me at your earliest convenience.</textarea>
                </div>

                <input type="hidden" name="property_code"  value="{{$row->property_code}}">

                {{-- <button type="submit" class="btn btn-block btn-danger text-white">Send Email</button> --}}
                <div class="more more2">
                    <button type="submit" class="btn btn-block text-white bg-transparent button-pipaluk button--inverted" style="font-size: 17px; padding:8px;">Send Email</button>
                </div>
            </form>
        </div>
        <div class="modal-footer mt-0 pt-1">
          <span class="text-muted text-justify" style="font-size: 10px;">You agree to HouseRental's Terms of Use & Privacy Policy By choosing to contact a property, Property managers may call,text or email you about any inquiries you submit through our services, which may involve use of automated means and prerecorded/artificial voices. You don't need to consent as a condition of renting any property, or buying any other goods or services. Message/data rates may apply.</span>
        </div>
        </div>
      </div>
    </div>
</div>
@endforeach
<!------------------End_Modal_(Email)_Featured---------------------->






<!-------------------------------------JS files--------------------------------------------------->
<script src="{{asset('public/frontend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('public/frontend/styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('public/frontend/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('public/frontend/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{asset('public/frontend/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{asset('public/frontend/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{asset('public/frontend/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{asset('public/frontend/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{asset('public/frontend/plugins/slick-1.8.0/slick.js')}}"></script>
<script src="{{asset('public/frontend/plugins/easing/easing.js')}}"></script>

<!-----------//for ajax //-------->
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>      <!------for using in ajax ------> --}}
<script src="{{asset('public/frontend/js/sweetalert2@8.js')}}"></script>
{{-- <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script> --}}
<script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>

<script src="{{asset('public/backend/js/toastr.min.js')}}"></script>
<script src="{{asset('public/frontend/js/custom.js')}}"></script>


<!--------------------- Toastr --------------------->
<script>
    @if(Session::has('message'))
    var type="{{Session::get('alert-type','info')}}"
    switch (type) {
        case 'info':
            toastr.info("{{Session::get('message')}}")
            break;
        case 'success':
            toastr.success("{{Session::get('message')}}")
            break;
        case 'warning':
            toastr.warning("{{Session::get('message')}}")
            break;
        case 'error':
            toastr.error("{{Session::get('message')}}")
            break;
    }
    @endif
</script>

</body>
</html>
