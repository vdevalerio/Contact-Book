<?php
	class Contact
	{
		# Properties
		private $name;
		private $phone;

		# Methods
		public function __construct($name, $phone)
		{
			$this->name = $name;
			$this->phone = $phone;
		}
		public function setName($name)
		{
			$this->name = $name;
		}
		public function getName()
		{
			return $this->name;
		}
		public function setPhone($phone)
		{
			$this->phone = $phone;
		}
		public function getPhone()
		{
			return $this->phone;
		}
	}
?>
