#!/usr/bin/php
<?PHP
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
		sort($tab);
		foreach ($tab as $v)
			print("$v\n");
	}
}
?>
