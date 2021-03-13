<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <!-- title -->
    <title>Admin Panel - HouseRental</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="{{asset('public/frontend/logo/logo3.jpg')}}" type="image/x-icon">

    <!-- vendor css -->
    <link href="{{asset('public/backend/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('public/backend/lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">
    <link href="{{asset('public/backend/lib/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <link href="{{asset('public/backend/lib/rickshaw/rickshaw.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/backend/lib/highlightjs/github.css') }}" rel="stylesheet">
    <link href="{{asset('public/backend/lib/datatables/jquery.dataTables.css')}}" rel="stylesheet">
    <link href="{{asset('public/backend/lib/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/backend/lib/summernote/summernote-bs4.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('public/backend/css/toastr.min.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css"> --}}

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{asset('public/backend/css/starlight.css')}}">

  </head>


  <body>

    @guest

    @else
            <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo"><a href="{{url('admin/home')}}"><i class="icon ion-android-star-outline"></i> HouseRental</a></div>
    <div class="sl-sideleft">
      <div class="sl-sideleft-menu">
        <a href="{{url('admin/home')}}" class="sl-menu-link active">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

            <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
                <span class="menu-item-label">Places</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('city') }}" class="nav-link">City</a></li>
                <li class="nav-item"><a href="{{ route('subcity') }}" class="nav-link">Sub-City</a></li>
            </ul>

<a href="#" class="sl-menu-link">
    <div class="sl-menu-item">
    <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
    <span class="menu-item-label">All Properties</span>
    <i class="menu-item-arrow fa fa-angle-down"></i>
    </div><!-- menu-item -->
</a><!-- sl-menu-link -->
<ul class="sl-menu-sub nav flex-column">
    <li class="nav-item"><a href="{{ route('admin.add.property') }}" class="nav-link">Add New Property</a></li>
    <li class="nav-item"><a href="{{ route('pending.user_property') }}" class="nav-link">Pending for Approval</a></li>
    <li class="nav-item"><a href="{{ route('admin.uploaded.property') }}" class="nav-link">Uploaded Properties</a></li>
    <li class="nav-item"><a href="{{ route('admin.delivery.progress') }}" class="nav-link">Delivery On Progress</a></li>
    <li class="nav-item"><a href="{{ route('admin.delivered.property') }}" class="nav-link">Successfully Delivered</a></li>
    <li class="nav-item"><a href="{{ route('admin.cancelled.property') }}" class="nav-link">Cancelled Properties</a></li>
</ul>

        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
              <i class="menu-item-icon icon ion-ios-cart-outline tx-24"></i>
              <span class="menu-item-label">Orders</span>
              <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('admin.add.order')}}" class="nav-link">Add New Order</a></li>
            <li class="nav-item"><a href="{{route('admin.new.order')}}" class="nav-link">New Pending Orders</a></li>
            <li class="nav-item"><a href="{{route('admin.all.order')}}" class="nav-link">All Orders</a></li>
        </ul>

        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-paper-outline tx-20"></i>
            <span class="menu-item-label">Newsletter</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('admin.newsletter')}}" class="nav-link">Newsletter</a></li>
        </ul>


        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-filing-outline tx-20"></i>
            <span class="menu-item-label">Review-Messages</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('admin.new.contact')}}" class="nav-link">New Messages</a></li>
            <li class="nav-item"><a href="{{route('admin.all.contact')}}" class="nav-link">All Messages</a></li>
        </ul>

        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-gear-outline tx-20"></i>
            <span class="menu-item-label">Site Settings</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('admin.site.setting') }}" class="nav-link">Site Setting</a></li>
        </ul>


    </div><!-- sl-sideleft-menu -->


      <br>
    </div><!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->





    <!-- ########## START: HEAD PANEL ########## -->
    <div class="sl-header">
      <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- sl-header-left -->
      <div class="sl-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                <span class="logged-name">{{ Auth::user()->name }}</span>
                <img src="{{asset('public/backend/img/img6.jpg')}}" class="wd-32 rounded-circle" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
                <ul class="list-unstyled user-profile-nav">
                    <li><a href="{{route('admin.password.change')}}"><i class="icon ion-ios-gear-outline"></i> Password Change</a></li>
                    <li><a href="{{ route('admin.logout') }}"><i class="icon ion-power"></i> Sign Out</a></li>
                </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
        <div class="navicon-right">
            <i class="icon ion-ios-bell-outline"></i>
        </div><!-- navicon-right -->
      </div><!-- sl-header-right -->
    </div><!-- sl-header -->
    <!-- ########## END: HEAD PANEL ########## -->


    @endguest


    @yield('admin_content')


    <!-----Js_Files------->
    <script src="{{ asset('public/backend/lib/jquery/jquery.js') }}"></script>
    <script src="{{ asset('public/backend/lib/popper.js/popper.js') }}"></script>
    <script src="{{ asset('public/backend/lib/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('public/backend/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
    <script src="{{ asset('public/backend/lib/highlightjs/highlight.pack.js') }}"></script>
    <script src="{{ asset('public/backend/lib/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('public/backend/lib/datatables-responsive/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('public/backend/lib/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('public/backend/lib/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('public/backend/lib/medium-editor/medium-editor.js') }}"></script>
    <script src="{{ asset('public/backend/js/starlight.js') }}"></script>

