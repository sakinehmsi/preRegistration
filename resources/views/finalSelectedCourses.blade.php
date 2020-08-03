@extends('index')

@section('head')
    <link rel="stylesheet" href="css/finalSelectedCourses.css">
    <link rel="stylesheet" href="css/polaris.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
@endsection

@section('navbar')
    <!-- profile Menu -->
    @include('profilemenu')
    <!-- END profile Menu -->
@endsection

@section('main-container')

    <!-- table -->
    <div class="table1-div" >
        <table id="weeklySchedule-table">
            <thead>
                <th>ایام هفته</th>
                <th><span class="persian-number">8:00-9:30</span></th>
                <th><span class="persian-number">9:30-11:00</span></th>
                <th><span class="persian-number">11:00-12:30</span></th>
                <th><span class="persian-number">14:00-15:30</span></th>
                <th><span class="persian-number">15:30-17:00</span></th>
                <th><span class="persian-number">17:00-18:30</span></th>
            </thead>
            <tbody>
                <!-- sat -->
                <tr>
                    <th>شنبه</th>               
                    <td id="0">{{$coursesName[0]}}<span class="persian-number"><span class="lessonId-css" id="time0">{{$coursesID[0]}}</span></span></td>
                    <td id="1">{{$coursesName[1]}}<span class="persian-number"><span class="lessonId-css" id="time1">{{$coursesID[1]}}</span></span></td>
                    <td id="2">{{$coursesName[2]}}<span class="persian-number"><span class="lessonId-css" id="time2">{{$coursesID[2]}}</span></span></td>
                    <td id="3">{{$coursesName[3]}}<span class="persian-number"><span class="lessonId-css" id="time3">{{$coursesID[3]}}</span></span></td>
                    <td id="4">{{$coursesName[4]}}<span class="persian-number"><span class="lessonId-css" id="time4">{{$coursesID[4]}}</span></span></td>
                    <td id="5">{{$coursesName[5]}}<span class="persian-number"><span class="lessonId-css" id="time5">{{$coursesID[5]}}</span></span></td>
                </tr>
                <!-- sun -->
                <tr>
                    <th>یکشنبه</th>                    
                    <td id="6">{{$coursesName[6]}}<span class="persian-number"><span class="lessonId-css" id="time6">{{$coursesID[6]}}</span></span></td>
                    <td id="7">{{$coursesName[7]}}<span class="persian-number"><span class="lessonId-css" id="time7">{{$coursesID[7]}}</span></span></td>
                    <td id="8">{{$coursesName[8]}}<span class="persian-number"><span class="lessonId-css" id="time8">{{$coursesID[8]}}</span></span></td>
                    <td id="9">{{$coursesName[9]}}<span class="persian-number"><span class="lessonId-css" id="time9">{{$coursesID[9]}}</span></span></td>
                    <td id="10">{{$coursesName[10]}}<span class="persian-number"><span class="lessonId-css" id="time10">{{$coursesID[10]}}</span></span></td>
                    <td id="11">{{$coursesName[11]}}<span class="persian-number"><span class="lessonId-css" id="time11">{{$coursesID[11]}}</span></span></td>
                </tr>
                <!-- mon -->
                <tr>
                    <th>دوشنبه</th>                    
                    <td id="12">{{$coursesName[12]}}<span class="persian-number"><span class="lessonId-css" id="time12">{{$coursesID[12]}}</span></span></td>
                    <td id="13">{{$coursesName[13]}}<span class="persian-number"><span class="lessonId-css" id="time13">{{$coursesID[13]}}</span></span></td>
                    <td id="14">{{$coursesName[14]}}<span class="persian-number"><span class="lessonId-css" id="time14">{{$coursesID[14]}}</span></span></td>
                    <td id="15">{{$coursesName[15]}}<span class="persian-number"><span class="lessonId-css" id="time15">{{$coursesID[15]}}</span></span></td>
                    <td id="16">{{$coursesName[16]}}<span class="persian-number"><span class="lessonId-css" id="time16">{{$coursesID[16]}}</span></span></td>
                    <td id="17">{{$coursesName[17]}}<span class="persian-number"><span class="lessonId-css" id="time17">{{$coursesID[17]}}</span></span></td>
                </tr>
                <!-- tue -->
                <tr>
                    <th id="day3">سه شنبه</th>                    
                    <td id="18">{{$coursesName[18]}}<span class="persian-number"><span class="lessonId-css" id="time18">{{$coursesID[18]}}</span></span></td>
                    <td id="19">{{$coursesName[19]}}<span class="persian-number"><span class="lessonId-css" id="time19">{{$coursesID[19]}}</span></span></td>
                    <td id="20">{{$coursesName[20]}}<span class="persian-number"><span class="lessonId-css" id="time20">{{$coursesID[20]}}</span></span></td>
                    <td id="21">{{$coursesName[21]}}<span class="persian-number"><span class="lessonId-css" id="time21">{{$coursesID[21]}}</span></span></td>
                    <td id="22">{{$coursesName[22]}}<span class="persian-number"><span class="lessonId-css" id="time22">{{$coursesID[22]}}</span></span></td>
                    <td id="23">{{$coursesName[23]}}<span class="persian-number"><span class="lessonId-css" id="time23">{{$coursesID[23]}}</span></span></td>
                </tr>
                <!-- wed -->
                <tr>
                    <th>چهارشنبه</th>                    
                    <td id="24">{{$coursesName[24]}}<span class="persian-number"><span class="lessonId-css" id="time24">{{$coursesID[24]}}</span></span></td>
                    <td id="25">{{$coursesName[25]}}<span class="persian-number"><span class="lessonId-css">{{$coursesID[25]}}</span></span></td>
                    <td id="26">{{$coursesName[26]}}<span class="persian-number"><span class="lessonId-css">{{$coursesID[26]}}</span></span></td>
                    <td id="27">{{$coursesName[27]}}<span class="persian-number"><span class="lessonId-css">{{$coursesID[27]}}</span></span></td>
                    <td id="28">{{$coursesName[28]}}<span class="persian-number"><span class="lessonId-css">{{$coursesID[28]}}</span></span></td>
                    <td id="29">{{$coursesName[29]}}<span class="persian-number"><span class="lessonId-css">{{$coursesID[29]}}</span></span></td>
                </tr>
            </tbody>
        </table> 
    </div>

    <!-- Buttons -->
    <div class="btn-css">
        <button type="button" class="button-css"><p class="back-text-css"><a href="{{route('availableCourses')}}">ویرایش</a></p></button>
        <button class="button-css btn" id="btn"><p class="submit-text-css">مشاهده خطاها</p></button>
    </div>

    <!-- Modal -->
    <script>var prerequisitesCourses = [];</script>

    <?php
        for ($i=0 ; $i < count($coursesError)-1 ; $i++) {           
            if ( count($coursesError[$i]) == 3) {
                echo"<script>prerequisitesCourses.push('<h1>".$coursesError[$i][0]." : ".$coursesError[$i][1]." و ".$coursesError[$i][2]."</h1>');</script>";
            }else{
                echo"<script>prerequisitesCourses.push('<h1>".$coursesError[$i][0]." : ".$coursesError[$i][1]."</h1>');</script>";
            }
        }
    ?>
    
    <div class='popup'>
        <h1 class="redError">پیش نیاز دروس زیر را نگذرانده اید</h1>
        <span class='close'><i class='fa fa-close'></i></span>
    </div>        
@endsection

@section('script')
    <script src="js/finalSelectedCourses.js" ></script>
@endsection 