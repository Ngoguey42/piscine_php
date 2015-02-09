#!/usr/bin/php
<?PHP
function ft_is_sort($tab)
{
	$copy = $tab;
	sort($copy);
	foreach (array_combine($tab, $copy) as $k => $v)
		if ($k != $v)
			return (false);
	return (true);
}
?>
