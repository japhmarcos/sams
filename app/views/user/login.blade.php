@extends('layouts.homemaster')

@section('head')
	@parent
	<title>Login</title>
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
      <a href="{{ URL:: route('home')}}" class="smoothScroll">Home</a>
      <!--<a href="#services" class="smoothScroll">Services</a>-->
      <!--<a href="#portfolio" class="smoothScroll">Portfolio</a>-->
      <a href="#about" class="smoothScroll">About</a>
      <a href="#contact" class="smoothScroll">Contact</a>
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
   <br>
   <br>
   <br>
   <br>
   <div class="container">
		<div class="login-logo">
        <a href="#"><b>S.A.M.S</b></a>
      </div><!-- /.login-logo -->
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login</h3>
                    </div>
                    <div class="panel-body">
                      <form role="form" method="post" action="{{ URL::route('postLogin') }}">
                            <fieldset>
                                
                            		<p class="text-muted text-center"><b>
            						  Enter your username and password
           							</b></p>

                                 <div class="form-group{{ ($errors->has('username')) ? ' has-error' : '' }}">
                                  
                                    <input id="username" name="username" type="text" placeholder="Username"
                                    class="form-control top">
											@if($errors->has('username'))
											{{ $errors->first('username') }}
											@endif
								</div>      
                                
		
     
								<div class="form-group{{ ($errors->has('pass1')) ? ' has-error' : '' }}">
                                 
                                    <input id="pass1" name="pass1" type="password" placeholder="Password"class="form-control bottom">
										@if($errors->has('pass1'))
										{{ $errors->first('pass1') }}
										@endif
                                </div>

                                <div class="checkbox">
										<label for="remember">
										<input type="checkbox" name="remember" id="remember" >
										Remember Me
										</label>
								</div>
									{{ Form::token() }}

									<div class="form-group">
										<center>
                                	 <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button></center>	
                                	</div>
                                	<a href="{{ URL::route('getCreate') }}" class="text-center">Register a new account</a>
                                </div>
            				</fieldset>
            		</form>
            	</div>
            </div>
        </div>
    </div>

  </div><!-- /headerwrap -->

	
@stop

