<?php

class AdminController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{


		$users =  User::count();
		$sections = Section1::groupBy('id')->count();
		$subject = Subject1::groupBy('id')->count();
		$room = Room::groupBy('id')->count();

		
		return View::make('admin.index')
		->with('users', $users)
		->with('sections', $sections)
		->with('subject', $subject)
		->with('room', $room);
	}


	public function getAdmin()
	{
		return View::make('user.admin');
	}

	//EDIT USER

	public function getUpdateUser($id)
	{

		$users = User::find($id);

		//load view and pass users
		return View::make('admin.edit')
		->with('users', $users);

	}

	


	public function getUpdateTeacher($id)
	{

		$teacher = Teacher::find($id);
		//load view and pass users
		return View::make('admin.edit_teacher')
		->with('teacher', $teacher);
	}

	public function deleteUser($id)
	{
		$users = User::find($id);
		$users->delete();

		//redirect
		Session::flash('message', 'Successfully deleted user!');
		return Redirect::route('viewUser');

	}

	public function deleteTeacher($id)
	{

		$teacher = Teacher::find($id);
		$teacher->delete();

		//redirect
		Session::flash('message', 'Successfully deleted user!');
		return Redirect::route('viewTeacher');	
	}


	public function updateUser($id)
	{

		$admin = Input::get('isAdmin');
		$teacher = Input::get('isTeacher');

		if ($admin == 1 and $teacher == 1) {

				 $users = User::find($id);
				   $alert = Session::flash('message', 'ERROR!');
           return View::make('admin.edit', compact('users'))
           					->with('alert',$alert);


		}

		$validate = Validator::make(Input::all(), array(
			'firstname' => 'required',
			'lastname' => 'required',
			'middlename' => 'required',
			'isAdmin' => 'boolean',
			'isTeacher' => 'boolean'

		
		));


		  if ($validate->fails()) {
            return Redirect::to('admin.edit')
                ->withErrors($validate)
                ->withInput(Input::except('password'));

             }
             else
             	{

           $user = User::find($id);
          $user->firstname = Input::get('firstname');
			$user->lastname = Input::get('lastname');
			$user->middlename = Input::get('middlename');
			$user->isAdmin = Input::get('isAdmin');
			$user->isTeacher = Input::get('isTeacher');
			if($user->save())

				{
				return Redirect::route('viewUser')->with('success', 'Successfully updated user!');
			}
		else
		{
			return Redirect::route('viewUser')->with('fail', 'An error occured while updating the user. Please double check your inputs and try again.');
             	}
			}
	}

	
	

	public function updateTeacher($id)
	{

		$validate = Validator::make(Input::all(), array(
			'firstname' => 'required',
			'lastname' => 'required',
			'middlename' => 'required',
			'address' => 'required',
			'birthday' => 'required',
			'contact' => 'numeric',
		
		));


		  if ($validate->fails()) {
            return Redirect::to('admin.edit_teacher')
                ->withErrors($validate)
                ->withInput(Input::except('password'));

             }
             else
             	{

           $user = Teacher::find($id);
          $user->firstname = Input::get('firstname');
			$user->lastname = Input::get('lastname');
			$user->middlename = Input::get('middlename');
			$user->address = Input::get('address');
			$user->birthday = Input::get('birthday');
			$user->contact = Input::get('contact');
			$user->email = Input::get('email');
			if($user->save())

				{
				return Redirect::route('viewTeacher')->with('success', 'TEACHER HAS BEEN UPDATED');
			}
		else
		{
			return Redirect::route('viewTeacher')->with('fail', 'An error occured while updating the user. Please double check your inputs and try again.');
             	}
			}
	}


	public function sectionCreate()
	{


			//$teacher = User::where('isTeacher', '1')->where('isAdmin', '0')->lists('firstname', 'id');
	//$user = User::where('isTeacher', '0')->where('isAdmin', '0')->lists('firstname', 'id');,


		$users = [];

		$users = User::select(DB::raw('concat (firstname, " ",lastname) as fullname,id'))->where('isTeacher', '0')->where('isAdmin', '0')->lists('fullname','id');
		//$users = User::where('isTeacher', '0')->where('isAdmin', '0')->lists('firstname','id');


		return View::make('admin.create_section', compact('users'));
		

	}

	public function sectionStore()
	{
		$validate = Validator::make(Input::all(), array(
		'name' => 'required|unique:sections'

		));
		
		
		if ($validate->fails())
		{
			return Redirect::route('sectionCreate')->withErrors($validate)->withInput();
		}
		else
		{


           foreach(User::where('id', '=',  Input::get('student_id'))->get() as $student) 
          // 	foreach(User::where('firstname', '=',  Input::get('teacher_name'))->get() as $teacher)
           
          
        

              $student_id =  Input::get('student_id');
            
      

         
            


         //  	$student = User::where('isTeacher', '0')->where('isAdmin', '0')->get();
          // $teacher = User::where('isTeacher', '1')->where('isAdmin', '0')->get();
           		
			$section = new Section1();
			$section->name = Input::get('name');
			$section->student_id = $student_id;
           $section->student_firstname =$student->firstname;
           $section->student_lastname = $student->lastname;
          
			//$section->users_id = Auth::user()->id;
          
         

		
			if($section->save())
			{
				return Redirect::route('viewSection')->with('success', 'Success!! Section has been added to the system');
			}
		else
		{
			return Redirect::route('viewSection')->with('fail', 'An error occured while creating the section. Please double check your inputs and try again.');
			}
		}
	}

	public function subjectCreate()
	{

				$users = [];
				$users1 = [];
				$sections = [];



			
			
			$users1 = User::select(DB::raw('concat (firstname, " ",lastname) as fullname,id'))->where('isTeacher', '1')->where('isAdmin', '0')->lists('fullname','id');
			//foreach(User::where('isTeacher', '0')->where('isAdmin', '0')->get() as $user):
			//foreach(User::where('isTeacher', '1')->where('isAdmin', '0')->get() as $user1)
			//foreach(Section1::lists('name') as $section)
			//$users = User::select(DB::raw('concat (firstname, " ",lastname) as fullname,id'))->where('isTeacher', '0')->where('isAdmin', '0')->lists('fullname','id');

				$sections = Section1::lists('name','name');
				$room = Room::lists('number','number');
			//$sections[$section->name]=$section->name;



		return View::make('admin.create_subject', compact('users1','sections', 'room'));

		

	}



	public function subjectStore()
	{

		$validate = Validator::make(Input::all(), array(
		'code' => 'unique:subject',
		'name' => 'required',
		'starttime' => 'required',
		'endtime' => 'required'

		));
		
		
		if ($validate->fails())
		{
			return Redirect::route('subjectCreate')->withErrors($validate)->withInput();
		}
		else
		{




 			 //foreach(User::where('firstname', '=',  Input::get('student_name'))->get() as $student)
          // 	foreach(User::where('firstname', '=',  Input::get('teacher_name'))->get() as $teacher)
           	//foreach(Section1::where('name', '=',  Input::get('section_name'))->get() as $section)
           
           
          foreach(Section1::where('name', 'like',  Input::get('section_name'))->get() as $section) {
    foreach(User::where('id', '=', Input::get('teacher_id'))->get() as $teacher) {
  foreach(Room::where('number', 'like', Input::get('room_name'))->get() as $room)  {

    	//$teacher = User::where('id', '=', Input::get('teacher_id'))->get();

        $teacher_id = Input::get('teacher_id');

        $subject = new Subject1();
        $subject->code = Input::get('code');
        $subject->name = Input::get('name');
        $subject->info = Input::get('info');
         $subject->start_time = Input::get('starttime');
         $subject->end_time = Input::get('endtime');
        $subject->student_id = $section->student_id;   
        $subject->student_firstname = $section->student_firstname;  
        $subject->student_lastname = $section->student_lastname;  
        $subject->teacher_id = $teacher_id;
        $subject->teacher_firstname = $teacher->firstname;  
        $subject->teacher_lastname = $teacher->lastname;
        $subject->section_id = $section->id;
        $subject->section_name = $section->name;
        $subject->room_id = $room->id;
        $subject->room_type = $room->type;
        $subject->room_number = $room->number;
        $subject->save();



    
   
       }
   }
}
                

                
          
     return Redirect::route('viewSubject')->with('success', 'Success!! Subject has been added to the system!');
     }
}


