<?php
	echo file_get_contents("../html/header.html");

	include("Book.php");
	$book = new Book();
	$dbExists = $book->checkDBExistence();

	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['initAgenda']))
	{
		if(!$dbExists)
		{
			$book->initializeDataBase();
			echo file_get_contents("../html/agendaCreated.html");
		}
		else
		{
			echo file_get_contents("../html/agendaAlredyExists.html");
		}
	}
	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['addContact']))
	{
		if($dbExists)
		{
			echo file_get_contents("../html/addContact.html");
		}
		else
		{
			echo file_get_contents("../html/thereIsNoAgenda.html");
		}
	}
	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['searchContact']))
	{
		if($dbExists)
		{
			echo file_get_contents("../html/searchContact.html");
		}
		else
		{
			echo file_get_contents("../html/thereIsNoAgenda.html");
		}
	}
	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['delAgenda']))
	{
		if($dbExists)
		{
			$book->deleteDataBase();
			echo file_get_contents("../html/agendaDeleted.html");
		}
		else
		{
			echo file_get_contents("../html/thereIsNoAgenda.html");
		}
	}

	echo file_get_contents("../html/footer.html");
?>
