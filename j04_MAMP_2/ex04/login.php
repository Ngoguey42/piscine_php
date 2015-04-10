<?php
session_start();
include ('auth.php');

function login()
{
	if (isset($_GET) && isset($_GET['login']) &&
		isset($_GET['passwd']) &&
		auth($_GET['login'], $_GET['passwd']))
	{
		$_SESSION['loggued_on_user'] = $_GET['login'];
		echo "OK\n";
	}
	else
	{
		if (isset($_SESSION))
			$_SESSION['loggued_on_user']= '';
		echo "ERROR\n";
	}
}
login();
?>
