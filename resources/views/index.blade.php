<html lang="fa">
    <head>
        <meta http-equiv="Content-Language" content="fa"/>
        <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="UTF-8">
        <title>سیستم پیش ثبت نام دانشگاه زنجان</title>
        <link rel="stylesheet" href="css/header-footer.css">
        <link rel="stylesheet" href="css/allButtons.css">
        {{-- <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        @yield('head')
    </head>
    <body>

      <div class="head-container">
        <div class="page-banner-top">
          <div class="page-logo">
              <a><img  class="ZNUlogo" src="../images/znulogo-white.png"></a>
          </div>
          <div class="znu-name"><span>سیستم پیش ثبت نام</span></div>
        </div>
        <div class="navbar" id="myNavbar">
          <ul class="page-menu" id="mymenu">
              <li class="menu-content"><a  href="{{route('home')}}">صفحه اصلی</a></li>
              <li class="menu-content"><a  href="{{route('home')}}">چارت گروه</a></li>
              <li class="menu-content"><a  href="{{route('home')}}">چارت عمومی</a></li>
              <li class="menu-content"><a  href="{{route('home')}}">راهنمای سیستم </a></li>
              @yield('navbar')
          </ul>
          <div class="page-date" id="mydate">
            <p id="date" ></p>
          </div>
        </div>
      </div>

      <div class="main-container">
        @yield('main-container')
      </div>

      <div class="page-footer">
        <div class="footer_info">
            <i class="fa fa-map-marker"></i><span>آدرس : زنجان، بلواردانشگاه، دانشگاه زنجان</span><br>
            <i class="fa fa-at"></i><span>پست الکترونیکی : <span class="znu_email_css">znu_pr@znu.ac.ir</span></span><br>
            <i class="fa fa-phone"></i><span>تلفن : 3551 (243) 98 +</span><br>
            <i class="fa fa-envelope"></i><span>کدپستی : 45351-38591</span><br>
        </div>
        <div class="footer-logo-div">
            <img  class="footerLogo" src="../images/znulogo.png">
        </div>
      </div>

      @yield('loginform')
        
      <script src="js/jquery.min.js"></script>
      <script src="js/header-page.js"></script>
      <script src="js/jalali-moment.browser.js"></script>
      <script src="js/sweetalert2.min.js"></script>
      <script>
        // Page Date
        function setTime() {
          n =  new Date();
          y = n.getFullYear();
          m = n.getMonth() + 1;
          d = n.getDate();
          h=n.getHours();
          mi=n.getMinutes();
          s=n.getSeconds();
          time=h + ":" + mi + ":" +s;
          date=  y + "-" + m + "-" + d ;
          document.getElementById("date").innerHTML = moment(date + " " + time, 'YYYY-M-D HH:mm:ss')
          .locale('fa')
          .format('YYYY/M/D , HH:mm:ss');
        }
        setTime();
        setInterval(function(){ setTime() }, 1000);
        </script>
      @yield('script')
      
    </body>
</html>