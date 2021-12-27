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
			$this->book->initializeDataBase();
		}
		public function getBook()
		{
			return $this->book;
		}
		public function printContactList()
		{
			echo "<h3> Contact List </h3>";
			$this->book->getContactNameList();
		}
	}

?>
