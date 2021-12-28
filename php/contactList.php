<?php 
	echo file_get_contents("../html/header.html");
	include ("IOHandler.php");
	$handler = new IOHandler();
	$handler->initBook();
	echo file_get_contents("../html/contactListTop.html");
	$handler->getBook()->getContactList();
	echo file_get_contents("../html/contactListBottom.html");
	echo file_get_contents("../html/footer.html");
?>
