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
        <section class="page-title" style="background-image: url(/assets/images/background/page-title.jpg);">
            <div class="auto-container">
                <div class="content-box centred">
                    <div class="title">
                        <h1>{{$language[174][session()->get('lang')]}}</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a class="translate" href="/">Home</a></li>
                        <li>{{$language[174][session()->get('lang')]}}</li>
                    </ul>
                </div>
                <div class="search-box-inner">
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
                                <button onclick="SearchPost()" id="search" type="button" class="theme-btn-one"><i class="icon-2"></i>{{$language[172][session()->get('lang')]}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- End Page Title -->

        <div class="left-ad" style="float:left;margin-top:400px;padding-left:20px;">
            <img src="https://via.placeholder.com/160x600">
        </div>
        <div class="right-ad" style="float:right;margin-top:400px;padding-right:20px;">
            <img src="https://via.placeholder.com/160x600">
        </div>

        <!-- category-style-two -->
        <section class="category-style-two">
            <div style="margin-top:-110px;margin-bottom:30px;" class="col-md-12">
                <center><img src="https://via.placeholder.com/728x90"></center>
            </div>
            <div class="auto-container">
                <div class="sec-title centred">
                    <span>{{$language[175][session()->get('lang')]}}</span>
                    <h2>{{$language[176][session()->get('lang')]}}</h2>
                </div>
                <div id="category_view" class="row clearfix">
                    <!-- <a href="category-details.html">
                        <div class="col-lg-3 col-md-6 col-sm-12 category-block">
                            <div class="category-block-two wow fadeInDown animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                <div class="inner-box">
                                    <figure class="image-box"><img src="/assets/images/resource/category-1.jpg" alt=""></figure>
                                    <div class="lower-content">
                                        <span>52</span>
                                        <div class="icon-box"><i class="icon-6"></i></div>
                                        <h4><a href="category-details.html">Property</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a> -->
                </div>
                
                <div class="row clearfix">
                    <div class="col-md-12">
                        <center><img src="https://via.placeholder.com/728x90"></center>
                    </div>
                </div>

            </div>
        </section>
        <!-- category-style-two end -->

@endsection
@section('js')
<script type="text/javascript">
homepagecategory();
function homepagecategory()
{
  $.ajax({
    url : '/get-all-category',
    type: "GET",
    success: function(data)
    {
        $('#category_view').html(data);
    }
  });
}

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

</script>
@endsection