public function roomCreate()
	{

	return View::make('admin.create_room');


	}


public function roomStore()
	{

		$validate = Validator::make(Input::all(), array(
		'number' => 'required|numeric|unique:room'
		

		));
		
		
		if ($validate->fails())
		{
			return Redirect::route('roomCreate')->withErrors($validate)->withInput();
		}
		else
		{



        $subject = new Room();
        $subject->number = Input::get('number');
        $subject->type = Input::get('type');
    
        $subject->save();

         }

      
     return Redirect::route('viewRoom')->with('success', 'Room HAS BEEN ADDED!');
	}




	public function sectionExisting()
	{

		$users = User::select(DB::raw('concat (firstname, " ",lastname) as fullname,id'))->where('isTeacher', '0')->where('isAdmin', '0')->lists('fullname','id');

				$sections = Section1::lists('name','id');






				return View::make('admin.create_sectionexisting', compact('users','sections'));


	}



	public function sectionExistingStore()
	{





		 foreach(Section1::where('id', '=',  Input::get('section_id'))->get() as $sections)
          	
             foreach(User::where('id',  '=',  Input::get('student_id'))->get() as $student) 


             $student_id = Input::get('student_id');

       

         	 $section = new Section1();
			$section->name = $sections->name;
			$section->student_id = $student_id;
			$section->student_firstname =$student->firstname;
           $section->student_lastname =$student->lastname;




			if($section->save())
			{
				return Redirect::route('sectionExisting')->with('success', 'Success!! Student has been added to the Section');
			}
		else
		{
			return Redirect::route('sectionExisting')->with('fail', 'An error occured while creating the section. Please double check your inputs and try again.');
		}
		



	}
	

