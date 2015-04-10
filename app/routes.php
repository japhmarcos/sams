<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Route::get('/',  array('uses' => 'UserController@getLogin', 'as' => 'getLogin')); 


Route::get('/',  array('uses' => 'HomeController@hello', 'as' => 'home'));   

Route::get('/admin/index', array('uses' => 'AdminController@index', 'as' => 'admin.index'));
Route::get('/admin/edit/{id}', array('uses' => 'AdminController@getUpdateUser', 'as' => 'getUpdateUser'));
Route::put('/admin/edit/{id}', array('uses' => 'AdminController@updateUser', 'as' => 'updateUser'));
Route::get('/admin/delete/{id}', array('uses' => 'AdminController@deleteUser', 'as' => 'deleteUser'));

Route::get('/admin/edit/teacher/{id}', array('uses' => 'AdminController@getUpdateTeacher', 'as' => 'getUpdateTeacher'));
Route::put('/admin/edit/teacher/{id}', array('uses' => 'AdminController@updateTeacher', 'as' => 'updateTeacher'));
Route::get('/admin/delete/teacher/{id}', array('uses' => 'AdminController@deleteTeacher', 'as' => 'deleteTeacher'));

Route::get('/admin/view/section/edit/{id}', array('uses' => 'AdminController@getUpdateSection', 'as' => 'getUpdateSection'));
Route::put('/admin/view/section/edit/{id}', array('uses' => 'AdminController@updateSection', 'as' => 'updateSection'));
Route::get('/admin/view/section/delete/{id}', array('uses' => 'AdminController@deleteSection', 'as' => 'deleteSection'));

Route::get('/admin/view/subject/edit/{id}', array('uses' => 'AdminController@getUpdateSubject', 'as' => 'getUpdateSubject'));
Route::put('/admin/view/subject/edit/{id}', array('uses' => 'AdminController@updateSubject', 'as' => 'updateSubject'));
Route::get('/admin/view/subject/delete/{id}', array('uses' => 'AdminController@deleteSubject', 'as' => 'deleteSubject'));

Route::get('/admin/view/room/edit/{id}', array('uses' => 'AdminController@getUpdateRoom', 'as' => 'getUpdateRoom'));
Route::put('/admin/view/room/edit/{id}', array('uses' => 'AdminController@updateRoom', 'as' => 'updateRoom'));
Route::get('/admin/view/room/delete/{id}', array('uses' => 'AdminController@deleteRoom', 'as' => 'deleteRoom'));

Route::get('/admin/view/subject/view_student/{id}', array('uses' => 'ViewController@viewSubjectStudent', 'as' => 'viewSubjectStudent'));
Route::get('/admin/view/subject/view_teacher/{id}', array('uses' => 'ViewController@viewSubjectTeacher', 'as' => 'viewSubjectTeacher'));
Route::get('/admin/view/subject/view_room/{id}', array('uses' => 'ViewController@viewSubjectRoom', 'as' => 'viewSubjectRoom'));
Route::get('/admin/view/subject/view_subjectinfo/{id}', array('uses' => 'ViewController@viewSubjectInfo', 'as' => 'viewSubjectInfo'));



Route::get('/teacher/view/section/view_student/{id}', array('uses' => 'ViewController@viewSectionStudent', 'as' => 'viewSectionStudent'));

Route::resource('admin1', 'AdminController');



