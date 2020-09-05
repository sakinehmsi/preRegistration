@extends('index')

@section('head')
    <link rel="stylesheet" href="css/chart.css">
@endsection

@section('navbar')
    @include('profilemenu')
@endsection

@section('main-container')
  <table class="privateChart" id="chart" style="table-layout: auto;" >
    <tbody>
      <tr>
        <th>دروس ترم اول</th>
        <td style="width: 10%;" onclick="addLess(9916005)" id="9916005">تربیت بدنی</td>
        <td style="width: 10%;" onclick="addLess(9917002)" id="9917002">زبان انگلیسی</td>
        <td style="width: 10%;" onclick="addLess(1419003)" id="1419003">ریاضی عمومی 1</td>
        <td style="width: 10%;"  onclick="addLess(1419005)" id="1419005">فیزیک 1</td>
        <td style="width: 10%;" onclick="addLess(1415200)" id="1415200">مبانی کامپیوتر برنامه سازی</td>
        <td style="width: 10%;" onclick="addLess(1415009)" id="1415009">کارگاه کامپیوتر</td>
        <td style="width: 10%;" onclick="addLess(9917001)" id="9917001" >زبان فارسی</td>
      </tr>
      <tr>
        <th>دروس ترم دوم</th>
        <td style="width: 10%;" onclick="addLess(9916006)" id="9916006">ورزش1</td>
        <td style="width: 15%;" onclick="addLess(1419008)" id="1419008">معادلات دیفرانسیل</td>
        <td style="width: 10%;" onclick="addLess(1419004)" id="1419004">ریاضی عمومی 2</td>
        <td style="width: 10%;" onclick="addLess(1419006)" id="1419006">فیزیک 2</td>
        <td style="width: 10%;" onclick="addLess(1415202)" id="1415202">ریاضیات گسسته</td>
        <td style="width: 15%;" colspan="2" onclick="addLess(1415035)" id="1415035">برنامه سازی پیشرفته</td>          
      </tr>
      <tr >
        <th>دروس ترم سوم</th>
        <td style="width: 10%;" onclick="addLess(1415054)" id="1415054">ریاضیات مهندسی</td>
        <td style="width: 10%;" onclick="addLess(1415201)" id="1415201">مدارهای الکتریکی</td>
        <td style="width: 10%;" onclick="addLess(9918003)" id="9918003">آزمایشگاه فیزیک 2</td>
        <td style="width: 15%;" onclick="addLess(1415019)" id="1415019">آمار احتمالات مهندسی</td>
        <td style="width: 10%;" onclick="addLess(1415203)" id="1415203">ساختمان داده ها</td>
        <td style="width: 15%;" colspan="2" onclick="addLess(1415204)" id="1415204">مدار های منطقی</td>
      </tr>
      <tr >
        <th>دروس ترم چهارم</th>
        <td style="width: 10%;" onclick="addLess(1415211)" id="1415211">سیگنال ها و سیستم ها</td>
        <td style="width: 10%;" onclick="addLess(1415206)" id="1415206">زبان تخصصی</td>
        <td style="width: 10%;" onclick="addLess(1415221)" id="1415221">پایگاه داده ها</td>
        <td style="width: 10%;" onclick="addLess(1415205)" id="1415205">نظریه ی زبانها و ماشین ها</td>
        <td style="width: 10%;" onclick="addLess(1415208)" id="1415208">معماری کامپیوتر</td>
        <td style="width: 20%;" colspan="2" onclick="addLess(1415217)" id="1415217">آزمایشگاه مدار منطقی و معماری کامپیوتر</td>          
      </tr>
      <tr>
        <th>دروس ترم پنجم</th>
        <td style="width: 11%;" onclick="addLess(1415215)" id="1415215">اصول طراحی کامپایلر</td>
        <td style="width: 11%;" onclick="addLess(1415207)" id="1415207">روش پژوهش و ارائه</td>
        <td style="width: 11%;" onclick="addLess(1415081)" id="1415081">طراحی الگوریتم ها</td>
        <td style="width: 15%;" onclick="addLess(1415212)" id="1415212">ریزپردازنده و زبان اسمبلی</td>
        <td style="width: 10%;" onclick="addLess(1415209)" id="1415209">سیستم های عامل</td>
        <td style="width: 12%;" colspan="2" onclick="addLess(1415220)" id="1415220">تحلیل و طراحی سیستم ها</td>
      </tr>
      <tr >
        <th>دروس ترم ششم</th>
        <td style="width: 10%;" onclick="addLess(1415222)" id="1415222">طراحی زبانهای برنامه سازی</td>
        <td style="width: 8%;" onclick="addLess(1415218)" id="1415218">آزمایشگاه ریزپردازنده</td>
        <td style="width: 10%;" onclick="addLess(1415214)" id="1415214">هوش مصنوعی و سیستم های خبره</td>
        <td style="width: 8%;" onclick="addLess(1415213)" id="1415213">شبکه های کامپیوتری</td>
        <td style="width: 10%;" onclick="addLess(1415210)" id="1415210">طراحی کامپیوتری سیستم های دیجیتال</td>
        <td style="width: 6%;" onclick="addLess(1415216)" id="1415216">آزمایشگاه سیستم عامل</td>
        <td style="width: 6%;" onclick="addLess(3333331)" id="3333331">درس تمرکز 1</td>
      </tr>
      <tr>
        <th>دروس ترم هفتم</th>
        <td style="width: 10%;" onclick="addLess(2222221)" id="2222221">درس اختیاری 1</td>
        <td style="width: 11%;" onclick="addLess(1111111)" id="1111111">آزمایشگاه اختیاری 1</td>
        <td style="width: 10%;" onclick="addLess(1415224)" id="1415224">مهندسی اینترنت</td>
        <td style="width: 20%;" onclick="addLess(1415219)" id="1415219">آزمایشگاه شبکه های کامپیوتری</td>
        <td style="width: 11%;" onclick="addLess(1415223)" id="1415223">مهندسی نرم افزار</td>
        <td style="width:9%;" colspan="2" onclick="addLess(3333331)" id="3333332">درس تمرکز 2</td>
      </tr>
      <tr>
        <th>دروس ترم هشتم</th>
        <td style="width: 10%;" onclick="addLess(1415994)" id="1415994">کارآموزی</td>
        <td style="width: 10%;" onclick="addLess(1415996)" id="1415996">پروژه نرم افزار</td>
        <td style="width: 10%;" onclick="addLess(2222222)" id="2222222">درس اختیاری 2</td>
        <td style="width: 10%;" onclick="addLess(1111112)" id="1111112">آزمایشگاه اختیاری 2</td>
        <td style="width: 10%;" onclick="addLess(3333333)" id="3333333">درس تمرکز 3</td>
        <td style="width: 20%;" colspan="2" onclick="addLess(3333334)" id="3333334">درس تمرکز 4</td>          
      </tr>        
    </tbody>
  </table>
  <table class="publicChart" id="chart" style="table-layout: auto;" >
    <tbody>
      <tr>
        <th>مبانی نظری اسلام</th>
        <td style="width: 10%;" onclick="addLess(9911001)" id="9911001">اندیشه اسلامی 1</td>
        <td style="width: 10%;" onclick="addLess(9911002)" id="9911002">اندیشه اسلامی 2</td>
        <td style="width: 10%;" onclick="addLess(9911003)" id="9911003">انسان در اسلام</td>
        <td style="width: 10%;" onclick="addLess(9911004)" id="9911004">حقوق اجتماعی و اساسی در اسلام</td>
      </tr>
      <tr>
        <th>اخلاق اسلامی</th>
        <td style="width: 10%;" onclick="addLess(9912001)" id="9912001">فلسفه ی اخلاق </td>
        <td style="width: 10%;" onclick="addLess(9912003)" id="9912003">اخلاق اسلامی</td>
        <td style="width: 10%;" onclick="addLess(9912002)" id="9912002">آیین زندگی</td>
        <td style="width: 10%;" onclick="addLess(9917007)" id="9917007">دانش خانواده و جمعیت</td>  
      </tr>
      <tr >
        <th>انقلاب اسلامی</th>
        <td style="width: 14%;" onclick="addLess(9913001)" id="9913001">انقلاب اسلامی ایران</td>
        <td style="width: 10%;" onclick="addLess(9913002)" id="9913002">آشنایی با قانون اساسی جمهوری اسلامی ایران</td>
        <td style="width: 10%;" onclick="addLess(9913003)" id="9913003" colspan="2">اندیشه سیاسی امام خمینی</td>
      </tr>
      <tr >
        <th>تاریخ و تمدن اسلامی</th>
        <td style="width: 10%;" onclick="addLess(9914001)" id="9914001">تاریخ امامت</td>
        <td style="width: 10%;" onclick="addLess(9914002)" id="9914002">تاریخ تحلیلی صدر اسلام</td>
        <td style="width: 10%;" onclick="addLess(9914003)" id="9914003" colspan="2">تاریخ فرهنگ و تمدن اسلامی</td>    
      </tr>
      <tr>
        <th>آشنایی با منابع اسلامی</th>
        <td style="width: 10%;" onclick="addLess(9915001)" id="9915001">تفسیر موضوعی قرآن</td>
        <td style="width: 10%;" onclick="addLess(9915002)" id="9915002" colspan="3">تفسیر موضوعی نهج البلاغه</td> 
      </tr>
    </tbody>
  </table>
  <input type="hidden" name="coursesID" id="coursesID">
  <input id="userid_input" type="hidden" value="{{ Session::get('userid')}}">
  <div class="btn-css">
    <button type="button" class="button-css" onclick="Save()"><p class="submit-text-css">ثبت تغییرات</p></button>
  </div>
