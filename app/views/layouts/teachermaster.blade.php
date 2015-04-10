<!doctype html>
<html lang="en">
<head>
  @section('head')
  <meta charset="UTF-8">
  <!-- Bootstrap 3.3.2 -->
    {{ HTML::style('bootstrap/css/bootstrap.min.css');}}
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    {{ HTML:: style('plugins/morris/morris.css');}} 
    <!-- jvectormap -->
    {{ HTML::style('plugins/jvectormap/jquery-jvectormap-1.2.2.css');}} 
    <!-- Daterange picker -->
   {{ HTML::style('plugins/daterangepicker/daterangepicker-bs3.css');}} 
    <!-- Theme style -->
    {{ HTML::style('dist/css/AdminLTE.min.css');}} 
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    {{ HTML::style('dist/css/skins/_all-skins.min.css');}} 

  @show
</head>
<body class="skin-black">
      

      <div class="wrapper">
      
      <header class="main-header">
        <a href="{{ URL::route('teacher.index') }}" class="logo"><b>S.A.M.S</b></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
             
            
  
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="/assets/img/vergil.jpg" class="user-image" alt="User Image"/>
                  <span class="hidden-xs">{{ Auth::user()->firstname ?: '' }} {{Auth:: user()->lastname ?: ''}}</span>
                </a>
                 <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="/assets/img/vergil.jpg" class="img-circle" alt="User Image" />
                    <p>
                     {{ Auth::user()->firstname ?: '' }} {{Auth:: user()->lastname ?: ''}}
                      <small>Teacher</small>
                    </p>
                  </li>
                 
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="{{URL::route('viewProfiles')}}" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="{{ URL:: route('getLogout')}}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
  
  @yield('content')
  
  @section('sidebar')

   <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="/assets/img/vergil.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>{{ Auth::user()->firstname ?: '' }} {{Auth:: user()->lastname ?: ''}}</p>

              <a href="#"><i class="fa fa-circle text-success"></i> Teacher</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">

            <li class="header">MAIN NAVIGATION</li>
             <li>
              <a href = "{{ URL::route('teacher.index') }}" class="active"><i class = "fa fa-home"></i>Home</a>
            </li>

            <li class="treeview">
             <a href="{{ URL::route('viewStudent') }}">
                <i class="fa fa-pencil-square-o"></i> <span>Record Attendance</span> 
              </a>
             
            </li>
            <li class="treeview">
             <a href="{{ URL::route('viewAttendance') }}">
                <i class="fa fa-pencil"></i> <span>View Attendance </span> 
              </a>
             
            </li>
                   
              <li class="treeview">
             <a href="{{ URL::route('viewAll') }}">
                <i class="fa fa-bars"></i> <span>View Schedule</span> 
              </a>
             
            </li>            
            <li class="treeview">
             <a href="{{ URL::route('viewStudentAssigned') }}">
                <i class="fa fa-user"></i> <span>View Students Assigned</span> 
              </a>
             
            </li>       
            <li class="treeview">
              <a href="{{ URL::route('viewSubjectAssigned') }}">
                <i class="fa fa-book"></i>
                <span>View Subjects Assigned</span>  
              </a>
            </li>            
            <li class="treeview">
              <a href="{{ URL::route('viewSectionAssigned') }}">
                <i class="fa fa-users"></i>
                <span>View Sections Assigned</span>
              </a>
            </li>
            <li class="treeview">
             <a href="{{ URL::route('viewRoomAssigned') }}">
                <i class="fa fa-building-o"></i> <span>View Rooms Assigned</span> 
              </a>
             
            
           
           
   
        </section>
        <!-- /.sidebar -->
      </aside>
          
        @section('footer')
   <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Asia Pacific College</b>
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="#">S.A.M.S</a>.</strong> All rights reserved.
      </footer> 
  

  <!-- jQuery 2.1.3 -->
   {{ HTML::script('plugins/jQuery/jQuery-2.1.3.min.js');}}
    <!-- Bootstrap 3.3.2 JS -->
   {{ HTML::script('bootstrap/js/bootstrap.min.js');}}
    <!-- FastClick -->
   {{ HTML::script('plugins/fastclick/fastclick.min.js');}}
    <!-- AdminLTE App -->
   {{ HTML::script('dist/js/app.min.js');}} 
    <!-- Sparkline -->
    {{ HTML::script('plugins/sparkline/jquery.sparkline.min.js');}} 
    <!-- jvectormap -->
    {{ HTML::script('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js');}} 
    {{ HTML::script('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}} 
    <!-- daterangepicker -->
    {{ HTML::script('plugins/daterangepicker/daterangepicker.js');}} 
    <!-- datepicker -->
    {{ HTML::script('plugins/datepicker/bootstrap-datepicker.js');}} 
    <!-- iCheck -->
    {{ HTML::script('plugins/iCheck/icheck.min.js');}} 
    <!-- SlimScroll 1.3.0 -->
    {{ HTML::script('plugins/slimScroll/jquery.slimscroll.min.js');}} 
    <!-- ChartJS 1.0.1 -->
    {{ HTML::script('plugins/chartjs/Chart.min.js');}} 

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    {{ HTML::script('dist/js/pages/dashboard2.js');}} 

    <!-- AdminLTE for demo purposes -->
    {{ HTML::script('dist/js/demo.js');}}

            
</body>

</html>
