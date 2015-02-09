#!/usr/bin/php
<?PHP
function is_number($a)
{
	return ($a >= '0' && $a <= '9');
}
function is_alphabetical($a)
{
	return (($a >= 'a' && $a <= 'z') || ($a >= 'A' && $a <= 'Z'));
}
function ascii_sort($a, $b)
{
    if ($a == $b)
        return 0;
	else if ($a < $b)
		return (-1);
	return (1);
}
function char_sort_func($a, $b)
{
	if ($a == $b)
		return (0);
	if (is_alphabetical($a) != is_alphabetical($b))
		return is_alphabetical($a) ? -1 : 1;
	else if (is_number($a) != is_number($b))
		return is_number($a) ? -1 : 1;
	return (ascii_sort($a, $b));
}
function sort_func($a, $b)
{
	$a = strtolower($a);
	$b = strtolower($b);
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
		if ($k)
			$tab = array_merge($tab, epur_totab($v));
	if (sizeof($tab) > 0)
	{
		usort($tab, "sort_func");
		foreach ($tab as $v)
			print("$v\n");
	}
}
?>
