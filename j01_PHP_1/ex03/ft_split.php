#!/usr/bin/php
<?PHP
	function ft_split($str)
	{
		// if (!is_string($str))
			// return ;
		$tab = explode(" ", $str);
		sort($tab);
		return ($tab);
	}
?>
