@extends('website.layout')
@section('css')
<link rel="stylesheet" href="/css/dashboard.css">
<link rel="stylesheet" href="/css/dashboard-responsive.css">
<link rel="stylesheet" href="/css/jquery.mCustomScrollbar.min.css">
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCanHknp355-rJzwBPbz1FZDWs9t9ym_lY&sensor=false&libraries=places"></script>

<style type="text/css">
    .input-controls {
      margin-top: 10px;
      border: 1px solid transparent;
      border-radius: 2px 0 0 2px;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      height: 32px;
      outline: none;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    }
    #searchInput {
      background-color: #fff;
      font-family: Roboto;
      font-size: 15px;
      font-weight: 300;
      margin-left: 12px;
      padding: 0 11px 0 13px;
      text-overflow: ellipsis;
      width: 50%;
    }
    #searchInput:focus {
      border-color: #4d90fe;
    }
    .hide{
        
        visibility: hidden;
    }
    .hide{
    visibility: visible;
    }
    
</style>    
@endsection
@section('section')
<div class="ps-main-banner">
        <div class="ps-dark-overlay">
            <div class="container">
                <div class="ps-banner-content">
                    <h4>Post New Ad</h4>
                    <p><a href="index.html">Home</a> <span><i class="ti-angle-right"></i></span> <a href="insights.html">Dashboard</a> <span> <i class="ti-angle-right"></i></span> Post Ad</p>
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
    <div class="ps-posted-ads ps-profile-setting">
        <div class="ps-posted-ads__heading">
            <h5>Edit Ad</h5>
            <!-- <p>Click “Publish Ad” to Post Ad</p>
            <button id="post_ad" onclick="Save()" class="btn ps-btn">Publish Ad</button> -->
        </div>
        <div class="ps-profile-setting__content">
<!-- POST NEW AD FORM START -->
<form class="ps-profile-form" action="#" id="form" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
<input value="{{$post_ad->id}}" type="hidden" name="id" id="id">
<input value="{{Auth::user()->id}}" type="hidden" name="customer_id" id="customer_id">
    <div class="ps-profile--row">
        <div class="form-group">
            <label>
                <select name="featured_ad" id="featured_ad" class="form-control">
                    <option value="" disabled="" hidden="">Featured Ad:</option>
                    <option {{ ($post_ad->featured_ad == '1' ? ' selected' : '') }} value="1">Yes</option>
                    <option {{ ($post_ad->featured_ad == '0' ? ' selected' : '') }} value="0">No</option>
                </select>
            </label>
        </div>
        <div class="form-group">
            <label>
                <select name="category" id="category" class="form-control">
                    <option value="" disabled="" hidden="">Select Category(s)*</option>
                    @foreach($category as $row)
                    @if($row->id == $post_ad->category)
                    <option selected value="{{$row->id}}">{{$row->category}}</option>
                    @else
                    <option value="{{$row->id}}">{{$row->category}}</option>
                    @endif
                    @endforeach
                </select>
            </label>
        </div>
        <div class="form-group">
            <label>
                <select name="subcategory" id="subcategory"  class="form-control">
                    <option value="" disabled="" hidden="">Select Sub Category(s)*</option>
                    @foreach($subcategory as $row)
                    @if($row->id == $post_ad->subcategory)
                    <option selected value="{{$row->id}}">{{$row->category}}</option>
                    @else
                    <option value="{{$row->id}}">{{$row->category}}</option>
                    @endif
                    @endforeach
                </select>
            </label>
        </div>
        <div class="form-group">
            <input value="{{$post_ad->title}}" type="text" class="form-control" id="title" name="title" required="" placeholder="Your Ad Title Here*">
        </div>
        <div class="form-group">
            <input value="{{$post_ad->price}}" type="text" class="form-control" id="price" name="price" required="" placeholder="Item/ Product Price?*">
        </div>
        <div class="form-group">
            <input value="{{$post_ad->mobile}}" type="number" class="form-control" id="mobile" name="mobile" required="" placeholder="Mobile Number*">
        </div>
        <div class="form-group">
            <input value="{{$post_ad->email}}" type="email" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <input value="{{$post_ad->skype}}" type="text" class="form-control" id="skype" name="skype" placeholder="Skype">
        </div>
        <div class="form-group ps-fullwidth">
            <textarea name="description" id="description" class="form-control" placeholder="Description*">{{$post_ad->description}}</textarea>
        </div>
    </div>


