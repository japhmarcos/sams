@extends('layouts.homemaster')

@section('head')
	@parent
	<title>Home Page</title>
@stop

@section('content')
	@if(Session::has('success'))
		<div class="alert alert-success">{{ Session::get('success') }}</div>
	@elseif (Session::has('fail'))
		<div class="alert alert-success">{{ Session::get('fail') }}</div>
	@endif
	

<nav class="menu" id="theMenu">
    <div class="menu-wrap">
      <h1 class="logo"><a href="{{ URL:: route('home')}}">S.A.M.S</a></h1>
      <i class="icon-remove menu-close"></i>
      <a href="#home" class="smoothScroll">Home</a>
      <!--<a href="#services" class="smoothScroll">Services</a>-->
      <!--<a href="#portfolio" class="smoothScroll">Portfolio</a>-->
      <a href="#about" class="smoothScroll">About</a>
      <!--<a href="#contact" class="smoothScroll">Contact</a>-->
      <a href="{{ URL:: route('getCreate')}}" class="smoothScroll">Register</a>
      <a href="{{ URL:: route('getLogin')}}" class = "smoothScroll">Login</a>
      <!--<a href="#"><i class="icon-facebook"></i></a>
      <a href="#"><i class="icon-twitter"></i></a>
      <a href="#"><i class="icon-dribbble"></i></a>
      <a href="#"><i class="icon-envelope"></i></a>-->
    </div>
    
    <!-- Menu button -->
    <div id="menuToggle"><i class="icon-reorder"></i></div>
  </nav>


 <section id="home" name="home"></section>
  <div id="headerwrap">
    <div class="container">
      <br>
      <h1><b>S.A.M.S</b></h1>
      <h2>Student Attendance Monitoring System</h2>
      <div class="row">
        <br>
        <br>
        <br>
        <div class="col-lg-6 col-lg-offset-3">
        </div>
      </div>
    </div><!-- /container -->
  </div><!-- /headerwrap -->

<section id="about" name="about"></section>
  <div id="g">
    <div class="container">
      <div class="row">
        <h3>ABOUT US</h3>
        <br>
        <br>
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
        <p>The school has a comprehensive Student Attendance Monitoring policy. 
	 Alongside this is a central Student Attendance Monitoring System(SAMS) that
	 has been designed to assist departments in the collection, 
	 storage and analysis of attendance monitoring data relating to students.
	
	The process of taking and managing students' attendance has encountered problems for both teachers and students. 
	For teachers, losing the attendance record/sheet is one big problem. For students, unable to keep track of absences is also a big problem.

	We've decided to create  a project that is a web based system that will help the teachers’ by recording and managing students’ attendances and will also help students by letting them view their attendance record. 
	It will also be available as a mobile app in the android device.
			</p>
        <br>
        <br>
        </div>
        
        <br>
        <br>

       <div class="col-lg-3 team">
          <img class="img-circle" src="assets/img/dante.jpg" height="90" width="90">
          <h4>Bryan Anthony Aclan</h4>
          <h5><i>Project Manager</i></h5>
         
          
        </div>

        <div class="col-lg-3 team">
          <img class="img-circle" src="assets/img/vergil.jpg" height="90" width="90">
          <h4>Virgil Joseph Cruz</h4>
          <h5><i>Web Developer</i></h5>
          
          
        </div>

        <div class="col-lg-3 team">
          <img class="img-circle" src="assets/img/agnus.jpg" height="90" width="90">
          <h4>Nicson Nicolas</h4>
          <h5><i>Mobile Developer</i></h5>
         
         
        </div>

        <div class="col-lg-3 team">
          <img class="img-circle" src="assets/img/allan.jpg" height="90" width="90">
          <h4>Mr. Allan Bruce Cotecson</h4>
          <h5><i>Project Adviser</i></h5>
          
          
        </div>
      
      </div>
    </div><!-- /container -->
  </div><!-- /g -->
 







@stop

