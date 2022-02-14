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

        <!-- Page Title -->
        <section class="page-title style-two" style="background-image: url(/assets/images/background/page-title.jpg);">
            <div class="auto-container">
                <div class="content-box centred mr-0">
                    <div class="title">
                        <h1>{{$language[190][session()->get('lang')]}}</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a class="translate" href="/">Home</a></li>
                        <li>{{$language[190][session()->get('lang')]}}</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->
        <div style="margin-top:30px;margin-bottom:30px;">
            <center><img src="https://via.placeholder.com/728x90"></center>
        </div>
       
        <!-- stores-section -->
        <section class="stores-section bg-color-2 store-sorts">
            <div class="translate auto-container">
                <div  style="margin-top:-80px;" class="top-bar clearfix">
                    <div class="text pull-left">
                        <p>Showing {{ $all_user->firstItem() }} - {{ $all_user->lastItem() }} of {{$all_user->total()}} Listings</p>
                    </div>
                    <!-- <div class="sort-box pull-right">
                        <select class="wide">
                           <option data-display="Sort by: Default">Sort by: Default</option>
                           <option value="1">View Rating 5</option>
                           <option value="2">View Rating 4.5</option>
                           <option value="3">View Rating 4</option>
                           <option value="4">View Rating 3</option>
                        </select>
                    </div>                    
                    <div class="sort-box pull-right" style="margin-right: 30px;">
                        <select class="wide">
                           <option data-display="Select By: Category">Select By Category</option>
                           <option value="1">House Holds</option>
                           <option value="2">Appliances</option>
                           <option value="3">Electornics</option>
                           <option value="4">Health Care</option>
                        </select>
                    </div> -->
                </div>
                <div class="row clearfix">
                    @foreach($all_user as $row)
                    <div class="col-lg-4 col-md-6 col-sm-12 stores-block">
                        <div class="stores-block-one">
                            <div class="inner-box">
                                <figure class="icon-box">
                                    @if($row->profile_image != '')
                                    <img src="/upload_profile_image/{{$row->profile_image}}" alt="">
                                    @else
                                    <img src="/assets/images/icons/user-icon.png" alt="">
                                    @endif
                                </figure>
                                <h4><a href="/view-user/{{$row->id}}">{{$row->first_name}} {{$row->last_name}}</a></h4>
                                <ul class="rating clearfix">
                                    <!-- <li><i class="icon-17"></i></li>
                                    <li><i class="icon-17"></i></li>
                                    <li><i class="icon-17"></i></li>
                                    <li><i class="icon-17"></i></li>
                                    <li><i class="icon-17"></i></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {!! $all_user->links('website.pagination') !!}
            </div>
            <div class="row clearfix">
                <div style="margin-bottom:-50px;" class="col-md-12">
                <center><img src="https://via.placeholder.com/798x90"></center>
                </div>
            </div>
        
        <div class="left-ad" style="float:left;margin-top:-400px;">
            <img src="https://via.placeholder.com/160x600">
        </div>
        <div class="right-ad" style="float:right;margin-top:-400px;">
            <img src="https://via.placeholder.com/160x600">
        </div>
        </section>
        <!-- stores-section end -->

@endsection
@section('js')

@endsection
