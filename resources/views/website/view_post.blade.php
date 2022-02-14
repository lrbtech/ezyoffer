@extends('website.layouts')
@section('css')
<!-- <link href="/assets/css/xzoom.css" rel="stylesheet"> -->
<link rel="stylesheet" type="text/css" href="/slider/css/slideshow.css">

<style type="text/css">
.friend {
    height: 70px;
    border-bottom: 1px solid #e7ebee;
    position: relative;
}

.friend img {
    width: 40px;
    border-radius: 50%;
    margin: 15px;
    float: left;
}

.friend p {
    padding: 15px 0 0 0;
    float: left;
    width: 75%;
        margin-top: 11px;
    font-size: 17px;
}

.friend span {
    display: block;
}

.message-seller-pop textarea{
    position: relative;
    display: block;
    width: 100%;
    height: 145px;
    border: 1px solid #e6e8e8;
    border-radius: 30px;
    font-size: 15px;
    color: #808288;
    padding: 10px 30px;
    transition: all 500ms ease;
    margin: 20px 0;
}


.message-seller-pop input[type='text'] {
    position: relative;
    width: 100%;
    height: 50px;
    border: 1px solid #e6ebeb;
    border-radius: 30px;
    padding: 10px 30px;
    font-size: 15px;
    font-weight: 500;
    color: #848484;
    transition: all 500ms ease;
}

.offers-label{
    text-align: center;
    display: block;
    color: #091a3a;
    font-weight: 800;
    margin-top: 15px;
    margin-bottom: 17px;
}

.friend p{
    padding: 9px 0 0 0;
}

.page-title-2 {
    padding-top: 50px !important;
}

</style>
<style>
@media only screen and (max-width: 1299px) {
  .left-ad {
    display:none;
  }
  .right-ad {
    display:none;
  }
}
</style>
@endsection
@section('section')

<!-- Page Title -->
<!-- <section class="page-title-2" style="background-image: url(/assets/images/background/page-title-2.jpg);"> -->
<section class="page-title page-title-2" style="background-image: url(/assets/images/background/page-title.jpg);">
    <div class="auto-container">
        <div class="content-box">
            <h1 class="translate">{{$post_ad->title}}</h1>
            <!-- <span class="category"></span> -->
            <ul class="translate bread-crumb clearfix">
                <li><a href="/search-post/0/{{$post_ad->category}}/0/0/0/0">{{ \App\Http\Controllers\HomeController::viewcategoryname($post_ad->category) }}</a></li>
                <li href="/search-post/0/0/0/0/0/0">UAE</li>
                <li><a href="/search-post/0/0/0/{{$post_ad->city}}/0/0">{{ \App\Http\Controllers\HomeController::viewcity($post_ad->city) }}</a></li>
                <li><a href="/search-post/0/0/0/0/{{$post_ad->area}}/0">{{ \App\Http\Controllers\HomeController::viewarea($post_ad->area) }}</a></li>
            </ul>
        </div>
        <div class="info-box clearfix">
            <div class="left-column pull-left clearfix">
                <div class="image-box">
                    @if($user->profile_image != '')
                    <img style="height:70px;" src="/upload_profile_image/{{$user->profile_image}}" alt="">
                    @else
                    <img src="/assets/images/icons/user-icon.png" alt="">
                    @endif
                </div>
                <h4 class="translate">{{$user->first_name}} {{$user->last_name}}<i class="icon-18"></i></h4>
                <!-- <ul class="rating clearfix">
                    <li><i class="icon-17"></i></li>
                    <li><i class="icon-17"></i></li>
                    <li><i class="icon-17"></i></li>
                    <li><i class="icon-17"></i></li>
                    <li><i class="icon-17"></i></li>
                    <li><a href="index.html">(32)</a></li>
                </ul> -->
                @if($post_ad->item_conditions == 'New')
                <span class="translate sell">New</span>
                @elseif($post_ad->item_conditions == 'Used (Looks New)')
                <span class="translate sell">Used (Looks New)</span>
                @elseif($post_ad->item_conditions == 'Used (Good)')
                <span class="translate sell">Used (Good)</span>
                @elseif($post_ad->item_conditions == 'Used (Some Damage)')
                <span class="translate sell">Used (Some Damage)</span>
                @endif
                <h5 class="translate"><span>Price:</span>AED {{$post_ad->price}}</h5>
            </div>
            <div class="right-column pull-right clearfix">
                <ul class="links-list clearfix">
                    <!-- <li class="share-option">
                        <a href="browse-ad-details.html" class="share-btn"><i class="fas fa-share-alt"></i></a>
                        <ul>
                            <li><a href="browse-ad-details.html"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="browse-ad-details.html"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="browse-ad-details.html"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href="browse-ad-details.html"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </li> -->
                    <!-- <li><a href="browse-ad-details.html"><i class="fas fa-exclamation-triangle"></i></a></li>  -->
                    @if(Auth::check())
                        @if($post_ad->customer_id != Auth::user()->id)
                        <li><a data-toggle="modal" data-target="#reportmodal" href="javascript:void(0)"><i class="fas fa-exclamation-triangle"></i></a></li>
                        @else 
                        <li><a href="javascript:void(0)" onclick="yourpost()"><i class="fas fa-exclamation-triangle"></i></a></li>
                        @endif
                    @else 
                    <li><a onclick="viewlogin({{$post_ad->id}})" href="javascript:void(0)"><i class="fas fa-exclamation-triangle"></i></a></li>
                    @endif
                    
                    <li class="favourite-class{{$post_ad->id}}">
                    @if(Auth::check())
                        @if(empty($favourite))
                        <a onclick="SaveFavourite({{$post_ad->id}})"  href="javascript:void(0)"><i class="icon-22"></i></a>
                        @else 
                        <a style="color:red;" onclick="DeleteFavourite({{$post_ad->id}})" href="javascript:void(0)"><i class="icon-22"></i></a>
                        @endif
                    @else
                    <a onclick="viewlogin({{$post_ad->id}})" href="javascript:void(0)"><i class="icon-22"></i></a>
                    @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Page Title -->



        <!-- browse-add-details -->
        <section class="browse-add-details bg-color-2">

