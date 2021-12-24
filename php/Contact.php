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
	#$name1 = "Name 1";	
	#$phone1 = "Phone 1";	
	#$cont1 = new Contact($name1, $phone1);
	#$cont2 = new Contact("Name 2", "Number 2");
	#$cont3 = new Contact("Name 3", "Number 3");
	#$cont4 = new Contact("Name 4", "Number 4");
	#$cont5 = new Contact("Name 5", "Number 5");
	
	#$contList = array($cont1);
	#$contList = array($cont1, $cont2, $cont3, $cont4, $cont5);
	#list($c1, $c2, $c3, $c4, $c5) = $contList;
	#foreach ($contList as $element)
	#{
	#	echo "Name: " .$element->getName(). "<br/>";
	#	echo "Phone: " .$element->getPhone(). "<br/>";
	#}
?>
