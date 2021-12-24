<?php
	class Contact
	{
		# Properties
		private $name;
		private $phone;

		# Methods
		function set_name($name)
		{
			$this->name = $name;
		}
		function get_name()
		{
			return $this->name;
		}
		function set_phone($phone)
		{
			$this->phone = $phone;
		}
		function get_phone()
		{
			return $this->phone;
		}
	}

# TODO:
# Contact book:
# 	Contact:
# 		Name;
# 		Phone;
# 	Add contact;
# 	Remove contact;
# 	Edit contact;

?>
