<?php
/* Log out process, unsets and destroys session variables */
session_start();
session_unset();
session_destroy(); 
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
        <form class="form-signin" action="index.php">
        <h3 class="form-signin-heading">You have been logged out.</h3>
            <button class="btn btn-lg btn-primary btn-block" id="home">Home</button>
        </form>
    </div> <!-- /container -->
    <script src='js/jquery.js'></script>

    <script src="js/index.js"></script>
  </body>
  
</html>
