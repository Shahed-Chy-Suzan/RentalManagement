@extends('admin.admin_layouts')
@section('admin_content')

    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{url('admin/home')}}">HouseRental</a>
        <span class="breadcrumb-item active">Dashboard</span>
      </nav>

      <div class="sl-pagebody">

        <div class="row row-sm justify-content-center">
          <div class="col-sm-6 col-xl-6">
            <div class="card pd-20 bg-primary">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Admin Panel</h6>
                <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                <h3 class="mg-b-0 tx-white tx-lato tx-bold">Online Based HouseRental System</h3>
              </div><!-- card-body -->
            </div><!-- card -->
          </div><!-- col-3 -->
        </div><!-- row -->
      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->


@endsection
