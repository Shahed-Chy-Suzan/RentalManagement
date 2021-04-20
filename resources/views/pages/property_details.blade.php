@extends('layouts.app')
@section('content')

<script src="{{asset('public/frontend/js/jquery.min.js')}}"></script>   <!--f_ajax--->

{{-- <div style="background: #F5F5FA; padding-bottom:100px;"> --}}
<div style="background-image: linear-gradient(to top, rgba(255, 255, 255, 0.5) , #F5F5FA);">

<section class="details container py-3">

<!---------- Breadcum ---------->
    <p style="font-size:15px;" class="mb-2 text-primary"> {{$property->type}} For {{$property->purpose}} &nbsp;>&nbsp; {{$property->subcity}} &nbsp;>&nbsp; {{$property->city_name}} &nbsp;>&nbsp; Property Code: {{$property->property_code}}</p>

<!-------Image_Slider_carousal------->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">

        <!---------(Discount equation)-------->
            <div class="carousel-caption" style="transform: translate(-165px,-397px)">
                <ul class="float-left bg-danger rounded-circle ">
                    @if($property->discount_price == NULL)
                    <li style="font-size: 15px; padding-top:12px; height:47px; width: 47px; border-radius:50%;">NEW</li>
                    @else
                    @php
                        $price= implode(explode(',',$property->price));
                        $discount_price= implode(explode(',',$property->discount_price));
                        $amount= $price - $discount_price;
                        $discount= $amount/$price * 100;
                    @endphp
                    <li style="font-size: 16px; padding-top:12px; height:47px; width: 47px; border-radius:50%;" title="Discount Available">
                        {{ intval($discount) }}%
                    </li>
                    @endif
                </ul>
            </div>

    <!------ Slide One - Set the background image for this slide in the line below -------->
        <div class="carousel-item active" style="background-image: url({{asset($property->image_one)}})">

            <div class="carousel-caption d-none d-md-block">
            </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url({{asset($property->image_two)}})">
            <div class="carousel-caption d-none d-md-block">
            </div>
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url({{asset($property->image_three)}})">
            <div class="carousel-caption d-none d-md-block">
            </div>
        </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" title="Previous">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" title="Next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
<!-------End Image_Slider_carousal----->



