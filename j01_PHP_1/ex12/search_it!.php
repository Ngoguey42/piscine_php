#!/usr/bin/php
<?PHP
if (sizeof($argv) > 2)
{
	$ref = $argv[1];
	foreach($argv as $k => $v)
	{
		if ($k < 3)
			continue ;
		if (ereg("^(.+)\:(.*)$", $v, $tab) && $tab[1] == $ref)
			$save = $tab[2];
	}
	if ($save != null)
		print("$save\n");
}
?>