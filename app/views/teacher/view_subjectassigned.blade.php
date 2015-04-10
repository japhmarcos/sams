@extends('layouts.teachermaster')

@section('head')
    @parent
    <title>View Subjects Assigned</title>
@stop

@section('content')

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            View Subjects Assigned
          
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ URL::route('teacher.index') }}"><i class="fa fa-dashboard"></i> Teacher Dashboard</a></li>
            <li class="active">View Subjects Assigned</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
            <h3 class="box-title">Subjects Assigned</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
             <table class="table table-striped table-bordered">
        <thead>
            <tr>
         <th>Subject Code</th>
        <th>Subject Name</th>
        <th>Subject Info</th>
        <th>Time</th>
        
  


            </tr>
        </thead>

        <tbody>
            @foreach ($subject as $subject)
                <tr>
          <td>{{ $subject->code }}</td>
          <td>{{ $subject->name }}</td>
          <td>{{ $subject->info }}</td>
           <td>{{ $subject->start_time }} - {{ $subject->end_time }}</td>
       
     

        
        
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