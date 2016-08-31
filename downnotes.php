<?php
include("dbconnect.php");



?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Download File</title>

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

                <!--Additional Information-->
                </pre>

<?php
/*if(isset($_GET['id'])) { // if id is set then get the file with the id from database

$id = $_GET['id'];

$query = "SELECT name, type, size, content FROM files WHERE id = $id";

$result = mysql_query($query) or die('Error, query failed');

list($name, $type, $size, $content) =

mysql_fetch_array($result);

header("Content-length: $size");

header("Content-type: $type");

header("Content-Disposition: attachment; filename=$name");

echo $content; exit;

}

?>

<?php

$query = "SELECT id, name FROM files";

$result = mysql_query($query) or die('Error, query failed');

if(mysql_num_rows($result) == 0)

{

echo "Database is empty";

}

else

{

while(list($id, $name) = mysql_fetch_array($result))

{
    echo "<tr>";
                    echo "<td>";echo $row["id"];
                    echo "<td>";echo $row["name"];

                    echo "<td>"; ?><a href="<?php echo $id; ?>">Download</a> <?php echo "</td>";



                    echo "</td>";
                    echo "</tr>";
                    echo "</table>";
?>

<?php

}

}
*/
?>

<pre>
<h2>Notes uploaded by faculty:</h2>


                <?php
                
                //if(isset($_GET['id'])) {
                //$id  = $_GET['id'];
             
                $res = mysql_query("SELECT * FROM files");
                echo "<table>";
                while ($row = mysql_fetch_array($res) ) {
                    echo "<tr>";
                    echo "<td>";echo $row["id"];
                    echo "<td>";echo $row['name'];
                    //echo "<td>";echo$row["path"];

                    echo "<td>"; ?><a href="<?php echo $row["id"]; ?>">Download</a> <?php echo "</td>";



                    echo "</td>";
                    echo "</tr>";
                }
                    echo "</table";
             // }

                ?>
 <!--addiional information-->
                

                </div>
                    <!--finish line-->
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
