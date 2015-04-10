@extends('layouts.master')

@section('head')
	@parent
	<title>Manage Subject</title>
@stop

			{{ HTML::style('css/bootstrap.css'); }}


@yield('sidebar')

@section('content')

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage Subjects
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ URL::route('admin.index') }}"><i class="fa fa-dashboard"></i> Admin Dashboard</a></li>
            <li><a href="{{ URL::route('viewSubject') }}">Manage Subjects</a></li>
            <li class="active">View Rooms and Sections</li>
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
             @if(Session::has('message'))
            <div class="alert alert-success">
              {{ Session::get('message') }}
            </div>
            @endif
            @if ($room->count())

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
       <th>ID</th>
       <th>Room number</th>
       <th>Room type</th>
       <th>Section Assigned</th>
       <th>Time</th>
   
            </tr>
        </thead>

        <tbody>
            @foreach ($room as $room)
                <tr>
          <td>{{ $room->room_id  }}</td> 
           <td>{{ $room->room_number  }}</td> 
            <td>{{ $room->room_type  }}</td> 
             <td>{{ $room->section_name  }}</td> 
             <td>{{ $room->start_time}} - {{ $room->end_time}}</td>

        
        
              @endforeach

                </tr>
          {{ HTML::script('js/bootstrap.js'); }}
              
        </tbody>
      
    </table>


@else
    There are no students
@endif

            </div><!-- /.box-body -->
            
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

@stop

@stop