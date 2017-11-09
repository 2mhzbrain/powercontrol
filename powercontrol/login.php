<?php
/* User login process, checks if user exists and password is correct */

// Escape email to protect against SQL injections
$username = $mysqli->escape_string($_POST['username']);
$result = $mysqli->query("SELECT * FROM users WHERE username='$username'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User doesn't exist!";
    header("location: error.php");
}
else { // User exists
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['password'], $user['password']) ) {
        
        $_SESSION['username'] = $user['username'];
        
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;
        $_SESSION['access'] = $user['access'];
        if ( $_SESSION['access'] != "admin" ) {
            $_SESSION['hide'] = "hidden";
          } else {
            $_SESSION['hide'] = "";
          }
          
        header("location: main.php");
    }
    else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: error.php");
    }
}