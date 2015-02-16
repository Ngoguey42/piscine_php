#!/usr/bin/php
<?php
if (count($argv) > 1)
{
	$str = preg_replace("/ +/", " ", trim($argv[1], " "));
	if (strlen($str) > 0)
		echo $str."\n";
}
?>
