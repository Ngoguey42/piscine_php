#!/usr/bin/php
<?PHP
	function epur_totab($str)
	{
		$str = trim($str);
		do
		{
			$old = $str;
			$str = str_replace("  ", " ", $str);
		} while($str != $old);
		return (explode(" ", $str));
	}
	if (sizeof($argv) > 1)
	{
		$tab = epur_totab($argv[1]);
		$t = 0;
		foreach ($tab as $k => $v)
		{
			if ($k)
			{
				if ($t)
					print(" ");
				else
					$t = 1;
				print($v);
			}
		}
		if (sizeof($tab) > 0)
		{
			if ($t)
				print(" ");
			else
				$t = 1;
			print($tab[0]);
		}
	}
	print("\n");
?>
