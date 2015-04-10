@extends('layouts.master')

@section('head')
	@parent
	<title>Manage Teachers </title>
@stop

			{{ HTML::style('css/bootstrap.css'); }}

@section('content')

<ul class="nav navbar-nav">
<li><a href="{{ URL:: route('adminCreate')}}"><b>Add New Admin</b></a></li>
<li><a href="{{ URL:: route('teacherCreate')}}"><b>Add New Teacher</b></a></li>
<li><a href="{{ URL:: route('viewTeacher')}}"><b>View Teacher</b></a></li>

</ul>
@if ($teacher->count())

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
		<th>Username</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Middle Name</th>
        <th>Address</th>
        <th>Birthday</th>
        <th>Email</th>
		
  

            </tr>
        </thead>

        <tbody>
            @foreach ($teacher as $teacher)
                <tr>
		   <td>{{ $teacher->username	}}</td>	
          <td>{{ $teacher->firstname }}</td>
          <td>{{ $teacher->lastname }}</td>	
          <td>{{ $teacher->middlename }}</td>
		    <td>{{ $teacher->address }}</td>
			  <td>{{ $teacher->birthday }}</td>
			    <td>{{ $teacher->email }}</td>
         <td> {{ link_to_action('AdminController@getUpdateTeacher', 'Edit', array($teacher->id),
 array('class' => 'btn btn-info')) }}</td>
         <td> {{ link_to_action('AdminController@deleteTeacher', 'Delete', array($teacher->id),
 array('class' => 'btn btn-info')) }}</td>
 

				
				
              @endforeach

                </tr>
          {{ HTML::script('js/bootstrap.js'); }}
              
        </tbody>
      
    </table>

@else
    There are no teachers registered yet
@endif
@stop