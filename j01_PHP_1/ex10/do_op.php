#!/usr/bin/php
<?php
function do_op($l , $o, $r)
{
	switch ($o)
	{
		case "+":
		return ((int)$l + (int)$r);
		case "-":
		return ((int)$l - (int)$r);
		case "*":
		return ((int)$l * (int)$r);
		case "/":
		return ((double)$l / (double)$r);
		case "%":
		return ((int)$l % (int)$r);
	}
	return (null);
}

if (count($argv) != 4)
	print("Incorrect Parameters\n");
else
{
	foreach($argv as $k => $v)
		$argv[$k] = trim($v, " \t");
	$result = do_op($argv[1], $argv[2], $argv[3]);
	exit($result.PHP_EOL);
	if (gettype($result) == "integer")
		printf("%d\n", do_op($argv[1], $argv[2], $argv[3]));
	elseif (gettype($result) == "double")
		printf("%f\n", do_op($argv[1], $argv[2], $argv[3]));
}
?>
