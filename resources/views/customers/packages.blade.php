@extends('customers.layouts')
@section('css')
@endsection
@section('section')

        <!-- Page Title -->
        <section class="page-title style-two" style="background-image: url(/assets/images/background/page-title.jpg);">
            <div class="auto-container">
                <div class="content-box centred mr-0">
                    <div class="title">
                        <h1>Packages</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="/">Home</a></li>
                        <li>Packages</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->


        <!-- category-details -->
        <section class="category-details bg-color-2">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    @include('customers.menu')
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        @if(!empty($used_package))
                        <div class="row clearfix newrow">
                           <a href="javascript:void(0);" class="col-md-12 db-list db-list-1">
                              <div class="ps-package__expire">
                                    <h6>Current Package Expire in : {{date('d-m-Y',strtotime($used_package->expire_date))}}</h6>
                                    <span class="current-plans">{{$used_package->package_name}}</span>
                                </div>
                              <span class="ps-icon"><i class="fas fa-clock"></i></span>
                           </a>
                        </div>
                        @endif
                        <h3 class="title-in-customer">Choose Pakage</h3>


<div class="row clearfix">
@foreach($package as $row)
    @if(!empty($used_package))
    @if($used_package->package_id == $row->id)
        @if(Auth::user()->package_status == 1)
        <div class="col-lg-4 col-md-6 col-sm-12 pricing-block">
            <div class="pricing-block-one active">
                <div class="pricing-table">
                    <div class="teble-header">
                        <p>{{$row->package_name}}</p>
                        <h2>{{$row->price}} <sup>AED</sup> 
                        <span> {{$row->duration}} / 
                        @if($row->duration_period == 1)
                        Month
                        @else 
                        Days
                        @endif
                        </span>
                        </h2>
                    </div>
                    <div class="table-content">
                        <ul class="list clearfix">
                            <li>Unlimited Posts</li>
                            <li>{{$row->no_of_feautured_ads}} Featured Ads</li>
                            <li>{{$row->no_of_live_story}} Live Ads</li>
                            <li>Store Available 
                            @if($row->store_available == 1)
                            Yes
                            @else 
                            No
                            @endif
                            </li>
                            <li>Chat Option Included</li>
                            <li>24/7 Fully Support</li>
                        </ul>
                    </div>
                    <div class="table-footer">
                        <a href="#">Activated</a>
                    </div>
                </div>
            </div>
        </div>
        @else 
        <div class="col-lg-4 col-md-6 col-sm-12 pricing-block">
            <div class="pricing-block-one">
                <div class="pricing-table">
                    <div class="teble-header">
                        <p>{{$row->package_name}}</p>
                        <h2>{{$row->price}} <sup>AED</sup> 
                        <span> {{$row->duration}} / 
                        @if($row->duration_period == 1)
                        Month
                        @else 
                        Days
                        @endif
                        </span>
                        </h2>
                    </div>
                    <div class="table-content">
                        <ul class="list clearfix">
                            <li>Unlimited Posts</li>
                            <li>{{$row->no_of_feautured_ads}} Featured Ads</li>
                            <li>{{$row->no_of_live_story}} Live Ads</li>
                            <li>Store Available 
                            @if($row->store_available == 1)
                            Yes
                            @else 
                            No
                            @endif
                            </li>
                            <li>Chat Option Included</li>
                            <li>24/7 Fully Support</li>
                        </ul>
                    </div>
                    <div class="table-footer">
                        <a onclick="ActivatePlan('{{$row->id}}')" href="#">Renew Now</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    @else
        @if($row->price >= $used_package->price)
        <div class="col-lg-4 col-md-6 col-sm-12 pricing-block">
            <div class="pricing-block-one">
                <div class="pricing-table">
                    <div class="teble-header">
                        <p>{{$row->package_name}}</p>
                        <h2>{{$row->price}} <sup>AED</sup> 
                        <span> {{$row->duration}} / 
                        @if($row->duration_period == 1)
                        Month
                        @else 
                        Days
                        @endif
                        </span>
                        </h2>
                    </div>
                    <div class="table-content">
                        <ul class="list clearfix">
                            <li>Unlimited Posts</li>
                            <li>{{$row->no_of_feautured_ads}} Featured Ads</li>
                            <li>{{$row->no_of_live_story}} Live Ads</li>
                            <li>Store Available 
                            @if($row->store_available == 1)
                            Yes
                            @else 
                            No
                            @endif
                            </li>
                            <li>Chat Option Included</li>
                            <li>24/7 Fully Support</li>
                        </ul>
                    </div>
                    <div class="table-footer">
                        <a onclick="ActivatePlan('{{$row->id}}')" href="#">Purchase Now</a>
                    </div>
                </div>
            </div>
        </div>
        @else 
        <div class="col-lg-4 col-md-6 col-sm-12 pricing-block">
            <div class="pricing-block-one">
                <div class="pricing-table">
                    <div class="teble-header">
                        <p>{{$row->package_name}}</p>
                        <h2>{{$row->price}} <sup>AED</sup> 
                        <span> {{$row->duration}} / 
                        @if($row->duration_period == 1)
                        Month
                        @else 
                        Days
                        @endif
                        </span>
                        </h2>
                    </div>
                    <div class="table-content">
                        <ul class="list clearfix">
                            <li>Unlimited Posts</li>
                            <li>{{$row->no_of_feautured_ads}} Featured Ads</li>
                            <li>{{$row->no_of_live_story}} Live Ads</li>
                            <li>Store Available 
                            @if($row->store_available == 1)
                            Yes
                            @else 
                            No
                            @endif
                            </li>
                            <li>Chat Option Included</li>
                            <li>24/7 Fully Support</li>
                        </ul>
                    </div>
                    <div class="table-footer">
                        <a href="#">Purchase Now</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    @endif
    @else
    <div class="col-lg-4 col-md-6 col-sm-12 pricing-block">
        <div class="pricing-block-one">
            <div class="pricing-table">
                <div class="teble-header">
                    <p>{{$row->package_name}}</p>
                    <h2>{{$row->price}} <sup>AED</sup> 
                    <span> {{$row->duration}} / 
                    @if($row->duration_period == 1)
                    Month
                    @else 
                    Days
                    @endif
                    </span>
                    </h2>
                </div>
                <div class="table-content">
                    <ul class="list clearfix">
                        <li>Unlimited Posts</li>
                        <li>{{$row->no_of_feautured_ads}} Featured Ads</li>
                        <li>{{$row->no_of_live_story}} Live Ads</li>
                        <li>Store Available 
                        @if($row->store_available == 1)
                        Yes
                        @else 
                        No
                        @endif
                        </li>
                        <li>Chat Option Included</li>
                        <li>24/7 Fully Support</li>
                    </ul>
                </div>
                <div class="table-footer">
                    <a onclick="ActivatePlan('{{$row->id}}')" href="#">Purchase Now</a>
                </div>
            </div>
        </div>
    </div>
    @endif
@endforeach
</div>



                    </div>
                </div>
            </div>
        </section>
        <!-- category-details end -->


@endsection
@section('js')
<script type="text/javascript">
$('.sidebar_packages').addClass('active');

function ActivatePlan(package_id){
    var r = confirm("Are you sure");
    if (r == true) {
      $.ajax({
        url : '/customer/apply-package/'+package_id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            Swal.fire({
                title: "Your Package",
                text: 'Successfully Activated',
                icon: "success",
            }).then(function() {
                location.reload();
            });
        }
      });
    } 
}
</script>
@endsection
