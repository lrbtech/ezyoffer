@extends('website.layouts')
@section('css')
 
@endsection
@section('section')

        <!-- Page Title -->
        <section class="page-title style-two" style="background-image: url(/assets/images/background/page-title.jpg);">
            <div class="auto-container">
                <div class="content-box centred mr-0">
                    <div class="title">
                        <h1>Log in</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a class="translate" href="/">Home</a></li>
                        <li>Log in</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->


        <!-- login-section -->
        <section class="login-section bg-color-2">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="inner-box">
                        <h2>Log in</h2>
                        @if (session('status'))
                            <label class="text-danger">{{ session('status') }}</label>
                        @endif
                        <form class="login-form" method="POST" action="{{ route('login') }}">
                        @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input autocomplete="off" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                                @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input required autocomplete="off" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                @error('password')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="text"><a href="{{ route('password.request') }}">Forget Password?</a></div>
                            </div>
                            <div class="form-group message-btn">
                                <button type="submit" class="theme-btn-one">Login Now</button>
                            </div>
                        </form>
                        <div class="other-content centred">
                            <div class="text"><span>or</span></div>
                            <ul class="social-links clearfix">
                                <li><a href="#"><i class="fab fa-facebook-f"></i>Login with Facebook</a></li>
                                <li><a href="#"><i class="fab fa-google"></i>Login with Google</a></li>
                            </ul>
                            <div class="othre-text">
                                <p>Don’t have an account? <a href="/signup">Register Now</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- login-section end -->


@endsection
@section('js')
@endsection