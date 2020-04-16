
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

    <div class="container">
      
      <form class="form-signin">
        <h2 class="form-signin-heading">Help</h2>
        <h6>
        Instruction: Very Easy To Use :)
        </h6>
      </form>
      <form class="form-signin" action="main.php">
        <button class="btn btn-lg btn-primary btn-block" id="help" name="home">Home</button>
      </form>
    </div> <!-- /container -->
    
    <script src='js/jquery.js'></script>

    <script src="js/index.js"></script>
  </body>
  
</html>
