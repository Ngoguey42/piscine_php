<?php

class NightsWatch
{
	private $_members;

	public function __construct()
	{
		$this->_members = array();
	}
	
	public function recruit($c)
	{		
		if (is_subclass_of($c, "IFighter"))
			$this->_members[] = $c;
	}
	public function fight()
	{
		foreach ($this->_members as $v)
		{
			$v->fight();
		}
		
	}
}

?>
