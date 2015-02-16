<?php
function ft_split($str)
{
	$str = preg_replace("/ +/", " ", trim($str, " "));
	if (strlen($str) == 0)
		return (array());
	$tab = explode(" ", $str);
	sort($tab);
	return ($tab);
}
?>
