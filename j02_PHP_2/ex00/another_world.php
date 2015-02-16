#!/usr/bin/php
<?php
function epur_totab($str)
{
	$str = preg_replace("/[ \t]+/", " ", trim($str, " \t"));
	if (strlen($str) == 0)
		return (array());
	return (explode(" ", $str));
}

if (count($argv) > 1)
{
	$tab = epur_totab($argv[1]);
	if (count($tab) > 0)
		echo implode(" ", $tab)."\n";
}
?>
