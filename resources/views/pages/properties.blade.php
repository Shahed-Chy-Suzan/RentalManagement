@extends('layouts.app')
@section('content')

<script src="{{asset('public/frontend/js/jquery.min.js')}}"></script>   <!--f_ajax--->

<div style="background: #F5F5FA; padding-bottom:100px;">

<!-- Shop -->
<div class="shop">
    <div class="container-fluid">
        <div class="row ml-3 pl-3 py-5">

<!-----------------------Start Left_Side_Bar----------------------------->
            <div class="col-md-2 align-self-start top_bar_contact_item d-none d-lg-block" style="padding-top: 140px; margin-right:-40px;">
                <!-- Sidebar -->
    <!------SubCity list------------>
                <div>
                    @php
                        $city1=DB::table('cities')->where('id',$cityId->city_id)->first();
                    @endphp
                    <div class="pr-0 mr-0" >
                        <h3 style="color: #39af39; font-size: 19px; padding-bottom:9px;">Popular {{ $city1->city_name}} <br>Neighborhoods :</h3>
                        <ul class="ml-4" style="font-size: 16px;">
                            @foreach($subcity as $row)
                                <li class="fas fa-arrow-right" style="font-size: 10px;"></li>
                                <li class="list-inline-item "><a href="{{url('properties/'.$row->id) }}" style="color:blue;">{{ $row->subcity_name}}</a></li> <br>
                            @endforeach
                        </ul>
                    </div>

    <!-------------City list--------------->
                    <div class="my-4 py-2 pr-0 mr-0">
                        <h3 style="color:#39af39; font-size:20px; padding-bottom:9px;">Available Cities :</h3>
                        @php
                            $city=DB::table('cities')->get();
                        @endphp
                        <ul class="ml-4" style="font-size: 16px;">
                            @foreach ($city as $town)
                                <li class="fas fa-arrow-right" style="font-size: 10px;"></li>
                                <li class="list-inline-item"><a href="{{url('city/properties/'.$town->id) }}" style="color:blue;">{{$town->city_name}}</a></li> <br>
                            @endforeach
                        </ul>
                    </div>
              </div>
            </div>  <!--End left side -->

<!--------//------------//--------End Left_Side_Bar---------//------------//------------//-------->






<!------------------------Start Right_Side_Bar------------------------->
    <div class="col-md-10 pl-4" style="border-left:1px solid blue;">
        <!-- Shop Content -->
            <div class="clearfix pl-2">
                @if(isset($cityId->subcity_id) )
                    @foreach ($property as $item)
                        <h2 style="font-size: 33px;" class="text-primary mb-0">Available Properties In {{ $item->subcity }}, {{ $item->city_name}}</h2> @break
                    @endforeach
                @else
                    <h2 style="font-size: 33px;" class="text-primary mb-0">Available Properties In {{ $city1->city_name}}</h2>
                @endif

                <p style="font-size: 17px; margin-top:0px;"><span class="badge badge-primary text-white rounded-circle p-1">{{ count($count) }}</span> Properties found</p>
            </div> <hr class="pb-4">

<div class="mr-5 px-2">
    <!-- Project One -->
