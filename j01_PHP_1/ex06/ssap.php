#!/usr/bin/php
<?php
function epur_totab($str)
{
	$str = preg_replace("/ +/", " ", trim($str, " "));
	if (strlen($str) == 0)
		return (array());
	return (explode(" ", $str));
}

if (count($argv) > 1)
{
	array_shift($argv);
	$tab = array();
	foreach ($argv as $v)
		$tab = array_merge($tab, epur_totab($v));
	if (count($tab) > 0)
	{
		sort($tab);
		echo implode(PHP_EOL, $tab).PHP_EOL;
	}
}
?>
