#!/usr/bin/php
<?php
if (sizeof($argv) > 2)
{
	array_shift($argv);
	$ref = array_shift($argv);
	foreach($argv as $v)
		if (preg_match("/^$ref\:(.*)$/", $v, $tab))
			$save = $tab[1];
	if ($save != null)
		print("$save\n");
}
?>
