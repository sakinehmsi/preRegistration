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

  <div class="user_request_div"> 
    <div class="user_request_top">
      <p class="user_request_top_p">افزودن درس جدید</p>
    </div>
    <div class="user_request_content heigthDiv">
      <form class="addlesson-form" method="POST" id="addlesson-form">
        {{csrf_field()}} 
        {{-- Lesson_id  --}}
        <div class="form-group col-md-6 inputDiv">
          <label  class="form_lable" for="lesson_id_Input">کد درس</label>
          <input id="lesson_id" autocomplete="off" type="text" class="form-control" id="lesson_id" name="lesson_id" value="{{ old('lesson_id') }}" title="کد درس باید شامل اعداد باشد">
          <i id="getLesson" class="fa fa-history" aria-hidden="true"></i>
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
            <option value="پایه" @if (old('kind_of_lesson') == 'پایه') selected="selected" @endif>پایه</option>
            <option value="تخصصی" @if (old('kind_of_lesson') == 'تخصصی') selected="selected" @endif>تخصصی</option>
            <option value="اختیاری" @if (old('kind_of_lesson') == 'اختیاری') selected="selected" @endif>اختیاری</option>
            <option value="اصلی" @if (old('kind_of_lesson') == 'اصلی') selected="selected" @endif>اصلی</option>
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
            <option value="1" @if (old('vahed') == '1') selected="selected" @endif>1</option>
            <option value="2" @if (old('vahed') == '2') selected="selected" @endif>2</option>
            <option value="3" @if (old('vahed') == '3') selected="selected" @endif>3</option>
            <option value="4" @if (old('vahed') == '4') selected="selected" @endif>4</option>
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
            <option value="مختلط" @if (old('sexuality') == 'مختلط') selected="selected" @endif>مختلط</option>
            <option value="دختر"  @if (old('sexuality') == 'دختر') selected="selected" @endif>دختر</option>
            <option value="پسر"  @if (old('sexuality') == 'پسر') selected="selected" @endif>پسر</option>            
          </select>
        </div> 
        {{-- class_time --}}
        <div class="form-group col-md-6 inputDiv" id="class_timeInput">
          <label class="form_lable" for="class_time">زمان کلاس اول</label>
          <select class="form-control" name="class_time" id="class_time" title="زمان کلاس را انتخاب کنید">
            <option>--</option>
            <option value="8:00--9:30" @if (old('class_time') == '8:00--9:30') selected="selected" @endif>8:00--9:30</option>
            <option value="9:30--11:00" @if (old('class_time') == '9:30--11:00') selected="selected" @endif>9:30--11:00</option>
            <option value="11:00--12:30" @if (old('class_time') == '11:00--12:30') selected="selected" @endif>11:00--12:30</option>
            <option value="2:00--3:30" @if (old('class_time') == '2:00--3:30') selected="selected" @endif>2:00--3:30</option>
            <option value="3:30--5:00" @if (old('class_time') == '3:30--5:00') selected="selected" @endif>3:30--5:00</option>
            <option value="5:00--6:30" @if (old('class_time') == '5:00--6:30') selected="selected" @endif>5:00--6:30</option>
          </select>           
        </div>
        {{-- class_day --}}
        <div class="form-group col-md-6 inputDiv" id="class_dayInput">
          <label class="form_lable" for="class_day">روز کلاس اول</label>
          <select class="form-control" name="class_day" id="class_day" value="{{ old('class_day') }}" title="روز کلاس را انتخاب کنید">
            <option>--</option>
            <option value="شنبه" @if (old('class_day') == 'شنبه') selected="selected" @endif>شنبه</option>
            <option value="یک شنبه"  @if (old('class_day') == 'یک شنبه') selected="selected" @endif>یک شنبه</option>
            <option value="دوشنبه"  @if (old('class_day') == 'دوشنبه') selected="selected" @endif>دوشنبه</option>
            <option value="سه شنبه"  @if (old('class_day') == 'سه شنبه') selected="selected" @endif>سه شنبه</option>
            <option value="چهارشنبه"  @if (old('class_day') == 'چهارشنبه') selected="selected" @endif>چهارشنبه</option>
          </select>          
        </div>
        {{-- class_time_two --}}
        <div class="form-group col-md-6 inputDiv" id="class_time_twoInput">
          <label class="form_lable" for="class_time_two">زمان کلاس دوم</label>
          <select class="form-control" name="class_time_two" id="class_time_two" title="زمان کلاس را انتخاب کنید">
            <option>--</option>
            <option value="8:00--9:30" @if (old('class_time_two') == '8:00--9:30') selected="selected" @endif>8:00--9:30</option>
            <option value="9:30--11:00" @if (old('class_time_two') == '9:30--11:00') selected="selected" @endif>9:30--11:00</option>
            <option value="11:00--12:30" @if (old('class_time_two') == '11:00--12:30') selected="selected" @endif>11:00--12:30</option>
            <option value="2:00--3:30" @if (old('class_time_two') == '2:00--3:30') selected="selected" @endif>2:00--3:30</option>
            <option value="3:30--5:00" @if (old('class_time_two') == '3:30--5:00') selected="selected" @endif>3:30--5:00</option>
            <option value="5:00--6:30" @if (old('class_time_two') == '5:00--6:30') selected="selected" @endif>5:00--6:30</option>

          </select>
        </div>
        {{-- class_day_two --}}
        <div class="form-group col-md-6 inputDiv" id="class_day_twoInput">
          <label class="form_lable" for="class_day_two">روز کلاس دوم</label>
          <select class="form-control" name="class_day_two" id="class_day_two" title="روز کلاس را انتخاب کنید">
            <option>--</option>
            <option value="شنبه" @if (old('class_day_two') == 'شنبه') selected="selected" @endif>شنبه</option>
            <option value="یک شنبه"  @if (old('class_day_two') == 'یک شنبه') selected="selected" @endif>یک شنبه</option>
            <option value="دوشنبه"  @if (old('class_day_two') == 'دوشنبه') selected="selected" @endif>دوشنبه</option>
            <option value="سه شنبه"  @if (old('class_day_two') == 'سه شنبه') selected="selected" @endif>سه شنبه</option>
            <option value="چهارشنبه"  @if (old('class_day_two') == 'چهارشنبه') selected="selected" @endif>چهارشنبه</option>
          </select>
        </div>
        {{-- exam_time --}}
        <div class="form-group col-md-6 inputDiv">
          <label class="form_lable" for="time">ساعت امتحان</label>
          <input type="text" id="time"  autocomplete="off" class="form-control" value="{{ old('time') }}">
        </div>
        {{-- exam_date --}}
        <div class="form-group col-md-6 inputDiv"">            
          <label class="form_lable" for="exam_date">تاریخ امتحان</label>
          <div class="input-group">
            <input disabled autocomplete="off" type="text" class="form-control background_css" id="toDate1" name="toDate1"  value="{{ old('toDate1') }}">
            <div  class="input-group-addon" data-MdDateTimePicker="true" data-trigger="click" 
              data-targetselector="#toDate1" data-groupid="group1" data-todate="true" 
              data-enabletimepicker="false" data-placement="left" style="border-radius: 17%;
              cursor: pointer;background-color: #fff;color: #093311;">
                <span class="glyphicon glyphicon-calendar"></span>
            </div>    
          </div>            
        </div>
        
        <input autocomplete="off" type="button" class="btn btn-lg btn-secondary btn-block text-uppercase" name="add-btn" id="add-btn" style="color: white" value="افزودن درس جدید">   
      </form>
    </div>
  </div>