Route::group(array('before' => 'auth'), function(){
	
	//Sign-out 
	
	Route::get('/user/logout', array(
		'as' => 'getLogout', 
		'uses' => 'UserController@getLogout'
	));
	
	Route::get('/user/admin', array(
		'as' => 'getAdmin',
		'uses' => 'AdminController@getAdmin'
	
	));
	
	//ADMIN
	Route::get('/admin/view', array('uses' => 'UserController@viewUser', 'as' => 'viewUser'));
	Route::get('/admin/profile', array('uses'=> 'ViewController@viewProfile', 'as' => 'viewProfile'));
	Route::get('/admin/profile/edit', array('uses'=> 'ViewController@getUpdateProfile', 'as' => 'getUpdateProfile')); 
	Route::post('/admin/profile/edit', array('uses'=> 'ViewController@updateProfile', 'as' => 'updateProfile'));
	
	Route::get('/admin/create', array('uses' => 'UserController@adminCreate', 'as' => 'adminCreate'));
	Route::post('/admin/create', array('uses' => 'UserController@adminStore', 'as' => 'adminStore'));

	Route::get('/admin/view/teacher', array('uses' => 'UserController@viewTeacher', 'as' => 'viewTeacher'));
	Route::get('/admin/create/teacher', array('uses' => 'UserController@teacherCreate', 'as' => 'teacherCreate'));
	Route::post('/admin/create/teacher', array('uses' => 'UserController@teacherStore', 'as' => 'teacherStore'));	

	Route::get('/admin/view/section', array('uses' => 'UserController@viewSection', 'as' => 'viewSection'));
	Route::get('/admin/view/subject', array('uses' => 'UserController@viewSubject', 'as' => 'viewSubject'));
	Route::get('/admin/view/room', array('uses' => 'UserController@viewRoom', 'as' => 'viewRoom'));

	Route::get('/admin/create/section', array('uses' => 'AdminController@sectionCreate', 'as' => 'sectionCreate'));
	Route::post('/admin/create/section', array('uses' => 'AdminController@sectionStore', 'as' => 'sectionStore'));
	Route::get('/admin/create/section/existing', array('uses' => 'AdminController@sectionExisting', 'as' => 'sectionExisting'));
	Route::post('/admin/create/section/existing', array('uses' => 'AdminController@sectionExistingStore', 'as' => 'sectionExistingStore'));

	Route::get('/admin/create/subject', array('uses' => 'AdminController@subjectCreate', 'as' => 'subjectCreate'));
	Route::post('/admin/create/subject', array('uses' => 'AdminController@subjectStore', 'as' => 'subjectStore'));

	Route::get('/admin/create/subject/existing', array('uses' => 'AdminController@subjectExisting', 'as' => 'subjectExisting'));
	Route::post('/admin/create/subject/existing', array('uses' => 'AdminController@subjectExistingStore', 'as' => 'subjectExistingStore'));
	Route::get('/admin/create/subject/room/existing', array('uses' => 'AdminController@roomExisting', 'as' => 'roomExisting'));
	Route::post('/admin/create/subject/room/existing', array('uses' => 'AdminController@roomExistingStore', 'as' => 'roomExistingStore'));

	Route::get('/admin/create/room', array('uses' => 'AdminController@roomCreate', 'as' => 'roomCreate'));
	Route::post('/admin/create/room', array('uses' => 'AdminController@roomStore', 'as' => 'roomStore'));

	//STUDENT
	Route::get('/student/index', array('uses' => 'ViewController@index', 'as' => 'student.index'));
	Route::get('/student/profile', array('uses'=> 'ViewController@viewProfiled', 'as' => 'viewProfiled'));
	Route::get('/student/profile/edit', array('uses'=> 'ViewController@getUpdateProfiled', 'as' => 'getUpdateProfiled')); 
	Route::post('/student/profile/edit', array('uses'=> 'ViewController@updateProfiled', 'as' => 'updateProfiled'));
	Route::get('/student/view/attendance', array('uses' => 'ViewController@viewstudentAttendance', 'as' => 'viewstudentAttendance'));
	Route::get('/student/view/sections', array('uses' => 'ViewController@viewSectionforStudent', 'as' => 'viewSectionforStudent'));
	Route::get('/student/view/subjects', array('uses' => 'ViewController@viewSubjectforStudent', 'as' => 'viewSubjectforStudent'));
	Route::get('/student/view/rooms', array('uses' => 'ViewController@viewRoomforStudent', 'as' => 'viewRoomforStudent'));
	Route::get('/student/view/teachers', array('uses' => 'ViewController@viewTeacherforStudent', 'as' => 'viewTeacherforStudent'));
	Route::get('/student/view/all_student', array('uses' => 'ViewController@viewAllStudent', 'as' => 'viewAllStudent'));

	//Teacher

	//Route::get('teacher/index', array('uses' => 'TeacherController@index', 'as' => 'teacherIndex'));
	Route::get('/teacher/index', array('uses' => 'TeacherController@index', 'as' => 'teacher.index'));

	Route::get('/teacher/profile', array('uses'=> 'ViewController@viewProfiles', 'as' => 'viewProfiles'));
	Route::get('/teacher/profile/edit', array('uses'=> 'ViewController@getUpdateProfiles', 'as' => 'getUpdateProfiles')); 
	Route::post('/teacher/profile/edit', array('uses'=> 'ViewController@updateProfiles', 'as' => 'updateProfiles'));
	
	Route::get('/teacher/record/attendance', array('uses' => 'UserController@viewStudent', 'as' => 'viewStudent'));

	Route::post('/teacher/view/attendance', array('uses' => 'AttendanceController@postCreateAttendance', 'as' => 'postCreateAttendance'));


	Route::post('/teacher/view/attendance/recorded', array('uses' => 'AttendanceController@postCreateAttendance', 'as' => 'postCreateAttendance'));
	Route::post('/teacher/record/attendance/student', array('uses' => 'AttendanceController@recordAttendance', 'as' => 'recordAttendance'));

	Route::get('/teacher/view/attendance/record', array('uses' => 'AttendanceController@viewAttendance', 'as' => 'viewAttendance'));
	Route::post('/teacher/view/attendance/record', array('uses' => 'AttendanceController@viewAttendanceRecorded', 'as' => 'viewAttendanceRecorded'));

	

	Route::get('/teacher/view/section_assigned', array('uses' => 'TeacherController@viewSectionAssigned', 'as' => 'viewSectionAssigned'));
	Route::get('/teacher/view/subject_assigned', array('uses' => 'TeacherController@viewSubjectAssigned', 'as' => 'viewSubjectAssigned'));
	Route::get('/teacher/view/student_assigned', array('uses' => 'TeacherController@viewStudentAssigned', 'as' => 'viewStudentAssigned'));
	Route::get('/teacher/view/room_assigned', array('uses' => 'TeacherController@viewRoomAssigned', 'as' => 'viewRoomAssigned'));
	Route::get('/teacher/view/all', array('uses' => 'TeacherController@viewAll', 'as' => 'viewAll'));
	
		//VIEW

	
});


Route::group(array('before' => 'guest'), function()
{	
	Route::get('/user/create', array('uses' => 'UserController@getCreate', 'as' => 'getCreate'));
	Route::get('/user/login', array('uses' => 'UserController@getLogin', 'as' => 'getLogin'));
	Route::get('/user/about', array('uses' => 'UserController@getAbout', 'as' => 'getAbout'));
	Route::get('/user/contact', array('uses' => 'UserController@getContact', 'as' => 'getContact'));




	
	
	Route::group(array('before' => 'csrf'), function()
	{
		Route::post('/user/create', array('uses' => 'UserController@postCreate', 'as' => 'postCreate'));
		Route::post('/user/login', array('uses' => 'UserController@postLogin', 'as' => 'postLogin'));
	});
});

