
<?php 
require 'db.php';
session_start();
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
  
  <?php 
  if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      require 'login.php';
    } ?>
  <body>

    <div class="container">

      <form class="form-signin" action="index.php" method="post" autocomplete="off">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputusername" class="sr-only">Username</label>
        <input type="text" name="username"id="inputusername" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
        </div>
        <button class="btn btn-lg btn-primary btn-block" id="login">Sign in</button>
      </form>

    </div> <!-- /container -->
    <script src='js/jquery.js'></script>

    <script src="js/index.js"></script>
  </body>
  
</html>
