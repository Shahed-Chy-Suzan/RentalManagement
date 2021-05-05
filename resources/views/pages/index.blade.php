@extends('layouts.app')
@section('content')
@include('layouts.menubar')

<script src="{{asset('public/frontend/js/jquery.min.js')}}"></script>   <!--f_Ajx--->


<!-------------- Start 'Deals of the week'(hot_new_arrival)----------------->
@php
  $Deals=DB::table('user_properties')
        ->join('cities','user_properties.city_id','cities.id')
        ->join('subcities','user_properties.subcity_id','subcities.id')
        ->select('user_properties.*','cities.city_name','subcities.subcity_name')
        ->whereIn('status', [1,2])
        ->where('hot_new',1)
        ->orderBy('id','desc')
        ->limit(4)
        ->get();
@endphp

<!-----'Deals of the week' ------>
<div class="deals_featured">
    <div class="container">
        <div class="row">
            <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">

                <!-- Deals -->

                <div class="deals">
                    <div class="deals_title">New arrival</div>
                    <div class="deals_slider_container">

                        <!-- Deals Slider -->
                        <div class="owl-carousel owl-theme deals_slider">
<!---------------------------------------------------------------->
                    @foreach($Deals as $ht)
                            <!-- Deals Item -->
                            <div class="owl-item deals_item">

                                <div class="deals_image portfolio-item" title="Click for details">
                                    <img src="{{ asset($ht->image_one) }}" style="width: 330px; height: 255px;">
                                    <a href="{{ url('property/details/'.$ht->id) }}" class="portfolio-item-overlay">
                                        <div class="portfolio-item-details text-center">
                                            <!--item logo-->
                                            <h3>{{ $ht->type }} for {{ $ht->purpose }}</h3>
                                            <!--item strips-->
                                            <span></span>
                                            <!--item description-->
                                            <p>{{$ht->subcity_name}}, {{$ht->city_name}}</p>
                                        </div>
                                    </a>
                                </div>

                                <div class="deals_content">
                                    <div class="deals_info_line d-flex flex-row justify-content-start">
                                        <div class="deals_item_category">
                                            <a href="{{ url('property/details/'.$ht->id) }}" title="Click for details">
                                                {{$ht->city_name}}
                                            </a>
                                        </div>
                                        @if($ht->discount_price == NULL)
                                        @else
                                          <div class="deals_item_price_a ml-auto"><del>£ {{ $ht->price }}</del></div>
                                        @endif
                                    </div>

                                    <div class="deals_info_line d-flex flex-row justify-content-start">
                                        <div class="deals_item_name">
                                            <a href="{{ url('property/details/'.$ht->id) }}" title="Click for details">
                                                {{ $ht->subcity_name }}
                                            </a>
                                        </div>

                                        @if($ht->discount_price == NULL)
                                          <div class="deals_item_price ml-auto" style="font-size: 18px">£ {{ $ht->price }}</div>
                                        @else
                                          <div class="deals_item_price ml-auto" style="font-size: 18px">£ {{ $ht->discount_price }}</div>
                                        @endif
                                    </div>


                                    <div class="DealsWeek row no-gutters align-items-center justify-content-start mt-1">
                                      <span class="col-md-5">{{ $ht->type }} for {{ $ht->purpose }}</span> <span class="col-md-7 mr-auto justify-content-start"><hr></span>
                                    </div>


                                    <div class="row mb-4">
                                        <div class="col-md-12 mb-2" title="Place">
                                            <i class="fas fa-map-marker-alt mr-2 p-0" style="font-size:13px;" title="Place"></i>{{$ht->address}}
                                        </div>
                                        <div class="col-md-12">
                                            <i class="fas fa-bed" title="Bed Room"> {{$ht->bedroom}}</i>|
                                            <i class="fas fa-bath" title="Bath Room"> {{$ht->bathroom}}</i>|
                                            <i class="fas fa-car" title="Parking"> {{$ht->parking}}</i>|
                                            <i class="fas fa-home" title="Area"> {{$ht->area}}</i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        </div>

                    </div>

                    <div class="deals_slider_nav_container">
                        <div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
                        <div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
                    </div>
                </div>
    <!----------//-----//------ End of 'Deals of the Weak' -----------//-----------//-------->





