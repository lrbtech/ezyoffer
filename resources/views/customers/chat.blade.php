@extends('customers.layouts')
@section('css')
<link href="/assets/css/chat-final.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<style>
.discussions {
    overflow: scroll !important;
}

/* .chat .header-chat .right {
    position: relative !important;
    right: 0px !important;
    background: #789fd3;
    color: #ffffff;
    padding: 3px 7px;
    border-radius: 4px;
} */
</style>
<style>
@media only screen and (max-width: 768px) {
    .attach-icon {
        right: 65px !important;
        font-size: 24px !important;
    }
}
</style>
<style type="text/css">
.message-seller-pop textarea{
    position: relative;
    display: block;
    width: 100%;
    height: 145px;
    border: 1px solid #e6e8e8;
    border-radius: 30px;
    font-size: 15px;
    color: #808288;
    padding: 10px 30px;
    transition: all 500ms ease;
    margin: 20px 0;
}

.message-seller-pop input[type='text'] {
    position: relative;
    width: 100%;
    height: 50px;
    border: 1px solid #e6ebeb;
    border-radius: 30px;
    padding: 10px 30px;
    font-size: 15px;
    font-weight: 500;
    color: #848484;
    transition: all 500ms ease;
}

.offers-label{
    text-align: center;
    display: block;
    color: #091a3a;
    font-weight: 800;
    margin-top: 15px;
    margin-bottom: 17px;
}

.buttonDownload {
	display: inline-block;
	position: relative;
	padding: 10px 25px;
  
	background-color: #4CC713;
	color: white;
  
	font-family: sans-serif;
	text-decoration: none;
	font-size: 0.9em;
	text-align: center;
	text-indent: 15px;
}

.buttonDownload:hover {
	background-color: #333;
	color: white;
}

.buttonDownload:before, .buttonDownload:after {
	content: ' ';
	display: block;
	position: absolute;
	left: 15px;
	top: 52%;
}

/* Download box shape  */
.buttonDownload:before {
	width: 10px;
	height: 2px;
	border-style: solid;
	border-width: 0 2px 2px;
}

/* Download arrow shape */
.buttonDownload:after {
	width: 0;
	height: 0;
	margin-left: 3px;
	margin-top: -7px;
  
	border-style: solid;
	border-width: 4px 4px 0 4px;
	border-color: transparent;
	border-top-color: inherit;
	
	animation: downloadArrow 2s linear infinite;
	animation-play-state: paused;
}

.buttonDownload:hover:before {
	border-color: #4CC713;
}

.buttonDownload:hover:after {
	border-top-color: #4CC713;
	animation-play-state: running;
}

/* keyframes for the download icon anim */
@keyframes downloadArrow {
	/* 0% and 0.001% keyframes used as a hackish way of having the button frozen on a nice looking frame by default */
	0% {
		margin-top: -7px;
		opacity: 1;
	}
	
	0.001% {
		margin-top: -15px;
		opacity: 0;
	}
	
	50% {
		opacity: 1;
	}
	
	100% {
		margin-top: 0;
		opacity: 0;
	}
}


.btn-slide, .btn-slide2 {
    position: relative;
    display: inline-block;
    height: 50px;
    width: 250px;
    line-height: 50px;
    padding: 0;
    border-radius: 50px;
    background: #fdfdfd;
    border: 2px solid #0099cc;
    margin: 10px;
    transition: .5s;
}

.btn-slide2 {
    border: 2px solid #efa666;
}

.btn-slide:hover {
    background-color: #0099cc;
}

.btn-slide2:hover {
    background-color: #efa666;
}

.btn-slide:hover span.circle, .btn-slide2:hover span.circle2 {
    left: 100%;
    margin-left: -45px;
    background-color: #fdfdfd;
    color: #0099cc;
}

.btn-slide2:hover span.circle2 {
    color: #efa666;
}

.btn-slide:hover span.title, .btn-slide2:hover span.title2 {
    left: 40px;
    opacity: 0;
}

.btn-slide:hover span.title-hover, .btn-slide2:hover span.title-hover2 {
    opacity: 1;
    left: 40px;
}

.btn-slide span.circle, .btn-slide2 span.circle2 {
    display: block;
    background-color: #0099cc;
    color: #fff;
    position: absolute;
    float: left;
    margin: 5px;
    line-height: 42px;
    height: 40px;
    width: 40px;
    top: 0;
    left: 0;
    transition: .5s;
    border-radius: 50%;
}

.btn-slide2 span.circle2 {
    background-color: #efa666;
}

