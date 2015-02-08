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
	if (sizeof($argv) < 2)
		print("\n");
	else
	{
		$tab = array();
		foreach ($argv as $k => $v)
		{
			if ($k)
			{
				// print_r(epur_totab($argv[1]));
				// print("\n");
				$tab = array_merge($tab, epur_totab($v));
			}
		}
		if (sizeof($tab) < 1)
			print("\n");
		else
		{
			sort($tab);
			foreach ($tab as $v)
				print("$v\n");
		}
	}
?>
