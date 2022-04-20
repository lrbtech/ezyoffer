@extends('customers.layouts')
@section('css')
<style>
   .center {
    display:inline;
    margin: 3px;
    padding:5px;
   }

  .form-input {
    width:150px;
    /* padding:3px; */
    background:#fff;
    /* border:2px dashed dodgerblue; */
  }
  .form-input input {
    display:none;
  }
  .form-input label {
    display:block;
    width:150px;
    height: auto;
    max-height: 150px;
    background:#666;
    border-radius:10px;
    cursor:pointer;
  }
  
  .form-input img {
    width:150px;
    height: 150px;
    margin: 2px;
    opacity: .4;
  }

  .imgRemove{
    position: relative;
    bottom: 154px;
    left: 80%;
    background-color: transparent;
    border: none;
    font-size: 50px;
    outline: none;
  }
  .imgRemove::after{
    /* content: ' \21BA'; */
    content: ' \00d7';
    color: #fff;
    font-weight: 900;
    border-radius: 8px;
    cursor: pointer;
  }
</style>
@endsection
@section('section')
         <!-- Page Title -->
         <section class="page-title style-two" style="background-image: url(/assets/images/background/page-title.jpg);">
            <div class="auto-container">
               <div class="content-box centred mr-0">
                  <div class="title">
                     <h1>{{$language[236][session()->get('lang')]}}</h1>
                  </div>
                  <ul class="bread-crumb clearfix">
                     <li><a class="translate" href="/">Home</a></li>
                     <li>{{$language[236][session()->get('lang')]}}</li>
                  </ul>
               </div>
            </div>
         </section>
         <!-- End Page Title -->
         <!-- category-details -->
         <section id="show_spinner" class="category-details bg-color-2">
            <div class="auto-container">
               <div class="row clearfix">
                  <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                  @include('customers.menu')
                  </div>
                  <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                     <form id="form" method="POST" class="default-form" enctype="multipart/form-data">
                     {{csrf_field()}}
                     <input type="hidden" name="id" value="{{$post_ad->id}}">
                        <div class="box-section">
                           <div class="section-single">
                              <div class="form-group">
                                 <label>{{$language[215][session()->get('lang')]}}</label>
                                 <input value="{{$post_ad->title}}" name="title" id="title" type="text" class="form-control" placeholder="{{$language[216][session()->get('lang')]}}">
                              </div>
                              <div class="form-group">
                                 <label>{{$language[217][session()->get('lang')]}} <br><span>({{$language[218][session()->get('lang')]}} )</span> </label>
                              </div>
                              <div id="image_view" class="row">
                                 <div value="1" class="center form-input panel_image">
                                    <label for="file-ip-1">
                                    <img id="file-ip-1-preview" src="/upload_image/{{$post_ad->image}}">
                                    <!-- <button type="button" class="imgRemove" onclick="myImgRemove(1)"></button> -->
                                    </label>
                                    <input type="file" name="profile_image" id="file-ip-1" accept=".png,.jpg,.jpeg" onchange="showPreview(event, 1);">
                                 </div>
                                 @foreach($post_ad_image as $key => $row)
                                 <div value="{{$key+2}}" class="center form-input panel_image">
                                    <label for="file-ip-{{$key+2}}">
                                    <img id="file-ip-{{$key+2}}-preview" src="/upload_image/{{$row->image}}">
                                    <button type="button" class="imgRemove" onclick="Delete({{$row->id}})"></button>
                                    </label>
                                    <input type="hidden" name="image_id[]" value="{{$row->id}}">
                                    <input type="file" name="images[]" id="file-ip-{{$key+2}}" accept=".png,.jpg,.jpeg" onchange="showPreview(event, {{$key+2}});">
                                 </div>
                                 @endforeach
                                 <div class="work center form-input">
                                    <div class="img" style="height:150px !important;background-color:#091a3a !important;">
                                       <a onclick="AddImages()" class="create-story" href="javascript:void(0)">
                                          <div class="fas fa-plus"></div>
                                          <h4 class="story-line">Add More Images</h4>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <a href="javascript:void(0)" id="imagesave" onclick="ImageUpdate()" class="theme-btn-one">{{$language[237][session()->get('lang')]}}</a>
                              </div>
                              <div class="form-group">
                                 <label class="col-form-label">{{$language[219][session()->get('lang')]}}*</label>
                                 <label>
                                    <select name="category" id="category" class="form-control select">
                                       <option value="">{{$language[220][session()->get('lang')]}}*</option>
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
                              <!-- <div class="form-group">
                                 <label class="col-form-label">Select Sub Category(s)*</label>
                                 <label>
                                    <select name="subcategory" id="subcategory" class="form-control select">
                                       <option value="" disabled="" selected="" hidden="">Select Sub Category(s)*</option>
                                       <option value="10">Tablets</option>
                                    </select>
                                 </label>
                              </div> -->
                              <div class="form-group">
                                 <label class="col-form-label"> {{$language[221][session()->get('lang')]}}</label>
                                 <label>
                                    <select name="post_type" id="post_type" class="form-control select">
                                        <option value="" selected="">{{$language[222][session()->get('lang')]}}</option>
                                       <option {{ ($post_ad->post_type == '0' ? ' selected' : '') }} value="0">{{$language[250][session()->get('lang')]}}</option>
                                       <option {{ ($post_ad->post_type == '1' ? ' selected' : '') }} value="1">{{$language[251][session()->get('lang')]}}</option>
                                       <!-- <option {{ ($post_ad->post_type == '2' ? ' selected' : '') }} value="2">Live Story</option> -->
                                    </select>
                                 </label>
                              </div>
                              <div class="form-group">
                                 <label class="col-form-label">{{$language[223][session()->get('lang')]}}</label>
                                 <input value="{{$post_ad->price}}" type="number" class="form-control" id="price" name="price" required="" placeholder="{{$language[224][session()->get('lang')]}}">
                              </div>
                              <div class="form-group ps-fullwidth">
                                 <label class="col-form-label">{{$language[225][session()->get('lang')]}}</label>
                                 <textarea name="description" id="description" class="form-control" placeholder="{{$language[226][session()->get('lang')]}}*" spellcheck="false">{{$post_ad->description}}</textarea>
                              </div>
                              <!-- <div class="form-group">
                                 <label class="col-form-label">Mobile Number</label>
                                 <input value="{{$post_ad->mobile}}" type="number" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number*">
                              </div> -->
                              <!-- <div class="form-group">
                                 <label>Mobile</label>
                                 <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                          <span class="input-group-text">+971</span>
                                    </div>
                                    <input value="{{$post_ad->mobile}}" type="number" class="form-control" name="mobile" id="mobile" placeholder="Mobile Number">
                                 </div>
                                 <span id="mobile_error"></span>
                              </div>
                              <div class="form-group">
                                 <label class="col-form-label">Email</label>
                                 <input value="{{$post_ad->email}}" type="email" class="form-control" id="email" name="email" placeholder="Email">
                              </div> -->
                           </div>
                        </div>
                        <div class="box-section">
                           <div class="section-single">
                              <ul class="ps-profile-setting__imgs ps-add-feature__content ps-item-mesonry row form-group-new">
                                 <li class="ps-feature-select col-md-6 ps-ms-item">
                                    <h5>{{$language[227][session()->get('lang')]}}</h5>
                                    <label for="item_conditions1">
                                    <input value="New" id="item_conditions1" type="radio" name="item_conditions" {{ ($post_ad->item_conditions == 'New' ? ' checked' : '') }}>
                                    <span>New</span>
                                    </label>
                                    <label for="item_conditions2">
                                    <input value="Used (Looks New)" id="item_conditions2" type="radio" name="item_conditions" {{ ($post_ad->item_conditions == 'Used (Looks New)' ? ' checked' : '') }}>
                                    <span>Used (Looks New)</span>
                                    </label>
                                    <label for="item_conditions3">
                                    <input value="Used (Good)" id="item_conditions3" type="radio" name="item_conditions" {{ ($post_ad->item_conditions == 'Used (Good)' ? ' checked' : '') }}>
                                    <span>Used (Good)</span>
                                    </label>
                                    <label for="item_conditions4">
                                    <input value="Used (Some Damage)" id="item_conditions4" type="radio" name="item_conditions" {{ ($post_ad->item_conditions == 'Used (Some Damage)' ? ' checked' : '') }}>
                                    <span>Used (Some Damage)</span>
                                    </label>
                                    <label for="item_conditions5">
                                    <input value="Free" id="item_conditions5" type="radio" name="item_conditions" {{ ($post_ad->item_conditions == 'Free' ? ' checked' : '') }}>
                                    <span>Free</span>
                                    </label>                                                                       
                                 </li>
                              </ul>

                              <table id="featuresTable" class="table">
                                    <thead class="thead-primary">
                                        <tr style="text-align: center;">
                                             <th style="width: 80%;">{{$language[228][session()->get('lang')]}}</th>
                                             <th style="width: 20%;padding: .0rem !important;">
                                                <button type="button" class="btn btn-default" onclick="addRow()" id="addRowBtn"> <i class="fa fa-plus"></i></button>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="featuresTabletbody">
                                    @foreach($post_ad_features as $key => $row)
                                    <tr value="{{$key+1}}" id="row{{$key+1}}">
                                        <td>
                                            <input value="{{$row->features}}" class="form-control" type="text" name="features[]" id="features{{$key+1}}" autocomplete="off"  />
                                        </td>
                                        <td align="center">
                                            <button class="btn btn-default" type="button" onclick="removefeaturesrow({{$key+1}})"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    	<tr>
                                            <td>
                                            	<button type="button" onclick="addRow()" class="theme-btn-one"><span class="icon-label"><i class="fa fa-plus"></i> </span><span class="btn-text">{{$language[229][session()->get('lang')]}}</span></button>
                                            </td>
                                            <td></td>
                                        </tr>

                                    </tfoot>
                                </table>


                           </div>
                        </div>
                        <div class="box-section">
                           <div class="section-single">
                              {{--<div class="form-group">
                                 <label class="col-form-label">{{$language[230][session()->get('lang')]}}*</label>
                                 <textarea class="form-control" name="address" id="address">{{$post_ad->address}}</textarea>
                              </div>--}}
                              <div class="form-group">
                                 <label class="col-form-label">{{$language[231][session()->get('lang')]}}*</label>
                                 <label>
                                    <select name="city" id="city" class="form-control select">
                                        <option value="">{{$language[232][session()->get('lang')]}}</option>
                                        @foreach($city as $row)
                                        @if($row->id == $post_ad->city)
                                        <option selected value="{{$row->id}}">{{$row->city}}</option>
                                        @else
                                        <option value="{{$row->id}}">{{$row->city}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                 </label>
                              </div>
                              <div class="form-group">
                                 <label class="col-form-label">{{$language[233][session()->get('lang')]}}</label>
                                 <label>
                                    <select name="area" id="area" class="form-control select">
                                        <option value="">{{$language[234][session()->get('lang')]}}</option>
                                       @foreach($area as $row)
                                       @if($row->id == $post_ad->area)
                                       <option selected value="{{$row->id}}">{{$row->city}}</option>
                                       @else
                                       <option value="{{$row->id}}">{{$row->city}}</option>
                                       @endif
                                       @endforeach
                                    </select>
                                 </label>
                              </div>
                              <div class="ps-profile-map ps-fullwidth">
                                 <div class="col-sm-12">
                                    <div class="form-group">
                                        <!-- <label>Enter a location</label>
                                          <input id="searchInput" class="input-controls form-control" type="text" placeholder="Enter a location"> -->
                                        <!-- <input type="hidden" name="address" id="address"> -->
                                        <input value="{{$post_ad->latitude}}" type="hidden" name="latitude" id="latitude">
                                        <input value="{{$post_ad->longitude}}" type="hidden" name="longitude" id="longitude">
                                    </div>
                                 </div>
                                 <div class="col-sm-12">
                                    <!-- <div class="map" id="map" style="width: 100%; height: 300px;">
                                       </div> -->
                                    <iframe id="map" src="http://maps.google.com/maps?q=abu dhabi&amp;z=16&amp;output=embed" style="width: 100%; height: 300px;border:0;" frameborder="0" allowfullscreen=""></iframe>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <button id="save" onclick="Save()" class="theme-btn-one">{{$language[238][session()->get('lang')]}}</button>
                     </form>
                  </div>
               </div>
            </div>
         </section>
         <!-- category-details end -->
@endsection
@section('js')
<script type="text/javascript">
$('.sidebar_post_ad').addClass('active');

$('#city').change(function(){
  var id = $('#city').val();
  $.ajax({
    url : '/get-area/'+id,
    type: "GET",
    success: function(data)
    {
        $('#area').html(data);
    }
  });
});

$('#area').change(function(){
  var city = $('#city').val();
  var area = $('#area').val();
  $.ajax({
    url : '/get-city-name/'+city+'/'+area,
    type: "GET",
    success: function(data)
    {
        $('#map').attr("src", "http://maps.google.com/maps?q="+data.city + data.area+"&z=16&output=embed");
    }
  });
});

var spinner = new jQuerySpinner({
   parentId: 'show_spinner'
});

function Save(){
    spinner.show();
    $(".text-danger").remove();
    $('.form-group').removeClass('has-error').removeClass('has-success');
    $("#save").attr("disabled", true);
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
            if(data.status == 1){
               Swal.fire({
                  title: data.message,
                  icon: "error",
               }).then(function() {
                  $("#save").attr("disabled", false);
                  spinner.hide();
               });
            }  
            else{                
               Swal.fire({
                  title: data.message,
                  icon: "success",
               }).then(function() {
                  window.location = "/customer/my-ads";
                  $("#save").attr("disabled", false);
                  spinner.hide();
               });
            }
        },error: function (data) {
          var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
                //toastr.error(obj[0]);
                if(i == 'mobile'){
                    $("#mobile_error").after('<p class="text-danger">'+obj[0]+'</p>');
                    $('#mobile').closest('.form-group').addClass('has-error');
                }
                else{
                    $("#"+i).after('<p class="text-danger">'+obj[0]+'</p>');
                    $('#'+i).closest('.form-group').addClass('has-error');
                }
            });
            $("#save").attr("disabled", false);
            spinner.hide();
         }
    });
}

