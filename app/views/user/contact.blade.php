@extends('layouts.master')

@section('head')
	@parent
	<title>Contact Us</title>
@stop

@section('content')
	<div class ="container">
	<h1>Contact Us</h1>
	
	<h2 align="center">Project Team</h2>
	<table border="3" align = "center"><tr>


<th width="150">Name</th>
<th width="150">Email</th>
<th width="150">Roles</th>
</tr>


<tr align = "center">
<td>Bryan Anthony M. Aclan</td>
<td>bmaclan@apc.edu.ph</td>
<td>Developer/Quality Tester/Project Manager</td>
</tr>
<tr align = "center">
<td>Virgil Joseph I. Cruz</td>
<td>vicruz@apc.edu.ph</td>
<td>Developer/Quality Tester</td>
</tr>
<tr align = "center">
<td>Nicson Nicolas</td>
<td>icnicolas@apc.edu.ph</td>
<td>Developer/Quality Tester</td>
</tr>
</table>
<p>&nbsp</p>
<h2><center> Professor</center> </h2>
<table border="3" align = "center"><tr>
<th width="150">Name</th>
<th width="150">Email</th>
</tr>

<tr>
<td>Mr. Allan Cotecson</td>
<td>acotecson@gmail.com</td>
</tr>
</table>
	
	{{ Form::token() }}
	
@stop

