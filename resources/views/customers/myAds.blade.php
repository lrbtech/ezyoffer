@extends('customers.layouts')
@section('css')
@endsection
@section('section')

<!-- Page Title -->
<section class="page-title style-two" style="background-image: url(/assets/images/background/page-title.jpg);">
    <div class="auto-container">
        <div class="content-box centred mr-0">
            <div class="title">
                <h1>{{$language[144][session()->get('lang')]}}</h1>
            </div>
            <ul class="bread-crumb clearfix">
                <li><a class="translate" href="/">Home</a></li>
                <li>{{$language[144][session()->get('lang')]}}</li>
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
                            <p class="translate"> Showing {{ $post_ads->firstItem() }} - {{ $post_ads->lastItem() }} of {{$post_ads->total()}} Listings</p>
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
                    <div class="translate category-block wrapper browse-add list">
                        <div class="list-item feature-style-three pd-0">
                            @foreach($post_ads as $row)
                            <div class="feature-block-one">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image"><img style="width:200px;height:220px;" src="/upload_image/{{$row->image}}" alt=""></figure>
                                        @if($row->status == '0')
                                        @if($row->post_type == '0')
                                        <div class="feature-2">Normal Ad</div>
                                        @elseif($row->post_type == '1')
                                        <div class="feature-2">Featured</div>
                                        @elseif($row->post_type == '2')
                                        <div class="feature-2">Live Story</div>
                                        @endif
                                        @else
                                        <div style="background-color:#ff0000 !important;"  class="feature-2">DeActivated</div>
                                        @endif
                                    </div>
                                    <div class="lower-content">
                                        <div class="category"><i class="fas fa-tags"></i><a href="#">{{ \App\Http\Controllers\HomeController::viewcategoryname($row->category) }}</a></div>
                                        <h4 style="text-transform:capitalize !important;"><a href="/view-post/{{$row->id}}">{{$row->title}}</a></h4>
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
                                            <!-- <ul class="react-box">
                                                <li><a href="#"><i class="icon-22"></i></a></li>
                                            </ul> -->
                                        </div>
                                    </div>
                                    <div class="btn-box button-with-action"><a href="/customer/edit-post-ads/{{$row->id}}" class="theme-btn-one">Edit</a></div>
                                    <!-- @if($row->status == 0)
                                    <div class="btn-box button-with-disble"><a style="background-color:#ff0000 !important;" onclick="DeleteAd({{$row->id}},1)" href="javascript:void(0)" class="theme-btn-one">DeActive</a></div>
                                    @else 
                                    <div class="btn-box button-with-disble"><a style="background-color:green !important;" onclick="DeleteAd({{$row->id}},0)" href="javascript:void(0)" class="theme-btn-one">Active</a></div>
                                    @endif -->
                                    <div class="btn-box button-with-disble"><a style="background-color:#ff0000 !important;" onclick="DeleteAd({{$row->id}})" href="javascript:void(0)" class="theme-btn-one">Delete</a></div>
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
                                                @if($row->status == '0')
                                                @if($row->post_type == '0')
                                                <div class="shape"></div>
                                                <div class="feature">Normal Ad</div>
                                                @elseif($row->post_type == '1')
                                                <div class="shape"></div>
                                                <div class="feature">Featured</div>
                                                @elseif($row->post_type == '2')
                                                <div class="shape"></div>
                                                <div class="feature">Live Story</div>
                                                @endif
                                                @else 
                                                <div class="shape"></div>
                                                <div style="background-color:#ff0000 !important;" class="feature">DeActivated</div>
                                                @endif

                                                <a href="/customer/edit-post-ads/{{$row->id}}">
                                                    <div class="icon">
                                                        <div class="icon-shape"></div>
                                                        <i class="fa fa-edit"></i>
                                                    </div>
                                                </a>
                                                <!-- @if($row->status == 0)
                                                <a onclick="DeleteAd({{$row->id}},1)" href="javascript:void(0)">
                                                    <div class="icon disable-icons">
                                                        <div class="icon-shape"></div>
                                                        <i class="fa fa-trash"></i>
                                                    </div>
                                                </a>
                                                @else 
                                                <a onclick="DeleteAd({{$row->id}},0)" href="javascript:void(0)">
                                                    <div class="icon disable-icons">
                                                        <div class="icon-shape"></div>
                                                        <i class="fa fa-trash"></i>
                                                    </div>
                                                </a>
                                                @endif -->
                                            </div>
                                            <div class="lower-content">
                                                <div class="category"><i class="fas fa-tags"></i><a href="#">{{ \App\Http\Controllers\HomeController::viewcategoryname($row->category) }}</a></div>
                                                <h3 style="text-transform:capitalize !important;"><a href="/view-post/{{$row->id}}">{{$row->title}}</a></h3>
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
                                                    <li style="text-transform:capitalize !important;"><i class="fas fa-map-marker-alt"></i>{{ \App\Http\Controllers\HomeController::viewcityname($row->area,$row->city) }}</li>
                                                </ul>
                                                <div class="lower-box">
                                                    <h5><span>Price:</span>AED {{$row->price}}</h5>
                                                    <!-- <ul class="react-box">
                                                        <li><a href="/"><i class="icon-22"></i></a></li>
                                                    </ul> -->
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
                                                @if($row->status == '0')
                                                @if($row->post_type == '0')
                                                <div class="shape"></div>
                                                <div class="feature">Normal Ad</div>
                                                @elseif($row->post_type == '1')
                                                <div class="shape"></div>
                                                <div class="feature">Featured</div>
                                                @elseif($row->post_type == '2')
                                                <div class="shape"></div>
                                                <div class="feature">Live Story</div>
                                                @endif
                                                @else 
                                                <div class="shape"></div>
                                                <div style="background-color:#ff0000 !important;" class="feature">DeActivated</div>
                                                @endif

                                                <a href="/customer/edit-post-ads/{{$row->id}}">
                                                    <div class="icon">
                                                        <div class="icon-shape"></div>
                                                        <i class="fa fa-edit"></i>
                                                    </div>
                                                </a>
                                                <!-- @if($row->status == 0)
                                                <a onclick="DeleteAd({{$row->id}},1)" href="javascript:void(0)">
                                                    <div class="icon disable-icons">
                                                        <div class="icon-shape"></div>
                                                        <i class="fa fa-trash"></i>
                                                    </div>
                                                </a>
                                                @else 
                                                <a onclick="DeleteAd({{$row->id}},0)" href="javascript:void(0)">
                                                    <div class="icon disable-icons">
                                                        <div class="icon-shape"></div>
                                                        <i class="fa fa-trash"></i>
                                                    </div>
                                                </a>
                                                @endif -->
                                            </div>
                                            <div class="lower-content">
                                                <div class="category"><i class="fas fa-tags"></i><a href="#">{{ \App\Http\Controllers\HomeController::viewcategoryname($row->category) }}</a></div>
                                                <h3 style="text-transform:capitalize !important;"><a href="/view-post/{{$row->id}}">{{$row->title}}</a></h3>
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
                                                    <li style="text-transform:capitalize !important;"><i class="fas fa-map-marker-alt"></i>{{ \App\Http\Controllers\HomeController::viewcityname($row->area,$row->city) }}</li>
                                                </ul>
                                                <div class="lower-box">
                                                    <h5><span>Price:</span>AED {{$row->price}}</h5>
                                                    <!-- <ul class="react-box">
                                                        <li><a href="/"><i class="icon-22"></i></a></li>
                                                    </ul> -->
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
$('.sidebar_my_ads').addClass('active');

function DeleteAd(id){
    var r = confirm("Are you sure");
    if (r == true) {
      $.ajax({
        url : '/customer/delete-post-ads/'+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            Swal.fire({
                title: 'Successfully Deleted',
                icon: 'success',
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/customer/my-ads";
                }
            })
            // if(status == 0){
            //     Swal.fire({
            //         title: 'Successfully Activated',
            //         icon: 'success',
            //         }).then((result) => {
            //         if (result.isConfirmed) {
            //             window.location = "/customer/my-ads";
            //         }
            //     }) 
            // }
            // else{
            //     Swal.fire({
            //         title: 'Successfully DeActivated',
            //         icon: 'success',
            //         }).then((result) => {
            //         if (result.isConfirmed) {
            //             window.location = "/customer/my-ads";
            //         }
            //     }) 
            // }
        }
      });
    } 
}
</script>
@endsection