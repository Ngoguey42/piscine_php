<?php
session_start();
include ('auth.php');

function login()
{
	if (auth($_GET['login'], $_GET['passwd']))
	{
		$_SESSION['loggued_on_user'] = $_GET['login'];
		echo "OK\n";
	}
	else
	{
		$_SESSION['loggued_on_user']= '';
		echo "ERROR\n";
	}
}
login();
?>
