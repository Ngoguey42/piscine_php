<?php

class UnholyFactory
{
	private $_recipes;
	
	public function __construct()
	{
		$this->_recipes = array();
		
	}
	
	private function _discardAbsorbtion($u)
	{
		
	}
	public function absorb($u)
	{
		if (!is_subclass_of($u, "Fighter"))
		{
			echo "(Factory can't absorb this, it's not a fighter)".PHP_EOL;
			return ;
		}
		foreach ($this->_recipes as $v)
		{
			if (get_class($v) == get_class($u))
			{
				echo "(Factory already absorbed a fighter of type ".
					$u->_name.")".PHP_EOL;
				return ;
			}
		}
		$this->_recipes[] = $u;
		echo "(Factory absorbed a fighter of type ".
			$u->_name.")".PHP_EOL;
		return ;
	}
	
	public function fabricate($rf)
	{
		echo "(Factory ";
		foreach ($this->_recipes as $v)
		{
			if ($v->_name == $rf)
			{
				echo 'fabricates a fighter of type '.$rf.')'.PHP_EOL;
				return new $v;
			}
		}
		echo "hasn't absorbed any fighter of type ".$rf.')'.PHP_EOL;
		return null;		
	}
}


?>
