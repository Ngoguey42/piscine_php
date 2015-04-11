<?php

class Lannister
{
	public function sleepWith($rhs)
	{
		if (is_subclass_of($rhs, get_class()))
			echo "Not even if I'm drunk !".PHP_EOL;
		else
			echo "Let's do this.".PHP_EOL;		
	}
}

?>
