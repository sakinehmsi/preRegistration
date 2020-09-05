@extends('index')

@section('head')
    <link rel="stylesheet" href="css/homeStyle.css">
    <link rel="stylesheet" href="css/loginStyle.css">
    <link href="css/aos.css" rel="stylesheet">
@endsection

@section('navbar')
  @if(Session::get('userfirstName')!== null)
    @include('profilemenu')
  @else
    <li class="menu-content"><a class="loginButton" onclick="showForm()">ورود/ثبت نام</a></li>
  @endif
@endsection

@section('main-container')
    <!-- Student Section -->
    <div class="titleDiv-css"><h2>دانشجویان برتر</h2></div>
    <ul class="ul-students">
      <li class="li-student">
        <div class="card">
          <span>محمدمهدی اسکندری</span>
          <p class="title">ورودی <span class="persian-number">95</span></p>
        </div>
      </li>
      <li class="li-student">
        <div class="card">
          <span>امیر قاسمی</span>
          <p class="title">ورودی <span class="persian-number">95</span></p>
        </div>
      </li>
      <li class="li-student">
        <div class="card">
          <span>حدیثه محمودی</span>
          <p class="title">ورودی <span class="persian-number">95</span></p>
        </div>
      </li>
      <li class="li-student">
        <div class="card">
          <span>پویا محمدی</span>
          <p class="title">ورودی <span class="persian-number">96</span></p>
        </div>
      </li>
      <li class="li-student">
        <div class="card">
          <span>کیاندخت بداغی</span>
          <p class="title">ورودی <span class="persian-number">96</span></p>
        </div>
      </li>
      <li class="li-student">
        <div class="card">
          <span>پروانه مهری</span>
          <p class="title">ورودی <span class="persian-number">96</span></p>
        </div>
      </li>
      <li class="li-student">
        <div class="card">
          <span>الهه جعفری</span>
          <p class="title">ورودی <span class="persian-number">97</span></p>
        </div>
      </li>
      <li class="li-student">
        <div class="card"></span>
          <span>محمد محبی</span>
          <p class="title">ورودی <span class="persian-number">97</span></p>
        </div>
      </li>
      <li class="li-student">
        <div class="card">
          <span>شقایق جاوید</span>
          <p class="title">ورودی <span class="persian-number">97</span></p>
        </div>
      </li>
      <li class="li-student">
        <div class="card">
          <span>مرضیه زرگر</span>
          <p class="title">ورودی <span class="persian-number">98</span></p>
        </div>
      </li>
      <li class="li-student">
        <div class="card">
          <span>مینا مرادی</span>
          <p class="title">ورودی <span class="persian-number">98</span></p>
        </div>
      </li>
      <li class="li-student">
        <div class="card">
          <span>عاطفه حسینی</span>
          <p class="title">ورودی <span class="persian-number">98</span></p>
        </div>
      </li>
    </ul>
    <!-- About Section -->
    <div class="titleDiv-css"><h2>درباره سایت</h2></div>
    <div class="siteAboutDiv">
      <div class="siteAbout">
        <p>سیستم پیش ثبت نام به شما دانشجویان عزیز کمک می کند که انتخاب واحد راحت تر و با برنامه ریزی بهتر داشته باشید.در این سیستم می توانید قبل از زمان انتخاب واحد، دروس مورد نظر خود را انتخاب کنید و مشکلات انتخاب واحد خود را با مدیر گروه مربوطه و کارشناسان در میان بگذارید.برای شاتفاده از این سیستم باید یک حساب کاربری ایجاد نمایید و در قسمت چارت، دروس پاس شده خود را مشخص کنید تا سیستم هم بتواند شما را برای انتخاب های بهتر یاری نماید.<br>آرامش شما دانشجویان آرزوی ماست <br> دانشکده مهندسی کامپیوتر دانشگاه زنجان</p>
      </div>
    </div>
    <!-- Professors Section -->
    <div class="titleDiv-css"><h2>اساتید دانشکده</h2></div>
    <div class="professors">
      <!-- Professor1 -->
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="images/professors/khan.jpg" alt="Avatar">
          </div>
          <div class="flip-card-back">
            <h2 class="paddingh2">علیرضا خان تیموری</h2>
            <h4 class="paddingh4">استادیار</h4>
            <h3 class="paddingh3">دکترای هوش مصنوعی از دانشگاه امیرکبیر</h3>
            <p class="Professoremail">khanteymoori@znu.ac.ir</p>
          </div>
        </div>
      </div>
      <!-- Professor2 -->
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="images/professors/tajoddin.jpg" alt="Avatar">
          </div>
          <div class="flip-card-back">
            <h2 class="paddingh2">اصغر تاج الدین</h2>
            <h4 class="paddingh4">استادیار</h4>
            <h3 class="paddingh3">دکترای امنیت از دانشگاه تربیت مدرس</h3>
            <p class="Professoremail">tajoddin@znu.ac.ir</p>
          </div>
        </div>
      </div>
      <!-- Professor3 -->
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="images/professors/haghzaad.jpg" alt="Avatar">
          </div>
          <div class="flip-card-back">
            <h2 class="paddingh2">سجاد حق زاد کلیدبری</h2>
            <h4 class="paddingh4">استادیار</h4>
            <h3 class="paddingh3">دکترای برق از دانشگاه صنعتی شریف</h3>
            <p class="Professoremail">s.haghzad@znu.ac.ir</p>
          </div>
        </div>
      </div>
      <!-- Professor4 -->
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="images/professors/mohsen-old.jpg" alt="Avatar">
          </div>
          <div class="flip-card-back">
            <h2 class="paddingh2">محسن افشارچی</h2>
            <h4 class="paddingh4">دانشیار</h4>
            <h3 class="paddingh3"></h3>
            <p class="Professoremail">afsharchim@znu.ac.ir</p>
          </div>
        </div>
      </div>
      <!-- Professor5 -->
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="images/professors/majid.png" alt="Avatar">
          </div>
          <div class="flip-card-back">
            <h2 class="paddingh2">مجید مقدادی</h2>
            <h4 class="paddingh4">دانشیار</h4>
            <h3 class="paddingh3">دکترای کامپیوتراز غازی ترکیه</h3>
            <p class="Professoremail">meghdadi@znu.ac.ir</p>
          </div>
        </div>
      </div>
      <!-- Professor6 -->
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="images/professors/azar.png" alt="Avatar">
          </div>
          <div class="flip-card-back">
            <h2 class="paddingh2">علی آذرپیوند</h2>
            <h4 class="paddingh4">استادیار</h4>
            <h3 class="paddingh3">دکترای معماری دانشگاه تهران</h3>
            <p class="Professoremail">azarpeyvand-i@znu.ac.ir</p>
          </div>
        </div>
      </div>
      <!-- Professor7 -->
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="images/professors/dmp.jpg" alt="Avatar">
          </div>
          <div class="flip-card-back">
            <h2 class="paddingh2">داوود محمدپور</h2>
            <h4 class="paddingh4">استادیار</h4>
            <h3 class="paddingh3">دکترای نرم افزار از دانشگاه مالک اشتر</h3>
            <p class="Professoremail">dmp@znu.ac.ir</p>
          </div>
        </div>
      </div>
      <!-- Professor8 -->
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="images/professors/dj.jpg" alt="Avatar">
          </div>
          <div class="flip-card-back">
            <h2 class="paddingh2">داریوش نجفی</h2>
            <h4 class="paddingh4">مربی</h4>
            <h3 class="paddingh3"></h3>
            <p class="Professoremail">d_najaf@znu.ac.ir</p>
          </div>
        </div>
      </div>
      <!-- Professor9 -->
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="images/professors/safari.jpg" alt="Avatar">
          </div>
          <div class="flip-card-back">
            <h2 class="paddingh2">لیلا صفری</h2>
            <h4 class="paddingh4">استادیار</h4>
            <h3 class="paddingh3">دکترای نرم افزار از دانشگاه سیدنی</h3>
            <p class="Professoremail">lsafari@znu.ac.ir</p>
          </div>
        </div>
      </div>
      <!-- Professor10 -->
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="images/professors/hm.jpg" alt="Avatar">
          </div>
          <div class="flip-card-back">
            <h2 class="paddingh2">حسین محمدی</h2>
            <h4 class="paddingh4">استادیار</h4>
            <h3 class="paddingh3">دکترای کامپیوتر از دانشگاه تهران</h3>
            <p class="Professoremail">hosm@znu.ac.ir</p>
          </div>
        </div>
      </div>
      <!-- Professor11 -->
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="images/professors/Amiri.jpg" alt="Avatar">
          </div>
          <div class="flip-card-back">
            <h2 class="paddingh2">علی امیری</h2>
            <h4 class="paddingh4">دانشیار</h4>
            <h3 class="paddingh3">دکترای هوش مصنوعی و رباتیک از دانشگاه علم و صنعت </h3>
            <p class="Professoremail">a_amiri@znu.ac.ir</p>
          </div>
        </div>
      </div>
      <!-- Professor12 -->
      {{-- <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="images/professors/azad.jpg" alt="Avatar">
          </div>
          <div class="flip-card-back">
            <h2 class="paddingh2">میثم آزاد</h2>
            <h4 class="paddingh4"></h4>
            <h3 class="paddingh3">دکترای هوش مصنوعی </h3>
          </div>
        </div>
      </div> --}}
    </div>
    <!-- Groups Employees -->
    <div class="titleDiv-css"><h2>کارمندان و کارشناسان دانشکده</h2></div>
    <div class="employees">
      <!-- karshenas -->
      <div class="whiteBox" data-aos="fade-up" >
        <p>کارشناس گروه: آقای مهندس محمدی</p>
        <p>شماره تماس: <span class="persian-number">33052489</span></p>
      </div>
      <!-- masoole daftar -->
      <div class="whiteBox" data-aos="fade-up" >
        <p>کارشناس گروه: آقای اصغر سلیمانی</p>
        <p>شماره تماس: <span class="persian-number">33052662</span></p>  
      </div>
      <!-- masoole daftar -->
      <div class="whiteBox" data-aos="fade-up" >
        <p>مسئول دفتر: خانم بیرامی</p>
        <p>شماره تماس: <span class="persian-number">33052762</span></p>
      </div>
    </div>
