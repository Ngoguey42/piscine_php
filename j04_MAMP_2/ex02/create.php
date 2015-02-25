<?php
function get_table()
{
	$ret = file_get_contents('../private/passwd');
	if ($ret === false)
		return (array());
	$ret = unserialize($ret);
	if ($ret === false)
		return (array());
	return ($ret);
}
function is_in_tab($tab, $login)
{
	foreach ($tab as $k => $v)
		if ($k == $login)
			return (true);
	return (false);
}

if ($_POST['login'] == null || $_POST['passwd'] == null)
	echo "ERROR\n";
else if (count($_POST['login']) < 1 || count($_POST['passwd']) < 1)
	echo "ERROR\n";
else
{
	$tab = get_table();
	if (is_in_tab($tab, $_POST['login']))
		echo "ERROR\n";
	else
	{
		$tab[] = array('login' => $_POST['login'], 'passwd' => hash('whirlpool', $_POST['passwd']));
		if (!file_exists('../private'))
			mkdir('../private');
		file_put_contents('../private/passwd', serialize($tab));
		echo "OK\n";
	}
}
?>
