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
// including the database connection file
include_once("db.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$day = mysqli_real_escape_string($mysqli, $_POST['day']);
	$room = mysqli_real_escape_string($mysqli, $_POST['room']);
	$subject = mysqli_real_escape_string($mysqli, $_POST['subject']);	
	$starttime = mysqli_real_escape_string($mysqli, $_POST['starttime']);
	$endtime = mysqli_real_escape_string($mysqli, $_POST['endtime']);
	
	$result = mysqli_query($mysqli, "UPDATE schedule SET day='$day',room='$room',subject='$subject',starttime='$starttime',endtime='$endtime' WHERE id=$id");
		
	//redirectig to the display page. In our case, it is index.php
	header("Location: manage.php");
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM schedule WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$day = $res['day'];
	$room = $res['room'];
	$subject = $res['subject'];
	$starttime = $res['starttime'];
	$endtime = $res['endtime'];
}
?>

<?php
//including the database connection file
include_once("db.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM schedule ORDER BY id DESC"); // using mysqli_query instead
?>


<!DOCTYPE html>
<html >
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
    <form action="edit.php" method="post" name="form1" class="form-signin" autocomplete="off">
            <h2 class="form-signin-heading">Edit Schedule</h2>
			
			<select name="day" class="form-control" autofocus>
				<option value="Monday">Monday</option>
				<option value="Monday">Tuesday</option>
				<option value="Monday">Wednesday</option>
				<option value="Monday">Thursday</option>
				<option value="Monday">Friday</option>
				<option value="Monday">Saturday</option>
				<option value="Monday">Sunday</option>
     		</select>
           	
			<select name="room" class="form-control" autofocus>
              <option value="<?php echo $room;?>"><?php echo $room;?></option>
              <?php 

                  
                  $sql = mysqli_query($mysqli, "SELECT * FROM room");

                  while ($row = $sql->fetch_assoc()){

                      echo "<option value=\"{$row['room']}\">{$row['room']}</option>";

                  }

              ?>

            </select>

            <select name="subject" class="form-control" autofocus>
              <option value="<?php echo $subject;?>"><?php echo $subject;?></option>
              <?php 

                  
                  $sql = mysqli_query($mysqli, "SELECT * FROM subject");

                  while ($row = $sql->fetch_assoc()){

                      echo "<option value=\"{$row['subject']}\">{$row['subject']}</option>";

                  }

              ?>

            </select>

            <input id="timepicker" type="text" name="starttime" class="form-control" value="<?php echo $starttime;?>" placeholder="Start Time" required autofocus>
            </br>
            <input id="timepicker2" type="text" name="endtime" class="form-control" value="<?php echo $endtime;?>" placeholder="End Time" required autofocus>
            <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
            </br>
            <button type="submit" name="update" class="btn btn-lg btn-primary btn-block">Update</button>
            <a href="manage.php" class="btn btn-lg btn-primary btn-block" id="help">Back</a>
	</form>
</div>

     <script src='js/jquery.js'></script>

    
    <script src="js/index.js"></script>
    
 <script src="js/jquery-1.12.4.min.js"></script>
 <script src="js/timepicker.js"></script>
</body>
</html>
