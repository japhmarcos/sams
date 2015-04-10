<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
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

        <style>
            table form { margin-bottom: 0; }
            form ul { margin-left: 0; list-style: none; }
            .error { color: red; font-style: italic; }
            body { padding-top: 20px; }
        </style>
    </head>

    <body>

        <div class="container">
            @if (Session::has('message'))
                <div class="flash alert">
                    <p>{{ Session::get('message') }}</p>
                </div>
            @endif

            @yield('main')
        </div>


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