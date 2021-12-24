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
	}
	#$book = new Book();
	#$book->createContact("Name 1", "Phone 1");
	#$book->createContact("Name 2", "Phone 2");
	#$book->createContact("Name 3", "Phone 3");
	#$book->createContact("Name 4", "Phone 4");
	#$book->createContact("Name 5", "Phone 5");

	#echo "Before deleting:<br/>";
	#foreach($book->getContactList() as $element)
	#{
	#	echo "Name: " .$element->getName(). "<br/>";
	#	echo "Phone: " .$element->getPhone(). "<br/>";
	#	echo "<br/>";
	#}

	#$book->deleteContact("Name 3");

	#echo "After deleting:<br/>";
	#foreach($book->getContactList() as $element)
	#{
	#	echo "Name: " .$element->getName(). "<br/>";
	#	echo "Phone: " .$element->getPhone(). "<br/>";
	#	echo "<br/>";
	#}
?>