<!-----------------------Start 'Featured'------------------------------>
@php
    $featured=DB::table('user_properties')->join('cities','user_properties.city_id','cities.id')->join('subcities','user_properties.subcity_id','subcities.id')->select('user_properties.*','cities.city_name','subcities.subcity_name')->whereIn('status', [1,2])->orderBy('id','desc')->get();   //sob_property(available)
@endphp

    <!------ Featured ------>
                <div class="featured">
                    <div class="tabbed_container">
                        <div class="tabs">
                            <ul class="clearfix">
                                <li class="active">@if(session()->get('lang') == 'bangla')ফিচারড @else Featured @endif</li>
                                <li>@if(session()->get('lang') == 'bangla')বিক্রয়ের জন্য @else For Sale @endif</li>
                                <li>@if(session()->get('lang') == 'bangla')ভাড়ার জন্য @else To Rent @endif</li>
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>

                        <!-- Product Panel -->
                        <div class="product_panel panel active">
                            <div class="featured_slider slider pb-5 mb-5">

<!---------------------------------------------------------------->
                            @foreach($featured as $row)
                                <!-- Slider Item -->
                                <div class="featured_slider_item">
                                    <div class="border_active"></div>
                                    <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">

                                        <div class="product_image portfolio-item d-flex flex-column align-items-center justify-content-center" >
                                            <img src="{{ asset($row->image_one) }}" style="height: 140px; width: 150px;">

                                            <a href="{{ url('property/details/'.$row->id) }}" class="portfolio-item-overlay" title="Click for details">
                                                <div class="portfolio-item-details text-center">
                                                    <!--item logo-->
                                                    <h3 style="font-size:10px">{{ $row->type }} for {{ $row->purpose }}</h3>
                                                    <!--item strips-->
                                                    <span></span>
                                                    <!--item description-->
                                                    <p style="font-size:12px">{{$row->subcity_name}}, {{$row->city_name}}</p>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="product_content">
                                            {{-- <div class="product_price discount my-2">$50,000<span><del>$55,000</del></span></div> --}}
                                            @if($row->discount_price == NULL)
                                                <div class="product_price discount my-2"> £ {{ $row->price }}</div>
                                            @else
                                             <div class="product_price discount my-2"> £ {{ $row->discount_price }}<span><del><b> £ {{ $row->price }}</b></del></span></div>
                                            @endif
                                                {{-- <div class="row align-items-center justify-content-start">
                                                    <span class="col-md-12"><small>Apartment For Rent</small></span>
                                                </div> --}}
                                            <div class="row mb-0 pb-0">
                                                <div class="col-md-12 text-primary">
                                                    <a href="{{ url('property/details/'.$row->id) }}" title="Click for details">
                                                        {{$row->subcity_name}}, {{$row->city_name}}
                                                    </a>
                                                </div>
                                                <div class="col-md-12 py-1 text-muted">
                                                    <i class="fas fa-bed" title="Bed Room"> {{$row->bedroom}}</i> |
                                                    <i class="fas fa-bath" title="Bath Room"> {{$row->bathroom}}</i> |
                                                    {{-- <i class="fas fa-car">2</i>| --}}
                                                    <i class="fas fa-home" title="Area"> {{$row->area}}</i>
                                                </div>
                                            </div>

                <!--------"Call & Email" (app.balde.php e niche "Modal" er code ache)-------->
                                            <div class="product_extras product_cart_button more moreFront">
                                                {{-- <button class="product_cart_button">Check Availability</button> --}}
    <a class="btn py-2 px-3 text-white button-pipaluk button--inverted" style="font-size: 16px" roll="button" data-toggle="modal" data-target="#call{{$row->id}}"><i class="fas fa-phone pr-1"></i> Call </a>
    <a class="btn py-2 px-3 text-white button-pipaluk button--inverted" style="font-size: 16px" roll="button" data-toggle="modal" data-target="#email{{$row->id}}"><i class="far fa-envelope pr-1"></i> Email </a>
                                            </div>
                                        </div>

                            <!---------(Discount equation)-------->
                                        <ul class="product_marks">
                                            @if($row->discount_price == NULL)
                                            <li class="product_mark product_discount" style="background: #6868cc;">New</li>
                                            @else
                                            @php
                                                $price= implode(explode(',',$row->price));
                                                $discount_price= implode(explode(',',$row->discount_price));
                                                $amount= $price - $discount_price;
                                                $discount= $amount/$price * 100;
                                            @endphp
                                            <li class="product_mark product_discount" title="Discount Available">
                                                {{ intval($discount) }}%
                                            </li>
                                            @endif
                                        </ul>

                                    </div>
                                </div>
                            @endforeach

                            </div>
                            <div class="featured_slider_dots_cover"></div>
                        </div>

