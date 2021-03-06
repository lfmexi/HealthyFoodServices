<?php
// Start the session
session_start();
if(!isset($_SESSION['login'])) {
  header('Location: login.php'); 
  exit();
}?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Healthy Food</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Healthy Food</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="index.php?logout=0"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i>Inicio</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cutlery fa-fw"></i> Ingredientes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="viewing.php">Ver ingredientes</a>
                                </li>
                                <li>
                                    <a href="forming.php">Crear ingredientes</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-heart-o fa-fw"></i>Ejercicios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="viewex.php">Ver Ejercicios</a>
                                </li>
                                <li>
                                    <a href="viewex.php">Crear Ejercicios</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Inicio</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Inicio
                        </div>
                        <div class="panel-body">
                            <div class="row">
								<div class="col-lg-3 col-md-6">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<div class="row">
											<div class="col-xs-3">
												<i class="fa fa-heart-o fa-5x"></i>
											</div>
											<div class="col-xs-9 text-right">
												<div class="huge">
												<?php
													$conn = mysql_connect("mysql.hostinger.es","u147283082_admin" ,"seminario2");
													mysql_selectdb("u147283082_hlife", $conn);
													$query = "SELECT COUNT(idEjercicio) as c FROM Ejercicio ;";
													$result1 = mysql_query($query);
													if ($result1){
														$r = mysql_fetch_assoc($result1);
														echo $r['c'];
													}
													mysql_close($conn);
												?>
                                                                                                </div>
												<div>Ejercicios</div>
											</div>
										</div>
									</div>
									<a href="viewex.php">
										<div class="panel-footer">
											<span class="pull-left">View Ejercicios</span>
											<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
											<div class="clearfix"></div>
										</div>
									</a>
								</div>
							</div>
							<div class="col-lg-3 col-md-6">
								<div class="panel panel-yellow">
									<div class="panel-heading">
										<div class="row">
											<div class="col-xs-3">
												<i class="fa fa-cutlery fa-5x"></i>
											</div>
											<div class="col-xs-9 text-right">
												<div class="huge">
												<?php
													$conn = mysql_connect("mysql.hostinger.es","u147283082_admin" ,"seminario2");
													mysql_selectdb("u147283082_hlife", $conn);
													$query = "SELECT COUNT(id) as c FROM Ingrediente ;";
													$result1 = mysql_query($query);
													if ($result1){
														$r = mysql_fetch_assoc($result1);
														echo $r['c'];
													}
													mysql_close($conn);
												?>
												</div>
												<div>Ingredientes</div>
											</div>
										</div>
									</div>
									<a href="viewing.php">
										<div class="panel-footer">
											<span class="pull-left">View Ingredientes</span>
											<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
											<div class="clearfix"></div>
										</div>
									</a>
								</div>
							</div>
							<div class="col-lg-3 col-md-6">
								<div class="panel panel-green">
									<div class="panel-heading">
										<div class="row">
											<div class="col-xs-3">
												<i class="fa fa-cutlery fa-5x"></i>
											</div>
											<div class="col-xs-9 text-right">
												<div class="huge">
												<?php
													$conn = mysql_connect("mysql.hostinger.es","u147283082_admin" ,"seminario2");
													mysql_selectdb("u147283082_hlife", $conn);
													$query = "SELECT COUNT(idReceta) as c FROM Receta;";
													$result1 = mysql_query($query);
													if ($result1){
														$r = mysql_fetch_assoc($result1);
														echo $r['c'];
													}
													mysql_close($conn);
												?>
                                                                                                </div>
												<div>Recetas</div>
											</div>
										</div>
									</div>
									<a href="viewrec.php">
										<div class="panel-footer">
											<span class="pull-left">View Recetas</span>
											<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
											<div class="clearfix"></div>
										</div>
									</a>
								</div>
							</div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>

</html>	