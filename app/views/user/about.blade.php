@extends('layouts.homemaster')

@section('head')
	@parent
	<title>About Us</title>
@stop

@section('content')
	<div class ="container">
	<h1>About Us</h1>
	
	<h2>Description</h2>
	The School has a comprehensive Student Attendance Monitoring policy 
	 Alongside this a central Student Attendance Monitoring System(SAMS) 
	 has been designed to assist departments in the collection, 
	 storage and analysis of attendance monitoring data relating to students.
	
	The process of taking and managing students' attendance has encountered problems for both teachers and students. 
	For teachers, losing the attendance record/sheet is one big problem. For students, unable to keep track of absences is also a big problem.

	We've decided to create a project that is a web based system that will help the teachers’ by recording and managing students’ attendances and will also help students by letting them view their attendance record. 
	It will also be available as a mobile app in the android device.
			
	
	{{ Form::token() }}
	
@stop

