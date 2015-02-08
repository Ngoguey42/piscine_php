#!/usr/bin/php
<?PHP
	if (sizeof($argv) < 2)
		return ;
	$str = trim($argv[1]);
	do
	{
		$old = $str;
		$str = str_replace("  ", " ", $str);
	} while($str != $old);
	print($str."\n");
?>
