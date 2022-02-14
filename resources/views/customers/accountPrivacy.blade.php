@extends('customers.layouts')
@section('css')
@endsection
@section('section')


        <!-- Page Title -->
        <section class="page-title style-two" style="background-image: url(/assets/images/background/page-title.jpg);">
            <div class="auto-container">
                <div class="content-box centred mr-0">
                    <div class="title">
                        <h1>{{$language[239][session()->get('lang')]}}</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a class="translate" href="/">Home</a></li>
                        <li>{{$language[239][session()->get('lang')]}}</li>
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
<form id="form" method="post" class="default-form">
{{csrf_field()}}
<div class="box-section">
    <div class="user-pro-section">
        <div class="change-password section-single">
            <h2 class="title-in-customer">{{$language[240][session()->get('lang')]}}</h2>
            <div class="form-group">
                <label>{{$language[241][session()->get('lang')]}}</label>
                <input name="oldpassword" id="oldpassword" type="password" class="form-control">
            </div>
            <div class="form-group">
                <label>{{$language[242][session()->get('lang')]}}</label>
                <input name="password" id="password" type="password" class="form-control" >
            </div>
            <div class="form-group">
                <label>{{$language[243][session()->get('lang')]}}</label>
                <input name="password_confirmation" id="password_confirmation" type="password" class="form-control">
            </div>
        </div>

        <!-- <div class="preferences-settings section-single">
            <h2 class="title-in-customer">Preferences Settings</h2>
            <div class="checkbox">
                <label><input type="checkbox" name="logged" checked="true" disabled=""> Comments are enabled on my ads </label>
                <label><input type="checkbox" name="receive"> I want to receive newsletter.</label>
                <label><input type="checkbox" name="want"> I want to receive advice on buying and selling. </label>
            </div>
        </div>     -->
        <button onclick="ChangePassword()" type="button" class="theme-btn-one">{{$language[244][session()->get('lang')]}}</button>

    <div style="width: 100%; height: 30px;"></div>
        <div class="change-password section-single">
            <h2 class="title-in-customer">{{$language[245][session()->get('lang')]}}</h2>
            <div class="form-group">
                <label>{{$language[246][session()->get('lang')]}}</label>
                <input type="password" class="form-control" id="deactivate_password" name="deactivate_password">
            </div>
            <div class="form-group">
                <label>{{$language[247][session()->get('lang')]}}</label>
                <input type="password" class="form-control" id="deactivate_password_confirmation" name="deactivate_password_confirmation">
            </div>
            <div class="form-group">
                <label>{{$language[248][session()->get('lang')]}}</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button onclick="DeactivateAccount()" type="button" class="theme-btn-one" style="background-color: #f85c70;">{{$language[249][session()->get('lang')]}}</button>
            </div>
        </div>
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
$('.sidebar_account').addClass('active');

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
                $("#"+i).after('<p class="text-danger">'+obj[0]+'</p>');
                $('#'+i).closest('.form-group').addClass('has-error');
            });
            $("#save").attr("disabled", false);
        }
    });
}

function ChangePassword(){
    $(".text-danger").remove();
    $('.form-group').removeClass('has-error').removeClass('has-success');
    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : '/customer/change-password',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {
            console.log(data);                
            if(data.status == 1){
                Swal.fire({
                    text: 'Change Password Successfully',
                    icon: 'success',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $("#form")[0].reset();
                        $.ajax({
                            type: 'POST',
                            url: '/logout',
                            data:{ _token: "{{csrf_token()}}"},
                            success: function()
                            {
                                window.location.href="/login";
                            }
                        });
                        window.location.href="/login";
                    }
                }) 
            }
            else{
                Swal.fire({
                    text: data.message,
                    icon: 'error',
                    }).then((result) => {
                    if (result.isConfirmed) {
                    }
                })
            }
        },
        error: function (data, errorThrown) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
                $("#"+i).after('<p class="text-danger">'+obj[0]+'</p>');
                $('#'+i).closest('.form-group').addClass('has-error');
            });
        }
    });
}


function DeactivateAccount(){
    $(".text-danger").remove();
    $('.form-group').removeClass('has-error').removeClass('has-success');
    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : '/customer/deactivate-account',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {
            Swal.fire({
                text: 'Deactivate Account Successfully',
                icon: 'success',
                }).then((result) => {
                if (result.isConfirmed) {
                    $("#form")[0].reset();
                    $.ajax({
                        type: 'POST',
                        url: '/logout',
                        data:{ _token: "{{csrf_token()}}"},
                        success: function()
                        {
                            window.location.href="/login";
                        }
                    });
                    window.location.href="/login";
                }
            })
        },
        error: function (data, errorThrown) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
                $("#"+i).after('<p class="text-danger">'+obj[0]+'</p>');
                $('#'+i).closest('.form-group').addClass('has-error');
            });
        }
    });
}
</script>
@endsection
