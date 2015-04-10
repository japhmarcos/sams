
<?php 

class ViewController extends BaseController
{



public function index()
	{

		$sections = Section1::select(DB::raw('count(id)'))->where('student_id','=', Auth::user()->id)->count();
		$subject = Subject1::select(DB::raw('count(id)'))->where('student_id','=', Auth::user()->id)->count();
		$teacher = Subject1::select(DB::raw('count(teacher_id)'))->groupBy('teacher_id')->where('student_id','=', Auth::user()->id)->count();
		$room = Subject1::select(DB::raw('count(room_id)'))->groupBy('room_id')->where('student_id','=', Auth::user()->id)->count();

		

		
		return View::make('student.index')
		->with('teacher', $teacher)
		->with('sections', $sections)
		->with('subject', $subject)
		->with('room', $room);
		
		}

public function viewstudentAttendance()
	{
	

	$users = Attendances::where('student_id', '=' , Auth::user()->id)->get();

    //$users = Attendances::where('id', '=', Auth::user->id)->get();
  //  $students = Attendances::whereRaw('isTeacher', '0')->where('isAdmin', '0')->where('id', Auth::user()->id);
		//load view and pass users	
		return View::make('student.view')
			->with('users', $users);
			//->with('attendances', $studentCount);
		

		
	}



	

	public function viewSectionforStudent()
	{


		$sections = Section1::where('student_id', '=' , Auth::user()->id)->get(array('name','id'));

		return View::make('student.view_section')
			->with('sections', $sections);

	}

	public function viewSubjectforStudent()
	{

			$subject = Subject1::where('student_id', '=' , Auth::user()->id)->get(array('name','code','id'));

		return View::make('student.view_subject')
			->with('subject', $subject);

		
	}



	public function viewRoomforStudent()
	{


			$room = Subject1::where('student_id', '=' , Auth::user()->id)->groupBy('room_id')->get(array('room_number','room_type'));

		return View::make('student.view_room')
			->with('room', $room);



	}

	public function viewTeacherforStudent()
	{


			$teacher = Subject1::where('student_id', '=' , Auth::user()->id)->groupBy('teacher_id')->get(array('teacher_firstname','teacher_lastname','teacher_id','id','code','name'));

		return View::make('student.view_teacher')
			->with('teacher', $teacher);



	}


		public function viewSectionStudent($id)
	{

		$section = Section1::where('id', '=', $id)->pluck('name');
		$student = Section1::where('name', 'like', $section)->get(array('student_id','student_firstname','student_lastname'));

		//$student = Section1::where('name', 'like', $section)->get(array('student_id','student_firstname','student_lastname'));

		return View::make('admin.view_studentsection')
				->with('student', $student);

	}


	public function viewSubjectStudent($id)
	{

		$subject = Subject1::where('id', '=', $id)->pluck('name');
		$section = Subject1::where('id', '=', $id)->pluck('section_name');
		$student = Subject1::where('name', 'like', $subject)->where('section_name', 'like', $section)->groupBy('student_id')->get(array('student_id','student_firstname','student_lastname'));

		//$student = Section1::where('name', 'like', $section)->get(array('student_id','student_firstname','student_lastname'));

		return View::make('admin.view_studentsubject')
				->with('student', $student);

	}

	public function viewSubjectInfo($id)
	{

		//$info = Subject1::where('id', '=', $id)->pluck('info');
		$subject = Subject1::where('id', '=', $id)->pluck('code');
		$section = Subject1::where('id', '=', $id)->pluck('section_name');
		$info = Subject1::where('code', 'like', $subject)->where('section_name', 'like', $section)->groupBy('code')->get(array('info'));

		return View::make('admin.view_subjectinfo')
				->with('info', $info);
	}

	public function viewSubjectTeacher($id)
	{

		$subject = Subject1::where('id', '=', $id)->pluck('name');
		$section = Subject1::where('id', '=', $id)->pluck('section_name');
		$teacher = Subject1::where('name', 'like', $subject)->where('section_name', 'like', $section)->groupBy('teacher_id')->get(array('teacher_id','teacher_firstname','teacher_lastname'));

		//$student = Section1::where('name', 'like', $section)->get(array('student_id','student_firstname','student_lastname'));

		return View::make('admin.view_teachersubject')
				->with('teacher', $teacher);

	}
	
	public function viewSubjectRoom($id)
	{

		$subject = Subject1::where('id', '=', $id)->pluck('name');
		$section = Subject1::where('id', '=', $id)->pluck('section_name');
		$room = Subject1::where('name', 'like', $subject)->groupBy('room_number')->get(array('room_id','room_number','room_type','section_name','start_time','end_time'));

		//$student = Section1::where('name', 'like', $section)->get(array('student_id','student_firstname','student_lastname'));

		return View::make('admin.view_roomsubject')
				->with('room', $room);

	}


