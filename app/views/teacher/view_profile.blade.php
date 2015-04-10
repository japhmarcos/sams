@extends('layouts.teachermaster')

@section('head')
	@parent
	<title>View Profile</title>
@stop

@yield('sidebar')		

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           {{ Auth::user()->firstname ?: '' }} {{Auth::user()->middlename ?: ''}} {{Auth:: user()->lastname ?: ''}}
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{URL::route('teacher.index')}}"><i class="fa fa-dashboard"></i> Teacher Dashboard</a></li>
            <li class="active">View Profile</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Your info</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                  <div class="box-body">
                   <div class="form-group">
                          <label for="firstname">Firstname:</label> {{ Auth::user()->firstname  }}
                    </div>
                      
                      <div class="form-group">
                          <label for="lastname">Lastname:</label> {{ Auth::user()->lastname  }} 
                      </div>  
                          
                      <div class="form-group">
                          <label for="middlename">Middlename:</label> {{ Auth::user()->middlename  }}
                      </div>  
                      
                      
                      
                      <div class="form-group">
                          <label for="address">Address:</label> {{ Auth::user()->address  }} 
                      </div>  
                      
                        <div class="form-group">
                          <label for="birthday">Birthday:</label> {{ Auth::user()->birthday  }}
                      </div>  
                      
                        <div class="form-group">
                          <label for="contact">Contact No:</label> {{ Auth::user()->contact  }}
                      </div>  
                      
                        <div class="form-group">
                          <label for="email">Email:</label> {{ Auth::user()->email  }}
                        </div>  
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <a href = "{{ URL::route('getUpdateProfiles') }}" class="active">Edit Profile</a>
                  </div>
                </form>
              </div><!-- /.box -->

            
             

            </div><!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
              <!-- general form elements disabled -->
              <div class="box box-warning">
                <div class="box-header">
                  <h3 class="box-title">Profile Pic</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form role="form">
                    <!-- text input -->
                      <center><img class="img-circle" src="/assets/img/vergil.jpg" height="150" width="150"></center>

                  </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
 
        @stop