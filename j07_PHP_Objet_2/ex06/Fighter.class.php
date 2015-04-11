<?php

abstract class Fighter
{
	public $_name;

	public function __construct($name)
	{
		$this->_name = $name;
	}
	
	abstract function fight($target);
}


?>
