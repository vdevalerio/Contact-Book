<?php 
	echo file_get_contents("../html/header.html");
	include ("IOHandler.php");
	$handler = new IOHandler();
	$handler->initBook();
	$handler->getBook()->getContactList();
	echo file_get_contents("../html/footer.html");
?>