<!-- POST NEW AD FORM END -->
<div class="ps-profile-map ps-fullwidth">
    <div class="col-sm-12">
        <div class="form-group">
            <label>Enter a location</label>
            <input id="searchInput" class="input-controls form-control" type="text" placeholder="Enter a location">
            <input value="{{$post_ad->address}}" type="hidden" name="address" id="address">
            <input value="{{$post_ad->latitude}}" type="hidden" name="latitude" id="latitude">
            <input value="{{$post_ad->longitude}}" type="hidden" name="longitude" id="longitude">
        </div>
    </div>
    <div class="col-sm-12">
        <div class="map" id="map" style="width: 100%; height: 300px;"></div>
    </div>
</div>
<!-- ADD FEATURES START -->
<div class="ps-add-feature">
    <div class="ps-add-feature__heading">
        <h5>Add Features</h5> 
        <a data-toggle="collapse" href="#collapseFeature" role="button" aria-expanded="false" aria-controls="collapseFeature"><i class="ti-angle-down"></i></a>   
    </div>
    <div class="collapse show" id="collapseFeature">
        <ul class="ps-profile-setting__imgs ps-add-feature__content ps-item-mesonry row " style="position: relative; height: 718px;">
            <li class="ps-feature-select col-md-6 ps-ms-item" style="position: absolute; left: 0px; top: 0px;">
                <h5>Printable:</h5>
                <input {{ ($post_ad->printable == '0' ? ' checked' : '') }} value="0" id="feature1" type="radio" name="printable">
                <label for="feature1">
                    <span> No</span>                          
                </label>
                <input {{ ($post_ad->printable == '1' ? ' checked' : '') }} value="1" id="feature2" type="radio" name="printable">
                <label for="feature2">
                    <span>Yes</span>
                </label>
            </li>
            <li class="ps-feature-select col-md-6 ps-ms-item" style="position: absolute; left: 328px; top: 0px;">
                <h5>Paper Quality:</h5>
                <input {{ ($post_ad->paper_quality == 'Premium Quality' ? ' checked' : '') }} value="Premium Quality" id="feature3" type="radio" name="paper_quality">
                <label for="feature3">
                    <span>Premium Quality</span>
                </label>
                <input {{ ($post_ad->paper_quality == 'Best Quality' ? ' checked' : '') }} value="Best Quality" id="feature4" type="radio" name="paper_quality">
                <label for="feature4">
                    <span>Best Quality</span>
                </label>
                <input {{ ($post_ad->paper_quality == 'Regular Quality' ? ' checked' : '') }} value="Regular Quality" id="feature5" type="radio" name="paper_quality">
                <label for="feature5">
                    <span>Regular Quality</span>
                </label>
            </li>
            <li class="ps-feature-select ps-paper-color col-md-6 ps-ms-item" style="position: absolute; left: 0px; top: 97px;">
                <h5>Paper Color:</h5>
                <input {{ ($post_ad->paper_color == 'Black' ? ' checked' : '') }} value="Black" id="feature6" type="radio" name="paper_color">
                <label for="feature6">
                    <span class="ps-black">Black</span>
                </label>
                <input {{ ($post_ad->paper_color == 'Off White' ? ' checked' : '') }} value="Off White" id="feature7" type="radio" name="paper_color">
                <label for="feature7">
                    <span class="ps-off-white">Off White</span>
                </label>
                <input {{ ($post_ad->paper_color == 'Yellow' ? ' checked' : '') }} value="Yellow" id="feature8" type="radio" name="paper_color">
                <label for="feature8">
                    <span class="ps-yellow">Yellow</span>
                </label>
                <input {{ ($post_ad->paper_color == 'Orange' ? ' checked' : '') }} value="Orange" id="feature9" type="radio" name="paper_color">
                <label for="feature9">
                    <span class="ps-orange">Orange</span>
                </label>
                <input {{ ($post_ad->paper_color == 'Blue' ? ' checked' : '') }} value="Blue" id="feature10" type="radio" name="paper_color">
                <label for="feature10">
                    <span class="ps-blue">Blue</span>
                </label>
                <input {{ ($post_ad->paper_color == 'Pink' ? ' checked' : '') }} value="Pink" id="feature11" type="radio" name="paper_color">
                <label for="feature11">
                    <span class="ps-pink">Pink</span>
                </label>
                <input {{ ($post_ad->paper_color == 'Other' ? ' checked' : '') }} value="Other" id="feature12" type="radio" name="paper_color">
                <label for="feature12">
                    <span>Other</span>
                </label>
                <input value="{{$post_ad->paper_other}}" name="paper_other" id="paper_other" type="text" class="form-control" placeholder="Add Color Name">
            </li>
            <li class="ps-feature-select col-md-6 ps-ms-item" style="position: absolute; left: 328px; top: 126px;">
                <h5>Soft Copy:</h5>
                <input {{ ($post_ad->soft_copy == '2' ? ' checked' : '') }} value="2" id="feature13" type="radio" name="soft_copy">
                <label for="feature13">
                    <span>Availability On Demand</span>
                </label>
                <input {{ ($post_ad->soft_copy == '0' ? ' checked' : '') }} value="1" id="feature14" type="radio" name="soft_copy">
                <label for="feature14">
                    <span>Yes</span>
                </label>
                <input {{ ($post_ad->soft_copy == '1' ? ' checked' : '') }} value="0" id="feature15" type="radio" name="soft_copy">
                <label for="feature15">
                    <span>No</span>
                </label>
            </li>
            <li class="ps-feature-select col-md-6 ps-ms-item" style="position: absolute; left: 328px; top: 252px;">
                <h5>Color/ B&W:</h5>
                <input {{ ($post_ad->color_b_w == 'B&W Single Side' ? ' checked' : '') }} value="B&W Single Side" id="feature16" type="radio" name="color_b_w">
                <label for="feature16">
                    <span>B&W Single Side</span>
                </label>
                <input {{ ($post_ad->color_b_w == 'B&W Double Side' ? ' checked' : '') }} value="B&W Double Side" id="feature17" type="radio" name="color_b_w">
                <label for="feature17">
                    <span>B&W Double Side</span>
                </label>
                <input {{ ($post_ad->color_b_w == 'Color Single Side' ? ' checked' : '') }} value="Color Single Side" id="feature18" type="radio" name="color_b_w">
                <label for="feature18">
                    <span>Color Single Side</span>
                </label>
                <input {{ ($post_ad->color_b_w == 'Color Double Side' ? ' checked' : '') }} value="Color Double Side" id="feature19" type="radio" name="color_b_w">
                <label for="feature19">
                    <span>Color Double Side</span>
                </label>
            </li>
            <li class="ps-feature-select col-md-6 ps-ms-item" style="position: absolute; left: 0px; top: 398px;">
                <h5>Spring Bind:</h5>
                <input {{ ($post_ad->spring_bind == '0' ? ' checked' : '') }} value="0" id="feature20" type="radio" name="spring_bind">
                <label for="feature20">
                    <span>No</span>
                </label>
                <input {{ ($post_ad->spring_bind == '1' ? ' checked' : '') }} value="1" id="feature21" type="radio" name="spring_bind">
                <label for="feature21">
                    <span>Yes</span>
                </label>
            </li>
            <li class="ps-feature-select col-md-6 ps-ms-item" style="position: absolute; left: 328px; top: 407px;">
                <h5>Door Step Delivery:</h5>
                <input {{ ($post_ad->door_step_delivery == '0' ? ' checked' : '') }} value="0" id="feature22" type="radio" name="door_step_delivery">
                <label for="feature22">
                    <span>No</span>
                </label>
                <input {{ ($post_ad->door_step_delivery == '1' ? ' checked' : '') }} value="1" id="feature23" type="radio" name="door_step_delivery">
                <label for="feature23">
                    <span>Yes</span>
                </label>
            </li>
            <li class="ps-feature-select col-md-6 ps-ms-item" style="position: absolute; left: 0px; top: 495px;">
                <h5>Laminated:</h5>
                <input {{ ($post_ad->laminated == '0' ? ' checked' : '') }} value="0" id="feature24" type="radio" name="laminated">
                <label for="feature24">
                    <span>No</span>
                </label>
                <input {{ ($post_ad->laminated == '1' ? ' checked' : '') }} value="1" id="feature25" type="radio" name="laminated">
                <label for="feature25">
                    <span>Yes</span>
                </label>
            </li>
            <li class="ps-feature-select col-md-6 ps-ms-item" style="position: absolute; left: 328px; top: 504px;">
                <h5>Color:</h5>
                <input {{ ($post_ad->color == 'RGB' ? ' checked' : '') }} value="RGB" id="feature26" type="radio" name="color">
                <label for="feature26">
                    <span>RGB</span>
                </label>
                <input {{ ($post_ad->color == 'CMYK' ? ' checked' : '') }} value="CMYK" id="feature27" type="radio" name="color">
                <label for="feature27">
                    <span>CMYK</span>
                </label>
                <input {{ ($post_ad->color == 'B&W' ? ' checked' : '') }} value="B&W" id="feature28" type="radio" name="color">
                <label for="feature28">
                    <span>&W</span>
                </label>
                <input {{ ($post_ad->color == 'Others' ? ' checked' : '') }} value="Others" id="feature29" type="radio" name="color">
                <label for="feature29">
                    <span>Others</span>
                </label>
                <input value="{{$post_ad->other_color}}" name="other_color" id="other_color" type="text" class="form-control" placeholder="Mention Here">
            </li>
        </ul>
    </div>
