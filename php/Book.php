<?php
	include('Contact.php');
	class Book
	{
		# Properties
		private $contact;
		private $contactList = [];

		# Methods
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
