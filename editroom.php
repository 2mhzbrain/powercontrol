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
	$room = mysqli_real_escape_string($mysqli, $_POST['room']);
	$result = mysqli_query($mysqli, "UPDATE room SET room='$room' WHERE id=$id");
		
	//redirectig to the display page. In our case, it is index.php
	header("Location: room.php");
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM room WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	
	$room = $res['room'];
	
}
?>

<?php
//including the database connection file
include_once("db.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM room ORDER BY id DESC"); // using mysqli_query instead
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
    <form action="editroom.php" method="post" name="form1" class="form-signin" autocomplete="off">
            <h2 class="form-signin-heading">Edit Room Name</h2>
            <input type="text" name="room" class="form-control" value="<?php echo $room;?>" placeholder="Room" required autofocus>
            <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
            </br>
            <button type="submit" name="update" class="btn btn-lg btn-primary btn-block">Update</button>
            <a href="room.php" class="btn btn-lg btn-primary btn-block" id="help">Back</a>
	</form>
</div>
    
<!--<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script> -->
</body>
</html>
