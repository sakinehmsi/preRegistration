<?php

namespace App\Http\Controllers;
use App\Lesson;
use Illuminate\Http\Request;
use DB;
use App\ChatRoom;
class indexController extends Controller
{
   
   public function showhome()
   {
      return view('home')->with('showLoginForm', '0')->with('notfound','0')->with('incorrectPass', '0');;
      return captcha_src();
   }
   
   public function signup()
   {
      return view('signup');
   }
   
   public function signin()
   {
      return view('signin')->with('notfound', '0')
                           ->with('successSignUp', '0')
                           ->with('incorrectPass', '0');
   }
   
   public function showselect()
   {
      if(session('userfirstName') != ''){
         return view('select');
      }else{
         return redirect('');
      }
   }
   
   public function showavailableCourses()
   {
      if(session('userfirstName') != ''){
         $courses = DB::table('Lessons')->groupBy('lesson_name')->get();
         return view('availableCourses')->with('courses', $courses);
      }else{
         return redirect('');
      }
   }
   
  
   public function logout(Request $request)
   {
       $request->session()->flush();
       return redirect('');
   }
        
   public function showfilter()
   {
      return view('filterPage');
   }
   
   public function showchart()
   {
      return view('chart');
   }
   
   public function showchartomomi()
   {
      return view('chartomomi');
   }
}
