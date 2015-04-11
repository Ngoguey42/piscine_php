<?php

class House
{
	public function introduce()
	{
		echo 'House '.$this->getHouseName().' : "'.
			$this->getHouseMotto().'"'.PHP_EOL;
	}
}

?>