<!-------------//--------------End Featured property-------------//-----------------//------------>



<!---------------------------Start Sale(property)----------------------------------------------------------->
@php
    $sale=DB::table('user_properties')->join('cities','user_properties.city_id','cities.id')->join('subcities','user_properties.subcity_id','subcities.id')->select('user_properties.*','cities.city_name','subcities.subcity_name')->whereIn('status', [1,2])->where('purpose','Sale')->orderBy('id','desc')->get();   //Sale_property(available)
@endphp

            <!-- Product Panel -->

            <div class="product_panel panel">
                <div class="featured_slider slider pb-5 mb-5">

                    <!-- Slider Item -->
<!---------------------------------------------------------------->
                        @foreach($sale as $row)
                            <!-- Slider Item -->
                            <div class="featured_slider_item">
                                <div class="border_active"></div>
                                <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">

                                    <div class="product_image portfolio-item d-flex flex-column align-items-center justify-content-center">
                                        <img src="{{ asset($row->image_one) }}" style="height: 140px; width: 150px;">

                                        <a href="{{ url('property/details/'.$row->id) }}" class="portfolio-item-overlay" title="Click for details">
                                            <div class="portfolio-item-details text-center">
                                                <!--item logo-->
                                                <h3 style="font-size:10px">{{ $row->type }} for {{ $row->purpose }}</h3>
                                                <!--item strips-->
                                                <span></span>
                                                <!--item description-->
                                                <p style="font-size:12px">{{$row->subcity_name}}, {{$row->city_name}}</p>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="product_content">
                                        @if($row->discount_price == NULL)
                                            <div class="product_price discount my-2"> £ {{ $row->price }}</div>
                                        @else
                                         <div class="product_price discount my-2"> £ {{ $row->discount_price }}<span><del><b> £ {{ $row->price }}</b></del></span></div>
                                        @endif
                                        <div class="row mb-0 pb-0">
                                            <div class="col-md-12 text-primary">
                                                <a href="{{ url('property/details/'.$row->id) }}" title="Click for details">
                                                    {{$row->subcity_name}}, {{$row->city_name}}
                                                </a>
                                            </div>
                                            <div class="col-md-12 py-1 text-muted">
                                                <i class="fas fa-bed" title="Bed Room"> {{$row->bedroom}}</i> |
                                                <i class="fas fa-bath" title="Bath Room"> {{$row->bathroom}}</i> |
                                                <i class="fas fa-home" title="Area"> {{$row->area}}</i>
                                            </div>
                                        </div>

                        <!--------"Call & Email" (app.balde.php e niche "Modal" code)-------->
                                        <div class="product_extras product_cart_button more moreFront">
    <a class="btn py-2 px-3 text-white button-pipaluk button--inverted" style="font-size: 16px" roll="button" data-toggle="modal" data-target="#call{{$row->id}}"><i class="fas fa-phone pr-1"></i> Call </a>
    <a class="btn py-2 px-3 text-white button-pipaluk button--inverted" style="font-size: 16px" roll="button" data-toggle="modal" data-target="#email{{$row->id}}"><i class="far fa-envelope pr-1"></i> Email </a>
                                        </div>
                                    </div>

                            <!---------(Discount equation)-------->
                                    <ul class="product_marks">
                                        @if($row->discount_price == NULL)
                                        <li class="product_mark product_discount" style="background: #6868cc;">New</li>
                                        @else
                                        @php
                                            $price= implode(explode(',',$row->price));
                                            $discount_price= implode(explode(',',$row->discount_price));
                                            $amount= $price - $discount_price;
                                            $discount= $amount/$price * 100;
                                        @endphp
                                        <li class="product_mark product_discount" title="Discount Percentage">
                                            {{ intval($discount) }}%
                                        </li>
                                        @endif
                                    </ul>

                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="featured_slider_dots_cover"></div>
                </div>
