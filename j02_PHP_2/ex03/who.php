#!/usr/bin/php
<?php
$tab = scandir("/dev", SCANDIR_SORT_NONE);
/* print_r($tab); */
$myuid = posix_getuid();
$myuid_s = get_current_user();
date_default_timezone_set("Europe/Paris");

foreach ($tab as $v)
{
	$stats = lstat("/dev/$v");
	/* print($stats[6].filetype("/dev/$v")."\n"); */
	if ($stats[4] != $myuid || filetype("/dev/$v") != "char")
		continue ;
	printf("%-8s %-8s date\n", $myuid_s, $v);
	/* print("/dev/$v"); */
	print(date("M j H:i\n", $stats[8]));
	print(date("M j H:i\n", $stats[9]));
	print(date("M j H:i\n", $stats[10]));
	print(date("M j H:i\n", filemtime("/dev/$v")));
	print(date("M j H:i\n", fileatime("/dev/$v")));
	print(date("M j H:i\n", filectime("/dev/$v")));
	/* print_r($stats); */
	/* print("\n"); */
}

?>
