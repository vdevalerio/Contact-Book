<?php
	include("DBOperations.php");
	
	$database = "agenda";
	$table = " (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			name VARCHAR(30) NOT NULL,
			phone VARCHAR(11)
	)";
	$connection = openConnection($database);
	createDataBase($connection, $database);
	createTable($connection, "contato", $table);
	closeConnection($connection);
?>
