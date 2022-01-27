@extends('admin.layouts')
@section('extra-css')
<link rel="stylesheet" type="text/css" href="/assets/app-assets/css/chartist.css">
<link rel="stylesheet" type="text/css" href="/assets/app-assets/css/owlcarousel.css">
<link rel="stylesheet" type="text/css" href="/assets/app-assets/css/prism.css">
<link rel="stylesheet" type="text/css" href="/assets/app-assets/css/tour.css">
<link rel="stylesheet" type="text/css" href="/assets/app-assets/css/pe7-icon.css">
<link rel="stylesheet" type="text/css" href="/assets/app-assets/css/ionic-icon.css">
<style>
.round_img{
  width: 45px;
  height: 45px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  color: #fff;
  margin-right: 0px;
  border-radius: 100%;
}

.owl-item.cloned {
  width:350px !important;
}

.owl-item {
  width:350px !important;
}

.card .card-header {
padding: 50px;
}
.card .card-body {
padding: 50px;
}
</style>
@endsection
@section('section')
<!-- Right sidebar Ends-->
<div class="page-body vertical-menu-mt">
  <div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-lg-6 main-header">
          <h2>{{$language[26][Auth::guard('admin')->user()->lang]}}</h2>
        </div>
        <div class="col-lg-6 breadcrumb-right">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="pe-7s-home"></i></a></li>
            <li class="breadcrumb-item active">{{$language[1][Auth::guard('admin')->user()->lang]}}</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

<!-- Container-fluid starts-->
<div class="container-fluid">
  <div class="row">

    <div class="col-sm-6 col-xl-3 col-lg-6 box-col-6">
      <div class="card gradient-primary o-hidden">
        <div class="b-r-4 card-body">
          <div class="media static-top-widget">
            <div class="align-self-center text-center">
              <!-- <i data-feather="database"></i> -->
              <i data-feather="shopping-bag"></i>
            </div>
            <div class="media-body"><span class="m-0 text-white">{{$language[27][Auth::guard('admin')->user()->lang]}}</span>
              <h4 class="mb-0 counter">{{$total_today_posts}}</h4>
              <!-- <i class="icon-bg" data-feather="database"></i> -->
              <i class="icon-bg" data-feather="shopping-bag"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-xl-3 col-lg-6 box-col-6">
      <div class="card gradient-secondary o-hidden">
        <div class="b-r-4 card-body">
          <div class="media static-top-widget">
            <div class="align-self-center text-center">
              <i data-feather="shopping-bag"></i>
            </div>
            <div class="media-body"><span class="m-0">{{$language[28][Auth::guard('admin')->user()->lang]}}</span>
              <h4 class="mb-0 counter">{{$current_month_posts}}</h4>
              <i class="icon-bg" data-feather="shopping-bag"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-xl-3 col-lg-6 box-col-6">
      <div class="card gradient-warning o-hidden">
        <div class="b-r-4 card-body">
          <div class="media static-top-widget">
            <div class="align-self-center text-center">
              <div class="text-white i" data-feather="shopping-bag"></div>
            </div>
            <div class="media-body"><span class="m-0 text-white">{{$language[29][Auth::guard('admin')->user()->lang]}}</span>
              <h4 class="mb-0 counter text-white">{{$total_posts}}</h4>
              <!-- <i class="icon-bg" data-feather="message-circle"></i> -->
              <i class="icon-bg" data-feather="shopping-bag"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-xl-3 col-lg-6 box-col-6">
      <div class="card gradient-info o-hidden">
        <div class="b-r-4 card-body">
          <div class="media static-top-widget">
            <div class="align-self-center text-center">
              <div class="text-white i" data-feather="user-plus"></div>
            </div>
            <div class="media-body"><span class="m-0 text-white">{{$language[30][Auth::guard('admin')->user()->lang]}}</span>
              <h4 class="mb-0 counter text-white">{{$total_today_customers}}</h4>
              <i class="icon-bg" data-feather="user-plus"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-xl-3 col-lg-6 box-col-6">
      <div class="card gradient-primary o-hidden">
        <div class="b-r-4 card-body">
          <div class="media static-top-widget">
            <div class="align-self-center text-center">
              <!-- <i data-feather="database"></i> -->
              <div class="text-white i" data-feather="user-plus"></div>
            </div>
            <div class="media-body"><span class="m-0 text-white">{{$language[31][Auth::guard('admin')->user()->lang]}}</span>
              <h4 class="mb-0 counter">{{$current_month_customers}}</h4>
              <!-- <i class="icon-bg" data-feather="database"></i> -->
              <i class="icon-bg" data-feather="user-plus"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-xl-3 col-lg-6 box-col-6">
      <div class="card gradient-secondary o-hidden">
        <div class="b-r-4 card-body">
          <div class="media static-top-widget">
            <div class="align-self-center text-center">
              <!-- <i data-feather="shopping-bag"></i> -->
              <div class="text-white i" data-feather="user-plus"></div>
            </div>
            <div class="media-body"><span class="m-0">{{$language[32][Auth::guard('admin')->user()->lang]}}</span>
              <h4 class="mb-0 counter">{{$total_customers}}</h4>
              <!-- <i class="icon-bg" data-feather="shopping-bag"></i> -->
              <i class="icon-bg" data-feather="user-plus"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-xl-3 col-lg-6 box-col-6">
      <div class="card gradient-warning o-hidden">
        <div class="b-r-4 card-body">
          <div class="media static-top-widget">
            <div class="align-self-center text-center">
              <div class="text-white i" data-feather="user-plus"></div>
            </div>
            <div class="media-body"><span class="m-0 text-white">{{$language[33][Auth::guard('admin')->user()->lang]}}</span>
              <h4 class="mb-0 counter text-white">{{$total_today_visitor}}</h4><i class="icon-bg" data-feather="user-plus"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-xl-3 col-lg-6 box-col-6">
      <div class="card gradient-info o-hidden">
        <div class="b-r-4 card-body">
          <div class="media static-top-widget">
            <div class="align-self-center text-center">
              <div class="text-white i" data-feather="user-plus"></div>
            </div>
            <div class="media-body"><span class="m-0 text-white">{{$language[34][Auth::guard('admin')->user()->lang]}}</span>
              <h4 class="mb-0 counter text-white">{{$current_month_visitor}}</h4><i class="icon-bg" data-feather="user-plus"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    
    <div class="col-xl-11">
      <div class="owl-carousel owl-theme crypto-slider owl-loaded owl-drag">
        <div class="owl-stage-outer">
          <div class="owl-stage" style="transform: translate3d(-1792px, 0px, 0px); transition: all 0.25s ease 0s; width: 4480px;">
            
            @foreach($category as $row)
            <div class="owl-item" style="margin-right: 30px;">
              <div class="item">
                <div style="padding:10px !important;" class="card o-hidden">
                  <div class="card-body crypto-graph-card coin-card">
                    <div class="media">
                      <div class="media-body d-flex align-items-center">
                        <div class="rounded-icon bck-gradient-secondary">
        
                        <img class="round_img" src="/upload_files/{{$row->image}}" alt="" srcset="">
                    
                        </div>
                        <div class="bitcoin-graph-content">
                          <h5 class="f-w-700 mb-0">{{$row->category}}</h5>
                        </div>
                      </div>
                      <div class="right-setting d-flex align-items-center">
                        <h6 style="margin-top:15px !important;" class="font-secondary f-w-700 mb-0">{{ \App\Http\Controllers\Admin\CategoryController::categorypostcount($row->id) }}</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach

          </div>
        </div>

        <div class="owl-nav">
          <button type="button" role="presentation" class="owl-prev">
          <span aria-label="Previous">‹</span>
          </button>
          <button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button>
        </div>
        <div class="owl-dots">
          <button role="button" class="owl-dot active"><span></span></button>
          <button role="button" class="owl-dot"><span></span></button>
        </div>

      </div>
    </div>

    <div class="col-xl-8 xl-100 box-col-12">
      <div class="card month-overview">
        <div class="card-header pb-3">
          <h5>This Month Revenue</h5>
          <h2 class="m-t-20 f-w-800">$57k</h2><span class="badge badge-pill pill-badge-secondary f-14 f-w-600">14%</span>
          <ul class="creative-dots">
            <li class="bg-primary big-dot"></li>
            <li class="bg-secondary semi-big-dot"></li>
            <li class="bg-warning medium-dot"></li>
            <li class="bg-info semi-medium-dot"></li>
            <li class="bg-secondary semi-small-dot"></li>
            <li class="bg-primary small-dot"></li>
          </ul>
          <div class="card-header-right">
            <ul class="list-unstyled card-option">
              <li><i class="icofont icofont-gear fa fa-spin font-primary"></i></li>
              <li><i class="view-html fa fa-code font-primary"></i></li>
              <li><i class="icofont icofont-maximize full-card font-primary"></i></li>
              <li><i class="icofont icofont-minus minimize-card font-primary"></i></li>
              <li><i class="icofont icofont-refresh reload-card font-primary"></i></li>
              <li><i class="icofont icofont-error close-card font-primary"></i></li>
            </ul>
          </div>
        </div>
        <div class="card-body p-b-20 row">
          <div class="col-6 p-b-20 ct-10 pr-0 default-chartist-container"></div>
          <div class="col-6 p-b-20 ct-11 pl-0 default-chartist-container"> </div>
          <div class="code-box-copy">
            <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head6" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
            <pre><code class="language-html" id="example-head6">&lt;!-- Cod Box Copy begin --&gt;
            &lt;div class="card-body p-b-20 row"&gt;
            &lt;div class="col-6 p-b-20 ct-10 pr-0 default-chartist-container"&gt;&lt;/div&gt;
            &lt;div class="col-6 p-b-20 ct-11 pl-0 default-chartist-container"&gt; &lt;/div&gt;
            &lt;/div&gt;
            &lt;!-- Cod Box Copy end --&gt;
            </code></pre>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

