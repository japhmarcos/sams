@extends('layouts.teachermaster')

@section('head')
    @parent
    <title>View All</title>
@stop

@yield('sidebar')
@stop

@section('content')


 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            View All
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ URL::route('teacher.index') }}"><i class="fa fa-dashboard"></i> Teacher Dashboard</a></li>
            <li class="active">View All</li>
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
		  
        <th>Subject Code and Description</th>
        <th>Section Name</th>
        <th>Room Number</th>
        <th>Room Type</th>
        <th>Time</th>
        
	


            </tr>
        </thead>

        <tbody>
            @foreach ($all as $all)
                <tr>
		 	 
          <td>{{ $all->code }} {{ $all->name }}</td>
          <td> {{ $all->section_name }}</td>
		   <td> {{ $all->room_number }}</td>
      <td> {{ $all->room_type }}</td>
      <td> {{ $all->start_time }} - {{ $all->end_time }}</td>
     

				
				
              @endforeach

                </tr>
          {{ HTML::script('js/bootstrap.js'); }}
              
        </tbody>
      
    </table>
            </div><!-- /.box-body -->
            

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      






@stop