@endsection

@section('script')
  <script>
    $('#getLesson').click(function(e){
      $.ajax({
          type: "POST",
          url: "{{route('getLesson')}}",
          dataType:'json',
          data : {
            '_token': '{{csrf_token()}}',
            'id' : $('#lesson_id').val() ,
          },
          success: function(data) {
            $('#lesson_name').val(data.course_name);
            $('#kind_of_lesson').val(data.course_type);
            $('#vahed').val(data.vahed);
            $('#kind_of_lesson').val(data.course_type);
            $('#sexuality').val(data.sexuality);
          },
          error:function(data) {
              Swal.fire({
              icon: 'error',
              title: 'ادمین عزیز متاسفانه درسی با این کد پیدا نشد',
              showConfirmButton: false,
              timer: 5000
              });
          }
      });
    });
    $('#add-btn').click(function(e){
      $.ajax({
        type: "POST",
        url: "{{route('addlesson')}}",
        dataType:'text',
        data : {
          '_token': '{{csrf_token()}}',
          'main_id' : $('#lesson_id').val() ,
          'lesson_name' : $('#lesson_name').val() ,
          'kind_of_lesson' : $('#kind_of_lesson').val() ,
          'professor_name' : $('#professor_name').val() ,
          'class_time' : $('#class_time').val() ,
          'class_day' : $('#class_day').val() ,
          'class_time_two' : $('#class_time_two').val() ,
          'class_day_two' : $('#class_day_two').val() ,
          'sexuality' : $('#sexuality').val() ,
          'toDate1' : $('#toDate1').val() ,
          'time' : $('#time').val() ,
          'vahed' :$('#vahed').val() ,
        },
        success: function(data) {
          if($.trim(data) != "") {
            if(data.lesson_id != undefined || data.lesson_name != undefined || data.kind_of_lesson != undefined || data.vahed != undefined ) {
              if(data.lesson_id != undefined){
                $("#lesson_id_error").html(data.lesson_id).css("display", "block");
              }
              if(data.lesson_name != undefined){
                $("#lesson_name_error").html(data.lesson_name).css("display", "block");
              }
              if(data.kind_of_lesson != undefined){
                $("#kind_of_lesson_error").html(data.kind_of_lesson).css("display", "block");
              }
              if(data.vahed != undefined){
                $("#vahed_error").html(data.vahed).css("display", "block");
              }              
            }
          } else {
            Swal.fire({
              icon: 'success',
              title: 'عملیات افزودن درس با موفقیت انجام شد',
              showConfirmButton: false,
              timer: 3000
            });
          }
        },
        error:function(data) {
            Swal.fire({
            icon: 'error',
            title: 'ادمین عزیز متاسفانه سیستم با مشکل مواجه شده است',
            showConfirmButton: false,
            timer: 3000
            });
        }
      });
    });
    var timepicker = new TimePicker('time', {
      lang: 'en',
    });
    timepicker.on('change', function(evt) {
      
      var value = (evt.hour || '08') + ':' + (evt.minute || '00');
      evt.element.value = value;
    });
  </script>
  <script src="js/jquery-2.1.4.js" type="text/javascript"></script>
  <script src="js/bootstrap.min.js" type="text/javascript"></script>
  <script src="js/calendar.js" type="text/javascript"></script>
  <script src="js/jquery.Bootstrap-PersianDateTimePicker.js" type="text/javascript"></script>
@endsection
