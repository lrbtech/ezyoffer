@extends('customers.layouts')
@section('css')
<style>
.c-dashboardInfo {
  margin-bottom: 15px;
}
.c-dashboardInfo .wrap {
  background: #ffffff;
  box-shadow: 2px 10px 20px rgba(0, 0, 0, 0.1);
  border-radius: 7px;
  text-align: center;
  position: relative;
  overflow: hidden;
  padding: 40px 25px 20px;
  height: 100%;
}
.c-dashboardInfo__title,
.c-dashboardInfo__subInfo {
  color: #6c6c6c;
  font-size: 1.18em;
}
.c-dashboardInfo span {
  display: block;
}
.c-dashboardInfo__count {
  font-weight: 600;
  font-size: 2.5em;
  line-height: 64px;
  color: #323c43;
}
.c-dashboardInfo .wrap:after {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 10px;
  content: "";
}

.c-dashboardInfo:nth-child(1) .wrap:after {
  background: linear-gradient(82.59deg, #00c48c 0%, #00a173 100%);
}
.c-dashboardInfo:nth-child(2) .wrap:after {
  background: linear-gradient(81.67deg, #0084f4 0%, #1a4da2 100%);
}
.c-dashboardInfo:nth-child(3) .wrap:after {
  background: linear-gradient(69.83deg, #0084f4 0%, #00c48c 100%);
}
.c-dashboardInfo:nth-child(4) .wrap:after {
  background: linear-gradient(81.67deg, #ff647c 0%, #1f5dc5 100%);
}
.c-dashboardInfo__title svg {
  color: #d7d7d7;
  margin-left: 5px;
}
.MuiSvgIcon-root-19 {
  fill: currentColor;
  width: 1em;
  height: 1em;
  display: inline-block;
  font-size: 24px;
  transition: fill 200ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
  user-select: none;
  flex-shrink: 0;
}

</style>
@endsection
@section('section')

<!-- Page Title -->
<section class="page-title style-two" style="background-image: url(/assets/images/background/page-title.jpg);">
    <div class="auto-container">
        <div class="content-box centred mr-0">
            <div class="title">
                <h1>{{$language[196][session()->get('lang')]}}</h1>
            </div>
            <ul class="bread-crumb clearfix">
                <li><a class="translate" href="/">Home</a></li>
                <li>{{$language[196][session()->get('lang')]}}</li>
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
                <div class="category-details-content">
                    <div class="item-shorting clearfix">
<div class="row align-items-stretch">
    <div class="c-dashboardInfo col-lg-4 col-md-6">
        <div class="wrap">
            <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">{{$language[197][session()->get('lang')]}}
                <svg class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation">
                <path fill="none" d="M0 0h24v24H0z"></path>
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"></path>
                </svg>
            </h4>
            <span class="hind-font caption-12 c-dashboardInfo__count">{{$featured_ads}}</span>
        </div>
    </div>
    <div class="c-dashboardInfo col-lg-4 col-md-6">
        <div class="wrap">
            <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">{{$language[198][session()->get('lang')]}}
                <svg class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation">
                <path fill="none" d="M0 0h24v24H0z"></path>
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"></path>
                </svg>
            </h4>
            <span class="hind-font caption-12 c-dashboardInfo__count">{{$live_ads}}</span>
            <!-- <span class="hind-font caption-12 c-dashboardInfo__subInfo">Last month: €30</span> -->
        </div>
    </div>
    <div class="c-dashboardInfo col-lg-4 col-md-6">
        <div class="wrap">
            <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">{{$language[199][session()->get('lang')]}}
                <svg class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation">
                <path fill="none" d="M0 0h24v24H0z"></path>
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"></path>
                </svg>
            </h4>
            <span class="hind-font caption-12 c-dashboardInfo__count">{{$total_ads}}</span>
        </div>
    </div>
</div>

                    </div>
                    <div class="item-shorting clearfix">
                        <div class="text pull-left">
                            <p class="translate"> Showing {{ $post_ads->firstItem() }} - {{ $post_ads->lastItem() }} of {{$post_ads->total()}} Listings</p>
                        </div>
                        <div class="right-column pull-right clearfix">
                            <div class="menu-box">
                                <button class="grid-view"><i class="icon-30"></i></button>
                                <button class="list-view on"><i class="icon-31"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="translate category-block wrapper browse-add list">
                        <div class="list-item feature-style-three pd-0">
                            @foreach($post_ads as $row)
                            <div class="feature-block-one">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image"><img style="width:200px;height:220px;" src="/upload_image/{{$row->image}}" alt=""></figure>
                                        @if($row->status == '0')
                                        @if($row->post_type == '0')
                                        <div class="feature-2">Normal</div>
                                        @elseif($row->post_type == '1')
                                        <div class="feature-2">Trending</div>
                                        @endif
                                        @else
                                        <div style="background-color:#ff0000 !important;"  class="feature-2">DeActivated</div>
                                        @endif
                                    </div>
                                    <div class="lower-content">
                                        <div class="category"><i class="fas fa-tags"></i><a href="#">{{ \App\Http\Controllers\HomeController::viewcategoryname($row->category) }}</a></div>
                                        <h4 style="text-transform: capitalize !important;"><a href="/view-post/{{$row->id}}">{{$row->title}}</a></h4>
                                        <ul class="info clearfix">
                                            <li><i class="far fa-clock"></i>{{ \App\Http\Controllers\HomeController::humanreadtime($row->created_at) }}</li>
                                            <li style="text-transform:capitalize !important;"><i class="fas fa-map-marker-alt"></i>{{ \App\Http\Controllers\HomeController::viewcityname($row->area,$row->city) }}</li>
                                        </ul>
                                        <div class="lower-box">
                                            <h5><span>Price:</span>AED {{$row->price}}</h5>
                                        </div>
                                    </div>
                                    <div class="btn-box button-with-action"><a href="/customer/edit-post-ads/{{$row->id}}" class="theme-btn-one">Edit</a></div>
                                    <!-- @if($row->status == 0)
                                    <div class="btn-box button-with-disble"><a style="background-color:#ff0000 !important;" onclick="DeleteAd({{$row->id}},1)" href="javascript:void(0)" class="theme-btn-one">DeActive</a></div>
                                    @else 
                                    <div class="btn-box button-with-disble"><a style="background-color:green !important;" onclick="DeleteAd({{$row->id}},0)" href="javascript:void(0)" class="theme-btn-one">Active</a></div>
                                    @endif -->
                                    <div class="btn-box button-with-disble"><a style="background-color:#ff0000 !important;" onclick="DeleteAd({{$row->id}})" href="javascript:void(0)" class="theme-btn-one">Delete</a></div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="grid-item feature-style-two four-column pd-0">
                            <div class="row clearfix">
                                @if(count($post_ads) > 1)
                                @foreach($post_ads as $row)
                                <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                    <div class="feature-block-one">
                                        <div class="inner-box">
                                        <a href="/view-post/{{$row->id}}">
                                            <div class="image-box">
                                                <figure class="image"><img style="width:370px;height:220px;" src="/upload_image/{{$row->image}}" alt=""></figure>
                                                @if($row->status == '0')
                                                @if($row->post_type == '0')
                                                <div class="shape"></div>
                                                <div class="feature">Normal</div>
                                                @elseif($row->post_type == '1')
                                                <div class="shape"></div>
                                                <div class="feature">Trending</div>
                                                @endif
                                                @else 
                                                <div class="shape"></div>
                                                <div style="background-color:#ff0000 !important;" class="feature">DeActivated</div>
                                                @endif

                                                <a href="/customer/edit-post-ads/{{$row->id}}">
                                                    <div class="icon">
                                                        <div class="icon-shape"></div>
                                                        <i class="fa fa-edit"></i>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="lower-content">
                                                <div class="category"><i class="fas fa-tags"></i><a href="#">{{ \App\Http\Controllers\HomeController::viewcategoryname($row->category) }}</a></div>
                                                <h3 style="text-transform:capitalize !important;"><a href="/view-post/{{$row->id}}">{{$row->title}}</a></h3>
                                                <ul class="info clearfix">
                                                    <li><i class="far fa-clock"></i>{{ \App\Http\Controllers\HomeController::humanreadtime($row->created_at) }}</li>
                                                    <li style="text-transform:capitalize !important;"><i class="fas fa-map-marker-alt"></i>{{ \App\Http\Controllers\HomeController::viewcityname($row->area,$row->city) }}</li>
                                                </ul>
                                                <div class="lower-box">
                                                    <h5><span>Price:</span>AED {{$row->price}}</h5>
                                                </div>
                                            </div>
                                        </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else 
                                @foreach($post_ads as $row)
                                <div class="col-lg-12 col-md-12 col-sm-12 feature-block">
                                    <div class="feature-block-one">
                                        <div class="inner-box">
                                        <a href="/view-post/{{$row->id}}">
                                            <div class="image-box">
                                                <figure class="image"><img style="width:370px;height:220px;" src="/upload_image/{{$row->image}}" alt=""></figure>
                                                @if($row->status == '0')
                                                @if($row->post_type == '0')
                                                <div class="shape"></div>
                                                <div class="feature">Normal</div>
                                                @elseif($row->post_type == '1')
                                                <div class="shape"></div>
                                                <div class="feature">Trending</div>
                                                @endif
                                                @else 
                                                <div class="shape"></div>
                                                <div style="background-color:#ff0000 !important;" class="feature">DeActivated</div>
                                                @endif

                                                <a href="/customer/edit-post-ads/{{$row->id}}">
                                                    <div class="icon">
                                                        <div class="icon-shape"></div>
                                                        <i class="fa fa-edit"></i>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="lower-content">
                                                <div class="category"><i class="fas fa-tags"></i><a href="#">{{ \App\Http\Controllers\HomeController::viewcategoryname($row->category) }}</a></div>
                                                <h3 style="text-transform:capitalize !important;"><a href="/view-post/{{$row->id}}">{{$row->title}}</a></h3>
                                                <ul class="info clearfix">
                                                    <li><i class="far fa-clock"></i>{{ \App\Http\Controllers\HomeController::humanreadtime($row->created_at) }}</li>
                                                    <li style="text-transform:capitalize !important;"><i class="fas fa-map-marker-alt"></i>{{ \App\Http\Controllers\HomeController::viewcityname($row->area,$row->city) }}</li>
                                                </ul>
                                                <div class="lower-box">
                                                    <h5><span>Price:</span>AED {{$row->price}}</h5>
                                                </div>
                                            </div>
                                        </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>

                    </div>

                    <!-- <div class="text-center" style="width: 100%;margin-bottom:20px;">
                        <div class="more-btn"><a href="#" class="theme-btn-one">Load More</a></div>
                    </div> -->

                    {!! $post_ads->links('website.pagination') !!}

                    <!-- <div class="pagination-wrapper centred">
                        <ul class="pagination clearfix">
                            <li><a href="category-details.html"><i class="far fa-angle-left"></i>Prev</a></li>
                            <li><a href="category-details.html" class="current">01</a></li>
                            <li><a href="category-details.html">02</a></li>
                            <li><a href="category-details.html">03</a></li>
                            <li><a href="category-details.html">Next<i class="far fa-angle-right"></i></a></li>
                        </ul>
                    </div> -->

                </div>
            </div>
        </div>
    </div>
</section>
<!-- category-details end -->
@endsection
@section('js')
<script type="text/javascript">
$('.sidebar_dashboard').addClass('active');

function DeleteAd(id){
    var r = confirm("Are you sure");
    if (r == true) {
      $.ajax({
        url : '/customer/delete-post-ads/'+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            Swal.fire({
                title: 'Successfully Deleted',
                icon: 'success',
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/customer/dashboard";
                }
            })
            // if(status == 0){
            //     Swal.fire({
            //         title: 'Successfully Activated',
            //         icon: 'success',
            //         }).then((result) => {
            //         if (result.isConfirmed) {
            //             window.location = "/customer/dashboard";
            //         }
            //     }) 
            // }
            // else{
            //     Swal.fire({
            //         title: 'Successfully DeActivated',
            //         icon: 'success',
            //         }).then((result) => {
            //         if (result.isConfirmed) {
            //             window.location = "/customer/dashboard";
            //         }
            //     }) 
            // }
        }
      });
    } 
}
</script>
@endsection