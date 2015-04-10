<?php
function get_table()
{
	if (!file_exists('../private/passwd'))
		return (false);
	$ret = file_get_contents('../private/passwd');
	if ($ret === false)
		return (false);
	$ret = unserialize($ret);
	if ($ret === false)
		return (false);
	return ($ret);
}

function change_pw($tab, $oldhash)
{
	foreach ($tab as $k => $v)
	{
		if (isset($v['login']) &&
			$v['login'] == $_POST['login'])
		{
			if (isset($v['passwd']) &&
				$v['passwd'] == $oldhash)
			{
				$tab[$k]['passwd'] = hash('whirlpool', $_POST['newpw']);
				file_put_contents('../private/passwd', serialize($tab));
				return (true);
			}
			break ;
		}
	}
	return (false);
}
if (!isset($_POST) ||
	!isset($_POST['login']) || !isset($_POST['oldpw']) || !isset($_POST['newpw']) ||
	$_POST['login'] == '' || $_POST['oldpw'] == '' || $_POST['newpw'] == '')
		exit ("ERROR\n");
$tab = get_table();
if ($tab === false)
	exit ("ERROR\n");
if (change_pw($tab, hash('whirlpool', $_POST['oldpw'])))
	exit ("OK\n");
exit ("ERROR\n");
?>
