#!/usr/bin/php
<?php
function epur_totab($str)
{
	$str = trim($str);
	if (strlen($str) == 0)
		return (array());
	do
	{
		$old = $str;
		$str = str_replace("  ", " ", $str);
		$str = str_replace("\t", " ", $str);		
	} while($str != $old);
	return (explode(" ", $str));
}
if (sizeof($argv) > 1)
{
	$tab = epur_totab($argv[1]);
	if (sizeof($tab))
	{
		$t = 0;
		foreach ($tab as $v)
		{
			if ($t)
				print(" ");
			else
				$t = 1;
			print($v);
		}
	print("\n");
	}
}
?>
