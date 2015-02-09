#!/usr/bin/php
<?PHP
if (sizeof($argv) > 1)
{
	$str = trim($argv[1]);
	if (strlen($str) > 0)
	{
		do
		{
			$old = $str;
			$str = str_replace("  ", " ", $str);
		} while($str != $old);
		print($str);
		print("\n");
	}
}
?>
