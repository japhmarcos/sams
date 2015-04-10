<?php

class TeacherController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users =  Subject1::where('teacher_id','=', Auth::user()->id)->groupBy('name')->count();
		//$sections = Section1::count();
		$sections = Subject1::select(DB::raw('count(section_id)'))->where('teacher_id','=', Auth::user()->id)->groupBy('id')->count();
		$subject = Subject1::select(DB::raw('count(id)'))->where('teacher_id','=', Auth::user()->id)->groupBy('id')->count();
		$room = Subject1::select(DB::raw('count(room_id)'))->where('teacher_id','=', Auth::user()->id)->groupBy('id')->count();

		return View::make('teacher.index')
		->with('users', $users)
		->with('sections', $sections)
		->with('room', $room)
		->with('subject', $subject);

		return View::make('teacher.index');
	}



	//ASSIGNED SECTIONS


public function viewSectionAssigned()
	{

//Subject1::where('teacher_id', '=' , Auth::user()->id)->lists('section_name')

		$subject = Subject1::where('teacher_id', '=' , Auth::user()->id)->groupBy('section_name')->get(array('section_name','section_id'));

		

			return View::make('teacher.view_sectionassigned')
			->with('subject', $subject);
	}


	public function viewSubjectAssigned()
	{

		$subject = Subject1::where('teacher_id', '=' , Auth::user()->id)->groupBy('name')->get(array('name', 'code','id','start_time','end_time', 'info'));

		

			return View::make('teacher.view_subjectassigned')
			->with('subject', $subject);
	}

	public function viewStudentAssigned()
	{

		$student = Subject1::where('teacher_id', '=' , Auth::user()->id)->groupBy('student_id')->get(array('student_firstname','student_lastname','student_id','section_name'));

		

			return View::make('teacher.view_studentassigned')
			->with('student', $student);
	}

	public function viewRoomAssigned()
	{

		$room = Subject1::where('teacher_id', '=' , Auth::user()->id)->groupBy('room_id')->get(array('room_number','room_type'));

		

			return View::make('teacher.view_roomassigned')
			->with('room', $room);
	}

	public function viewAll(){

		$all = Subject1::where('teacher_id', '=' , Auth::user()->id)->groupBy('code')->get(array('code','name','start_time','end_time','section_name','section_id','room_number','room_type'));



			return View::make('teacher.view_all')
			->with('all', $all);


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
