<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Counselling System</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- Custom CSS -->
    <link href="css/portfolio-item.css" rel="stylesheet">
     

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top customnav" role="navigation">
        <div class="container col-lg-7">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header navhead customhead page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <a class="navbar-brand page-scroll" href="href=#page-top">Student Counseling System</a>
            </div>
        </div>
         <!-- /.container -->
           <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <div class="col-md-12">
                                <form class="navbar-form navbar-left" role="search">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="userId">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="password">
                                    </div>
                                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Log IN</button><br>
                                    <div class="checkbox userrem">
                                        <label>
                                            <input type="checkbox"> Remember me
                                        </label>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
</nav>

    <!-- Page Content -->
    <div class="container-fluid">

        <!-- Portfolio Item Heading -->
        <div class="row">
            <div class="col-lg-9">
                <h1 class="page-header">
                    <small>Please fill Up your All information</small>
                    <a class="btn btn-primary page-scroll" href="#registration">Go to Registration</a>
                </h1>
            </div>
           
        </div>
        <!-- /.row -->
        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-12">
                <img class="img-responsive" src="img/study.jpg" alt="study">
                
            </div>
            <!--Registartion-->
                <div class="row">
                    <div class="col-md-12 text-center"id="registration">
                        <h1>Registration</h1>
                        <hr>
                    </div>
                </div>

            <div class="col-md-6 col-md-offset-3">
                <form class="form-horizontal" role="form">
                    <!--userName-->
                    <div class="form-group" role="form">
                        <label class="control-label col-md-2"for="exampleInputEmail1">Username:</label>
                        <div class="col-md-10">
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="username">
                        </div>
                    </div>
                        <!--Email-->
                         <div class="form-group" role="form">
                            <label class="control-label col-md-2"for="exampleInputEmail1">Email</label>
                            <div class="col-md-10">
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                            </div>
                        </div>

                        <!--User Id-->
                        <div class="form-group">
                            <label class="control-label col-md-2" for="exampleInputEmail1">User Id</label>
                            <div class="col-md-10">
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="ID">
                            </div>
                        </div>

                        <!--Password-->
                        <div class="form-group">
                            <label class="control-label col-md-2"for="exampleInputPassword1">Password</label>
                            <div class="col-md-10">
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">    
                            </div>
                        </div>
                        <!--Check Password-->
                        <div class="form-group">
                            <label class="control-label col-md-2" for="exampleInputPassword1">Check Password</label>
                            <div class="col-md-10">
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Check Password">
                            </div>
                        </div>
                        <!--Number-->

                        <div class="form-group">
                            <label class="control-label col-md-2" for="exampleInputEmail1">Phone Number</label>
                            <div class="col-md-10">
                                <input type="Phone Number" class="form-control" id="exampleInputEmail1" placeholder="ID">
                            </div>
                        </div>
                        <!--CGPA-->
                        <div class="form-group">
                            <label class="control-label col-md-2" for="exampleInputEmail1">CGPA</label>
                            <div class="col-md-10">
                                <input type="Cgpa" class="form-control" id="exampleInputEmail1" placeholder="CGPA">
                            </div>
                        </div>
                        <!--semester-->
                        <div class="form-group">
                            <label class="control-label col-md-2" for="exampleInputEmail1">Semeter</label>
                            <div class="col-md-10">
                                <input type="Phone Number" class="form-control" id="exampleInputEmail1" placeholder="Semester">
                            </div>
                        </div>


                        <!--Upload Images-->
                        <div class="form-group">
                            <label class="control-label col-md-2" for="exampleInputFile">Upload Image</label>
                            <div class="col-md-10">
                                <input type="file" id="exampleInputFile">
                            </div>
                        </div>
                        <!--Check Box-->
                        <div class="form-group">        
                          <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                              <label><input type="checkbox"> Check me out</label>
                            </div>
                          </div>
                        </div>
                        <!--Button-->
                        <div class="form-group">        
                            <div class=" col-md-12">
                                <button type="submit" class="btn btn-primary btn-block"data-toggle="modal"data-target="#myModal">Sign Up</button> 
                            </div>
                        </div>
                    </form>

                </div>
            </div>

 </div>
    <!-- /.container -->
            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Registration</h4>
                  </div>
                  <div class="modal-body">
                    <p>Please fill Up Every steps</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>

              </div>
            </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/clean-blog.min.js"></script>

</body>

</html>
