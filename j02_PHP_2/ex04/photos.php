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
		'[[:space:]]*'.
		'img'.
		'[^>]*[[:space:]]'.
		'src=(?:[\"\'])'.
		'([^$1]+?)'.
		'[\"\']'.
		'/i', $page, $tab);
		// var_dump($tab);
		if (count($tab[1]) == 0)
			return (false);
		return ($tab[1]);
	}
	function GetImgUrl($imgurl, $siteurl)
	{
		/*
		http://www.tomshardware.fr/
		<img src="//www.distilnetworks.com/nginx_status/images/theft-bot-home.png""
		
		http://www.google.fr/
		<img src="/images/icons/product/chrome-48.png""
		
		*/
		if (preg_match("/^[^\:\/]+\:\/\//", $imgurl))
			return ($imgurl);
		else if ($imgurl[0] == '/')
			return ("$siteurl/$imgurl");
		else
			return ("$siteurl/$imgurl");
	}
	function DownloadImage($imgurl, $siteurl, $dirname)
	{
		$imgurl = GetImgUrl($imgurl, $siteurl);
		var_dump($imgurl);
		if (!($data = GetData($imgurl)))
			return ;
		var_dump($dirname."/".basename($imgurl));
		// return ;
		if (!($fd = fopen($dirname."/".basename($imgurl), 'w')))
			return ;
		fwrite($fd, $data);
		fclose($fd);
		// var_dump($data);
		;
	}
	
	if (count($argv) > 1)
	{
		if (!($page = GetData($argv[1])))
			exit ;
		if (!($rawImgs = GetRawImgUrls($page)))
			exit ;
		$dirname = preg_replace("/^([^\:\/]+\:\/\/)/", "", $argv[1]);
		$dirname = "./".$dirname;
		if (!is_dir($dirname))
			mkdir($dirname);
		foreach ($rawImgs as $v)
			DownloadImage($v, $argv[1], $dirname);
		// echo $dirname;
	}
?>