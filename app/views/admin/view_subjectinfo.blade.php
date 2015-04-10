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
            <li class="active">View Subject Info</li>
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
            @if ($info != null)

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
       
       <th>Subject Info</th>
   
            </tr>
        </thead>

        <tbody>
            @foreach ($info as $info1)
                <tr>
          <td>{{ $info1->info  }}</td> 
          
       

        
        
              @endforeach

                </tr>
          {{ HTML::script('js/bootstrap.js'); }}
              
        </tbody>
      
    </table>
@else
    There is no subject information
@endif

            </div><!-- /.box-body -->
            
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

@stop

@stop