<?php
	echo file_get_contents("../html/header.html");
	include ("IOHandler.php");
	$handler = new IOHandler();
	$handler->initBook();
	if(isset($_POST["name"]) and $handler->getBook()->checkContactExistence($_POST["name"]))
	{
		$handler->getBook()->deleteContact($_POST["name"]);
		echo file_get_contents("../html/contactDeleted.html");	
	}
	else
	{
		echo file_get_contents("../html/contactDoesntExist.html");	
	}
	echo file_get_contents("../html/footer.html");
?>
