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
  {{-- available lessons --}}
  <div class="edit_div">  
    <div class="edit_div_head">
      <p style="width: 12%;text-align: center;background-color:white;">نام درس</p>
      <p style="width: 8%;text-align: center;background-color:white;">کد درس</p>
      <p style="width: 10%;text-align: center;background-color:white;">نام استاد</p>
      <p style="width: 5%;text-align: center;background-color:white;">نوع درس</p>
      <p style="width: 5%;text-align: center;background-color:white;">واحد</p>
      <p style="width: 5%;text-align: center;background-color:white;">جنسیت</p>
      <p style="width: 14%;text-align: center;background-color:white;">کلاس اول</p>
      <p style="width: 14%;text-align: center;background-color:white;">کلاس دوم</p>
      <p style="width: 17%;text-align: center;background-color:white;">تاریخ امتحان</p>
      <p style="width: 10%;text-align: center;background-color:white;">عملیات</p>
    </div>   
    <table class="coursestableforEdit" id="tbody">
      <tbody>
        <?php 
          for ($i = 0; $i < count($posts); $i++) {
            echo "<tr class='head-of-table' id='".$posts[$i]->lesson_id."'>
                    <td class='lesson_name' style='width:12%;text-align: center;'>".$posts[$i]->lesson_name."</td>
                    <td class='lesson_id' style='width:8%;text-align: center;'>".$posts[$i]->lesson_id."</td>
                    <td class='professor_name' style='width:10%;text-align: center;'>".$posts[$i]->professor_name."</td>
                    <td class='kind_of_lesson' style='width:5%;text-align: center;'>".$posts[$i]->kind_of_lesson."</td>
                    <td class='vahed' style='width:5%;text-align: center;'>".$posts[$i]->vahed."</td>
                    <td class='sexuality' style='width:5%;text-align: center;'>".$posts[$i]->sexuality."</td>
                    <td class='class_day' style='width:14%;text-align: center;'>".$posts[$i]->class_day."<br>".$posts[$i]->class_time_start."-".$posts[$i]->class_time_end."</td>
                    <td class='class_day_two' style='width:14%;text-align: center;'>".$posts[$i]->class_day_two."<br>".$posts[$i]->class_time_two_start."-".$posts[$i]->class_time_two_end."</td>
                    <td class='exam_date' style='width:17%;text-align: center;'>".$posts[$i]->exam_date."<br>".$posts[$i]->exam_time_start."-".$posts[$i]->exam_time_end."</td>
                    <td class='text-right' style='width: 10%;text-align: center;'>
                      <a  class='btn btn-success editbtn' id='editbtn' style='width: 80px;' onclick=\"showEdit('".$posts[$i]->lesson_id."')\">ویرایش</a>
                      <a href='#' class='btn btn-success editbtn' style='width: 80px;' onclick=\"deleteLesson('".$posts[$i]->lesson_id."')\">حذف</a>
                    </td>
                </tr>";
          }
          ?>
      </tbody>
    </table>
  </div>
  {{-- edit box  --}}
  <div class="form" >
    <form  method="post">
      @csrf
      @method('PUT')
      <div> 
        <div class="user_request_top paddingTopzero"><p class="user_request_top_p display_contents">ویرایش درس</p></div>
        <div class="fa-close-Editdiv"><i onclick="closeEdit()" class="fa fa-times" ></i></div>
      </div>  
      <div class="user_request_content heigthDiv">
        <div id="Edit">
          {{-- Lesson_id  --}}
          <div class="form-group col-md-6 inputDiv">
            <label  class="form_lable" for="lesson_id_Input">کد درس</label>
            <input style="width: 100%;display: inline;float: right;" autocomplete="off" type="text" class="form-control" id="lesson_id" name="lesson_id" value="{{ old('lesson_id') }}" title="کد درس باید شامل اعداد باشد">
            <span>
              <p id="lesson_id_error" style="color:red;margin:1px;text-align:right;float:right;display:none;"></p>
            </span>
          </div>
          {{-- lesson_name --}}
          <div class="form-group col-md-6 inputDiv">
            <label class="form_lable" for="lesson_name_Input">نام درس</label>
            <input autocomplete="off" type="text" class="form-control" id="lesson_name" name="lesson_name" value="{{ old('lesson_name') }}" title="نام درس میتواند شامل حروف و اعداد باشد">
            <span>
              <p id="lesson_name_error" style="color:red;margin:1px;text-align:right;float:right;display:none;"></p>
            </span>      
          </div>
          {{-- kind_of_lesson --}}
          <div class="form-group col-md-6 inputDiv" id="kind_of_lessonInput">
            <label class="form_lable" for="kind_of_lesson">نوع درس</label>            
            <select class="form-control" name="kind_of_lesson" id="kind_of_lesson">
              <option></option>
              <option value="پایه" @if (old('kind_of_lesson') == 'پایه')@endif>پایه</option>
              <option value="تخصصی" @if (old('kind_of_lesson') == 'تخصصی')@endif>تخصصی</option>
              <option value="اختیاری" @if (old('kind_of_lesson') == 'اختیاری')@endif>اختیاری</option>
              <option value="اصلی" @if (old('kind_of_lesson') == 'اصلی')@endif>اصلی</option>
              <option value="عمومی" @if (old('kind_of_lesson') == 'عمومی')@endif>عمومی</option>
            </select>
            <span>
              <p id="kind_of_lesson_error" style="color:red;margin:1px;text-align:right;float:right;display:none;"></p>
            </span>
          </div>
          {{-- vahed --}}
          <div class="form-group col-md-6 inputDiv">
            <label class="form_lable" for="sexuality">تعدادواحد</label>
            <select class="form-control" name="vahed" id="vahed">
              <option></option>
              <option value="1" @if (old('vahed') == '1')@endif>1</option>
              <option value="2" @if (old('vahed') == '2')@endif>2</option>
              <option value="3" @if (old('vahed') == '3')@endif>3</option>
              <option value="4" @if (old('vahed') == '4')@endif>4</option>
            </select>
            <span>
              <p id="vahed_error" style="color:red;margin:1px;text-align:right;float:right;display:none;"></p>
            </span>
          </div> 
          {{-- professor_name --}}
          <div class="form-group col-md-6 inputDiv">
            <label class="form_lable" for="professor_name_Input">نام استاد</label>
            <input autocomplete="off" type="text" class="form-control" id="professor_name" name="professor_name"
            value="{{ old('professor_name') }}">             
          </div>
          {{-- sexuality --}}
          <div class="form-group col-md-6 inputDiv">
            <label class="form_lable" for="sexuality">جنسیت</label>
            <select class="form-control" name="sexuality" id="sexuality" title="">
              <option value="مختلط" @if (old('sexuality') == 'مختلط')@endif>مختلط</option>
              <option value="دختر"  @if (old('sexuality') == 'دختر')@endif>دختر</option>
              <option value="پسر"  @if (old('sexuality') == 'پسر')@endif>پسر</option>            
            </select>
          </div> 
          {{-- class_time --}}
          <div class="form-group col-md-6 inputDiv" id="class_timeInput">
            <label class="form_lable width100" for="class_time_start">زمان کلاس اول</label>
            <input class="form-control" name="class_time" id="class_time_start"  value="{{ old('class_time_start') }}">   
            <span style="font-weight: 600;">تا</span>
            {{-- class_time_end--}}
            <input class="form-control" name="class_time" id="class_time_end"  value="{{ old('class_time_end') }}">                       
          </div>
          {{-- class_day --}}
          <div class="form-group col-md-6 inputDiv" id="class_dayInput">
            <label class="form_lable" for="class_day">روز کلاس اول</label>
            <select class="form-control" name="class_day" id="class_day" value="{{ old('class_day') }}" title="روز کلاس را انتخاب کنید">
              <option>--</option>
              <option value="شنبه" @if (old('class_day') == 'شنبه')@endif>شنبه</option>
              <option value="یک شنبه"  @if (old('class_day') == 'یک شنبه')@endif>یک شنبه</option>
              <option value="دوشنبه"  @if (old('class_day') == 'دوشنبه')@endif>دوشنبه</option>
              <option value="سه شنبه"  @if (old('class_day') == 'سه شنبه')@endif>سه شنبه</option>
              <option value="چهارشنبه"  @if (old('class_day') == 'چهارشنبه')@endif>چهارشنبه</option>
            </select>          
          </div>
          {{-- class_time_two --}}
          <div class="form-group col-md-6 inputDiv" id="class_time_twoInput"> 
            <label class="form_lable width100" for="class_time_two">زمان کلاس دوم</label>
            <input class="form-control" name="class_time_two_start" id="class_time_two_start"  value="{{ old('class_time_two_start') }}">
            <span style="font-weight: 600;">تا</span>
            {{-- class_time_two_end--}}
            <input class="form-control" name="class_time_two_end" id="class_time_two_end"  value="{{ old('class_time_two_end') }}">
          </div>
          {{-- class_day_two --}}
          <div class="form-group col-md-6 inputDiv" id="class_day_twoInput">
            <label class="form_lable" for="class_day_two">روز کلاس دوم</label>
            <select class="form-control" name="class_day_two" id="class_day_two" title="روز کلاس را انتخاب کنید">
              <option>--</option>
              <option value="شنبه" @if (old('class_day_two') == 'شنبه')@endif>شنبه</option>
              <option value="یک شنبه"  @if (old('class_day_two') == 'یک شنبه')@endif>یک شنبه</option>
              <option value="دوشنبه"  @if (old('class_day_two') == 'دوشنبه')@endif>دوشنبه</option>
              <option value="سه شنبه"  @if (old('class_day_two') == 'سه شنبه')@endif>سه شنبه</option>
              <option value="چهارشنبه"  @if (old('class_day_two') == 'چهارشنبه')@endif>چهارشنبه</option>
            </select>
          </div>
          {{-- exam_time --}}
          <div class="form-group col-md-6 inputDiv">
            <label class="form_lable width100" for="time">ساعت امتحان</label>
            <input type="text" id="time_start"  autocomplete="off" class="form-control" value="{{ old('time_start') }}">
            <span style="font-weight: 600;">تا</span>
            <input type="text" id="time_end"  autocomplete="off" class="form-control" value="{{ old('time_end') }}">
          </div>
          {{-- exam_date --}}
          <div class="form-group col-md-6 inputDiv"">            
            <label class="form_lable" for="exam_date">تاریخ امتحان</label>
            <div class="input-group">
              <input autocomplete="off" type="text" class="form-control background_css" id="toDate1" name="toDate1"  value="{{ old('toDate1') }}">
              <div  class="input-group-addon" data-MdDateTimePicker="true" data-trigger="click" 
                data-targetselector="#toDate1" data-groupid="group1" data-todate="true" 
                data-enabletimepicker="false" data-placement="left" style="border-radius: 17%;
                cursor: pointer;background-color: #fff;color: #093311;">
                  <span class="glyphicon glyphicon-calendar"></span>
              </div>    
            </div>            
          </div>
          <input autocomplete="off" type="button" class="edit_btn_submit btn btn-lg btn-secondary btn-block text-uppercase" name="edit-btn" id="edit-btn" value="ثبت تغییرات">   
        </div>
      </div>
    </form>  
  </div>
