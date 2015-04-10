<?php 

class UserController extends BaseController
{
	// gets view for register page
	public function getCreate()
	{
		return View::make('user.register');
	}
	//gets the view for login page 
	public function getLogin()
	{
		return View::make('user.login');
	}
	
	//Logout
	public function getLogout()
	{
	 Auth::logout();
    return Redirect::route('getLogout');
	}
	
	public function getAbout()
	{
		return View::make('user.about');
	}
	
	public function getContact()
	{
		return View::make('user.contact');
	}
	

	//For ADMIN

	//VIEW
	public function viewUser()
	{
		


      $users = User::all();
		//load view and pass users
		return View::make('admin.view')
			->with('users', $users);
	
		
	}

	public function viewSection()
	{
	

	
    $sections = Section1::orderBy('name','ASC')->groupBy('name')->get();;
	

	
	
		//load view and pass users	
		return View::make('admin.view_section')
			->with('sections', $sections);
	
		
	}
	
	public function viewSubject()
	{
	

	
    $subject = Subject1::orderBy('code','ASC')->groupBy('code','name')->get();
	

	
	
		//load view and pass users	
		return View::make('admin.view_subject')
			->with('subject', $subject);
	
		
	}
	
	public function viewRoom()
		{


			$room = Room::orderBy('number','ASC')->groupBy('number')->get();

		return View::make('admin.view_room')
			->with('room', $room);
	

		}
	
	


	public function viewTeacher()
	{
		$teacher = Teacher::all();
		//load view and pass users
		return View::make('admin.view_teacher')
		->with('teacher', $teacher);


	}

	//For Teacher
	public function viewStudent()
	{
	



	

	$sections = Subject1::where('teacher_id', '=',  Auth::user()->id)->lists('section_name','section_name');
			$subject = Subject1::where('teacher_id', '=',  Auth::user()->id)->lists('code','code');


				return View::make('teacher.viewattendance', compact('sections', 'subject'));

		
	}

	//Create and Store
	public function adminCreate()
	{

		return View::make('admin.create');
	}


	public function teacherCreate()
	{

		return View::make('admin.create_teacher');

	}

	public function adminStore()
	{

		$admin = Input::get('isAdmin');
		$teacher = Input::get('isTeacher');

		if ($admin == 1 and $teacher == 1) {

				
				   $alert = Session::flash('message', 'ERROR!');
           return View::make('admin.create')
           					->with('alert',$alert);


		}

		$validate = Validator::make(Input::all(), array(
			'username' => 'required|unique:users|min:4',
			'pass1' => 'required|min:6',
			'pass2' => 'required|same:pass1',
			'firstname' => 'required',
			'lastname' => 'required',
			'middlename' => 'required',
			'address' => 'required',
			'birthday' => 'required',
			'contact' => 'required|numeric',
			'email' => 'required',
			'isAdmin' => 'boolean',
			'isTeacher' => 'boolean'

		));
		
		
		if ($validate->fails())
		{
			return Redirect::route('adminCreate')->withErrors($validate)->withInput();
		}
		else
		{
			
			$user = new User();
			$user->username = Input::get('username');
			$user->password = Hash::make(Input::get('pass1'));
			$user->firstname = Input::get('firstname');
			$user->lastname = Input::get('lastname');
			$user->middlename = Input::get('middlename');
			$user->address = Input::get('address');
			$user->birthday = Input::get('birthday');
			$user->contact = Input::get('contact');
			$user->email = Input::get('email');
			$user->isAdmin = Input::get('isAdmin');
			$user->isTeacher = Input::get('isTeacher');
			if($user->save())
			{
				return Redirect::route('viewUser')->with('success', 'Success!! User has been registered to the system!');
			}
		else
		{
			return Redirect::route('viewUser')->with('fail', 'An error occured while creating the user. Please double check your inputs and try again.');
		}
		}
	}




	//TEACHER CREATE

	public function teacherStore()
	{

		$validate = Validator::make(Input::all(), array(
			'username' => 'required|unique:users|min:4',
			'pass1' => 'required|min:6',
			'pass2' => 'required|same:pass1',
			'firstname' => 'required',
			'lastname' => 'required',
			'middlename' => 'required',
			'address' => 'required',
			'birthday' => 'required',
			'contact' => 'required|numeric',
			'email' => 'required'
		));
		
		
		if ($validate->fails())
		{
			return Redirect::route('teacherCreate')->withErrors($validate)->withInput();
		}
		else
		{
			
			$user = new Teacher();
			$user->username = Input::get('username');
			$user->password = Hash::make(Input::get('pass1'));
			$user->firstname = Input::get('firstname');
			$user->lastname = Input::get('lastname');
			$user->middlename = Input::get('middlename');
			$user->address = Input::get('address');
			$user->birthday = Input::get('birthday');
			$user->contact = Input::get('contact');
			$user->email = Input::get('email');
			if($user->save())
			{
				return Redirect::route('viewTeacher')->with('success', 'Success!! User has been registered to the system!');
			}
		else
		{
			return Redirect::route('viewTeacher')->with('fail', 'An error occured while creating the user. Please double check your inputs and try again.');
		}
		}
	}


	//REGISTRATION

	public function postCreate()
	{
		$validate = Validator::make(Input::all(), array(
			'username' => 'required|unique:users|min:4',
			'pass1' => 'required|min:6',
			'pass2' => 'required|same:pass1',
			'firstname' => 'required',
			'lastname' => 'required',
			'middlename' => 'required',
			'address' => 'required',
			'birthday' => 'required',
			'contact' => 'required|numeric',
			'email' => 'required'
		));
		
		
		if ($validate->fails())
		{
			return Redirect::route('getCreate')->withErrors($validate)->withInput();
		}
		else
		{
			
			$user = new User();
			$user->username = Input::get('username');
			$user->password = Hash::make(Input::get('pass1'));
			$user->firstname = Input::get('firstname');
			$user->lastname = Input::get('lastname');
			$user->middlename = Input::get('middlename');
			$user->address = Input::get('address');
			$user->birthday = Input::get('birthday');
			$user->contact = Input::get('contact');
			$user->email = Input::get('email');

			if($user->save())
			{
				return Redirect::route('home')->with('success', 'You have been registered to the system! Welcome to SAMS!');
			}
		else
		{
			return Redirect::route('home')->with('fail', 'An error occured while creating the user. Please double check your inputs and try again.');
		}
		}
	}
	
	//LOGIN

	public function postLogin()
	{
		$validator =  Validator::make(Input::all(), array(
			'username' => 'required',
			'pass1' => 'required'
		
		));
		if($validator->fails())
		{
			return Redirect::route('getLogin')->withErrors($validator)->withInput();
		}
		else
		{
			$remember = (Input::has('remember')) ? true : false;
			$username = Input::get('username');
			$password = Input::get('pass1');

			if(Auth::attempt(['username' => $username, 'password' => $password, 'isTeacher' => 0, 'isAdmin' => 1]))
			{
				return Redirect::route('admin.index');				
			}

			elseif(Auth::attempt(['username' => $username, 'password' => $password, 'isTeacher' => 1, 'isAdmin' => 0]))
			{
				return Redirect::route('teacher.index');				
			}
			
			elseif(Auth::attempt(['username' => $username, 'password' => $password, 'isTeacher' => 0, 'isAdmin' => 0]))
			{
				return Redirect::route('student.index');				
			}
			else
			{
				return Redirect::route('getLogin');
			}
		}
	}
}