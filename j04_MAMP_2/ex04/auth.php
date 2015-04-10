<?php
function auth($login, $passwd)
{
	if ($login === NULL || $login == "")
		return (false);
	if (!file_exists('../private/passwd'))
		return (false);
	$ret = file_get_contents('../private/passwd');
	if ($ret === false)
		return (false);
	$ret = unserialize($ret);
	if ($ret === false)
		return (false);
	$passwd = hash('whirlpool', $passwd);
	foreach ($ret as $v)
	{
		if ($v['login'] === $login)
		{
			if ($v['passwd'] === $passwd)
				return (true);
			break ;
		}
	}
	return (false);
}
?>
