@extends('index')

@section('head')
    <link rel="stylesheet" href="css/publicchart.css">
@endsection

@section('navbar')
    @include('profilemenu')
@endsection

@section('main-container')
  <form action="{{route('chart')}}" method="post" id="chartomomi">
    <table id="chart" style="table-layout: auto;width: 70%;height: 50%" >
      <tbody style="margin-right: : 20px;margin-left: 20px;">
        <tr style="height: 10%" >
          <td style="width: 30%;font-weight: bold;">مبانی نظری اسلام</td>
          <td style="width: 10%;" onclick="addLess(9911001)" id="9911001">اندیشه اسلامی 1</td>
          <td style="width: 10%;" onclick="addLess(9911002)" id="9911002">اندیشه اسلامی 2</td>
          <td style="width: 10%;" onclick="addLess(9911003)" id="9911003">انسان در اسلام</td>
          <td style="width: 10%;" onclick="addLess(9911004)" id="9911004">حقوق اجتماعی و ساسی در اسلام</td>
        </tr>
        <tr style="height: 10%" >
          <td style="width: 30%;font-weight: bold;">اخلاق اسلامی</td>
          <td style="width: 10%;" onclick="addLess(9912001)" id="9912001">فلسفه ی اخلاق </td>
          <td style="width: 10%;" onclick="addLess(9912003)" id="9912003">اخلاق اسلامی</td>
          <td style="width: 10%;" onclick="addLess(9912002)" id="9912002">آیین زندگی</td>
          <td style="width: 10%;" onclick="addLess(9917007)" id="9917007">دانش جمعیت و خانواده</td>  
        </tr>
        <tr style="height: 10%"  >
          <td style="width: 30%;font-weight: bold;">انقلاب اسلامی</td>
          <td style="width: 10%;" onclick="addLess(9913001)" id="9913001">انقلاب اسلامی ایران</td>
          <td style="width: 10%;" onclick="addLess(9913002)" id="9913002">آشنایی با قانون جمهوری اسلامی ایران</td>
          <td style="width: 10%;" onclick="addLess(9913003)" id="9913003" colspan="2">اندیشه سیاسی امام خمینی</td>
        </tr>
        <tr style="height: 10%"  >
          <td style="width: 20px;font-weight: bold;">تاریخ و تمدن اسلامی</td>
          <td style="width: 10%;" onclick="addLess(9914001)" id="9914001">تاریخ امامت</td>
          <td style="width: 10%;" onclick="addLess(9914002)" id="9914002">تاریخ تحلیلی صدر اسلام</td>
          <td style="width: 10%;" onclick="addLess(9914003)" id="9914003" colspan="2">تاریخ فرهنگ و تمدن اسلامی</td>    
        </tr>
        <tr style="height: 10%" >
          <td style="width: 20px;font-weight: bold;">آشنایی با منابع اسلامی</td>
          <td style="width: 10%;" onclick="addLess(9915001)" id="9915001">تفسیر موضوعی قرآن</td>
          <td style="width: 10%;" onclick="addLess(9915002)" id="9915002" colspan="3">تفسیر موضوعی نهج البلاغه</td> 
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