@endsection

@section('loginform')
    <div class="form">
      <!-- close btn -->
      <div class="fa-close-div"><i onclick="closeLogin()" class="fa fa-times" ></i></div>      
      <!-- Tab content -->
      <div class="tab-content">
        <div id="login">
          <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
          {{-- stuNum --}}
          <div class="field-wrap">
            <label id="signin_stuNum_label">شماره دانشجویی<span class="req">*</span></label>
            <input  class="justNumber" id="signin_stuNum" name="stuNum" value="{{old('stuNum')}}" autocomplete="off"/>
            <span><p id="notfound" class="p-error-css"style="color:red;margin:1px;text-align:right;float:right;display:none;">حسابی با این شماره دانشجویی وجود ندارد </p></span>
            <span><p id="stuNumlogin_error" style="color:red;margin:1px;text-align:right;float:right;display:none;"></p></span>
          </div>
          {{-- password --}}
          <div class="field-wrap">
            <label id="signin_password_label">گذرواژه<span class="req">*</span></label>
            <input  id="signin_password" name="password" autocomplete="off"/>
            <span><p id="incorrectPass" class="p-error-css" style="color:red;margin:1px;text-align:right;float:right;display:none;">گذرواژه اشتباه می باشد</p></span>
            <span><p id="passwordlogin_error" style="color:red;margin:1px;text-align:right;float:right;display:none;}"></p></span>
          </div>
          {{-- captcha --}}
          <div class="field-captcha">
            <label  id="signin_captcha_label">عبارت امنیتی<span class="req">*</span></label>
            <input id="signin_captcha"  class="input-captcha" autocomplete="off"name="captcha">
            <div class="captcha captcha-div">
                <span class="captcha-img-div">{!! captcha_img() !!}</span>
                <button type="button" class="btn btn-success btn-refresh"><i class="fa fa-refresh"></i></button>
            </div>
            <span><p id="captchalogin_error" style="color:red;margin:1px;text-align:right;float:right;display:none;"></p></span>
          </div>
          {{-- <p class="forgot"><a href="#">آیا گذرواژه خود را فراموش کرده اید؟</a></p> --}}
          <button class="float_none button-css submitSignInuser"/><p class="submit-text-css">ورود</p></button>
          <button id="go_to_signup" class="background_none"/><p class="submit-text-css">اگر تا کنون حساب کاربری ایجاد نکرده اید، اینجا کلیک کنید</p></button>
        </div>
        <div id="signup">
          <div id="signup_form">
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <!-- names -->
            <div class="top-row">
              <!-- firstName -->
              <div class="field-wrap">
                <label id="signup_firstname_label">نام<span class="req">*</span></label>
                <input style="font-size: 1.4em;" name="firstName"  id="signup_firstname" value="{{ old('firstName') }}" autocomplete="off" />
                <span>
                  <p id="firstName_error" style="color:red;margin:1px;text-align:right;float:right;display:none;}"></p>
                </span>
              </div> 
              <!-- lastName -->
              <div class="field-wrap">
                  <label id="signup_lastname_label">نام خانوادگی<span class="req">*</span></label>
                  <input style="font-size: 1.4em;" name="lastName" id="signup_lastname" dir="rtl"  value="{{ old('lastName') }}" autocomplete="off"/>
                  <span>
                    <p id="lastName_error" style="color:red;margin:1px;text-align:right;float:right;display:none;}"></p>
                  </span>
              </div>
            </div>
            <!-- stuNum -->
            <div class="field-wrap">
              <label id="signup_stuNum_label">شماره دانشجویی<span class="req">*</span></label>
              <input  class="justNumber" name="stuNum" id="signup_stuNum" value="{{ old('stuNum') }}" autocomplete="off"/>
              <span>
                <p id="stuNum_error" style="color:red;margin:1px;text-align:right;float:right;display:none;}"></p>
              </span>
            </div>
            <!-- passwords -->
            <div class="top-row">
              <!-- password -->
              <div class="field-wrap">
                <label>گذرواژه<span class="req">*</span></label>
                <input name="password" id="signup_password"  value="{{ old('password') }}" autocomplete="off"/>
                <span>
                  <p id="password_error" style="color:red;margin:1px;text-align:right;float:right;display:none;}"></p>
                </span>
              </div>
              <!-- confirmPassword -->
              <div class="field-wrap">
                <label>تکرار گذرواژه<span class="req">*</span></label>
                <input name="confirmPassword" id="confirmPassword" autocomplete="off"/>
                <span>
                  <p id="confirmPassword_error" style="color:red;margin:1px;text-align:right;float:right;display:none;}"></p>
                </span>
              </div>
            </div>
            <button class="float_none button-css submitSignUpuser"/><p class="submit-text-css">ثبت نام</p></button>
          </div>
        </div>
      </div>
    </div> 
