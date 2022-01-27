@extends('customers.layouts')
@section('css')
@endsection
@section('section')

<!-- Page Title -->
<section class="page-title style-two" style="background-image: url(/assets/images/background/page-title.jpg);">
    <div class="auto-container">
        <div class="content-box centred mr-0">
            <div class="title">
                <h1>{{$language[147][session()->get('lang')]}}</h1>
            </div>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Home</a></li>
                <li>{{$language[147][session()->get('lang')]}}</li>
            </ul>
        </div>
    </div>
</section>
<!-- End Page Title -->


<!-- category-details -->
<section class="category-details bg-color-2">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                @include('customers.menu')
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="category-details-content">
                    <div class="item-shorting clearfix">
                        <div class="text pull-left">
                            <p><span>Search Reasults:</span> Showing {{ $post_ads->firstItem() }} - {{ $post_ads->lastItem() }} of {{$post_ads->total()}} Listings</p>
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
                                        <div class="category"><i class="fas fa-tags"></i><a href="#">{{ \App\Http\Controllers\HomeController::viewcategoryname($row->category) }}</a></div>
                                        <h4><a href="/view-post/{{$row->id}}">{{$row->title}}</a></h4>
                                        <!-- <ul class="rating clearfix">
                                            <li><i class="icon-17"></i></li>
                                            <li><i class="icon-17"></i></li>
                                            <li><i class="icon-17"></i></li>
                                            <li><i class="icon-17"></i></li>
                                            <li><i class="icon-17"></i></li>
                                            <li><a href="/">(32)</a></li>
                                        </ul> -->
                                        <ul class="info clearfix">
                                            <li><i class="far fa-clock"></i>{{ \App\Http\Controllers\HomeController::humanreadtime($row->created_at) }}</li>
                                            <li><i class="fas fa-map-marker-alt"></i>{{ \App\Http\Controllers\HomeController::viewcityname($row->area,$row->city) }}</li>
                                        </ul>
                                        <div class="lower-box">
                                            <h5><span>Price:</span>AED {{$row->price}}</h5>
                                            <ul class="react-box">
                                                <li><a style="color:red;" onclick="Delete({{$row->favourite_id}})" href="javascript:void(0);"><i class="icon-22"></i></a></li>
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
                                        <a href="#">
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
                                                <div class="category"><i class="fas fa-tags"></i><a href="#">{{ \App\Http\Controllers\HomeController::viewcategoryname($row->category) }}</a></div>
                                                <h3><a href="/view-post/{{$row->id}}">{{$row->title}}</a></h3>
                                                <!-- <ul class="rating clearfix">
                                                    <li><i class="icon-17"></i></li>
                                                    <li><i class="icon-17"></i></li>
                                                    <li><i class="icon-17"></i></li>
                                                    <li><i class="icon-17"></i></li>
                                                    <li><i class="icon-17"></i></li>
                                                    <li><a href="/">(25)</a></li>
                                                </ul> -->
                                                <ul class="info clearfix">
                                                    <li><i class="far fa-clock"></i>{{ \App\Http\Controllers\HomeController::humanreadtime($row->created_at) }}</li>
                                                    <li><i class="fas fa-map-marker-alt"></i>{{ \App\Http\Controllers\HomeController::viewcityname($row->area,$row->city) }}</li>
                                                </ul>
                                                <div class="lower-box">
                                                    <h5><span>Price:</span>AED {{$row->price}}</h5>
                                                    <ul class="react-box">
                                                        <li><a style="color:red;" onclick="Delete({{$row->favourite_id}})" href="javascript:void(0);"><i class="icon-22"></i></a></li>
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
                                        <a href="#">
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
                                                <div class="category"><i class="fas fa-tags"></i><a href="#">{{ \App\Http\Controllers\HomeController::viewcategoryname($row->category) }}</a></div>
                                                <h3><a href="/view-post/{{$row->id}}">{{$row->title}}</a></h3>
                                                <!-- <ul class="rating clearfix">
                                                    <li><i class="icon-17"></i></li>
                                                    <li><i class="icon-17"></i></li>
                                                    <li><i class="icon-17"></i></li>
                                                    <li><i class="icon-17"></i></li>
                                                    <li><i class="icon-17"></i></li>
                                                    <li><a href="/">(25)</a></li>
                                                </ul> -->
                                                <ul class="info clearfix">
                                                    <li><i class="far fa-clock"></i>{{ \App\Http\Controllers\HomeController::humanreadtime($row->created_at) }}</li>
                                                    <li><i class="fas fa-map-marker-alt"></i>{{ \App\Http\Controllers\HomeController::viewcityname($row->area,$row->city) }}</li>
                                                </ul>
                                                <div class="lower-box">
                                                    <h5><span>Price:</span>AED {{$row->price}}</h5>
                                                    <ul class="react-box">
                                                        <li><a style="color:red;" onclick="Delete({{$row->favourite_id}})" href="javascript:void(0);"><i class="icon-22"></i></a></li>
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
    </div>
</section>
<!-- category-details end -->
@endsection
@section('js')
<script type="text/javascript">
$('.sidebar_favourite').addClass('active');

function Delete(id,status){
    var r = confirm("Are you sure");
    if (r == true) {
      $.ajax({
        url : '/customer/delete-favourite-post/'+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            Swal.fire({
                text: 'Successfully Removed',
                icon: "success",
            }).then(function() {
                location.reload();
            });
        }
      });
    } 
}
</script>
@endsection