</div>
<!-- ADD FEATURES END -->
<div class="ps-url">
    <div class="ps-url__input">
        <input value="{{$post_ad->video_link}}" name="video_link" id="video_link" type="text" class="form-control" placeholder="Ad Video Link(URL)">
    </div>
</div>
<div class="ps-profile-setting__upload">
    <h5>Profile Image</h5>
    <div class="ps-url">
        <div class="ps-url__input">
            <input name="profile_image" id="profile_image" type="file" class="form-control" placeholder="Ad Images">
        </div>
        <img style="width: 80px;" src="/upload_image/{{$post_ad->image}}">
    </div>
</div>

<div class="ps-profile-setting__upload">
    <h5>Upload Mulitiple Images</h5>
    <div class="ps-url">
        <div class="ps-url__input">
            <input multiple name="images[]" id="images" type="file" class="form-control" placeholder="Ad Images">
        </div>
    </div>
</div>

</form>
<!-- PROFILE SETTINGS START -->
<div class="ps-profile-setting__upload">
<h5>View Images</h5>
<form class="ps-profile-setting__imgs ps-x-axis mCustomScrollbar _mCS_1">
	<div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_horizontal mCSB_inside" style="max-height: none;" tabindex="0"><div id="mCSB_1_container" class="mCSB_container" style="position: relative; top: 0px; left: 0px; width: 758px;" dir="ltr">
		@foreach($post_ad_image as $row)
	        <label>
	            <span>
	                <img style="width: 150px !important;" src="/upload_image/{{$row->image}}" class="mCS_img_loaded">
	                <a onclick="Delete({{$row->id}})" href="javascript:void(0);" class="ps-trash">
	                	<span><i class="ti-trash"></i></span>
	                </a>
	                <!-- <span class="ps-tick"><span>
	                	<i class="fas fa-check"></i></span>
	                </span> -->
	            </span>
	        </label>
	    @endforeach
	    </div>
	</div>
 </form>