<div style="margin-top:-50px;margin-bottom:30px;" class="col-md-12">
    @if($google_ads->image_728_90 != '')
    <center><img src="/ads_image/{{$google_ads->image_728_90}}"></center>
    @else
    <center><img src="https://via.placeholder.com/728x90"></center>
    @endif
</div>
<div class="left-ad" style="float:left;margin-top:200px;padding-left:20px;">
    @if($google_ads->image_160_600 != '')
    <img src="/ads_image/{{$google_ads->image_160_600}}">
    @else
    <img src="https://via.placeholder.com/160x600"> 
    @endif
</div>
<div class="right-ad" style="float:right;margin-top:200px;padding-right:20px;">
    @if($google_ads->image_160_600 != '')
    <img src="/ads_image/{{$google_ads->image_160_600}}">
    @else
    <img src="https://via.placeholder.com/160x600"> 
    @endif
</div>

            <div class="auto-container">
                <div class="row clearfix">
<div class="col-lg-8 col-md-12 col-sm-12 content-side">
    <div class="add-details-content">
        <div style="padding:10px !important;" class="content-two single-box">
            <!-- <center>
            <div class="xzoom-container">
                <img style="width:100%;height:300px !important;" class="xzoom" src="/upload_image/{{$post_ad->image}}" xoriginal="/upload_image/{{$post_ad->image}}" />
                <div class="xzoom-thumbs">
                    <a href="/upload_image/{{$post_ad->image}}">
                        <img class="xzoom-gallery" width="80" height="80" src="/upload_image/{{$post_ad->image}}"  xpreview="/upload_image/{{$post_ad->image}}">
                    </a>
                    @foreach($post_image as $row)
                    <a href="/upload_image/{{$row->image}}">
                        <img class="xzoom-gallery" width="80" height="80" src="/upload_image/{{$row->image}}"  xpreview="/upload_image/{{$row->image}}">
                    </a>
                    @endforeach
                </div>                 
            </div>   
            </center> -->
            <!-- <div class="container"> -->
                <div class="carousel carousel-main" data-flickity='{"pageDots": false }'>
                    <div class="carousel-cell"><img src="/upload_image/{{$post_ad->image}}"/></div>
                    @foreach($post_image as $key => $row)
                    <div class="carousel-cell"><img src="/upload_image/{{$row->image}}"/></div>
                    @endforeach
                </div>
                <div class="carousel carousel-nav"
                data-flickity='{ "asNavFor": ".carousel-main", "contain": true, "pageDots": false }'>
                    <div class="carousel-cell"><img src="/upload_image/{{$post_ad->image}}"/></div>
                    @foreach($post_image as $key => $row)
                    <div class="carousel-cell"><img src="/upload_image/{{$row->image}}"/></div>
                    @endforeach
                </div>
            <!-- </div> -->

        </div>

        <div class="content-one single-box">
            <div class="text">
                <h3>{{$language[179][session()->get('lang')]}}</h3>
                <p class="translate">{{$post_ad->description}}</p>
            </div>
            <!-- <div class="text-left" style="width: 100%;margin:10px 0;">
                <div class="more-btn"><a data-toggle="modal" data-target="#messageseller" href="javascript:void(0)" class="theme-btn-one">Make An Enquiry</a></div>
            </div> -->
        </div>           
        @if(count($post_ad_features) > 0)                 
        <div class="content-three single-box">
            <div class="text">
                <h3>{{$language[189][session()->get('lang')]}}:</h3>
                <ul class="list-item clearfix">
                    @foreach($post_ad_features as $row)
                    <li class="translate">{{$row->features}}</li>
                    @endforeach
                    <!-- <li>2.7 GHz dual-core Intel Core i5 processor</li>
                    <li>Turbo Boost up to 3.1GHz</li>
                    <li>Intel Iris Graphics 6100</li>
                    <li>8GB memory (up from 4GB in 2013 model)</li>
                    <li>1 Year international warranty</li> -->
                </ul>
            </div>
        </div>
        @endif
        <div class="content-four single-box">
            <div class="text">
                <h3>{{$language[180][session()->get('lang')]}}</h3>
            </div>
            <div class="contact-map">
                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55945.16225505631!2d-73.90847969206546!3d40.66490264739892!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1601263396347!5m2!1sen!2sbd"></iframe> -->
                <iframe id="map" src="http://maps.google.com/maps?q=abu dhabi&z=16&output=embed" style="width: 100%; height: 300px;border:0;" frameborder="0" allowfullscreen></iframe>
            </div>
            {{--<div class="text">
                <h4>{{$language[181][session()->get('lang')]}}</h4>
                <p class="translate">{{$post_ad->address}}</p>
                <p class="translate" style="text-transform:capitalize !important;">{{ \App\Http\Controllers\HomeController::viewcityname($post_ad->area,$post_ad->city) }}</p>
            </div>--}}
            <!-- <ul class="info-box clearfix">
                <li><span>Address:</span> {{$post_ad->address}}</li>
                <li style="text-transform:capitalize !important;"><span>City:</span> {{ \App\Http\Controllers\HomeController::viewcityname($post_ad->area,$post_ad->city) }}</li>
                <li><span>Area:</span> California</li>
                <li><span>Neighborhood:</span> Andersonville</li>
                <li><span>Zip/Postal Code:</span> 2403</li>
                <li><span>City:</span> Brooklyn</li>
            </ul> -->
        </div>
        <div class="content-four single-box">
            @if($google_ads->image_728_90 != '')
            <center><img src="/ads_image/{{$google_ads->image_728_90}}"></center>
            @else
            <center><img src="https://via.placeholder.com/728x90"></center>
            @endif
       </div>
        
        <!-- <div class="content-five single-box">
            <div class="text">
                <h4>Leave a Review</h4>
                <p>Your email address will not be published. Required fields are marked *</p>
            </div>
            <form action="browse-ad-details.html" method="post" class="review-form">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 column">
                        <div class="form-group">
                            <label>Review Title*</label>
                            <input type="text" name="title" required="">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 column">
                        <div class="form-group">
                            <label>Your Rating*</label>
                            <ul class="rating clearfix">
                                <li><i class="icon-32"></i></li>
                                <li><i class="icon-32"></i></li>
                                <li><i class="icon-32"></i></li>
                                <li><i class="icon-32"></i></li>
                                <li><i class="icon-32"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 column">
                        <div class="form-group">
                            <label>Review Your Description*</label>
                            <textarea name="message"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 column">
                        <div class="form-group message-btn">
                            <button type="submit" class="theme-btn-one">Submit Now</button>
                        </div>
                    </div>
                </div>
            </form>
        </div> -->
    </div>
