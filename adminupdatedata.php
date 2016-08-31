
<?php
include_once("dbconnect.php");
//include("adminedit.php");
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

    <title>Update Database</title>

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
      <a class="navbar-brand" href="#">Admin Profile</a>
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
                        Welcome Admin
                    </a>
                </li>
                <li>
                    <a href="adminprofile.php"><span class="glyphicon glyphicon-user"> Profile</a>
                </li>
                
                <li>
                    <a href="adminupdatedata.php"><span class="glyphicon glyphicon-pencil"> UpdateDatabase</a>
                </li>
                <li>
                    <a href="adminnews&noti.php"><span class="glyphicon glyphicon-info-sign"> News&Notification</a>
                </li>
                
                <li>
                    <a href="aregistration.php"data-toggle="tooltip" title="Let's see who is talking!!!"><span class="glyphicon glyphicon-inbox"> Registration <span class="badge">1</span></a>
                </li>
                <li>
                    <a href="#"data-toggle="tooltip" title="Hey!check your inbox"><span class="glyphicon glyphicon-inbox"> Inbox <span class="badge">1</span></a>
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
                  
      				<?php
                      echo"<thead>";
                      echo"<tr>";
                        echo"<th>Select</th>";
                        $id="<th>Course ID</th>";
                        $course="<th>CourseName</th>";
                        $faculty="<th>Faculty</th>";
                        $limit="<th>Limit</th>";
                        echo"$id";
                        echo"$course";
                        echo"$faculty";
                        echo"$limit";
                        
                      echo"</tr>";
                    echo"</thead>";
                echo "<tbody>";
                   $i=0;
                    $checkboxes ="<input type='checkbox' name='selected[]' value='$i++'/><br />";
                       if (isset($_POST["submitc"])) {
                        $checkboxes ="<input type='checkbox' name='selected[]'/><br />";
                    for ($i=0; $i <sizeof($checkboxes) ; $i++) { 
                            # code...
                            $sqlres="INSERT INTO scourse(cid,cname,cfaculty) VALUES('".$checkboxes[$i]."')";
                            mysql_query($sqlres)or die(mysql_query($sqlres));
                            echo "string";
                        }
                        echo "Record insertred";
                    }
      				$result=mysql_query("SELECT * FROM courses");
			          while($row = mysql_fetch_assoc($result))
			          {
						 echo "<tr class=\"ptr_class\">";
                          echo "<td>$checkboxes</td>";
			              echo "<td>".$row['cid']."</td>";
			              echo "<td class=\"cname\">".$row['cname']."</td>";
			              echo "<td class=\"cfaculty\">".$row['cfaculty']."</td>";
			              echo "<td class=\"climit\">".$row['climit']."</td>";
			              echo "<td>
			              		<a href=\"adminedit.php?id=$row[cid]\" data-toggle=\"modal\" data-target=\"#edit\"><button>Edit</button></a>
			              		
			              			<a href=\"admindelete.php?id=$row[cid]\"onClick=\"return confirm('Are you sure you want to delete?')\"><button>Delete</button></a>
			              		</td>";
                               
			              		

			              /*echo "<td><a href=\"#myModal\">Edit</a>| <a href=\"#\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";*/		
					}
					?>
        			</tbody>
        			</table>
               
                </div>
                <div class="col-md-offset-4">
                                        <!--POST COURSE-->

                <form class="form-horizontal" role="form" method="POST">
                
                    <div class="navbar-right" style="margin-right:20px;">
                    <!-- The form which is used to populate the item data -->
                        <button type="button" class="btn btn-primary" name="submitc"><span class="glyphicon glyphicon-saved"></span>Post</button>
                    </div>
                                      <!--ADD BUTTON-->
                </form>
                <div class="navbar-right" style="margin-right:20px;">
                    <!-- The form which is used to populate the item data -->
                        <button class="btn btn-primary" data-toggle="modal" data-target="#add"><span class="glyphicon glyphicon-saved"></span>Add</button>

                    </div>
                </div>
               
        </div>
        </div> 

<!--modal add-->
<div class="modal fade" id="add" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add a new Course</h4>
        </div>
        <div class="modal-body">
          <!--form-->
          <form class="form-horizontal" role="form" method="post">
                    <!--coursename-->
                    <div class="form-group" role="form">
                        <label class="control-label col-md-2"for="exampleInputEmail1">CourseName:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="CourseName" name="name">
                        </div>
                    </div>
                    <!--faculty-->
                         <div class="form-group" role="form">
                            <label class="control-label col-md-2"for="exampleInputEmail1">Faculty:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="Faculty" name="faculty">
                            </div>
                        </div>
                        <!--limit-->
                        <div class="form-group">
                            <label class="control-label col-md-2" for="exampleInputEmail1">Limit:</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="Limit" name="limit">
                            </div>
                        </div>
                                                <!--Button-->
                        <div class="form-group">        
                            <div class=" col-md-12">
                               <input type="submit" name="submit" class="btn btn-primary btn-block" value="submit">
                               </div> 
                        </div>
            </form>
            </div>

        
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
     <!--Edit modal-->
     
  	<!-- Modal -->
<div id="edit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Course Edit</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">                 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
</div>
</div>
</div>

     <!--Edit modal-->

        <!-- /#page-content-wrapper -->
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $('.make_edit').click(function(){
        //alert($(this).parent('tr').children('.cname'));
        var cname=$(this).parent().parent('.ptr_class').find('.cname').text();
        var cfaculty=$(this).parent().parent('.ptr_class').find('.cfaculty').text();
        var climit=$(this).parent().parent('.ptr_class').find('.climit').text();
        $('.txt_coursename').val(cname);
        $('.txt_faculty').val(cfaculty);
        $('.txt_limit').val(climit);

        //console.log( $(this).parent().parent('.ptr_class').find('.cname').text()); 
    });
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
