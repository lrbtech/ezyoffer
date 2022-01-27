@extends('customers.layouts')
@section('css')
<link href="/assets/css/chat-final.css" rel="stylesheet">
<style>
.discussions {
    overflow: scroll !important;
}
</style>
@endsection
@section('section')
        <!-- Page Title -->
        <section class="page-title style-two" style="background-image: url(/assets/images/background/page-title.jpg);">
            <div class="auto-container">
                <div class="content-box centred mr-0">
                    <div class="title">
                        <h1>Offers</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="/">Home</a></li>
                        <li>Offers</li>
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
                        <input id="search_input" type="text" placeholder="Search..."></input>
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
                    {{ \App\Http\Controllers\User\OfferController::offeruserslist($row['id'],$row['post_id']) }}
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


@endsection
@section('js')
<script src="/assets/js/chat.js"></script>

<script type="text/javascript">
$('.sidebar_offers').addClass('active');

var user=0;
var post=0;
function viewChat(user_id,post_id)
{
    $('.chatclass').removeClass('message-active');
    $('#'+user_id+post_id).addClass('message-active');
    $.ajax({
        url : '/customer/get-offer/'+user_id+'/'+post_id,
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
        url : '/customer/get-new-offers-count/'+user+'/'+post,
        type: "GET",
        success: function(data)
        {
            if(data > 0){
                reloadChat(user,post);
            }
        }
    });
},1000);

function reloadChat(user_id,post_id)
{
    $.ajax({
        url : '/customer/reload-offer/'+user_id+'/'+post_id,
        type: "GET",
        success: function(data)
        {
            $('#new_chat').html(data.html);
            var element = document.getElementById("new_chat");
            element.scrollTop = element.scrollHeight;
        }
    });
}

function SendChat(){
    $.ajax({
        url : '/customer/save-offer-customer',
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

$("#search_input").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".chatclass").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
});
</script>
@endsection