@endsection

@section('script')
    <script>
      $( document ).ready(function(){
        $.ajax({
          type: "GET",
          url: "{{route('showPassedCourses')}}",
          dataType:'json',
          success: function(data) {
            if($.trim(data) != "") {
              var length = data.length;
              for(var p=0;p < length;p++){
                $('#'+data[p]).addClass('selected');
              }
            }
          },
          error:function(data) {
              Swal.fire({
              icon: 'error',
              title: 'دانشجوی عزیز متاسفانه سیستم با مشکل مواجه شده است.لطفا بعدا امتحان کنید',
              showConfirmButton: false,
              timer: 2000
              });
          }
        });
      });
      var coursesID = [];
      function addLess(id){
        if(! ($("#"+id).hasClass('selected')) ){
          $("#"+id).addClass('selected');
          coursesID.push(id);
          $("#coursesID").val(coursesID.toString());
        }else  {
          $("#"+id).removeClass('selected');
          removeElement(coursesID, id);
          $("#coursesID").val(coursesID.toString());
        }
      }
      function removeElement(array, elem) {
          var index = array.indexOf(elem);
          if (index > -1) {
              array.splice(index, 1);
          }
      }
      function Save(){
        if(coursesID.length > 1){
          $.ajax({
            type: "POST",
            url: "{{route('chart')}}",
            dataType:'text',
            data : {
                '_token': '{{csrf_token()}}',
                'coursesID' : $('#coursesID').val() ,
                'stuNum' : $('#userid_input').val()  ,
            },
            success: function(data) {
              $.ajax({
                type: "GET",
                url: "{{route('showPassedCourses')}}",
                dataType:'json',
                success: function(data) {
                  if($.trim(data) != "") {
                    var length = data.length - 1;
                    for(var p=0;p < length;p++){
                      $('#'+data[p]).addClass('selected');
                    }
                  }
                },
                error:function(data) {
                }
              });
              Swal.fire({
                icon: 'success',
                title: 'عملیات با موفقیت انجام گردید',
                showConfirmButton: false,
                timer: 3000
              });                 
            },
            error:function(data) {
              Swal.fire({
              icon: 'error',
              title: 'دانشجوی عزیز متاسفانه سیستم با مشکل مواجه شده است.لطفا بعدا امتحان کنید',
              showConfirmButton: false,
              timer: 3000
              });
            }
          });
        }else{
          Swal.fire({
            icon: 'error',
            title: 'دانشجوی عزیز ابتدا دروس پاس شده خود را مشخص کنید',
            showConfirmButton: false,
            timer: 3000
          });
        }
        
      }
    </script>
@endsection

