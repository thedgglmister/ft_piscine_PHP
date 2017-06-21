#!/usr/bin/php
<?php

	function a_call_back($matches)
	{
		$title_regex = '#<[^>]*'.'title=["\']'.'(.*)'.'["\'][^>]*?>#i';
		$content_regex = "#>([\s\S]*?)<#";
		$matches[0] = preg_replace_callback($title_regex, "call_back", $matches[0]);
		$matches[0] = preg_replace_callback($content_regex, "call_back", $matches[0]);
		return ($matches[0]);
	}

	function call_back($matches)
	{
		$matches[0] = preg_replace("#".preg_quote($matches[1])."#", strtoupper($matches[1]), $matches[0]);
		return ($matches[0]);
	}

	if ($argc === 1)
		exit;

	$html = file_get_contents($argv[1]);
	$html = preg_replace_callback('#<\s*a[\s\S]*?<\s*/\s*a\s*>#i', "a_call_back", $html);

	echo "$html";
?>