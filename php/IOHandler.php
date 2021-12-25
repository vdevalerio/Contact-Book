<?php
	include('Book.php');
	class IOHandler
	{
		# Properties
		private $book;

		# Methods
		public function initBook()
		{
			$this->book = new Book();
		}
		public function printContactList()
		{
			echo "<h3> Contact List </h3>";
			echo "<ul>";
			$this->book->createContact("Name 1", "Phone 1");
			$this->book->createContact("Name 2", "Phone 2");
			$this->book->createContact("Name 3", "Phone 3");
			$this->book->createContact("Name 4", "Phone 4");
			$this->book->createContact("Name 5", "Phone 5");
			foreach($this->book->getContactList() as $element)
			{
				echo "<li>" .$element->getName(). "</li>";
			}
			echo "</ul>";
		}
	}
	#$handler = new IOHandler();
	#$handler->initBook();
	#$handler->printContactList();
?>
