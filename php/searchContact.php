<?php
	echo file_get_contents("../html/header.html");
	include ("IOHandler.php");
	$handler = new IOHandler();
	$handler->initBook();
	echo file_get_contents("../html/contactListTop.html");
	if(isset($_POST["name"]))
	{
		$handler->getBook()->getContactByName($_POST["name"]);
	}
	echo file_get_contents("../html/contactListBottom.html");
	echo file_get_contents("../html/footer.html");
?>
