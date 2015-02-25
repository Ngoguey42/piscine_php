<?php
session_start();
if ($_GET['submit'] == "OK")
{
	$_SESSION['login'] = $_GET['login'];
	$_SESSION['passwd'] = $_GET['passwd'];
}
if ($_SESSION['login'] != NULL)
	$var1 = $_SESSION['login'];
else
	$var1 = "";
if ($_SESSION['passwd'] != NULL)
	$var2 = $_SESSION['passwd'];
else
	$var2 = "";
?>
<html>
	<head><title>Index</title></head>
	<body>
		<form action="index.php" method="get">
			Identifiant : <input placeholder="Identifiant" type="text" name="login" value="<?= $var1 ?>" />
			<br />
			Mot de passe: <input placeholder="Mot de passe" type="password" name="passwd" value="<?= $var2 ?>" />
			<input type="submit" name="submit" value="OK" />
		</form>
	</body>
</html>