.btn-slide span.title,
  .btn-slide span.title-hover, .btn-slide2 span.title2,
  .btn-slide2 span.title-hover2 {
    position: absolute;
    /* left: 90px; */
    text-align: center;
    margin: 0 auto;
    font-size: 16px;
    font-weight: bold;
    color: #30abd5;
    transition: .5s;
}

.btn-slide2 span.title2,
  .btn-slide2 span.title-hover2 {
    color: #efa666;
    left: 80px;
  }

.btn-slide span.title-hover, .btn-slide2 span.title-hover2 {
    left: 80px;
    opacity: 0;
}

.btn-slide span.title-hover, .btn-slide2 span.title-hover2 {
    color: #fff;
}

</style>
@endsection
@section('section')
        <!-- Page Title -->
        <section class="page-title style-two" style="background-image: url(/assets/images/background/page-title.jpg);">
            <div class="auto-container">
                <div class="content-box centred mr-0">
                    <div class="title">
                        <h1>{{$language[140][session()->get('lang')]}}</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="/">Home</a></li>
                        <li>{{$language[140][session()->get('lang')]}}</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->


<!-- category-details -->
<section class="category-details bg-color-2">
    <div class="auto-container">
    <div class="row clearfix">
    <div class="col-lg-3 col-md-12 col-sm-12 sidebar-side">
        @include('customers.menu')
    </div>
    <div class="col-lg-9 col-md-12 col-sm-12 content-side">
        <div class="row contain-chat clearfix">
            <div class="discussions col-md-5">
                <div class="discussion search">
                    <div class="searchbar">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        <input autocomplete="off" id="search_input" type="text" placeholder="Search..."></input>
                    </div>
                </div>
                <!-- <div style="height:650px !important;overflow:scroll !important;"> -->
                <!-- <div class="discussion message-active">
                    <div class="photo" style="background-image: url(https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80);">
                        <div class="online"></div>
                    </div>
                    <div class="desc-contact">
                        <p class="name">Megan Leib</p>
                        <p class="message">9 pm at the bar if possible 😳</p>
                    </div>
                    <div class="timer">12 sec</div>
                </div> -->
                @if(count($datas) > 0)
                @foreach($datas as $row)
                    {{ \App\Http\Controllers\User\ChatController::chatuserslist($row['id'],$row['post_id']) }}
                @endforeach
                @endif

                <!-- </div> -->
            </div>
            <div id="viewchat" class="chat col-md-7">
            {{--<div class="header-chat">
                <i class="icon fas fa-user" aria-hidden="true"></i>
                <p class="name">Megan Leib</p>
                <b class="right">Negotiate: 400 AED</b>
                </div>
                <div id="new_chat" style="height:600px;overflow:scroll;" class="messages-chat">
                    <div class="message">
                        <div class="photo" style="background-image: url(https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80);">
                            <div class="online"></div>
                        </div>
                        <p class="text"> Hi, how are you ? </p>
                    </div>
                    <p class="time"> 15h04</p>

                    <div class="message">
                        <div class="photo" style="background-image: url(https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80);">
                            <div class="online"></div>
                        </div>
                        <p class="text"> Hi, how are you ? </p>
                    </div>
                    <p class="time"> 15h04</p>

                    <div class="message text-only">
                        <div class="response">
                            <p class="text"> Hey Megan ! It's been a while 😃</p>
                        </div>
                    </div>

                    <div class="message text-only">
                        <div class="response">
                            <p class="text"> When can we meet ?</p>
                        </div>
                    </div>

                    <div class="message text-only">
                        <div class="response">
                            <p class="text"> When can we meet ?</p>
                        </div>
                    </div>
                    <p class="response-time time"> 15h04</p>

                    <div class="message">
                        <div class="photo" style="background-image: url(https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80);">
                            <div class="online"></div>
                        </div>
                        <p class="text"> 9 pm at the bar if possible 😳</p>
                    </div>
                    <p class="time"> 15h09</p>

                    <div class="message">
                        <div class="photo" style="background-image: url(https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80);">
                            <div class="online"></div>
                        </div>
                        <p class="text"> 9 pm at the bar if possible 😳</p>
                    </div>
                    <p class="time"> 15h09</p>

                    <div class="message">
                        <div class="photo" style="background-image: url(https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80);">
                            <div class="online"></div>
                        </div>
                        <p class="text"> 9 pm at the bar if possible 😳</p>
                    </div>
                    <p class="time"> 15h09</p>

                </div>
                <div class="footer-chat">
                    <input type="text" class="write-message" placeholder="Type your message here"></input>
                    <i class="icon send fas fa-paper-plane clickable" aria-hidden="true"></i>
                    <!-- <i class="fas fa-paperclip clickable attach-icon" aria-hidden="true"></i>
                    <i class="fas fa-cog clickable settings-icon" aria-hidden="true"></i> -->
                </div>--}}
            </div>
        </div>
    </div>
    </div>
    </div>
