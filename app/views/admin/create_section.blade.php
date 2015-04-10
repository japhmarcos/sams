@extends('layouts.master')

@section('head')
	@parent
	<title>Create Section</title>
@stop

@yield('sidebar')

@section('content')

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Create Section
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ URL::route('admin.index') }}"><i class="fa fa-dashboard"></i> Admin Dashboard</a></li>
            <li><a href="{{ URL::route('viewSubject') }}">Manage Sections</a></li>
            <li class="active">Add Section</li>
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
              
    <form role="form" method="post" action="{{ URL::route('sectionStore') }}">


     <div class="form-group">
  {{ Form::label('student_name', 'Assign a Student to this section:') }}
          {{ Form::select('student_id', $users, null) }}
  </div>


  
  

    <div class="form-group{{ ($errors->has('name')) ? ' has-error' : '' }}">
      <label for="name">Section Name: </label> 
      <input id="name" name="name" type="text" class="form-control">
      @if($errors->has('name'))
      {{ $errors->first('name') }}
      @endif
      
  </div>
  
    
  {{ Form::token() }}
    
    <div class="form-group">
    <input type="submit" value="Create New Section" class="btn btn-primary">
  </form>
  </div>
        @if ($errors->any())
          <ul>
            {{ implode('', $errors->all('<li class="error">:message</li>')) }}
          </ul>
        @endif
           
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


        @stop
