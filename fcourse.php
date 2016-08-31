<?php
include_once("dbconnect.php");


    if(isset($_POST['submit'])) {	
	$name = $_POST['name'];
	$faculty = $_POST['faculty'];
	$limit = $_POST['limit'];
		
	// checking empty fields
	if(empty($name) || empty($faculty) || empty($limit)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($faculty)) {
			echo "<font color='red'>Faculty field is empty.</font><br/>";
		}
		
		if(empty($limit)) {
			echo "<font color='red'>Limit field is empty.</font><br/>";
		}
		
		//link to the previous page
		//echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysql_query("INSERT INTO courses(cname,cfaculty,climit) VALUES('$name','$faculty','$limit')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='adminprofile.php'>View Result</a>";
	}
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Courses</title>

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
      <a class="navbar-brand" href="#">Courses</a>
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
        <!-- Sidebar -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
            <!--OverView-->
                <div class="row adfacultylist">
                    <div class="col-md-8">
                        
                    </div>
                        <div class="col-md-offset-4">
                            <div class="input-group">
                                <input type="text" class="form-control"placeholder="Search for...">
                                <span class="input-group-btn">
                                <button class="btn btn-primary" type="button"><span class="glyphicon glyphicon-search"> Search</button>
                                </span>
                            </div><!-- /input-group -->
                        </div><!-- /.col-lg-6 -->
                    </div><!-- /.col-lg-6 -->
  
                <div class="row">           
                  <table class="table table-hover" style="margin-top:30px;">
                    <thead>
                      <tr>
                        <th>CourseId</th>
                        <th>CourseName</th>
                        <th>Faculty</th>
                        <th>Limit</th>
                        
                      </tr>
                    </thead>
      			<tbody>
      				<?php
      				$result=mysql_query("SELECT * from courses");
			          while($row = mysql_fetch_assoc($result))
			          {
						 echo "<tr>";

			              echo "<td>".$row['cid']."</td>";
			              echo "<td>".$row['cname']."</td>";
			              echo "<td>".$row['cfaculty']."</td>";
			              echo "<td>".$row['climit']."</td>";
			              
			              		

			              /*echo "<td><a href=\"#myModal\">Edit</a>| <a href=\"#\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";*/		
					}
					?>
        			</tbody>
        			</table>
               
                </div>
                
               
        </div>
        </div> 


  <!--  Add Modal -->
  <div class="modal fade" id="add" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      

      

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
