@extends('layouts.master')

@section('head')
	@parent
	<title>Assign Room</title>
@stop


@yield('sidebar')

@section('content')

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Assign Room to an Existing Subject
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ URL::route('admin.index') }}"><i class="fa fa-dashboard"></i> Admin Dashboard</a></li>
            <li><a href="{{ URL::route('viewSubject') }}">Manage Subjects</a></li>
            <li class="active">Assign Room to an Existing Subject</li>
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
            <form role="form" method="post" action="{{ URL::route('roomExistingStore') }}">

  <div class="form-group">
  {{ Form::label('room_number', 'Assign a Existing Room:') }}
          {{ Form::select('room_number', $room, null) }}
  </div>
  

    <div class="form-group">
  {{ Form::label('section_name', 'Assign an Existing Section:') }}
          {{ Form::select('section_name', $section, null) }}
  </div>

  
  <div class="form-group">
  {{ Form::label('subject_code', 'Assign an Existing Subject Code:') }}
          {{ Form::select('subject_code', $subject, null) }}
  </div>

  


    
    <div class="form-group">
  {{ Form::label('teacher_name', 'Assign a Teacher:') }}
          {{ Form::select('teacher_id', $users, null) }}
  </div>

      



<div class="form-group{{ ($errors->has('starttime')) ? ' has-error' : '' }}">
      <label for="starttime">Start time: </label> 
      <input id="starttime" name="starttime" type="time" class="form-control">
      @if($errors->has('starttime'))
      {{ $errors->first('starttime') }}
      @endif
      
  </div>
  

  <div class="form-group{{ ($errors->has('endtime')) ? ' has-error' : '' }}">
      <label for="endtime">End time: </label> 
      <input id="endtime" name="endtime" type="time" class="form-control">
      @if($errors->has('endtime'))
      {{ $errors->first('endtime') }}
      @endif
      
  </div>
  

  
    
  {{ Form::token() }}
    
    <div class="form-group">
    <input type="submit" value="Assign Room to Subject" class="btn btn-primary">
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
