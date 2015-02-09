#!/usr/bin/php
<?PHP
function ft_split($str)
{
	$str = trim($str);
	if (strlen($str) == 0)
		return (array());
	do
	{
		$old = $str;
		$str = str_replace("  ", " ", $str);
	} while($str != $old);
	return (explode(" ", $str));
}
?>
