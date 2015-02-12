#!/usr/bin/php
<?php
$file = fopen("/var/run/utmpx", "r");
$myuid_s = get_current_user();
fread($file, 1256);
date_default_timezone_set("Europe/Paris");
$tab_results = array();
while ($line = fread($file, 628))
{
	$tab = unpack("a256login/a4id/a32line/ipid/itype/itime/a256host/I16pad", $line);
	if ($tab["login"] == $myuid_s)
		$tab_results[$tab["line"]] = $tab["time"];
}
ksort($tab_results);
foreach($tab_results as $k => $v)
{
	printf("%-8s %-8s %s\n", $myuid_s, $k, date("M j H:i", $v));	
	
}
fclose($file);
?>
