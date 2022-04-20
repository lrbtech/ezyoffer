@extends('customers.layouts')
@section('css')
@endsection
@section('section')

        <!-- Page Title -->
        <section class="page-title style-two" style="background-image: url(/assets/images/background/page-title.jpg);">
            <div class="auto-container">
                <div class="content-box centred mr-0">
                    <div class="title">
                        <h1>{{$language[200][session()->get('lang')]}}</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a class="translate" href="/">Home</a></li>
                        <li>{{$language[200][session()->get('lang')]}}</li>
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
<form id="form" method="POST" class="default-form">
{{csrf_field()}}
<input type="hidden" name="id" value="{{$user->id}}">
<div class="box-section">
    <div class="user-pro-section">
        <div class="profile-details section-single">
            <h2 class="title-in-customer">{{$language[201][session()->get('lang')]}}</h2>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>{{$language[202][session()->get('lang')]}}*</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{$user->first_name}}" required="" placeholder="First Name*">
                </div>
                <div class="form-group col-md-6">
                    <label>{{$language[203][session()->get('lang')]}}*</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{$user->last_name}}" required="" placeholder="Last Name*">
                </div>
            </div>
            <!-- <div class="form-group">
                <label>Mobile Number*</label>
                <input type="number" class="form-control" id="mobile" name="mobile" value="{{$user->mobile}}" required="" placeholder="Mobile Number*">
            </div> -->
            <div class="form-group">
                <label>{{$language[204][session()->get('lang')]}}</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <!-- <span class="input-group-text">+971</span> -->
                        <input style="width:100px;border: 1px solid #e6e8e8;padding: 10px 10px;font-size: 15px;color: #808288;" value="{{$user->country_code}}" name="country_code" id="country_code">
                    </div>
                    <input value="{{$user->mobile}}" type="number" class="form-control" name="mobile" id="mobile" placeholder="Mobile Number">
                </div>
                <span id="mobile_error"></span>
            </div>
            <div class="form-group">
                <label>{{$language[205][session()->get('lang')]}}</label>
                <input readonly type="email" class="form-control" id="email" name="email" value="{{$user->email}}" placeholder="Email">
            </div>

            <div class="form-group">
                <label>{{$language[206][session()->get('lang')]}}</label>
                <select onclick="OpenStore()" name="user_type" id="user_type" class="select">
                <option {{ ($user->user_type == '0' ? ' selected' : '') }} value="0">One Item Seller</option>
                <option {{ ($user->user_type == '1' ? ' selected' : '') }} value="1">Multiple Item Seller</option>
                <option {{ ($user->user_type == '2' ? ' selected' : '') }} value="2">Seller / Buyer</option>
                <!-- @if(!empty($used_package))
                @if($used_package->store_available == '1')
                <option {{ ($user->user_type == '1' ? ' selected' : '') }} value="1">Exclusive Shops</option>
                @endif 
                @endif  -->
                </select>
            </div>
        </div>
        <!-- <div class="change-password section-single">
            <h2 class="title-in-customer">Change password</h2>
            <div class="form-group">
                <label>Old Password</label>
                <input type="password" class="form-control">
            </div>
            <div class="form-group">
                <label>New password</label>
                <input type="password" class="form-control">
            </div>
            <div class="form-group">
                <label>Confirm password</label>
                <input type="password" class="form-control">
            </div>
        </div> -->

        <div class="preferences-settings section-single">
            <h2 class="title-in-customer">{{$language[207][session()->get('lang')]}}</h2>
            <div>
                <div id="profile-container">
                    @if($user->profile_image != '')
                    <img id="profileImage" style="width: 80px;" src="/upload_profile_image/{{$user->profile_image}}">
                    @else 
                    <image id="profileImage" src="/assets/images/icons/user-icon.png" />
                    @endif
                </div>
                <input id="imageUpload" type="file" name="profile_image" placeholder="Photo">
            </div>
        </div> 
      
        <div id="view_store" class="preferences-settings section-single">
            <h2 class="title-in-customer">{{$language[208][session()->get('lang')]}}</h2>
            <div class="form-group">
                <label>{{$language[209][session()->get('lang')]}}</label>
                <textarea class="form-control" id="description" name="description">{{$user->description}}</textarea>
            </div>
            <div class="form-group">
                <label>{{$language[210][session()->get('lang')]}}</label>
                <textarea class="form-control" id="address" name="address">{{$user->address}}</textarea>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>{{$language[211][session()->get('lang')]}}</label>
                    <select id="city" name="city" class="select">
                    <option value="">SELECT</option>
                    @foreach($city as $row)
                    @if($row->id == $user->city)
                    <option selected value="{{$row->id}}">{{$row->city}}</option>
                    @else
                    <option value="{{$row->id}}">{{$row->city}}</option>
                    @endif
                    @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>{{$language[212][session()->get('lang')]}}</label>
                    <select id="area" name="area" class="select">
                    <option value="">SELECT</option>
                    @foreach($area as $row)
                    @if($row->id == $user->area)
                    <option selected value="{{$row->id}}">{{$row->city}}</option>
                    @else
                    <option value="{{$row->id}}">{{$row->city}}</option>
                    @endif
                    @endforeach
                    </select>
                </div>
            </div>
        </div>  
        
        <!-- <div class="preferences-settings section-single">
            <h2 class="title-in-customer">Preferences Settings</h2>
            <div class="checkbox">
                <label><input type="checkbox" name="logged"> Comments are enabled on my ads </label>
                <label><input type="checkbox" name="receive"> I want to receive newsletter.</label>
                <label><input type="checkbox" name="want"> I want to receive advice on buying and selling. </label>
            </div>
        </div>     -->
        <button type="button" onclick="Save()" id="save" class="theme-btn-one">{{$language[213][session()->get('lang')]}}</button>
        <!-- <a href="#" class="theme-btn-one color-2">Cancle</a> -->
    </div>
</div>
</form>



                    </div>
                </div>
            </div>
        </section>
        <!-- category-details end -->


@endsection
@section('js')
<script type="text/javascript">
$('.sidebar_settings').addClass('active');

function Save(){
    $(".text-danger").remove();
    $('.form-group').removeClass('has-error').removeClass('has-success');
    $("#save").attr("disabled", true);
    var formData = new FormData($('#form')[0]);
    // var description = tinyMCE.get('description').getContent();
    // formData.append('description', description);
    $.ajax({
        url : '/customer/update-profile-settings',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {                
            Swal.fire({
                text: 'Successfully Update',
                icon: 'success',
                }).then((result) => {
                if (result.isConfirmed) {
                    $("#form")[0].reset();
                    location.reload();
                    $("#save").attr("disabled", false);
                }
            }) 
        },error: function (data) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
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
        }
    });
}

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

// $('#view_store').hide();
// OpenStore();
// function OpenStore(){
//     var user_type = $('#user_type').val();
//     if(user_type == '1'){
//         $('#view_store').show();
//     }
//     else{
//         $('#view_store').hide();
//     }
// }
</script>
@endsection