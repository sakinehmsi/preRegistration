<li class="menu-content">
    <div id="myDropdownBtn" class="dropdown">
        <a  class="dropdownBtn">{{ Session::get('userfirstName')}} {{ Session::get('userlastName')}}</a>
        <div  id="my_dropdown_content" class="dropdown_content">
            <a href="{{route('checkPreRegistration')}}">پیش ثبت نام</a>
            <a href="{{route('chart')}}">چارت</a>
            <a href="{{route('userRequest')}}">اتاق صحبت</a>
            <a href="{{route('logout')}}">خروج</a>
        </div>
    </div>
</li>
