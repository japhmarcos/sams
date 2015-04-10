@extends('layouts.teachermaster')

@section('head')
    @parent
    <title>Record Attendance</title>
@stop

@yield('sidebar')
@stop

@section('content')
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Choose a Section and Subject
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ URL::route('teacher.index') }}"><i class="fa fa-dashboard"></i> Teacher Dashboard</a></li>
            <li class="active">Choose a Section and Subject</li>
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
            @if(Session::has('success'))
            <div class="alert alert-success">
              {{ Session::get('success') }}
            </div>
            @endif
            
              <form role="form" method="post" action="{{ URL::route('recordAttendance') }}">



     <div class="form-group">
	{{ Form::label('section_name', 'Choose a Section:') }}
        	{{ Form::select('section_name', $sections, null) }}
	</div>
	



     <div class="form-group">
	{{ Form::label('subject_code', 'Choose a Subject:') }}
        	{{ Form::select('subject_code', $subject, null) }}
	</div>
	
		
  {{ Form::token() }}
		
		<div class="form-group">
		<input type="submit" value="View Students and Start Recording Attendance" class="btn btn-primary">
	</form>
	</div>
        @if ($errors->any())
        	<ul>
        		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
        	</ul>
        @endif
</div>
            </div><!-- /.box-body -->
            

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      







@stop