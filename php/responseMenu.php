<?php
	#echo file_get_contents("../html/header.html");

	include("Book.php");
	$book = new Book();

	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['initAgenda']))
	{
		echo "INIT DB";
		$book->initializeDataBase();
		// Add respective html
	}
	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['addContact']))
	{
		echo "ADD CONTACT";
		// Add respective html
	}
	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['searchContact']))
	{
		echo "SEARCH CONTACT";
		// Add respective html
	}
	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['delAgenda']))
	{
		echo "DEL AGENDA";
		// Add respective html
	}
?>
