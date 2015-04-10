@extends('layouts.teachermaster')

@section('head')
    @parent
    <title>View Students Assigned</title>
@stop

@yield('sidebar')
@stop

@section('content')


 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            View Students Assigned
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ URL::route('teacher.index') }}"><i class="fa fa-dashboard"></i> Teacher Dashboard</a></li>
            <li class="active">View Students Assigned</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
            <h3 class="box-title">Students Assigned</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
               <table class="table table-striped table-bordered">
        <thead>
            <tr>
		  
        <th>Student Name</th>
        <th>Section Name</th>
        
	


            </tr>
        </thead>

        <tbody>
            @foreach ($student as $student)
                <tr>
		 	 
          <td>{{ $student->student_firstname }} {{ $student->student_lastname }}</td>
          <td> {{ $student->section_name }}</td>
		   
     

				
				
              @endforeach

                </tr>
          {{ HTML::script('js/bootstrap.js'); }}
              
        </tbody>
      
    </table>
            </div><!-- /.box-body -->
            

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      






@stop