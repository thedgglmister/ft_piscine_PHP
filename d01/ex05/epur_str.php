#!/usr/bin/php
<?php
	if ($argc == 1)
		exit();
	$str = trim($argv[1]);
	$str = preg_replace("([\s]+)", " ", $str);
	if ($str != "")
		echo "$str\n";
?>