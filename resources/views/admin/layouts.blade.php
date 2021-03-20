<!DOCTYPE html>

  <html lang="en" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Poco admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Poco admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="/assets/favicon/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="/assets/favicon/favicon-32x32.png" type="image/x-icon">
    <title>Ezy Offer</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="/assets/app-assets/css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="/assets/app-assets/css/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="/assets/app-assets/css/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="/assets/app-assets/css/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="/assets/app-assets/css/feather-icon.css">
    <link rel="stylesheet" type="text/css" href="/assets/app-assets/css/animate.css">
    <!-- Plugins css start-->
    <link href="{{asset('autocomplete/jquery-ui.min.css')}}" rel="stylesheet" type="text/css">
    @yield('extra-css')
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="/assets/app-assets/css/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="/assets/app-assets/css/style.css">
    <link id="color" rel="stylesheet" href="/assets/app-assets/css/color-2.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="/assets/app-assets/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/toastr/toastr.css')}}">

    
    
    <style>
      .hide{
       display:none
      }
      span.badge.badge-pill.badge-warning {
    position: absolute;
    top: 10px;
    right: 50px !important;
}
    </style>
  </head>
  <body main-theme-layout="ltr">
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="typewriter">
        {{-- <h1>{{$language[243][Auth::guard('admin')->user()->lang]}} {{$language[244][Auth::guard('admin')->user()->lang]}}..</h1>
          --}}
      </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper">
      <!-- Page Header Start-->
      <div class="page-main-header">
        <div class="main-header-right">
          <div class="main-header-left text-center">
            <div class="logo-wrapper"><a href="/admin/dashboard"><img src="/images/logo.png" alt="" width="80px"></a></div>
          </div>
          <div class="mobile-sidebar">
            <div class="media-body text-right switch-sm">
              <label class="switch ml-3"><i class="font-primary" id="sidebar-toggle" data-feather="align-center"></i></label>
            </div>
          </div>
          <div class="vertical-mobile-sidebar"><i class="fa fa-bars sidebar-bar">               </i></div>
          <div class="nav-right col pull-right right-menu">
            <ul class="nav-menus">

              <!-- <li>
                <form class="form-inline search-form" action="/admin/shipment-track" method="POST">
                {{ csrf_field() }}
                  <div class="form-group">
                    <div class="Typeahead Typeahead--twitterUsers">
                      <div class="u-posRelative">
                        <input autocomplete="off" class="Typeahead-input form-control-plaintext" id="search_input" type="text" name="search_input" placeholder="Track your Shipment...">
                        <div class="spinner-border Typeahead-spinner" role="status">
                          <span class="sr-only">Loading...</span>
                        </div>
                        <a onclick="searchShipment()">
                          <span class="d-sm-none mobile-search" >
                          <i data-feather="search1" ></i>
                          </span>
                        </a>
                      </div>
                      <div class="Typeahead-menu"></div>
                    </div>
                  </div>
                </form>
              </li> -->

              <!-- <li>
                  <div class="form-group">
                    <div class="Typeahead Typeahead--twitterUsers">
                      <div class="u-posRelative">
                        <select style="top:10px !important;" class="form-control" id="languages" name="languages">
                        <option value="english" <?php //if(Auth::guard('admin')->user()->lang == 'english') { ?> selected="selected"<?php //} ?>>En</option>
                        <option value="arabic" <?php //if(Auth::guard('admin')->user()->lang == 'arabic') { ?> selected="selected"<?php //} ?>>Ar</option>
                        </select>
                      </div>
                      <div class="Typeahead-menu"></div>
                    </div>
                  </div>
              </li> -->

              <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>


              <li class="onhover-dropdown"> 
                <span class="media user-header">
                  <img style="width:50px !important;" class="img-fluid" src="/assets/app-assets/images/dashboard/user.png" alt="">
                </span>
                <ul class="onhover-show-div profile-dropdown">
                  <li class="gradient-primary">
                    <h5 class="f-w-600 mb-0">
                    <a href="#">{{ Auth::guard('admin')->user()->name }}</a>
                    </h5>
                    <!-- <span>Web Designer</span> -->
                  </li>
                  <li><a href="/admin/change-password"><i data-feather="user"> </i>Change Password</a></li>
                  <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                    <i data-feather="settings"> </i>Log Out</li> 
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </ul>
              </li>

            </ul>
            <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
          </div>
          <script id="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">                        
            <div class="ProfileCard-avatar"><i class="pe-7s-home"></i></div>
            <div class="ProfileCard-details">
            <div class="ProfileCard-realName"></div>
            </div>
            </div>
          </script>
          <script id="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
        </div>
      </div>
      <!-- Page Header Ends  -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <div class="iconsidebar-menu">
          <div class="sidebar">
            <ul class="iconMenu-bar custom-scrollbar">
              
              <li>
                <a class="bar-icons" href="/admin/dashboard"><i class="pe-7s-home"></i><span>Dashboard</span></a>
                <!-- <ul class="iconbar-mainmenu custom-scrollbar">
                  <li class="iconbar-header">Dashboard</li>
                  <li class="dashboard"><a class="dashboard" href="/admin/dashboard">Dashboard</a></li>
                </ul> -->
              </li>

              <li>
                <a class="bar-icons" href="javascript:void(0)"><i class="pe-7s-id"></i><span>Customer</span></a>
                <ul class="iconbar-mainmenu custom-scrollbar">
                  <li class="iconbar-header">Customer</li>

                  <li class="all-customer"><a class="all-customer" href="/admin/all-customer">All Customer</a></li>
                  
                </ul>
              </li>

              <li>
                <a class="bar-icons" href="javascript:void(0)"><i class="pe-7s-id"></i><span>Post Ads</span></a>
                <ul class="iconbar-mainmenu custom-scrollbar">
                  <li class="iconbar-header">Post Ads</li>

                  <li class="post-ads"><a class="post-ads" href="/admin/post-ads">All Post Ads</a></li>
                  
                </ul>
              </li>
            
              <li>              
                <a class="bar-icons" href="javascript:void(0)"><i class="pe-7s-graph3"></i><span>Invoice </span></a>
                <ul class="iconbar-mainmenu custom-scrollbar">
                  <li class="iconbar-header">Invoice</li>

                  <li class="invoice-history"><a class="invoice-history" href="/admin/invoice-history">Invoice History </a></li> 
                  
                </ul>
              </li>

              <li>
                <a class="bar-icons" href="javascript:void(0)"><i class="pe-7s-config"></i><span>Settings</span></a>
                <ul class="iconbar-mainmenu custom-scrollbar">
                  <li class="iconbar-header">Settings</li>

                  <li class="category"><a class="category" href="/admin/category">Category</a></li>

                  <li class="settings"><a class="settings" href="/admin/settings">Settings</a></li>

                </ul>
              </li>
              
              
            </ul>
          </div>
        </div>
        @yield('section')
        <!-- footer start-->
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 footer-copyright">
                {{-- <p class="mb-0">{{$language[273][Auth::guard('admin')->user()->lang]}} © 2021 LRB INFO TECH. {{$language[274][Auth::guard('admin')->user()->lang]}}.</p> --}}
              </div>
              <div class="col-md-6">
                {{-- <p class="pull-right mb-0">{{$language[275][Auth::guard('admin')->user()->lang]}} & {{$language[276][Auth::guard('admin')->user()->lang]}}<i class="fa fa-heart"></i></p> --}}
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- latest jquery-->
    <script src="/assets/app-assets/js/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap js-->
    <script src="/assets/app-assets/js/bootstrap/popper.min.js"></script>
    <script src="/assets/app-assets/js/bootstrap/bootstrap.js"></script>
    <!-- feather icon js-->
    <script src="/assets/app-assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="/assets/app-assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- Sidebar jquery-->
    <script src="/assets/app-assets/js/sidebar-menu.js"></script>
    <script src="/assets/app-assets/js/config.js"></script>
    <!-- Plugins JS start-->
    <script src="{{ asset('autocomplete/jquery-ui.min.js') }}"></script>

    <script src="{{ asset('sweetalert2/sweetalert2.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('sweetalert2/sweetalert2.min.css') }}">
   
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="/assets/app-assets/js/script.js"></script>
    <!-- <script src="/assets/app-assets/js/theme-customizer/customizer.js"></script> -->
    <script src="{{ asset('assets/toastr/toastr.min.js')}}" type="text/javascript"></script>
 @yield('extra-js')
    
    <!-- login js-->
    <!-- Plugin used-->
    <script>
  $('#languages').change(function(){
    var language = $('#languages').val();
    $.ajax({
      url : '/admin/change-language/'+language,
      type: "GET",
      success: function(data)
      {
          location.reload();
      }
    });
  });
  function searchShipment(){
    alert("ok")
    var search_input = $('#search_input').val();
    window.location.href="/admin/shipment-track/"+search_input;
    // $.ajax({
    //   url : '/admin/change-language/'+language,
    //   type: "GET",
    //   success: function(data)
    //   {
    //       location.reload();
    //   }
    // });
  }
    </script>
  </body>
</html>