	public function viewAllStudent(){

		$all = Subject1::where('student_id', '=' , Auth::user()->id)->groupBy('code')->get(array('code','name','start_time','end_time','section_name','section_id','teacher_firstname', 'teacher_lastname','room_number','room_type'));



			return View::make('student.view_all')
			->with('all', $all);


}



public function displayUser()

	{

	}

public function viewProfile()
{

	return View::make('admin.view_profile');
}
	


public function getUpdateProfile()
	{

		//load view and pass users
		return View::make('admin.edit_profile');

	}


public function updateProfile()
	{

		$validate = Validator::make(Input::all(), array(
			'firstname' => 'required',
			'lastname' => 'required',
			'middlename' => 'required',
			'address' => 'required',
			'birthday' => 'required',
			'contact' => 'required',
			'email' => 'required'
		
		));


		  if ($validate->fails()) {
            return Redirect::to('admin.edit_profile')
                ->withErrors($validate)
                ->withInput(Input::except('password'));

             }
             else
             	{

           //$user = User::find($id)->where('id', '=', Auth::user()->id()->get());
             	
         	$user = User::where('id', '=', Auth::user()->id)->first();	
          	$user->firstname = Input::get('firstname');
			$user->lastname = Input::get('lastname');
			$user->middlename = Input::get('middlename');
			$user->address = Input::get('address');
			$user->birthday = Input::get('birthday');
			$user->contact = Input::get('contact');
			$user->email = Input::get('email');
			if($user->save())

				{
				return Redirect::route('viewProfile')->with('success', 'USER HAS BEEN UPDATED');
			}
		else
		{
			return Redirect::route('updateProfile')->with('fail', 'An error occured while updating the user. Please double check your inputs and try again.');
             	}
			}
	}

public function viewProfiles()
{

	return View::make('teacher.view_profile');
}
	


public function getUpdateProfiles()
	{

		//load view and pass users
		return View::make('teacher.edit_profile');

	}


public function updateProfiles()
	{

		$validate = Validator::make(Input::all(), array(
			'firstname' => 'required',
			'lastname' => 'required',
			'middlename' => 'required',
			'address' => 'required',
			'birthday' => 'required',
			'contact' => 'required',
			'email' => 'required'
		
		));


		  if ($validate->fails()) {
            return Redirect::to('teacher.edit_profile')
                ->withErrors($validate)
                ->withInput(Input::except('password'));

             }
             else
             	{

           //$user = User::find($id)->where('id', '=', Auth::user()->id()->get());
         	$user = User::where('id', '=', Auth::user()->id)->first();	
          	$user->firstname = Input::get('firstname');
			$user->lastname = Input::get('lastname');
			$user->middlename = Input::get('middlename');
			$user->address = Input::get('address');
			$user->birthday = Input::get('birthday');
			$user->contact = Input::get('contact');
			$user->email = Input::get('email');
			if($user->save())

				{
				return Redirect::route('viewProfiles')->with('success', 'USER HAS BEEN UPDATED');
			}
		else
		{
			return Redirect::route('updateProfiles')->with('fail', 'An error occured while updating the user. Please double check your inputs and try again.');
             	}
			}
	}

public function viewProfiled()
{

	return View::make('student.view_profile');
}
	


public function getUpdateProfiled()
	{

		//load view and pass users
		return View::make('student.edit_profile');

	}


public function updateProfiled()
	{

		$validate = Validator::make(Input::all(), array(
			'firstname' => 'required',
			'lastname' => 'required',
			'middlename' => 'required',
			'address' => 'required',
			'birthday' => 'required',
			'contact' => 'required',
			'email' => 'required'
		
		));


		  if ($validate->fails()) {
            return Redirect::to('student.edit_profile')
                ->withErrors($validate)
                ->withInput(Input::except('password'));

             }
             else
             	{

           //$user = User::find($id)->where('id', '=', Auth::user()->id()->get());
         	$user = User::where('id', '=', Auth::user()->id)->first();	
          	$user->firstname = Input::get('firstname');
			$user->lastname = Input::get('lastname');
			$user->middlename = Input::get('middlename');
			$user->address = Input::get('address');
			$user->birthday = Input::get('birthday');
			$user->contact = Input::get('contact');
			$user->email = Input::get('email');
			if($user->save())

				{
				return Redirect::route('viewProfiled')->with('success', 'USER HAS BEEN UPDATED');
			}
		else
		{
			return Redirect::route('updateProfiled')->with('fail', 'An error occured while updating the user. Please double check your inputs and try again.');
             	}
			}
	}




}