<?php
/* Registration process, inserts user info into the database 
   and sends account confirmation username message
 */

// Set session variables to be used on profile.php page
$_SESSION['username'] = $_POST['username'];
$_SESSION['name'] = $_POST['name'];

// Escape all $_POST variables to protect against SQL injections
$name = $mysqli->escape_string($_POST['name']);
$username = $mysqli->escape_string($_POST['username']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );
      
// Check if user with that username already exists
$result = $mysqli->query("SELECT * FROM users WHERE username='$username'") or die($mysqli->error());

// We know user username exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'User with this username already exists!';
    header("location: error.php");
    
}
else { // Email doesn't already exist in a database, proceed...

    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO users (name, username, password, hash) " 
            . "VALUES ('$name','$username','$password', '$hash')";

    // Add user to the database
    if ( $mysqli->query($sql) ){

        //$_SESSION['active'] = 0; //0 until user activates their account with verify.php
        $_SESSION['logged_in'] = true; // So we know the user has logged in
        $_SESSION['message'] = 'Registration success, try to login.';
        header("location: success.php"); 

    }

    else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: error.php");
    }

}