@extends('layouts.teachermaster')

@section('head')
    @parent
    <title>View Attendance Record</title>
@stop

@yield('sidebar')
@stop

@section('content')

        <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            View Attendance Record
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ URL::route('teacher.index') }}"><i class="fa fa-dashboard"></i> Teacher Dashboard</a></li>
            <li><a href="{{ URL::route('viewAttendance') }}">Choose a Section and Subject</a></li>
            <li class="active">View Attendance Record</li>
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

 <div class="form-group">

  {{ Form::label('section_name', 'Section:') }}
       {{ Form::text('section_name', $section, ['readonly']) }}
</div>

 <div class="form-group">
   {{ Form::label('subject_code', 'Subject Code:') }}
        {{ Form::text('subject_code', $subject, ['readonly']) }}
</div>
 

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
       <th>Student ID</th>
        <th>Student Name</th>
        <th>Section Name</th>
        <th>Status</th>
        <th>Comments</th>
        <th>Date Recorded</th>
        
  


            </tr>
        </thead>

        <tbody>
            @foreach ($student as $student)
                <tr>
        <td>{{ $student->student_id }}</td>
          <td>{{ $student->student_firstname }} {{ $student->student_lastname }}</td>
          <td>{{ $student->section_name }}</td>
          <td>{{ $student->status }}</td>
            <td>{{ $student->comment }}</td>
          <td>  {{ $student->date_recorded }}</td>
           
                
              @endforeach

                </tr>
          
                   {{ HTML::script('js/bootstrap.js'); }}
        </tbody>
      
    </table>

            </div><!-- /.box-body -->
            

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      



@stop  