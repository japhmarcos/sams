@extends('layouts.studentmaster')
@section('head')

@parent
	<title>View Attendance</title>
@stop

@section('content')

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            View Attendance
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{URL::route('student.index')}}"><i class="fa fa-dashboard"></i> Student Dashboard</a></li>
            <li class="active">View Attendance</li>
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
           <table class="table table-striped table-bordered">
        <thead>
            <tr>
		<th>ID</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Section</th>
        <th>Subject</th>
        <th>Status</th>
        <th>Comments</th>        
        <th>Recorded by</th>
         <th>Date Recorded</th>
	


            </tr>
        </thead>

        <tbody>
            @foreach ($users as $users)
                <tr>
		   <td>{{ $users->id	}}</td>	
          <td>{{ $users->student_firstname }}</td>
          <td>{{ $users->student_lastname }}</td>	
           <td>{{ $users->section_name }}</td> 
              <td>{{ $users->subject_name }}</td> 
          <td>{{ $users->status }}</td> 
          <td>{{ $users->comment }}</td> 
          <td>{{ $users->teacher_firstname }} {{ $users->teacher_lastname }}  </td> 
          <td> {{ $users->created_at->format('Y-m-d') }}</td>
			
				
				
              @endforeach

                </tr>
          {{ HTML::script('js/bootstrap.js'); }}
              
        </tbody>
      
    </table>
            </div><!-- /.box-body -->
           
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->



@stop