</div>
<div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
    
    <div class="default-sidebar category-sidebar">
        <!-- <div class="tags-widget sidebar-widget">
            <div class="widget-title">
                <h3>Google Ads</h3>
            </div>
            <div class="widget-content">
                <img src="https://via.placeholder.com/300x250">
            </div>
        </div> -->
        <div class="price-filter sidebar-widget">
            <div class="widget-title">
                <h3>{{$language[182][session()->get('lang')]}}</h3>
            </div>
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                        <div class="friend" style="height: auto">
                            <!-- <img src="/assets/images/chat/pic1.jpg"> -->
                            @if($user->profile_image != '')
                            <img style="height:40px;" src="/upload_profile_image/{{$user->profile_image}}" alt="">
                            @else
                            <img src="/assets/images/icons/user-icon.png" alt="">
                            @endif
                            <p>
                                <strong class="translate">{{$user->first_name}} {{$user->last_name}}</strong>
                            </p>
                        </div>

                            @if(Auth::check())
                                @if($post_ad->customer_id != Auth::user()->id)
                                <button onclick="sendchat({{$post_ad->id}})" class="theme-btn-one" style="width: 100%;margin-top: 10px;">{{$language[183][session()->get('lang')]}}</button>
                                @else 
                                <button onclick="yourpost()" class="theme-btn-one" style="width: 100%;margin-top: 10px;">{{$language[183][session()->get('lang')]}}</button>
                                @endif
                            @else 
                            <button onclick="viewlogin({{$post_ad->id}})" class="theme-btn-one" style="width: 100%;margin-top: 10px;">{{$language[183][session()->get('lang')]}}</button>
                            @endif

                        <form class="message-seller-pop">
                            <textarea id="chat_message" name="chat_message" placeholder="{{$language[184][session()->get('lang')]}}"></textarea>

                            @if(Auth::check())
                                @if($post_ad->customer_id != Auth::user()->id)
                                @foreach($chat_option as $row)
                                <button onclick="sendchat1('{{$post_ad->id}}','{{$row->message}}')" type="button" class="translate theme-btn-one" style="width: 100%;background-color: #b85e83;font-size: 15px;margin-bottom: 20px;">{{$row->message}}</button>
                                @endforeach
                                <!-- <button onclick="sendchat1('{{$post_ad->id}}','Is the Price negotiable?')" type="button" class="theme-btn-one" style="width: 100%;background-color: #b85e83;font-size: 15px;margin-bottom: 20px;">Is the Price negotiable?</button>
                                <button onclick="sendchat1('{{$post_ad->id}}','Can i see more photos?')" type="button" class="theme-btn-one" style="width: 100%;background-color: #b85e83;font-size: 15px;margin-bottom: 20px;">Can i see more photos?</button> -->
                                @else 
                                @foreach($chat_option as $row)
                                <button onclick="yourpost()" type="button" class="translate theme-btn-one" style="width: 100%;background-color: #b85e83;font-size: 15px;margin-bottom: 20px;">{{$row->message}}</button>
                                @endforeach
                                <!-- <button onclick="yourpost()" type="button" class="theme-btn-one" style="width: 100%;background-color: #b85e83;font-size: 15px;margin-bottom: 20px;">Is the Price negotiable?</button>
                                <button onclick="yourpost()" type="button" class="theme-btn-one" style="width: 100%;background-color: #b85e83;font-size: 15px;margin-bottom: 20px;">Can i see more photos?</button> -->
                                @endif
                            @else 
                            @foreach($chat_option as $row)
                            <button onclick="viewlogin({{$post_ad->id}})" type="button" class="translate theme-btn-one" style="width: 100%;background-color: #b85e83;font-size: 15px;margin-bottom: 20px;">{{$row->message}}</button>
                            @endforeach
                            <!-- <button onclick="viewlogin({{$post_ad->id}})" type="button" class="theme-btn-one" style="width: 100%;background-color: #b85e83;font-size: 15px;margin-bottom: 20px;">Is the Price negotiable?</button>
                            <button onclick="viewlogin({{$post_ad->id}})" type="button" class="theme-btn-one" style="width: 100%;background-color: #b85e83;font-size: 15px;margin-bottom: 20px;">Can i see more photos?</button> -->
                            @endif
                        </form>


                    <div class="form-group">
                        <label class="offers-label">{{$language[185][session()->get('lang')]}}</label>
                        <div class="price-range">
                           <div class="row clearfix">
                              <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                 <input class="form-control" type="text" name="asking_price" id="asking_price" placeholder="{{$language[186][session()->get('lang')]}}">
                                 <input value="{{$post_ad->id}}" type="hidden" name="offer_post_id" id="offer_post_id">
                              </div>
                              <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                    @if(Auth::check())
                                        @if($post_ad->customer_id != Auth::user()->id)
                                        <button style="padding: 12px 5px !important;" onclick="SaveChatOffer()" type="button" class="theme-btn-one" style="width: 100%; background-color: #091a3a; font-size: 15px;">{{$language[187][session()->get('lang')]}}</button>
                                        @else 
                                        <button style="padding: 12px 5px !important;" onclick="yourpost()" type="button" class="theme-btn-one" style="width: 100%; background-color: #091a3a; font-size: 15px;">{{$language[187][session()->get('lang')]}}</button>
                                        @endif
                                    @else 
                                    <button style="padding: 12px 5px !important;" onclick="viewlogin({{$post_ad->id}})" type="button" class="theme-btn-one" style="width: 100%; background-color: #091a3a; font-size: 15px;">{{$language[187][session()->get('lang')]}}</button>
                                    @endif
                              </div>
                           </div>
                        </div>
                    </div>

                                        </div>
                                    </div>
                            </div>

                            <!-- <div class="tags-widget sidebar-widget">
                                <div class="widget-title">
                                    <h3>Google Ads</h3>
                                </div>
                                <div class="widget-content">
                                    <img src="https://via.placeholder.com/310x550">
                                </div>
                            </div>  -->

                            <div class="sidebar-search sidebar-widget">
                                <div class="widget-title">
                                    <h3>{{$language[188][session()->get('lang')]}}</h3>
                                </div>
                                <div class="widget-content">
                                    <form action="#" method="post" class="search-form">
                                        <div class="form-group">
                                            <input type="search" name="title" id="title" placeholder="{{$language[169][session()->get('lang')]}}" required="">
                                            <button onclick="SearchPost()" type="button"><i class="icon-2"></i></button>
                                        </div>
                                        <div class="form-group">
                                            <i class="icon-3"></i>
                                            <select name="city" id="city" class="wide">
                                                <option value="">{{$language[170][session()->get('lang')]}}</option>
                                                @foreach($city as $row)
                                                <option value="{{$row->id}}">{{$row->city}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <i class="icon-4"></i>
                                            <select name="category" id="category" class="wide">
                                                <option value="">{{$language[171][session()->get('lang')]}}</option>
                                                @foreach($category_all as $row)
                                                <option value="{{$row->id}}">{{$row->category}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <button onclick="SearchPost()" style="background-color: #789FD3 !important;width:100% !important;" id="search" type="button" class="theme-btn-one">{{$language[172][session()->get('lang')]}}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="sidebar-category sidebar-widget">
                                <div class="widget-title">
                                    <h3>{{$language[173][session()->get('lang')]}}</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="category-list">
                                        @foreach($category_all as $row)
                                        <li><a class="translate" href="/search-post/0/{{$row->id}}/0/0/0/0">{{$row->category}}</a></li>
                                        @endforeach                                    
                                    </ul>
                                </div>
                            </div>
                            <div class="tags-widget sidebar-widget">
                                <div class="widget-title">
                                    <h3>Google Ads</h3>
                                </div>
                                <div class="widget-content">
                                    <img src="https://via.placeholder.com/310x200">
                                </div>
                            </div> 
                            <!-- <div class="price-filter sidebar-widget">
                                <div class="widget-title">
                                    <h3>Pricing range</h3>
                                </div>
                                <div class="price-range">
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                            <input type="text" name="min_price" placeholder="Min">
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                            <input type="text" name="max_price" placeholder="Max">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <button type="submit" class="theme-btn-one">Apply price</button>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <!-- <div class="price-filter sidebar-widget">
                                <div class="widget-title">
                                    <h3>Contact Seller</h3>
                                </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <button type="submit" class="theme-btn-one" style="width: 100%" data-toggle="modal" data-target="#messageseller">Message To Seller</button>
                                        </div>
                                    </div>
                            </div> -->

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- browse-add-details end -->

<!-- popup for Message to seller -->

<div class="modal fade" id="messageseller" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>


            <div class="friend">
              <img src="/assets/images/chat/pic1.jpg">
                <p>
                  <strong>Miro Badev</strong>
                  <span>mirobadev@gmail.com</span>
                </p>
            </div>


            <div class="col-lg-12 col-md-12 col-sm-12 column">
                <form class="message-seller-pop">
                    <div class="form-group">
                        <label>Message</label>
                        <textarea name="message" placeholder="Write a custom Message"></textarea>
                        <div style="height: 20px;"></div>
                        <button type="submit" class="theme-btn-one" style="width: 100%" data-toggle="modal" data-target="#messageseller">Message To Seller</button>
                    </div> 


                    <div class="form-group">
                        <label>Offer Price</label>
                        <div class="price-range">
                           <div class="row clearfix">
                              <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                 <input type="text" name="min_price" placeholder="Offer Price">
                              </div>
                              <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                 <button type="submit" class="theme-btn-one" style="width: 100%; background-color: #091a3a;">Make Offer</button>
                              </div>
                           </div>
                        </div>
                    </div>                   
                </form>
            </div>


      </div>
    </div>
  </div>
</div>

<div id="reportmodal" class="modal fade" role="dialog">
  <div style="max-width:600px !important;" class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="translate modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Report Post</h4>
      </div>
      <div class="modal-body">
        <div class="col-lg-12 col-md-12 col-sm-12 column">
            <form method="POST" id="report_form" class="message-seller-pop">
            {{csrf_field()}}
            @if(!empty($report_post))
                <input value="{{$report_post->id}}" type="hidden" name="report_id" id="report_id">
                <input value="{{$post_ad->id}}" type="hidden" name="report_post_id" id="report_post_id">
                <div class="form-group">
                    <label>Report Category</label><br>
                    <select name="report_category" id="report_category" class="wide">
                        <!-- <option value="">Report Category</option> -->
                        @foreach($report_category as $row)
                            @if($row->id == $report_post->category)
                            <option selected value="{{$row->id}}">{{$row->category}}</option>
                            @else 
                            <option value="{{$row->id}}">{{$row->category}}</option>
                            @endif
                        @endforeach
                    </select>
                </div> 
                <div class="form-group">
                    <label>Reason</label><br>
                    <textarea name="report_reason" id="report_reason">{{$report_post->description}}</textarea>                     
                </div> 
            @else 
                <input type="hidden" name="report_id" id="report_id">
                <input value="{{$post_ad->id}}" type="hidden" name="report_post_id" id="report_post_id">
                <div class="form-group">
                    <label>Report Category</label><br>
                    <select name="report_category" id="report_category" class="wide">
                        <option value="">Report Category</option>
                        @foreach($report_category as $row)
                        <option value="{{$row->id}}">{{$row->category}}</option>
                        @endforeach
                    </select>
                </div> 
                <div class="form-group">
                    <label>Reason</label><br>
                    <textarea name="report_reason" id="report_reason"></textarea>                     
                </div>
            @endif
            </form>
        </div>
      </div>
      <div style="display:block;" class="modal-footer">
        <button id="savereport" onclick="SaveReport()" style="float:right;" type="button" class="theme-btn-one">Report</button>
        <button id="modal-close-btn" style="float:left;" type="button" class="theme-btn-one" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


@if(count($related_ad) > 0)
<!-- related-ads -->
<section class="related-ads">
    <div class="auto-container">
        <div class="sec-title">
            <span class="translate">Related Ads</span>
            <h2 class="translate">Related Ads</h2>
        </div>
        <div class="row">
            @foreach($related_ad as $row)
            <div class="translate col-md-3 feature-block-one wow fadeInDown animated animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                <div class="inner-box">
                <a href="/view-post/{{$row->id}}">
                    <div class="image-box">
                        <figure class="image"><img style="height:200px;" src="/upload_image/{{$row->image}}" alt=""></figure>
                        
                        @if($row->post_type == '1')
                        <div class="shape"></div>
                        <div class="feature">Featured</div>
                        @endif
                        <!-- <div class="icon">
                            <div class="icon-shape"></div>
                            <i class="icon-16"></i>
                        </div> -->
                    </div>
                    <div class="lower-content">
                        <div class="category"><i class="fas fa-tags"></i><a href="/search-post/0/{{$row->category}}/0/0/0/0">{{ \App\Http\Controllers\HomeController::viewcategoryname($row->category) }}</a></div>
                        <h3><a href="/view-post/{{$row->id}}">{{$row->title}}</a></h3>
                        <!-- <ul class="rating clearfix">
                            <li><i class="icon-17"></i></li>
                            <li><i class="icon-17"></i></li>
                            <li><i class="icon-17"></i></li>
                            <li><i class="icon-17"></i></li>
                            <li><i class="icon-17"></i></li>
                            <li><a href="index.html">(25)</a></li>
                        </ul> -->
                        <ul class="info clearfix">
                            <li><i class="far fa-clock"></i>{{ \App\Http\Controllers\HomeController::humanreadtime($row->created_at) }}</li>
                            <li style="text-transform:capitalize !important;text-overflow: ellipsis;overflow: hidden;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;"><i class="fas fa-map-marker-alt"></i>{{ \App\Http\Controllers\HomeController::viewcityname($row->area,$row->city) }}</li>
                        </ul>
                        <div class="lower-box">
                            <h5><span>Price:</span>AED {{$row->price}}</h5>
                            <ul class="react-box">
                                <!-- <li><a href="javascript:void(0)"><i class="icon-22"></i></a></li> -->
                                <li>
                                @if(Auth::check())
                                {{ \App\Http\Controllers\LoginController::viewfavourite1($row->id) }}
                                @else
                                <a href="/login"><i class="icon-22"></i></a>
                                @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </a>
                </div>
            </div>
            @endforeach

            <!-- <div class="text-center" style="width: 100%">
                <div class="more-btn"><a href="javascript:void(0)" class="theme-btn-one">View More Related</a></div>
            </div> -->

        </div>
    </div>
</section>
<!-- related-ads end -->
@endif


@endsection
@section('js')
<script src="/slider/js/gallery.js"></script>
<!-- <script src="/assets/js/bxslider.js"></script>
<script src="/assets/js/xzoom.min.js"></script>
<script src="/assets/js/xzoom_setup.js"></script> -->
<script type="text/javascript">
function SearchPost(){
    var title = $('#title').val();
    var category = $('#category').val();
    var city = $('#city').val();
    var title1;
    var category1;
    var city1;

    if(title!=""){
        title1 = title;
    }else{
        title1 = '0';
    }
    if(category!=""){
        category1 = category;
    }else{
        category1 = '0';
    }
    if(city!=""){
        city1 = city;
    }else{
        city1 = '0';
    }
    window.location.href = "/search-post/"+title1+'/'+category1+'/0'+'/'+city1+'/0/0';
}

function viewlogin(id){
    window.location.href="/view-login-post/"+id;
}
function SaveChatOffer(){
    $(".text-danger").remove();
    $('.form-group').removeClass('has-error').removeClass('has-success');
    $.ajax({
        url : '/customer/save-offer',
        type: "POST",
        data: {'asking_price':$('#asking_price').val(),'offer_post_id':$('#offer_post_id').val(),'_token': $('input[name=_token]').val()},
        dataType: "JSON",
        success: function(data)
        {        
            Swal.fire({
                title: "Offer Send Successfully",
                icon: "success",
            }).then(function() {
                //window.location.href="/customer/chat"; 
                location.reload();
            });   
        },
        error: function (data, errorThrown) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
                //toastr.error(obj[0]);
                $("#"+i).after('<p class="text-danger">'+obj[0]+'</p>');
                $('#'+i).closest('.form-group').addClass('has-error');
            });
        }
    });
}

