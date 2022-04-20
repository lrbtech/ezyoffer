@extends('website.layouts')
@section('css')
<style>
@media only screen and (max-width: 1024px) {
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
<!-- banner-section -->
<section class="banner-section centred" style="background-image: url(/assets/images/banner/banner-new.jpg);">
    <div class="overlay"></div>
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-10 col-md-12 col-sm-12 offset-lg-1 content-column">
                <div class="content-box">
                    <div class="hero-content-wrap">
                        <div class="hero-content">
                            <style>
                                /* .typed-cursor{
                                    padding-left:15px !important;
                                } */
                            </style>
                            <h1>
                                {{$language[155][session()->get('lang')]}}&nbsp;
                                <span class="text-slider-items">
                                {{$language[156][session()->get('lang')]}} , 
                                {{$language[157][session()->get('lang')]}} , 
                                {{$language[158][session()->get('lang')]}} , 
                                </span>
                            </h1>
                            <!-- <strong style="left:15px !important;" class="text-slider"></strong> -->
                            <strong class="text-slider"></strong>
                        </div>
                    </div>
                    <div class="form-inner">
                        <form method="get" id="form">
                            <div class="input-inner clearfix">
                                <div class="form-group">
                                    <i onclick="SearchPost()" class="icon-2"></i>
                                    <input name="title" id="title" autocomplete="off" type="search" placeholder="{{$language[169][session()->get('lang')]}}" required="">
                                </div>
                                <div class="form-group">
                                    <i class="icon-3"></i>
                                    <select name="city" id="city" class="wide">
                                        <option value="">{{$language[170][session()->get('lang')]}}</option>
                                        @foreach($city as $row)
                                        <option class="translate" value="{{$row->id}}">{{$row->city}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <i class="icon-4"></i>
                                    <select name="category" id="category" class="wide">
                                    <option value="">{{$language[171][session()->get('lang')]}}</option>
                                    @foreach($category_all as $row)
                                    <option class="translate" value="{{$row->id}}">{{$row->category}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="btn-box">
                                    <button onclick="SearchPost()" id="search" type="button" class="theme-btn-one"><i class="icon-2"></i>{{$language[172][session()->get('lang')]}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</section>
<!-- banner-section end -->

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

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div style="margin-bottom:-30px;" class="sec-title">
                    <span>{{$language[159][session()->get('lang')]}}</span>
                    <h2>{{$language[160][session()->get('lang')]}}</h2>
                </div>
            </div>
            <div class="translate col-md-12">
                {{ csrf_field() }}
                <div id="story_data" class="row featured-story">
                    @if(Auth::check())
                    <div style="margin: 30px 0;" class="col-md-6 col-lg-3 col-sm-6 col-xs-6 col-6">
                        <div class="work add-stroy">
                            <div class="img d-flex align-items-end justify-content-center" style="background-color: #091a3a">
                                <a class="create-story" href="/customer/new-post-ads">
                                    <div class="fas fa-plus"></div>
                                    <h4 class="story-line">{{$language[161][session()->get('lang')]}}</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    @else 
                    <div style="margin: 30px 0;" class="col-md-6 col-lg-3 col-sm-6 col-xs-6 col-6">
                        <div class="work add-stroy">
                            <div class="img d-flex align-items-end justify-content-center" style="background-color: #091a3a">
                                <a class="create-story" href="/login">
                                    <div class="fas fa-plus"></div>
                                    <h4 class="story-line">{{$language[161][session()->get('lang')]}}</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif
                    <?php //$x=0; ?>
                    @foreach($live_story as $row)
                    <?php //if($x < 3) { ?>
                    <div style="margin: 30px 0;" class="col-md-6 col-lg-3 col-sm-6 col-xs-6 col-6">
                        <div class="work" onclick="viewstory({{$row->id}})">
                            <div class="img d-flex align-items-end justify-content-center" style="background-image: url(/upload_image/{{$row->image}});">
                                <div class="profile-story">
                                    @if($row->profile_image != '')
                                    <img style="height:40px;" src="/upload_profile_image/{{$row->profile_image}}" alt="">
                                    @else
                                    <img src="/assets/images/icons/user-icon.png" alt="">
                                    @endif
                                    <h4>{{$row->first_name}} {{$row->last_name}}</h4>
                                </div>
                                <div class="text w-100">
                                    <span class="cat">{{ \App\Http\Controllers\HomeController::viewcategoryname($row->category) }}</span>
                                    <h3><a href="/view-post/{{$row->id}}">{{$row->title}}</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php //}else{?>
                    <!--
                    <div style="margin: 30px 0;" class="col-md-3 hidden-my-mobile">
                        <div class="work" onclick="viewstory({{$row->id}})">
                            <div class="img d-flex align-items-end justify-content-center" style="background-image: url(/upload_image/{{$row->image}});">
                                <div class="profile-story">
                                    @if($row->profile_image != '')
                                    <img style="height:40px;" src="/upload_profile_image/{{$row->profile_image}}" alt="">
                                    @else
                                    <img src="/assets/images/icons/user-icon.png" alt="">
                                    @endif
                                    <h4>{{$row->first_name}} {{$row->last_name}}</h4>
                                </div>
                                <div class="text w-100">
                                    <span class="cat">{{ \App\Http\Controllers\HomeController::viewcategoryname($row->category) }}</span>
                                    <h3><a href="/view-post/{{$row->id}}">{{$row->title}}</a></h3>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <?php //} ?>
                    <?php //$x++; ?> 
                    @endforeach
                    
                </div>


                <!-- <div class="row featured-story hidden-my-mobile">
                    <div class="col-md-3">
                        <div class="work" data-toggle="modal" data-target="#exampleModal">
                            <div class="img d-flex align-items-end justify-content-center" style="background-image: url(/assets/images/story/work-1.jpg);">
                                <div class="profile-story">
                                    <img src="/assets/images/icons/user-icon.png">
                                    <h4>Naveen</h4>
                                </div>
                                <div class="text w-100">
                                    <span class="cat">Furnitures</span>
                                    <h3><a href="#">House Hold Products Purchase Online Imediate</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="work" data-toggle="modal" data-target="#exampleModal">
                            <div class="img d-flex align-items-end justify-content-center" style="background-image: url(/assets/images/story/work-2.jpg);">
                                <div class="profile-story">
                                    <img src="/assets/images/icons/user-icon.png">
                                    <h4>Naveen</h4>
                                </div>
                                <div class="text w-100">
                                    <span class="cat">Furnitures</span>
                                    <h3><a href="#">House Hold Products Purchase Online</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="work" data-toggle="modal" data-target="#exampleModal">
                            <div class="img d-flex align-items-end justify-content-center" style="background-image: url(/assets/images/story/work-3.jpg);">
                                <div class="profile-story">
                                    <img src="/assets/images/icons/user-icon.png">
                                    <h4>Naveen</h4>
                                </div>                                        
                                <div class="text w-100">
                                    <span class="cat">Furnitures</span>
                                    <h3><a href="#">House Hold Products Purchase Online</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="work" data-toggle="modal" data-target="#exampleModal">
                            <div class="img d-flex align-items-end justify-content-center" style="background-image: url(/assets/images/story/work-4.jpg);">
                                <div class="profile-story">
                                    <img src="/assets/images/icons/user-icon.png">
                                    <h4>Naveen</h4>
                                </div>                                        
                                <div class="text w-100">
                                    <span class="cat">Furnitures</span>
                                    <h3><a href="#">House Hold Products Purchase Online</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="text-center" style="width: 100%">
                    <div class="more-btn">
                        <a href="/search-post/0/0/0/0/0/0" class="theme-btn-one">{{$language[162][session()->get('lang')]}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- feature-section -->
<section class="feature-section sec-pad">
    <div class="pattern-layer" style="background-image: url(/assets/images/shape/shape-3.png);"></div>
    <div class="auto-container">
        <div class="sec-title centred">
            <span>{{$language[163][session()->get('lang')]}}</span>
            <h2>{{$language[164][session()->get('lang')]}}</h2>
        </div>
{{ csrf_field() }}        
<div id="trending_today_data" class="row">

    @foreach($trending_today as $row)
    <div class="translate col-md-6 col-lg-3 col-sm-6 col-xs-6 col-6 feature-block-one wow fadeInDown animated animated" data-wow-delay="300ms" data-wow-duration="1500ms">
        <div class="inner-box">
        <a href="/view-post/{{$row->id}}">
            <div class="image-box img-box-design">
                <figure class="image"><img style="height:200px;" src="/upload_image/{{$row->image}}" alt=""></figure>
                
                @if($row->post_type == '1')
                <div class="shape"></div>
                <div class="feature notranslate">Trending</div>
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
                        <li class="{{$row->id}}">
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

            <div class="text-center" style="width: 100%">
                <div class="more-btn">
                    <a href="/search-post/0/0/0/0/0/0" class="theme-btn-one">{{$language[165][session()->get('lang')]}}</a>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- feature-section end -->


<!-- feature-style-two -->
<section class="feature-style-two">
    <div class="auto-container">
        <div style="margin-top:-50px !important;" class="sec-title centred">
            <span>{{$language[166][session()->get('lang')]}}</span>
            <h2>{{$language[167][session()->get('lang')]}}</h2>
        </div>
        <div class="row">
            @foreach($all_user as $row)
            <div class="translate col-md-6 col-lg-4 col-sm-6 col-xs-6 col-6 stores-block">
                <div class="stores-block-one">
                    <div style="padding-bottom:60px;" class="inner-box">
                        <figure class="icon-box">
                            <!-- <img src="/assets/images/icons/stores-1.png" alt=""> -->
                            @if($row->profile_image != '')
                            <img src="/upload_profile_image/{{$row->profile_image}}" alt="">
                            @else
                            <img src="/assets/images/icons/user-icon.png" alt="">
                            @endif
                        </figure>
                        <h4>
                            <a style="text-transform:capitalize !important;text-overflow: ellipsis;overflow: hidden;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;" href="/view-user/{{$row->id}}">{{$row->first_name}} {{$row->last_name}} {{$row->first_name}} {{$row->last_name}}</a>
                        </h4>
                        <!-- <ul class="rating clearfix">
                            <li><i class="icon-17"></i></li>
                            <li><i class="icon-17"></i></li>
                            <li><i class="icon-17"></i></li>
                            <li><i class="icon-17"></i></li>
                            <li><i class="icon-17"></i></li>
                        </ul> -->
                    </div>
                </div>
            </div>
            @endforeach
            <div class="text-center" style="width: 100%">
                <div class="more-btn"><a href="/view-stores" class="theme-btn-one">{{$language[168][session()->get('lang')]}}</a></div>
            </div>
        </div>
        <div style="height: 30px;"></div>
        <div class="row clearfix">
            <div class="col-md-12">
                @if($google_ads->image_728_90 != '')
                <center><img src="/ads_image/{{$google_ads->image_728_90}}"></center>
                @else
                <center><img src="https://via.placeholder.com/728x90"></center>  
                @endif
            </div>
        </div>

    </div>
</section>
<!-- feature-style-two end -->


<!-- Popup -->
<!-- Modal -->
<div class="storypoup modal fade" id="storymodal" tabindex="-1" role="dialog" aria-labelledby="storymodalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>      
            <div id="story_view" class="card">
               {{--<div class="container-fliud">
                  <div class="wrapper row">
                     <div class="previewss col-md-4">
                        <div class="preview-pic tab-content">
                           <div class="tab-pane active" id="pic-1"><a href="browse-ads-details.html"><img src="/assets/images/story/work-1.jpg" /></a></div>
                           <div class="tab-pane" id="pic-2"><a href="browse-ads-details.html"><img src="/assets/images/story/work-2.jpg" /></a></div>
                           <div class="tab-pane" id="pic-3"><a href="browse-ads-details.html"><img src="/assets/images/story/work-3.jpg" /></a></div>
                        
                        <ul class="preview-thumbnail nav nav-tabs">
                           <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="/assets/images/story/work-1.jpg" /></a></li>
                           <li><a data-target="#pic-2" data-toggle="tab"><img src="/assets/images/story/work-2.jpg" /></a></li>
                           <li><a data-target="#pic-3" data-toggle="tab"><img src="/assets/images/story/work-3.jpg" /></a></li>
                        </ul>
                        </div>
                     </div>
                     <div class="details-view col-md-8">
                        <h3 class="product-story-title"><a href="browse-ads-details.html">House Hold Products Purchase Online</a></h3>
                        <div class="rating">
                           <div class="stars">
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                           </div>
                           <span class="review-no">41 reviews</span>
                        </div>
                        <p class="product-story-description">Suspendisse quos? Tempus cras iure temporibus? Eu laudantium cubilia sem sem! Repudiandae et! Massa senectus enim minim sociosqu delectus posuere.</p>
                        <h4 class="price-story">Price: <span>AED 180</span></h4>
                        <div class="story-details-content-list">
                           <h5 class="price-story">Features:</h5>
                           <ul class="list-item-story clearfix">
                              <li>256GB PCI flash storage</li>
                              <li>2.7 GHz dual-core Intel Core i5 processor</li>
                              <li>Turbo Boost up to 3.1GHz</li>
                              <li>Intel Iris Graphics 6100</li>
                              <li>8GB memory (up from 4GB in 2013 model)</li>
                              <li>1 Year international warranty</li>
                           </ul>
                        </div>
                        <div class="action-now">
                           <div class="cat-story-list">
                              <span class="cat-tits">Categories: </span>
                              <span class="cat-lists"><a href="#">Furnitures</a></span>
                              <span class="cat-lists"><a href="#">Home</a></span>
                              <span class="cat-lists"><a href="#">Goods</a></span>
                           </div>
                        </div>
                        <div class="btn-box">
                              <a href="browse-ads-details.html" class="theme-btn-one" style="margin-top: 20px;"><i class="icon-1"></i>More Details</a>
                           </div>
                        <div class="profile-story-details">
                           <img src="/assets/images/icons/user-icon.png">
                           <h4>Naveen</h4>
                        </div>
                        <div class="popup-navigation">
                           <div class="pop-next pop-nav"><i class="fas fa-chevron-left"></i></div>
                           <div class="pop-prev pop-nav"><i class="fas fa-chevron-right"></i></div>
                        </div>
                     </div>
                  </div>
               </div>--}}
            </div>
         </div>
      </div>
   </div>
</div>
<!-- End Popup -->


@endsection
@section('js')
<script type="text/javascript">
// $(document).ready(function(){
 
// var _token = $('input[name="_token"]').val();

//  story_data('', _token);

//  function story_data(id="", _token)
//  {
//   $.ajax({
//    url:"/story-load-data",
//    method:"POST",
//    data:{id:id, _token:_token},
//    success:function(data)
//    {
//     $('#story_load_more_button').remove();
//     $('#story_data').append(data);
//    }
//   })
//  }

//  trending_today_data('', _token);

//  function trending_today_data(id="", _token)
//  {
//   $.ajax({
//    url:"/trending-today-load-data",
//    method:"POST",
//    data:{id:id, _token:_token},
//    success:function(data)
//    {
//     $('#trending_today_load_more_button').remove();
//     $('#trending_today_data').append(data);
//    }
//   })
//  }

//  $(document).on('click', '#trending_today_load_more_button', function(){
//   var id = $(this).data('id');
//   $('#trending_today_load_more_button').html('<b>Loading...</b>');
//   trending_today_data(id, _token);
//  });

//  $(document).on('click', '#story_load_more_button', function(){
//   var id = $(this).data('id');
//   $('#story_load_more_button').html('<b>Loading...</b>');
//   story_data(id, _token);
//  });

// });

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
    window.location.href = "/search-post/"+title1+'/'+category1+'/0'+'/'+city1+'/0'+'/0';
}

function viewstory(id)
{
    $('#storymodal').modal('hide');
    $.ajax({
        url : '/get-full-story/'+id,
        type: "GET",
        success: function(data)
        {
            $('#storymodal').modal('show');
            $('#story_view').html(data);
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
                $('.'+id).load(location.href+' .'+id);
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
                $('.'+id).load(location.href+' .'+id);
            });
        },error: function (data) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
                toastr.error(obj[0]);
            });
        }
    });
}
</script>
@endsection
