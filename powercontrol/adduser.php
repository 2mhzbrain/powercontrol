
<?php 
require 'db.php';
session_start();
if ( $_SESSION['access'] != "admin" ) {
    $_SESSION['message'] = "Unauthorized Access!";
    header("location: error2.php");    
  }
  else {
      $username = $_SESSION['username'];
  }
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

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
  

  <body>

    <div id="signup" class="container">

      <form class="form-signin" action="adduser.php" method="post" autocomplete="off">
        <h2 class="form-signin-heading">Register User</h2>
        <label for="inputname" class="sr-only">Name</label>
        <input type="text" name="name" class="form-control" placeholder="Name" required autofocus>
        <label for="inputusername" class="sr-only">Username</label>
        <input type="textbox" name="username" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password">
        <button type="submit" name="Submit" class="btn btn-lg btn-primary btn-block" id="register">Add</button>
        <a href="manageuser.php" class="btn btn-lg btn-primary btn-block">Back</a>
        <?php
		//including the database connection file
		include_once("db.php"); 
		
		if(isset($_POST['Submit'])) {	
      
			$name = mysqli_real_escape_string($mysqli, $_POST['name']);
			$username = mysqli_real_escape_string($mysqli, $_POST['username']);
      $password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
      $hash = $mysqli->escape_string( md5( rand(0,1000) ) );
      $access = "user";
      
			$result = mysqli_query($mysqli, "INSERT INTO users(name,username,password,hash,access) VALUES('$name','$username','$password','$hash','$access')");
      echo "<font color='green'>New User added successfully.";
			}
		?>
      </form>
      
    </div> <!-- /container -->
    <script src='js/jquery.js'></script>

    <script src="js/index.js"></script>
  </body>
  
</html>