function sendchat(id){
    var message = $('#chat_message').val();
    if(message == ''){
        message = 'Hi Sir/Mam';
    }
    $.ajax({
        url : '/customer/save-chat-view/'+id+'/'+message,
        type: "get",
        //dataType: "JSON",
        success: function(data)
        {                            
            Swal.fire({
                text: 'Successfully Send',
                icon: "success",
            }).then(function() {
                window.location.href="/customer/chat";
            });
        },error: function (data) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
                toastr.error(obj[0]);
            });
        }
    });
}
function sendchat1(id,message){
    $.ajax({
        url : '/customer/save-chat-view/'+id+'/'+message,
        type: "get",
        //dataType: "JSON",
        success: function(data)
        {                            
            Swal.fire({
                text: 'Successfully Send',
                icon: "success",
            }).then(function() {
                window.location.href="/customer/chat";
            });
        },error: function (data) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
                toastr.error(obj[0]);
            });
        }
    });
}

function SaveFavourite(id){
    $.ajax({
        url : '/customer/save-favourite-post/'+id,
        type: "get",
        //dataType: "JSON",
        success: function(data)
        {                
            Swal.fire({
                text: 'Successfully Saved',
                icon: "success",
            }).then(function() {
                //location.reload();
                $('.favourite-header'+id).load(location.href+' .favourite-header'+id);
                $('.favourite-class'+id).load(location.href+' .favourite-class'+id);
            });
        },error: function (data) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
                toastr.error(obj[0]);
            });
        }
    });
}