</div>
@endsection
@section('extra-js')
    

    <!-- Plugins JS start-->
    <script src="/assets/app-assets/js/chart/chartist/chartist.js"></script>
    <script src="/assets/app-assets/js/chart/chartist/chartist-plugin-tooltip.js"></script>
    <script src="/assets/app-assets/js/dashboard/ecommerce-custom.js"></script>
    <script src="/assets/app-assets/js/owlcarousel/owl.carousel.js"></script>

    <!-- Plugins JS Ends-->

    <!-- <script src="/assets/app-assets/js/theme-customizer/customizer.js"></script>  -->
    <!-- login js-->
<script>
var $this = $(".iconsidebar-menu");
if ($this.hasClass('iconbar-second-close')) {
  //$this.removeClass();
  $this.removeClass('iconbar-second-close').addClass('iconsidebar-menu');
} else if ($this.hasClass('iconbar-mainmenu-close')) {
  $this.removeClass('iconbar-mainmenu-close').addClass('iconbar-second-close');
} else {
  $this.addClass('iconbar-mainmenu-close');
}

var owl_carousel_custom = {
    init: function() {
        $('.crypto-slider').owlCarousel({
            loop:true,
            margin:30,
            dots: false,
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                768:{
                    items:2,
                    dots: true            
                },
                1600:{
                    items:3,
                    dots: true            
                }
            }
        })
    }
};

(function($) {
    "use strict";
    owl_carousel_custom.init();
})(jQuery);
</script>
@endsection