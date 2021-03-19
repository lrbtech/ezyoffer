  @extends('website.layout')
   @section('css')
   <link rel="stylesheet" href="/css/dashboard.css">
<link rel="stylesheet" href="/css/dashboard-responsive.css">
   @endsection
@section('section')

 <div class="ps-main-banner">
        <div class="ps-dark-overlay">
            <div class="container">
                <div class="ps-banner-content">
                    <h4>Payments</h4>
                    <p><a href="index.html">Home</a> <span><i class="ti-angle-right"></i></span> <a href="insights.html">Dashboard</a> <span><i class="ti-angle-right"></i></span> Payments</p>
                </div>
            </div>
        </div>
    </div>
<main class="ps-main">
        <section class="ps-main-section">
            <div class="container">
                <div class="row">
               @include('customers.sidebar')
                    <!-- MAIN CONTENT START -->
               <div class="col-lg-8 ps-dashboard-user">
                        <div class="ps-posted-ads">
                            <div class="ps-posted-ads__heading">
                                <h5>Buy New Pacakge</h5>
                            </div>
                            <div class="ps-current-package">
                                <div class="ps-package ps-buy-package">
                                    <div class="ps-package__expire">
                                        <h6>Current Package Expire in:</h6>
                                        <em>Basic Plan</em>
                                        <span><i class="ti-time"></i></span>
                                    </div>
                                    <div class="ps-buy-package__time">
                                        <div class="ps-package__time ps-days">
                                            <h5>159</h5>
                                            <span>Days</span>
                                        </div>
                                        <div class="ps-package__time ps-hours">
                                            <h5>7</h5>
                                            <span>Hours</span>
                                        </div>
                                        <div class="ps-package__time ps-minutes">
                                            <h5>6</h5>
                                            <span>Minutes</span>
                                        </div>
                                        <div class="ps-package__time ps-seconds">
                                            <h5>26</h5>
                                            <span>Seconds</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-buy-package__description">
                                    <p>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliquat enimi ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequate duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
                                </div>
                                <div class="ps-package-plan row no-gutters">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="ps-package-plan__basic">
                                            <div class="ps-package-plan__heading">
                                                <h3><sup>AED</sup>37<sub>.25</sub></h3>
                                                <h6>Basic Plan</h6>
                                                <p>/Month</p>
                                            </div>
                                            <ul>
                                                <li><h6>10 <span>Montly Posts</span></h6></li>
                                                <li><h6>05 <span>Featured Posts</span></h6></li>
                                                <li><h6>05 <span>Regular Posts</span></h6></li>
                                                <li><h6>Chat <span>Option Included</span></h6></li>
                                                <li><h6>24/7 <span>Fully Support</span></h6></li>
                                            </ul>
                                            <button class="btn ps-btn">Renew Now</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="ps-package-plan__basic ps-feature-package">
                                            <div class="ps-package-plan__heading">
                                                <h3><sup>AED</sup>79<sub>.00</sub></h3>
                                                <h6>Standard</h6>
                                                <p>/Month</p>
                                            </div>
                                            <ul>
                                                <li><h6>30 <span>Montly Posts</span></h6></li>
                                                <li><h6>20 <span>Featured Posts</span></h6></li>
                                                <li><h6>10 <span>Regular Posts</span></h6></li>
                                                <li><h6>Chat <span>Option Included</span></h6></li>
                                                <li><h6>24/7 <span>Fully Support</span></h6></li>
                                            </ul>
                                            <button class="btn ps-btn">Buy Now</button>
                                            <span class="ps-star"><i class="fas fa-star"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="ps-package-plan__basic">
                                            <div class="ps-package-plan__heading">
                                                <h3><sup>AED</sup>190<sub>.00</sub></h3>
                                                <h6>Extended</h6>
                                                <p>/Month</p>
                                            </div>
                                            <ul>
                                                <li><h6>50 <span>Montly Posts</span></h6></li>
                                                <li><h6>30 <span>Featured Posts</span></h6></li>
                                                <li><h6>20 <span>Regular Posts</span></h6></li>
                                                <li><h6>Chat <span>Option Included</span></h6></li>
                                                <li><h6>24/7 <span>Fully Support</span></h6></li>
                                            </ul>
                                            <button class="btn ps-btn">Buy Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- MAIN CONTENT END -->
                </div>
            </div>
        </section>
    </main>
@endsection
  @section('js')


    @endsection