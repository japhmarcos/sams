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
<body>
        <div class="navbar navbar-inverse navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-responsive-collapse" aria-expanded="false" aria-controls="navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
                <a href="{{ URL::route('home') }}" class="navbar-brand">Student Attendance Monitoring System</a>
            </div>
        
       <div class="navbar-collapse collapse navbar-responsive-collapse">
            @if(!Auth::check())
                <ul class="nav navbar-nav">
                  
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ URL:: route('getCreate')}}">Register</a></li>
                    <li><a href="{{ URL:: route('getLogin')}}">Login</a></li>
                    </ul>
            
            @else
                
                    @if(Auth::user()->isAdmin == 1)
                    <ul class="nav navbar-nav">
                    <li><a href ="{{ URL:: route('admin.index')}}">Home</a></li>
                    
                </ul>
                    <ul class="nav navbar-nav navbar-right">    
                    <li><a>Hello, {{ Auth::user()->firstname ?: '' }}</a><li>
                    <li><a href="{{ URL:: route('getLogout')}}">Logout</a></li>
                    </ul>
                    @elseif(Auth::user()->isTeacher == 1)
                    <ul class="nav navbar-nav">
                    <li><a href="{{ URL:: route('viewStudent')}}">View Students and Record Attendance</a></li>
                    <li><a href="{{URL:: route('viewSection')}}">View Sections</a>
                    </li>
                    <li><a href="{{URL:: route('viewSubject')}}">View Subject</a>
                    </li>
                    
                    
                </ul>
                    <ul class="nav navbar-nav navbar-right">    
                    <li><a>Hello, {{ Auth::user()->firstname ?: '' }}</a><li>
                    <li><a href="{{ URL:: route('getLogout')}}">Logout</a></li>
                    </ul>
                    @else
                        
                    <ul class="nav navbar-nav">
                    <li><a href="{{URL::route('viewstudentAttendance')}}">View Attendance</a></li>
                    <li><a>View Sections/Subjects</a></li>
                    
                </ul>
                    
                        <ul class="nav navbar-nav navbar-right">    
                    <li><a>Hello, {{ Auth::user()->firstname ?: '' }}</a><li>
                    <li><a href="{{ URL:: route('getLogout')}}">Logout</a></li>
                    </ul>
                    @endif
            @endif
            </div>
            </div>

            </div>
    
    @yield('content')
    
    @section('sidebar')
    
    

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
