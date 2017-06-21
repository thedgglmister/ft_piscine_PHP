#!/usr/bin/php
<?php
	if ($argc < 3)
		exit();
	$my_key = $argv[1];
	for ($i = 2; $i < $argc; $i++)
	{
		$pos = strpos($argv[$i], ":");
		$key = substr($argv[$i], 0, $pos);
		if ($key != "")
			$hash[$key] = substr($argv[$i], $pos + 1);
	}
	echo $hash[$my_key];
	if ($hash[$my_key] != "")
		echo "\n";
?>