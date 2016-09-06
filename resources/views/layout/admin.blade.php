<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>TRACKREPS</title>

        <!-- Bootstrap Core CSS -->
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
       <link href="{{asset('bootstrap/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
       
        <!-- Custom CSS -->
        <link href="{{asset('sb-admin.css')}}" rel="stylesheet">

       <link href="{{asset('bootstrap/css/plugins/morris.css')}}" rel="stylesheet">

        <!-- Morris Charts CSS -->
<!--        <link href="css/plugins/morris.css" rel="stylesheet">-->


        <!-- Custom Fonts -->
<!--        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">-->

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">Trackreps Admin Panel</a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu message-dropdown">
                            <li class="message-preview">
                                <a href="#">
                                    <div class="media">
                                        <span class="pull-left">
                                            <img class="media-object" src="http://placehold.it/50x50" alt="">
                                        </span>
                                        <div class="media-body">
                                            <h5 class="media-heading"><strong>Trackreps</strong>
                                            </h5>
                                            <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="message-preview">
                                <a href="#">
                                    <div class="media">
                                        <span class="pull-left">
                                            <img class="media-object" src="http://placehold.it/50x50" alt="">
                                        </span>
                                        <div class="media-body">
                                            <h5 class="media-heading"><strong>Trackreps</strong>
                                            </h5>
                                            <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="message-footer">
                                <a href="#">Read All New Messages</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu alert-dropdown">
                            <li>
                                <a href="#">No new Notification</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">View All</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Trackreps <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{url('logout')}}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li>
                            <a href="{{route('member.create')}}"><i class="fa fa-fw fa-bar-chart-o"></i> Add Members</a>
                        </li>
                        <li>
                            <a href="{{route('member.index')}}"><i class="fa fa-fw fa-edit"></i> View Members Detail</a>
                        </li>
                        
                         <li>
                            <a href="{{route('committe.index')}}"><i class="fa fa-fw fa-edit"></i> View Committee Detail</a>
                        </li> 
                        <li>
                            <a href="{{route('committe.create')}}"><i class="fa fa-fw fa-edit"></i> Create new Committe</a>
                        </li>
                        
                          <li>
                            <a href="{{route('acts.create')}}"><i class="fa fa-fw fa-edit"></i> Add Act</a>
                        </li>
                        
                          <li>
                            <a href="{{route('acts.index')}}"><i class="fa fa-fw fa-edit"></i> View acts details</a>
                        </li>
                        <li>
                            <a href="{{route('bills.index')}}"><i class="fa fa-fw fa-edit"></i> View bills details</a>
                        </li>
                        <li>
                            <a href="{{route('bills.create')}}"><i class="fa fa-fw fa-edit"></i> Create Bill</a>
                        </li>
                        <li>
                            <a href="{{route('newsfeed.index')}}"><i class="fa fa-fw fa-edit"></i>News feed</a>
                        </li>
                        <li>
                            <a href="{{route('newsfeed.create')}}"><i class="fa fa-fw fa-edit"></i>Create News Feed</a>
                        </li>
                        <li>
                            <a href="{{route('attendance.index')}}"><i class="fa fa-fw fa-edit"></i>Attendance</a>
                        </li>
                        <li>
                            <a href="{{route('attendance.create')}}"><i class="fa fa-fw fa-edit"></i>Create Attendance</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

            <div id="page-wrapper">

                <div class="container-fluid">

                 
                @yield('content')


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="{{asset('bootstrap/js/jquery.js')}}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>

        <!-- Morris Charts JavaScript -->
        <script src="{{asset('bootstrap/js/plugins/morris/raphael.min.js')}}"></script>
        <script src="{{asset('bootstrap/js/plugins/morris/morris.min.js')}}"></script>
        <script src="{{asset('bootstrap/js/plugins/morris/morris-data.js')}}"></script>

        <script src="{{asset('bootstrap/js/index.js')}}"></script>

    </body>

</html>
