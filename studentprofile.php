<?php
    include_once("dbconnect.php");
    session_start();
    //echo $_SESSION['username'];
    if (isset($_SESSION['username'])){
            $username = $_SESSION['username'];
           /* echo date('Y m d H:i:s', $_SESSION['time']);
            echo "Hello " . $username . "
            ";
            echo "This is the Members Area
            ";
            echo "<a href='index.php'>Logout</a>";*/
         
        }
        else{
           // header("location:index.php");
        }

                      // remove all session variables
                           //session_unset();

                          // destroy the session
                         // session_destroy(); 
                          //echo "destroy";



      
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Homepage</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="background-color:#eff5f5;">
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Student Profile</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li>
        <a href="#menu-toggle"id="menu-toggle"><span class="glyphicon glyphicon-list-alt"></span> Menu</a>
        </li>
    </ul>
  </div>
</nav>
 
   
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav adminlist nav nav-pills nav-stacked">
                <li class="sidebar-brand">
                    <a href="#">
                        Welcome Student
                    </a>
                </li>
                <li>
                    <a href="studentprofile.php"><span class="glyphicon glyphicon-user"> Profile </a>
                </li>
                <li>
                    <a href="scourse.php"><span class="glyphicon glyphicon-list-alt"> Courses</a>
                </li>
                <li>
                    <a href="downnotes.php"><span class="glyphicon glyphicon-pencil"> DownloadNotes</a>
                </li>
                
                
                <li>
                    <a href="discuss.php"data-toggle="tooltip" title="Hey!check your inbox"><span class="glyphicon glyphicon-inbox"> Discussion <span class="badge">1</span></a>
                </li>
                <li>
                    <a href="index.php"><span class="glyphicon glyphicon-log-out"> Logout</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
            <!--OverView-->
                <div class="row">
                <?php
               // error_reporting(~E_ALL); 
                    //$id = $_GET['id'];
                //echo "SELECT auserid,ausername from areg where auserid='$username'";
                    $result=mysql_query("SELECT suserid,susername from sreg where suserid='$username'");
                   // echo $result;
                      while($row = mysql_fetch_assoc($result))
                      {

                          echo "<p>".$row['suserid']."</p>";
                          //echo "<p>".$row['ausername']."</p>";     
                    }
                    ?>
                    <div class="col-lg-3 adminimg">
                        <?php
               // error_reporting(~E_ALL); 
                    //$id = $_GET['id'];
                //echo "SELECT auserid,ausername from areg where auserid='$username'";
                    $result=mysql_query("SELECT suserid,susername,simg from sreg where suserid='$username'");
                   // echo $result;
                      while($row = mysql_fetch_assoc($result))
                      {
                        ?>
                        <div style="width:250px; height:250px;">
                            <p><strong>Profile Image</strong></p><img src="img/<?php echo $row['simg'];?>"class="img-rounded" width="250px" height="250px" style="margin-bottom: 100px;"/><hr>
                        </div>
                        <?php 
                    }
                    ?>
                       
                    </div>
                    
                    <div class="col-lg-8 userinfo" style="margin-top: 120px;">
                        <div class="well well-sm">OverView</div>

                        <?php
               // error_reporting(~E_ALL); 
                    //$id = $_GET['id'];
                //echo "SELECT auserid,ausername from areg where auserid='$username'";
                    $result=mysql_query("SELECT suserid,susername,simg,semail,sdept,sphone,ssemister,scgpa from sreg where suserid='$username'");
                   // echo $result;
                      while($row = mysql_fetch_assoc($result))
                      {
                        ?>
                        <p>UserID: <?php echo $row['suserid'];?></p><hr>
                        <p>UserName: <?php echo $row['susername'];?> </p><hr>
                        <p>Email: <?php echo $row['semail'];?> </p><hr>
                        <p>Depertment: <?php echo $row['sdept'];?> </p><hr>
                        <p>Phone No: <?php echo $row['sphone'];?> </p><hr>
                        <p>Semister: <?php echo $row['ssemister'];?> </p><hr>
                        <p>CGPA: <?php echo $row['scgpa'];?> </p><hr>
                        
                    <?php 
                    }
                    ?>
                    
                       
                    </div>
                </div>
        </div>
        </div>
        <!-- /#page-content-wrapper -->
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
    <!--Tooltip-->
    <script>
        $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

</body>

</html>
