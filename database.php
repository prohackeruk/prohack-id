<?php
	// Change these to actual server details
	$server = 'localhost';
	$username = 'root';
	$password = 'root';
	$database = 'prohack-id';

	try {
		$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
	} catch (PDOException $e) {
		// If you can't connect to the DB, throw the error you get
		die("Connection failed " . $e->getMessage());
	}
?>