@extends('index')

@section('head')
    <link rel="stylesheet" href="css/chart.css">
@endsection

@section('navbar')
    @include('profilemenu')
@endsection

@section('main-container')
  <form action="{{route('chart')}}" method="post" id="chart">
    <table id="chart" style="table-layout: auto;width: 100%;height: 100%" >
      <tbody style="margin-right: : 20px;margin-left: 20px;">
        <tr style="height: 10%" >
          <td style="width: 30%;font-weight: bold;">دروس ترم اول</td>
          <td style="width: 10%;" onclick="addLess(9916005)" id="9916005">تربیت بدنی</td>
          <td style="width: 10%;" onclick="addLess(9917002)" id="9917002">زبان انگلیسی</td>
          <td style="width: 10%;" onclick="addLess(1419003)" id="1419003">ریاضی عمومی 1</td>
          <td style="width: 10%;" onclick="addLess(1419005)" id="1419005">فیزیک 1</td>
          <td style="width: 10%;" onclick="addLess(14152901)" id="14152901">مبانی کامپیوتر برنامه سازی</td>
          <td style="width: 10%;" onclick="addLess(1415009)" id="1415009">کارگاه کامپیوتر</td>
          <td style="width: 10%;" onclick="addLess(9917001)" id="9917001" >زبان فارسی</td>
        </tr>
        <tr style="height: 10%" >
          <td style="width: 30%;font-weight: bold;">دروس ترم دوم</td>
          <td style="width: 10%;" onclick="addLess(9916006)" id="9916006">ورزش </td>
          <td style="width: 10%;" onclick="addLess(1419008)" id="1419008">معادلات دیفرانسیل</td>
          <td style="width: 10%;" onclick="addLess(1419004)" id="1419004">ریاضی عمومی 2</td>
          <td style="width: 10%;" onclick="addLess(1419006)" id="1419006">فیزیک 2</td>
          <td style="width: 10%;" onclick="addLess(1415202)" id="1415202">ریاضیات گسسته</td>
          <td style="width: 20%;" colspan="2" onclick="addLess(1415035)" id="1415035">برنامه سازی پیشرفته</td>
          
        </tr>
        <tr style="height: 10%"  >
          <td style="width: 30%;font-weight: bold;">دروس ترم سوم</td>
          <td style="width: 10%;" onclick="addLess(1415054)" id="1415054">ریاضیات مهندسی</td>
          <td style="width: 10%;" onclick="addLess(1415201)" id="1415201">مدارهای الکتریکی</td>
          <td style="width: 10%;" onclick="addLess(9918003)" id="9918003">آزمایشگاه فیزیک 2</td>
          <td style="width: 10%;" onclick="addLess(1415019)" id="1415019">آمار احتمالات مهندسی</td>
          <td style="width: 10%;" onclick="addLess(1415203)" id="1415203">ساختمان داده ها</td>
          <td style="width: 20%;" colspan="2" onclick="addLess()" id="14152901">مدار های منطقی</td>
        </tr>
        <tr style="height: 10%"  >
          <td style="width: 20px;font-weight: bold;">دروس ترم چهارم</td>
          <td style="width: 10%;" onclick="addLess(1415211)" id="1415211">سیگنال ها و سیستم ها</td>
          <td style="width: 10%;" onclick="addLess(1415206)" id="1415206">زبان تخصصی</td>
          <td style="width: 10%;" onclick="addLess(1415221)" id="1415221">پایگاه داده ها</td>
          <td style="width: 10%;" onclick="addLess(1415205)" id="1415205">نظریه ی زبانها و ماشین ها</td>
          <td style="width: 10%;" onclick="addLess(1415208)" id="1415208">معماری کامپیوتر</td>
          <td style="width: 20%;" colspan="2" onclick="addLess(1415217)" id="14152901">آزمایشگاه مدار منطقی</td>
          
        </tr>
        <tr style="height: 10%" >
          <td style="width: 20px;font-weight: bold;">دروس ترم پنجم</td>
          <td style="width: 10%;" onclick="addLess(1415215)" id="1415215">اصول طراحی کامپایلر</td>
          <td style="width: 10%;" onclick="addLess(1415207)" id="1415207">روش پژوهش ارائه و تحقیق</td>
          <td style="width: 10%;" onclick="addLess(1415081)" id="1415081">طراحی الگوریتم ها</td>
          <td style="width: 10%;" onclick="addLess(1415212)" id="1415212">ریزپردازنده و اسمبلی</td>
          <td style="width: 10%;" onclick="addLess(1415209)" id="1415209">سیستم های عامل</td>
          <td style="width: 20%;" colspan="2" onclick="addLess(1415220)" id="1415220">تحلیل و طراحی سیستم ها</td>
          
        </tr>
        <tr style="height: 10%"  >
          <td style="width: 20px;font-weight: bold;">دروس ترم ششم</td>
          <td style="width: 10%;" onclick="addLess(1415222)" id="1415222">طراحی زبانهای برنامه سازی</td>
          <td style="width: 10%;" onclick="addLess(1415218)" id="1415218">آزمایشگاه ریزپردازنده</td>
          <td style="width: 10%;" onclick="addLess(1415214)" id="1415214">هوش مصنوعی و سیستم های خبره</td>
          <td style="width: 10%;" onclick="addLess(1415213)" id="1415213">شبکه های کامپیوتری</td>
          <td style="width: 10%;" onclick="addLess(1415210)" id="1415210">طراحی کامپیوتری سیستم های دیجیتال</td>
          <td style="width: 20%;" colspan="2" onclick="addLess(1415216)" id="1415216">آزمایشگاه سیستم عامل</td>
          
        </tr>
        <tr style="height: 10%" >
          <td style="width: 20px;font-weight: bold;">دروس ترم هفتم</td>
          <td style="width: 10%;" onclick="addLess(14152901)" id="14152901">درس اختیاری 1</td>
          <td style="width: 10%;" onclick="addLess(14152901)" id="14152901">آزمایشگاه اختیاری 1</td>
          <td style="width: 10%;" onclick="addLess(1415224)" id="1415224">مهندسی اینترنت</td>
          <td style="width: 10%;" onclick="addLess(1415219)" id="1415219">آزمایشگاه شبکه های کامپیوتری</td>
          <td style="width: 10%;" onclick="addLess(1415223)" id="1415223">مهندسی نرم افزار</td>
          <td style="width: 20%;" colspan="2" onclick="addLess(14152901)" id="14152901">درس تمرکز 2</td>
          
        </tr>
        <tr style="height: 10%" >
          <td style="width: 20px;font-weight: bold;">دروس ترم هشتم</td>
          <td style="width: 10%;" onclick="addLess(1415994)" id="1415994">کارآموزی</td>
          <td style="width: 10%;" onclick="addLess(1415996)" id="1415996">پروژه نرم افزار</td>
          <td style="width: 10%;" onclick="addLess(14152901)" id="14152901">درس اختیاری 2</td>
          <td style="width: 10%;" onclick="addLess(14152901)" id="14152901">آزمایشگاه اختیاری 2</td>
          <td style="width: 10%;" onclick="addLess(14152901)" id="14152901">درس تمرکز 3</td>
          <td style="width: 20%;" colspan="2" onclick="addLess(14152901)" id="14152901">درس تمرکز 4</td>
          
        </tr>
      </tbody>
    </table>
    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="coursesID" id="coursesID">
    <div class="btn-css">
      <button type="button" class="button-css">
        <p class="back-text-css"><a href="javascript:history.go(-1)">بازگشت</a></p>
      </button>
      <button type="submit" class="button-css">
        <p class="submit-text-css">ثبت تغییرات</p>
      </button>
    </div>
  </form>
@endsection

@section('script')
     <script src="js/passedLesson.js"></script>
@endsection

