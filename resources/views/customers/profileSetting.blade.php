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
                    <h4>Profile Settings</h4>
                    <p><a href="index.html">Home</a> <span><i class="ti-angle-right"></i></span> <a href="insights.html">Dashboard</a> <span> <i class="ti-angle-right"></i></span> Profile Settings</p>
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
                        <div class="ps-posted-ads ps-profile-setting">
                            <div class="ps-posted-ads__heading">
                                <h5>Profile Settings</h5>
                                <p>Click “Save Changes” to update</p>
                                <button class="btn ps-btn">Save Changes</button>
                            </div>
                            <div class="ps-profile-setting__content">
                                <form class="ps-profile-form">
                                    <div class="ps-profile--row">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="formGroupExampleInput1" required="" placeholder="First Name*">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="formGroupExampleInput2" required="" placeholder="Last Name*">
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                <select class="form-control">
                                                    <option value="" disabled="" selected="" hidden="">Select Gender:</option>
                                                    <option value="">Male</option>
                                                    <option value="">Female</option>
                                                    <option value="">Other</option>
                                                </select>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control ps-taken" required="" id="formGroupExampleInput3" placeholder="Username*">
                                            <em>Already taken  :(</em>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" id="formGroupExampleInput4" required="" placeholder="Mobile Number*">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="formGroupExampleInput5" placeholder="Email">
                                        </div>
                                  
                                        <div class="form-group">
                                            <input type="number" class="form-control" id="formGroupExampleInput7" placeholder="Whatsapp">
                                        </div>
                                     
                                      
                                      
                                    </div>
                                </form>
                                {{-- <div class="ps-profile-setting__upload">
                                    <h5>Profile Settings</h5>
                                    <div class="ps-profile-setting__uploadarea">
                                        <label for="filepf">
                                            <span class="btn ps-btn">Select File</span>
                                            <input type="file" name="file" id="filepf" class="d-none">
                                        </label>
                                        <!-- <button class="btn ps-btn">Select File</button> -->
                                        <p class="ps-drop">Drop files here to upload</p>
                                        <div></div>
                                        <p class="ps-loading">Uploading</p>
                                        <svg>
                                            <rect height="60px" width="100%" rx="6px" stroke-width="2" stroke-dasharray="12 12"></rect>
                                        </svg>
                                    </div>
                                    <form class="ps-profile-setting__imgs ps-x-axis mCustomScrollbar _mCS_1"><div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_horizontal mCSB_inside" style="max-height: none;" tabindex="0"><div id="mCSB_1_container" class="mCSB_container" style="position: relative; top: 0px; left: 0px; width: 758px;" dir="ltr">
                                        <input id="radio1" type="radio" name="radio" style="">
                                        <label for="radio1">
                                            <span>
                                                <img src="images/profile-setting/img-01.jpg" alt="Image Description" class="mCS_img_loaded">
                                                <a class="ps-trash" href="javascript:void(0);"><span><i class="ti-trash"></i></span></a>
                                                <span class="ps-tick"><span><i class="fas fa-check"></i></span></span>
                                            </span>
                                        </label>
                                        <input id="radio2" type="radio" name="radio" style="">
                                        <label for="radio2">
                                            <span>
                                                <img src="images/profile-setting/img-02.jpg" alt="Image Description" class="mCS_img_loaded">
                                                <a class="ps-trash" href="javascript:void(0);"><span><i class="ti-trash"></i></span></a> 
                                                <span class="ps-tick"><span><i class="fas fa-check"></i></span></span>  
                                            </span>
                                        </label>
                                        <input id="radio3" type="radio" name="radio" style="">
                                        <label for="radio3">
                                            <span>
                                                <img src="images/profile-setting/img-03.jpg" alt="Image Description" class="mCS_img_loaded">
                                                <a class="ps-trash" href="javascript:void(0);"><span><i class="ti-trash"></i></span></a>  
                                                <span class="ps-tick"><span><i class="fas fa-check"></i></span></span> 
                                            </span>
                                        </label>
                                        <input id="radio4" type="radio" name="radio" style="">
                                        <label for="radio4">
                                            <span>
                                                <img src="images/profile-setting/img-04.jpg" alt="Image Description" class="mCS_img_loaded">
                                                <a class="ps-trash" href="javascript:void(0);"><span><i class="ti-trash"></i></span></a> 
                                                <span class="ps-tick"><span><i class="fas fa-check"></i></span></span>  
                                            </span>
                                        </label>
                                        <input id="radio5" type="radio" name="radio" style="">
                                        <label for="radio5">
                                            <span>
                                                <img src="images/profile-setting/img-05.jpg" alt="Image Description" class="mCS_img_loaded">
                                                <a class="ps-trash" href="javascript:void(0);"><span><i class="ti-trash"></i></span></a>   
                                                <span class="ps-tick"><span><i class="fas fa-check"></i></span></span>
                                            </span>
                                        </label>
                                        <input id="radio6" type="radio" name="radio" style="">
                                        <label for="radio6">
                                            <span>
                                                <img src="images/profile-setting/img-05.jpg" alt="Image Description" class="mCS_img_loaded">
                                                <a class="ps-trash" href="javascript:void(0);"><span><i class="ti-trash"></i></span></a>   
                                                <span class="ps-tick"><span><i class="fas fa-check"></i></span></span>
                                            </span>
                                        </label>
                                    </div><div id="mCSB_1_scrollbar_horizontal" class="mCSB_scrollTools mCSB_1_scrollbar mCS-light mCSB_scrollTools_horizontal" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_1_dragger_horizontal" class="mCSB_dragger" style="position: absolute; min-width: 30px; display: block; width: 520px; max-width: 618px; left: 0px;"><div class="mCSB_dragger_bar"></div></div><div class="mCSB_draggerRail"></div></div></div></div></form>
                                </div> --}}
                                <div class="ps-profile-setting__save">
                                    <button class="btn ps-btn">Save Changes</button>
                                    <p>Click “Save Changes” to update</p>
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

<script src="/js/infobox/data.json"></script>
<script src="/js/infobox/mapclustering.js"></script>
<script src="/js/vendor/markerclusterer.min.js"></script>
<script src="/js/vendor/mapclustering.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJ3q6w3hiHe_MIbB1Jy31bGOwL8LYlwJw"></script>
<script src="/js/vendor/gmap3.min.js"></script>
<script src="/js/vendor/jquery.mCustomScrollbar.concat.min.js"></script>
    @endsection