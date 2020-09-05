@extends('admin.adminIndex')

@section('main')
    <!-- menu section -->
    <div class="menuDiv">
        <div class="searchInputDiv">
            <p>{{ Session::get('userfirstName')}} {{ Session::get('userlastName')}}</p>            
        </div>
        <div class="menu_content_div">
            <a class="a_action" href="{{route('usersRequests')}}">اتاق صحبت با دانشجویان</a>
            <a class="a_action" href="{{route('showeditlesson')}}">ویرایش دروس ارائه شده</a>
            <a class="a_action" href="{{route('showaddlesson')}}">ارائه دروس</a>
            <a class="a_action" href="{{route('show_user_PreReg_Detail')}}">اطلاعات پیش ثبت نام</a>
            <a class="a_action" href="{{route('Adminlogout')}}">خروج</a>
        </div>
    </div>
@endsection
