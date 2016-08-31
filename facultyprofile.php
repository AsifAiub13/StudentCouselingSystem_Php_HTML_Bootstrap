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

    <title>Faculty Homepage</title>

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
      <a class="navbar-brand" href="#">Faculty Profile</a>
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
                        Welcome Faculty
                    </a>
                </li>
                <li>
                    <a href="facultyprofile.php"><span class="glyphicon glyphicon-user"> Profile </a>
                </li>
                
                <li>
                    <a href="fcourse.php"><span class="glyphicon glyphicon-pencil"> Courses</a>
                </li>
                
                <li>
                    <a href="uploadnotes.php"><span class="glyphicon glyphicon-pencil"> UploadNotes</a>
                </li>
                <li>
                    <a href="#"data-toggle="tooltip" title="Hey!check your inbox"><span class="glyphicon glyphicon-inbox"> Inbox <span class="badge">1</span></a>
                </li>
                <li>
                    <a href="discuss.php"data-toggle="tooltip" title="Let's see who is talking!!!"><span class="glyphicon glyphicon-inbox"> Discussion <span class="badge">1</span></a>
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
                    $result=mysql_query("SELECT fuserid,fusername from freg where fuserid='$username'");
                   // echo $result;
                      while($row = mysql_fetch_assoc($result))
                      {

                          echo "<p>".$row['fuserid']."</p>";
                          //echo "<p>".$row['ausername']."</p>";     
                    }
                    ?>
                    <div class="col-lg-3 adminimg">
                        <?php
               // error_reporting(~E_ALL); 
                    //$id = $_GET['id'];
                //echo "SELECT auserid,ausername from areg where auserid='$username'";
                    $result=mysql_query("SELECT fuserid,fusername,fimg from freg where fuserid='$username'");
                   // echo $result;
                      while($row = mysql_fetch_assoc($result))
                      {
                        ?>
                        <div style="width:250px; height:250px;">
                            <p><strong>Profile Image</strong></p><img src="img/<?php echo $row['fimg'];?>"class="img-rounded" width="250px" height="250px" style="margin-bottom: 100px;"/><hr>
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
                    $result=mysql_query("SELECT fuserid,fusername,fimg,femail,fdept,fphone from freg where fuserid='$username'");
                   // echo $result;
                      while($row = mysql_fetch_assoc($result))
                      {
                        ?>
                        <p>UserID: <?php echo $row['fuserid'];?></p><hr>
                        <p>UserName: <?php echo $row['fusername'];?></p><hr>
                        <p>Email: <?php echo $row['femail'];?></p><hr>
                        <p>Depertment: <?php echo $row['fdept'];?></p><hr>
                        <p>Phone: <?php echo $row['fphone'];?></p><hr>
                        
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
