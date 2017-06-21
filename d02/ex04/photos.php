#!/usr/bin/php
<?php
	if ($argc == 1)
		exit;
	$url = preg_replace("#^http://#", "", $argv[1]);
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$html = curl_exec($ch);
	if (preg_match_all('#<[\s]*img[\s\S]*?src=["\'](.*?)["\']#i', $html, $matches) !== 0)
		mkdir($url);
	else
		exit;
	$img_count = count($matches[1]);
	for ($i = 0; $i < $img_count; $i++)
	{
		if (preg_match("#^http://#", $matches[1][$i]))
			$fh = curl_init($matches[1][$i]);
		else if ($matches[1][$i][0] === '/')
			$fh = curl_init($argv[1].$matches[1][$i]);
		else 
			$fh = curl_init($argv[1]."/".$matches[1][$i]);
		curl_setopt($fh, CURLOPT_RETURNTRANSFER, true);        
		$img = curl_exec($fh);
		file_put_contents("$url/".basename($matches[1][$i]), $img);
		curl_close($fh);
	}
	curl_close($ch);
?>