<!-----for Description box------->
     <script>
      $(function(){
        'use strict';

        // Inline editor
        var editor = new MediumEditor('.editable');

        // Summernote editor
        $('#summernote').summernote({
          height: 150,
          tooltip: false
        })
      });
    </script>
    <script>
      $(function(){
        'use strict';

        // Inline editor
        var editor = new MediumEditor('.editable');

        // Summernote editor
        $('#summernote1').summernote({
          height: 150,
          tooltip: false
        })
      });
    </script>

{{-------- data Tables JS -------}}
    <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>



    <script src="{{ asset('public/backend/lib/jquery-ui/jquery-ui.js')}}"></script>
    <script src="{{ asset('public/backend/lib/jquery.sparkline.bower/jquery.sparkline.min.js')}}"></script>
    <script src="{{ asset('public/backend/lib/d3/d3.js')}}"></script>
    <script src="{{ asset('public/backend/lib/rickshaw/rickshaw.min.js')}}"></script>
    <script src="{{ asset('public/backend/lib/chart.js/Chart.js')}}"></script>
    <script src="{{ asset('public/backend/lib/Flot/jquery.flot.js')}}"></script>
    <script src="{{ asset('public/backend/lib/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{ asset('public/backend/lib/Flot/jquery.flot.resize.js')}}"></script>
    <script src="{{ asset('public/backend/lib/flot-spline/jquery.flot.spline.js')}}"></script>
    <script src="{{ asset('public/backend/js/ResizeSensor.js')}}"></script>
    <script src="{{ asset('public/backend/js/dashboard.js')}}"></script>

    <script src="{{asset('public/backend/js/sweetalert2.min.js')}}"></script>
    <script src="{{asset('public/backend/js/toastr.min.js')}}"></script>

    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>  --}}




<!---- Sweet Alert(for DELETE button)----->
    <script>
      $(document).on("click","#delete",function(e){
        e.preventDefault();
          var link = $(this).attr("href");
           swal({
              title: 'Are you want to delete?',
              text: "Once delete,This will be Permanently Delete!",
              icon: 'warning',
              buttons: true,
              dangerMode: true,

          })
          .then((willDelete) => {
              if (willDelete) {
                      window.location.href= link;
              }else{
                  swal("Safe Data!");
              }
              });
      });
  </script>


<!---- Sweet Alert(for CANCEL button)----->
<script>
    $(document).on("click", "#cancel", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
           swal({
             title: "Are you Want to Cancel?",
             text: "Once Cancel,You will find it in 'Cancelled Properties' option!",
             icon: "warning",
             buttons: true,
             dangerMode: true,
           })
           .then((willDelete) => {
             if (willDelete) {
                  window.location.href = link;
             } else {
               swal("Safe Property!");
             }
           });
       });
</script>



{{--------- Toastr ---------------}}
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
