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
@endsection
