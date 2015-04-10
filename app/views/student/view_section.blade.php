@extends('layouts.studentmaster')
@section('head')

@parent
	<title>View Sections</title>
@stop

@section('content')

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
              View Sections
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{URL::route('student.index')}}"><i class="fa fa-dashboard"></i> Student Dashboard</a></li>
            <li class="active">View Sections</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Sections Assigned</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
            
@if ($sections->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
   
        <th>Section name</th>
        

    
    
  


            </tr>
        </thead>

        <tbody>
            @foreach ($sections as $sections)
                <tr>
     
          <td>{{ $sections->name }}</td>
      
       
        
      
        
        
              @endforeach

                </tr>
          {{ HTML::script('js/bootstrap.js'); }}
              
        </tbody>
      
    </table>

@else
<br>
   <b> There are no sections enrolled yet</b>
@endif
            </div><!-- /.box-body -->
           
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->



@stop