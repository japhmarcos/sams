@extends('layouts.master')

@section('head')
	@parent
	<title>Create Room</title>
@stop


@yield('sidebar')

@section('content')

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Create Room
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ URL::route('admin.index') }}"><i class="fa fa-dashboard"></i> Admin Dashboard</a></li>
            <li><a href="{{ URL::route('viewRoom') }}">Manage Rooms</a></li>
            <li class="active">Add Room</li>
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
              <div class="box-body">
             <form role="form" method="post" action="{{ URL::route('roomStore') }}">

 <div class="form-group{{ ($errors->has('number')) ? ' has-error' : '' }}">
      <label for="number">Room Number: </label> 
      <input id="number" name="number" type="text" class="form-control">
      @if($errors->has('number'))
      {{ $errors->first('number') }}
      @endif
      
  </div>


    <div class="form-group{{ ($errors->has('type')) ? ' has-error' : '' }}">
      <label for="type">Room Type: </label> 
      <input id="type" name="type" type="text" class="form-control">
      @if($errors->has('type'))
      {{ $errors->first('type') }}
      @endif
      
  </div>
  
    
  {{ Form::token() }}
    
    <div class="form-group">
    <input type="submit" value="Create New Room" class="btn btn-primary">
  </form>
  </div>
        @if ($errors->any())
          <ul>
            {{ implode('', $errors->all('<li class="error">:message</li>')) }}
          </ul>
        @endif
            </div><!-- /.box-body -->
           

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->



        @stop
