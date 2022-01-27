
<!DOCTYPE html>
@if(session()->get('lang') == 'english')
<html dir="ltr">
@elseif(session()->get('lang') == 'arabic')
<html dir="rtl">
@else 
<html dir="ltr">
@endif
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{$settings->metatag_title}}</title>

<meta name="title" content="{{$settings->metatag_title}}"/>

<meta name="description" content="{{$settings->metatag_description}}"/>

<meta name="keywords" content="{{$settings->metatag_keywords}}"/>	


<!-- Fav Icon -->
<link rel="icon" href="/assets/images/favicon.ico" type="image/x-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,600;0,700;0,800;0,900;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- Stylesheets -->
<link href="/assets/css/font-awesome-all.css" rel="stylesheet">
<link href="/assets/css/flaticon.css" rel="stylesheet">
<link href="/assets/css/owl.css" rel="stylesheet">
<link href="/assets/css/bootstrap.css" rel="stylesheet">
<link href="/assets/css/jquery.fancybox.min.css" rel="stylesheet">
<link href="/assets/css/animate.css" rel="stylesheet">
<link href="/assets/css/nice-select.css" rel="stylesheet">
<link href="/assets/css/color.css" rel="stylesheet">
<link href="/assets/css/style.css" rel="stylesheet">
<link href="/assets/css/responsive.css" rel="stylesheet">
<script src="/sweetalert2/sweetalert2.min.js"></script>
<link rel="stylesheet" href="/sweetalert2/sweetalert2.min.css"> 
<script src="/assets/js/spinner.js" type="text/javascript"></script>
@yield('css')
<style>
.text-danger{
    color:red;
}
.has-error label {
  color: #cc0033 !important;
}
.has-error .form-control {
  /* background-color: #fce4e4; */
  border: 1px solid #cc0033 !important;
  outline: none;
}

