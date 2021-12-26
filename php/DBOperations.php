<?php
	function openConnection($dbname)
	{
		$dbhost = "127.0.0.1";
		$dbuser = "root";
		$dbpass = "MQjLTkEoTc714U][";

		$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

		if ($connection->connect_error)
		{
			die("Connection failed: " .$connection->connect_error);
		}
		
		return $connection;
	}
	function closeConnection($connection)
	{
		$connection->close();
	}
	function createDataBase($connection, $name){
		$sql = "CREATE DATABASE " .$name;
		if ($connection->query($sql) === TRUE)
		{
			echo "Database created successfully";
		}
		else
		{
			echo "Error creating database: " .$connection->error;
		}
	}
	function createTable($connection, $name, $table)
	{
			$sql = "CREATE TABLE $name $table";

			if($connection->query($sql) === TRUE)
			{
				echo "Table $name created successfully";
			}
			else
			{
				echo "Error creating table: $connection->error";
			}
	}
	function renameTable($connection, $oldName, $newName)
	{
		$sql = "RENAME TABLE $oldName to $newName";
		
		if($connection->query($sql) === TRUE)
		{
			echo "Table $oldName renamed to $newName successfully";
		}
		else
		{
			echo "Error: rename failed";
		}
	}
?>
