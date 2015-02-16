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

if (count($argv) != 2)
	print("Incorrect Parameters\n");
else
{
	if (preg_match("/^[ \t]*".
			 "([\+\-]?)([0-9]*)".
			 "[ \t]*".
			 "([\+\%\*\/\-])".
			 "[ \t]*".
			 "([\+\-]?)([0-9]*)".
			 "[ \t]*$/", $argv[1], $tab))
	{
		$result = do_op($tab[1].$tab[2], $tab[3], $tab[4].$tab[5]);
		if (gettype($result) == "integer")
			printf("%d\n", $result);
		elseif (gettype($result) == "double")
			printf("%f\n", $result);
	}
	else
		print("Syntax Error\n");
}
?>
