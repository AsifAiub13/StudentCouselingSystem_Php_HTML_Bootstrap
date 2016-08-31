<?php
//including the database connection file
include_once("dbconnect.php");
 
//getting id of the data from url
$id = $_GET['id'];
 
//deleting the row from table
$result = mysql_query("DELETE FROM courses WHERE cid=$id");
 
//redirecting to the display page (index.php in our case)
header("Location:adminupdatedata.php");
?>