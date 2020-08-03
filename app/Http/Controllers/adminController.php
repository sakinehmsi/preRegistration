<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Lesson;
use App\weekly_schedule;
use App\Passed_course;
use App\Specialized_course;
use App\Course;
use Illuminate\Support\Facades\Hash;
use Session;
use validator;
use DB;

class adminController extends Controller
{
    public function showAdminLoginForm(){
        return view('admin.adminLoginForm');
    }
    
    public function getAdmin(Request $request){
        $messages = [ 
            'stuNum.required' => 'لطفا شماره کاربری  خود را وارد نمایید', 
            'password.required' => 'لطفا گذرواژه خود را وارد نمایید',  
            'captcha.required' => 'لطفا عبارت امنیتی را وارد کنید', 
            'captcha.captcha'=> 'عبارت امنیتی وارد شده صحیح نمی باشد', 
        ] ;
        
        $validator = \Validator::make($request->all(), [
            'stuNum' => 'required', 
            'password' => 'required',
            'captcha' => 'required|captcha',
        ], $messages);
             
        $stuNum =  $_POST['stuNum'];
        $pass = $_POST['password'];
        $user = User::where(['stuNum' => "123456789"])->first();
        if((Hash::check($pass, $user->password) == true)&&(($stuNum) == ($user->stuNum))){
            $id = $user ->stuNum;
            $firstName = $user ->firstName;
            $lastName = $user ->lastName;
            
            session(['userid' => $id]);
            session(['userfirstName' => (string)$firstName]);
            session(['userlastName' => (string)$lastName]);
            
            if(count($validator->errors()) == 0)
                return ('success'); 
                
        }elseif((Hash::check($pass, $user->password) == false)&&(($stuNum) ==  ($user->stuNum))) {
            $validator->getMessageBag()->add('incorrectstuNum', '0');
            $validator->getMessageBag()->add('incorrectPass', '1');
        }elseif((Hash::check($pass, $user->password) == false)&&(($stuNum) !=  ($user->stuNum))) {
            $validator->getMessageBag()->add('incorrectstuNum', '1');
            $validator->getMessageBag()->add('incorrectPass', '1');
        }elseif((Hash::check($pass, $user->password) == true)&&(($stuNum) !=  ($user->stuNum))) {
            $validator->getMessageBag()->add('incorrectstuNum', '1');
            $validator->getMessageBag()->add('incorrectPass', '0');
        }
        
        return ($validator->errors());
    }
    
    public function showAdminSelect(){
        if(session('userfirstName') != ''){
            return view('admin.admin_select');
        }else{
            return redirect('AdminLogin');
        }
    }
    
    public function showUsersRequests(){
        $chatRoom =  DB::connection('mongodb')->collection('preRegistration_chatRoom')->orderBy('_id', 'DESC')->take(20)->get() ;
        if(session('userfirstName') != ''){
            return view('admin.showUsersRequests')->with('chatRoom' ,  $chatRoom);
        }else{
            return redirect('AdminLogin');
        } 
    }
    
    public function refresh_ChatRoom_admin(){
        $refreshed_data =  DB::connection('mongodb')->collection('preRegistration_chatRoom')->orderBy('_id', 'DESC')->take(20)->get();
        if(session('userfirstName') != ''){
            return $refreshed_data ;
        }else{
            return redirect('AdminLogin');
        }  
    } 
    
    public function send_response(){
        $id = $_POST['id'];
        DB::connection('mongodb')->collection('preRegistration_chatRoom')->where('_id' , ''.$id.'')->update( 
            [
             'reply_message' => $_POST['reply_message'], 
             'reply_message_id' => $_POST['reply_message_id'], 
            ]
        );
    }
    
    public function showaddlesson(){
        if(session('userfirstName') != ''){
            return view('admin.adminaddlesson');
        }else{
            return redirect('AdminLogin');
        }
    }

    public function addlesson(Request $request){
        $messages =[
            'lesson_name.required'=>'لطفا نام درس را وارد کنید',
            'main_id.required'=>'لطفا آیدی را وارد کنید',
            'kind_of_lesson.required'=>'لطفا نوع درس را وارد کنید',
            'vahed.required'=>'لطفا تعداد واحد درس را وارد کنید',
        ] ;
        $validator = \Validator::make($request->all(), [
            'lesson_name'=> 'required',
            'main_id'  =>  'required',
            'kind_of_lesson'=>'required',
            'vahed'=>'required',
        ], $messages);
        
        if(count($validator->errors()) ==  0){
            $get_repetition_lesson = Lesson::where(['main_id'=>$_POST['main_id']])->get();
            $get_repetition_count = count($get_repetition_lesson);
            $number = $get_repetition_count+1 ;
            if($number < 10 ){
                $lesson_id = "".$_POST['main_id']."-0".$number."";
            }else{
                $lesson_id = "".$_POST['main_id']."-".$number."";
            }
            // create
            $new_lesson=[
                'lesson_name'=>$_POST['lesson_name'], 
                'lesson_id'=>$lesson_id, 
                'main_id'=>$_POST['main_id'], 
                'professor_name'=>$_POST['professor_name'], 
                'kind_of_lesson'=>$_POST['kind_of_lesson'], 
                'class_day'=>$_POST['class_day'], 
                'class_time'=>$_POST['class_time'], 
                'class_day_two'=>$_POST['class_day_two'], 
                'class_time_two'=>$_POST['class_time_two'], 
                'vahed'=>$_POST['vahed'], 
                'exam_date'=> $_POST['toDate1'] , 
                'exam_time'=> $_POST['time'] , 
                'sexuality'=>$_POST['sexuality'],
            ];
            $new_lesson_data=Lesson::create($new_lesson);
        }else{
            return ($validator->errors());
        }
    }
    
    public function getLesson(){
        $lesson = Course::where(['course_id' => $_POST['id'] ])->first();
        
        if(session('userfirstName') != ''){
            return $lesson ;
        }else{
            return redirect('AdminLogin');
        } 
    }
}

