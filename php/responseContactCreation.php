<?php
	echo file_get_contents("../html/header.html");
	include("IOHandler.php");
	$handler = new IOHandler();
	$handler->initBook();
	if(isset($_POST["name"]) && isset($_POST["phone"]))
	{
		$handler->getBook()->createContact($_POST["name"], $_POST["phone"]);
		echo file_get_contents("../html/responseContactCreated.html");
	}
	echo file_get_contents("../html/footer.html");
?>
