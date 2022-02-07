@extends('customers.layouts')
@section('css')
<link href="/assets/css/chat-final.css" rel="stylesheet">
<style>
.discussions {
    overflow: scroll !important;
}
.chat .header-chat .right {
    background: none !important;
    color: #000;
    padding: 3px 7px;
    border-radius: 4px;
}
</style>
<style>
@media only screen and (max-width: 768px) {
    .attach-icon {
        right: 65px !important;
        font-size: 24px !important;
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
                        <h1>{{$language[146][session()->get('lang')]}}</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a class="translate" href="/">Home</a></li>
                        <li>{{$language[146][session()->get('lang')]}}</li>
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
            <div id="viewchat" class="chat col-md-12">
                <div class="header-chat">
                <i class="icon fas fa-user" aria-hidden="true"></i>
                <p class="name">Chat to Admin</p>
                    <div class="searchbar right">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        <input autocomplete="off" id="search_text" type="text" placeholder="Search..."></input>
                    </div>
                </div>
                <div id="new_chat" style="height:530px;overflow:scroll;" class="messages-chat">
                @foreach($chat_admin as $row)
                @if($row->message_from == 1)
                    <div class="message">
                        <div class="photo" style="background-image: url(/assets/images/icons/user-icon.png);">
                            <div class="online"></div>
                        </div>
                        <p class="text"> {{$row->message}} </p>
                    </div>
                    <p class="time"> {{ \App\Http\Controllers\HomeController::humanreadtime($row->created_at) }}</p>
                @else 
                    <div class="message text-only">
                        <div class="response">
                            <p class="text"> {{$row->message}} </p>
                        </div>
                    </div>
                @endif
                @endforeach
                </div>
                <div style="position:relative !important;" class="footer-chat">
                    {{csrf_field()}}
                    <input name="message" id="message" type="text" class="write-message" placeholder="Type your message here"></input>
                    <i onclick="SendChat()" class="icon send fas fa-paper-plane clickable" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>


@endsection
@section('js')
<script src="/assets/js/chat.js"></script>

<script type="text/javascript">
$('.sidebar_chat_admin').addClass('active');

var user=<?php echo Auth::user()->id; ?>;
var element = document.getElementById("new_chat");
element.scrollTop = element.scrollHeight;

setInterval(function(){
    $.ajax({
        url : '/customer/get-new-chat-admin-count',
        type: "GET",
        success: function(data)
        {
            if(data > 0){
                reloadChat();
            }
        }
    });
},1000);

function reloadChat()
{
    $.ajax({
        url : '/customer/reload-chat-admin',
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
        url : '/customer/save-chat-admin',
        type: "POST",
        data: {'message':$('#message').val(),'_token': $('input[name=_token]').val()},
        dataType: "JSON",
        success: function(data)
        {        
            // Swal.fire({
            //     title: "Chat Send Successfully",
            //     icon: "success",
            // }).then(function() {
            //     $("#message").val('');
            //     viewChat(data.user_id,data.post_id);   
            // });   
            $("#message").val('');
            reloadChat(); 
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
    $(".message").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
    $(".time").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
});
</script>
@endsection
