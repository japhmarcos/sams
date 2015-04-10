@extends('layouts.master')

@section('head')
	@parent
	<title>Create Attendance</title>
@stop

@section('content')
 <div class ="container">
	<h1>Create Attendance</h1>



  
	<form role="form" method="post" action="{{ URL::route('adminStore') }}">
		@if ($student->count())

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
        <th>First name</th>
        <th>Last name</th>
        <th>Middle Name</th>
		<th>Attendance</th>
		<th>Comment</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($student as $student)
                <tr>	
          <td>{{ $student->lastname }}</td>
          <td>{{ $student->firsttname }}</td>
          <td>{{ $student->middlename }}</td>
				<td>
					<select class="form-control placeholder">
   <option value="">Select...</option>
   <option value="1">Absent</option>
   <option value="2">Late</option>
   <option value="3">Others</option>
   
</select>
</td>
			<td>
			<div class="form-group">
			<input id="comment" name="comment" type="text" class="form-control">
	
		</div>	
			</td>
				
              @endforeach

                </tr>
          
                  
        </tbody>
      
    </table>
	<center>
	{{ Form::token() }}
	<div class="form-group">
		<input type="submit" value="Save Changes" class="btn btn-default">
	</div>
	</center>
</div>
	 @if ($errors->any())
        	<ul>
        		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
        	</ul>
        @endif


@else
    There are no students registered yet
@endif
		
        @stop
