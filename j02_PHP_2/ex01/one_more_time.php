#!/usr/bin/php
<?php
if (sizeof($argv) > 1)
{
	if (ereg("[A-Z]?".
			 "[a-z]+".
			 " ".
			 "[1-9]{1,2}".
			 " ".
			 "[A-Z]?".
			 "[a-z]+".
			 " ".
			 "[0-9]{4}".
			 " ".
			 "[0-9]{2}:".
			 "[0-9]{2}:".
			 "[0-9]{2}", $argv[1]))
	{
		setlocale(LC_TIME, "fr_FR");	$ret = strptime($argv[1], "%A %e %B %Y %T");
		if ($ret == false)
			print("Wrong Format\n");
		else
		{
			date_default_timezone_set("Europe/Paris");
			$nbr = mktime($ret["tm_hour"], $ret["tm_min"], $ret["tm_sec"],
						  $ret["tm_mon"] + 1, $ret["tm_mday"], $ret["tm_year"] + 1900);
			printf("%d\n", $nbr);
		}
	}
	else
		print("Wrong Format\n");
}
?>
