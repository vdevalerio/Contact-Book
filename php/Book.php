<?php
	include('Contact.php');
	include('DBOperations.php');
	class Book
	{
		# Properties
		#private $contact;
		#private $contactList = [];
		private $connection;
		private $dbName = "agenda";
		private $tableName = "Contact";
		private $field1 = "name";
		private $field2 = "phone";

		# Methods
		public function initializeDataBase()
		{
			$this->connection = openConnectionServer();
			createDataBase($this->connection, $this->dbName);		
			closeConnection($this->connection);
			$this->connection = openConnectionDataBase($this->dbName);
			$table = " (
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				name VARCHAR(30) NOT NULL,
				phone VARCHAR(11) NOT NULL
			) ";
			createTable($this->connection, $this->tableName, $table);
			closeConnection($this->connection);
		}
		public function deleteDataBase()
		{
			$this->connection = openConnectionDataBase($this->dbName);
			$table = " (
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				$field1 VARCHAR(30) NOT NULL,
				$field2 VARCHAR(11) NOT NULL
			) ";
			dropTable($this->connection, $this->tableName, $table);
			dropDataBase($this->connection, $this->dbName);
			closeConnection($this->connection);
		}
		public function createContact($name, $phone)
		{
			$this->connection = openConnectionDataBase($this->dbName);
			insertIntoTable($this->connection, $this->tableName, $this->field1,
			  				$name, $this->field2, $phone);	
			closeConnection($this->connection);
				
			#$this->contact = new Contact($name, $phone);
			#$this->contactList[] = $this->contact;
		}
		public function getContactList()
		{
			$this->connection = openConnectionDataBase($this->dbName);
			selectFromTable($this->connection, $this->tableName, $this->field1,
			  				$this->field2);	
			closeConnection($this->connection);
			#return $this->contactList;
		}
		public function deleteContact($name)
		{
			for($i = 0; $i < count($this->contactList); $i++)
			{
				if($this->contactList[$i]->getName() == $name)
				{
					unset($this->contactList[$i]);
				}
			}
		}
		public function editContact($oldName, $newName, $newPhone)
		{
			for($i = 0; $i < count($this->contactList); $i++)
			{
				if($this->contactList[$i]->getName() == $oldName)
				{
					$this->contactList[$i]->setName($newName);
					$this->contactList[$i]->setPhone($newPhone);

				}
			}
		}
	}
?>
