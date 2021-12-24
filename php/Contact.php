<?php
	class Contact
	{
		# Properties
		private $name;
		private $phone;

		# Methods
		function setName($name)
		{
			$this->name = $name;
		}
		function getName()
		{
			return $this->name;
		}
		function setPhone($phone)
		{
			$this->phone = $phone;
		}
		function getPhone()
		{
			return $this->phone;
		}
	}
?>
