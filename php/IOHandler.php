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

<html>
<body>
<?php
	$handler = new IOHandler();
	$handler->initBook();
	if(isset($_POST["name"]) && isset($_POST["phone"]))
	{
		if($_POST["name"] != "" && $_POST["phone"] != "")
		{
			$handler->getBook()->createContact($_POST["name"], $_POST["phone"]);
			$handler->printContactList();
		}
		else
		{
		}
	}	 
?>
<a href="index.php"> <button>Back</button></a>
</body>
</html>
