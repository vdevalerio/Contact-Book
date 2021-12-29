<?php
	echo file_get_contents("../html/header.html");
	include ("IOHandler.php");
	$handler = new IOHandler();
	$handler->initBook();
	if(isset($_POST["old-name"]) and isset($_POST["new-name"]) and isset($_POST["phone"]) and $handler->getBook()->checkContactExistence($_POST["old-name"]))
	{
		$handler->getBook()->editContact($_POST["old-name"], $_POST["new-name"], $_POST["phone"]);
		echo file_get_contents("../html/contactEdited.html");	
	}
	else
	{
		echo file_get_contents("../html/contactDoesntExist.html");	
	}
	echo file_get_contents("../html/footer.html");
?>
