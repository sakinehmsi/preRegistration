<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Lesson;
use App\weekly_schedule;
use App\Passed_course;
use App\Specialized_course;
use App\Course;
use Illuminate\Support\Facades\Hash;
use Session;
use DB;
use validator;
class userController extends Controller
{
	//user
    public function storeNewUser(Request $request){
        
        $messages =[
            'firstName.required' => 'لطفا نام  خود را وارد نمایید' , 
            'firstName.string' => 'نام شما تنها میتواند شامل حروف فارسی باشد', 
            'firstName.max' => 'تعداد کاراکترهای وارد شده بیش از مجاز می باشد',
            'firstName.persian_alpha' => ' نام شما تنها میتواند شامل حروف  فارسی باشد' , 
            'lastName.required' => 'لطفا نام خانوادگی  خود را وارد نمایید' , 
            'lastName.string' => 'نام خانوادگی شما تنها میتواند شامل حروف فارسی باشد', 
            'lastName.max' => 'تعداد کاراکترهای وارد شده بیش از مجاز می باشد', 
            'lastName.persian_alpha' => ' نام خانوادگی شما تنها میتواند شامل حروف  فارسی باشد' , 
            'stuNum.required' => 'لطفا شماره دانشجویی  خود را وارد نمایید', 
            'stuNum.digits_between' => 'تعداد کاراکترهای وارد شده مجاز نمی باشد',
            'stuNum.unique' => 'حسابی با این شماره دانشجویی وجود دارد' ,
            'password.required' => 'لطفا گذرواژه  خود را وارد نمایید', 
            'password.string' => 'گذرواژه شما تنها میتواند یک رشته شامل حروف واعداد باشد', 
            'password.min' => 'گذرواژه شما باید حداقل شامل هشت کاراکتر باشد', 
            'password.regex' => 'گذرواژه شما تنها میتواند یک رشته شامل حروف واعدادانگلیسی باشد',
            'confirmPassword.required_with' => 'تکرار گذرواژه اشتباه می باشد ', 
            'confirmPassword.same' => 'تکرار گذرواژه اشتباه می باشد ', 
        ] ;
        
        $validator = \Validator::make($request->all(), [
            'firstName' => 'required|persian_alpha|string|max:255', 
            'lastName' => 'required|persian_alpha|string|max:255' , 
            'stuNum' => ['required','digits_between:8,12', 'unique:users'], 
            'password' => 'required|regex:/(([a-zA-Z]*)(\d*)?$)/u|string|min:8|required_with:confirmPassword',
            'confirmPassword' => 'same:password|required_with:password', 
        ], $messages);
        
        
        if(count($validator->errors()) ==  0){
            User::create(
                ['firstName' => $_POST['firstName'],
                'lastName' => $_POST['lastName'],
                'password' => Hash::make($_POST['password']),
                'stuNum' => $_POST['stuNum'],]
            );
        }else{
            return ($validator->errors());
        }
    }
    
