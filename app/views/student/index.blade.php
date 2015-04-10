@extends('layouts.studentmaster')

@section('head')
    @parent
    <title>Home</title>
@stop

@yield('sidebar')

@section('content')
   <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Student Dashboard
            <small>Control Panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ URL::route('student.index') }}"><i class="fa fa-dashboard"></i> Student Dashboard</a></li>
            <li class="active">Home</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
           <div class="row">
           <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h4>
                  <br>
                  <script type="text/javascript">
                        function GetClock(){
                        var d=new Date();
                        var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getYear(),nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

                             if(nhour==0){ap=" AM";nhour=12;}
                        else if(nhour<12){ap=" AM";}
                        else if(nhour==12){ap=" PM";}
                        else if(nhour>12){ap=" PM";nhour-=12;}

                        if(nyear<1000) nyear+=1900;
                        if(nmin<=9) nmin="0"+nmin;
                        if(nsec<=9) nsec="0"+nsec;

                        document.getElementById('clockbox').innerHTML=""+(nmonth+1)+"/"+ndate+"/"+nyear+" "+"" + ""+nhour+":"+nmin+":"+nsec+ap+"";
                        }

                        window.onload=function(){
                        GetClock();
                        setInterval(GetClock,1000);
                        }
                        </script>
                        <div id="clockbox"></div>


                    </h4>
                  <p>Date & Time</p>
                </div>
                <div class="icon">
                  <i class="fa fa-clock-o"></i>
                </div>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>{{ $teacher}}</h3>
                  <p>Teachers</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>{{ $sections }}</h3>
                  <p>Sections</p>
                </div>
                <div class="icon">
                  <i class="fa fa-book"></i>
                </div>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{ $subject }}</h3>
                  <p>Subjects</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
               
              </div>
            </div><!-- ./col -->
             <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-purple">
                <div class="inner">
                  <h3>{{ $room }}</h3>
                  <p>Room</p>
                </div>
                <div class="icon">
                  <i class="fa fa-book"></i>
                </div>
              </div>
            </div><!-- ./col -->
             
            
          </div><!-- /.row -->
         
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

@stop