@extends('layouts.master')

@section('head')
	@parent
	<title>Manage Subjects</title>
@stop

@yield('sidebar')
@stop		

@section('content')
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          	<h1>Edit {{$subject->name}}</h1>
          <ol class="breadcrumb">
            <li><a href="{{ URL::route('admin.index') }}"><i class="fa fa-dashboard"></i> Admin Dashboard</a></li>
            <li><a href="{{ URL::route('viewSubject') }}">Manage Subjects</a></li>
            <li class="active">Edit Subject</li>
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
             {{ Form::open(array('method' => 'put', 'action' => array('AdminController@updateSubject', $subject->id))) }}


	

        
       

       <div class="form-group{{ ($errors->has('name')) ? ' has-error' : '' }}">
			<label for="name">Subject Name: </label> 
			<input id="Name" name="name" type="text" placeholder = " {{$subject->name}}"class="form-control">
			@if($errors->has('name'))
			{{ $errors->first('name') }}
			@endif
			
	</div>
    
		 {{ Form::token() }}


       	<div class="form-group">
		<input type="submit" value="Update Subject" class="btn btn-primary">
	</form>
	</div>
        @if ($errors->any())
        	<ul>
        		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
        	</ul>
        @endif
            </div><!-- /.box-body -->
           
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

        @stop