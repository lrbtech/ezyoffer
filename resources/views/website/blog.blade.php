@extends('website.layouts')
@section('css')
 
@endsection
@section('section')

        <!-- Page Title -->
        <section class="page-title style-two" style="background-image: url(/assets/images/background/page-title.jpg);">
            <div class="auto-container">
                <div class="content-box centred mr-0">
                    <div class="title">
                        <h1>{{$language[133][session()->get('lang')]}}</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a class="translate" href="/">Home</a></li>
                        <li>{{$language[133][session()->get('lang')]}}</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->


        <!-- sidebar-page-container -->
        <section class="sidebar-page-container">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 content-side">
                        <div class="blog-grid-content">
                            <div class="row clearfix">
                                @foreach($blog as $row)
                                <div  class="translate col-lg-4 col-md-4 col-sm-12 news-block">
                                    <div class="news-block-one">
                                        <div class="inner-box">
                                            <figure class="image-box">
                                                <img style="height:200px;" src="/upload_files/{{$row->image}}" alt="">
                                                <a href="/view-blog/{{$row->id}}"><i class="fas fa-link"></i></a>
                                            </figure>
                                            <div class="lower-content">
                                                <figure class="admin-thumb"><img src="/assets/images/icons/user-icon.png" alt=""></figure>
                                                <!-- <span class="category">Blog Category</span> -->
                                                <h3><a style="text-transform:capitalize !important;text-overflow: ellipsis;overflow: hidden;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;" href="/view-blog/{{$row->id}}">{{$row->title}}</a></h3>

                                                <p style="height:80px;word-wrap:break-word;">{{ substr($row->description,0,100) }}</p>
                                                <span class="post-info">By <a href="/view-blog/{{$row->id}}">Admin</a> - {{ \App\Http\Controllers\HomeController::humanreadtime($row->created_at) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            {!! $blog->links('website.pagination') !!}
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
                    <!-- <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="blog-sidebar default-sidebar">
                            <div class="sidebar-search sidebar-widget">
                                <div class="widget-title">
                                    <h3>Search Ads</h3>
                                </div>
                                <div class="widget-content">
                                    <form action="#" method="post" class="search-form">
                                        <div class="form-group">
                                            <input type="search" name="title" id="title" placeholder="Search Keyword..." required="">
                                            <button type="button"><i class="icon-2"></i></button>
                                        </div>
                                        <div class="form-group">
                                            <i class="icon-3"></i>
                                            <select name="location" id="location" class="wide">
                                                <option value="location">All Cities</option>
                                                @foreach($city as $row)
                                                <option value="{{$row->id}}">{{$row->city}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <i class="icon-4"></i>
                                            <select name="category" id="category" class="wide">
                                                <option value="0">All Categories</option>
                                                @foreach($category_all as $row)
                                                <option value="{{$row->id}}">{{$row->category}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <button style="background-color: #789FD3 !important;width:100% !important;" id="search" type="button" class="theme-btn-one">Apply Filter</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="sidebar-category sidebar-widget">
                                <div class="widget-title">
                                    <h3>Category</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="category-list">
                                        @foreach($category_all as $row)
                                        <li><a href="/category-post/{{$row->id}}">{{$row->category}}</a></li>
                                        @endforeach                                    
                                    </ul>
                                </div>
                            </div>
                            <div class="tags-widget sidebar-widget">
                                <div class="widget-title">
                                    <h3>Google Ads</h3>
                                </div>
                                <div class="widget-content">
                                    <img src="https://via.placeholder.com/310x500">
                                </div>
                            </div>                            
                        </div>
                    </div> -->
                </div>
            </div>
        </section>
        <!-- sidebar-page-container end -->


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
        title1 = 'title';
    }
    if(category!=""){
        category1 = category;
    }else{
        category1 = 'category';
    }
    if(city!=""){
        city1 = city;
    }else{
        city1 = 'city';
    }
    window.location.href = "/search-post/"+title1+'/'+category1+'/0'+'/'+city1+'/0'+'/0';
});

</script>
@endsection