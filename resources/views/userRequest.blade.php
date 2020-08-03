@extends('index')

@section('head')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/userRequest.css">
@endsection

@section('navbar')
    @include('profilemenu')
@endsection

@section('main-container')
    <!-- search section -->
    <div class="searchDiv">
        <div class="searchInputDiv">
            <input type="text" id="myInput" autocomplete="off" placeholder="جستجو">
            <i id="search_input" class="fa fa-search" aria-hidden="true"></i>
        </div>
        <div class="searchResultDiv"></div>
    </div>
    
    <!-- requestsList -->
    <div class="requestsList">
        <p  class="titleRequestsList">اتاق پرسش و پاسخ دانشجویان و کارشناسان گروه</p>
        <i id="refresh_chatRoom" class="fa fa-refresh" aria-hidden="true"></i>
        {{-- requestsList_content --}}
        <script>var $chatRoom_content;</script>
        <div class="requestsList_content">
            <?php
                for ($i = 0; $i<count($chatRoom); $i++) {
                    echo"<div class='container'>";
                    echo"<p class='sender'>".$chatRoom[$i]['sender']."</p>";
                    echo"<p>".$chatRoom[$i]['message']."</p>";
                    echo"</div>";
                    
                    if($chatRoom[$i]['reply_message_id'] == 1 ) {
                        echo "<div class='container darker'>";
                        echo "<p>".$chatRoom[$i]['reply_message']."</p>";
                        echo "</div>";

                    }
                }
            ?>
        </div> 
        {{-- requestSendingBox --}}
        <div  class="requestSendingBox">                
            <form action="/action_page.php" class="form_container">
                <input id="userid_input" type="hidden" value="{{ Session::get('userid')}}">
                <input autocomplete="off" type="text" id="myRequest" placeholder="پیام خود را بنویسید ...">
                <button  type="button" class="btn send_request"><i class="fa fa-paper-plane send_icon_css" aria-hidden="true"></i></button>
            </form>
        </div>
    </div>

    <!-- user_request_div -->
    <div class="user_request_div">
        <div class="user_request_top">
            <p class="user_request_top_p">پیام های شما</p>
            <i id="refresh_user_messages" class="fa fa-refresh" aria-hidden="true"></i>
        </div>
        <div class="user_request_content">
            <?php
                for ($i = 0; $i < count($request_content); $i++) {
                    echo " <div class='request_content_container'>";
                    echo " <p>".$request_content[$i]['message']."</p></div>";
                    
                    if($request_content[$i]['reply_message_id'] == 1){
                        echo "<div class='request_content_container request_content_darker'><p>".$request_content[$i]['reply_message']."</p></div>";                    
                    }
                }
            ?>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.send_request').click(function(e){
            $.ajax({
                type: "POST",
                url: "{{route('send_request')}}",
                data:
                {
                    '_token': '{{csrf_token()}}',
                    'sender': $('#userid_input').val() ,
                    'message': $('#myRequest').val(),
                },
                dataType: "text",
                success: function(data) {
                    $('#myRequest').val('');
                    $('#refresh_chatRoom').click();
                    $('#refresh_user_messages').click();
                },
                error:function(data) {
                    Swal.fire({
                    icon: 'error',
                    title: 'دانشجوی عزیز متاسفانه سیستم با مشکل مواجه شده است.لطفا بعدا امتحان کنید',
                    showConfirmButton: false,
                    timer: 5000
                    });
                }
            }); 
        });
        $('#refresh_chatRoom').click(function(e){
            $('#refresh_chatRoom').addClass('fa-spin');
            $.ajax({
                type: "GET",
                url: "{{route('refresh_ChatRoom')}}",
                dataType:'json',
                success: function(data) {
                    var html_refresed_ChatRoom =''; 
                    var length = data.length;
                    for(var i = length-1 ; i>=0 ; i--){
                        if(data[i].reply_message_id == 1){
                            html_refresed_ChatRoom +=  "<div class='container'><p class='sender'>"+data[i].sender+"</p><p>"+data[i].message+"</p></div><div class='container darker'><p>"+data[i].reply_message+"</p></div>" ;
                        }else{
                            html_refresed_ChatRoom += "<div class='container'><p class='sender'>"+data[i].sender+"</p><p>"+data[i].message+"</p></div>" ;
                        }
                    }
                    $('.requestsList_content').html(html_refresed_ChatRoom);
                    window.setTimeout(function () {
                        $('#refresh_chatRoom').removeClass('fa-spin');
                    }, 2000);
                },
                error:function(data) {
                    Swal.fire({
                    icon: 'error',
                    title: 'دانشجوی عزیز متاسفانه سیستم با مشکل مواجه شده است.لطفا بعدا امتحان کنید',
                    showConfirmButton: false,
                    timer: 5000
                    });
                }
            });
        });
        $('#refresh_user_messages').click(function(e){
            $('#refresh_user_messages').addClass('fa-spin');
            $.ajax({
                type: "GET",
                url: "{{route('refresh_user_messages')}}",
                dataType:'json',
                success: function(data) {
                    var html_refresed_ChatRoom =''; 
                    var length = data.length;
                    for(var i = length-1 ; i>=0 ; i--){
                        if(data[i].reply_message_id == 1){
                            html_refresed_ChatRoom += "<div class='request_content_container'><p>"+data[i].message+"</p></div><div class='request_content_container request_content_darker'><p>"+data[i].reply_message+"</p></div>" ;
                        }else{
                            html_refresed_ChatRoom += "<div class='request_content_container'><p>"+data[i].message+"</p></div>" ;
                        }
                    }
                    $('.user_request_content').html(html_refresed_ChatRoom);
                    window.setTimeout(function () {
                        $('#refresh_user_messages').removeClass('fa-spin');
                    }, 2000);
                },
                error:function(data) {
                    Swal.fire({
                    icon: 'error',
                    title: 'دانشجوی عزیز متاسفانه سیستم با مشکل مواجه شده است.لطفا بعدا امتحان کنید',
                    showConfirmButton: false,
                    timer: 5000
                    });
                }
            });
        });
        $('#search_input').click(function(e){
            $.ajax({
                type: "POST",
                url: "{{route('search_input')}}",
                data:
                {
                    '_token': '{{csrf_token()}}',
                    'search_input': $('#myInput').val(),
                },
                dataType: "json",
                success: function(data) {
                    $('.searchResultDiv').html('');
                    if(data.length > 0){
                        $('#search_input').css('color','green');
                        var searchResultDiv_html = '';
                        var length = data.length;
                        for(var i = length-1 ; i>=0 ; i--){
                            if(data[i].reply_message_id == 1){
                                searchResultDiv_html += '<div class="searchResultDiv_div"><p class="searchResultDiv_p">'+data[i].message+'</p><p class="searchResultDiv_p searchResultDiv_p_reply">'+data[i].reply_message+'</p></div>';
                            }
                            else{
                                searchResultDiv_html += '<div class="searchResultDiv_div"><p class="searchResultDiv_p">'+data[i].message+'</p><p class="searchResultDiv_p searchResultDiv_p_reply">بدون پاسخ</p></div>' ;
                            }
                        }
                        $('.searchResultDiv').html(searchResultDiv_html);
                    }
                    else{
                        $('#search_input').css('color','red');
                        $('.searchResultDiv').html('<p class="searchResultDiv_p">هیچ نتیجه ای یافت نشد.</p>');    
                    }
                },
                error:function(data) {
                    Swal.fire({
                    icon: 'error',
                    title: 'دانشجوی عزیز متاسفانه سیستم با مشکل مواجه شده است.لطفا بعدا امتحان کنید',
                    showConfirmButton: false,
                    timer: 5000
                    });
                }
            });  
        });
        window.setTimeout(function () {
            $(".requestsList_content").scrollTop($('.requestsList_content')[0].scrollHeight);
            $(".searchResultDiv").scrollTop($('.searchResultDiv')[0].scrollHeight);
            $(".user_request_content").scrollTop($('.user_request_content')[0].scrollHeight);
        }, 1000);
    </script>
@endsection