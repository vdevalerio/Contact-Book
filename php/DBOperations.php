<?php

	function openConnectionServer()
	{
		$dbhost = "127.0.0.1";
		$dbuser = "root";
		$dbpass = "";

		$connection = new mysqli($dbhost, $dbuser, $dbpass);

		if ($connection->connect_error)
		{
			die("Connection failed: " .$connection->connect_error. "<br/>");
		}
		else
		{
		#	echo "Connection succeeded<br/>";
		}
		
		return $connection;
	}
	function openConnectionDataBase($dbname)
	{
		$dbhost = "127.0.0.1";
		$dbuser = "root";
		$dbpass = "";

		$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

		if ($connection->connect_error)
		{
			die("Connection failed: " .$connection->connect_error. "<br/>");
		}
		else
		{
		#	echo "Connection succeeded<br/>";
		}
		
		return $connection;
	}
	function closeConnection($connection)
	{
		$connection->close();
	}
	function createDataBase($connection, $name)
	{
		$sql = "CREATE DATABASE IF NOT EXISTS " .$name;

		if ($connection->query($sql) === TRUE)
		{
		#	echo "Database created successfully<br/>";
		}
		else
		{
			echo "Error creating database: " .$connection->error. "<br/>";
		}
	}
	function dropDataBase($connection, $databaseName)
	{
		$sql = "DROP DATABASE IF EXISTS $databaseName";

		if($connection->query($sql) === TRUE)
		{
		#	echo "Database deleted successfully<br/>";
		}
		else
		{
			echo "Error deleting database: " .$connection->error. "<br/>";
		}
	}
	function createTable($connection, $name, $table)
	{
		$sql = "CREATE TABLE IF NOT EXISTS $name $table";

		if($connection->query($sql) === TRUE)
		{
		#	echo "Table $name created successfully<br/>";
		}
		else
		{
			echo "Error creating table: " .$connection->error. "<br/>";
		}
	}
	function checkTableExistence($connection, $tableName)
	{
		$sql = "SELECT *
					FROM INFORMATION_SCHEMA.TABLES
					WHERE TABLE_NAME = '$tableName'";
		$result = $connection->query($sql);
		if ($result->num_rows > 0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	function renameTable($connection, $oldName, $newName)
	{
		$sql = "RENAME TABLE $oldName to $newName";
		
		if($connection->query($sql) === TRUE)
		{
		#	echo "Table $oldName renamed to $newName successfully<br/>";
		}
		else
		{
			echo "Error renaming table: " .$connection->error. "<br/>";
		}
	}
	function dropTable($connection, $tableName)
	{
		$sql = "DROP TABLE IF EXISTS $tableName";

		if($connection->query($sql) === TRUE)
		{
		#	echo "Table $tableName dropped successfully<br/>";
		}
		else
		{
			echo "Error dropping table: " .$connection->error. "<br/>";
		}
	}
	function insertIntoTable($connection, $tableName,
			$field1, $value1, $field2, $value2)
	{
		$sql = "INSERT INTO $tableName ($field1, $field2)
				VALUES ('$value1', '$value2')";

		if($connection->query($sql) === TRUE)
		{
		#	echo "New record created successfully<br/>";
		}
		else
		{
			echo "Error: " .$sql. "<br/>" .$connection->error. "<br/>";
		}
	}
	function selectFromTable($connection, $tableName, $field1, $field2)
	{
		$sql = "SELECT id, $field1, $field2 FROM $tableName";
		$result = $connection->query($sql);
		echo "<thead>";
			echo "<tr>";
				echo "<th>" .ucwords($field1). "</th>";
				echo "<th>" .ucwords($field2). "</th>";
			echo "</tr>";
		echo "</thead>";
		echo "<tbody>";

		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				echo "<tr>";
					echo "<td> $row[$field1] </td>"; 
					echo "<td> $row[$field2] </td>";
				echo "</tr>";
			}
			echo "</tbody>";
		}
	}
	function selectFromTableByValue($connection, $tableName, $field1, $field2,
		   							$requiredField, $requiredValue)
	{
		$sql = "SELECT id, $field1, $field2 FROM $tableName WHERE
			   		$requiredField='$requiredValue'";
		$result = $connection->query($sql);

		echo "<thead>";
			echo "<tr>";
				echo "<th>" .ucwords($field1). "</th>";
				echo "<th>" .ucwords($field2). "</th>";
			echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				echo "<tr>";
					echo "<td> $row[$field1] </td>"; 
					echo "<td> $row[$field2] </td>";
				echo "</tr>";
			}
			echo "</tbody>";
		}
	}
	function checkValueExistence($connection, $tableName, 
		   							$requiredField, $requiredValue)
	{
		$sql = "SELECT $requiredField FROM $tableName WHERE
			   		$requiredField='$requiredValue'";
		$result = $connection->query($sql);

		if($result->num_rows > 0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	function selectFromTableByField($connection, $tableName, $field)
	{
		$sql = "SELECT $field FROM $tableName";
		$result = $connection->query($sql);

		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				echo "$row[$field]<br/>";
			}
		}
		else
		{
			echo "No results found<br/>";
		}
	}
	function selectFromTableOrdered($connection, $tableName, $field1, $field2,
		   							$orderedField)
	{
		$sql = "SELECT id, $field1, $field2 FROM $tableName ORDER BY 
					$orderedField";
		$result = $connection->query($sql);

		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				echo "[$row[id]] -> $field1: $row[$field1] - 
						$field2: $row[$field2]<br/>";
			}
		}
		else
		{
			echo "No results found<br/>";
		}
	}
	function deleteFromTable($connection, $tableName, $requiredField, 
							$requiredValue)
	{
		$sql = "DELETE FROM $tableName WHERE $requiredField='$requiredValue'";

		if($connection->query($sql) === TRUE)
		{
		#	echo "Record deleted successfully<br/>";
		}
		else
		{
			echo "Error deleting record: " .$connection->error. "<br/>";
		}
	}
	function updateFromTable($connection, $tableName,
						$field1, $oldValue1, $newValue1,
						$field2, $newValue2)
	{
		$sql = "UPDATE $tableName 
				SET $field1='$newValue1', $field2='$newValue2' 
				WHERE $field1='$oldValue1'";

		if($connection->query($sql))
		{
		#	echo "Record updated successfully<br/>";
		}
		else
		{
			echo "Error updating record: " .$connection->error. "<br/>";
		}
	}
?>
