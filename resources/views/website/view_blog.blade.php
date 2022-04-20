@extends('website.layouts')
@section('css')
 
@endsection
@section('section')


        <!-- Page Title -->
        <section class="page-title style-two" style="background-image: url(/assets/images/background/page-title.jpg);">
            <div class="auto-container">
                <div class="content-box centred mr-0">
                    <div class="title">
                        <h1 class="translate">{{$blog->title}}</h1>
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
        <section class="translate sidebar-page-container">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 content-side">
                        <div class="blog-details-content">
                            <div class="news-block-one">
                                <div class="inner-box">
                                    <figure class="image-box img-box-design">
                                        <img src="/upload_files/{{$blog->image}}" alt="">
                                    </figure>
                                    <div class="lower-content">
                                        <figure class="admin-thumb"><img src="/assets/images/icons/user-icon.png" alt=""></figure>
                                        <!-- <span class="category">Category Title</span> -->
                                        <h2>{{$blog->title}}</h2>
                                        <span class="post-info">By <a href="#">Admin</a> - {{ \App\Http\Controllers\HomeController::humanreadtime($blog->created_at) }}</span>
                                        <div class="text">
                                            <p style="word-wrap:break-word;">{{$blog->description}}</p>
                                            <!-- <blockquote>
                                                <h4>“Enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis.”</h4>
                                            </blockquote>
                                            <p>Lorem ipsum dolor sit amet consectur adipisicing sed eiusmod tempor incididunt labore dolore magna aliqua enim ad minim veniam. quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p> -->
                                        </div>
                                        <!-- <div class="two-column">
                                            <div class="row clearfix">
                                                <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                                                    <div class="text-content">
                                                        <h3>Two Most-Cited Reason</h3>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipis cing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                        <p>enim ad minim veniam quis nostrud exercitat ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                                                        <ul class="list-item clearfix">
                                                            <li>Success is something of which we want.</li>
                                                            <li>People believe that success is difficult.</li>
                                                            <li>The four levels of the healthcare system</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                                    <figure class="image-box img-box-design"><img src="/assets/images/news/news-16.jpg" alt=""></figure>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text">
                                            <h3>Two Most-Cited Reason</h3>
                                            <p>Lorem ipsum dolor sit amet consectur adipisicing sed eiusmod tempor incididunt labore dolore magna aliqua enim ad minim veniam. quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                        </div>
                                        <div class="post-share-option clearfix">
                                            <div class="text pull-left">
                                                <h3>We Are Social On:</h3>
                                            </div>
                                            <ul class="social-links pull-right clearfix">
                                                <li><a href="blog-details.html"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="blog-details.html"><i class="fab fa-google-plus-g"></i></a></li>
                                                <li><a href="blog-details.html"><i class="fab fa-twitter"></i></a></li>
                                            </ul>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="comment-box">
                                <div class="group-title">
                                    <h3>3 Comments</h3>
                                </div>
                                <div class="comment">
                                    <figure class="thumb-box">
                                        <img src="/assets/images/news/comment-1.png" alt="">
                                    </figure>
                                    <div class="comment-inner">
                                        <div class="comment-info clearfix">
                                            <h5>Rebeka Dawson</h5>
                                            <span class="post-date">August 10, 2021</span>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nos</p>
                                        <a href="blog-details.html" class="reply-btn"><i class="fas fa-share"></i>Reply</a>
                                    </div>
                                </div>
                                <div class="comment replay-comment">
                                    <figure class="thumb-box">
                                        <img src="/assets/images/news/comment-2.png" alt="">
                                    </figure>
                                    <div class="comment-inner">
                                        <div class="comment-info clearfix">
                                            <h5>Elizabeth Winstead</h5>
                                            <span class="post-date">August 09, 2021</span>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nos</p>
                                        <a href="blog-details.html" class="reply-btn"><i class="fas fa-share"></i>Reply</a>
                                    </div>
                                </div>
                                <div class="comment">
                                    <figure class="thumb-box">
                                        <img src="/assets/images/news/comment-3.png" alt="">
                                    </figure>
                                    <div class="comment-inner">
                                        <div class="comment-info clearfix">
                                            <h5>Benedict Cumbatch</h5>
                                            <span class="post-date">August 08, 2021</span>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nos</p>
                                        <a href="blog-details.html" class="reply-btn"><i class="fas fa-share"></i>Reply</a>
                                    </div>
                                </div>
                            </div>
                            <div class="comments-form-area">
                                <div class="group-title">
                                    <h3>Leave a Review</h3>
                                    <p>Your email address will not be published. Required fields are marked *</p>
                                </div>
                                <form method="post" action="sendemail.php" id="contact-form2" class="default-form"> 
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <label>Full Name</label>
                                            <input type="text" name="username" required="">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <label>Email Address</label>
                                            <input type="email" name="email" required="">
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                            <label>Phone Number</label>
                                            <input type="text" name="phone" required="">
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                            <label>Subject</label>
                                            <input type="text" name="subject" required="">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <label>Review Title*</label>
                                            <textarea name="message"></textarea>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                            <button class="theme-btn-one" type="submit" name="submit-form">Submit Now</button>
                                        </div>
                                    </div>
                                </form>
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
                                                <option value="">All Cities</option>
                                                @foreach($city as $row)
                                                <option value="{{$row->id}}">{{$row->city}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <i class="icon-4"></i>
                                            <select name="category" id="category" class="wide">
                                                <option value="">All Categories</option>
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
});

</script>
@endsection