function DeleteFavourite(id){
    $.ajax({
        url : '/customer/delete-favourite-post/'+id,
        type: "get",
        //dataType: "JSON",
        success: function(data)
        {                
            Swal.fire({
                text: 'Successfully Removed',
                icon: "success",
            }).then(function() {
                //location.reload();
                $('.favourite-header'+id).load(location.href+' .favourite-header'+id);
                $('.favourite-class'+id).load(location.href+' .favourite-class'+id);
            });
        },error: function (data) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
                toastr.error(obj[0]);
            });
        }
    });
}

function SaveReview(){
    $(".text-danger").remove();
    $('.form-group').removeClass('has-error').removeClass('has-success');
    $("#savereview").attr("disabled", true);
    var formData = new FormData($('#review_form')[0]);
    $.ajax({
        url : '/save-review',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {                
            Swal.fire({
                text: 'Successfully Save',
                icon: 'success',
                }).then((result) => {
                if (result.isConfirmed) {
                    console.log(data);
                    $("#review_form")[0].reset();
                    location.reload();
                    $("#savereview").attr("disabled", false);
                }
            })  
        },error: function (data) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
                $('input[name='+i+']').after('<p class="text-danger">'+obj[0]+'</p>');
                $('input[name='+i+']').closest('.form-group').addClass('has-error');
            });
            $("#savereview").attr("disabled", false);
        }
    });
}

