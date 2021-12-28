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
		public function checkDBExistence()
		{
			$this->connection = openConnectionServer();
			if(checkTableExistence($this->connection, $this->tableName))
			{
				closeConnection($this->connection);
				return 1;
			}
			else
			{
				closeConnection($this->connection);
				return 0;
			}

		}
		public function initializeDataBase()
		{
			if(!$this->checkDBExistence())
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
		}
		public function deleteDataBase()
		{
			$this->connection = openConnectionServer();
			if(checkTableExistence($this->connection, $this->tableName))
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
				return 1;
			}
			else
			{
				closeConnection($this->connection);
				return 0;
			}
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
		public function getContactNameList()
		{
			$this->connection = openConnectionDataBase($this->dbName);
			selectFromTableByField($this->connection, $this->tableName, 
				$this->field1);	
			closeConnection($this->connection);
		}
		public function deleteContact($name)
		{
			$this->connection = openConnectionDataBase($this->dbName);
			deleteFromTable($this->connection, $this->tableName, $this->field1,
							$name);
			closeConnection($this->connection);
			#for($i = 0; $i < count($this->contactList); $i++)
			#{
			#	if($this->contactList[$i]->getName() == $name)
			#	{
			#		unset($this->contactList[$i]);
			#	}
			#}
		}
		public function editContact($oldName, $newName, $newPhone)
		{
			$this->connection = openConnectionDataBase($this->dbName);
			updateFromTable($this->connection, $this->tableName,
							$this->field1, $oldName, $newName,
							$this->field2, $newPhone);
			closeConnection($this->connection);
			#for($i = 0; $i < count($this->contactList); $i++)
			#{
			#	if($this->contactList[$i]->getName() == $oldName)
			#	{
			#		$this->contactList[$i]->setName($newName);
			#		$this->contactList[$i]->setPhone($newPhone);

			#	}
			#}
		}
	}
	#$book = new Book();
	#$book->initializeDataBase();
	#$book->createContact("Name 1", "Phone 1");
	#$book->createContact("Name 2", "Phone 2");
	#$book->createContact("Name 3", "Phone 3");
	#$book->createContact("Name 4", "Phone 4");
	#$book->createContact("Name 5", "Phone 5");
	#$book->deleteContact("Name 4");
	#$book->editContact("Name 3", "PEDRO", "NEW PHONE");
	#$book->getContactList();
	#$book->getContactNameList();
	#$book->deleteDataBase();
?>
