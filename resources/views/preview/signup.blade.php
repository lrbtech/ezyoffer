@extends('website.layouts')
@section('css')
<style>

</style>
@endsection
@section('section')
        <!-- Page Title -->
        <section class="page-title style-two" style="background-image: url(assets/images/background/page-title.jpg);">
            <div class="auto-container">
                <div class="content-box centred mr-0">
                    <div class="title">
                        <h1>Sign up</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a class="translate" href="/">Home</a></li>
                        <li>Sign up</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->


        <!-- signup-section -->
        <section id="show_spinner" class="login-section signup-section bg-color-2">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="inner-box">
                        <h2>Sign up</h2>
                        <div class="other-content centred">
                            <ul class="social-links clearfix">
                                <li><a href="#"><i class="fab fa-facebook-f"></i>Signup with Facebook</a></li>
                                <li><a href="#"><i class="fab fa-google"></i>Signup with Google</a></li>
                            </ul>
                            <div class="text"><span>or</span></div>
                        </div>
                        <form id="form" action="#" method="post" class="signup-form">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>First Name</label>
                                <input autocomplete="off" type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input autocomplete="off" type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
                            </div>
                            <!-- <div class="form-group">
                                <label>Mobile</label>
                                <input autocomplete="off" type="number" class="form-control" name="mobile" id="mobile" placeholder="Mobile Number">
                            </div> -->
                            <div class="form-group">
                                <label>Mobile</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <!-- <span class="input-group-text">+971</span> -->
                                        <input style="width:80px;border: 1px solid #e6e8e8;padding: 10px 10px;font-size: 15px;color: #808288;" value="+971" name="country_code" id="country_code">
                                    </div>
                                    <input style="height:50px;" type="number" class="form-control" name="mobile" id="mobile" placeholder="Mobile Number">
                                </div>
                                <span id="mobile_error"></span>
                            </div>
                            
                            <div class="form-group">
                                <label>Email</label>
                                <input autocomplete="off" type="email" class="form-control" id="email" name="email" placeholder="Email*">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input autocomplete="off" type="password" class="form-control" id="password" name="password" placeholder="Password*">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input autocomplete="off" type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password*">
                            </div>
                            <div class="form-group message-btn">
                                <button id="save" onclick="Save()" type="button" class="theme-btn-one">Sign up</button>
                            </div>
                        </form>
                        <div class="othre-text centred">
                            <p>Already have an account? <a href="/login">Sign in</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- signup-section end -->
@endsection
@section('js')
<script type="text/javascript">

var spinner = new jQuerySpinner({
    parentId: 'show_spinner'
});

function Save(){
    spinner.show();
    $(".text-danger").remove();
    $('.form-group').removeClass('has-error').removeClass('has-success');
    $("#save").attr("disabled", true);
    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : '/save-user-register',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {           
            Swal.fire({
                text: 'Successfully Create',
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ok!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $("#form")[0].reset();
                    window.location = "/login";
                    $("#save").attr("disabled", false);
                    spinner.hide(); 
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
            spinner.hide();
        }
    });
}
</script>
@endsection