function UpdateReview(){
    $(".text-danger").remove();
    $('.form-group').removeClass('has-error').removeClass('has-success');
    $("#savereview").attr("disabled", true);
    var formData = new FormData($('#review_form')[0]);
    $.ajax({
        url : '/update-review',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {                
            Swal.fire({
                text: 'Successfully Update',
                icon: 'success',
                }).then((result) => {
                if (result.isConfirmed) {
                    console.log(data);
                    $("#review_form")[0].reset();
                    location.reload();
                    $("#savereview").attr("disabled", false);
                }
            })  
        },error: function (data) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
                $('input[name='+i+']').after('<p class="text-danger">'+obj[0]+'</p>');
                $('input[name='+i+']').closest('.form-group').addClass('has-error');
            });
            $("#savereview").attr("disabled", false);
        }
    });
}

function SaveReport(){
    $("#savereport").attr("disabled", true);
    var formData = new FormData($('#report_form')[0]);
    $.ajax({
        url : '/save-report',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {           
            $('#modal-close-btn').click();     
            Swal.fire({
                text: 'Successfully Save',
                icon: 'success',
                }).then((result) => {
                if (result.isConfirmed) {
                    console.log(data);
                    $("#report_form")[0].reset();
                    location.reload();
                    $("#savereport").attr("disabled", false);
                }
            })  
        },error: function (data) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
                toastr.error(obj[0]);
            });
            $("#savereport").attr("disabled", false);
        }
    });
}

function yourpost(){
    Swal.fire({
        text: 'Add posted by same user can’t make an offer/chat/report',
        icon: "success",
    }).then(function() {
        //location.reload();
    });
}

var city = '<?php echo $post_ad->city;  ?>';
var area = '<?php echo $post_ad->area;  ?>';
$.ajax({
    url : '/get-city-name/'+city+'/'+area,
    type: "GET",
    success: function(data)
    {
        $('#map').attr("src", "http://maps.google.com/maps?q="+data.city + data.area+"&z=16&output=embed");
    }
});
</script>
@endsection