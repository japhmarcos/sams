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
            Record Attendance
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ URL::route('teacher.index') }}"><i class="fa fa-dashboard"></i> Teacher Dashboard</a></li>
            <li><a href="{{ URL::route('viewStudent') }}">Choose a Section and Subject</a></li>
            <li class="active">Record Attendance</li>
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

 <form role="form" method="post" action="{{ URL::route('postCreateAttendance') }}">
          <div class="form-group">

  {{ Form::label('section_name', 'Section:') }}
       {{ Form::text('section_name', $section, ['readonly']) }}
</div>

 <div class="form-group">
   {{ Form::label('subject_code', 'Subject:') }}
        {{ Form::text('subject_code', $subject, ['readonly']) }}
</div>

<div class="form-group">
  {{ Form::label('student_name', 'Choose a Student:') }}
          {{ Form::select('student_name', $student, null) }}
  </div>


            <div class="form-group">
            <label for="date">Choose a Date: </label>
            <input id="date" name="date" type="date"  value="<?php echo date('Y-m-d'); ?>" class="form-control">
    
        </div>  
            

<div class="form-group">
  <label for="date">Choose the Status: </label>
                    <select class="form-control" name="status">
    <option value="">Select...</option>
   <option value="present">Present</option>
   <option value="absent">Absent</option>
   <option value="late">Late</option>
   <option value="others">Others</option>
   </select>
   </div>   





            <div class="form-group">
            <label for="comment">Comments: </label>
            <input id="comment" name="comment" type="text" class="form-control">
    
        </div>  
            
                
       

                </tr>
          
                   {{ HTML::script('js/bootstrap.js'); }}
        </tbody>
      
    </table>



    <center>
    <div class="form-group">
        <input type="submit" name = "submit1" value="Save Changes" class="btn btn-default">
        <input type="submit" name = "submit2" value="All Present" class="btn btn-default">

        
    
  
    </center>
    </form>
    </div>

            </div><!-- /.box-body -->
            

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      



@stop  