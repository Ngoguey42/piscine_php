#!/usr/bin/php
<?php
function epur_totab($str)
{
	$str = preg_replace("/ +/", " ", trim($str));
	if (strlen($str) == 0)
		return (array());
	return (explode(" ", $str));
}

if (count($argv) > 1)
{
	$tab = array();
	array_shift($argv);
	foreach ($argv as $k => $v)
		$tab = array_merge($tab, epur_totab($v));
	if (count($tab) > 0)
	{
		sort($tab);
		echo implode("\n", $tab)."\n";
	}
}
?>
