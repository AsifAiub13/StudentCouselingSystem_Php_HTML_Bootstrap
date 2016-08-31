<?php
    error_reporting(~E_ALL & ~E_NOTICE);
    include_once("dbconnect.php");


    if(isset($_POST['submit'])) {   
    $susername = $_POST['username'];
    $suserid = $_POST['userid'];
    $spass = $_POST['userpass'];
    $semail = $_POST['useremail'];
    $sdept = $_POST['userdept'];
    $sphone = $_POST['userphone'];
    $ssemister = $_POST['usersemister'];
    $scgpa = $_POST['usercgpa'];
    //$fimg = $_POST['userpass'];

    $imgFile = $_FILES['user_image']['name'];
    $tmp_dir = $_FILES['user_image']['tmp_name'];
    $imgSize = $_FILES['user_image']['size'];
    
        
    // checking empty fields
    if(empty($susername) || empty($suserid) || empty($spass)) {
                
        if(empty($susername)) {
            //echo "Please Enter Username.";
            $errMSG= "Please Enter Username!!";
            
        }
        
        else if(empty($suserid)) {
            $errMSG ="Please Enter Your UserID!!";
            
        }
        
        else if(empty($spass)) {
            $errMSG ="Please Enter Your Password!!";
        }
        else if(empty($imgFile)){
            $errMSG = "Please Select an Image File!!";
        }
        
    } else {

            $upload_dir = 'img/'; // upload directory
    
            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
        
            // valid image extensions
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
        
            // rename uploading image
            $userpic = rand(1000,1000000).".".$imgExt;
                
            // allow valid image file formats
            if(in_array($imgExt, $valid_extensions)){           
                // Check file size '5MB'
                if($imgSize < 5000000){
                    move_uploaded_file($tmp_dir,$upload_dir.$userpic);
                }
                else{
                    $errMSG = "Sorry, less than 5MB file is accepted only!!";
                }
            }
            else{
                $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed!!";        
            }
        } 
        //for IMAGE

        //insert data to database  
        // if all the fields are filled (not empty) 
        if(!isset($errMSG))
        {
        $result = mysql_query("INSERT INTO sreg(suserid,susername,spass,scgpa,sdept,semail,sphone,ssemister,simg) VALUES('$suserid','$susername','$spass','$scgpa','$sdept','$semail','$sphone','$ssemister','$userpic')");
        
        if($result==true)
            {
                $successMSG = "new record succesfully inserted ...";
                //header("Location: index.php"); // redirects image view page after 5 seconds.
            }
            else
            {
                $errMSG = "error while inserting....";
            }
            $successMSG = "new record succesfully inserted ...";

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
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container col-lg-7">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header navhead customhead page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <a class="navbar-brand page-scroll"  style="color: white;background: black;" href="href=#page-top">Student Counseling System</a>
            </div>
        </div>
         <!-- /.container -->
           <!-- Collect the nav links, forms, and other content for toggling -->
                 
</nav>

    <!-- Page Content -->
    <div class="container-fluid">
        <!-- /.row -->
        <!-- Portfolio Item Row -->
        <div class="row">
            <!--Registartion-->
            <div class="col-md-12 ">
                <div class="col-md-7">
                     <img class="img-responsive" src="img/register.png" alt="study"style="width: 100%; margin-top: 100px;">
                </div>




                <div class="col-md-5" style="margin-top: 100px;">
                <h1>Register a new Student</h1> 
                <div class="input-group-btn">
                    <button style="margin-left: 380px; margin-bottom: 10px;" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select User Type<span class="caret"></span></button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li><a href="fregistration.php">Faculty</a></li>
                      <li><a href="sregistration.php">Student</a></li>
                      <li><a href="pregistration.php">Parents</a></li>
                    </ul>
                </div>
                <?php
            if(isset($errMSG)){
                    ?>
                    <div class="alert alert-danger">
                        <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
                    </div>
                    <?php
            }
            else if(isset($successMSG)){
                ?>
                <div class="alert alert-success">
                      <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
                </div>
                <?php
            }
            ?>  
                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                <!--User Id-->
                        <div class="form-group">
                            <label class="control-label col-md-2">UserId</label>
                            <div class="col-md-10">
                                <input maxlength="8" type="text" class="form-control"placeholder="ID" name="userid">
                            </div>
                        </div>
                    <!--userName-->
                    <div class="form-group" role="form">
                        <label class="control-label col-md-2">Email:</label>
                        <div class="col-md-10">
                            <input maxlength="100" type="text" class="form-control"placeholder="Email" name="useremail">
                        </div>
                    </div>
                        <!--userName-->
                    <div class="form-group" role="form">
                        <label class="control-label col-md-2">Dept:</label>
                        <div class="col-md-10">
                            <input maxlength="8" type="text" class="form-control"placeholder="Dept" name="userdept">
                        </div>
                    </div>
                    <!--userName-->
                    <div class="form-group" role="form">
                        <label class="control-label col-md-2">Phone:</label>
                        <div class="col-md-10">
                            <input maxlength="11" type="text" class="form-control"placeholder="Phone" name="userphone">
                        </div>
                    </div>
                    <!--userName-->
                    <div class="form-group" role="form">
                        <label class="control-label col-md-2">Semister:</label>
                        <div class="col-md-10">
                            <input maxlength="11" type="text" class="form-control"placeholder="Semister" name="usersemister">
                        </div>
                    </div>
                    <!--userName-->
                    <div class="form-group" role="form">
                        <label class="control-label col-md-2">CGPA:</label>
                        <div class="col-md-10">
                            <input maxlength="4" type="text" class="form-control"placeholder="CGPA" name="usercgpa">
                        </div>
                    </div>
                    
                    <!--userName-->
                    <div class="form-group" role="form">
                        <label class="control-label col-md-2">Username:</label>
                        <div class="col-md-10">
                            <input maxlength="8" type="text" class="form-control"placeholder="username" name="username">
                        </div>
                    </div>

                        <!--Password-->
                        <div class="form-group">
                            <label class="control-label col-md-2">Password</label>
                            <div class="col-md-10">
                                <input maxlength="8" type="password" class="form-control"placeholder="Password" name="userpass">    
                            </div>
                        </div>
                        <!--Images-->
                        <div class="form-group">
                            <div class="col-md-10">
                            <label class="control-label">ProfileImage</label>
                            <input class="input-group" type="file" name="user_image" accept="image/*" />
                            </div>
                        </div class="form-group">

                        <!--Button-->
                        <div class="form-group">        
                            <div class=" col-md-12">
                                <input type="submit" class="btn btn-primary btn-block" name="submit"value="Sign Up">
                            </div>
                        </div>
                        <div class="form-group">        
                            <div style="margin-top: 10px;" class=" col-md-12">
                                <a href="adminprofile.php"class="btn btn-primary btn-block " role="button">Back</a>
                            </div>
                        </div> 
                    </form>

                </div>
                
        

            
            </div>

 </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/clean-blog.min.js"></script>

</body>

</html>
