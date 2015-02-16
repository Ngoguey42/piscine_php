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
	$tab = epur_totab($argv[1]);
	if (array_push($tab, array_shift($tab)))
		echo implode(" ", $tab)."\n";
}
?>
