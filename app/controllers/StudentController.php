<?php

class StudentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//To get all students

		$sections = Section1::select(DB::raw('count(id)'))->where('student_id','=', Auth::user()->id)->count();
		$subject = Subject1::select(DB::raw('count(id)'))->where('student_id','=', Auth::user()->id)->count();
		$teacher = Subject1::select(DB::raw('count(id)'))->where('student_id','=', Auth::user()->id)->groupBy('id')->count();


		return View::make('student.index')
		->with('sections',$sections)
		->with('subject',$subject);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('student.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$input = Input::all();
		$validation = Validator::make($input, Student::$rules);

		if ($validation->passes())
		{
			Student::create($input);

			return Redirect::route('student.index')
			->with('message', 'You have registered successfully.');

		}

		return Redirect::route('student.create')
		->withInput()
		->withErrors($validation)
		->with('message', 'An error occured while registering an account.');

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

	public function viewStudent()
	{
		


      $student = Student::all();
		//load view and pass users
		return View::make('teacher.view')
			->with('student', $student);
	
		
	}

	public function recordAttendance()

	{
		$input = Input::all();
		$validation = Validator::make($input, Student::$rules);

		if ($validation->passes())
		{
			Student::create($input);

			return Redirect::route('student.index')
			->with('message', 'You have registered successfully.');

		}

		return Redirect::route('student.create')
		->withInput()
		->withErrors($validation)
		->with('message', 'An error occured while registering an account.');
		
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