<!-------------------------Details-Property-------------------------------->
    <div>
        <!--heading-->
        @if($property->city_name=='London' || $property->city_name=='Birmingham' || $property->city_name=='Bristol')
            <h3 class="pt-4 text-primary font-weight-normal" style="font-size: 25px;">
                Visit This Furnished {{$property->type}} Up For {{$property->purpose}} Covering An Area Of {{$property->area}} At {{$property->subcity}}, {{$property->city_name}}
            </h3>
        @elseif($property->purpose=='Sale')
            <h3 class="pt-4 text-primary font-weight-normal" style="font-size: 25px;">
                Grab This Luxurious {{$property->area}} {{$property->type}} Is Up For {{$property->purpose}} At {{$property->subcity}}, {{$property->city_name}}
            </h3>
        @elseif($property->purpose=='Rent')
            <h3 class="pt-4 text-primary font-weight-normal" style="font-size: 25px;">
                Make This {{$property->type}} Your Next Residing Location, Which Is Ready To {{$property->purpose}} At {{$property->subcity}}, {{$property->city_name}}
            </h3>
        @endif  <!--End heading-->

        <p style="font-size: 18px" class="text-dark mb-0 pb-0" title="Place"><i class="fas fa-map-marker-alt mr-2 p-0" style="font-size:16px;"></i>{{$property->address}}, {{$property->subcity}}, {{$property->city_name}}.</p>
        <p style="font-size: 18px" class="text-primary mt-0 pt-1 mb-1">Property Code: {{$property->property_code}}</p>

        <!----Price---->
        @if($property->purpose=='Sale')
            @if($property->discount_price == NULL)
                <div style="font-size: 26px" class="product_price discount my-0"> $ {{$property->price}}</div>
            @else
                <div style="font-size: 26px" class="product_price discount my-0"> $ {{$property->discount_price}}<span style="font-size: 17px"><del><b>$ {{$property->price}}</b></del></span></div>
            @endif
        @else
            @if($property->discount_price == NULL)
                <div style="font-size: 26px" class="product_price discount my-0"> $ {{$property->price}} / Month</div>
            @else
                <div style="font-size: 26px" class="product_price discount my-0"> $ {{$property->discount_price}} / Month<span style="font-size: 18px"><del><b>$ {{$property->price}}</b></del></span></div>
            @endif
        @endif  <!----End Price---->

        <div class="py-3 more">
            <a class="btn py-2 px-4 mr-3 text-white button-pipaluk button--inverted" style="font-size: 18px" roll="button" data-toggle="modal" data-target="#call{{$property->id}}"><i class="fas fa-phone pr-1"></i> Call </a>
            <a class="btn py-2 px-4 text-white button-pipaluk button--inverted" style="font-size: 18px" roll="button" data-toggle="modal" data-target="#email{{$property->id}}"><i class="far fa-envelope pr-1"></i> Email </a>
        </div>


        <!----Overview---->
        <div class="row mt-4">    <!----border---->
            <h3 class="col-md-12 p-2 text-success" style="background-color: #e1f1e9e5; font-size:29px;">Overview</h3>
            <div class="col-md-5">
                    <table class="table table-hover" style="font-size: 16px;">
                        <tr>
                            <td class="border-0">Type :</td>                   <!--class="border-0"-->
                            <td class="border-0">{{ $property->type }}</td>    <!--class="border-0"-->
                        </tr>
                        <tr>
                          <td>Area :</td>
                          <td>{{ $property->area }}</td>
                      </tr>
                      <tr>
                          <td>Price :</td>
                          <td>$ {{ $property->price }}</td>
                      </tr>
                      <tr>
                          @if (isset($property->discount_price))
                            <td>Discount Price ({{ intval($discount) }}%) :</td>
                            <td>$ {{ $property->discount_price }}</td>
                          @else
                            <td>Discount Price :</td>
                            <td>Not Available</td>
                          @endif
                      </tr>
                      <tr>
                          <td>Categoty :</td>
                          <td>{{ $property->category }}</td>
                      </tr>
                      <tr>
                          <td>Purpose :</td>
                          <td>{{ $property->purpose }}</td>
                      </tr>
                      <tr><td></td><td></td></tr>
                    </table>
            </div> <!---end col-md-5--->

            <div class="col-md-1"></div>

            <div class="col-md-5">
                <table class="table table-hover" style="font-size: 16px;">
                    <tr>
                        <td class="border-0">Bedroom : </td>
                        <td class="border-0">{{ $property->bedroom }}</td>
                    </tr>
                    <tr>
                        <td>Bathroom : </td>
                        <td>{{ $property->bathroom }}</td>
                    </tr>
                    <tr>
                        <td>Kitchen : </td>
                        <td>{{ $property->kitchen }}</td>
                    </tr>
                    <tr>
                        <td>Parking : </td>
                        <td>{{ $property->parking }}</td>
                    </tr>
                    <tr>
                      <td>Floor Level :</td>
                      <td>{{ $property->floor }}</td>
                    </tr>
                    <tr>
                        <td>Service Charge :</td>
                        @if (isset($property->service_charge))
                          <td>$ {{ $property->service_charge }}</td>
                        @else
                          <td>N/A</td>
                        @endif
                    </tr>
                    <tr><td></td><td></td></tr>
                </table>
            </div> <!---end col-md-5--->
        </div>	 <!---End Row // End Overview--->


        <!-----Description----->
        <div class="row text-justify my-2">     <!----border---->
          <h3 class="col-md-12 p-2 mb-3 text-success" style="background-color: #e1f1e9e5; font-size:29px;">Description</h3>
          <div class="pl-5 pr-3 pb-3" style="font-size: 16px;">
              {!! $property->details !!}
          </div>
        </div>    <!---End Description--->


        <!-----Map----->
        <div class="row mt-4">
          <h3 class="col-md-12 p-2 mb-3 text-success" style="background-color: #e1f1e9e5; font-size:29px;">Map</h3>
          <div class="col-md-12 ml-2 pr-2">
            @if (isset($property->map_link))
                <iframe src="{{$property->map_link}}" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            @else
                <span style="font-size: 15px;"> Sorry!!! No Map Link Is Available To Show At This moment. </span>
            @endif

          </div>
        </div>    <!---End Map--->

    </div> <!--full div-->

</section>

</div> <!--bg-color--->


@endsection
