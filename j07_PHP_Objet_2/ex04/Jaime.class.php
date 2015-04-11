<?php

class Jaime extends Lannister
{
	public function sleepWith($rhs)
	{		
		if (is_subclass_of($rhs, get_parent_class()))
		{
			if (get_class($rhs) == "Cersei")
				echo "With pleasure, but only in a tower in Winterfell, then.".
					PHP_EOL;
			else
				echo "Not even if I'm drunk !".PHP_EOL;
		}
		else
			echo "Let's do this.".PHP_EOL;
	}
}

?>
