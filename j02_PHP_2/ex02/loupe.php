#!/usr/bin/php
<?php
function title($tab)
{
	return ($tab[1].strtoupper($tab[2]).$tab[3]);	
}

function content_chunk($tab)
{
	$right_tag = preg_replace_callback(
		'/'.'(title=\")([^\"]+)(\")'.'/s', "title", $tab[2]);
	return (strtoupper($tab[1]).$right_tag);
}

function a_content($tab)
{
	$openning_tag = preg_replace_callback(
		'/'.'(title=\")([^\"]+)(\")'.'/s', "title", $tab[1]);
	$content = preg_replace_callback(
		'/'.
		'([^<]*)'.
		'(<[^>]*>)?'.
		'/s', "content_chunk", $tab[2]);
	return ($openning_tag.$content.$tab[3]);
}

if (count($argv) < 2)
	exit ;
$lines = file_get_contents($argv[1]);
$a_tag_open = '(<[[:space:]]*[aA]'.
			  '(?:'.
			  '[[:space:]]*'.
			  '|'.
			  '[[:space:]]+[^>]+'.
			  ')>)';
$a_tag_close = '(<[[:space:]]*\/'.
			   '[[:space:]]*[aA]'.
			   '[[:space:]]*>)';
$tab = preg_replace_callback(
	'/'.
	$a_tag_open.
	'(.*?)'.
	$a_tag_close.
	'/s', "a_content", $lines);
echo $tab;
?>

