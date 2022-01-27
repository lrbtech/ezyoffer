@extends('admin.layouts')
@section('extra-css')
<link rel="stylesheet" type="text/css" href="/assets/app-assets/css/datatables.css">
<link rel="stylesheet" type="text/css" href="/assets/app-assets/css/pe7-icon.css">
<link rel="stylesheet" type="text/css" href="/assets/app-assets/css/select2.css">
@endsection
@section('section')        
        <!-- Right sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-lg-6 main-header">
                  <h2>Package  <span>Summary  </span></h2> 
                  <h6 class="mb-0">Admin Panel</h6>
                </div>
                <!-- <div class="col-lg-6 breadcrumb-right">     
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="pe-7s-home"></i></a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item">Data Tables</li>
                    <li class="breadcrumb-item active">Basic Init</li>
                  </ol>
                </div> -->
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <!-- Zero Configuration  Starts-->
              <div class="col-sm-12">
                <div class="card">
                <form action="/admin/date-package-summary" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="card-header">
                      <div class="row">
                        <div class="form-group col-md-3">
                            <label>From Date</label>
                            <input autocomplete="off" type="date" id="from_date" name="from_date" class="form-control">
                        </div>

                        <div class="form-group col-md-3">
                            <label>To Date</label>
                            <input autocomplete="off" type="date" id="to_date" name="to_date" class="form-control">
                        </div>

                        <div class="form-group col-md-3">
                          <label>Select Package</label>
                          <select id="package_id" name="package_id" class="js-example-basic-single col-sm-12 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                            <option value="package">Select All Package</option>
                            @foreach($all_package as $row)
                            <option value="{{$row->id}}">{{$row->package_name}}</option>
                            @endforeach
                          </select>
                        </div>

                        <!-- <div class="form-group col-md-3">
                          <label>Select User</label>
                          <select id="user_id" name="user_id" class="js-example-basic-single col-sm-12 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                            <option value="user">Select All User</option>
                            @foreach($user as $row)
                            <option value="{{$row->id}}">{{$row->first_name}} {{$row->last_name}}</option>
                            @endforeach
                          </select>
                        </div> -->

                        <div class="form-group col-md-3">
                            <button style="margin-top:30px;" id="search" class="btn btn-primary btn-block mr-10" type="submit">Search</button>
                        </div>
                      </div>
                    
                  </div>
                  </form>


<div class="col-lg-12">
    <div class="row ecommerce-chart-card">   

        @foreach($package as $row)
        <div class="col-sm-6 col-xl-4 col-lg-6 box-col-6">
          <div class="card gradient-info o-hidden">
            <div class="b-r-4 card-body">
              <div class="media static-top-widget">
                <div class="align-self-center text-center">
                  <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus text-white i"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg> -->
                </div>
                <div class="media-body"><span class="m-0 text-white">{{ \App\Http\Controllers\Admin\ReportController::viewpackagename($row->package_id) }} - {{$row->total_count}}</span>
                  <h4 class="mb-0 counter text-white">AED {{$row->total_price}}</h4>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus icon-bg"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
    </div>
</div>



                </div>
              </div>
              <!-- Zero Configuration  Ends-->


            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>



@endsection
@section('extra-js')
  <script src="/assets/app-assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
  <script src="/assets/app-assets/js/datatable/datatables/datatable.custom.js"></script>
  <script src="/assets/app-assets/js/chat-menu.js"></script>
  <script src="/assets/app-assets/js/select2/select2.full.min.js"></script>
  <script src="/assets/app-assets/js/select2/select2-custom.js"></script>

<script type="text/javascript">
$('.package-summary').addClass('active');

var $this = $(".iconsidebar-menu");
if ($this.hasClass('iconbar-second-close')) {
  //$this.removeClass();
  $this.removeClass('iconbar-second-close').addClass('iconsidebar-menu');
} else if ($this.hasClass('iconbar-mainmenu-close')) {
  $this.removeClass('iconbar-mainmenu-close').addClass('iconbar-second-close');
} else {
  $this.addClass('iconbar-mainmenu-close');
}

$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
@endsection