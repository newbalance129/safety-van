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
                            Forms
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-edit"></i> Form
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">

                        {!! Form::open(['url' => 'forms','files'=> false,'method'=>'post']) !!}
                        
                            <div class="form-group">
                                <?= Form::label('dIdCard','National ID Card'); ?><span style="color: red">*</span>

                                <?= Form::number('dIdCard',null,['class' => 'form-control', 'placeholder' => 'ID']); ?>
                            </div>
                        
                            <div class="form-group">
                                <?= Form::label('dFName','Firstname'); ?><span style="color: red">*</span>
                                <?= Form::text('dFName',null,['class' => 'form-control', 'placeholder' => 'ชื่อ','required']); ?>
                            </div>
                                              
                            <div class="form-group">
                                <?= Form::label('dLName','Lastname'); ?><span style="color: red">*</span>
                                <?= Form::text('dLName',null,['class' => 'form-control', 'placeholder' => 'นามสกุล','required']); ?>
                            </div>

                            <div class="form-group">
                                <?= Form::label('dPicture','Image'); ?>
                                <input type="file" name="dPicture" >
                            </div>
                       
                            <div class="form-group">
                                <?= Form::label('dGender','Gender'); ?><span style="color: red">*</span>
                                <input type='radio' name='dGender' id='dGender' value='Male'>Male
                                <input type='radio' name='dGender' id='dGender' value='Female'>Female
                            </div>
                        

                            <div class="form-group">
                                <?= Form::label('dBlood','Blood Type'); ?><span style="color: red">*</span>
                                <select name='dBlood'>
                                    <option value='A'>A</option>
                                    <option value='B'>B</option>
                                    <option value-'O'>O</option>
                                    <option value='AB'>AB</option>
                                </select>
                            </div>
                        

                            <div class="form-group">
                                <?= Form::label('dDob','Date of Birth'); ?><span style="color: red">*</span>
                                <?= Form::date('dDob', \Carbon\Carbon::now(),['class' => 'form-control']); ?>
                            </div>
                        

                        <div class="panel-body" align="center">
                            <input type="submit" class="btn btn-lg btn-default" name="Submit" value="Submit" >
                            <input type="reset" class="btn btn-lg btn-default"name="Reset" value="Reset" >
                        </div>
                    </div>
                </div>
                        {!! Form::close() !!}

                                            
                
                        

                    </div>
                </div>
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
