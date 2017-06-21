#!/usr/bin/php
<?php
	for ($i = 1; $i < $argc; $i++)
	{	
		$arg_arr = preg_split("([\s]+)", trim($argv[$i]));
		$count = count($arg_arr);
		for ($j = 0; $j < $count; $j++)
			$arr[] = $arg_arr[$j];
	}
	sort($arr);
	$count = count($arr);
	for ($k = 0; $k < $count; $k++)
		if ($arr[$k] != "")
			echo "$arr[$k]\n";
?>