#!/usr/bin/php
<?PHP
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

if (sizeof($argv) != 4)
	print("Incorrect Parameters\n");
else
{
	foreach($argv as $k => $v)
		$argv[$k] = trim($v);
	$result = do_op($argv[1], $argv[2], $argv[3]);
	if (gettype($result) == "integer")
		printf("%d\n", do_op($argv[1], $argv[2], $argv[3]));
	elseif (gettype($result) == "double")
		printf("%f\n", do_op($argv[1], $argv[2], $argv[3]));
}
?>