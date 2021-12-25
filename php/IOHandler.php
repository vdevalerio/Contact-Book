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
		public function getBook()
		{
			return $this->book;
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

<html>
<body>
<?php
	$handler = new IOHandler();
	$handler->initBook();
	if(isset($_POST["name"]) && isset($_POST["phone"]))
	{
		$handler->getBook()->createContact($_POST["name"], $_POST["phone"]);
		$handler->printContactList();
	}
?>
<a href="../html/index.html"> <button>Back</button></a>
</body>
</html>
