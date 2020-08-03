@extends('index')

@section('head')
    <link rel="stylesheet" href="css/selectedCourses.css">
    <link rel="stylesheet" href="css/blue.css">
@endsection

@section('navbar')
    <!-- profile Menu -->
    @include('profilemenu')
    <!-- END profile Menu -->
@endsection

@section('main-container')
    <form action="/finalSelectedCourses" method="post" id="selectedCustomCoursesForm">
        
        <!-- selected courses -->
        <h2 class="titles">برنامه هفتگی</h2>
        <button onclick="show_filter_div()" type="button" class="button-css filter_position"><p class="back-text-css filter_margin">اعمال فیلتر</p></button>
        <div id="top_div">
            <table id="weeklySchedule_table">
                <thead>
                    <th>ایام هفته</th>
                    <th><span>8:00-9:30</span></th>
                    <th><span>9:30-11:00</span></th>
                    <th><span>11:00-12:30</span></th>
                    <th><span>14:00-15:30</span></th>
                    <th><span>15:30-17:00</span></th>
                    <th><span>17:00-18:30</span></th>
                </thead>
                <tbody>
                    <!-- sat -->
                    <tr>
                        <th>شنبه</th>               
                        <td><input disabled="disabled"  readonly class="input_readonly_css" id="00"></td>
                        <td><input disabled="disabled"  readonly class="input_readonly_css" id="01"></td>
                        <td><input disabled="disabled"  readonly class="input_readonly_css" id="02"></td>
                        <td><input disabled="disabled"  readonly class="input_readonly_css" id="03"></td>
                        <td><input disabled="disabled"  readonly class="input_readonly_css" id="04"></td>
                        <td><input disabled="disabled"  readonly class="input_readonly_css" id="05"></td>
                    </tr>
                    <!-- sun -->
                    <tr>
                        <th>یکشنبه</th>                    
                        <td><input disabled="disabled"  readonly class="input_readonly_css" id="10"></td>
                        <td><input disabled="disabled"  readonly class="input_readonly_css" id="11"></td>
                        <td><input disabled="disabled"  readonly class="input_readonly_css" id="12"></td>
                        <td><input disabled="disabled"  readonly class="input_readonly_css" id="13"></td>
                        <td><input disabled="disabled"  readonly class="input_readonly_css" id="14"></td>
                        <td><input disabled="disabled"  readonly class="input_readonly_css" id="15"></td>
                    </tr>
                    <!-- mon -->
                    <tr>
                        <th>دوشنبه</th>                    
                        <td><input disabled="disabled"  readonly class="input_readonly_css" id="20"></td>
                        <td><input disabled="disabled"  readonly class="input_readonly_css" id="21"></td>
                        <td><input disabled="disabled"  readonly class="input_readonly_css" id="22"></td>
                        <td><input disabled="disabled"  readonly class="input_readonly_css" id="23"></td>
                        <td><input disabled="disabled"  readonly class="input_readonly_css" id="24"></td>
                        <td><input disabled="disabled"  readonly class="input_readonly_css" id="25"></td>
                    </tr>
                    <!-- tue -->
                    <tr>
                        <th>سه شنبه</th>                    
                        <td><input disabled="disabled"  readonly class="input_readonly_css" id="30"></td>
                        <td><input disabled="disabled"  readonly class="input_readonly_css" id="31"></td>
                        <td><input disabled="disabled"  readonly class="input_readonly_css" id="32"></td>
                        <td><input disabled="disabled"  readonly class="input_readonly_css" id="33"></td>
                        <td><input disabled="disabled"  readonly class="input_readonly_css" id="34"></td>
                        <td><input disabled="disabled"  readonly class="input_readonly_css" id="35"></td>
                    </tr>
                    <!-- wed -->
                    <tr>
                        <th>چهارشنبه</th>                    
                        <td><input disabled="disabled"  readonly class="input_readonly_css" id="40"></td>
                        <td><input disabled="disabled"  readonly class="input_readonly_css" id="41"></td>
                        <td><input disabled="disabled"  readonly class="input_readonly_css" id="42"></td>
                        <td><input disabled="disabled"  readonly class="input_readonly_css" id="43"></td>
                        <td><input disabled="disabled"  readonly class="input_readonly_css" id="44"></td>
                        <td><input disabled="disabled"  readonly class="input_readonly_css" id="45"></td>
                    </tr>
                </tbody>
            </table> 
        </div>

        <!-- Courses -->
        <h2 class="titles">دروس ستاره دار پیشنهاد سیستم برای شما می باشد</h2>
        <div id="buttom_div">
            <div id="head">
                <p style="width:24%;">نام درس</p>
                <p style="width:10%;">کد درس</p>
                <p style="width:12%;">تعدادواحد</p>
                <p style="width:6%;">جنسیت</p>
                <p style="width:9%;">روز اول</p>
                <p style="width:9%;">ساعت</p>
                <p style="width:9%;">روز دوم</p>
                <p style="width:9%;">ساعت</p>
                <p style="width:12%;">امتحان</p>
            </div>
            <div id="all_courses_div">
                <table id="all_courses_table">
                    <tbody>
                        <?php
                        for ($i = 0; $i < count($courses) - 1; $i++) {
                            for ($j = 0; $j < count($courses[$i]); $j++) {
                                echo "<tr onclick=\"selectCustomCourses('".$courses[$i][$j]->lesson_id."' , '".$courses[$i][$j]->lesson_name."' , '".$courses[$i][$j]->class_day."' , '".$courses[$i][$j]->class_time."', '".$courses[$i][$j]->class_day_two."' , '".$courses[$i][$j]->class_time_two."','".$courses[$i][$j]->exam_date."'  , '".$courses[$i][$j]->exam_time."'  )\" class='head-of-table' id='".$courses[$i][$j]->lesson_id."'>
                                        <td style='width:24%;'>".$courses[$i][$j]->lesson_name."</td>
                                        <td style='width:10%;'>".$courses[$i][$j]->lesson_id."</td>
                                        <td style='width:12%;'>".$courses[$i][$j]->vahed."</td>
                                        <td style='width:3%;'>".$courses[$i][$j]->sexuality."</td>
                                        <td style='width:9%;'>".$courses[$i][$j]->class_day."</td>
                                        <td style='width:9%;'>".$courses[$i][$j]->class_time."</td>
                                        <td style='width:9%;'>".$courses[$i][$j]->class_day_two."</td>
                                        <td style='width:9%;'>".$courses[$i][$j]->class_time_two."</td>
                                        <td style='width:15%;'>".$courses[$i][$j]->exam_date." -- ".$courses[$i][$j]->exam_time."</td>
                                    </tr>";
                            }
                        }
                        for ($k = 0; $k < count($overbid_lessons) - 1; $k++) {
                            for ($l = 0; $l < count($overbid_lessons[$k]); $l++) {
                                echo "<tr onclick=\"selectCustomCourses('".$overbid_lessons[$k][$l]->lesson_id."' , '".$overbid_lessons[$k][$l]->lesson_name."' , '".$overbid_lessons[$k][$l]->class_day."' , '".$overbid_lessons[$k][$l]->class_time."', '".$overbid_lessons[$k][$l]->class_day_two."' , '".$overbid_lessons[$k][$l]->class_time_two."' ,'".$overbid_lessons[$k][$l]->exam_date."'  , '".$overbid_lessons[$k][$l]->exam_time."' )\" class='head-of-table' id='".$overbid_lessons[$k][$l]->lesson_id."'>
                                        <td style='width:24%;'>".$overbid_lessons[$k][$l]->lesson_name."*</td>
                                        <td style='width:10%;'>".$overbid_lessons[$k][$l]->lesson_id."</td>
                                        <td style='width:12%;'>".$overbid_lessons[$k][$l]->vahed."</td>
                                        <td style='width:3%;'>".$overbid_lessons[$k][$l]->sexuality."</td>
                                        <td style='width:9%;'>".$overbid_lessons[$k][$l]->class_day."</td>
                                        <td style='width:9%;'>".$overbid_lessons[$k][$l]->class_time."</td>
                                        <td style='width:9%;'>".$overbid_lessons[$k][$l]->class_day_two."</td>
                                        <td style='width:9%;'>".$overbid_lessons[$k][$l]->class_time_two."</td>
                                        <td style='width:15%;'>".$overbid_lessons[$k][$l]->exam_date." -- ".$overbid_lessons[$k][$l]->exam_time."</td>
                                    </tr>";
                            }
                        }
                        ?> 
                    </tbody>
                </table> 
            </div>
        </div>
        
        <!-- inputs -->
        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="coursesID" id="coursesID">
        <input type="hidden" name="coursesName" id="coursesName">

        <!-- Buttons -->
        <div class="btn-css">
            <button type="button" class="button-css"><p class="back-text-css"><a href="javascript:history.go(-1)">بازگشت</a></p></button>
            <button type="button" onclick="submitSelectedCustomCourses()" class="button-css"><p class="submit-text-css">ثبت تغییرات</p></button>
        </div>
    </form>
