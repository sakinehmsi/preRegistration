<html>
    <head>
        <meta http-equiv="Content-Language" content="fa"/>
        <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="UTF-8">
        <title>سیستم پیش ثبت نام دانشگاه زنجان</title>
        <link rel="stylesheet" href="css/header-footer.css">
        {{-- <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/admin.css">
        <link rel="stylesheet" href="css/addlesson.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/bootstrap-theme.min.css" />
        <link rel="stylesheet" href="css/jquery.Bootstrap-PersianDateTimePicker.css" />
        <script src="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
        <link href="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>
    </head>
    <body>
        @yield('main')
        <script src="js/jquery.min.js"></script>
        <script src="js/sweetalert2.min.js"></script>
        @yield('script')
    </body>
</html>
    