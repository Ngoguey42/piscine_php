#!/usr/bin/php
<?php
if (count($argv) > 2)
{
	array_shift($argv);
	$ref = array_shift($argv);
	foreach($argv as $v)
		if (preg_match("/^$ref\:(.*)$/", $v, $tab))
			exit ($tab[1].PHP_EOL);
}
?>
