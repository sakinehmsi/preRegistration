@extends('admin.adminIndex')

@section('main')
    {{-- menu section --}}
    <div class="menuDiv">
        <div class="searchInputDiv"><p>{{ Session::get('userfirstName')}} {{ Session::get('userlastName')}}</p></div>
        <div class="menu_content_div">
            <a class="a_action" href="{{route('usersRequests')}}">اتاق صحبت با دانشجویان</a>
            <a class="a_action" href="{{route('showeditlesson')}}">ویرایش دروس ارائه شده</a>
            <a class="a_action" href="{{route('showaddlesson')}}">ارائه دروس</a>
            <a class="a_action" href="{{route('show_user_PreReg_Detail')}}">اطلاعات پیش ثبت نام</a>
            <a class="a_action" href="{{route('Adminlogout')}}">خروج</a>
        </div>
    </div>
    {{-- Available Lessons Info --}}
    <div class="user_request_div"> 
        <div class="user_request_top"><p class="user_request_top_p">دروس ارائه شده</p></div>
        <div class="heigthDiv">
            {{-- Available Lessons --}}
            <div class="allLessondiv">                
                <table class="allLessontable">                    
                    <tbody>
                        <?php
                        for ($i = 0; $i < count($lessons); $i++) {
                            echo "<tr onclick=\"selectLesson('".$lessons[$i]->lesson_id."')\" id='".$lessons[$i]->lesson_id."'>
                                    <td>".$lessons[$i]->lesson_name."</td>
                                    <td>".$lessons[$i]->lesson_id."</td>
                                    </tr>";
                        }
                        ?> 
                    </tbody>
                </table> 
            </div> 
            {{-- Available Lessons Users --}}           
            <table class="users_id_tbl"></table>
        </div>
    </div>
    {{-- inactive_users_div --}}
    <div class="leftDiv">
        <div class="inactive_users_div">
            <p>دانشجویانی که پیش ثبت نام نکرده اند</p>
            <table class="inactive_users_tbl">
                <?php
                    for ($i = 0; $i < count($inactive_users); $i++) {
                        echo"<tr><td>".$inactive_users[$i][0]."</td>
                            <td>".$inactive_users[$i][1]."</td>
                            <td>".$inactive_users[$i][2]."</td></tr>";
                    }
                ?>
            </table>
        </div> 
    </div>
@endsection
{{-- getCourseInfo --}}
@section('script')
      <script>
        function selectLesson(id){
            $('.selected').removeClass('selected');
            $('#'+id).addClass('selected');
            $.ajax({
                type: "POST",
                url: "{{route('getCourseInfo')}}",
                dataType:'json',
                data : {
                    '_token': '{{csrf_token()}}',
                    'id' : id ,
                },
                success: function(data) {
                    var users_id_tbl =''; 
                    var length = data.length;
                    if(length == 0){
                        users_id_tbl +=  "<tr><td>هیچ دانشجویی در این کلاس ثبت نام نکرده است</td></tr>";
                    }else{
                        for(var i = 0; i< data.length ; i++){
                            users_id_tbl +=  "<tr><td>"+data[i][0]+"</td><td>"+data[i][1]+"</td><td>"+data[i][2]+"</td></tr>";
                        }                        
                    }   
                    $('.users_id_tbl').html(users_id_tbl);                 
                },
                error:function(data) {
                    Swal.fire({
                    icon: 'error',
                    title:  'ادمین عزیز متاسفانه سیستم با مشکل مواجه شده است.لطفا بعدا امتحان کنید',
                    showConfirmButton: false,
                    timer: 2000
                    });
                }
            });
        }
      </script>
@endsection