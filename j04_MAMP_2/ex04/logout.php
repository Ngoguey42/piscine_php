<?php
session_start();
if (isset($_SESSION))
	$_SESSION['loggued_on_user'] = NULL;
?>