.jquery-spinner-wrap{position:absolute;top:0;z-index:100;width:100%;height:100%;display:none;background:rgba(0,0,0,.6)}.jquery-spinner-wrap .jquery-spinner-circle{height:100%;display:flex;justify-content:center;align-items:center}.jquery-spinner-wrap .jquery-spinner-circle .jquery-spinner-bar{width:40px;height:40px;border:4px solid #ddd;border-top-color:#a40034;border-radius:50%;animation:sp-anime .8s linear infinite}@keyframes sp-anime{to{transform:rotate(1turn)}}

</style>
</head>

<!-- page wrapper -->
<body>
    <div class="boxed_wrapper">


        <!-- preloader -->
        <div class="preloader"></div>
        <!-- preloader -->


        <!-- main header -->
        <header class="main-header">

            <!-- header-lower -->
            <div class="header-lower">
                <div class="auto-container">
                    <div class="outer-box">
                        <div class="logo-box">
                            <figure class="logo"><a href="/"><img src="/upload_files/{{$settings->logo}}" alt=""></a></figure>
                        </div>
                        <div class="menu-area">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler">
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                            </div>
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <li class="current"><a href="/">{{$language[125][session()->get('lang')]}}</a></li>                                         
                                        <li class="dropdown"><a href="#">{{$language[126][session()->get('lang')]}}</a>
                                            <ul>
                                                <li><a href="/how-it-works">{{$language[127][session()->get('lang')]}}</a></li>
                                                <li><a href="/our-story">{{$language[128][session()->get('lang')]}}</a></li>
                                                <li><a href="/auto-dealerships">{{$language[129][session()->get('lang')]}}</a></li>
                                                <li><a href="/trust-saftey">{{$language[130][session()->get('lang')]}}</a></li>
                                                <li><a href="/terms">{{$language[131][session()->get('lang')]}}</a></li>
                                                <li><a href="/community">{{$language[132][session()->get('lang')]}}</a></li>
                                                <li><a href="/blog">{{$language[133][session()->get('lang')]}}</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="/category">{{$language[134][session()->get('lang')]}}</a></li>
                                        @if(Auth::check())
                                        <li><a href="/customer/chat"><i class="fas fa-envelope"></i> {{$language[140][session()->get('lang')]}} <span class="message-count">0</span></a></li>
                                        <li class="dropdown sign-in"><a href="#"><i class="fas fa-user"></i> {{$language[141][session()->get('lang')]}}</a>
                                            <ul>
                                                <!-- @if(Auth::user()->package_status == '1') -->
                                                <li><a href="/customer/dashboard">{{$language[142][session()->get('lang')]}}</a></li>
                                                <li><a href="/customer/profile-settings">{{$language[143][session()->get('lang')]}}</a></li>
                                                <li><a href="/customer/my-ads">{{$language[144][session()->get('lang')]}}</a></li>
                                                <li><a href="/customer/new-post-ads">{{$language[145][session()->get('lang')]}}</a></li>
                                                <li><a href="/customer/chat-admin">{{$language[146][session()->get('lang')]}}</a></li>
                                                <!-- <li><a href="/customer/packages">Buy/Renew Packages</a></li> -->
                                                <li><a href="/customer/favourite">{{$language[147][session()->get('lang')]}}</a></li>
                                                <li><a href="/customer/account-privacy">{{$language[148][session()->get('lang')]}}</a></li>
                                                <!-- @else
                                                <li><a href="/customer/packages">Buy/Renew Packages</a></li>
                                                @endif -->
                                                <li>
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                {{$language[149][session()->get('lang')]}}</a></a>
                                                </li> 

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                                </form>
                                            </ul>
                                        </li>
                                        @else
                                        <li class="sign-in"><a href="/login"><i class="fas fa-user"></i> {{$language[135][session()->get('lang')]}}</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="btn-box hide-mobile-menu">
                            <a href="/customer/new-post-ads" class="theme-btn-one"><i class="icon-1"></i>{{$language[136][session()->get('lang')]}}</a>
                        </div>
                    </div>
                </div>
            </div>

            <!--sticky Header-->
            <div class="sticky-header">
                <div class="auto-container">
                    <div class="outer-box">
                        <div class="logo-box">
                            <figure class="logo"><a href="/"><img src="/assets/images/logo.png" alt=""></a></figure>
                        </div>
                        <div class="menu-area">
                            <nav class="main-menu clearfix">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </nav>
                        </div>
                        <div class="btn-box">
                            <a href="/customer/new-post-ads" class="theme-btn-one"><i class="icon-1"></i>{{$language[136][session()->get('lang')]}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- main-header end -->

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><i class="fas fa-times"></i></div>
            
            <nav class="menu-box">
                <div class="nav-logo"><a href="/"><img src="/assets/images/logo.png" alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
                <div class="social-links">
                    <ul class="clearfix">
                        <!-- <li><a href="/"><span class="fab fa-twitter"></span></a></li>
                        <li><a href="/"><span class="fab fa-facebook-square"></span></a></li>
                        <li><a href="/"><span class="fab fa-pinterest-p"></span></a></li>
                        <li><a href="/"><span class="fab fa-instagram"></span></a></li>
                        <li><a href="/"><span class="fab fa-youtube"></span></a></li> -->
                        <li><a target="_blank" href="{{$settings->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a target="_blank" href="{{$settings->twitter}}"><i class="fab fa-twitter"></i></a></li>
                        <li><a target="_blank" href="{{$settings->instagram}}"><i class="fab fa-instagram"></i></a></li>
                        <li><a target="_blank" href="{{$settings->google_plus}}"><i class="fab fa-google-plus-g"></i></a></li>
                        <li><a target="_blank" href="{{$settings->linkedin}}"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a target="_blank" href="{{$settings->youtube}}"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
            </nav>
        </div><!-- End Mobile Menu -->


        @yield('section')


        <!-- subscribe-section -->
        <section class="subscribe-section">
            <div class="pattern-layer" style="background-image: url(/assets/images/shape/shape-9.png);"></div>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                        <div class="text">
                            <div class="icon-box"><i class="icon-25"></i></div>
                            <h2>{{$language[151][session()->get('lang')]}}</h2>
                            <p>{{$language[152][session()->get('lang')]}}</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 form-column">
                        <form id="news-form"ction="#" method="post" class="subscribe-form">
                        {{csrf_field()}}
                            <div class="form-group">
                                <input autocomplete="off" type="email" name="news_letter_email" id="news_letter_email" placeholder="{{$language[153][session()->get('lang')]}}" required="">
                                <button onclick="SaveNewsLetter()" type="button" class="theme-btn-one">{{$language[154][session()->get('lang')]}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- subscribe-section end -->


        <!-- main-footer -->
        <footer class="main-footer">
            <div class="footer-top">
                <div class="auto-container">
                    <div class="widget-section">
                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                                <div class="footer-widget logo-widget">
                                    <figure class="footer-logo"><a href="/"><img src="/upload_files/{{$settings->logo}}" alt=""></a></figure>
                                    <div class="text">
                                        <p>{{$settings->footer_description}}</p>
                                    </div>
                                    <ul class="social-links clearfix">
                                        <li><a target="_blank" href="{{$settings->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a target="_blank" href="{{$settings->twitter}}"><i class="fab fa-twitter"></i></a></li>
                                        <li><a target="_blank" href="{{$settings->instagram}}"><i class="fab fa-instagram"></i></a></li>
                                        <li><a target="_blank" href="{{$settings->google_plus}}"><i class="fab fa-google-plus-g"></i></a></li>
                                        <li><a target="_blank" href="{{$settings->linkedin}}"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a target="_blank" href="{{$settings->youtube}}"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                                <div class="footer-widget links-widget ml-70">
                                    <div class="widget-title">
                                        <h3>{{$language[126][session()->get('lang')]}}</h3>
                                    </div>
                                    <div class="widget-content">
                                        <ul class="links-list clearfix">
                                            <li><a href="/how-it-works">{{$language[127][session()->get('lang')]}}</a></li>
                                            <li><a href="/our-story">{{$language[128][session()->get('lang')]}}</a></li>
                                            <li><a href="/auto-dealerships">{{$language[129][session()->get('lang')]}}</a></li>
                                            <li><a href="/trust-saftey">{{$language[130][session()->get('lang')]}}</a></li>
                                            <li><a href="/terms">{{$language[131][session()->get('lang')]}}</a></li>
                                            <li><a href="/community">{{$language[132][session()->get('lang')]}}</a></li>
                                            <li><a href="/blog">{{$language[133][session()->get('lang')]}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                                <div class="footer-widget post-widget">
                                    <div class="widget-title">
                                        <h3>{{$language[137][session()->get('lang')]}}</h3>
                                    </div>
                                    <div class="post-inner">
                                        @foreach($footer_blog as $row)
                                        <div class="post">
                                            <figure class="post-thumb">
                                                <img style="height:100px;" src="/upload_files/{{$row->image}}" alt="">
                                                <a href="/view-blog/{{$row->id}}"><i class="fas fa-link"></i></a>
                                            </figure>
                                            <h5><a href="/view-blog/{{$row->id}}">{{$row->title}}</a></h5>
                                            <p>{{ \App\Http\Controllers\HomeController::humanreadtime($row->created_at) }}</p>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                                <div class="footer-widget contact-widget">
                                    <div class="widget-title">
                                        <h3>{{$language[138][session()->get('lang')]}}</h3>
                                    </div>
                                    <div class="widget-content">
                                        <ul class="info-list clearfix">
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i>
                                                {{$settings->address}}
                                            </li>
                                            <li>
                                                <i class="fas fa-mobile"></i>
                                                <a href="#">{{$settings->mobile}}</a>
                                            </li>
                                            <li>
                                                <i class="fas fa-phone"></i>
                                                <a href="#">{{$settings->landline}}</a>
                                            </li>
                                            <li>
                                                <i class="fas fa-envelope"></i>
                                                <a href="mailto:{{$settings->email}}">{{$settings->email}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="auto-container">
                    <div class="footer-inner clearfix">
                        <div class="copyright pull-left"><p><a href="/">EzyOffer</a> &copy; {{date('Y')}} {{$language[139][session()->get('lang')]}}</p></div>
                        <!-- <ul class="footer-nav pull-right clearfix">
                            <li><a href="/">Terms of Service</a></li>
                            <li><a href="/">Privacy Policy</a></li>
                        </ul> -->
                    </div>
                </div>
            </div>
        </footer>
        <!-- main-footer end -->

        <!--Scroll to top-->
        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="far fa-long-arrow-up"></span>
        </button>
    </div>


    <!-- jequery plugins -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/toastr/toastr.css')}}">
    <script src="/assets/js/jquery.js"></script>
    <script src="{{ asset('assets/toastr/toastr.min.js')}}" type="text/javascript"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/owl.js"></script>
    <script src="/assets/js/wow.js"></script>
    <script src="/assets/js/validation.js"></script>
    <script src="/assets/js/jquery.fancybox.js"></script>
    <script src="/assets/js/appear.js"></script>
    <script src="/assets/js/scrollbar.js"></script>
    <script src="/assets/js/jquery.nice-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.5/typed.min.js"></script>
    <!-- main-js -->
    @yield('js')
    <script src="/assets/js/script.js"></script>
    @if(Auth::check())
    <script>
    setInterval(function(){
        $.ajax({
            url : '/customer/get-chat-notification-count',
            type: "GET",
            success: function(data)
            {
                if(data > 0){
                    //getnotification();
                    $('.message-count').html(data);
                }
            }
        });
    },1000);
    // function getnotification()
    // {
    //     $.ajax({
    //         url : '/customer/get-notification/',
    //         type: "GET",
    //         success: function(data)
    //         {
    //             //$('#notification_view').html(data.html);
    //             $('.message-count').html(data.notification_count);
    //         }
    //     });
    // }
    </script>
    @endif
<script>
function SaveNewsLetter(){
    $(".text-danger").remove();
    $('.form-group').removeClass('has-error').removeClass('has-success');
    var formData = new FormData($('#news-form')[0]);
    $.ajax({
        url : '/save-newsletter-mail',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {                
            Swal.fire({
                text: 'Your Email Id Stored Successfully',
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ok!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $("#news-form")[0].reset();
                    console.log(data);
                }
            })  
        },error: function (data) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
                $('input[name='+i+']').after('<p class="text-danger">'+obj[0]+'</p>');
                $('input[name='+i+']').closest('.form-group').addClass('has-error');
            });
        }
    });
}

$('input').keydown( function(e) {
    var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
    if(key == 13) {
        e.preventDefault();
    }
});
</script>
<script>
    function updateLanguage(lang) {
        $.ajax({
            url : '/update-language/'+lang,
            type: "GET",
            success: function(data)
            {
                location.reload();
            }
        });
    }
</script>
</body><!-- End of .page_wrapper -->
</html>
