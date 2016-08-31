<?php if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)

{

$fileName = $_FILES['userfile']['name'];

$tmpName  = $_FILES['userfile']['tmp_name'];

$fileSize = $_FILES['userfile']['size'];

$fileType = $_FILES['userfile']['type'];

$fp = fopen($tmpName, 'r');

$content = fread($fp, filesize($tmpName));

$content = addslashes($content);

fclose($fp);

//dir
        $upload_dir = 'downloads/'; // upload directory
    
        $fileExt = strtolower(pathinfo($fileName,PATHINFO_EXTENSION)); // get image extension
        
            // valid image extensions
        $valid_extensions = array('txt', 'pdf', 'doc', 'docx'); // valid extensions
        
            // rename uploading image
        //$userpic = rand(1000,1000000).".".$fileExt;
        if(in_array($fileExt, $valid_extensions)){           
                // Check file size '5MB'
                if($filesize < 5000000){
                    move_uploaded_file($tmpName,$upload_dir.$fileName);
                }
                else{echo "errrrrror!!!!!";}






if(!get_magic_quotes_gpc())

{

$fileName = addslashes($fileName);

}

mysql_connect("localhost","root","");

mysql_select_db("scs");

$query = "INSERT INTO files (name, size, type, content) ".

"VALUES ('$fileName', '$fileSize', '$fileType', '$content')";

mysql_query($query) or die('Error, query failed');

echo "
File $fileName uploaded
";

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

    <title>Faculty Home</title>

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
                <!--Additional Information-->

                    <!--addiional information-->
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group ">
                    <h2>Upload a file:</h2>
                    <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
                    </div>
                    <div class="form-group ">
                    <h3>Select your file here:</h3>
                    <input id="userfile" type="file" name="userfile" />
                    <input id="upload" type="submit" name="upload" onclick="up()" value=" Upload " />
                    <script type="text/javascript">
                        function up(){
                            alert("Successfully uploaded!!!");


                        }

                    </script>
                    </form>

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
