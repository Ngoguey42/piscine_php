<?php
session_start();
$var1 = "";
$var2 = "";
if (isset($_GET) && isset($_SESSION) &&
	isset($_GET['submit']) && $_GET['submit'] == "OK")
{
	$_SESSION['login'] = $_GET['login'];
	$_SESSION['passwd'] = $_GET['passwd'];
}
if (isset($_SESSION))
{
	if (isset($_SESSION['login']))
		$var1 = $_SESSION['login'];
	if (isset($_SESSION['passwd']))
		$var2 = $_SESSION['passwd'];
}

?>
<html><head><title>Index</title></head><body>
	<form action="index.php" method="get">
		Identifiant : <input placeholder="Identifiant" type="text" name="login" value="<?= $var1 ?>" />
		<br />
		Mot de passe: <input placeholder="Mot de passe" type="password" name="passwd" value="<?= $var2 ?>" />
		<input type="submit" name="submit" value="OK" />
	</form>
</body></html>