<!----------//------------------End Sale(property)--------------//-------------//---------->



<!------------------------Start Rent(property)-------------------------------------------------------------->
@php
    $rent=DB::table('user_properties')->join('cities','user_properties.city_id','cities.id')->join('subcities','user_properties.subcity_id','subcities.id')->select('user_properties.*','cities.city_name','subcities.subcity_name')->whereIn('status', [1,2])->where('purpose','Rent')->orderBy('id','desc')->get();   //Rent_property(available)
@endphp
            <!-- Product Panel -->

            <div class="product_panel panel">
                <div class="featured_slider slider pb-5 mb-5">

                    <!-- Slider Item -->
<!---------------------------------------------------------------->
                    @foreach($rent as $row)
                        <!-- Slider Item -->
                        <div class="featured_slider_item">
                            <div class="border_active"></div>
                            <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">

                                <div class="product_image portfolio-item d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset($row->image_one) }}" style="height: 140px; width: 150px;">

                                    <a href="{{ url('property/details/'.$row->id) }}" class="portfolio-item-overlay" title="Click for details">
                                        <div class="portfolio-item-details text-center">
                                            <!--item logo-->
                                            <h3 style="font-size:10px">{{ $row->type }} for {{ $row->purpose }}</h3>
                                            <!--item strips-->
                                            <span></span>
                                            <!--item description-->
                                            <p style="font-size:12px">{{$row->subcity_name}}, {{$row->city_name}}</p>
                                        </div>
                                    </a>
                                </div>

                                <div class="product_content">
                                    {{-- <div class="product_price discount my-2">$50,000<span><del>$55,000</del></span></div> --}}
                                    @if($row->discount_price == NULL)
                                        <div class="product_price discount my-2"> £ {{ $row->price }}</div>
                                    @else
                                     <div class="product_price discount my-2"> £ {{ $row->discount_price }}<span><del><b> £ {{ $row->price }}</b></del></span></div>
                                    @endif
                                    <div class="row mb-0 pb-0">
                                        <div class="col-md-12 text-primary">
                                            <a href="{{ url('property/details/'.$row->id) }}" title="Click for details">
                                                {{$row->subcity_name}}, {{$row->city_name}}
                                            </a>
                                        </div>
                                        <div class="col-md-12 py-1 text-muted">
                                            <i class="fas fa-bed" title="Bed Room"> {{$row->bedroom}}</i> |
                                            <i class="fas fa-bath" title="Bath Room"> {{$row->bathroom}}</i> |
                                            <i class="fas fa-home" title="Area"> {{$row->area}}</i>
                                        </div>
                                    </div>

            <!--------"Call & Email" (app.balde.php e niche "Modal" er code ache)-------->
                                    <div class="product_extras product_cart_button more moreFront">
    <a class="btn py-2 px-3 text-white button-pipaluk button--inverted" style="font-size: 16px" roll="button" data-toggle="modal" data-target="#call{{$row->id}}"><i class="fas fa-phone pr-1"></i> Call </a>
    <a class="btn py-2 px-3 text-white button-pipaluk button--inverted" style="font-size: 16px" roll="button" data-toggle="modal" data-target="#email{{$row->id}}"><i class="far fa-envelope pr-1"></i> Email </a>
                                    </div>
                                </div>

                        <!---------(Discount equation)-------->
                                <ul class="product_marks">
                                    @if($row->discount_price == NULL)
                                    <li class="product_mark product_discount" style="background: #6868cc;">New</li>
                                    @else
                                    @php
                                        $price= implode(explode(',',$row->price));
                                        $discount_price= implode(explode(',',$row->discount_price));
                                        $amount= $price - $discount_price;
                                        $discount= $amount/$price * 100;
                                    @endphp
                                    <li class="product_mark product_discount" title="Discount Percentage">
                                        {{ intval($discount) }}%
                                    </li>
                                    @endif
                                </ul>

                            </div>
                        </div>
                    @endforeach


                </div>
                <div class="featured_slider_dots_cover"></div>
            </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>      <!--------------- End of "Rent(property)" ------------------>

