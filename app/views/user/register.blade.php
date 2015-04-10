@extends('layouts.homemaster')

@section('head')
	@parent
	<title>Register</title>
@stop

@section('content')

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

	<div class="container">
	<div class="register-logo">
        <a href="#"><b>S.A.M.S</b></a>
      </div><!-- /.login-logo -->
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Register</h3>
                    </div>
                    <div class="panel-body">
                      <form role="form" method="post" action="{{ URL::route('postCreate') }}">
                            <fieldset>
                                 	
                            		<p><center><b>
            						 Register
           							</b></center></p>

                                 	<div class="form-group{{ ($errors->has('username')) ? ' has-error' : '' }}">
										<input id="username" name="username" type="text" placeholder="Username" class="form-control">
										@if($errors->has('username'))
										{{ $errors->first('username') }}
										@endif
										
									</div>
								<div class="form-group{{ ($errors->has('pass1')) ? ' has-error' : '' }}">
										<input id="pass1" name="pass1" type="password" placeholder="Password" class="form-control">
										@if($errors->has('pass1'))
										{{ $errors->first('pass1') }}
										@endif
										
								</div>
								<div class="form-group{{ ($errors->has('pass2')) ? ' has-error' : '' }}">
										<input id="pass2" name="pass2" type="password" placeholder = "Confirm Password" class="form-control">
											@if($errors->has('pass2'))
										{{ $errors->first('pass2') }}
										@endif
								</div>

									<p><center><b>
            						 Details
           							</b></center></p>
								
								<div class="form-group{{ ($errors->has('firstname')) ? ' has-error' : '' }}">
										<input id="firstname" name="firstname" type="text" placeholder = "First Name" class="form-control">
										@if($errors->has('firstname'))
										{{ $errors->first('firstname') }}
										@endif
										
										</div>
								
								<div class="form-group{{ ($errors->has('lastname')) ? ' has-error' : '' }}">
										<input id="lastname" name="lastname" type="text" placeholder="Last Name"class="form-control">
										@if($errors->has('lastname'))
										{{ $errors->first('lastname') }}
										@endif
								</div>	
										
								<div class="form-group{{ ($errors->has('middlename')) ? ' has-error' : '' }}">
										<input id="middlename" name="middlename" type="text" placeholder="Middle Name" class="form-control">
										@if($errors->has('middlename'))
										{{ $errors->first('middlename') }}
										@endif
								</div>	

								<div class="form-group{{ ($errors->has('address')) ? ' has-error' : '' }}">
										<input id="address" name="address" type="text" placeholder="Address" class="form-control">
										@if($errors->has('address'))
										{{ $errors->first('address') }}
										@endif
								</div>	
								
								
								<div class="form-group{{ ($errors->has('birthday')) ? ' has-error' : '' }}">
										<label for="birthday">Birthday: </label>
										<input id="birthday" name="birthday" type="date" class="form-control">
								
										@if($errors->has('birthday'))
										{{ $errors->first('birthday') }}
										@endif
								</div>	
								
									<div class="form-group{{ ($errors->has('contact')) ? ' has-error' : '' }}">
										<input id="contact" name="contact" type="text" placeholder="Contact No." class="form-control">
										@if($errors->has('contact'))
										{{ $errors->first('contact') }}
										@endif
								</div>	
								
									<div class="form-group">
										<input id="email" name="email" type="text" placeholder="E-mail Address" class="form-control">
									</div>	
										
								{{ Form::token() }}
									<div class="form-group">
										<center>
                                	 <button class="btn btn-lg btn-primary btn-block" type="submit" style="background-color: rgb(240, 82, 82)">Submit</button></center>	
                                	</div>
                                	<a href="{{ URL::route('getLogin') }}" class="text-center">Already have an account?</a>
                                	</div>
                                	
                                </div>
            				</fieldset>
            		</form>
            	</div>
            </div>
        </div>
    </div>
</div>
@stop

