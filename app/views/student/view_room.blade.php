@extends('layouts.studentmaster')
@section('head')

@parent
	<title>View Rooms</title>
@stop

@section('content')

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
              View Rooms
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{URL::route('student.index')}}"><i class="fa fa-dashboard"></i> Student Dashboard</a></li>
            <li class="active">View Rooms</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Rooms Assigned</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
            

@if ($room->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
    <th>Room Number</th>
        <th>Room Type</th>
        

    
    
  


            </tr>
        </thead>

        <tbody>
            @foreach ($room as $room)
                <tr>
       <td>{{ $room->room_number }}</td> 
          <td>{{ $room->room_type }}</td>
      
       
        
      
        
        
              @endforeach

                </tr>
          {{ HTML::script('js/bootstrap.js'); }}
              
        </tbody>
      
    </table>

@else
<br>
   <b> There are no rooms </b>
@endif
            </div><!-- /.box-body -->
           
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->



@stop