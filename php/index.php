<?php
	include("DBOperations.php");
	
	$databaseName = "agenda";
	$tableName = "contact";
	$table = " (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			name VARCHAR(30) NOT NULL,
			phone VARCHAR(11)
	)";
	$connection = openConnection($databaseName);
#	createDataBase($connection, $databaseName);
#	createTable($connection, $tableName, $table);
#	renameTable($connection, "contato", $tableName);
	dropTable($connection, $tableName);
	closeConnection($connection);
?>
