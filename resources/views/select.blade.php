@extends('index')

@section('head')
    <link rel="stylesheet" href="css/selectPageStyle.css">
    <link href="css/select2.min.css" rel="stylesheet" />
@endsection

@section('navbar')
    @include('profilemenu')
@endsection

@section('main-container') 
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/select2.jpg');">
      <div class="overlay"></div>
      {{-- <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          
        </div>
      </div> --}}
    </section>
    
    <div class="container">
        <div class="box">
            <div class="caption">دروس ارائه شده</div>
            <img src="images/select3.jpg" />
        </div>
        <div class="box">
            <div class="caption">چارت دروس تخصصی</div>
            <img src="images/select4.jpg" />
        </div>
        <div class="box">
            <div class="caption">چارت دروس عمومی</div>
            <img src="images/select.jpg" />
        </div>
        <div class="box">
            <div class="caption">اتاق پرسش و پاسخ</div>
            <img src="images/select3.jpg" />
        </div>
    </div>
@endsection