   @extends('website.layout')
   @section('css')
   <link rel="stylesheet" href="css/chosen.css">
   <style>
       .ps-seller__description .ps-h5 > a > span em,  {
    border-radius: 50%;
    width: 6px;
    height: 6px;
    cursor: pointer;
}
   </style>
   @endsection
@section('section')
   <div class="ps-main-banner">
        <div id="owl-four" class="ps-bannerSingle owl-carousel owl-theme">
            <div class="item">
                <figure>
                    <a class="ps-bannerSingle_overlay ps-img1" rel="prettyPhoto[pp_gal]" href="images/listing-single/img-01.jpg">
                        <span class="lnr lnr-frame-expand"></span>
                    </a>           
                    <img src="images/listing-single/img-01.jpg" alt="Image Description">
                </figure>
            </div>
            <div class="item">
                <figure>
                    <a class="ps-bannerSingle_overlay ps-img1" rel="prettyPhoto[pp_gal]" href="images/listing-single/img-02.jpg">
                        <span class="lnr lnr-frame-expand"></span>
                    </a> 
                    <img src="images/listing-single/img-02.jpg" alt="Image Description">
                </figure>
            </div>
            <div class="item">
                <figure>
                    <a class="ps-bannerSingle_overlay ps-img1" rel="prettyPhoto[pp_gal]" href="images/listing-single/img-03.jpg">
                        <span class="lnr lnr-frame-expand"></span>
                    </a> 
                    <img src="images/listing-single/img-03.jpg" alt="Image Description">
                </figure>
            </div>
            <div class="item">
                <figure>
                    <a class="ps-bannerSingle_overlay ps-img1" rel="prettyPhoto[pp_gal]" href="images/listing-single/img-04.jpg">
                        <span class="lnr lnr-frame-expand"></span>
                    </a> 
                    <img src="images/listing-single/img-04.jpg" alt="Image Description">
                </figure>
            </div>
        </div>
    </div>
    <!-- BANNER END -->
    <!-- MAIN START -->
    <main class="ps-main2">
        <!-- VISIT START -->
        <div class="ps-visit">
            <div class="container">
                <span class="ps-tag">Featured</span>
                <span class="ps-tag--arrow"></span>
                <figure>
                    <img src="images/listing-single/icon/img-01.jpg" alt="Image Description">
                      <div class="ps-h5">Status: 
                                            <a>
                                                <span><em class="ps-online" style="border-radius: 50%;
    width: 6px;
    height: 6px;"></em></span><em>Online</em> 
                                            </a>
                                        </div>
                </figure>
                
                <div class="ps-visit_description">
                    <p>Lorina Statham</p>
                    
                    <h4>Tourist Multiple Visit Visa For<span class="d-block">Families & Bachelors</span></h4>
                    <ul>
                        <li><span><i class="ti-eye"></i></span>12,064</li>
                        <li><span><i class="ti-calendar"></i></span>Jun 27, 2019</li>
                        <li class="ps-red"><span><i class="ti-alert"></i></span>Report Ad</li>
                        <li><span><i class="ti-flag"></i></span>ID:4Duzcn9s</li>
                    </ul>
                </div>
                <div class="ps-visit_btn">
                    <div class="row" style="display: block !important;">
                        <button class="btn ps-dollar ps-btn">$1,149</button><br>
                        <button class="btn btn-outline-info">Make offer</button><br>
                        <button class="btn btn-outline-info btn-sm">Ask</button>
                    </div>
                </div>

             <div class="ps-visit_btn">

                    <button class="btn ps-heart ps-btn"><span><i class="ti-heart"></i></span></button>
                    <button class="btn ps-share ps-btn"><span><i class="ti-share"></i></span></button>
                </div>
            </div>
        </div>
        <!-- VISIT END -->
        <div class="ps-visit-maincontent ps-main-section">
            <div class="container">
                <div class="row">
                    <!-- MAIN CONTENT START -->
                    <div class="col-lg-8">
                        <!-- DESCRIPTION START -->
                        <div class="ps-visit-description">
                            <h5>Description</h5>
                            <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaei Ut enim aden minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea coeido consequat. Duis autem irure dolor in reprehenderit in voluptate velit esse cillum dolore excepteur sint occaecat cupidatat non proente sunt in culpa qui officia deserunt mollit anim id estan laboum Sed ut perspiciatis unde omnis iste natus erroru sit voluptatem accusantium doloremque laudium aie totam rem aperiam eaque ipsa quae ab illo inventore veritatis.</p>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia coquuntuir magniem dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, quistani dolorem ipsum quia dolorn sit amet consectetur, adipisci velit, sed quia magnam aliquam quaerat voluptatem elit, sed do eiusmod tempor incididunt.</p>
                            <p class="pb-0">Lenabore et dolore magna aliqua enim ad minim veniamaisi nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprerit in voluptate velit essem cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proidentam sunt inen culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natustea error sit voluptatem accusantium doloremque laudantium totam rem aperiam.</p>
                        </div>
                        <!-- DESCRIPTION END -->
                        <!-- FEATURE START -->
                        <div class="ps-visit-feature">
                            <h5>Featured</h5>
                            <ul>
                                <li><span><i class="ti-printer"></i>Printable:<span class="ps-bold">Yes</span></span> <span><i class="ti-paint-bucket"></i>Color/ B&W:<span class="ps-bold">Color Double Sided</span></span></li>
                                <li><span><i class="ti-star"></i> Paper Quality:<span class="ps-bold">Best Paper</span></span> <span><i class="ti-layers-alt"></i>Spring Bind:<span class="ps-bold">No</span></span></li>
                                <li><span><i class="ti-spray"></i>Paper Color:<span class="ps-bold">White</span></span> <span><i class="ti-bell"></i>Door Step Delivery:<span class="ps-bold">Yes</span></span></li>
                                <li><span><i class="ti-blackboard"></i>Soft Copy:<span class="ps-bold">Available</span></span> <span><i class="ti-brush-alt"></i>Color:<span class="ps-bold">CMYK</span></span></li>
                                <li><span><i class="ti-bag"></i>Leminated:<span class="ps-bold">No</span></span></li>
                            </ul>
                        </div>
                        <!-- FEATURE END -->
                        <!-- VIDEO START -->
                        <div class="ps-visit-video">
                            <h5>Promo Video</h5>
                            <div class="embed-responsive embed-responsive-21by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/XxxIEGzhIG8" allowfullscreen></iframe>
                            </div>
                        </div>
                        <!-- VIDEO END -->
                     
                    </div>
                    <!-- MAIN CONTENT END -->
                    <!-- SIDEBAR START -->
                    <div class="col-lg-4">
                        <div class="ps-gridList__searchArea ps-seller">
                         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3630.843243027815!2d54.36168251527552!3d24.490887684229545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5e673c2d2ae4f5%3A0x27f86f27f04b128!2sLRB%20INFO%20TECH%20(Best%20Website%20Design%20%7C%20Web%20Development%20%7C%20Mobile%20Application%20Development%20%7C%20Digital%20Marketing%20%7C%20Ecommerce%20%7C%20SEO%20%7C%20IT%20%7C%20Company%20in%20abu%20dhabi%20%7C%20UAE%20)!5e0!3m2!1sen!2sae!4v1613655406516!5m2!1sen!2sae" width="300" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                        {{-- <div class="ps-gridList__searchArea ps-contact-seller">
                            <h6>Contact Seller</h6>
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Your Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Your Email">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Enter Keyword"></textarea>
                                </div>
                                <button class="btn ps-btn">Send Now</button>
                            </form>
                        </div> --}}
                        <div class="ps-gridList__searchArea ps-safety-seller">
                            <h6>Safety Tips</h6>
                            <ul>
                                <li>Adipisicing elit sed do eiusmod tempor incide dunt ut labore et dolore.</li>
                                <li>Ut enim ad minim veniamnostrud exercitation ullamco laboris nisi ut aliquip como.</li>
                                <li>Duis aute irure dolor in reprehenderit.</li>
                                <li>Voluptate velit esse cillum dolore eu fugiat.</li>
                            </ul>
                        </div>
                        <div class="ps-gridList__searchArea ps-reportAd-seller">
                            <h6>Report Ad</h6>
                            <form class="ps-form">
                                <div class="ps-select ps-sort">
                                    <select class="chosen-select locations form-control" data-placeholder="Country" name="reason">
                                        <option value="Location">Select Reason</option>
                                        <option value="United State">United State</option>
                                        <option value="Canada">Canada</option>
                                        <option value="England">England</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="New Zealand">New Zealand</option>
                                    </select>
                                </div>
                                <textarea class="form-control" placeholder="Description"></textarea>
                                <button class="btn ps-btn">Report Now</button>
                            </form>
                        </div>
                    </div>
                    <!-- SIDEBAR END -->
                </div>
            </div>
        </div>
         <!-- VISIT ADS START -->
                        <div class="ps-visit-ads" style="    padding-left: 40px;
    padding-right: 40px;">
                            <h5>Related Ads</h5>
                            <div id="owl-five" class="ps-featured--cards owl-carousel owl-theme">
                                <div class="item">
                                    <div class="card">
                                        <figure>
                                            <img src="images/featured/img-01.jpg" class="card-img-top" alt="Image Description">
                                        </figure>
                                        <span class="ps-tag">Featured</span>
                                        <span class="ps-tag--arrow"></span>
                                        <div class="card-body">
                                            <h6>$1,149</h6>
                                            <p class="card-text">Brand New Iphone X For Sale</p>
                                            <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                            <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                            <figure><img src="images/user-icon/img-01.jpg" alt="Image Description"></figure>
                                        </div>
                                        <ul class="list-group">
                                            <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);" class="ps-favorite"><i class="fas fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="card">
                                        <figure>
                                            <img src="images/featured/img-02.jpg" class="card-img-top" alt="Image Description">
                                        </figure>
                                        <span class="ps-tag">Featured</span>
                                        <span class="ps-tag--arrow"></span>
                                        <div class="card-body">
                                            <h6>$650</h6>
                                            <p class="card-text">Galaxy Note 8 Urgent Sale</p>
                                            <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                            <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                            <figure><img src="images/user-icon/img-02.png" alt="Image Description"></figure>
                                        </div>
                                        <ul class="list-group">
                                            <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);" class="ps-favorite"><i class="fas fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="card">
                                        <figure>
                                            <img src="images/featured/img-03.jpg" class="card-img-top" alt="Image Description">
                                        </figure>
                                        <span class="ps-tag">Featured</span>
                                        <span class="ps-tag--arrow"></span>
                                        <div class="card-body">
                                            <h6>$1,200</h6>
                                            <p class="card-text">Mac Air Book Pro, Slightly Used</p>
                                            <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                            <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                            <figure><img src="images/user-icon/img-03.jpg" alt="Image Description"></figure>
                                        </div>
                                        <ul class="list-group">
                                            <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="card">
                                        <figure>
                                            <img src="images/featured/img-04.jpg" class="card-img-top" alt="Image Description">
                                        </figure>
                                        <span class="ps-tag">Featured</span>
                                        <span class="ps-tag--arrow"></span>
                                        <div class="card-body">
                                            <h6>$1,149</h6>
                                            <p class="card-text">Brand New Touch Book For Sale</p>
                                            <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                            <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                            <figure><img src="images/user-icon/img-04.jpg" alt="Image Description"></figure>
                                        </div>
                                        <ul class="list-group">
                                            <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="card">
                                        <figure>
                                            <img src="images/featured/img-01.jpg" class="card-img-top" alt="Image Description">
                                        </figure>
                                        <span class="ps-tag">Featured</span>
                                        <span class="ps-tag--arrow"></span>
                                        <div class="card-body">
                                            <h6>$1,149</h6>
                                            <p class="card-text">Brand New Iphone X For Sale</p>
                                            <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                            <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                            <figure><img src="images/user-icon/img-01.jpg" alt="Image Description"></figure>
                                        </div>
                                        <ul class="list-group">
                                            <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="card">
                                        <figure>
                                            <img src="images/featured/img-02.jpg" class="card-img-top" alt="Image Description">
                                        </figure>
                                        <span class="ps-tag">Featured</span>
                                        <span class="ps-tag--arrow"></span>
                                        <div class="card-body">
                                            <h6>$650</h6>
                                            <p class="card-text">Galaxy Note 8 Urgent Sale</p>
                                            <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                            <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                            <figure><img src="images/user-icon/img-02.png" alt="Image Description"></figure>
                                        </div>
                                        <ul class="list-group">
                                            <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="card">
                                        <figure>
                                            <img src="images/featured/img-03.jpg" class="card-img-top" alt="Image Description">
                                        </figure>
                                        <span class="ps-tag">Featured</span>
                                        <span class="ps-tag--arrow"></span>
                                        <div class="card-body">
                                            <h6>$1,200</h6>
                                            <p class="card-text">Mac Air Book Pro, Slightly Used</p>
                                            <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                            <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                            <figure><img src="images/user-icon/img-03.jpg" alt="Image Description"></figure>
                                        </div>
                                        <ul class="list-group">
                                            <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="card">
                                        <figure>
                                            <img src="images/featured/img-04.jpg" class="card-img-top" alt="Image Description">
                                        </figure>
                                        <span class="ps-tag">Featured</span>
                                        <span class="ps-tag--arrow"></span>
                                        <div class="card-body">
                                            <h6>$1,149</h6>
                                            <p class="card-text">Brand New Touch Book For Sale</p>
                                            <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                            <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                            <figure><img src="images/user-icon/img-04.jpg" alt="Image Description"></figure>
                                        </div>
                                        <ul class="list-group">
                                            <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="card">
                                        <figure>
                                            <img src="images/featured/img-01.jpg" class="card-img-top" alt="Image Description">
                                        </figure>
                                        <span class="ps-tag">Featured</span>
                                        <span class="ps-tag--arrow"></span>
                                        <div class="card-body">
                                            <h6>$1,149</h6>
                                            <p class="card-text">Brand New Iphone X For Sale</p>
                                            <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                            <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                            <figure><img src="images/user-icon/img-01.jpg" alt="Image Description"></figure>
                                        </div>
                                        <ul class="list-group">
                                            <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="card">
                                        <figure>
                                            <img src="images/featured/img-02.jpg" class="card-img-top" alt="Image Description">
                                        </figure>
                                        <span class="ps-tag">Featured</span>
                                        <span class="ps-tag--arrow"></span>
                                        <div class="card-body">
                                            <h6>$650</h6>
                                            <p class="card-text">Galaxy Note 8 Urgent Sale</p>
                                            <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                            <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                            <figure><img src="images/user-icon/img-02.png" alt="Image Description"></figure>
                                        </div>
                                        <ul class="list-group">
                                            <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="card">
                                        <figure>
                                            <img src="images/featured/img-03.jpg" class="card-img-top" alt="Image Description">
                                        </figure>
                                        <span class="ps-tag">Featured</span>
                                        <span class="ps-tag--arrow"></span>
                                        <div class="card-body">
                                            <h6>$1,200</h6>
                                            <p class="card-text">Mac Air Book Pro, Slightly Used</p>
                                            <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                            <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                            <figure><img src="images/user-icon/img-03.jpg" alt="Image Description"></figure>
                                        </div>
                                        <ul class="list-group">
                                            <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="card">
                                        <figure>
                                            <img src="images/featured/img-04.jpg" class="card-img-top" alt="Image Description">
                                        </figure>
                                        <span class="ps-tag">Featured</span>
                                        <span class="ps-tag--arrow"></span>
                                        <div class="card-body">
                                            <h6>$1,149</h6>
                                            <p class="card-text">Brand New Touch Book For Sale</p>
                                            <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                            <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                            <figure><img src="images/user-icon/img-04.jpg" alt="Image Description"></figure>
                                        </div>
                                        <ul class="list-group">
                                            <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- VISIT ADS END -->
    </main>
      
    @endsection
    @section('js')

    <script src="js/vendor/chosen.jquery.js"></script>

    @endsection