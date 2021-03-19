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
                    <h4>Account &amp; Privacy Settings</h4>
                    <p><a href="index.html">Home</a> <span><i class="ti-angle-right"></i></span> <a href="insights.html">Dashboard</a> <span> <i class="ti-angle-right"></i></span> Account &amp; Privacy Settings</p>
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
               <div class="col-lg-8 ps-dashboard-user animate" data-animate="fadeInRight">
                        <!-- CHANGE PASSWORD START -->
                        <div class="ps-posted-ads ps-profile-setting">
                            <div class="ps-posted-ads__heading">
                                <h5>Change Password</h5>
                                <p>Click “Save Changes” to update</p>
                                <button class="btn ps-btn">Save Changes</button>
                            </div>
                            <div class="ps-profile-setting__content ps-account-save">
                                <form>
                                    <input type="password" class="form-control" placeholder="Old Password*">
                                    <input type="password" class="form-control" placeholder="New Password*">
                                    <input type="password" class="form-control" placeholder="Retype Password*">
                                </form>
                            </div>
                        </div>
                        <!-- CHANGE PASSWORD END -->
                        <!-- ACCOUNT & PRIVACY SETTING START -->
                        <div class="ps-posted-ads ps-profile-setting">
                            <div class="ps-posted-ads__heading">
                                <h5>Account &amp; Privacy Settings</h5>
                                <p>Click “Save Changes” to update</p>
                                <button class="btn ps-btn">Save Changes</button>
                            </div>
                            <div class="ps-profile-setting__content ps-account-setting">
                                <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua aut enim ad minim veniamac quis nostrud exercitation ullamco laboris.</p>
                                <div class="row no-gutters">
                                    <div class="col-md-6">
                                        <div class="ps-account-checkbox">
                                            <div class="ps-on-off">
                                                <input type="checkbox" id="hide1" name="contactForm">
                                                <label for="hide1">
                                                    <i></i>
                                                </label>
                                            </div>
                                            <p>Make my profile public</p>
                                        </div>
                                        <div class="ps-account-checkbox">
                                            <div class="ps-on-off">
                                                <input type="checkbox" id="hide2" name="contactForm">
                                                <label for="hide2">
                                                    <i></i>
                                                </label>
                                            </div>
                                            <p>Share my profile photo</p>
                                        </div>
                                        <div class="ps-account-checkbox">
                                            <div class="ps-on-off">
                                                <input type="checkbox" id="hide3" name="contactForm">
                                                <label for="hide3">
                                                    <i></i>
                                                </label>
                                            </div>
                                            <p>Show my client feedback</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="ps-account-checkbox">
                                            <div class="ps-on-off">
                                                <input type="checkbox" id="hide4" name="contactForm">
                                                <label for="hide4">
                                                    <i></i>
                                                </label>
                                            </div>
                                            <p>Make my profile searchable</p>
                                        </div>
                                        <div class="ps-account-checkbox">
                                            <div class="ps-on-off">
                                                <input type="checkbox" id="hide5" name="contactForm">
                                                <label for="hide5">
                                                    <i></i>
                                                </label>
                                            </div>
                                            <p>Disable my account temporarily</p>
                                        </div>
                                        <div class="ps-account-checkbox">
                                            <div class="ps-on-off">
                                                <input type="checkbox" id="hide6" name="contactForm">
                                                <label for="hide6">
                                                    <i></i>
                                                </label>
                                            </div>
                                            <p>Enable/ Disable</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ACCOUNT & PRIVACY SETTING END -->
                        <!-- CHANGE PASSWORD FORM START -->
                        <div class="ps-posted-ads ps-profile-setting ps-account">
                            <div class="ps-posted-ads__heading">
                                <h5>Deactivate Account</h5>
                                <p>Click “Deactivate” to Shutdown Account</p>
                                <button class="btn ps-btn">Deactivate</button>
                            </div>
                            <div class="ps-profile-setting__content">
                                <form class="ps-contact-seller ps-comment--form">
                                    <div class="ps-comment--row">
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="formGroupExampleInput" placeholder="Enter Password*">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="Retype Password*">
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="Description"></textarea>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- CHANGE PASSWORD FORM END -->
                    </div>
                    <!-- MAIN CONTENT END -->
                </div>
            </div>
        </section>
    </main>
@endsection
  @section('js')
<script src="/js/vendor/chosen.jquery.js"></script>

    @endsection