    public function getUser(Request $request){
        $messages = [ 
            'stuNum.required' => 'لطفا شماره دانشجویی  خود را وارد نمایید', 
            'password.required' => 'لطفا گذرواژه  خود را وارد نمایید',  
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
        
        $user = User::where(['stuNum' => $stuNum])->first();
        
        if($user == null){
            $validator->getMessageBag()->add('showLoginForm', '1');
            $validator->getMessageBag()->add('notfound', '1');
            $validator->getMessageBag()->add('incorrectPass', '0');
            
        }else{
            if((Hash::check($pass, $user->password))&&(($stuNum) == ($user->stuNum))){
                
                $id = $user ->stuNum;
                $firstName = $user ->firstName;
                $lastName = $user ->lastName;
                
                session(['userid' => $id]);
                session(['userfirstName' => (string)$firstName]);
                session(['userlastName' => (string)$lastName]);
                
                if(count($validator->errors()) == 0)
                    return ('success'); 
                
            } else {
                $validator->getMessageBag()->add('showLoginForm', '1');
                $validator->getMessageBag()->add('notfound', '0');
                $validator->getMessageBag()->add('incorrectPass', '1');
            }   
        }
        return ($validator->errors());
    }
    
    public function refreshCaptcha(){
        return response()->json(['captcha'=> captcha_img()]);
    }
    //preRegistration
    public function checkPreRegistration(){
        $user = Weekly_schedule::where(['id' => Session::get('userid')])->first();
        
        if($user != null){
            //show weekly Schedule
            $coursesID[] = array();
            $coursesName[] = array();
            //initialaization coursesID and coursesName
            for($i = 29 ;  $i > -1; $i--){
                $courseID='coursesID' . $i;
                $courseName='coursesName' . $i;
                array_unshift($coursesID, $user->$courseID);
                array_unshift($coursesName , $user->$courseName);
            }
            //check weekly Schedule
            $id =  Session::get('userid');
            
            $selectedCoursesID[] = array();
            $coursesError[] = array();
            
            $tempFilterCoursesID = array_filter($coursesID);
            $filteredCoursesID = array_unique($tempFilterCoursesID);
            
            foreach ($filteredCoursesID as $filteredCourseID) {
                $filteredCourseID = substr($filteredCourseID, 0, -3);
                $tempCheckCourse = Specialized_course::where(['id' => $filteredCourseID])->first();
                if($tempCheckCourse != null){
                    
                    $preRequisiteID1 = $tempCheckCourse->preRequisiteID1 ;
                    $preRequisiteID2 = $tempCheckCourse->preRequisiteID2 ;
                    
                    $passed_PreRequisiteID1 = Passed_course::where(['stuNum' => Session::get('userid') , 'courseID' => $preRequisiteID1 ])->first();
                    $passed_PreRequisiteID2 = Passed_course::where(['stuNum' => Session::get('userid') , 'courseID' => $preRequisiteID2 ])->first();
                    //initialization coursesError  
                    if( $preRequisiteID2 != null){
                        // has preRequisiteID2
                        if($passed_PreRequisiteID1 != null && $passed_PreRequisiteID2 != null){
                            //pass preRequisiteID1 and preRequisiteID2
                            continue ;
                        }elseif($passed_PreRequisiteID1 != null && $passed_PreRequisiteID2 == null){
                            // passed preRequisiteID1 but not_passed preRequisiteID2
                            $courseError = array();
                            array_unshift($courseError , $tempCheckCourse->name , $tempCheckCourse->preRequisiteName2 )  ;
                            array_unshift($coursesError ,  $courseError );
                            unset($courseError);
                        }elseif ($passed_PreRequisiteID1 == null && $passed_PreRequisiteID2 != null) {
                            // passed preRequisiteID2 but not_passed preRequisiteID1
                            $courseError = array();
                            array_unshift($courseError , $tempCheckCourse->name , $tempCheckCourse->preRequisiteName1 )  ;
                            array_unshift($coursesError ,  $courseError );
                            unset($courseError);
                        }elseif ($passed_PreRequisiteID1 == null && $passed_PreRequisiteID2 == null) {
                            //  not_passed preRequisiteID1 and preRequisiteID2
                            $courseError = array();
                            array_unshift($courseError , $tempCheckCourse->name , $tempCheckCourse->preRequisiteName1 , $tempCheckCourse->preRequisiteName2)  ;
                            array_unshift($coursesError ,  $courseError );
                            unset($courseError);
                        }
                        
                    }else{
                        // dont has preRequisiteID2 
                        if($passed_PreRequisiteID1 != null){
                            // passed preRequisiteID1
                            continue; 
                        }else{
                            //not_Passed preRequisiteID1
                            $courseError = array();
                            array_unshift($courseError , $tempCheckCourse->name , $tempCheckCourse->preRequisiteName1 )  ;
                            array_unshift($coursesError ,  $courseError );
                            unset($courseError);
                        }
                            
                    }
                }
            }
            // end check weekly Schedule
            
            //show weekly Schedule result
            if(session('userfirstName') != ''){
                return view('finalSelectedCourses')->with('coursesID', $coursesID)
                                                   ->with('coursesName', $coursesName)
                                                   ->with('coursesError', $coursesError)
                                                   ->with('successPreRegistraion', 0)
                                                   ->with('correntPreRegistraion', 1);
            }else{
                return redirect('');
            }
        }else{
            // show available courses page for start preRegistration
            if(session('userfirstName') != ''){
                $courses = DB::table('Lessons')->groupBy('lesson_name')->get();
                return redirect('availableCourses')->with('courses', $courses);
            }else{
                return redirect('');
            }
        }
    }
    
    public function sendselectedCourses(Request $request){
        $id =  Session::get('userid');
        $lessons[] = array();
        $main_ids[] = array();
        $overbid_lessons[] = array();
        $selectedCourses = explode(',', request()->selectedCourses);
        
        foreach($selectedCourses as $selectedCourse){
            array_unshift($lessons, Lesson::where('lesson_name' , $selectedCourse)->get());            
        }
        
        //overbid_lessons
        $available_lessons = Lesson::all();
        foreach($available_lessons as $available_lesson){
            array_unshift( $main_ids  , $available_lesson->main_id);
        }
        $main_ids  = array_filter( $main_ids );
        $main_ids  = array_unique( $main_ids );
        
        foreach($main_ids as $main_id){           
            $available_lesson_status = Passed_course::where(['stuNum' => Session::get('userid') , 'courseID' => $main_id ])->first();
            if($available_lesson_status == null){
                $Specialized_lesson = Specialized_course::where(['id' => $main_id])->first();
                if($Specialized_lesson != null){
                    $preReauisiteID1 = $Specialized_lesson->preReauisiteID1;
                    $preReauisiteID1_status = Passed_course::where(['stuNum' => Session::get('userid') , 'courseID' => $preReauisiteID1 ])->first();
                    if($preReauisiteID1_status != null){
                        if($Specialized_lesson->preReauisiteID2 != null){
                            $preReauisiteID2 = $Specialized_lesson->preReauisiteID2;
                        }
                        $preReauisiteID2_status = Passed_course::where(['stuNum' => Session::get('userid') , 'courseID' => $preReauisiteID2 ])->first();
                        if($preReauisiteID2_status != null){
                            array_unshift($overbid_lessons, Lesson::where('main_id' , $main_id)->get());
                            
                        }
                    }
                }else{
                    array_unshift($overbid_lessons, Lesson::where('main_id' , $main_id)->get());
                }
            }
        }
        
        if(session('userfirstName') != ''){
            return view('selectedCourses')->with('courses', $lessons)->with('overbid_lessons', $overbid_lessons);
        }else{
            return redirect('');
        }
    }
    
    public function showfinalSelectedCourses(Request $request){
        $coursesID = explode(',', request()->coursesID);
        $coursesName = explode(',', request()->coursesName);
        $id =  Session::get('userid');
        $selectedCoursesID[] = array();
        $coursesError[] = array();
        
        //filter empty elements of array
        $tempFilterCoursesID = array_filter($coursesID);
        //unique element
        $filteredCoursesID = array_unique($tempFilterCoursesID);
        
        foreach ($filteredCoursesID as $filteredCourseID) {
            $filteredCourseID = substr($filteredCourseID, 0, -3);
            $tempCheckCourse = Specialized_course::where(['id' => $filteredCourseID])->first();
            if($tempCheckCourse != null){
                
                $preRequisiteID1 = $tempCheckCourse->preRequisiteID1 ;
                $preRequisiteID2 = $tempCheckCourse->preRequisiteID2 ;
                
                $passed_PreRequisiteID1 = Passed_course::where(['stuNum' => Session::get('userid') , 'courseID' => $preRequisiteID1 ])->first();
                $passed_PreRequisiteID2 = Passed_course::where(['stuNum' => Session::get('userid') , 'courseID' => $preRequisiteID2 ])->first();
                    
                if( $preRequisiteID2 != null){
                    // has preRequisiteID2
                    if($passed_PreRequisiteID1 != null && $passed_PreRequisiteID2 != null){
                        //pass preRequisiteID1 and preRequisiteID2
                        continue ;
                    }elseif($passed_PreRequisiteID1 != null && $passed_PreRequisiteID2 == null){
                        // passed preRequisiteID1 but not_passed preRequisiteID2
                        $courseError = array();
                        array_unshift($courseError , $tempCheckCourse->name , $tempCheckCourse->preRequisiteName2 )  ;
                        array_unshift($coursesError ,  $courseError );
                        unset($courseError);
                    }elseif ($passed_PreRequisiteID1 == null && $passed_PreRequisiteID2 != null) {
                        // passed preRequisiteID2 but not_passed preRequisiteID1
                        $courseError = array();
                        array_unshift($courseError , $tempCheckCourse->name , $tempCheckCourse->preRequisiteName1 )  ;
                        array_unshift($coursesError ,  $courseError );
                        unset($courseError);
                    }elseif ($passed_PreRequisiteID1 == null && $passed_PreRequisiteID2 == null) {
                        //  not_passed preRequisiteID1 and preRequisiteID2
                        $courseError = array();
                        array_unshift($courseError , $tempCheckCourse->name , $tempCheckCourse->preRequisiteName1 , $tempCheckCourse->preRequisiteName2)  ;
                        array_unshift($coursesError ,  $courseError );
                        unset($courseError);
                    }
                    
                }else{
                    // dont has preRequisiteID2 
                    if($passed_PreRequisiteID1 != null){
                        // passed preRequisiteID1
                        continue; 
                    }else{
                        //not_Passed preRequisiteID1
                        $courseError = array();
                        array_unshift($courseError , $tempCheckCourse->name , $tempCheckCourse->preRequisiteName1 )  ;
                        array_unshift($coursesError ,  $courseError );
                        unset($courseError);
                    }
                        
                }
            }
        }
        
        $weekly_schedule = weekly_schedule::where(['id' => Session::get('userid')])->first();
        if($weekly_schedule == null){
            weekly_schedule::create(
                [
                //user id
                'id'=>$id,
                //courses id
                'coursesID0' =>$coursesID[0],
                'coursesID1'=>$coursesID[1],
                'coursesID2' => $coursesID[2],
                'coursesID3' => $coursesID[3],
                'coursesID4' => $coursesID[4],
                'coursesID5' => $coursesID[5],
                'coursesID6' => $coursesID[6],
                'coursesID7' => $coursesID[7],
                'coursesID8' => $coursesID[8],
                'coursesID9' => $coursesID[9],
                'coursesID10' => $coursesID[10],
                'coursesID11' => $coursesID[11],
                'coursesID12' => $coursesID[12],
                'coursesID13' => $coursesID[13],
                'coursesID14' => $coursesID[14],
                'coursesID15' => $coursesID[15],
                'coursesID16' => $coursesID[16],
                'coursesID17' => $coursesID[17],
                'coursesID18' => $coursesID[18],
                'coursesID19' => $coursesID[19],
                'coursesID20' => $coursesID[20],
                'coursesID21' => $coursesID[21],
                'coursesID22' => $coursesID[22],
                'coursesID23' => $coursesID[23],
                'coursesID24' => $coursesID[24],
                'coursesID25' => $coursesID[25],
                'coursesID26' => $coursesID[26],
                'coursesID27' => $coursesID[27],
                'coursesID28' => $coursesID[28],
                'coursesID29' => $coursesID[29],
                //courses Name
                'coursesName0' => $coursesName[0],
                'coursesName1' => $coursesName[1],
                'coursesName2' => $coursesName[2],
                'coursesName3' => $coursesName[3],
                'coursesName4' => $coursesName[4],
                'coursesName5' => $coursesName[5],
                'coursesName6' => $coursesName[6],
                'coursesName7' => $coursesName[7],
                'coursesName8' => $coursesName[8],
                'coursesName9' => $coursesName[9],
                'coursesName10' => $coursesName[10],
                'coursesName11' => $coursesName[11],
                'coursesName12' => $coursesName[12],
                'coursesName13' => $coursesName[13],
                'coursesName14' => $coursesName[14],
                'coursesName15' => $coursesName[15],
                'coursesName16' => $coursesName[16],
                'coursesName17' => $coursesName[17],
                'coursesName18' => $coursesName[18],
                'coursesName19' => $coursesName[19],
                'coursesName20' => $coursesName[20],
                'coursesName21' => $coursesName[21],
                'coursesName22' => $coursesName[22],
                'coursesName23' => $coursesName[23],
                'coursesName24' => $coursesName[24],
                'coursesName25' => $coursesName[25],
                'coursesName26' => $coursesName[26],
                'coursesName27' => $coursesName[27],
                'coursesName28' => $coursesName[28],
                'coursesName29' => $coursesName[29],
                ]
            );
        }   
        else{
            weekly_schedule::where('id', $id)
                ->update(['coursesID0' => $coursesID[0],
                'coursesID1'=>$coursesID[1],
                'coursesID2' => $coursesID[2],
                'coursesID3' => $coursesID[3],
                'coursesID4' => $coursesID[4],
                'coursesID5' => $coursesID[5],
                'coursesID6' => $coursesID[6],
                'coursesID7' => $coursesID[7],
                'coursesID8' => $coursesID[8],
                'coursesID9' => $coursesID[9],
                'coursesID10' => $coursesID[10],
                'coursesID11' => $coursesID[11],
                'coursesID12' => $coursesID[12],
                'coursesID13' => $coursesID[13],
                'coursesID14' => $coursesID[14],
                'coursesID15' => $coursesID[15],
                'coursesID16' => $coursesID[16],
                'coursesID17' => $coursesID[17],
                'coursesID18' => $coursesID[18],
                'coursesID19' => $coursesID[19],
                'coursesID20' => $coursesID[20],
                'coursesID21' => $coursesID[21],
                'coursesID22' => $coursesID[22],
                'coursesID23' => $coursesID[23],
                'coursesID24' => $coursesID[24],
                'coursesID25' => $coursesID[25],
                'coursesID26' => $coursesID[26],
                'coursesID27' => $coursesID[27],
                'coursesID28' => $coursesID[28],
                'coursesID29' => $coursesID[29],
                //courses Name
                'coursesName0' => $coursesName[0],
                'coursesName1' => $coursesName[1],
                'coursesName2' => $coursesName[2],
                'coursesName3' => $coursesName[3],
                'coursesName4' => $coursesName[4],
                'coursesName5' => $coursesName[5],
                'coursesName6' => $coursesName[6],
                'coursesName7' => $coursesName[7],
                'coursesName8' => $coursesName[8],
                'coursesName9' => $coursesName[9],
                'coursesName10' => $coursesName[10],
                'coursesName11' => $coursesName[11],
                'coursesName12' => $coursesName[12],
                'coursesName13' => $coursesName[13],
                'coursesName14' => $coursesName[14],
                'coursesName15' => $coursesName[15],
                'coursesName16' => $coursesName[16],
                'coursesName17' => $coursesName[17],
                'coursesName18' => $coursesName[18],
                'coursesName19' => $coursesName[19],
                'coursesName20' => $coursesName[20],
                'coursesName21' => $coursesName[21],
                'coursesName22' => $coursesName[22],
                'coursesName23' => $coursesName[23],
                'coursesName24' => $coursesName[24],
                'coursesName25' => $coursesName[25],
                'coursesName26' => $coursesName[26],
                'coursesName27' => $coursesName[27],
                'coursesName28' => $coursesName[28],
                'coursesName29' => $coursesName[29],
            ]);
        }
        if(session('userfirstName') != ''){
            return view('finalSelectedCourses')->with('coursesID', $coursesID)
                                               ->with('coursesName', $coursesName)
                                               ->with('coursesError', $coursesError)
                                               ->with('successPreRegistraion', 1)
                                               ->with('correntPreRegistraion', 1);
        }else{
            return redirect('');
        }
    }
    //chatRoom
    public function showUsersRequestsPage(){
       $chatRoom =  DB::connection('mongodb')->collection('preRegistration_chatRoom')->get();
       $id =  Session::get('userid');
       $request_content =  DB::connection('mongodb')->collection('preRegistration_chatRoom')->where('sender' , ''.$id.'')->get() ;
       if(session('userfirstName') != ''){
          return view('userRequest')->with('chatRoom', $chatRoom)->with('request_content', $request_content);
       }else{
          return redirect('');
       }  
    } 
    
    public function send_request(){
        DB::connection('mongodb')->collection('preRegistration_chatRoom')->insert(
            ['sender'=> $_POST['sender'],
             'message' => $_POST['message'], 
             'reply_message_id' => 0, 
            ]
        );
    }
    
    public function refresh_ChatRoom(){
        $refreshed_data =  DB::connection('mongodb')->collection('preRegistration_chatRoom')->orderBy('_id', 'DESC')->take(20)->get();
       
        if(session('userfirstName') != ''){
            return $refreshed_data ;
        }else{
            return redirect('');
        }  
    } 
    
    public function refresh_user_messages(){
        $id =  Session::get('userid');
        $request_content =  DB::connection('mongodb')->collection('preRegistration_chatRoom')->where('sender' , ''.$id.'')->orderBy('_id', 'DESC')->take(20)->get();
       
        if(session('userfirstName') != ''){
            return $request_content ;
        }else{
            return redirect('');
        } 
    }
    
    public function search_input(){
        $search_input = $_POST['search_input'];
        $all_documents = DB::connection('mongodb')->collection('preRegistration_chatRoom')->where('message' , 'like', '%'.$search_input.'%')->get();
        if(session('userfirstName') != ''){
            return $all_documents ;
        }else{
            return redirect('');
        }  
    }
    //passed courses
    public function lesson_chart(Request $request){
        $coursesID = explode(',', request()->coursesID);
        foreach($coursesID as $courses){
            Passed_course::create([
              'courseID' =>$courses,
              'stuNum' => session::get('userid'),
            ]);
        } 
    } 
    
}