<?php
//user ***
//home
Route::get('/','userController@showhome')->name('home');
//signup and signin
Route::post('/store_signup','userController@storeNewUser')->name('store_signup');
Route::post('/store_signin','userController@getUser')->name('store_signin');
Route::get('refresh_captcha', 'userController@refreshCaptcha')->name('refresh_captcha');
//profile menu
Route::get('/home','userController@logout')->name('logout');
Route::get('/WeeklySchedule','userController@checkPreRegistration')->name('checkPreRegistration');
Route::get('/select','userController@showselect')->name('select');
//chatRoom
Route::get('/userRequest','userController@showUsersRequestsPage')->name('userRequest');
Route::post('/send_request','userController@send_request')->name('send_request');
Route::get('/refresh_ChatRoom','userController@refresh_ChatRoom')->name('refresh_ChatRoom');
Route::get('/refresh_user_messages','userController@refresh_user_messages')->name('refresh_user_messages');
Route::post('/search_input','userController@search_input')->name('search_input');
//pre Registration 
Route::get('/availableCourses','userController@showavailableCourses')->name('availableCourses');
Route::post('/selectedCourses','userController@sendselectedCourses')->name('selectedCourses');
Route::post('/finalSelectedCourses','userController@showfinalSelectedCourses')->name('finalSelectedCourses');
//passed Courses
Route::get('/chart','userController@showchart')->name('chart');
Route::post('/chart','userController@lesson_chart')->name('chart');
Route::get('GetPassedCources','userController@getPassedCources');
Route::get('/showPassedCourses','userController@showPassedCourses')->name('showPassedCourses');
//end user ***

//admin ***
//signin
Route::get('/AdminLogin', 'adminController@showAdminLoginForm')->name('showAdminLoginForm');
Route::post('/admin_signin','adminController@getAdmin')->name('admin_signin');
Route::get('/admin_select','adminController@showAdminSelect')->name('admin_select');
//logout
Route::get('/Adminlogout','adminController@logout')->name('Adminlogout');
//chatRoom
Route::get('/refresh_ChatRoom_admin','adminController@refresh_ChatRoom_admin')->name('refresh_ChatRoom_admin');
Route::get('/usersRequests','adminController@showUsersRequests')->name('usersRequests');
Route::post('/send_response','adminController@send_response')->name('send_response');
//add lesson
Route::get('/addlesson','adminController@showaddlesson')->name('showaddlesson');
Route::post('/addlesson','adminController@addlesson')->name('addlesson');
Route::post('/getLesson','adminController@getLesson')->name('getLesson');
//edit lesson 
Route::get('/showeditlesson','adminController@showeditlesson')->name('showeditlesson');
Route::post('/search','adminController@search')->name('search');
Route::resource('posts','adminController');
Route::post('/updateLesson','adminController@updateLesson')->name('updateLesson');
Route::post('/edit','adminController@edit')->name('edit');
Route::get('/refreshAvailableCourses','adminController@refreshAvailableCourses')->name('refreshAvailableCourses');
//delete lesson
Route::post('/deleteLesson','adminController@deleteLesson')->name('deleteLesson');
//user PreRegistraion Detail
Route::get('/userPreReg_Detail','adminController@show_userPreReg_Detail')->name('show_user_PreReg_Detail');
Route::post('/getCourseInfo','adminController@getCourseInfo')->name('getCourseInfo');
//end admin ***