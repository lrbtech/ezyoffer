  @extends('website.layout')
   @section('css')
   <link rel="stylesheet" href="/css/dashboard.css">
<link rel="stylesheet" href="/css/dashboard-responsive.css">
<link rel="stylesheet" href="/css/jquery.mCustomScrollbar.min.css">
   @endsection
@section('section')
<div class="ps-main-banner">
        <div class="ps-dark-overlay">
            <div class="container">
                <div class="ps-banner-content">
                    <h4>Offers &amp; Messages</h4>
                    <p><a href="index.html">Home</a> <span><i class="ti-angle-right"></i></span> <a href="insights.html">Dashboard</a> <span> <i class="ti-angle-right"></i></span> Offers &amp; Messages</p>
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
                        <div class="ps-posted-ads ps-messages">
                            <div class="ps-posted-ads__heading">
                                <h5>Offers/Messages</h5>
                            </div>
                            <div class="ps-messages__description">
                                <p>Select Your Product to See Their Messages:</p>
                                <div class="ps-user-product">
                                    <a class="ps-product-collapse" data-toggle="collapse" href="#collapsenew1" role="button" aria-expanded="false">
                                        <img src="/images/messages/icon/img-01.jpg" alt="Image Description">
                                        <span class="ps-messages__text">
                                            <span>Smart Wrist Watch Pro, Slightly Used</span>
                                            <em>AED690</em>
                                        </span>
                                        <i class="ti-angle-down"></i>
                                    </a>
                                    <div class="ps-profile-setting__imgs ps-message-product collapse" id="collapsenew1">
                                        <div class="ps-y-axis mCustomScrollbar _mCS_1 mCS_no_scrollbar"><div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" style="max-height: 0px;" tabindex="0"><div id="mCSB_1_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position:relative; top:0; left:0;" dir="ltr">
                                            <input type="radio" name="product-input" id="product1">
                                            <label class="ps-product-dot">
                                                <img src="/images/messages/icon/img-02.jpg" alt="Image Description" class="mCS_img_loaded">
                                                <span class="ps-messages__text">
                                                    <span>Brand New Iphone X For Sale</span>
                                                    <em>AED1,149</em>
                                                </span>
                                            </label>
                                            <input type="radio" name="product-input" id="product2">
                                            <label class="ps-product-dot">
                                                <img src="/images/messages/icon/img-01.jpg" alt="Image Description" class="mCS_img_loaded">
                                                <span class="ps-messages__text">
                                                    <span>Smart Wrist Watch Pro, Slightly Used</span>
                                                    <em>AED690</em>
                                                </span>                                            
                                            </label>
                                            <input type="radio" name="product-input" id="product3">
                                            <label>
                                                <img src="/images/messages/icon/img-03.jpg" alt="Image Description" class="mCS_img_loaded">
                                                <span class="ps-messages__text">
                                                    <span>Brand New Touch Book For Sale</span>
                                                    <em>AED1,320</em>
                                                </span>
                                            </label>
                                            <input type="radio" name="product-input" id="product4">
                                            <label>
                                                <img src="/images/messages/icon/img-04.jpg" alt="Image Description" class="mCS_img_loaded">
                                                <span class="ps-messages__text">
                                                    <span>Smart Wrist Watch Pro, Slightly Used</span>
                                                    <em>AED690</em>
                                                </span>
                                            </label>
                                            <input type="radio" name="product-input" id="product5">
                                            <label>
                                                <img src="/images/messages/icon/img-05.jpg" alt="Image Description" class="mCS_img_loaded">
                                                <span class="ps-messages__text">
                                                    <span>100% working drone for sale/exchange</span>
                                                    <em>AED1,458</em>
                                                </span>
                                            </label>
                                            <input type="radio" name="product-input" id="product6">
                                            <label>
                                                <img src="/images/messages/icon/img-05.jpg" alt="Image Description" class="mCS_img_loaded">
                                                <span class="ps-messages__text">
                                                    <span>100% working drone for sale/exchange</span>
                                                    <em>AED1,458</em>
                                                </span>
                                            </label>
                                            <input type="radio" name="product-input" id="product7">
                                            <label>
                                                <img src="/images/messages/icon/img-05.jpg" alt="Image Description" class="mCS_img_loaded">
                                                <span class="ps-messages__text">
                                                    <span>100% working drone for sale/exchange</span>
                                                    <em>AED1,458</em>
                                                </span>
                                            </label>
                                        </div><div id="mCSB_1_scrollbar_vertical" class="mCSB_scrollTools mCSB_1_scrollbar mCS-light mCSB_scrollTools_vertical" style="display: none;"><div class="mCSB_draggerContainer"><div id="mCSB_1_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 30px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div></div>                                   
                                    </div>
                                </div>
                            </div>
                            <div class="ps-messages__content">
                                <!-- USER AREA START -->
                                <ul class="ps-y-axis mCustomScrollbar _mCS_2"><div id="mCSB_2" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" tabindex="0" style="max-height: none;"><div id="mCSB_2_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">
                                    <li>
                                        <a href="javascript:void(0);" class="ps-dot">
                                        <img src="/images/user-icon/img-06.jpg" alt="Image Description" class="mCS_img_loaded">
                                        <span class="ps-messages__text">
                                            <span>Jacquelyn Hagemeier</span>
                                            <em>Jun 27, 2019</em>
                                        </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="ps-dot">
                                        <img src="/images/user-icon/img-01.jpg" alt="Image Description" class="mCS_img_loaded">
                                        <span class="ps-messages__text">
                                            <span>Otelia Izquierdo</span>
                                            <em>Jun 27, 2019</em>
                                        </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="ps-dot">
                                        <img src="/images/user-icon/img-12.jpg" alt="Image Description" class="mCS_img_loaded">
                                        <span class="ps-messages__text">
                                            <span>Abdul Winsett</span>
                                            <em>Jun 27, 2019</em>
                                        </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                        <img src="/images/user-icon/img-09.jpg" alt="Image Description" class="mCS_img_loaded">
                                        <span class="ps-messages__text">
                                            <span>Amee Kinkead</span>
                                            <em>Jun 27, 2019</em>
                                        </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                        <img src="/images/user-icon/img-04.jpg" alt="Image Description" class="mCS_img_loaded">
                                        <span class="ps-messages__text">
                                            <span>Lyle Ruybal</span>
                                            <em>Jun 27, 2019</em>
                                        </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                        <img src="/images/user-icon/img-13.jpg" alt="Image Description" class="mCS_img_loaded">
                                        <span class="ps-messages__text">
                                            <span>Gordon Prow</span>
                                            <em>Jun 27, 2019</em>
                                        </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                        <img src="/images/user-icon/img-08.jpg" alt="Image Description" class="mCS_img_loaded">
                                        <span class="ps-messages__text">
                                            <span>Selina Charlebois</span>
                                            <em>Jun 27, 2019</em>
                                        </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                        <img src="/images/user-icon/img-14.jpg" alt="Image Description" class="mCS_img_loaded">
                                        <span class="ps-messages__text">
                                            <span>Selina Charlebois</span>
                                            <em>Jun 27, 2019</em>
                                        </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                        <img src="/images/user-icon/img-14.jpg" alt="Image Description" class="mCS_img_loaded">
                                        <span class="ps-messages__text">
                                            <span>Selina Charlebois</span>
                                            <em>Jun 27, 2019</em>
                                        </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                        <img src="/images/user-icon/img-14.jpg" alt="Image Description" class="mCS_img_loaded">
                                        <span class="ps-messages__text">
                                            <span>Selina Charlebois</span>
                                            <em>Jun 27, 2019</em>
                                        </span>
                                        </a>
                                    </li>
                                </div><div id="mCSB_2_scrollbar_vertical" class="mCSB_scrollTools mCSB_2_scrollbar mCS-light mCSB_scrollTools_vertical" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_2_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; display: block; height: 561px; max-height: 660px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 30px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div></ul>
                                <!-- USER AREA END -->
                                <div class="ps-messages__user">
                                    <div class="ps-messages__user__heading">
                                        <a href="javascript:void(0);"><i class="ti-arrow-left"></i></a>
                                        <img src="/images/user-icon/img-09.jpg" alt="Image Description">
                                        <span class="ps-messages__text">
                                            <span>Amee Kinkead</span>
                                            <em>Last Online: Aug 08, 2019</em>
                                        </span>
                                        <a href="javascript:void(0);"><i class="ti-trash"></i></a> 
                                    </div>
                                    <!-- MESSAGE AREA START -->
                                    <div class="ps-messages__area ps-y-axis mCustomScrollbar _mCS_3"><div id="mCSB_3" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" tabindex="0" style="max-height: 401px;"><div id="mCSB_3_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">
                                        <div class="ps-messages__area__right">
                                            <p>Nostrud exercitation ullam aeco laboris nisi utae commodo consequat duis aute.</p>
                                            <p>Nostrud exercitation ullam aeco laboris nisi utae commodo consequat duis aute.</p>
                                            <p>Nostrud exercitation ullam aeco laboris nisi utae commodo consequat duis aute.</p>
                                            <p><a href="https://themeforest.net/" class="linkified" target="_blank">https://themeforest.net/</a></p>
                                            <p>It that ok?</p>
                                            <p>Ullam aeco laboris nisi utaeisea commodo</p>
                                            <span>Jun 28, 2019 09:30 <i class="fas fa-check"></i></span>
                                        </div>
                                        <div class="ps-messages__area__left">
                                            <p>Consectetur adipisicing elied diod taempor incint labore dolore ainare Ut enim ad minim veni ame quis nostrud exercitation ullamco laboris.</p>
                                            <p>Consectetur adipisicing elied diod taempor incint labore dolore ainare Ut enim ad minim veni ame quis nostrud exercitation ullamco laboris.</p>
                                            <p>Consectetur adipisicing elied diod taempor incint labore dolore ainare Ut enim ad minim veni ame quis nostrud exercitation ullamco laboris.</p>
                                            <span>Jun 27,2019 14:11</span>
                                        </div>
                                    </div><div id="mCSB_3_scrollbar_vertical" class="mCSB_scrollTools mCSB_3_scrollbar mCS-light mCSB_scrollTools_vertical" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_3_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; display: block; height: 210px; max-height: 391px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 30px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div></div>
                                    <div class="ps-text__area">
                                        <textarea class="form-control" placeholder="Type Message Here"></textarea>
                                        <div class="ps-emoji">
                                            <a href="javascript:void(0);">
                                                <img src="/images/messages/img-01.png" alt="Image Description">
                                                <span><i class="fas fa-angle-right"></i></span>
                                            </a>
                                            <button class="btn ps-btn">Send</button>
                                        </div>
                                    </div>
                                    <!-- MESSAGE AREA END -->
                                </div>
                            </div>
                            <div class="ps-no-ads">
                                <div>
                                    <figure><img src="/images/messages/img-02.png" alt="Image Description"></figure>
                                    <h5>No Offer/Messages Found :(</h5>
                                    <h6>Click “Post Ad” button below to post your free ad</h6>
                                    <button class="btn ps-btn">Post Ad</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- End MAIN CONTENT START -->
              
        </section>
    </main>
@endsection
  @section('js')
<script src="/js/vendor/masonry.pkgd.min.js"></script>
<script src="/js/vendor/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/js/vendor/linkify.min.js"></script>
<script src="/js/vendor/linkify-jquery.min.js"></script>
    @endsection