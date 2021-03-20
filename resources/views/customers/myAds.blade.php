  @extends('website.layout')
   @section('css')
   <link rel="stylesheet" href="/css/dashboard.css">
<link rel="stylesheet" href="/css/dashboard-responsive.css">
   @endsection
@section('section')
<div class="ps-main-banner">
        <div class="ps-dark-overlay">
            <div class="container">
                <div class="ps-banner-content">
                    <h4>My Ads</h4>
                    <p><a href="index.html">Home</a> <span><i class="ti-angle-right"></i></span> <a href="insights.html">Dashboard</a> <span><i class="ti-angle-right"></i></span> My Ads</p>
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
                        <div class="ps-posted-ads">
                            <div class="ps-posted-ads__heading">
                                <h5>My Posted Ads</h5>
                                <label class="ps-sort">
                                    <select class="form-control">
                                        <option selected="" hidden="">Show:</option>
                                        <option>All</option>
                                        <option>Half</option>
                                    </select>
                                </label>
                                <button class="btn ps-btn">Post Ad</button>
                            </div>
                            <div class="ps-items-heading">
                                <h6>Title</h6><h6>Status</h6><h6>Actions</h6>
                            </div>
                            <div>
<ul>
    @foreach($post_ads as $row)
    <li>
        <div>
            <div class="ps-posted-ads__title">
                <div>
                    <figure>
                        <img style="width:50px !important;" src="/upload_image/{{$row->image}}">
                    </figure>
                    <div class="ps-description">
                        <h5>AED {{$row->price}}</h5>
                        <h6>{{$row->title}}</h6>
                    </div>
                </div>
            </div>
            <div class="ps-posted-ads__status">
                @if($row->status == 0)
                <button class="btn ps-btn ps-active">Active</button>
                @elseif($row->status == 1)
                <button class="btn ps-btn ps-deleted">DeActive</button>
                @elseif($row->status == 2)
                <button class="btn ps-btn ps-featured">Featured</button>
                @else 
                <button class="btn ps-btn ps-sold">Sold</button>
                @endif
            </div>
            <div class="ps-posted-ads__actions">
            <span>
                <a href="/customer/edit-post-ads/{{$row->id}}" class="ps-edit"><i class="ti-pencil"></i> Edit</a>
                <span>/</span>
                @if($row->status == 0)
                    <a onclick="Delete({{$row->id}},1)" href="javascript:void(0);" class="ps-delete"><i class="ti-trash"></i> DeActive</a>
                @elseif($row->status == 1)
                    <a onclick="Delete({{$row->id}},0)" href="javascript:void(0);" class="ps-delete"><i class="ti-trash"></i> Active</a>
                @elseif($row->status == 2)
                    <a onclick="Delete({{$row->id}},0)" href="javascript:void(0);" class="ps-delete"><i class="ti-trash"></i> Active</a>
                @endif
            </span>
            </div>
        </div>
    </li>
    @endforeach
</ul>
                                <div class="ps-page">
                                    <div class="ps-button-left">
                                        <button class="btn ps-btn"><span class="lnr lnr-chevron-left"></span></button>
                                    </div>
                                    <div class="ps-button-num">
                                        <button class="btn ps-btn"><span>1</span></button>
                                        <button class="btn ps-btn ps-active"><span>2</span></button>
                                        <button class="btn ps-btn"><span>3</span></button>
                                        <button class="btn ps-btn"><span>4</span></button>
                                        <button class="btn ps-btn"><span>...</span></button>
                                        <button class="btn ps-btn"><span>50</span></button>
                                    </div>
                                    <div class="ps-button-right">
                                        <button class="btn ps-btn"><span class="lnr lnr-chevron-right"></span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-no-ads">
                                <div>
                                    <figure><img src="/images/grid-list/img-03.png" alt="Image Description"></figure>
                                    <h5>No Ad Posted Yet :(</h5>
                                    <h6>Click “Post Ad” button below to post your free ad</h6>
                                    <button class="btn ps-btn">Post Ad</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- MAIN CONTENT END -->
                </div>
            </div>
        </section>
    </main>
@endsection
@section('js')

<script type="text/javascript">
$('.my-ads').addClass('active');

function Delete(id,status){
    var r = confirm("Are you sure");
    if (r == true) {
      $.ajax({
        url : '/customer/delete-post-ads/'+id+'/'+status,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          toastr.success(data, 'Successfully Delete');
          location.reload();
        }
      });
    } 
}
</script>
@endsection