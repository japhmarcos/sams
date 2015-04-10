@extends('layouts.master')

@section('head')
  @parent
  <title>Assign Student</title>
@stop

@section('content')
 

        <div class="content-wrapper">
        
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Assign Student to an Existing Section          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ URL::route('admin.index') }}"><i class="fa fa-dashboard"></i> Admin Dashboard</a></li>
            <li><a href="{{ URL::route('viewSection') }}">Manage Sections</a></li>
            <li class="active">Assign Student to an Existing Section</li>
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
    <div class="alert alert-success">{{ Session::get('success') }}</div>
  @elseif (Session::has('fail'))
    <div class="alert alert-success">{{ Session::get('fail') }}</div>
  @endif



        <form role="form" method="post" action="{{ URL::route('sectionExistingStore') }}">



     <div class="form-group">
  {{ Form::label('student_name', 'Assign a Student to this section:') }}
          {{ Form::select('student_id', $users, null) }}
  </div>
  



    <div class="form-group">
  {{ Form::label('section_name', 'Assign an Existing Section:') }}
          {{ Form::select('section_id', $sections, null) }}
  </div>

  
    
  {{ Form::token() }}
    
    <div class="form-group">
    <input type="submit" value="Assign Student to Section" class="btn btn-primary">
  </form>
  </div>       
    
  </div>
       
           
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


    @stop



