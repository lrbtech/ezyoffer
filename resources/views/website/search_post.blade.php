@extends('website.layouts')
@section('css')
<style>
img{
    cursor:pointer;
}
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
        <!-- Page Title -->
        <section class="page-title style-two" style="background-image: url(/assets/images/background/page-title.jpg);">
            <div class="auto-container">
                <div class="content-box centred mr-0">
                    <div class="title">
                        <h1>{{$language[177][session()->get('lang')]}}</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a class="translate" href="/">Home</a></li>
                        <li>{{$language[177][session()->get('lang')]}}</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->

        

        <!-- category-details -->
        <section class="category-details bg-color-2">
            <div class="left-ad" style="float:left;margin-top:0px;padding-left:20px;">
                @if($google_ads->image_160_600 != '')
                <img src="/ads_image/{{$google_ads->image_160_600}}">
                @else
                <img src="https://via.placeholder.com/160x600"> 
                @endif
            </div>
            <div class="right-ad" style="float:right;margin-top:0px;padding-right:20px;">
                @if($google_ads->image_160_600 != '')
                <img src="/ads_image/{{$google_ads->image_160_600}}">
                @else
                <img src="https://via.placeholder.com/160x600"> 
                @endif
            </div>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="default-sidebar category-sidebar">
                            <div class="sidebar-search sidebar-widget">
                                <div class="widget-title">
                                    <h3>{{$language[178][session()->get('lang')]}}</h3>
                                </div>
                                <div class="widget-content">
                                    <form action="#" method="get" class="search-form">
                                        <div class="form-group">
                                            <input autocomplete="off" type="search" name="title" id="title" placeholder="{{$language[169][session()->get('lang')]}}" required="">
                                            <button onclick="SearchPost()" type="button"><i class="icon-2"></i></button>
                                        </div>
                                        <div class="form-group">
                                            <i class="icon-3"></i>
                                            <select name="city" id="city" class="wide">
                                                <option value="">{{$language[170][session()->get('lang')]}}</option>
                                                @foreach($city_all as $row)
                                                <option value="{{$row->id}}">{{$row->city}}</option>
                                                @endforeach
                                            </select>
                                            <input value="0" type="hidden" name="area" id="area">
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
                                            <button onclick="SearchPost()" style="background-color: #789FD3 !important;width:100% !important;" type="button" class="theme-btn-one">{{$language[172][session()->get('lang')]}}</button>
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
                                        <!-- <li><a href="category-details.html">All</a></li> -->
                                        @foreach($category_all as $row)
                                        <li><a class="translate" href="/search-post/0/{{$row->id}}/0/0/0/0">{{$row->category}}</a></li>
                                        @endforeach
                                        <!-- <li class="dropdown">
                                            <a href="category-details.html" class="current">Ellectronics</a>
                                            <ul>
                                                <li><a href="category-details.html">Computers</a></li>
                                                <li><a href="category-details.html">Drones</a></li>
                                                <li><a href="category-details.html">Phones</a></li>
                                                <li><a href="category-details.html">Watches</a></li>
                                            </ul>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>

                            <div class="tags-widget sidebar-widget">
                                <!-- <div class="widget-title">
                                    <h3>Google Ads</h3>
                                </div> -->
                                <div class="widget-content">
                                    @if($google_ads->image_300_250 != '')
                                    <center><img src="/ads_image/{{$google_ads->image_300_250}}"></center>
                                    @else
                                    <center><img src="https://via.placeholder.com/300x250"></center>
                                    @endif
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

                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="category-details-content">
                            <div style="margin-bottom:50px;" class="item-shorting clearfix">
                                <!-- <div class="text pull-left">
                                    <p><span>Search Reasults:</span> Showing {{ $post_ads->firstItem() }} - {{ $post_ads->lastItem() }} of {{$post_ads->total()}} Listings</p>
                                </div> -->
                                <div class="right-column pull-right clearfix">
                                    <div class="select-box">
                                        <select name="sorting" id="sorting" onchange="SearchPost()" class="translate wide">
                                            <option value="0" data-display="Sort by: Default">Sort by: Default</option>
                                            <option value="1">Short by Low to High</option>
                                            <option value="2">Short by High to Low</option>
                                        </select>
                                    </div>
                                    <div class="menu-box">
                                        <button id="grid-view" value="1" class="grid-view"><i class="icon-30"></i></button>
                                        <button id="list-view" value="1" class="list-view on"><i class="icon-31"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div id="view_search_post">
                            <input type="hidden" name="_token" id="csrf-token" value="{{csrf_token()}}" />
                            </div>
                            {{--<div class="category-block wrapper browse-add list">
                                <div class="list-item feature-style-three pd-0">
                                    @foreach($post_ads as $row)
                                    <div class="feature-block-one">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <figure class="image"><img onclick="viewpost({{$row->id}})" style="width:200px;height:220px;" src="/upload_image/{{$row->image}}" alt=""></figure>
                                                @if($row->post_type == '1')
                                                <div class="feature-2">Featured</div>
                                                @endif
                                            </div>
                                            <div class="lower-content">
                                                <div class="category"><i class="fas fa-tags"></i><a href="#">{{ \App\Http\Controllers\HomeController::viewcategoryname($row->category) }}</a></div>
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
                                                    <li style="text-transform:capitalize !important;text-overflow: ellipsis;overflow: hidden;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;"><i class="fas fa-map-marker-alt"></i>{{ \App\Http\Controllers\HomeController::viewcityname($row->area,$row->city) }}</li>
                                                </ul>
                                                <div class="lower-box">
                                                    <h5><span>Price:</span>AED {{$row->price}}</h5>
                                                    <ul class="react-box">
                                                    <li class="{{$row->id}}">
                                                    @if(Auth::check())
                                                    {{ \App\Http\Controllers\LoginController::viewfavourite($row->id) }}
                                                    @else
                                                    <a href="/login"><i class="icon-22"></i></a>
                                                    @endif
                                                    </li>
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
                                        <div class="col-lg-4 col-md-4 col-sm-12 feature-block">
                                            <div class="feature-block-one">
                                                <div class="inner-box">
                                                <a href="/view-post/{{$row->id}}">
                                                    <div class="image-box">
                                                        <figure class="image"><img onclick="viewpost({{$row->id}})" style="width:370px;height:220px;" src="/upload_image/{{$row->image}}" alt=""></figure>
                                                        
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
                                                        <div class="category"><i class="fas fa-tags"></i><a href="#">{{ \App\Http\Controllers\HomeController::viewcategoryname($row->category) }}</a></div>
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
                                                            <li class="{{$row->id}}">
                                                            @if(Auth::check())
                                                            {{ \App\Http\Controllers\LoginController::viewfavourite($row->id) }}
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
                                        </div>
                                        @endforeach
                                        @else 
                                        @foreach($post_ads as $row)
                                        <div class="col-lg-12 col-md-12 col-sm-12 feature-block">
                                            <div class="feature-block-one">
                                                <div class="inner-box">
                                                <a href="/view-post/{{$row->id}}">
                                                    <div class="image-box">
                                                        <figure class="image"><img onclick="viewpost({{$row->id}})" style="width:370px;height:220px;" src="/upload_image/{{$row->image}}" alt=""></figure>
                                                        
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
                                                        <div class="category"><i class="fas fa-tags"></i><a href="#">{{ \App\Http\Controllers\HomeController::viewcategoryname($row->category) }}</a></div>
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
                                                            <li class="{{$row->id}}">
                                                            @if(Auth::check())
                                                            {{ \App\Http\Controllers\LoginController::viewfavourite($row->id) }}
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
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="text-center" style="width: 100%;margin-bottom:20px;">
                                <div class="more-btn"><a href="#" class="theme-btn-one">Load More</a></div>
                            </div>--}}

                            <!-- {!! $post_ads->links('website.pagination') !!} -->

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
            </div>
        </section>
        <!-- category-details end -->


