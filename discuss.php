<?php
//Database connection
  include_once("dbconnect.php");

  //Add comments
  if (isset($_POST['submit'])) {
    # code...
    $usercmt=$_POST['comment'];
    $name=$_POST['username'];
    if (empty($usercmt)||empty($name)) {
      # code...
      if (empty($usercmt)) {
        # code...
        echo "comment field is empty";
      }
      if (empty($name)) {
        # code...
        echo "Name field is empty";
    }
  }else{
    $result=mysql_query("INSERT INTO discussion(name,comment,post_time) VALUES('$name','$usercmt',CURRENT_TIMESTAMP)");
    echo "add data";
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

    <title>Discussion</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!--js-->
    <script type="text/javascript" src="jqurey.js">
<script type="text/javascript">
function post()
{
  var comment = document.getElementById("comment").value;
  var name = document.getElementById("username").value;
  if(comment && name)
  {
    $.ajax
    ({
      type: 'post',
      url: 'postcomment.php',
      data: 
      {
         user_comm:comment,
         user_name:name
      },
      success: function (response) 
      {
      document.getElementById("all_comments").innerHTML=response+document.getElementById("all_comments").innerHTML;
      document.getElementById("comment").value="";
        document.getElementById("username").value="";
  
      }
    });
  }
  
  return false;
}
</script>
</head>

<body style="background-color:#eff5f5;">

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Feel free to discuss any academic topic here. Don't use bad comment/slang.</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li>
        
        </li>
    </ul>
  </div>
</nav>
 
   
    

        <!-- Sidebar -->
        

        <!-- Page Content -->
  <div id="page-content-wrapper">
            <div class="container-fluid">
            <!--OverView-->
                <div class="row adfacultylist">
                </div><!-- /.col-lg-6 -->
                
        <!--textarea-->
                <form role="form" method="post" action="" onsubmit="return post();">
                <div class="form-group ">
                    <label for="comment">Write your discussion topic here:</label>
                    <textarea class="form-control" rows="5" id="comment" name="comment"placeholder="Write Your Topic Here....."></textarea>
                    </div>

             <!--userName-->
                    <div class="form-group" role="form">
                        <div class="col-md-offset-8">
                            <input  type="text" class="form-control" id="username" name="username"placeholder="ID">
                        </div>
                    </div>   
            <div class="row">
                <div class="col-md-offset-10">
                    <input style="width: 150px;" type="submit" class="btn btn-primary btn-block " name="submit" value="Post">  
                </div>

            </div>
                
                </form>
                  
            
            <!--All comments-->
<div id="all_comments">
  <?php
    $host="localhost";
    $username="root";
    $password="";
    $databasename="scs";

    $connect=mysql_connect($host,$username,$password);
    $db=mysql_select_db($databasename);
  
    $comm = mysql_query("select name,comment,post_time from discussion order by post_time desc");
    while($row=mysql_fetch_array($comm))
    {
    $name=$row['name'];
    $comment=$row['comment'];
    $time=$row['post_time'];
    ?>
  <div style="margin-top: 25px;"class="panel-success class">

      <div class="panel-heading"><h4 class="name">Posted By: <?php echo  $name;?></h4></div>
      <div class="panel-body"><h5 class="comment">Topic: <?php echo $comment;?></h5></div>
      <div class="panel-body"> </div><p style="margin-left: 1000px;" class="time">Commented on: <?php echo $time;?></p> 
      </div>
    </div>

  
  
    <?php
    }
    ?>

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
