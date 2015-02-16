#!/usr/bin/php
<?php
array_shift($argv);
if (count($argv) > 0)
	echo implode("\n", $argv)."\n";
?>
