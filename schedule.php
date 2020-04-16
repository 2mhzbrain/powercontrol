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
$result = mysqli_query($mysqli, "SELECT * FROM schedule ORDER BY id DESC"); // using mysqli_query instead

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
        <h2 class="form-signin-heading">Room Schedule</h2>
      </form>

      <div class="form">


    <table width='50%' align="center" background="white" border=1>

    <tr bgcolor='#CCCCCC'>
        <td>Day</td>
        <td>Room Name</td>
        <td>Subject</td>
        <td>Start Time</td>
        <td>End Time</td>

    </tr>

    <?php 

        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($res = mysqli_fetch_array($result)) { 		
            echo "<tr>";
            echo "<td>".$res['day']."</td>";
            echo "<td>".$res['room']."</td>";
            echo "<td>".$res['subject']."</td>";	
            echo "<td>".$res['starttime']."</td>";
            echo "<td>".$res['endtime']."</td>";
            
        }

    ?>
    </table>
    </div>


      <form class="form-signin" action="main.php">
        <button class="btn btn-lg btn-primary btn-block" id="help" name="home">Main Menu</button>
      </form>
    </div> <!-- /container -->
    
    <script src='js/jquery.js'></script>

    <script src="js/index.js"></script>
  </body>
  
</html>
