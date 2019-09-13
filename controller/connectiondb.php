<?php
	// connection variables - contains the server, user, password and database to connect
	$server = "localhost";
	$userDB = "root";
	$password = "";
	$database = "sdooseDB";

	// Create connection query
	$conn = mysqli_connect($server, $userDB, $password, $database);

	// Connection status feedback
	if (!$conn) {
    	die("Connection Database failed: " . mysqli_connect_error());
	}
	//echo "Conectado com sucesso";
?>