@extends('layouts.master')

@section('head')
	@parent
	<title>Manage Subjects</title>
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
            <li><a href="#">Manage Subjects</a></li>
            <li class="active">Subjects List</li>
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
             @if ($subject->count())

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
    
        <th>Subject Code and Description</th>
        <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($subject as $subject)
                <tr>
         
           <td>{{ $subject->code  }} - {{ $subject->name  }}</td> 
           <td> {{ link_to_action('AdminController@getUpdateSubject', 'Edit Subject', array($subject->id),
            array('class' => 'btn btn-info')) }}
           {{ link_to_action('AdminController@deleteSubject', 'Delete Subject', array($subject->id),
            array('class' => 'btn btn-danger')) }}
            
          {{ link_to_action('ViewController@viewSubjectInfo', 'View Subject Info', array($subject->id),
            array('class' => 'btn btn-default')) }}
             {{ link_to_action('ViewController@viewSubjectStudent', 'View Students', array($subject->id),
            array('class' => 'btn btn-primary')) }}
             {{ link_to_action('ViewController@viewSubjectTeacher', 'View Teacher', array($subject->id),
            array('class' => 'btn btn-warning')) }}
             {{ link_to_action('ViewController@viewSubjectRoom', 'View Rooms and Sections', array($subject->id),
            array('class' => 'btn btn-success')) }}</td>
          
        
        
              @endforeach

                </tr>
          {{ HTML::script('js/bootstrap.js'); }}
              
        </tbody>
      
    </table>

@else
    There are no subjects
@endif

            </div><!-- /.box-body -->
            
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

@stop

@stop