<?php
// including the database connection file
include_once("dbconnect.php");
 
if(isset($_POST['submit']))
{	
	$id = $_POST['id'];
	$name = $_POST['name'];
	$faculty = $_POST['faculty'];
	$limit = $_POST['limit'];
	
	// checking empty fields
	if(empty($name) || empty($faculty) || empty($limit)) {	
			
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($faculty)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($limit)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysql_query("UPDATE courses SET cname='$name',cfaculty='$faculty',climit='$limit' WHERE cid=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location:adminupdatedata.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysql_query("SELECT * FROM courses WHERE cid=$id");
 
while($row = mysql_fetch_array($result))
{
	
	$name = $row['cname'];
	$faculty = $row['cfaculty'];
	$limit = $row['climit'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>
 
<body>
	<h2 style="margin-left:30px; color:grey;  ">Edit course</h1>
	
	<form name="form1" method="post" action="adminedit.php"class="form-horizontal" role="form">
					<!--Edit CourseName-->
					<div class="form-group" role="form">
                        <label style="margin-left: 30px;"class="control-label col-md-2"for="exampleInputEmail1">CourseName:</label>
                        <div class="col-md-8">
                        <input type="text"class="form-control" name="name" placeholder="coursename "value=<?php echo "$name";?>>
                        </div>
                    </div>
                    <!--Edit facultyName-->
                    <div class="form-group" role="form">
                        <label style="margin-left: 30px;"class="control-label col-md-2"for="exampleInputEmail1">FacultyName:</label>
                        <div class="col-md-8">
                        <input type="text"class="form-control" name="faculty" placeholder="Faculty "value=<?php echo "$faculty";?>>
                        </div>
                    </div>
                    <!--Edit Limit-->
                    <div class="form-group" role="form">
                        <label style="margin-left: 30px;"class="control-label col-md-2"for="exampleInputEmail1">Limit:</label>
                        <div class="col-md-8">
                        <input type="text"class="form-control" name="limit" placeholder="Limit "value=<?php echo "$limit";?>>
                        </div>
                    </div>
                    <!--Update Button-->
                    <div class=" col-md-12">
                                <input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>

                                <input type="submit" name="submit" class="btn btn-primary btn-block" value="Update"></input>
                    </div>

		</table>
	</form>
</body>
</html>