</div>
<!-- PROFILE SETTINGS END -->
                                
            <div class="ps-profile-setting__save">
                <button id="save" onclick="Save()" class="btn ps-btn">Save Changes</button>
                <p>Click “Save Changes” to update</p>
            </div>
        </div>
    </div>
</div>

<!-- End MAIN CONTENT START -->
              
        </section>
    </main>
@endsection
@section('js')
<script src="/js/infobox/data.json"></script>
<script src="/js/infobox/mapclustering.js"></script>
<script src="/js/vendor/markerclusterer.min.js"></script>
<script src="/js/vendor/mapclustering.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJ3q6w3hiHe_MIbB1Jy31bGOwL8LYlwJw"></script>
<script src="/js/vendor/gmap3.min.js"></script>

<script src="/js/vendor/masonry.pkgd.min.js"></script>
<script src="/js/vendor/jquery.mCustomScrollbar.concat.min.js"></script>

<script>
/* script */
function initialize() {
   var latlng = new google.maps.LatLng(24.453884,54.3773438);
    var map = new google.maps.Map(document.getElementById('map'), {
      center: latlng,
      zoom: 13
    });
    var marker = new google.maps.Marker({
      map: map,
      position: latlng,
      draggable: true,
      anchorPoint: new google.maps.Point(0, -29)
   });
    var input = document.getElementById('searchInput');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    var geocoder = new google.maps.Geocoder();
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);
    var infowindow = new google.maps.InfoWindow();   
    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }
  
        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }
       
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);          
    
        bindDataToForm(place.formatted_address,place.geometry.location.lat(),place.geometry.location.lng());
        infowindow.setContent(place.formatted_address);
        infowindow.open(map, marker);
       
    });
    // this function will work on marker move event into map 
    google.maps.event.addListener(marker, 'dragend', function() {
        geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[0]) {        
              bindDataToForm(results[0].formatted_address,marker.getPosition().lat(),marker.getPosition().lng());
              infowindow.setContent(results[0].formatted_address);
              infowindow.open(map, marker);
          }
        }
        });
    });
}
function bindDataToForm(address,lat,lng){
   document.getElementById('address').value = address;
   document.getElementById('latitude').value = lat;
   document.getElementById('longitude').value = lng;
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>

<script>
$('.new-post-ads').addClass('active');

function Save(){
    var formData = new FormData($('#form')[0]);
    // var description = tinyMCE.get('description').getContent();
    // formData.append('description', description);
    $.ajax({
        url : '/customer/update-post-ads',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {                
          $("#form")[0].reset();
          toastr.success(data, 'Successfully Save');
          window.location = "/customer/my-ads";
        },error: function (data) {
          var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
            toastr.error(obj[0]);
          });
        }
    });
}

function Delete(id){
    var r = confirm("Are you sure");
    if (r == true) {
      $.ajax({
        url : '/customer/delete-post-image/'+id,
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