<?php

class AttendanceController extends BaseController

{


public function getCreateAttendance()
	{

		return View::make('teacher.view');




	}		


	public function recordAttendance()
		{

			//$users = Subject1::where('teacher_id', '=', Auth::user()->id)->where('section_id', '=', Input::get('section_id'))->where('id', '=', Input::get('subject_id'))->get(array('student_firstname', 'student_lastname','student_id','section_id','section_name'));

			$users = Subject1::where('teacher_id', '=', Auth::user()->id)->where('section_name', 'like', Input::get('section_name'))->where('code', 'like', Input::get('subject_code'))->groupBy('student_id')->get(array('student_firstname', 'student_lastname','student_id','section_id','section_name'));
			$section = Input::get('section_name');
			$subject = Input::get('subject_code');

			$student =  Subject1::select(DB::raw('concat (student_firstname, " ",student_lastname) as fullname,id'))->where('section_name', 'like', Input::get('section_name'))->where('teacher_id', '=', Auth::user()->id)->where('code', 'like',Input::get('subject_code'))->lists('fullname','fullname');

			return View::make('teacher.recordattendance')
						->with('users', $users)
						->with('section',$section)
						->with('student', $student)
						->with('subject', $subject);

	
		}


	public function viewAttendance()
	{

		$sections = Subject1::where('teacher_id', '=',  Auth::user()->id)->lists('section_name','section_name');
		$subject = Subject1::where('teacher_id', '=',  Auth::user()->id)->lists('code','code');
		//->where('section_name', 'like', Input::get('section_name'))->where('name', 'like', Input::get('subject_name'))->get(array('student_firstname', 'student_lastname','student_id','section_id','section_name','subject_id','subject_name'));

		return View::make('teacher.viewattendancerecorded', compact('sections','subject'));
					

	}