@endsection
@section('js')
<script src="/assets/js/product-filter.js"></script>
<script type="text/javascript">
// $("#grid-view").click(function(){
//     var className = $("#grid-view").attr("class");
//     alert(className); // Outputs: hint
// });

// $("#list-view").click(function(){
//     var className = $("#list-view").attr("class");
//     alert(className); // Outputs: hint
// });


var title = '<?php echo $title1; ?>';
var city = '<?php echo $city1; ?>';
var area = '<?php echo $area1; ?>';
var category = '<?php echo $category1; ?>';
var sorting = '<?php echo $sort1; ?>';
$('#sorting').val(sorting);
if(title != '0'){
    $('#title').val(title);
}
if(city != '0'){
    $('#city').val(city);
}
if(area != '0'){
    $('#area').val(area);
}
if(category != '0'){
    $('#category').val(category);
}

$(document).ready(function(){
 
var _token = $('input[name="_token"]').val();

 view_search_post('', _token);

 function view_search_post(id="", _token)
 {
    var title = $('#title').val();
    var category = $('#category').val();
    var city = $('#city').val();
    var area = $('#area').val();
    var sorting = $('#sorting').val();
    var title1;
    var category1;
    var city1;
    var area1;

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
    if(area!=""){
        area1 = area;
    }else{
        area1 = '0';
    }

    $.ajax({
        url:"/load-data-search-post",
        method:"post",
        data:{id:id,_token:_token,title:title1,category:category1,city:city1,area:area1,sort:sorting},
        success:function(data)
        {
            $('#search_post_load_more_button').remove();
            $('#view_search_post').append(data);
        }
    })
 }

 var id = [];
 var search_id = [];
 $(document).on('click', '#search_post_load_more_button', function(){
    id = $(this).data('id');
    for(var i=0;i<id.length;i++){
        search_id.push(id[i]);
    }
    console.log(search_id);
    $('#search_post_load_more_button').html('<b>Loading...</b>');
    view_search_post(search_id, _token);
 });

});


function SearchPost(){
    var title = $('#title').val();
    var category = $('#category').val();
    var city = $('#city').val();
    var area = $('#area').val();
    var sorting = $('#sorting').val();
    var title1;
    var category1;
    var city1;
    var area1;

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
    // if(area!=""){
    //     area1 = area;
    // }else{
        area1 = '0';
    //}
    window.location.href = "/search-post/"+title1+'/'+category1+'/0'+'/'+city1+'/'+area1+'/'+sorting;
}


function viewpost(id)
{
    window.location.href="/view-post/"+id;
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
                $.ajax({
                    url: '/get-favourite/'+id,
                    type: "GET",
                    success: function(data)
                    {
                        $('.favourite-grid'+id).html(data);
                        $('.favourite-list'+id).html(data);
                    }
                });
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
                $.ajax({
                    url: '/get-favourite/'+id,
                    type: "GET",
                    success: function(data)
                    {
                        $('.favourite-grid'+id).html(data);
                        $('.favourite-list'+id).html(data);
                    }
                });          
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

