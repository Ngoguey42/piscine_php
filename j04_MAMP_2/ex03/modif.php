<?php
function get_table()
{
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
				tab[$i]['passwd'] = hash('whirlpool', $_POST['newpw']);
				file_put_contents('../private/passwd', serialize($tab));
			}
			break ;
		}
	}
	return (false);
}

if ($_POST['login'] == null || $_POST['oldwd'] == null || $_POST['newpw'] == null)
	echo "ERROR\n";
else if ($_POST['login'] == '' || $_POST['oldwd'] == '' || $_POST['newwd'] == '')
	echo "ERROR\n";
else
{
	$tab = get_table();
	if ($tab === false)
		echo "ERROR\n";
	else if (change_pw($tab, hash('whirlpool', $_POST['oldwd'])))
		echo "OK\n";
	else
		echo "ERROR\n";
}
?>
