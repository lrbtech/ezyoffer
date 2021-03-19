<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EZY OFFER</title>
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="icon" href="/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/normalize.css">
	<link rel="stylesheet" href="/css/fontawesome/fontawesome-all.css">
	<link rel="stylesheet" href="/css/linearicons.css">
	<link rel="stylesheet" href="/css/themify-icons.css">
	<link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/jquery-ui.css">
    <link rel="stylesheet" href="/css/prettyPhoto.css">
	<link rel="stylesheet" href="/css/transitions.css">
	<link rel="stylesheet" href="/css/main.css">
	<link rel="stylesheet" href="/css/responsive.css">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700,800" rel="stylesheet">
    <link rel="stylesheet" href="/fonts/flaticon/flaticon.css">
   
    @yield('css')
</head>
<body>
    <!-- PRELOADER START -->
    <div class="preloader-outer">
        <figure><img src="/images/img-face.png" alt="Image Description">
            <span class="pulse"></span>
        </figure>
    </div>
    <!-- PRELOADER END -->
    <!-- HEADER START -->
  @include('website.menu')
    <!-- HEADER END -->
    <!-- BANNER START -->
    
    <!-- BANNER END -->
    <!-- MAIN START -->
  @yield('section')
    <!-- MAIN END -->
    <!-- FOOTER START -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <div class="ps-social-login">
                                    <h6>Login Via Social</h6>
                                    <button class="btn ps-facebook-btn ps-btn"><i class="fab fa-facebook-f"></i><span>Login With Facebook <i class="ti-angle-right"></i></span></button>
                                    <button class="btn ps-twitter-btn ps-btn"><i class="fab fa-twitter"></i><span>Login With Twitter <i class="ti-angle-right"></i></span></button>
                                    <button class="btn ps-google-plusbtn ps-btn"><i class="fab fa-google-plus-g"></i><span>Login With Google <i class="ti-angle-right"></i></span></button>
                                </div>
                                <br>
                                <br>
            <div class="ps-or">
                                    <div></div>
                                    <div>
                                        <h6>OR</h6>
                                    </div>
                                </div>
                                <br>
          <div class="ps-gridList__searchArea ps-contact-seller">
                                    
                                    <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                        <div class="form-group">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email*" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input placeholder="Password*" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="ps-login-btn">
                                            <button type="submit" class="btn ps-btn"> Login </button>
                                            <a href="javascript:void(0);">Forgot Your Password?</a>
                                        </div>
                                    </form>
                                </div>
      </div>
      <div class="modal-footer">
       <div class="">
           <a href="javascript:void(null)">Don't have ab account? <span style="color:green">Sign up</span></a>
       </div>
      </div>
    </div>
  </div>
</div>
    <footer class="ps-main-footer">
        <section class="ps-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-lg-6 animate" data-animate="driveInLeft">
                        <div class="ps-footer__left">
                            <figure><img src="/images/footer/img-01.png" alt="Image Description"></figure>
                            <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt utbor etian dolm magna aliqua enim ad minim veniam quis nostrud exercita ullamco laboris nisie aliquip commodo okialama sikune pisuye.</p>
                            <ul class="ps-footer__contact">
                                <li><a href="javascript:void(0);"><i class="lnr lnr-location"></i> 123 New Design Street, Melbour Australia 54214</a></li>
                                <li><a href="javascript:void(0);"><i class="lnr lnr-envelope"></i> info@domainurl.com</a></li>
                                <li><a href="javascript:void(0);"><i class="lnr lnr-phone-handset"></i> (0800) 1234 567891</a></li>
                            </ul>
                            <ul class="ps-footer__social-media">
                                <li class="ps-facebook"><a href="javascript:void(0);"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="ps-twitter"><a href="javascript:void(0);"><i class="fab fa-twitter"></i></a></li>
                                <li class="ps-linkedin"><a href="javascript:void(0);"><i class="fab fa-linkedin-in"></i></a></li>
                                <li class="ps-instagram"><a href="javascript:void(0);"><i class="fab fa-instagram"></i></a></li>
                                <li class="ps-youtube"><a href="javascript:void(0);"><i class="fab fa-youtube"></i></a></li>
                                <li class="ps-google-plus"><a href="javascript:void(0);"><i class="fab fa-google-plus-g"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 animate" data-animate="fadeIn">
                        <div class="ps-footer__link">
                            <h6>Useful Links</h6>
                            <ul>
                                <li><a href="javascript:void(0);">How it works?</a></li>
                                <li><a href="javascript:void(0);">About</a></li>
                                <li><a href="javascript:void(0);">Listing Grid</a></li>
                                <li><a href="javascript:void(0);">Listing Single -  With Chatbox</a></li>
                                <li><a href="javascript:void(0);">Latest Article Grid</a></li>
                                <li><a href="javascript:void(0);">Latest Article Detail</a></li>
                                <li><a href="javascript:void(0);">Login Or Register</a></li>
                                <li><a href="javascript:void(0);">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 animate" data-animate="driveInRight">
                        <div class="ps-footer__newsletter">
                            <h6>Newsletter</h6>
                            <p>Eiusmod tempor incididunt utbor etian dolm magna aliqua enim minim</p>
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="Your Email" aria-label="Your Email" aria-describedby="button-addon1">
                                <div class="input-group-append">
                                  <button class="btn btn-outline-secondary" type="button" id="button-addon1"><i class="ti-arrow-right"></i></button>
                                </div>
                            </div>
                            <h6>Download Mobile App</h6>
                            <div class="ps-footer__img">
                                <a href="javascript:void(0);"><figure><img src="/images/footer/img-02.png" alt="Image Description"></figure></a>
                                <a href="javascript:void(0);"><figure><img src="/images/footer/img-03.png" alt="Image Description"></figure></a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="ps-footer-down animate" data-animate="fadeIn">
            <P>Copyrights © 2021 by<a href="javascript:void(0);"> EzyOffers</a>. All Rights Reserved.</P>
        </div>
    </footer>

@parent
@if($errors->has('email') || $errors->has('password'))
    <script>
    $(function() {
        $('#exampleModal').modal({
            show: true
        });
    });
    </script>
@endif

    <!-- FOOTER END -->
    <script src="/js/vendor/jquery.min.js"></script>
    <script src="/js/vendor/popper.min.js"></script>
    <script src="/js/vendor/jquery-library.js"></script>
    <script src="/js/vendor/bootstrap.min.js"></script>
    <script src="/js/vendor/owl.carousel.min.js"></script>
    <script src="/js/vendor/prettyPhoto.js"></script>
    <script src="/js/vendor/jquery-ui.min.js"></script>
    <script src="/js/vendor/jquery.ui.touch-punch.js"></script>
    <script src="/js/main.js"></script>
    @yield('js')
</body>

</html>