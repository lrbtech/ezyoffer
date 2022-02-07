@extends('website.layouts')
@section('css')
 
@endsection
@section('section')
        <!-- Page Title -->
        <section class="page-title" style="background-image: url(/assets/images/background/page-title.jpg);">
            <div class="auto-container">
                <div class="content-box centred">
                    <div class="title">
                        <h1>{{$language[191][session()->get('lang')]}}</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a class="translate" href="/">Home</a></li>
                        <li>{{$language[191][session()->get('lang')]}}</li>
                    </ul>
                </div>
                <div class="search-box-inner">
                    <form method="get" id="form">
                        <div class="input-inner clearfix">
                            <div class="form-group">
                                <i class="icon-2"></i>
                                <input name="title" id="title" autocomplete="off" type="search" placeholder="{{$language[169][session()->get('lang')]}}" required="">
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
                            <div class="btn-box">
                                <button id="search" type="button" class="theme-btn-one"><i class="icon-2"></i>{{$language[172][session()->get('lang')]}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- End Page Title -->
        <!-- stores-details -->
        <section class="category-details stores-details bg-color-2">
        <div style="margin-top:-90px;margin-bottom:30px;" class="col-md-12">
        <center><img src="https://via.placeholder.com/970x250"></center>
        </div>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="default-sidebar category-sidebar">
                            <div class="ads-agency sidebar-widget">
                                <div class="upper-box">
                                    <figure class="icon-box">
                                        <!-- <img src="/assets/images/icons/stores-4.png" alt=""> -->
                                        @if($user->profile_image != '')
                                        <img src="/upload_profile_image/{{$user->profile_image}}" alt="">
                                        @else
                                        <img src="/assets/images/icons/user-icon.png" alt="">
                                        @endif
                                    </figure>
                                    <h4 class="translate">{{$user->first_name}} {{$user->last_name}}</h4>
                                    <!-- <ul class="rating clearfix">
                                        <li><i class="icon-17"></i></li>
                                        <li><i class="icon-17"></i></li>
                                        <li><i class="icon-17"></i></li>
                                        <li><i class="icon-17"></i></li>
                                        <li><i class="icon-17"></i></li>
                                    </ul> -->
                                </div>
                                <div class="text">
                                    <!-- <p>Lorem ipsum dolor sit amet consectur adipisicing sed do eiusmod tempor incididunt labore.</p> -->
                                    <ul class="info clearfix">
                                        @if($user->address != '')
                                        <li><i class="fas fa-map-marker-alt"></i><span>{{$language[192][session()->get('lang')]}}:</span> {{$user->address}}</li>
                                        @endif
                                        <li><i class="far fa-clock"></i><span>{{$language[193][session()->get('lang')]}}:</span> {{ \App\Http\Controllers\HomeController::humanreadtime($user->created_at) }}</li>
                                    </ul>
                                    <!-- <div class="phone-box">
                                        <p>Click to reval phone number</p>
                                        <a href="tel:5723379XXX"><i class="fas fa-phone"></i> 572-337-9XXX</a>
                                    </div> -->
                                    <div class="phone-box">
                                        <p>{{$language[194][session()->get('lang')]}}</p>
                                        <a href="tel:{{$user->mobile}}"><i class="fas fa-phone"></i> {{$user->mobile}}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="about-store sidebar-widget">
                                <div class="content-box">
                                    <h3>{{$language[195][session()->get('lang')]}}</h3>
                                    <p class="translate">{{$user->description}}.</p>
                                    <!-- <ul class="social-links clearfix">
                                        <li><a href="stores-details.html"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="stores-details.html"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="stores-details.html"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="stores-details.html"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="stores-details.html"><i class="fab fa-google-plus-g"></i></a></li>
                                    </ul> -->
                                </div>
                            </div>
                            @if($user->city != '' && $user->area != '')
                            <div class="map-widget sidebar-widget">
                                <div class="map-content">
                                    <div class="contact-map">
                                        <iframe id="map" src=""></iframe>
                                    </div>
                                    @if($user->address != '')
                                    <p><i class="fas fa-map-marker-alt"></i><span>{{$language[192][session()->get('lang')]}}:</span> {{$user->address}}</p>
                                    @endif
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="translate col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="category-details-content">
                            <div class="item-shorting clearfix">
                                <div class="text pull-left">
                                    <p>Showing {{ $post_ads->firstItem() }} - {{ $post_ads->lastItem() }} of {{$post_ads->total()}} Listings</p>
                                </div>
                                <div class="right-column pull-right clearfix">
                                    <!-- <div class="select-box">
                                        <select class="wide">
                                            <option data-display="Sort by: Default">Sort by: Default</option>
                                            <option value="1">Default Sort 01</option>
                                            <option value="2">Default Sort 02</option>
                                            <option value="3">Default Sort 03</option>
                                            <option value="4">Default Sort 04</option>
                                        </select>
                                    </div> -->
                                    <div class="menu-box">
                                        <button class="grid-view"><i class="icon-30"></i></button>
                                        <button class="list-view on"><i class="icon-31"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="category-block wrapper browse-add list">
                                <div class="list-item feature-style-three pd-0">
                                    @foreach($post_ads as $row)
                                    <div class="feature-block-one">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <figure class="image"><img style="width:200px;height:220px;" src="/upload_image/{{$row->image}}" alt=""></figure>
                                                @if($row->post_type == '1')
                                                <div class="feature-2">Featured</div>
                                                @endif
                                            </div>
                                            <div class="lower-content">
                                                <div class="category"><i class="fas fa-tags"></i><a href="/search-post/0/{{$row->category}}/0/0/0/0">{{ \App\Http\Controllers\HomeController::viewcategoryname($row->category) }}</a></div>
                                                <h4><a href="/view-post/{{$row->id}}">{{$row->title}}</a></h4>
                                                <!-- <ul class="rating clearfix">
                                                    <li><i class="icon-17"></i></li>
                                                    <li><i class="icon-17"></i></li>
                                                    <li><i class="icon-17"></i></li>
                                                    <li><i class="icon-17"></i></li>
                                                    <li><i class="icon-17"></i></li>
                                                    <li><a href="index.html">(32)</a></li>
                                                </ul> -->
                                                <ul class="info clearfix">
                                                    <li><i class="far fa-clock"></i>{{ \App\Http\Controllers\HomeController::humanreadtime($row->created_at) }}</li>
                                                    <li style="text-transform:capitalize !important;"><i class="fas fa-map-marker-alt"></i>{{ \App\Http\Controllers\HomeController::viewcityname($row->area,$row->city) }}</li>
                                                </ul>
                                                <div class="lower-box">
                                                    <h5><span>Price:</span>AED {{$row->price}}</h5>
                                                    <ul class="react-box">
                                                    @if(Auth::check())
                                                    {{ \App\Http\Controllers\LoginController::viewfavourite1($row->id) }}
                                                    @else
                                                    <li><a href="/login"><i class="icon-22"></i></a></li>
                                                    @endif
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="btn-box"><a href="/view-post/{{$row->id}}" class="theme-btn-one">Details</a></div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="grid-item feature-style-two four-column pd-0">
                                    <div class="row clearfix">
                                        @if(count($post_ads) > 1)
                                        @foreach($post_ads as $row)
                                        <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                            <div class="feature-block-one">
                                                <div class="inner-box">
                                                <a href="/view-post/{{$row->id}}">
                                                    <div class="image-box">
                                                        <figure class="image"><img style="width:370px;height:220px;" src="/upload_image/{{$row->image}}" alt=""></figure>
                                                        
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
                                                            <li style="text-transform:capitalize !important;"><i class="fas fa-map-marker-alt"></i>{{ \App\Http\Controllers\HomeController::viewcityname($row->area,$row->city) }}</li>
                                                        </ul>
                                                        <div class="lower-box">
                                                            <h5><span>Price:</span>AED {{$row->price}}</h5>
                                                            <ul class="react-box">
                                                            @if(Auth::check())
                                                            {{ \App\Http\Controllers\LoginController::viewfavourite1($row->id) }}
                                                            @else
                                                            <li><a href="/login"><i class="icon-22"></i></a></li>
                                                            @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @else 
                                        @foreach($post_ads as $row)
                                        <div class="col-lg-12 col-md-12 col-sm-12 feature-block">
                                            <div class="feature-block-one">
                                                <div class="inner-box">
                                                <a href="/view-post/{{$row->id}}">
                                                    <div class="image-box">
                                                        <figure class="image"><img style="width:370px;height:220px;" src="/upload_image/{{$row->image}}" alt=""></figure>
                                                        
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
                                                            <li style="text-transform:capitalize !important;"><i class="fas fa-map-marker-alt"></i>{{ \App\Http\Controllers\HomeController::viewcityname($row->area,$row->city) }}</li>
                                                        </ul>
                                                        <div class="lower-box">
                                                            <h5><span>Price:</span>AED {{$row->price}}</h5>
                                                            <ul class="react-box">
                                                            @if(Auth::check())
                                                            {{ \App\Http\Controllers\LoginController::viewfavourite1($row->id) }}
                                                            @else
                                                            <li><a href="/login"><i class="icon-22"></i></a></li>
                                                            @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <!-- <div class="text-center" style="width: 100%;margin-bottom:20px;">
                                <div class="more-btn"><a href="#" class="theme-btn-one">Load More</a></div>
                            </div> -->

                            {!! $post_ads->links('website.pagination') !!}

                            <!-- <div class="pagination-wrapper centred">
                                <ul class="pagination clearfix">
                                    <li><a href="category-details.html"><i class="far fa-angle-left"></i>Prev</a></li>
                                    <li><a href="category-details.html" class="current">01</a></li>
                                    <li><a href="category-details.html">02</a></li>
                                    <li><a href="category-details.html">03</a></li>
                                    <li><a href="category-details.html">Next<i class="far fa-angle-right"></i></a></li>
                                </ul>
                            </div> -->

                        </div>
                    </div>
                </div>
                <div style="margin-top:20px;margin-bottom:-80px;" class="col-md-12">
                    <center><img src="https://via.placeholder.com/728x90"></center>
                </div>
            </div>
        </section>
        <!-- stores-details end -->


@endsection
@section('js')
<script src="/assets/js/product-filter.js"></script>

<script type="text/javascript">
$(document).on('click','#search', function(){
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
});

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
                location.reload();
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
                location.reload();
            });
        },error: function (data) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
                toastr.error(obj[0]);
            });
        }
    });
}

var city = '<?php echo $user->city;  ?>';
var area = '<?php echo $user->area;  ?>';
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

