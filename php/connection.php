<?php

	$server 	= "rsvp.db";
	$username 	= "gingaranga";
	$password 	= "Ch33K02?";
	$db 		= "reserve";

	// Create connection
	$conn = mysqli_connect($server, $username, $password, $db);

	// Check connection, then kill connection
	if (!$conn) {
		die( "Connection failed: " . mysqli_connect_error() );
	}

	//echo "Connected successfully!";

?>