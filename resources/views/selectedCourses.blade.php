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
        {{-- <button onclick="show_filter_div()" type="button" class="button-css filter_position"><p class="back-text-css filter_margin">اعمال فیلتر</p></button> --}}
        <div id="top_div">
            <table id="weeklySchedule_table">
                <thead>
                    <th>ایام هفته</th>
                    <th><span>9:00-8:00</span></th>
                    <th><span>10:00-9:00</span></th>
                    <th><span>11:00-10:00</span></th>
                    <th><span>12:00-11:00</span></th>
                    <th><span>13:00-12:00</span></th>
                    <th><span>14:00-13:00</span></th>
                    <th><span>15:00-14:00</span></th>
                    <th><span>16:00-15:00</span></th>
                    <th><span>17:00-16:00</span></th>
                    <th><span>18:00-17:00</span></th>
                    <th><span>19:00-18:00</span></th>
                    <th><span>20:00-19:00</span></th>
                </thead>
                <tbody>
                    <tr>
                        <th>شنبه</th>               
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="00"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="01"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="02"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="03"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="04"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="05"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="06"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="07"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="08"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="09"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="010"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="011"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="012"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="013"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="014"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="015"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="016"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="017"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="018"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="019"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="020"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="021"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="022"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="023"></td></tr></table></td>
                    </tr>
                    <tr>
                        <th>یکشنبه</th>                
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="10"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="11"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="12"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="13"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="14"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="15"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="16"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="17"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="18"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="19"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="110"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="111"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="112"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="113"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="114"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="115"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="116"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="117"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="118"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="119"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="120"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="121"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="122"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="123"></td></tr></table></td>
                    </tr>
                    <tr>
                        <th>دوشنبه</th> 
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="20"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="21"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="22"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="23"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="24"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="25"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="26"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="27"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="28"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="29"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="210"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="211"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="212"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="213"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="214"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="215"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="216"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="217"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="218"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="219"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="220"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="221"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="222"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="223"></td></tr></table></td>
                    </tr>
                    <tr>
                        <th>سه شنبه</th>               
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="30"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="31"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="32"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="33"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="34"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="35"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="36"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="37"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="38"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="39"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="310"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="311"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="312"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="313"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="314"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="315"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="316"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="317"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="318"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="319"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="320"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="321"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="322"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="323"></td></tr></table></td>
                    </tr>
                    <tr>
                        <th>چهارشنبه</th>               
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="40"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="41"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="42"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="43"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="44"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="45"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="46"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="47"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="48"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="49"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="410"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="411"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="412"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="413"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="414"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="415"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="416"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="417"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="418"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="419"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="420"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="421"></td></tr></table></td>
                        <td><table class="titleFont"><tr><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="422"></td><td style="width:50%"><input disabled="disabled"  readonly class="input_readonly_css" id="423"></td></tr></table></td>
                    </tr>
                </tbody>
            </table> 
        </div>
        <script>
            var count = 0;
            var courses = [];
            for( var i = 0; i < 24; i++) {
                courses[i] = [];
            }
        </script>  
        <?php
            for($u = 0 ; $u < count($usercourses) ; $u++){
                echo "<script>count = ".count($usercourses).";</script>";
                echo "<script> courses[".$u."][0] = '".$usercourses[$u][0]."';</script>";//id
                echo "<script> courses[".$u."][1] = '".$usercourses[$u][1]."';</script>";//name
                echo "<script> courses[".$u."][2] = '".$usercourses[$u][2]."';</script>";//firstIndex_class1
                echo "<script> courses[".$u."][3] = '".$usercourses[$u][3]."';</script>";//secondIndex_class11
                echo "<script> courses[".$u."][4] = '".$usercourses[$u][4]."';</script>";//class1length
                echo "<script> courses[".$u."][5] = '".$usercourses[$u][5]."';</script>";//firstIndex_class2
                echo "<script> courses[".$u."][6] = '".$usercourses[$u][6]."';</script>";//secondIndex_class21
                echo "<script> courses[".$u."][7] = '".$usercourses[$u][7]."';</script>";//class2length
                echo "<script> courses[".$u."][8] = '".$usercourses[$u][8]."';</script>";//exam_date
                echo "<script> courses[".$u."][9] = '".$usercourses[$u][9]."';</script>";//exam_time_start
                echo "<script> courses[".$u."][10] = '".$usercourses[$u][10]."';</script>";//exam_time_end
            }
        ?>
        <!-- Courses -->
        <h2 class="titles">دروس ستاره دار پیشنهاد سیستم برای شما می باشد</h2>
        <div id="buttom_div">
            <div id="head">
                <p style="text-align:center;width:10%;">کد درس</p>
                <p style="text-align:center;width:24%;">نام درس</p>
                <p style="text-align:center;width:12%;">استاد</p>
                <p style="text-align:center;width:6%;">واحد</p>
                <p style="text-align:center;width:3%;">جنسیت</p>
                <p style="text-align:center;width:7%;">روز اول</p>
                <p style="text-align:center;width:10%;">ساعت</p>
                <p style="text-align:center;width:7%;">روز دوم</p>
                <p style="text-align:center;width:10%;">ساعت</p>
                <p style="text-align:center;width:10%;">امتحان</p>
            </div>
            <div id="all_courses_div">
                <table id="all_courses_table">
                    <tbody>
                        <?php 
                        for ($i = 0; $i < count($courses); $i++) {
                            for ($j = 0; $j < count($courses[$i]); $j++) {
                                echo "<tr onclick=\"selectCustomCourses('".$courses[$i][$j]->lesson_id."' , '".$courses[$i][$j]->lesson_name."' , '".$courses[$i][$j]->class_day."' , '".$courses[$i][$j]->class_time_start."', '".$courses[$i][$j]->class_time_end."', '".$courses[$i][$j]->class_day_two."' , '".$courses[$i][$j]->class_time_two_start."',  '".$courses[$i][$j]->class_time_two_end."','".$courses[$i][$j]->exam_date."'  , '".$courses[$i][$j]->exam_time_start."' , '".$courses[$i][$j]->exam_time_end."'  )\" class='head-of-table' id='".$courses[$i][$j]->lesson_id."'>
                                        <td style='text-align:center;width:10%;'>".$courses[$i][$j]->lesson_id."</td>
                                        <td style='text-align:center;width:24%;'>".$courses[$i][$j]->lesson_name."</td>
                                        <td style='text-align:center;width:12%;'>".$courses[$i][$j]->professor_name."</td>
                                        <td style='text-align:center;width:5%;'>".$courses[$i][$j]->vahed."</td>
                                        <td style='text-align:center;width:5%;'>".$courses[$i][$j]->sexuality."</td>
                                        <td class='class_day' style='text-align:center;width:7%;'>".$courses[$i][$j]->class_day."</td>
                                        <td class='class_time' style='text-align:center;width:10%;'>".$courses[$i][$j]->class_time_start."-".$courses[$i][$j]->class_time_end."</td>
                                        <td class='class_day2' style='text-align:center;width:7%;'>".$courses[$i][$j]->class_day_two."</td>
                                        <td class='class_time2' style='text-align:center;width:10%;'>".$courses[$i][$j]->class_time_two_start."-".$courses[$i][$j]->class_time_two_end."</td>
                                        <td style='text-align:center;width:15%;'>".$courses[$i][$j]->exam_date."<br>".$courses[$i][$j]->exam_time_start."-".$courses[$i][$j]->exam_time_end."</td>
                                    </tr>";
                            }
                        }
                        
                        for ($k = 0; $k < count($overbid_lessons); $k++) {
                            for ($l = 0; $l < count($overbid_lessons[$k]); $l++) {
                                echo "<tr onclick=\"selectCustomCourses('".$overbid_lessons[$k][$l]->lesson_id."' , '".$overbid_lessons[$k][$l]->lesson_name."' , '".$overbid_lessons[$k][$l]->class_day."' , '".$overbid_lessons[$k][$l]->class_time_start."', '".$overbid_lessons[$k][$l]->class_time_end."', '".$overbid_lessons[$k][$l]->class_day_two."' , '".$overbid_lessons[$k][$l]->class_time_two_start."',  '".$overbid_lessons[$k][$l]->class_time_two_end."','".$overbid_lessons[$k][$l]->exam_date."'  , '".$overbid_lessons[$k][$l]->exam_time_start."' , '".$overbid_lessons[$k][$l]->exam_time_end."' )\" class='head-of-table' id='".$overbid_lessons[$k][$l]->lesson_id."'>
                                        <td style='text-align:center;width:10%;'>".$overbid_lessons[$k][$l]->lesson_id."</td>
                                        <td style='text-align:center;width:24%;'>".$overbid_lessons[$k][$l]->lesson_name."*</td>
                                        <td style='text-align:center;width:12%;'>".$overbid_lessons[$k][$l]->professor_name."</td>
                                        <td style='text-align:center;width:5%;'>".$overbid_lessons[$k][$l]->vahed."</td>
                                        <td style='text-align:center;width:5%;'>".$overbid_lessons[$k][$l]->sexuality."</td>
                                        <td class='class_day' style='text-align:center;width:7%;'>".$overbid_lessons[$k][$l]->class_day."</td>
                                        <td class='class_time' style='text-align:center;width:10%;'>".$overbid_lessons[$k][$l]->class_time_start."-".$overbid_lessons[$k][$l]->class_time_end."</td>
                                        <td class='class_day2' style='text-align:center;width:7%;'>".$overbid_lessons[$k][$l]->class_day_two."</td>
                                        <td class='class_time2' style='text-align:center;width:10%;'>".$overbid_lessons[$k][$l]->class_time_two_start."-".$overbid_lessons[$k][$l]->class_time_two_end."</td>
                                        <td style='text-align:center;width:15%;'>".$overbid_lessons[$k][$l]->exam_date."<br>".$overbid_lessons[$k][$l]->exam_time_start."-".$overbid_lessons[$k][$l]->exam_time_end."</td>
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
        <input type="hidden" name="usercourses" id="usercourses">
        <!-- Buttons -->
        <div class="btn-css">
            <button type="button" class="button-css"><p class="back-text-css"><a href="javascript:history.go(-1)">بازگشت</a></p></button>
            <button type="button" onclick="submitSelectedCustomCourses()" class="button-css"><p class="submit-text-css">ثبت تغییرات</p></button>
        </div>
    </form>
@endsection

<!-- show_filter_div -->
{{-- @section('loginform')
    <div class="filter_div">
        <input id="userid_input" type="hidden" value="{{ Session::get('userid')}}">
        <div class="close_filter_css"><i onclick="closeFilterDiv()" class="fa fa-times" ></i></div>  
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
                    <td id="filter00" class="td_cursor" onclick="addFilter('0','0')"></td>
                    <td id="filter01" class="td_cursor" onclick="addFilter('0','1')"></td>
                    <td id="filter02" class="td_cursor" onclick="addFilter('0','2')"></td>
                    <td id="filter03" class="td_cursor" onclick="addFilter('0','3')"></td>
                    <td id="filter04" class="td_cursor" onclick="addFilter('0','4')"></td>
                    <td id="filter05" class="td_cursor" onclick="addFilter('0','5')"></td>
                </tr>
                <!-- sun -->
                <tr>
                    <th>یکشنبه</th> 
                    <td id="filter10" class="td_cursor" onclick="addFilter('1','0')"></td>                   
                    <td id="filter11" class="td_cursor" onclick="addFilter('1','1')"></td>
                    <td id="filter12" class="td_cursor" onclick="addFilter('1','2')"></td>
                    <td id="filter13" class="td_cursor" onclick="addFilter('1','3')"></td>
                    <td id="filter14" class="td_cursor" onclick="addFilter('1','4')"></td>
                    <td id="filter15" class="td_cursor" onclick="addFilter('1','5')"></td>
                </tr>
                <!-- mon -->
                <tr>
                    <th>دوشنبه</th>   
                    <td id="filter20" class="td_cursor" onclick="addFilter('2','0')"></td>
                    <td id="filter21" class="td_cursor" onclick="addFilter('2','1')"></td>
                    <td id="filter22" class="td_cursor" onclick="addFilter('2','2')"></td>
                    <td id="filter23" class="td_cursor" onclick="addFilter('2','3')"></td>
                    <td id="filter24" class="td_cursor" onclick="addFilter('2','4')"></td>
                    <td id="filter25" class="td_cursor" onclick="addFilter('2','5')"></td>                 
                </tr>
                <!-- tue -->
                <tr>
                    <th>سه شنبه</th>
                    <td id="filter30" class="td_cursor" onclick="addFilter('3','0')"></td>
                    <td id="filter31" class="td_cursor" onclick="addFilter('3','1')"></td>
                    <td id="filter32" class="td_cursor" onclick="addFilter('3','2')"></td>
                    <td id="filter33" class="td_cursor" onclick="addFilter('3','3')"></td>
                    <td id="filter34" class="td_cursor" onclick="addFilter('3','4')"></td>
                    <td id="filter35" class="td_cursor" onclick="addFilter('3','5')"></td>                     
                </tr>
                <!-- wed -->
                <tr>
                    <th>چهارشنبه</th>                    
                    <td id="filter40" class="td_cursor" onclick="addFilter('4','0')"></td>
                    <td id="filter41" class="td_cursor" onclick="addFilter('4','1')"></td>
                    <td id="filter42" class="td_cursor" onclick="addFilter('4','2')"></td>
                    <td id="filter43" class="td_cursor" onclick="addFilter('4','3')"></td>
                    <td id="filter44" class="td_cursor" onclick="addFilter('4','4')"></td>
                    <td id="filter45" class="td_cursor" onclick="addFilter('4','5')"></td> 
                </tr>
            </tbody>
        </table> 
        <input id="filters" name="filters" type="hidden" >
    </div>
@endsection --}}

@section('script')
    <script src="js/selectedCourses.js"></script>
    {{-- weeklySchedule Lessons --}}
    <script>
        $( document ).ready(function(){
            for(var c = 0 ; c < count ; c++){
                if(courses[c][4] == 2){
                    $("#"+courses[c][2]+courses[c][3]).parent().addClass('same-class1');
                    $("#"+courses[c][2]+courses[c][3]).val(courses[c][1]);
                    $("#"+courses[c][2]+courses[c][3]).prop('title',courses[c][0]);
                }else if(courses[c][4] == 3){
                    $("#"+courses[c][2]+courses[c][3]).parent().addClass('same-class2');
                    $("#"+courses[c][2]+courses[c][3]).val(courses[c][1]);
                    $("#"+courses[c][2]+courses[c][3]).prop('title',courses[c][0]);
                }else if(courses[c][4]== 4){
                    $("#"+courses[c][2]+courses[c][3]).parent().addClass('same-class3');
                    $("#"+courses[c][2]+courses[c][3]).val(courses[c][1]);
                    $("#"+courses[c][2]+courses[c][3]).prop('title',courses[c][0]);
                }
                if(courses[c][7] == 2){
                    $("#"+courses[c][5]+courses[c][6]).parent().addClass('same-class1');
                    $("#"+courses[c][5]+courses[c][6]).val(courses[c][1]);
                    $("#"+courses[c][5]+courses[c][6]).prop('title',courses[c][0]);
                }else if(courses[c][7] == 3){
                    $("#"+courses[c][5]+courses[c][6]).parent().addClass('same-class2');
                    $("#"+courses[c][5]+courses[c][6]).val(courses[c][1]);
                    $("#"+courses[c][5]+courses[c][6]).prop('title',courses[c][0]);
                }else if(courses[c][7]== 4){
                    $("#"+courses[c][5]+courses[c][6]).parent().addClass('same-class3');
                    $("#"+courses[c][5]+courses[c][6]).val(courses[c][1]);
                    $("#"+courses[c][5]+courses[c][6]).prop('title',courses[c][0]);
                }
            }
        });
    </script>
@endsection
        {{-- //after load
        // $( document ).ready(function(){
        //     setTimeout(function(){ 
        //         $('.head-of-table').each(function() {
        //             var currentElement = $(this);
        //             var classtime = currentElement.find(".class_time").html();
        //             var classtime2 = currentElement.find(".class_time2").html();
        //             if(classtime != undefined)
        //                 classtime = classtime.substring(0, classtime.indexOf("--"));// 08:00--12:30
        //             var classday = currentElement.find(".class_day").html();
        //             if(classtime2 != undefined)
        //                 classtime2 = classtime2.substring(0, classtime2.indexOf("--"));// 08:00--12:30
        //             var classday2 = currentElement.find(".class_day2").html();
        //             if(($.trim(classtime) != "" && $.trim(classday) != "") || ($.trim(classtime2) != "" && $.trim(classday2) != "")) {
        //                 if(classday == "شنبه" && classtime == "8:00")
        //                     currentElement.addClass("t0");
        //                 if(classday2 == "شنبه" && classtime2 == "8:00")  
        //                     currentElement.addClass("tt0");
        //                 if (classday == "شنبه" && classtime == "9:30")
        //                     currentElement.addClass("t1");
        //                 if(classday2 == "شنبه" && classtime2 == "9:30")
        //                     currentElement.addClass("tt1");
        //                 if (classday == "شنبه" && classtime == "11:00")
        //                     currentElement.addClass("t2");                 
        //                 if(classday2 == "شنبه" && classtime2 == "11:00")
        //                     currentElement.addClass("tt2"); 
        //                 if (classday == "شنبه" && classtime == "2:00" )
        //                     currentElement.addClass("t3");
        //                 if(classday2 == "شنبه" && classtime2 == "2:00")
        //                     currentElement.addClass("tt3");
        //                 if(classday == "شنبه" && classtime == "3:30")
        //                     currentElement.addClass("t4");   
        //                 if(classday2 == "شنبه" && classtime2 == "3:30")
        //                     currentElement.addClass("tt4"); 
        //                 if(classday == "شنبه" && classtime == "5:00")
        //                     currentElement.addClass("t5");
        //                 if(classday2 == "شنبه" && classtime2 == "5:00")
        //                     currentElement.addClass("tt5");
        //                 //sun
        //                 if(classday == "یک شنبه" && classtime == "8:00")
        //                     currentElement.addClass("t6");
        //                 if(classday2 == "یک شنبه" && classtime2 == "8:00")  
        //                     currentElement.addClass("tt6");
        //                 if (classday == "یک شنبه" && classtime == "9:30")
        //                     currentElement.addClass("t7");
        //                 if(classday2 == "یک شنبه" && classtime2 == "9:30")
        //                     currentElement.addClass("tt7");
        //                 if (classday == "یک شنبه" && classtime == "11:00")
        //                     currentElement.addClass("t8");                 
        //                 if(classday2 == "یک شنبه" && classtime2 == "11:00")
        //                     currentElement.addClass("tt8"); 
        //                 if (classday == "یک شنبه" && classtime == "2:00" )
        //                     currentElement.addClass("t9");
        //                 if(classday2 == "یک شنبه" && classtime2 == "2:00")
        //                     currentElement.addClass("tt9");
        //                 if(classday == "یک شنبه" && classtime == "3:30")
        //                     currentElement.addClass("t10");   
        //                 if(classday2 == "یک شنبه" && classtime2 == "3:30")
        //                     currentElement.addClass("tt10"); 
        //                 if(classday == "یک شنبه" && classtime == "5:00")
        //                     currentElement.addClass("t11");
        //                 if(classday2 == "یک شنبه" && classtime2 == "5:00")
        //                     currentElement.addClass("tt11");
        //                 //mon
        //                 if(classday == "دوشنبه" && classtime == "8:00")
        //                     currentElement.addClass("t12");
        //                 if(classday2 == "دوشنبه" && classtime2 == "8:00")  
        //                     currentElement.addClass("tt12");
        //                 if (classday == "دوشنبه" && classtime == "9:30")
        //                     currentElement.addClass("t13");
        //                 if(classday2 == "دوشنبه" && classtime2 == "9:30")
        //                     currentElement.addClass("tt13");
        //                 if (classday == "دوشنبه" && classtime == "11:00")
        //                     currentElement.addClass("t14");                 
        //                 if(classday2 == "دوشنبه" && classtime2 == "11:00")
        //                     currentElement.addClass("tt14"); 
        //                 if (classday == "دوشنبه" && classtime == "2:00" )
        //                     currentElement.addClass("t15");
        //                 if(classday2 == "دوشنبه" && classtime2 == "2:00")
        //                     currentElement.addClass("tt15");
        //                 if(classday == "دوشنبه" && classtime == "3:30")
        //                     currentElement.addClass("t16");   
        //                 if(classday2 == "دوشنبه" && classtime2 == "3:30")
        //                     currentElement.addClass("tt16"); 
        //                 if(classday == "دوشنبه" && classtime == "5:00")
        //                     currentElement.addClass("t17");
        //                 if(classday2 == "دوشنبه" && classtime2 == "5:00")
        //                     currentElement.addClass("tt17");
        //                 //tue
        //                 if(classday == "سه شنبه" && classtime == "8:00")
        //                     currentElement.addClass("t18");
        //                 if(classday2 == "سه شنبه" && classtime2 == "8:00")  
        //                     currentElement.addClass("tt18");
        //                 if (classday == "سه شنبه" && classtime == "9:30")
        //                     currentElement.addClass("t19");
        //                 if(classday2 == "سه شنبه" && classtime2 == "9:30")
        //                     currentElement.addClass("tt19");
        //                 if (classday == "سه شنبه" && classtime == "11:00")
        //                     currentElement.addClass("t20");                 
        //                 if(classday2 == "سه شنبه" && classtime2 == "11:00")
        //                     currentElement.addClass("tt20"); 
        //                 if (classday == "سه شنبه" && classtime == "2:00" )
        //                     currentElement.addClass("t21");
        //                 if(classday2 == "سه شنبه" && classtime2 == "2:00")
        //                     currentElement.addClass("tt21");
        //                 if(classday == "سه شنبه" && classtime == "3:30")
        //                     currentElement.addClass("t22");   
        //                 if(classday2 == "سه شنبه" && classtime2 == "3:30")
        //                     currentElement.addClass("tt22"); 
        //                 if(classday == "سه شنبه" && classtime == "5:00")
        //                     currentElement.addClass("t23");
        //                 if(classday2 == "سه شنبه" && classtime2 == "5:00")
        //                     currentElement.addClass("tt23");
        //                 //wed
        //                 if(classday == "چهارشنبه" && classtime == "8:00")
        //                     currentElement.addClass("t24");
        //                 if(classday2 == "چهارشنبه" && classtime2 == "8:00")  
        //                     currentElement.addClass("tt24");
        //                 if (classday == "چهارشنبه" && classtime == "9:30")
        //                     currentElement.addClass("t25");
        //                 if(classday2 == "چهارشنبه" && classtime2 == "9:30")
        //                     currentElement.addClass("tt25");
        //                 if (classday == "چهارشنبه" && classtime == "11:00")
        //                     currentElement.addClass("t26");                 
        //                 if(classday2 == "چهارشنبه" && classtime2 == "11:00")
        //                     currentElement.addClass("tt26"); 
        //                 if (classday == "چهارشنبه" && classtime == "2:00" )
        //                     currentElement.addClass("t27");
        //                 if(classday2 == "چهارشنبه" && classtime2 == "2:00")
        //                     currentElement.addClass("tt27");
        //                 if(classday == "چهارشنبه" && classtime == "3:30")
        //                     currentElement.addClass("t28");   
        //                 if(classday2 == "چهارشنبه" && classtime2 == "3:30")
        //                     currentElement.addClass("tt28"); 
        //                 if(classday == "چهارشنبه" && classtime == "5:00")
        //                     currentElement.addClass("t29");
        //                 if(classday2 == "چهارشنبه" && classtime2 == "5:00")
        //                     currentElement.addClass("tt29");                        
        //             }
        //             if(($.trim(classtime) != "" && $.trim(classday) != "") && ($.trim(classtime2) != "" && $.trim(classday2) != "")) {
        //                 currentElement.addClass("twoday");
        //             }
        //         });
        //     }, 3000);            
        // });
        //set filter
        // function closeFilterDiv(){
        //     var filters =  $('#filters').val().split(",") ;
        //     var tmpfilter = 0;
        //     for(tf = 0; tf < 30 ;  tf++){
        //         if(filters[tf] == "1" ){
        //             tmpfilter = 1;
        //             break;
        //         }
        //     }
        //     if(tmpfilter == 1){
        //         var elems = document.getElementsByClassName('head-of-table');
        //         for (var i = 0, len = elems.length; i < len; i++) {  
        //             elems[i].classList.remove('backgreen');
        //             elems[i].classList.remove('backgray');
        //         }
        //         $('.filter_div').css('display' , 'none');
        //             $('.main-container').removeClass('disable'); 
        //             $('.head-container').removeClass('disable'); 
        //             $('.page-footer').removeClass('disable');
        //             // 
        //             var filtertimes =[];
        //             for(var i =0; i < 30 ; i++) {
        //                 if(filters[i] == 1) {
        //                     filtertimes.push(i);
        //                 }
        //             }

        //             var elems = document.getElementsByClassName('head-of-table');

        //             for (var i = 0, len = elems.length; i < len; i++) {   
        //                 var bool = [];
        //                 if(elems[i].classList.contains("twoday")){
        //                     for(var k =0; k < filtertimes.length ; k++) {                           
        //                         if(elems[i].classList.contains("t"+filtertimes[k])) {
        //                             bool.push(1);
        //                         }
        //                         if(elems[i].classList.contains("tt"+filtertimes[k])) {
        //                             bool.push(1);
        //                             break;
        //                         }
        //                     }
        //                     if(bool.length == 2){
        //                         elems[i].classList.add('backgreen');
        //                     }else{
        //                         elems[i].classList.add('backgray');
        //                     }
        //                 }
        //                 else{
        //                     for(var k =0; k < filtertimes.length ; k++) {                           
        //                         if(elems[i].classList.contains("t"+filtertimes[k])) {
        //                             bool.push(1);
        //                             break;
        //                         }
        //                     }
        //                     if(bool.length == 1){
        //                         elems[i].classList.add('backgreen');
        //                     }else{
        //                         elems[i].classList.add('backgray');
        //                     }
        //                 }
        //             }
        //     }else{
                
        //         $('.filter_div').css('display' , 'none');
        //         $('.main-container').removeClass('disable'); 
        //         $('.head-container').removeClass('disable'); 
        //         $('.page-footer').removeClass('disable');
        //         var elems = document.getElementsByClassName('head-of-table');
        //         for (var i = 0, len = elems.length; i < len; i++) {  
        //             elems[i].classList.remove('backgreen');
        //             elems[i].classList.remove('backgray');
        //         }
        //     }             
        // } --}}

