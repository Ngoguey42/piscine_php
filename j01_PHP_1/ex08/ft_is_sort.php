<?php
function ft_is_sort($tab)
{
	$copy = $tab;
	sort($copy);
	return ($copy === $tab);
}
?>
