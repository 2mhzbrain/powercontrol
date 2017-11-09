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

    include_once("db.php");

    $result = mysqli_query($mysqli, "SELECT * FROM subject ORDER BY id DESC");

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

  <div class="form">
  
    <form class="form-signin">
        <h2 class="form-signin-heading">Manage Subjects</h2>
    </form>

    <table width='50%' align="center" background="white" border=1>
    
    <tr bgcolor='#CCCCCC'>
       
        <td>Subjects</td>
        <td>Options</td>

    </tr>

    <?php 

        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($res = mysqli_fetch_array($result)) { 		
            echo "<tr>";
            echo "<td>".$res['subject']."</td>";
            echo "<td><a href=\"editsubject.php?id=$res[id]\">Edit</a> | <a href=\"deletesubject.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
        }

    ?>
    </table>
    </div>

    <div class="container">
        <form class="form-signin">
            <a href="addsubject.php" class="btn btn-lg btn-primary btn-block" >Add New Subject</a>
            <a href="settings.php" class="btn btn-lg btn-success btn-block">Settings</a>
        </form>

    </div> <!-- /container -->
    <script src='js/jquery.js'></script>

    <script src="js/index.js"></script>
  </body>
  
</html>