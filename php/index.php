<?php
	include("DBOperations.php");
	
	$databaseName = "agenda";
	$tableName = "contact";
	$field1 = "name";
	$field2 = "phone";
	$table = " (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			$field1 VARCHAR(30) NOT NULL,
			$field2 VARCHAR(11)
	)";
	$connection = openConnection($databaseName);
#	createDataBase($connection, $databaseName);
#	createTable($connection, $tableName, $table);
#	renameTable($connection, "contato", $tableName);
#	dropTable($connection, $tableName);
#	insertIntoTable($connection, $tableName, $field1, "contact1", $field2, "phone1");	
#	selectFromTable($connection, $tableName, $field1, $field2);
#	selectFromTableByValue($connection, $tableName, $field1, $field2, $field1, "contact4");
#	selectFromTableOrdered($connection, $tableName, $field1, $field2, $field1);
#	deleteFromTable($connection, $tableName, "name", "contact1");
#	updateFromTable($connection, $tableName, 8, $field1, "Marcos");
	updateFromTable($connection, $tableName, 8, $field2, "123123");
	closeConnection($connection);
?>
