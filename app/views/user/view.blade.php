@extends('layouts.master')
@section('head')

@parent
	<title>User View</title>
@stop

@section('main')



@if ($user->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
        <th>Last name</th>
        <th>First name</th>
        <th>Middle Name</th>
        <th>Address</th>
        <th>Birthday</th>
        <th>Email</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($user as $user)
                <tr>
          <td>{{ $user->lastname }}</td>
          <td>{{ $user->firstname }}</td>
          <td>{{ $user->middlename }}</td>
		    <td>{{ $user->address }}</td>
			  <td>{{ $user->birthday }}</td>
			    <td>{{ $user->email }}</td>
                

                </tr>
            @endforeach
              
        </tbody>
      
    </table>
@else
    There are no users
@endif

@stop