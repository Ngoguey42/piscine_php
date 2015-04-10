<?php
function get_table()
{
    if (!file_exists('../private/passwd'))
		return (array());
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
	foreach ($tab as $v)
		if ($v['login'] == $login)
			return (true);
	return (false);
}

if (!isset($_POST) ||
	!isset($_POST['login']) || !isset($_POST['passwd']) ||
	$_POST['login'] == '' || $_POST['passwd'] == '')
	exit ("ERROR\n");

$tab = get_table();
if (is_in_tab($tab, $_POST['login']))
	exit ("ERROR\n");

$tab[] = array('login' => $_POST['login'], 'passwd' => hash('whirlpool', $_POST['passwd']));
if (!file_exists('../private'))
	mkdir('../private');
file_put_contents('../private/passwd', serialize($tab));
echo "OK\n";
?>
