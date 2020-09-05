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
	//login
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
    //after login
    public function showAdminSelect(){
        if(session('userfirstName') != ''){
            return view('admin.admin_select');
        }else{
            return redirect('AdminLogin');
        }
    }
    //chat Room
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
    //add lesson
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
            'main_id.required'=>'لطفا کد را وارد کنید',
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
            if( $_POST['idFormat'] == '0'){
                $get_repetition_lesson = Lesson::where(['main_id'=>$_POST['main_id']])->get();
                $get_repetition_count = count($get_repetition_lesson);
                $number = $get_repetition_count+1 ;
                if($number < 10 ){
                    $lesson_id = "".$_POST['main_id']."-0".$number."";
                }else{
                    $lesson_id = "".$_POST['main_id']."-".$number."";
                } 
                $mainid = $_POST['main_id'];
            }else{
                $lesson_id = $_POST['main_id'];
                $mainid =  substr($lesson_id, 0, -3);
            }
            // create
            $new_lesson=[
                'lesson_name'=>$_POST['lesson_name'], 
                'lesson_id'=>$lesson_id, 
                'main_id'=> $mainid, 
                'professor_name'=>$_POST['professor_name'], 
                'kind_of_lesson'=>$_POST['kind_of_lesson'], 
                'class_day'=>$_POST['class_day'], 
                'class_time_start'=>$_POST['class_time_start'], 
                'class_time_end'=>$_POST['class_time_end'], 
                'class_day_two'=>$_POST['class_day_two'], 
                'class_time_two_start'=>$_POST['class_time_two_start'], 
                'class_time_two_end'=>$_POST['class_time_two_end'], 
                'vahed'=>$_POST['vahed'], 
                'exam_date'=> $_POST['toDate1'] , 
                'exam_time_start'=> $_POST['time_start'] , 
                'exam_time_end'=> $_POST['time_end'] , 
                'sexuality'=>$_POST['sexuality'],
            ];
            Lesson::create($new_lesson);
        }else{
            return ($validator->errors());
        }
    }
    public function getLesson(){
        if( $_POST['idFormat'] == '0'){
            $mainid =  $_POST['id'];
        }else{
            $mainid =  substr( $_POST['id'], 0, -3);
        }
        $lesson = Course::where(['course_id' => $mainid ])->first();
        
        if(session('userfirstName') != ''){
            return $lesson ;
        }else{
            return redirect('AdminLogin');
        } 
    }
    //add public lesson
    public function showaddPubliclesson(){
        if(session('userfirstName') != ''){
            return view('admin.adminaddPublicLesson');
        }else{
            return redirect('AdminLogin');
        }
    }
    public function addPubliclesson(Request $request){
        $messages =[
            'lesson_name.required'=>'لطفا نام درس را وارد کنید',
            'lesson_id.required'=>'لطفا کد را وارد کنید',
            'kind_of_lesson.required'=>'لطفا نوع درس را وارد کنید',
            'vahed.required'=>'لطفا تعداد واحد درس را وارد کنید',
        ] ;
        $validator = \Validator::make($request->all(), [
            'lesson_name'=> 'required',
            'lesson_id'  =>  'required',
            'kind_of_lesson'=>'required',
            'vahed'=>'required',
        ], $messages);
        if(count($validator->errors()) ==  0){
            $get_repetition_lesson = Lesson::where(['lesson_id'=>$_POST['lesson_id']])->get();
              $lesson_id = "".$_POST['main_id']."-".$number."";
            
            // create
            $new_lesson=[
                'lesson_name'=>$_POST['lesson_name'], 
                'lesson_id'=>$lesson_id, 
                'main_id'=>$_POST['main_id'], 
                'professor_name'=>$_POST['professor_name'], 
                'kind_of_lesson'=>$_POST['kind_of_lesson'], 
                'class_day'=>$_POST['class_day'], 
                'class_time_start'=>$_POST['class_time_start'], 
                'class_time_end'=>$_POST['class_time_end'], 
                'class_day_two'=>$_POST['class_day_two'], 
                'class_time_two_start'=>$_POST['class_time_two_start'], 
                'class_time_two_end'=>$_POST['class_time_two_end'], 
                'vahed'=>$_POST['vahed'], 
                'exam_date'=> $_POST['toDate1'] , 
                'exam_time_start'=> $_POST['time_start'] , 
                'exam_time_end'=> $_POST['time_end'] , 
                'sexuality'=>$_POST['sexuality'],
            ];
            Lesson::create($new_lesson);
        }else{
            return ($validator->errors());
        }
    }
    public function getPublicLesson(){
        $mainId = substr($_POST['id'], 0, -3);
        $lesson = Course::where(['course_id' => $mainId ])->first();
        
        if(session('userfirstName') != ''){
            return $lesson ;
        }else{
            return redirect('AdminLogin');
        } 
    }
    //show users detail
    public function show_userPreReg_Detail(){        
        //get inactive users
        $users_id = array();
        $active_users_id = array();
        $inactive_users = array();
        $lessons = array();
        $users = User::all();
        foreach ($users as $user) {
            if( $user->stuNum != 123456789)//admin account
                array_unshift( $users_id , $user->stuNum);  
        }      
        $active_users = weekly_schedule::all();
        foreach ($active_users as $active_user) {
            array_unshift( $active_users_id , $active_user->id);  
        }
        $inactive_users_id = array_diff($users_id ,  $active_users_id);
        $inactive_users_id = implode(',' , $inactive_users_id);
        $inactive_users_id = explode(',' , $inactive_users_id);
        foreach ($inactive_users_id as $inactive_user_id) {
            $inactive_user_info = User::where(['stuNum' => $inactive_user_id])->first();            
            $inactive_user = array();
            array_unshift($inactive_user , $inactive_user_info->stuNum , $inactive_user_info->firstName , $inactive_user_info->lastName );
            array_unshift($inactive_users , $inactive_user );
            unset($inactive_user);
        }
        //lessons
        $lessons = Lesson::all();
        
        if(session('userfirstName') != ''){
            return view('admin.userPreReg_Detail')->with('inactive_users' ,  $inactive_users)->with('lessons' ,  $lessons);
        }else{
            return redirect('AdminLogin');
        }
    }
    public function getCourseInfo(){
        $usersId = array();
        $usersinfo = array();
        $check = $_POST['id'] ;
        for($i = 0 ;  $i < 24 ; $i++){
            $users = weekly_schedule::where('coursesID'.$i.'' ,'LIKE' ,'%'.$check.'%' )->get();
            foreach ($users as $user) {
                array_unshift($usersId ,  $user->id);
            }            
        }
        $usersId = array_unique($usersId);
        foreach($usersId  as $userId ){
            $user = User::where('stuNum' , $userId )->first();
            $userinfo = array();
            array_unshift($userinfo , $user->stuNum , $user->firstName , $user->lastName );
            array_unshift($usersinfo , $userinfo );
            unset($userinfo);
        }
        if(session('userfirstName') != ''){
            return $usersinfo ;
        }else{
            return redirect('AdminLogin');
        } 
    }    
    //edit lesson
    public function showeditlesson(){
        $posts= Lesson::all();
        return view('admin.adminedit')->with('posts', $posts);
    }
    public function edit(){
        $lesson_id = $_POST['lesson_id'];
        $posts = Lesson::where(['lesson_id' => $lesson_id ])->first();
        if(session('userfirstName') != ''){
            return $posts ;
        }else{
            return redirect('AdminLogin');
        }
    }
    public function updateLesson(Request $request){
        $messages =[
            'lesson_name.required'=>'لطفا نام درس را وارد کنید',
            'lesson_id.required'=>'لطفا کد را وارد کنید',
            'kind_of_lesson.required'=>'لطفا نوع درس را وارد کنید',
            'vahed.required'=>'لطفا تعداد واحد درس را وارد کنید',
        ] ;
        $validator = \Validator::make($request->all(), [
            'lesson_name'=> 'required',
            'lesson_id'  =>  'required',
            'kind_of_lesson'=>'required',
            'vahed'=>'required',
        ], $messages);
        
        if(count($validator->errors()) ==  0){
            $lesson_id = $_POST['lesson_id'];
            //update weeklySchedule Users
            $lesson = Lesson::where(['lesson_id' => $lesson_id ])->first();
            for($i = 0 ;  $i < 24 ; $i++){
                $usedlessons = weekly_schedule::where('coursesID'.$i.'' ,'LIKE' ,'%'.$lesson_id.'%' )->get();
                if($usedlessons != null){
                    foreach ($usedlessons as $usedlesson) {
                        weekly_schedule::where('id',$usedlesson->id)->update([
                            'id'=>$usedlesson->id,
                            'coursesID'.$i.'' =>"",
                        ]);
                    } 
                }
            }
            // dd($usersId);
            //update lesson 
            Lesson::where('lesson_id', $lesson_id)
                ->update([
                'lesson_name'=> $_POST['lesson_name'], 
                'lesson_id' =>$_POST['lesson_id'],
                'professor_name' =>$_POST['professor_name'],
                'kind_of_lesson' =>$_POST['kind_of_lesson'],
                'class_day' => $_POST['class_day'],
                'class_time_start'=> $_POST['class_time_start'],
                'class_time_end' =>$_POST['class_time_end'],
                'class_day_two' =>$_POST['class_day_two'],
                'class_time_two_start' =>$_POST['class_time_two_start'],
                'class_time_two_end' => $_POST['class_time_two_end'],
                'vahed' =>$_POST['vahed'],
                'exam_date' =>$_POST['exam_date'],
                'exam_time_start' =>$_POST['exam_time_start'],
                'exam_time_end' => $_POST['exam_time_end'],
                'sexuality' => $_POST['sexuality'],
            ]);            
        }else{
            return ($validator->errors());
        }
    }
    public function deleteLesson(){
        $lesson_id = $_POST['lesson_id'];
        $lesson = Lesson::where(['lesson_id' => $lesson_id ])->first()->delete();  
    }
    //logout
    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/AdminLogin');
    }
}