	public function viewAttendanceRecorded()
	{
		$student = Attendances::where('teacher_id', '=', Auth::user()->id)->where('subject_code', 'like', Input::get('subject_code'))->where('section_name', 'like', Input::get('section_name'))->get();

		$subject = Input::get('subject_code');
		$section =  Input::get('section_name');


		return View::make('teacher.recordedattendance')
				->with('subject',$subject)
				->with('section',$section)
				->with('student',$student);




	}



public function postCreateAttendance()
	{

	if(Input::has('submit1'))
				{
		$validate = Validator::make(Input::all(), array(
			'status' => 'required'
		));
		
		
		if ($validate->fails())
		{
			return Redirect::route('viewStudent')->withErrors($validate)->withInput();
		}
		else
		{
	
		  	//foreach(Subject1::where('teacher_id', '=', Auth::user()->id)->where('code', 'like', Input::get('subject_code'))->where('section_name', 'like', Input::get('section_name'))->groupBy('student_id')->get() as $student) {
            	//$section_name = Subject1::where('teacher_id', '=', Auth::user()->id)->where('student_id', '=', Input::get('student_id'))->where('code', 'like', Input::get('subject_code'))->pluck('section_name');

            				//$user = User::find(DB::raw('concat (firstname, " ",lastname)'), 'like', Input::get('student_name'));


				
            	$attendance_record = Attendances::where('date_recorded', '>=', Input::get('date'))->where(DB::raw('concat (student_firstname, " ",student_lastname)'), 'like', Input::get('student_name'))->where('section_name', 'like', Input::get('section_name'))->where('teacher_id', '=', Auth::user()->id)->where('subject_code', 'like', Input::get('subject_code'))->first(); 	
            			
            			if($attendance_record)
            			{


            			$user = Attendances::where('date_recorded', '>=',  Input::get('date'))->where(DB::raw('concat (student_firstname, " ",student_lastname)'), 'like', Input::get('student_name'))->where('section_name', 'like', Input::get('section_name'))->where('teacher_id', '=', Auth::user()->id)->where('subject_code', 'like', Input::get('subject_code'))->first();



            				
              

              	$student_id  = User::where(DB::raw('concat (firstname, " ",lastname)'), 'like', Input::get('student_name'))->pluck('id') ;
              	$student_firstname = User::where(DB::raw('concat (firstname, " ",lastname)'), 'like', Input::get('student_name'))->pluck('firstname');
              	$student_lastname = User::where(DB::raw('concat (firstname, " ",lastname)'), 'like', Input::get('student_name'))->pluck('lastname');

              	$section_id = Section1::where('name', 'like', Input::get('section_name'))->where(DB::raw('concat (student_firstname, " ",student_lastname)'), 'like', Input::get('student_name'))->pluck('id');
              

              	$subject_id = Subject1::where('teacher_id', '=', Auth::user()->id)->where('code', 'like', Input::get('subject_code'))->where('section_name', 'like', Input::get('section_name'))->where(DB::raw('concat (student_firstname, " ",student_lastname)'), 'like', Input::get('student_name'))->pluck('id');
              	$subject_code = Subject1::where('teacher_id', '=', Auth::user()->id)->where('code', 'like', Input::get('subject_code'))->where('section_name', 'like', Input::get('section_name'))->where(DB::raw('concat (student_firstname, " ",student_lastname)'), 'like', Input::get('student_name'))->pluck('code');
              	$subject_name = Subject1::where('teacher_id', '=', Auth::user()->id)->where('code', 'like', Input::get('subject_code'))->where('section_name', 'like', Input::get('section_name'))->where(DB::raw('concat (student_firstname, " ",student_lastname)'), 'like', Input::get('student_name'))->pluck('name');


                    $user->status =  Input::get('status');
                    $user->comment = Input::get('comment');
                   $user->student_id = $student_id;
                    $user->student_firstname = $student_firstname;
                    $user->student_lastname = $student_lastname;
                    $user->teacher_id = Auth::user()->id;
                    $user->teacher_firstname = Auth::user()->firstname;
                    $user->teacher_lastname = Auth::user()->lastname;
                    $user->section_id = $section_id;
                    $user->section_name = Input::get('section_name');
                    $user->subject_id = $subject_id;
                    $user->subject_code = $subject_code;
                    $user->subject_name = $subject_name;
                    $user->date_recorded = Input::get('date');
                    $user->save();
            			}


            			else
            			{
              	$student =  Subject1::select(DB::raw('concat (student_firstname, " ",student_lastname) as fullname,id'))->where('section_name', 'like', Input::get('section_name'))->where('teacher_id', '=', Auth::user()->id)->where('code', 'like',Input::get('subject_code'));
              

              	$student_id  = User::where(DB::raw('concat (firstname, " ",lastname)'), 'like', Input::get('student_name'))->pluck('id') ;
              	$student_firstname = User::where(DB::raw('concat (firstname, " ",lastname)'), 'like', Input::get('student_name'))->pluck('firstname');
              	$student_lastname = User::where(DB::raw('concat (firstname, " ",lastname)'), 'like', Input::get('student_name'))->pluck('lastname');

             $section_id1 = Section1::where('name', 'like', Input::get('section_name'))->where(DB::raw('concat (student_firstname, " ",student_lastname)'), 'like', Input::get('student_name'))->pluck('id');
              

              	$subject_id = Subject1::where('teacher_id', '=', Auth::user()->id)->where('code', 'like', Input::get('subject_code'))->where('section_name', 'like', Input::get('section_name'))->where(DB::raw('concat (student_firstname, " ",student_lastname)'), 'like', Input::get('student_name'))->pluck('id');
              	$subject_code = Subject1::where('teacher_id', '=', Auth::user()->id)->where('code', 'like', Input::get('subject_code'))->where('section_name', 'like', Input::get('section_name'))->where(DB::raw('concat (student_firstname, " ",student_lastname)'), 'like', Input::get('student_name'))->pluck('code');
              	$subject_name = Subject1::where('teacher_id', '=', Auth::user()->id)->where('code', 'like', Input::get('subject_code'))->where('section_name', 'like', Input::get('section_name'))->where(DB::raw('concat (student_firstname, " ",student_lastname)'), 'like', Input::get('student_name'))->pluck('name');



              	    $attendance = new Attendances();
                    $attendance->status = Input::get('status');
                    $attendance->comment = Input::get('comment');
                   $attendance->student_id = $student_id;
                    $attendance->student_firstname = $student_firstname;
                    $attendance->student_lastname = $student_lastname;
                    $attendance->teacher_id = Auth::user()->id;
                    $attendance->teacher_firstname = Auth::user()->firstname;
                    $attendance->teacher_lastname = Auth::user()->lastname;
                    $attendance->section_id = $section_id1;
                    $attendance->section_name = Input::get('section_name');
                    $attendance->subject_id = $subject_id;
                    $attendance->subject_code = $subject_code;
                    $attendance->subject_name = $subject_name;
                    $attendance->date_recorded = Input::get('date');
                    $attendance->save();

                




}



               
                

                
          
     
     }
     return Redirect::route('viewStudent')->with('success', 'ATTENDANCE HAS BEEN RECORDED!');
}

   
   		if (Input::has('submit2'))
   		{

   			foreach(Subject::where('teacher_id', '=', Auth::user()->id)->where('code', 'like', Input::get('subject_code'))->where('section_name', 'like', Input::get('section_name'))->get() as $students){


				$section_id = Section1::where('name', 'like', Input::get('section_name'))->pluck('id');
				$subject_id = Subject1::where('teacher_id', '=', Auth::user()->id)->where('code', 'like', Input::get('subject_code'))->where('section_name', 'like', Input::get('section_name'))->pluck('id');	
				$subject_code = Subject1::where('teacher_id', '=', Auth::user()->id)->where('code', 'like', Input::get('subject_code'))->where('section_name', 'like', Input::get('section_name'))->pluck('code');
				$subject_name = Subject1::where('teacher_id', '=', Auth::user()->id)->where('code', 'like', Input::get('subject_code'))->where('section_name', 'like', Input::get('section_name'))->pluck('name');							
			
				$date = date('Y-m-d');
  					$attendancepresent = new Attendances();
                    $attendancepresent->status =  'present';
                    $attendancepresent->comment = Input::get('comment');
                   	$attendancepresent->student_id = $students->student_id;
                    $attendancepresent->student_firstname = $students->student_firstname;
                    $attendancepresent->student_lastname = $students->student_lastname;
                    $attendancepresent->teacher_id = Auth::user()->id;
                    $attendancepresent->teacher_firstname = Auth::user()->firstname;
                    $attendancepresent->teacher_lastname = Auth::user()->lastname;
                    $attendancepresent->section_id = $section_id;
                    $attendancepresent->section_name = Input::get('section_name');
                    $attendancepresent->subject_id = $subject_id;
                    $attendancepresent->subject_code = $subject_code;
                    $attendancepresent->subject_name = $subject_name;
                    $attendancepresent->date_recorded = $date;
                    $attendancepresent->save();




	}
	 return Redirect::route('viewStudent')->with('success', 'ATTENDANCE HAS BEEN RECORDED!');


   		}

   	}
}

		/*public function postCreateAttendance()
	{
		$validate = Validator::make(Input::all(), array(
			'status' => 'required'
		));
		
		
		if ($validate->fails())
		{
			return Redirect::route('viewStudent')->withErrors($validate)->withInput();
		}
		else
		{


				
		  	//foreach(Subject1::where('teacher_id', '=', Auth::user()->id)->where('code', 'like', Input::get('subject_code'))->where('section_name', 'like', Input::get('section_name'))->groupBy('student_id')->get() as $student) {
            	//$section_name = Subject1::where('teacher_id', '=', Auth::user()->id)->where('student_id', '=', Input::get('student_id'))->where('code', 'like', Input::get('subject_code'))->pluck('section_name');

            				//$user = User::find(DB::raw('concat (firstname, " ",lastname)'), 'like', Input::get('student_name'));

            	$attendance_record = Attendances::where('created_at', '>=', date('Y-m-d'))->where(DB::raw('concat (student_firstname, " ",student_lastname)'), 'like', Input::get('student_name'))->where('section_name', 'like', Input::get('section_name'))->where('teacher_id', '=', Auth::user()->id)->where('subject_code', 'like', Input::get('subject_code'))->first(); 	
            			
            			if($attendance_record)
            			{


            			$user = Attendances::where('created_at', '>=', date('Y-m-d'))->where(DB::raw('concat (student_firstname, " ",student_lastname)'), 'like', Input::get('student_name'))->where('section_name', 'like', Input::get('section_name'))->where('teacher_id', '=', Auth::user()->id)->where('subject_code', 'like', Input::get('subject_code'))->first();



            				
              

              	$student_id  = User::where(DB::raw('concat (firstname, " ",lastname)'), 'like', Input::get('student_name'))->pluck('id') ;
              	$student_firstname = User::where(DB::raw('concat (firstname, " ",lastname)'), 'like', Input::get('student_name'))->pluck('firstname');
              	$student_lastname = User::where(DB::raw('concat (firstname, " ",lastname)'), 'like', Input::get('student_name'))->pluck('lastname');

              	$section_id = Section1::where('name', 'like', Input::get('section_name'))->where(DB::raw('concat (student_firstname, " ",student_lastname)'), 'like', Input::get('student_name'))->pluck('id');
              

              	$subject_id = Subject1::where('teacher_id', '=', Auth::user()->id)->where('code', 'like', Input::get('subject_code'))->where('section_name', 'like', Input::get('section_name'))->where(DB::raw('concat (student_firstname, " ",student_lastname)'), 'like', Input::get('student_name'))->pluck('id');
              	$subject_code = Subject1::where('teacher_id', '=', Auth::user()->id)->where('code', 'like', Input::get('subject_code'))->where('section_name', 'like', Input::get('section_name'))->where(DB::raw('concat (student_firstname, " ",student_lastname)'), 'like', Input::get('student_name'))->pluck('code');
              	$subject_name = Subject1::where('teacher_id', '=', Auth::user()->id)->where('code', 'like', Input::get('subject_code'))->where('section_name', 'like', Input::get('section_name'))->where(DB::raw('concat (student_firstname, " ",student_lastname)'), 'like', Input::get('student_name'))->pluck('name');


                    $user->status =  Input::get('status');
                    $user->comment = Input::get('comment');
                   $user->student_id = $student_id;
                    $user->student_firstname = $student_firstname;
                    $user->student_lastname = $student_lastname;
                    $user->teacher_id = Auth::user()->id;
                    $user->teacher_firstname = Auth::user()->firstname;
                    $user->teacher_lastname = Auth::user()->lastname;
                    $user->section_id = $section_id;
                    $user->section_name = Input::get('section_name');
                    $user->subject_id = $subject_id;
                    $user->subject_code = $subject_code;
                    $user->subject_name = $subject_name;
                    $user->save();
            			}


            			else
            			{
              	$student =  Subject1::select(DB::raw('concat (student_firstname, " ",student_lastname) as fullname,id'))->where('section_name', 'like', Input::get('section_name'))->where('teacher_id', '=', Auth::user()->id)->where('code', 'like',Input::get('subject_code'));
              

              	$student_id  = User::where(DB::raw('concat (firstname, " ",lastname)'), 'like', Input::get('student_name'))->pluck('id') ;
              	$student_firstname = User::where(DB::raw('concat (firstname, " ",lastname)'), 'like', Input::get('student_name'))->pluck('firstname');
              	$student_lastname = User::where(DB::raw('concat (firstname, " ",lastname)'), 'like', Input::get('student_name'))->pluck('lastname');

             $section_id1 = Section1::where('name', 'like', Input::get('section_name'))->where(DB::raw('concat (student_firstname, " ",student_lastname)'), 'like', Input::get('student_name'))->pluck('id');
              

              	$subject_id = Subject1::where('teacher_id', '=', Auth::user()->id)->where('code', 'like', Input::get('subject_code'))->where('section_name', 'like', Input::get('section_name'))->where(DB::raw('concat (student_firstname, " ",student_lastname)'), 'like', Input::get('student_name'))->pluck('id');
              	$subject_code = Subject1::where('teacher_id', '=', Auth::user()->id)->where('code', 'like', Input::get('subject_code'))->where('section_name', 'like', Input::get('section_name'))->where(DB::raw('concat (student_firstname, " ",student_lastname)'), 'like', Input::get('student_name'))->pluck('code');
              	$subject_name = Subject1::where('teacher_id', '=', Auth::user()->id)->where('code', 'like', Input::get('subject_code'))->where('section_name', 'like', Input::get('section_name'))->where(DB::raw('concat (student_firstname, " ",student_lastname)'), 'like', Input::get('student_name'))->pluck('name');



              	    $attendance = new Attendances();
                    $attendance->status =  Input::get('status');
                    $attendance->comment = Input::get('comment');
                   $attendance->student_id = $student_id;
                    $attendance->student_firstname = $student_firstname;
                    $attendance->student_lastname = $student_lastname;
                    $attendance->teacher_id = Auth::user()->id;
                    $attendance->teacher_firstname = Auth::user()->firstname;
                    $attendance->teacher_lastname = Auth::user()->lastname;
                    $attendance->section_id = $section_id1;
                    $attendance->section_name = Input::get('section_name');
                    $attendance->subject_id = $subject_id;
                    $attendance->subject_code = $subject_code;
                    $attendance->subject_name = $subject_name;
                    $attendance->save();




}



               
                

                
          
     
     }
     return Redirect::route('viewStudent')->with('success', 'ATTENDANCE HAS BEEN RECORDED!');
}
}


/*$attendance->student_firstname = Input::get('dsad');
			$attendance->student_lastname = Input::get('dfsafsa');
			$attendance->teacher_firstname = Input::get('23rrges');
			$attendance->teacher_lastname = Input::get('fsdsd');*/

			/*if($attendance->save())
			{
				return Redirect::route('viewStudent')->with('success', 'ATTENDANCE HAS BEEN RECORDED!');
			}
		else
		{
			return Redirect::route('viewStudent')->with('fail', 'An error occured while creating the attendance.');
		}*/
		

			


	


	
	
	
		


			/*$attendance->student_firstname = Input::get('dsad');
			$attendance->student_lastname = Input::get('dfsafsa');
			$attendance->teacher_firstname = Input::get('23rrges');
			$attendance->teacher_lastname = Input::get('fsdsd');*/

			/*if($attendance->save())
			{
				return Redirect::route('viewStudent')->with('success', 'ATTENDANCE HAS BEEN RECORDED!');
			}
		else
		{
			return Redirect::route('viewStudent')->with('fail', 'An error occured while creating the attendance.');
		}*/
