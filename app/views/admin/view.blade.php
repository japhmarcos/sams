@extends('layouts.master')

@section('head')
    @parent
    <title>Manage Users</title>
@stop

@yield('sidebar')
    
@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage Users
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ URL::route('admin.index') }}"><i class="fa fa-dashboard"></i> Admin Dashboard</a></li>
            <li><a href="#">Manage Users</a></li>
            <li class="active">Users List</li>
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
               @if ($users->count())

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
    <th>Username</th>
        <th>Last name</th>
        <th>First name</th>
        <th>Middle Name</th>
       
        <th>Email</th>
    <th>Admin</th>
    <th>Teacher</th>
    

            </tr>
        </thead>

        <tbody>
            @foreach ($users as $users)
                <tr>
       <td>{{ $users->username    }}</td> 
          <td>{{ $users->lastname }}</td>
          <td>{{ $users->firstname }}</td> 
          <td>{{ $users->middlename }}</td>
       
          <td>{{ $users->email }}</td>
         <td>{{ $users->isAdmin }}</td>
         <td>{{ $users->isTeacher }}</td>
         <td> {{ link_to_action('AdminController@getUpdateUser', 'Edit User', array($users->id),
 array('class' => 'btn btn-info')) }}</td>
         <td> {{ link_to_action('AdminController@deleteUser', 'Delete User', array($users->id),
 array('class' => 'btn btn-block btn-danger')) }}</td>
 


              @endforeach

                </tr>
          {{ HTML::script('js/bootstrap.js'); }}
              
        </tbody>
      
    </table>

@else
    There are no users
@endif
            </div><!-- /.box-body -->
           
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


         



@stop