@extends('layouts.master')

@section('head')
	@parent
	<title>Manage Rooms</title>
@stop

			{{ HTML::style('css/bootstrap.css'); }}

@yield('sidebar')

@section('content')

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          Manage Rooms
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ URL::route('admin.index') }}"><i class="fa fa-dashboard"></i> Admin Dashboard</a></li>
            <li><a href="#">Manage Rooms</a></li>
            <li class="active">Room List</li>
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
        <th>Room name</th>
       <th>Room Type</th>
       <th>Actions</th>
   
            </tr>
        </thead>

        <tbody>
            @foreach ($room as $room)
                <tr>
       <td>{{ $room->id  }}</td>  
           <td>{{ $room->number }}</td> 
           <td>{{ $room->type }}</td> 
       
             <td> {{ link_to_action('AdminController@getUpdateRoom', 'Edit Room', array($room->id),
            array('class' => 'btn btn-info')) }}
         {{ link_to_action('AdminController@deleteRoom', 'Delete Room', array($room->id),
 array('class' => 'btn btn-danger')) }}</td>
        
        
              @endforeach

                </tr>
          {{ HTML::script('js/bootstrap.js'); }}
              
        </tbody>
      
    </table>


@else
    There are no rooms created
@endif
            </div><!-- /.box-body -->
           
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

@stop

@stop