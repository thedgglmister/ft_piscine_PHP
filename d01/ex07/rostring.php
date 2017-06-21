#!/usr/bin/php
<?php
	if ($argc == 1)
		exit();
	$arr = preg_split("([\s]+)", $argv[1]);
	$arr[] = $arr[0];
	unset($arr[0]);
	if ($arr[0] != "")
		echo implode(" ", $arr)."\n"; 
?>