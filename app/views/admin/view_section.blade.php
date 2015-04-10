@extends('layouts.master')

@section('head')
	@parent
	<title>Manage Section</title>
@stop

			{{ HTML::style('css/bootstrap.css'); }}

@yield('sidebar')

@section('content')

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          Manage Sections
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ URL::route('admin.index') }}"><i class="fa fa-dashboard"></i> Admin Dashboard</a></li>
            <li><a href="#">Manage Sections</a></li>
            <li class="active">Sections List</li>
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

             @if ($sections->count())

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
    <th>ID</th>
        <th>Section name</th>
        <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($sections as $sections)
                <tr>
       <td>{{ $sections->id  }}</td>  
           <td>{{ $sections->name  }}</td> 
           
         <td> {{ link_to_action('AdminController@getUpdateSection', 'Edit Section', array($sections->id),
            array('class' => 'btn btn-info')) }}
         {{ link_to_action('AdminController@deleteSection', 'Delete Section', array($sections->id),
 array('class' => 'btn btn-danger')) }}
         {{ link_to_action('ViewController@viewSectionStudent', 'View Students', array($sections->id),
 array('class' => 'btn btn-primary')) }}
 </td>
 

        
        
              @endforeach

                </tr>
          {{ HTML::script('js/bootstrap.js'); }}
              
        </tbody>
      
    </table>

@else
    There are no sections
@endif
            </div><!-- /.box-body -->
           
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

@stop

@stop