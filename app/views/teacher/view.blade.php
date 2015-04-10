@extends('layouts.master')

@section('head')
  @parent
  <title>View Students</title>
@stop
  
    {{ HTML::style('css/bootstrap.css'); }}

@section('content')


<br>
<br>
<br>
<br>
@if ($users->count())

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
    
        <th>First name</th>
        <th>Last name</th>
        <th>Middle Name</th>
        <th>Address</th>
        <th>Birthday</th>
    <th>Contact</th>
        <th>Email</th>
    <th>Attendance</th>
    <th>Comment</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $users)
                <tr>
        
          <td>{{ $users->firstname }}</td>
          <td>{{ $users->lastname }}</td>
          <td>{{ $users->middlename }}</td>
        <td>{{ $users->address }}</td>
        <td>{{ $users->birthday }}</td>
         <td>{{ $users->contact }}</td>
          <td>{{ $users->email }}</td>
  <form role="form" method="post" action="{{ URL::route('postCreateAttendance') }}">
        <td>
        <div class="form-group">
          <select class="form-control" name="status">
  <option value="">Select...</option>
   <option value="present">Present</option>
   <option value="absent">Absent</option>
   <option value="late">Late</option>
   <option value="others">Others</option>
   </select>
   </div> 
</td>
      <td>
      <div class="form-group">
      <input id="comment" name="comment" type="text" class="form-control">
  
    </div>  
      </td>
        
              @endforeach

                </tr>
          
                   {{ HTML::script('js/bootstrap.js'); }}
        </tbody>
      
    </table>
  <center>
  <div class="form-group">
    <input type="submit" value="Save Changes" class="btn btn-default">
  </center>
  </form>
  </div>

@else
    There are no students registered yet
@endif
@stop