<!---------------//------------ End of "Deals of the Week" -------------------------------------->



<!----------------------------------------Start Reviews----------------------------------------------->
@php
    $review = DB::table('contacts')->where('review',1)->select('name','message','date')->get();
@endphp

<div class="reviews" style="background-color: #EFF6FA">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="reviews_title_container">
                    <h3 class="reviews_title">Latest Reviews</h3>
                    <div class="reviews_all ml-auto"><a href="#">view all <span>reviews</span></a></div>
                </div>

                <div class="reviews_slider_container">
                    <!-- Reviews Slider -->
                    <div class="owl-carousel owl-theme reviews_slider">

                        <!-- Reviews Slider Item -->
                        @foreach($review as $row)
                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div class="review_content">
                                        <div class="review_text">{{$row->message}}</div>
                                        <div class="review_rating_container mt-2">
                                            <div class="review_time">{{$row->date}}</div>
                                        </div>
                                        <div class="review_name">-{{$row->name}}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="reviews_dots"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-------------//--------------//-------------Ends Review---------------//------------//---------->


@php
    $setting=DB::table('sitesetting')->first();
@endphp

        <!------------------------------------Stats // We Deliver Services------------------------------------>
 <section id="stats">
    <div class="container-box-md py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="vertical-heading">
                        <h2>We Deliver <br /> <strong>Excellent</strong> Services</h2>
                    </div>
                </div>
            </div>
            <div class="row wow">
                <div class="col-md-3 col-sm-6 col-6">
                    <!--stats-item 01-->
                    <div class="stats-item text-center">
                        <i class="far fa-chart-bar"></i>
                        <h3 class="counter">{{ $setting->experience }}</h3>
                        <p>Years Experiance</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-6">
                    <!--stats-item 02-->
                    <div class="stats-item text-center">
                        <i class="fab fa-codepen"></i>
                        <h3 class="counter">{{ $setting->project }}</h3>
                        <p>Project Done</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-6">
                    <!--stats-item 03-->
                    <div class="stats-item text-center">
                        <i class="fas fa-trophy"></i>
                        <h3 class="counter">{{ $setting->award }}</h3>
                        <p>Awards Received</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-6">
                    <!--stats-item 04-->
                    <div class="stats-item text-center">
                        <i class="fa fa-users"></i>
                        <h3 class="counter">{{ $setting->clients }}</h3>
                        <p>Happy Clients</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--------End stats // we deliver services---------------->


<!-------------------------------Clients----------------------------->
<section id="clients">
    <div class="container-box-sm py-5">
        <div class="container pb-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="horizontal-heading text-center">
                        <h4 style="color: #F4C613">Satisfied Clients <br></h4>
                        <h1>Our Happy Clients</h1>
                        <div class="line mt-3"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="clients-details" class="owl-carousel owl-theme">
                        <!--clients 01-->
                        <div class="clients">
                            <img src="{{asset('public/frontend/images/client/client-1.png')}}" alt="clients" class="img-fluid">
                        </div>
                        <!--clients 02-->
                        <div class="clients">
                            <img src="{{asset('public/frontend/images/client/client-2.png')}}" alt="clients" class="img-fluid">
                        </div>
                        <!--clients 03-->
                        <div class="clients">
                            <img src="{{asset('public/frontend/images/client/client-3.png')}}" alt="clients" class="img-fluid">
                        </div>
                        <!--clients 04-->
                        <div class="clients">
                            <img src="{{asset('public/frontend/images/client/client-4.png')}}" alt="clients" class="img-fluid">
                        </div>
                        <!--clients 05-->
                        <div class="clients">
                            <img src="{{asset('public/frontend/images/client/client-5.png')}}" alt="clients" class="img-fluid">
                        </div>
                        <!--clients 06-->
                        <div class="clients">
                            <img src="{{asset('public/frontend/images/client/client-6.png')}}" alt="clients" class="img-fluid">
                        </div>
                        <!--clients 07-->
                        <div class="clients">
                            <img src="{{asset('public/frontend/images/client/client-7.png')}}" alt="clients" class="img-fluid">
                        </div>
                        <!--clients 08-->
                        <div class="clients">
                            <img src="{{asset('public/frontend/images/client/client-8.png')}}" alt="clients" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--------//-----------//----------Clients_Ends---------//-----------//-------------//----------//------------>



