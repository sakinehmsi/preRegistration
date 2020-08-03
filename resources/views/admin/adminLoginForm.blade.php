@extends('admin.adminIndex')

@section('main')
    <div id="login">
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        {{-- stuNum --}}
        <div class="field-wrap">
            <label id="signin_stuNum_label">شماره کاربری<span class="req">*</span></label>
            <input  class="justNumber" id="signin_stuNum" name="stuNum" value="{{old('stuNum')}}" autocomplete="off"/>
            
            <span><p id="incorrectstuNum" class="p-error-css"style="color:red;margin:1px;text-align:center;display:none;">شماره کاربری اشتباه می باشد</p></span>
            
            <span>
                <p id="stuNumlogin_error" style="color:red;margin:1px;text-align:center;display:none;"></p>
            </span>
        </div>
        {{-- password --}}
        <div class="field-wrap">
            <label id="signin_password_label">گذرواژه<span class="req">*</span></label>
            <input  id="signin_password" name="password" autocomplete="off"/>
            
            <span><p id="incorrectPass" class="p-error-css" style="color:red;margin:1px;text-align:center;display:none;">گذرواژه اشتباه می باشد</p></span>
            
            <span>
                <p id="passwordlogin_error" style="color:red;margin:1px;text-align:center;display:none;}"></p>
            </span>
        </div>
        {{-- captcha --}}
        <div class="field-captcha">
            <label  id="signin_captcha_label">عبارت امنیتی<span class="req">*</span></label>
            <input id="signin_captcha"  class="input-captcha" autocomplete="off"name="captcha">
            <span>
                <p id="captchalogin_error" style="color:red;margin:1px;text-align:center;;display:none;"></p>
            </span>

            <div class="captcha">
                <span class="captcha-img-div">{!! captcha_img() !!}</span>
                <button type="button" class="btn_refresh"><i class="fa fa-refresh"></i></button>
            </div>  
        </div>
        <button class="submitSignInuser"/><p class="submit-text-css">ورود</p></button>
    </div>
@endsection

@section('script')
    <script>
        // captcha
        $(".btn_refresh").click(function(){
            $.ajax({
                type:'GET',
                url:'/refresh_captcha',
                success:function(data){
                    $(".captcha span").html(data.captcha);
                }
            });
        });
        // post data for submitSignInuser
        $('.submitSignInuser').click(function(e){
            $("#incorrectPass").css("display", "none");
            $("#incorrectstuNum").css("display", "none");

            $.ajax({
                type:'GET',
                url:'/refresh_captcha',
                success:function(data){
                    $(".captcha span").html(data.captcha);
                }
            });

            $sn = $("#signin_stuNum").val();
            $p = $("#signin_password").val();
            $cp = $("#signin_captcha").val();

            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "{{route('admin_signin')}}",
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
                        window.location.replace("/admin_select");
                    }
                    else if($.trim(data) != "") {
                    data = JSON.parse(data);
                        if(data.stuNum != undefined || data.password != undefined || data.captcha != undefined ||
                        data.incorrectstuNum != undefined || data.incorrectPass != undefined ) {
                            if(data.stuNum != undefined){
                                $("#stuNumlogin_error").html(data.stuNum).css("display", "inline-block");
                            }
                            if(data.password != undefined){
                                $("#passwordlogin_error").html(data.password).css("display", "inline-block");
                            }
                            if(data.captcha != undefined){
                                $("#captchalogin_error").html(data.captcha).css("display", "inline-block");
                            } 
                            if(data.stuNum == undefined && data.incorrectstuNum != undefined && data.incorrectstuNum == "1"){
                            $("#stuNumlogin_error").html(data.stuNum).css("display", "none");
                            $("#incorrectstuNum").html(data.stuNum).css("display", "inline-block");
                            }
                            if(data.password == undefined && data.incorrectPass != undefined &&  data.incorrectPass == "1"){
                                $("#passwordlogin_error").html(data.stuNum).css("display", "none");
                                $("#incorrectPass").html(data.password).css("display", "inline-block");
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