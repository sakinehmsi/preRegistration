@extends('admin.adminIndex')

@section('main')
    <!-- menu section -->
    <div class="menuDiv">
        <div class="searchInputDiv">
            <p>{{ Session::get('userfirstName')}} {{ Session::get('userlastName')}}</p>            
        </div>
        <div class="menu_content_div">
            <a class="a_action" href="{{route('usersRequests')}}">اتاق صحبت با دانشجویان</a>
            <a class="a_action" href="{{route('addlesson')}}">ویرایش درس</a>
            <a class="a_action" href="{{route('showaddlesson')}}">افزودن درس</a>
            <a class="a_action" href="{{route('logout')}}">خروج</a>
        </div>
    </div>
     <!-- user_request_div -->
    <div class="user_request_div">
        <div class="user_request_top">
            <p class="user_request_top_p">اتاق صحبت با دانشجویان</p>
            <i id="refresh_chatRoom" class="fa fa-refresh btn_refresh" aria-hidden="true"></i>
        </div>
        <div class="user_request_content">
            <?php
                for($i = count($chatRoom)-1 ; $i >=0  ; $i--){
                    echo "<div id='".$chatRoom[$i]['_id']."' class='request_content_container'>";
                    echo "<p class='sender'>".$chatRoom[$i]['sender']."</p>";
                    echo "<p  class='request_content_container'>".$chatRoom[$i]['message']."</p>";
                    echo "<button class='set_reply_btn' type='button' onclick=\"set_reply('".$chatRoom[$i]['_id']."' )\"><i class='fa fa-reply reply' aria-hidden='true'></i></button></div>";
                    if($chatRoom[$i]['reply_message_id'] == 1){
                        echo "<div class='request_content_container request_content_darker'><p>".$chatRoom[$i]['reply_message']."</p></div>";
                    }
                }
            ?>
        </div>
        {{-- requestSendingBox --}}
        <div  class="requestSendingBox">                
            <form action="/action_page.php" class="form_container">
                <input id="userid_input" type="hidden" value="{{ Session::get('userid')}}">
                <input autocomplete="off" type="text" id="myRequest" placeholder="پیام خود را بنویسید ...">
                <input type="hidden" name="message_id" id="message_id">
                <button  type="button" class="send_response"><i class="fa fa-paper-plane send_icon_css" aria-hidden="true"></i></button>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#refresh_chatRoom').click(function(e){
            $('#refresh_chatRoom').addClass('fa-spin');
            $.ajax({
                type: "GET",
                url: "{{route('refresh_ChatRoom_admin')}}",
                dataType:'json',
                success: function(data) {
                    
                    var html_refresed_ChatRoom =''; 
                    var length = data.length;
                    for(var i = length-1; i>=0 ; i--){
                        if(data[i].reply_message_id == 1){
                            html_refresed_ChatRoom +=  "<div id='"+data[i]._id['$oid']+"' class='request_content_container'><p class='sender'>"+data[i].sender+"</p><p  class='request_content_container'>"+data[i].message+"</p><button class='set_reply_btn' type='button' onclick=\"set_reply('"+data[i]._id['$oid']+"' )\"><i class='fa fa-reply reply' aria-hidden='true'></i></button></div><div class='request_content_container request_content_darker'><p>"+data[i].reply_message+"</p></div>";
                        }else{
                            html_refresed_ChatRoom +=  "<div id='"+data[i]._id['$oid']+"' class='request_content_container'><p class='sender'>"+data[i].sender+"</p><p  class='request_content_container'>"+data[i].message+"</p><button class='set_reply_btn' type='button' onclick=\"set_reply('"+data[i]._id['$oid']+"' )\"><i class='fa fa-reply reply' aria-hidden='true'></i></button></div>";
                        }
                    }
                    $('.user_request_content').html(html_refresed_ChatRoom);
                    window.setTimeout(function () {
                        $('#refresh_chatRoom').removeClass('fa-spin');
                    }, 2000);
                },
                error:function(data) {
                    Swal.fire({
                    icon: 'error',
                    title: 'ادمین عزیز متاسفانه سیستم با مشکل مواجه شده است.لطفا بعدا امتحان کنید',
                    showConfirmButton: false,
                    timer: 5000
                    });
                }
            });
        });

        function set_reply(id){
            $('.request_content_container').css('background-color' , '#0a304e');
            $('.request_content_darker').css('background-color' , '#808000');
            $('#message_id').val(id);
            $('#'+id).css('background-color' , '#006e80');
        }

        $('.send_response').click(function(e){
            $.ajax({
                type: "POST",
                url: "{{route('send_response')}}",
                data:
                {
                    '_token': '{{csrf_token()}}',
                    'id': $('#message_id').val() ,
                    'reply_message': $('#myRequest').val(),
                    'reply_message_id': 1 ,
                },
                dataType: "text",
                
                success: function(data) {
                    $('#myRequest').val("");
                    $('#refresh_chatRoom').click();
                },
                error:function(data) {
                    Swal.fire({
                    icon: 'error',
                    title: 'ادمین عزیز متاسفانه سیستم با مشکل مواجه شده است.لطفا بعدا امتحان کنید',
                    showConfirmButton: false,
                    timer: 5000
                    });
                }
            }); 
        });
    </script>        
@endsection