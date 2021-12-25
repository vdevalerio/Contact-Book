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
			foreach($this->book->getContactList() as $element)
			{
				echo "<li>" .$element->getName(). "</li>";
			}
			echo "</ul>";
		}
	}

?>
