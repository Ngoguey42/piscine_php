#!/usr/bin/php
<?PHP
function is_number($a)
{
	if ($a >= '0' && $a <= '9')
		return (true);
	return (false);
}
function is_alphabetical($a)
{
	if (($a >= 'a' && $a <= 'z') || ($a >= 'A' && $a <= 'Z'))
		return (true);
	return (false);
}
function alphabetical_code($a)
{
	if ($a >= 'A' && $a <= 'Z')
		return ($a + 'a' - 'A');
	return ($a);
}
function ascii_sort($a, $b)
{
    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? -1 : 1;
}
function char_sort_func($a, $b)
{
	print("    $a vs $b\n");
	if ($a == $b)
		return (0);
	if (is_alphabetical($a) || is_alphabetical($b))
	{
		print("        one is alphabetical\n");
		if (is_alphabetical($a) && is_alphabetical($b))
			return (ascii_sort(alphabetical_code($a), alphabetical_code($b)));
		elseif (is_alphabetical($a))
			return (-1);
		return (1);
	}
	if (is_number($a) || is_number($b))
	{
		print("        one is num\n");
		if (is_number($a) && is_number($b))
			return (ascii_sort($a, $b));
		elseif (is_number($a))
			return (-1);
		return (1);
	}
	return (ascii_sort($a, $b));
}
function sort_func($a, $b)
{
	print("$a vs $b\n");
	if ($a == $b)
		return (0);
	$at = str_split($a);
	$bt = str_split($b);
	for ($i = 0; $i < min(sizeof($at), sizeof($bt)); $i++)
	{
		if ($at[$i] != $bt[$i])
			return (char_sort_func($at[$i], $bt[$i]));
	}
	if (sizeof($at) < sizeof($bt))
		return (-1);
	return (1);
}
function epur_totab($str)
{
	$str = trim($str);
	if (strlen($str) == 0)
		return (array());
	do
	{
		$old = $str;
		$str = str_replace("  ", " ", $str);
	} while($str != $old);
	return (explode(" ", $str));
}
if (sizeof($argv) > 1)
{
	$tab = array();
	foreach ($argv as $k => $v)
	{
		if ($k)
		{
/* 				print_r(epur_totab($argv[1])); */
			// print("\n");
			print_r(epur_totab($v));
			$tab = array_merge($tab, epur_totab($v));
		}
	}
		print_r($tab);
	if (sizeof($tab) > 0)
	{
		usort($tab, "sort_func");
		sort($tab);
		foreach ($tab as $v)
			print("$v\n");
	}
}
?>