public function roomExisting()
	{

		$room = Room::lists('number','number');
		$section = Section1::lists('name','name');
		//$subject = Subject1::select(DB::raw('concat (code, " ",name) as subject,id'))->lists('subject','subject');
		$subject = Subject1::lists('code','code');

		$subject_name = Subject1::lists('name','name');
		$users = User::select(DB::raw('concat (firstname, " ",lastname) as fullname,id'))->where('isTeacher', '1')->where('isAdmin', '0')->lists('fullname','id');
		


		return View::make('admin.create_roomexisting', compact('room','subject','section', 'users','subject_name'));

	}

	public function roomExistingStore()
	{

		$validate = Validator::make(Input::all(), array(
		'starttime' => 'required',
		'endtime' => 'required'

		));
		
		
		if ($validate->fails())
		{

			return Redirect::route('roomExisting')->withErrors($validate)->withInput();
		}
		else
		{

		foreach(Section1::where('name', 'like',  Input::get('section_name'))->get() as $section) {
  
   

    	$subject_name = Subject1::where('code','=', Input::get('subject_code'))->pluck('name');

        $teacher_id = Input::get('teacher_id');
        $teacher_firstname = User::where('id', '=', Input::get('teacher_id'))->pluck('firstname');
        $teacher_lastname = User::where('id', '=', Input::get('teacher_id'))->pluck('lastname');


        $room_type = Room::where('number', '=', Input::get('room_number'))->pluck('type');
        $room_id = Room::where('number', '=', Input::get('room_number'))->pluck('id');


        $subjects = new Subject1();
       $subjects->code =  Input::get('subject_code');
      $subjects->name = $subject_name;
         $subjects->start_time = Input::get('starttime');
         $subjects->end_time = Input::get('endtime');
        $subjects->student_id = $section->student_id;   
        $subjects->student_firstname = $section->student_firstname;  
        $subjects->student_lastname = $section->student_lastname;  
        $subjects->teacher_id =  $teacher_id;
        $subjects->teacher_firstname = $teacher_firstname;  
        $subjects->teacher_lastname =  $teacher_lastname;
        $subjects->section_id = $section->id;
        $subjects->section_name = $section->name;
        $subjects->room_id = $room_id;
        $subjects->room_type = $room_type;
        $subjects->room_number = Input::get('room_number');
      $subjects->save();

  
}

      


  

                
          
     return Redirect::route('viewSubject')->with('success', 'Successfully assigned room!');
     }
}



	public function getUpdateSection($id)
	{


		 $section = Section1::find($id);
		

			return View::make('admin.edit_section')
			->with('section', $section);
	

	}


		public function deleteSection($id)

	{


		$section =  Section1::find($id);
        $section->delete();

        // redirect
        Session::flash('message', 'Successfully deleted section!');
        return Redirect::route('viewSection');

	}

	public function updateSection($id)
	{

		$validate = Validator::make(Input::all(), array(
			'name' => 'required|unique:sections'
			

		
		));


		  if ($validate->fails()) {
          $section = Section1::find($id);
		

			return View::make('admin.edit_section')
			->with('section', $section)
                ->withErrors($validate);

             }

             else
             	{

             $section_name = Section1::where('id','=', $id)->pluck('name');

        //   $section = Section1::where('name', 'like', $section_name)->first();

           foreach( Section1::where('name', 'like', $section_name)->get() as $section){
          $section->name = Input::get('name');
		}
			if($section->save())

				{
				return Redirect::route('viewSection')->with('success', 'Successfully updated section!');
			}
		else
		{
			return Redirect::route('viewSection')->with('fail', 'An error occured while updating the section. Please double check your inputs and try again.');
             	}
		}
	}





	//

	public function getUpdateSubject($id)
	{


		//$user = User::where('isTeacher', '0')->where('isAdmin', '0')->lists('firstname', 'id');

		//$user = User::select(DB::raw('concat (firstname, " ",lastname) as fullname,id'))->where('isTeacher', '0')->where('isAdmin', '0')->lists('fullname','id');
		 
		 $subject = Subject1::find($id);
	

			return View::make('admin.edit_subject')
			->with('subject', $subject);
			//->with('users', $user);
	

	}


		public function deleteSubject($id)

	{


		$section =  Subject1::find($id);
        $section->delete();

        // redirect
        Session::flash('message', 'Successfully deleted subject!');
        return Redirect::route('viewSubject');

	}

	public function updateSubject($id)
	{

		$validate = Validator::make(Input::all(), array(
			'name' => 'required'
			

		
		));


		  if ($validate->fails()) {
            $subject = Subject1::find($id);
			return View::make('admin.edit_subject')
			->with('subject', $subject)
                ->withErrors($validate);
               

             }

             else
             	{

          $section = Subject1::find($id);
          $section->name = Input::get('name');
		  $section->info = Input::get('info');
			if($section->save())

				{
				return Redirect::route('viewSubject')->with('success', 'SUBJECT HAS BEEN UPDATED');
			}
		else
		{
			return Redirect::route('viewSubject')->with('fail', 'An error occured while updating the section. Please double check your inputs and try again.');
             	}
		}
	}	

	

	public function getUpdateRoom($id)
	{

	


	


		 $room = Room::find($id);

			return View::make('admin.edit_room')
				->with('room', $room);
			
		


		
	

	}

public function deleteRoom($id)

	{


		$section =  Room::find($id);
        $section->delete();

        // redirect
        Session::flash('message', 'Successfully deleted room!');
        return Redirect::route('viewRoom');

	}

	public function updateRoom($id)
	{

		$validate = Validator::make(Input::all(), array(
			'number' => 'required'
			

		
		));


		  if ($validate->fails()) {
        	 $room = Room::find($id);

			return View::make('admin.edit_room')
				->with('room', $room)
                ->withErrors($validate);
               

             }

             else
             	{


           $room = Room::find($id);
          $room->number = Input::get('number');
          $room->type = Input::get('type');

       
		
		
			if($room->save())

				{
				return Redirect::route('viewRoom')->with('success', 'ROOM HAS BEEN UPDATED');
			}
		else
		{
			return Redirect::route('viewRoom')->with('fail', 'An error occured while updating the room. Please double check your inputs and try again.');
             	}
		}
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
