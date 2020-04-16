<?php 
session_start();
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in!";
  header("location: error.php");    
}
else {
    $username = $_SESSION['username'];
}
?>
<?php
//including the database connection file

include_once("db.php");
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM subject ORDER BY id"); // using mysqli_query instead
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Automated Power Control</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet/less">
  
    

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
  
  <body>
  <div class="form">
    <form action="addsubject.php" method="post" name="form1" class="form-signin" autocomplete="off">
        <h2 class="form-signin-heading">Add New Subject</h2>
        <input type="text" name="subject" class="form-control" placeholder="Subject Name" required autofocus>
        </br>
        <button type="submit" name="Submit" class="btn btn-lg btn-primary btn-block">Submit</button>
        <a href="subject.php" class="btn btn-lg btn-primary btn-block" id="help">Cancel</a>
        <?php
    //including the database connection file
    include_once("db.php");
    
    if(isset($_POST['Submit'])) {	
        $subject = mysqli_real_escape_string($mysqli, $_POST['subject']);
        $result = mysqli_query($mysqli, "INSERT INTO subject(subject) VALUES('$subject')");
        echo "<font color='green'>New Subject added successfully.";
        }
    ?>
    </form>
    </div>

    <div class="container">
        
    </div> <!-- /container -->
    <script src='js/jquery.js'></script>
 
    <script src="js/index.js"></script>


  </body>
  
</html>