<!-------------------------------------- Newsletter ------------------------------------------->
<div class="newsletter">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                    <div class="newsletter_title_container">
                        <div class="newsletter_icon"><img src="{{ asset('public/frontend/images/send.png') }}" alt=""></div>
                        <div class="newsletter_title">Sign up for Newsletter</div>
                        <div class="newsletter_text"><p>...and get the latest update.</p></div>
                    </div>
                    <div class="newsletter_content clearfix">
                        <form action="{{ route('store.newsletters') }}" class="newsletter_form" method="post">
                            @csrf
                            <input type="email" class="newsletter_input" required="required" placeholder="Enter your email address" name="email">
                            <button class="newsletter_button" type="submit">Subscribe</button>
                        </form>
                        <div class="newsletter_unsubscribe_link"><a href="">unsubscribe</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-----------//-------------//-----------//-----End Newsletter-----------//------------//-------------//------------>



<!----------------------------------------- FAQ ---------------------------------------------------->
<div id="accordion" role="tablist" class="bg-dark py-5 text-light text-center ">
    <div class="container py-4">
        <div class="row text-center">
            <div class="col">
                <h2 class="mb-0">Frequently Asked Questions</h2>
            </div>
        </div>
        <div class="row mt-5">
        <div class="col-md-12">
            <div class="card bg-light text-dark my-2">
                <div class="card-header text-primary" role="tab">
                    <h4 class="mb-0">
                    <div data-toggle="collapse" href="#questionThree"><i class="fa fa-arrow-circle-down pr-2"></i>How can I submit feedback on my experience?</div>
                    </h4>
                </div>
                <div class="collapse" id="questionThree" data-parent="#accordion">
                    <div class="card-body">
                    <p class="mb-0" style="font-size: 15px">We’re always open to feedback that will help us give you the best experience possible. If you’re posting a Room for Rent, send your thoughts and suggestions to <a href="mailto:{{ $setting->email_one }}"> {{ $setting->email_one }} </a>. For feedback on other types of rentals you can email <a href="mailto:{{ $setting->email_two }}"> {{ $setting->email_two }} </a>.</p>
                    </div>
                </div>
            </div>

            <div class="card bg-light text-dark my-2">
                <div class="card-header text-primary" role="tab">
                    <h4 class="mb-0">
                    <div data-toggle="collapse" href="#questionFour"><i class="fa fa-arrow-circle-down pr-2"></i>How will I know when a renter is interested in my listing?</div>
                    </h4>
                </div>
                <div class="collapse" id="questionFour" data-parent="#accordion">
                    <div class="card-body">
                    <p class="mb-0" style="font-size: 15px; word-spacing: 2px">How renters contact you is up to you.Normally renters can complete short inquiry form which will be delivered to you as an email. These leads will also be shown in your dashboard for your listings. We don’t display your email address, so you don’t have to worry about spam.</p>
                    </div>
                </div>
            </div>

        </div>

        </div>
    </div>
</div>
<!------------//-------------//----------//-------End_FAQ-----------//----------//-----------//------------->




<!--------//-----------//------------//----------//-------------//-----------//------------//-----------//----------->
                                <!----------------- END ---------------->
<!--------//-----------//------------//----------//-------------//-----------//------------//-----------//----------->



<!--------------------------(JS Code)--------------------------------------->

{{--/*==================================
            clients
====================================*/ --}}
<script>
$(function () {
    $("#clients-details").owlCarousel({
        items: 6,
        autoplay: true,
        smartSpeed: 500,
        loop: true,
        dots: true,
        nav: false,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            // breakpoint from 0 up
            0: {
                items: 2
            },
            // breakpoint from 480 up
            480: {
                items: 3
            },
            // breakpoint from 768 up
            768: {
                items: 6
            }
        }

    });
});
</script>

 <!----------------------------------------------------------->

@endsection
