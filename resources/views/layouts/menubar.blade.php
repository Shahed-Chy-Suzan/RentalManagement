
<!-----Ekkhane Frontend er Navbar + nav er sathe joint 'Main-Slide' ta royeche ---->
<nav class="main_nav py-0 my-0">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="main_nav_content d-flex flex-row">

                    <!-- Categories Menu -->

                    <div class="cat_menu_container">
                        <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                            <div class="cat_burger"><span></span><span></span><span></span></div>
                            <div class="cat_menu_text" style="">Choose Places</div>
                        </div>

{{---------- here ---------}}
    @php
    $city=DB::table('cities')->get();
    @endphp
                    <ul class="cat_menu pb-2 pt-2">
                        @foreach( $city as $cat)
                            <li class="hassubs more moreNav">
                                <a href="{{url('city/properties/'.$cat->id) }}" class="button-pipaluk button--inverted pl-5">{{ $cat->city_name }}<i class="fas fa-arrow-circle-right pr-3"></i></a> <!--button-pipaluk button--inverted px-5 my-1-->
                                <ul class="py-1">
                                    @php
                                        $subcity=DB::table('subcities')->where('city_id',$cat->id)->get();
                                    @endphp
                                    @foreach($subcity as $row)
                                    <li class="more moreNav">
                                        <a href="{{ url('properties/'.$row->id) }}" class="button-pipaluk button--inverted" style="padding-left:70px;">{{  $row->subcity_name }}<i class="fas fa-arrow-circle-right z-index-100"></i></a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>

                    <!-- Main Nav Menu -->

                    <div class="main_nav_menu ml-auto">
                        <ul class="standard_dropdown main_nav_dropdown">
                            <li><a href="{{ url('/') }}">@if(session()->get('lang') == 'bangla') হোম @else Home @endif</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</nav>

</header>


 <!---------------------------Main Slider-Carousal-(Nav) --------------------------->

<section id="showcase">
    <div id="slider" class="carousel slide" data-ride="carousel"> <!--.carousel-fade-->
      <ol class="carousel-indicators">
         <li class="active" data-target="#slider" data-slide-to="0"></li>
         <li data-target="#slider" data-slide-to="1"></li>
         <li data-target="#slider" data-slide-to="2"></li>
      </ol>
        <div class="carousel-inner">
          <div class="carousel-item carousel-img-1 active">
            <div class="container">
                <div class="col-lg-8 offset-lg-4 pt-5">
                    <div class="shadow-lg rounded" style=" background:#AC5488; opacity: .8">
                        <h1 class="text-light p-3">Search properties for sale and rent in United Kingdom</h1>
                    </div>
                </div>
            </div>
          </div>
          <div class="carousel-item carousel-img-2">
             <div class="container">
                <div class="col-lg-8 offset-lg-4 pt-5">
                <div class="shadow-lg rounded" style="background:#AC5488; opacity: .8">
                    <h1 class="text-light p-3">Search properties for sale and rent in United Kingdom</h1>
                </div>
                </div>
               </div>
               </div>
               <div class="carousel-item carousel-img-3">
                  <div class="container">
                      <div class="col-lg-8 offset-lg-4 pt-5">
                        <div class="shadow-lg rounded" style=" background:#AC5488; opacity: .8">
                            <h1 class="text-light p-3">Search properties for sale and rent in United Kingdom</h1>
                        </div>
                    </div>
                    </div>
               </div>
          </div>
          <a href="#slider" class="carousel-control-prev" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>
          <a href="#slider" class="carousel-control-next" data-slide="next">
              <span class="carousel-control-next-icon"></span>
          </a>
      </div>
  </section>