@endsection

@section('loginform')
    <!-- show_filter_div -->>
    <div class="filter_div">
        <div class="close_filter_css"><i onclick="closeLogin()" class="fa fa-times" ></i></div>  
        <table class="filter_tbl" id="weeklySchedule_table">
            <thead>
                <th>ایام هفته</th>
                <th><span>8:00-9:30</span></th>
                <th><span>9:30-11:00</span></th>
                <th><span>11:00-12:30</span></th>
                <th><span>14:00-15:30</span></th>
                <th><span>15:30-17:00</span></th>
                <th><span>17:00-18:30</span></th>
            </thead>
            <tbody>
                <!-- sat -->
                <tr>
                    <th>شنبه</th>               
                    <td id="00" class="td_cursor" onclick="addFilter('0','0')"></td>
                    <td id="01" class="td_cursor" onclick="addFilter('0','1')"></td>
                    <td id="02" class="td_cursor" onclick="addFilter('0','2')"></td>
                    <td id="03" class="td_cursor" onclick="addFilter('0','3')"></td>
                    <td id="04" class="td_cursor" onclick="addFilter('0','4')"></td>
                    <td id="05" class="td_cursor" onclick="addFilter('0','5')"></td>
                </tr>
                <!-- sun -->
                <tr>
                    <th>یکشنبه</th> 
                    <td id="10" class="td_cursor" onclick="addFilter('1','0')"></td>                   
                    <td id="11" class="td_cursor" onclick="addFilter('1','1')"></td>
                    <td id="12" class="td_cursor" onclick="addFilter('1','2')"></td>
                    <td id="13" class="td_cursor" onclick="addFilter('1','3')"></td>
                    <td id="14" class="td_cursor" onclick="addFilter('1','4')"></td>
                    <td id="15" class="td_cursor" onclick="addFilter('1','5')"></td>
                </tr>
                <!-- mon -->
                <tr>
                    <th>دوشنبه</th>   
                    <td id="20" class="td_cursor" onclick="addFilter('1','0')"></td>
                    <td id="21" class="td_cursor" onclick="addFilter('1','1')"></td>
                    <td id="22" class="td_cursor" onclick="addFilter('1','2')"></td>
                    <td id="23" class="td_cursor" onclick="addFilter('1','3')"></td>
                    <td id="24" class="td_cursor" onclick="addFilter('1','4')"></td>
                    <td id="25" class="td_cursor" onclick="addFilter('1','5')"></td>                 
                </tr>
                <!-- tue -->
                <tr>
                    <th>سه شنبه</th>
                    <td id="30" class="td_cursor" onclick="addFilter('1','0')"></td>
                    <td id="31" class="td_cursor" onclick="addFilter('1','1')"></td>
                    <td id="32" class="td_cursor" onclick="addFilter('2','2')"></td>
                    <td id="33" class="td_cursor" onclick="addFilter('2','3')"></td>
                    <td id="34" class="td_cursor" onclick="addFilter('2','4')"></td>
                    <td id="35" class="td_cursor" onclick="addFilter('2','5')"></td>                     
                </tr>
                <!-- wed -->
                <tr>
                    <th>چهارشنبه</th>                    
                    <td id="40" class="td_cursor" onclick="addFilter('4','0')"></td>
                    <td id="41" class="td_cursor" onclick="addFilter('4','1')"></td>
                    <td id="42" class="td_cursor" onclick="addFilter('4','2')"></td>
                    <td id="43" class="td_cursor" onclick="addFilter('4','3')"></td>
                    <td id="44" class="td_cursor" onclick="addFilter('4','4')"></td>
                    <td id="45" class="td_cursor" onclick="addFilter('4','5')"></td> 
                </tr>
            </tbody>
        </table> 
    </div>
@endsection

@section('script')
    <script src="js/icheck.js"></script>
    <script src="js/selectedCourses.js"></script>
@endsection