var spinner1 = new jQuerySpinner({
   parentId: 'image_view'
});

function ImageUpdate(){
    spinner1.show();
    $("#imagesave").attr("disabled", true);
    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : '/customer/update-post-ads-image',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {                
            if(data.status == 1){
               Swal.fire({
                  title: data.message,
                  icon: "error",
               }).then(function() {
                  $("#imagesave").attr("disabled", false);
                  spinner1.hide();
               });
            }  
            else if(data.status == 2){
               toastr.error(data.message);
               $("#imagesave").attr("disabled", false);
               spinner1.hide();
            } 
            else{                
               Swal.fire({
                  title: data.message,
                  icon: "success",
               }).then(function() {
                  location.reload();
                  $("#imagesave").attr("disabled", false);
                  spinner1.hide();
               });
            }
        },error: function (data) {
          var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
               toastr.error(obj[0]);
            });
            $("#imagesave").attr("disabled", false);
            spinner1.hide();
         }
    });
}

function Delete(id){
    var r = confirm("Are you sure Completely delete from our site");
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

$('#category').change(function(){
  var id = $('#category').val();
  $.ajax({
    url : '/get-sub-category/'+id,
    type: "GET",
    success: function(data)
    {
        $('#subcategory').html(data);
    }
  });
});


function addRow() {
	var tableLength = $("#featuresTable tbody tr").length;
	var count;
	if(tableLength > 0) {		
		count = $("#featuresTable tbody tr:last").attr('value');
		count = Number(count) + 1;
	} else {
		count = 1;
	}


var tr = '<tr value="'+count+'" id="row'+count+'">'+
  	'<td>'+
		'<input class="form-control" type="text" name="features[]" id="features'+count+'" autocomplete="off"  />'+
	'</td>'+
	'<td align="center">'+
		'<button class="btn btn-default" type="button" onclick="removefeaturesrow('+count+')"><i class="fa fa-trash"></i></button>'+
	'</td>'+
'</tr>';

if(tableLength > 0) {							
	$("#featuresTable tbody tr:last").after(tr);
} else {				
	$("#featuresTable tbody").append(tr);
}		
// $("#features"+count).focus();

} // /add row


function removefeaturesrow(row = null)
{
	if(confirm('Are you sure delete this row?'))
	{
	   var tableFeaturesLength = $("#featuresTable tbody tr").length;
		if(tableFeaturesLength > '1') {
			$("#row"+row).remove();
			var previous_row = row - 1;
			var next_row = row + 1;
			$("#features"+previous_row).focus();		
			$("#features"+next_row).focus();		
		}
	}
}

var city = $('#city').val();
var area = $('#area').val();
$.ajax({
    url : '/get-city-name/'+city+'/'+area,
    type: "GET",
    success: function(data)
    {
        $('#map').attr("src", "http://maps.google.com/maps?q="+data.city + data.area+"&z=16&output=embed");
    }
});

function showPreview(event, number){
   if(event.target.files.length > 0){
      let src = URL.createObjectURL(event.target.files[0]);
      let preview = document.getElementById("file-ip-"+number+"-preview");
      preview.src = src;
      preview.style.display = "block";
   } 
}
// function myImgRemove(number) {
//    document.getElementById("file-ip-"+number+"-preview").src = "https://i.ibb.co/ZVFsg37/default.png";
//    document.getElementById("file-ip-"+number).value = null;
// }

function AddImages() {

var tableLength = $("#image_view .panel_image").length;
var count;
if(tableLength > 0) {		
   count = $("#image_view .panel_image:last").attr('value');
   count = Number(count) + 1;
} else {
   count = 1;
}
var tr =
'<div value="'+count+'" id="imagerows'+count+'" class="center form-input panel_image">'+
   '<label for="file-ip-'+count+'">'+
   '<img id="file-ip-'+count+'-preview" src="https://i.ibb.co/ZVFsg37/default.png">'+
   '<button type="button" class="imgRemove" onclick="removeImageRows('+count+')"></button>'+
   '</label>'+
   '<input type="hidden" name="image_id[]">'+
   '<input type="file" name="images[]" id="file-ip-'+count+'" accept=".png,.jpg,.jpeg" onchange="showPreview(event, '+count+');">'+
'</div>';

if(tableLength > 0) {	
   $("#image_view .panel_image:last").after(tr);
} else {	
   $("#image_view .panel_image").append(tr);
}	 

} // /add row


function removeImageRows(row)
{
   if(confirm('Are you sure delete this row?'))
   {
      $("#imagerows"+row).remove();
   }
}
</script>
@endsection