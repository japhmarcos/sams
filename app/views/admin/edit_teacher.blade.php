@extends('layouts.master')

@section('head')
	@parent
	<title>Manage Users</title>
@stop

		

@section('content')

 <div class ="container">
	<h1>Edit {{$teacher->firstname}}</h1>




	{{ Form::open(array('method' => 'put', 'action' => array('AdminController@updateTeacher', $teacher->id))) }}


	


        
       <div class="form-group{{ ($errors->has('username')) ? ' has-error' : '' }}">
			<label for="username">Username: </label> 
			<input id="username" name="username" type="text" class="form-control">
			@if($errors->has('username'))
			{{ $errors->first('username') }}
			@endif
			
	</div>
        
      	<div class="form-group{{ ($errors->has('firstname')) ? ' has-error' : '' }}">
			<label for="firstname">Firstname: </label>
			<input id="firstname" name="firstname" type="text" class="form-control">
			
				@if($errors->has('firstname'))
			{{ $errors->first('firstname') }}
			@endif
			
			</div>
	
	<div class="form-group{{ ($errors->has('lastname')) ? ' has-error' : '' }}">
			<label for="lastname">Lastname: </label>
			<input id="lastname" name="lastname" type="text" class="form-control">
	
					@if($errors->has('lastname'))
			{{ $errors->first('lastname') }}
			@endif
	</div>	
			
	<div class="form-group{{ ($errors->has('middlename')) ? ' has-error' : '' }}">
			<label for="middlename">Middlename: </label>
			<input id="middlename" name="middlename" type="text" class="form-control">
	
					@if($errors->has('middlename'))
			{{ $errors->first('middlename') }}
			@endif
	</div>	
	
	
	
	<div class="form-group{{ ($errors->has('address')) ? ' has-error' : '' }}">
			<label for="address">Address: </label>
			<input id="address" name="address" type="text" class="form-control">
	
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
			<label for="contact">Contact No: </label>
			<input id="contact" name="contact" type="text" class="form-control">
	
					@if($errors->has('contact'))
			{{ $errors->first('contact') }}
			@endif
	</div>	
	
		<div class="form-group">
			<label for="email">Email: </label>
			<input id="email" name="email" type="text" class="form-control">
	
		</div>	

		 {{ Form::token() }}


       	<div class="form-group">
		<input type="submit" value="Update User" class="btn btn-default">
	</form>
	</div>
        @if ($errors->any())
        	<ul>
        		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
        	</ul>
        @endif
</div>
        @stop