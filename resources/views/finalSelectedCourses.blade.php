@extends('index')

@section('head')
    <link rel="stylesheet" href="css/finalSelectedCourses.css">
    <link rel="stylesheet" href="css/polaris.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
@endsection

@section('navbar')
    @include('profilemenu')
@endsection

@section('main-container')
    <!-- weeklySchedule_table -->
    <div class="table1-div" >
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
        var courses = [];
        for( var i = 0; i < 24; i++) {
            courses[i] = [];
        }
    </script>  

    <?php
        for($u = 0 ; $u < count($usercourses) ; $u++){
            echo "<script> courses[".$u."][0] = '".$usercourses[$u][0]."';</script>";//id
            echo "<script> courses[".$u."][1] = '".$usercourses[$u][1]."';</script>";//name
            echo "<script> courses[".$u."][2] = ".$usercourses[$u][2].";</script>";//firstIndex_class1
            echo "<script> courses[".$u."][3] = ".$usercourses[$u][3].";</script>";//secondIndex_class11
            echo "<script> courses[".$u."][4] = ".$usercourses[$u][4].";</script>";//class1length
            echo "<script> courses[".$u."][5] = ".$usercourses[$u][5].";</script>";//firstIndex_class2
            echo "<script> courses[".$u."][6] = ".$usercourses[$u][6].";</script>";//secondIndex_class21
            echo "<script> courses[".$u."][7] = ".$usercourses[$u][7].";</script>";//class2length
        }
    ?>

    <!-- Buttons -->
    <div class="btn-css">
        <button type="button" class="button-css"><p class="back-text-css"><a href="{{route('availableCourses')}}">ویرایش</a></p></button>
        <button class="button-css btn" id="btn"><p class="submit-text-css">مشاهده خطاها</p></button>
    </div>
    
    <!-- Modal  for error message-->
    <script>var prerequisitesCourses = [];</script>
    <?php
        for ($i=0 ; $i < count($coursesError)-1 ; $i++) {           
            if ( count($coursesError[$i]) == 3) {
                echo"<script>prerequisitesCourses.push('<h1>".$coursesError[$i][0]." : ".$coursesError[$i][1]." ? ".$coursesError[$i][2]."</h1>');</script>";
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
    {{-- error message --}}
    <script src="js/finalSelectedCourses.js" ></script>
    {{-- weeklySchedule Lessons --}}
    <script>
        for(var c = 0 ; c < courses.length ; c++){
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
    </script>
@endsection 