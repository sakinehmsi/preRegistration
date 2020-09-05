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
use App\Filter;
use Illuminate\Support\Facades\Hash;
use Session;
use DB;
use validator;
class userController extends Controller
{
	//signin
    public function showhome(){
        return view('home')->with('showLoginForm', '0')->with('notfound','0')->with('incorrectPass', '0');;
        return captcha_src();
    }
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
    public function showselect(){
        if(session('userfirstName') != ''){
           return view('select');
        }else{
           return redirect('');
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
    public function showavailableCourses(){
        if(session('userfirstName') != ''){
           $courses = DB::table('Lessons')->groupBy('main_id')->get();
           return view('availableCourses')->with('courses', $courses);
        }else{
           return redirect('');
        }
    }
    public function checkPreRegistration(){
        $filteredCoursesID[] = array();
        $usercourses[] = array();
        $coursesError[] = array();
        $user = Weekly_schedule::where(['id' => Session::get('userid')])->first();
        if($user != null){
            for($u = 0; $u < 24; $u++) {
                $v = 'coursesID'.$u.'';
                if( $user[$v] != ""){
                    $user[$v] = explode(',', $user[$v]);
                    array_unshift($filteredCoursesID, $user[$v][0]);
                    $usercourse[] = array();
                    array_unshift($usercourse, $user[$v][0], $user[$v][1], $user[$v][2], $user[$v][3], $user[$v][4], $user[$v][5], $user[$v][6], $user[$v][7]);
                    array_unshift($usercourses, $usercourse);
                    unset($usercourse);
                }
            }
            $filteredCoursesID = array_filter($filteredCoursesID);//user courses id 
            $usercourses = array_filter($usercourses);//user courses 
            
            //coursesError
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
            //show weekly Schedule result
            if(session('userfirstName') != ''){
                return view('finalSelectedCourses')->with('usercourses', $usercourses)->with('coursesError', $coursesError);            
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
        $filteredCoursesID[] = array();
        $usercourses[] = array();
        $id =  Session::get('userid');
        $lessons[] = array();        
        $main_ids[] = array();
        $overbid_lessonsID[] = array();
        $overbid_lessons[] = array();
        $selectedCoursesID = explode(',', request()->selectedCoursesID);
        foreach($selectedCoursesID as $selectedCourseID){
            array_unshift($lessons, Lesson::where('main_id' , $selectedCourseID)->get());
        }
        $user = Weekly_schedule::where(['id' => Session::get('userid')])->first();
        
        if($user != null){
            for($u = 0; $u < 24; $u++) {
                $v = 'coursesID'.$u.'';
                if( $user[$v] != ""){
                    $user[$v] = explode(',', $user[$v]);
                    array_unshift($filteredCoursesID, $user[$v][0]);
                    $usercourse[] = array();
                    array_unshift($usercourse, $user[$v][0], $user[$v][1], $user[$v][2], $user[$v][3], $user[$v][4], $user[$v][5], $user[$v][6], $user[$v][7], $user[$v][8], $user[$v][9], $user[$v][10]);
                    array_unshift($usercourses, $usercourse);
                    unset($usercourse);
                }
            } 
            $filteredCoursesID = array_filter($filteredCoursesID);
            foreach($filteredCoursesID as $filteredCourseID){
                $filteredCourseID = substr($filteredCourseID, 0, -3);
                array_unshift($lessons, Lesson::where('main_id' , $filteredCourseID)->get());
            } 
            $lessons = array_filter($lessons);
            $lessons  = array_unique( $lessons );
        }
        $usercourses = array_filter($usercourses);
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
                    $preRequisiteID1 = $Specialized_lesson->preRequisiteID1;
                    $preRequisiteID1_status = Passed_course::where(['stuNum' => Session::get('userid') , 'courseID' => $preRequisiteID1 ])->first();
                    if($preRequisiteID1_status != null){
                        if($Specialized_lesson->preRequisiteID2 != null){
                            $preRequisiteID2 = $Specialized_lesson->preRequisiteID2;
                            $preRequisiteID2_status = Passed_course::where(['stuNum' => Session::get('userid') , 'courseID' => $preRequisiteID2 ])->first();
                            if($preRequisiteID2_status != null){
                                array_unshift($overbid_lessonsID, $main_id);                            
                            }
                        }else{
                            array_unshift($overbid_lessonsID, $main_id);
                        }
                    }
                }else{
                    array_unshift($overbid_lessonsID, $main_id);
                }
            }
        }
        $overbid_lessonsID =  array_filter( $overbid_lessonsID);
        $filteredCoursesID =  array_filter( $filteredCoursesID);
        $overbid_lessonsID = array_diff( $overbid_lessonsID ,  $selectedCoursesID );
        $overbid_lessonsID = array_diff( $overbid_lessonsID ,  $filteredCoursesID );
        $overbid_lessonsID = implode(',' , $overbid_lessonsID);
        $overbid_lessonsID = explode(',' ,$overbid_lessonsID);
        for($ob = 0 ;  $ob < count($overbid_lessonsID) ;  $ob++){
            $id = (int) $overbid_lessonsID[$ob];
            array_unshift($overbid_lessons, Lesson::where(['main_id' => $id])->get());
        }
        $overbid_lessons = array_filter($overbid_lessons);
        if($user != null){
            if(session('userfirstName') != ''){
                return view('selectedCourses')->with('usercourses', $usercourses)->with('courses', $lessons)->with('overbid_lessons', $overbid_lessons);
            }else{
                return redirect('');
            }
        }else{
            $usercourses = array_filter($usercourses);//user courses 
            if(session('userfirstName') != ''){
                return view('selectedCourses')->with('usercourses', $usercourses)->with('courses', $lessons)->with('overbid_lessons', $overbid_lessons);
            }else{
                return redirect('');
            }   
        }
    }
    public function showfinalSelectedCourses(Request $request){
        $filteredCoursesID[] = array();
        $coursesError[] = array();
        $temps[] = array();
        for($t = 0; $t < 24; $t++){
            $temps[$t] = "";
        }
        $id =  Session::get('userid');
        //get user courses id 
        $usercourses = json_decode(request()->usercourses, true); 
        for($u = 0; $u < count($usercourses); $u++) {
            array_unshift($filteredCoursesID, $usercourses[$u][0]);
            $temps[$u] = ''.$usercourses[$u][0].','.$usercourses[$u][1].','.$usercourses[$u][2].','.$usercourses[$u][3].','.$usercourses[$u][4].','.$usercourses[$u][5].','.$usercourses[$u][6].','.$usercourses[$u][7].','.$usercourses[$u][8].','.$usercourses[$u][9].','.$usercourses[$u][10].'';
        }
        $filteredCoursesID = array_filter($filteredCoursesID);//user courses id 
        //coursesError
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
                'id'=>$id,
                'coursesID0' =>$temps[0],
                'coursesID1'=>$temps[1],
                'coursesID2' =>$temps[2],
                'coursesID3'=>$temps[3],
                'coursesID4' =>$temps[4],
                'coursesID5'=>$temps[5],
                'coursesID6'=>$temps[6],
                'coursesID7' =>$temps[7],
                'coursesID8'=>$temps[8],
                'coursesID9' =>$temps[9],
                'coursesID10'=>$temps[10],
                'coursesID11'=>$temps[11],
                'coursesID12' =>$temps[12],
                'coursesID13'=>$temps[13],
                'coursesID14' =>$temps[14],
                'coursesID15'=>$temps[15],
                'coursesID16'=>$temps[16],
                'coursesID17' =>$temps[17],
                'coursesID18'=>$temps[18],
                'coursesID19' =>$temps[19],
                'coursesID20'=>$temps[20],
                'coursesID21'=>$temps[21],
                'coursesID22' =>$temps[22],
                'coursesID23'=>$temps[23],
                ]
            );
        }   
        else{
            weekly_schedule::where('id', $id)->update([
                'id'=>$id,
                'coursesID0' =>$temps[0],
                'coursesID1'=>$temps[1],
                'coursesID2' =>$temps[2],
                'coursesID3'=>$temps[3],
                'coursesID4' =>$temps[4],
                'coursesID5'=>$temps[5],
                'coursesID6'=>$temps[6],
                'coursesID7' =>$temps[7],
                'coursesID8'=>$temps[8],
                'coursesID9' =>$temps[9],
                'coursesID10'=>$temps[10],
                'coursesID11'=>$temps[11],
                'coursesID12' =>$temps[12],
                'coursesID13'=>$temps[13],
                'coursesID14' =>$temps[14],
                'coursesID15'=>$temps[15],
                'coursesID16'=>$temps[16],
                'coursesID17' =>$temps[17],
                'coursesID18'=>$temps[18],
                'coursesID19' =>$temps[19],
                'coursesID20'=>$temps[20],
                'coursesID21'=>$temps[21],
                'coursesID22' =>$temps[22],
                'coursesID23'=>$temps[23],
            ]);
        }
        if(session('userfirstName') != ''){
            return view('finalSelectedCourses')->with('usercourses', $usercourses)->with('coursesError', $coursesError);            
        }else{
            return redirect('');
        }
    }
    //passed courses
    public function showchart(){
        if(session('userfirstName') != ''){
            return view('chart');
        }else{
            return redirect('');
        }
    }
    public function showPassedCourses(){
        $passed_coursesId[] = array() ;
        $passed_courses = Passed_course::where(['stuNum' =>session::get('userid') ])->get();
        foreach($passed_courses as $passed_course){
            array_unshift($passed_coursesId , $passed_course->courseID );
        }
        $passed_coursesId = array_filter($passed_coursesId);
        return $passed_coursesId;
    }
    public function lesson_chart(){        
        $passed_coursesId[] = array() ;
        $passed_courses = Passed_course::where(['stuNum' =>  $_POST['stuNum'] ])->get();
        foreach($passed_courses as $passed_course){
            array_unshift($passed_coursesId , $passed_course->courseID );
        }
        $passed_coursesId = array_filter($passed_coursesId);
        $coursesID = explode(',', $_POST['coursesID']);
        // dd($coursesID);
        // dd($passed_coursesId);
        $newPassedCoursesID = array_diff( $coursesID , $passed_coursesId);
        
        foreach($newPassedCoursesID as $courses){
            Passed_course::create([
              'courseID' => $courses,
              'stuNum' => $_POST['stuNum'],
            ]);
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
        $array_search_input = explode(' ',$search_input );
        $all_documents[] = array();
        $final_document[] = array();
        for($s = 0 ;  $s < count($array_search_input) ;  $s++){
            $doc[] = array();
            array_unshift($doc , DB::connection('mongodb')->collection('preRegistration_chatRoom')->where('message' , 'like', '%'.$array_search_input[$s].'%')->get());
            $doc = array_filter($doc);
            array_unshift($doc , DB::connection('mongodb')->collection('preRegistration_chatRoom')->where('reply_message' , 'like', '%'.$array_search_input[$s].'%')->get());
            $doc = array_filter($doc);             
            $doc = array_unique($doc);
            for($e = 0 ; $e < count($doc) ;  $e++ ){
                for($d = 0 ; $d < count($doc[$e]) ;  $d++ ){
                    array_unshift($all_documents ,  $doc[$e][$d]); 
                    $all_documents = array_filter($all_documents);    
                }  
            }
            unset($doc); 
        }
        $all_documents = array_filter($all_documents);
        $all_documents = array_unique($all_documents, SORT_REGULAR);
        foreach ($all_documents as $key => $value) {
            array_unshift($final_document ,  $value);
        }
        $final_document = array_filter($final_document);
        $final_document = array_unique($final_document, SORT_REGULAR);
        if(session('userfirstName') != ''){
            return $final_document ;
        }else{
            return redirect('');
        }  
    }
    //logout
    public function logout(Request $request){
        $request->session()->flush();
        return redirect('');
    }
}