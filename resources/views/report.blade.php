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
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index">For User</a>
            </div>
            <!-- Top Menu Items -->
        
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                        <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Report Page
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-edit"></i> Report
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-6">
                             
                        <div class="panel-body">
                            <form action="{{url('/update')}}" method="get">

                                <div class="form-group">
                                    <label>License Plate</label><span style="color: red">*</span>
                                    <br><input type="text" name="report" value="<?php echo $re; ?>" class="form-control" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Problem</label><span style="color: red">*</span>
                                    <br><input type="checkbox" name="" value=""> Impolite Driver
                                    <br><input type="checkbox" name="" value=""> Speed Over Limit
                                    <br><input type="checkbox" name="" value=""> Drive Out of Way
                                    <br><input type="checkbox" name="" value=""> Others...
                                    <input type="text" name="" value=""><br><br>
                            <center>
                                <input type="submit" class="btn btn-lg btn-default" name="Submit" value="Submit" >
                                <a href="tables"><button type="button" class="btn btn-lg btn-default">Back</button></a>
                            </center>
                            </form>
                                                    
                            
                        </div>
                    </div>
                </div>

                                            
                <!-- <h1>Input Groups</h1>

                    <form role="form">
                        <div class="form-group input-group">
                            <input type="text" class="form-control">
                            <span class="input-group-btn"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></span>
                        </div>
                    </form>

                        

                    </div>
                </div> -->
                <!-- /.row -->

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

    

</body>

</html>
