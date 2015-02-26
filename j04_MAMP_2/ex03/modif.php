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
	for ($i = 0; $tab[$i] != NULL; $i++)
	{
		$k = $tab[$i]['login'];
		$v = $tab[$i]['passwd'];
		if ($k == $_POST['login'])
		{
			if ($v == $oldhash)
			{
				$tab[$i]['passwd'] = hash('whirlpool', $_POST['newpw']);
				file_put_contents('../private/passwd', serialize($tab));
				return (true);
			}
			break ;
		}
	}
	return (false);
}

if ($_POST['login'] == null || $_POST['oldpw'] == null || $_POST['newpw'] == null)
	echo "ERROR1\n";
else if ($_POST['login'] == '' || $_POST['oldpw'] == '' || $_POST['newpw'] == '')
	echo "ERROR2\n";
else
{
	$tab = get_table();
	if ($tab === false)
		echo "ERROR3\n";
	else if (change_pw($tab, hash('whirlpool', $_POST['oldpw'])))
		echo "OK\n";
	else
		echo "ERROR4\n";
}
?>
