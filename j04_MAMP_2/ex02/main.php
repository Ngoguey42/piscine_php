#!/usr/bin/php
<?php
$ret = file_get_contents('/nfs/zfs-student-2/users/2014/ngoguey/mamp/apps/j04/htdocs/private/passwd');
if (gettype($ret) == "string")
	var_dump(unserialize($ret));
else
	var_dump($ret);
?>