@foreach($property as $row)
    <div class="row bg-white mb-4 border border-primary rounded ww ml-0">
    <div class="col-md-5 ml-0 pl-0">
        <div id="{{$row->property_code}}" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#{{$row->property_code}}" data-slide-to="0" class="active"></li>
                <li data-target="#{{$row->property_code}}" data-slide-to="1"></li>
                <li data-target="#{{$row->property_code}}" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner" style="height: 300px">

        <!---------(Discount equation)-------->
            <div class="carousel-caption" style="transform: translate(-70px,-219px)">
                <ul class="float-left bg-danger rounded-circle ">
                    @if($row->discount_price == NULL)
                    <li style="font-size: 13px; padding-top:9px; height:39px; width: 39px; border-radius:50%;">New</li>
                    @else
                    @php
                        $price= implode(explode(',',$row->price));
                        $discount_price= implode(explode(',',$row->discount_price));
                        $amount= $price - $discount_price;
                        $discount= $amount/$price * 100;
                    @endphp
                    <li style="font-size: 13px; padding-top:9px; height:39px; width: 39px; border-radius:50%;" title="Discount Available">
                        {{ intval($discount) }}%
                    </li>
                    @endif
                </ul>
            </div>

                <a href="{{ url('property/details/'.$row->id) }}" title="Click for details">
                    <div class="carousel-item active">
                        <img style="height: 300px; width: 700px" src="{{asset($row->image_one)}}"/>
                    </div>
                    <div class="carousel-item">
                        <img style="height: 300px; width: 700px" src="{{asset($row->image_two)}}"/>
                    </div>
                    <div class="carousel-item">
                        <img style="height: 300px; width: 700px" src="{{asset($row->image_three)}}"/>
                    </div>
                </a>
            </div>

            <a href="#{{$row->property_code}}" class="carousel-control-prev" data-slide="prev" title="Previous">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a href="#{{$row->property_code}}" class="carousel-control-next" data-slide="next" title="Next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>

    <div class="col-md-7">
    @if($row->purpose=='Sale')
        <h3 class="pt-3 text-primary font-weight-normal" title="Click for details">
            <a href="{{ url('property/details/'.$row->id) }}">
                {{$row->area}} Furnished {{$row->type}} Ready For {{$row->purpose}} at {{$row->city_name}}
            </a>
        </h3>
    @elseif($row->purpose=='Rent')
        <h3 class="pt-3 text-primary font-weight-normal" title="Click for details">
            <a href="{{ url('property/details/'.$row->id) }}">
                A Furnished {{$row->area}} {{$row->type}} Ready To {{$row->purpose}} at {{$row->city_name}}
            </a>
        </h3>
    @endif
        <p style="font-size: 15px" class="text-dark mb-0 pb-0" title="Place"><i class="fas fa-map-marker-alt mr-2 p-0" style="font-size:13px;"></i>{{$row->address}}, {{$row->subcity}}, {{$row->city_name}}.</p>
        <p style="font-size: 16px" class="text-primary mt-0 pt-1">Property Code: {{$row->property_code}}</p>


    @if($row->purpose=='Sale')
        @if($row->discount_price == NULL)
            <div style="font-size: 25px" class="product_price discount my-0"> BDT {{$row->price}}</div>
        @else
            <div style="font-size: 25px" class="product_price discount my-0"> BDT {{$row->discount_price}}<span style="font-size: 17px"><del><b>BDT {{$row->price}}</b></del></span></div>
        @endif
    @else
        @if($row->discount_price == NULL)
            <div style="font-size: 25px" class="product_price discount my-0"> BDT {{$row->price}} / month</div>
        @else
            <div style="font-size: 25px" class="product_price discount my-0"> BDT {{$row->discount_price}} / month<span style="font-size: 17px"><del><b>BDT {{$row->price}}</b></del></span></div>
        @endif
    @endif

        <div class="col-md-12 ml-0 pl-1 d-none d-lg-block" style="font-size: 20px">
            <i class="fas fa-bed pr-4" title="Bed Room"> {{$row->bedroom}} </i> |
            <i class="fas fa-bath p-4" title="Bath Room"> {{$row->bathroom}} </i> |
            <i class="fas fa-car p-4" title="Parking"> {{$row->parking}} </i> |
            <i class="fas fa-home p-4" title="Area"> {{$row->area}} </i> |
            <i class="fas fa-building p-4" title="Floor Level"> {{$row->floor}} </i> |
        </div>

        <div class="more">
            <a class="btn btn-white py-2 px-4 mr-3 text-white button-pipaluk button--inverted" style="font-size: 18px" roll="button" data-toggle="modal" data-target="#call{{$row->id}}"><i class="fas fa-phone pr-1"></i> Call </a>
            <a class="btn py-2 px-4 text-white button-pipaluk button--inverted" style="font-size: 18px" roll="button" data-toggle="modal" data-target="#email{{$row->id}}"><i class="far fa-envelope pr-1"></i> Email </a>
        </div>  <!--div class="more" extra added, & In <a> removed 'btn-primary',added button-pipaluk button--inverted-->
    </div>
    </div>

@endforeach
    <!-- /.row -->


    <!--If all property are sold under e subcategory then it will show this-->
        @if (count($count)== 0)
            <h2 class="text-danger text-center mt-5"><i class="fa fa-times pr-2 text-danger"></i> Sorry! No property available at this moment.</h2>
        @endif


    </div>

        <!--------------------Pagination--------------------->
                <div class="py-5 ml-md-auto ml-sm-auto ml-lg-5 pl-lg-5" style="font-size: 20px;">
                    {{ $property->links() }}
                </div>

            </div><!--end col-lg-10--->
        </div>
    </div>
</div>
</div> <!--bg-color--->


@endsection
