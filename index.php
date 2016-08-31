<?php  //Start the Session
        session_start();
        include_once('dbconnect.php');
        if (isset($_POST['userid']) and isset($_POST['userpass'])){
            $username = $_POST['userid'];
            $password = $_POST['userpass'];

            $query = "SELECT * FROM `areg` WHERE auserid='$username' and apass='$password'";
            $query1 = "SELECT * FROM `sreg` WHERE suserid='$username' and spass='$password'";
            $query2 = "SELECT * FROM `freg` WHERE fuserid='$username' and fpass='$password'";
            $query3 = "SELECT * FROM `preg` WHERE puserid='$username' and ppass='$password'";
           
         
            $result = mysql_query($query) or die(mysql_error());
            $result1 = mysql_query($query1) or die(mysql_error());
            $result2 = mysql_query($query2) or die(mysql_error());
            $result3 = mysql_query($query3) or die(mysql_error());
            $count = mysql_num_rows($result);
            $count1 = mysql_num_rows($result1);
            $count2 = mysql_num_rows($result2);
            $count3 = mysql_num_rows($result3);

            if ($count == 1){
                
                $_SESSION['username'] = $username;
                header("Location:adminprofile.php");
            }
            else if ($count1 == 1) {
                # code...
                $_SESSION['username'] = $username;
                header("Location:studentprofile.php");
            }
            else if ($count2 == 1) {
                # code...
                $_SESSION['username'] = $username;
                header("Location:facultyprofile.php");
            }
             else if ($count3 == 1) {
                # code...
                $_SESSION['username'] = $username;
                header("Location:pprofile.php");
            }
            else{
       
                $errMSG= "Invalid Login Credentials.";
            }
        }
        
        
?>

<!DOCTYPE HTML>
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
     

    

</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top customnav" role="navigation">
        <div class="container col-lg-7">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header navhead customhead">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> 
                <a style="color: white;" class="navbar-brand" href="#">Student Counseling System</a>
            </div>
        </div>
         <!-- /.container -->
           <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <div class="col-md-12">
                                <form class="navbar-form navbar-left" role="search" method="POST" action="">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="userid"placeholder="User ID">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="userpass" placeholder="Password">
                                    </div>

                                    
                                    <button type="submit" class="btn btn-primary" name="submit" onclick="myfunc()">
                                    <script type="text/javascript">
                                        function myfunc(){
                                            alert("Welcome");
                                        }
                                    </script>

                                    
                                    <span class="glyphicon glyphicon-log-in"></span> Log in

                                    </button><br>
                                    
                                    <div class="checkbox userrem">
                                        
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->

         
    </nav>

    <!-- Page Content -->
    <div class="container-fluid">
        <?php
            if(isset($errMSG)){
                    ?>
                    <div class="alert alert-danger">
                        <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
                    </div>
                    <?php
            }
         ?>

        <!-- Student Heading Heading -->
        <div class="row">
            <div class="col-lg-8">
                <h1 class="page-header">
                    <strong>Welcome to Student Counceling System!<br>
                    This System allows a mutual & hassel-free communication among Students, Faculties & Parents.<br>
                    </strong>
                </h1>
            </div>
           
        </div>
        <!-- /.row -->
        <!-- Portfolio Item Row -->
        <div class="row">
        <!-- Homepage images-->
            <div class="col-md-9">
                <img class="img-responsive" src="img/student.jpg" alt="study">
            </div>
            <!--Registartion-->
            <div class="col-md-3 customreg">
                <h2>Student Counceling System (SCS)</h2>
                    <div >
                        <label>
                            <p>About Us</p>
                        </label>
                    </div>
                    <a class="btn btn-primary btn-block" role="button" data-toggle="collapse" data-target="#Aboutus" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                      About
                    </a>
                    <div class="collapse" id="Aboutus">
                        <div class="About">
                        This system has been Developed by<br>
                        MD. Ashiqur Rahman <br>
                        MD. Asif Seraje <br>
                        Feel free to contact with us!! :)
                        </div>
                    </div>
                    <div>
                        <label>
                            <p>For any Kind of help</p>
                        </label>
                    </div>
                        <a class="btn btn-primary btn-block" role="button" data-toggle="collapse" data-target="#help" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                          Help
                        </a>
                    <div class="collapse" id="help">
                        <div class="Help">
                            For any kind of help<br>
                            Feel free to contact with us :)<br>
                            [email: arahman.aiub.13@gmail.com]<br>
                            [email: asifseraje@gmail.com]<br>
                        </div>
                    </div>

            </div>

        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <hr>
            <h2 style="margin-left: 280px;">News and Events</h2>
            <hr>


            <div id="all_comments">
            <?php

                $host="localhost";
                $username="root";
                $password="";
                $databasename="scs";

                $connect=mysql_connect($host,$username,$password);
                $db=mysql_select_db($databasename);
  
                $comm = mysql_query("select name,comment,post_time from comments order by post_time desc");
                while($row=mysql_fetch_array($comm))
                {
                    $name=$row['name'];
                    $comment=$row['comment'];
                    $time=$row['post_time'];
            ?>
            
            <div style="margin-top: 25px;"class="panel panel-info">


            <div class="panel-heading"><h3 class="name">Posted By: <?php echo  $name;?></h3></div>
            <div class="panel-body"><h4 class="comment"><?php echo $comment;?></h4></div>
            <div class="panel-body"> </div><p style="margin-left: 720px;" class="time">Published on: <?php echo $time;?></p> 
            </div>
  
            <?php
            }
            ?>
            </div>
        </div>

    </div>
        <!-- /.row -->
 </div>
    <!-- /.container -->

        <!-- Footer -->
     <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/clean-blog.min.js"></script>

</body>
</html>