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
	}
	#$book = new Book();
	#$book->createContact("Name 1", "Phone 1");
	#$book->createContact("Name 2", "Phone 2");
	#$book->createContact("Name 3", "Phone 3");
	#$book->createContact("Name 4", "Phone 4");
	#$book->createContact("Name 5", "Phone 5");

	#foreach($book->getContactList() as $element)
	#{
	#	echo $element->getName(). "<br/>";
	#}
?>
