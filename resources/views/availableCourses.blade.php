@extends('index')

@section('head')
    <link rel="stylesheet" href="css/availableCourses.css">
    <link href="css/select2.min.css" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="css/kendo.default-v2.min.css"/> --}}
@endsection

@section('navbar')
    @include('profilemenu')
@endsection

@section('main-container')

    <div class="mainHead-css">
        <!--colleges-->
        {{-- <div class="selsct1_div_css">
            <select class="coursesFilter select-css" name="coursesFilter">
                <option></option>
                <option value="00">کلیه دانشکده ها</option>
                <option value="11">کشاورزی</option>
                <option value="12">علوم</option>
                <option value="13">علوم انسانی</option>
                <option value="14">مهندسی</option>
                <option value="15">هنر</option>
                <option value="99">دروس عمومی سرویسی</option>
            </select>
        </div> --}}
        <!--END colleges-->
        <!--Groups-->
        {{-- <div class="selsct2_div_css">
            <select class="groupsFilter select-css" name="groupsFilter" >
                <option></option>
                <option value="10">مواد</option>
                <option value="11">عمران</option>
                <option value="12">معماری</option>
                <option value="13">برق</option>
                <option value="14">مکانیک</option>
                <option value="15">کامپیوتر</option>
                <option value="16">نقشه برداری</option>
                <option value="15">معدن</option>
                <option value="18">مهندسی شیمی</option>
                <option value="19">دروس مشترک فنی و مهندسی</option>
                <option value="20">صنایع</option>
                <option value="21">هنر</option>
            </select>
        </div> --}}
        <!--END Groups-->
        <!-- Types -->
        <div class="selsct3_div_css">
            <select id="typesFilter" class="typesFilter select-css" name="typesFilter">
                <option></option>
                <option value="همه">همه</option>
                <option value= "تخصصی" > تخصصی </option>
                <option value="اصلی">اصلی</option>
                <option value="پایه">پایه</option>
                <option value="عمومی">عمومی</option>
            </select>
        </div>
        <!--END Types-->
        <!-- Terms -->
        {{-- <div class="selsct4_div_css">
            <select class="termsFilter select-css" name="termsFilter">
                <option></option>
                <option value="13">همه</option>
                <option value="00">1</option>
                <option value="11">2</option>
                <option value="12">3</option>
                <option value="11">4</option>
                <option value="00">5</option>
                <option value="11">6</option>
                <option value="12">7</option>
                <option value="00">8</option>
            </select>
        </div> --}}
        <!--END Terms--> 
        <p class="selected_title">دروس انتخابی شما</p>       
    </div>

    <form action="/selectedCourses" method="post" id="selectedCoursesForm">        
        <!-- Courses -->
        <div class="table">
            <!-- Input -->
            <input type="text" id="myInput" onkeyup="mySearch()" placeholder="جستجوی درس" autocomplete="off"> 
            <div class="table-div">            
                <table id="courses-table">
                    <tbody>
                        @foreach ($courses as $course) 
                            <tr id='{{$course->lesson_id}}' onclick="trclick('{{$course->lesson_id}}','{{$course->lesson_name}}','{{$course->vahed}}')">
                                <td>
                                    <span  class='coursename-css' >{{$course->lesson_name}}</span>
                                    <span  class='coursekind-css'>{{$course->kind_of_lesson}}</span>
                                </td>
                            </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>        
        
        <!-- Show Selected -->
        <div class="selected_div_top">
            <p class="selected_div_top_error">شما تاکنون درسی را انتخاب نکرده ید!</p>
            <input readonly id="total_unit" class="total_unit" placeholder="0" disabled>
            <p class="total_unit_p">جمع واحد ها :</p>
        </div>
            
        <div class="selected-div">
            <div class="selected-content-div"></div>
        </div>

        <!-- post data -->
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <input type="hidden" name="selectedCourses" id="selectedCourses" >
        <input type="hidden" name="selectedCoursesID" id="selectedCoursesID" >

        <!-- Buttons -->
        <div class="btn-css">
            <button type="button" class="button-css"><p class="submit-text-css">بازگشت</p></button>
            <button type="button" onclick="submitSelectedCourses()" class="button-css"><p class="submit-text-css">ثبت تغییرات</p></button>
        </div>
    </form>   

@endsection

@section('script')
    <script src="js/select2.min.js"></script>
    <script src="js/availableCourses.js"></script>
@endsection

