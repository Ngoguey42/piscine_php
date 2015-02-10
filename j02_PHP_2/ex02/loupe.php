#!/usr/bin/php
<?php
function extern_titles($tab)
{

	print("    CHUNCKS!!!\n");	
	print_r($tab);
	return (preg_replace("/$tab[1]/", strtoupper($tab[1]), $tab[0]));
}
function a_content_chunks($tab)
{


	print_r($tab);	
	/* print("    CHUNCKS!!!\n"); */
	/* return ($tab[0]); */
	if (sizeof($tab) >= 4)
	{
		print("passing here($tab[3])\n");
		$title =preg_replace_callback(
			'/.*?title=\"([^\"]*?)\".*?/',	
			"extern_titles", $tab[3]);
	}
	else
	{
		$title = "";
	}


	return (strtoupper($tab[2]).$title);
	return (preg_replace("/$tab[1]/", strtoupper($tab[2]), $tab[0]));
}
function a_content($tab)
{
	print("\n\n\n\n\n    a_content\n");
	print_r($tab);
	/* return  $tab[0]; */

	$content = $tab[2];
	/* $content = preg_replace_callback("/([^<]*)/", "a_content_chunks", $content); */

	$content = preg_replace_callback("/(([^<]+)(<.+>)?)/s",
									 "a_content_chunks", $content);
	/* return $tab[1].$content.$title; */
	return $tab[1].$content.$tab[3];
	/* return preg_replace("/$tab[1]/", strtoupper($tab[1]), $tab[0]); */
}

if (count($argv) < 2)
	exit ;

$lines = file_get_contents($argv[1]);
$tab = preg_replace_callback("/(<a.+href.+>)(.*)(<\/a>)/sU", "a_content", $lines);
echo $tab;
?>
