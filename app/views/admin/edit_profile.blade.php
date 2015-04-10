@extends('layouts.master')

@section('head')
	@parent
	<title>Edit Profile</title>
@stop

@yield('sidebar')		

@section('content')

 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Edit {{Auth::user()->firstname}} {{Auth::user()->lastname}}</h1>

          <ol class="breadcrumb">
            <li><a href="{{URL::route('admin.index')}}"><i class="fa fa-dashboard"></i> Admin Dashboard</a></li>
            <li><a href="{{URL::route('viewProfile')}}">View Profile</a></li>
            <li class="active">Edit Profile</li>
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
           
    	 <form role="form" method="post" action="{{ URL::route('updateProfile') }}">
	

         

      	<div class="form-group{{ ($errors->has('firstname')) ? ' has-error' : '' }}">
			<label for="firstname">Firstname: </label>
			<input id="firstname" name="firstname" type="text" class="form-control" placeholder =  {{ Auth::user()->firstname  }}>
			
			@if($errors->has('firstname'))
			{{ $errors->first('firstname') }}
			@endif
			
			</div>
	
	<div class="form-group{{ ($errors->has('lastname')) ? ' has-error' : '' }}">
			<label for="lastname">Lastname: </label>
			<input id="lastname" name="lastname" type="text" class="form-control" placeholder =  {{ Auth::user()->lastname  }}>
	
					@if($errors->has('lastname'))
			{{ $errors->first('lastname') }}
			@endif
	</div>	
			
	<div class="form-group{{ ($errors->has('middlename')) ? ' has-error' : '' }}">
			<label for="middlename">Middlename: </label>
			<input id="middlename" name="middlename" type="text" class="form-control"placeholder =  {{ Auth::user()->middlename  }}>
	
					@if($errors->has('middlename'))
			{{ $errors->first('middlename') }}
			@endif
	</div>	
	
	
	
	<div class="form-group{{ ($errors->has('address')) ? ' has-error' : '' }}">
			<label for="address">Address: </label>
			<input id="address" name="address" type="text" class="form-control"placeholder =  {{ Auth::user()->address  }}>
	
		@if($errors->has('address'))
			{{ $errors->first('address') }}
			@endif
	</div>	
	
		<div class="form-group{{ ($errors->has('birthday')) ? ' has-error' : '' }}">
			<label for="birthday">Birthday: </label>
			<input id="birthday" name="birthday" type="date" class="form-control"placeholder =  {{ Auth::user()->birthday  }}>
	
					@if($errors->has('birthday'))
			{{ $errors->first('birthday') }}
			@endif
	</div>	
	
		<div class="form-group{{ ($errors->has('contact')) ? ' has-error' : '' }}">
			<label for="contact">Contact No: </label>
			<input id="contact" name="contact" type="text" class="form-control"placeholder =  {{ Auth::user()->contact  }}>
	
					@if($errors->has('contact'))
			{{ $errors->first('contact') }}
			@endif
	</div>	
	
		<div class="form-group">
			<label for="email">Email: </label>
			<input id="email" name="email" type="text" class="form-control" placeholder =  {{ Auth::user()->email  }}>
	
		</div>	
	
		 {{ Form::token() }}


       	<div class="form-group">
		<input type="submit" value="Update Profile" class="btn btn-default">
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