</section>

<div id="documentmodal" class="modal fade" role="dialog">
  <div style="max-width:500px !important;" class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload Document</h4>
      </div>
      <div class="modal-body">
        <div class="col-lg-12 col-md-12 col-sm-12 column">
            <form method="POST" id="upload_form" class="message-seller-pop">
            {{csrf_field()}}
                <div class="form-group">
                    <label>Upload Files (Support Files .jpeg,.jpg,.png,.pdf,.docx)</label><br>
                    <input accept=".jpeg,.jpg,.png,.pdf,.docx" type="file" name="upload_files" id="upload_files">                       
                </div> 
            </form>
        </div>
      </div>
      <div style="display:block;" class="modal-footer">
        <button onclick="UploadDocument()" style="float:right;" type="button" class="theme-btn-one">Upload</button>
        <button id="modal-close-btn" style="float:left;" type="button" class="theme-btn-one" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


@endsection
@section('js')
<script src="/assets/js/chat.js"></script>

<script type="text/javascript">
$('.sidebar_chat').addClass('active');

var user=0;
var post=0;
function viewChat(user_id,post_id)
{
    $('.chatclass').removeClass('message-active');
    $('#'+user_id+post_id).addClass('message-active');
    $.ajax({
        url : '/customer/get-chat/'+user_id+'/'+post_id,
        type: "GET",
        success: function(data)
        {
            $('#viewchat').html(data.html);
            user = user_id;
            post = post_id;
            var element = document.getElementById("new_chat");
            element.scrollTop = element.scrollHeight;
        }
    });
}

setInterval(function(){
    $.ajax({
        url : '/customer/get-new-chat-count/'+user+'/'+post,
        type: "GET",
        success: function(data)
        {
            if(data > 0){
                reloadChat(user,post);
            }
        }
    });
},1000);

// setInterval(function(){
//     $(".timer").blink();
// },1000);

function reloadChat(user_id,post_id)
{
    $.ajax({
        url : '/customer/reload-chat/'+user_id+'/'+post_id,
        type: "GET",
        success: function(data)
        {
            $('#new_chat').html(data.html);
            var element = document.getElementById("new_chat");
            element.scrollTop = element.scrollHeight;
        }
    });
}

document.onkeyup = function (e) {
	e = e || window.event;//Get event

	if (e.which == 13) {
	  e.preventDefault();
	  SendChat();
 	} 
};

function SendChat(){
    $.ajax({
        url : '/customer/save-chat-customer',
        type: "POST",
        data: {'msg':$('#msg').val(),'to_id':$('#to_id').val(),'post_id':$('#post_id').val(), '_token': $('input[name=_token]').val()},
        dataType: "JSON",
        success: function(data)
        {        
            // Swal.fire({
            //     title: "Chat Send Successfully",
            //     icon: "success",
            // }).then(function() {
            //     $("#msg").val('');
            //     viewChat(data.user_id,data.post_id);   
            // });   
            $("#msg").val('');
            viewChat(data.user_id,data.post_id); 
        },
        error: function (data, errorThrown) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
                toastr.error(obj[0]);
            });
        }
    });
}

function UploadDocument(){
    var formData = new FormData($('#upload_form')[0]);
    var to_id = $('#to_id').val();
    var post_id = $('#post_id').val();
    formData.append('to_id', to_id);
    formData.append('post_id', post_id);
    $.ajax({
        url : '/customer/chat-upload-document',
        type: "POST",
        // data: {'upload_files':$('#upload_files').val(),'to_id':$('#to_id').val(),'post_id':$('#post_id').val(), '_token': $('input[name=_token]').val()},
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {
            $('#modal-close-btn').click();
            Swal.fire({
                title: "Upload File Successfully",
                icon: "success",
            }).then(function() {
                //$('#documentmodal').modal('hide');
                viewChat(data.user_id,data.post_id); 
            });   
            //$("#msg").val('');
            //viewChat(data.user_id,data.post_id); 
        },
        error: function (data, errorThrown) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
                toastr.error(obj[0]);
            });
        }
    });
}

$("#search_text").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".message1").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
    $(".time").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
});

$("#search_input").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".chatclass").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
});

</script>
@endsection