@endsection

@section('script')
  <script type="text/javascript">
    function showEdit(id) {
      $.ajax({
        type: "POST",
        url: "{{route('edit')}}",
        dataType:'json',
        data : {
          '_token': '{{csrf_token()}}',
          'lesson_id' :id,
        },
        success: function(data) {
          $('.form').css('display','block');
          $('.menuDiv').addClass('disable'); 
          $('.edit_div').addClass('disable');
          $('#lesson_id').val(data.lesson_id);
          $('#lesson_name').val(data.lesson_name);
          $('#kind_of_lesson').val(data.kind_of_lesson);
          $('#professor_name').val(data.professor_name);
          $('#class_day').val(data.class_day);
          $('#class_day_two').val(data.class_day_two);
          $('#class_time_start').val(data.class_time_start);
          $('#class_time_end').val(data.class_time_end);
          $('#class_time_two_start').val(data.class_time_two_start);
          $('#class_time_two_end').val(data.class_time_two_end);
          $('#time_start').val(data.exam_time_start);
          $('#time_end').val(data.exam_time_end);
          $('#toDate1').val(data.exam_date);
          $('#vahed').val(data.vahed);
          $('#sexuality').val(data.sexuality);
        },
        error:function(data) {
            Swal.fire({
            icon: 'error',
            title: 'ادمین عزیزسیستم با مشکل مواجه شده است لطفا بعدا امتحان کنید',
            showConfirmButton: false,
            timer: 2000
            });
        }
      });
    } 
    function closeEdit(){
      $('.form').css('display','none');
      $('.menuDiv').removeClass('disable'); 
      $('.edit_div').removeClass('disable');
    }
    function deleteLesson(id){
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
        title: 'آیا اطمینان دارید؟',
        text: "این درس از دروس ارائه شده حذف خواهدشد!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'بله, حذف شود!',
        cancelButtonText: 'خیر, صرف نظر شود!',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          $.ajax({
            type: "POST",
            url: "{{route('deleteLesson')}}",
            dataType:'text',
            data : {
              '_token': '{{csrf_token()}}',
              'lesson_id' : id,
            },
            success: function(data) {
              $('#'+id).css('display' , 'none');
              swal.fire({
                icon: 'success',
                title: ' درس مورد نظر از دروس ارائه شده حذف شد!',
                showConfirmButton: false,
                timer: 3000
              });
            },
            error:function(data) {
                Swal.fire({
                icon: 'error',
                title: 'ادمین عزیز متاسفانه سیستم با مشکل مواجه شده است.لطفا بعدا امتحان کنید',
                showConfirmButton: false,
                timer: 3000
                });
            }
          });
        }
      })
    }
    $('#edit-btn').click(function () {
      $("#lesson_id").css("border", "0px");
      $("#lesson_name").css("border", "0px");
      $("#kind_of_lesson").css("border", "0px");
      $("#vahed").css("border", "0px");
      $.ajax({
        type: "POST",
        url: "{{route('updateLesson')}}",
        dataType:'text',
        data : {
          '_token': '{{csrf_token()}}',
          'lesson_id' : $('#lesson_id').val() ,
          'lesson_name' : $('#lesson_name').val() ,
          'kind_of_lesson' : $('#kind_of_lesson').val() ,
          'professor_name' : $('#professor_name').val() ,
          'class_time_start' : $('#class_time_start').val() ,
          'class_time_end' : $('#class_time_end').val() ,
          'class_day' : $('#class_day').val() ,
          'class_time_two_start' : $('#class_time_two_start').val() ,
          'class_time_two_end' : $('#class_time_two_end').val() ,
          'class_day_two' : $('#class_day_two').val() ,
          'sexuality' : $('#sexuality').val() ,
          'exam_date' : $('#toDate1').val() ,
          'exam_time_start' : $('#time_start').val() ,
          'exam_time_end' : $('#time_end').val() ,
          'vahed' :$('#vahed').val() ,
        },
        success: function(data) {
          if($.trim(data) != "") {
            data = JSON.parse(data);
            if(data.lesson_id != undefined || data.lesson_name != undefined || data.kind_of_lesson != undefined || data.vahed != undefined ) {
              if(data.lesson_id != undefined){
                $("#lesson_id").css("border", "3px solid red");
              }
              if(data.lesson_name != undefined){
                $("#lesson_name").css("border", "3px solid red");
              }
              if(data.kind_of_lesson != undefined){
                $("#kind_of_lesson").css("border", "3px solid red");
              }
              if(data.vahed != undefined){
                $("#vahed").css("border", "3px solid red");
              }              
            }
          } else {
            var lesson_id = $('#lesson_id').val();
            var lesson_name = $('#lesson_name').val() ;
            var kind_of_lesson = $('#kind_of_lesson').val() ;
            var professor_name = $('#professor_name').val() ;
            var class_time_start = $('#class_time_start').val() ;
            var class_time_end = $('#class_time_end').val() ;
            var class_day =  $('#class_day').val() ;
            var class_time_two_start =  $('#class_time_two_start').val() ;
            var class_time_two_end =  $('#class_time_two_end').val() ;
            var class_day_two =  $('#class_day_two').val() ;
            var sexuality =  $('#sexuality').val() ;
            var exam_date =  $('#toDate1').val() ;
            var exam_time_start =  $('#time_start').val() ;
            var exam_time_end =  $('#time_end').val() ;
            var vahed = $('#vahed').val() ;
            $('#'+lesson_id).find(".lesson_name").html(lesson_name);
            $('#'+lesson_id).find(".lesson_id").html(lesson_id);
            $('#'+lesson_id).find(".kind_of_lesson").html(kind_of_lesson);
            $('#'+lesson_id).find(".professor_name").html(professor_name);
            $('#'+lesson_id).find(".class_day").html(class_day+"<br>"+class_time_start+"-"+class_time_end);
            $('#'+lesson_id).find(".class_day_two").html(class_day_two+"<br>"+class_time_two_start+"-"+class_time_two_end);
            $('#'+lesson_id).find(".exam_date").html(exam_date+"<br>"+exam_time_start+"-"+exam_time_end);
            $('#'+lesson_id).find(".vahed").html(vahed);
            $('#'+lesson_id).find(".sexuality").html(sexuality);
            $('.form').css('display','none');
            $('.menuDiv').removeClass('disable'); 
            $('.edit_div').removeClass('disable');
            Swal.fire({
              icon: 'success',
              title: 'عملیات ویرایش درس با موفقیت انجام شد',
              showConfirmButton: false,
              timer: 3000
            });
          }
        },
        error:function(data) {
            Swal.fire({
            icon: 'error',
            title: 'ادمین عزیز متاسفانه سیستم با مشکل مواجه شده است.لطفا بعدا امتحان کنید',
            showConfirmButton: false,
            timer: 3000
            });
        }
      });
    });
    $('#class_time_start').timepicker({
      'timeFormat': 'HH:mm',
      'minTime': '8:00',
      'maxTime': '20:00',
      'showDuration': true
    });
    $('#class_time_end').timepicker({
      'timeFormat': 'HH:mm',
      'minTime': '8:00',
      'maxTime': '20:00',
      'showDuration': true
    });
    $('#class_time_two_start').timepicker({
      'timeFormat': 'HH:mm',
      'minTime': '8:00',
      'maxTime': '20:00',
      'showDuration': true
    });
    $('#class_time_two_end').timepicker({
      'timeFormat': 'HH:mm',
      'minTime': '8:00',
      'maxTime': '20:00',
      'showDuration': true
    });
    $('#time_start').timepicker({
      'timeFormat': 'HH:mm',
      'minTime': '8:00',
      'maxTime': '20:00',
      'showDuration': true
    });
    $('#time_end').timepicker({
      'timeFormat': 'HH:mm',
      'minTime': '8:00',
      'maxTime': '20:00',
      'showDuration': true
    });
  </script>
  <script src="js/jquery-2.1.4.js" type="text/javascript"></script>
  <script src="js/bootstrap.min.js" type="text/javascript"></script>
  <script src="js/calendar.js" type="text/javascript"></script>
  <script src="js/jquery.Bootstrap-PersianDateTimePicker.js" type="text/javascript"></script>
@endsection
