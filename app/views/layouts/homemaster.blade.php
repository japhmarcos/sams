<!doctype html>
<html lang="en">
<head>
    @section('head')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">   
    <!-- Bootstrap 3.3.2 -->
   



<link rel="shortcut icon" href="assets/ico/favicon.png">

   

    {{ HTML::style('assets/css/bootstrap.css');}}
    {{ HTML::style('assets/css/main.css');}}
    {{ HTML::style('assets/css/font-awesome.min.css');}}

    {{ HTML::script('assets/js/jquery.min.js');}}
    {{ HTML::script('assets/js/Chart.js');}}
    {{ HTML::script('assets/js/modernizr.custom.js');}}
  
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>



    @show
</head>
<body data-spy="scroll" data-offset="0" data-target="#theMenu">
    
  <!-- Menu -->
  


  
  
  
  
    
 @yield('content')
    
   
    {{ HTML::script('assets/js/classie.js');}}
    {{ HTML::script('assets/js/bootstrap.min.js');}}
    {{ HTML::script('assets/js/smoothscroll.js');}}
    {{ HTML::script('assets/js/main.js');}}


   
            
</body>

</html>
