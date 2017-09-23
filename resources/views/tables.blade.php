<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
    function deleteDriver(dIdCard){
        
           location.href = 'delete/'+dIdCard;
       } 

    </script>

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
                <a class="navbar-brand" href="index">Administrator</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                @if(Auth::guest())
                    <li><a href="{{ url('/login')}}">login</a></li>
                    <li><a href="{{ url('/register')}}">register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Admin <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{ url('/logout') }}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>


            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Driver <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="tables">Driver Detail</a>
                            </li>
                            <li>
                                <a href="forms">New Driver</a>
                            </li>
                        </ul>
                        <li>
                           <a href="ViewReport">Report</a> 
                        </li>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Driver Detail
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-table"></i> Driver Detail
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        
                        <div class="form-group input-group">
                            <form action="{{url('/search')}}" method="get">
                            <input type="text" class="form-control" name="searched">
                            <span class="input-group-btn"><button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button></span>
                            </form>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        
                                        <th><center>Driver ID</center></th>
                                        <th><center>Name</center></th>
                                        <th colspan='3'><center>Menu</center></th>
                                        @foreach($driver as $d)
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><center>{{$d->dIdCard}}</center></td>
                                        <td>{{$d->dFName}} {{$d->dLName}}</td>
                                        <td>
                                            <center><form action="/blank-page" method="get">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <input type="hidden" name="_method" value="detail">
                                                <input type="hidden" value="{{$d->dIdCard}}" name="_id">
                                                <input type="submit" class="btn btn-xs btn-info" value="Detail">

                                            </form></center>
                                            <!--<button type="button" class="btn btn-xs btn-warning">Edit</button>
                                            <button type="button" class="btn btn-xs btn-danger">Delete</button> blank-page?dID={{$d->driverID}}-->
                                        </td>
                                        <td>
                                            <center><form action="/edit" method="get">
                                                <input type="hidden" name="_id" value="{{$d->dIdCard}}">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <input type="hidden" name="_method" value="detail">
                                                <input type="submit" class="btn btn-xs btn-warning" value="Edit">
                                            </form>
                                        </td>
                                        <td>
                                            <center><a href="/delete/{{$d['dIdCard']}}" class="btn btn-xs btn-danger btn-delete">Delete</button></center></a>
                                        </td>
                                        @endforeach
                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                <!-- /.row -->
<!-- 
                
 -->                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script>
    
    $('.btn-delete').click(function(){
       return confirm('Are you sure you want to delete ?');
     });
    </script>



</body>

</html>
