<?php
//including the database connection file
include("db.php");

//getting id of the data from url
$id = $_GET['id'];

$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$access = $res['access'];
}
$_SESSION['message'] = $access;

if ( $access != "admin" ) {
    $access = "admin";
}else{
    $access = "user";
}

$result = mysqli_query($mysqli, "UPDATE users SET access='$access' WHERE id=$id");

//redirecting to the display page (index.php in our case)
header("Location:manageuser.php");
?>