@endsection

@section('script')
  <script src="js/aos.js"></script>
  <script src="js/login.js"></script>
  <script>
  AOS.init();
  //captcha
  $(".btn-refresh").click(function(){
    $.ajax({
      type:'GET',
      url:'/refresh_captcha',
      success:function(data){
        $(".captcha span").html(data.captcha);
      }
    });
  });
  // post data for submitSignUpuser
  $('.submitSignUpuser').click(function(e){
    $("#firstName_error").css("display", "none");
    $("#lastName_error").css("display", "none");
    $("#stuNum_error").css("display", "none");
    $("#password_error").css("display", "none");
    $("#confirmPassword_error").css("display", "none");

    $fn = $("#signup_firstname").val();
    $ln = $("#signup_lastname").val();
    $sn = $("#signup_stuNum").val();
    $p = $("#signup_password").val();
    $cp = $("#confirmPassword").val();
    
    e.preventDefault();

    $.ajax({
      type: "POST",
      url: "{{route('store_signup')}}",
      data:
      {
        '_token': '{{csrf_token()}}',
        'firstName': $fn,
        'lastName': $ln,
        'stuNum':$sn,
        'password':$p,
        'confirmPassword' :$cp
      },
      dataType: "text",
      success: function(data) {
        if($.trim(data) != "") {
          data = JSON.parse(data);
        
          if(data.firstName != undefined || data.lastName != undefined || 
          data.stuNum != undefined || data.password != undefined || data.confirmPassword != undefined ) {
          if(data.firstName != undefined){
            $("#firstName_error").html(data.firstName).css("display", "block");
          }
          if(data.lastName != undefined){
            $("#lastName_error").html(data.lastName).css("display", "block");
          }
          if(data.stuNum != undefined){
            $("#stuNum_error").html(data.stuNum).css("display", "block");
          }
          if(data.password != undefined){
            $("#password_error").html(data.password).css("display", "block");
          }
          if(data.confirmPassword != undefined){
            $("#confirmPassword_error").html(data.confirmPassword).css("display", "block");
          }              
          }
        } else {
          $('.form').css('display','none'); 
          $('.main-container').removeClass('disable');
          $('.head-container').removeClass('disable'); 
          $('.page-footer').removeClass('disable');
          Swal.fire({
            icon: 'success',
            title: 'دانشجوی عزیز ثبت نام شما با موفقیت انجام گردید',
            showConfirmButton: false,
            timer: 5000
          });
        }
      },
      error:function(data) {
        Swal.fire({
          icon: 'error',
          title: 'دانشجوی عزیز متاسفانه سیستم با مشکل مواجه شده است.لطفا بعدا امتحان کنید',
          showConfirmButton: false,
          timer: 5000
        });
      }
    });              
  });
  // post data for submitSignInuser
  $('.submitSignInuser').click(function(e){
    $.ajax({
      type:'GET',
      url:'/refresh_captcha',
      success:function(data){
        $(".captcha span").html(data.captcha);
      }
    });

    $("#stuNumlogin_error").css("display", "none");
    $("#passwordlogin_error").css("display", "none");
    $("#captchalogin_error").css("display", "none");
    $("#notfound").css("display", "none");
    $("#incorrectPass").css("display", "none");

    $sn = $("#signin_stuNum").val();
    $p = $("#signin_password").val();
    $cp = $("#signin_captcha").val();
    
    e.preventDefault();

    $.ajax({
      type: "POST",
      url: "{{route('store_signin')}}",
      data:
      {
        '_token': '{{csrf_token()}}',
        'stuNum':$sn,
        'password':$p,
        'captcha' :$cp
      },
      dataType: "text",
      success: function(data) {
        if(data == "success") {
          $('.form').css('display','none');
          $('.main-container').removeClass('disable'); 
          $('.head-container').removeClass('disable'); 
          $('.page-footer').removeClass('disable');
          localStorage.removeItem("selectedCoursesIDInAvailablePage");
          window.location.replace("/");
        }
        else if($.trim(data) != "") {
          data = JSON.parse(data);
          if(data.stuNum != undefined || data.password != undefined || data.captcha != undefined ||
          data.notfound != undefined || data.incorrectPass != undefined || data.showLoginForm != undefined ) {
            if(data.stuNum != undefined){
              $("#stuNumlogin_error").html(data.stuNum).css("display", "block");
            }
            if(data.password != undefined){
              $("#passwordlogin_error").html(data.password).css("display", "block");
            }
            if(data.captcha != undefined){
              $("#captchalogin_error").html(data.captcha).css("display", "block");
            } 
            if(data.stuNum == undefined && data.notfound != undefined && data.notfound == "1"){
              $("#notfound").html(data.stuNum).css("display", "block");
            }
            if(data.password == undefined && data.incorrectPass != undefined &&  data.incorrectPass == "1"){
              $("#incorrectPass").html(data.password).css("display", "block");
            }
            if(data.showLoginForm != undefined && data.showLoginForm == "1" ){
              $('.form').css('display','block'); 
              $('.main-container').addClass('disable'); 
              $('.head-container').addClass('disable'); 
              $('.page-footer').addClass('disable');
            }              
          }
        }
      },
      error:function(data) {
        Swal.fire({
          icon: 'error',
          title: 'دانشجوی عزیز متاسفانه سیستم با مشکل مواجه شده است.لطفا بعدا امتحان کنید',
          showConfirmButton: false,
          timer: 5000
        });
      }
    });              
  });   
  </script>
@endsection