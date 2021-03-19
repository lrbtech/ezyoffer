@extends('website.layout')
@section('section')
  <!-- BANNER START -->
    <div class="ps-main-banner">
        <div class="ps-banner-img3">
            <div class="ps-dark-overlay2">
                <div class="container">
                    <div class="ps-banner-contentv3">
                        <h4>It’s Never Too Late To Start</h4>
                        <p><a href="index.html">Home</a> <span><i class="ti-angle-right"></i></span> Login/Register</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BANNER END -->
    <!-- MAIN START -->
    <main class="ps-main">
        <div class="container">
            <div class="row ps-main-section">
                <div class="col-lg-11 col-xl-10">
                    <nav class="ps-login">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                          <a class="nav-item nav-link active" id="nav-login-tab" data-toggle="tab" href="#nav-login" role="tab" aria-controls="nav-login" aria-selected="true">Login</a>
                          <a class="nav-item nav-link" id="nav-register-tab" data-toggle="tab" href="#nav-register" role="tab" aria-controls="nav-register" aria-selected="false">Register</a>
                        </div>
                      </nav>
                      <div class="tab-content" id="nav-tabContent">
                        <!-- LOGIN START -->
                        <div class="tab-pane fade show active" id="nav-login" role="tabpanel" aria-labelledby="nav-login-tab">
                            <div class="ps-login__area">
                                <div class="ps-gridList__searchArea ps-contact-seller">
                                    <h6>Login Now</h6>
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
                                            <a href="dashboard-insights.html" class="btn ps-btn btn btn-primary btn-block">Send Now</a>
                                            <button type="submit" class=""> Login </button>
                                            <a href="javascript:void(0);">Forgot Your Password?</a>
                                        </div>
                                    </form>
                                </div>
                                <div class="ps-or">
                                    <div></div>
                                    <div>
                                        <h6>OR</h6>
                                    </div>
                                </div>
                                <div class="ps-social-login">
                                    <h6>Login Via Social</h6>
                                    <button class="btn ps-facebook-btn ps-btn"><i class="fab fa-facebook-f"></i><span>Login With Facebook <i class="ti-angle-right"></i></span></button>
                                    <button class="btn ps-twitter-btn ps-btn"><i class="fab fa-twitter"></i><span>Login With Twitter <i class="ti-angle-right"></i></span></button>
                                    <button class="btn ps-google-plusbtn ps-btn"><i class="fab fa-google-plus-g"></i><span>Login With Google <i class="ti-angle-right"></i></span></button>
                                </div>
                            </div>
                        </div>
                        <!-- LOGIN END -->
                        <!-- REGISTER START -->
                        <div class="tab-pane fade" id="nav-register" role="tabpanel" aria-labelledby="nav-register-tab">
                            <div class="ps-login__area">
                                <div class="ps-gridList__searchArea ps-contact-seller">
                                    <h6>Make New Account</h6>
                                    <form>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="formGroupExampleInput3" placeholder="Username*">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="formGroupExampleInput4" placeholder="Email*">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="formGroupExampleInput5" placeholder="Password*">
                                        </div>
                                        <div class="ps-login-btn">
                                            <a href="dashboard-insights.html" class="btn ps-btn">Signup Now</a>
                                            <a href="javascript:void(0);">Already Have Account?</a>
                                        </div>
                                    </form>
                                </div>
                                <div class="ps-or">
                                    <div></div>
                                    <div>
                                        <h6>OR</h6>
                                    </div>
                                </div>
                                <div class="ps-social-login">
                                    <h6>Register Via Social</h6>
                                    <button class="btn ps-facebook-btn ps-btn"><i class="fab fa-facebook-f"></i><span>Login With Facebook <i class="ti-angle-right"></i></span></button>
                                    <button class="btn ps-twitter-btn ps-btn"><i class="fab fa-twitter"></i><span>Login With Twitter <i class="ti-angle-right"></i></span></button>
                                    <button class="btn ps-google-plusbtn ps-btn"><i class="fab fa-google-plus-g"></i><span>Login With Google <i class="ti-angle-right"></i></span></button>
                                </div>
                            </div>    
                        </div>
                        <!-- REGISTER END -->
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- MAIN END -->

@endsection