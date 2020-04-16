<?php

    // Prepare variables for database connection
   
    // Connect to your database
	$databaseHost = 'localhost';
	$databaseName = 'powercontrol';
	$databaseUsername = 'root';
	$databasePassword = 'pi3';

	$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);


    // Prepare the SQL statement

    $result = mysqli_query($mysqli, "UPDATE room SET status=('".$_GET["status"]."') WHERE id=2");   


?>