@extends('layouts.master')

@section('head')
	@parent
	<title>Manage Users</title>
@stop

@yield('sidebar')		

@section('content')

 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Edit {{$users->firstname}} {{$users->middlename}} {{$users->lastname}}</h1>

          <ol class="breadcrumb">
            <li><a href="{{ URL::route('admin.index') }}"><i class="fa fa-dashboard"></i> Admin Dashboard</a></li>
            <li><a href="{{ URL::route('viewUser') }}">Manage Users </a></li>
            <li class="active">Edit Users</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
            {{ Form::open(array('method' => 'put', 'action' => array('AdminController@updateUser', $users->id))) }}

	
	<div class="form-group{{ ($errors->has('lastname')) ? ' has-error' : '' }}">
			<label for="lastname">Last Name: </label>
			<input id="lastname" name="lastname" type="text" placeholder = "{{$users->lastname}}"class="form-control">
	
					@if($errors->has('lastname'))
			{{ $errors->first('lastname') }}
			@endif
	</div>	
			
		<div class="form-group{{ ($errors->has('firstname')) ? ' has-error' : '' }}">
			<label for="firstname">First Name: </label>
			<input id="firstname" name="firstname" type="text" placeholder = "{{$users->firstname}}" class="form-control">
			
				@if($errors->has('firstname'))
			{{ $errors->first('firstname') }}
			@endif
			
			</div>

	<div class="form-group{{ ($errors->has('middlename')) ? ' has-error' : '' }}">
			<label for="middlename">Middle Name: </label>
			<input id="middlename" name="middlename" type="text" placeholder = "{{$users->middlename}}"class="form-control">
	
					@if($errors->has('middlename'))
			{{ $errors->first('middlename') }}
			@endif
	</div>	
		
		
			<div class="form-group">
			<label form="isAdmin">Admin(Choose 0 or 1 only): </label>
			<input id="isAdmin" name="isAdmin" type="number" placeholder = "{{$users->isAdmin}}"min="0" max="1" class="form-control">
	
		</div>	

		<div class="form-group" >
			<label form="isTeacher">Teacher(Choose 0 or 1 only): </label>
			<input id="isTeacher" name="isTeacher" type="number" placeholder = "{{$users->isTeacher}}"min="0" max="1" class="form-control">
	
		</div>	

		 {{ Form::token() }}


       	<div class="form-group">
		<input type="submit" value="Update User" class="btn btn-primary">
	</form>
	</div>
        @if ($errors->any())
        	<ul>
        		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
        	</ul>
        @endif

            
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
        @stop