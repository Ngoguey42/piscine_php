#!/usr/bin/php
<?php
function GetData($url)
{
	if (!($session = curl_init($url)))
	{
		curl_close($session);
		return (false);
	}
	if (!curl_setopt($session, CURLOPT_RETURNTRANSFER, 1))
	{
		curl_close($session);
		return (false);
	}
	if (!($data = curl_exec($session)))
	{
		curl_close($session);
		return (false);
	}
	curl_close($session);
	// var_dump($data);
	return ($data);
}
function GetRawImgUrls($page)
{
	preg_match_all(
		'/<'.
			'\s*img'.
			'[^>]*'.
			'\ssrc=([\"\'])'.
			'([^\1]+?)'.
			'\1'.
			'/i',
			$page, $tab);
	/* print_r($tab); */
	/* exit ; */
	if (count($tab[2]) == 0)
		return (false);
	return ($tab[2]);
}
function GetRoot_noProtocol($url)
{
	if (preg_match("/^[^\:\/]+\:\/\/(.*)$/", $url, $tab))
		return (substr($tab[1], 0, strcspn($tab[1], "/")));
	return (substr($url, 0, strcspn($siteurl, "/")));
}
function GetRoot($url)
{
	preg_match("/^([^\:\/]+\:\/\/)?(.*?)$/", $url, $tab);
	return ($tab[1].
		substr($tab[2], 0, strcspn($tab[2], "/")));
}
function GetImgUrl($imgurl, $siteurl)
{
	if (preg_match("/^[^\:\/]+\:\/\//", $imgurl))
		/* Full url OK */
		return ($imgurl); 
	elseif ($imgurl[0] == '/')
	{
		if ($imgurl[1] == '/')
		{
			if (preg_match("/^[^\:\/]+\:\/\//", $siteurl))
				/* Relative url (double slash) OKhome OK!home */
				return (substr($siteurl, 0, strcspn($siteurl, "/")).
					$imgurl); 
			/* (double slash, missing protocol) */
			return ("");
		}
		/* Relative url (single slash) OKhome OK!home */
		return (GetRoot($siteurl).$imgurl); 
	}
	/* Relative url (from page) TOTEST*/
	return ("$siteurl/$imgurl"); 
}
function DownloadImage($imgurl, $siteurl, $dirname)
{
	var_dump($imgurl);
	$imgurl = GetImgUrl($imgurl, $siteurl);
	var_dump($imgurl);
	if (!($data = GetData($imgurl)))
		return ;
	/* var_dump($dirname."/".basename($imgurl)); */
	// return ;
	if (!($fd = fopen($dirname."/".basename($imgurl), 'w')))
		return ;
	fwrite($fd, $data);
	fclose($fd);
	// var_dump($data);
	;
}
/*
   ./photos.php http://www.42.fr
   www.42.fr/logo42-site.gif

   ./photos.php http://www.jeuxvideo.com/
   bcp bcp
   
 */
if (count($argv) > 1)
{
	if (!($page = GetData($argv[1])))
		exit ("Could not retreive $argv[1]".PHP_EOL);
	
	/* 	echo $page; */
	/* exit ; */
	if (!($rawImgs = GetRawImgUrls($page)))
		exit ("Could not find images".PHP_EOL);
	$dirname = "./".GetRoot_noProtocol($argv[1]);
	var_dump($dirname);
	if (!is_dir($dirname))
		mkdir($dirname);
	foreach ($rawImgs as $v)
		DownloadImage($v, $argv[1], $dirname);
	// echo $dirname;
}
?>
