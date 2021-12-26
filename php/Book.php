<?php
	include('Contact.php');
	include('DBOperations.php');
	class Book
	{
		# Properties
		private $contact;
		private $contactList = [];
		private $connection;
		private $dbName = "agenda";
		private $tableName = "Contact";

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
		public function createContact($name, $phone)
		{
			$this->contact = new Contact($name, $phone);
			$this->contactList[] = $this->contact;
		}
		public function getContactList()
		{
			return $this->contactList;
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
